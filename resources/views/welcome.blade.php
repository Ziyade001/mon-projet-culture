<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Culture</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="blog culture béninoise, patrimoine Bénin, traditions africaines, actualités culturelles Bénin, art béninois" name="keywords">
    <meta content="Blog dédié à la culture béninoise : articles sur le patrimoine, les traditions, l'art et les actualités culturelles du Bénin" name="description">

    <!-- Favicon -->
    <link href="{{ asset('front/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ URL::asset('front/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ URL::asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ URL::asset('front/css/style.css') }}" rel="stylesheet">
    
 <style>
        .blog-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
            height: 100%;
        }
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .blog-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .category-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 2;
        }
        .blog-meta {
            font-size: 0.85rem;
            color: #6c757d;
        }
        .section-title {
            position: relative;
            margin-bottom: 50px;
        }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #0d6efd;
        }
        .culture-section {
            padding: 80px 0;
        }
        .sidebar-widget {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
        }
        .popular-post {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        .popular-post:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        .popular-post-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
        }
        .tag-cloud a {
            display: inline-block;
            background: #fff;
            padding: 5px 15px;
            margin: 5px;
            border-radius: 20px;
            border: 1px solid #dee2e6;
            text-decoration: none;
            color: #495057;
            transition: all 0.3s;
        }
        .tag-cloud a:hover {
            background: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
        }
        .author-card {
            text-align: center;
            padding: 30px 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        .author-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .newsletter-widget {
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            color: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
        }

    /* Cercle des icônes */
    .icon-circle {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }

    /* Effet au survol */
    .card-hover {
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        border-color: #e5e5e5;
    }

 </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="{{ route('accueil') }}" class="navbar-brand d-flex align-items-center">
                <img
                    src="{{ URL::asset('img/AdminLTELogo.png') }}"
                    alt="Logo Blog Culture Béninoise"
                    class="me-2" 
                    style="height: 50px; width: auto;"
                >
                <h1 class="m-0 text-primary fs-3">CULTURE</h1>
            </a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('accueil') }}#patrimoine" class="nav-item nav-link">Patrimoine</a>
                    <a href="{{ route('accueil') }}#traditions" class="nav-item nav-link">Traditions</a>
                    <a href="{{ route('accueil') }}#art" class="nav-item nav-link">Art & Culture</a>
                    <a href="{{ route('accueil') }}#actualites" class="nav-item nav-link">Actualités</a>
                    <a href="{{ route('accueil') }}#apropos" class="nav-item nav-link">À propos</a>
                </div>
                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Découvrir</a>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Hero Section Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('front/img/carousel-1.jpg') }}" alt="Porte du Non-Retour Ouidah">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .3);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Blog Culturel du Bénin</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Découvrez la richesse culturelle béninoise à travers nos articles, reportages et analyses.</p>
                                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Lire les contenus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('front/img/carousel-2.jpg') }}" alt="Palais royaux d'Abomey">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .3);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Patrimoine & Traditions</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Plongez dans l'histoire et les traditions vivantes du Bénin, berceau de cultures ancestrales.</p>
                                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Explorer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Section End -->

        <!-- Derniers Articles Start -->
        <div class="container-xxl py-5" id="actualites">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" style="max-width: 600px;">
            <h1 class="mb-3 section-title fw-bold">Derniers Articles</h1>
            <p class="text-muted">Découvrez nos dernières publications sur la culture béninoise</p>
        </div>

        <div class="row g-4">

            <!-- Article -->
            <div class="col-lg-4 col-md-6 wow fadeInUp">
                <div class="blog-card">
                    <div class="position-relative">
                        <img class="img-fluid blog-img" src="{{ asset('front/img/article-1.jpg') }}" alt="Festival Vodoun à Ouidah">
                        <span class="badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill">Festivals</span>
                    </div>
                    <div class="p-4">
                        <div class="blog-meta mb-3 text-muted small d-flex align-items-center">
                            <i class="far fa-calendar-alt me-2"></i>01 Jan, 2023
                            <span class="ms-4"><i class="far fa-comments me-2"></i>15 Commentaires</span>
                        </div>
                        <h5 class="fw-semibold mb-3">Le Festival Vodoun : Célébration des traditions ancestrales</h5>
                        <p class="text-muted">Plongée au cœur de la célébration annuelle du Vodoun à Ouidah, ses rituels, danses et son importance culturelle.</p>
                        <a class="text-primary fw-semibold" href="#">
                            Lire la suite <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Article -->
             
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="blog-card">
                    <div class="position-relative">
                        <img class="img-fluid blog-img" src="{{ asset('front/img/article-2.jpg') }}" alt="Artisanat béninois">
                        <span class="badge bg-success position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill">Artisanat</span>
                    </div>
                    <div class="p-4">
                        <div class="blog-meta mb-3 text-muted small d-flex align-items-center">
                            <i class="far fa-calendar-alt me-2"></i>15 Déc, 2022
                            <span class="ms-4"><i class="far fa-comments me-2"></i>23 Commentaires</span>
                        </div>
                        <h5 class="fw-semibold mb-3">L'Artisanat Béninois : Un héritage à préserver</h5>
                        <p class="text-muted">Découverte des techniques ancestrales qui font la renommée de l'artisanat béninois.</p>
                        <a class="text-primary fw-semibold" href="#">
                            Lire la suite <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Article -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
    <div class="blog-card">
        <div class="position-relative">
            <img class="img-fluid blog-img" src="{{ asset('front/img/article-3.jpg') }}" alt="Cuisine béninoise">
            <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill">Gastronomie</span>
        </div>
        <div class="p-4">
            <div class="blog-meta mb-3 text-muted small d-flex align-items-center">
                <i class="far fa-calendar-alt me-2"></i>05 Déc, 2022
                <span class="ms-4"><i class="far fa-comments me-2"></i>18 Commentaires</span>
            </div>
            <h5 class="fw-semibold mb-3">Saveurs du Bénin : Immersion au cœur d’une gastronomie authentique</h5>
            <p class="text-muted">Un voyage sensoriel à la découverte des mets emblématiques du Bénin, entre tradition, arômes uniques et héritage culinaire.</p>
            <a class="text-primary fw-semibold" href="#">
                Lire la suite <i class="fa fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>


        </div>

        <div class="text-center mt-5 wow fadeInUp">
            <a href="{{ route('contenus.index') }}" class="btn btn-primary rounded-pill py-3 px-5 fw-semibold">
                Voir tous les articles
            </a>
        </div>
    </div>
