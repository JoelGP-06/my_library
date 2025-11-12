<?php include 'src/views/partials/header.view.php'; ?>
<?php if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}
?>
<main class="flex h-screen bg-black text-gray-200 items-center justify-center p-6">
    <div class="w-full max-w-md">
        <h4 class="text-xl font-semibold text-indigo-400 mb-4">Are you sure you want to delete book #<?= $book["id"]?></h4>
        <div class="p-6 border border-gray-700 bg-gray-900 rounded-lg shadow-lg">
            <form action="/eliminate" method="POST" class="flex flex-col gap-4">
                <input type="hidden" name="id" value="<?= $book['id'] ?>">
                <p class="mb-4">Title: <?= $book['title'] ?></p>
                <p class="mb-4">Author: <?= $book['author'] ?></p>
                <p class="mb-4">Publication Date: <?= $book['publish_date'] ?></p>
                <div class="flex gap-4">
                    <input type="submit" value="Delete"
                           class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow font-medium cursor-pointer">
                    <a href="/books"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow font-medium text-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include 'src/views/partials/footer.view.php'; ?>