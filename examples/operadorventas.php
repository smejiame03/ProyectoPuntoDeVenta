<?php
    require 'conexion.php';
    $con=conectar();
    $idUs = $_GET['idUs'];
    $consulta = "SELECT User FROM registro WHERE ID='$idUs'";
    $resul = mysqli_query($con,$consulta);
    $User = mysqli_fetch_assoc($resul)['User'];

    $consulta1 = "SELECT * FROM productos WHERE CantidadDisponible!=0";
    $resul = mysqli_query($con,$consulta1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" sizes="76x76" href="../assets/img/BanderaAntioquia.webp">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    VENTAS
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>
<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="black" data-image="../assets/img/Compras.avif">
      <div class="logo"><a href="" class="simple-text logo-normal">
          VENTAS
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="modificarprod.php">
              <i class="material-icons">add</i>
              <p>Realizar venta</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Nueva venta</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="login.html"><i class="material-icons">logout</i>  Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <h4>Informacion vendedor</h4>
                </div>
                <div class="card-body table-responsive">
                  <form action="agregarventa.php" method="post">
                    <input type="hidden" class="form-control" id="idUs" name="idUs" value="<?php echo $idUs; ?>"/>
                      <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label class="bmd-label-floating">Usuario</label>
                                  <input type="text" class="form-control" id="User" name="User" value="<?php echo $User?>" disabled/>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label class="bmd-label-floating">Identificación</label>
                                  <input type="text" class="form-control" id="ID" name="ID" value="<?php echo $idUs?>" disabled/>
                              </div>
                          </div>
                      </div>
                      </div>
                      <div class="card-header card-header-primary">
                          <h4>Información cliente</h4>
                      </div>
                      <div class="card-body table-responsive">   
                              <div class="row">
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Nombre</label>
                                          <input type="text" class="form-control" id="NombreCliente" name="NombreCliente" required/>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Dirección</label>
                                          <input type="text" class="form-control" id="DireccionCliente" name="DireccionCliente" required/>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Celular</label>
                                          <input type="text" class="form-control" id="CelularCliente" name="CelularCliente" requiered/>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Correo</label>
                                          <input type="text" class="form-control" id="CorreoCliente" name="CorreoCliente" requiered/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        <div class="card-header card-header-primary">
                          <h4>Descripción de los Productos</h4>
                        </div>
                        <div class="card-body table-responsive2">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Producto</label>
                                                <div class="select">
                                                  <select name="CostoProducto" id="CostoProducto" onchange="ShowSelected();">
                                                    <?php
                                                      while($fila = $resul->fetch_assoc()): 
                                                        $IDProducto = $fila['IDProducto'];
                                                        $NombreProducto = $fila['Nombre'];
                                                        $CostoProducto = $fila['Costo']; ?>
                                                        <option class="option-select" value="<?php echo $CostoProducto?>"><?php echo $NombreProducto?>
                                                      <?php endwhile; ?>
                                                  </select>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label class="bmd-label">Valor Unitario $</label><br>
                                                <input type="number" class="form-control" id="IDCosto" name="IDCosto" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Cantidad</label>
                                                <input type="number" class="form-control" id="CantidadProducto" name="CantidadProducto" requiered/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label">Total $</label><br>
                                                <input class="form-control" style="color:black"id="Total" name="Total" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                            <div class="row">
                              <!-- <div class="col-md-4">
                                <button id="duplicar-inputs" class="btn btn-primary btn-block">Agregar producto</button>
                              </div> -->
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-4">
                                <button type="submit" id="factura" class="btn btn-primary btn-block" disabled>Generar Factura</button>
                              </div>
                            </div>
                          </div>
                        </form>
                        <div class="col-md-2">
                          <button class="btn btn-primary btn-block" onclick="multiplicar()">Indicar total</button>
                        </div>
                        </div>
                      </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right" id="date">
            , desarrollado por NFT (New Future Technologies) <i class="material-icons">favorite</i>.
          </div>
        </div>
      </footer>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <script>
    function multiplicar() {
        //Obtener los valores de los inputs
        var valor1 = parseInt(document.getElementById("CantidadProducto").value);
        var valor2 = parseInt(document.getElementById("CostoProducto").value);
      
        //Realizar la multiplicación
        var resultado = valor1 * valor2;
      
        //Mostrar el resultado en otro input
        document.getElementById("Total").value = resultado;
        document.getElementById('factura').disabled = false
      }
  </script>
  <script>
    function ShowSelected()
    {
    /* Para obtener el valor */
    var cod = document.getElementById("CostoProducto").value;
    document.getElementById("IDCosto").value = cod;
    }
  </script>
  <script> // Obtener el botón y el contenedor de inputs
    const btnDuplicar = document.getElementById("duplicar-inputs");
    const inputsContainer = document.querySelector(".card-body.table-responsive2");
    // const labelContainer = document.querySelector(".card-body.table-responsive2.bmd-label-floating");
    
    // Agregar un evento de clic al botón
    btnDuplicar.addEventListener("click", function() {
      // Clonar la última fila de inputs
      const ultimaFila = inputsContainer.lastElementChild.cloneNode(true);
      // const ultimaFila1 = labelContainer.lastElementChild.cloneNode(true);
      
      // Reiniciar los valores de los inputs clonados
      ultimaFila.querySelectorAll("input").forEach(input => input.value = "");
      
      // Agregar la fila clonada al final del contenedor
      inputsContainer.appendChild(ultimaFila);
      // labelContainer.appendChild(ultimaFila1);
    });
</script>

</body>
</html>