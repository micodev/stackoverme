@extends('layout.layout')
@section('content')
<div class="ui grid">
    <div class="ui column three wide"></div>
    <div class="ui column nine wide">
        <div class="ui row">

            <div class="ui nine wide column">

                <div class="ui top attached red segment" tabindex="0" style="text-align:left;">
                    <h2 class="ui fluid header problem_title">
                        {{ $post->title }}
                    </h2>

                </div>
                <div class="ui attached segment">
                    <div class="ui padded attached segment problem_body">
                        {!! $post->description !!}
                    </div>
                    <div class="ui horizontal bottom attached segment stackable segments">
                        @for ($i = 0; $i < 3; $i++)
                            @if($i<count($imgs))
                                <div class="ui segment">
                                        <img class="ui small centered image" {{ stripslashes($imgs[$i]->image) }} onclick="lightit(this)">
                                </div>
                            @else
                                <div class="ui segment">

                                    <img class="ui small centered image"
                                        src="https://fomantic-ui.com/images/wireframe/image-text.png">
                                </div>
                            @endif
                        @endfor


                    </div>

                </div>
                <div class="ui bottom attached segment" tabindex="0">
                    <h2 class="ui tiny header d-inline" style="margin-bottom:0 !important;">
                        <i class="user icon"></i>
                        <div class="content">
                            {{ $post->User->name }}
                            <div class="sub header">
                                    {{ $post->User->role==10 ? "User" : "Lecturer" }}
                            </div>
                        </div>
                    </h2>
                    <div class=" ui tiny buttons right floated">
                        <button class="green ui labeled icon button right" aria-label="label">
                            <i class="like icon"></i>
                            {{ $post->like }}
                        </button>
                        <button class="ui blue labeled icon button right" id="copyButton" copy="{{ url()->full() }}" >
                            <i class="share icon"></i>
                            share
                        </button>

                    </div>
                </div>


            </div>

        </div>
        <div class="ui row">
            <form action="/problem/{{ $id }}" method="post">
                {{ csrf_field() }}

            <div class="ui nine wide column">
                <div class="ui fluid segment">
                    <textarea id="editor" placeholder="Balabala" autofocus></textarea>
                    <input type="hidden" name="body_problem" value="" id="body_problem" />
                    <div class="ui divider horizontal" style="margin: 0.5rem 0 !important;"></div>
                    <button class="ui icon blue tiny button w-a post_comment" aria-label="label">
                        <i class="send icon"></i> Send
                    </button>
                    <label for="embedpollfileinput" class="ui tiny red  button">
                        <i class="ui upload icon"></i>
                        Upload image
                    </label>
                    <input type="file" class="inputfile" id="embedpollfileinput"
                        accept="image/x-png,image/gif,image/jpeg" multiple>

                    <div class="ui horizontal right floated list upimages">
                    </div>
                    <input type="hidden" name="images" class="images_input" value="">

                </div>

            </div>
        </form>
        </div>
        <div class="ui row">
            <div class="ui nine wide column">
                <div class="ui fluid piled raised segments">
                    @foreach ( $comments->get() as $comment )
                    <div class="ui segment blue">
                            <a class="ui grey ribbon label"> <i class="info icon"></i> </a>
                            <div class="ui divider horizontal clearing"></div>
                            <h2 class="ui tiny header d-inline comment-seg">
                                <i class="user icon"></i>
                                <div class="content">
                                    {{ $comment->user->name }}  <i class="check primary circle icon"></i>
                                    <div class="sub header">
                                            {{ $comment->user->role==10 ? "User" : "Lecturer" }}
                                    </div>

                                </div>
                            </h2>
                            <div class="activatior">
                                <div class="ui tall stacked segment comment_body">
                                    {!! $comment->description !!}
                                </div>
                            </div>
                            <div class=" ui flowing popup bottom left transition hidden">
                                <button class="ui icon button" aria-label="is_correct">
                                    <i class="check icon green"></i>
                                </button>
                                <button class="ui labeled icon button red right  seg-attached-left c-submenu"
                                    aria-label="label">
                                    <i class="like icon"></i>
                                    30
                                </button>
                                <button class="ui  icon button comment-button blue right c-submenu"
                                    aria-label="label">
                                    <i class="comment alternate icon"></i>
                                </button>
                                <button class="ui icon button blue seg-attached-right c-submenu" aria-label="label">
                                    <i class="share icon"></i>
                                </button>

                            </div>
                            <div class="ui celled list">
                                <div class="item" style="margin-top:10px;">

                                    <i class="ui avatar user icon"></i>
                                    <div class="content">
                                        <a class="header">Rachel</a>
                                        <div class="description d-inline">Last seen watching <a
                                                class="header d-inline"><b>@micodev</b></a> just now.</div>
                                        <button class="circular ui icon right floated mini button">
                                            <i class="reply icon"></i>
                                        </button>
                                    </div>


                                </div>
                                <div class="item" style="margin-top:10px;">

                                    <i class="ui avatar user icon"></i>
                                    <div class="content">
                                        <a class="header">Rachel</a>
                                        <div class="description d-inline">Last seen watching <a
                                                class="header d-inline"><b>@micodev</b></a> just now.</div>
                                        <button class="circular ui icon right floated mini button">
                                            <i class="reply icon"></i>
                                        </button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="ui  column three wide" style="min-height: 578.2px;">
        <div class="ui container" style="position:sticky;width: 261.35px !important; height: 578.2px !important; left: 1157.4px; top: 20px;">
            <div class="ui secondary green inverted attached top segment" style="margin-top:10px;border:0 !important;">
                <p>Suggested Question</p>
            </div>
            <div class="ui raised attached segment" style="margin-bottom: 80px;">
                <!-- <p>no Question Available</p> -->
                <div class="ui relaxed divided list" style="height: 500px;overflow-y: scroll;">
                    @for( $i=0; $i<10;$i++) <div class="item">
                        <div class="content">
                            <h5 class="header">Lorem ipsum dolor </h5>
                            <h3 class="header d-inline">by</h3>
                            <h6 class="d-inline"><a class="header"><b>Bob's Burgers</b></a></h6>
                            <div class="description">
                                <div class="ui horizontal list">
                                    <div class="item" data-value="af">
                                        <div class="ui circular  tertiary horizontal label">
                                            <i class="devicon-csharp-plain-wordmark colored"></i>
                                        </div>
                                    </div>
                                    <div class="item" data-value="ax">
                                        <div class="ui circular  tertiary  horizontal label">
                                            <i class="devicon-javascript-plain colored"></i>
                                        </div>
                                    </div>
                                    <div class="item" data-value="al">
                                        <div class="ui circular  tertiary horizontal label">
                                            <i class="devicon-nodejs-plain colored"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                @endfor
            </div>
        </div>
    </div>

</div>

<!-- comment modal -->
<div class="ui large modal">
    <div class="header">
        <span class="ui medium red text">A</span>dd a comment
    </div>
    <div class="content">
        <div class="ui left corner labeled input fluid">
            <input type="type" placeholder="Insert comment here...">
            <div class="ui left corner label">
                <i class="comment icon"></i>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui negative button">
            cancel
        </div>
        <div class="ui positive right labeled icon button">
            send
            <i class="checkmark icon"></i>
        </div>
    </div>
</div>
@endsection
