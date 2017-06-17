<?php 
include("views/cabecalho.php");
include("conecta.php");
include('banco-produto.php');

if(array_key_exists("removido", $_POST) && $_POST['removido']=='true') { ?>
<p class="alert-success">Produto apagado com sucesso.</p>
<?php } ?>
<?php 
$produtos = listaProdutos($conexao);
?>
<table class="table table-striped table-bordered">
    <?php
    foreach($produtos as $produto) :
        ?>
    <tr>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td><?= substr($produto['DESCRICAO'], 0, 40)?></td>
        <td><?= $produto['categoria_nome'] ?></td>
        <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>">alterar</a>
            <td>
                <form action="remove-produto.php" method="post" accept-charset="utf-8">
                   <input type="hidden" name="id" value="<?=$produto['id']?>">
                   <button class="btn btn-danger" type="">remove</button>
               </form>
           </td> 
       </tr>
       <?php
       endforeach
       ?>
   </table>

   <?php include("views/rodape.php");?>
