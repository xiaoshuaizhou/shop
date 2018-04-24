@extends('./../layouts/layout1')
@section('content')
    <!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= CONTENT ========================================= -->

    <section id="checkout-page">
        <div class="container">
            <div class="col-xs-12 no-margin">
                {{--@if(is_null($address))--}}
                <div class="billing-address">
                    <h2 class="border h1">填写地址信息</h2>
                    <form action="{{url('address/update')}}" method="post">
                        <input type="hidden" name="addressid" value="{{$address->addressid}}">
                        @csrf
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>姓*</label>
                                <input class="le-input" name="firstname" value="{{$address->firstname}}">
                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>名*</label>
                                <input class="le-input" name="lastname" value="{{$address->lastname}}">
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
                                <input class="le-input" name="company" value="{{$address->company}}">
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
                                <input class="le-input" name="address" value="{{$address->address}}">
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
                                <input class="le-input"  name="postcode" value="{{$address->postcode}}">
                                @if ($errors->has('postcode'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('postcode') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <label>邮箱*</label>
                                <input class="le-input" name="email" value="{{$address->email}}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-xs-12 col-sm-4">
                                <label>手机号*</label>
                                <input class="le-input" name="telephone" value="{{$address->telephone}}">
                                @if ($errors->has('telephone'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div><!-- /.field-row -->
                        <div class="row field-row">
                            <div id="create-account" class="col-xs-12">
                                <button class="btn btn-primary form-control" type="submit">编辑联系人</button>
                            </div>
                        </div><!-- /.field-row -->
                    </form>
                </div><!-- /.billing-address -->
@stop