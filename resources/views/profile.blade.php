@extends('layout.layout') @section('content')

<div class="ui column grid container form fluid" style="transform:translate(0,48%)">
    <div class="ui row centered fluid">
        <div class="ui column">
            <h3 class="ui clearing fitted horizontal divider header">
                <i class="chess pawn icon"></i>
                Profile page
            </h3>
        </div>
    </div>
    <div class="ui row centered fluid">

        <div class="column ui seven wide">
            <div class="ui divider horizontal clearing"></div>
            <div class="ui fluid relaxed list bio ">
                <div class="item fluid">
                    <div class="ui fluid buttons blue-gradiant ">
                        <div class="ui labeled icon button button-noclck right " aria-label="label">
                            <i class="user icon"></i>
                            <div class="profname"> {{  auth()->user()->name }}</div>
                        </div>
                    </div>
                </div>
                <div class="item fluid">
                    <div class="ui fluid buttons blue-gradiant">
                        <div class="ui labeled icon button button-noclck right" aria-label="label">
                            <i class="envelope outline icon"></i>
                            <div class="profemail">{{  auth()->user()->email }}</div>
                        </div>
                    </div>
                </div>
                <div class="item fluid">
                    <div class="ui fluid buttons blue-gradiant">
                        <div class="ui labeled icon button button-noclck right" aria-label="label">
                            <i class="crown icon"></i>
                            <div class="profusername">{{auth()->user()->username }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="ui row fluid">
        <div class="ui container">
            <h3 class="ui divider"></h3>
        </div>
    </div>

    <div class="ui row centered fluid">
        <button class="ui three wide column red fluid icon button field center aligned" disabled style="margin-right:10px">
            <i class="delete icon"></i>
            Delete Account
        </button>
        <button class="ui two wide column blue fluid icon button field center aligned editProfileButton" style="margin-right:10px;">
            <i class="edit icon"></i>
            Edit Account
        </button>
        <button class="ui two wide column amber fluid icon button field center aligned" disabled style="margin-right:10px;">
            <i class="exclamation triangle icon"></i>
            Send Feedback
        </button>
    </div>
</div>

<div class="ui editProfileModal form modal">
    {{ csrf_field() }}
    <div class="ui dividing header">
        Edit profile Information
    </div>
    <div class=" fields" style="padding-left: 10px;">
        <div class="eleven wide field" style="padding: 10px 0px 0px 10px;" >
            <label>name</label>
            <input name="name" class="editname" type="text" placeholder="enter first name">
        </div>
        <div class="four wide field" style="padding: 10px 10px 0px 10px;">
            <label>username</label>
            <input name="username" class="editusername" type="text" placeholder="enter username">
        </div>
    </div>

    <div class="fifteen wide field" style="padding: 10px 10px 0px 10px;">
        <label>email</label>
        <input name="email" class="editemail" type="text" placeholder="enter email">
    </div>
    {{--  ui red basic label --}}
    <div class="edit_errors" style="padding: 10px 10px 10px 10px;">

    </div>
    <div class="actions">
        <div class="ui red cancelModalProfile button">
            cancel <i class="close icon"></i>
        </div>
        <div class="ui green okModalProfile button">OK</div>
    </div>
</div>

@endsection
