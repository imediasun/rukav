
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
        @foreach($logos as $logo)
        <tr>
            <th  class="logo_id_table" scope="row">{{$logo->id}}
            <input class="logo_id" type="hidden" value="{{$logo->id}}">
            </th>
            <td class="company_photo" style="background-color:#696969">
                <span class="profile-image rounded-circle d-inline-block" style="
                        width:50px;height:50px;background-image:url('/storage/logos/{{$logo->photo}}') !important;
                        background-position: center;background: 100% 100% no-repeat;background-size: cover;
                   "></span>
                </td>
            <td class="company_name">{{$logo->name}}</td>
            <td class="company_name">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="active_logo_switch custom-control-input" id="customSwitch_{{$logo->id}}" @if($logo->active==0)  @else checked="true" @endif>
                    <label class="custom-control-label" for="customSwitch_{{$logo->id}}">@if($logo->active==0) Not Active @else Active @endif</label>
                </div>
                </td>

            <td>
                <a href="javascript:void(0)" class="PrependChangeLogo btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteLogo btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>

        $('.active_logo_switch').change(function(e){
            e.preventDefault();
            var id=$(this).parent().parent().parent().find('.logo_id').val()
            var this_=$(this)
            console.log(this_)
            var status = $(this).is(":checked")
            var checked = $(this).is(':checked');
            if(checked){
                $(".active_logo_switch").each(function(){
                    $(this).prop("checked",false);
                    this_.prop("checked",true);
                });
            }
            else{
               var $checkboxes = $(".active_logo_switch").not(this_)
                var first=$checkboxes[0]
                console.log($checkboxes[0])

                $($checkboxes).each(function(){
                    console.log($(this))
                    $(this).prop("checked",true);
                });
                 $(".active_logo_switch").not(this_).slice(1).prop("checked",false);

            }

            console.log(status)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/logo/update_status',
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

        $('.PrependChangeLogo').click(function(){
            var logo_id =  $(this).parent().parent().find('.logo_id').text()
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/logo/get',
                data: {logo_id: logo_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log(data)
                    $('#logo_id').val(data.id)
                    $('#logo_name').val(data.name)
                    console.log('success')

                }
            });
        });

        $('.DeleteLogo').click(function(){
            var logo_id =  $(this).parent().parent().find('.logo_id_table').find('.logo_id').val()
console.log(logo_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/logo/delete',
                data: {logo_id: logo_id
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


