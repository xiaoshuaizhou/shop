@include('./../../layouts/sidebar');
<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>会员列表</h3>
                <div class="span10 pull-right">
                    <input type="text" class="span5 search" placeholder="" />

                    <!-- custom popup filter -->
                    <!-- styles are located in css/elements.css -->
                    <!-- script that enables this dropdown is located in js/theme.js -->

                    <div class="ui-dropdown">
                        <div class="head" data-toggle="tooltip" title="点击!">
                            查询会员
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
                                    查询用户:
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
                    <a href="{{url('/admin/user/add')}}" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新用户
                    </a>
                </div>
            </div>

            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span4 sortable" style="text-align: center;">
                            用户名
                        </th>
                        <th class="span3 sortable" style="text-align: center;">
                            <span class="line"></span>真实姓名
                        </th>
                        <th class="span2 sortable" style="text-align: center;">
                            <span class="line"></span>昵称
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>性别
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>邮箱
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>详细地址
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center;">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    @foreach($users as $user)
                    <tr class="first">
                        <td>
                            <img src="/admin/img/contact-img.png" class="img-circle avatar hidden-phone" />
                            <a href="{{url('admin/user/')}}/{{$user->id}}" class="name">{{$user->name}}</a>
                            <span class="subtext">{{$user->pofile->company}}</span>
                        </td>
                        <td style="text-align: center;">
                            {{$user->pofile->truename}}
                        </td>
                        <td style="text-align: center;">
                            {{$user->pofile->nickname}}
                        </td>
                        <td style="text-align: center;">
                            {{$user->pofile->sex}}
                        </td>
                        <td style="text-align: center;">
                            {{$user->email}}
                        </td>
                        <td style="text-align: center;">
                            {{$user->pofile->detailaddress}}
                        </td>
                        <td class="align-right" style="text-align: center;">
                            <a href="{{url('/admin/user/delete', ['id' => $user->id])}}">删除</a>
                        </td>
                    </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
                <ul>
                    {{ $users->links() }}
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