<?php
include('menu.php');
include('command.php');
$requet=$sql->query("SELECT country_code, COUNT(*) AS nbcountry FROM table1 GROUP BY  country_code ORDER BY country_code ASC") or die(print_r($sql->errorInfo()));
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
                        <h3 class="panel-title">repartion par Etats</h3>
                    </div>
                    <thead>
                    <tr>
                        <th>Country Code</th>
                        <th>nbcountry</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($resultat=$requet->fetch())
                    {
                        ?>
                        <tr>
                        <td><?php echo htmlspecialchars($resultat['country_code']);?></td>
                            <td><?php echo htmlspecialchars($resultat['nbcountry']);?></td>
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