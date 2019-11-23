<?php 

function username($username)
{
	if(preg_match('/^[a-z]{3,5}+$/', $username)){
		echo "Username Valid ";
		return true;
	}else{
		echo "Format Username Salah ";
		return false;
	}
}

function password($password)
{
	if(preg_match('/^[0-9]{3}(-)[0-9]{3}[A-Z]{4}+$/', $password)){
		echo "Password Valid ";
		return true;
	}else{
		echo "Format Password Salah ";
		return false;
	}
}

function validate($username, $password) {
	if($username != null && $password != null){
		if(username($username)){
			if(password($password)){
				echo 'Berhasil';
				return true;
			}else{
				echo "Format Password Salah";
				return false;
			}
		}else{
			echo 'Format Username Salah';
			return false;
		}
	}else{
		echo 'Empty';
		return false;
	}
}

echo username("raffi") . "<br>";
echo username("Raffi") . "<br>";
echo username("R@ff1") . "<br>";
echo password("123-123UDIN") . "<br>";
echo password("123#123UDIN") . "<br>";
echo password("123-123Udin") . "<br>";

echo validate("ramdn", "123-123UDIN");

?>