<?php
namespace App\Http\Classes;


class FacebookDownloader
{
    public $data;

    public function getVideoInfo($url){
        $context = [
            'http' => [
                'method' => 'GET',
                'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.47 Safari/537.36",
            ],
        ];
        $context = stream_context_create($context);
        $this->data = file_get_contents($url, false, $context);
        if ($this->sd_finallink($this->data) == ''){
            return false;
        }
        return array(
            'type' => 'success',
            'title' => $this->getTitle($this->data),
            'hd_download_url' => $this->hd_finallink($this->data),
            'sd_download_url' => $this->sd_finallink($this->data)
        );
    }

    public function cleanStr($str)
    {
        return html_entity_decode(strip_tags($str), ENT_QUOTES, 'UTF-8');
    }

    public function hd_finallink($curl_content)
    {
        $regex = '/hd_src_no_ratelimit:"([^"]+)"/';
        if (preg_match($regex, $curl_content, $match)) {
            return $match[1];
        } else {return;}
    }

    public function sd_finallink($curl_content)
    {
        $regex = '/sd_src_no_ratelimit:"([^"]+)"/';
        if (preg_match($regex, $curl_content, $match1)) {
            return $match1[1];
        } else {return;}
    }

    public function getTitle($curl_content)
    {
        $title = null;
        if (preg_match('/h2 class="uiHeaderTitle"?[^>]+>(.+?)<\/h2>/', $curl_content, $matches)) {
            $title = $matches[1];
        } elseif (preg_match('/title id="pageTitle">(.+?)<\/title>/', $curl_content, $matches)) {
            $title = $matches[1];
        }
        return $this->cleanStr($title);
    }

}