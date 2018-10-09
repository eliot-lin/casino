@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <input id="player_id" type="hidden" value="{{ request()->video_id }}">
                    <div id="player"></div>

                    <script>
                        let player_id = document.getElementById('player_id').value;
                        function onYouTubeIframeAPIReady() {
                            let player = new YT.Player('player', {
                                videoId: player_id,
                                events: {
                                    onReady: onPlayerReady,
                                    onStateChange: onPlayerStateChange
                                },
                                playerVars: {
                                    autoplay: 1,
                                },
                            });

                            function onPlayerReady(event) {
                                event.target.playVideo();
                            }

                            var done = false;
                            function onPlayerStateChange(event) {
                                if (event.data == YT.PlayerState.PLAYING && !done) {
                                    setTimeout(stopVideo, 6000);
                                    done = true;
                                }
                            }
                            function stopVideo() {
                                player.stopVideo();
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
