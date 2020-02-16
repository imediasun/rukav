@extends('layouts.app_customer')

@section('content')

    @if (\Session::has('success'))

        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success')[0] !!}</li>
            </ul>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>







    @endif



    <div class="container">


        <div id="panel-7" class="">
            <div class="panel-hdr">
                <h5 class="title h4">Форма изменения профиля пользователя</h5>

            </div>

            @if (!$errors->any())
            <div id="loader">
                <div class="border p-3">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-tag result_of_admin_profile">


            </div>
            @endif
            @if ($errors->any())
            <form id="stringLengthForm" method="post" action="/profile/update"
                  data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                  data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                  data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
            >
                @csrf
                <input type="hidden" id="admin_id" name="id" value="{{$user->id}}" >

                <div class="form-group">
                    <label class="form-label" for="company_name">Имя пользователя</label>
                    <input type="text" id="admin_name" name="name"  value="{{old('name')}}" class="form-control  @error('name') is-invalid @enderror" placeholder="Имя администратора" required data-bv-stringlength="true" data-bv-stringlength-min="5">
                </div>

                <div class="form-group">
                    <label class="form-label" for="company_email">Email</label>
                    <input type="email" id="admin_email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="company_info">Пароль</label>
                    <input type="password" id="admin_password" name="password" class="form-control" placeholder="Password" value="{{old('non_hashed')}}" required data-bv-stringlength-min="6">
                </div>

                <div class="form-group">
                    <label class="form-label" for="company_info">Подтверждение пароля</label>
                    <input type="password" id="admin_password_confirm" name="password_confirmation" class="form-control" value="{{old('non_hashed')}}" required data-bv-stringlength-min="6">
                    <em id="cp"></em>
                </div>

                <div class="form-group">
                    <label class="form-label" for="company_phone">Департамент</label>
                    <input type="text" id="admin_department" name="department" value="{{old('department')}}" class="form-control" placeholder="Департамент" required>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="company_create btn btn-primary waves-effect waves-themed">Обновить информацию</button>
                </div>
            </form>
            @endif

        </div>
    </div>


@endsection

@section('scripts')
    @if ($errors->any())
        <script>

            function validation(){
                if($("#admin_password").val()!=$("#admin_password_confirm").val()){
                    $("##admin_password_confirm").addClass('is-invalid');
                    $("#cp").html('<span class="text-danger">Password and confirm password not matched!</span>');
                    return false;
                }
            }
            $(document).ready(function() {
                $('#stringLengthForm').bootstrapValidator();


                $("#admin_name").on("keyup",function(){
                    if($("#admin_name").val()==""){
                        $("#admin_name").addClass('is-invalid');
                        return false;
                    }else{
                        $("#admin_name").addClass('is-valid');
                        $("#admin_name").removeClass('is-invalid');
                    }
                });

                $("#admin_password").on("keyup",function(){
                if($("#admin_password").val()==""){
                    $("#admin_password").addClass('is-invalid');
                    return false;
                }else{
                    $("#admin_password").addClass('is-valid');
                    $("#admin_password").removeClass('is-invalid');
                }
                });
                $("#admin_password_confirm").on("keyup",function(){
                if($("#admin_password_confirm").val()=="" || ($("#admin_password_confirm").val()!=$("#admin_password").val())){
                    $("#admin_password_confirm").addClass('is-invalid');
                    return false;
                }else{
                    $("#admin_password_confirm").addClass('is-valid');
                    $("#admin_password_confirm").removeClass('is-invalid');
                }
                });
            });
        </script>
    @endif
    @if (!$errors->any())
    <script>






        reloadData();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })


        function reloadData(){
            $('.result_of_admins_profile').empty()
            var module='profile.data'
            var url='/profile/data';
            $.ajax({
                method: 'POST',
                dataType: 'html',
                async:true,
                url: url,
                data: {module: module},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                success: function (data) {

                    $('.result_of_admin_profile').html(data);

                }
            });


        }





    </script>
    @endif
@endsection
