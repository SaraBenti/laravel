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

        <h1>Modifica valutazione</h1>

        <form method="post" action="/reviews/edit/{{$review->id}}">
            @csrf
        <div class="mb-4">
            <label for="hotel_name" class="form-label">Nome hotel</label>
            <input type="text" class="form-control" id="name" placeholder="Inserisci il nome dell'hotel" value ="{{old('hotel_name', $review->hotel_name)}}" name="hotel_name">
        </div>
        
        <div class="mb-4">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{old('content', $review->content)}}</textarea>
                        @error('name') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="rating" class="form-label">Votazione</label>
            <select class="form-select @error('hotel_name')is-invalid @enderror" name="rating" id="rating" placeholder="Seleziona dall'elenco">
                <option value="" >Selezionare</option>
                
                </option>
       
            </select>
            
        

      
        <a href="/reviews" class="btn btn-secondary">Indietro</a>

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

</body>
</html>
