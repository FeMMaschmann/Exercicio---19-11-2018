<meta charset="utf-8">

<?php
include_once '../model/clsProduto.php';
include_once '../dao/clsProdutoDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
  $produto = new Produto();
  $produto->setNome( $_POST['txtNome']  );
  $produto->setPreco( $_POST['txtPreco']  );
  $produto->setQuantidade( $_POST['txtQuantidade']  );

  produtoDAO::inserir($produto);
  header("Location: ../index.php");
}

if( isset( $_REQUEST['excluir'] ) ){
  $id = $_REQUEST['idProduto'];
  $produto = produtoDAO::getProdutoById($id);
  echo "<br><br><hr>"
    . "<h2>Confirma a exclusão do produto "
    . $produto->getNome(). "? </h2>"
    . "<br><hr>";
  echo "<a href='?confirmaExcluir&idProduto=".$id."'><button>SIM</button></a>";
  echo "<a href='../index.php'><button>NÃO</button></a>";
}

if(isset($_REQUEST['confirmaExcluir'])){
  $id = $_REQUEST['idProduto'];
  $produto = new Produto();
  $produto->setId($id);
  produtoDAO::excluir($produto);
  header("Location: ../index.php");
}

if (isset($_REQUEST['editar']) ) {
  $id = $_REQUEST['idProduto'];
  $produto = produtoDAO::getProdutoById($id);

  $prec = $_POST['txtPreco'];
  $prec = str_replace(",",".", $prec);

  $qtd = $_POST['txtQuantidade'];
  $qtd = str_replace(",",".", $qtd);

  $produto->setNome( $_POST['txtNome']  );
  $produto->setPreco($prec);
  $produto->setQuantidade($qtd);

  produtoDAO::editar($produto);

  header("Location: ../index.php");
}
