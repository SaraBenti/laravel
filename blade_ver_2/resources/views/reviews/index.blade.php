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



        <a href="/reviews/create">Inserisci nuova valutazione</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome Hotel</th>
                    <th>Valutazione</th>
                    <th>Contenuto</th>
                    <th>Ultima modifica</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review) 
                    <tr>
                        <td>{{$review->hotel_name}}</td>
                        <td>{{$review->rating}}</td>
                        <td>{{$review->content}}</td>
                      
                        <td>
                        @if($review->updated_at)
                        {{$review->updated_at->format('d/m/Y H:i:s')}}
                        @endif
                    </td>
                        <td>
                            <a href="/reviews/edit/{{$review->id}}">Modifica</a>
                            <a href="/reviews/delete/{{$review->id}}">Elimina</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>




        </table>
    </div>
 
</body>
</html>