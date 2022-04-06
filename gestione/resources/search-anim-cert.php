<?php

if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
    exit();
};

?>

<div class="container mt-5 w-50">
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nome animale</span>
        <input type="text" class="form-control src-anim" onchange="searchAnim()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Inserire nome dell&#39;animale anche parziale">
    </div>
</div>
<div class="resp container"></div>
<script src="./resources/app.js"></script>

<?php
