<?php

//http://dimox.name/plural-form-of-nouns/

function plural_form($number,$before,$after) {
    $cases = array(2,0,1,1,1,2);
    echo $before[($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)]].' '.$number.' '.$after[($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)]];
}
