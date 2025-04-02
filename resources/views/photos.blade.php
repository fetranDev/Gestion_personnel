<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <h1>Galerie de photos</h1>
        <p>Voici quelques photos de notre collection.</p>
        <div class="gallery">
            <img src="path_to_image1.jpg" alt="Photo 1">
            <img src="path_to_image2.jpg" alt="Photo 2">
            <!-- Ajoutez d'autres images ici -->
        </div>
    @endsection

</body>
</html>
