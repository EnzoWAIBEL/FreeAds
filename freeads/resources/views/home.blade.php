@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p class="card-welc">{{ __('Vous êtes Connecté !') }}</p>
                </div>
                <h1 class="card-welc">Bienvenue {{ Auth::user()->name }} !</h1>
                    <div class="container">
                        <table class="table mb-0 bg-white">
                            <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        <tbody>
                            <tr>
                                <td>
                                    <p class="fw-bold mb-1">{{ Auth::user()->name }}</p>
                                </td>
                            <td>
                                <p class="fw-normal mb-1">{{ Auth::user()->email }}</p>
                            </td>
                            <td>
                                <a href="#">
                                    <span class="material-symbols-outlined" style="color: rgb(0, 81, 255)">edit</span>
                                </a>
                                <a href="#">
                                    <span class="material-symbols-outlined" style="color: rgb(230, 10, 10);">delete</span>
                                </a>
                            </td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <style>.uper {margin-top: 40px;}</style>
            
            <div class="uper">
                
                <div class="container">
                <table class="table table-striped">
            
                    <thead>
                        <tr>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Price</td>
                        <td>Localisation</td>
                        </tr>
                    </thead>
            
                    <tbody>
                        @foreach($ads as $ad)
                        <tr>
                            <td>{{$ad->title}}</td>
                            <td>{{$ad->description}}</td>
                            <td>{{$ad->price}}$</td>
                            <td>{{$ad->localisation}}</td>
                            <td><a href="{{ route('ad.edit', $ad->id)}}" style="background: none;border: none;"><span class="material-symbols-outlined" style="color: rgb(0, 81, 255)">edit</span></a></td>
                            <td>
                                <form action="{{ route('ad.destroy', $ad->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none;border: none;"><span class="material-symbols-outlined" style="color: rgb(230, 10, 10);">delete</span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                {{ $ads->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
