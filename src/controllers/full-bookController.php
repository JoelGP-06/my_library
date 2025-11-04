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

// Cargar comentarios del libro
$commentsRaw = query(
    $db,
    "SELECT c.*, u.email AS user_email
     FROM comments c
     JOIN users u ON c.user_id = u.id
     WHERE c.book_id = :book_id
     ORDER BY c.id DESC",
    [':book_id' => $id]
);

// Normalizar: si hay un solo comentario, ponerlo en array
if ($commentsRaw && isset($commentsRaw['id'])) {
    $comments = [$commentsRaw];
} else {
    $comments = $commentsRaw ?: [];
}

// --- Manejo del formulario de nuevo comentario ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['description'], $_POST['rating'])) {
    $description = trim($_POST['description']);
    $rating = (int)$_POST['rating'];

    if (!empty($description) && $rating >= 1 && $rating <= 5) {
        $stmt = $db->prepare("INSERT INTO comments (description, book_id, user_id, rating, user_email) VALUES (:description, :book_id, :user_id, :rating, :user_email)");
        $stmt->execute([
            ':description' => $description,
            ':book_id' => $id,
            ':user_id' => 1,
            ':rating' => $rating,
            ':user_email' => $user_email
        ]);

        header("Location: ?id=" . urlencode($id)); // recarga la página
        exit;
    }
}

// Renderizar la vista pasando libro y comentarios
return view("full-book", [
    'book' => $book,
    'comments' => $comments
]);
