@include('./../../layouts/sidebar');



<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>会员列表</h3>
                {{--<div class="span10 pull-right">--}}
                    {{--<input type="text" class="span5 search" placeholder="" />--}}

                    {{--<!-- custom popup filter -->--}}
                    {{--<!-- styles are located in css/elements.css -->--}}
                    {{--<!-- script that enables this dropdown is located in js/theme.js -->--}}

                    {{--<div class="ui-dropdown">--}}
                        {{--<div class="head" data-toggle="tooltip" title="点击!">--}}
                            {{--查询分类--}}
                            {{--<i class="arrow-down"></i>--}}
                        {{--</div>--}}
                        {{--<div class="dialog">--}}
                            {{--<div class="pointer">--}}
                                {{--<div class="arrow"></div>--}}
                                {{--<div class="arrow_border"></div>--}}
                            {{--</div>--}}
                            {{--<form id="w3" action="" method="post">--}}
                                {{--@csrf--}}
                                {{--<div class="body">--}}
                                    {{--<p class="title">--}}
                                        {{--查询:--}}
                                    {{--</p>--}}
                                    {{--<div class="form">--}}
                                        {{--<select>--}}
                                            {{--<option />Name--}}
                                            {{--<option />Email--}}
                                            {{--<option />Number of orders--}}
                                            {{--<option />Signed up--}}
                                            {{--<option />Last seen--}}
                                        {{--</select>--}}
                                        {{--<select>--}}
                                            {{--<option />is equal to--}}
                                            {{--<option />is not equal to--}}
                                            {{--<option />is greater than--}}
                                            {{--<option />starts with--}}
                                            {{--<option />contains--}}
                                        {{--</select>--}}
                                        {{--<input type="text" />--}}
                                        {{--<a class="btn-flat small" onclick="document.getElementById('w3').submit()">查询</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <a href="{{url('/admin/category/add')}}" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新分类
                    </a>
                {{--</div>--}}
            </div>

            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span4 sortable" style="text-align: center;">
                            分类ID
                        </th>
                        <th class="span3 sortable" >
                            <span class="line"></span>分类名称
                        </th>

                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    @foreach($cats as $cat)
                        <tr class="first">

                            <td style="text-align: center;">
                                {{$cat->cateid}}
                            </td>
                            <td ">
                                {{$cat->title}}
                            </td>
                            <td class="align-right" style="text-align: center;">
                                <a href="{{url('admin/category/edit')}}/{{$cat->cateid}}">编辑</a>
                                <a href="{{url('admin/category/del')}}/{{$cat->cateid}}">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($errors) > 0)
                        <div class="alert alert-danger span10 inline-input">
                            <ul style="color:red; text-align: center;">
                                @foreach ($errors->all() as $error)
                                    <ol style="text-align: center;">{{ $error }}</ol>
                                @endforeach
                            </ul>
                        </div>
                    @elseif (count($errors->success) > 0)
                        <div class="alert alert-success span10 inline-input">
                            <ul style="color:green; text-align: center;">
                                    <ol style="text-align: center;">删除成功</ol>
                            </ul>
                        </div>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
                <ul>
                   {{--分页--}}
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