@extends('layouts.app_admin')
@section('styles')
    <!-- FYI: it has a demo CSS file concatinated, about 1kb, you can remove it from build.js if needed -->
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/cropperjs/cropper.css">
    <!-- page related demo css (for icons only) -->
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/fa-solid.css">
    <link href="{!! asset('/inspinia/css/plugins/iCheck/custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('/css/style_admin.css') !!}" rel="stylesheet">
    <link href="{!! asset('/inspinia/css/plugins/iCheck/custom.css') !!}" rel="stylesheet">





    <style>
        .cat_block:hover{
            background:#ee9;
        }
        .cat_block{
            padding:10px 15px;

        }
        .block_main_categories{
            width:24%;
            height:350px;
            border:1px solid #0000cc;
            overflow-y:auto;
            display:inline-block;

        }
        .wizard-big.wizard > .content {
            min-height: 1620px;
        }

        .ibox-content {
            clear: both;
        }
        .ibox-content {
            background-color: #ffffff;
            color: inherit;
            padding: 15px 20px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
        }
        .ibox-title {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #ffffff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 2px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 15px 15px 7px;
            min-height: 48px;
        }
        .float-e-margins .btn {
            margin-bottom: 5px;
        }
        .btn-success {
            background-color: #1c84c6;
            border-color: #1c84c6;
            color: #FFFFFF;
        }
        .btn-w-m {
            min-width: 120px;
        }

        .btn {
            border-radius: 3px;
        }
        .btn-rounded {
            border-radius: 50px;
        }
        .btn-outline {
            color: inherit;
            background-color: transparent;
            transition: all .5s;
        }
        .btn-danger {
            background-color: #ed5565;
            border-color: #ed5565;
            color: #FFFFFF;
        }
    </style>




    </head>
    @endsection
