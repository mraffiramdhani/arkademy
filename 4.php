<?php 

function akronim(string $param)
{
	$kata = preg_split('/(?=[A-Z])/',lcfirst($param));
	$akronim = "";

	foreach ($kata as $key) {
		$akronim .= strtoupper($key[0]);
	}

	return $akronim;
}

echo akronim("Negara Kesatuan Republik Indonesia");
echo akronim(" JAwa TIMur");

?>