@extends ('layouts.master')

@section ('content')

  <div class="col-sm-8 blog-main">

    <h1>Rekisteröidy</h1>

    <form method="POST" action="/register">

      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Nimi:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="title">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="title">Salasana:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="title">Salasana (uudelleen):</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
      </div>

      <div class="form-group">
      <button type="submit" class="btn btn-primary">Rekisteröidy</button>
      </div>

      <div class="form-group">
       @include('layouts.errors')
      </div>




    </form>

  </div>



@endsection
