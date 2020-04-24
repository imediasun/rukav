



<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside class="page-sidebar">
    <!--div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="/NewSmartAdmin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">DWEM</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </--div>
    <!-- end user info -->
    <div style="position:relative;">
    <!-- NAVIGATION : This navigation is also responsive-->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card" style="display:block !important">
             <div class="info-card-text" style="display:block !important;text-align:center;margin-left:0px;margin-top:100px">

                <span class="d-inline-block text-truncate text-truncate-sm" style="font-size: 18px;max-width:200px">Toronto, Canada</span>
            </div>
            <img src="/storage/1.jpg" class="cover" alt="cover">
            <a href="#" style="margin-left:230px" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
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

                        //dump($arr[$parent_id][$i]->permission,\Auth::user(),\Auth::user()->can($arr[$parent_id][$i]->permission));
                        if(($arr[$parent_id][$i]->permission!=null && \Auth::user()->can($arr[$parent_id][$i]->permission)) ||
                         ($arr[$parent_id][$i]->permission==null && in_array($arr[$parent_id][$i]->parent_id,$parents_approved))){

                         if($arr[$parent_id][$i]->permission!=null && \Auth::user()->can($arr[$parent_id][$i]->permission)){
                          $parents_approved[]=$arr[$parent_id][$i]->id;
                         }
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
    <div class="nav-footer shadow-top">
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
    <div class="col-lg-12" style="max-height:500px">
        <div class="card mb-g">
            <div class="row row-grid no-gutters">
                <div class="col-12">
                    <div class="p-3">
                        <h2 class="mb-0 fs-xl">
                            Send Feedback
                        </h2>
                    </div>
                </div>

                @foreach($customers as $customer)
                <div class="col-4">
                    <a href="/customer/get_special/{{$customer->id}}" class="text-center p-3 d-flex flex-column hover-highlight" >
                        <input type="hidden" class="personal_badege_customer_id" value="{{$customer->id}}">
                        <span class="profile-image rounded-circle d-block m-auto" style="@if(isset($customer->getCustomersCompany)) background-image:url('/storage/avatars/{{$customer->getCustomersCompany->photo}}') @else  background-image:url('/storage/avatars/avatar-a.png')@endif; background-size: cover;"></span>
                        <span class="d-block text-truncate text-muted fs-xs mt-1">{{$customer->name}} {{$customer->sername}}</span>
                    </a>
                </div>
              @endforeach

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