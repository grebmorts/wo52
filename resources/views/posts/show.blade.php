@extends ('layouts.master')

@section ('content')
  <div class="col-sm-8 blog-main">
    <div class="card-block">

    @if (Auth::check() && (Auth::user()->id == $post->user_id || Auth::user()->roles->pluck('name')->contains('moderator')
      || Auth::user()->roles->pluck('name')->contains('admin')))

        <div class="btn-group" role="group" aria-label="Basic example">

        <form method="POST" action="/posts/{{ $post->id }}/delete">

            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $post->id }}">


            <button type="submit" class="btn btn-outline-danger btn-sm">Poista julkaisu</button>
          </form>

          <form method="GET" action="/posts/{{ $post->id }}/edit">

            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $post->id }}">

            <button type="submit" class="btn btn-outline-warning btn-sm">Muokkaa julkaisua</button>

          </form>

          </div>

    @endif

    </div>

    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">
      @if (count($post->user))
        {{ $post->user->name }} |
      @else
        (<i>Käyttäjä poistettu</i>) |
      @endif
      {{ $post->created_at->toFormattedDateString() }}

    </p>
      {{ $post->body }}
    <p>

    @if (count($post->tags))
      @foreach ($post->tags as $tag)
        {{ $tag->name }}
      @endforeach
    @endif

    <div class="comments">

      <ul class="list-group">

      @foreach ($post->comments as $comment)

        <li class="list-group-item">

          <strong>
            @if (count($comment->user))
              {{ $comment->user->name }} |
            @else
              (<i>Käyttäjä poistettu</i>) |
            @endif

            {{ $comment->created_at->diffForHumans() }}: &nbsp;
          </strong>

          {{ $comment->body }}

        </li>

      @endforeach

    </ul>


  </div> {{-- !Comments --}}


    @if (Auth::check())

      <div class="card">

        <div class="card-block">

          <form method="POST" action="/posts/{{ $post->id }}/comments">

            {{ csrf_field() }}

            <div class="form-group">
              <textarea name="body"
              placeholder="Lisää kommenttisi tähän!" class="form-control" required></textarea>

            </div>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="from-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Kommentoi</button>
            </div>

          </form>

        @endif

          @include('layouts.errors')

        </div>

      </div>

  </div>



@endsection
