


<form method="post" action="/profile/update" class="was-validated">
    @csrf
    <input type="hidden" id="admin_id" name="id" value="{{$user->id}}" >

    <div class="form-group">
        <label class="form-label" for="company_name">Имя пользователя</label>
        <input type="text" id="admin_name" name="name" value="{{$user->name}}" class="form-control  @error('title') is-invalid @enderror" placeholder="Имя пользователя" required>
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
        <input type="text" id="admin_department" name="department" class="form-control" value="{{$user->department}}" placeholder="Департамент">
    </div>


    <div class="modal-footer">
        <button type="submit" class="company_create btn btn-primary waves-effect waves-themed">Обновить информацию</button>
    </div>
</form>