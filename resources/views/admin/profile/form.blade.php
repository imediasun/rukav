


<form method="post" action="/admin/profile/update" class="was-validated">
    @csrf
    <input type="hidden" id="admin_id" name="id" value="{{$user->id}}" >

    <div class="form-group">
        <label class="form-label" for="company_name">Имя администратора</label>
        <input type="text" id="admin_name" name="name" value="{{$user->name}}" class="form-control  @error('title') is-invalid @enderror" placeholder="Имя администратора" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="company_name">Логин администратора</label>
        <input type="text" id="admin_login" name="login" class="form-control" value="{{$user->login}}" placeholder="Логин администратора" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="company_email">Email</label>
        <input type="email" id="admin_email" name="email" value="{{$user->email}}" class="form-control" placeholder="Email" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="company_info">Пароль</label>
        <input type="password" id="admin_password" name="password" class="form-control" placeholder="Password" value="{{$user->non_hashed}}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="company_info">Подтверждение пароля</label>
        <input type="password" id="admin_password_confirm" name="password_confirmation" class="form-control" value="{{$user->non_hashed}}" placeholder="Confirm">
    </div>

    <div class="form-group">
        <label class="form-label" for="company_phone">Департамент</label>
        <input type="text" id="admin_department" name="department" class="form-control" value="{{$user->department}}" placeholder="Контактный телефон">
    </div>


    <div class="modal-footer">
        <button type="button" class="company_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="company_create btn btn-primary waves-effect waves-themed">Обновить информацию</button>
    </div>
</form>