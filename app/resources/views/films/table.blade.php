<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>

                <th>Titre</th>
                <th>Description</th>
                <th>Reference</th>
                <th>Categorie</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody id="films-table">
            @foreach($Films as $Film)
            <tr>

               
                    <td>{{ $Film->titre }}</td>
                    <td>{{ $Film->description }}</td>
                    <td>{{ $Film->reference }}</td>
                    <td>{{ $Film->genre }}</td>
                   
                    <td  style="width: 120px">
                       
                        <div class='btn-group'>
                           <form action="{{ route('film.delete', ['id' => $Film->id]) }}" method="post">
                             @csrf 
                             @method('DELETE')
                             <button type="submit" class="btn btn-danger">Delete</button>
                           </form>
                            <a href="{{ route('film.edit', [$Film->id]) }}"
                               class='btn btn-default btn-sm'>
                                <i class="far fa-edit"></i>
                            </a>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            {{$Films->links()}}
        </div>
    </div>
</div>
