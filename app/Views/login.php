

<h1><?= $titreH1?? 'Login' ?></h1>
<p><?= $paragraphe?? '' ?></p>


<form method="post" ><!-- action="index.php?page=login" -->
  <div class="form-group">
    <label for="mel">Adresse e-mail :</label>
    <input type="mel" id="mel" name="mel" required>
  </div>
  <div class="form-group">
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
  </div>
  <button type="submit">Se connecter</button>
</form>