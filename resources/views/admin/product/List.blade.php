@include('./../../layouts/sidebar');



<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>商品列表</h3>
                <div class="span10 pull-right">
                    <input type="text" class="span5 search" placeholder="" />

                    <!-- custom popup filter -->
                    <!-- styles are located in css/elements.css -->
                    <!-- script that enables this dropdown is located in js/theme.js -->

                    <div class="ui-dropdown">
                        <div class="head" data-toggle="tooltip" title="点击!">
                            查询商品
                            <i class="arrow-down"></i>
                        </div>
                        <div class="dialog">
                            <div class="pointer">
                                <div class="arrow"></div>
                                <div class="arrow_border"></div>
                            </div>
                            <form id="w3" action="" method="post">
                                @csrf
                                <div class="body">
                                    <p class="title">
                                        查询商品:
                                    </p>
                                    <div class="form">
                                        <select>
                                            <option />Name
                                            <option />Email
                                            <option />Number of orders
                                            <option />Signed up
                                            <option />Last seen
                                        </select>
                                        <select>
                                            <option />is equal to
                                            <option />is not equal to
                                            <option />is greater than
                                            <option />starts with
                                            <option />contains
                                        </select>
                                        <input type="text" />
                                        <a class="btn-flat small" onclick="document.getElementById('w3').submit()">查询</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <a href="{{url('/admin/product/add')}}" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新商品
                    </a>
                </div>
            </div>

            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span4 sortable" style="text-align: center;">商品名称</th>
                        <th class="span3 sortable" style="text-align: center;">
                            <span class="line"></span>商品库存
                        </th>
                        <th class="span2 sortable" style="text-align: center;">
                            <span class="line"></span>商品单价
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>是否热卖
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>是否促销
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>促销价
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>是否上架
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>是否推荐
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    @foreach($products as $product)
                        <tr class="first">
                            <td style="text-align: center;">
                                <img src="{{$product->cover}}" style="width: 100px;height: 50px;" class="img-circle avatar hidden-phone" />
                                <a href="{{url('admin/product/')}}/{{$product->id}}" class="name">{{$product->title}}</a>
                            </td>
                            <td style="text-align: center;">
                                {{$product->num}}
                            </td>
                            <td style="text-align: center;">
                                {{$product->price}}
                            </td>
                            <td style="text-align: center;">
                                {{$product->ishot == 1 ? '是' : '否'}}
                            </td>
                            <td style="text-align: center;">
                                {{$product->issale == 1 ? '是' : '否'}}
                            </td>
                            <td style="text-align: center;">
                                {{$product->saleprice}}
                            </td>
                            <td style="text-align: center;">
                                {{$product->ison == 1 ? '是' : '否'}}
                            </td>
                            <td style="text-align: center;">
                                {{$product->istui == 1 ? '是' : '否'}}
                            </td>
                            <td class="align-right" style="text-align: center;">
                                <a href="{{url('/admin/product/edit', ['id' => $product->productid])}}">编辑</a> |
                                <a href="{{url('/admin/product/dwon', ['id' => $product->productid])}}">上架</a> |
                                <a href="{{url('/admin/product/up', ['id' => $product->productid])}}">下架</a> |
                                <a href="{{url('/admin/product/del', ['id' => $product->productid])}}">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
                <ul>
                    {{ $products->links() }}
                </ul>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->


<!-- scripts -->
<script src="/admin/js/jquery-latest.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/theme.js"></script>

</body>
</html>