@extends('layout.layout')
@section('content')
<div class="ui grid container">


    <div class="ui row">
        <div class="ui column three wide"></div>
        <div class="ui ten wide column">

            <div class="ui top attached grey inverted segment" tabindex="0" style="text-align:left;">
                <div class="ui red right ribbon label">
                    <i class="help icon"></i> Issue
                </div>
                <div class="ui fluid content">
                    I have probelm in c# code
                </div>

            </div>
            <div class="ui attached segment">
                <div class="ui padded attached segment">
                    <p>
                        """ruby <br>
                        /a regex/ <br>
                        a_string = "foo" <br>
                        a_string.to_sym <br>
                        """ <br>

                        2 space indent: <br>

                        """ruby <br>
                        /a regex/ <br>
                        a_string = "foo" <br>
                        a_string.to_sym <br>
                        """ <br>
                    </p>
                </div>
                <div class="ui horizontal bottom attached segment stackable segments">
                    <div class="ui segment">

                        <img class="ui small centered image"
                            src="https://fomantic-ui.com/images/wireframe/image-text.png">

                    </div>
                    <div class="ui segment">

                        <img class="ui small centered image"
                            src="https://fomantic-ui.com/images/wireframe/image-text.png">

                    </div>
                    <div class="ui segment">

                        <img class="ui small centered image"
                            src="https://fomantic-ui.com/images/wireframe/image-text.png">

                    </div>



                </div>

            </div>
            <div class="ui bottom attached segment" tabindex="0">
                <h2 class="ui tiny header d-inline" style="margin-bottom:0 !important;">
                    <i class="user icon"></i>
                    <div class="content">
                        Pattrick Donald
                        <div class="sub header">member</div>
                    </div>
                </h2>
                <div class=" ui tiny buttons right floated">
                    <button class="green ui labeled icon button right" aria-label="label">
                        <i class="like icon"></i>
                        30
                    </button>
                    <button class="ui yellow icon button" aria-label="label">
                        <i class="crown icon"></i>
                    </button>
                    <button class="ui blue labeled icon button right" aria-label="label">
                        <i class="share icon"></i>
                        share
                    </button>
                </div>
            </div>


        </div>

    </div>
    <div class="ui row">
        <div class="ui column three wide"></div>
        <div class="ui ten wide column">
            <div class="ui fluid segment">
                <div class="ui form left corner labeled fluid input">
                    <div class="ui left corner blue label">
                        <i class="comment description icon"></i>
                    </div>
                    <textarea></textarea>
                </div>
                <div class="ui divider horizontal"></div>
                <div class="ui fluid input" style="margin-bottom:7px;">
                    <input type="text" placeholder="link related">
                </div>
                <div class="ui fluid grid">
                    <div class="ui thirteen wide left floated column">
                        <div class="ui fluid input">
                            <input type="text" placeholder="additional link">
                        </div>
                    </div>
                    <div class="ui right floated column w-a">
                        <button class="ui blue button w-a">send</button>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div class="ui row">
        <div class="ui column three wide"></div>
        <div class="ui ten wide column">
            <div class="ui fluid piled raised segments">
                <div class="ui segment blue "  >
                    <a class="ui green ribbon label"> <i class="check icon"></i> </a>
                    <div class="ui divider horizontal clearing"></div>
                    <h2 class="ui tiny header d-inline comment-seg">
                        <i class="user icon"></i>
                        <div class="content">
                            Mico Gets
                            <div class="sub header">member</div>

                        </div>
                    </h2>
                    <div class="activatior">
                        <div class="ui tall stacked segment">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                egestas.
                                Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu
                                libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat
                                eleifend
                                leo.</p>
                        </div>
                        <div class="ui padded attached segment">
                            <p>2
                                """ruby <br>
                                /a regex/ <br>
                                a_string = "foo" <br>
                                a_string.to_sym <br>
                                """ <br>

                                2 space indent: <br>

                                """ruby <br>
                                /a regex/ <br>
                                a_string = "foo" <br>
                                a_string.to_sym <br>
                                """ <br>
                            </p>
                            <div class="ui horizontal divider header">
                                <i class="grey linkify icon"></i>
                                Related Link
                            </div>

                            <div class="ui horizontal list">
                                <a class="item ui grey circular label" href="/main"
                                    data-content="https://google.com/...." data-variation="mini"">1</a>
                                    <a class=" item ui grey circular label" href="/main"
                                    data-content="https://google.com/...." data-variation="mini"">2</a>

                            </div>
                            <div class="ui buttons right floated">
                                <button class="ui labeled icon button right" aria-label="label">
                                    <i class="thumbs up outline icon"></i>
                                  5
                                </button>
                                <button class="ui labeled icon button right" aria-label="label">
                                    <i class="thumbs down outline icon"></i>
                                        19
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class=" ui flowing popup bottom left transition hidden">

                                    <button class="ui labeled icon button red right  seg-attached-left c-submenu"
                                        aria-label="label">
                                        <i class="like icon"></i>
                                        30
                                    </button>
                                    <button class="ui labeled icon button comment-button blue right c-submenu"
                                        aria-label="label">
                                        <i class="comment alternate icon"></i>
                                        30
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

                            </div>
                </div>
                <div class="ui segment blue ">

                                <h2 class="ui tiny header d-inline comment-seg" >
                                    <i class="user icon"></i>
                                    <div class="content">
                                        Mico Gets
                                        <div class="sub header">member</div>
                                    </div>
                                </h2>
                                <div class="activatior">
                                    <div class="ui tall stacked segment">
                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                            egestas.
                                            Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu
                                            libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat
                                            eleifend
                                            leo.</p>
                                    </div>
                                    <div class="ui padded attached segment">
                                        <p>2
                                            """ruby <br>
                                            /a regex/ <br>
                                            a_string = "foo" <br>
                                            a_string.to_sym <br>
                                            """ <br>

                                            2 space indent: <br>

                                            """ruby <br>
                                            /a regex/ <br>
                                            a_string = "foo" <br>
                                            a_string.to_sym <br>
                                            """ <br>
                                        </p>
                                        <div class="ui horizontal divider header">
                                            <i class="grey linkify icon"></i>
                                            Related Link
                                        </div>

                                        <div class="ui horizontal list">
                                            <a class="item ui grey circular label" href="/main"
                                                data-content="https://google.com/...." data-variation="mini"">1</a>
                                                <a class=" item ui grey circular label" href="/main"
                                                data-content="https://google.com/...." data-variation="mini"">2</a>
                                        </div>
                                    </div>
                                </div>
                                <div class=" ui flowing popup bottom left transition hidden">

                                                <button class="ui labeled icon button red right  seg-attached-left c-submenu"
                                                    aria-label="label">
                                                    <i class="like icon"></i>
                                                    30
                                                </button>
                                                <button class="ui labeled icon button comment-button blue right c-submenu"
                                                    aria-label="label">
                                                    <i class="comment alternate icon"></i>
                                                    30
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

                                        </div>
                </div>


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
