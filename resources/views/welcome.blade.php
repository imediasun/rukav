@extends('layouts.admin.app')

@section('content')

    @php
        $ex_c=false;
        $readonly='readonly';
    if($credit->masteller==1){
        $ex_c=true;
        $readonly='';
    }

    function calculate_age($birthday) {
  $birthday_timestamp = strtotime($birthday);
  $age = date('Y') - date('Y', $birthday_timestamp);
  if (date('md', $birthday_timestamp) > date('md')) {
    $age--;
  }
  return $age;
}

    function dt_diff($d1,$d2){
$d1 = date_create($d1);
$d2 = date_create($d2);
if ($d1>$d2) {$td=$d1;$d1=$d2;$d2=$td;}
$yr= date_format ($d2,'Y') - date_format ($d1,'Y');
$mr = date_format ($d2,'m') - date_format ($d1,'m');
$dr= date_format ($d2,'d') - date_format ($d1,'d');
$dr = ($dr<0) ?-1 :0;
$r= $yr*12 +$mr+$dr;
return $r;}




    @endphp

    <style>
        .show_data {
            font-size: 16px;
            cursor: pointer;
            position: absolute;
            right: 15px;
            font-weight: bold;
            display: block;
            width: 20px;
            height: 20px;
            margin-top: -20px;
            text-align: center;
        }

        .block_open {
            position: absolute;
            right: 15px;
            display: block;
            margin-top: 3px;
            text-align: center;
        }

        .oc_del_block {
            position: absolute;
            right: 11px;
            display: block;
            margin-top: -3px;
            text-align: center;
        }

        .oc_del {
            cursor: pointer;
        }

        .show_all_data, .hide_all_data {
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            display: block;
            width: 20px;
            height: 20px;
            text-align: center;
            color: #fff;
            float: left;
        }

        .bm_block_open {
            position: absolute;
            right: 10px;
            display: block;
            margin-top: -19px;
            text-align: center;
        }

        .all_comments {
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            display: block;
            width: 20px;
            height: 20px;
            text-align: center;
            color: #000;
        }

        .contact_row {
            height: 48px;
        }

        .contact_block {
            position: absolute;
            right: 5px;
        }
    </style>



    <div class="warning_opened" style="position:fixed;bottom:5px;left:5px;padding:2px;z-index:9999;width:200px;">

    </div>



    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row" style="margin-bottom: 15px;">

            <!-- NEW WIDGET START -->
            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueDark" data-widget-togglebutton="false"
                     data-widget-editbutton="false"
                     data-widget-colorbutton="false"
                     data-widget-fullscreenbutton="false"
                     data-widget-deletebutton="false"
                     style="margin-bottom:0px;">

                    <header>

                        <h2>Grunddaten des Hauptantragsteller</h2>
                        <div data-type="personal_data" class="block_open">
                            <div class="show_all_data">+</div>
                            <div class="hide_all_data">-</div>
                        </div>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">

                            <div class="table-responsive" data-role="app">

                                <table class="table table-bordered" data-type="personal_information">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Persönliche Angaben<span data-type="personal_data"
                                                                                 class="show_data">+</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><b>Anrede, Vorname, Nachname, Alter:</b></td>
                                        <td style="width: 50%;">
                                            {{$credit->anr==1?'Herr':'Frau'}}
                                            {{isset($credit->vorname)?$credit->vorname:''}}
                                            {{isset($credit->nachname)?$credit->nachname:''}},
                                            {{isset($credit->gebdat)?calculate_age($credit->gebdat).' Jahre alt':''}}
                                        </td>
                                    </tr>
                                    <tr class="hide_data">
                                        <td><b>Adresse:</b></td>
                                        <td>
                                            {{isset($credit->str)?$credit->str:''}}
                                            {{isset($credit->str_nr)?$credit->str_nr:''}},
                                            {{isset($credit->plz)?$credit->plz:''}},
                                            {{isset($credit->ort)?$credit->ort:''}}
                                        </td>
                                    </tr>
                                    <tr class="hide_data">
                                        <td><b>Geburtsdatum, Geburtsort:</b></td>
                                        <td>
                                            {{isset($credit->gebdat)?date("d.m.Y", strtotime($credit->gebdat)):''}}
                                            {{isset($credit->geb_ort)?$credit->geb_ort:''}}
                                        </td>
                                    </tr>
                                    <tr class="hide_data">
                                        <td><b>Staatsangehörigkeit:</b></td>
                                        <td>
                                            @foreach($staat as $st=>$st_name)
                                                @foreach($st_name as $key=>$n)
                                                    @if($n=='selected')
                                                        {{$key}}
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Tel1:</b>
                                            <span style="font-size:0.85em;">
											(erreichbarkeit:
                                                @foreach($erreichbarkeit as $st=>$st_name)
                                                    @foreach($st_name as $key=>$n)
                                                        @if($n=='selected')
                                                            {{$key}})
                                                        @endif
                                                    @endforeach
                                                @endforeach
											</span>

                                        </td>
                                        <td class="contact_row">
                                            {{isset($credit->telefon)?$credit->telefon:''}}

                                            @if(isset($credit->telefon) && trim(isset($credit->telefon))!='' && trim(isset($credit->telefon))!=null)
                                                <label class="input contact_block">
                                                    <a href="/{{$admin_type}}/sms_senden/{{$credit->telefon}}/{{$credit->id}}"
                                                       target="_blank" title="SMS senden">
                                                        <img src="/img/icon_sms.png" alt="" title=""
                                                             style="vertical-align: middle;margin-left:5px;"
                                                             class="contact_icons"></a>
                                                    <a href="/{{$admin_type}}/whatsup_senden/{{$credit->telefon}}/{{$credit->id}}"
                                                       target="_blank" title="Whatsapp senden">
                                                        <img src="/img/icon_whatsapp.png" alt="" title=""
                                                             style="vertical-align: middle;margin-left:10px;"
                                                             class="contact_icons"></a>
                                                    <a href="callto:{{$credit->telefon}}" title="anrufen"><img
                                                                src="/img/icon_handy.png" alt="" title=""
                                                                style="vertical-align: middle;margin-left:10px;"
                                                                class="contact_icons"></a>
                                                </label>
                                            @endif


                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Tel2:</b>
                                            <span style="font-size:0.85em;">
											(erreichbarkeit:
                                                @foreach($erreichbarkeit as $st=>$st_name)
                                                    @foreach($st_name as $key=>$n)
                                                        @if($n=='selected')
                                                            {{$key}})
                                                        @endif

                                                    @endforeach
                                                @endforeach
											</span>
                                        </td>
                                        <td class="contact_row">
                                            {{isset($credit->handy)?$credit->handy:''}}

                                            @if(isset($credit->handy) && trim(isset($credit->handy))!='' && trim(isset($credit->handy))!=null)
                                                <label class="input contact_block">
                                                    <a href="/{{$admin_type}}/sms_senden/{{$credit->handy}}/{{$credit->id}}"
                                                       target="_blank" title="SMS senden">
                                                        <img src="/img/icon_sms.png" alt="" title=""
                                                             style="vertical-align: middle;margin-left:5px;"
                                                             class="contact_icons"></a>
                                                    <a href="/{{$admin_type}}/whatsup_senden/{{$credit->handy}}/{{$credit->id}}"
                                                       target="_blank" title="Whatsapp senden">
                                                        <img src="/img/icon_whatsapp.png" alt="" title=""
                                                             style="vertical-align: middle;margin-left:10px;"
                                                             class="contact_icons"></a>
                                                    <a href="callto:{{$credit->handy}}" title="anrufen"><img
                                                                src="/img/icon_handy.png" alt="" title=""
                                                                style="vertical-align: middle;margin-left:10px;"
                                                                class="contact_icons"></a>
                                                </label>
                                            @endif


                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Email:</b></td>
                                        <td class="contact_row">
                                            <a style="text-decoration:none"
                                               href="mailto:{{$credit->email}}">{{$credit->email}}</a>

                                            <label class="input contact_block">
                                                <a href="/{{$admin_type}}/email_senden/{{$credit->id}}"
                                                   target="_blank"
                                                   title="Email senden">
                                                    <img src="/img/icon_email.png" alt="" title=""
                                                         style="vertical-align: middle;margin-left:5px;"
                                                         class="contact_icons"></a>
                                            </label>
                                        </td>
                                    </tr>
                                    {{--
                                    <tr>
                                        <td><b>STATUS:</b></td>
                                        <td>
                                            @foreach($status_intern as $k=>$v)
                                                @foreach($v as $key=>$value)
                                                    @if($value=='selected')
                                                        {{$key}}
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                    </tr>
                                    --}}
                                    </tbody>
                                </table>

                            </div>


                            <div class="table-responsive" data-role="app">
                                <table class="table table-bordered" data-type="family_situation">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Familäre Situation<span data-type="personal_data"
                                                                                class="show_data">+</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="width: 50%;"><b>Familienstand:</b></td>
                                        <td>
                                            @foreach($famstand as $st=>$st_name)
                                                @foreach($st_name as $key=>$n)
                                                    @if($n=='selected')
                                                        {{$key}}
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Anzahl Kinder:</b></td>
                                        <td>
                                            {{isset($credit->kinder)?$credit->kinder:''}}
                                        </td>
                                    </tr>
                                    <tr class="{{$credit->unterhalt_enabled==0?'hide_data':'open_data'}}">
                                        <td><b>Unterhaltsverpflichtungen:</b></td>
                                        <td>
                                            @if(isset($credit->unterhalt_enabled))
                                                {{$credit->unterhalt_enabled==0?'Nein':'Ja'}}
                                            @endif
                                        </td>
                                    </tr>
                                    @if($credit->unterhalt_enabled==1)
                                        <tr>
                                            <td><b>H&ouml;he des Unterhalts:</b></td>
                                            <td>
                                                {{isset($credit->unterhalt)?$credit->unterhalt:''}}
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>


                            <div class="table-responsive" data-role="app">

                                <table class="table table-bordered" data-type="housing_situation">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Wohnsituation<span data-type="personal_data"
                                                                           class="show_data">+</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="width: 50%;"><b>Wohnsituation:</b></td>
                                        <td>
                                            @foreach($wohnsituation as $key=>$value)
                                                @foreach($value as $k=>$v)
                                                    @if($v=='selected')
                                                        {{$k}}
                                                        @php $ws=$key; @endphp
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                    </tr>
                                    @if($ws==1)
                                        <tr>
                                            <td><b>Miete:</b></td>
                                            <td>
                                                {{isset($credit->miete)?$credit->miete:''}}
                                            </td>
                                        </tr>
                                    @endif
                                    <tr class="hide_data">
                                        <td><b>Wohnhaft seit:</b></td>
                                        <td>
                                            @if(isset($credit->wohnhaft_seit))
                                                {{date("d.m.Y", strtotime($credit->wohnhaft_seit))}}
                                            @endif
                                        </td>
                                    </tr>
                                    {{--
                                    <tr class="hide_data">
                                        <td><b>Eigentum:</b></td>
                                        <td>
                                            @if(isset($credit->eigentum))
                                                {{$credit->eigentum==0?'Nein':'Ja'}}
                                            @endif
                                        </td>
                                    </tr>
                                    --}}
                                    @if($credit->eigentum==1)
                                        <tr class="hide_data">
                                            <td><b>Art des Eigentum:</b></td>
                                            <td>
                                                @foreach($eigentum_typ as $key=>$value)
                                                    @foreach($value as $k=>$v)
                                                        @if($v=='selected')
                                                            {{$k}}
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Eigentum Belastung mtl.:</b></td>
                                            <td>
                                                @if(isset($credit->eigentum_belastung_mtl))
                                                    {{$credit->eigentum_belastung_mtl}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Eigentum Mieteinahmen mtl.:</b></td>
                                            <td>
                                                @if(isset($credit->eigentum_miete))
                                                    {{$credit->eigentum_miete}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="hide_data">
                                            <td><b>Wert des Eigentums ca.:</b></td>
                                            <td>
                                                @if(isset($credit->eigentum_wert)) {{$credit->eigentum_wert}} @endif
                                            </td>
                                        </tr>
                                        <tr class="hide_data">
                                            <td><b>Gesamte Belastung Eigentum:</b></td>
                                            <td>
                                                @if(isset($credit->eigentum_belastung)) {{$credit->eigentum_belastung}} @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @php
                                        $class='open_data';
                                                                              if(isset($credit->eigentum_zusatz)){
                                        if($credit->eigentum_zusatz==0){
                                        $class='hide_data';
                                        }
                                        }


                                    @endphp

                                    <tr class="{{$class}}">
                                        <td><b>Weiteres Eigentum:</b></td>
                                        <td>
                                            @if(isset($credit->eigentum_zusatz))
                                                {{$credit->eigentum_zusatz==0?'Nein':'Ja'}}
                                            @endif
                                        </td>
                                    </tr>

                                    @if($credit->eigentum_zusatz==1)
                                        <tr class="hide_data">
                                            <td><b>Art des Eigentums:</b></td>
                                            <td>
                                                @foreach($eigentum_typ_zusatz as $key=>$value)
                                                    @foreach($value as $k=>$v)
                                                        @if($v=='selected')
                                                            {{$k}}
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>Eigentum Belastung mtl.:</b></td>
                                            <td>
                                                @if(isset($credit->eigentum_belastung_mtl_zusatz)) {{$credit->eigentum_belastung_mtl_zusatz}} @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>Eigentum Mieteinahmen mtl.:</b></td>
                                            <td>
                                                @if(isset($credit->eigentum_miete_zusatz))
                                                    {{$credit->eigentum_miete_zusatz}}
                                                @endif
                                            </td>
                                        </tr>



                                        <tr class="hide_data">
                                            <td><b>Wert des Eigentums ca.:</b></td>
                                            <td>
                                                @if(isset($credit->eigentum_wert_zusatz)) {{$credit->eigentum_wert_zusatz}} @endif
                                            </td>
                                        </tr>

                                        <tr class="hide_data">
                                            <td><b>Gesamte Belastung Eigentum:</b></td>
                                            <td>
                                                @if(isset($credit->eigentum_belastung_zusatz)) {{$credit->eigentum_belastung_zusatz}} @endif
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                            </div>


                            @php
                                if(isset($credit->anstellung)){
                                    $mn=dt_diff($credit->anstellung,date("Y-m-d"));
                                }
                                $stc=-1;
                            if(isset($credit->anstellung_als)){
                            $stc=$credit->anstellung_als;
                            }
                            @endphp

                            <div class="table-responsive" data-role="app">

                                <table class="table table-bordered" data-type="employment_details">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Berufliche Angaben
                                            {!! $mn<6?'<i class="fa fa-sort-amount-desc" style="color:red;"></i>':'' !!}
                                            {!! ($stc==4 || $stc==5)?'<i class="fa fa-shield" style="color:green;"></i>':'' !!}

                                            <span data-type="personal_data" class="show_data">+</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="width: 50%;"><b>Beruf:</b></td>
                                        <td>
                                            @foreach($beruf as $st=>$st_name)
                                                @foreach($st_name as $key=>$n)
                                                    @if($n=='selected')
                                                        {{$key}}
                                                        @php $selected_beruf=$st;
                                                        $_unstellung_beruf=array(32,15,16);
                                                        @endphp                                    @endif

                                                @endforeach
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr class="hide_data">
                                        <td><b>Arbeitgeber:</b></td>
                                        <td>
                                            @if(isset($credit->arbeitgeber)) {{$credit->arbeitgeber}} @endif
                                        </td>
                                    </tr>
                                    <tr class="hide_data">
                                        <td><b>Arbeitgeber Adresse:</b></td>
                                        <td>
                                            @if(isset($credit->arbeitgeber_plz)) {{$credit->arbeitgeber_plz}} @endif
                                            @if(isset($credit->arbeitgeber_ort)) {{$credit->arbeitgeber_ort}} @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Netto:</b></td>
                                        <td>
                                            @if(isset($credit->netto)) {{$credit->netto}} @endif
                                        </td>
                                    </tr>
                                    @if( !in_array($selected_beruf, $_unstellung_beruf))
                                        <tr class="hide_data">
                                            <td><b>Anstellung seit:</b></td>
                                            <td>
                                                @if(isset($credit->anstellung)) {{date("d.m.Y", strtotime($credit->anstellung))}} @endif
                                            </td>
                                        </tr>
                                        <tr class="{{$credit->arbeit_befristet==0?'hide_data':'open_data'}}">
                                            <td><b>Arbeit befristet:</b></td>
                                            <td>
                                                {{$credit->arbeit_befristet==1?'Ja':'Nein'}}@if($credit->arbeit_befristet==1)
                                                    , befristet
                                                    bis: @if(isset($credit->arbeit_befristet_date)) {{date("d.m.Y", strtotime($credit->arbeit_befristet_date))}}
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    <tr class="hide_data">
                                        <td><b>Steuerklasse:</b></td>
                                        <td>
                                            @if(isset($credit->anstellung_als)) {{$credit->anstellung_als}} @endif
                                        </td>
                                    </tr>
                                    <tr class="hide_data">
                                        <td><b>Nebeneinkommen:</b></td>
                                        <td>
                                            {{$credit->nebeneinkommen==0?'Nein':'Ja'}}
                                        </td>
                                    </tr>
                                    @if($credit->nebeneinkommen==1)
                                        <tr>
                                            <td><b>Nebeneinkommen mtl.:</b></td>
                                            <td>
                                                @if(isset($credit->nebeneinkommen_mtl)) {{$credit->nebeneinkommen_mtl}} @endif
                                            </td>
                                        </tr>
                                    @endif
                                    <tr class="hide_data">
                                        <td><b>Privat Krankenversichert:</b></td>
                                        <td>                                           {{$credit->sv_pkv==0?'Nein':'Ja'}}
                                        </td>
                                    </tr>
                                    @if(!($credit->sv_pkv==!1))
                                        <tr>
                                            <td><b></b></td>
                                            <td>
                                                @if(isset($credit->sv_pkv_mtl)) {{$credit->sv_pkv_mtl}} @endif
                                            </td>
                                        </tr>
                                    @endif
                                    {{--
                                    <tr>
                                        <td><b>Verwendungszweck:</b></td>
                                        <td>
                                            @foreach($vzweck as $key=>$value)
                                                @foreach($value as $k=>$v)
                                                    @if($v=='selected')
                                                        {{$k}}
                                                    @endif

                                                @endforeach
                                            @endforeach
                                        </td>
                                    </tr>
                                    --}}
                                    </tbody>
                                </table>

                            </div>


                            <div class="table-responsive" data-role="app">

                                <table class="table table-bordered" data-type="bank_data">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Bankdaten<span data-type="personal_data"
                                                                       class="show_data">+</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="hide_data">
                                        <td style="width: 50%;"><b>Bank:</b></td>
                                        <td>
                                            @if(isset($credit->bankname)) {{$credit->bankname}} @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>IBAN:</b></td>
                                        <td>
                                            @if(isset($credit->iban)) {{$credit->iban}} @endif
                                        </td>
                                    </tr>
                                    <tr class="hide_data">
                                        <td><b>Kontonummer:</b></td>
                                        <td>
                                            @if(isset($credit->kto)) {{$credit->kto}} @endif
                                        </td>
                                    </tr>
                                    <tr class="hide_data">
                                        <td><b>Bankleitzahl:</b></td>
                                        <td>
                                            @if(isset($credit->blz)) {{$credit->blz}} @endif
                                        </td>
                                    </tr>
                                    {{--                                    <tr class="hide_data">
                                                                            <td><b>BIC:</b></td>
                                                                            <td>
                                                                                @if(isset($credit->bic)) {{$credit->bic}} @endif
                                                                            </td>
                                                                        </tr>--}}
                                    </tbody>
                                </table>

                            </div>


                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

            <!-- NEW WIDGET START -->
            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueDark" data-widget-togglebutton="false"
                     data-widget-editbutton="false"
                     data-widget-colorbutton="false"
                     data-widget-fullscreenbutton="false"
                     data-widget-deletebutton="false"
                     style="margin-bottom:0px;"
                     style="background-color: #fff;">

                    @if(!$ex_c)

                        <div style="position:absolute;width:100%;height:100%;z-index:1000;top:0;left:0;background-color: black;opacity: 0.6;filter: alpha(Opacity=60);">

                            <img src="{{asset('img/no_person.png')}}" class="img-responsive"
                                 style="height:200px;display: block;margin: 35px auto;"/>


                        </div>
                    @endif

                    <header>

                        <h2>Grunddaten des Coapplicant</h2>
                        @if($ex_c)
                            <div data-type="personal_data" class="block_open">
                                <div class="show_all_data">+</div>
                                <div class="hide_all_data">-</div>
                            </div>
                        @endif

                    </header>
                    @if($ex_c)
                    <!-- widget div-->
                        <div>

                            <!-- widget content -->
                            <div class="widget-body">


                                <div class="table-responsive" data-role="coapp">

                                    <table class="table table-bordered" data-type="personal_information">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Persönliche Angaben<span data-type="personal_data"
                                                                                     class="show_data">+</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><b>Anrede, Vorname, Nachname, Alter:</b></td>
                                            <td style="width: 50%;">
                                                {{$credit->anr1==1?'Herr':'Frau'}}
                                                {{isset($credit->vorname1)?$credit->vorname1:''}}
                                                {{isset($credit->nachname1)?$credit->nachname1:''}},
                                                {{isset($credit->gebdat1)?calculate_age($credit->gebdat1).' Jahre alt':''}}
                                            </td>
                                        </tr>
                                        <tr class="hide_data">
                                            <td><b>Adresse:</b></td>
                                            <td>
                                                {{isset($credit->str1)?$credit->str1:''}}
                                                {{isset($credit->str_nr1)?$credit->str_nr1:''}},
                                                {{isset($credit->plz1)?$credit->plz1:''}},
                                                {{isset($credit->ort1)?$credit->ort1:''}}
                                            </td>
                                        </tr>
                                        <tr class="hide_data">
                                            <td><b>Geburtsdatum, Geburtsort:</b></td>
                                            <td>
                                                {{isset($credit->gebdat1)?date("d.m.Y", strtotime($credit->gebdat1)):''}}
                                                {{isset($credit->geb_ort1)?$credit->geb_ort1:''}}
                                            </td>
                                        </tr>
                                        <tr class="hide_data">
                                            <td><b>Staatsangehörigkeit:</b></td>
                                            <td>
                                                @foreach($staat1 as $st=>$st_name)
                                                    @foreach($st_name as $key=>$n)
                                                        @if($n=='selected')
                                                            {{$key}}
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                        </tr>
                                        {{--
                                        <tr>
                                            <td><b>Telefon:</b>
                                                <br>
                                                <span style="font-size:0.85em;">
                                                Erreichbarkeit:
                                                    @foreach($erreichbarkeit as $st=>$st_name)
                                                        @foreach($st_name as $key=>$n)
                                                            @if($n=='selected')
                                                                {{$key}}
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </span>

                                            </td>
                                            <td>
                                                {{isset($credit->telefon)?$credit->telefon:''}}

                                                <label class="input ">
                                                    <a href="/{{$admin_type}}/sms_senden/{{$credit->telefon}}/{{$credit->id}}"
                                                       target="_blank" title="SMS senden">
                                                        <img src="/img/icon_sms.png" alt="" title=""
                                                             style="vertical-align: middle;margin-left:6px;"></a>
                                                    <a href="/{{$admin_type}}/whatsup_senden/{{$credit->telefon}}/{{$credit->id}}"
                                                       target="_blank" title="Whatsapp senden">
                                                        <img src="/img/icon_whatsapp.png" alt="" title=""
                                                             style="vertical-align: middle;margin-left:12px;"></a>
                                                    <a href="callto:{{$credit->telefon}}" title="anrufen"><img
                                                                src="/img/icon_handy.png" alt="" title=""
                                                                style="vertical-align: middle;margin-left:12px;"></a>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Mobiltelefon:</b>
                                                <br>
                                                <span style="font-size:0.85em;">
                                                Erreichbarkeit:
                                                    @foreach($erreichbarkeit as $st=>$st_name)
                                                        @foreach($st_name as $key=>$n)
                                                            @if($n=='selected')
                                                                {{$key}}
                                                            @endif

                                                        @endforeach
                                                    @endforeach
                                                </span>
                                            </td>
                                            <td>
                                                {{isset($credit->handy)?$credit->handy:''}}

                                                <label class="input ">
                                                    <a href="/{{$admin_type}}/sms_senden/{{$credit->handy}}/{{$credit->id}}"
                                                       target="_blank" title="SMS senden">
                                                        <img src="/img/icon_sms.png" alt="" title=""
                                                             style="vertical-align: middle;margin-left:6px;"></a>
                                                    <a href="/{{$admin_type}}/whatsup_senden/{{$credit->handy}}/{{$credit->id}}"
                                                       target="_blank" title="Whatsapp senden">
                                                        <img src="/img/icon_whatsapp.png" alt="" title=""
                                                             style="vertical-align: middle;margin-left:12px;"></a>
                                                    <a href="callto:{{$credit->handy}}" title="anrufen"><img
                                                                src="/img/icon_handy.png" alt="" title=""
                                                                style="vertical-align: middle;margin-left:12px;"></a>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Email:</b></td>
                                            <td>
                                                <a style="text-decoration:none"
                                                   href="mailto:{{$credit->email}}">{{$credit->email}}</a>

                                                <label class="input ">
                                                    <a href="/{{$admin_type}}/email_senden/{{$credit->id}}"
                                                       target="_blank"
                                                       title="Email senden">
                                                        <img src="/img/icon_email.png" alt="" title=""
                                                             style="vertical-align: middle;margin-left:6px;"></a>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>STATUS:</b></td>
                                            <td>
                                                @foreach($status_intern as $k=>$v)
                                                    @foreach($v as $key=>$value)
                                                        @if($value=='selected')
                                                            {{$key}}
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                        </tr>
                                        --}}
                                        </tbody>
                                    </table>

                                </div>


                                <div class="table-responsive" data-role="coapp">
                                    <table class="table table-bordered" data-type="family_situation">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Familäre Situation<span data-type="personal_data"
                                                                                    class="show_data">+</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="width: 50%;"><b>Familienstand:</b></td>
                                            <td>
                                                @foreach($famstand as $st=>$st_name)
                                                    @foreach($st_name as $key=>$n)
                                                        @if($n=='selected')
                                                            {{$key}}
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b></b></td>
                                            <td>
                                                <br>
                                            </td>
                                        </tr>
                                        <tr class="{{$credit->unterhalt_enabled1==0?'hide_data':'open_data'}}">
                                            <td><b>Unterhaltsverpflichtungen:</b></td>
                                            <td>
                                                @if(isset($credit->unterhalt_enabled1))
                                                    {{$credit->unterhalt_enabled1==0?'Nein':'Ja'}}
                                                @endif
                                            </td>
                                        </tr>
                                        @if($credit->unterhalt_enabled1==1)
                                            <tr>
                                                <td><b>H&ouml;he des Unterhalts:</b></td>
                                                <td>
                                                    {{isset($credit->unterhalt1)?$credit->unterhalt1:''}}
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>


                                <div class="table-responsive" data-role="coapp">

                                    <table class="table table-bordered" data-type="housing_situation">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Wohnsituation<span data-type="personal_data"
                                                                               class="show_data">+</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="width: 50%;"><b>Gemeinsamer Haushalt
                                                </b></td>
                                            <td>
                                                @if($credit->gesamtbetrachtung==0)  Nein @endif
                                                @if($credit->gesamtbetrachtung==1)  Ja @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>


                                <div class="table-responsive" data-role="coapp">

                                    @php
                                        if(isset($credit->anstellung1)){
                                            $mn=dt_diff($credit->anstellung1,date("Y-m-d"));
                                        }
                                        $stc=-1;
                                    if(isset($credit->anstellung_als1)){
                                    $stc=$credit->anstellung_als1;
                                    }
                                    @endphp

                                    <table class="table table-bordered" data-type="employment_details">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Berufliche Angaben
                                                {!! $mn<6?'<i class="fa fa-sort-amount-desc" style="color:red;"></i>':'' !!}
                                                {!! ($stc==4 || $stc==5)?'<i class="fa fa-shield" style="color:green;"></i>':'' !!}

                                                <span data-type="personal_data" class="show_data">+</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="width: 50%;"><b>Beruf:</b></td>
                                            <td>
                                                @foreach($beruf1 as $st=>$st_name)
                                                    @foreach($st_name as $key=>$n)
                                                        @if($n=='selected')
                                                            {{$key}}
                                                            @php $selected_beruf=$st;
                                                        $_unstellung_beruf=array(32,15,16);
                                                            @endphp                                    @endif

                                                    @endforeach
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr class="hide_data">
                                            <td><b>Arbeitgeber:</b></td>
                                            <td>
                                                @if(isset($credit->arbeitgeber1)) {{$credit->arbeitgeber1}} @endif
                                            </td>
                                        </tr>
                                        <tr class="hide_data">
                                            <td><b>Arbeitgeber Adresse:</b></td>
                                            <td>
                                                @if(isset($credit->arbeitgeber_plz1)) {{$credit->arbeitgeber_plz1}} @endif
                                                @if(isset($credit->arbeitgeber_ort1)) {{$credit->arbeitgeber_ort1}} @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Netto:</b></td>
                                            <td>
                                                @if(isset($credit->netto1)) {{$credit->netto1}} @endif
                                            </td>
                                        </tr>
                                        @if( !in_array($selected_beruf, $_unstellung_beruf))
                                            <tr class="hide_data">
                                                <td><b>Anstellung seit:</b></td>
                                                <td>
                                                    @if(isset($credit->anstellung1)) {{date("d.m.Y", strtotime($credit->anstellung1))}} @endif
                                                </td>
                                            </tr>
                                            <tr class="{{$credit->arbeit_befristet1==0?'hide_data':'open_data'}}">
                                                <td><b>Arbeit befristet:</b></td>
                                                <td>
                                                    {{$credit->arbeit_befristet1==1?'Ja':'Nein'}}@if($credit->arbeit_befristet1==1)
                                                        , befristet
                                                        bis: @if(isset($credit->arbeit_befristet_date1)) {{date("d.m.Y", strtotime($credit->arbeit_befristet_date1))}}
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>

                                        @endif
                                        <tr class="hide_data">
                                            <td><b>Steuerklasse:</b></td>
                                            <td>
                                                @if(isset($credit->anstellung_als1)) {{$credit->anstellung_als1}} @endif
                                            </td>
                                        </tr>
                                        <tr class="hide_data">
                                            <td><b>Nebeneinkommen:</b></td>
                                            <td>
                                                {{$credit->nebeneinkommen1==0?'Nein':'Ja'}}
                                            </td>
                                        </tr>
                                        @if($credit->nebeneinkommen1==1)
                                            <tr>
                                                <td><b>Nebeneinkommen mtl.:</b></td>
                                                <td>
                                                    @if(isset($credit->nebeneinkommen_mtl1)) {{$credit->nebeneinkommen_mtl1}} @endif
                                                </td>
                                            </tr>
                                        @endif
                                        @if(!($credit->sv_pkv==!1))
                                            <tr>
                                                <td><b></b></td>
                                                <td>
                                                    @if(isset($credit->sv_pkv_mtl1)) {{$credit->sv_pkv_mtl1}} @endif
                                                </td>
                                            </tr>
                                        @endif
                                        {{--
                                        <tr>
                                            <td><b>Verwendungszweck:</b></td>
                                            <td>
                                                @foreach($vzweck as $key=>$value)
                                                    @foreach($value as $k=>$v)
                                                        @if($v=='selected')
                                                            {{$k}}
                                                        @endif

                                                    @endforeach
                                                @endforeach
                                            </td>
                                        </tr>
                                        --}}
                                        </tbody>
                                    </table>

                                </div>


                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->
                    @endif
                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->


        </div>

        <!-- end row -->

        <div class="clearfix"></div>

        <!-- row -->
        <div class="row" style="margin-bottom: 15px;">

            <article class="col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-blueDark" data-widget-togglebutton="false"
                     data-widget-editbutton="false"
                     data-widget-colorbutton="false"
                     data-widget-fullscreenbutton="false"
                     data-widget-deletebutton="false"
                     style="margin-bottom:15px;">

                    <div class="well well-sm well-light">
                        <div id="tabs" style="margin-bottom: 15px;">
                            <ul>
                                <li>
                                    <a href="#tabs-a">Kreditwunsch</a>
                                </li>
                                <li>
                                    <a href="#tabs-b">Wiedervorlage <i class="fa fa-bell"
                                                                       style="color:#e40100;{{$wiedervorlage_active?'':'display:none;'}}"
                                                                       id="rem_not"></i></a>
                                </li>
                                <li>
                                    <a href="#tabs-c">Unterlagen / Upload</a>
                                </li>
                                <li>
                                    <a href="#tabs-d">Vorhandene Kredite</a>
                                </li>
                                <li>
                                    <a href="#tabs-e">Sonstiges</a>
                                </li>
                            </ul>
                            <div id="tabs-a">
                                <!-- row -->
                                <div class="row">


                                    <!-- NEW WIDGET START -->
                                    <article style="margin-bottom: 15px;"
                                             class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <!-- Widget ID (each widget will need unique ID)-->
                                        <div class="jarviswidget jarviswidget-color-blueDark"
                                             data-widget-togglebutton="false"
                                             data-widget-editbutton="false"
                                             data-widget-colorbutton="false"
                                             data-widget-fullscreenbutton="false"
                                             data-widget-deletebutton="false">

                                            <header>

                                                <h2>KreditDaten</h2>

                                            </header>

                                            <!-- widget div-->
                                            <div id="tab-a-1">

                                                <!-- widget content -->
                                                <div class="widget-body">

                                                    <div class="table-responsive">

                                                        <table class="table table-bordered">
                                                            <tbody>
                                                            <tr>
                                                                <td><b>Anfrage Kreditbetrag:</b></td>
                                                                <td>
                                                                    {{isset($credit->kreditbetrag)?$credit->kreditbetrag:''}}
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td><b>Wunschrate:</b></td>
                                                                <td>
                                                                    {{isset($credit->mtl_rate)?$credit->mtl_rate:''}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Verwendungszweck:</b></td>
                                                                <td>
                                                                    @foreach($vzweck as $key=>$value)
                                                                        @foreach($value as $k=>$v)
                                                                            @if($v=='selected')
                                                                                {{$k}}
                                                                            @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                </td>
                                                            </tr>


                                                            {{--

                                                                                                           <tr>
                                                                                                                                <td><b>Laufzeit bis:</b></td>
                                                                                                                                <td>
                                                                                                                                    {{isset($credit->laufzeit_bis)?date("d.m.Y", strtotime($credit->laufzeit_bis)):''}}
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td><b>Abschlussdatum:</b></td>
                                                                                                                                <td>
                                                                                                                                    {{isset($credit->abschlussdatum)?date("d.m.Y", strtotime($credit->abschlussdatum)):''}}
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td><b>Bank:</b></td>
                                                                                                                                <td>
                                                                                                                                    {{isset($credit->bank)?$credit->bank:''}}
                                                                                                                                </td>
                                                                                                                            </tr>
                                                            <tr>
                                                                <td><b>Monatliche Rate</b></td>
                                                                <td>{{isset($credit->mtl_rate)?$credit->mtl_rate:''}}
                                                                </td>
                                                            </tr>
                                                                                                                      <tr>
                                                                                                                            <td><b>Effekt. Zinssatz:</b></td>
                                                                                                                            <td>
                                                                                                                                {{isset($credit->eff_zinssatz)?$credit->eff_zinssatz:''}}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td><b>Sollzinssatz:</b></td>
                                                                                                                            <td>
                                                                                                                                {{isset($credit->soll_zinsatz)?$credit->soll_zinsatz:''}}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td><b>Aussendienst:</b></td>
                                                                                                                            <td>
                                                                                                                                {{$credit->aussendienst==1?'Ja':'Nein'}}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td><b>Selbstauskunft:</b></td>
                                                                                                                            <td>
                                                                                                                                {{$credit->selbstauskunft==1?'Ja':'Nein'}}
                                                                                                                            </td>
                                                                                                                        </tr>--}}
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <!-- end widget content -->

                                            </div>
                                            <!-- end widget div -->

                                        </div>
                                        <!-- end widget -->

                                    </article>
                                    <!-- WIDGET END -->


                                    <!-- NEW WIDGET START -->
                                    <article style="margin-bottom: 15px;"
                                             class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <!-- Widget ID (each widget will need unique ID)-->
                                        <div class="jarviswidget jarviswidget-color-blueDark"
                                             data-widget-togglebutton="false"
                                             data-widget-editbutton="false"
                                             data-widget-colorbutton="false"
                                             data-widget-fullscreenbutton="false"
                                             data-widget-deletebutton="false">

                                            <header>

                                                <h2>Status</h2>

                                            </header>

                                            <!-- widget div-->
                                            <div id="block_status">

                                                <!-- widget content -->
                                                <div class="widget-body">
                                                    @php $st=''; @endphp
                                                    @foreach($status_intern as $k=>$v)
                                                        @foreach($v as $key=>$value)
                                                            @if($value=='selected')
                                                                @php $st=$key; $stid=$k; @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                    @unset($k)

                                                    <h4>Aktueller Status: <strong id="as_name">{{$st}}</strong>
                                                    </h4>
                                                    <hr>
                                                    <select data-stid="{{$stid}}" id="status_intern"
                                                            name="status_intern" class="form-control">
                                                        @foreach($status_intern as $k=>$v)
                                                            <option value="{{$k}}"
                                                                    @foreach($v as $key=>$value)
                                                                    @if($value=='selected') selected="selected" @endif>{{$key}}</option>
                                                        @endforeach
                                                        @endforeach
                                                    </select>
                                                    <footer>
                                                        <button id="btn-status-set"
                                                                class="btn btn-success disabled"
                                                                style="margin: 15px 0;">Set
                                                        </button>

                                                        <span class="alert alert-success fade in"
                                                              id="status_info">
                        <i class="fa-fw fa fa-check"></i>
                        <strong>Success</strong></span>


                                                    </footer>
                                                </div>
                                                <!-- end widget content -->

                                            </div>
                                            <!-- end widget div -->
                                        </div>
                                        <!-- end widget -->

                                    </article>
                                    <!-- WIDGET END -->


                                    <!-- NEW WIDGET START -->
                                    <article style="margin-bottom: 15px;"
                                             class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <!-- Widget ID (each widget will need unique ID)-->
                                        <div class="jarviswidget jarviswidget-color-blueDark"
                                             data-widget-togglebutton="false"
                                             data-widget-editbutton="false"
                                             data-widget-colorbutton="false"
                                             data-widget-fullscreenbutton="false"
                                             data-widget-deletebutton="false">

                                            <header>

                                                <h2>Andere Daten</h2>

                                            </header>


                                            <!-- widget div-->
                                            <div id="tab-a-3">

                                                <!-- widget content -->
                                                <div class="widget-body">


                                                    <div class="table-responsive">

                                                        <table class="table table-bordered">
                                                            <tbody>
                                                            {{--                                                            <tr>
                                                                                                                            <td style="width:40%;"><b>Partner ID:</b></td>
                                                                                                                            <td>
                                                                                                                                {{$credit->partner_id}}
                                                                                                                            </td>
                                                               </tr>--}}
                                                            <tr>
                                                                <td><b>Tatsächlicher Kreditbetrag:</b></td>
                                                                <td style="width: 23%;">
                                                                    <a id="brutto_kreditbetrag"
                                                                       name="brutto_kreditbetrag"
                                                                       data-pk="{{$credit->id}}" data-type="text"
                                                                       href="#"
                                                                       class="editable editable-click">{{isset($credit->brutto_kreditbetrag)?$credit->brutto_kreditbetrag:''}}</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Rate:</b></td>
                                                                <td>
                                                                    <a id="rate"
                                                                       name="rate"
                                                                       data-pk="{{$credit->id}}" data-type="text"
                                                                       href="#"
                                                                       class="editable editable-click">{{isset($credit->rate)?$credit->rate:''}}</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Laufzeit:</b></td>
                                                                <td>
                                                                    <a id="laufzeit"
                                                                       name="laufzeit"
                                                                       data-pk="{{$credit->id}}" data-type="text"
                                                                       href="#"
                                                                       class="editable editable-click">{{isset($credit->laufzeit)?$credit->laufzeit:''}}</a>
                                                                </td>
                                                            </tr>
                                                            {{--                                                            <tr>
                                                                                                                            <td><b>Laufzeit bis:</b></td>
                                                                                                                            <td>
                                                                                                                                {{isset($credit->laufzeit_bis)?date("d.m.Y", strtotime($credit->laufzeit_bis)):''}}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td><b>Abschlussdatum:</b></td>
                                                                                                                            <td>
                                                                                                                                {{isset($credit->abschlussdatum)?date("d.m.Y", strtotime($credit->abschlussdatum)):''}}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td><b>Bank:</b></td>
                                                                                                                            <td>
                                                                                                                                {{isset($credit->bank)?$credit->bank:''}}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                            <tr>
                                                                <td><b>Monatliche Rate</b></td>
                                                                <td>
                                                                    {{isset($credit->mtl_rate)?$credit->mtl_rate:''}}
                                                                </td>
                                                            </tr>
                                                                                                                      <tr>
                                                                                                                            <td><b>Effekt. Zinssatz:</b></td>
                                                                                                                            <td>
                                                                                                                                {{isset($credit->eff_zinssatz)?$credit->eff_zinssatz:''}}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td><b>Sollzinssatz:</b></td>
                                                                                                                            <td>
                                                                                                                                {{isset($credit->soll_zinsatz)?$credit->soll_zinsatz:''}}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td><b>Aussendienst:</b></td>
                                                                                                                            <td>
                                                                                                                                {{$credit->aussendienst==1?'Ja':'Nein'}}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td><b>Selbstauskunft:</b></td>
                                                                                                                            <td>
                                                                                                                                {{$credit->selbstauskunft==1?'Ja':'Nein'}}
                                                                                                                            </td>
                                                                                                                        </tr>--}}
                                                            </tbody>
                                                        </table>

                                                    </div>


                                                </div>
                                            </div>


                                        </div>
                                        <!-- end widget -->

                                    </article>
                                    <!-- WIDGET END -->
                                    <!-- NEW WIDGET START -->
                                    <article style="margin-bottom: 15px;"
                                             class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <!-- Widget ID (each widget will need unique ID)-->
                                        <div class="jarviswidget jarviswidget-color-blueDark"
                                             data-widget-togglebutton="false"
                                             data-widget-editbutton="false"
                                             data-widget-colorbutton="false"
                                             data-widget-fullscreenbutton="false"
                                             data-widget-deletebutton="false"
                                             style="margin-bottom:0px;">

                                            <header>

                                                <h2>Bemerkungen</h2>
                                            </header>

                                            <!-- widget div-->
                                            <div>

                                                <!-- widget content -->
                                                <div class="widget-body">
                                                    <div class="table-responsive" id="table_comments">


                                                        {{--

                                                        <table class="table table-striped table-forum">
                                                            <tbody>
                                                            @foreach($credit->comments as $comment)
                                                                @php $admin_name=\App\User::where('id',$comment->userid)->first();
                                                                @endphp
                                                                <!-- Post -->
                                                                <tr>					
                                                                    <td>
                                                                        <em>{{date("d.m.Y H:i:s", strtotime($comment->datum))}}</em>
                                                                        <strong>@if($admin_name!==null)
                                                                                {{$admin_name->name}}
                                                                            @else
                                                                                system
                                                                            @endif</strong></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        {!! $comment->inhalt !!}
                                                                    </td>
                                                                </tr>
                                                                <!-- end Post -->

                                                            @endforeach
                                                            </tbody>
                                                        </table>

--}}

                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>


                                                                <th><i class="fa fa-calendar"></i> Datum</th>
                                                                <th><i class="fa fa-user"></i> Mitarbeiter</th>
                                                                <th><i class="fa  fa-random"></i> Bemerkung
                                                                    @if($credit->comments->count()>3)
                                                                        <div data-type="comments_data"
                                                                             class="bm_block_open">
                                                                            <div class="all_comments"><i
                                                                                        class="fa fa-angle-double-down"></i>
                                                                            </div>
                                                                        </div>
                                                                    @endif</th>

                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @php $i=0; @endphp
                                                            @foreach($credit->comments as $comment)
                                                                @php $i++; @endphp
                                                                @php $admin_name=\App\User::where('id',$comment->userid)->first();
                                                                @endphp
                                                                <tr class="{{$admin_name!==null?'':'warning '}}{{$i>3?'bm_data_hidden':''}}">
                                                                    <th style="font-weight:normal;width:20%;"> {{date("d.m.Y H:i:s", strtotime($comment->datum))}}</th>
                                                                    <th style="font-weight:normal;width:20%;">
                                                                        @if($admin_name!==null)
                                                                            {{$admin_name->name}}
                                                                        @else
                                                                            system
                                                                        @endif
                                                                    </th>
                                                                    <th style="font-weight:normal"> @php
                                                                            $string=$comment->inhalt;

                                                                        if (substr($string, 4, 3) === 'Ver'){
                                                                            $array=explode('"',$string);
                                                                        if(isset($array[1])){
                                                                            if (substr($array[1], 0, 6) === './apis'){
                                                                                $array2=explode('vnr=',$array[1]);
                                                                                $tmp_string='DSL Vertrag: <'.'a href="/admin/dsl_api_vertrag/'.$array2[1].'" target="_blank">Link'.'<'.'/a>';
                                                                            print($tmp_string);
                                                                            }
                                                                            else{
                                                                            print($comment->inhalt);
                                                                            }
                                                                         }

                                                                        }
                                                                        else{
                                                                            print($comment->inhalt);
                                                                        }

                                                                        @endphp</th>


                                                                </tr>

                                                            @endforeach


                                                            </tbody>
                                                        </table>


                                                    </div>

                                                    <a class="btn btn-success" data-toggle="modal"
                                                       data-target="#myModal"><i class="fa fa-plus"></i> Neuen
                                                        Bemerkungen hinzufügen
                                                    </a>
                                                </div>
                                                <!-- end widget content -->

                                            </div>
                                            <!-- end widget div -->

                                        </div>
                                        <!-- end widget -->

                                    </article>
                                    <!-- WIDGET END -->


                                </div>
                                <!-- end row -->
                            </div>
                            <div id="tabs-b">
                                <!-- row -->
                                <div class="row">

                                    <!-- NEW WIDGET START -->
                                    <article style="margin-bottom: 15px;"
                                             class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <!-- Widget ID (each widget will need unique ID)-->
                                        <div class="jarviswidget jarviswidget-color-blueDark"
                                             data-widget-togglebutton="false"
                                             data-widget-editbutton="false"
                                             data-widget-colorbutton="false"
                                             data-widget-fullscreenbutton="false"
                                             data-widget-deletebutton="false">

                                            <header>

                                                <h2>Erinnerung</h2>

                                            </header>

                                            <!-- widget div-->
                                            <div>

                                                <!-- widget content -->
                                                <div class="widget-body">
                                                    <div class="row" id="info_reminder">
                                                        @if($wiedervorlage_active)

                                                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-4">
                                                                <div class="form-group">
                                                                    <label><b>Daten:</b></label>
                                                                    <div class="input-group">
                                                                        @if ($wiedervorlage==null || $wiedervorlage=='')
                                                                            ---
                                                                        @else
                                                                            {{date("d.m.Y H:i:s", strtotime($wiedervorlage))}}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-sm-4 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label><b>Benutzer:</b></label>
                                                                    <div class="input-group">

                                                                        @if ($wiedervorlage_user==null || $wiedervorlage_user=='' || $wiedervorlage_user==0)
                                                                            ---
                                                                        @else
                                                                            {{$wiedervorlage_user_name}}
                                                                        @endif
                                                                        | {{$wiedervorlage_user}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-sm-4 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label></label>
                                                                    <div class="input-group">

                                                                        <a href="javascript:void(0);"
                                                                           id="unset-reminder"
                                                                           class="btn btn-labeled btn-success unset-reminder">
                                                                            <span class="btn-label"><i
                                                                                        class="glyphicon glyphicon-thumbs-up"></i></span>
                                                                            Fertig</a>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        @else

                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                                                                <div class="form-group">
                                                                    <label>Daten:</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control  datepicker"
                                                                               id="datepicker_w" type="text"
                                                                               placeholder="From">
                                                                        <span class="input-group-addon"><i
                                                                                    class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-sm-6 col-md-2 col-lg-2">
                                                                <div class="form-group">
                                                                    <label>Time:</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" id="timepicker_w"
                                                                               type="text" placeholder="Select time">
                                                                        <span class="input-group-addon"><i
                                                                                    class="fa fa-clock-o"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-sm-6 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label>Benutzer:</label>
                                                                    <div class="input-group">

                                                                        <select class="form-control"
                                                                                id="wiedervorlage_user"
                                                                                name="wiedervorlage_user">
                                                                            @foreach($userid as $k=>$v)
                                                                                <option value="{{$k}}"
                                                                                        @foreach($v as $key=>$value)
                                                                                        @if($value=='selected') selected @endif>{{$key}}</option>
                                                                            @endforeach
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-sm-6 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label></label>
                                                                    <div class="input-group">

                                                                        <button id="add-reminder"
                                                                                class="btn btn-success add-reminder"
                                                                                style="margin: 5px 0;">Set
                                                                        </button>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                        @endif


                                                    </div>
                                                </div>
                                                <!-- end widget content -->

                                            </div>
                                            <!-- end widget div -->

                                        </div>
                                        <!-- end widget -->

                                    </article>
                                    <!-- WIDGET END -->

                                </div>
                                <!-- end row -->
                            </div>
                            <div id="tabs-c">
                                <div class="row" style="margin-bottom: 15px;">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <h2>Schufa Datei</h2>

                                        <form action="/{{$admin_type}}/credits/pre-upload-document"
                                              class="dropzone dz-clickable" enctype="multipart/form-data"
                                              id="dropzone_schufa">
                                            <div class="dz-default dz-message"><span><span class="text-center"><span
                                                                class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span
                                                                    class="font-lg"><i
                                                                        class="fa fa-caret-right text-danger"></i> Dateien ablegen <span
                                                                        class="font-xs">zum hochladen</span></span><span>&nbsp;&nbsp;<h4
                                                                        class="display-inline"> (oder drauf klicken)</h4></span></span></span></span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <h2>Kreditvertrag</h2>

                                        <form action="/{{$admin_type}}/credits/pre-upload-document"
                                              class="dropzone dz-clickable" enctype="multipart/form-data"
                                              id="dropzone_kreditvertrag">
                                            <div class="dz-default dz-message"><span><span class="text-center"><span
                                                                class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span
                                                                    class="font-lg"><i
                                                                        class="fa fa-caret-right text-danger"></i> Dateien ablegen <span
                                                                        class="font-xs">zum hochladen</span></span><span>&nbsp;&nbsp;<h4
                                                                        class="display-inline"> (oder drauf klicken)</h4></span></span></span></span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <h2>Neue Unterlagen</h2>

                                        <form action="/{{$admin_type}}/credits/pre-upload-document"
                                              class="dropzone dz-clickable" enctype="multipart/form-data"
                                              id="dropzone_unterlagen">
                                            <div class="dz-default dz-message"><span><span class="text-center"><span
                                                                class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span
                                                                    class="font-lg"><i
                                                                        class="fa fa-caret-right text-danger"></i> Dateien ablegen <span
                                                                        class="font-xs">zum hochladen</span></span><span>&nbsp;&nbsp;<h4
                                                                        class="display-inline"> (oder drauf klicken)</h4></span></span></span></span>
                                            </div>
                                        </form>

                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-sm-12 col-md-12 col-lg-12" id="documents">

                                    </div>

                                </div>

                            </div>
                            <div id="tabs-d">
                                <div class="row">
                                    <div style="margin-bottom: 15px;"
                                         class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <a class="btn btn-success" data-toggle="modal"
                                           data-target="#myModal2"><i class="fa fa-plus"></i> Neues hinzufügen
                                        </a>
                                    </div>
                                </div>
                                <div class="row" id="other_credits">


                                </div>

                            </div>
                            <div id="tabs-e">
                                <!-- row -->
                                <div class="row">

                                    <!-- NEW WIDGET START -->
                                    <article style="margin-bottom: 15px;"
                                             class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <!-- Widget ID (each widget will need unique ID)-->
                                        <div class="jarviswidget jarviswidget-color-blueDark"
                                             data-widget-togglebutton="false"
                                             data-widget-editbutton="false"
                                             data-widget-colorbutton="false"
                                             data-widget-fullscreenbutton="false"
                                             data-widget-deletebutton="false"
                                             style="margin-bottom:0px;">

                                            <header>

                                                <h2>Andere Daten</h2>

                                            </header>

                                            <!-- widget div-->
                                            <div>

                                                <!-- widget content -->
                                                <div class="widget-body">

                                                    <div class="table-responsive">

                                                        <table class="table table-bordered">
                                                            <tbody>
                                                            <tr>
                                                                <td style="width:30%;"><b>Partner ID:</b></td>
                                                                <td>
                                                                    {{isset($credit->partner_id)?$credit->partner_id:""}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>IP-Adresse der Anfrage:</b></td>
                                                                <td>
                                                                    {{isset($credit->ip)?$credit->ip:""}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Datum der Anfrage:</b></td>
                                                                <td>
                                                                    {{date("d.m.Y H:i:s", strtotime($credit->created_at))}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Kreditanfrage-ID:</b></td>
                                                                <td>
                                                                    {{isset($credit->id)?$credit->id:""}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Kunden-ID:</b></td>
                                                                <td>
                                                                    @if($credit->clients) {{$credit->clients->id}} @endif
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <!-- end widget content -->

                                            </div>
                                            <!-- end widget div -->

                                        </div>
                                        <!-- end widget -->

                                    </article>
                                    <!-- WIDGET END -->


                                </div>
                                <!-- end row -->
                            </div>
                        </div>

                    </div>

                </div>

            </article>

        </div>
        <!-- end row -->

        <!-- row -->
        <div class="row" style="margin-bottom: 15px;">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <h3>Dokumente</h3>


                <form action="/anschreiben" method="POST">

                    <div class="navbar navbar-default">

                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <input type="hidden" name="id" value="{{$id}}">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">

                                <li>
                                    <div class="dropdown-toggle" data-toggle="dropdown"
                                         style="position:relative;display:inline-block">KV anschreiben:
                                    </div>
                                    <label class="select">
                                        <select name="anschreiben" class="input-sm">
                                            <option value="0">Choose name</option>
                                            @foreach($array_banken_neu as $k=>$v)
                                                <option value="{{$v['id']}}">{{$v['bez']}}</option>
                                            @endforeach
                                        </select> <i></i> </label>
                                </li>


                                <li style="padding-left:15px;">
                                    <div style="padding-top:5px;position:relative;display:inline-block">Dokument:</div>
                                    <label class="select">
                                        <div class="anschreiben_documents "
                                             style="background:#eee;display:inline-block;z-index:999999;">

                                        </div>
                                        <i></i> </label>
                                </li>
                                @if($credit->masteller==1)
                                    <li style="padding-left:15px;">
                                        <div style="padding-top:5px;position:relative;display:inline-block">Adressat:
                                        </div>

                                        <label class="select">
                                            <select name="adressat" class="input-sm">
                                                <option value="0">Choose name</option>
                                                @foreach($adressat as $k=>$v)
                                                    <option value="{{$k}}">{{$v}}</option>
                                                @endforeach
                                            </select> <i></i> </label>

                                    </li>
                                @else
                                    <input type="hidden" name="adressat" value="">
                                @endif
                                <li style="padding-left:15px;">
                                    <div style="padding-top:5px;position:relative;display:inline-block">Benutzer:</div>


                                    <label class="select">
                                        <select name="benutzer" class="input-sm">
                                            <option value="0">Choose name</option>
                                            @foreach($benutzer as $k=>$v)
                                                <option value="{{$v->id}}">{{$v->name}}</option>
                                            @endforeach
                                        </select> <i></i> </label>

                                </li>

                            </ul>

                            <button style="padding-left:15px;margin-top:0px;margin-left:50px;" type="submit"
                                    class="btn btn-default pdf_submit">
                                PDF erzeugen
                            </button>


                        </div><!-- /.navbar-collapse -->

                    </div>


                </form>


                <form action="/kat3" method="POST">

                    <div class="navbar navbar-default">

                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <input type="hidden" name="id" value="{{$id}}">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">

                                <li>
                                    <div class="dropdown-toggle" data-toggle="dropdown"
                                         style="position:relative;display:inline-block">sonstige Briefe:
                                    </div>
                                    <label class="select">
                                        <select name="dokus" class="input-sm">
                                            <option value="0">Choose name</option>
                                            @foreach($array_schreiben1 as $k=>$v)
                                                <option value="{{$k}}">{{$v['bez']}}</option>
                                            @endforeach
                                        </select> <i></i> </label>
                                </li>

                            <!--li class="dropdown dropdown-large">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">sonstige Briefe: <span class="dokus_span"></span><b class="dokus_caret caret"></b></a>

                                <ul class="dropdown-menu dropdown-menu-large row" style="z-index:999999">
                                    @foreach($array_schreiben1 as $k=>$v)
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">
                                            <input type="radio"  class="radio_pdf" name="dokus" value="{{$k}}"><label>{{$v['bez']}}</label>
                                                </li>

                                            </ul>
                                        </li>
                                    @endforeach
                                    </ul>

                                </li-->
                                @if($credit->masteller==1)

                                    <li style="padding-left:15px;">
                                        <div style="padding-top:5px;position:relative;display:inline-block">Adressat:
                                        </div>

                                        <label class="select">
                                            <select name="adressat1" class="input-sm">
                                                <option value="0">Choose name</option>
                                                @foreach($adressat as $k=>$v)
                                                    <option value="{{$k}}">{{$v}}</option>
                                                @endforeach
                                            </select> <i></i> </label>

                                    </li>

                                <!--li class="dropdown dropdown-large">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Adressat: <span class="adressat1_span"></span><b class="adressat1_caret caret"></b></a>

                                <ul class="dropdown-menu dropdown-menu-large row" style="z-index:999999">
                                    @foreach($adressat as $k=>$v)
                                    <li class="col-sm-5">
                                        <ul>
                                            <li class="dropdown-header">
                                                <input type="radio"  class="radio_pdf" name="adressat1" value="{{$k}}"><label>{{$v}}</label>
                                                </li>

                                            </ul>
                                        </li>
                                    @endforeach
                                        </ul>

                                    </li-->
                                @else
                                    <input type="hidden" name="adressat" value="">
                                @endif

                                <li style="padding-left:15px;">
                                    <div style="padding-top:5px;position:relative;display:inline-block">Benutzer:</div>


                                    <label class="select">
                                        <select name="benutzer1" class="input-sm">
                                            <option value="0">Choose name</option>
                                            @foreach($benutzer as $k=>$v)
                                                <option value="{{$v->id}}">{{$v->name}}</option>
                                            @endforeach
                                        </select> <i></i> </label>

                                </li>

                            <!--li class="dropdown dropdown-large">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Benutzer: <span class="benutzer1_span"></span><b class="benutzer1_caret caret"></b></a>

                                <ul class="dropdown-menu dropdown-menu-large row" style="z-index:999999">
                                    @foreach($benutzer as $k=>$v)
                                <li class="col-sm-5">
                                    <ul>
                                        <li class="dropdown-header">
                                            <input type="radio" class="radio_pdf"  name="benutzer1" value="{{$v->id}}"><label>{{$v->name}}</label>
                                                </li>

                                            </ul>
                                        </li>
                                    @endforeach
                                    </ul>

                                </li-->

                            </ul>

                            <button style="padding-left:15px;margin-top:0px;margin-left:50px;" type="submit"
                                    class="btn btn-default">
                                PDF erzeugen
                            </button>


                        </div><!-- /.navbar-collapse -->

                    </div>


                </form>


                <form action="/kat8" method="GET">

                    <div class="navbar navbar-default">

                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <input type="hidden" name="id" value="{{$id}}">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li>
                                    <div class="dropdown-toggle" data-toggle="dropdown"
                                         style="position:relative;display:inline-block">Sigma VertrУЄge:
                                    </div>
                                    <label class="select">
                                        <select name="dokus_sigma" class="input-sm">
                                            <option value="0">Choose name</option>
                                            @foreach($sigma as $k=>$v)
                                                <option value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select> <i></i> </label>
                                </li>
                            <!--li class="dropdown dropdown-large">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sigma VertrУЄge: <span class="dokus_sigma_span"></span><b class="dokus_sigma_caret caret"></b></a>

                                <ul class="dropdown-menu dropdown-menu-large row" style="z-index:999999">
                                    @foreach($sigma as $k=>$v)
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">
                                            <input type="radio"  class="radio_pdf" name="dokus_sigma" value="{{$k}}"><label>{{$v}}</label>
                                                </li>

                                            </ul>
                                        </li>
                                    @endforeach
                                    </ul>

                                </li-->
                                @if($credit->masteller==1)
                                    <li style="padding-left:15px;">
                                        <div style="padding-top:5px;position:relative;display:inline-block">Adressat:
                                        </div>

                                        <label class="select">
                                            <select name="adressat2" class="input-sm">
                                                <option value="0">Choose name</option>
                                                @foreach($adressat as $k=>$v)
                                                    <option value="{{$k}}">{{$v}}</option>
                                                @endforeach
                                            </select> <i></i> </label>

                                    </li>
                                <!--li class="dropdown dropdown-large">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Adressat: <span class="adressat2_span"></span><b class="adressat2_caret caret"></b></a>

                                <ul class="dropdown-menu dropdown-menu-large row" style="z-index:999999" >
                                    @foreach($adressatSigma as $k=>$v)
                                    <li class="col-sm-5">
                                        <ul>
                                            <li class="dropdown-header">
                                                <input type="radio" class="radio_pdf"  name="adressat2" value="{{$k}}"><label>{{$v}}</label>
                                                </li>

                                            </ul>
                                        </li>
                                    @endforeach
                                        </ul>

                                    </li-->
                                @else
                                    <input type="hidden" name="adressat" value="">
                                @endif

                                <li style="padding-left:15px;">
                                    <div style="padding-top:5px;position:relative;display:inline-block">Dokument:</div>

                                    <label class="select">
                                        <select name="art" class="input-sm">
                                            <option value="0">Choose name</option>
                                            @foreach($art_docs as $k=>$v)
                                                <option value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select> <i></i> </label>

                                </li>
                            <!--li class="dropdown dropdown-large">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dokument: <span class="art_span"></span><b class="art_caret caret"></b></a>

                                <ul class="dropdown-menu dropdown-menu-large row" style="z-index:999999">
                                    @foreach($art_docs as $k=>$v)
                                <li class="col-sm-5">
                                    <ul>
                                        <li class="dropdown-header">
                                            <input type="radio" class="radio_pdf"  name="art" value="{{$k}}"><label>{{$v}}</label>
                                                </li>

                                            </ul>
                                        </li>
                                    @endforeach
                                    </ul>

                                </li-->

                                <li class="" style="display:inline-block;width:300px;top:-10px;">
                                    <a style="display:inline-block" href="#">Antragsdatum:
                                        <div class="input-group col-md-1"
                                             style="position:absolute;width: 200px;margin-top: -23px;margin-left: 105px;">
                                            <input style="position:relative;z-index:99999;" type="text"
                                                   name="antragsdatum" placeholder="Select a date"
                                                   class="form-control datepicker" data-dateformat="yy/mm/dd">
                                            <span style="position:relative;z-index:99999;" class="input-group-addon"><i
                                                        class="fa fa-calendar"></i></span>
                                        </div>
                                    </a>

                                </li>

                            </ul>

                            <button style="padding-left:15px;margin-top:0px;margin-left:50px;" type="submit"
                                    class="btn btn-default pdf_submit">
                                PDF erzeugen
                            </button>


                        </div><!-- /.navbar-collapse -->

                    </div>


                </form>


                <form action="/kat9" method="POST">

                    <div class="navbar navbar-default">

                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <input type="hidden" name="id" value="{{$id}}">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li>
                                    <div class="dropdown-toggle" data-toggle="dropdown"
                                         style="position:relative;display:inline-block">Immo Briefe:
                                    </div>
                                    <label class="select">
                                        <select name="dokus_immo" class="input-sm">
                                            <option value="0">Choose name</option>
                                            @foreach($immo as $k=>$v)
                                                <option value="{{$k}}">{{$v['bez']}}</option>
                                            @endforeach
                                        </select> <i></i> </label>
                                </li>
                            <!--li class="dropdown dropdown-large">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Immo Briefe: <span class="dokus_immo_span"></span><b class="dokus_immo_caret caret"></b></a>

                                <ul class="dropdown-menu dropdown-menu-large row" style="z-index:99999;">
                                    @foreach($immo as $k=>$v)
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">
                                            <input type="radio"  class="radio_pdf" name="dokus_immo" value="{{$k}}"><label>{{$v['bez']}}</label>
                                                </li>

                                            </ul>
                                        </li>
                                    @endforeach
                                    </ul>

                                </li-->
                                <li style="padding-left:15px;">
                                    <div style="padding-top:5px;position:relative;display:inline-block">Benutzer:</div>


                                    <label class="select">
                                        <select name="benutzer4" class="input-sm">
                                            <option value="0">Choose name</option>
                                            @foreach($benutzer as $k=>$v)
                                                <option value="{{$v->id}}">{{$v->name}}</option>
                                            @endforeach
                                        </select> <i></i> </label>

                                </li>
                            <!--li class="dropdown dropdown-large">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Benutzer: <span class="benutzer4_span"></span><b class="benutzer4_caret caret"></b></a>

                                <ul class="dropdown-menu dropdown-menu-large row" style="z-index:99999;">
                                    @foreach($benutzer as $k=>$v)
                                <li class="col-sm-5">
                                    <ul>
                                        <li class="dropdown-header">
                                            <input type="radio"  class="radio_pdf" name="benutzer4" value="{{$v->id}}"><label>{{$v->name}}</label>
                                                </li>

                                            </ul>
                                        </li>
                                    @endforeach
                                    </ul>

                                </li-->


                            </ul>

                            <button style="padding-left:15px;margin-top:0px;margin-left:50px;" type="submit"
                                    class="btn btn-default pdf_submit">
                                PDF erzeugen
                            </button>


                        </div><!-- /.navbar-collapse -->

                    </div>


                </form>


            </article>

        </div>
        <!-- end row -->


        <!-- row -->
        <div class="row" style="margin-bottom: 15px;">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <table class="apis_table" cellspacing="0" cellpadding="0" style="margin:36px 0;">
                    <tr valign="top">
                        <td class="veb_api"
                            style="text-align:center;padding:0 6px 18px 6px;border-right:1px solid #cccccc;border-left:1px solid #cccccc;">
                            <img src="/templates/cayou/images/01_veb.jpg" alt="" title=""/></td>
                        <td style="text-align:center;padding:0 6px 18px 6px;border-right:1px solid #cccccc;"><img
                                    src="/templates/cayou/images/02_dsl.jpg" alt="" title=""/></td>
                        <td style="text-align:center;padding:0 6px 18px 6px;border-right:1px solid #cccccc;"><img
                                    src="/templates/cayou/images/03_fc.jpg" alt="" title=""/></td>
                        <td style="text-align:center;padding:0 6px 18px 6px;border-right:1px solid #cccccc;"><img
                                    src="/templates/cayou/images/04_am.jpg" alt="" title=""/></td>
                        <td style="text-align:center;padding:0 6px 18px 6px;border-right:1px solid #cccccc;"><img
                                    src="/templates/cayou/images/05_fc.jpg" alt="" title=""/></td>
                    </tr>
                    <tr>
                        <td style="border-right:1px solid #cccccc;border-left:1px solid #cccccc;">
                            <ul style="margin:0 0 0 0px;padding:0 12px 0 24px;">
                                <li style="margin:0;padding:0;"><a href="/{{$admin_type}}/veb_export/{{$credit->id}}"
                                                                   title="VEB" target="_blank">VEB</a></li>
                            </ul>
                        </td>
                        <td style="border-right:1px solid #cccccc;">
                            <ul style="margin:0 0 0 0px;padding:0 12px 0 24px;">
                                <li style="margin:0;padding:0 0 12px 0;"><a
                                            href="/{{$admin_type}}/dsl_api/{{$credit->id}}/1" title="" target="_blank">HA
                                        &uuml;bertragen</a></li>
                                <li style="margin:0;padding:0 0 12px 0;"><a
                                            href="/{{$admin_type}}/dsl_api/{{$credit->id}}/2" title="" target="_blank">MA
                                        &uuml;bertragen</a></li>
                                <li style="margin:0;"><a href="/{{$admin_type}}/dsl_api/{{$credit->id}}/3" title=""
                                                         target="_blank">beide &uuml;bertragen</a></li>
                            </ul>
                        </td>


                        <td style="border-right:1px solid #cccccc;">

                            <ul style="margin:0 0 0 0px;padding:0 12px 0 24px;">
                                <li style="margin:0;padding:0;"><a
                                            href="{{$fc_url_applicant.$path_applicant.'?'.$querystring_applicant}}"
                                            title="" target="_blank">HA &uuml;bertragen</a></li>
                                <li style="margin:0;padding:0;"><a
                                            href="{{$fc_url_coapplicant.$path_coapplicant.'?'.$querystring_coapplicant}}"
                                            title="" target="_blank">MA &uuml;bertragen</a></li>
                                <li style="margin:0;padding:0;"><a
                                            href="{{$fc_url_both_applicants.$path_both_applicants.'?'.$querystring_both_applicants}}"
                                            title="" target="_blank">MA+HA &uuml;bertragen</a></li>
                                <li style="margin:0;padding:0;"><a
                                            href="{{$fc_url_both_applicantsMa_Ha.$path_both_applicantsMa_Ha.'?'.$querystring_both_applicantsMa_Ha}}"
                                            title="" target="_blank">HA+MA &uuml;bertragen</a></li>
                            </ul>
                        </td>
                        <td style="border-right:1px solid #cccccc;">
                            <!--<ul style="margin:0 0 0 0px;padding:0 12px 0 24px;">
                                <li style="margin:0;padding:0 0 12px 0;"><a href="./apis/auxmoney_api.php?id='.$_GET['id'].'" title="an Auxmoney &uuml;bertragen">HA &uuml;bertragen ohne RSV</a></li>
                                <li style="margin:0;padding:0;"><a href="./apis/auxmoney_api.php?id='.$_GET['id'].'&amp;rsv=1" title="an Auxmoney &uuml;bertragen">HA &uuml;bertragen mit RSV</a></li>
                            </ul>-->
                            @php print($getFormHtmlForAuxmoneyApi) ; @endphp
                        </td>
                        <td style="border-right:1px solid #cccccc;">
                            <ul style="margin:0 0 0 0px;padding:0 12px 0 24px;">
                                <li style="margin:0;padding:0;"><a
                                            href="'.$fc_url_tippgeber.$path_tippgeber.'?'.$querystring_tippgeber.'"
                                            title="" target="_blank">HA &uuml;bertragen</a></li>
                            </ul>
                        </td>
                    </tr>
                </table>

            </article>
        </div>


        <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Neuen Bemerkungen</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">


                                    <div id="summernote_bm">

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" id="button_add_comment" class="btn btn-primary">
                            Speichern
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div class="modal fade in" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="myModal2Label">Kreditinformationen hinzufügen</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="darlehencenehmer_neu"> Darlehensnehmer:</label>
                                    <select class="form-control" id="darlehencenehmer_oc">
                                        <option value="0" selected>
                                            Hauptantragsteller
                                        </option>
                                        @if($ex_c)
                                            <option value="1">
                                                Mitantragsteller
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kontoinhaber_oc"> Kontoinhaber:</label>
                                    <input type="text" readonly value="{{$credit->nachname}}" id="kontoinhaber_oc"
                                           class="form-control">
                                    <label for="tags" id="kontoinhaber_oc_error" style="color:red;"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="iban_oc"> IBAN:</label>
                                    <input type="text" value="DE19500207000001234567" id="iban_oc" class="form-control">
                                    <label for="tags" id="iban_oc_error" style="color:red;"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rate_oc"> Rate:</label>
                                    <input type="text" value="" id="rate_oc" class="form-control">
                                    <label for="tags" id="rate_oc_error" style="color:red;"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="betrag_oc"> Betrag:</label>
                                    <input type="text" value="" id="betrag_oc" class="form-control">
                                    <label for="tags" id="betrag_oc_error" style="color:red;"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tags"> Ablosen:</label>

                                    <input type="checkbox" value="1" id="abl_oc">

                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Abbrechen
                            </button>
                            <button type="button" class="btn btn-primary" id="button_add_other_credit">
                                Daten speichern
                            </button>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>


    </section>
    <!-- end widget grid -->

    <!-- ui-dialog -->
    <div id="dialog_simple" title="Dialog">
        <p>
            Möchten Sie diese Daten wirklich löschen?
        </p>
    </div>

    <!-- ui-dialog -->
    <div id="dialog_simple2" title="Dialog">
        <p>
            Möchten Sie dieses Dokument wirklich löschen?
        </p>
    </div>
    <div id="preloader_background"
         style="display:none;top:0px;left:0px;z-index:999;width:100%;height:100%;position:fixed;background:rgba(255,255,255,0.7)">

    </div>
    <div id="preloader" style="display:none;top:0px;left:0px;z-index:999;width:100%;height:100%;position:fixed;">
        <img style="position:fixed;left:50%;top:50%;width:100px;height:100px;" src="/img/credicom-ladebalken-neu.gif">
    </div>
@endsection



@section('scripts')


    <!-- PAGE RELATED PLUGIN(S) -->

    <script src="/smartAdmin/js/plugin/bootstrapvalidator/bootstrapValidator.min.js"></script>

    <!-- PAGE RELATED PLUGIN(S) -->
    <script src="/smartAdmin/js/plugin/dropzone/dropzone.min.js"></script>



    <script src="{{asset('js/admin/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('js/admin/plugin/x-editable/x-editable.min.js')}}"></script>
    <script src="{{asset('js/admin/plugin/summernote/summernote.min.js')}}"></script>
    <script>


        $('#tabs').tabs();

        $(".hide_data").hide();

        //$.fn.editable.defaults.mode = 'inline';

        //editables
        $('#brutto_kreditbetrag').editable({
            url: '/admin/credits/update-creditdata',
            type: 'text',
            pk: '{{$credit->id}}',
            name: 'brutto_kreditbetrag',
            title: ''
        });
        $('#rate').editable({
            url: '/admin/credits/update-creditdata',
            type: 'text',
            pk: '{{$credit->id}}',
            name: 'rate',
            title: ''
        });
        $('#laufzeit').editable({
            url: '/admin/credits/update-creditdata',
            type: 'text',
            pk: '{{$credit->id}}',
            name: 'laufzeit',
            title: ''
        });


        $("#status_info").hide();

        reBlocks();

        $(".show_data").on("click", function () {
            var table = $(this).closest("table");
            var table_type = table.data("type");
            var tables = $('[data-type="' + table_type + '"]');
            var tr = $(this).parent();
            var hide_elements = tables.find(".hide_data");
            var buttons = tables.find(".show_data");
            if (hide_elements.is(':visible')) {
                hide_elements.hide();
                buttons.html('+');
            } else {
                hide_elements.show();
                buttons.html("-");
            }
            reOpener();
            reBlocks();
        })


        $(".hide_all_data").hide();

        $(".hide_all_data").on("click", function () {
            $(".hide_data").hide();
            $(".show_all_data").show();
            $(".hide_all_data").hide();
            $(".show_data").html('+');
            reBlocks();
        })

        $(".show_all_data").on("click", function () {
            $(".hide_data").show();
            $(".show_all_data").hide();
            $(".hide_all_data").show();
            $(".show_data").html('-');
            reBlocks();
        })

        function reOpener() {
            var o = false;
            var c = false;

            $(".hide_data").each(function (i, elem) {
                if ($(this).is(':visible')) {
                    o = true;
                } else {
                    c = true;
                }
            });

            if (o) {
                $(".hide_all_data").show();
            } else {
                $(".hide_all_data").hide();
            }

            if (c) {
                $(".show_all_data").show();
            } else {
                $(".show_all_data").hide();
            }

        }

        function reBlocks() {

            $('[data-role="app"]').each(function (i, elem) {
                var table = $(this).find("table");
                var table_type = table.data("type");
                var table2 = $('[data-role="coapp"]').find('[data-type="' + table_type + '"]');
                table2.parent().css({'height': ''});
                $(this).css({'height': ''});
                if ($(this).height() > table2.parent().height()) {
                    table2.parent().css({'height': ($(this).height() + 'px')});
                } else if ($(this).height() < table2.parent().height()) {
                    $(this).css({'height': (table2.parent().height() + 'px')});
                }
            });
        }


        $("#button_add_comment").on("click", function () {
            $('#myModal').modal('hide');
            var status_bm_hidden = false;
            var hide_elements = $(".bm_data_hidden");
            if (hide_elements.is(':visible')) {
                status_bm_hidden = true;
            }

            var credit_id = '{{$credit->id}}';
            //console.log($('#summernote_').summernote("code"))
            $.ajax({
                url: '/admin/credits/add-comment',
                type: "POST", //метод отправки
                dataType: "json", //формат данных
                data: {
                    _token: '{{csrf_token()}}',
                    text: $('#summernote_bm').summernote("code"),
                    credit_id: credit_id
                },
                success: function (response) {

                    $('#myModal').modal('hide');

                    $('#table_comments').html(response['html']);
                    //$('#summernote').summernote('destroy');
                    $('#summernote_bm').summernote("reset");


                    var hide_elements = $(".bm_data_hidden");
                    if (status_bm_hidden) {
                        hide_elements.show();
                        $(".all_comments").html('<i class="fa fa-angle-double-up"></i>');
                    } else {
                        hide_elements.hide();
                        $(".all_comments").html('<i class="fa fa-angle-double-down"></i>');
                    }


                    //location.reload();
                },
                error: function (response) { // Данные не отправлены
                    console.log("error");
                }
            });
        });

        $('#summernote_bm').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });

        $('#summernote_bm').summernote("code", "");


        $('#timepicker_w').timepicker({
            showMeridian: false
        });

        $(".bm_data_hidden").hide();

        $("#table_comments").on("click", ".all_comments", function () {
            var hide_elements = $(".bm_data_hidden");
            if (hide_elements.is(':visible')) {
                hide_elements.hide();
                $(this).html('<i class="fa fa-angle-double-down"></i>');
            } else {
                hide_elements.show();
                $(this).html('<i class="fa fa-angle-double-up"></i>');
            }
        });

        $("#other_credits").on("click", ".oc_del", function () {
//alert($(this).data('id'));

            current_id = $(this).data('id');
            $('#dialog_simple').dialog('open');
            return false;

        });

        $('#dialog_simple').dialog({
            autoOpen: false,
            width: 600,
            resizable: false,
            modal: true,
            title: "Kreditinformationen löschen",
            buttons: [{
                html: "<i class='fa fa-trash-o'></i>&nbsp; Delete",
                "class": "btn btn-danger",
                click: function () {
                    $.ajax({
                        url: '/admin/credits/del-othercredit',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            _token: '{{csrf_token()}}',
                            id: current_id
                        },
                        success: function (response) {
                            getOtherCredits();
                        },
                        error: function (response) { // Данные не отправлены
                            alert('Error');
                        }
                    });
                    $(this).dialog("close");
                }
            }, {
                html: "<i class='fa fa-times'></i>&nbsp; Cancel",
                "class": "btn btn-default",
                click: function () {
                    $(this).dialog("close");
                }
            }]
        });


        $("#documents").on("click", ".del-doc", function () {
//alert($(this).data('id'));

            document_id = $(this).data('id');
            $('#dialog_simple2').dialog('open');
            return false;

        });

        $('#dialog_simple2').dialog({
            autoOpen: false,
            width: 600,
            resizable: false,
            modal: true,
            title: "Dokument löschen",
            buttons: [{
                html: "<i class='fa fa-trash-o'></i>&nbsp; Delete",
                "class": "btn btn-danger",
                click: function () {
                    $.ajax({
                        url: '/admin/credits/del-document',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            _token: '{{csrf_token()}}',
                            id: document_id
                        },
                        success: function (response) {
                            getDocuments();
                        },
                        error: function (response) { // Данные не отправлены
                            alert('Error');
                        }
                    });
                    $(this).dialog("close");
                }
            }, {
                html: "<i class='fa fa-times'></i>&nbsp; Cancel",
                "class": "btn btn-default",
                click: function () {
                    $(this).dialog("close");
                }
            }]
        });


        $("#btn-status-set").on("click", function () {
            if (!$(this).hasClass("disabled")) {
                var status_bm_hidden = false;
                var hide_elements = $(".bm_data_hidden");
                if (hide_elements.is(':visible')) {
                    status_bm_hidden = true;
                }
                var credit_id = '{{$credit->id}}';
                $.ajax({
                    url: '/admin/credits/change-status',
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: '{{csrf_token()}}',
                        status_intern: $("#status_intern").val(),
                        credit_id: credit_id
                    },
                    success: function (response) {
                        $("#btn-status-set").addClass("disabled");
                        $("#status_intern").data("stid", $("#status_intern").val());
                        $("#as_name").text($("#status_intern option:selected").text());
                        $('#table_comments').html(response['html']);
                        $("#tab-a-1").css({"height": ($("#block_status").height() + 'px')});
                        $("#tab-a-3").css({"height": ($("#block_status").height() + 'px')});
                        var hide_elements = $(".bm_data_hidden");
                        if (status_bm_hidden) {
                            hide_elements.show();
                            $(".all_comments").html('<i class="fa fa-angle-double-up"></i>');
                        } else {
                            hide_elements.hide();
                            $(".all_comments").html('<i class="fa fa-angle-double-down"></i>');
                        }
                        $("#status_info").show();
                        setTimeout(function () {
                            $('#status_info').hide();
                        }, 1200);
                    },
                    error: function (response) {
                        console.log("error");
                    }
                });

            }

        });

        $("#status_intern").change(function () {

            if ($(this).data("stid") == $(this).val()) {
                $("#btn-status-set").addClass("disabled");
            } else {
                $("#btn-status-set").removeClass("disabled");
            }
        });


        $("#info_reminder").on("click", ".form-group .input-group .add-reminder", function () {
            if (true) {

                var credit_id = '{{$credit->id}}';
                $.ajax({
                    url: '/admin/credits/add-reminder',
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: '{{csrf_token()}}',
                        credit_id: credit_id,
                        wiedervorlage_user: $('#wiedervorlage_user').val(),
                        wiedervorlage_active: true,
                        date_w: $('#datepicker_w').val(),
                        time_w: $('#timepicker_w').val(),
                    },
                    success: function (response) {
                        console.log("succes");
                        $('#info_reminder').html(response['html']);
                        $("#rem_not").show();
                    },
                    error: function (response) {
                        console.log("error");
                    }
                });

            }

        });


        $("#info_reminder").on("click", ".form-group .input-group .unset-reminder", function () {
            if (true) {

                var credit_id = '{{$credit->id}}';
                $.ajax({
                    url: '/admin/credits/add-reminder',
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: '{{csrf_token()}}',
                        credit_id: credit_id,
                        wiedervorlage_active: false,
                    },
                    success: function (response) {
                        console.log("succes");
                        $('#info_reminder').html(response['html']);
                        $('#timepicker_w').timepicker({
                            showMeridian: false
                        });
                        $('#datepicker_w').datepicker({});
                        $("#rem_not").hide();

                    },
                    error: function (response) {
                        console.log("error");
                    }
                });

            }
        });


        $("#button_add_other_credit").on("click", function () {
            $("#kontoinhaber_oc_error").text('');
            $("#iban_oc_error").text('');
            $("#rate_oc_error").text('');
            $("#betrag_oc_error").text('');

            var emptyValidateMessage = 'Dieses Feld darf nicht leer sein';
            var numValidateMessage = 'Nur Zahlen erlaubt';

            var isValid = true;

            if (!$.trim($("#kontoinhaber_oc").val())) {
                $("#kontoinhaber_oc_error").text(emptyValidateMessage);
                isValid = false;
            }


            var iban = $("#iban_oc").val();

            if (!$.trim(iban)) {
                $("#iban_oc_error").text(emptyValidateMessage);
                isValid = false;
            }

            if (!$.trim($("#rate_oc").val())) {
                $("#rate_oc_error").text(emptyValidateMessage);
                isValid = false;
            } else if (!$.isNumeric($("#rate_oc").val())) {
                $("#rate_oc_error").text(numValidateMessage);
                isValid = false;
            }
            if (!$.trim($("#betrag_oc").val())) {
                $("#betrag_oc_error").text(emptyValidateMessage);
                isValid = false;
            } else if (!$.isNumeric($("#betrag_oc").val())) {
                $("#betrag_oc_error").text(numValidateMessage);
                isValid = false;
            }

            if (!isValid) {
                if (!$.trim(iban)) {

                } else {
                    $.ajax({
                        url: '/check-iban.ajax',
                        type: "POST",
                        dataType: "json",
                        data: {
                            _token: '{{csrf_token()}}',
                            iban: iban
                        },
                        success: function (response) {
                            if (response) {

                            } else {
                                $("#iban_oc_error").text("Ungültige IBAN");

                            }
                        },
                        error: function (response) {
                            console.log("error");
                            $("#iban_oc_error").text("IBAN prüfung fehlgeschlagen");

                        }
                    });
                }

                return;


            } else {
//alert(iban);
                $.ajax({
                    url: '/check-iban.ajax',
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: '{{csrf_token()}}',
                        iban: iban
                    },
                    success: function (response) {

                        if (response) {

                            var credit_id = '{{$credit->id}}';
                            $.ajax({
                                url: '/admin/credits/add-othercredit',
                                type: "POST",
                                dataType: "json",
                                data: {
                                    _token: '{{csrf_token()}}',
                                    credit_id: credit_id,
                                    darlehencenehmer_oc: $("#darlehencenehmer_oc").val(),
                                    kontoinhaber_oc: $("#kontoinhaber_oc").val(),
                                    iban_oc: iban,
                                    rate_oc: $("#rate_oc").val(),
                                    betrag_oc: $("#betrag_oc").val(),
                                    abl_oc: ($("#abl_oc").prop("checked") ? 1 : 0)
                                },
                                success: function (response) {
                                    $('#myModal2').modal('hide');
                                    getOtherCredits();
                                    $("#darlehencenehmer_oc").val('0');
                                    //$("#kontoinhaber_oc").val('');
                                    $("#iban_oc").val('');
                                    $("#rate_oc").val('');
                                    $("#betrag_oc").val('');
                                    $("#abl_oc").prop("checked", false);
                                },
                                error: function (response) {
                                    console.log("error");
                                }
                            });

                        } else {
                            $("#iban_oc_error").text("Ungültige IBAN");

                        }
                        ;
                    },
                    error: function (response) {
                        console.log("error");
                        $("#iban_oc_error").text("IBAN prüfung fehlgeschlagen");

                    }
                });


            }


        });


        @if($ex_c)


