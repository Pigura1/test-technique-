<h1>Bienvenue sur un site vous montrant les ilots frais sur Paris</h1>
<h2>Ici vous trouverez les lieux frais dans paris qui proposent des activités a faire </h2>
<?php

$string = file_get_contents("ilots-de-fraicheur-equipements-activites.json");//lit et decode le contenu du fichier json en string 
$json_a = json_decode($string, true);


//code d'erreur en cas de probleme de lecture 
if (!is_array($json_a)) {
    die("Erreur de lecture du fichier JSON : " . json_last_error_msg());
}
?>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const table = document.getElementById("dataTable");//prend l'id de la table 
    const resetButton = document.getElementById("reset");// prend l'id du bouton 
// si les éléments de la table ne se trouvent pas dans la table ou la ou ce trouve le boutton de reset afficher ce code d'erreur 
    if (!table || !resetButton) {
      console.error("Éléments manquants dans la page !");
      return;
    }

    table.addEventListener("click", function (e) {
      if (e.target.tagName !== "TD") return;// si la cible de se click ne se trouve pas dans un tableau td rien ne se passe mais sinon la fonction a lieu 
//creation de constante pour selectioner le texte 
      const clickedText = e.target.textContent.trim().toLowerCase();
      const cellIndex = e.target.cellIndex;

      const rows = table.querySelectorAll("tbody tr");

      rows.forEach(row => {
        const cell = row.cells[cellIndex];
        const cellText = cell.textContent.trim().toLowerCase();
        if (cellText === clickedText) {//affiche les collones si elle coresspondent au texte cliqué sinon elles n'affiche rien 
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    });
//reinitialisation des tables 
    resetButton.addEventListener("click", function () {
      const rows = table.querySelectorAll("tbody tr");//selection de toute les tables
      rows.forEach(row => row.style.display = "");//affiche tout 
    });
  });
</script>

<h2>Cliquer sur une case pour filtrer le tableau</h2>
<button id="reset">Réinitialiser le filtre</button>

<table id="dataTable">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Type</th>
      <th>Payant</th>
      <th>Adresse</th>
      <th>Arrondissement</th>
      <th>Horaires / Période</th>
    </tr>
  </thead>
  <tbody>
    <?php if (is_array($json_a)) : ?>
      <?php foreach ($json_a as $item): ?>
        <tr>
          <td><?= htmlspecialchars($item['nom'] ?? 'Information non disponible') ?></td>
          <td><?= htmlspecialchars($item['type'] ?? 'Information non disponible') ?></td>
          <td><?= htmlspecialchars($item['payant'] ?? 'Information non disponible') ?></td>
          <td><?= htmlspecialchars($item['adresse'] ?? 'Information non disponible') ?></td>
          <td><?= htmlspecialchars($item['arrondissement'] ?? 'Information non disponible') ?></td>
          <td><?= htmlspecialchars($item['horaires_periode'] ?? 'Information non disponible') ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr><td colspan="6">Erreur de lecture du fichier JSON.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

