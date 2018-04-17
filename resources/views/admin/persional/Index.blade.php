<!DOCTYPE html>
<html>
<head>
    <title>后台管理</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
    <link rel="stylesheet" href="/admin/css/compiled/personal-info.css" type="text/css" media="screen" />

    <!-- open sans font -->

    <!--[if lt IE 9]>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

<!-- navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <a class="brand" href="{{url('/admin/index')}}" style="font-weight:700;font-family:Microsoft Yahei">后台管理</a>
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="nav-collapse collapse">
            <ul class="nav">
                <li class="active"><a href="{{url('/admin/index')}}">后台首页</a></li>
            </ul>
        </div>
        <ul class="nav pull-right">
            <li class="hidden-phone">
                <input class="search" type="text" />
            </li>
            <li class="settings">
                <a href="personal-info.html" role="button">
                    <span class="navbar_icon"></span>
                </a>
            </li>
            <li id="fat-menu" class="dropdown">
                <a href="{{url('/admin/login')}}" role="button" class="logout">
                    <span class="navbar_icon">登录</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- end navbar -->

<!-- main container .wide-content is used for this layout without sidebar :)  -->
<div class="content wide-content">
    <div class="container-fluid">
        <div class="settings-wrapper" id="pad-wrapper">
            <!-- avatar column -->
            <div class="span3 avatar-box">
                <div class="personal-image">
                    <img src="/admin/img/personal-info.png" class="avatar img-circle" />
                    <p>上传您的头像...</p>

                    <input type="file" />
                </div>
            </div>

            <!-- edit form column -->
            <div class="span7 personal-info">
                <div class="alert alert-info">
                    <i class="icon-lightbulb"></i>您可以在这里输入<strong>密码</strong>编辑您的个人信息
                </div>
                <h5 class="personal-title">个人信息</h5>

                <form action="{{url('admin/changepersioninfo/changeprofile')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$admin->id}}">
                <div class="field-box">
                    <label>昵称:</label>
                    <input class="span5 inline-input" type="text" name="nickname" value="{{$admin->pofile->nickname}}" />
                </div>
                <div class="field-box">
                    <label>真实姓名:</label>
                    <input class="span5 inline-input" type="text" name="truename" value="{{$admin->pofile->truename}}" />
                </div>
                <div class="field-box">
                    <label>公司:</label>
                    <input class="span5 inline-input" type="text" name="company" value="{{$admin->pofile->company}}" />
                </div>
                <div class="field-box">
                    <label>电子邮箱:</label>
                    <input class="span5 inline-input" type="text" name="email" value="{{$admin->email}}" />
                </div>
                <div class="field-box">
                    <label>性别:</label>
                    <div class="ui-select">
                        <select id="user_time_zone" name="sex">
                        @if($admin->pofile->sex == '男')
                            <option value="男" selected="selected"/>男
                            @elseif($admin->pofile->sex == '保密')
                                <option value="保密" selected="selected"/>保密
                            @else
                                <option value="女" selected="selected" />女
                        @endif
                        </select>
                    </div>
                </div>
                <div class="field-box">
                    <label>用户名:</label>
                    <input class="span5 inline-input" type="text" name="name" value="{{$admin->name}}" />
                </div>
                <div class="field-box">
                    <label>密码:</label>
                    <input class="span5 inline-input" type="password" name="password" value="" />
                </div>
                    <div class="span6 field-box actions">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger span5 inline-input">
                                <ul style="color:red;">
                                    @foreach ($errors->all() as $error)
                                        <ol style="text-align: center;">{{ $error }}</ol>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                <div class="span6 field-box actions">
                    <input type="submit"  class="btn-glow primary" value="保存修改" />
                    <span>或者</span>
                    <input type="reset" value="取消" class="reset" />
                </div>

                </form>

            </div>
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