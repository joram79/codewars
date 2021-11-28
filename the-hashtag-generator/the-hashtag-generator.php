<?php
//My Solution
function generateHashtag($str) {
    //remove trailing spaces
    $str = trim($str);

    //convert multiple spaces to 1 spaces
    $str = preg_replace('!\s+!', ' ', $str);

    
    if(strlen($str) == 0 || strlen($str) > 139) {
        return false;
    } else {
        //capitalize all words
        $str = ucwords($str);

        //remove spaces 
        $str = preg_replace('!\s+!', '', $str);

        //strlen = 0 
        if (strlen($str) == 0 ) {
            return false;
        }
        $str = "#".$str;
        return $str;
    }
} 

//Smartest
function generateHashtag($str) {
    $str = '#' . str_replace(' ', '', ucwords($str));
   
   return (strlen($str) > 140 || strlen($str) == 1) ? false : $str;
}

var_dump(generateHashtag(''));
var_dump(generateHashtag(str_repeat(' ', 200)));
var_dump(generateHashtag('Codewars'));
var_dump(generateHashtag('Codewars      '));
var_dump(generateHashtag('Codewars Is Nice'));
var_dump(generateHashtag('codewars is nice'));
var_dump(generateHashtag('Code' . str_repeat(' ', 140) . 'wars'));
var_dump(generateHashtag('Looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooong Cat'));
var_dump(generateHashtag(str_repeat("a", 139)));
var_dump(generateHashtag(str_repeat("a", 140)));


// generateHashtag(''), 'Expected an empty string to return false');
// generateHashtag(str_repeat(' ', 200)), "Still an empty string");
// $this->assertEquals('#Codewars', generateHashtag('Codewars'), 'Should handle a single word and add a hashtag at the beginning.');
// $this->assertEquals('#Codewars', generateHashtag('Codewars      '), 'Should handle trailing whitespace.');
// $this->assertEquals('#CodewarsIsNice', generateHashtag('Codewars Is Nice'), 'Should remove spaces.');
// $this->assertEquals('#CodewarsIsNice', generateHashtag('codewars is nice'), 'Should capitalize first letters of words.');
// $this->assertEquals('#CodeWars', generateHashtag('Code' . str_repeat(' ', 140) . 'wars'));
// $this->assertEquals(false, generateHashtag('Looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooong Cat'), 'Should return false if the final word is longer than 140 chars.');
// $this->assertEquals("#A" . str_repeat("a", 138), generateHashtag(str_repeat("a", 139)), "Should work");
// $this->assertEquals(false, generateHashtag(str_repeat("a", 140)), "Too long");
