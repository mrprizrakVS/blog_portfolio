<form method="POST" action="{{$categorie != null ? route('categories.update', $categorie->id) : route('categories.store')}}">
    {!! csrf_field() !!}
    {{$categorie != null ? method_field('PATCH') : null}}
    <div class="mb-3">
        <label for="name">Name </label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
               value="{{$categorie != null ? $categorie->name : old('name')}}" required>

    </div>

    <div class="mb-3">
        <label for="content">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Description"
               value="{{$categorie != null ? $categorie->description : old('description')}}">
    </div>
    <button class="btn btn-primary">{{$categorie != null ? 'Update' : 'Create'}}</button>
</form>



