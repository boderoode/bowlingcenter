<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    {{-- Alerts --}}
    {{-- Success --}}
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    {{-- Error --}}
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
        
            //make a input type field for baan nummer

        //make a form with baan_nummer passed through the id of the reservering in the url and the baan_nummer as value
        <form action="{{ route('reserveringen.update', $reservering->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="baan_nummer">Baan nummer</label>
                <input type="text" class="form-control" id="baan_nummer" name="baan_nummer" value="{{ $reservering->baan_nummer }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </body>
 </html>