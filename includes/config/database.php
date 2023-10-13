<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'Alejandroe2004ms*', 'sisbiblioteca');

    if (!$db) {
        echo "ERROR no se pudo conectar";
        exit;
    }

    return $db;
}