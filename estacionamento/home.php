<?php 
include 'cabecalho.php';
?>
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
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12" align="center">            
                     <a type="button" class="btn btn-default" href="templateParaCliente.php">Visualizar o estado do estacionamento</a>
            <form role="form" action="checkPlaca.php" method="post">
                <div class="form-group">
                    <label>
                        <h3>Digite a placa do veículo para pesquisa</h3>
                    </label><br>
                    <input id="placa" name="placa" type="text" placeholder="XXX-YYYY" maxlenght="8" size="20"/>
                </div>
                <button type="submit" class="btn btn-default">
                    Continuar
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>