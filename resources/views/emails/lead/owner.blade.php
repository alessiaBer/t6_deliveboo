<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito Sans', sans-serif;
            font-family: 'Roboto', sans-serif;
            font-family: 'Source Sans Pro', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }

        header {
            background-color: #161616;
            color: white;
            width: 100%;
            height: 120px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        h1 {
            color: aquamarine;
            font-weight: 800;
        }

        nav {
            display: flex;
            justify-content: space-between;
            height: 100%;
            align-items: center;
            flex-wrap: wrap;
        }

        .button {
            padding: 1rem;
            color: white;
            background-color: aquamarine;
            border: none;
        }

        .my_container {
            margin: auto;
            width: 85%;
            height: 100%;
        }

        .my_container_list {
            margin: auto;
            width: 85%;
            margin-bottom: 2rem;
        }

        .h_100 {
            height: 100%;
            padding: 3rem 1rem;
        }

        .mb1rem {
            margin-bottom: 1rem;
        }

        ul {
            list-style-type: none;
        }

        footer {
            background-color: #161616;
            color: white;
            height: 120px;
        }

        .d_flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .text_center {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: black;
        }

        .ul_footer {
            display: flex;
            justify-content: end;
            align-content: center;
            gap: 1rem;
        }

        .text {
            font-size: 24px;
        }

        a {
            font-size: 24px;
            color: white;
        }
    </style>
</head>

<body>

    <header>
        <div class="my_container">
            <nav>
                <div>
                    <h1>DELIVEBOO</h1>
                </div>
                <div>
                    <a href="http://127.0.0.1:8000/admin/orders" class="button">Gestione Ordini</a>
                </div>
            </nav>
        </div>
    </header>

    <main class="h_100">
        <div class="my_container mb1rem">
          <p class="mb1rem">Questa è un email generata automaticamente, per favore non inviare risposte a questo
              indirizzo email.</p>
          <h2 class="mb1rem">Ciao {{ $lead->userEmail }}</h2>


            <div class="my_container_list">
                <h2 class="mb1rem">Riepilogo del ordine del cliente:</h2>
                <div class="mb1rem">Email client: {{ $lead->clientEmail }}</div>
                <div class="mb1rem">
                    <h2>Articoli</h2>
                    <hr>
                    <ul>
                        @foreach ($cart as $item)
                            <li class="d_flex"><div>{{ $item['name'] }}</div><div>${{ $item['price'] }}</div></li>
                            <hr>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="text_center">
                <p class="mb1rem">deliveboo.it</p>
                <p class="mb1rem">DELIVEBOO non ti invierà mai email chiedendoti i dati della tua carta di credito o
                    conto bancario. Ti consigliamo di modificare regolarmente la tua password.</p>
                <p class="mb1rem">Deliveboo Italy | Via spazzacamini 87 Salerno, Italy</p>
            </div>
        </div>
    </main>


    <footer>
        <div class="my_container d_flex">
            <div class="text">
                Team#6/Boolean 2023
            </div>
            <ul class="ul_footer">
                <li>
                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa-brands fa-twitch"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>
