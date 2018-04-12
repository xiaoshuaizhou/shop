<!DOCTYPE html>
<html class="login-bg">
<head>
    <title>后台管理</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="/admin/css/lib/font-awesome.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/admin/css/compiled/signin.css" type="text/css" media="screen" />

    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/password/email')}}">
    {{ csrf_field() }}
    <div class="row-fluid login-wrapper">
        <a class="brand" href="{{url('admin/')}}"></a>
        <div class="span4 box">
            <div class="content-wrap">
                <h6>后台管理</h6>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label"></label>

                    <div class="col-md-6">
                        <input id="email" type="email" placeholder="邮箱" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">

                    </div>
                </div>
                {{--<a href="{{ url('/admin/password/reset') }}" class="forgot">忘记密码?</a>--}}
                <div class="remember">
                    <label>
                        <input type="hidden" name="remember">
                    </label>
                </div>
                <button class="btn-glow primary login form-control" type="submit" >点击发送邮件</button>
            </div>
        </div>

    </div>
</form>


<!-- scripts -->
<script src="/js/jquery-latest.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/theme.js"></script>

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
