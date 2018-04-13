<!DOCTYPE html>
<html class="login-bg">
<head>
    <title>后台管理</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="css/lib/font-awesome.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/signin.css" type="text/css" media="screen" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
    {{ csrf_field() }}
<div class="row-fluid login-wrapper">
    <a class="brand" href="{{url('admin/')}}"></a>
    <div class="span4 box">
        <div class="row justify-content-center">
            <div class="col-md-10 content-wrap">
                <div class="card">
                    <div class="card-header">{{ __('') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="span12">
                                <label for="email" >{{ __('邮箱') }}</label>

                                <div >
                                    <input id="email" type="email" class="le-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="span12">
                                <label for="password" >{{ __('密码') }}</label>

                                <div >
                                    <input id="password" type="password" class="le-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="span12">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('记住我') }}
                                <a class="btn btn-link" href="{{ url('admin/password/reset') }}">
                                    {{ __('忘记密码?') }}
                                </a>
                            </div>

                            <div class="span12">
                                <div class="col-md-10 ">
                                    <button type="submit" class="btn btn-primary form-control">
                                        {{ __('登  录') }}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</form>


<!-- scripts -->
<script src="/admin/js/jquery-latest.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/theme.js"></script>

<!-- pre load bg imgs -->
<script type="text/javascript">
    $(function () {
        // bg switcher
        var $btns = $(".bg-switch .bg");
        $btns.click(function (e) {
            e.preventDefault();
            $btns.removeClass("active");
            $(this).addClass("active");
            var bg = $(this).data("img");

            $("html").css("background-image", "url('/admin/img/bgs/" + bg + "')");
        });

    });
</script>

</body>
</html>