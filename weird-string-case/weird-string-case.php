<?php

function toWeirdCase($string) {

  $wordArray = explode(" ", $string);

  //$newWords = [];
  foreach($wordArray as &$word) {
    //$newWord = "";
    for($i=0; $i < strlen($word); $i++) {
      $word[$i] = (($i%2 == 0) ? strtoupper($word[$i]) : strtolower($word[$i]));
    }
  }
  return join(" ", $wordArray);
}


var_dump(toWeirdCase('Hello world foo bar baz')); //HeLlO WoRlD FoO BaR BaZ
var_dump(toWeirdCase('wEll i GuesS you passed')); //WeLl I GuEsS YoU PaSsEd


