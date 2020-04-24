<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>Картинка</th>
            <th>#</th>
            <th>Тайтл объявления</th>
            <th>Пользователь</th>
            <th>Активный/Не активный</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <form>
        <tr>
            <th class="message_photo" scope="row">
                @if($message->pictures)
                <img style="max-width:100px;max-height:100px" src="/storage/pictures/{{$message->pictures->photo}}">
                    @endif
                </th>
            <th class="message_id" scope="row">{{$message->id}}</th>
            <td class="customer_name">{{$message->title}}</td>
            <td class="customer_email">{{$message->sender}}</td>
            <td class="customer_manager">
                @if($message->active)
            <input type="hidden" class="is_manager" value="1">
                    @else
                        <input type="hidden" class="is_manager" value="0">
                    @endif
                <div class="custom-control custom-switch">
                    <input type="hidden" class="customSwitch2_id" value="{{$message->id}}" >
                    <input type="checkbox" class="custom-control-input customSwitch2" id="customSwitch2_{{$message->id}}" @if($message->active) checked="" @else @endif >
                    <label class="custom-control-label" for="customSwitch2_{{$message->id}}"></label>
                </div>
            </td>

            <td>
                <a href="javascript:void(0)" class="PrependChangeCustomer btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg-user">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteMessage btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
            </form>
      @endforeach
        </tbody>
    </table>
</div>

    <script>
        $('.PrependChangeCustomer').click(function(){
            console.log('PrependChangeCustomer1')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            var manager =  $(this).parent().parent().find('.customer_manager').find('.is_manager').val()
            console.log(manager);
            //$('#manager_selected').val(1); //<---below this one
           $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/users/get',
                data: {company_id: company_id,customer_id:customer_id
                },
                beforeSend: function() {
                },
                complete: function() {
                    reloadData();
                },
                success: function (data) {
                    console.log('PrependChangeCustomer',data)
                    console.log(data.get_customers_company)
                    $('#customer_id').val(customer_id)
                    $('#customer_name').val(data.name)
                    $('#customer_sername').val(data.sername)

                    $('#customer_email').val(data.email)
                    $('#customer_info').val(data.info)
                    $('#customer_phone').val(data.get_customers_company.phone)
                    $('#customer_address').val(data.get_customers_company.address)
                    $('#select option:selected').removeAttr("selected");
                    $("#select option[value="+data.get_customers_company.manager_id+"]").attr('selected', 'selected');
                    if(manager==1){
                        $('#managerSwitch').prop('checked', true);
                    }
                    else{
                        $('#managerSwitch').prop('checked',false);
                    }


                    console.log(data.get_customers_company.manager_id)
                    reloadData();
                      console.log('success')

                }
            });
        });

        $('.DeleteMessage').click(function(){
            var message_id =  $(this).parent().parent().find('.message_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/messages/delete',
                data: {message_id: message_id
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

        $('.customSwitch2').change(function(){
           var message=$(this).parent().find('.customSwitch2_id').val()
            var state = $(this).is(":checked")

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/messages/message_activity_set',
                data: {message: message,state:state
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {

                    console.log('success')
                }
            });
        })



    </script>


