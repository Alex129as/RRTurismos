<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--===============================================================================================-->
    <link
      rel="icon"
      type="image/png"
      href="../../../images/icons/favicon.ico"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../../../fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../../../vendor/animate/animate.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../../../vendor/css-hamburgers/hamburgers.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../../../vendor/select2/select2.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../../css/util.css" />
    <link rel="stylesheet" type="text/css" href="../../../css/main.css" />
    <!--===============================================================================================-->
  </head>
  <body id="template" class="bg-gradient-primary">
    <div class="bg-gradient-primary">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-pic js-tilt" data-tilt>
            <img src="../../../images/img-01.png" alt="IMG" />
          </div>

          <form class="login100-form validate-form" method="POST">
            <span class="login100-form-title"> Member Login </span>

            <div
              class="wrap-input100 validate-input"
              data-validate="Valid email is required: ex@abc.xyz"
              id="InpuUser"
            >
              <input
                class="input100"
                type="text"
                name="user"
                placeholder="Username"
                id="user"
                required
              />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>
            <div>
              <p id="UserValidator" class="ValidaUser" 
              style="margin-top: -3%; text-align: center; height: 5% ;">
              </p>
            </div>
            <br />
            <div
              class="wrap-input100 validate-input"
              data-validate="Informe a Senha"
            >
              <input
                class="input100"
                type="password"
                name="password"
                placeholder="Password"
                id="password"
                required
                style="margin-top: -5%;"
              />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>

            <div class="container-login100-form-btn" style="margin-top: -5%;">
              <button class="login100-form-btn" id="btnlogin">
                Login
              </button>
            </div>

            <div class="text-center p-t-12">
              <span class="txt1"> Forgot </span>
              <a class="txt2" href="login/forgot/password"> Username / Password? </a>
            </div>

            <div class="text-center p-t-136">
              <a class="txt2" href="#">
                Create your Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
  <script src="../../../js/sweetalert2.all.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="../../../vendor/jquery/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

  <script type="text/javascript"> 
    Redirect = () => {
      setTimeout(()=> {
        location.href = "/dashboard";
      }, 1500);
    };
    isEmpty = (obj) => {
      for (var prop in obj) {
        if (obj.hasOwnProperty(prop)) return false;
      }

      return JSON.stringify(obj) === JSON.stringify({});
    };

    $(".login100-form").submit((e) => {
      e.preventDefault();

      var user = $("#user").val();
      var senha = $("#password").val();

      $.ajax({
        url: "http://localhost:8000/src/pages/login/Login.php",
        method: "POST",
        data: { user: user, password: senha },
        datatype: "JSON",
        beforeSend: () => {
          $("#btnlogin").html("");
          $("#btnlogin")
          .append('<div class="spinner-border text-secondary" role="status">'
            +'<span class="sr-only"></span>'
            +'</div>');
         },
        complete: () =>{
          $("#btnlogin").html("")
          $("#btnlogin").append( document.createTextNode("Login"))
        },  
        success: (res) => {
          if (res === "login_checked") {
            swal({
              position: "top-end",
              type: "success",
              title: "Login Efetuado com Sucesso",
              showConfirmButton: false,
              timer: 1500,
            });
            Redirect();
          } else {
            swal({
              type: "warning",
              title: "Oops....",
              text: "Senha Inválida para usuário:\n" + user,
            });
          }
        },
        error : (err) =>{
          swal({
              type: "error",
              title: "Server Error",
              text: "Não foi possível se Conectar com Banco de Dados StatusCode: "+err.status,
            });
        }
      });
    });
    $(document).ready(()=> {
      $("#user").keyup(()=> {
        var user = $("#user").val();

        $.ajax({
          url: "http://localhost:8000/src/pages/login/verifica_user.php",
          method: "POST",
          data: { user: user },
          datatype: "JSON",
          error: (err) => {
            if (user === "") {
              $("#UserValidator").html("");
            }else{
              $("#UserValidator").html("");
              $("div p").append(
              document.createTextNode("Não é possível Validar Usuário"));
              $("#UserValidator").css("color", "#c80000");
            }
          }
        }).done((res) => {
          if (user === "") {
            $("#UserValidator").html("");
            $("#btnlogin").css("opacity", "1");
          } else if (res.length == 0) {
            $("#UserValidator").html("");
            $("div p").append(
              document.createTextNode("Usuário Não Cadastrado")
            );
            $("#UserValidator").css("color", "#c80000");
            $("#btnlogin").attr("disabled", true);
            $("#btnlogin").css("opacity", "0.5");
          } else if (res.length >= 1) {
            console.log(res);
            $("#UserValidator").html("");
            $("div p").append(
              document.createTextNode("Usuário Validado Com Sucesso")
            );
            $("#UserValidator").css("color", "#4fa83f");
            $("#btnlogin").attr("disabled", false);
            $("#btnlogin").css("opacity", "1");
          }
        });
      });
    });
  </script>  
</html>
