@extends('layouts.app_admin')
@section('styles')
    <!-- FYI: it has a demo CSS file concatinated, about 1kb, you can remove it from build.js if needed -->
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/cropperjs/cropper.css">
    <!-- page related demo css (for icons only) -->
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/fa-solid.css">
    <link href="{!! asset('/inspinia/css/plugins/iCheck/custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('/css/style_admin.css') !!}" rel="stylesheet">
    <link href="{!! asset('/inspinia/css/plugins/iCheck/custom.css') !!}" rel="stylesheet">



    <style>
        .cat_block:hover{
            background:#ee9;
        }
        .cat_block{
            padding:10px 15px;

        }
        .block_main_categories{
            width:24%;
            height:350px;
            border:1px solid #0000cc;
            overflow-y:auto;
            display:inline-block;

        }
        .wizard-big.wizard > .content {
            min-height: 1620px;
        }

        .ibox-content {
            clear: both;
        }
        .ibox-content {
            background-color: #ffffff;
            color: inherit;
            padding: 15px 20px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
        }
        .ibox-title {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #ffffff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 2px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 15px 15px 7px;
            min-height: 48px;
        }
        .float-e-margins .btn {
            margin-bottom: 5px;
        }
        .btn-success {
            background-color: #1c84c6;
            border-color: #1c84c6;
            color: #FFFFFF;
        }
        .btn-w-m {
            min-width: 120px;
        }

        .btn {
            border-radius: 3px;
        }
        .btn-rounded {
            border-radius: 50px;
        }
        .btn-outline {
            color: inherit;
            background-color: transparent;
            transition: all .5s;
        }
        .btn-danger {
            background-color: #ed5565;
            border-color: #ed5565;
            color: #FFFFFF;
        }
    </style>




    </head>
    @endsection
@section('content')



    <div id="main" role="main" style="">

        <!-- MAIN CONTENT -->
        <div id="content">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Wizard</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Forms</a>
                        </li>
                        <li class="active">
                            <strong>Wizard</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>




            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Вы можете выбрать категории которые будут использоваться на вашем сайте</h5>



                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h2>
                                Форма выбора категорий
                            </h2>
                            <p>
                                Выбранные категории будут доступны для наполнения в вашем интернет магазине
                            </p>

                            <div class="row">
                                <div class="col-sm-12" >
                                    <p class="font-bold">
                                        При выборе категории автоматически будут выбраны родительские категории а также все дочерние
                                    </p> <input class="parent_category required" name="parent_id" type="text" value="">
                                    <div class="categories">
                                        <div class="block_main_categories cat_block_1" style="">

                                            <? $i=0;?>
                                            @foreach ($categories as $key=>$category)
                                                @if($category->parent_id==0)
                                                    @if($i==0)
                                                        <div>



                                                            <input type="hidden" class="category_level" value="{{$category->parent_id}}">
                                                            <button class="add_category_into_level" type="button"  ><i class="fa fa-plus" ></i>Добавить категорию в уровень</button>

                                                        </div>
                                                    @endif
                                                    <a >

                                                        <div  class="cat_block" >

                                                            <input  class="fahover_cubes_input" type="hidden" value="{{$category->id}}">

                                                            <button class="edit_cat"><i class="fa fa-pencil"></i></button>

                                                            <div style="display:inline-block" class="i-checks">
                                                                <label> <input class="category_checkbox" type="checkbox" {{$category->checked}} value=""> </label>
                                                            </div>


                                                            <span style="position:relative;padding-left:20px;">{{$category->name}}</span>

                                                            <span class="fa arrow" style="float:right"></span>
                                                        </div></a>
                                                        <?$i++;?>
                                                @endif
                                            @endforeach

                                        </div>

                                        <div class="block_main_categories cat_block_2" >


                                        </div>
                                        <div class="block_main_categories cat_block_3" >


                                        </div>
                                        <div class="block_main_categories cat_block_4" >


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <button type="button" class="btn_save_categories btn btn-primary btn-lg">Сохранить изменения</button>
                            </div>




                        </div>
                    </div>
                </div>

            </div>









            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center m-t-lg">
                            <h1>
                                Welcome in Magelan Laravel Starter Project
                            </h1>
                            <small>
                                It is an application skeleton for a typical web ecommerce app. You can use it to quickly bootstrap your webapp projects.
                            </small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="dialog_simple" title="Dialog Simple Title">

    </div>

    <!-- Modal center Large -->
    <div class="modal fade default-example-modal-lg-center"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="change_or_add_category">

                        <fieldset>
                            <input name="authenticity_token" type="hidden">
                            <div class="form-group">
                                <label>Ссылка</label>
                                <input class="form-control" id="tab_title" value="" placeholder="Text field" type="text">
                            </div>

                            <div class="form-group">
                                <label>Название категории</label>
                                <input class="form-control" id="cat_name" value="" placeholder="Text field" type="text">
                            </div>
                        </fieldset>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>







    <!--div id="addtab" title="Изменение названия категории">

        <form>

            <fieldset>
                <input name="authenticity_token" type="hidden">
                <div class="form-group">
                    <label>Ссылка</label>
                    <input class="form-control" id="tab_title" value="" placeholder="Text field" type="text">
                </div>

                <div class="form-group">
                    <label>Название категории</label>
                    <input class="form-control" id="cat_name" value="" placeholder="Text field" type="text">
                </div>
            </fieldset>

        </form>

    </div-->




