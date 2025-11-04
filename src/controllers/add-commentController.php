<?php
// Obtener id del query string
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
	header('Location: /books');
	exit;
}

// Cargar libro por id
$book = query($db, "SELECT * FROM books WHERE id = :id", [':id' => $id]);
if (!$book) {
	header('Location: /books');
	exit;
}

return view("add-comment", ['book' => $book]);