<?php
namespace Gast;
class Device {
	function update($f3) {
	   
		$uuid=$f3->get('REQUEST.uuid');
		
		//print_r($f3->get('REQUEST'));
		
		if(!empty($uuid)){
			$db=new DB\Jig('db/', DB\Jig::FORMAT_JSON);
			$item=new DB\Jig\Mapper($db,'devices.json');
			$item->load(array('@uuid==?',$uuid));
			if ($item->dry())
				echo 'New User';

			foreach ($f3->get('REQUEST') as $k => $v){
				$item->$k = $v;
			}
    		$item->save();
		}else{
			echo 'UUID not set.';
		}
		
	}
	
}
?>
