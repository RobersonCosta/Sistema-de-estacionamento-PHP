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
                <h4>Veículo já cadastrado e entrando no estacionamento</h4>
            </div>
            <div class="row clearfix">
                <form role="form" action="adicionarOcupacao.php?entrada=ja_cadastrado" method="post">
                    <div class="form-group">
                        <label>PLACA: <?php echo $_GET['placa'];?><input name="placa" type="hidden" maxlength="8" value="<?php echo $_GET['placa'];?>"></label>
                    </div>
                    <div class="form-group">
                        <label>Hora atual: <?php echo $_GET['hora'];?><input name="hora_entrada" type="hidden" value="<?php echo $_GET['hora'];?>"></label>
                    </div>
                    <div class="form-group">
                        <label>Data atual: <?php echo $_GET['data'];?><input name="data_entrada" type="hidden" value="<?php echo $_GET['data'];?>"></label>
                    </div>
                    <button type="submit" class="btn btn-default">Confirmar estacionamento</button>
                </form>
            </div>
        </div>
    </body>
</html>