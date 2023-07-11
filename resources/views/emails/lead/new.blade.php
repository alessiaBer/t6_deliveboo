<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Mail</title>
    
</head>

<body>

    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg px-4" data-bs-theme="dark">
                <div>
                    <img id="logo" src="../images/deliveboo.png" alt="">
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li>
                            <a class="nav-link nav_item">Welcome</a>
                        </li>
                        <li>
                            <a class="nav-link nav_item">Home</a>
                        </li>
                        <li>
                            <a class="nav-link nav_item" target="_blank">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="bg-white text-dark">
        <div class="container text-center">
            <h1>Ciao {{ $lead->fullname }}</h1>
            <p>Questo è il riepilogo del tuo Ordine al ristorante: "nome.ristorante"</p>
            <div class="container text-center">
                <div>Indirizzo: </div>
                <div>Numero Telefonico: </div>
                <div>Email Ristoratore: {{ $lead->userEmail}} </div>

            </div>
            <div class="my_container">
                <h2>Articoli</h2>
                <ul>
                    <li></li>
                </ul>
                <h2>Totale complessivo:</h2>
            </div>
        </div>
    </main>

    <footer class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="align-items-center text">
            Team#6/Boolean 2023
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex align-content-center gap-4">
            <li>
                <a>
                    <font-awesome-icon icon="fa-brands fa-linkedin" />
                </a>
            </li>
            <li>
                <a>
                    <font-awesome-icon icon="fa-brands fa-youtube" />
                </a>
            </li>
            <li>
                <a>
                    <font-awesome-icon :icon="['fab', 'twitch']" />
                </a>
            </li>
            <li>
                <a>
                    <font-awesome-icon icon="fa-brands fa-instagram" />
                </a>
            </li>
        </ul>
    </footer>

</body>

<style>
    header {
        position: sticky;
        top: 0;
        z-index: 15;
        background-color: #161616;
        color: white;
    }

    #logo {
        height: 80px;
    }

    .nav_item {
        color: white !important;
    }

    .nav_item:hover {
        color: #00CDBC !important;
    }

    footer {
        background-color: #161616;
        color: white;
        height: 120px;
        padding: 0 2rem;
    }

    .text {
        font-size: 24px;
    }

    a {
        font-size: 24px;
        transition: all 0.3s;
    }

    a:hover {
        cursor: pointer;
        color: #00CDBC !important;
    }
</style>
</html>



    