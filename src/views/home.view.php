<?php include 'src/views/partials/header.view.php'; ?>
    <main class="p-4">
        <h2 class="text-xl mb-4">Welcome to My Library</h2>
        <?php foreach($books as $book): ?>
        <hr>
            <div class="bg-gray-700 p-4 rounded mb-4 hover:bg-gray-900 transition duration-300">
                <h3 class="text-lg font-bold"><?=$book['title']; ?></h3>
                <p class="text-sm">by <?=$book['author']; ?> (<?=$book['year']; ?>)</p>
            </div>
        <?php endforeach; ?>
    </main>
<?php include 'src/views/partials/footer.view.php'; ?>