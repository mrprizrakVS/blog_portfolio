<form method="POST" action="{{$article != null ? route('article.update', $article->id) : route('article.store')}}">
    {!! csrf_field() !!}
    {{$article != null ? method_field('PATCH') : null}}
    <div class="mb-3">
        <label for="name">Categories </label>
        <select name="categories[]" class="custom-select" multiple>
            @foreach($categories as $category)
            <option value="{{$category->id}}" {{$article != null ? (in_array($category->id, $array) ? 'selected' : null) : null}}>{{$category->name}}</option>
                @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="name">Name </label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
               value="{{$article != null ? $article->name : old('name')}}" required>
    </div>

    <div class="mb-3">
        <label for="content">Content</label>
        <textarea type="text" class="form-control" name="content" id="content" placeholder="Content">{{$article != null ? $article->content : old('content')}}</textarea>
    </div>
    <button class="btn btn-primary">{{$article != null ? 'Update' : 'Create'}}</button>
</form>



