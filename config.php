<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

define('APP_ROOT', realpath(__DIR__.'/../'));


//Pfade
if($_SERVER['HTTP_HOST']!='localhost') {
    if($_SERVER['HTTPS']!='') {
        $file_root="https://www.credicom.de/";
        $file_roots="https://www.credicom.de/";
    }
    else {
        $file_root="https://www.credicom.de/";
        $file_roots="https://www.credicom.de/";
    }
}
else {
    $file_root='http://localhost/credicom/';
    $file_roots="http://localhost/credicom/";
}
$file_root_admin=$file_root.'admin/';
$file_root_img=$file_root.'img/';
$file_root_img_icons=$file_root_img.'icons/';


//Sonstiges
$conf['template']='cayou';
$conf['fileroot']['frontendTemplateCSS']	=	$file_root.'/css/tiny_style.css';
/* Login for CMS */
$conf['admin']['username']		=	'admin';
$conf['admin']['password']		=	'123';
//Datenbank
$conf['mysql']['server']		=	'localhost';
$conf['mysql']['username']		=	'd011506f';
$conf['mysql']['password']		=	'Hx7hXQkZBmqrVkem';
$conf['mysql']['database']		=	'd011506f';
//Sontiges
$conf['developmentMode']=true;
//$conf_email="";

//Email
$conf['mail_host']='in-v3.mailjet.com';
$conf['mail_user']='86e43975f3d04dc827626f1de33fac13';
$conf['mail_pass']='edbd0367e656b35fa8bbbb99322337e6';
$conf['mail_secure']='tls';
$conf['mail_port']='587';

//Auxmoney Test
//$auxmoney_url="https://acc.auxmoney.com:5555/distributionline/api/rest/partnerendpoints";
//$auxmoney_key="40s3fCuduB3dTAQ7kTUdwHeQxUsgIM";
//Auxmoney Original
$auxmoney_url="https://www.auxmoney.com/distributionline/api/rest/partnerendpoints";
$auxmoney_key="40s3fCuduB3dTAQ7kTUdwHeQxUsgIM";

//DSL Test
//$dsl_url="http:webservice.intellinet.de/axis2/services/DslWS";
//$dsl_user="raptest";
//$dsl_key="test1234";
//DSL Original
$dsl_url="https://webservice.dslbank.de/axis2/services/DslWS";
$dsl_user="credicom";
$dsl_key="b!WLF96JV";

//Finanzcheck Test
//$fc_url = "https://b2b-sso.stage.finanzcheck.de";
//$fc_token = "78d4313fbe3c9662a6b94685683df22fd22c2e074676ca030aec48";
//$fc_brokerId = "9EjpDuGO8rLv";
//Finanzcheck Original
$fc_url = "https://sso.finanzcheckpro.de";
$fc_token = "407cf11aff6d37027f2994fa9d2b703647eef6db01f772484fba56";
$fc_brokerId = "bnAr5UKAnRNZ";
$fc_url_tippgeber = "https://sso.finanzcheckpro.de";
$fc_token_tippgeber = "35626b9deae5c8186d285ccc863f93a621b3dc1f7fd6a35b15126b";
$fc_brokerId_tippgeber = "bRq0JuwKlEe5";


$conf['childBenefit'] = [
    'first' => 194,
    'second' => 194,
    'third' => 198,
    'more' => 225,
];

