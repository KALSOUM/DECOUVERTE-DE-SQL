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
$requet=$sql->query("SELECT first_name,last_name,gender  FROM table1 WHERE gender='female'") or die(print_r($sql->errorInfo()));
?>
<div class="container">
<div class="row">
        <section class="col-sm-12">
            <div class="panel panel-primary">
                <table class="table table-striped table-condensed">
                    <div class="panel-heading">
                        <h3 class="panel-title">Afficher les femmes</h3>
                    </div>
                    <thead>
                    <tr>
                       
                        <th>First Name</th>
                        <th>Last Name</th>
            
                        <th>Genre</th>
                       
                       
                        <th> </th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($resultat=$requet->fetch())
                    {
                        ?>
                        <tr>
                           
                            <td><?php echo htmlspecialchars($resultat['first_name']);?></td>
                            <td><?php echo htmlspecialchars($resultat['last_name']);?></td>
                           
                            <td><?php echo htmlspecialchars($resultat['gender']);?></td>
                            
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