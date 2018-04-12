@extends('../layouts/layout2')
@section('content')
    <!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= MAIN ========================================= -->
    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">

                <div class="col-md-10 center-block">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">注&nbsp;&nbsp;册</h2>
                        <p>您好，请填写您的信息</p>

                        <div class="social-auth-buttons">
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn-block btn-danger btn "><i class="fa fa-qq" aria-hidden="true"></i> QQ登录</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn-block btn-warning btn "><i class="fa fa-weibo" aria-hidden="true"></i> 微博登录</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn-block btn-success btn "><i class="fa fa-weixin" aria-hidden="true"></i> 微信登录</button>
                                </div>
                            </div>
                        </div>

                        <form role="form" class="login-form cf-style-1" action="{{url('register')}}" method="post">
                            @csrf
                            <div class="field-row">
                                <label for="name" >{{ __('用户名') }}</label>

                                <input id="name" type="text" class="le-input{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback error">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label for="email" >{{ __('邮箱') }}</label>
                                <input id="email" type="email" class="le-input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback error">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label for="password" >{{ __('密码') }}</label>

                                    <input id="password" type="password" class="le-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label for="password-confirm" >{{ __('确认密码') }}</label>

                                <input id="password-confirm" type="password" class="le-input" name="password_confirmation" required>
                            </div><!-- /.field-row -->
                            <div class="field-row clearfix">

                            </div>

                            <div class="buttons-holder">
                                <button type="submit" class="btn btn-primary huge form-control">注&nbsp;&nbsp;册</button>
                            </div><!-- /.buttons-holder -->
                        </form><!-- /.cf-style-1 -->

                    </section><!-- /.sign-in -->
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    <!-- ========================================= MAIN : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
@stop