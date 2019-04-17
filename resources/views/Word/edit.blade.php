@extends('layout') 
@section('content')
<div class="container">
    <h2 class="text-center mt-5">Word Edit.</h2>
    <div class="row">
        <div class="col-lg-12">
            @if (session('error'))
            <div class="alert alert-warning mt-4">{{$error}}</div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <form action="/word/{{$word->id}}" method="post">
                        @csrf @method('put')
                        <div class="form-group">
                            <label>Word</label>
                            <input class="form-control" type="text" name="word" value="{{$word->word}}" required>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input class="form-control" type="text" name="type" value="{{$word->type}}" required>
                        </div>
                        <div class="form-group">
                            <label>Translate</label>
                            <input class="form-control" type="text" name="translate" value="{{$word->translate}}" rerequired>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection