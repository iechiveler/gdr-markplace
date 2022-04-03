<?php

if (!isset($_SESSION["username"])) {
  header("Location: ../login.php");
  exit();
}



$sql = "SELECT animali_catalogo.nome, venduto, prezzo, animali_categoria.nome AS razza FROM animali_catalogo 
LEFT JOIN animali_razza ON animali_razza.id_razza = animali_catalogo.id_razza
LEFT JOIN animali_categoria ON animali_categoria.id_categoria = animali_razza.id_categoria;";
$result = $conn->query($sql) or die($conn->error);
$resultValues = null;

?>

<div class="container mt-5 w-50">
  <table class="table text-light align-middle text-center mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Categoria</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Venduto</th>
        <th scope="col">Modifica</th>
      </tr>
    </thead>
    <tbody>

      <?php

      $m = 1;
      $n = 1;
      while ($row = $result->fetch_assoc()) {
        $resultValues .= '<tr id="' . $m++ . '">
    <th scope="row">' . $n++ . '</th>
    <td>' . $row["nome"] . '</td>
    <td>' . $row["razza"] . '</td>
    <td><input type="text" id="view" value="' . $row["prezzo"] . '" disabled="true"></td>
    <td><input type="text" id="view" value="' . $row["venduto"] . '" disabled="true"></td>
    <td><button type="button" class="btn btn-danger lebutton">Modifica</button></td>
  </tr>';
      }

      echo $resultValues;

      ?>
    </tbody>
  </table>
</div>
<script src="./pages/appSearchEng.js"></script>
<?php

$conn->close();
