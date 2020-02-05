
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th><th>Badge</th>
            <th>Название бэйджа</th>
            <th>Группа бэйджа</th>

            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($badges as $badge)
        <tr>
            <th  class="badge_id_table" scope="row">{{$badge->id}}
            <input class="badge_id" type="hidden" value="{{$badge->id}}">
                <input class="badge_group_id" type="hidden" value="{{$badge->group->id}}">
            </th>
            <td class="company_photo">
                <span class="profile-image rounded-circle d-inline-block" style="
                        width:50px;height:50px;background-image:url('/storage/badges/{{$badge->photo}}') !important;
                        background-position: center;background: 100% 100% no-repeat;background-size: cover;
                   "></span>
                </td>
            <td class="company_name">{{$badge->name}}</td>
            <td class="badge_group_name">{{$badge->group->name}}</td>
            <td>
                <a href="javascript:void(0)" class="PrependChangeBadge btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg-badges">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteBadge btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>

        $('.active_badge_switch').change(function(e){
            e.preventDefault();
            var id=$(this).parent().parent().parent().find('.badge_id').val()
            var this_=$(this)
            console.log(this_)
            var status = $(this).is(":checked")
            var checked = $(this).is(':checked');
            if(checked){
                $(".active_badge_switch").each(function(){
                    $(this).prop("checked",false);
                    this_.prop("checked",true);
                });
            }
            else{
               var $checkboxes = $(".active_badge_switch").not(this_)
                var first=$checkboxes[0]
                console.log($checkboxes[0])

                $($checkboxes).each(function(){
                    console.log($(this))
                    $(this).prop("checked",true);
                });
                 $(".active_badge_switch").not(this_).slice(1).prop("checked",false);

            }

            console.log(status)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/badge/update_status',
                data: {id: id,status:status
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {





                    console.log('success')

                }
            });
        });

        $('.PrependChangeBadge').click(function(){
            var badge_id =  $(this).parent().parent().find('.badge_id').val()
            var badge_group_id =  $(this).parent().parent().find('.badge_group_id').val()
            console.log('badge_id',badge_id);
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/badge/get',
                data: {badge_id: badge_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log(data)
                    $('#badge_id').val(data.id)
                    $('#badge_name').val(data.name)
                    $('#badges_group_id').val(badge_group_id)

                    $('.sending_badge_id').val(badge_id)
                    console.log(data.photo)
                    $("#image").removeAttr("src");
                    //$('#image').attr('src','/storage/badges/'+data.photo)

                    //










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
                                                url: '/admin/main_admin/company/badge/saveBadgeToSession',
                                                data: {badge: result.toDataURL(uploadedImageType)
                                                },
                                                beforeSend: function() {
                                                },
                                                complete: function() {

                                                },
                                                success: function (data) {

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
























                    $image.cropper('destroy').attr('src', '/storage/badges/'+data.photo).cropper(options);
                    $('input:radio[name="aspectRatio"]').filter('[value="1"]').attr('checked', true);
                    $('#aspectRatio2').parent('label').find('.docs-tooltip').trigger("click");
                    console.log('success')

                }
            });
        });

        $('.DeleteBadge').click(function(){
            var badge_id =  $(this).parent().parent().find('.badge_id_table').find('.badge_id').val()
console.log(badge_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/badge/delete',
                data: {badge_id: badge_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {

                    console.log('success')
                    reloadData();
                }
            });

        });



    </script>


