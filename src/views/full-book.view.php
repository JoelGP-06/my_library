<?php include 'src/views/partials/header.view.php'; ?>
<?php if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}
?>
<main class="min-h-screen bg-gradient-to-b from-gray-950 to-gray-900 text-gray-200 flex flex-col items-center p-8"> <!-- Sección del libro -->
    <section class="w-full max-w-3xl bg-gray-900/70 border border-gray-800 rounded-2xl shadow-lg p-8 backdrop-blur-sm">
        <div class="space-y-4 text-lg">
            <div class="flex justify-between border-b border-gray-800 pb-2"> <span class="text-indigo-400 font-semibold">ID: </span> <span><?= htmlspecialchars($book["id"]) ?></span> </div>
            <div class="flex justify-between border-b border-gray-800 pb-2"> <span class="text-indigo-400 font-semibold">Título: </span> <span><?= htmlspecialchars($book["title"]) ?></span> </div>
            <div class="flex justify-between border-b border-gray-800 pb-2"> <span class="text-indigo-400 font-semibold">Autor: </span> <span><?= htmlspecialchars($book["author"]) ?></span> </div>
            <div class="flex justify-between border-b border-gray-800 pb-2"> <span class="text-indigo-400 font-semibold">Publicado: </span> <span><?= htmlspecialchars($book["publish_date"]) ?></span> </div>
        </div>
    </section> 
    <!-- Sección de comentarios -->
    <section class="w-full max-w-3xl mt-10 bg-gray-900/70 border border-gray-800 rounded-2xl shadow-lg p-8 backdrop-blur-sm">
        <h2 class="text-2xl font-semibold text-indigo-400 mb-4">💬 Comentarios</h2>
        <?php
        // Asegurarnos de que $comments es un array
        if (!isset($comments) || !is_array($comments)) {
            $comments = [];
        }

        $countComments = count($comments);
        $average = 0;
        if ($countComments > 0) {
            $sum = array_sum(array_column($comments, 'rating'));
            $average = round($sum / $countComments, 1);
        }
        ?>
        <h3 class="text-lg font-semibold text-indigo-400 mb-2">Puntuación: <?= $average ?>/5</h3>
        <?php if ($countComments > 0): ?>
            <ul class="space-y-4">
                <?php foreach ($comments as $comment): ?>
                    <li class="border-b border-gray-800 pb-4">
                        <div class="flex items-center mb-2">
                            <p class="text-gray-400"><?= htmlspecialchars($comment["user_email"]) ?> dice: &nbsp;</p>
                            <p class="text-gray-400"><?= htmlspecialchars($comment["description"]) ?>&nbsp;</p>
                            <div class="flex items-center space-x-1">
                                <span class="text-sm text-indigo-400 font-semibold"> <?= htmlspecialchars($comment["rating"]) ?>/5 </span>
                                <span class="text-yellow-400"> <?= str_repeat("★", (int)$comment["rating"]) ?> <?= str_repeat("☆", 5 - (int)$comment["rating"]) ?> </span>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-gray-400 italic">Aún no hay comentarios para este libro... ¡Sé el primero en comentar!</p>
        <?php endif; ?>
    </section>
    <!-- Formulario para añadir comentario -->
    <?php if (in_array($_SESSION['user']['id'], array_column($comments, 'user_id'))): ?>
        <section class="w-full max-w-3xl mt-8 bg-gray-900/70 border border-gray-800 rounded-2xl shadow-lg p-8 backdrop-blur-sm">
            <p class="text-xl font-semibold text-indigo-400 mb-4">Ya has puesto una reseña en este libro, no puedes añadir otra.</p>
        </section>
    <?php else: ?>
        <section class="w-full max-w-3xl mt-8 bg-gray-900/70 border border-gray-800 rounded-2xl shadow-lg p-8 backdrop-blur-sm">
            <h3 class="text-xl font-semibold text-indigo-400 mb-4">Añadir comentario</h3>
            <form method="POST" action="/insert-comment" class="space-y-4">
                <input type="hidden" name="book_id" value="<?= htmlspecialchars($book['id']) ?>">
                <div> <label for="description" class="block text-gray-400 mb-1">Comentario:</label>
                    <textarea id="description" name="description" rows="3" required class="w-full p-3 bg-gray-800 text-gray-200 border border-gray-700 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>
                </div>
                <div>
                    <label for="rating" class="block text-gray-400 mb-1">Puntuación:</label>
                    <select id="rating" name="rating" required class="w-full p-3 bg-gray-800 text-gray-200 border border-gray-700 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none">
                        <option value="">Selecciona una puntuación</option> <?php for ($i = 1; $i <= 5; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?> ★</option>
                        <?php endfor; ?>
                    </select>
                </div>
                <button type="submit" class="w-full py-2 bg-indigo-600 hover:bg-indigo-700 rounded-xl font-semibold text-white transition"> Enviar comentario </button>
            </form>
        </section>
    <?php endif; ?>
</main> <?php include 'src/views/partials/footer.view.php'; ?>