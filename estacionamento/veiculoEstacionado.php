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
                <h4>Veículo estacionado com sucesso</h4>
            </div>
            <div class="row clearfix">  
            		<div class="form-group">
                        <label>PLACA: <?php echo $_GET['placa'];?></label>
                    </div>
                    <div class="form-group">
                        <label>Hora atual: <?php echo $_GET['hora'];?></label>
                    </div>
                    <div class="form-group">
                        <label>Data atual: <?php echo $_GET['data'];?></label>
                    </div>
                    <div class="form-group">
                        <label>Vaga ANDAR: <?php echo $_GET['vaga'];?> / NÚMERO: <?php echo $_GET['vagaNum'];?></label>
                    </div>                
                    <a href="home.php" type="button" class="btn btn-default">Retornar à pagina inicial</a>
            </div>
        </div>
    </body>
</html>