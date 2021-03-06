<div class="blog-post">
  <h2 class="blog-post-title">
    <a href={{ url('/posts/'.$post->id) }}>
      {{ $post->title }}</h2>
    </a>

  <p class="blog-post-meta">
    @if (count($post->tags))
      @foreach ($post->tags as $tag)
      <a href={{ url('/posts/tags/'.$tag) }}>
        {{ $tag->name }} |
      </a>
      @endforeach
    @endif


    @if (count($post->user))
      @if (Auth::check() && Auth::user()->roles->pluck('name')->contains('admin'))
          <a href={{ url('/users/'.$post->user->id) }}>[Näytä profiili]</a>
      @endif
      {{ $post->user->name }} |
    @else
      (<i>Käyttäjä poistettu</i>) |
    @endif

    {{ $post->created_at->toFormattedDateString() }}

  </p>

    {{ $post->body }}


</div><!-- /.blog-post -->
