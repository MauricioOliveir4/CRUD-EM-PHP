<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud PHP - Maurício Oliveira</title>
</head>

<?php

	$hostname = "localhost";
	$user = "root";
	$password = "root";
	$database = "crud";



	$dbconexao = mysqli_connect("$hostname", "$user", "$password") or die("<center>Erro: Problemas de conexão ao servidor. Aguarde alguns minutos e tente novamente.</center>");
	mysqli_select_db($dbconexao,$database) or die("Banco de dados não encontrado!");

