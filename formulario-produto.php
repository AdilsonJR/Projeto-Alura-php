<?php
include('views/cabecalho.php');
include("conecta.php");
include("banco-categoria.php");
$categorias = listaCategorias($conexao);
?>

<h1>Formulario de cadastro</h1>
<form action="adiciona-produto.php" method="post" accept-charset="utf-8">
	<table class="table">
		<tr>
			<td colspan="" rowspan="" headers=""><label>Nome:</label></td>
			<td class=""><input type="text" name="nome"></td>
		</tr>
		<tr>
			<td><label for="">Preco:</label></td>
			<td><input type="text" name="preco"></td>
		</tr>
		<tr>
			<td><label for="">Descrição:</label></td>
			<td><textarea name="descricao"></textarea></td>
		</tr>
		<tr>
			<tr>
				<td>Categoria</td>
				<td>
					<select name="categoria_id">
						<?php foreach($categorias as $categoria) : ?>
							<option value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="checkbox" name="usado" value="true"> Usado
		</tr>
		<tr>	
			<td><td><input type="submit" name="" value="Cadastrar"></td></td>
		</tr>
	</table>
</form>

<?php include('views/rodape.php') ?>
