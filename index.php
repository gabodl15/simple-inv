<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
}
		
require "controladores/connection.php";

$conexion = new connection;

$query = $conexion->show_material();
?>
<!DOCTYPE html>
<html>
<head>
	<title>INVENTARIO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
        crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Inventario</a>
        </div>
    </nav>
    <br>
    <div class="container">

				<div class="botones">
						<div class="d-grid gap-2 d-md-flex justify-content-md-end">
								<a href="add_item.php" class="btn btn-primary">Agregar Item</a>
								<a href="add_stock.php" class="btn btn-success">Agregar Stock</a>
								<a href="drop_stock.php" class="btn btn-danger">Eliminar Stock</a>
								<a href="drop_item.php" class="btn btn-danger">Eliminar Item</a>
						</div>
				</div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Equipo</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
										if (is_array($query)) {
												foreach ($query as $key) { ?>
													<tr>
															<td><?php echo $key->name_material; ?></td>
															<td><?php echo $key->quantity;?></td>
													</tr>
											<?php	} ?>
								<?php	} ?>
            </tbody>
        </table>
    </div>
</body>
</html>
