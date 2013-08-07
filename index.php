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
    	$db=new DB\Jig('db/data/',DB\Jig::FORMAT_JSON);
    	$media=new DB\Jig\Mapper($db,'media');
    	$media->load(array('@mediaid=?',$f3->get('PARAMS.media')));
			//var_dump($media);
    	
    	$f3->set('media',$media);
    	//$template=new Template;
      //echo $template->render('media.html');
    	echo View::instance()->render('media.html');
      //echo $f3->get('PARAMS.media').'';
    }
);

$f3->route('GET /media/create',
    function($f3) {
    	$db=new DB\Jig('db/data/',DB\Jig::FORMAT_JSON);
    	$media=new DB\Jig\Mapper($db,'media');
	    $media->mediaid='thedreambuilders';
			$media->hashtag='thedreambuilders';
			$media->url='http://infinite-savannah-6486.herokuapp.com/media/'.$media->mediaid;
			$media->title="The Dreambuilders";
			$media->claim="Tutti i sogni hanno un prezzo";
			$media->image="http://distilleryimage7.ak.instagram.com/9f0cd27aff5511e28a3222000a9f17b2_7.jpg";
			$media->save();
			$media=new DB\Jig\Mapper($db,'media');
	    $media->mediaid='tomorrow';
			$media->hashtag='ilpreludiodelfuturo';
			$media->url='http://infinite-savannah-6486.herokuapp.com/media/'.$media->mediaid;
			$media->title="Tomorrow";
			$media->claim="Il preludio del futuro";
			$media->save(); 

			$media->load();
			var_dump($media);

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
