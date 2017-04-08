@extends('layouts.master')

@section('content')

  <div class="col-sm-8 blog-main">

    <h1>Kirjoita vertaissuositus</h1>

    <hr />

    <form method="POST" action="/posts">

      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Otsikko:</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>

      <div class="form-group">
        <label for="body">Arvio:</label>
        <textarea id="body" name="body" class="form-control" rows="8" required></textarea>
      </div>

      <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Lisää arvio</button>
      </div>
    </form>


    @include ('layouts.errors')


  </div>

@endsection
