<div class="modal fade default-example-modal-right-lg" id="badges_modal" tabindex="-1" role="dialog" aria-hidden="true" style="">
    <div class="modal-dialog modal-dialog-right modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                @if(!\Auth::user())
                    <h5 class="modal-title h4 sending_badge_title">Войдите в учетную запись чтобы подать объявление</h5>
                @else
                    <h5 class="modal-title h4 sending_badge_title">Изменить объявление</h5>
                @endif
                <button type="button" class="close categoryModalClose" data-dismiss="modal" aria-label="Close" onclick="localStorage.setItem('openAddMessageModal',0);">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body" >
                <input type="hidden" id="company_id" name="company_id" >
                <div id="photoForm" >
                    <label class="form-label" >
                        Изменяем фото к объявлению
                    </label>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- Content -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-9">
                                        <!-- <h3>Demo:</h3> -->
                                        <div class="img-container" >
                                            <img id="image" src="/NewSmartAdmin/img/demo/gallery/3.jpg" alt="Picture">
                                        </div>
                                    </div>
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
                                            <label class="btn btn-primary" id="aspectRatio4Btn">
                                                <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: NaN">
                                                                    Free
                                                                </span>
                                            </label>
                                        </div>
                                        <div class="btn-group d-flex flex-nowrap" style="display:none !important" data-toggle="buttons">
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
                                        <button type="button" class="btn btn-danger" style="display:none" data-method="destroy" title="Destroy">
                                                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;destroy&quot;)">
                                                                <span class="fas fa-power-off"></span>
                                                            </span>
                                        </button>


                                        <!-- /.dropdown -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 docs-buttons" style="display:none">
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

                                        <!-- Show the cropped image in modal -->

                                        <div class="btn-group btn-group-crop">
                                            <button style="display:none" id="getCroppedCanvasBtn" class="formLogo btn btn-success"   type="button"  data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
                                                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;getCroppedCanvas&quot;, { maxWidth: 4096, maxHeight: 4096 })">
                                                                    Сохранить фото
                                                                </span>
                                            </button>

                                        </div>











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

                                    <!-- /.docs-toggles -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <form style="" class="badges_form needs-validation" id="badge_form">

                    <h3 class="badge_name"></h3>

                    <input type="hidden" class="sending_badge_user" value="">
                    <div class="form-group personal_select" >
                        <label class="form-label" >
                            Выберите вложенную категорию
                        </label>
                        <?
                        $subcats=\App\Domain\Customer\Models\ProductCategory::where('parent_id',$message->parentCategory->parent_id)->get();

                        ?>
                        <div class="form-group">
                            <select data-placeholder="Select a state..." class="js-select2-icons form-control category_select" id="multiple-icons" >
                                <optgroup label="Подкатегории">

                                    @foreach($subcats as $cat)
                                        <option value="{{$cat->id}}" data-icon="fa {{$cat->icon}} text-dark" selected="">{{$cat->name}}</option>
                                    @endforeach

                                </optgroup>

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="name-f">Контактная информация по объявлению</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text text-success">
                                                            <i class="ni ni-user fs-xl"></i>
                                                        </span>
                                </div>
                                <input type="text" aria-label="First name" class="form-control email_input" @if(empty($message->email) && empty($message->phone)  ) required @endif placeholder="Email" id="name-f" value="{{$message->email}}">
                                <input type="text" aria-label="Last name" class="form-control phone_input" @if(empty($message->phone) && empty($message->email) ) required @endif placeholder="Phone" id="name-l" value="{{$message->phone}}">
                            </div>
                        </div>

                        <div class="form-group auto_complete_form_group">


                        </div>
                        <div class="form-group">
                            <label class="form-label" for="price-f">Дополнительная информация по объявлению</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text text-success">
                                                            <i class="ni ni-user fs-xl"></i>
                                                        </span>
                                </div>
                                <input type="text" aria-label="First name" class="form-control price_input" required placeholder="Цена(необязательно)" id="price-f"  value="{{$message->price}}">
                                <input type="text" aria-label="Last name" class="form-control title_input" required placeholder="Название" id="tytle-l"  value="{{$message->title}}">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">

                    </div>

                    <div class="form-group">

                        <input type="hidden" class="form-control sending_badge_title" value="" />
                    </div>
                    <div class="form-group photo_form_place"></div>
                    <label class="form-label" for="example-textarea">Сопроводительный текст</label>
                    <div class="form-group summerBlock">



                        <textarea class="form-control sending_badge_textarea"  rows="5">{{$message->message}}</textarea>
                    </div>

                    <button type="submit"  data-target="#getCroppedCanvasModal_{{$message->id}}"  data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }" class=" sending_badge_submit btn btn-primary waves-effect waves-themed">Отправить объявление</button>
                </form>



                </div>
                <div class="modal-footer">
                    <button type="button" class="company_create_close btn btn-secondary waves-effect waves-themed" onclick="localStorage.setItem('openAddMessageModal',0);" data-dismiss="modal">Закрыть</button>
                </div>
                </div>
                </div>
                </div>
