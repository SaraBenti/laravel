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

        <form method="post" action="/hotels/create">
            <!--se la uri è uguale posso non mettere l'action-->
            @csrf
            <!--direttiva blade che si trasforma in input hidden con chiave segreta=protezione csrf;
        non si può togliere altrimenti le post non funzionano più
    scambio di token tra backend e i form→ questo form proviene dal mio sito
token a tempo; nelle api questo problema non c'è-->
            <div class="mb-3">
                <label for="name" class="form-label">Nome hotel</label>
                <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="Inserisci il nome dell'hotel"
                    value="{{ old('name') }}" name="name">
                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                    {{--questo sopra stampa l'errore direttamente sotto il box--}}
                </div>
            <div class="mb-3">
                <label for="stars" class="form-label">Stelle</label>
                {{--  <input type="text" class="form-control" id="stars" placeholder="Inserisci le stelle" value ="{{old('stars')}}" name="stars">
        --}}
                <select class="form-select @error('name')is-invalid @enderror" name="stars" id="stars" placeholder="Seleziona dall'elenco">
                    <option value="" >Selezionare</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}"@selected($i==old('stars'))>{{ $i }}
                            @if($i==1)
                            stella
                        @else
                            stelle
                    @endif
                    </option>
                    @endfor
                </select>
                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" class="form-control @error('name')is-invalid @enderror" id="address" placeholder="Inserisci l'indirizzo dell'hotel"
                    value="{{ old('address') }}" name="address">
                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="all_year" name="all_year"
                    @if (old('all_year')) checked @endif>
                <label class="form-check-label" for="all_year">
                    Aperto tutto l'anno
                </label>
            </div>
            <a href="/hotels" class="btn btn-secondary">Indietro</a>
            <button type="submit" class="btn btn-primary">Salva</button>

        </form>

      {{-- questo se vogliamo gli errori stampati sotto
         @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
--}}
    </div>
    @include ('footer')
</body>

</html>
