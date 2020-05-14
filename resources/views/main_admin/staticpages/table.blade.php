<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Админ</th>
            <th>Активна/неактивна</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($staticpages as $staticpage)
            <form>


        <tr>
            <th class="customer_id" scope="row">{{$staticpage->id}}</th>
            <td class="customer_name">{{$staticpage->name}}</td>
            <td class="customer_name">{{$staticpage->editor}}</td>
            <td class="company_name">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="active_static_page_switch custom-control-input" id="customSwitch_{{$staticpage->id}}" @if($staticpage->active==0)  @else checked="true" @endif>
                    <label class="custom-control-label" for="customSwitch_{{$staticpage->id}}">@if($staticpage->active==0) Not Active @else Active @endif</label>
                </div>
            </td>


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
            var staticpage_id =  $(this).parent().parent().find('.customer_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/staticpages/delete',
                data: {staticpage_id: staticpage_id
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

        $('.active_staticpage_switch').change(function(e){
            e.preventDefault();
            var id=$(this).parent().parent().parent().find('.staticpage_id').val()
            var this_=$(this)
            console.log(this_)
            var status = $(this).is(":checked")
            var checked = $(this).is(':checked');
            /*  if(checked){
             $(".active_slider_switch").each(function(){
             $(this).prop("checked",false);
             this_.prop("checked",true);
             });
             }
             else{
             var $checkboxes = $(".active_slider_switch").not(this_)
             var first=$checkboxes[0]
             console.log($checkboxes[0])

             $($checkboxes).each(function(){
             console.log($(this))
             $(this).prop("checked",true);
             });
             $(".active_slider_switch").not(this_).slice(1).prop("checked",false);

             }*/

            console.log(status)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/staticpage/update_status',
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


