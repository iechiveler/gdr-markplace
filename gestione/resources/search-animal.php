<?php
include '../includes/functions.inc.php';

$nameSrc = trim(file_get_contents("php://input"));
if ($nameSrc != NULL) {


    searchCertAnim($nameSrc);

?>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Acquirente</th>
                <th scope="col">Destinatario</th>
                <th scope="col">Percorso certificato</th>
                <th scope="col">Venduto</th>
                <th scope="col">Prezzo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $num = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo '
        
            <tr>
                <th scope="row">' . $num++ . '</th>
                <td>' . $row["nome"] . '</td>
                <td>' . $row["acquirente"] . '</td>
                <td>' . $row["destinatario"] . '</td>
                <td>' . $row["url_path"] . '</td>
                <td>' . $row["venduto"] . '</td>
                <td>' . $row["prezzo"] . '</td>
            </tr>
    
    ';
                };
            };

            ?>
        </tbody>
    </table>
<?php
};
