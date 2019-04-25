<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'password';
$db = 'page_records';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
