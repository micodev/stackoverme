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
        <a class="item">
            <div class="ui horizontal list">
                <div class="item">
                    <img class="ui mini circular image" data-lightbox="roadtrip"
                        src="https://fomantic-ui.com/images/avatar2/small/eve.png">
                    <div class="content">
                        <div class="ui sub header"> <span class="ui blue text">Molly</span></div>
                        <span class="ui grey text">Coordinator</span>
                    </div>
                </div>
            </div>
        </a>
        <a class="item">
            <div class="ui inverted accordion">
                <div class="title">
                    <i class="dropdown icon"></i>
                    <i class="tags icon"></i> Tags
                </div>
                <div class="content" style="margin-top: 5px;">
                    <div class="ui contianer">
                        <div class="ui fluid grid">
                            <div class="sixteen wide column item">
                                <div class="d-inline"> Csharp </div> <i
                                    class="devicon-csharp-plain-wordmark colored right float"></i>
                            </div>
                            <div class="sixteen wide column item">
                                <div class="d-inline"> JavaScript </div> <i
                                    class="devicon-javascript-plain right float colored"></i>
                            </div>
                            <div class="sixteen wide column item">
                                <div class="d-inline"> NodeJs </div> <i
                                    class="devicon-nodejs-plain right float colored"></i>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </a>
        <a class="item">
            <i class="sign out alternate icon"></i> LogOut
        </a>
        <a class="item">
            All rights reserved 2019 ©.
        </a>
    </div>
    <div class="pusher">

        <div class="ui pointing inverted menu">
            <a class="item icon sideclick">
                <i class="code icon"></i>
            </a>
            <div class="right menu">
                <div class="ui icon top left pointing dropdown link item">
                    <i class="inbox icon"></i>
                    <div class="menu">
                        <div class="header">Mark Read All as Read</div>
                        <div class="item">
                            {{--  <a href="images/image-1.jpg" data-lightbox="image-1" data-title="My caption">Image #1</a>  --}}
                            <img class="ui mini circular image"
                                src="https://fomantic-ui.com/images/avatar2/small/eve.png">
                            <div class="content d-inline" style="margin-bottom:5px;">
                                <div class="ui sub header"> <span class="ui blue text">Molly</span></div>
                            </div>
                            <div class="ui sub"> <span class="ui grey text">Comment your <a>post</a></span></div>

                        </div>
                        <div class="item">
                            <img class="ui mini circular image"
                                src="https://fomantic-ui.com/images/avatar2/small/eve.png">
                            <div class="content d-inline" style="margin-bottom:5px;">
                                <div class="ui sub header"> <span class="ui blue text">Molly</span></div>
                            </div>
                            <div class="ui sub"> <span class="ui grey text">like your <a>post</a></span></div>

                        </div>
                        <div class="item">
                            <img class="ui mini circular image" onclick="lightit(this)"
                                src="https://fomantic-ui.com/images/avatar2/small/eve.png">
                            <div class="content d-inline" style="margin-bottom:5px;">
                                <div class="ui sub header"> <span class="ui blue text">Molly</span></div>
                            </div>
                            <div class="ui sub"> <span class="ui grey text">share your <a>post</a></span></div>

                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="ui transparent icon input">
                        <input type="text" placeholder="Search...">
                        <i class="search link inverted icon"></i>
                    </div>
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
    <script>
        $(document).ready(function () {
            $('input[name="username"]').popup();
         //   $('.ui.sticky')
         //   .sticky('refresh')
         // ;
            $('.ui.pointing.dropdown')
                .dropdown({
                    on: 'hover',
                    maxSelections: 0
                });
            $('div.activatior')
                .popup({
                    on: 'click',
                    delay: {
                        show: 50,
                        hide: 50
                    }
                });
            $('.ui.accordion')
                .accordion();
            $('.ui.grey.circular.label')
                .popup();

            $('.comment-button').on('click', function () {

                $('.ui.modal')
                    .modal({
                        centered: true,
                        blurring: true,
                        transition: 'zoom'
                    })
                    .modal('show');
            })
            $('.image').dimmer({
                on: 'hover'
            });

            $('.sideclick').click(function () {

                $('.ui.sidebar').sidebar('setting', 'transition', 'overlay').sidebar('toggle');

            });
            $('.ui.dropdown').dropdown();
            $(function () {
            Simditor.locale = 'en-US';
            toolbar = ['bold','strikethrough', 'fontScale', 'color', 'ol', 'code', 'link' , 'alignment'];
            var editor = new Simditor({
                textarea: $('#editor'),
                toolbar: toolbar,
                //optional options
            });
        })


        $(window).scrollTop(0);
        });

    </script>

</body>

</html>
