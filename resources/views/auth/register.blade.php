@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-5">
            <div class="register-container">
                <div class="register-header">
                    <h1>Hospital <span>SaluS</span></h1>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-white">Crear Cuenta</h3>
                        </div>

                        <div class="form-floating mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   placeholder="Nombre completo">
                            <label for="name">Nombre completo</label>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="Correo electrónico">
                            <label for="email">Correo electrónico</label>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password"
                                   placeholder="Contraseña">
                            <label for="password">Contraseña</label>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Confirmar contraseña">
                            <label for="password-confirm">Confirmar contraseña</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-3">Registrarse</button>

                        <p class="text-center mt-3 mb-0 text-white">¿Ya tienes cuenta? <a href="{{ route('login') }}"
                                class="text-white fw-bold">Inicia sesión aquí</a></p>
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

    .register-container {
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 2rem;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }

    .register-header h1 {
        color: #fff;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .register-header span {
        color: #4a90e2;
    }

    .form-floating > .form-control {
        background: rgba(255, 255, 255, 0.9);
    }

    .form-floating > label {
        color: #666;
    }

    .btn-primary {
        background-color: #4a90e2;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #357ABD;
        transform: translateY(-2px);
    }
</style>
@endsection
