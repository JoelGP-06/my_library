<?php include 'src/views/partials/header.view.php'; ?>
<?php if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}
?>
<main class="min-h-screen bg-black text-gray-200 p-6">
    <h1 class="text-3xl font-bold text-center text-indigo-400 mb-16 mt-10">Lista de Libros</h1>
    +    <!-- Mostrar los libros como tarjetas -->
    <div class="space-y-6 max-w-3xl mx-auto">
        <?php foreach ($books as $book): ?>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-6 hover:bg-gray-800 transition">
                <h3 class="text-2xl font-semibold text-indigo-400 mb-2"><?= htmlspecialchars($book['title']) ?></h3>
                <p class="text-gray-300 mb-1"><span class="font-medium text-gray-400">Autor:</span> <?= htmlspecialchars($book['author']) ?></p>
                <p class="text-gray-300 mb-4"><span class="font-medium text-gray-400">Publicado:</span> <?= htmlspecialchars($book['publish_date']) ?></p>

                <div class="flex flex-wrap gap-4 mt-3">
                    <a href="/edit-book?id=<?= $book['id'] ?>"
                        class="text-indigo-400 hover:text-indigo-300 font-medium transition">Editar</a>

                    <a href="/delete-book?id=<?= $book['id'] ?>"
                        class="text-red-400 hover:text-red-500 font-medium transition">Eliminar</a>

                    <a href="/full-book?id=<?= $book['id'] ?>"
                        class="text-emerald-400 hover:text-emerald-300 font-medium transition">Ver</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <p class="text-center mt-8">
        <a href="/add-book" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow">
            Publicar libro
        </a>
    </p>
</main>
<?php include 'src/views/partials/footer.view.php'; ?>