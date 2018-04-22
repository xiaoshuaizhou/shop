@extends('./../layouts/layout2')
@section('content')
        <div class="container">

            <!-- ========================================= SIDEBAR ========================================= -->
            <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">

                <!-- ========================================= PRODUCT FILTER ========================================= -->
                <div class="widget">
                    <h1>商品筛选</h1>
                    <div class="body bordered">

                        <div class="category-filter">
                            <h2>品牌</h2>
                            <hr>
                            <ul>
                                <li><input checked="checked" class="le-checkbox" type="checkbox"  /> <label>Samsung</label> <span class="pull-right">(2)</span></li>
                                <li><input  class="le-checkbox" type="checkbox" /> <label>Dell</label> <span class="pull-right">(8)</span></li>
                                <li><input  class="le-checkbox" type="checkbox" /> <label>Toshiba</label> <span class="pull-right">(1)</span></li>
                                <li><input  class="le-checkbox" type="checkbox" /> <label>Apple</label> <span class="pull-right">(5)</span></li>
                            </ul>
                        </div><!-- /.category-filter -->

                        <div class="price-filter">
                            <h2>价格</h2>
                            <hr>
                            <div class="price-range-holder">

                                <input type="text" class="price-slider" value="" >

                                <span class="min-max">
                    Price: $89 - $2899
                </span>
                                <span class="filter-button">
                    <a href="#">Filter</a>
                </span>
                            </div>
                        </div><!-- /.price-filter -->

                    </div><!-- /.body -->
                </div><!-- /.widget -->
                <!-- ========================================= PRODUCT FILTER : END ========================================= -->
                <div class="widget">
                    <h1 class="border">特价商品</h1>
                    <ul class="product-list">
                        @foreach($issale as $item)
                        <li>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin">
                                    <a href="#" class="thumb-holder">
                                        <img alt="{{url('product/detail')}}/{{$item->productid}}" src="{{$item->cover}}" data-echo="{{$item->cover}}" />
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <a href="{{url('product/detail')}}/{{$item->productid}}">{{$item->title}}</a>
                                    <div class="price">
                                        <div class="price-prev">{{$item->saleprice}}</div>
                                        <div class="price-current">{{$item->price}}</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div><!-- /.widget -->
                <div class="widget">
                    <div class="simple-banner">
                        <a href="#"><img alt="" class="img-responsive" src="/assets/images/blank.gif" data-echo="/assets/images/banner/banner-simple.jpg" /></a>
                    </div>
                </div>
                <!-- ========================================= FEATURED PRODUCTS ========================================= -->
                <div class="widget">
                    <h1 class="border">热卖商品</h1>
                    <ul class="product-list">
                    @foreach($ishot as $hot)
                        <li class="sidebar-product-list-item">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin">
                                    <a href="{{url('product/detail')}}/{{$hot->productid}}" class="thumb-holder">
                                        <img alt="" src="{{$hot->cover}}" data-echo="{{$hot->cover}}" />
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <a href="{{url('product/detail')}}/{{$hot->productid}}">{{$hot->title}}</a>
                                    <div class="price">
                                        <div class="price-prev">{{$hot->price}}</div>
                                        <div class="price-current">{{$hot->saleprice}}</div>
                                    </div>
                                </div>
                            </div>
                        </li><!-- /.sidebar-product-list-item -->
                    @endforeach

                    </ul><!-- /.product-list -->
                </div><!-- /.widget -->
                <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
            </div>
            <!-- ========================================= SIDEBAR : END ========================================= -->

            <!-- ========================================= CONTENT ========================================= -->

            <div class="col-xs-12 col-sm-9 no-margin wide sidebar">

                <section id="recommended-products" class="carousel-holder hover small">

                    <div class="title-nav">
                        <h2 class="inverse">推荐商品</h2>
                        <div class="nav-holder">
                            <a href="#prev" data-target="#owl-recommended-products" class="slider-prev btn-prev fa fa-angle-left"></a>
                            <a href="#next" data-target="#owl-recommended-products" class="slider-next btn-next fa fa-angle-right"></a>
                        </div>
                    </div><!-- /.title-nav -->

                    <div id="owl-recommended-products" class="owl-carousel product-grid-holder">
                        @foreach($products as $re)
                        <div class="no-margin carousel-item product-item-holder hover size-medium">
                            <div class="product-item">
                                @if($re->ishot == 1)
                                <div class="ribbon red"><span>热卖</span></div>
                                @endif
                                @if($re->issale == 1)
                                <div class="ribbon blue"><span>促销!</span></div>
                                @endif
                                @if($re->istui == 1)
                                <div class="ribbon green"><span>推荐</span></div>
                                @endif
                                <div class="image">
                                    <img alt="{{url('product/detail')}}/{{$re->productid}}" src="{{$re->cover}}" data-echo="{{$re->cover}}" />
                                </div>
                                <div class="body">
                                    <div class="label-discount green">-50% 促销</div>
                                    <div class="title">
                                        <a href="{{url('product/detail')}}/{{$re->productid}}">{{$re->title}}</a>
                                    </div>
                                    <div class="brand">品牌</div>
                                </div>
                                <div class="prices">
                                    <div class="price-current text-right">{{$re->price}}&nbsp;元</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="{{url('cart/add', ['productid' => $re->productid])}}" class="le-button">加入购物车</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">加入心愿列表</a>
                                        <a class="btn-add-to-compare" href="#">找相似</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.carousel-item -->
                        @endforeach


                    </div><!-- /#recommended-products-carousel .owl-carousel -->
                </section><!-- /.carousel-holder -->
                <section id="gaming">
                    <div class="grid-list-products">
                        <h2 class="section-title">所有商品</h2>

                        <div class="control-bar">
                            <div id="popularity-sort" class="le-select" >
                                <select data-placeholder="sort by popularity">
                                    <option value="1">1-100 players</option>
                                    <option value="2">101-200 players</option>
                                    <option value="3">200+ players</option>
                                </select>
                            </div>

                            <div id="item-count" class="le-select">
                                <select>
                                    <option value="1">24 per page</option>
                                    <option value="2">48 per page</option>
                                    <option value="3">32 per page</option>
                                </select>
                            </div>

                            <div class="grid-list-buttons">
                                <ul>
                                    <li class="grid-list-button-item active"><a data-toggle="tab" href="#grid-view"><i class="fa fa-th-large"></i> 图文</a></li>
                                    <li class="grid-list-button-item "><a data-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i> 列表</a></li>
                                </ul>
                            </div>
                        </div><!-- /.control-bar -->

                        <div class="tab-content">
                            <div id="grid-view" class="products-grid fade tab-pane in active">

                                <div class="product-grid-holder">
                                    <div class="row no-margin">
                                        @foreach($allProducts as $pro)
                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">

                                                @if($pro->ishot == 1)
                                                    <div class="ribbon red"><span>热卖</span></div>
                                                @endif
                                                @if($pro->issale == 1)
                                                    <div class="ribbon blue"><span>促销!</span></div>
                                                @endif
                                                @if($pro->istui == 1)
                                                    <div class="ribbon green"><span>推荐</span></div>
                                                @endif
                                                <div class="image">
                                                    <img alt="" src="{{$pro->cover}}" data-echo="{{$pro->cover}}" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount green">-50% sale</div>
                                                    <div class="title">
                                                        <a href="{{url('product/detail')}}/{{$pro->productid}}">{{$pro->title}}</a>
                                                    </div>
                                                    <div class="brand">品牌</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">{{$pro->price}}</div>
                                                    <div class="price-current pull-right">{{$pro->saleprice}}</div>
                                                </div>
                                                <div class="hover-area">
                                                    <div class="add-cart-button">
                                                        <a href="{{url('cart/add', ['id' => $pro->productid])}}" class="le-button">加入购物车</a>
                                                    </div>
                                                    <div class="wish-compare">
                                                        <a class="btn-add-to-wishlist" href="#">加入心愿单</a>
                                                        <a class="btn-add-to-compare" href="#">找相似</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->
                                    @endforeach

                                </div><!-- /.product-grid-holder -->

                                <div class="pagination-holder">
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-6 text-left">
                                            <ul class="pagination ">
                                                {{$allProducts->links()}}
                                            </ul>
                                        </div>

                                        <div class="col-xs-12 col-sm-6">
                                            <div class="result-counter">
                                                Showing <span>1-9</span> of <span>11</span> results
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.pagination-holder -->
                            </div><!-- /.products-grid #grid-view -->

                            <div id="list-view" class="products-grid fade tab-pane ">
                                <div class="products-list">

                                    <div class="product-item product-item-holder">
                                        <div class="ribbon red"><span>sale</span></div>
                                        <div class="ribbon blue"><span>new!</span></div>
                                        <div class="row">
                                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                <div class="image">
                                                    <img alt="" src="/assets/images/blank.gif" data-echo="/assets/images/products/product-01.jpg" />
                                                </div>
                                            </div><!-- /.image-holder -->
                                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                <div class="body">
                                                    <div class="label-discount green">-50% sale</div>
                                                    <div class="title">
                                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                                    </div>
                                                    <div class="brand">品牌</div>
                                                    <div class="excerpt">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis euismod erat sit amet porta. Etiam venenatis ac diam ac tristique. Morbi accumsan consectetur odio ut tincidunt.</p>
                                                    </div>
                                                    <div class="addto-compare">
                                                        <a class="btn-add-to-compare" href="#">add to compare list</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.body-holder -->
                                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                <div class="right-clmn">
                                                    <div class="price-current">$1199.00</div>
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="availability"><label>availability:</label><span class="available">  in stock</span></div>
                                                    <a class="le-button" href="#">add to cart</a>
                                                    <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                                </div>
                                            </div><!-- /.price-area -->
                                        </div><!-- /.row -->
                                    </div><!-- /.product-item -->

                        </div><!-- /.tab-content -->
                    </div><!-- /.grid-list-products -->

                </section><!-- /#gaming -->
            </div><!-- /.col -->
            <!-- ========================================= CONTENT : END ========================================= -->
        </div><!-- /.container -->
    </section><!-- /#category-grid -->		<!-- ============================================================= FOOTER ============================================================= -->
@stop