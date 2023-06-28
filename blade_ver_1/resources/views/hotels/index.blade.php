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


        <h1>{{__('hotel_list')}}</h1><!--
            __ è una funzione
            chiave all'interno di lang json-->

        <a href="/hotels/create">Inserisci nuovo hotel</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Stelle</th>
                    <th>Indirizzo</th>
                    <th>Aperto tutto l'anno</th>
                    <th>Ultima modifica</th>
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
                            @if ($hotel->all_year)
                               <p class="text-success">Si</p> 
                            @else
                            <p class="text-danger">No</p> 
                            @endif
                        </td>
                        <td>
                        @if($hotel->updated_at)
                        {{$hotel->updated_at->format('d/m/Y H:i:s')}}
                        @endif
                    </td>
                        <td>
                            <a href="/hotels/edit/{{$hotel->id}}">Modifica</a>
                            <a href="/hotels/delete/{{$hotel->id}}">Elimina</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

<!--CON IL FORELSE 

            <tbody>
                @forelse($hotels as $hotel)
                    <tr>
                        <td>{{$hotel->name}}</td>
                        <td>{{$hotel->stars}}</td>
                        <td>{{$hotel->address}}</td>
                        <td>
                            @if($hotel->all_year)
                                Si
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            @if($hotel->updated_at)
                            {{$hotel->updated_at->format('d/m/Y H:i:s')}}
                            @endif
                        </td>
                        <td>
                            <a href="/hotels/edit/{{$hotel->id}}">Modifica</a>
                            <a href="/hotels/delete/{{$hotel->id}}">Elimina</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            Attualmente non ci sono hotel su database
                        </td>
                    </tr>
                @endforelse
            </tbody>

        -->


        </table>
    </div>
    @include ('footer')
</body>
</html>
