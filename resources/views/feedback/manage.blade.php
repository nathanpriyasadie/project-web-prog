@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Manage Feedback</h1>
        <table class="table table-striped">
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
                        <input type="submit" class="btn btn-success" value="approved" name="status" />
                    </form>
                </td>
                <td>
                    <form method="POST" action='/update-feedback/{{$feedback->id}}'>
                        @csrf
                        <input type="submit" class="btn btn-danger" value="rejected" name="status" />
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>
</div>
@endsection
