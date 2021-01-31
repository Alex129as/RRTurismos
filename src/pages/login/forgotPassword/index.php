<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="../../../../vendorTemplate/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template-->
    <link href="../../../../CssTemplate/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="../../../images/img-01.png" alt="IMG" id="bg-password" style="  margin-left: 20%; margin-top: 20%"/>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <div class="input-container">
                                                <div class="row" id="inputUser">
                                                    <input type="text" class="form-control form-control-user" placeholder="Informe seu Username ex: Alex.Sandro" id="user" name="user">
                                                </div>       
                                            </div>
                                            <br>    
                                            <div class="input-container">
                                                <div class="row" id="inputCPF">
                                                    <input type="hidden" class="form-control form-control-user" placeholder="Informe seu CPF" id="cpf" name="cpf">
                                                </div>       
                                            </div> 
                                            <br>    
                                            <div class="input-container">
                                                <div class="row" id="inputToken">
                                                    <input type="hidden" class="form-control form-control-user" placeholder="Informe seu token" id="token" name="token">
                                                </div>       
                                            </div>    
                                        </div>
                                        <div class="row">
                                            <button id="btnresetpassword" class="btn btn-primary btn-user btn-block" id="btnresetpassword">
                                                Reset Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../../../../vendorTemplate/jquery/jquery.min.js"></script>
    <script src="../../../../vendorTemplate/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../../vendorTemplate/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../../jsTemplate/sb-admin-2.min.js"></script>
    <!--Ajax-->
    <script src="../../../../vendor/jquery/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="../../../../js/jquery.mask.js" crossorigin="anonymous"></script>
    <script src="../../../../js/sweetalert2.all.js" crossorigin="anonymous"></script>

</body>

<script type="text/javascript">
    
    $(".user").submit((e) => {
            e.preventDefault();

            var user = $("#user").val();
            var cpf = $("#cpf").val();
            var token = $("#token").val();
            var newPassword = "padrao";

            $.ajax({
                url: "http://localhost:8000/functions/resetPassword/index.php",
                method: "POST",
                data: { user: user, cpf: cpf, token: token, senha: newPassword},
                datatype: "JSON",
                success: (res) => {
                    if(res === "success"){
                        swal({
                            position:'top-end',
                            type: "success",
                            title: "Senha Resetada com Sucesso",
                            text: "Faça login com a senha: "+newPassword+" para poder Altera-lá!",
                            showConfirmButton: true,
                        }).then(()=>{
                            location.href= "/login"; 
                        })
                    }
                },
                error: (err) => {
                    console.log(err);
                    swal({
                        type: "error",
                        title: "Server Error",
                        text: "Não foi possível se Conectar com Banco de Dados StatutsCode: "+err.status,
                        showConfirmButton: true,
                    });
                },
                beforeSend: () => {
                    $("#btnresetpassword").html("");
                    $("#btnresetpassword")
                    .append('<div class="spinner-border text-secondary" role="status">'
                        +'<span class="sr-only"></span>'
                        +'</div>');
                },
                complete: () => {
                    $("#btnresetpassword").html("")
                    $("#btnresetpassword").append( document.createTextNode("Reset Password"))
                },
            });    
        });
    $(document).ready(() => {

        $("#btnresetpassword").attr('disabled', true);
        $("#btnresetpassword").css('opacity','0.5');  
        $("#cpf").mask("000.000.000-00", {reverse: true});

        $("#user").blur(()=>{
            var user = $("#user").val();

            $.ajax({
                url: "http://localhost:8000/functions/validateUser/index.php",
                method: "POST",
                data: { user: user },
                datatype: "JSON",
            }).done((res)=>{
                console.log(res)
                if(res.length == 1){
                    for(let i = 0; i < res.length; i++){
                        if(res[i].usuario === user){
                            $("#inputUser i").remove();
                            $("#inputUser").append('<i id="validacpf" class="far fa-check-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: green;"></i>');
                            $("#cpf").attr("type", "text");
                        }else{
                            $("#inputToken i").remove();
                            $("#inputCPF i").remove();
                            $("#inputUser i").remove();
                            $("#inputUser").
                            append('<i class="far fa-times-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: red;"></i>');
                        }
                    }    
                }else if(res.length != 1 && user != ""){
                    $("#inputCPF i").remove();
                    $("#inputToken i").remove();
                    $("#inputUser i").remove();
                    $("#inputUser").
                    append('<i class="far fa-times-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: red;"></i>');
                    $("#cpf").attr("type", "hidden");
                    $("#token").attr("type", "hidden");
                }else{
                    $("#inputCPF i").remove();
                    $("#inputToken i").remove();
                    $("#inputUser i").remove();
                    $("#cpf").attr("type", "hidden");
                    $("#token").attr("type", "hidden");
                }
            })
        });
        $("#cpf").blur(()=>{
            var user = $("#user").val();
            var cpf = $("#cpf").val();

            $.ajax({
                url: "http://localhost:8000/functions/validateUser/cpf.php",
                method: "POST",
                data: { user: user, cpf: cpf },
                datatype: "JSON",
            }).done((res)=>{
                console.log(res)
                if(res.length == 1){
                    for(let i = 0; i < res.length; i++){
                        if(res[i].usuario === user && res[i].cpf === cpf){
                            $("#inputCPF i").remove();
                            $("#inputCPF").append('<i id="validacpf" class="far fa-check-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: green;"></i>');
                            $("#token").attr("type", "text");
                        }else{
                            $("#inputToken i").remove();
                            $("#inputCPF i").remove();
                            $("#inputUser").
                            append('<i class="far fa-times-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: red;"></i>');
                        }
                    }    
                }else if(res.length != 1 && cpf != ""){
                    $("#inputToken i").remove();
                    $("#inputCPF i").remove();
                    $("#inputCPF").
                    append('<i class="far fa-times-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: red;"></i>');
                    $("#token").attr("type", "hidden");
                }else{
                    $("#inputToken i").remove();
                    $("#inputCPF i").remove();
                    $("#token").attr("type", "hidden");
                }
            });
        });
        $("#token").blur(()=>{
            var user = $("#user").val();
            var cpf = $("#cpf").val();
            var token = $("#token").val();

            $.ajax({
                url: "http://localhost:8000/functions/validateUser/token.php",
                method: "POST",
                data: { user: user, cpf: cpf, token: token },
                datatype: "JSON",
            }).done((res)=>{
                console.log(res)
                if(res.length == 1){
                    for(let i = 0; i < res.length; i++){
                        if(res[i].usuario === user && res[i].cpf === cpf){
                            $("#inputToken i").remove();
                            $("#inputToken").append('<i id="validacpf" class="far fa-check-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: green;"></i>');
                            $("#btnresetpassword").attr('disabled', false);
                            $("#btnresetpassword").css('opacity','1');  
                        }else{
                            $("#inputToken i").remove();
                            $("#inputToken").
                            append('<i class="far fa-times-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: red;"></i>');
                            $("#btnresetpassword").attr('disabled', true);
                            $("#btnresetpassword").css('opacity','0.5'); 
                        }
                    }    
                }else if(res.length != 1 && cpf != "" && token != ""){
                    $("#inputToken i").remove();
                    $("#inputToken").
                    append('<i class="far fa-times-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: red;"></i>');
                    $("#btnresetpassword").attr('disabled', true);
                    $("#btnresetpassword").css('opacity','0.5'); 
                }else{
                    $("#inputToken i").remove();
                    $("#btnresetpassword").attr('disabled', true);
                    $("#btnresetpassword").css('opacity','0.5'); 
                }
            });
        });
    });
</script>

</html>