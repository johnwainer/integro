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
                        <h1><a href="#menu-toggle" class="" id="menu-toggle"><button class="btn btn-outline-primary"><></button></a> Eliminar usuarios</h1>
                        <p>No podrás recuperar la información después.</p>                        
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
                          <input type="text" class="form-control" id="nickname" aria-describedby="nicknameHelp" placeholder="" value="<?php echo utf8_encode($row['nickname']); ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="name">Nombre completo (*)</label>
                          <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="" value="<?php echo utf8_encode($row['name']); ?>" readonly>
                        </div>
                        <button type="submit" onclick="location.href='javascript:tryDeleteUser();'" class="btn btn-danger">Confirmar eliminar</button>
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