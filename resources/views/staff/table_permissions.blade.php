<div class="panel-container show">
    <div class="panel-content">
        <div class="border px-3 pt-3 pb-0 rounded">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#js_pill_border_icon-evnts"><i class="fal fa-home mr-1"></i>Меню</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_pill_border_icon-orders"><i class="fal fa-user mr-1"></i>Заказы</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_pill_border_icon-clients"><i class="fal fa-clock mr-1"></i>Клиенты</a></li>
            </ul>
            <div class="tab-content py-3">
                <div class="tab-pane fade active show" id="js_pill_border_icon-events" role="tabpanel">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
<? $type_name=[];?>
                            @foreach($all_permissions as $key=>$perm)
        <?
        $permissions_role=\App\RoleHasPermission::where('role_id',$role_id)->where('permission_id',$perm->id)->with('permission_item')->first();
        ?>
                                    @if($permissions_role && !in_array($permissions_role->permission_item->type_name,$type_name))
                                        <? $type_name[]=  $permissions_role->permission_item->type_name;
                                        $type_name_show=$permissions_role->permission_item->type_name;?>
                                <h3>{{$type_name_show}}</h3>
                                    @endif

                                    @if($permissions_role && in_array($perm->id,$available_permissions_final_array))
                                            <label class="kt-checkbox">
                                                <input type="checkbox" checked="checked"> {{$permissions_role->permission_item->process_name}}
                                                <span></span>
                                            </label>
                            </br>

                                @else
                <?
                $permissions=\App\Permission::where('id',$perm->id)->first();
                ?>
                    <label class="kt-checkbox">
                        <input type="checkbox" > {{$permissions->process_name}}
                        <span></span>
                    </label></br>
                                @endif






                            @endforeach
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="js_pill_border_icon-orders" role="tabpanel">

                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Роли
                            </h2>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="js_pill_border_icon-clients" role="tabpanel">


                </div>
            </div>
        </div>
    </div>
</div>

    <script>



    </script>


