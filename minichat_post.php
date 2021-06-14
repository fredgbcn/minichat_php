<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (PDOException $e){
        die('Erreur : ' . $e->getMessage());
    }

    if (isset ($_POST['pseudo']) AND isset($_POST['message']))
    {
        $pseudo = $_POST['pseudo'];
        $message = $_POST['message'];
        $request = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES (:pseudo, :message)');
        $request->execute(array(
            'pseudo' => $pseudo,
            'message' => $message,
            ));
        }

header('Location: minichat.php');
?>