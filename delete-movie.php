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
                        <h1><a href="#menu-toggle" class="" id="menu-toggle"><button class="btn btn-outline-primary"><></button></a> Eliminar película</h1>
                        <p>No podrás recuperar la información después.</p>                        
                    </div>
                    <div class="col-lg-4">
                         <button onclick="location.href='movies'" type="button" class="btn btn-outline-primary">< Volver</button>
                    </div>
                </div>
                <?php
                  $sql = "SELECT * FROM movies WHERE id = '" . $_GET["id"] . "'";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                ?>
                <div class="row p-2">
                  <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="title">Título (*)</label>
                          <input type="hidden" name="id_movie" id="id_movie" value="<?php echo utf8_encode($_GET['id']); ?>">

                          <input type="text" class="form-control" id="title" placeholder="" value="<?php echo utf8_encode($row['title']); ?>" readonly>                          
                        </div>
                        <div class="form-group">
                          <label for="synopsis">Sinopsis</label>
                          <textarea class="form-control" rows="5" id="synopsis" readonly><?php echo utf8_encode($row['synopsis']); ?></textarea>
                          
                        </div>
                        <div class="form-group">
                          <label for="year">Año (*)</label>
                          <input type="number" class="form-control" id="year" aria-describedby="yearHelp" placeholder="" min="1895" max="<?php echo date('Y'); ?>" value="<?php echo utf8_encode($row['year']); ?>" readonly>
                          <small id="yearHelp" class="form-text text-muted">Debe estar entre 1985 y <?php echo date('Y'); ?></small>
                        </div>
                        <button type="submit" onclick="location.href='javascript:tryDeleteMovie();'" class="btn btn-danger">Confirmar eliminar</button>
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