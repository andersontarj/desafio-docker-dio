<!DOCTYPE html>
<html lang="en">
<head>
<title>Show databases in MySQL</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1>Projeto Dio Cloud Devops Experience</h1>
<h3>Show databases in MySQL.</h3>
<?php

getenv('MYSQL_DBHOST') ? $db_host=getenv('MYSQL_DBHOST') : $db_host="localhost";
getenv('MYSQL_DBPORT') ? $db_port=getenv('MYSQL_DBPORT') : $db_port="3306";
getenv('MYSQL_DBUSER') ? $db_user=getenv('MYSQL_DBUSER') : $db_user="root";
getenv('MYSQL_DBPASS') ? $db_pass=getenv('MYSQL_DBPASS') : $db_pass="secret";
getenv('MYSQL_DBNAME') ? $db_name=getenv('MYSQL_DBNAME') : $db_name="";

$test_conn = new mysqli("$db_host:$db_port", $db_user, $db_pass);
if($test_conn->connect_error){
    echo 'Falha de conexão!!!'  . $test_conn->connect_error;
}
echo 'Conexão realizada com sucesso!!!';

if (strlen( $db_name ) === 0)
  $conn = new mysqli("$db_host:$db_port", $db_user, $db_pass);
else 
  $conn = new mysqli("$db_host:$db_port", $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) 
	die("Connection failed: " . $conn->connect_error);
 
if (!($result=mysqli_query($conn,'SHOW DATABASES')))
    printf("Error: %s\n", mysqli_error($conn));

echo "<h3>Databases</h3>";

while($row = mysqli_fetch_row( $result ))
    echo $row[0]."<br />";

$result -> free_result();
$conn->close();

?>
<br /><a href="http://localhost:8081" target="_blank"></a><b>
<br />Para add novos bancos a lista, acesse <a href="http://localhost:8081" target="_blank">LocalHost</a> coloque as credencias e add um novo banco e atualize a tela.
</div>
</body>
</html>