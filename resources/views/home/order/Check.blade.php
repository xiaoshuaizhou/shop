@extends('./../layouts/layout1')
@section('content')
    <!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= CONTENT ========================================= -->

    <section id="checkout-page">
        <div class="container">
            <div class="col-xs-12 no-margin">

                <div class="billing-address">
                    <h2 class="border h1">填写地址信息</h2>
                    <form action="{{}}" method="post">
                        @csrf
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>姓*</label>
                                <input class="le-input" name="firstname" >
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>名*</label>
                                <input class="le-input" name="lastname">
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div class="col-xs-12">
                                <label>公司名称</label>
                                <input class="le-input" name="companyname">
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div class="col-xs-12">
                                <label>详细地址*</label>
                                <input class="le-input" name="detailaddress">
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-4">
                                <label>邮政编码*</label>
                                <input class="le-input"  name="postcode">
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <label>邮箱*</label>
                                <input class="le-input" name="email" >
                            </div>

                            <div class="col-xs-12 col-sm-4">
                                <label>手机号*</label>
                                <input class="le-input" name="phone">
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div id="create-account" class="col-xs-12">
                                <input  class="le-checkbox big" type="checkbox"  />
                                <a class="simple-link bold" href="#">创建账号?</a> -
                                您将在登录后收到带有临时生成密码的电子邮件，您需要更改密码.
                            </div>
                        </div><!-- /.field-row -->

                    </form>
                </div><!-- /.billing-address -->


                <section id="shipping-address">
                    <h2 class="border h1">邮寄地址</h2>
                    <form>
                        <div class="row field-row">
                            <div class="col-xs-12">
                                <input  class="le-checkbox big" type="checkbox"  />
                                <a class="simple-link bold" href="#">运到不同的地点?</a>
                            </div>
                        </div><!-- /.field-row -->
                    </form>
                </section><!-- /#shipping-address -->


                <section id="your-order">
                    <h2 class="border h1">订单列表</h2>
                    <form>
                        <div class="row no-margin order-item">
                            <div class="col-xs-12 col-sm-1 no-margin">
                                <a href="#" class="qty">1 x</a>
                            </div>

                            <div class="col-xs-12 col-sm-9 ">
                                <div class="title"><a href="#"> 9001 </a></div>
                                <div class="brand">sony</div>
                            </div>

                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price">$2000.00</div>
                            </div>
                        </div><!-- /.order-item -->

                    </form>
                </section><!-- /#your-order -->

                <div id="total-area" class="row no-margin">
                    <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                        <div id="subtotal-holder">
                            <ul class="tabled-data inverse-bold no-border">
                                <li>
                                    <label>购物车小计</label>
                                    <div class="value ">$8434.00</div>
                                </li>
                                <li>
                                    <label>快递</label>
                                    <div class="value">
                                        <div class="radio-group">
                                            <input class="le-radio" type="radio" name="group1" value="free"> <div class="radio-label bold">free shipping</div><br>
                                            <input class="le-radio" type="radio" name="group1" value="local" checked>  <div class="radio-label">local delivery<br><span class="bold">$15</span></div>
                                        </div>
                                    </div>
                                </li>
                            </ul><!-- /.tabled-data -->

                            <ul id="total-field" class="tabled-data inverse-bold ">
                                <li>
                                    <label>订单总计</label>
                                    <div class="value">$8434.00</div>
                                </li>
                            </ul><!-- /.tabled-data -->

                        </div><!-- /#subtotal-holder -->
                    </div><!-- /.col -->
                </div><!-- /#total-area -->

                <div id="payment-method-options">
                    <form>
                        <div class="payment-method-option">
                            <input class="le-radio" type="radio" name="group2" value="Direct">
                            <div class="radio-label bold ">Direct Bank Transfer<br>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rutrum tempus elit, vestibulum vestibulum erat ornare id.</p>
                            </div>
                        </div><!-- /.payment-method-option -->

                    </form>
                </div><!-- /#payment-method-options -->

                <div class="place-order-button">
                    <button class="le-button big">下订单</button>
                </div><!-- /.place-order-button -->

            </div><!-- /.col -->
        </div><!-- /.container -->
    </section><!-- /#checkout-page -->
    @stop