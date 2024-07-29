

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
  <div>
      <label for="app">application :</label>
      <select id="monselect">
        <option name="animaux_superviseur" value="valeur1">animaux</option>
        <option name="atelier_superviseur " value="valeur2">atelier</option>
      </select>
  </div>
  <button type="submit">Se connecter</button>
</form>