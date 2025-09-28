<?php
$host     = 'localhost';
$username = 'root';
$pass     = '';
$dbname   = 'emp_db';

$conn = mysqli_connect($host,$username,$pass,$dbname);

if(!$conn){
die ("No Connection! bl BL");
}