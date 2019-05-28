<!DOCTYPE HTML>
<?php include ('includes/admin/connect.php'); ?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1">
    <title>Intregro</title>
    <?php include "includes/head.php"; ?>
  </head>
  <body>
    <div id="wrapper">

        <?php include "includes/sidebar.php"; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <h1><a href="#menu-toggle" class="" id="menu-toggle"><button class="btn btn-outline-primary"><></button></a> Usuarios</h1>
                        <p>Crea, edita y elimina usuarios.</p>                        
                    </div>
                    <div class="col-lg-4">
                         <button onclick="location.href='create-user'" type="button" class="btn btn-outline-primary">+ Agregar usuario</button>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-lg-12">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Nickname</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Fecha</th>
                              <th scope="col">Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                  $sql = "SELECT users.* FROM users ORDER BY id DESC";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" . utf8_encode($row["nickname"]). "</td><td>" . utf8_encode($row["name"]). "</td><td>" . utf8_encode($row["date"]). "</td><td><a class='' href='edit-user?id=" . utf8_encode($row["id"]). "'>Editar</a> / <a class='' href='delete-user?id=" . utf8_encode($row["id"]). "'>Eliminar</a></td></tr>";
                                        }
                                    }
                                  ?> 
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include "includes/footer.php"?>
    <?php include "includes/js.php"?>
    <script type="text/javascript">
      
    </script>
  </body>
</html>