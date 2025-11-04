<?php

// Asegurarse de que la petición sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /add-book');
    exit;
}

// Recoger y validar datos
$title = trim((string)($_POST['title'] ?? ''));
$author = trim((string)($_POST['author'] ?? ''));
$publish_date = trim((string)($_POST['publish_date'] ?? ''));

if ($title === '' || $author === '') {
    // Requerir al menos título y autor
    header('Location: /add-book');
    exit;
}

$data = [
    'title' => $title,
    'author' => $author,
    'publish_date' => $publish_date,
];

$ok = insert($db, 'books', $data);

if ($ok) {
    header('Location: /books');
    exit;
} else {
    // En caso de fallo, volver al formulario
    header('Location: /add-book');
    exit;
}

