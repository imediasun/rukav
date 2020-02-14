<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>BirthDate</th>
            <th>Gender</th>
            <th>Department</th>
            <th>ManagerId</th>
            <th>ManagerName</th>
            <th>IsManager</th>
            <th>Position</th>
            <th>StartDate</th>
            <th>Location</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <form>

                <?
                $manager=\App\Domain\Manager\Models\Manager::where('id',$customer->getCustomersCompany['manager_id'])->first();
                $manager_user=\App\User::where('id',$manager->user_id)->first();
                ?>
        <tr>
            <th class="customer_id" scope="row">{{$customer->id}}</th>
            <td class="customer_name">{{$customer->name}}</td>
            <td class="customer_email">{{$customer->email}}</td>
            <td class="customer_phone">{{$customer->getCustomersCompany['birth_date']}}</td>
            <td class="customer_phone">@if ($customer->getCustomersCompany['sex']==1) {{'male'}} @else {{'female'}} @endif</td>
            <td class="customer_phone">{{$customer->getCustomersCompany['department']}}</td>
            <td class="customer_phone">{{$customer->getCustomersCompany['manager_id']}}</td>
            <td class="customer_phone">{{$manager_user->name}} {{$manager_user->sername}}</td>
            <td class="customer_manager">
                <?
                $is_manager=\App\Domain\Manager\Models\Manager::where('user_id',$customer->id)->first();
                ?>
                @if($is_manager)
            <input type="hidden" class="is_manager" value="1">
                    @else
                        <input type="hidden" class="is_manager" value="0">
                    @endif
                <div class="custom-control custom-switch">
                    <input type="hidden" class="customSwitch2_id" value="{{$customer->id}}" >
                    <input type="checkbox" class="custom-control-input customSwitch2" id="customSwitch2_{{$customer->id}}" @if($is_manager) checked="" @else @endif >
                    <label class="custom-control-label" for="customSwitch2_{{$customer->id}}"></label>
                </div>
            </td>

            <td class="customer_phone">{{$customer->getCustomersCompany['position']}}</td>
            <td class="customer_phone">{{$customer->getCustomersCompany['start_date']}}</td>
            <td class="customer_phone">{{$customer->getCustomersCompany['location']}}</td>
            <td>
                <a href="javascript:void(0)" class="PrependChangeCustomer btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg-user">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteCustomer btn btn-danger btn-sm btn-icon waves-effect waves-themed">
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

        $('.DeleteCustomer').click(function(){
            var customer_id =  $(this).parent().parent().find('.customer_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/users/delete',
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

        $('.customSwitch2').change(function(){
           var customer=$(this).parent().find('.customSwitch2_id').val()
            var state = $(this).is(":checked")
            console.log(customer,state)

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/users/is_manager_set',
                data: {customer: customer,state:state
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


