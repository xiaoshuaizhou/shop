<!DOCTYPE html>
<html class="login-bg">
<head>
    <title>后台管理</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- bootstrap -->
    <link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet"/>
    <link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/admin/css" rel="stylesheet"/>

    <!-- global styles -->
    <link rel="stylesheet" type="text/admin/css" href="/admin/css/layout.css"/>
    <link rel="stylesheet" type="text/admin/css" href="/admin/css/elements.css"/>
    <link rel="stylesheet" type="text/admin/css" href="/admin/css/icons.css"/>

    <!-- libraries -->
    <link rel="stylesheet" type="text/admin/css" href="/admin/css/lib/font-awesome.css"/>

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/admin/css/compiled/signup.css" type="text/admin/css" media="screen"/>

    <!-- open sans font -->

    <!--[if lt IE 9]>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<div class="header">
    <a href="{{url('admin/')}}">
        <img src="/admin/img/logo.png" class="logo"/>
    </a>
</div>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/register') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Register
            </button>
        </div>
    </div>
</form>


<!-- scripts -->
<script src="/admin/js/jquery-latest.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/theme.js"></script>

</body>
</html>
