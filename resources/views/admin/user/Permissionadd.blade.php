@include('./../../layouts/sidebar')

<link rel="stylesheet" href="/admin/css/compiled/new-user.css" type="text/css" media="screen" />
{{--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}

<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加新权限</h3>
            </div>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        @include('flash::message')
                        <form class="new_user_form inline-input" role="form" method="POST" action="{{ url('/admin/permissions/store') }}" >
                            @csrf
                            <div class="span12 field-box{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">权限名</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="span9" name="name" value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block" >
                                        <strong">{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="span12 field-box{{ $errors->has('descr') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">描述</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="span9" name="descr" value="{{ old('descr') }}">

                                    @if ($errors->has('descr'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('descr') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="span11 field-box actions">
                                <input type="submit" class="btn-glow primary" value="创建" />
                                <span>或者</span>
                                <input type="reset" value="取消" class="reset" />
                            </div>
                        </form>
                    </div>
                </div>

                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">

                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>
                        请在左侧填写管理员相关信息，包括管理员账号，电子邮箱，以及密码
                    </div>
                    <h6>重要提示：</h6>
                    <p>管理员可以管理后台功能模块</p>
                    <p>请谨慎添加</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- scripts -->
<script src="/admin/js/jquery-latest.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/theme.js"></script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
<script type="text/javascript">



    $(function () {

        // toggle form between inline and normal inputs
        var $buttons = $(".toggle-inputs button");
        var $form = $("form.new_user_form");

        $buttons.click(function () {
            var mode = $(this).data("input");
            $buttons.removeClass("active");
            $(this).addClass("active");

            if (mode === "inline") {
                $form.addClass("inline-input");
            } else {
                $form.removeClass("inline-input");
            }
        });
    });
</script>
<!-- end main container -->
