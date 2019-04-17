@extends('layout') 
@section('content')
<div class="container">
    <h2 class="text-center mt-5 mb-3">
        <a href="/lyrics/create">All Lyrics.</a>
    </h2>
    <div class="row justify-content-center">
        @foreach ($lyrics as $item)
        <div class="col-lg-8 m-3 p-3 bg-success text-white" style="border-radius: 8px">
            <h4>
                <a class="text-white" href="/lyrics/{{$item->id}}">{{$item->title}}</a>
            </h4>
            <a class="text-white" href="/lyrics/{{$item->id}}/edit">Edit</a>
            <span>|</span>
            <form style="display: inline" id="{{$item->id}}" action="/lyrics/{{$item->id}}" method="post">
                @csrf @method('delete')
                <a class="text-light" href="javascript: submitDelete({{$item->id}});">Delete</a>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection