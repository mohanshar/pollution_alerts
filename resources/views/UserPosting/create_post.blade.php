@extends('frontend.layouts.master')
@section('content')
    <div class="intro-wrapper">
        <div class="container">

            <style>
                .form-post {
                    max-width: 50%;
                    min-width: 50%;
                    margin-left: auto;
                    margin-right: auto;
                    left: 0;
                    right: 0;
                    /* background: rgb(37, 83, 121); */
                    padding: 20px 15px;
                }

            </style>
            @include('flash_msg.session_flash')
            <form class="form-post" action="{{ route('post.submit') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Posted By</label>
                    <input type="text" class="form-control" placeholder="Posted By" name="postedby">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Location</label>
                    <input type="text" class="form-control" placeholder="Location" name="location">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" placeholder="Mobile No" name="mobile_no"
                        pattern="[+977]{4}-[0-9]{10}">
                    <small style="float:left;margin-bottom:10px;margin-left:10px;">
                        Must use this number to send an sms: +977-9811236178<span
                            style="color: red;font-size:15px;">*</span>
                    </small>
                    <br>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Problem</label>
                    <textarea class="form-control" rows="3" placeholder="Problem" name="problem"></textarea>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Date</label>
                    <input type="datetime-local" class="form-control" placeholder="time" name="date-time">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="mb-3">
                    <input type="hidden" value="processing" class="form-control" name="status">
                </div>

                <button class="main-btn" type="submit">Post <img style="width: 15px; margin-left: 15px;"
                        src="{{ asset('img/icon/arrow-right-icon-black.svg') }}" alt=""></button>

            </form>

        </div>

        {{-- @include('UserPosting.showuserpost') --}}

    </div>

    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
@endsection
