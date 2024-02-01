
<div class="form-group col-sm-12">
    <label for="titre">Titre</label>
    <input type="text" name="titre" value="{{ isset($Films) ? $Films->titre : null }}" class="form-control">
</div>

<div class="form-group col-sm-12">
    <label for="titre">Description</label>
    <input type="text" name="description" value="{{ isset($Films) ? $Films->description : null }}" class="form-control">
</div>

<div class="form-group col-sm-12">
    <label for="titre">Categorie</label>
    <select name="categorie_id" id="" class="form-control">
        <option value="{{ $Films->categorie_id }}" >{{ $Films->genre }}</option>
        @foreach($categorie as $item)
         <option value="{{ $item->id }}">{{ $item->genre }}</option>
        @endforeach
    </select>
</div>

