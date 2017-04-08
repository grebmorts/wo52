@extends ('layouts.master')

@section ('content')

  <div class="col-sm-8 blog-main">

    <h1>Kirjaudu sisään</h1>

    <form method="POST" action="/login">

      {{ csrf_field() }}


      <div class="form-group">
        <label for="title">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="title">Salasana:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <div class="form-group">
      <button type="submit" class="btn btn-primary">Login</button>
      </div>

      <div class="form-group">
       @include('layouts.errors')
      </div>

    </form>

    <hr />

    <p><a href="/register">Rekisteröidy tästä</a>, jos sinulla ei vielä ole tiliä.

    </p>


  </div>



@endsection
