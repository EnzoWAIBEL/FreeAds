@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des annonces</h1>
        <hr>

        <div class="row justify-content-center">
            <div class="col-md-9">
                <form method="POST" action="{{ route('ad.search') }}" onsubmit="search(event)" id="searchForm">
                    @csrf
                    <div class="input-group mb-4">
                            <input type="text" class="form-control" id="words" placeholder="Recherche">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </form>
                <div id="results">
                    @foreach ($ads as $ad)
                    <div class="card mb-4" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('storage/app/public/'.$ad->image) }}" alt="">
                        <div class="card-body">
                            <h3 class="card-title">{{ $ad->title }}</h3>
                            <small>{{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }} de : {{ optional($ad->user_id)->users('name') }}</small>
                            <p class="card-text text-info">{{ $ad->localisation }}</p>
                            <p class="card-text">{{ $ad->description }}</p>
                            <h5 class="card-text">Prix : {{ $ad->price }} $</h5>
                            <a href="#" class="btn btn-primary">Voir l'annonce</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div style="font-size: 18px">
                    {{ $ads->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        function search(event)
        {
            event.preventDefault();
            const words = document.querySelector('#words').value;
            const url = document.querySelector('#searchForm').getAttribute('action');
            axios.post(`${url}`, {
                words: words,
            })
            .then(function (response) {
                const ads = response.data.ads;
                let results = document.querySelector('#results');
                results.innerHTML = '';
                for(let i = 0; i < ads.length; i++)
                {
                    let card = document.createElement('div');
                    let cardBody = document.createElement('div');
                    cardBody.classList.add('card-body');
                    card.classList.add('card', 'mb-3');
                    let image = document.createElement('img');
                    image.classList.add('card-img-top');
                    image.src = ads[i].image;
                    let title = document.createElement('h5');
                    title.classList.add('card-title');
                    title.innerHTML = ads[i].title;
                    let date = document.createElement('small');
                    date.classList.add('text-muted');
                    date.innerHTML = ads[i].created_at;
                    let description = document.createElement('p');
                    description.classList.add('card-text');
                    description.innerHTML = ads[i].description;
                    let localisation = document.createElement('p');
                    localisation.classList.add('card-text');
                    localisation.innerHTML = ads[i].localisation;
                    let button = document.createElement('a');
                    button.classList.add('btn', 'btn-primary');
                    button.innerHTML = 'Voir l\'annonce';
                    cardBody.appendChild(title);
                    cardBody.appendChild(date);
                    cardBody.appendChild(description);
                    cardBody.appendChild(localisation);
                    cardBody.appendChild(button);
                    card.appendChild(image);
                    card.appendChild(cardBody);
                    results.appendChild(card);
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    </script>
@endsection