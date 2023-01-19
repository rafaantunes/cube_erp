<script>
    function msgErro(){
        let el = document.getElementById("alert");
        el.style.cssText = 'display: block';
    }
</script>
<?php
require_once 'config.php';
session_start();

    if(isset($_POST["acao"])){
        if($_POST["acao"] == "logar"){
            $usuario = $_POST["usuLogin"];
            $senha = $_POST["usuSenha"];
            
            $url = "http://54.207.45.65:9000/usuario";
            $ch = curl_init($url);
            $data = array(
                'usuario'=> $usuario,
                'senha' => $senha
            );
            $body = json_encode($data);  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $retorno = curl_exec($ch);
            curl_close($ch);
            $resultado =  json_decode(curl_exec($ch), true);
            
            if (isset($resultado["DATA"][0]["usuLogin"])){
                if(($resultado["DATA"][0]["usuLogin"]== $usuario) && ($resultado["DATA"][0]["usuSenha"]== $senha)){
                    $_SESSION["usuLogin"] = $resultado["DATA"][0]["usuLogin"];
                    $_SESSION["pesNome"] = $resultado["DATA"][0]["pesNome"];
                    header("Location: ".BASE_URL);
                }else{
                    print '<div id="alert" class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fas fa-ban"></i>Usuário e/ou senha incorretos!
                            </div>';
                } 
            }else{
                print '<div id="alert" class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>Usuário e/ou senha incorretos!
                        </div>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>..:: LAZARUS ::.. - Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    
        
<div class="login-box">
    
  <!-- /.login-logo -->
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
        <img src="assets/images/lazarus_nome.png" width="300"/>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Bem vindo(a). Efetue o login.</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" name="" class="form-control" placeholder="Domínio">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-server"></span>
            </div>
          </div>
        </div>  
        <div class="input-group mb-3">
          <input type="text" name="usuLogin" class="form-control" placeholder="Usuário">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="usuSenha" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
              <button type="submit" class="btn btn-dark btn-block">Entrar</button>
              <input type="hidden" name="acao" value="logar"/>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
      -->
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./assets/js/adminlte.min.js"></script>
</body>
</html>