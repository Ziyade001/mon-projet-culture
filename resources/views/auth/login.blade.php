<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Connexion | CULTURE</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- ADMINLTE -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}" /> 

    <!-- Font -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
          media="print" onload="this.media='all'">

    <!-- Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- OverlayScrollbars -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/overlaysscrollbars@2.11.0/styles/overlayscrollbars.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #3545f5ff, #ffffffff);
            min-height: 100vh;
            font-family: 'Source Sans 3', sans-serif;
        }

        .login-logo a {
            color: white !important;
            font-size: 40px;
            font-weight: 800;
            text-shadow: 0px 3px 6px rgba(0,0,0,0.3);
        }

        .login-box {
            width: 420px;
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.35);
        }

        .login-card-body {
            padding: 35px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3949ab, #3045fcff);
            border: none;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #303f9f, #3045fcff);
        }

        .form-control {
            border-radius: 10px;
            height: 45px;
        }

        .input-group-text {
            border-radius: 10px;
        }

        .login-box-msg {
            font-size: 16px;
            font-weight: 600;
            color: #444;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            color: #3045fcff !important;
            font-weight: 600;
        }
    </style>
</head>

<body class="login-page">

<div class="login-box">
    <div class="login-logo mb-4">
        <img
        src="{{ URL::asset('img/AdminLTELogo.png') }}"
        alt="Logo"
        class="me-2" 
        style="height: 50px; width: auto;"
        >
        <a href="{{ route('accueil') }}">CULTURE</a>
    </div>

    

    <div class="card">
        <div class="card-body login-card-body">

            <p class="login-box-msg">Bienvenue 👋 <br> Connectez-vous pour accéder à votre espace</p>

            <!-- Formulaire Breeze -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="input-group mb-4">
                    <input type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="Adresse email"
                           required autofocus>

                    <div class="input-group-text">
                        <span class="bi bi-envelope"></span>
                    </div>
                </div>

                @error('email')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror

                <!-- Password -->
                <div class="input-group mb-4">
                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Mot de passe"
                           required>

                    <div class="input-group-text">
                        <span class="bi bi-lock-fill"></span>
                    </div>
                </div>

                @error('password')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror

                <div class="row mb-3">
                    <div class="col-8">
                        <div class="form-check">
                            <input type="checkbox" name="remember"
                                   class="form-check-input" id="remember">

                            <label class="form-check-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary w-100">
                            Connexion
                        </button>
                    </div>
                </div>
            </form>

            <p class="mb-1">
                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            </p>

            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">
                    Créer un compte
                </a>
            </p>

        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('js/adminlte.js') }}"></script>

</body>
</html>
