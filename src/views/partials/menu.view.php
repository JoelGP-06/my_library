<nav class="bg-gray-900 text-gray-200 px-8 py-4 flex justify-between items-center shadow-md">
    <?php if($_SESSION["user"]): ?>
        <div class="text-lg font-semibold text-indigo-400">
            Hola <a href="/user" class="hover:underline hover:decoration-indigo-400 hover:underline-offset-4 transition-colors">
    <?= $_SESSION["user"]['email'] ?>
</a>

        </div>
        <div class="flex space-x-6">
            <a href="/books" class="hover:text-indigo-400 transition-colors">Books</a>
        </div>
    <?php endif; ?>
</nav>
