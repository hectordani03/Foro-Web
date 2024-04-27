<?php

function as_object($array){
    return json_decode(json_encode($array));
}