</div>

        <!-- Derniers Articles End -->

        <!-- À Propos & Sidebar Start -->
        <div class="container-xxl py-5 culture-section bg-light" id="apropos">
            <div class="container">
                <div class="row g-5">
                    <!-- Contenu Principal -->
                    <div class="col-lg-8">
                        <div class="row g-5">
                            <!-- Section À Propos -->
                            <div class="col-12 wow fadeInUp">
                                <h1 class="mb-4 section-title">À Propos</h1>
                                <p class="mb-4">Votre référence en matière d'information sur le patrimoine, les traditions et l'actualité culturelle du Bénin.</p>
                                <p>Notre mission est de préserver, promouvoir et partager la richesse culturelle béninoise à travers des articles documentés, des reportages immersifs et des analyses approfondies.</p>
                                
                                <div class="row g-4 mt-4">
                                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0 btn-square bg-primary text-white rounded-circle me-3">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <h6 class="mb-0">Équipe de passionnés</h6>
                                        </div>
                                        <span>Anthropologues, historiens et journalistes culturels</span>
                                    </div>
                                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0 btn-square bg-primary text-white rounded-circle me-3">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <h6 class="mb-0">Contenu vérifié</h6>
                                        </div>
                                        <span>Articles documentés et sources fiables</span>
                                    </div>
                                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0 btn-square bg-primary text-white rounded-circle me-3">
                                                <i class="fa fa-globe-africa"></i>
                                            </div>
                                            <h6 class="mb-0">Couverture nationale</h6>
                                        </div>
                                        <span>Toutes les régions du Bénin représentées</span>
                                    </div>
                                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0 btn-square bg-primary text-white rounded-circle me-3">
                                                <i class="fa fa-comments"></i>
                                            </div>
                                            <h6 class="mb-0">Communauté active</h6>
                                        </div>
                                        <span>Échanges et partages culturels</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Section Patrimoine -->
                            <div class="col-12 wow fadeInUp" id="patrimoine">
                                <h2 class="mb-4">Patrimoine Culturel</h2>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="blog-card">
                                            <img class="img-fluid blog-img" src="{{ asset('front/img/patrimoine-1.jpg') }}" alt="Palais royaux d'Abomey">
                                            <div class="p-4">
                                                <h5 class="mb-3">Les Palais Royaux d'Abomey</h5>
                                                <p>Découverte de l'histoire des rois du Dahomey et de leur héritage architectural classé à l'UNESCO.</p>
                                                <a class="text-primary" href="">Lire l'article <i class="fa fa-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="blog-card">
                                            <img class="img-fluid blog-img" src="{{ asset('front/img/patrimoine-2.jpg') }}" alt="Route de l'Esclave">
                                            <div class="p-4">
                                                <h5 class="mb-3">La Route de l'Esclave à Ouidah</h5>
                                                <p>Retour sur le parcours historique des esclaves et la mémoire de cette tragédie humaine.</p>
                                                <a class="text-primary" href="">Lire l'article <i class="fa fa-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <!-- Auteur -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="author-card">
                                <img class="author-img mb-3" src="{{ asset('front/img/author.jpg') }}" alt="Rédacteur en chef">
                                <h5>Koffi Adjamonsi</h5>
                                <p class="text-muted">Rédacteur en Chef & Anthropologue</p>
                                <p>Spécialiste des cultures ouest-africaines, je partage ma passion pour le patrimoine béninois depuis plus de 10 ans.</p>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Articles Populaires -->
                        <div class="sidebar-widget wow fadeInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Articles Populaires</h4>
                            <div class="popular-post">
                                <img class="popular-post-img" src="{{ asset('front/img/popular-1.jpg') }}" alt="Tissage traditionnel">
                                <div class="popular-post-content">
                                    <h6><a href="#" class="text-dark">L'Art du Tissage au Bénin</a></h6>
                                    <small>Jan 15, 2023</small>
                                </div>
                            </div>
                            <div class="popular-post">
                                <img class="popular-post-img" src="{{ asset('front/img/popular-2.jpg') }}" alt="Musique traditionnelle">
                                <div class="popular-post-content">
                                    <h6><a href="#" class="text-dark">Rythmes et Tambours du Sud-Bénin</a></h6>
                                    <small>Déc 10, 2022</small>
                                </div>
                            </div>
                            <div class="popular-post">
                                <img class="popular-post-img" src="{{ asset('front/img/popular-3.jpg') }}" alt="Cérémonie traditionnelle">
                                <div class="popular-post-content">
                                    <h6><a href="#" class="text-dark">Cérémonies de Réjouissance chez les Fon</a></h6>
                                    <small>Nov 28, 2022</small>
                                </div>
                            </div>
                        </div>


                        <!-- Newsletter -->
                        <div class="newsletter-widget wow fadeInUp" data-wow-delay="0.5s">
                            <h4 class="text-white mb-4">Newsletter</h4>
                            <p class="text-white">Recevez nos derniers articles directement dans votre boîte mail.</p>
                            <div class="position-relative">
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Votre email">
                                <button type="button" class="btn btn-dark py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">S'abonner</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- À Propos & Sidebar End -->

        <!-- Traditions Start -->
        <div class="container-xxl py-5 culture-section" id="traditions">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" style="max-width: 600px;">
                    <h1 class="mb-3 section-title">Traditions & Coutumes</h1>
                    <p>Exploration des pratiques culturelles qui font l'identité du peuple béninois</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <div class="blog-card">
                            <img class="img-fluid blog-img" src="{{ asset('front/img/tradition-1.jpg') }}" alt="Cérémonie Vodoun">
                            <div class="p-4">
                                <h5 class="mb-3">Le Vodoun : Religion et Philosophie de Vie</h5>
                                <p>Comprendre les fondements du Vodoun, bien au-delà des clichés et des idées reçues.</p>
                                <a class="text-primary" href="">Lire l'article <i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-card">
                            <img class="img-fluid blog-img" src="{{ asset('front/img/tradition-2.jpg') }}" alt="Mariage traditionnel">
                            <div class="p-4">
                                <h5 class="mb-3">Rites et Cérémonies de Mariage</h5>
                                <p>Les différentes étapes et significations des cérémonies matrimoniales traditionnelles.</p>
                                <a class="text-primary" href="">Lire l'article <i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-card">
                            <img class="img-fluid blog-img" src="{{ asset('front/img/tradition-3.jpg') }}" alt="Fête traditionnelle">
                            <div class="p-4">
                                <h5 class="mb-3">Fêtes Saisonnières et Agricoles</h5>
                                <p>Comment les communautés célèbrent les cycles naturels et agricoles au Bénin.</p>
                                <a class="text-primary" href="">Lire l'article <i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Traditions End -->

        <!-- Art & Culture Start -->
        <div class="container-xxl py-5 culture-section bg-light" id="art">
    <div class="container">

        <!-- Titre -->
        <div class="text-center mx-auto mb-5 wow fadeInUp" style="max-width: 650px;">
            <h1 class="mb-3 section-title fw-bold">Art & Culture Contemporaine</h1>
            <p class="text-muted fs-5">La scène artistique béninoise entre tradition et modernité</p>
        </div>

        <!-- Cartes -->
        <div class="row g-4">

            <!-- Carte 1 -->
            <div class="col-md-6 col-lg-3 wow fadeInUp">
                <div class="rounded-4 bg-white shadow-sm text-center p-4 card-hover">
                    <div class="icon-circle bg-primary mx-auto mb-4">
                        <i class="fa fa-paint-brush fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Arts Visuels</h5>
                    <p class="text-muted mb-0">
                        Peinture, sculpture et arts numériques des talents béninois contemporains.
                    </p>
                </div>
            </div>

            <!-- Carte 2 -->
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="rounded-4 bg-white shadow-sm text-center p-4 card-hover">
                    <div class="icon-circle bg-success mx-auto mb-4">
                        <i class="fa fa-music fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Musique Moderne</h5>
                    <p class="text-muted mb-0">
                        Fusion innovante entre rythmes traditionnels et tendances actuelles.
                    </p>
                </div>
            </div>

            <!-- Carte 3 -->
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="rounded-4 bg-white shadow-sm text-center p-4 card-hover">
                    <div class="icon-circle bg-warning mx-auto mb-4">
                        <i class="fa fa-theater-masks fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Théâtre & Danse</h5>
                    <p class="text-muted mb-0">
                        Des créations scéniques inspirées du patrimoine culturel béninois.
                    </p>
                </div>
            </div>

            <!-- Carte 4 -->
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="rounded-4 bg-white shadow-sm text-center p-4 card-hover">
                    <div class="icon-circle bg-info mx-auto mb-4">
                        <i class="fa fa-film fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Cinéma</h5>
                    <p class="text-muted mb-0">
                        Le renouveau du cinéma béninois porté par une nouvelle génération de réalisateurs.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>



        <!-- Art & Culture End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Blog Culture Béninoise</h3>
                        <p>Votre source d'information sur le patrimoine, les traditions et l'actualité culturelle du Bénin.</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Navigation</h3>
                        <a class="btn btn-link text-white-50" href="{{ route('accueil') }}">Accueil</a>
                        <a class="btn btn-link text-white-50" href="#patrimoine">Patrimoine</a>
                        <a class="btn btn-link text-white-50" href="#traditions">Traditions</a>
                        <a class="btn btn-link text-white-50" href="#art">Art & Culture</a>
                        <a class="btn btn-link text-white-50" href="#actualites">Actualités</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Liens Utiles</h3>
                        <a class="btn btn-link text-white-50" href="{{ route('login') }}">Espace Membre</a>
                        <a class="btn btn-link text-white-50" href="">Archives</a>
                        <a class="btn btn-link text-white-50" href="">Contribuer</a>
                        <a class="btn btn-link text-white-50" href="">Mentions légales</a>
                        <a class="btn btn-link text-white-50" href="">Politique de confidentialité</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Contact</h3>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Cotonou, Bénin</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+229 12 34 56 78</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>contact@blogculturebenin.bj</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Blog Culture Béninoise</a>, Tous droits réservés.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="{{ route('accueil') }}">Accueil</a>
                                <a href="">Cookies</a>
                                <a href="">Aide</a>
                                <a href="">FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('front/lib/wow/wow.min.js') }}"></script>
    <script src="{{ URL::asset('front/lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('front/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ URL::asset('front/js/main.js') }}"></script>
</body>

</html>