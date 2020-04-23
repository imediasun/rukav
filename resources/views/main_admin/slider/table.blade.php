
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th><th>Slider</th>
            <th>Название слайда</th>
            <th>Описание слайда</th>
            <th>Ссылка на категорию</th>
            <th>Активный</th>

            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($slides as $slide)
        <tr>
            <th  class="slider_id_table" scope="row">{{$slide->id}}
            <input class="slider_id" type="hidden" value="{{$slide->id}}">
            </th>
            <td class="company_photo" style="background-color:#696969">
                <span class="profile-image rounded-circle d-inline-block" style="
                        width:50px;height:50px;background-image:url('/storage/sliders/{{$slide->photo}}') !important;
                        background-position: center;background: 100% 100% no-repeat;background-size: cover;
                   "></span>
                </td>
            <td class="company_name">{{$slide->name}}</td>
            <td class="company_description">{{$slide->description}}</td>
            <td class="company_link">{{$slide->link}}</td>
            <td class="company_name">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="active_slider_switch custom-control-input" id="customSwitch_{{$slide->id}}" @if($slide->active==0)  @else checked="true" @endif>
                    <label class="custom-control-label" for="customSwitch_{{$slide->id}}">@if($slide->active==0) Not Active @else Active @endif</label>
                </div>
                </td>

            <td>
                <!--a href="javascript:void(0)" class="PrependChangeslider btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg-slider">
                    <i class="fal fa-pencil"></i>
                </a-->
                <a href="javascript:void(0);" class="Deleteslider btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>

        $('.active_slider_switch').change(function(e){
            e.preventDefault();
            var id=$(this).parent().parent().parent().find('.slider_id').val()
            var this_=$(this)
            console.log(this_)
            var status = $(this).is(":checked")
            var checked = $(this).is(':checked');
          /*  if(checked){
                $(".active_slider_switch").each(function(){
                    $(this).prop("checked",false);
                    this_.prop("checked",true);
                });
            }
            else{
               var $checkboxes = $(".active_slider_switch").not(this_)
                var first=$checkboxes[0]
                console.log($checkboxes[0])

                $($checkboxes).each(function(){
                    console.log($(this))
                    $(this).prop("checked",true);
                });
                 $(".active_slider_switch").not(this_).slice(1).prop("checked",false);

            }*/

            console.log(status)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/slider/update_status',
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

        $('.PrependChangeslider').click(function(){
            var slider_id =  $(this).parent().parent().find('.slider_id').val()
            console.log('LofoId',slider_id );
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/slider/get',
                data: {slider_id: slider_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log('Data',data)
                    $('.sending_slider_id').val(data.id)
                    window.slider_id=data.id
                    $('#slider_name').val(data.name)
                    console.log('success')

                }
            });
        });

        $('.Deleteslider').click(function(){
            var slider_id =  $(this).parent().parent().find('.slider_id_table').find('.slider_id').val()
console.log(slider_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/slider/delete',
                data: {slider_id: slider_id
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


