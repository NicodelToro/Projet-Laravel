<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- Navbar content -->

  <a class="navbar-brand" href="#">BOUTIQUE LA MAISON</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('accueil')}}">ACCUEIL<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('solde')}}">SOLDES</a>
      </li>
 @if(isset($categories))
  @forelse($categories as $id => $title)
  <a class="nav-link" href="{{url('category', $id)}}">{{$title}}</a>
  @empty
  <li>Aucune catégorie pour l'instant</li>
  @endforelse
  @endif
      </li>
    </ul>
  </div>
</nav>