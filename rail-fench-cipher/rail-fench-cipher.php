<?php
function encodeRailFenceCipher($string, $numberRails) {
    $prevValue = 0;
    $nextValue = 1;
    $cipherArray = [];

    $newString = "";
    if (strlen($string) > 0) {
        for($i=0; $i < strlen($string); $i++) {
            if($prevValue == 0) {  
                $cipherArray[$nextValue][$i] = $string[$i];
                $prevValue++; //$prevValue = 1
                $nextValue++;
            } elseif ($prevValue < $nextValue && $nextValue < $numberRails ) {
                $cipherArray[$nextValue][$i] = $string[$i];
                $prevValue++; //$prevValue = 1
                $nextValue++;
            } elseif ($nextValue == $numberRails) {
                $cipherArray[$nextValue][$i] = $string[$i];
                $prevValue++; //$prevValue = 1
                $nextValue--;
            } elseif ($prevValue > $nextValue && $nextValue != 1) {
                $cipherArray[$nextValue][$i] = $string[$i];
                $prevValue--;
                $nextValue--;
            } 
            elseif ($nextValue == 1) {
                $cipherArray[$nextValue][$i] = $string[$i];
                $prevValue--;
                $nextValue++;
            } 
        }
        
        
        for($k=1; $k <= $numberRails; $k++) {
            $newString .= implode('', $cipherArray[$k]);
        }
    } 

    
    return $newString;
}

function decodeRailFenceCipher($string, $numberRails) {
    $prevValue = 0;
    $nextValue = 1;
    $cipherArray = [];
    
    if (strlen($string) > 0) {
        $reverseString = strrev($string);
        
        for($i=0; $i < strlen($string); $i++) {

            if($prevValue == 0) {  
                $cipherArray[$nextValue][$i] = "x";
                $prevValue++; //$prevValue = 1
                $nextValue++;
            } elseif ($prevValue < $nextValue && $nextValue < $numberRails ) {
                $cipherArray[$nextValue][$i] = "x";
                $prevValue++; //$prevValue = 1
                $nextValue++;
            } elseif ($nextValue == $numberRails) {
                $cipherArray[$nextValue][$i] = "x";
                $prevValue++; //$prevValue = 1
                $nextValue--;
            } elseif ($prevValue > $nextValue && $nextValue != 1) {
                $cipherArray[$nextValue][$i] = "x";
                $prevValue--;
                $nextValue--;
            } 
            elseif ($nextValue == 1) {
                $cipherArray[$nextValue][$i] = "x";
                $prevValue--;
                $nextValue++;
            } 
        }

        $reverseString = strrev($string);

        $newArray = [];
        $counter = 0;
        for($k = $numberRails; $k > 0; $k--) {
            $array = array_reverse($cipherArray[$k], true);
            
            foreach($array as $key => $value) {
                $newArray[$key] = $reverseString[$counter];
                $counter++;
            }
            
        }
        ksort($newArray);
        return implode('', $newArray);
    }
    return "";
}


var_dump(encodeRailFenceCipher("Hello, World!", 3)); // "Hoo!el,Wrdl l";
var_dump(decodeRailFenceCipher("Hoo!el,Wrdl l", 3)); // "Hello, World!";

var_dump(encodeRailFenceCipher("", 3)); // "Hoo!el,Wrdl l";
var_dump(decodeRailFenceCipher("", 3)); // "Hello, World!";


