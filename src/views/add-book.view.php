<?php include 'src/views/partials/header.view.php'; ?>
<?php if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}
?>
<main class="flex h-screen bg-black text-gray-200 items-center justify-center p-6">
    <div class="w-full max-w-md bg-gray-900 rounded-2xl shadow-lg p-8 border border-gray-800">
        <h2 class="text-2xl font-semibold mb-6 text-center text-indigo-400">Añadir Libro</h2>

        <form action="/insert-book" method="POST" class="flex flex-col gap-4">
            <input type="text" name="title" placeholder="Título del libro"
                   class="px-4 py-2 rounded border border-gray-700 bg-gray-800 text-gray-200 focus:outline-none focus:border-indigo-400">

            <input type="text" name="author" placeholder="Autor"
                   class="px-4 py-2 rounded border border-gray-700 bg-gray-800 text-gray-200 focus:outline-none focus:border-indigo-400">

            <input type="date" name="publish_date" placeholder="Fecha de publicación"
                   class="px-4 py-2 rounded border border-gray-700 bg-gray-800 text-gray-200 focus:outline-none focus:border-indigo-400">

            <input type="submit" value="Añadir Libro"
                   class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow font-medium cursor-pointer">
        </form>
    </div>
</main>
<?php include 'src/views/partials/footer.view.php'; ?>
