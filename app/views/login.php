

<h1><?= $titreH1 ?></h1>
<p><?= $paragraphe ?></p>


<form id="connexion-form" method="post" action="">
  <div class="form-group">
    <label for="email">Adresse e-mail :</label>
    <input type="email" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
  </div>
  <button type="submit">Se connecter</button>
  <p><a href="inscription.html">Pas encore inscrit ?</a></p>
</form>