<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filename'])) {
        $filename = $_POST['filename'];
        $filepath = '../public/uploads/' . $filename;
        if (file_exists($filepath)) {
            unlink($filepath);
            echo 'Le fichier ' . $filename . ' a été supprimé avec succès.';
        } else {
            echo 'Le fichier ' . $filename . ' n\'existe pas.';
        }
    }