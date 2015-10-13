<?php

namespace Gast;

class Unit {

// {id:@id,status:@status,coords:{longitude:0,latitude:0},membres:{},message:{}}

    function get($f3) {
        
    }

    function delete($f3) {
        
        $uuid = $f3->get('REQUEST.uuid');
        
        print_r($f3->get('REQUEST'));

        if (!empty($uuid)) {
            $db = new \DB\Jig('db/', \DB\Jig::FORMAT_JSON);
            $item = new \DB\Jig\Mapper($db, 'units.json');
            $item->load(array('@uuid==?', $uuid));
            if (!$item->dry())
                $item->erase();
                
            echo 'Ok !';
        } else {
            echo 'UUID not set.';
        }
    }
    function update($f3) {

        $uuid = $f3->get('REQUEST.uuid');

        print_r($f3->get('REQUEST'));

        if (!empty($uuid)) {
            $db = new \DB\Jig('db/', \DB\Jig::FORMAT_JSON);
            $item = new \DB\Jig\Mapper($db, 'units.json');
            $item->load(array('@uuid==?', $uuid));
            if ($item->dry())
                echo 'New Unit';

            foreach ($f3->get('REQUEST') as $k => $v) {
                if( $k == "message"){
                    $db_mess = new \DB\Jig('db/', \DB\Jig::FORMAT_JSON);
                    $message = new \DB\Jig\Mapper($db_mess, 'messages.json');
                    $message->copyFrom('REQUEST.message');
                    $message->save();
                }else{
                    $item->$k = $v;
                }
            }
            $item->save();
            echo 'Ok !';
        } else {
            echo 'UUID not set.';
        }
    }

}

?>