$conf['api'] = [
    'epost' => [
        'enabled' => false,
        'host' => '90.187.20.221',
        'port' => 222,
        'user' => 'epost_Sammelkorb',
        'pass' => 'creDICom2013',
        'remoteBaseDir'  => '/Sammelkorb/Sammelkorb/',

        'sender' => [
            'email' => 'info@credicom.de',
            'name' => 'Sonja Wehmeyer',
            'department' => '',
        ],
    ],

    'sms' => [
        'enabled' => false,
        'debugRecipientPhone' => null,

        'user' => "credicom",
        'pass' => "SBHg.!jd:(,",

        'type' => "V3",
        'url' => 'http://www.smsout.de/client/sendsms.php',
    ],


    'sigma' => [
        'enabled' => false,
        'mail' => [
            'sender' => 'anfragen4@skag.gmbh',
            'senderName' => 'SKAG Vertriebs GmbH',

            'recipient' => 'dofer.mail@gmail.com',

            //send mail
            'sendMethod' => 'smtp',
            'smtp' => [
                'host' => 'wp12871138.mailout.server-he.de',
                'port' => 587,
                'secure' => 'tls',
                'user' => 'wp12871138-credicom',
                'pass' => 'Credicom1!',
            ],

            //receive mail
            'imap' => [
                'host' => 'wp12871138.mail.server-he.de',
                'port'  => 993,
                'user'  => 'wp12871138-credicom',
                'pass'  => 'Credicom1!',
                'ssl'   => true,
                'tls'   => true,
            ],
        ]
    ],


    'auxmoney' => [
        'enabled' => false,
        'urlKey' => '40s3fCuduB3dTAQ7kTUdwHeQxUsgIM',
        'urlRestApi' => 'https://www.auxmoney.com/distributionline/api/rest/partnerendpoints',
        'affiliateLink' => 'http://www.auxmoney.com/start/welcome.php?afid=10003199&amp;a_bid=146fa7d2',
        'urlEndpointUrl' => false, //$file_root . 'auxmoney/callback/receiver',
        'httpAuthUsername' => false, //'test_username',
        'httpAuthPassword' => false, //'test_password',
        'testMode' => [   //Auxmoney Test
            'enabled' => false,
            'localTestResponse' => [],
            'urlRestApi' => 'https://acc.auxmoney.com:5555/distributionline/api/rest/partnerendpoints',
//            'emailForPositiveAnswer' => 'b1-test@auxmoney.com', // Simulation of positive answers on the test system
//            'emailForPositiveAnswer' => 'test@auxmoney.com', // red
            'emailForPositiveAnswer' => 'b1-nonqs@auxmoney.com', // Simulation of positive answers on the test system with contract
            'urlPushApi' => 'https://acc.auxmoney.com:5555/distributionline/api/rest/testing/push-property/credit/%s',
            'fakeProgressUrl' => 'https://acc.auxmoney.com:5555/distributionline/api/rest/testing/push-property/credit/%s/fake-progress'
        ]
    ],

    'planfinanz24' => [
        'enabled' => false,
        'mail' => [
            'sender' => [
                'email' => 'svexport@credicom.de',
                'emailName' => 'credicom GmbH - der richtige Kredit für Sie',
                'name' => 'Sonja Wehmeyer',
            ],
            'recipient' => 'import-credicom@plan-finanz24.de'
        ]
    ],

    'zander' => [
        'enabled' => false,
        'mail' => [
            'sender' => [
                'email' => 'fvzexport@credicom.de',
                'emailName' => 'credicom GmbH - der richtige Kredit für Sie',
                'name' => 'Sonja Wehmeyer',
            ],
            'recipient' => 'gateway@credit12.de'
        ]
    ],
];

$conf['notification'] = [
    'default' => [
        'sender' => [
            'email' => 'info@credicom.de',
            'emailName' => 'credicom GmbH - der richtige Kredit für Sie',
            'name' => 'Sonja Wehmeyer',
        ],
    ],
    'stepper_loan' => [
        'enabled' => true,//false
        'filter' => [
            'date' => ['>=' => '2017.12.08 00:00:00']
        ],
    ],
    'coApplicantRequest' => [
        'enabled' => false,
        'inactivityTimeout' => '7 day'
    ],
    'auxmoney' => [
        'enabled' => false,
        'credicomRecipient' => 'info@credicom.de'
    ],
    'creditRequestForm' => [
        'enabled' => false,
        'credicomRecipient' => 'info@credicom.de'
    ]
];

$conf['mail'] = [
    'creditRequestForm' => [
        'sendMethod' => 'smtp',
        'smtp' => [
            'host' => 'in-v3.mailjet.com',
            'port' => 587,
            'secure' => 'tls',
            'user' => '86e43975f3d04dc827626f1de33fac13',
            'pass' => 'edbd0367e656b35fa8bbbb99322337e6',
        ],
    ]
];

/* Load modules configs */
