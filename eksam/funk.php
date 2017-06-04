<?php

function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust SQL'ga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function show(){
	global $connection;
	$quer = mysqli_query($connection,"SELECT count from ffjodoro_eksam");
	echo $quer->fetch_array(MYSQLI_NUM)[0];
}

function lastvisit(){
	global $connection;
	$quer = mysqli_query($connection,"SELECT lastvisit from ffjodoro_eksam");
	echo $quer->fetch_array(MYSQLI_NUM)[0];
}

function db_error() {
        $connection = connect_db();
        return mysqli_error($connection);
    }

?>
