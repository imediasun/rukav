












<style>
    .list-group .list-group-flush{
        width:300px !important;
    }

    .strange{
        position:absolute;
        top:0px;
        left:300px;
        background:#fff;
        margin-left:-200px;
        top:30px;

    }



    .hide {visibility: hidden;
        -webkit-transition: max-height 0.8s;
        -moz-transition: max-height 0.8s;
        transition: max-height 0.8s;
    }
    .reshow {

        visibility: visible;
        -webkit-transition: max-height 0.8s;
        -moz-transition: max-height 0.8s;
        transition: max-height 0.8s;
    }

    .reshow_ {

        visibility: visible;
        -webkit-transition: max-height 0.8s;
        -moz-transition: max-height 0.8s;
        transition: max-height 0.8s;
        left:500px;
        top:-0px;
    }

    .main_block{
        position:relative;

        display: table-row;
    }
    .popover-body{
        display: table;
        height:1500px;
    }
    ul {
        list-style-type: none;
    }

    .popover-custom-wrapper{
        top:80px !important;
    }

</style>







<!-- mega menu -->


    <!-- about -->


<ul class="main_block ">


                @php

                    class RecursionRubrics
                    {
                        public $level;
                        public $lang = 'en';

                        public function get_cat($rubrics=null)
                        {

                            if (!$rubrics) {
                                return NULL;
                            }
                            $arr_cat = array();
                            if (count($rubrics) != 0) {

                                //В цикле формируем массив

                                foreach ($rubrics as $key => $row) {

                                    //Формируем массив где ключами являются адишники на родительские категории
                                    if (empty($arr_cat[$row->parent_id])) {
                                        $arr_cat[$row->parent_id] = array();
                                    }
                                    $arr_cat[$row->parent_id][] = $row;
                                }


                                //возвращаем массив
                                return $arr_cat;
                            }
                        }


                        //вывод каталогa с помощью рекурсии
                        public function view_cat($arr, $parent_id = 0, $level, $parents_approved=[] ) {




                            //Условия выхода из рекурсии
                            if (empty($arr[$parent_id])) {
                                return;
                            }

                            if($parent_id !== 0) {
                             echo '<div class="grid-container3 strange hide" >';
                                echo '<ul class="child_block" style="position:absolute;top:0px left:300px;">';
                            }
                            //перебираем в цикле массив и выводим на экран
                            for ($i = 0; $i < count($arr[$parent_id]); $i++) {
                            //Если пермишен присутствуют у текущего юзера выводить нулевой уровень


                                   if($arr[$parent_id][$i]->link=='/admin/profile'){

                                   $token=\Auth::user()->rememberToken;
                                   }else{$token='';}

                                echo '










                                      <li>
                                       <a class="d-flex px-3 align-items-center my-1 rounded dropdown-item " href="/category/'.$arr[$parent_id][$i]->id.'/'.$token.' ">
                                        <div class="align-box-row w-100">
                                            <div class="mr-3">
                                                <div class="bg-ripe-malin text-center text-white d-40 rounded-circle">';
                                                   print ($arr[$parent_id][$i]->icon);
                                                echo '</div>
                                            </div>

                                      ';





                                //if($parent_id == 0){

                                //}

                                echo '

                                <div>
                                                <div class="font-weight-bold text-primary d-block">' . $arr[$parent_id][$i]->name . '</div>

                                            </div>
                                            <div class="ml-auto card-hover-indicator align-self-center">
                                                <i class="fas fa-chevron-right font-size-lg"></i>
                                            </div>
                                        </div>

                                        </a>';

                                //рекурсия - проверяем нет ли дочерних категорий
                                $this->view_cat($arr, $arr[$parent_id][$i]->id, 1,$parents_approved);
                                echo '</li> ';


                            }
                            if($parent_id != 0) {
                                echo '</ul>';
                                echo '</div>';
                            }
                        }
                    }

                    if(isset($rubrics)){

                     $rec= new RecursionRubrics;
                     $result = $rec->get_cat($rubrics);
                    //Выводи каталог на экран с помощью рекурсивной функции
foreach($rubrics as $rub){
if($rub->parent_id==0){
 echo '
 <li class="reshow main_menu_block" style="left:0px">
  <a class="d-flex px-3 align-items-center my-1 rounded dropdown-item main_category_list" href="/category/'.$rub->id.' ">
                                         <div class="align-box-row w-100  ">
                                            <div class="mr-3">
                                                <div class="bg-ripe-malin text-center text-white d-40 rounded-circle">
                                                    '.$rub->icon.'
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold text-primary d-block">'.$rub->name.'</div>
                             ';
                             echo '
                                            </div>
                                            <div class="ml-auto card-hover-indicator align-self-center">
                                                <i class="fas fa-chevron-right font-size-lg"></i>
                                            </div>
                                        </div>
</a>
                             ';

                             $rec->view_cat($result,$rub->id,0);
echo "</li>";


}
}

                    }



                @endphp

            </ul>



<!--/ mega menu -->

@section('scripts')
    <script>


    </script>
    @endsection