@endsection

@section('scripts')
    <!-- iCheck -->
    <script src="{!! asset('/inspinia/js/plugins/iCheck/icheck.min.js') !!}"></script>



    <script>
        $(document).ready(function () {
            console.log(789);
            checked_categories=[];
            <?php if(isset($json)){?>
                checked_categories=eval('<?php echo $json;?>');
            <?php } ?>

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    ///////////////////////////////////////////////



    <script>

        var form = $(".default-example-modal-lg-center").submit(function (event) {

            console.log(event.target.elements[2].value)
            console.log(event.target.elements[2].value)
            console.log(window.cat_id)
            var level = window.level
            if (window.cat_id == null && window.parent_cat_id != null) {
                console.log('add')
                var action = 'add'
                var parent_id=window.parent_cat_id
            }
            else {
                console.log('edit')
                var action = 'edit'
                var parent_id=window.cat_id
            }

            $.ajax({
                url: '/admin/change_category_name', // point to server-side PHP script
                dataType: 'json',  // what to expect back from the PHP script, if anything
                cache: false,
                data: {
                    name: event.target.elements[3].value,
                    link: event.target.elements[2].value,
                    id: window.cat_id,
                    parent_id:parent_id,
                    action: action
                },
                type: 'post',
                success: function (data) {
                    if(window.cat_id == null && window.parent_cat_id != null){
                        var id_cat=window.parent_cat_id
                    }
                    window.parent_cat_id = null;

                    show_subcut(id_cat)
                    console.log('here')
                }
            });


            $(".default-example-modal-lg-center").modal('hide')
            event.preventDefault();
        });


        function checkValue(value,arr){
            var status = 'Not exist';

            for(var i=0; i<arr.length; i++){
                var name = arr[i];
                if(name == value){
                    status = 'Exist';
                    break;
                }
            }

            return status;
        }


        //Установка чекбоксов по всем подкатегориям если он активен
        $('.categories').delegate('input','ifChecked',function(event) {

            var id_cat=$(this).parent('div').parent('label').parent('div').parent('div').find('.fahover_cubes_input').val();
            console.log('id_cat',id_cat);
            if(checkValue(id_cat,checked_categories)=='Not exist'){checked_categories.push(id_cat);}
            //alert(event.type + ' callback');
            //Найти все подкатегории во всех уровнях и поставить checkbox on

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: "/show_subcat_all_levels",
                data: {id_cat: id_cat}, // serializes the form's elements.
                success: function (data) {

                    $.each( data, function( key, value ) {
                        //Если в этом массиве
                        //alert(key+' -> '+value.name)
                        // Добавить в глобальную переменную все айдишники категорий
                        if(checkValue(value.id,checked_categories)=='Not exist'){checked_categories.push(value.id);}
                        //TODO Найти родительские категории
                        //       alert(window.checked_categories)

                    });
                }
            });

            // Найти элемент на экране которому соответствует данный id_cat и эмитировать click
            var id_cat_input=$('.fahover_cubes_input[value="'+id_cat+'"]').parent('.cat_block')
            id_cat_input.click();
            //Обновить предыдущий блок категорий
            //

            //перегрузить предыдущий блок с родительскими категориями
            //определение блока в котором произошел клик #class


            var block_class=$(this).parent('div').parent('label').parent('div').parent('div').parent('a').parent('div').attr('class');
            block_class=block_class.replace('block_main_categories ', '');
            //alert(block_class)
            reload_parent_blocks(id_cat,block_class);
//alert('installing')
            //alert(checked_categories)

        });

        $('.categories').delegate('input','ifUnchecked',function(event) {


            var id_cat=$(this).parent('div').parent('label').parent('div').parent('div').find('.fahover_cubes_input').val()

            //alert(id_cat)
            //id блока в котором расположены категории
            //var id_block=$(this).parent('div').parent('label').parent('div').parent('div').find('.fahover_cubes_input').parent('.cat_block').attr('class')
            //alert(id_block)
            if(checkValue(id_cat,checked_categories)=='Exist'){
                console.log('id_cat',id_cat);
                //checked_categories.splice($.inArray(itemtoRemove, checked_categories),1);

                checked_categories = jQuery.grep(checked_categories, function(value) {
                    return value != id_cat;
                });
            }
            //alert(checked_categories)
            //alert(event.type + ' callback');
            //Найти все подкатегории во всех уровнях и поставить checkbox on

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: "/show_subcat_all_levels_back",
                data: {id_cat: id_cat}, // serializes the form's elements.
                success: function (data) {
                    console.log('show_subcat_all_levels_back',data);
                    //alert(checked_categories)
                    $.each( data, function( key, value ) {
                        //Если в этом массиве
                        //alert(value.id+' -> '+value.name)
                        // Добавить в глобальную переменную все айдишники категорий
                        if(checkValue(value.id,checked_categories)=='Exist'){

                            checked_categories = jQuery.grep(checked_categories, function(val) {
                                return val != value.id;
                            });
                            // checked_categories.splice($.inArray(value.id,checked_categories),1);

                        }

                    });
                }
            });

            //обнулить все соседние блоки справа с категориями
            // Найти элемент на экране которому соответствует данный id_cat и эмитировать click
            var id_cat_input=$('.fahover_cubes_input[value="'+id_cat+'"]').parent('.cat_block')
            id_cat_input.click();
            //перегрузить предыдущий блок с родительскими категориями

        });

        function reload_parent_blocks(id_cat,block_class){

//Если родительский блок не равен .cat_block_1
            if(block_class=='cat_block_1'){
                // alert('Exit');
                return true;
            }
            else{
//Понижение класса блока (was -> cat_block_2) (is -> cat_block_1)
                block_num =block_class.charAt ( block_class.length - 1 );
                block_num=block_num-1;
                block_class=block_class.slice(0,-1);
                block_class=block_class+block_num
//отобразить в каждом родительском блоке категории замена id_cat вызов display_parent_blocks_categories
                display_parent_blocks_categories(block_class,id_cat)
            }
        }

        function display_parent_blocks_categories(block_class,id_cat){
//удаление всех категорий из текущего блока
            $('.'+block_class).empty();
            //AJAX заполнить категориями текущий блок
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: "/show_parent_cats",
                data: {id_cat: id_cat}, // serializes the form's elements.
                success: function (data) {
                    //alert(checked_categories)

                    $.each( data.values, function( key, value ) {
                        //alert(value.id+' -> '+value.name)
                        if(checkValue(value.id,checked_categories)=='Not exist'){

                            $('.'+block_class+'').append(' <a ><div class="cat_block" >' +
                                '<input class="fahover_cubes_input" type="hidden" value="'+value.id+'">' +

                                '<div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" type="checkbox" value=""> </label></div>\n' +
                                value.name+
                                '<span class="fa arrow" style="float:right"></span>' +
                                '</div></a>')

                        }
                        else{

                            //alert(checked_categories)

                            $('.'+block_class+'').append(' <a ><div class="cat_block" >' +
                                '<input class="fahover_cubes_input" type="hidden" value="'+value.id+'">' +

                                '<div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" checked type="checkbox" value=""> </label></div>\n' +
                                value.name+
                                '<span class="fa arrow" style="float:right"></span>' +
                                '</div></a>')
                        }
                    });


                    //понизить id_cat
                    //alert(data.id_cat)
                    reload_parent_blocks(data.id_cat,block_class)
                }
            });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        }

        $('.btn_save_categories').click(function(){
            cats_array=checked_categories;

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: "/save_cats_list",
                data: {cats_array: cats_array}, // serializes the form's elements.
                success: function (data) {
                    alert(data)
                    if (data=='Changes saved'){
                        alert('Изменения сохранены на диск')
                    }
                }
            });
        })
    </script>


    <script>

        function addTab() {
            // clear fields
            $("#tab_title").val("");
            $("#tab_content").val("");
        }

        function show_subcut(id_cat){

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: "/show_subcat",
                data: {id_cat: id_cat}, // serializes the form's elements.
                success: function (data) {

                    if(data.message=='null'){
                        console.log(333)
                        //проверить чтобы соседние последующие блоки были пусты

                        //если (data.value.info.parent_num) ==2
                        //удалить 3,4
                        // если (data.value.info.parent_num) ==3
                        //4
                        if(data.value.info.parent_num==1){
                            $('.cat_block_2').empty();
                            $('.cat_block_3').empty();
                            $('.cat_block_4').empty();
                        }
                        if(data.value.info.parent_num==2){
                            $('.cat_block_3').empty();
                            $('.cat_block_4').empty();
                        }
                        else if(data.value.info.parent_num==3){
                            $('.cat_block_4').empty();
                        }

                    }
                    else{

                        $('.'+new_block_cl+'').empty();
                        switch(new_block_cl){
                            case 'cat_block_2':
                                $('.cat_block_3').empty();
                                $('.cat_block_4').empty();
                                break;
                            case 'cat_block_3':
                                $('.cat_block_4').empty();
                                break;

                        }

                        if(new_block_cl=='cat_block_4'){
                            console.log(123)
                            $.each( data.value, function( key, value ) {

                                if(checkValue(value.id,checked_categories)=='Not exist') {

                                    $('.' + new_block_cl + '').append(' <a ><div class="cat_block" >' +
                                        '<input class="fahover_cubes_input" type="hidden" value="' + value.id + '">' +

                                        '<div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" type="checkbox" value=""> </label></div>\n' +
                                        value.name +
                                        '</div></a>')
                                }
                                else{
                                    $('.' + new_block_cl + '').append(' <a ><div class="cat_block" >' +
                                        '<input class="fahover_cubes_input" type="hidden" value="' + value.id + '">' +

                                        '<div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" checked type="checkbox" value=""> </label></div>\n' +
                                        value.name +
                                        '</div></a>')
                                }

                            });

                        }
                        else{

                            $.each( data.value, function( key, value ) {

                                if(key==0){
                                    console.log(key)
                                    $('.'+new_block_cl+'').append('<div>'+

                                        '<input type="hidden" class="category_level" value="'+value.parent_id+'">'+
                                        '<button class="add_category_into_level"><i class="fa fa-plus"></i>Добавить категорию в уровень</button>'+

                                        '</div>')
                                }

                                if(checkValue(value.id,checked_categories)=='Not exist'){

                                    $('.'+new_block_cl+'').append(' <a ><div class="cat_block" >' +
                                        '<input class="fahover_cubes_input" type="hidden" value="'+value.id+'">' +
                                        '<button class="edit_cat"><i class="fa fa-pencil"></i></button>'+
                                        '<div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" type="checkbox" value=""> </label></div>\n' +
                                        value.name+
                                        '<span class="fa arrow" style="float:right"></span>' +
                                        '</div></a>')

                                }
                                else{

                                    //alert(checked_categories)

                                    $('.'+new_block_cl+'').append(' <a ><div class="cat_block" >' +
                                        '<input class="fahover_cubes_input" type="hidden" value="'+value.id+'">' +

                                        '<div style="display:inline-block" class="i-checks"><label> <input class="category_checkbox" checked type="checkbox" value=""> </label></div>\n' +
                                        value.name+
                                        '<span class="fa arrow" style="float:right"></span>' +
                                        '</div></a>')
                                }



                            });
                        }


                    }}

            });
        }


        // modal dialog init: custom buttons and a "close" callback reseting the form inside
        $( document ).ready(function( ) {
            /*        $(function () {
             var dialog = $("#addtab").dialog({
             autoOpen: false,
             width: 600,
             resizable: false,
             modal: true,
             buttons: [{
             html: "<i class='fa fa-times'></i>&nbsp; Отмена",
             "class": "btn btn-default",
             click: function () {
             $(this).dialog("close");

             }
             }, {

             html: "<i class='fa fa-plus '></i>&nbsp; <span class='add_edit_category_btn'>Изменить</span>",
             "class": "btn btn-danger",
             click: function (e) {
             console.log('click_action')
             console.log('cat_id', window.cat_id)
             dialog.find("form").submit()
             $(this).dialog("close");
             }
             }]
             });

             var form = dialog.find("form").submit(function (event) {

             console.log(event.target.elements[2].value)
             console.log(event.target.elements[2].value)
             console.log(window.cat_id)
             var level = window.level
             if (window.cat_id == null && window.parent_id != null) {
             var action = 'add'
             }
             else {
             var action = 'edit'
             }

             $.ajax({
             url: '/admin/change_category_name', // point to server-side PHP script
             dataType: 'json',  // what to expect back from the PHP script, if anything
             cache: false,
             data: {
             name: event.target.elements[3].value,
             link: event.target.elements[2].value,
             id: window.cat_id,
             action: action
             },
             type: 'post',
             success: function () {
             window.parent_id = null;
             conlole.log('here')
             }
             });


             dialog.dialog("close");
             event.preventDefault();
             });

             })*/


            // Dialog click
           /* $('.edit_cat').click(function () {
                console.log(333)
                window.cat_id=$(this).parent().find('.fahover_cubes_input').val()
                $( "#addtab" ).dialog( "option", "title", "Изменение названия категории" );
                dialog.dialog("open");
                return false;

            });*/


            $('.categories').delegate('.edit_cat','click',function(event) {
                console.log(334)
                window.cat_id=$(this).parent().find('.fahover_cubes_input').val()
                $('.add_edit_category_btn').text('Изменить')
                //$( "#addtab" ).dialog( "option", "title", "Изменение названия категории" );
                console.log('window.cat_id',window.cat_id)
                //dialog.dialog("open");

                $('.default-example-modal-lg-center').modal({show:true})
                return false;
            })


            $('.categories').delegate('.add_category_into_level','click',function(event) {
                console.log(334)
                $('.default-example-modal-lg-center').modal({show:true})
                window.parent_cat_id=$(this).parent().find('.category_level').val()
                console.log('window.parent_cat_id',window.parent_cat_id)
                //dialog.dialog("open");
                return false;
            })



        })
    </script>


    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })





        $('.categories').delegate('.cat_block','click',function(){

            var id_cat = $(this).parent('a').find('input').val()
            var cl=$(this).parent('a').parent().attr('class');
            cl=cl.split(' ')[1]
            var simbol=parseInt(cl.slice(10))+1
            new_block_cl=cl.slice(0, 10)+simbol

            show_subcut(id_cat);


            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        });


        $('.categories').delegate('.fahover_cubes','click',function() {
            var id_cat = $(this).parent('a').find('.fahover_cubes_input').val();
            $('.parent_category').val(id_cat);
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '/show_parent_categories_tree',
                data: {id_cat:id_cat}, // serializes the form's elements.
                success: function (data) {

                    $('.cat_name').html(data.name)
                }
            });
        });

        $("#form").validate({
            errorPlacement: function (error, element)
            {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                },
            }
        });

        $("#form").submit(function(event){
            var link = $('#link').val()

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '/if_link_exist',
                async:false,
                data: {link:link}, // serializes the form's elements.
                success: function (data) {
                    if(data==1){
                        $('#link_validation').css('display','block');
                        event.preventDefault();
                        return false;
                    }
                    else{
                        $('#link_validation').css('display','none');
                    }
                }

            });


        })

    </script>




@endsection
