<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Página de inicio</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css')}}">
</head>
<body>
    <header>
        <div class="logo">
            <img src="/img/logo.jpg" alt="logo de la compañia">
            <h2>OPTIC CLINIK</h2>
        </div>
        <h1>BIENVENIDOS</h1>
        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Iniciar sesión
                                    </a>
                                @endauth
                            </nav>
                        @endif
    </header>
    <section id="anuncio">
    <div class="slide">
            <div class="slide-inner">
                <input class="slide-open" type="radio" id="slide-1"
                      name="slide" aria-hidden="true" hidden="" checked="checked">
                <div class="slide-item">
                    <img class="ofer3" src="/img/ofer3.jpg">
                </div>
                <input class="slide-open" type="radio" id="slide-2"
                      name="slide" aria-hidden="true" hidden="">
                <div class="slide-item">
                    <img class="ofer2" src="/img/ofer2.jpg">
                </div>
                <input class="slide-open" type="radio" id="slide-3"
                      name="slide" aria-hidden="true" hidden="">
                <div class="slide-item">
                    <img class="ofer2" src="/img/ofer5.jpg">
                </div>
                <input class="slide-open" type="radio" id="slide-4"
                      name="slide" aria-hidden="true" hidden="">
                <div class="slide-item">
                    <img class="ofer2" src="/img/ofer6.png">
                </div>
                <label for="slide-4" class="slide-control prev control-1">‹</label>
                <label for="slide-2" class="slide-control next control-1">›</label>
                <label for="slide-1" class="slide-control prev control-2">‹</label>
                <label for="slide-3" class="slide-control next control-2">›</label>
                <label for="slide-2" class="slide-control prev control-3">‹</label>
                <label for="slide-4" class="slide-control next control-3">›</label>
                <label for="slide-1" class="slide-control next control-4">›</label>
                <label for="slide-3" class="slide-control prev control-4">›</label>
                <ol class="slide-indicador">
                    <li>
                        <label for="slide-1" class="slide-circulo">•</label>
                    </li>
                    <li>
                        <label for="slide-2" class="slide-circulo">•</label>
                    </li>
                    <li>
                        <label for="slide-3" class="slide-circulo">•</label>
                    </li>
                    <li>
                        <label for="slide-4" class="slide-circulo">•</label>
                    </li>
                </ol>
            </div>
        </div>
    </section>
    <p></p>
    <section id="ubi">
        <div class="container">
            <div class="texto">
                <h2>¡UBÍCANOS!</h2>
                <p>Nos encotramos en la calle Durango esquina con C.Calao,
                    Local 1
                </p>
                <p>Ciudad Juárez,Chih.México</p>
            </div>
            <div class="mapa">
             <div id="mapa">
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUVElpUAwoHEgo2QzhhBL51r60O2DrjFM&callback=inicializarMapa&libraries=marker"></script>
                <script src="{{ asset('js/map.js')}}"></script>
            </div>
        </div>
    </section>
    <p></p>
    <section id="local">
        <div class="container">
            <div class="img-local"></div>
            <div class="texto">
                <h2>¡CONTÁCTANOS!</h2>
                <p>Puedes llamarnos al siguiente numero para obtener informes: <b>656-458-5864</b></p>
                <p>Revisa nuestra red social y tambien puedes enviarnos un correo</p>
                <ul>
                    <li><a href="https://www.facebook.com/profile.php?id=100066912079599">Nuestro Facebook</a></li>
                    <li>Manda un correo a la siguiente dirección: <b>opticalclinik@gmail.com</b></li>
                </ul>
            </div>
    </section>
    <footer>
        <div id="container">
            <p>&copy; Optic Clinik 2023 </p>
        </div>
    </footer>
</body>
</html>
