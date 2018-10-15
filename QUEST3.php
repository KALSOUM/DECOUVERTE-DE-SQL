<?php
include("menu.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
include('menu.php');
include('command.php');
$requet=$sql->query("SELECT ip_address,country_code FROM table1 WHERE country_code LIKE ('N%')") or die(print_r($sql->errorInfo()));
?>
<div class="container">
<div class="row">
        <section class="col-sm-12">
            <div class="panel panel-primary">
                <table class="table table-striped table-condensed">
                    <div class="panel-heading">
                        <h3 class="panel-title">Afficher tousles etats qui commencent par N</h3>
                    </div>
                    <thead>
                    <tr>
                       
                        <th>Ip Addresse</th>
                       
                        <th>Country Code</th>
                       
                        <th> </th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($resultat=$requet->fetch())
                    {
                        ?>
                        <tr>
                           
    
                            <td><?php echo htmlspecialchars($resultat['ip_address']);?></td>
                            <td><?php echo htmlspecialchars($resultat['country_code']);?></td>
                           
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

</body>
</html>