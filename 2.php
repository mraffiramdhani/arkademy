<?php 

function username($username)
{
	if(preg_match('/^[a-z]{3,5}+$/', $username)){
		echo "Username Valid ";
	}else{
		echo "Format Username Salah ";
	}
}

function password($password)
{
	if(preg_match('/^[0-9]{3}(-)[0-9]{3}[A-Z]{4}+$/', $password)){
		echo "Password Valid ";
	}else{
		echo "Format Password Salah ";
	}
}

echo username("raffi");
echo username("Raffi");
echo username("R@ff1");
echo password("123-123UDIN");
echo password("123#123UDIN");
echo password("123-123Udin");

?>