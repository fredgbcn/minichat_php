
<!DOCTYPE html>
<html lang="en">
<head>
<link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="minichat_post.php" method="POST">
        <label>Votre Pseudo : <input type="text" name="pseudo"></label>
        <label>Votre Message : <input type="text" name="message"></label>
        <input type="submit" name="submit" class="button" value="POSTER MON MESSAGE">
    </form>
    <?php
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
        catch (PDOException $e){
                die('Erreur : ' . $e->getMessage());
            }
            $reponse = $bdd->query('SELECT * FROM minichat ORDER BY ID DESC LIMIT 0, 10');
        while ($donnees = $reponse->fetch())
            {
            ?>
                <p style="color: rgb(180, 89, 180);
    text-align: center;">
                <strong style="color: #7a417a;">PSEUDO</strong> : <?php echo $donnees['pseudo']; ?><br />
                <strong style="color: #7a417a;"> a écrit : </strong><?php echo $donnees['message']; ?>
               </p>
            <?php
            }
            
            $reponse->closeCursor(); // Termine le traitement de la requête
             
            ?>
</body>
</html>