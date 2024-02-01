@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}.
        </div>
        @endif
       
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Films</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="{{ route('film.create') }}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-md-flex justify-content-end">
                        <div class="input-group input-group-sm col-md-3 d-flex  justify-content-end">
                            <input id="searchFilms" type="text" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        </div>                        
                    </div>
                    <div class="card-body table-responsive p-0 table-data">
                        @include('films.table')
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection