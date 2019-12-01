<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Create Feedback</h1>
    <form method="POST" action="/create-feedback" enctype="multipart/form-data">
        @csrf
        <!-- Form Inputs -->
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" rows="5" placeholder="message"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>

    </form>

    </body>
</html>
