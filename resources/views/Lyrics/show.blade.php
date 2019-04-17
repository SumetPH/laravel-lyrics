@extends('layout') 
@section('content')
<div class="container">
    <h2 class="text-center mt-5">
        <a class="text-dark" href="/lyrics">{{$lyrics->title}}</a>
    </h2>
    <div class="row">
        <div class="col-lg-12">
            @if (session('error'))
            <div class="alert alert-warning mt-4">{{$error}}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$lyrics->youtube}}" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="lyrics">
                            {!! $lyrics->lyrics !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row justify-content-center">
                <div class="col-lg-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="/word" method="post">
                                @csrf
                                <input type="hidden" name="lyrics_id" value="{{$lyrics->id}}">
                                <div class="form-group">
                                    <label>Word</label>
                                    <input class="form-control" type="text" name="word" required>
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <input class="form-control" type="text" name="type" required>
                                </div>
                                <div class="form-group">
                                    <label>Translate</label>
                                    <input class="form-control" type="text" name="translate" rerequired>
                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($words as $word)
                <div class="col-lg-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-2">
                                <span>{{$word->word}}</span>
                                <span>{{$word->type}}</span>
                            </h5>
                            <span>{{$word->translate}}</span>
                            <br>
                            <a href="/word/{{$word->id}}/edit">Edit</a>
                            <span>|</span>
                            <form style="display: inline" id="{{$word->id}}" action="/word/{{$word->id}}" method="post">
                                @csrf @method('delete')
                                <a href="javascript: submitDelete({{$word->id}});">Delete</a>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection