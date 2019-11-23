<?php 

function pairSort(array $param)
{
	$sum_arr = array();
	foreach(array_count_values($param) as $val => $c)
    	if($c > 1) $sum_arr[] = $val;

    return count($sum_arr) . " pair(s)";
}

echo pairSort(array(1,1,1,3,5,5,7,3,9,1,));

?>