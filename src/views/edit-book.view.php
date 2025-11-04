<?php include 'src/views/partials/header.view.php'; ?>
<main class="flex h-screen bg-black text-gray-200 items-center justify-center p-6">
    <div class="w-full max-w-md">
        <h4 class="text-xl font-semibold text-indigo-400 mb-4">Edit book #<?= $book["id"]?></h4>
        <div class="p-6 border border-gray-700 bg-gray-900 rounded-lg shadow-lg">
            <form action="/update-book" method="POST" class="flex flex-col gap-4">
                <input type="hidden" name="id" value="<?= $book['id'] ?>">
                <input type="text" placeholder="title" name="title" id="title" value="<?= $book['title'] ?>"
                       class="px-4 py-2 rounded border border-gray-700 bg-gray-800 text-gray-200 focus:outline-none focus:border-indigo-400">
                <input type="text" placeholder="author" name="author" id="author" value="<?= $book['author']?>"
                       class="px-4 py-2 rounded border border-gray-700 bg-gray-800 text-gray-200 focus:outline-none focus:border-indigo-400">
                <input type="date" name="publish_date" id="publish_date" value="<?= $book['publish_date']?>"
                       class="px-4 py-2 rounded border border-gray-700 bg-gray-800 text-gray-200 focus:outline-none focus:border-indigo-400">
                <input type="submit" value="Update"
                       class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow font-medium cursor-pointer">
                <input type="button" value="Cancel" onclick="window.location.href='/books'"
                       class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow font-medium cursor-pointer">
            </form>
        </div>
    </div>
</main>
<?php include 'src/views/partials/footer.view.php'; ?>
