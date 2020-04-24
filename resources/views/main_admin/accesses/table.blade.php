
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Имя администратора</th>
            <th>Email администратора</th>
            <th>Роль</th>
            <th>Активность</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            @if(\Auth::user()->roles[0]->name=="Main_administrator" && (($user->roles[0]->name!="Gods_mode") && ($user->roles[0]->name!="Main_administrator") ))

        <tr>
            <th class="company_id" scope="row">{{$user->id}}</th>
            <input class="user_id" type="hidden" value="{{$user->id}}">
            <td class="company_name">{{$user->name}}</td>
            <td class="company_email">{{$user->email}}</td>
            <td class="company_phone">{{$user->roles[0]->name}}</td>
            <td class="company_name">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="active_logo_switch custom-control-input" id="customSwitch_{{$user->id}}" @if($user->active==0)  @else checked="true" @endif>
                    <label class="custom-control-label" for="customSwitch_{{$user->id}}">@if($user->active==0) Not Active @else Active @endif</label>
                </div>
            </td>
            <td>
                <a href="javascript:void(0)" class="PrependChangeAdmin btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteAdmin btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
        @endif
      @endforeach
        </tbody>
    </table>
</div>

    <script>

        $('.active_logo_switch').change(function(e){
            e.preventDefault();
            var id=$(this).parent().parent().parent().find('.user_id').val()
            var this_=$(this)
            console.log(this_)
            var status = $(this).is(":checked")
            var checked = $(this).is(':checked');

            console.log(status)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/user/update_status',
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



        $('.PrependChangeAdmin').click(function(event){
            console.log(11)
            event.preventDefault();
            var admin_id =  $(this).parent().parent().find('.company_id').text()
            var myModal = $(this).data('target');
            var remote_content = this.href;
            $.ajax({
                method: 'POST',
                dataType: 'html',
                async:true,
                url: '/admin/main_admin/accesses/getForm',
                data: {admin_id: admin_id },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log(321)
                    $('.result_of_admins_form').html(data);
                    $('.default-example-modal-right-lg').modal("show");

                    console.log('success')

                }
            });
        });

        $('.DeleteCompany').click(function(){
            var company_id =  $(this).parent().parent().find('.company_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/delete',
                data: {company_id: company_id
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


