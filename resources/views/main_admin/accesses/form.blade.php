<div class="modal fade default-example-modal-right-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-right modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Форма {{$title}} администратора</h5>
                <button type="button" class="close admin_create_close_cross" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="admin_id_id" name="admin_id" value="{{(isset($admin)) ? $admin->id : ""}}">

                <div class="form-group">
                    <label class="form-label" for="company_name">Имя админа</label>
                    <input type="text" id="admin_name" name="admin_name" class="form-control" placeholder="Название компании" value="{{(isset($admin)) ? $admin->name : ""}}">
                </div>

                <div class="form-group">
                    <label class="form-label" for="company_email">Email</label>
                    <input type="email" id="admin_email" name="admin_email" value="{{(isset($admin)) ? $admin->email : ""}}" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <label class="form-label" for="admin_role">Роль администратора</label>
                    <select class="form-control" id="admin_role">
                        @foreach($roles as $role)
                            @if(\Auth::user()->roles[0]->name=="Main_administrator" && ($role->name!=='Gods_mode' && $role->name!=='Main_administrator' ))
                        <option value="{{$role->id}}">{{$role->description}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="company_info">Информация о компании</label>
                    <textarea class="form-control" id="company_info" name="company_info" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="company_phone">Контактный телефон</label>
                    <input type="text" id="company_phone" name="company_phone" class="form-control" placeholder="Контактный телефон">
                </div>

                <div class="form-group">
                    <label class="form-label" for="company_address">Адрес</label>
                    <input type="text" id="company_address" name="company_address" class="form-control" placeholder="Адрес">
                </div>
                <div class="form-group">
                    <label class="form-label" for="company_biling_address">Финансовый адрес</label>
                    <input type="text" id="company_biling_address" name="company_biling_address" class="form-control" placeholder="Финансовый адрес">
                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="admin_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                <button type="button" class="admin_create btn btn-primary waves-effect waves-themed">Сохранить</button>
            </div>
        </div>
    </div>
</div>


    <script>

    </script>
