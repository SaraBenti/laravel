<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuovo hotel</title>
    @include('bootstrap')
</head>
<body>
    <div class="container">

        <h1>Inserisci nuovo hotel</h1>

        <form method="post" action="/hotels/create"><!--se la uri è uguale posso non mettere l'action-->
            @csrf<!--direttiva blade che si trasforma in input hidden con chiave segreta=protezione csrf;
        non si può togliere altrimenti le post non funzionano più
    scambio di token tra backend e i form→ questo form proviene dal mio sito
token a tempo; nelle api questo problema non c'è-->
        <div class="mb-3">
            <label for="name" class="form-label">Nome hotel</label>
            <input type="text" class="form-control" id="name" placeholder="Inserisci il nome dell'hotel" value ="{{old('name')}}" name="name">
        </div>
        <div class="mb-3">
            <label for="stars" class="form-label">Stelle</label>
            <input type="text" class="form-control" id="stars" placeholder="Inserisci le stelle" value ="{{old('stars')}}" name="stars">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="address" placeholder="Inserisci l'indirizzo dell'hotel" value ="{{old('address')}}" name="address">
        </div>

        <a href="/hotels" class="btn btn-secondary">Indietro</a>
        <button type="submit" class="btn btn-primary">Salva</button>

        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
    @include ('footer')
</body>
</html>
