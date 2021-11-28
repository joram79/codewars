<?php

function countBits($n) 
{
   $bin = decbin($n); // Program Me

   $array = count_chars($bin, 1);

   return empty($array[ord("1")]) ? 0: $array[ord("1")];
}

var_dump(countBits(0)); //0
var_dump(countBits(4)); //1
var_dump(countBits(7)); //3
var_dump(countBits(9)); //2
var_dump(countBits(10)); //2
