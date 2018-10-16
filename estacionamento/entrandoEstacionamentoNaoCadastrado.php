<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="bootstrap.css"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="jquery.js" type="text/javascript"></script>
        <script src="jquery.min.js" type="text/javascript"></script>
        <script src="jquery.maskedinput.min.js" type="text/javascript"></script>     
    </head>
    <body>
        <?php include 'cabecalho.php';?>
        <div class="container">
            <div align="center">
                <h4>Cadastrando veículo e estacionando</h4>
            </div>
            <div class="row clearfix">
                <form role="form" action="adicionarOcupacao.php?entrada=nao_cadastrado" method="post">
                    <div class="form-group">
                        <label>PLACA: <?php echo $_GET['placa'];?><input name="placa" type="hidden" maxlength="8" value="<?php echo @$_GET['placa'];?>"></label>
                    </div>
                    <div class="form-group">
                        <label>Hora atual: <?php echo $_GET['hora'];?><input name="hora_entrada" type="hidden" value="<?php echo @$_GET['hora'];?>"></label>
                    </div>
                    <div class="form-group">
                        <label>Data atual: <?php echo $_GET['data'];?><input name="data_entrada" type="hidden" value="<?php echo @$_GET['data'];?>"></label>
                    </div>
                    <div class="form-group">
                        <label>Tipo: </label>
                        <select class="form-control" name="tipo">
                            <?php
                            include 'tipo.php';
                            $tipo = new Tipo();
                            $listaTipos=$tipo->listaTipos(); 
                            foreach ($listaTipos as $tipo) {
                                 echo "<option>".$tipo->getDescricao()."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cor</label><input name="cor" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Marca</label><input name="marca" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Modelo</label><input name="modelo" type="text" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-default">Confirmar estacionamento</button>
                </form>
            </div>
        </div>
    </body>
</html>