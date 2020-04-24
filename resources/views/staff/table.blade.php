
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Название (русский)</th>
            <th>Название (english)</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
        <tr>
            <th class="role_id" scope="row">{{$role->id}}</th>
            <td class="role_description">{{$role->description}}</td>
            <td class="role_name">{{$role->name}}</td>
            <td>
                <a href="javascript:void(0)" class="PrependChangeRole btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-center">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>


        $('.PrependChangeRole').click(function(){
            var role_id =  $(this).parent().parent().find('.role_id').text()
            var role_description =  $(this).parent().parent().find('.role_description').text()
            var role_name =  $(this).parent().parent().find('.role_name').text()
            console.log(role_id)
            $('#role_name_russian').val(role_description)
            $('#role_name_english').val(role_name)
            $('#role_id').val(role_id)
        });



    </script>


