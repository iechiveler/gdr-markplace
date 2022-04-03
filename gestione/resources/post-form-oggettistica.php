<?php

if(isset($_SESSION["username"])) {

    echo '<div class="container mt-5">';
    echo '<p class="text-light">Gestore per la creazione dei certificati per l oggettistica</p>';

    echo '<div class="input-group mb-3">';
    echo '<span class="input-group-text" id="basic-addon1">@</span>';
    echo ' <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">';
    echo '</div>';
    
    echo '<div class="input-group mb-3">';
    echo '<input type="text" class="form-control" placeholder="Recipients username" aria-label="Recipients username" aria-describedby="basic-addon2">';
    echo '<span class="input-group-text" id="basic-addon2">@example.com</span>';
    echo '</div>';
    
    echo '<label for="basic-url" class="form-label text-light">Your vanity URL</label>';
    echo '<div class="input-group mb-3">';
    echo '<span class="input-group-text" id="basic-addon3">https://example.com/users/</span>';
    echo '<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">';
    echo '</div>';
    
    echo '<div class="input-group mb-3">';
    echo '<span class="input-group-text">$</span>';
    echo '<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">';
    echo '<span class="input-group-text">.00</span>';
    echo '</div>';
    
    echo '<div class="input-group mb-3">';
    echo '<input type="text" class="form-control" placeholder="Username" aria-label="Username">';
    echo '<span class="input-group-text">@</span>';
    echo '<input type="text" class="form-control" placeholder="Server" aria-label="Server">';
    echo '</div>';
    
    echo '<div class="input-group">';
    echo '<span class="input-group-text">With textarea</span>';
    echo '<textarea class="form-control" aria-label="With textarea"></textarea>';
    echo '</div>';
    echo '</div>';
}