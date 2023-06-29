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

        <h1>Modifica libro</h1>

        <form method="post" action="/books/edit/{{$book->id}}">
            @csrf
        <div class="mb-4">
            <label for="title" class="form-label">Titolo libro</label>
            <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo del libro" value ="{{old('title', $book->title)}}" name="title">
        </div>

        <div class="mb-2">
            <label for="author" class="form-label">Autore libro</label>
            <input type="text" class="form-control" id="author" placeholder="Inserisci l'autore del libro" value ="{{old('author', $book->author)}}" name="author">
        </div>

        <div class="mb-2">
            <label for="abstract" class="form-label">Riassunto</label>
            <textarea class="form-control" name="abstract" id="abstract" cols="30" rows="10">{{old('abstract',$book->abstract)}}</textarea>
            </div>

            <div class="mb-2">
                <label for="pages" class="form-label">Numero pagine</label>
                <input type="number" class="form-control" id="pages" placeholder="Inserisci il numero delle pagine del libro"
                    value="{{ old('pages',$book->pages) }}" name="pages">
                </div>


                <div class="mb-2">
                    <label for="rating" class="form-label">Valutazione</label>
                    <select class="form-select " name="rating" id="rating" placeholder="Seleziona valutazione">
                        <option value="" >Selezionare</option>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}"@selected($i==old('rating',$book->rating))>{{ $i }}       
                        </option>
                        @endfor
                    </select>
                </div>

        
        <a href="/books" class="btn btn-secondary">Indietro</a>

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