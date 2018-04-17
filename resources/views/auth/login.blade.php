@extends('../layouts/layout2')
@section('content')
    <!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= MAIN ========================================= -->
    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">

                <div class="col-md-10 center-block">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">登&nbsp;&nbsp;录</h2>
                        <p>您好，请填写您的账号信息</p>

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

                        <form role="form" class="login-form cf-style-1" method="POST" action="{{ url('login') }}" >
                            @csrf

                            <div class="field-row">
                                <label>邮箱</label>
                                <input id="email" type="email" class="le-input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label>密码</label>
                                <input id="password" type="password" class="le-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div><!-- /.field-row -->

                            <div class="field-row clearfix">
                        	<span class="pull-left">
                        		<label class="content-color">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('记住我') }}

                                    </span>
                                </label>
                        	</span>
                                <span class="pull-right">
                                 <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('忘记密码 ?') }}
                                </a>
                        	</span>
                            </div>

                            <div class="buttons-holder">
                                <button type="submit" class="btn btn-primary huge form-control">登&nbsp;&nbsp;录</button>
                            </div><!-- /.buttons-holder -->
                        </form><!-- /.cf-style-1 -->

                    </section><!-- /.sign-in -->
                </div><!-- /.col -->

                <!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    <!-- ========================================= MAIN : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
@stop