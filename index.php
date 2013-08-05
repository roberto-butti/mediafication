<?php

$f3=require('lib/base.php');

$f3->config('config.ini');
 error_reporting(E_ALL);
 ini_set("display_errors", 1);

$f3->route('GET /',
	function($f3) {
		$links=array();
		$f3->set('links',$links);
		echo View::instance()->render('home.html');
	}
);

$f3->route('GET /media/@media',
    function($f3) {
        echo $f3->get('PARAMS.media').'';
    }
);


$f3->route('GET /userref',
	function() {
		echo View::instance()->render('userref.htm');
	}
);

$f3->route('GET /phpinfo',
	function() {
		phpinfo();
	}
);

$f3->run();
