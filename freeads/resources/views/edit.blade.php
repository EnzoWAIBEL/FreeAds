@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
  </style>

<div class="container">
<div class="card uper">
  <div class="card-header">
    Modifier l'annonces
  </div>

  <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
        <form method="post" action="{{ route('ad.update', $ad->id ) }}" enctype="multipart/form-data">
            <div class="form-group mb-4">
                @csrf
                @method('PATCH')
                <label for="title">Title :</label>
                <input type="text" class="form-control" name="title" value="{{ $ad->title }}"/>
            </div>
            <div class="form-group mb-4">
                <label for="description">Description :</label>
                <input type="text" class="form-control" name="description" value="{{ $ad->description }}"/>
            </div>

            <div class="form-group mb-4">
                <label for="price">Prix :</label>
                <input type="text" class="form-control" name="price" value="{{ $ad->price }}"/>
            </div>

            <div class="form-group mb-4">
                <label for="localisation">Localisation :</label>
                <input type="text" class="form-control" name="localisation" value="{{ $ad->localisation }}"/>
            </div>
            <div class="form-group mb-4">
                <label for="image">Image :</label>
                <input type="file" class="form-control" name="image"/>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
  </div>
</div>
@endsection