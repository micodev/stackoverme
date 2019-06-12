@extends('layout.layout')
@section('content')

<div class="ui grid container grey form fluid">
    <div class="ui row fluid">
        <div class="column two wide"></div>
        <div class="column ui seven wide">
            <div class="ui divider horizontal clearing"></div>
            <div class="ui fluid relaxed list bio ">
                <div class="item fluid">
                    <div class="ui fluid buttons blue-gradiant ">
                        <div class="ui labeled icon button button-noclck right" aria-label="label">
                            <i class="user icon"></i>
                            MicoGet
                        </div>
                        <button class="ui button " style="max-width:40px !important;text-align:center;"> <i class="edit icon"></i></button>
                    </div>
                </div>
                <div class="item fluid">
                    <div class="ui fluid buttons blue-gradiant">
                        <div class="ui labeled icon button button-noclck right" aria-label="label">
                            <i class="envelope outline icon"></i>
                            Micodeb@gmail.com
                        </div>
                        <button class="ui button" style="max-width:40px !important"> <i class="edit icon"></i></button>
                    </div>
                </div>
                <div class="item fluid">

                    <div class="ui fluid buttons blue-gradiant">
                        <div class="ui labeled icon button button-noclck right" aria-label="label">
                            <i class="crown icon"></i>
                            micodev
                        </div>
                        <button class="ui button" style="max-width:40px !important"> <i class="edit icon"></i></button>
                    </div>

                </div>
            </div>
        </div>
        <div class="column ui three wide">
            <div class="blurring dimmable image">
                <div class="ui dimmer " style=" border-radius: 50%;">
                    <div class="content">
                        <div class="center">
                            <div class="ui inverted button">Add Friend</div>
                        </div>
                    </div>
                </div>
                <img class="ui medium circular image" src="https://fomantic-ui.com/images/avatar2/large/molly.png">
            </div>

        </div>
    </div>
    <div class="ui row fluid">
        <div class="ui container">
            <h3 class="ui clearing fitted horizontal divider header">
                <i class="chart bar icon"></i>
                statistics
            </h3>
        </div>
    </div>
    <div class="ui row fluid">
        <div class="ui buttons stats blue-gradiant fluid icon">
            <button class="ui button"><i class="thumbs up icon"></i> 9 </button>
            <button class="ui button"><i class="chat icon"></i> 6 </button>
            <button class="ui button"><i class="info icon"></i> 7 </button>
        </div>
    </div>
    <div class="ui row fluid">
        <div class="ui three wide column">
            <button class="ui red fluid icon button field">
                <i class="delete icon"></i>
                Delete Account
            </button>
            <button class="ui blue fluid icon button field">
                <i class="edit icon"></i>
                Edit Account
            </button>
            <button class="ui amber fluid icon button field">
                <i class="exclamation triangle icon"></i>
                Send Feedback
            </button>
        </div>
        <div class="ui column thirteen wide">
            <div class="ui horizontal centered cards">
                <div class="card">
                    <div class="content">
                        <div class="header">Votes this month</div>
                        <div class="meta">powered by Mico</div>
                        <div class="description">
                            <canvas id="voteChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="header">Elliot Fu</div>
                        <div class="meta">Friend</div>
                        <div class="description">
                            <canvas id="likeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>



@endsection
