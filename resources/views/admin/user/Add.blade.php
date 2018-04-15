@include('./../../layouts/sidebar');


<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>创建新用户</h3>
            </div>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <form class="new_user_form inline-input" />
                        <div class="span12 field-box">
                            <label>用户名:</label>
                            <input class="span9" type="text" />
                        </div>
                        <div class="span12 field-box">
                            <label>状态:</label>
                            <div class="ui-select span5">
                                <select>
                                    <option value="1" />正常
                                    <option value="0" />未激活
                                </select>
                            </div>
                        </div>
                        <div class="span12 field-box">
                            <label>公司:</label>
                            <input class="span9" type="text" />
                        </div>
                        <div class="span12 field-box">
                            <label>邮箱:</label>
                            <input class="span9" type="text" />
                        </div>
                        <div class="span12 field-box">
                            <label>电话:</label>
                            <input class="span9" type="text" />
                        </div>
                        <div class="span12 field-box">
                            <label>网址:</label>
                            <input class="span9" type="text" />
                        </div>
                        <div class="span12 field-box">
                            <label>地址:</label>
                            <div class="address-fields">
                                <input class="span12" type="text" placeholder="详细地址" />
                                <input class="span12 small" type="text" placeholder="城市" />
                                <input class="span12 small" type="text" placeholder="状态" />
                                <input class="span12 small last" type="text" placeholder="邮编" />
                            </div>
                        </div>
                        <div class="span12 field-box textarea">
                            <label>备注:</label>
                            <textarea class="span9"></textarea>
                            <span class="charactersleft">最多100个字符</span>
                        </div>
                        <div class="span11 field-box actions">
                            <input type="button" class="btn-glow primary" value="创建" />
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
                        点击上方可查看表单上内联和正常输入的区别
                    </div>
                    <h6>补充说明</h6>
                    <p>一次添加多个用户</p>
                    <p>选择以下文件类型之一:</p>
                    <ul>
                        <li><a href="#">上传一个vCard文件</a></li>
                        <li><a href="#">导入一个 CSV 文件</a></li>
                        <li><a href="#">导入一个 Excel 文件</a></li>
                    </ul>
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