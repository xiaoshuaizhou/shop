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

                        <form role="form" class="login-form cf-style-1">
                            <div class="field-row">
                                <label>邮箱</label>
                                <input type="text" class="le-input">
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label>密码</label>
                                <input type="text" class="le-input">
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>确认密码</label>
                                <input type="text" class="le-input">
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