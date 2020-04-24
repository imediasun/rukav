<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="/smartAdmin/img/avatars/sunny.png" alt="me" class="online" />
						<span>

							@if(isset($username)){{$username }}@endif
						</span>
						<i class="fa fa-angle-down"></i>
					</a>

				</span>
    </div>
    <!-- end user info -->

<!--MAIN NAVIGATION-->
<!--===================================================-->


<!-- NAVIGATION : This navigation is also responsive-->
<nav>
    <!--
    NOTE: Notice the gaps after each icon usage <i></i>..
    Please note that these links work a bit different than
    traditional href="" links. See documentation for details.
    -->

    <ul>

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
                    public function view_cat($arr, $parent_id = 0, $level) {

                        //Условия выхода из рекурсии
                        if (empty($arr[$parent_id])) {
                            return;
                        }
                        if($parent_id !== 0) {
                            echo '<ul class="nav nav-second-level" >';
                        }
                        //перебираем в цикле массив и выводим на экран
                        for ($i = 0; $i < count($arr[$parent_id]); $i++) {


                           if($arr[$parent_id][$i]->type == 'not_linked' ){
                           echo '<li><a>';
                           }
                           else{

                            echo '<li><a href="/admin'.$arr[$parent_id][$i]->link.'">';
                            }
                            if($parent_id == 0){
                                echo '<i class="fa '.$arr[$parent_id][$i]->icon.'"></i>';
                            }

                            echo '
                        <span class="menu-title">' . $arr[$parent_id][$i]->name . '</span>
                        <i class="arrow"></i>
                                    </a>';
                            //рекурсия - проверяем нет ли дочерних категорий
                            $this->view_cat($arr, $arr[$parent_id][$i]->id, 1);
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
</nav>


    <span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

</aside>
<!-- END NAVIGATION -->

<style>
	#left-panel a:hover {
		background-color:#333 !important;
	}
</style>