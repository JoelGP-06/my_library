<?php include 'partials/header.view.php'; ?>
<main class="min-h-screen bg-black text-gray-200 flex items-center justify-center p-6">
    <div class="w-full max-w-sm">
        <form action="/auth" method="POST" class="flex flex-col gap-4 bg-gray-900 p-6 rounded-lg shadow-lg">
            <input type="email" name="email" id="email" placeholder="email"
                   class="px-4 py-2 rounded border border-gray-700 bg-gray-800 text-gray-200 focus:outline-none focus:border-indigo-400">
            <input type="password" name="password" id="password" placeholder="password"
                   class="px-4 py-2 rounded border border-gray-700 bg-gray-800 text-gray-200 focus:outline-none focus:border-indigo-400">
            <input type="submit" value="Login"
                   class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow font-medium cursor-pointer">
        </form>
        <a href="/register" class="text-indigo-400 hover:underline">Ir al registro</a><br>
        <a href="/home" class="text-indigo-400 hover:underline">Volver al inicio</a>
    </div>
</main>
<?php include 'partials/footer.view.php'; ?>
