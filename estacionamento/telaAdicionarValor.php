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
            <form role="form" action="adicionarValor.php" method="post">
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
                        <label>Per noite:</label><br>
                        <input name="per_noite" value="TRUE" type="radio"  /> Sim
                        <input name="per_noite" value="FALSE" type="radio"  /> Não
                    </div>
                    <div class="form-group">
                        <label>Diaria:</label><br>
                        <input name="diaria" value="TRUE" type="radio" /> Sim
                        <input name="diaria" value="FALSE" type="radio"  /> Não
                    </div> 
                    <label>Valor:</label>                   
                    <input id="valor" name="valor" type="text" class="form-control" />
                    <br>
                    <button type="submit" class="btn btn-default">Adicionar valor</button>                    
            </form>
        </div>
    </body>
</html>