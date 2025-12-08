<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Mot de passe oublié | CULTURE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #f5f6fa;
            font-family: "Source Sans Pro", sans-serif;
        }
        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }
        .form-control, .form-check-input {
            border-radius: 8px;
        }
        .custom-btn {
            border-radius: 8px;
            font-weight: 600;
        }
        .title {
            font-weight: 700;
            font-size: 1.4rem;
            text-align: center;
            margin-bottom: 10px;
        }
        .small-text {
            text-align: center;
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
    <div class="col-md-5">
        <div class="card p-4">

            <div class="title">Mot de passe oublié</div>
            <p class="small-text">
                Entrez votre adresse email et nous vous enverrons un lien
                pour réinitialiser votre mot de passe.
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success mt-3">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="mt-3">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Adresse Email</label>
                    <input type="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 custom-btn">
                    <i class="bi bi-envelope-arrow-up"></i>
                    Envoyer le lien de réinitialisation
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-decoration-none">
                    <i class="bi bi-arrow-left"></i> Retour à la connexion
                </a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
