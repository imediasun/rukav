
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th><th>Badge</th>
            <th>Название бэйджа</th>

            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($badges as $badge)
        <tr>
            <th  class="badge_id_table" scope="row">{{$badge->id}}
            <input class="badge_id" type="hidden" value="{{$badge->id}}">
            </th>
            <td class="company_photo">
                <span class="profile-image rounded-circle d-inline-block" style="
                        width:50px;height:50px;background-image:url('/storage/badges/{{$badge->photo}}') !important;
                        background-position: center;background: 100% 100% no-repeat;background-size: cover;
                   "></span>
                </td>
            <td class="company_name">{{$badge->name}}</td>
            <td>
                <!--a href="javascript:void(0)" class="PrependChangeBadge btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteBadge btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a-->
            </td>
        </tr>
      @endforeach
        </tbody>
    </table>
</div>

    <script>

        $('.active_badge_switch').change(function(e){
            e.preventDefault();
            var id=$(this).parent().parent().parent().find('.badge_id').val()
            var this_=$(this)
            console.log(this_)
            var status = $(this).is(":checked")
            var checked = $(this).is(':checked');
            if(checked){
                $(".active_badge_switch").each(function(){
                    $(this).prop("checked",false);
                    this_.prop("checked",true);
                });
            }
            else{
               var $checkboxes = $(".active_badge_switch").not(this_)
                var first=$checkboxes[0]
                console.log($checkboxes[0])

                $($checkboxes).each(function(){
                    console.log($(this))
                    $(this).prop("checked",true);
                });
                 $(".active_badge_switch").not(this_).slice(1).prop("checked",false);

            }

            console.log(status)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/badge/update_status',
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

        $('.PrependChangeBadge').click(function(){
            var badge_id =  $(this).parent().parent().find('.badge_id').text()
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/badge/get',
                data: {badge_id: badge_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log(data)
                    $('#badge_id').val(data.id)
                    $('#badge_name').val(data.name)
                    console.log('success')

                }
            });
        });

        $('.DeleteBadge').click(function(){
            var badge_id =  $(this).parent().parent().find('.badge_id_table').find('.badge_id').val()
console.log(badge_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/badge/delete',
                data: {badge_id: badge_id
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


