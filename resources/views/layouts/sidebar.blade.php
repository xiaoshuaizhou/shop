<!DOCTYPE html>
<html>
<head>
    <title>后台管理</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />



    <!-- bootstrap -->
    <link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="/admin/css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
    <link href="/admin/css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="/admin/css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="/admin/css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
    <link href="/admin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/admin/css/compiled/form-wizard.css" type="text/css" media="screen" />


    <!-- bootstrap -->
    <link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/icons.css" />

    <!-- libraries -->
    <link href="/admin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/admin/css/compiled/tables.css" type="text/css" media="screen" />


    <!-- bootstrap -->
    <link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="/admin/css/lib/font-awesome.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/admin/css/compiled/new-user.css" type="text/css" media="screen" />






    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/icons.css" />


    <link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <link href="/admin/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="/admin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="/admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/icons.css" />

    <link rel="stylesheet" href="/admin/css/compiled/index.css" type="text/css" media="screen" />


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="brand" href="{{url('admin/index')}}" style="font-weight:700;font-family:Microsoft Yahei">后台管理</a>

        <ul class="nav pull-right">
            <li class="hidden-phone">
                <input class="search" type="text" />
            </li>
            <li class="notification-dropdown hidden-phone">
                <a href="#" class="trigger">
                    <i class="icon-warning-sign"></i>
                    <span class="count">6</span>
                </a>
                <div class="pop-dialog">
                    <div class="pointer right">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <div class="body">
                        <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                        <div class="notifications">
                            <h3>你有 6 个新通知</h3>
                            <a href="#" class="item">
                                <i class="icon-signin"></i> 新用户注册
                                <span class="time"><i class="icon-time"></i> 13 分钟前.</span>
                            </a>
                            <a href="#" class="item">
                                <i class="icon-signin"></i> 新用户注册
                                <span class="time"><i class="icon-time"></i> 18 分钟前.</span>
                            </a>
                            <a href="#" class="item">
                                <i class="icon-signin"></i> 新用户注册
                                <span class="time"><i class="icon-time"></i> 49 分钟前.</span>
                            </a>
                            <a href="#" class="item">
                                <i class="icon-download-alt"></i> 新订单
                                <span class="time"><i class="icon-time"></i> 1 天前.</span>
                            </a>
                            <div class="footer">
                                <a href="#" class="logout">查看所有通知</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="notification-dropdown hidden-phone">
                <a href="#" class="trigger">
                    <i class="icon-envelope-alt"></i>
                </a>
                <div class="pop-dialog">
                    <div class="pointer right">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <div class="body">
                        <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                        <div class="messages">
                            <a href="#" class="item">
                                <img src="/admin/img/contact-img.png" class="display" />
                                <div class="name">Alejandra Galván</div>
                                <div class="msg">
                                    There are many variations of available, but the majority have suffered alterations.
                                </div>
                                <span class="time"><i class="icon-time"></i> 13 min.</span>
                            </a>
                            <a href="#" class="item">
                                <img src="/admin/img/contact-img2.png" class="display" />
                                <div class="name">Alejandra Galván</div>
                                <div class="msg">
                                    There are many variations of available, have suffered alterations.
                                </div>
                                <span class="time"><i class="icon-time"></i> 26 min.</span>
                            </a>
                            <a href="#" class="item last">
                                <img src="/admin/img/contact-img.png" class="display" />
                                <div class="name">Alejandra Galván</div>
                                <div class="msg">
                                    There are many variations of available, but the majority have suffered alterations.
                                </div>
                                <span class="time"><i class="icon-time"></i> 48 min.</span>
                            </a>
                            <div class="footer">
                                <a href="#" class="logout">View all messages</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                    账户管理
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('/admin/changeemail')}}">修改邮箱</a></li>
                    <li><a href="{{url('/admin/changepass')}}">修改密码</a></li>
                    <li><a href="#">订单管理</a></li>
                </ul>
            </li>
            <li class="settings hidden-phone">
                <a href="{{url('/admin/persioninfo')}}" role="button">
                    <i class="icon-cog"></i>
                </a>
            </li>
            <li class="settings hidden-phone">

                <a href="{{url('/admin/logout')}}" role="button"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    <i class="icon-share-alt"></i>

                </a>
                <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

            </li>
        </ul>
    </div>
</div>
<!-- end navbar -->

<!-- sidebar -->
<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="{{url('/admin/index')}}">
                <i class="icon-home"></i>
                <span>后台首页</span>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/chartshowcase')}}">
                <i class="icon-signal"></i>
                <span>统计</span>
            </a>
        </li>

        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-user"></i>
                <span>管理员管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{url('/admin/manager/index')}}">管理员列表</a></li>
                <li><a href="{{url('/admin/manager/add')}}">管理员新用户</a></li>
            </ul>
        </li>

        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>用户管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{url('/admin/user')}}">用户列表</a></li>
                <li><a href="{{url('/admin/user/add')}}">加入新用户</a></li>
            </ul>
        </li>

        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-th-list"></i>
                <span>分类管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{url('/admin/category/list')}}">分类列表</a></li>
                <li><a href="{{url('/admin/category/add')}}">加入分类</a></li>
            </ul>
        </li>

        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-edit"></i>
                <span>表单</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{url('/admin/formshowcase')}}">基本表单</a></li>
                <li><a href="{{url('/admin/formwizard')}}">步骤表单</a></li>
            </ul>
        </li>
        <li>
            <a href="{{url('/admin/gallery')}}">
                <i class="icon-picture"></i>
                <span>相册管理</span>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/calender')}}">
                <i class="icon-calendar-empty"></i>
                <span>日历事件管理</span>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/table')}}">
                <i class="icon-th-large"></i>
                <span>表格</span>
            </a>
        </li>

        <li>
            <a href="{{url('/admin/persioninfo')}}/{{Auth::guard('admin')->id()}}">
                <i class="icon-cog"></i>
                <span>我的信息</span>
            </a>
        </li>

    </ul>
</div>

<script type="text/javascript">
    $(function () {
        var $wizard = $('#fuelux-wizard'),
            $btnPrev = $('.wizard-actions .btn-prev'),
            $btnNext = $('.wizard-actions .btn-next'),
            $btnFinish = $(".wizard-actions .btn-finish");

        $wizard.wizard().on('finished', function(e) {
            // wizard complete code
        }).on("changed", function(e) {
            var step = $wizard.wizard("selectedItem");
            // reset states
            $btnNext.removeAttr("disabled");
            $btnPrev.removeAttr("disabled");
            $btnNext.show();
            $btnFinish.hide();

            if (step.step === 1) {
                $btnPrev.attr("disabled", "disabled");
            } else if (step.step === 4) {
                $btnNext.hide();
                $btnFinish.show();
            }
        });

        $btnPrev.on('click', function() {
            $wizard.wizard('previous');
        });
        $btnNext.on('click', function() {
            $wizard.wizard('next');
        });
    });
</script>
<!-- end sidebar -->