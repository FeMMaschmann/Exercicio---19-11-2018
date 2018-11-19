<?php
	include_once 'model/clsProduto.php';
	include_once 'dao/clsProdutoDAO.php';
	include_once 'dao/clsConexao.php';

	$nome = "";
	$preco = "";
	$quantidade = "";

	$action = "inserir";

	if (isset($_REQUEST['editar'])) {
		$id = $_REQUEST['idProduto'];
		$produto = produtoDAO::getProdutoById($id);
		$nome = $produto->getNome();
		$preco = $produto->getPreco();
		$quantidade = $produto->getQuantidade();
		$action = "editar&idProduto=".$produto->getId();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Market M171 - Cadastrar Produto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1 align="center">Cadastrar Produto</h1>

	<br><br><br>

	<form action="controller/salvarProduto.php?<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
		<label>Nome: </label>
		<input class="input_que_presta" type="text" name="txtNome" value="<?php echo $nome; ?>" required maxlength="100" /><br><br>
		<label>Preço: </label>
		<input class="input_que_presta" type="text" name="txtPreco" value="<?php echo $preco; ?>" maxlength="30" /><br><br>
		<label>Quantidade: </label>
		<input class="input_que_presta" type="text" name="txtQuantidade" value="<?php echo $quantidade; ?>" required /><br><br>

		<br>
		<input class="input_botao" type="submit" name="Salvar">
		<input class="input_botao" type="reset" name="Limpar">
	</form>

</body>
</html>
