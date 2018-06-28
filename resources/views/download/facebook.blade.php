@extends('app')

@section('content')

    <div class="jumbotron" style="-webkit-box-shadow:inset 0 -10px 20px -10px rgba(0,0,0,0.1); box-shadow:inset 0 -10px 20px -10px rgba(0,0,0,0.1);">
        <div class="container">
            <center>
                <h1 style="font-size:24px;font-weight:700;margin-top: 2%;">Online Video Downloader</h1>
                <br />
                <div style="float:none;" class="col-lg-6">
                </div>
                <br />
                <form id="fd" action="{{ url('download') }}" method="post" >
                    {{ csrf_field() }}
                    <div class="input-group col-md-8">
                        <input name="videourl" value="{{ $url }}" required class="form-control form-control-lg" placeholder="Enter Video Link..." type="text" autofocus style="height:66px;">
                        <span class="input-group-btn"><button style="height: 66px;" class="btn btn-primary input-lg g-recaptcha"><strong><i class="fa fa-cloud-download" aria-hidden="true"></i> Download</strong></button></span>
                    </div>
                    <br />
                </form>
            </center>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">{{ $videoData['title'] }}</h3>
                <table class="table table-hover table-striped">
                    <thead>
                    <tr class="headerRow">
                        <th>Format</th>
                        <th>Downloads</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>HD Quality</td>
                            <td><a download target="_blank" href="{{$videoData['hd_download_url']}}" class="btn btn-primary">Download</a></td>
                        </tr>
                        <tr>
                            <td>Low Quality</td>
                            <td><a download target="_blank" href="{{$videoData['sd_download_url']}}" class="btn btn-primary">Download</a></td>
                        </tr>
                    </tbody>
                </table>




            </div>
        </div>
    </div>

@endsection