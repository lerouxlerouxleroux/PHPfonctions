<?php
    $title = "Formation PHP Aston";
    //formulaire de vérification de connexion
    $connected = true;
    include 'includes/header.php';
    include 'includes/menu.php';
?>
 
  
    <h1><?php echo $title; ?></h1>
    
 
   
    <!--Formulaire de connexion -->
    <?php if ($connected): ?>

    <form action="login.php" method="POST">   <!--on envoie les donnée de ce formulaire sur la page post.php -->
        <label>Email: </label>
        <input name="email" type="email" placeholder="Tapez votre email"> <!--attribut name et la valeur email ce sont des clés aux valeurs
        php fait l'association entre name et le tableau, il les placent dans le tableau associatif, dans le superglobal POST sur la page index.php-->

        <input name="pass" type="password" placeholder="Tapez votre mot de passe">
        <label>Administrateur</label>
        <input type="checkbox" name="admin">

        <input type="submit" value ="Valider"> 
    </form>
    <?php endif ?> <!--endif va de pair avec deux point, syntaxe alternatif, deux point au lieu des accolade pour l'instruction-->
    <?php include 'includes/footer.php'; ?>