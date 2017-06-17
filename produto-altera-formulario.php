<?php 
include('views/cabecalho.php');
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");
$categorias = listaCategorias($conexao);
$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
?>

<h1>Formulario de auteração</h1>
<form action="autera-produto.php" method="post" accept-charset="utf-8">
	<table class="table">
		<input type="hidden" name="id" value="<?=$produto['id']?>" />
		<tr>
			<td colspan="" rowspan="" headers=""><label>Nome:</label></td>
			<td class=""><input type="text" name="nome" value="<?=$produto['nome']?>"></td>
		</tr>
		<tr>
			<td><label for="">Preco:</label></td>
			<td><input type="text" name="preco" value="<?=$produto['preco']?>"></td>
		</tr>
		<tr>
			<td><label for="">Descrição:</label></td>
			<td><textarea class="form-control" name="descricao"><?=$produto['DESCRICAO']?></textarea></td>
		</tr>		
		<tr>
			<td>Categoria</td>
			<td>
				<select name="categoria_id" class="form-control">
					<?php 

					foreach($categorias as $categoria) : 
						$essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
					$selecao = $essaEhACategoria ? "selected='selected'" : "";

					?>
					<option value="<?=$categoria['id']?>" <?=$selecao?>>
						<?=$categoria['nome']?>
					</option>
				<?php endforeach ?>
			</select>
		</td>
	</tr>
</tr>
<?php
$usado = $produto['usado'] ? "checked='checked'" : "";
?>
<tr>
	<td></td>
	<td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado
	</tr>
	<tr>	
		<td><td><input type="submit" name="" value="Alterar	"></td></td>
	</tr>
</table>
</form>

<?php include('views/rodape.php') ?>
