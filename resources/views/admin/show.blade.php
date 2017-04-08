@extends ('layouts.master')

@section ('content')
  <div class="col-sm-8 blog-main">

    <h1>{{ $user->name }}</h1>

    @if (Auth::user()->roles->pluck('name')->contains('admin'))
        <div class="btn-group" role="group" aria-label="Basic example">

          @if (!$user->roles->pluck('name')->contains('admin'))
          <form method="POST" action="/users/{{ $user->id }}/delete">

              {{ csrf_field() }}

              <input type="hidden" name="id" value="{{ $user->id }}">


              <button type="submit" class="btn btn-outline-danger btn-sm">Poista käyttäjä</button>

            </form>
          @endif


            @if (!($user->roles->pluck('name')->contains('moderator')||$user->roles->pluck('name')->contains('admin')))

              <form method="POST" action="/users/{{ $user->id }}/moderate">

                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $user->id }}">

                <button type="submit" class="btn btn-outline-success btn-sm">Anna ylläpito-oikeudet</button>
              </form>
            @endif

            @if ($user->roles->pluck('name')->contains('moderator'))

              <form method="POST" action="/users/{{ $user->id }}/demoderate">

                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $user->id }}">

                <button type="submit" class="btn btn-outline-warning btn-sm">Poista ylläpito-oikeudet</button>
              </form>
            @endif

          </div>
          <hr />
    @endif
    <p class="blog-post-meta">Julkaisut:</p>


    @if (count($user->posts))
      @foreach ($user->posts as $post)
      <a href="/posts/{{ $post->id }}">
        {{ $post->title }}
      </a>
        <hr />
      @endforeach
    @endif


    @if (count($user->comments))
      <p class="blog-post-meta">Kommentit:</p>
      @foreach ($user->comments as $comment)
        <a href="/posts/{{ $comment->post_id }}">
        <i>{{ $comment->post_id }}</i></a> |
        {{ $comment->body }}
        <hr />
      @endforeach
    @endif


   </div>





@endsection
