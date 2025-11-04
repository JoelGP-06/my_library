<?php
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) {
	header('Location: /books');
	exit;
}

// Eliminar libro
$success = delete($db, 'books', ['id' => $id]);

if ($success) {
	header('Location: /books');
	exit;
} else {
	header('Location: /delete-book?id=' . $id);
	exit;
}
