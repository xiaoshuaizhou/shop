@include('./../../layouts/sidebar');
<link rel="stylesheet" href="/admin/css/compiled/new-user.css" type="text/css" media="screen"/>
{{--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}

<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="container-fluid">
                <div id="pad-wrapper" class="users-list">
                    <div class="row-fluid header">
                        <h3>权限列表</h3>

                        <div class="span10 pull-right">

                            <!-- custom popup filter -->
                            <!-- styles are located in css/elements.css -->
                            <!-- script that enables this dropdown is located in js/theme.js -->


                            <a href="{{url('/admin/permissions/create')}}" class="btn-flat success pull-right">
                                <span>&#43;</span>
                                添加权限
                            </a>
                        </div>
                    </div>

                    <!-- Users table -->
                    <div class="row-fluid table">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="span4 sortable" style="text-align: center;">角色id</th>
                                <th class="span4 sortable" style="text-align: center;">角色名称</th>
                                <th class="span3 sortable" style="text-align: center;">角色描述</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr class="first">
                                    <td style="text-align: center;">{{$permission->id}}</td>
                                    <td style="text-align: center;">{{$permission->name}}</td>
                                    <td style="text-align: center;">{{$permission->descr}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination pull-right">
                        <ul>
                            {{$permissions->links()}}
                        </ul>
                    </div>
                    <!-- end users table -->
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



