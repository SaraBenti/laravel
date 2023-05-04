<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuovo hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <h1>Inserisci nuovo hotel</h1>

        <form method="post" action="">
            @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome hotel</label>
            <input type="text" class="form-control" id="name" placeholder="Inserisci il nome dell'hotel" name="name">
        </div>
        <div class="mb-3">
            <label for="stars" class="form-label">Stelle</label>
            <input type="text" class="form-control" id="stars" placeholder="Inserisci le stelle" name="stars">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="address" placeholder="Inserisci l'indirizzo dell'hotel" name="address">
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>

        </form>
    </div>
</body>
</html>
