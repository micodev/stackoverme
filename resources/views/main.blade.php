@extends('layout.layout')
@section('content')
<div class="ui relaxed centered grid">
    <div class="three column row">

        <div class="column">
            <!-- left column-->
            <div class="row">
                <h2 class="ui header">
                    <i class="bolt icon blue"></i>
                    <div class="content">
                        <span class="ui big red text">R</span>ecommanded Question
                        <div class="sub header">Sort
                            <div class="ui red mini buttons">
                                <button class="ui button"><i class="poll icon"></i> Vote</button>
                                <button class="ui button"><i class="history icon"></i> Recent</button>
                                <button class="ui button"><i class="hotjar icon"></i> Hot</button>
                            </div>
                        </div>

                    </div>
                </h2>
            </div>
            <div class="ui fitted divider"></div>
            <div class="row">

                <div class="ui relaxed divided list">

                    <div class="item">
                        <div class="content">
                            <h5 class="header">Question title</h5>
                            <h3 class="header d-inline">by</h3>
                            <h6 class="d-inline"><a class="header"><b>Bob's Burgers</b></a></h6>
                            <div class="description">
                                <div class="ui horizontal list">
                                    <div class="item" data-value="af">
                                        <div class="ui horizontal label">
                                            <i class="devicon-csharp-plain-wordmark colored"></i> Csharp
                                        </div>
                                    </div>
                                    <div class="item" data-value="ax">
                                        <div class="ui horizontal label">
                                            <i class="devicon-javascript-plain colored"></i> JavaScript
                                        </div>
                                    </div>
                                    <div class="item" data-value="al">
                                        <div class="ui horizontal label">
                                            <i class="devicon-nodejs-plain colored"></i> NodeJs
                                        </div>
                                    </div>
                                </div>
                                <div class="row right floated" style="margin-top:5px;">
                                    <div class="ui blue tiny right floated horizontal labeled icon buttons">
                                        <button class="ui button">
                                            <i class="poll icon"></i>
                                            20
                                        </button>
                                        <button class="ui button">
                                            <i class="comment alternate icon"></i>
                                            2
                                        </button>
                                        <button class="ui button">
                                            <i class="calendar icon"></i>
                                            {{ Carbon\Carbon::now()->format('Y-m-d') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <h5 class="header">Question title</h5>
                            <h3 class="header d-inline">by</h3>
                            <h6 class="d-inline"><a class="header"><b>Bob's Burgers</b></a></h6>
                            <div class="description">
                                <div class="ui horizontal list">
                                    <div class="item" data-value="af">
                                        <div class="ui horizontal label">
                                            <i class="devicon-csharp-plain-wordmark colored"></i> Csharp
                                        </div>
                                    </div>
                                    <div class="item" data-value="ax">
                                        <div class="ui horizontal label">
                                            <i class="devicon-javascript-plain colored"></i> JavaScript
                                        </div>
                                    </div>
                                    <div class="item" data-value="al">
                                        <div class="ui horizontal label">
                                            <i class="devicon-nodejs-plain colored"></i> NodeJs
                                        </div>
                                    </div>
                                </div>
                                <div class="row right floated" style="margin-top:5px;">
                                    <div class="ui blue tiny right floated horizontal labeled icon buttons">
                                        <button class="ui button">
                                            <i class="poll icon"></i>
                                            20
                                        </button>
                                        <button class="ui button">
                                            <i class="comment alternate icon"></i>
                                            2
                                        </button>
                                        <button class="ui button">
                                            <i class="calendar icon"></i>
                                            {{ Carbon\Carbon::now()->format('Y-m-d') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <h5 class="header">Question title</h5>
                            <h3 class="header d-inline">by</h3>
                            <h6 class="d-inline"><a class="header"><b>Bob Burgers</b></a></h6>
                            <div class="description">
                                <div class="ui horizontal list">
                                    <div class="item" data-value="af">
                                        <div class="ui horizontal label">
                                            <i class="devicon-csharp-plain-wordmark colored"></i> Csharp
                                        </div>
                                    </div>
                                    <div class="item" data-value="ax">
                                        <div class="ui horizontal label">
                                            <i class="devicon-javascript-plain colored"></i> JavaScript
                                        </div>
                                    </div>
                                    <div class="item" data-value="al">
                                        <div class="ui horizontal label">
                                            <i class="devicon-nodejs-plain colored"></i> NodeJs
                                        </div>
                                    </div>
                                </div>
                                <div class="row right floated" style="margin-top:5px;">
                                    <div class="ui blue tiny right floated horizontal labeled icon buttons">
                                        <button class="ui button">
                                            <i class="poll icon"></i>
                                            20
                                        </button>
                                        <button class="ui button">
                                            <i class="comment alternate icon"></i>
                                            2
                                        </button>
                                        <button class="ui button">
                                            <i class="calendar icon"></i>
                                            {{ Carbon\Carbon::now()->format('Y-m-d') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="four wide column">
            <!-- right column-->
          @guest
            <div class="ui top attached inverted segment blue" style="border:0;text-align:center;" tabindex="0">Registeration</div>
            <div class="ui attached segment">
                <div class="ui form">
                    <form action="register" method="post">
                        {{ csrf_field() }}
                        <div class="field">
                            <div class="ui left corner labeled fluid input">
                                <input type="type" placeholder="enter first name...." name="firstname">
                                <div class="ui left corner label">
                                    <i class="user icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left corner labeled fluid input">
                                <input type="type" placeholder="enter last name...." name="lastname">
                                <div class="ui left corner label">
                                    <i class="user icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left corner labeled fluid input">
                                <input type="type" placeholder="enter username ...." name="username">
                                <div class="ui left corner label">
                                    <i class="user icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <!-- <i class="envelope icon"></i> -->
                            <div class="ui left corner labeled fluid input">
                                <input type="type" placeholder="enter email ...." name="email">
                                <div class="ui left corner label">
                                    <i class="envelope icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left corner labeled fluid input">
                                <input type="password" placeholder="enter password...." name="password">
                                <div class="ui left corner label">
                                    <i class="asterisk icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <button class="ui red tiny button"  type="submit" aria-label="label">
                                register
                            </button>
                        </div>
                    </form>
                    <div class="ui horizontal divider header">
                        <i class="users icon"></i>
                        Login
                    </div>
                    <form action="login" method="post">
                            {{ csrf_field() }}
                     <div class="field">
                        <div class="ui left corner labeled fluid input">
                            <input type="type" placeholder="enter email or username...." name="username"
                            data-position="top center"
                            class="redborder"
                            @if($errors->has("username"))

                            data-content="{{$errors->first('username')}}"
                            @endif
                            >
                            <div class="ui red left corner label">
                                <i class="envelope icon"></i>
                            </div>
                        </div>
                     </div>
                     <div class="field">
                        <div class="ui left corner labeled fluid input">
                            <input type="password" placeholder="enter password...." name="password">
                            <div class="ui left corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                     </div>
                     <div class="field">
                        <button class="ui red tiny button" type="submit" aria-label="label">
                            sign-in
                        </button>
                     </div>
                     <div class="field">

                        <div class="alert alert-danger">
                           {{$errors->first('username')}}
                            {{$errors->first('warning')}}
                        </div>

                        @if (Session::get('warning') !=null)
                                <ul>

                                        <li>{{Session::get('warning') }}</li>

                                </ul>
                        @endif
                        </div>
                    </form>
                </div>
            </div>
          @else

          @endguest
        </div>
    </div>
</div>
@endsection
