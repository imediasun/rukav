@extends('layouts.app_customer')
@section('theme_scripts')

@endsection
@section('content')
    <div class="container">

        <div style="width:100%;height:200px;background-image: url('storage/1.jpg') !important;background-position: center;background: 100% 100% no-repeat;background-size: cover;">


        </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
                    <li class="breadcrumb-item">Application Intel</li>
                    <li class="breadcrumb-item active">Analytics Dashboard</li>
                    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                </ol>
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-chart-area'></i> Analytics <span class='fw-300'>Dashboard</span>
                    </h1>
                    <div class="subheader-block d-lg-flex align-items-center">
                        <div class="d-inline-flex flex-column justify-content-center mr-3">
                                    <span class="fw-300 fs-xs d-block opacity-50">
                                        <small>EXPENSES</small>
                                    </span>
                            <span class="fw-500 fs-xl d-block color-primary-500">
                                        $47,000
                                    </span>
                        </div>
                        <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#886ab5" sparkHeight="32px" sparkBarWidth="5px" values="3,4,3,6,7,3,3,6,2,6,4"></span>
                    </div>
                    <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
                        <div class="d-inline-flex flex-column justify-content-center mr-3">
                                    <span class="fw-300 fs-xs d-block opacity-50">
                                        <small>MY PROFITS</small>
                                    </span>
                            <span class="fw-500 fs-xl d-block color-danger-500">
                                        $38,500
                                    </span>
                        </div>
                        <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#fe6bb0" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-6">


                        <div id="vertical-timeline" class="vertical-container light-timeline no-margins">

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon navy-bg" style="width:100px;height:100px;background-image: url('storage/badge7.PNG') !important;background-position: center;background: 100% 100% no-repeat;background-size: cover;">
                                    <i class="fa fa-briefcase"></i>
                                </div>

                                <div class="vertical-timeline-content" style="background-color: #0f619f;color:#fff">
                                    <h2>Получен новый бейдж</h2>
                                    <p>От Юлии Кризеевой
                                    </p>
                                    <a href="#" class="btn btn-sm btn-primary"> Обратная связь</a>
                                    <span class="vertical-date">
                                        Today <br>
                                        <small>Dec 24</small>
                                    </span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block" >
                                <div class="vertical-timeline-icon navy-bg" style="margin-left:7px;background-image: url('storage/ST-03.PNG') !important;background-position: center;background: 100% 100% no-repeat;background-size: cover;">
                                    <i class="fa fa-briefcase"></i>
                                </div>

                                <div class="vertical-timeline-content" >
                                    <h2>Meeting</h2>
                                    <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.
                                    </p>
                                    <a href="#" class="btn btn-sm btn-primary"> More info</a>
                                    <span class="vertical-date">
                                        Today <br>
                                        <small>Dec 24</small>
                                    </span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon blue-bg" style="margin-left:7px;background-image: url('storage/ST-17.PNG') !important;background-position: center;background: 100% 100% no-repeat;background-size: cover;">
                                    <i class="fa fa-file-text"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>Send documents to Mike</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                    <a href="#" class="btn btn-sm btn-success"> Download document </a>
                                    <span class="vertical-date">
                                        Today <br>
                                        <small>Dec 24</small>
                                    </span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg" style="background-image: url('storage/badge3.png') !important;background-position: center;background: 100% 100% no-repeat;background-size: cover;">
                                    <i class="fa fa-coffee"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>Coffee Break</h2>
                                    <p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                                    <a href="#" class="btn btn-sm btn-info">Read more</a>
                                    <span class="vertical-date"> Yesterday <br><small>Dec 23</small></span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon yellow-bg" style="background-image: url('storage/badge3.png') !important;background-position: center;background: 100% 100% no-repeat;background-size: cover;">
                                    <i class="fa fa-phone"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>Phone with Jeronimo</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                    <span class="vertical-date">Yesterday <br><small>Dec 23</small></span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-comments"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>Chat with Monica and Sandra</h2>
                                    <p>Web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>
                                    <span class="vertical-date">Yesterday <br><small>Dec 23</small></span>
                                </div>
                            </div>
                        </div>









































                    </div>



                    <div class="col-lg-3">
                        <div id="panel-2" class="panel" data-panel-fullscreen="false">
                            <div class="panel-hdr">
                                <h2>
                                    Leadersboard sent
                                </h2>
                            </div>
                            <div class="frame-wrap">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Gives</th>
                                        <th>Received</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png')"></span>
                                                            </span>


                                        </td>
                                        <td>22</td>
                                        <td>33</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-admin.png')"></span>
                                                            </span>

                                        </td>
                                        <td>21</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                           <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png')"></span>
                                                            </span>

                                        </td>
                                        <td>12</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-admin.png')"></span>
                                                            </span>

                                        </td>
                                        <td >11</td>
                                        <td>10</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>




                        <div id="panel-2" class="panel" data-panel-fullscreen="false">
                            <div class="panel-hdr">
                                <h2>
                                    Leadersboard received
                                </h2>
                            </div>
                            <div class="frame-wrap">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Gives</th>
                                        <th>Received</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png')"></span>
                                                            </span>


                                        </td>
                                        <td>22</td>
                                        <td>33</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-admin.png')"></span>
                                                            </span>

                                        </td>
                                        <td>21</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                           <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png')"></span>
                                                            </span>

                                        </td>
                                        <td>12</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-admin.png')"></span>
                                                            </span>

                                        </td>
                                        <td >11</td>
                                        <td>10</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>




                </div>
    </div>
@endsection