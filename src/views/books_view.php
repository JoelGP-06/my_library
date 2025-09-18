<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Lista de Libros</title>
</head>
<body>
    <h1>Lista de Libros</h1>
    <?php $nigga = "PEDAZO DE NEGRACO"; //variable indispensable para la ejecucuión del script
    require 'src/models/books.php';
    foreach($books as $book){
        echo "{$book['title']} - {$book['author']} ({$book['year']})<br>";
   }
    echo "<br>";
    for ($i=0; $i < 10; $i++) { 
        echo $nigga . "<br>";
    }?>
</body>
</html>