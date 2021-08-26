<?php

require "controladores/connection.php";

$conexion = new connection;

session_start();

if (isset($_POST['submit'])) {
    $username = $_POST["user"];
    $password = $_POST["password"];
    $conexion->log_in($username, $password);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
            crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
          <div class="center">
              <h1 class="text-center">Inicio de Sesion</h1>
              <form class="row g-3" action="login.php" method="POST">
                  <div class="card">
                      <div class="card-body">
                          <div class="login">
                              <div class="mb-3">
                                  <label for="formGroupExampleInput" class="form-label">Usuario</label>
                                  <input type="text" class="form-control" name="user">
                              </div>
                              <div class="mb-3">
                                  <label for="formGroupExampleInput2" class="form-label">Clave</label>
                                  <input type="password" class="form-control" name="password">
                              </div>
                              <div class="col-auto">
                                  <button type="submit" name="submit" class="btn btn-primary mb-3">LOGIN</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </body>
</html>
