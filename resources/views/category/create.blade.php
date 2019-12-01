<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Create Category</h1>
    <form method="POST" action="/create-category" enctype="multipart/form-data">
        @csrf
        <!-- Form Inputs -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="name">
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
