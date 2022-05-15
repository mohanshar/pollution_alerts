    @extends('backend.layouts.master')
    @section('content')


    @section('title')
        <span>User Posting Index</span>
    @endsection
    
    <style>
        table {
            text-align: center;
        }

        tr {
            color: #111111;
        }

    </style>

    <table class="table">

        <thead>
            <tr>
                <th scope='col'>Id</th>
                <th scope='col'>User Id</th>
                <th scope="col">Username</th>
                <th scope='col'>Posted by</th>
                <th scope='col'>Location</th>
                <th scope='col'>Mobile Number</th>
                <th scope='col'>Description</th>
                <th scope='col'>Image</th>
                <th scope='col'>Status</th>
                <th scope='col'>Approved/Declined</th>
                <th scope='col'>Created On</th>
                <th scope='col'>Action</th>
            </tr>
        </thead>

        <tbody>
            @if (isset($posts))
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user_id ?? '' }}</td>
                        <td>{{ $post->name ?? '' }}</td>
                        <td>{{ $post->postedby ?? '' }}</td>
                        <td>{{ $post->location ?? '' }}</td>
                        <td>{{ $post->mobile_no ?? '' }}</td>
                        <td>{{ $post->description ?? '' }}</td>
                        <td>
                            <img src="{{ $post->image ?? '' }}" width="80px">
                        </td>

                        <td>{{ $post->status ?? '' }}</td>

                        <td>
                            <a href="{{ route('edit.post', $post->id) }}">Change status</a>
                        </td>

                        <td>{{ $post->date_time ?? '' }}</td>

                        <td>
                            <a href="{{ route('post.delete', $post->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach

                {{ $posts->links() }}
            @endif


        </tbody>

    </table>

@endsection
