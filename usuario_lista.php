	
<?php
	require("classes.php");
	
	
	$where = "";
	$termo = "";
	$mensagem = "";
	
	if (isset($_GET["edpesquisa"])){
		$termo = $_GET["edpesquisa"];
		$where = " where nomecompleto like '%$termo%' or email like '%$termo%'";	
		
	}
	
	if (
		(isset($_GET["id"])) &&
		(isset($_GET["acao"]))
	   )
	{
		if ($_GET["acao"] == "DEL"){
			$id = $_GET["id"];
			$sql = "delete from tbusuarios where id = '$id'";
			mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));
			$mensagem = "Usuário excluído com sucesso!";
			
			
			
		}
	}

?>

<h1>Usuários</h1>

<hr>

<a href="usuario_form.php">INCLUIR NOVO USUÁRIO</a>

<br><br>

<form method="GET" action="usuario_lista.php">
Pesquisar usuário <input autofocus placeholder="Pesquise o usuário aqui" title="Digite parte do nome ou do email aqui" type="text" name="edpesquisa" value="<?echo $termo;?>"><input type="submit" value="Pesquisar">

</form>
<hr>



<table border='1' width="100%">
	<tr>
		<td><b>ID</b></td>
		<td><b>Nome</b></td>
		<td><b>Email</b></td>
		<td>Comandos</td>
	</tr>

<?	


	$sql = "select * from tbusuarios $where order by nomecompleto"; 
	$tabela = mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));
	
	while ($registro = mysqli_fetch_array($tabela)) {
		$id = $registro["id"];
		$nome = $registro["nomecompleto"];
		$email = $registro["email"];
		
		
		echo "
	<tr>
		<td><a href='usuario_form.php?id=$id'>$id</a></td>
		<td><a href='usuario_form.php?id=$id'>$nome</a></td>
		<td><a href='usuario_form.php?id=$id'>$email</a></td>
		<td><center>
			<a title='Excluir usuário' href='javascript:apagar($id);'><img height='24' src='delete.png'></a>&nbsp; 
			<a title='Alterar senha do usuário' href='javascript:alterar($id);'><img height='24' src='key.png'></a>
			</center>
		</td>
		
	</tr>";
	}
?>

</table>

<script>
function apagar(idaexcluir){
	var resposta = confirm("Você quer realmente excluir o usuário?");
	if (resposta) {
		window.location.replace('usuario_lista.php?acao=DEL&edpesquisa=<?echo $termo;?>&id='+idaexcluir);
	}
}
function alterar(id){
	window.location.replace('usuario_atualizasenha.php?&id='+id);
	
}


<?
	if ($mensagem != ""){
		echo "alert('$mensagem');";
	}

?>

</script>