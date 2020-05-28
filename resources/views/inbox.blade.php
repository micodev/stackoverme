@extends('layout.layout')
@section('content')
<div class="ui relaxed centered grid">

    <div style="margin-top:20px !important;" class="three column row @auth {{ 'centered' }} @endauth ">

        <div class="column centered seven wide ">
            <h3>Issues Result</h3><br>
            <div class="ui divider"></div>
            @if ($posts==null)
                <div class="content">
                    no issue found.
                </div>
            @endif
            @foreach ($posts as $post)
                <div class="row " style="margin-bottom:50px !important;">
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="content">
                                <h3 class="header"><a href="{{ route('problem',['id'=>$post->id]) }}">{{ $post->title }}</a></h3>

                                <br>
                                <div class="description">
                                    <div class="ui horizontal list">
                                        @foreach ($post->Tags->all() as $tag)
                                            <div class="item" data-value="af">
                                                <div class="ui horizontal label">
                                                    <i class="{{ $tag->Icon }} colored"></i><h5 style="display:inline-block;margin-left:5px;margin-top:0px;">{{ $tag->name }}</h5>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="row right floated" style="margin-top:5px;">
                                        <div class="ui blue tiny right floated horizontal labeled icon buttons">
                                            <button class="ui button">
                                                <i class="poll icon"></i>
                                                {{ count($post->plike->all()) }}
                                            </button>
                                            <button class="ui button">
                                                <i class="comment alternate icon"></i>
                                                {{ count($post->Comments->all()) }}
                                            </button>
                                            <button class="ui button">
                                                <i class="calendar icon"></i>
                                                {{ (new Carbon\Carbon($post->created_at))->format('Y-m-d') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui divider"></div>
            @endforeach
                @isset($paginator)
                    @if ($paginator->lastPage() > 1)
                    <div class="ui pagination menu">
                        <a href="{{ $paginator->url(1) }}" class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} item">
                            Previous
                        </a>
                        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                            <a href="{{ $paginator->url($i) }}" class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }} item">
                                {{ $i }}
                            </a>
                        @endfor
                        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} item">
                            Next
                        </a>
                    </div>

                    @endif
                @endisset
            {{-- <div class="row">

                <div class="ui relaxed divided list">

                    <div class="item">
                        <div class="content">
                            <h5 class="header">Question title</h5>
                            <h3 class="header d-inline">by</h3>
                            <h6 class="d-inline"><a class="header"><b>Bob s Burgers</b></a></h6>
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
                                            {{ Carbon\Carbon::now()->format("Y-m-d") }}
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
                            <h6 class="d-inline"><a class="header"><b>Bob s Burgers</b></a></h6>
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

            </div> --}}

        </div>

    </div>
</div>
@endsection
