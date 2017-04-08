<div class="col-sm-3 offset-sm-1 blog-sidebar ml-auto">

  <div class="sidebar-module sidebar-module-inset">
    <h4>Mistä on kyse?</h4>
    <p><b>Mietityyttääkö, että kannattaako tuhlata aikaa TV-sarjaan, elokuvaan tai kirjaan?</b></p>

    <p><em>IMDB:n tai muiden palveluiden määlyt ovat kujalla AF - on turha vetää
      johtopäätöksiä niiden arvostelujen perusteella.</em></p>
    <p><b><em> Luota siis meihin, ystäviisi!
    </em></b></p>

  </div>

  <div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">

      @foreach ($archives as $stats)
        <li>

          <a href="/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
            {{ $stats['month'] . ' ' . $stats['year'] }}
          </a>

        </li>

      @endforeach


    </ol>
  </div>

  @if ($tags->count())

  <div class="sidebar-module">
    <h4>Kategoriat</h4>
    <ol class="list-unstyled">

      @foreach ($tags as $tag)
        <li>

          <a href="/posts/tags/{{ $tag }}">
            {{ $tag }}
          </a>

        </li>

      @endforeach

    @endif


    </ol>
  </div>
