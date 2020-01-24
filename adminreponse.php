<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
$sql = 'SELECT * FROM questions';
$resultat = $pdo->query($sql);
$reponse = $_POST['reponse'];
if (!empty($_POST['submitted'])) {
    $sql = "UPDATE  questions SET reponse = '$reponse'";
    $query = $pdo->prepare($sql);
    $query->bindValue(':reponse', PDO::PARAM_STR);
    $query->execute();
}
?>
<table>
    <thead>
    <tr>
        <th>Utilisateur</th>
        <th>Question</th>
        <th>Réponse</th>
    </tr>
    </thead>
    <tbody>
 <?php while ($ligne = $resultat->fetch()) {
    echo
        '<tr>
            <td>'. $ligne['id_user'].'</td>
            <td> '.$ligne['question'].'</td>
            <td> <form action="adminreponse.php" method="post" novalidate>
                      <input type="text" id="reponse" name="reponse">
                      <input id="submit" type="submit" name="submitted" value="Envoyer">
                 </form></td>
         </tr>';
} ?>
    </tbody>
</table>

