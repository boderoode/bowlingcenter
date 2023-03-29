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

    <div class="row">
        <div class="col-6">
            {{-- Hele naam van de klant --}}
            <h1>
                Alle reserveringen van {{ $reserveringen[0]->voornaam }} {{ $reserveringen[0]->tussenvoegsel }} {{
                $reserveringen[0]->achternaam }}
            </h1>
        </div>


        {{-- Zoekbalk zodat je kan zoeken op de datum--}}
        <form action="{{ route('reserveringen.index') }}" method="GET">
            <div class="col-6">
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="date" placeholder="Datum" aria-label="Datum"
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Zoeken</button>
                </div>
            </div>
        </form>
    </div>

    {{-- Tabel met reserveringen --}}
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Datum</th>
                <th scope="col">Aantal uren</th>
                <th scope="col">Begin tijd</th>
                <th scope="col">Eind tijd</th>
                <th scope="col">Aantal volwassenen</th>
                <th scope="col">Aantal kinderen</th>
                <th scope="col">Baan nummer</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop door de reserveringen --}}
            @foreach ($reserveringen as $reservering)
            <tr>
                {{--zorgt ervoor dat de hele naam van de persoon wordt gehaald uit de persoons tabel --}}
                <td>{{ $reservering->voornaam }} {{ $reservering->tussenvoegsel }} {{ $reservering->achternaam }}</td>
                <td>{{ $reservering->datum }}</td>
                <td>{{ $reservering->aantal_uren }}</td>
                <td>{{ $reservering->begin_tijd }}</td>
                <td>{{ $reservering->eind_tijd }}</td>
                <td>{{ $reservering->aantal_volwassenen }}</td>
                <td>{{ $reservering->aantal_kinderen }}</td>
                <td>{{ $reservering->baan_nummer }}</td>
                {{-- Edit knop --}}
                <td><a href="{{ route('reserveringen.edit', $reservering->id) }}" class="btn btn-primary">Edit</a></td>


                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>