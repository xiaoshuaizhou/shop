@include('./../../layouts/sidebar');


<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>创建新分类</h3>
            </div>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <form class="new_user_form inline-input" action="{{url('admin/category/create')}}" method="post"/>
                        @csrf

                        <div class="span12 field-box">
                            <label>上级分类:</label>
                            <div class="ui-select span5">
                                <select name="parent_id">
                                    <option value="0" />添加等级分类
                                @foreach($cats as $cat)
                                        <option value="{{$cat->cateid}}" />{{$cat->title}}
                                    @endforeach
                                </select>
                                @if ($errors->has('parent_id'))
                                    <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="span12 field-box">
                            <label>分类名称:</label>
                            <input class="span9" name="title" type="text" value="{{ old('title') }}" />
                            @if ($errors->has('title'))
                                <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
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
                    <div class="btn-group toggle-inputs hidden-tablet">
                        <button class="glow left active" data-input="inline">内联样式</button>
                        <button class="glow right" data-input="normal">正常表单</button>
                    </div>
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>
                        点击上方可查看表单上内联和正常输入的区别<br>
                        请在左侧表单中填写要添加的分类，请选择好上级分类
                    </div>
                    <h6>商城分类说明</h6>
                    <p>该分类为无限极分类</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->


<!-- scripts -->
<script src="/admin/js/jquery-latest.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/theme.js"></script>

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

</body>
</html>