<script src="/NewSmartAdmin/js/formplugins/cropperjs/cropper.js"></script>
<script>




    function refreshImg(){
        $("#image").removeAttr("src");
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
        console.log('DOWNLOAD',$download)

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
            console.log('button prop disabled');
            $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
        }

        if (typeof document.createElement('cropper').style.transition === 'undefined')
        {
            $('button[data-method="rotate"]').prop('disabled', true);
            $('button[data-method="scale"]').prop('disabled', true);
        }

        // Download
        /*     if (typeof $download[0].download === 'undefined')
         {
         $download.addClass('disabled');
         }*/

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
            console.log('.docs-buttons');
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
                                console.log('444')
                                download.download = uploadedImageName;
                                console.log('Download',result)
                                console.log('Download',result.toDataURL(uploadedImageType))
                                // $download.attr('href', result.toDataURL(uploadedImageType));


                                /*$('#download').click(function(){*/

                                $.ajax({
                                    method: 'POST',
                                    dataType: 'json',
                                    async:false,
                                    url: '/company/picture/savePictureToSession',
                                    data: {picture: result.toDataURL(uploadedImageType)
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

        $('#aspectRatio4').trigger('click')
        $image.cropper('destroy').attr('src', '/storage/pictures/{{$message->pictures->photo}}').cropper(options);
    });


    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        console.log('FALSE')
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    else{


                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    var form = $('#badge_form')

    form.find('.email_input').change(function(){
        console.log('Onchange',this)
        form.find('.phone_input').prop('required', !$(this).val().length);
    })
    form.find('.phone_input').change(function(){
        console.log('Onchange',this)
        form.find('.email_input').prop('required', !$(this).val().length);
    })

    $('.badges_form').submit(function(event){

        event.preventDefault();
        event.stopPropagation();
        var category_id=$('#multiple-icons').val()
var message_id = '{{$message->id}}';
        var title = $('#tytle-l').val();
        var price = $('#price-f').val();
        var email = $('#name-f').val();
        var phone = $('#name-l').val();
        var message = $('.sending_badge_textarea').val()
        console.log(message)
        $.ajax({
            method: 'POST',
            dataType: 'json',
            async:false,
            url: '/customer/badge/update',
            data: {message_id:message_id,title:title,price:price,email:email,phone:phone,message:message,category_id:category_id
            },
            beforeSend: function() {
            },
            complete: function() {
                //$('.company_create_close').trigger('click')
                $('#badges_modal').modal("hide");
            },
            success: function (data) {

                $('#badges_modal').modal("hide");
                //$(".modal-backdrop").remove();
                //$('.categoryModalClose').trigger('click')
                //$('.company_create_close').trigger('click')
                //$('.modal-backdrop').removeClass('show').addClass('hide')



                console.log('success')

            }
        });
    })

</script>