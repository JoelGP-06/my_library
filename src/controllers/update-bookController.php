<?php

// Recoger y validar datos
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$title = trim((string)($_POST['title'] ?? ''));
$author = trim((string)($_POST['author'] ?? ''));
$publish_date = trim((string)($_POST['publish_date'] ?? ''));

if (!$id || $title === '' || $author === '') {
	// Falta información mínima
	header('Location: /edit-book?id=' . ($id ?? ''));
	exit;
}

// Preparar datos para update
$data = [
	'title' => $title,
	'author' => $author,
	'publish_date' => $publish_date,
];

$where = ['id' => $id];

// Ejecutar actualización
$success = update($db, 'books', $data, $where);

if ($success) {
	header('Location: /books');
	exit;
} else {
	// En caso de fallo, volver al formulario de edición
	header('Location: /edit-book?id=' . $id);
	exit;
}

