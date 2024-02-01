@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ajouter un film</h1> 
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card card-body">
                <form action="{{ route('film.store') }}" method="post">
                    @csrf 
                    @method('POST')
                    <div class="col-md-12">
                        @include('films.fields')
                    </div>
                    <div class="p-3">
                        <a href="/" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection