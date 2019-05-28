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
                        <h1><a href="#menu-toggle" class="" id="menu-toggle"><button class="btn btn-outline-primary"><></button></a> Editar usuarios</h1>
                        <p>Editar usuario.</p>                        
                    </div>
                    <div class="col-lg-4">
                         <button onclick="location.href='users'" type="button" class="btn btn-outline-primary">< Volver</button>
                    </div>
                </div>
                <?php
                  $sql = "SELECT * FROM users WHERE id = '" . $_GET["id"] . "'";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                ?>
                <div class="row p-2">
                  <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="nickname">Nickname (*)</label>
                          <input type="hidden" name="id_user" id="id_user" value="<?php echo utf8_encode($_GET['id']); ?>">
                          <input type="text" class="form-control" id="nickname" aria-describedby="nicknameHelp" placeholder="" value="<?php echo utf8_encode($row['nickname']); ?>">
                          <small id="nicknameHelp" class="form-text text-muted">Sólo puede contener letras, números y guión al piso.</small>
                        </div>
                        <div class="form-group">
                          <label for="name">Nombre completo (*)</label>
                          <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="" value="<?php echo utf8_encode($row['name']); ?>">
                          <small id="nameHelp" class="form-text text-muted">Mínimo 5 caracteres</small>
                        </div>
                        <button type="submit" onclick="location.href='javascript:tryUpdateUser();'" class="btn btn-primary">Enviar</button>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
                <div class="row p-2">                  
                  <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                      <h4>Editar contraseña</h4>
                        <div class="form-group">
                          <label for="password">Nueva contraseña (*)</label>
                          <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="">
                          <small id="passwordHelp" class="form-text text-muted">Debe contener mínimo una mayúscula y un número.</small>
                        </div>
                        <div class="form-group">
                          <label for="password2">Confirmar nueva contraseña (*)</label>
                          <input type="password" class="form-control" id="password2" aria-describedby="password2Help" placeholder="">
                          <small id="password2Help" class="form-text text-muted">Debe contener mínimo una mayúscula y un número.</small>
                        </div>
                        <button type="submit" onclick="location.href='javascript:tryUpdateUserPassword();'" class="btn btn-danger">Confirmar cambio de contraseña</button>
                    </div>
                    <div class="col-lg-3"></div>
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