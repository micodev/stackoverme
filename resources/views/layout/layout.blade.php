<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
   <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <script>
        window.lightit = function (e) {
            $(e).wrap('<a href="' + $(e).attr("thumb") + '" rel="lightbox" />');
            $(e).parent('a').trigger('click');
        }

    </script>

</head>

<body>
    <div class="ui sidebar inverted vertical menu">
            @auth
        <a class="item" href="{{Route("profile")}}">
            <div class="ui horizontal list">
                <div class="item">
                    <img class="ui mini circular image" data-lightbox="roadtrip"
                        src="https://fomantic-ui.com/images/avatar2/small/eve.png">
                    <div class="content">
                        <div class="ui sub header"> <span class="ui blue text">
                            {{  auth()->user()->name }} </span></div>
                        <span class="ui text" style="color:whitesmoke">
                        {{ auth()->user()->role==10 ? "User" : "Lecturer" }}
                        </span>
                    </div>
                </div>
            </div>
        </a>
        @endauth
        <a class="item">
            <div class="ui inverted accordion">
                <div class="title">
                    <i class="dropdown icon"></i>
                    <i class="tags icon"></i> Tags Supported
                </div>
                <div class="content" style="margin-top: 5px;">
                    <div class="ui contianer">
                        <div class="ui fluid grid">
                            @foreach (App\Tag::all() as $tag)

                            <div class="sidelink sixteen wide column item" data-value="{{ Route("tag",$tag->name) }}">

                                      <div class="d-inline">{{ $tag->name }} </div> <i
                                        class="{{ $tag->Icon }} colored right float"></i>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </a>
        @auth
        <a class="item"  href="{{Route("home")}}">
            <div class="title">
                    <i class="home circle icon"></i> Home
            </div>
        </a>
        <a class="item"  href="{{Route("problems")}}">
            <div class="title">
                    <i class="info circle icon"></i> Problems
            </div>
        </a>
        <form action="/logout" method="POST" id="logout">
        <a class="item"  href="javascript:{}" onclick="document.getElementById('logout').submit(); return false;">

                {{ csrf_field() }}
                <i class="sign out alternate icon" ></i> LogOut
        </a>
    </form>
        @endauth
        {{--  <a class="item">
            All rights reserved 2019 ©.
        </a>  --}}
    </div>
    <div class="pusher">

        <div class="ui pointing inverted menu">
            <a class="item icon sideclick">
                <i class="code icon"></i>
            </a>
            <div class="right menu">
                @auth
                <a  href="/createIssue" class="ui icon link item">
                       <i class="plus icon"></i>
                </a>

                {{--  <div id="notiapp" class="ui icon top left pointing dropdown link item">
                    <i class="inbox icon"></i>
                    <notfication-component user_id={{ auth()->user()->id }}></notfication-component>
                </div>  --}}

                @endauth
                <div class="item" >
                     <form action="/search" method="GET" class="search_form" name="search">
                        {{ csrf_field() }}
                        <div class="ui transparent icon input">
                                    <input type="text" style="color:white;width:300px;" name="search" placeholder="Search..." >
                                    <i class="search link inverted icon"></i>
                        </div>
                     </form>
                </div>
            </div>
        </div>
        <div class="main-content">

            @yield('content')



        </div>

        {{-- <div class="ui inverted vertical footers segment form-page">
            <div class="ui container">
                Travel Match 2015. All Rights Reserved
            </div>
        </div> --}}
        <footer class="ui inverted vertical footers segment">
            <div class="ui container">
                Travel Match 2015. All Rights Reserved
            </div>
          </footer>
    </div>




    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script> -->


    <link rel="stylesheet" type="text/css" href="https://simditor.tower.im/assets/styles/simditor.css" />
    <link rel="stylesheet" type="text/css" href="/semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/extra.css">
    <script src="/js/app.js"></script>
    <script src="/semantic/dist/semantic.min.js"></script>

    <script src="/js/module.js"></script>
    <script src="/js/hotkeys.js"></script>
    <script src="/js/simditor.js"></script>
    <script src="/js/uploader.js"></script>
    <script src="/js/custom.js"></script>
    <script>

        $(document).ready(function () {
            $('input[name="username"]').popup();
            $('input[name="reusername"]').popup();
            $('input[name="email"]').popup();
            $('input[name="password"]').popup();
         //   $('.ui.sticky')
         //   .sticky('refresh')
         // ;
            $('.ui.pointing.dropdown')
                .dropdown({
                    on: 'hover',
                    maxSelections: 0
                });
            {{-- $('div.activatior')
                .popup({
                    on: 'click',
                    delay: {
                        show: 50,
                        hide: 50
                    }
                }); --}}
            $('.ui.accordion')
                .accordion();
            $('.ui.grey.circular.label')
                .popup();




            $('.sideclick').click(function () {

                $('.ui.sidebar').sidebar('setting', 'transition', 'overlay').sidebar('toggle');

            });
            $('.ui.dropdown').dropdown();
            $(function () {

            if ($("#editor").length)
            {
                Simditor.locale = 'en-US';
                toolbar = ['bold','strikethrough', 'fontScale', 'color', 'ol', 'code', 'link' , 'alignment'];
                var editor = new Simditor({
                    textarea: $('#editor'),
                    toolbar: toolbar,
                    //optional options
                });
            }
            if ($("#editPost").length)
            {

                Simditor.locale = 'en-US';
                toolbar = ['bold','strikethrough', 'fontScale', 'color', 'ol', 'code', 'link' , 'alignment'];
                var PostEditor = new Simditor({
                    textarea: $('#editPost'),
                    toolbar: toolbar,
                    //optional options
                });
            }
            $(".editModal").modal();
            $(".editPost").on('click', function () {
                $(".description > .simditor .simditor-body").children().remove();
                $(".description > .simditor .simditor-body").prepend($(".problem_body").clone().children());

                var imgs = "";
                $(".upeditpost").children().remove();
                $(".imageSegment").each(
                    function() {
                        var ing = '<div class="item"><a class="ui teal image medium label">'+$(this).html()+'p1jrrvn</a></div>';
                        $(".upeditpost").append(ing);
                    });
                $(".title").val($(".problem_title").text());
                $(".editModal").modal("show");
            });
            if(document.location.hash ==null)
            $(window).scrollTop(0);
            });

        })


    </script>

</body>

</html>
