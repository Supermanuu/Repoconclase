<?php
	require_once("php/busq_connect.php");
	sleep(1);
	$search = '';
	if (isset($POST['search'])) {
		$search = $_POST['search'];
	}
	$consulta = "SELECT * FROM registra WHERE apellido1 LIKE '%".$search."%' OR nombre LIKE '%".$search."%' ORDER BY visitas LIMIT 5";
	$resultado = $connect->query($consulta);
	$fila = mysqli_fetch_assoc($resultado);
	$total = mysqli_num_rows($resultado);
?>
<?php if ($total>0 && $search!=''){ ?>
	<h2>Resultados de la búsqueda</h2>
	<?php do { ?>
		<div class="result">
			<?php echo $fila['nombre'] ?>
			<?php echo $fila['apellido1'] ?>
			<?php echo $fila['apellido2'] ?> <br>
			<?php echo $fila['nacimiento'] ?> <br>
			<?php echo $fila['tipo_documento'] ?>
			<?php echo $fila['documento'] ?> <br>
			<?php echo $fila['cp'] ?>
			<?php echo $fila['comunidad'] ?> <br>
			<?php echo $fila['movil'] ?>
		</div>		
	<?php } while ($fila=mysqli_num_rows($resultado)); ?>
<?php }
else echo '<h2>No se encontraron resultados</h2>';
?>
