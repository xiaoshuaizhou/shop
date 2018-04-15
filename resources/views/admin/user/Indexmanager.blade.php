@include('./../../layouts/sidebar');



<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>管理员</h3>
                <div class="span10 pull-right">
                    <input type="text" class="span5 search" placeholder="" />

                    <!-- custom popup filter -->
                    <!-- styles are located in css/elements.css -->
                    <!-- script that enables this dropdown is located in js/theme.js -->
                    <div class="ui-dropdown">
                        <div class="head" data-toggle="tooltip" title="Click me!">
                            查询管理员
                            <i class="arrow-down"></i>
                        </div>
                        <div class="dialog">
                            <div class="pointer">
                                <div class="arrow"></div>
                                <div class="arrow_border"></div>
                            </div>
                            <div class="body">
                                <p class="title">
                                    查询用户:
                                </p>
                                <form action="" method="post">
                                    @csrf
                                <div class="form">
                                    <select>
                                        <option name="name" />用户名
                                        <option name="email" />邮箱
                                        <option name="updated_at" />最后登录时间
                                        <option name="created_at" />添加时间
                                    </select>
                                    <select>
                                        <option value="="/> =
                                        <option value="<>"/> <>
                                        <option value=">"/> >
                                        <option value="kaitou"/> 开头
                                        <option value="like"/> 包含
                                    </select>
                                    <input type="text" />
                                    <button type="submit" id="condition" class="btn-flat small">查询</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <a href="{{url('/admin/manager/add')}}" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新管理员
                    </a>
                </div>
            </div>

            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span4 sortable" style="text-align: center">
                            管理员名称
                        </th>
                        <th class="span3 sortable" style="text-align: center">
                            <span class="line"></span>管理员账号
                        </th>
                        <th class="span2 sortable" style="text-align: center">
                            <span class="line"></span>管理员邮箱
                        </th>
                        <th class="span2 sortable" style="text-align: center">
                            <span class="line"></span>IP
                        </th>
                        <th class="span2 sortable" style="text-align: center">
                            <span class="line"></span>最后登录时间
                        </th>
                        <th class="span3 sortable align-right" style="text-align: center">
                            <span class="line"></span>添加时间
                        </th>
                        <th class="span3 sortable align-right" >
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($managers as $manager)
                    <!-- row -->
                    <tr class="first">
                        <td>
                            <img src="/admin/img/contact-img.png" class="img-circle avatar hidden-phone" />
                            <a href="{{url('/admin/manager/profile')}}" class="name">{{$manager->name}}</a>
                            <span class="subtext">管理员</span>
                        </td>
                        <td style="text-align: center">
                            {{$manager->name}}
                        </td>
                        <td style="text-align: center">
                            {{$manager->email}}
                        </td>
                        <td style="text-align: center">
                            <?php  echo long2ip($manager->getip);?>
                        </td>
                        <td style="text-align: center">
                            {{$manager->updated_at}}
                        </td>
                        <td style="text-align: center">
                            {{$manager->created_at}}

                        </td>
                        <td class="align-right">
                            <a href="{{url('admin/manager/del', ['id' => $manager->id])}}">删除</a>
                        </td>
                    </tr>
                    <!-- row -->
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
                {{ $managers->links() }}

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