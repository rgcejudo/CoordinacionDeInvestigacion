<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="row">
            <p>
                El Observatorio de Investigación te da la bienvenida, tus accesos
                al sistema son los siguientes:
            </p>
            <p>
                <span style="font-weight: bold;">Usuario: </span> 
                <?php echo $username; ?>                
            </p>
            <p>
                <span style="font-weight: bold;">Contraseña: </span> 
                <?php echo $password; ?>
            </p>
            <p>
                <span style="font-weight: bold;">Accede al sitio desde:</span>
                <?php echo FULL_BASE_URL; ?>
            </p>
        </div>
    </body>
</html>
