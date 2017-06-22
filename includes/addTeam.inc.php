
<h1>Enregistrer une équipe</h1>
<div class="container">
<!--enctype="multipart/form-data"> permet d'envoyer des fichiers-->
    <form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
        <label>Equipe</label>
        <input type="text" name="nom">
       </div>
    <div class="col-md-4">     
        <label>Entraîneur</label>
        <input type="text" name="entraineur">
    </div>
        
    <div class="col-md-4">
        <label>Couleurs</label>
        <input type="text" name="couleurs">
    </div>
</div> 

<div class="col-md-4">
        <label>Logo</label>
        <input type="file" name="logo">
    </div>

<div class="row">
    <div class="col-md-12">
        <input type="submit" name="input" value="Enregistrer">
    </div>
</div>
</form>
</div>
