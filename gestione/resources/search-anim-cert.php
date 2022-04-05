<?php

if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
    exit();
};

?>

<div class="container mt-5 w-50">
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nome animale</span>
        <input type="text" class="form-control src-anim" onchange="searchAnim()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="resp"></div>
</div>
<script src="./resources/app.js"></script>