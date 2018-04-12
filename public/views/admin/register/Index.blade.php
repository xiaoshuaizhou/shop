<!DOCTYPE html>
<html class="login-bg">
<head>
    <title>慕课商城 - 后台管理</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet"/>
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet"/>

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css"/>
    <link rel="stylesheet" type="text/css" href="css/elements.css"/>
    <link rel="stylesheet" type="text/css" href="css/icons.css"/>

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="css/lib/font-awesome.css"/>

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/signup.css" type="text/css" media="screen"/>

    <!-- open sans font -->

    <!--[if lt IE 9]>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<div class="header">
    <a href="index.html">
        <img src="img/logo.png" class="logo"/>
    </a>
</div>
<form action="{{url('/admin/registerform')}}" method="post">
    <div class="row-fluid login-wrapper">
        <div class="box">
            <div class="content-wrap">
                <h6>注&nbsp;&nbsp;册</h6>

                <div class="col-md-6">
                    <input class="span12{{ $errors->has('name') ? ' is-invalid' : ''}}" name="name" value="{{ old('name') }}" type="text" placeholder="用户名" required autofocus/>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>


                <div class="col-md-6">
                    <input class="span12{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                           type="email" placeholder="邮箱" required autofocus/>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>


                    <div class="col-md-6">
                        <input id="password" type="password" class="span12{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="密码" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="span12" placeholder="确认密码" name="password_confirmation" required>
                    </div>
                <div class="action">
                    <button class="btn-glow primary signup" type="submit">注&nbsp;&nbsp;册</button>
                </div>
            </div>
        </div>

        <div class="span4 already">
            <p>已有账号?</p>
            <a href="{{url('/admin/login')}}">登录</a>
        </div>
    </div>
</form>


<!-- scripts -->
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/theme.js"></script>

</body>
</html>