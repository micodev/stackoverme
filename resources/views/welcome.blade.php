@extends('layout.layout')
@section('content')
<div class="container">
    <div class="ui four column centered grid">
        <div class="row">
            <div class="ten wide column">
                <div class="ui left fluid icon input">
                    <input type="text" placeholder="enter issue title ...">
                    <i class="tasks icon"></i>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="ten wide column">
                <div class="ui form">
                    <div class="ui left corner labeled fluid input">

                            <div id="summernote" ></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ten wide column">
                <div class="ui fluid multiple search selection dropdown">
                    <input type="hidden" name="country">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select tags <i class="tags icon"></i></div>
                    <div class="menu">
                        <div class="item" data-value="af"><i class="devicon-csharp-plain-wordmark colored"></i> Csharp
                        </div>
                        <div class="item" data-value="ax"><i class="devicon-javascript-plain colored"></i> JavaScript
                        </div>
                        <div class="item" data-value="al"><i class="devicon-nodejs-plain colored"></i> NodeJs</div>
                        <div class="item" data-value="dz"><i class="devicon-python-plain colored"></i> Python</div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ten wide column">

                <label for="embedpollfileinput" class="ui tiny red left floated button">
                    <i class="ui upload icon"></i>
                    Upload image
                </label>
                <input type="file" class="inputfile" id="embedpollfileinput" accept="image/x-png,image/gif,image/jpeg"
                    multiple>
                    <div class="ten wide column">
                        <button class="ui primary right floated button"><i class="save icon"></i> Save</button>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="ten wide column">
                <div class="ui horizontal list">

                    <div class="item">
                        <a class="ui teal image medium label">
                            <img src="https://fomantic-ui.com/images/avatar/small/joe.jpg">
                            image_1
                        </a>
                    </div>
                    <div class="item">
                        <a class="ui teal image medium label">
                            <img src="https://fomantic-ui.com/images/avatar/small/joe.jpg">
                            <div class="ui teal double loading button" style="padding:0 !important">upload</div>

                        </a>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="ten wide column">
                <div class="ui raised segment">
                    <a class="ui red ribbon label">Similar Question</a>
                    <div class="ui divider horizontal fitter"></div>
                    <!-- <p>No result found</p><br> -->
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
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



</div>

@endsection
