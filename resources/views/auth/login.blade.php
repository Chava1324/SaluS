@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-4">
            <div class="login-container">
                <div class="login-header">
                    <h1>Hospital <span>SaluS</span></h1>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-white">Ingresa al sistema</h3>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required autofocus placeholder="Correo electrónico">
                            <label for="email">Correo electrónico</label>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                placeholder="Contraseña">
                            <label for="password">Contraseña</label>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <a class="text-white" href="#"> </a>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Iniciar sesión</button>

                        <p class="text-center mt-4 mb-0 text-white">¿No tienes cuenta? <a href="{{ route('register') }}"
                                class="text-white fw-bold">Regístrate aquí</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        background: url('https://www.expomedhub.com/img/blog/hospitales-tecnologicos---diseno-sin-titulo.jpg') no-repeat center center/cover;
        position: relative;
    }

    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }

    .login-container {
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 2rem;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }

    .login-header h1 {
        color: #fff;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .login-header span {
        color: #4a90e2;
    }

    /* Ajustes para los inputs con floating label */
    .form-floating>.form-control {
        background: rgba(255, 255, 255, 0.9);
    }

    .form-floating>label {
        color: #666;
    }
</style>
@endsection