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
            ?>

            <tr>
                <th scope="row"><?php echo $num++ ?></th>
                <td><?php echo $row["nome"] ?></td>
                <td><?php echo $row["acquirente"] ?></td>
                <td><?php echo $row["destinatario"] ?></td>
                <td><a href="<?php echo $row["url_path"] ?>" target="_blank">Link</a></td>

                <td><?php if ($row["venduto"] > 0) {
                        echo 'Sì';
                    } else {
                        echo 'No';
                    } ?></td>

                <td><?php echo $row["prezzo"] ?></td>
            </tr>
            <?php
                };
            };

            ?>
        </tbody>
    </table>
<?php
};
