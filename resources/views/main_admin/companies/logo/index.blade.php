@extends('layouts.app_customer')
@section('styles')
    <!-- FYI: it has a demo CSS file concatinated, about 1kb, you can remove it from build.js if needed -->
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/cropperjs/cropper.css">
    <!-- page related demo css (for icons only) -->
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/fa-solid.css">
    </head>
    @endsection
@section('content')





    <div class="container">


        <div class="demo">

            <button onclick="clearLogoAdding()" type="button" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg-logo">
                <span class="fal fa-plus  mr-1"></span>
                Создать новый логотип 2</button>
        </div>


        <div id="panel-7" class="panel">
            <div class="panel-hdr">
                <h2>
                    Таблица  <span class="fw-300"><i>всех логотипов компании</i></span>
                </h2>
                <div class="panel-toolbar">
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        Вы можете редактировать информацию нажав на  <a href="utilities_color_pallet.html" title="Color Pallets">карандаш</a> справа от информации
                    </div>
                    <h5 class="frame-heading">
                        Логотипы
                    </h5>
                    <div id="loader">
                        <div class="border p-3">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-tag result_of_logos_table">


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="modalOneModal" class="modal fade default-example-modal-right-lg-logo" tabindex="-1" role="dialog" aria-labelledby="modalOneLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Форма добавления логотипа</h5>
                    <input class="sending_logo_id" type="hidden" value="0">
                    <button type="button" class="close" onclick="refreshImg()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="logo_create" novalidate onsubmit="theSubmitFunction(); return false;">
                    <div class="form-group">
                        <label class="form-label" for="logo_name">Название логотипа</label>
                        <input type="text" id="logo_name" name="logo_name" class="form-control" required placeholder="Название логотипа компании">
                    </div>



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
                                                        <div class="docs-data">
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text" for="dataX">X</label>
                                                                </span>
                                                                <input type="text" class="form-control" id="dataX" placeholder="x">
                                                                <span class="input-group-append">
                                                                    <span class="input-group-text">px</span>
                                                                </span>
                                                            </div>
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text" for="dataY">Y</label>
                                                                </span>
                                                                <input type="text" class="form-control" id="dataY" placeholder="y">
                                                                <span class="input-group-append">
                                                                    <span class="input-group-text">px</span>
                                                                </span>
                                                            </div>
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text" for="dataWidth">Width</label>
                                                                </span>
                                                                <input type="text" class="form-control" id="dataWidth" placeholder="width">
                                                                <span class="input-group-append">
                                                                    <span class="input-group-text">px</span>
                                                                </span>
                                                            </div>
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text" for="dataHeight">Height</label>
                                                                </span>
                                                                <input type="text" class="form-control" id="dataHeight" placeholder="height">
                                                                <span class="input-group-append">
                                                                    <span class="input-group-text">px</span>
                                                                </span>
                                                            </div>
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text" for="dataRotate">Rotate</label>
                                                                </span>
                                                                <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                                                                <span class="input-group-append">
                                                                    <span class="input-group-text">deg</span>
                                                                </span>
                                                            </div>
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text" for="dataScaleX">ScaleX</label>
                                                                </span>
                                                                <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                                                            </div>
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text" for="dataScaleY">ScaleY</label>
                                                                </span>
                                                                <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                                                            </div>
                                                        </div>
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
                                                            <button class="formLogo btn btn-success" style="display:none" type="button"  data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
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
                                                            <label class="btn btn-primary active">
                                                                <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 16 / 9">
                                                                    16:9
                                                                </span>
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 4 / 3">
                                                                    4:3
                                                                </span>
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 1 / 1">
                                                                    1:1
                                                                </span>
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 2 / 3">
                                                                    2:3
                                                                </span>
                                                            </label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: NaN">
                                                                    Free
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
                                                            <label class="btn btn-primary">
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
                                                            </label>
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
                            <button type="button" class="logo_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="logo_create btn btn-primary waves-effect waves-themed">Сохранить</button>
                        </div>

                </form>
                </div>

            </div>
        </div>







    </div>

    <div class="modal modal-al modal-alert fade" id="getCroppedCanvasModal" tabindex="-1" aria-labelledby="getCroppedCanvasTitle" role="dialog" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="getCroppedCanvasTitle">Изображение записано в базу данных</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    Осталось сохранит запись о логотипе...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')




    <script src="/NewSmartAdmin/js/formplugins/cropperjs/cropper.js"></script>
    <script>


        var modal_lv = 0;
        $('.modal').on('shown.bs.modal', function (e) {
            $('.modal-backdrop:last').css('zIndex',1051+modal_lv);
            $(e.currentTarget).css('zIndex',1052+modal_lv);
            modal_lv++
        });

        $('.modal').on('hidden.bs.modal', function (e) {
            modal_lv--
        });




        $(document).ready(function() {
            $('#logo_create').submit(function(evt){
                evt.preventDefault();// to stop form submitting
            });
        });


        function theSubmitFunction (){
            console.log(222)
            var form=$('#logo_create')
            if (form[0].checkValidity() === false) {

            }
            else{

                var logo_name=$('#logo_name').val()
                var logo_id=$('.sending_logo_id').val()
                var company_id=$('#company_id').val()

                console.log(logo_name)

                window.logo_name=logo_name
                window.logo_id=logo_id
                $('.formLogo').trigger('click')

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
                                        url: '/company/logo/saveLogoToSession',
                                        data: {logo: result.toDataURL(uploadedImageType)
                                        },
                                        beforeSend: function() {
                                            console.log(0)
                                        },
                                        complete: function() {
                                            console.log(333)
                                            logoCreation()

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

        function logoCreation(){

            var logo_name=$('#logo_name').val()
            var id=$('#logo_id').val()
            //var company_id=$('#company_id').val()
            console.log(222,window.company_id)
            console.log(223,window.logo_id)
            console.log(logo_name)

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async: false,
                url: '/company/logo/create',
                data: {
                    company_id: company_id, logo_name: logo_name,id:window.logo_id
                },
                beforeSend: function () {
                },
                complete: function () {
                    $('.logo_create_close').click();
                    reloadData();
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

        reloadData();
        function reloadData(){
            var module='admin.main_admin.company.logo.data'
            var url='/company/logo/data';
            $.ajax({
                method: 'POST',
                dataType: 'html',
                async:true,
                url: url,
                data: {module: module},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                success: function (data) {

                    $('.result_of_logos_table').html(data);

                }
            });


        }



        function refreshImg(){
            $("#image").removeAttr("src");
        }

        function clearLogoAdding(){





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










            $('#logo_name').val('')

            $('.sending_logo_id').val(0)

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
