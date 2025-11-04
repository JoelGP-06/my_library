<?php
session_start();

// Si no se ha hecho POST, redirige
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /books');
    exit;
}

// Recoger datos del formulario
$book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
$description = trim($_POST['description'] ?? '');
$rating = (int)($_POST['rating'] ?? 0);

// Usuario desde la sesión (asegúrate de tener esto al iniciar sesión)
$user_id = $_SESSION['user']['id'] ?? null;

// Validaciones
if (!$book_id || !$user_id || empty($description) || $rating < 1 || $rating > 5) {
    header('Location: /full-book?id=' . urlencode($book_id));
    exit;
}

// Insertar el comentario
$stmt = $db->prepare("
    INSERT INTO comments (description, book_id, user_id, rating)
    VALUES (:description, :book_id, :user_id, :rating)
");

$ok = $stmt->execute([
    ':description' => $description,
    ':book_id' => $book_id,
    ':user_id' => $user_id,
    ':rating' => $rating
]);

// Redirigir según resultado
if ($ok) {
    header('Location: /full-book?id=' . urlencode($book_id));
    exit;
} else {
    echo "<pre>Error al insertar el comentario.</pre>";
}