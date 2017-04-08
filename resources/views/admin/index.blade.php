@extends ('layouts.master')

@section ('content')



        <div class="col-sm-8 blog-main">
          <h2 class="blog-post-title">Käyttäjät: </h2>
          <hr />

          @foreach ($users as $user)

            @include('admin.users')
            <hr />

          @endforeach




          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

        </div><!-- /.blog-main -->





@endsection
