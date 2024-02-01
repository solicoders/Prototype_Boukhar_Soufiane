@extends('layouts.app')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible p-4">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session('success') }}.
</div>
@endif

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editer film</h1> 
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card card-body">
                <form action="{{ route('film.update', ['id' => $Films->id]) }}" method="post">
                    @csrf 
                    @method('post')
                    <div class="col-md-12">
                        @include('films.fields')
                    </div>
                    <div class="p-3">
                        <a href="/" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Editer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection