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
                        <div class="d-md-flex justify-content-between">
                            <div class="input-group  input-group-sm col-md-3">
                                <select name="" id="selectSearch" class="form-control">
                                    <option value=""selected>Choisir le categorie</option>
                                    @foreach($categorie as $item)
                                    <option value="{{$item->genre}}">{{$item->genre}}</option>
                                    @endforeach
                                </select>
                            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    function fetch_data(page, search) {
    
    $.ajax({
        url: "/?page=" + page + "&query=" + search.trim(),
        success: function(data) {
           
            var newData = $(data);
            
            $('#films-table').html(newData.find('#films-table').html());
            $('.card-footer').html(newData.find('.card-footer').html());
            var paginationHtml = newData.find('.pagination').html();
            if (paginationHtml) {
                $('.pagination').html(paginationHtml);
            } else {
                $('.pagination').html('');
            }
        }
    });
}


    $('body').on('click', '.pagination a', function(param) {
        param.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var search = $('#searchFilms').val();
        fetch_data(page, search);
    });

    $('body').on('keyup', '#searchFilms', function() {
        var search = $('#searchFilms').val();
        var page = 1;
        fetch_data(page, search);
    });

    $('body').on('change', '#selectSearch', function() {
        var search = $('#selectSearch').val();
        var page = 1;
        fetch_data(page, search);
    });



    fetch_data(1, '');
});
</script>

@endsection