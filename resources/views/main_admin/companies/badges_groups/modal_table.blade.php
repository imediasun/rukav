<input type="hidden" id="company_badges_groups_id" name="company_badges_groups_id" value="{{$company_id}}">
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Фото первого бэйджа</th>
            <th>Название группы бэйджей</th>
            <th>Назначена/Не назначена</th>

        </tr>
        </thead>
        <tbody>

        @foreach($badges_groups as $badges_group)
            <tr>
                <?
                $badgeCompany=\App\Domain\Company\Models\CompanyBadge::where('company_id',$company_id)->where('badges_group_id',$badges_group->id)->first();
                ?>
                @if($badgeCompany)
                <input type="hidden" class="company_badges_id" name="company_badges_id" value="{{$badgeCompany->id}}">
                @endif
                <th class="company_badges_groups_id" scope="row">{{$badges_group->id}}</th>
                <td class="company_photo">
                <span class="profile-image rounded-circle d-inline-block" style="
                        width:50px;height:50px;@if($badges_group->badges->first()) background-image:url('/storage/badges/{{$badges_group->badges->first()->photo}}') !important; @endif
                        background-position: center;background: 100% 100% no-repeat;background-size: cover;
                        "></span>
                </td>

                <td class="company_badges_groups_name">{{$badges_group->name}}</td>
                <td class="company_badges_groups_switch">

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="active_badges_group_switch custom-control-input" id="customSwitch_{{$badges_group->id}}" @if(!isset($badgeCompany) || !$badgeCompany->active)  @else checked="true" @endif>
                        <label class="custom-control-label" for="customSwitch_{{$badges_group->id}}">@if(!isset($badgeCompany) || !$badgeCompany->active) Not Active @else Active @endif</label>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script>
    $('.active_badges_group_switch').change(function(e){
        var company_id = $('#company_badges_groups_id').val()
        var company_badges_id=$(this).parent().parent().parent().find('.company_badges_id').val()
        var badges_group_id=$(this).parent().parent().parent().find('.company_badges_groups_id').text()
        var this_=$(this)
        var checked = $(this).is(':checked');
        $.ajax({
            method: 'POST',
            dataType: 'json',
            async:false,
            url: '/admin/main_admin/badges_groups/update_status',
                data: {badges_group_id: badges_group_id,status:checked,company_id:company_id,company_badges_id:company_badges_id
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