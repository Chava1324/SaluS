<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="index-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:salvadorhdz1324@gmail.com">{{ $configuracion->correo }}</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $configuracion->telefono }}</span></i>
                </div>

            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-center">

            <div class="container py-3 d-flex flex-wrap align-items-center justify-content-between">
                <!-- Logo y Nombre -->
                <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none me-auto">
                    <img src="{{ asset('storage/' . $configuracion->logo) }}" alt="logo" width="50" height="50"
                        class="img-fluid rounded-circle shadow-sm me-3 border-2 border-primary" />
                    <div class="d-flex flex-column">
                        <h1 class="h5 mb-0 fw-bold text-primary">{{ $configuracion->nombre }}</h1>
                     </div>
                </a>

                <!-- Menú de Navegación -->
                <nav id="navmenu" class="navmenu d-flex align-items-center">
                    <ul class="nav me-3">
                        <li class="nav-item"><a href="#hero" class="nav-link active px-3">Inicio</a></li>
                        <li class="nav-item"><a href="#about" class="nav-link px-3">Acerca de nosotros</a></li>
                        <li class="nav-item"><a href="#departments" class="nav-link px-3">Departamentos</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link px-3">Ubicación</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle d-xl-none fs-4 ms-2"></i>
                </nav>

                <!-- Botón de acceso -->
                <a href="{{ url('login') }}" class="btn btn-primary shadow-sm px-4 py-2 d-none d-sm-inline-block">
                    Ingresar al sistema
                </a>
            </div>


        </div>

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

            <div class="container position-relative">

                <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                    <h2>🩺Bienvenido a SaluS🩺</h2>
                    <p>Tu salud al alcance es nuestra mas grande prioridad </p>
                </div><!-- End Welcome -->

                <div class="content row gy-4">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                            <h3>¿Te sientes malito? 😷</h3>
                            <p>
                                Tratate con los mejores especialistas de la región, no dudes en contactarnos para
                                recibir la mejor atención médica.
                            </p>
                            <div class="text-center">
                                <a href="#about" class="more-btn"><span>Descubrenos</span> <i
                                        class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Why Box -->

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="row gy-4">

                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                                        <i class="bi bi-clipboard-data"></i>
                                        <h4>Informes medicos precisos 📃</h4>
                                        <p>Nuestro doctores especialisados te atienden y te curan👌</p>
                                    </div>
                                </div><!-- End Icon Box -->

                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                                        <i class="bi bi-gem"></i>
                                        <h4>Pagos faciles para la salud de tu cartera💰</h4>
                                        <p>Manejamos sistema de pago faciles para que no te preocupes hoy de tu salud💵</p>
                                    </div>
                                </div><!-- End Icon Box -->

                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                                        <i class="bi bi-inboxes"></i>
                                        <h4>Sistema solido de historial medico 🥼</h4>
                                        <p>Guardamos tu historial medico para futuras consultas tuyas con nosotros, indepentiende del doctor que te atienda 💊</p>
                                    </div>
                                </div><!-- End Icon Box -->

                            </div>
                        </div>
                    </div>
                </div><!-- End  Content-->

            </div>

        </section><!-- /Hero Section -->



        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4 gx-5">

                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                        <!--<a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>-->
                    </div>

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <h3>Comprometidos con el pueblo</h3>
                        <p>
                           Desde el recien nacido hasta el adulto mayor, ofrecemos atención médica integral y personalizada. Contamos con tecnología de punta, un equipo de especialistas altamente capacitados y un compromiso inquebrantable con la salud y el bienestar de nuestros pacientes. Nuestro objetivo es brindar servicios de calidad en un ambiente cálido y humano, asegurando que cada visita sea una experiencia positiva y reconfortante.
                        </p>
                        <ul>
                            <li>
                                <i class="fa-solid fa-vial-circle-check"></i>
                                <div>
                                    <h5>Medicamentos genericos y de patentes</h5>
                                    <p>Para que no te preocupes por tu salud y tu cartera, tenemos medicamentos genericos y de patentes</p>

                                </div>
                            </li>
                            <li>
                                <i class="fa-solid fa-pump-medical"></i>
                                <div>
                                    <h5>Higiene y en todos lados</h5>
                                    <p>El hospital mas higienico de los altos</p>
                                </div>
                            </li>
                            <li>
                                <i class="fa-solid fa-heart-circle-xmark"></i>
                                <div>
                                    <h5>Pasion y solidaridad</h5>
                                    <p>Nuestros doctores y personal estan listos para atenderte con una sonrisa siempre</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="fa-solid fa-user-doctor"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{$total_doctores}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Doctores</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="fa-regular fa-hospital"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{$total_consultorios}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Consultorios</p>
                        </div>
                    </div><!-- End Stats Item -->
                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="fa-solid fa-user-tie"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{$total_secretarias}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Secretarias</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="fa-solid fa-user-injured"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{$total_pacientes}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Pacientes</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->



        <!-- Departments Section -->
        <section id="departments" class="departments section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Especialidades</h2>
                <p>Nuestras especialidades mas pedidas </p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab"
                                    href="#departments-tab-1">Cardiologia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2">Neurologia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-3">Pediatria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-4">Ginecologia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-5">Oftamologia</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="departments-tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Cardiologia</h3>
                                        <p class="fst-italic">La cardiología es la especialidad médica que se encarga del estudio, diagnóstico y tratamiento de las enfermedades del corazón y del sistema circulatorio.</p>
                                        <p>En nuestro hospital, contamos con un equipo de cardiólogos altamente capacitados y tecnología de última generación para ofrecerte atención integral. Desde chequeos preventivos hasta tratamientos avanzados, estamos comprometidos con tu salud cardiovascular. Nuestro objetivo es ayudarte a mantener un corazón sano y una vida plena, brindándote el mejor cuidado posible en un ambiente cálido y profesional.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="departments-tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Neurologia</h3>
                                        <p class="fst-italic">La neurología es la especialidad médica que se ocupa del diagnóstico y tratamiento de los trastornos del sistema nervioso, que incluye el cerebro, la médula espinal y los nervios periféricos.</p>
                                        <p>En nuestro hospital, ofrecemos atención especializada en neurología con un enfoque integral y personalizado. Contamos con tecnología avanzada y un equipo de neurólogos expertos para tratar afecciones como migrañas, epilepsia, accidentes cerebrovasculares, trastornos del sueño y enfermedades neurodegenerativas. Nuestro objetivo es mejorar tu calidad de vida mediante un diagnóstico preciso y tratamientos efectivos en un ambiente de confianza y profesionalismo.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="departments-tab-3">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Pediatría</h3>
                                        <p class="fst-italic">La pediatría es la rama de la medicina que se dedica al cuidado y tratamiento de los niños, desde su nacimiento hasta la adolescencia.</p>
                                        <p>En nuestro hospital, ofrecemos atención pediátrica integral para garantizar el bienestar y desarrollo saludable de los más pequeños. Contamos con un equipo de pediatras especializados y un ambiente amigable para los niños, donde se sienten cómodos y seguros. Desde chequeos de rutina hasta el tratamiento de enfermedades complejas, estamos comprometidos con la salud de tus hijos.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="departments-tab-4">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Ginecología</h3>
                                        <p class="fst-italic">La ginecología es la especialidad médica que se enfoca en la salud del sistema reproductor femenino, incluyendo el útero, los ovarios y las mamas.</p>
                                        <p>En nuestro hospital, ofrecemos atención ginecológica integral para mujeres de todas las edades. Contamos con un equipo de especialistas altamente capacitados y tecnología avanzada para realizar diagnósticos precisos y tratamientos efectivos. Desde chequeos de rutina hasta procedimientos especializados, estamos comprometidos con tu bienestar y salud femenina en un ambiente de confianza y profesionalismo.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="departments-tab-5">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Urología</h3>
                                        <p class="fst-italic">La urología es la especialidad médica que se ocupa del diagnóstico y tratamiento de las enfermedades del sistema urinario en hombres y mujeres, así como del sistema reproductor masculino.</p>
                                        <p>En nuestro hospital, ofrecemos atención urológica integral con un equipo de especialistas altamente capacitados y tecnología avanzada. Tratamos afecciones como infecciones urinarias, cálculos renales, problemas de próstata, disfunción eréctil y más. Nuestro objetivo es brindarte un diagnóstico preciso y un tratamiento efectivo en un ambiente de confianza y profesionalismo.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="departments-tab-6">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Oftalmología</h3>
                                        <p class="fst-italic">La oftalmología es la especialidad médica que se dedica al diagnóstico, tratamiento y prevención de las enfermedades y trastornos relacionados con los ojos y la visión.</p>
                                        <p>En nuestro hospital, contamos con un equipo de oftalmólogos expertos y tecnología de vanguardia para ofrecerte una atención integral. Desde exámenes de la vista hasta cirugías avanzadas, estamos comprometidos con el cuidado de tu salud visual. Nuestro objetivo es ayudarte a mantener una visión clara y saludable en un ambiente profesional y acogedor.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-6.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Departments Section -->

        <!-- Doctors Section -->


        <!-- Faq Section -->


        <!-- Testimonials Section -->


        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery</h2>
                <p>Galeria de imagenes robadas para llenar el espacio</p>
            </div><!-- End Section Title -->

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-1.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-2.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-3.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-4.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-5.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-6.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-7.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-8.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                </div>

            </div>

        </section><!-- /Gallery Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Ubicacion</h2>
                <p>Obviamente no existe este hospital :v</p>
            </div><!-- End Section Title -->

            <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
                <iframe style="border:0; width: 100%; height: 270px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12554.47625073881!2d-102.36006349238836!3d20.691207063933184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84294b77aca029c3%3A0x8357a0e35012dbe2!2sInstituto%20Tecnol%C3%B3gico%20Superior%20de%20Arandas!5e0!3m2!1ses!2smx!4v1744175839364!5m2!1ses!2smx"
                    frameborder="0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div><!-- End Google Maps -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
<!--
                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Location</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div>

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div>

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>info@example.com</p>
                            </div>
                        </div> End Info Item

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                        required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div>
                -->
                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container footer-top">

        </div>

        <div class="container copyright text-center mt-4">
            <p><span>LARGA VIDA AL OPEN SOURCE</span> <strong class="px-1 sitename">SaluS</strong> <span>ChavaDEV</span>
            </p>

        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
