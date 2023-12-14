<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión • DevLabs PassKeys</title>

    <script>

        const Styles = document.createElement('link');
        Styles.href = "../Vendor/com.request.config.css?v"+Math.random();
        Styles.type = "text/css";
        Styles.rel = "stylesheet";
        document.head.appendChild(Styles)

    </script>

</head>


<body>
    
    <div class="QR"></div>
    <p>Abre este QR para iniciar sesion</p>


    <?php

        if(isset($_POST["UserKey"])){

            $Key = $_POST["UserKey"];
            

        }else{

            echo "<script> localStorage.setItem('TaskFlowLoginEvent', 2);  window.location.href = '../' </script>";


        }

            $ServerName = "localhost";
            $UserName = "root";
            $Password = "";
            $DataBaseName = "TaskFlow";

            $Connection = new mysqli($ServerName, $UserName, $Password, $DataBaseName);

            $DoQuery = "SELECT UserKey FROM accounts WHERE UserName = '$Key'";
            $QueryResults = $Connection -> query($DoQuery);

            if($QueryResults -> num_rows > 0){

                $GetCurrentSessionToken = $QueryResults -> fetch_assoc()["UserKey"];

                echo "<script> const NewLogUserKey = '$GetCurrentSessionToken';  </script>";

            }else{

                echo "<script> localStorage.setItem('TaskFlowLoginEvent', 0);  window.location.href = '../' </script>";


            }

    ?>


</body>

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script defer src="../Vendor/com.request.config.js"></script>


</html>