@extends('app')

@section('content')

    <div class="jumbotron" style="height: 100vh;-webkit-box-shadow:inset 0 -10px 20px -10px rgba(0,0,0,0.1); box-shadow:inset 0 -10px 20px -10px rgba(0,0,0,0.1);">
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
                        <input name="videourl" required class="form-control form-control-lg" placeholder="Enter Video Link..." type="text" autofocus style="height:66px;">
                        <span class="input-group-btn"><button style="height: 66px;" class="btn btn-primary input-lg g-recaptcha"><strong><i class="fa fa-cloud-download" aria-hidden="true"></i> Download</strong></button></span>
                    </div>
                    <br />
                </form>
            </center>
        </div>
    </div>

@endsection