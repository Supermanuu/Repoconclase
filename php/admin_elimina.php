<?php
    
    function borrarDirectorio($carpeta) {

        foreach(glob($carpeta . "*") as $archivos_carpeta) {
 
            if (is_dir($archivos_carpeta)) {
                eliminarDir($archivos_carpeta);
            }
            else {
                unlink($archivos_carpeta);
            }
        }
 
        rmdir($carpeta);

    }

    session_start();

    if (!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
       header('Location: ../index.php');
    }

    if(!isset($_COOKIE[$_SESSION["type"]])) {
      session_destroy();
      header('Location: ../sesion_expirada.php');
    }
    else
      setcookie($_SESSION["type"], $_SESSION["id_user"], time() + 60*5, "/");

    if (isset($_SESSION["login"]) && $_SESSION["login"] == true){

        if (!isset($_REQUEST["user"]))
            header('Location: ../administrador_gestor.php');
        else
            $user = $_REQUEST["user"];

        $mysqli = new mysqli ('localhost', 'profesores','profesConEstilo','profesoresConClase');
        if (!mysqli_connect_errno()) {

            $query = "SELECT * FROM usuarios where user = '$user'";
            $resultado = $mysqli->query($query);
            $usuario = $resultado->fetch_assoc();
            $id = $usuario["idUser"];

            $query = "SELECT * FROM folders where id = '$id'";
            $resultado = $mysqli->query($query);
            $usuario = $resultado->fetch_assoc();
            $directorio = '/var/www/html'.$usuario["folder"];
            borrarDirectorio($directorio);

            $query = "DELETE FROM usuarios WHERE idUser = '$id'";
            $resultado = $mysqli->query($query);
            $mysqli->close();
            header('Location: ../administrador.php');

        }
    }
    else
        header('Location: ../index.php');

?>
