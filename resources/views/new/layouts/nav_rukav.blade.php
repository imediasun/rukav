
        <ul id="sidebar-nav">

            @php

                class Recursion
                {
                    public $level;
                    public $lang = 'en';

                    public function get_cat($menu=null)
                    {

                        if (!$menu) {
                            return NULL;
                        }
                        $arr_cat = array();
                        if (count($menu) != 0) {

                            //В цикле формируем массив

                            foreach ($menu as $key => $row) {

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
                            echo '<ul aria-expanded="true" class="animated fade">';
                        }
                        //перебираем в цикле массив и выводим на экран
                        for ($i = 0; $i < count($arr[$parent_id]); $i++) {
                        //Если пермишен присутствуют у текущего юзера выводить нулевой уровень




                             if($arr[$parent_id][$i]->type == 'not_linked' ){
                               echo '<li><a>';
                               }
                               else{
                               if($arr[$parent_id][$i]->link=='/admin/profile'){

                               $token=\Auth::user()->rememberToken;
                               }else{$token='';}

                            echo '
                                  <li>
                                <a href="'.$arr[$parent_id][$i]->link.'/'.$token.'  ">';




                             }
                            if($parent_id == 0){
                                echo '';
                            }

                            echo ' 
							
							<span><i data-feather="truck"></i><span>' . $arr[$parent_id][$i]->name . '</span></span>
                        <i class="fas fa-angle-right"></i>
                                    </a>';
                            //рекурсия - проверяем нет ли дочерних категорий
                            $this->view_cat($arr, $arr[$parent_id][$i]->id, 1,$parents_approved);
                            echo '</li> ';



                        }
                        if($parent_id !== 0) {
                            echo '</ul>';
                        }
                    }
                }

                if(isset($menu)){
                 $rec= new Recursion;
                 $result = $rec->get_cat($menu);
                //Выводи каталог на экран с помощью рекурсивной функции

                $rec->view_cat($result,0,0);
                }



            @endphp

        </ul>
