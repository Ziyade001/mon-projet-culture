<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Inscription | CULTURE</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- ADMINLTE CSS -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">

    <!-- Font -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
          media="print" onload="this.media='all'">

    <!-- Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- OverlayScrollbars -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #1a237e, #4a148c);
            min-height: 100vh;
            font-family: 'Source Sans 3', sans-serif;
        }

        .register-logo a {
            color: white !important;
            font-size: 40px;
            font-weight: 800;
            text-shadow: 0px 3px 6px rgba(0,0,0,0.3);
        }

        .register-box {
            width: 420px;
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.35);
        }

        .register-card-body {
            padding: 35px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3949ab, #6a1b9a);
            border: none;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #303f9f, #4a148c);
        }

        .form-control {
            border-radius: 10px;
            height: 45px;
        }

        .input-group-text {
            border-radius: 10px;
        }

        .register-box-msg {
            font-size: 16px;
            font-weight: 600;
            color: #444;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            color: #4a148c !important;
            font-weight: 600;
        }
    </style>
</head>

<body class="register-page bg-body-secondary">

<div class="register-box">
    <div class="register-logo mb-3">
        <a href="#" class="fw-bold" style="font-size: 28px;">
            <span class="text-white">CULTURE</span>
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body register-card-body">

            <p class="register-box-msg mb-4">Créer un nouveau compte</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Prénom --}}
                <div class="input-group mb-2">
                    <input type="text"
                           name="prenom"
                           class="form-control @error('prenom') is-invalid @enderror"
                           value="{{ old('prenom') }}"
                           placeholder="Prénom"
                           required>
                    <div class="input-group-text">
                        <span class="bi bi-person"></span>
                    </div>
                </div>
                @error('prenom')
                    <span class="text-danger small d-block mb-2">{{ $message }}</span>
                @enderror

                {{-- Nom --}}
                <div class="input-group mb-2">
                    <input type="text"
                           name="nom"
                           class="form-control @error('nom') is-invalid @enderror"
                           value="{{ old('nom') }}"
                           placeholder="Nom"
                           required>
                    <div class="input-group-text">
                        <span class="bi bi-person"></span>
                    </div>
                </div>
                @error('nom')
                    <span class="text-danger small d-block mb-2">{{ $message }}</span>
                @enderror

                {{-- Email --}}
                <div class="input-group mb-2">
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="Email"
                           required>
                    <div class="input-group-text">
                        <span class="bi bi-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <span class="text-danger small d-block mb-2">{{ $message }}</span>
                @enderror

                {{-- Password --}}
                <div class="input-group mb-2">
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Mot de passe"
                           required>
                    <div class="input-group-text">
                        <span class="bi bi-lock-fill"></span>
                    </div>
                </div>
                @error('password')
                    <span class="text-danger small d-block mb-2">{{ $message }}</span>
                @enderror

                {{-- Password confirmation --}}
                <div class="input-group mb-3">
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Confirmer le mot de passe"
                           required>
                    <div class="input-group-text">
                        <span class="bi bi-lock-fill"></span>
                    </div>
                </div>

                {{-- Acceptation conditions --}}
                <div class="row mb-3">
                    <div class="col-8">
                        <div class="form-check">
                            <input type="checkbox"
                                   class="form-check-input"
                                   required>
                            <label class="form-check-label">
                                J’accepte les <a href="#">conditions</a>
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary w-100">
                            S’inscrire
                        </button>
                    </div>
                </div>

            </form>

            <p class="mb-0 text-center mt-2">
                <a href="{{ route('login') }}">
                    J’ai déjà un compte
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
