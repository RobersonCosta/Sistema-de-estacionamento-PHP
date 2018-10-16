<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <script language="javascript">
            $('.dropdown-toggle').dropdown();
            $('.dropdown-menu').find('form').hover(function (e) {
                e.stopPropagation();
            });
        </script>
        <style>

            .dropdown:hover .dropdown-menu {
                display: block;
            }

            dropdown-menu {
                position: absolute;
                top: 90%!important;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="home.php">Home</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<strong class="caret"></strong></a>
                        <div class="dropdown-menu">
                            <form style="margin: 0px" action="cabecalho.php" method="post">
                                <fieldset style="padding:10px">
                                    <input name="usuario" class="form-group" style="margin-top: 8px" type="text" placeholder="Username" />
                                    <input name="senha" class="form-group" style="margin-top: 8px" type="password" placeholder="Passsword" />
                                    <input class="btn btn-default" name="#" type="submit" value="Log In" />
                                </fieldset>
                            </form>
                        </div>
                    </li>
                </ul>
                
            </div>
        </nav>       
    </body>
</html>

