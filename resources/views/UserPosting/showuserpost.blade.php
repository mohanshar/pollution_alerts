@extends('backend.layouts.master')
@section('content')

@section('title')
<span>User Posts Information</span>
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
                <th scope='col'>User</th>
                <th scope='col'>Sender</th>
                <th scope='col'>Mobile Number</th>
                <th scope='col'>Description</th>
            </tr>
        </thead>

        <tbody>
            @if (isset($notificaions))
                @foreach ($notificaions as $notificaion)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $notificaion->name ?? '' }}</td>
                        <td>{{ $notificaion->sender ?? '' }}</td>
                        <td>{{ $notificaion->phone ?? '' }}</td>
                        <td>{{ $notificaion->description ?? '' }}</td>
                    </tr>
                @endforeach
                {{-- {{ $notificaion->links() }} --}}
            @endif

        </tbody>

    </table>

@endsection
