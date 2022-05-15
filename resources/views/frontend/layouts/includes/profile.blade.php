@extends('frontend.layouts.master')
@section('content')
    <div class="intro-wrapper">
        <div class="container">
            <style>
                div.form-post {
                    max-width: 50%;
                    min-width: 50%;
                    margin-left: auto;
                    margin-right: auto;
                    left: 0;
                    right: 0;
                    background: rgb(81, 121, 145);
                    padding: 20px 15px;
                }

                input.form-control {
                    outline: solid 2px rgb(40, 212, 212);
                }

                input[type=file] {
                    background: none;
                    color: lightblue
                }

                .image {
                    border: 2px solid rgb(220, 233, 197);
                }

            </style>
            <div class="form-post">

                <h5 class="mb-5 text-uppercase text-lg-center">Update your information</h5>
                @include('flash_msg.session_flash')
                <form action="{{ route('update.profile') }}" name="form" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" value="{{ Auth::user()->name ? Auth::user()->name : '' }}"
                            class="form-control" placeholder="Name" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" value="{{ Auth::user()->address ? Auth::user()->address : '' }}"
                            class="form-control" placeholder="Address" name="address">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Contact</label>
                        <input type="text" value="{{ Auth::user()->contact ? Auth::user()->contact : '' }}"
                            class="form-control" placeholder="Contact" name="contact">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">E-mail</label>
                        <input type="text" value="{{ Auth::user()->email ? Auth::user()->email : '' }}"
                            class="form-control" placeholder="E-mail" name="email">
                    </div>

                    <input type="submit" class="btn btn-secondary" value="Update Information">
                    <input type="reset" value="Reset All" class="btn btn-primary">
                </form>
                
            </div>
        </div>
    </div>
@endsection
