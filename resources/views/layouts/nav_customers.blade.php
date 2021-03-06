



<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="/NewSmartAdmin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- end user info -->
<div style="position:relative">
    <!-- NAVIGATION : This navigation is also responsive-->
    <nav id="js-primary-nav" class="primary-nav" role="navigation" style="position:relative">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card" style="display:block !important">
            <div style="display:block;width:200px;position:relative;">
            <img src="/NewSmartAdmin/img/demo/avatars/avatar-admin.png" style="position:relative;width:100px;margin:20px 50px" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
        </div> <div class="info-card-text" style="display:block !important;text-align:center;margin-left:0px;margin-top:-10px">

                <span class="d-inline-block text-truncate text-truncate-sm">Toronto, Canada</span>
            </div>
            <img src="/NewSmartAdmin/img/card-backgrounds/cover-2-lg.png" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
            </a>
        </div>
        <ul id="js-nav-menu" class="nav-menu">

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
                            echo '<ul >';
                        }
                        //перебираем в цикле массив и выводим на экран
                        for ($i = 0; $i < count($arr[$parent_id]); $i++) {
                        //Если пермишен присутствуют у текущего юзера выводить нулевой уровень
                             if($arr[$parent_id][$i]->type == 'not_linked' ){
                               echo '<li><a>';
                               }
                               else{


                            echo '
                                  <li>
                                <a href="'.$arr[$parent_id][$i]->link.'  " class="btn">';




                             }
                            if($parent_id == 0){
                                echo '<i class="fa '.$arr[$parent_id][$i]->icon.'"></i>';
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
        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>

    <!-- NAV FOOTER -->
    <div class="nav-footer shadow-top" style="position:relative">
        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
            <i class="ni ni-chevron-right"></i>
            <i class="ni ni-chevron-right"></i>
        </a>
        <ul class="list-table m-auto nav-footer-buttons">
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                    <i class="fal fa-comments"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                    <i class="fal fa-life-ring"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                    <i class="fal fa-phone"></i>
                </a>
            </li>
        </ul>







    </div> <!-- END NAV FOOTER -->
</div>
    <div class="col-lg-12" style="">
        <div class="card mb-g">
            <div class="row row-grid no-gutters">
                <div class="col-12">
                    <div class="p-3">
                        <h2 class="mb-0 fs-xl">
                            Send Feedback
                        </h2>
                    </div>
                </div>
                <div class="col-4">
                    <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                        <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-b.png'); background-size: cover;"></span>
                        <span class="d-block text-truncate text-muted fs-xs mt-1">Oliver Kopyov</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                        <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-c.png'); background-size: cover;"></span>
                        <span class="d-block text-truncate text-muted fs-xs mt-1">Sesha Gray</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                        <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
                        <span class="d-block text-truncate text-muted fs-xs mt-1">Preny Amdaney</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                        <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-e.png'); background-size: cover;"></span>
                        <span class="d-block text-truncate text-muted fs-xs mt-1">Dr. John Cook PhD</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                        <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-h.png'); background-size: cover;"></span>
                        <span class="d-block text-truncate text-muted fs-xs mt-1">Sarah McBrook</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                        <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-i.png'); background-size: cover;"></span>
                        <span class="d-block text-truncate text-muted fs-xs mt-1">Jimmy Fellan</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                        <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png'); background-size: cover;"></span>
                        <span class="d-block text-truncate text-muted fs-xs mt-1">Arica Grace</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                        <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-k.png'); background-size: cover;"></span>
                        <span class="d-block text-truncate text-muted fs-xs mt-1">Jim Ketty</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                        <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-g.png'); background-size: cover;"></span>
                        <span class="d-block text-truncate text-muted fs-xs mt-1">Ali Grey</span>
                    </a>
                </div>

                <div class="col-12">
                    <div class="p-3 text-center">
                        <a href="javascript:void(0);" class="btn-link font-weight-bold">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- END NAVIGATION -->