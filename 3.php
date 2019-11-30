<?php  

function printString(int $param)
{
	$arr = array();
	for($i = 1;$i <= $param;$i++)
	{
		if ($i % 3 == 0 && $i % 7 == 0) {
			array_push($arr, 'Arkademy');
		}
		else{
			
			if($i%3 == 0){
				array_push($arr, 'Arka');
			}
			elseif ($i%7 == 0) {
				array_push($arr, 'Demy');
			}
			else{
				array_push($arr, $i);
			}
		}
	}

	return implode(', ', $arr);
}

echo printString(3);

?>