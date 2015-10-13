<?php

$f3=require('lib/base.php');
$f3->set('UI','ui/htm/');
$f3->set('AUTOLOAD','inc/');

$f3->set("site_title","Preums");

$f3->route('GET /',
	function($f3) {
		$f3->set('current','home');
		$f3->set('content','content/index.htm');
		$template=new Template;
	        echo $template->render('layout/page.htm');
	}
);

$f3->route('GET /map',
	function($f3) {
		$f3->set('current','map');
		$f3->set('content','content/map.htm');
		$template=new Template;
        echo $template->render('layout/page.htm');
	}
);

$f3->route('GET /journal',
	function($f3) {
		$f3->set('current','journal');
		$f3->set('content','content/journal.htm');
		$template=new Template;
        echo $template->render('layout/page.htm');
	}
);

$f3->route('GET /regie',
	function($f3) {
		$f3->set('current','regie');
		$f3->set('content','content/regie.htm');
		$template=new Template;
        echo $template->render('layout/page.htm');
	}
);

$f3->route('GET /supervision',
    function($f3) {
		$f3->set('current','supervision');
		$f3->set('content','content/supervision.htm');
		$template=new Template;
        echo $template->render('layout/page.htm');
	}
);

$f3->route('GET /tile-@z-@x-@y',
    function($f3,$params) {
        
        header('Content-Type: image/png');
        //$web=new Web;
        //echo "http://a.tile.cloudmade.com/7f0021bf0fb44df0ab592d154908c37b/999/256/".$params['z']."/".$params['x']."/".$params['y'].".png";
        //$ret = $web->request("http://a.tile.cloudmade.com/7f0021bf0fb44df0ab592d154908c37b/999/256/".$params['z']."/".$params['x']."/".$params['y'].".png");
        //var_dump($ret);
	//$ret = $web->request("https://a.tiles.mapbox.com/v3/sapk.hm81okop/" . $params['z'] . "/" . $params['x'] . "/" . $params['y'] . ".png");
	//var_dump($ret);
        if (!file_exists('tile/'.$params['z'].'-'.$params['x']."-".$params['y'].".png")) {
	     $web=new Web;
             $ret = $web->request("https://a.tiles.mapbox.com/v3/sapk.hm81okop/" . $params['z'] . "/" . $params['x'] . "/" . $params['y'] . ".png");
             file_put_contents ('tile/'.$params['z'].'-'.$params['x']."-".$params['y'].".png" , $ret["body"] );
             echo $ret["body"];
	}else{
	     echo file_get_contents ('tile/'.$params['z'].'-'.$params['x']."-".$params['y'].".png" );
	}
        
      }
);
//$f3->route('GET /device/@action','Gast\Device->@action');
//$f3->route('GET /device/update','Gast\Device->update');

//$f3->route('GET|POST /unit/@action','Gast\Unit->@action');

//$f3->route('GET /unit/@id','Gast\Unit->get');
$f3->route('GET|POST /unit/update','Gast\Unit->update');
$f3->route('GET|POST /unit/delete','Gast\Unit->delete');

$f3->route('POST /config',
        function($f3) {
//              $json = "var G = ".json_encode($_POST);

$json = "var G = { version : '1.0.1', config : ".json_encode($_POST)." }";
                echo $json;
                file_put_contents("ui/js/gast.js",$json);
        }
);

$f3->route('GET /reset-bsdkduz',
        function($f3) {
              file_put_contents("db/units.json","{}");
              file_put_contents("db/messages.json","{}");
              echo "Reset OK!";
        }
);

//$f3->route('GET|POST /victim/@action','Gast\Victim->@action');
$f3->run();
/*
F3::set('DB',new FileDB('../filedb/',FileDB::FORMAT_Plain));
$product=new Jig('products');
print_r($product);
$product->item = 1;
$product->description = 'test item';
$product->quantity = 3;
$product->save();
$product->quantity++;           
$product->save();
*/

?>

