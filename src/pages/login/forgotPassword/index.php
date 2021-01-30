<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="../../../../vendorTemplate/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template-->
    <link href="../../../../CssTemplate/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .checkbox {
            font: 300 1em 'Open Sans', sans-serif;
            height: 5px;
            width: 5px;
        }
        
        .checkbox label {
            cursor: pointer;
            outline: none;
            -webkit-user-select: none;
        }
        
        .checkbox input[type="checkbox"] + label::before {
            content: "\f404";
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #e74c3c;
            font-family: "Ionicons";
            color: #fff;
            display: inline-block;
            line-height: 20px;
            text-align: center;
            margin-right: .5em;
        }
        
        .checkbox input[type="checkbox"]:checked + label::before {
            content: "\f3fd";
            background-color: #2ecc71;
        }
        
        .checkbox input[type="checkbox"] {
            display: none;
        }
    </style>

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
                                    <form class="user">
                                        <div class="form-group">
                                            <div class="input-container">
                                                <div class="row" id="inputUser">
                                                    <input type="text" class="form-control form-control-user" placeholder="Informe seu Username ex: Alex.Sandro" id="user" name="user">
                                                </div>       
                                            </div>
                                            <br>    
                                            <div class="input-container">
                                                <div class="row" id="inputDate">
                                                    <input type="hidden" class="form-control form-control-user" id="datanasc" name="datanasc">
                                                </div>       
                                            </div>
                                            <br>    
                                            <div class="input-container">
                                                <div class="row" id="inputCPF">
                                                    <input type="hidden" class="form-control form-control-user" placeholder="Informe seu CPF" id="cpf" name="cpf">
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

    <!-- Bootstrap core JavaScript-->
    <script src="../../../../vendorTemplate/jquery/jquery.min.js"></script>
    <script src="../../../../vendorTemplate/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../../vendorTemplate/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/../../../jsTemplate/sb-admin-2.min.js"></script>
    <!--Ajax-->
    <script src="../../../vendor/jquery/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

</body>

<script type="text/javascript">
    $(document).ready(() => {
        
        $("#btnresetpassword").attr('disabled', true);
        $("#btnresetpassword").css('opacity','0.5');  

        $("#user").blur(()=>{
            var user = $("#user").val();

            $.ajax({
                url: "http://localhost:8000/src/pages/login/verifica_user.php",
                method: "POST",
                data: { user: user },
                datatype: "JSON",
            }).done((res)=>{
                if(res.length == 1){
                    for(let i = 0; i < res.length; i++){
                        if(res[i].usuario === user){
                            $("#inputUser i").remove();
                            $("#inputUser").append('<i id="validacpf" class="far fa-check-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: green;"></i>');
                            $("#datanasc").attr("type", "date")
                        }else{
                            $("#inputUser i").remove();
                            $("#inputUser").
                            append('<i class="far fa-times-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: red;"></i>');
                        }
                    }    
                }else if(res.length != 1 && user != ""){
                    $("#inputUser i").remove();
                    $("#inputUser").
                    append('<i class="far fa-times-circle" style="font-size: 25px; margin-top: 3%; margin-left: -10%; color: red;"></i>');
                    $("#datanasc").attr("type", "hidden");
                }else{
                    $("#inputUser i").remove();
                    $("#datanasc").attr("type", "hidden");
                }
            })
        })
        
    });

</script>

</html>