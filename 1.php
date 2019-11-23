<?php 

function person(string $name, int $age)
{
	return array(
		'name' 			=> $name,
		'age'			=> $age,
		'adress'		=> "Jl.Katapang-Andir RT.02 RW.07 Kec.Katapang Kab.Bandung",
		'hobbies'		=> array("Membaca", "Koding", "Game"),
		'is_married'	=> false,
		'list_school'	=> array(
							new School("SDN Babakan Sondari 2", 2007, 2013, null),
							new School("SMPN 2 Katapang", 2013, 2016, null),
							new School("SMKN 1 Katapang", 2016, 2019, "RPL")
						   ),
		'skills'		=> array(
							new Skill("Laravel", "advanced"),
							new Skill("PHP", "beginner"),
						   ),
		'interest_in_coding'	=> true,
	);
}

class School {
	
	var $name;
	var $year_in;
	var $year_out;
	var $major;

	function __construct($name, $year_in, $year_out, $major)
	{
		$this->name 	= $name;
		$this->year_in 	= $year_in;
		$this->year_out	= $year_out;
		$this->major 	= $major;
	}

}

class Skill {

	var $skill_name;
	var $level;
	
	function __construct($skill_name, $level)
	{
		$this->skill_name 	= $skill_name;
		$this->level 		= $level;
	}
}

echo json_encode(person("Mochhamad Raffi Ramdhani", 18));

?>