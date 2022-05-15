@extends('backend.layouts.master')
@section('content')


@section('title')
    <span>Site Settings</span>
@endsection

<div class="container">

    <style>
        button.btn {
            background-color: rgb(45, 106, 240);
            color: #ffffff;
        }

        button.btn:hover {
            text-decoration: 2px underline rgb(3, 51, 11);
            color: #ffffff;
        }

        input[type=file] {
            background: none;
            border: none;
            text-decoration: 3px underline rgba(96, 68, 255, 0.671);
            max-width: 80%;
            margin-bottom: 20px;
        }

        input::placeholder {
            padding: 3px 2px;
        }

    </style>
    @include('flash_msg.session_flash')
    <form class="form-horizontal" action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data"
        name="form">

        @csrf

        <div class="form-group">
            <label class="control-label col-sm-2">Logo:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" value="{{ $settings ? $settings->logo : '' }}" name="logo">
            </div>
        </div>

        @if (isset($settings) && $settings->logo)
            <div class="form-group">
                <img src="{{ $settings ? $settings->logo : '' }}" class="logo" height="100px" width="auto"
                    alt="">
            </div>
        @endif

        <div class="form-group">
            <label class="control-label col-sm-2">Site Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Site Name"
                    value="{{ $settings ? $settings->site_name : '' }}" name="site_name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2">Whatsapp:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Whatsapp link"
                    value="{{ $settings ? $settings->whatsapp : '' }}" name="whatsapp">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2">Messenger:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Messenger link"
                    value="{{ $settings ? $settings->messenger : '' }}" name="messenger">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2">Copyright:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Copyright"
                    value="{{ $settings ? $settings->copyright : '' }}" name="copyright">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </div>

    </form>
</div>
@endsection
