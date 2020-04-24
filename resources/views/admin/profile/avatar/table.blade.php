
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th><th>avatar</th>
            <th>Название компании</th>
            <th>Активный</th>

            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($avatars as $avatar)
        <tr>
            <th  class="avatar_id_table" scope="row">{{$avatar->id}}
            <input class="avatar_id" type="hidden" value="{{$avatar->id}}">
            </th>
            <td class="company_photo">
                <span class="profile-image rounded-circle d-inline-block" style="
                        width:50px;height:50px;background-image:url('/storage/avatars/{{$avatar->photo}}') !important;
                        background-position: center;background: 100% 100% no-repeat;background-size: cover;
                   "></span>
                </td>
            <td class="company_name">{{$avatar->name}}</td>
            <td class="company_name">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="active_avatar_switch custom-control-input" id="customSwitch_{{$avatar->id}}" @if($avatar->active==0)  @else checked="true" @endif>
                    <label class="custom-control-label" for="customSwitch_{{$avatar->id}}">@if($avatar->active==0) Not Active @else Active @endif</label>
                </div>
                </td>

            <td>
                <a href="javascript:void(0)" class="PrependChangeavatar btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="Deleteavatar btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>

        $('.active_avatar_switch').change(function(e){
            e.preventDefault();
            var id=$(this).parent().parent().parent().find('.avatar_id').val()
            var this_=$(this)
            console.log(this_)
            var status = $(this).is(":checked")
            var checked = $(this).is(':checked');
            if(checked){
                $(".active_avatar_switch").each(function(){
                    $(this).prop("checked",false);
                    this_.prop("checked",true);
                });
            }
            else{
               var $checkboxes = $(".active_avatar_switch").not(this_)
                var first=$checkboxes[0]
                console.log($checkboxes[0])

                $($checkboxes).each(function(){
                    console.log($(this))
                    $(this).prop("checked",true);
                });
                 $(".active_avatar_switch").not(this_).slice(1).prop("checked",false);

            }

            console.log(status)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/avatar/update_status',
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

        $('.PrependChangeavatar').click(function(){
            var avatar_id =  $(this).parent().parent().find('.avatar_id').text()
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/avatar/get',
                data: {avatar_id: avatar_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log(data)
                    $('#avatar_id').val(data.id)
                    $('#avatar_name').val(data.name)
                    console.log('success')

                }
            });
        });

        $('.Deleteavatar').click(function(){
            var avatar_id =  $(this).parent().parent().find('.avatar_id_table').find('.avatar_id').val()
console.log(avatar_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/avatar/delete',
                data: {avatar_id: avatar_id
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


