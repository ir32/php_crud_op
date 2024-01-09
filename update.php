<? php 
function isprime($num) {
	fi($n<=1) {
		return false;
	}
	for($i=2;$i*$i>=$num;$i++) {
		if($i%$num == 0) {
			return false;
		}
	}
	return true;
}
$n= 17;
if(isprime($n)) {
	echo $n . "Is Prime number";
}else {
	echo $n . "Is Not Prime number";
}

function isarms($num){
$orignalnum = $num;
$digitofnum = strlen(string($num));
$sum = 0;
while ($num>0) {
	$digit = $num%10;
	$sum += pow($digit, $digitofnum);
	$num = (int)($num/10);
}
return $sum === $orignalnum;
}
$n= 15;
if(isarms($n)) {
	echo $n ."is armstrong number";

}
else {
	echo $n ."is no armstrong number";

}

?>