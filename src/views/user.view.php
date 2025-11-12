<?php include 'src/views/partials/header.view.php'; ?>
<?php if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}
?>
<main class="flex h-screen bg-black text-gray-200 items-center justify-center p-6">
    <div class="w-full max-w-md bg-gray-900 rounded-2xl shadow-lg p-8 border border-gray-800">
        <h2 class="text-2xl font-semibold mb-6 text-center text-indigo-400">Perfil de Usuario</h2>

        <div class="space-y-4">
            <div>
                <p class="text-sm text-gray-400">Correo electrónico</p>
                <p class="text-lg font-medium"><?= $_SESSION['user']['email'] ?? 'No disponible' ?></p>
            </div>

            <div>
                <p class="text-sm text-gray-400">ID de usuario</p>
                <p class="text-lg font-medium"><?= $_SESSION['user']['id'] ?? 'No disponible' ?></p>
            </div>

            <div>
                <p class="text-sm text-gray-400">Fecha de registro</p>
                <p class="text-lg font-medium"><?= $_SESSION['user']['created_at'] ?? 'No disponible' ?></p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="/books" class="text-indigo-400 hover:underline hover:underline-offset-4 transition-colors">Volver a mis libros</a>
        </div>
    </div>
</main>
<?php include 'src/views/partials/footer.view.php'; ?>
