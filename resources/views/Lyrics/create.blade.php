@extends('layout') 
@section('content')
<div class="container">
  <h2 class="text-center mt-5">Lyrics Create.</h2>
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
          <form id="form" action="/lyrics" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Title</label>
              <input class="form-control" type="text" name="title" required>
            </div>
            <div class="form-group">
              <label>Youtube ID</label>
              <input class="form-control" type="text" name="youtube" required>
            </div>
            <div class="form-group">
              <textarea name="lyrics" id="lyrics" style="display: none"></textarea>
            </div>
            <div class="form-group">
              <label>lyrics</label>
              <div id="editor"></div>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote'],

        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript


        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'align': [] }],

        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

        ['clean']                                         // remove formatting button
    ];

    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });
    
    $(document).ready(function () {
      $('#form').submit(function (e) { 
        let lyrics = $('.ql-editor').html()
        $('#lyrics').val(lyrics)
      });
    });

</script>
@endsection