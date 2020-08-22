<?php

function geoUTF8ToASCII($string){
	//return string if it`s not UTF-8 Encoded 
	//or doesn`t have ONLY English Letters
	if(mb_detect_encoding($string) != "UTF-8" || !preg_match('/[^A-Za-z0-9]+/', $string))
		return $string;
	
	//get the char array of string
	$charArray = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);    

	//array of Georgian Capital Letters
	$geoLetters = [
		'ა' => 'a','ბ' => 'b','გ' => 'g','დ' => 'd','ე' => 'e', 
		'ვ' => 'v','ზ' => 'z','თ' => 'T','ი' => 'i','კ' => 'k',
		'ლ' => 'l','მ' => 'm','ნ' => 'n','ო' => 'o','პ' => 'p',
		'ჟ' => 'J','რ' => 'r','ს' => 's','ტ' => 't','უ' => 'u',
		'ფ' => 'f','ქ' => 'q','ღ' => 'gh','ყ' => 'y','შ' => 'sh',
		'ჩ' => 'ch','ც' => 'c','ძ' => 'dz','წ' => 'ts','ჭ' => 'Ch',
		'ხ' => 'kh','ჯ' => 'j','ჰ' => 'h'
	];

	//change Georgian Letters with Latin
	foreach ($charArray as $char) {
		//reject other symbols
		if(!array_key_exists($char,$geoLetters)) continue;
		$string = str_replace($char, $geoLetters[$char], $string);
	}

	return $string;
}
