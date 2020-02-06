
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Название группы</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($badges_groups as $badges_group)
        <tr>
            <th class="badges_group_id" scope="row">{{$badges_group->id}}</th>
            <td class="badges_group_name">{{$badges_group->name}}</td>
            <td>
                <a href="javascript:void(0)" class="PrependChangeBadgesGroup btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteBadgesGroup btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>


        $('.PrependChangeBadgesGroup').click(function(){
            var badges_group_id =  $(this).parent().parent().find('.badges_group_id').text()
            var badges_group_name = $(this).parent().parent().find('.badges_group_name').text()
            $('#badges_group_name').val(badges_group_name)
            console.log('badges_group_name',badges_group_name)

            $('#badges_group_id').val(badges_group_id)
            var company_id={{$company_id}}
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/badges_groups/get',
                data: {company_id: company_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log(data)
                    //$('#badges_group_id').val(data.id)
                    //$('#badges_group_name').val(data.name)
                    $('#badges_group_email').val(data.email)
                    $('#badges_group_info').val(data.info)
                    $('#badges_group_address').val(data.address)
                      console.log('success')

                }
            });
        });

        $('.DeleteBadgesGroup').click(function(){
            var badges_group_id =  $(this).parent().parent().find('.badges_group_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/badges_groups/delete',
                data: {badges_group_id: badges_group_id
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


