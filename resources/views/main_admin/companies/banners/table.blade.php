
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th><th>Logo</th>
            <th>Название компании</th>
            <th>Активный</th>

            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($banners as $banner)
        <tr>
            <th  class="banner_id_table" scope="row">{{$banner->id}}
            <input class="banner_id" type="hidden" value="{{$banner->id}}">
            </th>
            <td class="company_photo" style="">
                <span class="profile-image  d-inline-block" style="
                        width:150px;height:50px;background-image:url('/storage/banners/{{$banner->photo}}') !important;
                        background-position: center;background: 100% 100% no-repeat;background-size: cover;
                   "></span>
                </td>
            <td class="company_name">{{$banner->name}}</td>
            <td class="company_name">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="active_banner_switch custom-control-input" id="customSwitch_{{$banner->id}}" @if($banner->active==0)  @else checked="true" @endif>
                    <label class="custom-control-label" for="customSwitch_{{$banner->id}}">@if($banner->active==0) Not Active @else Active @endif</label>
                </div>
                </td>

            <td>
                <a href="javascript:void(0)" class="PrependChangeBanner btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg-banner">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteBanner btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>

        $('.active_banner_switch').change(function(e){
            e.preventDefault();
            var id=$(this).parent().parent().parent().find('.banner_id').val()
            var this_=$(this)
            console.log(this_)
            var status = $(this).is(":checked")
            var checked = $(this).is(':checked');
            if(checked){
                $(".active_banner_switch").each(function(){
                    $(this).prop("checked",false);
                    this_.prop("checked",true);
                });
            }
            else{
               var $checkboxes = $(".active_banner_switch").not(this_)
                var first=$checkboxes[0]
                console.log($checkboxes[0])

                $($checkboxes).each(function(){
                    console.log($(this))
                    $(this).prop("checked",true);
                });
                 $(".active_banner_switch").not(this_).slice(1).prop("checked",false);

            }

            console.log(status)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/banner/update_status',
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

        $('.PrependChangeBanner').click(function(){
            var banner_id =  $(this).parent().parent().find('.banner_id').val()
            console.log('LofoId',logo_id );
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/logo/get',
                data: {banner_id: banner_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log('Data',data)
                    $('.sending_banner_id').val(data.id)
                    window.banner_id=data.id
                    $('#banner_name').val(data.name)
                    console.log('success')

                }
            });
        });

        $('.DeleteBanner').click(function(){
            var logo_id =  $(this).parent().parent().find('.banner_id_table').find('.banner_id').val()
console.log(banner_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/banner/delete',
                data: {banner_id: banner_id
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


