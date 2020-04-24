@extends('layouts.app_admin')

@section('content')

    <div style="position:relative;left:-50px;">
        <!-- Breadcrumbs -->
        <nav id="breadcrumbs">
            <ul>
                @if(Request::segment(4))
                    @if(isset($category))
                        {{ Breadcrumbs::render('category', $category_languages->where('category_id', $category->id)->first()) }}
                    @endif
                @else
                    {{ Breadcrumbs::render('admin.roles.index') }}
                @endif
            </ul>
        </nav>
    </div>

    <div class="modal fade default-example-modal-center" id="default-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Редактирование роли

                    </h4>

                </div>
                <div class="modal-body">
                    <div class="panel-tag">

                        <input type="hidden" id="role_id" >

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Название (русский)</label>
                                    <input type="text" id="role_name_russian" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Название (english)</label>
                                    <input type="text" id="role_name_english" class="form-control">
                                </div>
                            </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="role_change_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="role_change btn btn-primary waves-effect waves-themed">Сохранить</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container">




        <div class="panel-container show">
            <div class="panel-content">
                <div class="border px-3 pt-3 pb-0 rounded">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_pill_border_icon-2"><i class="fal fa-user mr-1"></i>Роли</a></li>
                        <li class="nav-item"><a id="ruls_rights" class="nav-link" data-toggle="tab" href="#js_pill_border_icon-3"><i class="fal fa-clock mr-1"></i>Права ролей</a></li>
                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade active show" id="js_pill_border_icon-1" role="tabpanel">
                            <div id="panel-1" class="panel">
                                <div class="panel-hdr">
                                    <h2>
                                        Default <span class="fw-300"><i>Panel</i></span>
                                    </h2>
                                </div>
                                <div class="panel-container show">
                                    <div class="panel-content">
                                        <div class="panel-tag">
                                            All panels needs to have an unique ID in order to use the panel funtions. <code>.panel</code> is a container with no padding, <code>.panel-hdr</code> has a <code>min-height</code> value and default <code>flexbox</code> properties. The <code>.panel-toolbar</code> is inserted into <code>.panel-hdr</code> for extra elements. The <code>.panel-container</code> wraps <code>.panel-content</code> which has a predefined padding.
                                        </div>
                                        <p>
                                            Default panel text.
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="js_pill_border_icon-2" role="tabpanel">

                            <div id="panel-1" class="panel">
                                <div class="panel-hdr">
                                    <h2>
                                        Роли
                                    </h2>
                                </div>


                                <div class="panel-container show">
                                    <div class="panel-content">
                                        <div class="panel-tag">
                                            <div class="demo">
                                                <button type="button" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-center">
                                                    <span class="fal fa-plus  mr-1"></span>
                                                    Создать новую роль</button>
                                            </div>

                                        </div>
                                        <div id="loader">
                                            <div class="border p-3">
                                                <div class="d-flex justify-content-center">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-tag result_of_roles_table">


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="js_pill_border_icon-3" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label for="exampleSelectd">Роль</label>
                                        <select class="form-control" id="RolesSelectedId">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->description}}</option>
                                            @endforeach>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div id="perm_loader">
                                    <div class="border p-3">
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="panel-tag result_of_permissions_table">


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

    $.ajaxSetup({
    headers:{
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
    })

    reloadData();
    function reloadData(){
        var module='staff.roles'
        var role_permission=$('#RolesSelectedId option:selected').val();
        console.log();
        var url='/admin/staff/data';
        var permissions_url='/admin/staff_permissions/data';
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

            $('.result_of_roles_table').html(data);

        }
    });


        $.ajax({
            method: 'POST',
            dataType: 'html',
            async:true,
            url: permissions_url,
            data: {module: module,role_permission:role_permission},
            beforeSend: function() {
                $('#perm_loader').show();
            },
            complete: function() {
                $('#perm_loader').hide();
            },
            success: function (data) {

                $('.result_of_permissions_table').html(data);

            }
        });

    }

    $('#RolesSelectedId').change(function(){
        reloadData();
    })

    $('.role_change').click(function(){
        console.log(222)
        var name=$('#role_name_english').val()
        var description=$('#role_name_russian').val()
        var role_id=$('#role_id').val()
        console.log(name,description)

        $.ajax({
            method: 'POST',
            dataType: 'json',
            async:false,
            url: '/admin/staff/role_update',
            data: {name: name,description:description,role_id:role_id},
            beforeSend: function() {
            },
            complete: function() {
                $('.role_change_close').click();
                reloadData();
            },
            success: function (data) {

                console.log('success')

            }
        });
    })


        $('#ruls_rights').click(function(){
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/staff/get_roles',
                data: {},
                beforeSend: function() {
                },
                complete: function() {
                },
                success: function (data) {
                console.log(data)
                    $('#RolesSelectedId')[0].options.length = 0;
                    $.each(data, function (index, value) {
                        $('#RolesSelectedId').append('<option value="'+value.id+'">'+value.description+'</option>')
                    });
                    console.log('success')

                }
            });
        })

    </script>
@endsection
