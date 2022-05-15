@extends('backend.layouts.master')
@section('content')
    <style>
        div.container {
            width: 500px;
            color: #111;
        }

        div.container h2 {
            text-align: center;
        }

        div.container a.btn {
            border: 1px dashed #111;
            color: #111;
        }

        div.container a.btn:hover,
        div.container a.btn:active {
            background-color: #dddddd;
        }

        div.container button.btn {
            border: 1px dashed #111;
            color: #111;
        }

        div.container button.btn:hover,
        div.container button.btn:active {
            background-color: #dddddd;
        }

    </style>


@section('title')
<span>Update Userposts Status</span>
@endsection


    <div class="container">

        <h2>Update Userposts Status</h2>

        <form action="{{ route('post.update', $post->id) }}" method="GET">

            @csrf

            <div class="form-group">
                <label for="status">Change Status:</label>
                <input type="text" class="form-control" value="{{ $post->status ?? null }}" placeholder="Enter status"
                    name="status">
            </div>

            <div class="form-group">
                <label for="postedby">Posted By:</label>
                <input type="text" class="form-control" value="{{ $post->postedby ?? null }}" name="postedby">
            </div>

            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="text" class="form-control" value="{{ $post->mobile_no ?? null }}" name="mobile_no">
            </div>

            <button type="submit" class="btn">Send Update</button>
        </form>

    </div>
@endsection
