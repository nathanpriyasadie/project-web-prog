<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Manage Feedback</h1>
        <table>
            <tr>
                <th>Feedback Description</th>
                <th>Status</th>
                <th>Approve</th>
                <th>Reject</th>
            </tr>
            @foreach($feedbacks as $feedback)
            <tr>
                <td>{{$feedback->message}}</td>
                <td>{{$feedback->status}}</td>
                <td>
                    <form method="POST" action='/update-feedback/{{$feedback->id}}'>
                        @csrf
                        <input type="submit" value="approved" name="status" />
                    </form>
                </td>
                <td>
                    <form method="POST" action='/update-feedback/{{$feedback->id}}'>
                        @csrf
                        <input type="submit" value="rejected" name="status" />
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
