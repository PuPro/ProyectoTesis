<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="<?= base_url() ?>../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>../css/style.css" rel="stylesheet">
        <link href="<?= base_url() ?>../css/container.css" rel="stylesheet">
        <script src="<?= base_url() ?>../Jquery/jquery-1.11.3.min.js"></script>
        <script src="<?= base_url() ?>../Bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>../js/funcion.js"></script>
        <script type="text/javascript">
            //Captura lo que la direccion que contiene base_url
            var base_url = '<?= base_url(); ?>';
        </script>
        <title>Document</title>
    </head>
    <body>
        <div id="pagina">
            <div id="encabezado">
                <div id="loguin">
                </div>
                <div id="menu" hidden="true">
                    <div class="bs-example">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#">INICIO</a></li>
                            <li><a href=trabajador.php >TRABAJADOR</a></li>
                            <li><a href="cliente.php">CLIENTE</a></li>
                            <li><a href="factura.php">FACTURA</a></li>
                            <li><a href="listaMateriales.php">LISTA MATERIALES</a></li>
                            <li><a href="flujoCaja.php">FLUJO DE CAJA</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">PER<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="perIngreso.php">PER INGRESOS</a></li>
                                    <li><a href="perEgreso.php">PER EGRESOS</a></li>
                                </ul>
                            </li>
                            <li><a href="compracion.php">COMPARACION</a></li>
                            <!--        cerrar sesion-->
                            <li class="dropdown pull-right">
                                <a href="index.php"  class="dropdown-toggle">CERRAR SESION</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div id="contenido">


                    <div id="trabajador">
                        
                    </div>
