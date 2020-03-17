




















<!-- mega menu -->
<ul class="sky-mega-menu sky-mega-menu-response-to-icons sky-mega-menu-anim-scale">
    <!-- home -->
    <li>
        <a href="#"><i class="fa fa-single fa-home"></i></a>
    </li>
    <!--/ home -->

    <!-- about -->
    <li aria-haspopup="true">
        <a href="#"><i class="fal fa-globe"></i>Выберите рубрику</a>
        <div class="grid-container3">


            <ul>

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
                             echo '<div class="grid-container3" >';
                                echo '<ul >';
                            }
                            //перебираем в цикле массив и выводим на экран
                            for ($i = 0; $i < count($arr[$parent_id]); $i++) {
                            //Если пермишен присутствуют у текущего юзера выводить нулевой уровень


                                   if($arr[$parent_id][$i]->link=='/admin/profile'){

                                   $token=\Auth::user()->rememberToken;
                                   }else{$token='';}

                                echo '
                                      <li>
                                    <a href="'.$arr[$parent_id][$i]->link.'/'.$token.'  ">';





                                if($parent_id == 0){
                                    echo '<i class="fal '.$arr[$parent_id][$i]->icon.'"></i>';
                                }

                                echo '
                            <span class="nav-link-text">' . $arr[$parent_id][$i]->name . '</span>
                            <i class="arrow"></i>
                                        </a>';
                                //рекурсия - проверяем нет ли дочерних категорий
                                $this->view_cat($arr, $arr[$parent_id][$i]->id, 1,$parents_approved);
                                echo '</li> ';


                            }
                            if($parent_id !== 0) {
                                echo '</ul>';
                                echo '</div>';
                            }
                        }
                    }

                    if(isset($rubrics)){
                     $rec= new RecursionRubrics;
                     $result = $rec->get_cat($rubrics);
                    //Выводи каталог на экран с помощью рекурсивной функции

                    $rec->view_cat($result,0,0);
                    }



                @endphp

            </ul>
        </div>
    </li>
    <!--/ about -->

    <!-- news -->
    <li aria-haspopup="true">
        <a href="#"><i class="fal fa-bullhorn"></i>Новости</a>
        <div class="grid-container3">
            <ul>
                <li><a href="#"><i class="fal fal-check"></i>Company</a></li>
                <li><a href="#"><i class="fal fal-check"></i>Products</a></li>
                <li><a href="#"><i class="fa fal-check"></i>Specials</a></li>
            </ul>
        </div>
    </li>
    <!--/ news -->

    <!-- portfolio -->
    <li aria-haspopup="true">
        <a href="#"><i class="fal fa-briefcase"></i>Блог</a>
        <div class="grid-container3">
            <ul>
                <li><a href="#"><i class="fal fa-lemon-o"></i>Logos</a></li>
                <li><a href="#"><i class="fal fa-globe"></i>Websites</a></li>
                <li><a href="#"><i class="fal fa-th-large"></i>Branding</a></li>
                <li><a href="#"><i class="fal fa-picture-o"></i>Illustrations</a></li>
            </ul>
        </div>
    </li class="right">
    <!--/ portfolio -->

    <!-- blog -->
    <li>

        <a class="Menu_giveBadgeWrap__28NpB" data-toggle="modal" data-target=".default-example-modal-right-lg" onclick="localStorage.setItem('personalBadegeCustomerId',0);reloadPage()"><i class="fal fa-edit"></i>Подать объявление</a>
    </li>
    <!--/ blog -->

    <!-- contacts -->
    <li class="right">
        <a href="#"><i class="fal fa-phone"></i>Contacts</a>
    </li>
    <!--/ contacts -->
</ul>
<!--/ mega menu -->