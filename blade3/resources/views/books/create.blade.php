<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuovo libro</title>
    @include('bootstrap')
</head>

<body>
    <div class="container">

        <h1>Inserisci nuovo libro</h1>

        <form method="post" action="/books/create">
            
            @csrf
            
            <div class="mb-4">
                <label for="title" class="form-label">Titolo libro</label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" placeholder="Inserisci il titolo del libro"
                    value="{{ old('title') }}" name="title">
                    @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

            <div class="mb-2">
                <label for="author" class="form-label">Autore libro</label>
                <input type="text" class="form-control @error('author')is-invalid @enderror" id="author" placeholder="Inserisci l'autore del libro"
                    value="{{ old('author') }}" name="author">
                    @error('author') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="mb-2">
                    <label for="abstract" class="form-label">Riassunto</label>
                    <textarea class="form-control" name="abstract" id="abstract" cols="30" rows="10">{{old('abstract')}}</textarea>
                        @error('abstract') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="pages" class="form-label">Numero pagine</label>
                        <input type="number" class="form-control @error('pages')is-invalid @enderror" id="pages" placeholder="Inserisci il numero delle pagine del libro"
                            value="{{ old('pages') }}" name="pages">
                            @error('pages') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

            <div class="mb-2">
                <label for="rating" class="form-label">Valutazione</label>
      
                <select class="form-select @error('rating')is-invalid @enderror" name="rating" id="rating" placeholder="Seleziona valutazione">
                    <option value="" >Selezionare</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}"@selected($i==old('rating'))>{{ $i }}
                            
                    </option>
                    @endfor
                </select>
                @error('rating') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            
            <a href="/books" class="btn btn-secondary">Indietro</a>
            <button type="submit" class="btn btn-primary">Salva</button>

        </form>

      
    </div>
    @include ('footer')
</body>

</html>
