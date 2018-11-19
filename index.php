<?php
	include_once 'model/clsProduto.php';
	include_once 'dao/clsConexao.php';
	include_once 'dao/clsProdutoDAO.php';

	$tot = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Market M171 - Produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1 align="center">Produtos</h1>

	<br><br><br>

	<a href="frmProduto.php"><button class="button">Cadastrar novo Produto</button></a>

	<br><br>
	<?php
		$lista = produtoDAO::getProdutos();
		if ($lista->count()==0) {
			echo "<h2><b>Nenhum produto cadastrado</b></h2>";
		}else{
	?>
	<table id="t01">
		<tr>
			<th>Código</th>
			<th>Nome do produto</th>
			<th>Preço</th>
			<th>Quantidade</th>
			<th>Editar</th>
			<th>Excluir</th>
			<th>Total</th>
		</tr>

		<?php
			foreach ($lista as $produto) {

				$p = $produto->getPreco();
				$q = $produto->getQuantidade();
				$t = $p * $q;

				echo "<tr> <td>".$produto->getId()."</td>";
				echo "<td>".$produto->getNome()."</td>";
				echo "<td>".$produto->getPreco()."</td>";
				echo "<td>".$produto->getQuantidade()."</td>";
				echo "<td> <a href='frmProduto.php?editar&idProduto=".$produto->getId()."'>
					<button>Editar</button></a></td>";
				echo "<td> <a href='controller/salvarProduto.php?excluir&idProduto=".$produto->getId()."'>
					<button>Excluir</button></a></td>";
				echo "<td>R$ ".$t."</td>";
				echo "</tr>";
			}
		?>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php foreach ($lista as $total) {
				$preco = $total->getPreco();
				$qtd = $total->getQuantidade();
				$tot += $preco * $qtd;
			} echo "R$ ".$tot; ?></td>
		</tr>

	</table>

	<br><br><br>



	<?php
		}
	?>
</body>
</html>
