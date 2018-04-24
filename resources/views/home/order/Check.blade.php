@extends('./../layouts/layout1')
@section('content')
    <!-- ============================================================= HEADER : END ============================================================= -->        <!-- ========================================= CONTENT ========================================= -->

    <section id="checkout-page">
        <div class="container">
            <div class="col-xs-12 no-margin">
                {{--@if(is_null($address))--}}
                <div class="billing-address">
                    <h2 class="border h1">填写地址信息</h2>
                    <form action="{{url('address/add')}}" method="post">
                        @csrf
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>姓*</label>
                                <input class="le-input" name="firstname" value="">
                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>名*</label>
                                <input class="le-input" name="lastname" value="">
                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div class="col-xs-12">
                                <label>公司名称</label>
                                <input class="le-input" name="company" value="">
                                @if ($errors->has('company'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div class="col-xs-12">
                                <label>详细地址*</label>
                                <input class="le-input" name="address" value="">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-4">
                                <label>邮政编码*</label>
                                <input class="le-input" name="postcode" value="">
                                @if ($errors->has('postcode'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('postcode') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <label>邮箱*</label>
                                <input class="le-input" name="email" value="">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-xs-12 col-sm-4">
                                <label>手机号*</label>
                                <input class="le-input" name="telephone" value="">
                                @if ($errors->has('telephone'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div><!-- /.field-row -->
                        <div class="row field-row">
                            <div id="create-account" class="col-xs-12">
                                <button class="btn btn-primary form-check" type="submit">新建联系人</button>
                            </div>
                        </div><!-- /.field-row -->
                    </form>
                </div><!-- /.billing-address -->
                {{--@endif--}}

                <form action="{{url('order/confirm')}}" method="post">@csrf
                    {{--===========================================================================================================================================================--}}
                    <section id="shipping-address">
                        <h2 class="border h1">邮寄地址</h2>
                            @foreach($address as $key => $add)
                                <div class="row field-row">
                                    <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <input class="le-radio big address" type="radio" name="addressid"
                                                   value="{{$add->addressid}}"
                                                   @if ($key == 0)  checked="checked" @endif />
                                            <a class="simple-link bold" href="#">
                                                <?php echo $add['firstname'] . $add['lastname'] . " " . $add['company'] . " " . $add['address'] . " " . $add['postcode'] .
                                                    " " . $add['email'] . " " . $add['telephone'] ?>
                                            </a>
                                            <a class="btn btn-warning btn-sm"
                                               href="{{url('address/edit', ['addressid' => $add['addressid']])}}">编辑</a>
                                            |
                                            <a class="btn btn-danger btn-sm"
                                               href="{{url('address/del', ['addressid' => $add['addressid']])}}">删除</a>
                                        </div>
                                    </div>
                                </div><!-- /.field-row -->
                            @endforeach
                    </section><!-- /#shipping-address -->


                    <section id="your-order">
                        <h2 class="border h1">订单列表</h2>
                            @foreach($info as $item)
                                <div class="row no-margin order-item">
                                    <div class="col-xs-12 col-sm-1 no-margin">
                                        <a href="#" class="qty">{{$item->productnum}} x</a>
                                    </div>

                                    <div class="col-xs-12 col-sm-9 ">
                                        <div class="title"><a href="#"> {{$item->title}} </a></div>
                                    </div>

                                    <div class="col-xs-12 col-sm-2 no-margin">
                                        <div class="price">{{$item->price}}</div>
                                    </div>
                                </div><!-- /.order-item -->
                            @endforeach
                    </section><!-- /#your-order -->

                    <div id="total-area" class="row no-margin">
                        <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                            <div id="subtotal-holder">
                                <ul class="tabled-data inverse-bold no-border">
                                    <li>
                                        <label>购物车小计</label>
                                        <div class="value totalprice">
                                            <input type="hidden" id="totalprice" value="{{$totalPrice}}">
                                            ￥{{$totalPrice}}</div>
                                    </li>
                                    <li>
                                        <label>快递</label>
                                        <div class="value">
                                            <div class="radio-group">
                                                @foreach($express as $keys => $exp)
                                                    <input id="express" class="le-radio express" type="radio" checked="checked"  name="expressid" value="{{$exp['id']}}">
                                                    {{$exp['expressname']}}
                                                    <div class="radio-label bold">
                                                        <span class="bold">
                                                     ￥{{$exp['expressprice']}}</span>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                </ul><!-- /.tabled-data -->

                                <ul id="total-field" class="tabled-data inverse-bold ">
                                    <li>
                                        <label>订单总计</label>
                                        <div class="value" >
                                            @if($keys == 1)
                                            {{$totalPrice+20}}
                                                @else
                                                {{$totalPrice+10}}
                                            @endif
                                                &nbsp;元
                                        </div>
                                    </li>
                                </ul><!-- /.tabled-data -->

                            </div><!-- /#subtotal-holder -->
                        </div><!-- /.col -->
                    </div><!-- /#total-area -->

                    <div id="payment-method-options">

                        <div class="payment-method-option">
                            <input class="le-radio" type="radio" name="paymethod" value="alipay" checked>
                            <div class="radio-label bold ">支付宝支付</div>
                        </div><!-- /.payment-method-option -->

                    </div><!-- /#payment-method-options -->

                    <div class="place-order-button">
                        <button type="submit" class="btn btn-primary form-check">确认订单</button>
                    </div><!-- /.place-order-button -->

            </div><!-- /.col -->
        </div><!-- /.container -->
    </section><!-- /#checkout-page -->
    </form>
@stop