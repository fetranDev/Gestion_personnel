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
        <h1>Contactez-nous</h1>
        <p>Vous pouvez nous contacter via le formulaire ci-dessous.</p>
        <form action="#" method="post">
            @csrf
            <div>
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    @endsection

</body>
</html>
