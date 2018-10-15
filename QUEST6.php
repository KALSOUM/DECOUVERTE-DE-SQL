<?php
include('menu.php');
include('command.php');
$requet=$sql->query("SELECT gender, COUNT(*) AS nbgenre FROM table1 GROUP BY  gender ORDER BY gender ASC") or die(print_r($sql->errorInfo()));
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

<div class="container">
<div class="row">
        <section class="col-sm-12">
            <div class="panel panel-primary">
                <table class="table table-striped table-condensed">
                    <div class="panel-heading">
                        <h3 class="panel-title">Afficher le nombre d'hommes et de femmes</h3>
                    </div>
                    <thead>
                    <tr>
                        
                        
                        <th>gender</th>
                        <th>nbrgenre</th>
                        
                        
                        <th> </th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($resultat=$requet->fetch())
                    {
                        ?>
                        <tr>
                           
                           
                            <td><?php echo htmlspecialchars($resultat['gender']);?></td>
                            
                            <td><?php echo htmlspecialchars($resultat['nbgenre']);?></td>
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