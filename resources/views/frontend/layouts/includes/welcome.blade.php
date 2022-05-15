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
                    padding: 20px 15px;
                }

                input[type=file] {
                    background: none;
                    color: lightblue
                }

                form-label {
                    text-align: none;
                }

            </style>

            @include('flash_msg.session_flash')

            <div class="container text-md-start">
                <div class="footer-wrap">
                    <div class="newsletter">
                        <div align="center">
                            <p class="fw-bold">Send SMS to us!!</p>
                            <p class="fw-bold" style="color: rgb(226, 70, 70);font-size:18px;">If only emergency.</p>
                            <img src="{{ asset('img\myicon\send-message.png') }}"
                                width="60px" alt="">
                            <p>We provided you a phone number in the box for your comfort.</p>
                        </div>
                        <form class="form-post" action="{{ route('send.sms') }}" method="POST">

                            @csrf

                            <div class="mb-3">
                                <label for="" class="form-label">Name:</label>
                                <input class="form-control" type="text" placeholder="Name:" name="sender"
                                    class="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Description:</label>
                                <textarea class="form-control" type="text" placeholder="Description:" name="description" class="dscrptn"
                                    required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Mobile Number:</label>
                                <input class="form-control" style="margin-bottom:0px;" type="tel" class="phone"
                                    name="phone" placeholder="Mobile Number:" value="+977-9811236178"
                                    pattern="[+977]{4}-[0-9]{10}">
                                <small style="float:left;margin-bottom:10px;margin-left:10px;">
                                    Must use this number to send an sms: +977-9811236178<span
                                        style="color: red;font-size:15px;">*</span>
                                </small>
                                <br>
                            </div>

                            <center>
                                <button type="submit" class="main-btn">Send message</button>
                            </center>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
