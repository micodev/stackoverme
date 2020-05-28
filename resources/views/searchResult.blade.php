@extends('layout.layout')
@section('content')
<div class="ui relaxed centered grid">
    @if((count($pe)+count($pls)+count($pk))!=0)
        @if(count($pe) !=0)
        <div style="margin-top:20px !important;" class="three column row @auth {{ 'centered' }} @endauth ">
            <div class="column centered seven wide ">
                <h3>result of exactly</h3><br>
                @foreach ($pe as $post)
                    <div class="row " style="margin-bottom:50px !important;">
                        <div class="ui relaxed divided list">
                            <div class="item">
                                <div class="content">
                                    <h3 class="header"><a href="{{ route('problem',['id'=>$post["id"]]) }}">{{ $post["title"] }}</a></h3>
                                    <br>
                                    <div class="description">
                                        <div class="ui horizontal list">
                                            @foreach ($post["tags"] as $tag)
                                                <div class="item" data-value="af">
                                                    <div class="ui horizontal label">
                                                        <i class="{{ $tag["Icon"] }} colored"></i><h5 style="display:inline-block;margin-left:5px;margin-top:0px;">{{ $tag["name"] }}</h5>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                @endforeach
            </div>
        </div>
        @endif
        @if(count($pls) !=0)
        <div style="margin-top:20px !important;" class="three column row @auth {{ 'centered' }} @endauth ">
            <div class="column centered seven wide ">
                <h3>Result Issues</h3><br>
                @foreach ($pls as $post)
                    <div class="row " style="margin-bottom:50px !important;">
                        <div class="ui relaxed divided list">
                            <div class="item">
                                <div class="content">
                                    <h3 class="header"><a href="{{ route('problem',['id'=>$post["id"]]) }}">{{ $post["title"] }}</a></h3>
                                    <br>
                                    <div class="description">
                                        <div class="ui horizontal list">
                                            @foreach ($post["tags"] as $tag)
                                                <div class="item" data-value="af">
                                                    <div class="ui horizontal label">
                                                        <i class="{{ $tag["Icon"] }} colored"></i><h5 style="display:inline-block;margin-left:5px;margin-top:0px;">{{ $tag["name"] }}</h5>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                @endforeach
            </div>
        </div>
        @endif
        @if(count($pk) !=0)
        <div style="margin-top:20px !important;" class="three column row @auth {{ 'centered' }} @endauth ">
            <div class="column centered seven wide ">
                <h3>Result Issues  </h3><br>
                @foreach ($pk as $post)
                    <div class="row " style="margin-bottom:50px !important;">
                        <div class="ui relaxed divided list">
                            <div class="item">
                                <div class="content">
                                    <h3 class="header"><a href="{{ route('problem',['id'=>$post["id"]]) }}">{{ $post["title"] }}</a></h3>
                                    <br>
                                    <div class="description">
                                        <div class="ui horizontal list">
                                            @foreach ($post["tags"] as $tag)
                                                <div class="item" data-value="af">
                                                    <div class="ui horizontal label">
                                                        <i class="{{ $tag["Icon"] }} colored"></i><h5 style="display:inline-block;margin-left:5px;margin-top:0px;">{{ $tag["name"] }}</h5>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                @endforeach
            </div>
        </div>
        @endif
    @else
    <div style="margin-top:20px !important;" class="three column row @auth {{ 'centered' }} @endauth ">
        <p style="font-size:70;"> no result found</p>
    </div>
    @endif
</div>
@endsection
