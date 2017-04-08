@extends ('layouts.master')

@section ('content')

        <div class="col-sm-8 blog-main">

          @foreach ($posts as $post)

            @include('posts.post')

          @endforeach

          <hr />

          <nav class="blog-pagination">
            @if ($posts->hasMorePages())
              <a class="btn btn-outline-primary" href="{{ $posts->nextPageUrl() }}">Older</a>
            @else
              <a class="btn btn-outline-secondary disabled" href="{{ $posts->nextPageUrl() }}">Older</a>
            @endif

            @if ($posts->lastItem() > 10)
              <a class="btn btn-outline-primary" href="{{ $posts->previousPageUrl() }}">Newer</a>
            @else
              <a class="btn btn-outline-secondary disabled" href="{{ $posts->previousPageUrl() }}">Newer</a>
            @endif

            <hr />

            {{ $posts->links() }}

          </nav>


        </div><!-- /.blog-main -->



@endsection
