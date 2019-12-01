<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <h1>Edit Category</h1>
    <form method="POST" action="/update-category/{{$category->id}}" enctype="multipart/form-data">
        @csrf
        <!-- Form Inputs -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{$category->name}}">
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>

    </form>

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    </body>
</html>
