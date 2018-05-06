@include('./../../layouts/sidebar');
<link rel="stylesheet" href="/admin/css/compiled/new-user.css" type="text/css" media="screen" />
{{--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}

<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>角色列表</h3>
            </div>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span10 with-sidebar">

                    <div class="row-fluid table">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="span4 sortable" style="text-align: center;">用户id</th>
                                <th class="span4 sortable" style="text-align: center;">用户名称</th>
                                <th class="span2 sortable" style="text-align: center;">操作</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($manegers as $admin)
                                <tr class="first">
                                    <td style="text-align: center;">{{$admin->id}}</td>
                                    <td style="text-align: center;">{{$admin->name}}</td>
                                    <td class="align-right" style="text-align: center;">
                                        <a href="{{url('admin/roles/'.$admin->id .'/permissioninfo')}}">角色管理</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

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



