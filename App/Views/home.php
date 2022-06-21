<?php

if (isset($this->dados['produtos'])) {
    $produtos = $this->dados['produtos'];
}

if (isset($this->dados['cores'])) {
    $cores = $this->dados['cores'];
}

if (isset($this->dados['produtoEdit'])) {
    $produtoEdit = $this->dados['produtoEdit'];
}



?>

<DOCTYPE html>
    <html>
    <meta charset="UTF-8" />

    <head>
        <link rel="stylesheet" type="text/css" href="stily.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo URL . 'script.js'?>"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </head>

    <body>
        <div class="container">

            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-2">

                            <div class="col-md-12 align-middle">
                                <h3><i class="fas fa-file-alt"></i>&nbsp; Cadastar Produto </h3>
                            </div>
                        </div>
                        <h3 class="text-center"></h3>
                        <form class="form-horizontal r-separator" method="post" action="<?php if (isset($produtoEdit)) { echo URL . 'Home/onUpdate' ;}else{echo URL . 'Home/onInsert';} ?>">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-10 col-lg-5">
                                        <div class="form-group row p-t-15">
                                            <label for="input2" class="col-sm-2 text-left control-label col-form-label">Produto:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="produto" name="produto" value="<?php if (isset($produtoEdit)) {
                                                                                                                                echo $produtoEdit['nome'];
                                                                                                                            } ?>" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-5">
                                        <div class="form-group row p-t-15">
                                            <label for="input2" class="col-sm-2 text-left control-label col-form-label">Cor:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="cor" name="cor" value="<?php if (isset($produtoEdit)) {
                                                                                                                        echo $produtoEdit['cor'];
                                                                                                                    } ?>" <?php if (isset($produtoEdit)) {
                                                                                                                                echo 'disabled';
                                                                                                                            } ?> placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-10 col-lg-5">
                                        <div class="form-group row p-t-15">
                                            <label for="input3" class="col-sm-2 text-left control-label col-form-label">Preço:</label>
                                            <div class="col-sm-8">
                                                <input type="number" step=".01" class="form-control" id="precoP" name="precoP" value="<?php if (isset($produtoEdit)) {
                                                                                                                                        echo $produtoEdit['preco'];
                                                                                                                                    } ?>" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group row p-t-15">
                                            <div class="col-sm-10 col-lg-12">
                                                <input type="hidden" class="form-control" id="idP" name="idP" value="<?php if (isset($produtoEdit)) {
                                                                                                                            echo $produtoEdit['idProduto'];
                                                                                                                        } ?>" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12">
                                        <button type="submit" class="btn btn-outline-success col-sm-12">INSERIR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <label>Nome</label>
                        <input type="text" id="myInput" onkeyup="Produto()" placeholder="Produto..">

                        <label>Cor</label>
                        <select id="sclCor" onchange="myFunction()">
                            <option value="">Selecione</option>
                            <?php
                            foreach ($cores as $cor) {
                            ?>
                                <option value="<?php echo $cor['cor'] ?>"><?php echo $cor['cor'] ?></option> <!--  Lista as cores que estão no banco -->
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="table-reponsive">
                        <table id="tbProdutos" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Cor</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Preço com desconto %</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sum = 0;
                                $sumDesc = 0;
                                foreach ($produtos as $produto) {
                                
                                    switch ($produto['cor']) {
                                        case 'AZUL':
                                            $preçoD = $produto['preco'] * 0.8;
                                            break;

                                        case 'VERMELHO':
                                            if($produto['preco'] > 50){
                                                $preçoD = $produto['preco'] * 0.75;
                                            }else{
                                                $preçoD = $produto['preco'] * 0.8;
                                            }
                                            break;


                                        case 'AMARELO':
                                            $preçoD = $produto['preco'] * 0.9;
                                            break;

                                        default:
                                            $preçoD = $produto['preco'];
                                            break;
                                    }

                                $sum += $produto['preco'];
                                $sumDesc +=  $preçoD;
                                ?>
                                    <tr>
                                        <td><?php echo $produto['idProduto']; ?></td>
                                        <td><?php echo $produto['nome']; ?></td>
                                        <td><?php echo $produto['cor']; ?></td>
                                        <td>R$<?php echo  number_format($produto['preco'],2,",","."); ?></td>
                                        <td>R$<?php echo number_format($preçoD,2,",","."); ?></td>
                                        <td>
                                            <a href="<?php echo URL . "Home/onEdit?id=" . $produto['idProduto']; ?>" type="button" class="btn btn-outline-primary me-2">EDITAR</a>
                                            <a href="<?php echo URL . "Home/onDelete?id=" . $produto['idProduto']; ?>" type="button" class="btn btn-outline-danger me-2">EXCLUIR</a>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>R$<?php echo  number_format($sum,2,",","."); ?></td>
                                    <td>R$<?php echo number_format($sumDesc,2,",","."); ?></td>
                                    <td></td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>

    </html>