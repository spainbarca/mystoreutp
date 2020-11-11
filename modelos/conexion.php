<?php

Class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=sql203.ezyro.com;dbname=ezyro_27165654_mystoreutp",
						"ezyro_27165654",
						"8gdob8vvl93h");

		$link->exec("set names utf8");

		return $link;

	}


}
