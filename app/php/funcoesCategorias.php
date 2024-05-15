<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo listaCategoria($_SESSION['idUsuario']);
}

function listaCategoria($id)
{
    $lista = '';
    $tipoCategoria = '';

    include("conexao.php");

    $sql = "SELECT b.nomecategoria, a.especieMovimentacao, b.idUsuario FROM tipomovimentacao AS a INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao WHERE b.idusuario = $id OR b.idusuario IS NULL;";

    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {
            if ($coluna["idUsuario"] != "") {
                $tipoCategoria = "Personalizada";
                $tipoPermissao = "<i class='fa-solid fa-pen classeLapis iconTabela'></i> <i class='fa-solid fa-eye iconTabela'></i>";
            } else {
                $tipoCategoria = "Padrão";
                $tipoPermissao = "<i class='fa-solid fa-eye iconTabela'></i>";
            }
            $lista .= "<tr class='colunasCategorias' >"
                . "<td align='center' >" . $coluna["nomecategoria"] . "</td>"
                . "<td align='center' >" . $coluna["especieMovimentacao"] . "</td>"
                . "<td align='center' >" . $tipoCategoria . "</td>"
                . "<td align='center' data-toggle='modal' data-target='#crudCategoria'>" . $tipoPermissao . "</td>"
                . "</tr>";
        }
    }

    mysqli_close($conexao);

    return $lista;
}


function acaoCategoria($id)
{
    $retornaValor = '';

    include("conexao.php");
    $sql = "SELECT b.nomecategoria, a.especieMovimentacao, b.idUsuario FROM tipomovimentacao AS a INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao WHERE b.idusuario = $id OR b.idusuario IS NULL;";

    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {

            if ($coluna["idUsuario"] != "") {
                $tipoCategoria = "Personalizada";
            } else {
                $tipoCategoria = "Padrão";
            }

            if ($coluna["idUsuario"] != "") {

                $retornaValor .= "<span class='tituloInput'><strong>Nome Categoria: </strong></span>" . $coluna["nomecategoria"]
                    . "<span class='tituloInput'><strong>Especie Movimentação: </strong></span>" . $coluna["especieMovimentacao"]
                    . "<span class='tituloInput'><strong>Tipo</strong></span>" . $tipoCategoria;
            } else {
            }
        }
    }

    mysqli_close($conexao);

    return $retornaValor;
}







function listaSubCategoria($id)
{
    $lista = '';
    $tipoCategoria = '';

    include("conexao.php");

    $sql = "SELECT c.nomesubcategoria ,b.nomecategoria, a.especieMovimentacao, c.idUsuario FROM tipomovimentacao AS a  INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao INNER JOIN subcategoria as c ON B.idcategoria = c.idcategoria  WHERE b.idusuario = $id OR b.idusuario IS NULL;";

    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {
            if ($coluna["idUsuario"] != "") {
                $tipoCategoria = "Personalizada";
                $tipoPermissao = "<i class='fa-solid fa-pen classeLapis iconTabela'></i> <i class='fa-solid fa-eye iconTabela'></i>";
            } else {
                $tipoCategoria = "Padrão";
                $tipoPermissao = "<i class='fa-solid fa-eye iconTabela'></i>";
            }
            $lista .= "<tr class='colunasCategorias'>"
                . "<td align='center'>" . $coluna["nomesubcategoria"] . "</td>"
                . "<td align='center'>" . $coluna["nomecategoria"] . "</td>"
                . "<td align='center'>" . $coluna["especieMovimentacao"] . "</td>"
                . "<td align='center'>" . $tipoCategoria . "</td>"
                . "<td align='center' data-target='#crudCategoria'>" . $tipoPermissao . "</td>"
                . "</tr>";
        }
    }

    mysqli_close($conexao);

    return $lista;
}
