<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <h1>Edit User</h1>
    <form method="POST" action="/update-user/{{$user->id}}" enctype="multipart/form-data">
        @csrf
        <!-- Form Inputs -->
        <div class="form-group">
            <label for="name">FullName</label>
            <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="phone" value="{{$user->phone}}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" rows="5" placeholder="Address">{{$user->address}}</textarea>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" selected="{{$user->gender}}">
                <option value="male">male</option>
                <option value="female">female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="photo_profile">Post Image</label>
            <input type="file" class="form-control-file" id="photo_profile" name="photo_profile">
        </div>

        <input type="checkbox" name="agree" value="agree">I Agree<br>

        <button type="submit" class="btn btn-primary">Upload</button>

    </form>

    </body>
</html>
