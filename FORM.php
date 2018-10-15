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
    $requet=$sql->prepare('INSERT INTO table2(last_name,fisrt_name,address_code) VALUES (:last_name,:fisrt_name,:address_code)')  or die(print_r($sql->errorInfo()));
   $requet->execute(array(
    'last_name'=>$_POST['last_name'],
    'fisrt_name'=>$_POST['fisrt_name'],
    'address_code'=>$_POST['address_code'],
   ));
}
$aff=$sql->query("select * from table2") or die(print_r($sql->errorInfo()));
?>
<div class="container">
<form action="FORM.php" method="post">
    <div class="form-group">
    <div class="form-group">
                <div class="col-xs-4" >
                  <label for="name"  class="control-label">Nom</label>
                   <input  type="text"  placeholder="Entrez votre Prenom" name="last_name" class="form-control" required="required"  >
                   <span id="errorLastname"></span><br>
                </div>
             </div> 
             <div class="form-group">
                <div class="col-xs-4" >
                  <label for="name"  class="control-label">Prenom</label>
                   <input  type="text"  placeholder="Entrez votre Prenom" name="fisrt_name" class="form-control" required="required"  >
                   <span id="errorfirst_name"></span><br>
                </div>
             </div> 
             <div class="form-group">
              <div class="col-xs-4">
                   <label for="email"  class="control-label">address_code</label>
                   <input type="email"  placeholder="Entrez votre adress email" name="address_code" required="required" class="form-control"><br>
                   <span id="errorEmail"></span><br>
              </div>
            </div>
            <div class="form-group">
             <div class="col-xs-6" >
                    <button class="btn btn-success">Envoyer</button>
             </div>
            </div>
            <div class="form-group">
            <div class="col-xs-6 text-right" >
                <button class="btn btn-danger ">Supprimer</button> 
            </div>
            </div>

</div>
</div>
</form>
<br>
<br>
<div class="row">
        <section class="col-sm-12">
            <div class="panel panel-primary">
                <table class="table table-striped table-condensed">
                    <div class="panel-heading">
                        <h3 class="panel-title">Afficher tous ceux dont  le nom est Palmer</h3>
                    </div>
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>last Name</th>
                        <th>first Name</th>
                        <th>address</th>
                        

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($resultat=$aff->fetch())
                    {
                        ?>
                        <tr>
                           <td><?php echo htmlspecialchars($resultat['id']);?></td>
                            <td><?php echo htmlspecialchars($resultat['last_name']);?></td>
                            <td><?php echo htmlspecialchars($resultat['fisrt_name']);?></td>
                            <td><?php echo htmlspecialchars($resultat['address_code']);?></td>
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