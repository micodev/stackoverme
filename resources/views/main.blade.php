@extends('layout.layout')
@section('content')
<div class="ui relaxed centered grid">

    <div class="three column row @auth {{ 'centered' }} @endauth ">

        <div class="column @auth {{ 'centered seven wide ' }} @endauth">
            <!-- left column-->
            @if (count($posts)>0)
            <div class="row">
                <h2 class="ui header">
                    <i class="bolt icon blue"></i>
                    <div class="content">
                        <span class="ui big red text">R</span>ecommanded Question
                    </div>
                </h2>
            </div>
            <div class="ui fitted divider"></div>
            @else
             <div class="row">
                <h2 class="ui header">
                   no recommanded yet for you.
                </h2>
            </div>
            @endif
            <div class="row">

                <div class="ui relaxed divided list">
                    @foreach($posts as $po)
                        <div class="item">
                            <div class="content">
                                <h5 class="header"><a href="{{ route('problem',['id'=>$po['id']]) }}">{{ $po['title'] }}</a> </h5>
                                <h3 class="header d-inline">by</h3>
                                <h6 class="d-inline"><a class="header"><b>{{ $po["user"]["name"] }}</b></a></h6>
                                <div class="description">
                                    <div class="ui horizontal list">
                                        @foreach ($po["tags"] as $tag)
                                            <div class="item" data-value="af">
                                                <div class="ui horizontal label">
                                                    <i class="{{ $tag["Icon"] }} colored"></i><h5 style="display:inline-block;margin-left:5px;margin-top:0px;">{{ $tag["name"] }}</h5>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="row right floated" style="margin-top:5px;">
                                        <div class="ui blue tiny right floated horizontal labeled icon buttons">
                                            <button class="ui button">
                                                <i class="poll icon"></i>
                                                {{ $po["like"] }}
                                            </button>
                                            <button class="ui button">
                                                <i class="comment alternate icon"></i>
                                                {{ $po["comment"] }}
                                            </button>
                                            <button class="ui button">
                                                <i class="calendar icon"></i>
                                                {{str_replace('00:00:00', '', $po["created_at"]) }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                                <input type="type" placeholder="enter username ...." name="reusername"
                                @if($errors->has("reusername"))
                                    class="redborder"
                                    data-content="{{$errors->first('reusername')}}"
                                @endif
                                >
                                <div class="ui
                                {{ $errors->has("reusername")?'red':'' }}
                                 left corner label">
                                    <i class="user icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <!-- <i class="envelope icon"></i> -->
                            <div class="ui left corner labeled fluid input">
                                <input type="type" placeholder="enter email ...." name="email"
                                @if($errors->has("email"))
                                    class="redborder"
                                    data-content="{{$errors->first('email')}}"
                                @endif
                                >
                                <div class="ui
                                {{ $errors->has("email")?'red':'' }}
                                 left corner label">
                                    <i class="envelope icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left corner labeled fluid input">
                                <input type="password" placeholder="enter password...." name="password"
                                @if($errors->has("password"))
                                class="redborder"
                                data-content="{{$errors->first('password')}}"
                                  @endif
                                >
                                <div class="ui
                                {{ $errors->has("password")?'red':'' }}
                                 left corner label">
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

                            @if($errors->has("username"))
                            class="redborder"
                            data-content="{{$errors->first('username')}}"
                            @endif
                            >
                            <div class="ui
                            {{ $errors->has("username")?'red':'' }}
                            left corner label">
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

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
