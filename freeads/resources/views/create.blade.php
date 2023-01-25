@extends('layouts.app')

@section('content')
    <div class="container">    
        <h1>Déposer une annonce</h1>
        <hr>
        
        <form method="POST" action="{{ route('ad.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Titre</label>
                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title" >
                @if ($errors->has('title'))
                    <span class="invalid-feedback">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" rows="3"></textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image" name="image">
                @if ($errors->has('image'))
                    <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="localisation">Localisation</label>
                <input type="text" class="form-control {{ $errors->has('localisation') ? 'is-invalid' : '' }}" id="localisation" name="localisation">
                @if ($errors->has('localisation'))
                    <span class="invalid-feedback">{{ $errors->first('localisation') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="price">Prix</label>
                <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price">
                @if ($errors->has('price'))
                    <span class="invalid-feedback">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Soummettre notre annonce</button>
        </form>
    </div>

@endsection