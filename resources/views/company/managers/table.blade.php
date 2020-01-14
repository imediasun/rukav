
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Другие данные</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($managers as $manager)
        <tr>
            <th class="manager_id" scope="row">{{$manager->id}}</th>
            <td class="manager_name">{{$manager->name}}</td>
            <td class="manager_email">{{$manager->email}}</td>
            <td class="manager_phone"></td>
            <td>
                <a href="javascript:void(0)" class="PrependChangeManager btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteManager btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>


        $('.PrependChangeManager').click(function(){
            var manager_id =  $(this).parent().parent().find('.manager_id').text()
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/company/managers/get',
                data: {company_id: company_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log(data)
                    $('#manager_id').val(data.id)
                    $('#manager_name').val(data.name)
                    $('#manager_email').val(data.email)
                    $('#manager_info').val(data.info)
                    $('#manager_address').val(data.address)
                      console.log('success')

                }
            });
        });

        $('.DeleteManager').click(function(){
            var manager_id =  $(this).parent().parent().find('.manager_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/company/manager/delete',
                data: {manager_id: manager_id
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


