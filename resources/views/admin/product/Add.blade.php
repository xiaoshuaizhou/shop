@include('./../../layouts/sidebar')


<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span8 column">
                    <form  action="{{url('admin/product/create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="field-box">
                        <label>商品分类:</label>
                        <div class="ui-select">
                            <select name="cateid">
                                @foreach($cats as $cat)
                                <option value="{{$cat->cateid}}" />{{$cat->title}}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>商品名称</label>
                        <input class="span8" name="title" type="text" value="{{old('title')}}" />
                        @if ($errors->has('title'))
                            <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field-box">
                        <label>商品描述:</label>
                        <div class="wysi-column span10">
                            <textarea id="wysi" name="descr" class="span8 wysihtml5" rows="5">{{old('descr')}}</textarea>
                            @if ($errors->has('descr'))
                                <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('descr') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="field-box">
                        <label>商品价格</label>
                        <input class="span8" name="price" type="text" value="{{old('price')}}" />
                        @if ($errors->has('price'))
                            <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field-box">
                        <label>是否热卖:</label>
                        <div class="span8">
                            <label class="radio">
                                <input type="radio" name="ishot" id="optionsRadios1" value="1" checked="" />
                                是
                            </label>
                            <label class="radio">
                                <input type="radio" name="ishot" id="optionsRadios2" value="0" />
                                否
                            </label>
                            @if ($errors->has('ishot'))
                                <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('ishot') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="field-box">
                        <label>是否促销:</label>
                        <div class="span8">
                            <label class="radio">
                                <input type="radio" name="issale" id="optionsRadios1" value="1" checked="" />
                                是
                            </label>
                            <label class="radio">
                                <input type="radio" name="issale" id="optionsRadios2" value="0" />
                                否
                            </label>
                            @if ($errors->has('issale'))
                                <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('issale') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="field-box">
                        <label>促销价格</label>
                        <input class="span8" name="saleprice" type="text" value="{{old('saleprice')}}" />
                        @if ($errors->has('saleprice'))
                            <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('saleprice') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field-box">
                        <label>库存</label>
                        <input class="span8" name="num" type="text"  value="{{old('num')}}"/>
                        @if ($errors->has('num'))
                            <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('num') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field-box">
                        <label>是否上架:</label>
                        <div class="span8">
                            <label class="radio">
                                <input type="radio" name="ison" id="optionsRadios1" value="1" checked="" />
                                是
                            </label>
                            <label class="radio">
                                <input type="radio" name="ison" id="optionsRadios2" value="0" />
                                否
                            </label>
                            @if ($errors->has('ison'))
                                <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('ison') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="field-box">
                        <label>是否推荐:</label>
                        <div class="span8">
                            <label class="radio">
                                <input type="radio" name="istui" id="optionsRadios1" value="1" checked=""  />
                                是
                            </label>
                            <label class="radio">
                                <input type="radio" name="istui" id="optionsRadios2" value="0" />
                                否
                            </label>
                            @if ($errors->has('istui'))
                                <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('istui') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="field-box">
                        <label>图片封面:</label>

                        <div class="span3 avatar-box">
                            <div class="personal-image">
                                <img src="" class="avatar img-circle" />
                                <input type="file" name="cover" />
                            </div>
                        </div>
                        @if ($errors->has('cover'))
                            <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('cover') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field-box">
                        <label>商品图片:</label>

                        <div class="span3 avatar-box">
                            <div class="personal-image">
                                <img src="" class="avatar img-circle" />
                                <input name="pics[]" type="file" />
                            </div>
                        </div>
                        @if ($errors->has('pics'))
                            <span class="invalid-feedback error">
                                    <strong style="font-color:red;">{{ $errors->first('pics') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div id="parent" class="field-box"></div>

                    <div class="field-box">
                        <button type="button" name="pics[]" id="btn" class="icon-plus btn btn-glow btn-flat success  ">添加图片</button>
                    </div>

                    <div class="span11 field-box actions">
                        <input type="submit" class="btn btn-primary" value="创建商品" />
                        <span>或者</span>
                        <input type="reset" value="取消" class="reset" />
                    </div>
                    </form>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger span10 inline-input">
                            <ul style="color:red; text-align: center;">
                                @foreach ($errors->all() as $error)
                                    <ol style="text-align: center;">{{ $error }}</ol>
                                @endforeach
                            </ul>
                        </div>
                    @elseif (count($errors->success) > 0)
                        <div class="alert alert-success span10 inline-input">
                            <ul style="color:green; text-align: center;">
                                <ol style="text-align: center;">添加成功</ol>
                            </ul>
                        </div>
                    @endif
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
    //添加商品图片
    $('#btn').on('click',function(){
        $('#parent').append('' +
            "<div class=\"span3 avatar-box\">\n" +
                "<div class=\"personal-image\">\n" +
                    "<img src=\"\" class=\"avatar img-circle\" />\n" +
                    "<input name=\"pics[]\" type=\"file\" />\n" +
                    "<button type=\"button\" id=\"btnmins\" class=\"icon-minus btn btn-glow btn-flat warning  \">删除图片</button>\n" +
                "</div>\n" +
            "</div>\n"
        )
    });
    //删除图片
    $(document).on('click','.icon-minus',function(){
        $(this).parents(".avatar-box").remove();
    });
</script>

</body>
</html>