@extends('layouts.app')

@section('content')

    <main class="bg-white text-dark">
        <div class="container text-center">

            <p>Questo è il riepilogo del tuo Ordine al ristorante: "{{ $lead->restaurantName }}"</p>
            <div class="container text-center">
                <div>Email Ristoratore: {{ $lead->userEmail }}</div>
            </div>
            <div class="my_container">
                <h2>Articoli</h2>
                <ul>
                    @foreach ($cart as $item)
                        <li>{{ $item['name'] }}</li>
                    @endforeach
                </ul>

            </div>
        </div>
    </main>

@endsection






    