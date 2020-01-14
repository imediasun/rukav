
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
        <tr>
            <th class="customer_id" scope="row">{{$customer->id}}</th>
            <td class="customer_name">{{$customer->name}}</td>
            <td class="customer_email">{{$customer->email}}</td>
            <td class="customer_phone">{{$customer->phone}}</td>
            <td>
                <a href="javascript:void(0)" class="PrependChangeCustomer btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteCustomer btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>


        $('.PrependChangeCustomer').click(function(){
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/company/users/get',
                data: {company_id: company_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log(data)
                    $('#customer_id').val(data.id)
                    $('#customer_name').val(data.name)
                    $('#customer_email').val(data.email)
                    $('#customer_info').val(data.info)
                    $('#customer_phone').val(data.phone)
                    $('#customer_address').val(data.address)
                      console.log('success')

                }
            });
        });

        $('.DeleteCustomer').click(function(){
            var customer_id =  $(this).parent().parent().find('.customer_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/company/users/delete',
                data: {customer_id: customer_id
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


