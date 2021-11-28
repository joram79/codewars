<?php


function solution($number): string
{
  $number =sprintf("%'.04d", $number);
  $string = getThousands($number[0]).getHundreds($number[1]).getTenths($number[2]).getOnes($number[3]);
  
  return $string;
}

function getThousands($number) {
    if ($number ==0) {
        return false;
    }

    $string = "";
    if($number) {
        for($i=0; $i<$number; $i++) {
            $string .= "M";
        }
    }
    //echo $string;
    return $string;

}

function getHundreds($number) {
    if (empty($number)) {
        return false;
    }
    $string = "";

    if($number > 0 && $number < 4) {
        for($i=1; $i <= $number; $i++) {
            $string .= "C";
        }
    }
    if ($number == 4) {
        $string = "CD";
    }
    if ($number == 5) {
        $string = "D";
    }
    if ($number > 5 and $number < 9) {
        $string = "D";
        for($i=6; $i <= $number; $i++) {
            $string .= "C";
        }
    }
    if ($number == 9) {
        $string = "CM";
    }
    return $string;
    
}
function getTenths($number) {
    if (empty($number)) {
        return false;
    }
    $array[1] = "X";
    $array[2] = "XX";
    $array[3] = "XXX";
    $array[4] = "XL";
    $array[5] = "L";
    $array[6] = "LX";
    $array[7] = "LXX";
    $array[8] = "LXXX";
    $array[9] = "XC";

    return $array[$number];

    
}
function getOnes($number) {
    if (empty($number)) {
        return false;
    }
    $array[1] = "I";
    $array[2] = "II";
    $array[3] = "III";
    $array[4] = "IV";
    $array[5] = "V";
    $array[6] = "VI";
    $array[7] = "VII";
    $array[8] = "VIII";
    $array[9] = "IX";
    return $array[$number];

}

echo solution(1000) . "\n";
echo solution(4) . "\n";
echo solution(1) . "\n";
echo solution(1990) . "\n";
echo solution(2008) . "\n";

