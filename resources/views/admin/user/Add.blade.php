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
                        <form class="new_user_form inline-input" action="{{url('admin/user/create')}}" method="post"/>
                        @csrf
                        <div class="span12 field-box">
                            <label>用户名:</label>
                            <input class="span9" type="text" name="name"/>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="span12 field-box">
                            <label>真实名称:</label>
                            <input class="span9" type="text" name="truename"/>
                            @if ($errors->has('truename'))
                                <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('truename') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="span12 field-box">
                            <label>昵称:</label>
                            <input class="span9" type="text" name="nickname"/>
                            @if ($errors->has('nickname'))
                                <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('nickname') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="span12 field-box">
                            <label>性别:</label>
                            <div class="ui-select span5">
                                <select name="sex">
                                    <option value="保密" />保密
                                    <option value="男" />男
                                    <option value="女" />女
                                </select>
                                @if ($errors->has('sex'))
                                    <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="span12 field-box">
                            <label for="meeting">生日：</label>
                            <input id="meeting" type="date" name="borthday" value="2018-01-01"/>

                        </div>

                        <div class="span12 field-box">
                            <label>状态:</label>
                            <div class="ui-select span5">
                                <select name="status" >
                                    <option value="1" />正常
                                    <option value="0" />未激活
                                </select>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="span12 field-box">
                            <label>公司:</label>
                            <input class="span9" name="company" type="text" />
                            @if ($errors->has('company'))
                                <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('company') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="span12 field-box">
                            <label>邮箱:</label>
                            <input class="span9" name="email"  type="email" />
                            @if ($errors->has('email'))
                                <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="span12 field-box">
                            <label>电话:</label>
                            <input class="span9" name="phone" type="text" />
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="span12 field-box">
                            <label>网址:</label>
                            <input class="span9" name="website" type="text" />
                            @if ($errors->has('website'))
                                <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('website') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="span12 field-box">
                            <label>地址:</label>
                            <div class="address-fields">
                                <input class="span12" type="text" name="detailaddress" placeholder="详细地址" />
                                @if ($errors->has('detailaddress'))
                                    <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('detailaddress') }}</strong>
                                    </span>
                                @endif
                                <input class="span12 small" type="text" name="province" placeholder="省份" />
                                @if ($errors->has('privince'))
                                    <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                                <input class="span12 small" type="text" name="city" placeholder="城市" />
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                                <input class="span12 small last" type="text" name="postcode" placeholder="邮编" />
                                @if ($errors->has('postcode'))
                                    <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="span12 field-box textarea">
                            <label>备注:</label>
                            <textarea class="span9" name="mark"></textarea>
                            @if ($errors->has('mard'))
                                <span class="invalid-feedback error">
                                        <strong style="font-color:red;">{{ $errors->first('mark') }}</strong>
                                    </span>
                            @endif
                            <span class="charactersleft">最多100个字符</span>
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