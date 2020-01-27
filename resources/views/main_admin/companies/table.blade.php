
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Название компании</th>
            <th>AdminID</th>
            <th>Email администратора</th>
            <th>Телефон</th>
            <th>Company_address (billing)</th>
            <th>Company_address (physical)</th>
            <th>Registration date</th>
            <th>Logo</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
        <tr>
            <th class="company_id" scope="row">{{$company->id}}</th>
            <td class="company_name">{{$company->name}}</td>
            <td class="company_admin_id">{{$company->admin->id}}</td>
            <td class="company_email">{{$company->admin->email}}</td>
            <td class="company_phone">{{$company->phone}}</td>
            <td class="company_biling_address">{{$company->biling_address}}</td>
            <td class="company_address">{{$company->address}}</td>
            <td class="company_registration_date">{{$company->registration_date}}</td>
            <td class="company_logo">{{$company->logo->photo}}</td>
            <td>
                <a style="height:25px" href="javascript:void(0)" class="PrependChangeCompany btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg">
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


