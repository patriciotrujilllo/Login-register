<!DOCTYPE html>
<html>

<head>
  <title>Registrar</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>


  <div class="row m-0 vh-100 justify-content-center align-items-center">
    <div class="row w-50">
      <div class="col p-5 rounded shadow">

        <h2 class="fw-bold text-center py-5">Registrar</h2>


        <form action="#" id='formRegister'>

          <div class="mb-4">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="text" id="email" name="email" placeholder="email@email.com" required>
          </div>

          <div class="mb-4">
            <label class="form-label" for="password">Contraseña:</label>
            <input class="form-control" type="password" id="password" name="password" required>
          </div>



          <div class="d-grid">
            <button class="btn btn-primary" name="Registrar" type="submit" id="Registrar">Registrar</button>
          </div>
          <div class="alert alert-danger" id="error" style="display: none;"></div>
        </form>

        <div class="my-3"></div>
        <span>ya tienes cuenta? <a href="login.php">Inicia sesión</a></span> <br>


      </div>


    </div>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
  <script src="../controlador/userControler.js"></script>
  <script src="./register.js"></script>
</body>

</html>