@section('content')



    <div id="main" role="main" style="">

        <!-- MAIN CONTENT -->
        <div id="content">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Wizard</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Forms</a>
                        </li>
                        <li class="active">
                            <strong>Wizard</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>




            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Вы можете выбрать категории которые будут использоваться на вашем сайте</h5>



                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h2>
                                Форма выбора категорий
                            </h2>
                            <p>
                                Выбранные категории будут доступны для наполнения в вашем интернет магазине
                            </p>

                            <div class="row">
                                <div class="col-sm-12" >
                                    <p class="font-bold">
                                        При выборе категории автоматически будут выбраны родительские категории а также все дочерние
                                    </p> <input class="parent_category required" name="parent_id" type="text" value="">
                                    <div class="categories">
                                        <div class="block_main_categories cat_block_1" style="">

                                            <? $i=0;?>
                                            @foreach ($categories as $key=>$category)
                                                @if($category->parent_id==0)
                                                    @if($i==0)
                                                        <div>



                                                            <input type="hidden" class="category_level" value="{{$category->parent_id}}">
                                                            <button class="add_category_into_level" type="button"  ><i class="fa fa-plus" ></i>Добавить категорию в уровень</button>

                                                        </div>
                                                    @endif
                                                    <a >

                                                        <div  class="cat_block" >

                                                            <input  class="fahover_cubes_input" type="hidden" value="{{$category->id}}">
                                                            <button style="background:red;color:white" class="delete_cat"><i class="fa fa-trash"></i></button>
                                                            <button class="edit_cat"><i class="fa fa-pencil"></i></button>
                                                            <button class="picture_cat" data-toggle="modal" data-target=".default-example-modal-right-lg-slider"><i class="fas fa-camera-retro"></i></i></button>

                                                            <!--div style="display:inline-block" class="i-checks">
                                                                <label> <input class="category_checkbox" type="checkbox" {{$category->checked}} value=""> </label>
                                                            </div-->


                                                            <span style="position:relative;padding-left:20px;">{{$category->name}}</span>

                                                            <span class="fa arrow" style="float:right"></span>
                                                        </div></a>
                                                        <?$i++;?>
                                                @endif
                                            @endforeach

                                        </div>

                                        <div class="block_main_categories cat_block_2" >


                                        </div>
                                        <div class="block_main_categories cat_block_3" >


                                        </div>
                                        <div class="block_main_categories cat_block_4" >


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <button type="button" class="btn_save_categories btn btn-primary btn-lg">Сохранить изменения</button>
                            </div>




                        </div>
                    </div>
                </div>

            </div>









            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center m-t-lg">
                            <h1>
                                Welcome in Magelan Laravel Starter Project
                            </h1>
                            <small>
                                It is an application skeleton for a typical web ecommerce app. You can use it to quickly bootstrap your webapp projects.
                            </small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="dialog_simple" title="Dialog Simple Title">

    </div>

    <!-- Modal center Large -->
    <div class="modal fade default-example-modal-lg-center"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="change_or_add_category">

                        <fieldset>
                            <input name="authenticity_token" type="hidden">
                            <div class="form-group">
                                <label>Ссылка</label>
                                <input class="form-control" id="tab_title" value="" placeholder="Text field" type="text">
                            </div>

                            <div class="form-group">
                                <label>Название категории</label>
                                <input class="form-control" id="cat_name" value="" placeholder="Text field" type="text">
                            </div>

                            <div class="form-group">
                                <label>Иконка категории  <a href="https://fontawesome.com/">Font Awesome</a></label>
                                <input class="form-control" id="icon_name" value="" placeholder="<i class='fas fa-camera-retro'></i>" type="text">
                            </div>
                        </fieldset>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- Modal center Large -->
    <div class="modal fade default-example-modal-right-lg-slider"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Форма добавления фото в корневую категорию</h5>
                    <input class="sending_slider_id" type="hidden" value="0">
                    <button type="button" class="close" onclick="refreshImg()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="slider_create" novalidate onsubmit="theSubmitFunction(); return false;">
                        <!-- BEGIN Page Content -->
                        <!-- the #js-page-content id is needed for some plugins to initialize -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Advanced <span class="fw-300"><i>Example</i></span>
                                        </h2>
                                        <div class="panel-toolbar">
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            <!-- Content -->
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-xl-9">
                                                        <!-- <h3>Demo:</h3> -->
                                                        <div class="img-container" style="min-height:250px !important;max-height:250px !important;height:250px !important;">
                                                            <img id="image" src="/NewSmartAdmin/img/demo/gallery/3.jpg" alt="Picture">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <!-- <h3>Preview:</h3> -->
                                                        <div class="docs-preview clearfix">
                                                            <div class="img-preview preview-lg"></div>
                                                            <div class="img-preview preview-md"></div>
                                                            <div class="img-preview preview-sm"></div>
                                                            <div class="img-preview preview-xs"></div>
                                                        </div>
                                                        <!-- <h3>Data:</h3> -->

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-9 docs-buttons">
                                                        <!-- <h3>Toolbar:</h3> -->
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
                                                                    <span class="fas fa-arrows"></span>
                                                                </span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
                                                                    <span class="fas fa-crop"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;zoom&quot;, 0.1)">
                                                                    <span class="fas fa-search-plus"></span>
                                                                </span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;zoom&quot;, -0.1)">
                                                                    <span class="fas fa-search-minus"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, -10, 0)">
                                                                    <span class="fas fa-arrow-left"></span>
                                                                </span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, 10, 0)">
                                                                    <span class="fas fa-arrow-right"></span>
                                                                </span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, 0, -10)">
                                                                    <span class="fas fa-arrow-up"></span>
                                                                </span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, 0, 10)">
                                                                    <span class="fas fa-arrow-down"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;rotate&quot;, -45)">
                                                                    <span class="fas fa-undo"></span>
                                                                </span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;rotate&quot;, 45)">
                                                                    <span class="fas fa-redo"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;scaleX&quot;, -1)">
                                                                    <span class="fas fa-arrows-h"></span>
                                                                </span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;scaleY&quot;, -1)">
                                                                    <span class="fal fa-arrows-v"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary" data-method="crop" title="Crop">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;crop&quot;)">
                                                                    <span class="fas fa-check"></span>
                                                                </span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;clear&quot;)">
                                                                    <span class="fas fa-times"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;disable&quot;)">
                                                                    <span class="fas fa-lock"></span>
                                                                </span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;enable&quot;)">
                                                                    <span class="fas fa-unlock"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;reset&quot;)">
                                                                    <span class="fas fa-sync"></span>
                                                                </span>
                                                            </button>
                                                            <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                                                                <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="Import image with Blob URLs">
                                                                    <span class="fas fa-image mr-1"></span> Upload
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <button type="button" class="btn btn-danger" data-method="destroy" title="Destroy">
                                                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;destroy&quot;)">
                                                                <span class="fas fa-power-off"></span>
                                                            </span>
                                                        </button>
                                                        <div class="btn-group btn-group-crop">
                                                            <button class="formslider btn btn-success" style="display:none" type="button"  data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;getCroppedCanvas&quot;, { maxWidth: 4096, maxHeight: 4096 })">
                                                                    Сформировать логотип
                                                                </span>
                                                            </button>

                                                        </div>
                                                        <!-- Show the cropped image in modal -->













                                                        <div class="modal fade docs-cropped" id="getCroppedCanvasModal2" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body"></div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal -->



                                                    </div>
                                                    <!-- /.docs-buttons -->
                                                    <div class="col-lg-3 docs-toggles">
                                                        <!-- <h3>Toggles:</h3> -->
                                                        <div class="btn-group btn-group-sm d-flex flex-nowrap" data-toggle="buttons">
                                                            <label class="btn btn-primary">
                                                                <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 1 / 1">
                                                                    1:1
                                                                </span>
                                                            </label>

                                                        </div>
                                                        <div class="btn-group d-flex flex-nowrap" data-toggle="buttons">
                                                            <label class="btn btn-primary active">
                                                                <input type="radio" class="sr-only" id="viewMode0" name="viewMode" value="0" checked>
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="View Mode 0">
                                                                    VM0
                                                                </span>
                                                            </label>
                                                            <!--label class="btn btn-primary">
                                                                <input type="radio" class="sr-only" id="viewMode1" name="viewMode" value="1">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="View Mode 1">
                                                                    VM1
                                                                </span>
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" class="sr-only" id="viewMode2" name="viewMode" value="2">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="View Mode 2">
                                                                    VM2
                                                                </span>
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" class="sr-only" id="viewMode3" name="viewMode" value="3">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="View Mode 3">
                                                                    VM3
                                                                </span>
                                                            </label-->
                                                        </div>

                                                        <!-- /.dropdown -->
                                                    </div>
                                                    <!-- /.docs-toggles -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- this overlay is activated only when mobile menu is triggered -->



                        <div class="modal-footer">
                            <button type="button" class="slider_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="slider_create btn btn-primary waves-effect waves-themed">Сохранить</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--div id="addtab" title="Изменение названия категории">

        <form>

            <fieldset>
                <input name="authenticity_token" type="hidden">
                <div class="form-group">
                    <label>Ссылка</label>
                    <input class="form-control" id="tab_title" value="" placeholder="Text field" type="text">
                </div>

                <div class="form-group">
                    <label>Название категории</label>
                    <input class="form-control" id="cat_name" value="" placeholder="Text field" type="text">
                </div>
            </fieldset>

        </form>

    </div-->




@endsection

