<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>My library</title>
</head>
<body class="bg-gray-900 font-sans leading-normal tracking-normal text-white">
<header class="bg-gray-900 text-gray-200 p-4 flex items-center justify-between shadow-md">
    <h1 class="text-2xl font-bold">My Library</h1>
    <form action="/logout" method="POST">
        <button type="submit"
                class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded-lg shadow font-medium">
            Logout
        </button>
    </form>
</header>
    <?php include 'menu.view.php'?>