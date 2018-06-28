<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title','Online Video Downloader')</title>
        <meta name="description" content="Online video downloader and Youtube to MP3 Converter online. Download Videos from Youtube, Vimeo, Facebook and many others for free without plugins. Fastest Youtube to MP3 downloader.">
        <mete name="keywords" content="video downloader, online video downloader, youtube to mp3 converter, youtube video downloader, youtube video downloader online, youtube to mp3 converter online, youtube to mp3 online, downloady youtube videos online, download youtube to mp3, convert youtube to mp3 online"
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        @yield('styles')
    </head>
    <body>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/531c15d395.js" defer async></script>
    @yield('scripts')
    </body>
</html>