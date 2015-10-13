<?php
namespace Gast;
class Victim {
	function update($f3) {
	   
		$uuid=$f3->get('REQUEST.uuid');
		
		//print_r($f3->get('REQUEST'));
		
		if(!empty($uuid)){
			$db=new DB\Jig('db/', DB\Jig::FORMAT_JSON);
			$item=new DB\Jig\Mapper($db,'victims');
			$item->load(array('@uuid==?',$uuid));
			if ($item->dry())
				echo 'New Victim';

			foreach ($f3->get('REQUEST') as $k => $v){
				$item->$k = $v;
			}
    		$item->save();
		}else{
			echo 'UUID not set.';
		}
		
	}}

?>
