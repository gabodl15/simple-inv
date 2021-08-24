<?php

require "controladores/connection.php";
$conexion = new connection;
$result = $conexion->show_material();

if(isset($_POST['submit'])){
    $conexion->stock($_POST['seleccion'], $_POST['stock']);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
       <meta charset="utf-8">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
             rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
             crossorigin="anonymous">
       <title>Agregar Stock</title>
   </head>
   <body>
       <nav class="navbar navbar-light bg-light">
           <div class="container-fluid">
               <a href="index.php" class="navbar-brand">Inventario</a>
           </div>
       </nav>

       <br><br>

       <div class="container">
           <div class="formulario">
               <form class="row g-3" action="add_stock.php" method="POST">

                    <select class="form-select mb-3" aria-label="Default select example" name="seleccion">
                        <?php foreach ($result as $key) { ?>
                            <option value="<?php echo $key->id_material; ?>"><?php echo $key->name_material; ?></option>
                        <?php } ?>
                    </select>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Agregar</label>
                        <div class="col-sm-10">
                            <input type="number" value="0" class="form-control" name="stock">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Agregar Item</button>
                    </div>
               </form>
           </div>
       </div>
   </body>
</html>
