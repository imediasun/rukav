
<div class="frame-wrap">
    <table class="table table-responsive">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Company name</th>
            <th>AdminID</th>
            <th>AdminName</th>
            <th>AdminEmail</th>
            <th>Contact Phone#</th>
            <th>Company_address (billing)</th>
            <th>Company_address (physical)</th>
            <th>Web</th>
            <th>Registration date</th>
            <th>Clients segment</th>
            <th>Logo</th>
            <th>Corporate background</th>
            <th>Active</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
        <tr>
            <th class="company_id" scope="row">{{$company->id}}
                <input class="company_id_switch" type="hidden" value="{{$company->id}}">
            </th>
            <td class="company_name">{{$company->name}}</td>
            <td class="company_admin_id">{{$company->admin->id}}</td>
            <td class="company_admin_id">{{$company->admin->name}} {{$company->admin->sername}}</td>
            <td class="company_email">{{$company->admin->email}}</td>
            <td class="company_phone">{{$company->phone}}</td>
            <td class="company_biling_address">{{$company->biling_address}}</td>
            <td class="company_address">{{$company->address}}</td>
            <td class="company_address">{{$company->web}}</td>
            <td class="company_registration_date">{{$company->registration_date}}</td>
            <td class="company_clients_segment"></td>
            <td class="company_logo">@if(null!=$company->logo) {{$company->logo->photo}} @else  @endif</td>
            <td class="company_corporate_background">
                @if(null!=$company->banner) {{$company->banner->photo}} @else  @endif

            </td>
            <td class="company_name">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="active_company_switch custom-control-input" id="customSwitch_{{$company->id}}" @if($company->status==0)  @else checked="true" @endif>
                    <label class="custom-control-label" for="customSwitch_{{$company->id}}">@if($company->status==0) Not Active @else Active @endif</label>
                </div>
            </td>
            <td>
                <a style="height:25px" href="javascript:void(0)" class="PrependChangeCompany btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg-company">
                    <i style="position:absolute;top:5px;left:6px" class="fal fa-pencil"></i>
                </a>
                <a style="width:65px" href="javascript:void(0)" class="PrependAssignBadges btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-badges-modal-right-lg">
                    <i  class="fal fa-picture">группы бейджей</i>
                </a>
                <a style="height:25px" href="javascript:void(0);" class="DeleteCompany btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i style="position:absolute;top:5px;left:6px" class="fal fa-times"></i>
                </a>
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>

        $('.PrependAssignBadges').click(function(){
            var company_id =  $(this).parent().parent().find('.company_id').text()
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company_badges/get',
                data: {company_id: company_id
                },
                beforeSend: function() {
                },
                complete: function() {
                },
                success: function (data) {
                    console.log(data)
                    $('#company_badges_groups_id').val(data.company_id)
                    $('#badges_group_id').val(data.badges_group_id)

                    $.ajax({
                        method: 'POST',
                        dataType: 'html',
                        async:false,
                        url: '/admin/main_admin/company_badges/getHtml',
                        data: {company_id: company_id
                        },

                        success: function (dataHtml) {
                            console.log(dataHtml)
                            $('.result_of_company_badges_groups_table').html(dataHtml);
                            console.log('success')

                        }
                    });

                    console.log('success')

                }
            });
        });



        $('.PrependChangeCompany').click(function(){
            var company_id =  $(this).parent().parent().find('.company_id').text()
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/get',
                data: {company_id: company_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log(data)
                    $('#company_id').val(data.id)
                    $('#company_name').val(data.name)
                    $('#company_email').val(data.email)
                    $('#company_info').val(data.info)
                    $('#company_phone').val(data.phone)
                    $('#company_address').val(data.address)
                    $('#company_biling_address').val(data.biling_address)
                    $('#company_clients_segment').val(data.clients_segment)
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




        $('.active_company_switch').change(function(e){
            e.preventDefault();
            var id=$(this).parent().parent().parent().find('.company_id_switch').val()
            console.log(id)
            var this_=$(this)
            console.log(this_)
            var status = $(this).is(":checked")
            var checked = $(this).is(':checked');
            console.log(status)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/update_status',
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

    </script>


