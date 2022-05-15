<title>Admin - Login Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<style>
    .admin-login {
        padding: 12px 8px;
        margin-top: 5px;
        border-radius: 20px;
        color: #000000;
        font-size: 17px;
    }

</style>

<div class="container" style="margin-top: 50px">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"> Login <center class="admin-login"> Welcome To Admin Login form </center>
            </div>

            @include('flash_msg.session_flash')

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">

                    @csrf

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email"
                                value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            <i class="fas fa-eye" title="hide password" style="
                                    float: right;
                                    margin-top: -25px;
                                    right: 15px;
                                    position: relative;
                                    z-index: 2;
                                    display:none;
                                    "></i>
                            <i class="fas fa-eye-slash" title="show password" style="
                                    float: right;
                                    margin-top: -25px;
                                    right: 15px;
                                    position: relative;
                                    z-index: 2;
                                    "></i>
                            <script>
                                $(document).ready(function() {
                                    $(".fa-eye-slash").click(function() {
                                        $(".fa-eye").show();
                                        $(".fa-eye-slash").hide();
                                        $('#password').attr('type', 'text');
                                    });
                                    $(".fa-eye").click(function() {
                                        $(".fa-eye-slash").show();
                                        $(".fa-eye").hide();
                                        $('#password').attr('type', 'password');
                                    });
                                });
                            </script>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
