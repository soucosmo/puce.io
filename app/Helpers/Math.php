<?php

function Percentage(string $n1, string $n2, string $decimals = '8') {
	return bcdiv( bcmul($n1, $n2, $decimals), 100, $decimals);
}


function Sum(string $n1, string $n2, string $n3 = '0', string $decimals = '8') {
	return bcadd( bcadd($n1, $n2, $decimals), $n3, $decimals);
}


function Sub(string $n1, string $n2, string $decimals = '8') {
	return bcsub($n1, $n2, $decimals);
}


function Mul(string $n1, string $n2, string $decimals = '8') {
	return bcmul($n1, $n2, $decimals);
}


function Div(string $n1, string $n2, string $decimals = '8') {
	return bcdiv($n1, $n2, $decimals);
}


function SumDeposits(string $wallet) {
	return Sum(Deposits::Select('amount')->Where('user_id', Auth::id())->where('address', $wallet)->sum('amount'), '0');
}
