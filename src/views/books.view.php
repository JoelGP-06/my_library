<?php include 'src/views/partials/header.view.php'; ?>
<main class="min-h-screen bg-black text-gray-200 p-6">
    <h1 class="text-3xl font-bold text-center text-indigo-400 mb-6">Lista de Libros</h1>
    <div class="overflow-x-auto">
        <table class="w-full max-w-4xl mx-auto border border-gray-700 rounded-lg bg-gray-900 shadow-lg">
            <thead>
                <tr class="bg-gray-800">
                    <th class="px-4 py-3 text-left">Título</th>
                    <th class="px-4 py-3 text-left">Autor</th>
                    <th class="px-4 py-3 text-left">Fecha de Publicación</th>
                    <th class="px-4 py-3 text-left">Editar</th>
                    <th class="px-4 py-3 text-left">Eliminar</th>
                    <th class="px-4 py-3 text-left">Ver</th>
                </tr>
            </thead>
            <?php foreach ($books as $book): ?>
                <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                    <td class="px-4 py-3"><?= $book['title'] ?></td>
                    <td class="px-4 py-3"><?= $book['author'] ?></td>
                    <td class="px-4 py-3"><?= $book['publish_date'] ?></td>
                    <!--<td class="px-4 py-3">
                        <a href="/add-comment?id=<?= $book['id'] ?>" class="text-indigo-400 hover:text-indigo-300 font-medium">Añadir comentario</a>
                    </td>-->
                    <td class="px-4 py-3">
                        <a href="/edit-book?id=<?= $book['id'] ?>" class="text-indigo-400 hover:text-indigo-300 font-medium">Editar</a>
                    </td>
                    <td class="px-4 py-3">
                        <a href="/delete-book?id=<?= $book['id'] ?>" class="text-red-400 hover:text-red-700 font-medium">Eliminar</a>
                    </td>
                    <td class="px-4 py-3">
                        <a href="/full-book?id=<?= $book['id'] ?>" class="text-emerald-400 hover:text-emerald-700 font-medium">Ver</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <!--hacer prueba de convertir la tabla a tarjetas -->
    <div class="overflow-x-auto">
        <table class="w-full max-w-4xl mx-auto border border-gray-700 rounded-lg bg-gray-900 shadow-lg">
            <thead>
                <tr class="bg-gray-800">
                    <th class="px-4 py-3 text-left">Título</th>
                    <th class="px-4 py-3 text-left">Autor</th>
                    <th class="px-4 py-3 text-left">Fecha de Publicación</th>
                    <th class="px-4 py-3 text-left">Editar</th>
                    <th class="px-4 py-3 text-left">Eliminar</th>
                    <th class="px-4 py-3 text-left">Ver</th>
                </tr>
            </thead>
            <?php foreach ($books as $book): ?>
                <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                    <td class="px-4 py-3"><?= $book['title'] ?></td>
                    <td class="px-4 py-3"><?= $book['author'] ?></td>
                    <td class="px-4 py-3"><?= $book['publish_date'] ?></td>
                    <!--<td class="px-4 py-3">
                        <a href="/add-comment?id=<?= $book['id'] ?>" class="text-indigo-400 hover:text-indigo-300 font-medium">Añadir comentario</a>
                    </td>-->
                    <td class="px-4 py-3">
                        <a href="/edit-book?id=<?= $book['id'] ?>" class="text-indigo-400 hover:text-indigo-300 font-medium">Editar</a>
                    </td>
                    <td class="px-4 py-3">
                        <a href="/delete-book?id=<?= $book['id'] ?>" class="text-red-400 hover:text-red-700 font-medium">Eliminar</a>
                    </td>
                    <td class="px-4 py-3">
                        <a href="/full-book?id=<?= $book['id'] ?>" class="text-emerald-400 hover:text-emerald-700 font-medium">Ver</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <p class="text-center mt-8">
        <a href="/add-book" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow">
            Publicar libro
        </a>
    </p>
</main>
<?php include 'src/views/partials/footer.view.php'; ?>