$("#darlehencenehmer_oc").change(function () {

            if ($(this).val() == 0) {
                $("#kontoinhaber_oc").val("{{$credit->nachname}}");
            } else {
                $("#kontoinhaber_oc").val("{{$credit->nachname1}}");
            }


        });


        @endif



        function getReminder() {
            var credit_id = '{{$credit->id}}';
            $.ajax({
                url: '/admin/credits/get-reminder',
                type: "POST",
                dataType: "json",
                data: {
                    _token: '{{csrf_token()}}',
                    credit_id: credit_id
                },
                success: function (response) {
                    console.log("succes");
                    $('#info_reminder').html(response['html']);
                    $('#timepicker_w').timepicker({
                        showMeridian: false
                    });
                    $('#datepicker_w').datepicker({});
                    //$("#rem_not").hide();

                },
                error: function (response) {
                    console.log("error");
                }
            });
        }


        function getOtherCredits() {
            var credit_id = '{{$credit->id}}';
            $.ajax({
                url: '/admin/credits/get-othercredits',
                type: "POST",
                dataType: "json",
                data: {
                    _token: '{{csrf_token()}}',
                    credit_id: credit_id,
                },
                success: function (response) {
                    console.log("succes");

                    $('#other_credits').html(response['html']);

                    var emptyValidateMessage = 'Dieses Feld darf nicht leer sein';
                    var numValidateMessage = 'Nur Zahlen erlaubt';

                    $('.kontoinhaber').each(function () {
                        $(this).editable({
                            url: '/admin/credits/update-othercredit',
                            pk: $(this).data('pk'),
                            name: 'kontoinhaber',
                            title: '',
                            disabled: true
                        });
                        $(this).editable('option', 'validate', function (v) {
                            if (!v) return emptyValidateMessage;
                        });
                    });

                    $('.iban').each(function () {
                        $(this).editable({
                            url: '/admin/credits/update-othercredit',
                            pk: $(this).data('pk'),
                            name: 'iban',
                            title: ''
                        });
                        $(this).editable('option', 'validate', function (v) {
                            if (!v) return emptyValidateMessage;
                            var noValid = true;
                            $.ajax({
                                url: '/check-iban.ajax',
                                type: "POST",
                                dataType: "json",
                                data: {
                                    _token: '{{csrf_token()}}',
                                    iban: v
                                },
                                async: false,
                                success: function (response) {
                                    if (response) {
                                        noValid = false;
                                    } else {
                                        //alert("Ungültige IBAN") ;
                                    }
                                },
                                error: function (response) {
                                    console.log("error");
                                    //alert("IBAN prüfung fehlgeschlagen");
                                }
                            });
                            if (noValid) return "Ungültige IBAN";
                        });
                    });

                    $('.rate').each(function () {
                        $(this).editable({
                            url: '/admin/credits/update-othercredit',
                            pk: $(this).data('pk'),
                            name: 'rate',
                            title: ''
                        });
                        $(this).editable('option', 'validate', function (v) {
                            if (!v) return emptyValidateMessage;
                            if (!$.isNumeric(v)) {
                                return numValidateMessage;
                            }
                        });
                    });

                    $('.betrag').each(function () {
                        $(this).editable({
                            url: '/admin/credits/update-othercredit',
                            pk: $(this).data('pk'),
                            name: 'betrag',
                            title: ''
                        });
                        $(this).editable('option', 'validate', function (v) {
                            if (!v) return emptyValidateMessage;
                        });
                    });

                    $('.darlehensnehmer').each(function () {
                        $(this).editable({
                            url: '/admin/credits/update-othercredit',
                            value: $(this).data("val"),
                            source: [
                                {
                                    value: 0,
                                    text: 'Hauptantragsteller'
                                },
                                    @if($ex_c)
                                {
                                    value: 1,
                                    text: 'Mitantragsteller'
                                }
                                @endif
                            ],
                            pk: $(this).data('pk'),
                            @if($ex_c) params: {v0: "{{$credit->nachname}}", v1: "{{$credit->nachname1}}"}, @endif
                            name: 'darlehensnehmer'
                        });
                        @if($ex_c)
                        $(this).on('save', function (e, params) {
                            var table = $(this).closest("table");
                            if (params.newValue == 0) {
                                table.find('.kontoinhaber').editable('setValue', "{{$credit->nachname}}");
                            } else {
                                table.find('.kontoinhaber').editable('setValue', "{{$credit->nachname1}}");
                            }
                        });
                        @endif
                    });

                    $('.ablosen').each(function () {
                        $(this).editable({
                            url: '/admin/credits/update-othercredit',
                            value: $(this).data("val"),
                            source: [
                                {
                                    value: 0,
                                    text: 'Nein'
                                },
                                {
                                    value: 1,
                                    text: 'Ja'
                                }
                            ],
                            pk: $(this).data('pk'),
                            name: 'ablosen'
                        });
                    });

                },
                error: function (response) {
                    console.log("error");
                }
            });
        }


        function getDocuments() {
            var credit_id = '{{$credit->id}}';
            $.ajax({
                url: '/admin/credits/get-documents',
                type: "POST",
                dataType: "json",
                data: {
                    _token: '{{csrf_token()}}',
                    credit_id: credit_id,
                },
                success: function (response) {
                    console.log("succes");

                    $('#documents').html(response['html']);

                    $('.doc_description').each(function () {
                        $(this).editable({
                            url: '/admin/credits/update-document',
                            pk: $(this).data('pk'),
                            name: 'rate',
                            title: ''
                        });
                        var emptyValidateMessage = 'Dieses Feld darf nicht leer sein';
                        $(this).editable('option', 'validate', function (v) {
                            if (!v) return emptyValidateMessage;
                        });
                    });


                },
                error: function (response) {
                    console.log("error");
                }
            });
        }


        $(document).ready(function () {
            getDocuments();
            getOtherCredits();
            getReminder();
        });


        $(window).on("load", function () {

            $("#tab-a-1").css({"height": ($("#block_status").height() + 15 + 'px')});
            $("#tab-a-3").css({"height": ($("#block_status").height() + 15 + 'px')});
            $("#table_coapp").css({'height': '320px'});

        });


        Dropzone.options.dropzoneSchufa = {
            params: {
                credit_order_id: "<?echo $credit->id?>",
                type: 'schufa'
            },
            addRemoveLinks: true,
            maxFilesize: 50,
            dictResponseError: 'Error uploading file!',
            paramName: "file",
            autoProcessQueue: true,
            uploadMultiple: false, // uplaod files in a single request
            //parallelUploads: 100, // use it with uploadMultiple
            maxFiles: 1,
            acceptedFiles: ".jpg, .jpeg, .png, .gif, .pdf",
            // Language Strings
            dictFileTooBig: "File is to big ",
            dictInvalidFileType: "Invalid File Type",
            dictCancelUpload: "Cancel",
            dictRemoveFile: "Remove",
            dictMaxFilesExceeded: "Es können max. 10 Dokumente auf einmal hochgeladen werden",
            dictDefaultMessage: "Dateien ablegen here zum hochladen",
            init: function () {
                this.on("success", function (file, response) {
                    this.removeFile(file);
                    getDocuments();
                });
            }
        };


        Dropzone.options.dropzoneKreditvertrag = {
            params: {
                credit_order_id: "<?echo $credit->id?>",
                type: 'kreditvertrag'
            },
            addRemoveLinks: true,
            maxFilesize: 50,
            dictResponseError: 'Error uploading file!',
            paramName: "file",
            autoProcessQueue: true,
            uploadMultiple: false, // uplaod files in a single request
            //parallelUploads: 15, // use it with uploadMultiple
            maxFiles: 10,
            acceptedFiles: ".jpg, .jpeg, .png, .gif, .pdf",
            // Language Strings
            dictFileTooBig: "File is to big ",
            dictInvalidFileType: "Invalid File Type",
            dictCancelUpload: "Cancel",
            dictRemoveFile: "Remove",
            dictMaxFilesExceeded: "Es können max. 10 Dokumente auf einmal hochgeladen werden",
            dictDefaultMessage: "Dateien ablegen here zum hochladen",
            init: function () {
                this.on("success", function (file, response) {
                    this.removeFile(file);
                    getDocuments();
                });
            }
        };


        Dropzone.options.dropzoneUnterlagen = {
            params: {
                credit_order_id: "<?echo $credit->id?>",
                type: 'unterlagen'
            },
            addRemoveLinks: true,
            maxFilesize: 50,
            dictResponseError: 'Error uploading file!',
            paramName: "file",
            autoProcessQueue: true,
            uploadMultiple: false, // uplaod files in a single request
            //parallelUploads: 15, // use it with uploadMultiple
            maxFiles: 10,
            acceptedFiles: ".jpg, .jpeg, .png, .gif, .pdf",
            // Language Strings
            dictFileTooBig: "File is to big ",
            dictInvalidFileType: "Invalid File Type",
            dictCancelUpload: "Cancel",
            dictRemoveFile: "Remove",
            dictMaxFilesExceeded: "Es können max. 10 Dokumente auf einmal hochgeladen werden",
            dictDefaultMessage: "Dateien ablegen here zum hochladen",
            init: function () {
                this.on("success", function (file, response) {
                    this.removeFile(file);
                    getDocuments();
                });
            }
        };


    </script>


    <script>

        $('select[name="anschreiben"]').change(function () {
            console.log('890');
            $('.dokument_span').empty();
            var anschreiben_name = $(this).parent('li').find('label').text()
            $('.anschreiben_span').text(anschreiben_name)
            $('.anschreiben_caret').click();
            var id_bank = $(this).val();
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async: false,
                url: "/kreditanfragen/get_documents",
                data: {id_bank: id_bank}, // serializes the form's elements.
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    for (i in data) {
                        if (!first) {
                            var first = data[i];
                        }
                    }
                    console.log(first.id);


                    $('.anschreiben_documents').empty();
                    $('.anschreiben_documents').append(
                        '<select name="dokument" class="input-sm">' + '<option value="0">Choose name</option>' +
                        '</select>'
                    );
                    $.each(data, function (key, value) {

                        $('select[name="dokument"]').append(
                            '<option  value="' + value.id + '">' + value.document + '</option>'
                        );

                        if (first.id == key) {
                            var $radios = $('input:radio[name="dokument"]');
                            if ($radios.is(':checked') === false) {
                                console.log('non checked');
                                $radios.filter('[value=' + first.id + ']').prop('checked', true);
                                var dokument_name = $radios.filter('[value=' + first.id + ']').parent('li').find('label').text()
                                $('.dokument_span').text(dokument_name)

                            }
                        }
                    });

                    $('select[name="dokument"]').change(function () {
                        var dokument_name = $(this).parent('li').find('label').text()
                        $('.dokument_span').text(dokument_name)
                        $('.dokument_caret').click();
                    })


                }

            });

        })

        $('input[name="benutzer"]').change(function () {
            var benutzer_name = $(this).parent('li').find('label').text()
            $('.benutzer_span').text(benutzer_name)
            $('.benutzer_caret').click();
        })
        $('input[name="adressat"]').change(function () {
            var adressat_name = $(this).parent('li').find('label').text()
            $('.adressat_span').text(adressat_name)
            $('.adressat_caret').click();
        })
        $('input[name="dokus"]').change(function () {
            var dokus_name = $(this).parent('li').find('label').text()
            $('.dokus_span').text(dokus_name)
            $('.dokus_caret').click();
        })
        $('input[name="benutzer1"]').change(function () {
            var benutzer1_name = $(this).parent('li').find('label').text()
            $('.benutzer1_span').text(benutzer1_name)
            $('.benutzer1_caret').click();
        })
        $('input[name="adressat1"]').change(function () {
            var adressat1_name = $(this).parent('li').find('label').text()
            $('.adressat1_span').text(adressat1_name)
            $('.adressat1_caret').click();
        })

        $('input[name="benutzer2"]').change(function () {
            var benutzer2_name = $(this).parent('li').find('label').text()
            $('.benutzer2_span').text(benutzer2_name)
            $('.benutzer2_caret').click();
        })
        $('input[name="adressat2"]').change(function () {
            var adressat2_name = $(this).parent('li').find('label').text()
            $('.adressat2_span').text(adressat2_name)
            $('.adressat2_caret').click();
        })

        $('input[name="art"]').change(function () {
            var art_name = $(this).parent('li').find('label').text()
            $('.art_span').text(art_name)
            $('.art_caret').click();
        })
        $('input[name="dokus_sigma"]').change(function () {
            $('.art_span').empty();
            var dokus_sigma_name = $(this).parent('li').find('label').text()
            $('.dokus_sigma_span').text(dokus_sigma_name)
            $('.dokus_sigma_caret').click();
            var $radios_2 = $('input:radio[name="art"]');
            $radios_2.filter('[value=1]').prop('checked', true);
            var dokument_name_2 = $radios_2.filter('[value=1]').parent('li').find('label').text()
            $('.art_span').text(dokument_name_2)


        })
        $('input[name="dokus_immo"]').change(function () {
            var dokus_immo_name = $(this).parent('li').find('label').text()
            $('.dokus_immo_span').text(dokus_immo_name)
            $('.dokus_immo_caret').click();
        })
        $('input[name="benutzer4"]').change(function () {
            var benutzer4_name = $(this).parent('li').find('label').text()
            $('.benutzer4_span').text(benutzer4_name)
            $('.benutzer4_caret').click();
        })


        $('input[name="role"]').change(function () {
            var admin_status = $(this).val()
            if (admin_status == 'admin') {
                $('.superadmin_check_block').css('display', 'none')
            }
            else {
                $('.superadmin_check_block').css('display', 'block')
            }

        })


        $('#benutzer_add_form').bootstrapValidator({
            container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The full name is required and cannot be empty'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email address is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The email address is not valid'
                        }
                    }
                },

            }
        });
        // end contactForm


    </script>






    <script src="{{asset('js/autobahn.js')}}"></script>


    <script>
        var conn = new ab.Session('wss://' + location.host + '/wss',
            function () {
                conn.subscribe('onNewData', function (topic, data) {
                    // This is where you would add the new article to the DOM (beyond the scope of this tutorial)
                    console.log('New article published to category "' + topic + '" : ' + data.data);
                });
            },
            function () {
                console.warn('WebSocket connection closed');
            },
            {'skipSubprotocolCheck': true}
        );
    </script>



    <script>
        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        $(document).ready(function () {

            //проверка на то открыто ли еще у кого то окно или нет
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async: true,
                url: "/" + "<?echo $admin_type?>" + "/check_opened_window",
                data: {id: <?echo $credit->id?>}, // serializes the form's elements.
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    if (data.message == 'already opened') {

                        $.each(data.users_online, function (key, value) {
                            console.log('auth_id', value.auth_id);
                            console.log('user_id', value.id);
                            console.log('user_name', value.name);
                            $('.warning_opened').append(
                                '<div class="alert alert-danger fade in opened_user_' + value.id + '">' +
                                '<button class="close" data-dismiss="alert">' +
                                '×' +
                                '</button>' +
                                '<i class="fa-fw fa fa-times"></i>' +
                                '<strong>' + value.name + '</strong> bearbeitet diese Anfrage ebenfalls' +
                                '</div>'
                            )
                        })


                    }
                    else {
                        console.log('free to edit')
                    }


                }

            });


            var credit = "<?php echo $credit->id;?>";
            var conn_del_online_user = new ab.Session('wss://' + location.host + '/wss',

                function () {
                    conn_del_online_user.subscribe('deleteOpenedUser', function (topic, data) {
                        // This is where you would add the new article to the DOM (beyond the scope of this tutorial)
                        console.log('"' + topic + ' " We need to delete message that user  : ' + data.user_id + 'is online now');
                        console.log('credit: ' + credit);
                        if (credit == data.credit_id) {
                            var ins = data.user_id
                            $.ajax({
                                method: 'POST',
                                async: false,
                                url: "/" + "<?echo $admin_type?>" + "/check_if_present_in",
                                data: {id: <?echo $credit->id?>, ins: ins}, // serializes the form's elements.
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (sata) {
                                    console.log(sata)
                                    if (sata == 1) {

                                    }
                                    else {
                                        $('.opened_user_' + data.user_id + '').remove()
                                    }

                                }

                            });


                        }
                    });
                },
                function () {
                    console.warn('WebSocket connection closed');
                },
                {'skipSubprotocolCheck': true}
            );


            var conn_add_online_user = new ab.Session('wss://' + location.host + '/wss',
                function () {
                    conn_add_online_user.subscribe('addOpenedUser', function (topic, data) {
                        // This is where you would add the new article to the DOM (beyond the scope of this tutorial)
                        console.log('"' + topic + ' " We need to add message that user  : ' + data.user_id + 'is online now on credit_id' + data.credit_id);
                        //Если на странице нет еще этого предупреждения
                        var out = data.user_id;
                        if ("<?echo $credit->id?>" == data.credit_id) {
                            $.ajax({
                                method: 'POST',
                                async: true,
                                url: "/" + "<?echo $admin_type?>" + "/check_if_present_out",
                                data: {id: <?echo $credit->id?>, out: out}, // serializes the form's elements.
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (wata) {
                                    console.log(wata)
                                    if (wata == 1) {
                                        console.log(wata)
                                    }
                                    else {
                                        console.log('else', wata);
                                        $('.warning_opened').append(
                                            '<div class="alert alert-danger fade in opened_user_' + data.user_id + '">' +
                                            '<button class="close" data-dismiss="alert">' +
                                            '×' +
                                            '</button>' +
                                            '<i class="fa-fw fa fa-times"></i>' +
                                            '<strong>' + data.user_name + '</strong> bearbeitet diese Anfrage ebenfalls' +
                                            '</div>'
                                        );
                                    }

                                }

                            });
                        }


                    });
                },
                function () {
                    console.warn('WebSocket connection closed');
                },
                {'skipSubprotocolCheck': true}
            );

        });


        window.onbeforeunload = function (evt) {
            //Your Extra Code
            $.ajax({
                method: 'POST',
                async: false,
                url: "/admin/update_opened_window",
                data: {id: <?echo $credit->id?>},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {


                }

            });
            return;
        }


    </script>


    <script>
        $('#preloader_background').hide();
        $('#preloader').hide();
        $('#auxmoneyApiSend').click(function () {

            $('#preloader_background').show();
            $('#preloader').show();
            var duration = $('#duration').val()
            var isMainApplicant = $('#isMainApplicant').val();
            var rsv = $('#rsv').val();
            var creditRequestId = $('#creditRequestId').val();


            $.ajax({
                method: 'POST',
                dataType: 'json',
                async: true,
                url: "/" + "<?echo $admin_type?>" + "/auxmoneyApiSendRequest",
                data: {
                    duration: duration,
                    isMainApplicant: isMainApplicant,
                    rsv: rsv,
                    creditRequestId: creditRequestId
                }, // serializes the form's elements.
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    alert(data.message)
                    if (data.message == 'success') {
                        window.location.reload()
                    }


                },
                complete: function () {
                    $('#preloader_background').css('display', 'none');
                    $('#preloader').css('display', 'none');
                }

            });
        })

    </script>

@endsection

