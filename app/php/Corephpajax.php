<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('funcoes.php');
require_once('conexaoPDO.php');

$id                     = $_SESSION['idUsuario'];
$idTipoMov = isset($_GET['tipoMov']) ? $_GET['tipoMov'] : '';
$idcategoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

if (!empty($idTipoMov)) {
    echo getCategoria($idTipoMov, $id);

   
}

function getCategoria($TipoMov, $id)
{
    $pdo = Conectar();

    $sql = "SELECT idCategoria, nomeCategoria "
        . "FROM categoria "
        . "WHERE idTipoMovimentacao = $TipoMov AND (idUsuario = $id OR idUsuario IS NULL) ORDER BY nomeCategoria";

    $stm = $pdo->prepare($sql);
    $stm->execute();

    sleep(1);

    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}

if (!empty($idcategoria)) {
    echo getSubCategoria($idcategoria, $id);
}

function getSubCategoria($idcategoria, $id)
{
    $pdo = Conectar();


    $sql = "SELECT idSubCategoria, nomeSubCategoria "
        . "FROM subcategoria "
        . "WHERE idCategoria = $idcategoria AND (idUsuario = $id OR idUsuario IS NULL) ORDER BY nomesubCategoria";

    $stm1 = $pdo->prepare($sql);
    $stm1->execute();

    sleep(1);

    echo json_encode($stm1->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}
