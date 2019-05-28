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
                        <h1><a href="#menu-toggle" class="" id="menu-toggle"><button class="btn btn-outline-primary"><></button></a> Crear película</h1>
                        <p>Crea un nueva película.</p>                        
                    </div>
                    <div class="col-lg-4">
                         <button onclick="location.href='movies'" type="button" class="btn btn-outline-primary">< Volver</button>
                    </div>
                </div>
                <div class="row p-2">
                  <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="title">Título (*)</label>
                          <input type="text" class="form-control" id="title" placeholder="">                          
                        </div>
                        <div class="form-group">
                          <label for="synopsis">Sinopsis</label>
                          <textarea class="form-control" rows="5" id="synopsis"></textarea>
                          
                        </div>
                        <div class="form-group">
                          <label for="year">Año (*)</label>
                          <input type="number" class="form-control" id="year" aria-describedby="yearHelp" placeholder="" min="1895" max="<?php echo date('Y'); ?>">
                          <small id="yearHelp" class="form-text text-muted">Debe estar entre 1985 y <?php echo date('Y'); ?></small>
                        </div>
                        <button type="submit" onclick="location.href='javascript:tryRegisterMovie();'" class="btn btn-primary">Enviar</button>
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