<?php
session_start();
include('php/funcoes.php');
include('partes/css.php'); //importes de CSS

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nordic Finance</title>

    <?php
    include('partes/css.php'); //importes de CSS
    ?>


    <style type="text/css" href="index.css">
        <?php include('dist/css/styles.css'); ?>
    </style>

    <style type="text/css" href="index.css">
        <?php include('php/funcoesCategorias.php');
        ?>
    </style>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="home.php" class="brand-link">
                <img src="dist/img/logo128x128.png" alt="Nordic System" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Nordic System</span>
            </a>
            <?php
            include('partes/sidebar.php'); //importes de CSS
            ?>

        </aside>

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills card-header-pills">
                                        <li class="nav-item">
                                            <button id="categoriaBtn" type="button" class="botaoCategorias btn active" onclick="mostrarTela('tela1')">Categoria</button>
                                        </li>
                                        <li class="nav-item">
                                            <button id="subcategoriaBtn" type="button" class="botaoCategorias btn" onclick="mostrarTela('tela2')">SubCategoria</button>
                                        </li>
                                    </ul>
                                </div>

                                <script>
                                    var botaoCate = document.getElementById('categoriaBtn');
                                    var botaoSub = document.getElementById('subcategoriaBtn');

                                    botaoCate.addEventListener('click', function() {
                                        this.classList.add('active');
                                        botaoSub.classList.remove('active');
                                    });

                                    botaoSub.addEventListener('click', function() {
                                        this.classList.add('active');
                                        botaoCate.classList.remove('active');
                                    });
                                </script>

                                <div id="tela1">
                                    <div class="card-body tamanhoBodyConsulta">

                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">


                                                            <div class="input-group-prepend">
                                                                <span class="tituloInput"><strong>Consulta:</strong></span>
                                                                <input type="text" id="inputValor1" oninput="filterTable('inputValor1', 'tabela1')" class="form-control inputCategorias">

                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                                <div class="col-8">
                                                    <div class="container-cat-botao">
                                                        <button type="button" class="btn btn-novo-cat" data-toggle="modal" data-target="#novoCategoria">Novo</button>
                                                    </div>

                                                    <div class="modal fade" id="novoCategoria">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Novo</h4>
                                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="card-body">

                                                                            <form action="php/funcoesCategorias.php">

                                                                                <div class="input-group-prepend input-group-prependCategoria">
                                                                                    <span class="tituloInputNovoCate"><strong>Nome Categoria:</strong></span>
                                                                                    <input type="text" name="nNomeCategoria" class="form-control form-control-categoria" maxlength="35" required>
                                                                                </div>

                                                                                <hr>

                                                                                <div class="input-group-prepend input-group-prependCategoria">
                                                                                    <span class="tituloInputNovoCate"><strong>Espécie:</strong></span>
                                                                                    <select class="input-group-text caixaSelecaoCate" name="nEspecie" required>
                                                                                        <option value="" disabled selected>Selecione</option>
                                                                                        <option value="1">Positivo</option>
                                                                                        <option value="2">Negativo</option>
                                                                                        <option value="3">Nulo</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <button type="submit" class="btn btn-salvar-cat" data-taggle="modal">Salvar</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                    </div>

                                                    <table id="tabela1" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr class="colunasCategorias">
                                                                <th>Categorias</th>
                                                                <th>Espécie</th>
                                                                <th>Tipo</th>
                                                                <th>Permissão</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php echo listaCategoria($_SESSION['idUsuario'], 0, ''); ?>
                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>

                                        </form>
                                        <div class="modal fade" id="crudCategoria">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edição</h4>
                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="card-body" id="dadosCategoria">

                                                                <!-- chamada em ajaxx -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div id="tela2" class="hidden">
                                    <div class="card-body tamanhoBodyConsulta">
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="tituloInput"><strong>Consulta:</strong></span>
                                                                <input type="text" id="inputValor2" oninput="filterTable('inputValor2', 'tabela2')" class="form-control inputCategorias">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="container-cat-botao">
                                                        <button type="button" class="btn btn-novo-cat" data-toggle="modal" data-target="#novoSubCategoria">Novo</button>
                                                    </div>
                                                    <div class="modal fade" id="novoSubCategoria">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Novo</h4>
                                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="card-body">
                                                                            <form action="php/funcoesCategorias.php">
                                                                                <div class="input-group-prepend input-group-prependCategoria">
                                                                                    <span class="tituloInputNovoCate"><strong>Nome Sub-categoria:</strong></span>
                                                                                    <input type="text" name="nNomeSubCategoria" class="form-control form-control-categoria" maxlength="35" required>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="input-group-prepend input-group-prependCategoria">
                                                                                    <span class="tituloInputNovoCate"><strong>Categoria:</strong></span>
                                                                                    <select class="input-group-text caixaSelecaoCate" name="nCategoriasNaSubcategoria" required>
                                                                                        <option value="" disabled selected>Selecione</option>
                                                                                        <?php echo SolicitaCategorias($_SESSION['idUsuario']); ?>

                                                                                    </select>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit" class="btn btn-salvar-cat" data-taggle="modal">Salvar</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                    </div>
                                                    <table id="tabela2" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr class="colunasCategorias">
                                                                <th>Sub-Categoria</th>
                                                                <th>Categorias</th>
                                                                <th>Espécie</th>
                                                                <th>Tipo</th>
                                                                <th>Permissão</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php echo listaSubCategoria($_SESSION['idUsuario'], 0, ''); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="modal fade" id="crudSubCategoria">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edição</h4>
                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="card-body" id="dadosSubCategoria">

                                                                <!-- chamada em ajaxx -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php
    include('partes/js.php'); 
    ?>

    <script>
        $(document).ready(function() {
            $("button[id^='btnsub_']").on('click', function() {
                let idSubCategoria = $(this).attr('id').split('_')[1];

                if (idSubCategoria == "") {
                    
                } else {
                    $.getJSON('php/categoriaAjax.php?idEditarSubCategoria=' + idSubCategoria,
                        function(results) {
                            var retornoSubCategoria = '';
                            var tipoEspecie = '';
                            var retornoAlteraCategorias = '';
                            var selectedCategoriaId = null;

                            if (results.subcategorias.length > 0) {
                                selectedCategoriaId = results.subcategorias[0].IDCATEGORIA; 
                            }

                            if (results.categorias.length > 0) {
                                $.each(results.categorias, function(i, obj) {
                                    var selected = (obj.IDCATEGORIA == selectedCategoriaId) ? 'selected' : '';
                                    retornoAlteraCategorias += '<option value="' + obj.IDCATEGORIA + '" ' + selected + '>' + obj.NOMECATEGORIA + '</option>';
                                });
                            } else {
                                console.log("Sem retorno de resultados para categorias");
                            }

                            if (results.subcategorias.length > 0) {
                                $.each(results.subcategorias, function(i, obj) {
                                    if (obj.IDTIPOMOVIMENTACAO == 1) {
                                        tipoEspecie = "Positivo";
                                    } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                        tipoEspecie = "Negativo";
                                    } else {
                                        tipoEspecie = "Neutro";
                                    }

                                    retornoSubCategoria = '<form method="POST" action="php/AlteraSubCategoria.php">' +
                                        '<div class="containerAlteracao">' +
                                        '<input type="hidden" name="nAlteraIdSubCategoria" value="' + obj.IDSUBCATEGORIA + '">' +
                                        '</div>' +
                                        '<div class="containerAlteracao">' +
                                        '<span class="tituloAlteracao"><strong>Nome Sub-Categoria:</strong></span>' +
                                        '<input type="text" id="inputAlteracaoNomeSubCategoria" class="form-control inputAlteracao" name="nNovoNomeSubCategoria" value="' + obj.NOMESUBCATEGORIA + '">' +
                                        '</div>' +
                                        '<div class="containerAlteracao">' +
                                        '<span class="tituloAlteracao"><strong>Categoria vinculada:</strong></span>' +
                                        '<select class="input-group-text caixaSelecaoCate" name="nNovoNomeCategoriaVinculada" id="SelectAlteraCategorias">' +
                                        retornoAlteraCategorias + 
                                        '</select>' +
                                        '</div>' +
                                        '<div class="containerAlteracao">' +
                                        '<span class="tituloAlteracao"><strong>Espécie:</strong></span>' +
                                        '<span class="tituloAlteracao">' + tipoEspecie + '</span>' +
                                        '</div>' +
                                        '<div class="modal-footer modal-footer-edit">' +
                                        '<button type="submit" class="btn btn-edit-perfil">Salvar</button>' +
                                        '</div>' +
                                        '</form>';
                                });
                            } else {
                                console.log("Sem retorno de resultados para subcategorias");
                            }

                            $('#dadosSubCategoria').html(retornoSubCategoria).show();
                        });
                }
            });
        });



        $(document).ready(function() {
            $("button[id^='btn_']").on('click', function() {
                let idCategoria = $(this).attr('id').split('_')[1];

                if (idCategoria == "") {

                } else {

                    $.getJSON('php/categoriaAjax.php?idEditarCategoria=' + idCategoria,
                        function(results) {

                            var retornoCategoria = '';
                            var tipoEspecie = '';

                            if (results.length > 0) {

                                $.each(results, function(i, obj) {

                                    if (obj.IDTIPOMOVIMENTACAO == 1) {
                                        tipoEspecie = "Positivo"
                                    } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                        tipoEspecie = "Negativo"
                                    } else {
                                        tipoEspecie = "Neutro"
                                    }

                                    retornoCategoria = '<form method="POST" action="php/AlteraCategoria.php">' +
                                        '<div class="containerAlteracao">' +
                                        '<input type="hidden" name="nAlteraIdCategoria" value="' + obj.IDCATEGORIA + '">' +
                                        '</div>' +
                                        '<div class="containerAlteracao">' +
                                        '<span class="tituloAlteracao"><strong>Nome Categoria:</strong></span>' +
                                        '<input type="text" id="inputAlteracaoNomeCategoria" class="form-control inputAlteracao" name = "nNovoNomeCategoria" value="' + obj.NOMECATEGORIA + '">' +
                                        '</div>' +
                                        '<div class="containerAlteracao">' +
                                        '<span class="tituloAlteracao"><strong>Espécie:</strong></span>' +
                                        '<span class="tituloAlteracao">' + tipoEspecie + '</span>' +
                                        '</div>' +
                                        '<div class="modal-footer modal-footer-edit">' +
                                        '<button type="submit" class="btn btn-edit-perfil">Salvar</button>' +
                                        '</div>' +
                                        '</form>';

                                })

                            } else {
                                console.log("Sem retorno de resultado");
                            }

                            $('#dadosCategoria').html(retornoCategoria).show();

                        });
                }
            });
        });



        $(function() {
            $('#tabela1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/pt-BR.json"
                }
            });

            $('#tabela2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/pt-BR.json"
                }
            });

        });
    </script>

    <script src="dist/js/script.js"></script>

</body>

</html>