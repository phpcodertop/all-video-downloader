<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('home');
    }

    public function download(Request $request){
        $request->validate([
            "videourl" => 'required'
        ]);
        $url = $request->input('videourl');
        $data = [
            'url' => $url
        ];
        switch ($this->detectWebsite($url)){
            case 'youtube':
                if($this->detectPlaylist($url) == false){
                    $yt = new \YouTubeDownloader();
                    $links = $yt->getDownloadLinks($url);
                    $id = $yt->extractId($url);
                    $content = file_get_contents("http://youtube.com/get_video_info?video_id=" . $id);
                    parse_str($content, $ytarr);
                    $img = "https://img.youtube.com/vi/".$id."/0.jpg";
                    $data['links'] = $links;
                    $data['thumbnail'] = $img;
                    $data['title'] = $ytarr['title'];
                    return view('download.youtube-video',$data);
                }else{
                    $playlist_id = $this->detectPlaylist($url);
                    $url = "https://www.youtube.com/list_ajax?style=json&action_get_list=1&list=PLvah45Gv0-CfNA0zfS4Sr6ov0pAL96Fr1";
                    $playlistData = json_decode(file_get_contents($url),true);
//                    dd($data);
                    $data['playlist'] = $playlistData;
                    return view('download.youtube-playlist',$data);
                }
                break;
            case 'facebook':
                break;
            case 'vimeo':
                break;
            case 'unknown':
                return redirect()->back()->withErrors(["Invalid Url"]);
                break;
        }
    }

    public function detectWebsite($url){
        if (strpos($url, 'youtube') > 0) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
            return 'vimeo';
        }elseif (strpos($url, 'facebook') > 0) {
            return 'vimeo';
        } else {
            return 'unknown';
        }
    }

    public function detectPlaylist($url){
        if (strpos($url, 'playlist') > 0) {
            $playlist_pattern = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{12,})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
            $playlist_id = (preg_replace($playlist_pattern, '$1', $url));
            return $playlist_id;
        } else {
            return false;
        }
    }

}
