<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="file" name="photo" accept="image/*">
    <button type="submit">Mettre à jour</button>
</form>
    <img src="{{asset('storage/photos'.Aut::user()->photo)}}" alt="Photo de profil" width="100">


</body>
</html>
