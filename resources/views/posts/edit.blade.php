@extends('layouts.master')

@section('content')

  <div class="col-sm-8 blog-main">

    <h1>Muokkaa julkaisua</h1>

    <hr />

    <form method="POST" action="/posts/{post}/edit">

      <input type="hidden" name="id" value="{{ $post->id }}">

      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Otsikko:</label>
        <input type="text" class="form-control" id="title" name="title"
         value="{{ $post->title }}" required>
      </div>

      <div class="form-group">
        <label for="body">Arvostelu:</label>
        <textarea id="body" name="body" class="form-control"
        rows="8" required> {{ $post->body }} </textarea>
      </div>

      <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Tallenna muutokset</button>
      </div>
    </form>


    @include ('layouts.errors')


  </div>

@endsection
