<?php
$host="localhost";
$dbname="talemtum";
$dbuser="root";
$userpass="";

$dsn="mysql:host=$host;dbname=$dbname;user=$dbuser;password=$userpass";

try{
   $conn=new PDO($dsn);
 

}catch(PDOException $e){
   echo $e->getMessage();
}
?>




