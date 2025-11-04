<?php include 'src/views/partials/header.view.php'; ?>
<main class="min-h-screen bg-black text-gray-200 flex flex-col items-center justify-center p-6">
    <h2 class="text-3xl font-bold text-indigo-400 mb-6">Welcome to My Library</h2>
    
    <div class="flex gap-4">
        <a href="/login"
           class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow font-medium">
           Login
        </a>
        <a href="/register"
           class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow font-medium">
           Registrarse
        </a>
    </div>
</main>
<?php include 'src/views/partials/footer.view.php'; ?>
