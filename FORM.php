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
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_POST['last_name'])!='' and isset($_POST['fisrt_name'])!='' and isset($_POST['address_code'])!='')
{
    $requet=$sql->prepare('INSERT INTO table2 (last_name,fisrt_name,address_code) VALUES (:last_name,:fisrt_name,:address_code)')  or die(print_r($sql->errorInfo()));
   $requet->execute(array(
    'last_name'=>$_POST['last_name'],
    'fisrt_name'=>$_POST['fisrt_name'],
    'address_code'=>$_POST['address_code'],
   ));
}
$aff=$sql->query("select * from table2") or die(print_r($sql->errorInfo()));
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body
        {
            background-color: #DDD;
            padding-top: 10px;
        }
        [class*="col-"]
        {
            margin-bottom: 20px;
        }
        img
        {
            width: 100%;
        }
        .well
        {
            background-color: #CCC;
            padding: 20px;
        }
        a:active, a:focus
        {
            outline: none;
        }
        [class*="nav navbar-nav"]
        {
            margin-left: 35px;
        }
        [class*="panel panel-primary"]
        {
            margin-top: 5%;
        }
    </style>
</head>
<body>
<?php include 'menu.php';?>
<!-- Formulaire d'ajout -->
<form class="form-horizontal" action="FORM.php" method="post">
    <fieldset>
        <h2 class="titre" style="position: center">Ajout D'etudiant ACS</h2>
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <input type="text" id="fisrt_name" name="fisrt_name" placeholder="fisrt_name" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <input type="text" id="last_name" name="last_name" placeholder="last_name" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <input type="text" id="address_code" name="address_code" placeholder="address_code" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4 control-label">
                <input type="submit" value="Ajouter un Acs" class="btn btn-info btn-block">
            </div>
        </div>
    </fieldset>
</form>
<!-- Affichage des element de la Table -->
<div class="row">
    <section class="col-sm-12">
        <div class="panel panel-primary">
            <table class="table table-striped table-condensed">
                <div class="panel-heading">
                    <h3 class="panel-title">Affichage de tous les gens dont le nom est Palmer</h3>
                </div>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>last_name</th>
                    <th>fisrst_name</th>
                    <th>address_code</th>
                    

                </tr>
                </thead>
                <tbody>
                <?php
                while($resultat=$aff->fetch())
                {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($donnees['id']);?></td>
                        <td><?php echo htmlspecialchars($donnees['last_name']);?></td>
                        <td><?php echo htmlspecialchars($donnees['first_name']);?></td>
                        <td><?php echo htmlspecialchars($donnees['address_code']);?></td>
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
<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>

