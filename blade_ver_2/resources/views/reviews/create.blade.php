<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuova review</title>
    @include('bootstrap')
</head>

<body>
    <div class="container">

        <h1>Inserisci nuova review</h1>

        <form method="post" action="/reviews/create">
           
            @csrf
            <
            <div class="mb-4">
                <label for="hotel_name" class="form-label">Nome Hotel</label>
                <input type="text" class="form-control @error('hotel_name')is-invalid @enderror" id="hotel_name" placeholder="Inserisci il nome dell'hotel"
                    value="{{ old('hotel_name') }}" name="hotel_name">
                    @error('hotel_name') <p class="text-danger">{{ $message }}</p> @enderror    
                </div>

                <div class="mb-4">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
                        @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>

            <div class="mb-4">
                <label for="rating" class="form-label">Votazione</label>
        
                <select class="form-select @error('hotel_name')is-invalid @enderror" name="rating" id="rating" placeholder="Seleziona dall'elenco">
                    <option value="" >Selezionare</option>
                    
                    </option>
           
                </select>
                @error('hotel_name') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            

          
            <a href="/reviews" class="btn btn-secondary">Indietro</a>
            <button type="submit" class="btn btn-primary">Salva</button>

        </form>


    </div>

</body>

</html>
