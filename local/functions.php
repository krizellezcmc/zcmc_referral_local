<?php

// Search if data(assoc array) exist in array
function is_in_array($array, $key, $key_value){
    $within_array = "Nope";
    foreach($array as $k => $val){
        if(is_array($val)){
            $within_array = is_in_array($val, $key, $key_value);
            if($within_array == $key_value){
                break;
            }
        }else {
            if($val == $key_value && $k == $key){
                $within_array = $key_value;
                break;
            }
        }
    }

    return $within_array;
}
?>