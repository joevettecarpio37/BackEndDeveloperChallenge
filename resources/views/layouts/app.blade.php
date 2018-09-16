<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        function activity(b,isRandom){
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

            $.ajax({
                url: "/addActivity",
                type: "POST",
                dataType: "json",
                data: {
                activity: isRandom ? ("You random search " + b) : ("You search for "+b),
                },
                success: function (result) {
                    console.log(result);
                },
    
                error: function (errormessage) {
                    console.log(errormessage.responseText);
                }
            });
        }

        function load_news_feeds(a,b) {
            $(".post-list").html("");
            $.ajax({
                url: "/searchTweets/"+a,
                type: "GET",
                dataType: "json",
                success: function (result) {
                    //console.log(result)
                    var flag = "";
                    var vhtml = "";
                    var slist = "";
                    result.statuses.forEach(function (tweet) {
                        flag = tweet.text;
                        // console.log(tweet.text)
                        vhtml += "<div class='social-feed-box'>";
                        vhtml += "<div class='pull-right social-action dropdown'>";
                       
                        vhtml += "</div>";
                        vhtml += "<div class='social-avatar'>";
                        vhtml += "<a href='' class='pull-left'>";
                        vhtml += "<img alt='image' src='" + tweet.user.profile_image_url + "'>";
                        vhtml += "</a>";
                        vhtml += "<div class='media-body'>";
                        vhtml += "<a href='#'>";
                        vhtml += tweet.user.screen_name;
                        vhtml += "</a>";
                        vhtml += "<small class='text-muted'>" + tweet.id_str + " - " + tweet.created_at + "</small>";
                        vhtml += "</div>";
                        vhtml += "</div>";
                        vhtml += "<div class='social-body'>";
                        vhtml += "<p>" + tweet.text + "</p>";
                        vhtml += "<div id=img_" + tweet.id + "></div>"
                        vhtml += "<div class='btn-group'>";
                        vhtml += "</div>";
                        vhtml += "</div>";
                        vhtml += "<div class='social-footer'>";
                        vhtml += "<div class='comment-list-" + tweet.id + "'></div>";
                        vhtml += "<div class='social-comment'>";
                       
                        vhtml += "<div class='media-body' id='div_" + tweet.id + "'>";
                        vhtml += "</div>";
                        vhtml += "</div>";
                        vhtml += "</div>";
                        vhtml += "</div>";
                        slist += tweet.id + ",";
                    });
                    if(flag == "")
                    {
                        $(".post-list").append("Words you search does not exist");                

                    }
                    else{
                        $(".post-list").append(vhtml);                

                    }
                    activity(a,b);

                },
                error: function (errormessage) {
                    console.log(errormessage.responseText);
                }
            });
        }


    </script>

<script>
function load_random()
{
$.ajax({
    url: "/randTweets",
    type: "GET",
     dataType: "json",
     success: function (result) {
// console.log(result);
       load_news_feeds(result,true)
     },

    // },
   
    error: function (errormessage) {
        console.log(errormessage.responseText);
    }
});
}
</script>
</body>
</html>
