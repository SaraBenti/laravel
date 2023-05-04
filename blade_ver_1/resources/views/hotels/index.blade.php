<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elenco hotels</title>
    @include('bootstrap')
</head>
<body>
    <div class="container">


        <h1>Elenco hotels</h1>

        <a href="/hotels/create">Inserisci nuovo hotel</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Stelle</th>
                    <th>Indirizzo</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel) <!--forelse come il foreach ma il forelse nel caso non ci siano elementi dentro l'array scatta l'{{--@empty--}} per metterci qualcosa-->
                    <tr>
                        <td>{{$hotel->name}}</td><!-- doppia graffa è come fare l'echo-->
                        <td>{{$hotel->stars}}</td>
                        <td>{{$hotel->address}}</td>
                        <td>
                            <a href="/hotels/edit/{{$hotel->id}}">Modifica</a>
                            <a href="/hotels/delete/{{$hotel->id}}">Elimina</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include ('footer')
</body>
</html>