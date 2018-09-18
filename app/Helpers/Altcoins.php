<?php

function Code($var) {
	return Altcoin($var)[ is_int($var) ? 'coin' : 'id' ];
}


function Altcoin($var) {

	foreach (config('altcoins') as $coin => $data) {
		if ($data['id'] === $var or $data['coin'] === $var)
			return $data;

	}

}


function Altcoins() {
	$array = config('altcoins');
	ksort($array);
	return $array;
}