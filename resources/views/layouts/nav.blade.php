<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active" href={{ url('/') }}><b>Arviot</b></a>
      <a class="nav-link" href={{ url('/posts/create') }}>Kirjoita uusi</a>

      @if (Auth::check() && Auth::user()->roles->pluck('name')->contains('admin'))
          <a class="nav-link" href={{ url('/users') }}>Käyttäjien hallinta</a>
      @endif


      @if (! Auth::check())
      <a class="nav-link ml-auto" href={{ url('/login') }}>Kirjaudu sisään</a>
      @endif

      @if (Auth::check())
      <a class="nav-link ml-auto" href={{ url('/logout') }}>{{ Auth::user()->name }} - kirjaudu ulos</a>
      @endif

    </nav>
  </div>
</div>

<div class="blog-header">
  <div class="container">
    <h1 class="blog-title">Vertaissuositukset</h1>
    <p class="lead blog-description">Suosittele ja kommentoi suosituksia!
    Vertaissuositukset - tärppejä kaikesta populaarikulttuurista</p>
  </div>
</div>
