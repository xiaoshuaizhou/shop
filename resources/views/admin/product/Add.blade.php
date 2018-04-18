@include('./../../layouts/sidebar')


<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span8 column">
                    <form />
                    <div class="field-box">
                        <label>商品分类:</label>
                        <div class="ui-select">
                            <select>
                                <option selected="" />Dropdown
                                <option />Custom selects
                                <option />Pure css styles
                            </select>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>商品名称</label>
                        <input class="span8" type="text" />
                    </div>
                    <div class="field-box">
                        <label>商品描述:</label>
                        <div class="wysi-column">
                            <textarea id="wysi" class="span10 wysihtml5" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>商品价格</label>
                        <input class="span8" type="text" />
                    </div>
                    <div class="field-box">
                        <label>是否热卖:</label>
                        <div class="span8">
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" />
                                是
                            </label>
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
                                否
                            </label>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>是否促销:</label>
                        <div class="span8">
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" />
                                是
                            </label>
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
                                否
                            </label>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>促销价格</label>
                        <input class="span8" type="text" />
                    </div>
                    <div class="field-box">
                        <label>库存</label>
                        <input class="span8" type="text" />
                    </div>
                    <div class="field-box">
                        <label>是否上架:</label>
                        <div class="span8">
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" />
                                是
                            </label>
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
                                否
                            </label>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>是否推荐:</label>
                        <div class="span8">
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" />
                                是
                            </label>
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
                                否
                            </label>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>图片封面:</label>

                        <div class="span3 avatar-box">
                            <div class="personal-image">
                                <img src="" class="avatar img-circle" />
                                <input type="file" />
                            </div>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>商品图片:</label>

                        <div class="span3 avatar-box">
                            <div class="personal-image">
                                <img src="" class="avatar img-circle" />
                                <input type="file" />
                            </div>
                        </div>
                    </div>

                    <div class="span11 field-box actions">
                        <input type="submit" class="btn btn-glow primary" value="创建" />
                        <span>或者</span>
                        <input type="reset" value="取消" class="reset" />
                    </div>
                    </form>
                </div>

                <!-- right column -->
                <div class="span4 column pull-right">
                    <form />
                    <div class="field-box">
                        <label>Select:</label>
                        <div class="ui-select">
                            <select>
                                <option selected="" />Dropdown
                                <option />Custom selects
                                <option />Pure css styles
                            </select>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>Select2 插件:</label>
                        <select style="width:250px" class="select2">
                            <option />
                            <option value="AK" />Alaska
                            <option value="HI" />Hawaii
                            <option value="CA" />California
                            <option value="NV" />Nevada
                            <option value="OR" />Oregon
                            <option value="WA" />Washington
                            <option value="AZ" />Arizona
                            <option value="CO" />Colorado
                            <option value="ID" />Idaho
                            <option value="MT" />Montana
                            <option value="NE" />Nebraska
                            <option value="NM" />New Mexico
                            <option value="ND" />North Dakota
                            <option value="UT" />Utah
                            <option value="WY" />Wyoming
                            <option value="AL" />Alabama
                            <option value="AR" />Arkansas
                            <option value="IL" />Illinois
                            <option value="IA" />Iowa
                            <option value="KS" />Kansas
                            <option value="KY" />Kentucky
                            <option value="LA" />Louisiana
                            <option value="MN" />Minnesota
                            <option value="MS" />Mississippi
                            <option value="MO" />Missouri
                            <option value="OK" />Oklahoma
                            <option value="SD" />South Dakota
                            <option value="TX" />Texas
                            <option value="TN" />Tennessee
                            <option value="WI" />Wisconsin
                            <option value="CT" />Connecticut
                            <option value="DE" />Delaware
                            <option value="FL" />Florida
                            <option value="GA" />Georgia
                            <option value="IN" />Indiana
                            <option value="ME" />Maine
                            <option value="MD" />Maryland
                            <option value="MA" />Massachusetts
                            <option value="MI" />Michigan
                            <option value="NH" />New Hampshire
                            <option value="NJ" />New Jersey
                            <option value="NY" />New York
                            <option value="NC" />North Carolina
                            <option value="OH" />Ohio
                            <option value="PA" />Pennsylvania
                            <option value="RI" />Rhode Island
                            <option value="SC" />South Carolina
                            <option value="VT" />Vermont
                            <option value="VA" />Virginia
                            <option value="WV" />West Virginia
                        </select>
                    </div>
                    <div class="field-box">
                        <label>Select2 多选:</label>
                        <select style="width:250px" multiple="" class="select2">
                            <option />
                            <option value="AK" />Alaska
                            <option value="HI" selected="" />Hawaii
                            <option value="CA" />California
                            <option value="NV" />Nevada
                            <option value="OR" />Oregon
                            <option value="WA" />Washington
                            <option value="AZ" />Arizona
                            <option value="CO" />Colorado
                            <option value="ID" />Idaho
                            <option value="MT" />Montana
                            <option value="NE" />Nebraska
                            <option value="NM" />New Mexico
                            <option value="ND" />North Dakota
                            <option value="UT" />Utah
                            <option value="WY" />Wyoming
                            <option value="AL" />Alabama
                            <option value="AR" />Arkansas
                            <option value="IL" />Illinois
                            <option value="IA" />Iowa
                            <option value="KS" />Kansas
                            <option value="KY" />Kentucky
                            <option value="LA" />Louisiana
                            <option value="MN" />Minnesota
                            <option value="MS" />Mississippi
                            <option value="MO" />Missouri
                            <option value="OK" />Oklahoma
                            <option value="SD" />South Dakota
                            <option value="TX" />Texas
                            <option value="TN" />Tennessee
                            <option value="WI" />Wisconsin
                            <option value="CT" />Connecticut
                            <option value="DE" />Delaware
                            <option value="FL" />Florida
                            <option value="GA" />Georgia
                            <option value="IN" />Indiana
                            <option value="ME" />Maine
                            <option value="MD" />Maryland
                            <option value="MA" />Massachusetts
                            <option value="MI" />Michigan
                            <option value="NH" />New Hampshire
                            <option value="NJ" />New Jersey
                            <option value="NY" />New York
                            <option value="NC" />North Carolina
                            <option value="OH" />Ohio
                            <option value="PA" />Pennsylvania
                            <option value="RI" />Rhode Island
                            <option value="SC" />South Carolina
                            <option value="VT" />Vermont
                            <option value="VA" />Virginia
                            <option value="WV" />West Virginia
                        </select>
                    </div>
                    <div class="field-box">
                        <label>输入前置 & 追加:</label>
                        <div class="input-prepend">
                            <span class="add-on">@</span>
                            <input class="input-large" type="text" />
                        </div>
                        <div class="input-append">
                            <input class="input-large" type="text" />
                            <span class="add-on">.00</span>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>日期:</label>
                        <input type="text" value="03/29/2014" class="input-large datepicker" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->

<!-- scripts for this page -->
<script src="/admin/js/wysihtml5-0.3.0.js"></script>
<script src="/admin/js/jquery-latest.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/bootstrap-wysihtml5-0.0.2.js"></script>
<script src="/admin/js/bootstrap.datepicker.js"></script>
<script src="/admin/js/jquery.uniform.min.js"></script>
<script src="/admin/js/select2.min.js"></script>
<script src="/admin/js/theme.js"></script>

<!-- call this page plugins -->
<script type="text/javascript">
    $(function () {

        // add uniform plugin styles to html elements
        $("input:checkbox, input:radio").uniform();

        // select2 plugin for select elements
        $(".select2").select2({
            placeholder: "Select a State"
        });

        // datepicker plugin
        $('.datepicker').datepicker().on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        // wysihtml5 plugin on textarea
        $(".wysihtml5").wysihtml5({
            "font-styles": false
        });
    });
</script>

</body>
</html>