<h1>Enregistrer un joueur</h1>
<div class="container">
    <form method="POST">
    <div class="row">
        <div class="col-md-4">
        <label>Nom</label>
        <input type="text" name="nom">
       </div>
    <div class="col-md-4">     
        <label>Prenom</label>
        <input type="text" name="prenom">
    </div>
        
    <div class="col-md-4">
        <label>Age</label>
        <input type="text" name="age">
    </div>
</div> 
<div class="row">
    <div class="col-md-6">
        <label>Numero de maillot</label>
        <!--<input type="text" name="num_maillot">-->
        <select name="num_maillot">
            <?php
                for ($i=1; $i<1000; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';  // ou <option value=".$i+1." , concéténation entre guillemets
              
                }
            ?>
             </select>

    </div> <!--colonne-->
    <div class="col-md-6">
        <label>Equipe</label>
        <?php echo selectFormat(getTeams()); ?>
        <select>
            <option>blabla</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <input type="submit" name="input" value="Enregistrer">
    </div>
</div>
</form>
</div>
        