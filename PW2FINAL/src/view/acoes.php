<?php 
session_start();
require_once "../config.php";

if (isset($_POST["midia-create"])) {

    $tipo = mysqli_real_escape_string($conn, trim($_POST["tipo"]));
    $nome = mysqli_real_escape_string($conn, trim($_POST["nome"]));
    $genero = mysqli_real_escape_string($conn, trim($_POST["genero"]));
    $anoLanc = mysqli_real_escape_string($conn, trim($_POST["anoLanc"]));
    $anoLanc = mysqli_real_escape_string($conn, trim($_POST["anoLanc"]));

    if ($tipo === "" || $nome === "" || $genero === "" || $anoLanc === "") {
        $_SESSION["mensagem"] = "Mídia não criada";
        header('location: MidiaView.php');
        exit;
    }

    $sql = "INSERT INTO Usuario (tipo, nome, genero, anoLanc, sinopse) 
            VALUES ('$tipo', '$nome', '$genero', '$anoLanc', sinopse)";

    mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0) {
        $_SESSION["mensagem"] = "Mídia criada com sucesso";
        header('location: MidiaView.php');
        exit;
    } else {
        $_SESSION["mensagem"] = "Mídia não foi criada";
        header('location: MidiaView.php');
        exit;
    }
}

if (isset($_POST["midia-update"])) {


    $tipo = mysqli_real_escape_string($conn, trim($_POST["tipo"]));
    $nome = mysqli_real_escape_string($conn, trim($_POST["nome"]));
    $genero = mysqli_real_escape_string($conn, trim($_POST["genero"]));
    $anoLanc = mysqli_real_escape_string($conn, trim($_POST["anoLanc"]));

    if ($tipo == "" || $nome == "" || $genero == "" || $anoLanc == "") {
        $_SESSION["mensagem"] = "Mídia não foi atualizada";
        header('location: MidiaView.php');
        exit;
    }

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION["mensagem"] = "Mídia atualizada com sucesso";
        header('location: MidiaView.php');
        exit;
    } else {
        $_SESSION["mensagem"] = "Mídia não foi atualizada";
        header('location: MidiaView.php');
        exit;
    }
}

if (isset($_POST['midia-delete'])) {
    $midia_nome = mysqli_real_escape_string( $conn, $_POST['midia-delete']);
    
    $sql = "DELETE FROM Midia WHERE tipo = '$midia_nome' ";

    mysqli_query( $conn, $sql);

    if (mysqli_affected_rows($conn)  > 0) {  
     $_SESSION["mensagem"] = "Mídia deletada com sucesso";
     header("location: MidiaView.php");
    } else {
        $_SESSION["mensagem"] = "Mídia não foi deletada";
     header("location: MidiaView.php");
    }
}

?>