@section('scripts')
    <!-- iCheck -->
    <!--script src="{!! asset('/inspinia/js/plugins/iCheck/icheck.min.js') !!}"></script-->




    <script src="/NewSmartAdmin/js/formplugins/cropperjs/cropper.js"></script>

    <script>
        $(document).ready(function () {
            console.log(789);
            checked_categories=[];
            <?php if(isset($json)){?>
                checked_categories=eval('<?php echo $json;?>');
            <?php } ?>

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    ///////////////////////////////////////////////



    <script>

        var form = $(".default-example-modal-lg-center").submit(function (event) {

            console.log(event.target.elements[2].value)
            console.log(event.target.elements[2].value)
            console.log(window.cat_id)
            var level = window.level
            if (window.cat_id == null && window.parent_cat_id != null) {
                console.log('add')
                var action = 'add'
                var parent_id=window.parent_cat_id
            }
            else {
                console.log('edit')
                var action = 'edit'
                var parent_id=window.cat_id
                console.log('window.parent_cat_id=<=>',window.parent_cat_id)
                var id_cat=window.parent_cat_id
            }

            $.ajax({
                url: '/admin/change_category_name', // point to server-side PHP script
                dataType: 'json',  // what to expect back from the PHP script, if anything
                cache: false,
                data: {
                    icon: event.target.elements[4].value,
                    name: event.target.elements[3].value,
                    link: event.target.elements[2].value,
                    id: window.cat_id,
                    parent_id:parent_id,
                    action: action
                },
                type: 'post',
                success: function (data) {
                    console.log(data)
                    if(window.cat_id == null && window.parent_cat_id != null){
                        console.log('window.cat_id1=>',id_cat)
                        var id_cat=window.parent_cat_id
                    }
                    else{
                        console.log('window.cat_id2=>',id_cat)
                        var id_cat=data.cat.parent_id
                    }
                    window.parent_cat_id = null;
                    console.log('window.cat_id=>',id_cat)
                    console.log('window.new_block_cl=>',window.new_block_cl)
                    show_subcut(id_cat,window.new_block_cl)
                    console.log('here modal submit')
                }
            });


            $(".default-example-modal-lg-center").modal('hide')
            event.preventDefault();
        });


        function checkValue(value,arr){
            var status = 'Not exist';

            for(var i=0; i<arr.length; i++){
                var name = arr[i];
                if(name == value){
                    status = 'Exist';
                    break;
                }
            }

            return status;
        }


        //Установка чекбоксов по всем подкатегориям если он активен
        $('.categories').delegate('input','ifChecked',function(event) {

            var id_cat=$(this).parent('div').parent('label').parent('div').parent('div').find('.fahover_cubes_input').val();
            console.log('id_cat',id_cat);
            if(checkValue(id_cat,checked_categories)=='Not exist'){checked_categories.push(id_cat);}
            //alert(event.type + ' callback');
            //Найти все подкатегории во всех уровнях и поставить checkbox on

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: "/show_subcat_all_levels",
                data: {id_cat: id_cat}, // serializes the form's elements.
                success: function (data) {

                    $.each( data, function( key, value ) {
                        //Если в этом массиве
                        //alert(key+' -> '+value.name)
                        // Добавить в глобальную переменную все айдишники категорий
                        if(checkValue(value.id,checked_categories)=='Not exist'){checked_categories.push(value.id);}
                        //TODO Найти родительские категории
                        //       alert(window.checked_categories)

                    });
                }
            });

            // Найти элемент на экране которому соответствует данный id_cat и эмитировать click
            var id_cat_input=$('.fahover_cubes_input[value="'+id_cat+'"]').parent('.cat_block')
            id_cat_input.click();
            //Обновить предыдущий блок категорий
            //

            //перегрузить предыдущий блок с родительскими категориями
            //определение блока в котором произошел клик #class


            var block_class=$(this).parent('div').parent('label').parent('div').parent('div').parent('a').parent('div').attr('class');
            block_class=block_class.replace('block_main_categories ', '');
            //alert(block_class)
            reload_parent_blocks(id_cat,block_class);
//alert('installing')
            //alert(checked_categories)

        });

        $('.categories').delegate('input','ifUnchecked',function(event) {


            var id_cat=$(this).parent('div').parent('label').parent('div').parent('div').find('.fahover_cubes_input').val()

            //alert(id_cat)
            //id блока в котором расположены категории
            //var id_block=$(this).parent('div').parent('label').parent('div').parent('div').find('.fahover_cubes_input').parent('.cat_block').attr('class')
            //alert(id_block)
            if(checkValue(id_cat,checked_categories)=='Exist'){
                console.log('id_cat',id_cat);
                //checked_categories.splice($.inArray(itemtoRemove, checked_categories),1);

                checked_categories = jQuery.grep(checked_categories, function(value) {
                    return value != id_cat;
                });
            }
            //alert(checked_categories)
            //alert(event.type + ' callback');
            //Найти все подкатегории во всех уровнях и поставить checkbox on

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: "/show_subcat_all_levels_back",
                data: {id_cat: id_cat}, // serializes the form's elements.
                success: function (data) {
                    console.log('show_subcat_all_levels_back',data);
                    //alert(checked_categories)
                    $.each( data, function( key, value ) {
                        //Если в этом массиве
                        //alert(value.id+' -> '+value.name)
                        // Добавить в глобальную переменную все айдишники категорий
                        if(checkValue(value.id,checked_categories)=='Exist'){

                            checked_categories = jQuery.grep(checked_categories, function(val) {
                                return val != value.id;
                            });
                            // checked_categories.splice($.inArray(value.id,checked_categories),1);

                        }

                    });
                }
            });

            //обнулить все соседние блоки справа с категориями
            // Найти элемент на экране которому соответствует данный id_cat и эмитировать click
            var id_cat_input=$('.fahover_cubes_input[value="'+id_cat+'"]').parent('.cat_block')
            id_cat_input.click();
            //перегрузить предыдущий блок с родительскими категориями

        });

        function reload_parent_blocks(id_cat,block_class){

//Если родительский блок не равен .cat_block_1
            if(block_class=='cat_block_1'){
                // alert('Exit');
                return true;
            }
            else{
//Понижение класса блока (was -> cat_block_2) (is -> cat_block_1)
                block_num =block_class.charAt ( block_class.length - 1 );
                block_num=block_num-1;
                block_class=block_class.slice(0,-1);
                block_class=block_class+block_num
//отобразить в каждом родительском блоке категории замена id_cat вызов display_parent_blocks_categories
                display_parent_blocks_categories(block_class,id_cat)
            }
        }

        function display_parent_blocks_categories(block_class,id_cat){
//удаление всех категорий из текущего блока
            $('.'+block_class).empty();
            //AJAX заполнить категориями текущий блок
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: "/show_parent_cats",
                data: {id_cat: id_cat}, // serializes the form's elements.
                success: function (data) {
                    //alert(checked_categories)

                    $.each( data.values, function( key, value ) {
                        //alert(value.id+' -> '+value.name)
                        if(checkValue(value.id,checked_categories)=='Not exist'){

                            $('.'+block_class+'').append(' <a ><div class="cat_block" >' +
                                '<input class="fahover_cubes_input" type="hidden" value="'+value.id+'">' +

                                '<!--div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" type="checkbox" value=""> </label></div-->\n' +
                                value.name+
                                '<span class="fa arrow" style="float:right"></span>' +
                                '</div></a>')

                        }
                        else{

                            //alert(checked_categories)

                            $('.'+block_class+'').append(' <a ><div class="cat_block" >' +
                                '<input class="fahover_cubes_input" type="hidden" value="'+value.id+'">' +

                                '<!--div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" checked type="checkbox" value=""> </label></div-->\n' +
                                value.name+
                                '<span class="fa arrow" style="float:right"></span>' +
                                '</div></a>')
                        }
                    });


                    //понизить id_cat
                    //alert(data.id_cat)
                    reload_parent_blocks(data.id_cat,block_class)
                }
            });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        }

        $('.btn_save_categories').click(function(){
            cats_array=checked_categories;

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: "/save_cats_list",
                data: {cats_array: cats_array}, // serializes the form's elements.
                success: function (data) {
                    alert(data)
                    if (data=='Changes saved'){
                        alert('Изменения сохранены на диск')
                    }
                }
            });
        })
    </script>


    <script>

        function addTab() {
            // clear fields
            $("#tab_title").val("");
            $("#tab_content").val("");
        }

        function show_subcut(id_cat,new_block_cl){

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: "/show_subcat",
                data: {id_cat: id_cat}, // serializes the form's elements.
                success: function (data) {
console.log('new_block_cl',new_block_cl)
                    if(data.message=='null'){
                        console.log(333)
                        //проверить чтобы соседние последующие блоки были пусты

                        //если (data.value.info.parent_num) ==2
                        //удалить 3,4
                        // если (data.value.info.parent_num) ==3
                        //4
                        if(data.value.info.parent_num==1){
                            $('.cat_block_2').empty();
                            $('.cat_block_3').empty();
                            $('.cat_block_4').empty();
                        }
                        if(data.value.info.parent_num==2){
                            $('.cat_block_3').empty();
                            $('.cat_block_4').empty();
                        }
                        else if(data.value.info.parent_num==3){
                            $('.cat_block_4').empty();
                        }

                        console.log(data)
                                $('.' + new_block_cl + '').append('<div>' +

                                    '<input type="hidden" class="category_level" value="' + data.value.id + '">' +
                                    '<button class="add_category_into_level"><i class="fa fa-plus"></i>Добавить категорию в уровень</button>' +

                                    '</div>')


                    }
                    else{

                        $('.'+new_block_cl+'').empty();
                        switch(new_block_cl){
                            case 'cat_block_2':
                                $('.cat_block_3').empty();
                                $('.cat_block_4').empty();
                                break;
                            case 'cat_block_3':
                                $('.cat_block_4').empty();
                                break;

                        }

                        if(new_block_cl=='cat_block_4'){
                            console.log(123)
                            $.each( data.value, function( key, value ) {

                                if(checkValue(value.id,checked_categories)=='Not exist') {

                                    $('.' + new_block_cl + '').append(' <a ><div class="cat_block" >' +
                                        '<input class="fahover_cubes_input" type="hidden" value="' + value.id + '">' +

                                        '<!--div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" type="checkbox" value=""> </label></div-->\n' +
                                        value.name +
                                        '</div></a>')
                                }
                                else{
                                    $('.' + new_block_cl + '').append(' <a ><div class="cat_block" >' +
                                        '<input class="fahover_cubes_input" type="hidden" value="' + value.id + '">' +

                                        '<!--div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" checked type="checkbox" value=""> </label></div-->\n' +
                                        value.name +
                                        '</div></a>')
                                }

                            });

                        }
                        else{
console.log('new_block_cl ELSE')
                            $.each( data.value, function( key, value ) {

                                if(key==0){
                                    console.log(key)
                                    $('.'+new_block_cl+'').append('<div>'+

                                        '<input type="hidden" class="category_level" value="'+value.parent_id+'">'+
                                        '<button class="add_category_into_level"><i class="fa fa-plus"></i>Добавить категорию в уровень</button>'+

                                        '</div>')
                                }

                                if(checkValue(value.id,checked_categories)=='Not exist'){

                                    $('.'+new_block_cl+'').append(' <a ><div class="cat_block" >' +
                                        '<input class="fahover_cubes_input" type="hidden" value="'+value.id+'">' +
                                        '<button style="background:red;color:white" class="delete_cat"><i class="fa fa-trash"></i></button>'+
                                        '<button class="edit_cat"><i class="fa fa-pencil"></i></button>'+
                                        '<!--div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" type="checkbox" value=""> </label></div-->\n' +
                                        value.name+
                                        '<span class="fa arrow" style="float:right"></span>' +
                                        '</div></a>')

                                }
                                else{

                                    //alert(checked_categories)

                                    $('.'+new_block_cl+'').append(' <a ><div class="cat_block" >' +
                                        '<input class="fahover_cubes_input" type="hidden" value="'+value.id+'">' +

                                        '<!--div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" checked type="checkbox" value=""> </label></div-->\n' +
                                        value.name+
                                        '<span class="fa arrow" style="float:right"></span>' +
                                        '</div></a>')
                                }



                            });
                        }


                    }}

            });
        }


        // modal dialog init: custom buttons and a "close" callback reseting the form inside
        $( document ).ready(function( ) {
            /*        $(function () {
             var dialog = $("#addtab").dialog({
             autoOpen: false,
             width: 600,
             resizable: false,
             modal: true,
             buttons: [{
             html: "<i class='fa fa-times'></i>&nbsp; Отмена",
             "class": "btn btn-default",
             click: function () {
             $(this).dialog("close");

             }
             }, {

             html: "<i class='fa fa-plus '></i>&nbsp; <span class='add_edit_category_btn'>Изменить</span>",
             "class": "btn btn-danger",
             click: function (e) {
             console.log('click_action')
             console.log('cat_id', window.cat_id)
             dialog.find("form").submit()
             $(this).dialog("close");
             }
             }]
             });

             var form = dialog.find("form").submit(function (event) {

             console.log(event.target.elements[2].value)
             console.log(event.target.elements[2].value)
             console.log(window.cat_id)
             var level = window.level
             if (window.cat_id == null && window.parent_id != null) {
             var action = 'add'
             }
             else {
             var action = 'edit'
             }

             $.ajax({
             url: '/admin/change_category_name', // point to server-side PHP script
             dataType: 'json',  // what to expect back from the PHP script, if anything
             cache: false,
             data: {
             name: event.target.elements[3].value,
             link: event.target.elements[2].value,
             id: window.cat_id,
             action: action
             },
             type: 'post',
             success: function () {
             window.parent_id = null;
             conlole.log('here')
             }
             });


             dialog.dialog("close");
             event.preventDefault();
             });

             })*/


            // Dialog click
           /* $('.edit_cat').click(function () {
                console.log(333)
                window.cat_id=$(this).parent().find('.fahover_cubes_input').val()
                $( "#addtab" ).dialog( "option", "title", "Изменение названия категории" );
                dialog.dialog("open");
                return false;

            });*/

            $('.categories').delegate('.delete_cat','click',function(event) {
                console.log(338)
                var cat_id=$(this).parent().find('.fahover_cubes_input').val()
                var new_block_cl=$(this).parent().parent().parent().attr('class').split(' ')[1]
                console.log('del_block_cl',new_block_cl)
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: '/admin/delete_cat',
                    data: {id_cat:cat_id}, // serializes the form's elements.
                    success: function (data) {
                console.log(data.parent_id)
                        if(data.parent_id!==0){

                        show_subcut(data.parent_id,new_block_cl)}
                        else{ location.reload()}
                    }
                });
                return false;
            })


            $('.categories').delegate('.picture_cat','click',function(event) {
                console.log(339,$(this).parent('div').find('.fahover_cubes_input').val())
                $('.sending_slider_id').val($(this).parent('div').find('.fahover_cubes_input').val())
                window.sending_slider_id=$(this).parent('div').find('.fahover_cubes_input').val()
                $('.default-example-modal-right-lg-slider').modal({show:true})

                return false;
            })



            $('.categories').delegate('.edit_cat','click',function(event) {
                console.log(334)
                window.cat_id=$(this).parent().find('.fahover_cubes_input').val()
                $('.add_edit_category_btn').text('Изменить')
                //$( "#addtab" ).dialog( "option", "title", "Изменение названия категории" );
                console.log('window.cat_id',window.cat_id)
                //dialog.dialog("open");

                $('.default-example-modal-lg-center').modal({show:true})
                return false;
            })


            $('.categories').delegate('.add_category_into_level','click',function(event) {
                console.log(334,event)
                var cl=$(this).parent().parent().attr('class').split(' ')[1];
                var simbol=parseInt(cl.slice(10))+1
                console.log('cl=>',cl)
                window.new_block_cl=cl
                //new_block_cl=cl.slice(0, 10)+simbol
                console.log('new_block_cl_add',window.new_block_cl)
                $('.default-example-modal-lg-center').modal({show:true})
                window.parent_cat_id=$(this).parent().find('.category_level').val()
                console.log('window.parent_cat_id',window.parent_cat_id)
                //dialog.dialog("open");
                return false;
            })



        })
    </script>


    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })





        $('.categories').delegate('.cat_block','click',function(){

            var id_cat = $(this).parent('a').find('input').val()
            var cl=$(this).parent('a').parent().attr('class');
            cl=cl.split(' ')[1]
            var simbol=parseInt(cl.slice(10))+1
            new_block_cl=cl.slice(0, 10)+simbol
            window.parent_cat_id=id_cat
            console.log('window.parent_cat_id==>',window.parent_cat_id)
console.log('new_block_cl_pre',new_block_cl)
            show_subcut(id_cat,new_block_cl);


            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        });


        $('.categories').delegate('.fahover_cubes','click',function() {
            var id_cat = $(this).parent('a').find('.fahover_cubes_input').val();
            $('.parent_category').val(id_cat);
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '/show_parent_categories_tree',
                data: {id_cat:id_cat}, // serializes the form's elements.
                success: function (data) {

                    $('.cat_name').html(data.name)
                }
            });
        });

        $("#form").validate({
            errorPlacement: function (error, element)
            {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                },
            }
        });

        $("#form").submit(function(event){
            var link = $('#link').val()

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '/if_link_exist',
                async:false,
                data: {link:link}, // serializes the form's elements.
                success: function (data) {
                    if(data==1){
                        $('#link_validation').css('display','block');
                        event.preventDefault();
                        return false;
                    }
                    else{
                        $('#link_validation').css('display','none');
                    }
                }

            });


        })

    </script>



    <script>


        var modal_lv = 0;
        $('.modal').on('shown.bs.modal', function (e) {
            $('.modal-backdrop:last').css('zIndex',1051+modal_lv);
            $(e.currentTarget).css('zIndex',1052+modal_lv);
            modal_lv++
            $('#aspectRatio2').click();
        });

        $('.modal').on('hidden.bs.modal', function (e) {
            modal_lv--
        });




        $(document).ready(function() {
            $('#slider_create').submit(function(evt){
                evt.preventDefault();// to stop form submitting
            });
        });


        function theSubmitFunction (){
            console.log(222)
            var form=$('#slider_create')
            if (form[0].checkValidity() === false) {

            }
            else{

                var slider_name=$('#slider_name').val()
                var slider_description=$('#slider_description').val()
                var slider_link=$('#slider_link').val()
                var slider_id=$('.sending_slider_id').val()
                var company_id=1

                console.log(slider_name)

                window.slider_name=slider_name
                window.slider_id=slider_id
                $('.formslider').trigger('click')

            }
        }



        $(function()
        {
            'use strict';

            /*var console = window.console || {
             log: function () {}
             };*/

            var URL = window.URL || window.webkitURL;
            var $image = $('#image');
            var $download = $('#download');
            var $dataX = $('#dataX');
            var $dataY = $('#dataY');
            var $dataHeight = $('#dataHeight');
            var $dataWidth = $('#dataWidth');
            var $dataRotate = $('#dataRotate');
            var $dataScaleX = $('#dataScaleX');
            var $dataScaleY = $('#dataScaleY');
            var options = {
                aspectRatio: 16 / 9,
                preview: '.img-preview',
                crop: function(e)
                {
                    $dataX.val(Math.round(e.detail.x));
                    $dataY.val(Math.round(e.detail.y));
                    $dataHeight.val(Math.round(e.detail.height));
                    $dataWidth.val(Math.round(e.detail.width));
                    $dataRotate.val(e.detail.rotate);
                    $dataScaleX.val(e.detail.scaleX);
                    $dataScaleY.val(e.detail.scaleY);
                }
            };
            var originalImageURL = $image.attr('src');
            var uploadedImageName = 'cropped.jpg';
            var uploadedImageType = 'image/jpeg';
            var uploadedImageURL;

            // Tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Cropper
            $image.on(
                {
                    ready: function(e)
                    {
                        console.log(e.type);
                    },
                    cropstart: function(e)
                    {
                        console.log(e.type, e.detail.action);
                    },
                    cropmove: function(e)
                    {
                        console.log(e.type, e.detail.action);
                    },
                    cropend: function(e)
                    {
                        console.log(e.type, e.detail.action);
                    },
                    crop: function(e)
                    {
                        console.log(e.type);
                    },
                    zoom: function(e)
                    {
                        console.log(e.type, e.detail.ratio);
                    }
                }).cropper(options);

            // Buttons
            if (!$.isFunction(document.createElement('canvas').getContext))
            {
                $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
            }

            if (typeof document.createElement('cropper').style.transition === 'undefined')
            {
                $('button[data-method="rotate"]').prop('disabled', true);
                $('button[data-method="scale"]').prop('disabled', true);
            }

            // Download
            if (typeof $download[0].download === 'undefined')
            {
                $download.addClass('disabled');
            }

            // Options
            $('.docs-toggles').on('change', 'input', function()
            {
                var $this = $(this);
                var name = $this.attr('name');
                var type = $this.prop('type');
                var cropBoxData;
                var canvasData;

                if (!$image.data('cropper'))
                {
                    return;
                }

                if (type === 'checkbox')
                {
                    options[name] = $this.prop('checked');
                    cropBoxData = $image.cropper('getCropBoxData');
                    canvasData = $image.cropper('getCanvasData');

                    options.ready = function()
                    {
                        $image.cropper('setCropBoxData', cropBoxData);
                        $image.cropper('setCanvasData', canvasData);
                    };
                }
                else if (type === 'radio')
                {
                    options[name] = $this.val();
                }

                $image.cropper('destroy').cropper(options);
            });

            // Methods
            $('.docs-buttons').on('click', '[data-method]', function()
            {
                var $this = $(this);
                var data = $this.data();
                var cropper = $image.data('cropper');
                var cropped;
                var $target;
                var result;

                if ($this.prop('disabled') || $this.hasClass('disabled'))
                {
                    return;
                }

                if (cropper && data.method)
                {
                    data = $.extend(
                        {}, data); // Clone a new one

                    if (typeof data.target !== 'undefined')
                    {
                        $target = $(data.target);

                        if (typeof data.option === 'undefined')
                        {
                            try
                            {
                                data.option = JSON.parse($target.val());
                            }
                            catch (e)
                            {
                                console.log(e.message);
                            }
                        }
                    }

                    cropped = cropper.cropped;

                    switch (data.method)
                    {
                        case 'rotate':
                            if (cropped && options.viewMode > 0)
                            {
                                $image.cropper('clear');
                            }

                            break;

                        case 'getCroppedCanvas':
                            if (uploadedImageType === 'image/jpeg')
                            {
                                if (!data.option)
                                {
                                    data.option = {};
                                }

                                data.option.fillColor = '#fff';
                            }

                            break;
                    }

                    result = $image.cropper(data.method, data.option, data.secondOption);

                    switch (data.method)
                    {
                        case 'rotate':
                            if (cropped && options.viewMode > 0)
                            {
                                $image.cropper('crop');
                            }

                            break;

                        case 'scaleX':
                        case 'scaleY':
                            $(this).data('option', -data.option);
                            break;

                        case 'getCroppedCanvas':
                            if (result)
                            {
                                // Bootstrap's Modal
                                //$('#getCroppedCanvasModal').modal().find('.modal-body').html(result);
                                // $('#getCroppedCanvasModal').modal()
                                if (!$download.hasClass('disabled'))
                                {
                                    download.download = uploadedImageName;
                                    console.log('Download',result)
                                    console.log('Download',result.toDataURL(uploadedImageType))
                                    // $download.attr('href', result.toDataURL(uploadedImageType));


                                    /*$('#download').click(function(){*/

                                    $.ajax({
                                        method: 'POST',
                                        dataType: 'json',
                                        async:false,
                                        url: '/company/photo/saveRootCatPhotoToSession',
                                        data: {root_cat_photo: result.toDataURL(uploadedImageType)
                                        },
                                        beforeSend: function() {
                                            console.log(0)
                                        },
                                        complete: function() {
                                            console.log(333)
                                            sliderCreation()

                                        },
                                        success: function (data) {
                                            console.log(111)
                                        }
                                    });
                                    /* })*/


                                }
                            }

                            break;

                        case 'destroy':
                            if (uploadedImageURL)
                            {
                                URL.revokeObjectURL(uploadedImageURL);
                                uploadedImageURL = '';
                                $image.attr('src', originalImageURL);
                            }

                            break;
                    }

                    if ($.isPlainObject(result) && $target)
                    {
                        try
                        {
                            $target.val(JSON.stringify(result));
                        }
                        catch (e)
                        {
                            console.log(e.message);
                        }
                    }
                }
            });

            // Keyboard
            $(document.body).on('keydown', function(e)
            {
                if (e.target !== this || !$image.data('cropper') || this.scrollTop > 300)
                {
                    return;
                }

                switch (e.which)
                {
                    case 37:
                        e.preventDefault();
                        $image.cropper('move', -1, 0);
                        break;

                    case 38:
                        e.preventDefault();
                        $image.cropper('move', 0, -1);
                        break;

                    case 39:
                        e.preventDefault();
                        $image.cropper('move', 1, 0);
                        break;

                    case 40:
                        e.preventDefault();
                        $image.cropper('move', 0, 1);
                        break;
                }
            });

            // Import image
            var $inputImage = $('#inputImage');

            if (URL)
            {
                $inputImage.change(function()
                {
                    var files = this.files;
                    var file;

                    if (!$image.data('cropper'))
                    {
                        return;
                    }

                    if (files && files.length)
                    {
                        file = files[0];

                        if (/^image\/\w+$/.test(file.type))
                        {
                            uploadedImageName = file.name;
                            uploadedImageType = file.type;

                            if (uploadedImageURL)
                            {
                                URL.revokeObjectURL(uploadedImageURL);
                            }

                            uploadedImageURL = URL.createObjectURL(file);
                            $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
                            $inputImage.val('');
                        }
                        else
                        {
                            window.alert('Please choose an image file.');
                        }
                    }
                });
            }
            else
            {
                $inputImage.prop('disabled', true).parent().addClass('disabled');
            }
        });

    </script>









    <script>

        function sliderCreation(){

            var slider_name=$('#slider_name').val()
            var slider_description=$('#slider_description').val()
            var slider_link=$('#slider_link').val()
            //var id=$('#slider_id').val()
            var id=window.sending_slider_id
            console.log('Slider_ID',id)
            //var company_id=$('#company_id').val()
            console.log(222,window.company_id)
            console.log(223,window.slider_id)
            console.log('slider_link',slider_link)
            console.log(slider_name)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async: false,
                url: '/company/root_cat_photos/create',
                data: {
                id:id
                },
                cache : false,
                processData: true,
                beforeSend: function () {
                },
                complete: function () {
                    $('.slider_create_close').click();
                },
                success: function (data) {

                    console.log('success')

                }
            });
        }



        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        function refreshImg(){
            $("#image").removeAttr("src");
        }

        function clearsliderAdding(){





            'use strict';

            /*var console = window.console || {
             log: function () {}
             };*/

            var URL = window.URL || window.webkitURL;
            var $image = $('#image');
            var $download = $('#download');
            var $dataX = $('#dataX');
            var $dataY = $('#dataY');
            var $dataHeight = $('#dataHeight');
            var $dataWidth = $('#dataWidth');
            var $dataRotate = $('#dataRotate');
            var $dataScaleX = $('#dataScaleX');
            var $dataScaleY = $('#dataScaleY');
            var options = {
                aspectRatio: 16 / 9,
                preview: '.img-preview',
                crop: function(e)
                {
                    $dataX.val(Math.round(e.detail.x));
                    $dataY.val(Math.round(e.detail.y));
                    $dataHeight.val(Math.round(e.detail.height));
                    $dataWidth.val(Math.round(e.detail.width));
                    $dataRotate.val(e.detail.rotate);
                    $dataScaleX.val(e.detail.scaleX);
                    $dataScaleY.val(e.detail.scaleY);
                }
            };
            var originalImageURL = $image.attr('src');
            var uploadedImageName = 'cropped.jpg';
            var uploadedImageType = 'image/jpeg';
            var uploadedImageURL;

            // Tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Cropper
            $image.on(
                {
                    ready: function(e)
                    {
                        console.log(e.type);
                    },
                    cropstart: function(e)
                    {
                        console.log(e.type, e.detail.action);
                    },
                    cropmove: function(e)
                    {
                        console.log(e.type, e.detail.action);
                    },
                    cropend: function(e)
                    {
                        console.log(e.type, e.detail.action);
                    },
                    crop: function(e)
                    {
                        console.log(e.type);
                    },
                    zoom: function(e)
                    {
                        console.log(e.type, e.detail.ratio);
                    }
                }).cropper(options);

            // Buttons
            if (!$.isFunction(document.createElement('canvas').getContext))
            {
                $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
            }

            if (typeof document.createElement('cropper').style.transition === 'undefined')
            {
                $('button[data-method="rotate"]').prop('disabled', true);
                $('button[data-method="scale"]').prop('disabled', true);
            }

            // Download
            if (typeof $download[0].download === 'undefined')
            {
                $download.addClass('disabled');
            }

            // Options
            $('.docs-toggles').on('change', 'input', function()
            {
                var $this = $(this);
                var name = $this.attr('name');
                var type = $this.prop('type');
                var cropBoxData;
                var canvasData;

                if (!$image.data('cropper'))
                {
                    return;
                }

                if (type === 'checkbox')
                {
                    options[name] = $this.prop('checked');
                    cropBoxData = $image.cropper('getCropBoxData');
                    canvasData = $image.cropper('getCanvasData');

                    options.ready = function()
                    {
                        $image.cropper('setCropBoxData', cropBoxData);
                        $image.cropper('setCanvasData', canvasData);
                    };
                }
                else if (type === 'radio')
                {
                    options[name] = $this.val();
                }

                $image.cropper('destroy').cropper(options);
            });

            // Methods
            $('.docs-buttons').on('click', '[data-method]', function()
            {
                var $this = $(this);
                var data = $this.data();
                var cropper = $image.data('cropper');
                var cropped;
                var $target;
                var result;

                if ($this.prop('disabled') || $this.hasClass('disabled'))
                {
                    return;
                }

                if (cropper && data.method)
                {
                    data = $.extend(
                        {}, data); // Clone a new one

                    if (typeof data.target !== 'undefined')
                    {
                        $target = $(data.target);

                        if (typeof data.option === 'undefined')
                        {
                            try
                            {
                                data.option = JSON.parse($target.val());
                            }
                            catch (e)
                            {
                                console.log(e.message);
                            }
                        }
                    }

                    cropped = cropper.cropped;

                    switch (data.method)
                    {
                        case 'rotate':
                            if (cropped && options.viewMode > 0)
                            {
                                $image.cropper('clear');
                            }

                            break;

                        case 'getCroppedCanvas':
                            if (uploadedImageType === 'image/jpeg')
                            {
                                if (!data.option)
                                {
                                    data.option = {};
                                }

                                data.option.fillColor = '#fff';
                            }

                            break;
                    }

                    result = $image.cropper(data.method, data.option, data.secondOption);

                    switch (data.method)
                    {
                        case 'rotate':
                            if (cropped && options.viewMode > 0)
                            {
                                $image.cropper('crop');
                            }

                            break;

                        case 'scaleX':
                        case 'scaleY':
                            $(this).data('option', -data.option);
                            break;

                        case 'getCroppedCanvas':
                            if (result)
                            {
                                // Bootstrap's Modal
                                //$('#getCroppedCanvasModal').modal().find('.modal-body').html(result);
                                // $('#getCroppedCanvasModal').modal()
                                if (!$download.hasClass('disabled'))
                                {
                                    download.download = uploadedImageName;
                                    console.log('Download',result)
                                    console.log('Download',result.toDataURL(uploadedImageType))
                                    // $download.attr('href', result.toDataURL(uploadedImageType));


                                    /*$('#download').click(function(){*/


                                    /* })*/


                                }
                            }

                            break;

                        case 'destroy':
                            if (uploadedImageURL)
                            {
                                URL.revokeObjectURL(uploadedImageURL);
                                uploadedImageURL = '';
                                $image.attr('src', originalImageURL);
                            }

                            break;
                    }

                    if ($.isPlainObject(result) && $target)
                    {
                        try
                        {
                            $target.val(JSON.stringify(result));
                        }
                        catch (e)
                        {
                            console.log(e.message);
                        }
                    }
                }
            });

            // Keyboard
            $(document.body).on('keydown', function(e)
            {
                if (e.target !== this || !$image.data('cropper') || this.scrollTop > 300)
                {
                    return;
                }

                switch (e.which)
                {
                    case 37:
                        e.preventDefault();
                        $image.cropper('move', -1, 0);
                        break;

                    case 38:
                        e.preventDefault();
                        $image.cropper('move', 0, -1);
                        break;

                    case 39:
                        e.preventDefault();
                        $image.cropper('move', 1, 0);
                        break;

                    case 40:
                        e.preventDefault();
                        $image.cropper('move', 0, 1);
                        break;
                }
            });

            // Import image
            var $inputImage = $('#inputImage');

            if (URL)
            {
                $inputImage.change(function()
                {
                    var files = this.files;
                    var file;

                    if (!$image.data('cropper'))
                    {
                        return;
                    }

                    if (files && files.length)
                    {
                        file = files[0];

                        if (/^image\/\w+$/.test(file.type))
                        {
                            uploadedImageName = file.name;
                            uploadedImageType = file.type;

                            if (uploadedImageURL)
                            {
                                URL.revokeObjectURL(uploadedImageURL);
                            }

                            uploadedImageURL = URL.createObjectURL(file);
                            $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
                            $inputImage.val('');
                        }
                        else
                        {
                            window.alert('Please choose an image file.');
                        }
                    }
                });
            }
            else
            {
                $inputImage.prop('disabled', true).parent().addClass('disabled');
            }










            $('#slider_name').val('')

            $('.sending_slider_id').val(0)

            $('#image').attr('src','/storage/badge7.png')

            $image.cropper('destroy').attr('src', '/storage/badge7.png').cropper(options);
            $('input:radio[name="aspectRatio"]').filter('[value="1"]').attr('checked', true);
            $('#aspectRatio2').parent('label').find('.docs-tooltip').trigger("click");
        }


        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();




    </script>


@endsection
