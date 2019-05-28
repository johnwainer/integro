<!DOCTYPE HTML>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1">
    <title>Intregro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
  </head>
  <body>
    <?php include "includes/header.php"?>
    <section>
      <div class="container py-3">
        <div class="row ">
          <div class="col-md-4"></div>
          <div class="col-md-4 border border-primary rounded p-3">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario (Nickname)</label>
              <input type="text" class="form-control" id="username" placeholder="Ingresa tu usuario">    
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contraseña</label>
              <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña">
            </div>
            <a class="btn btn-primary" style="color: #fff!important;" href="javascript:tryLogin();">Ingresar</a>
          </form>
        </div>
        <div class="col-md-4"></div>
        </div>
      </div> 
    </section>
    <?php include "includes/footer.php"?>
    <?php include "includes/js.php"?>
    <script type="text/javascript"></script>
  </body>
</html>