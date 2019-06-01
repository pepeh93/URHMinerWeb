@extends('layout')

@section('content')
    <div class="container text-center" style="margin-top:10em">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-fluid" src="images/logo.png" alt="">
                <div class="intro-text">
                    <h1 class="name" style="color:#2c3e50">URH Miner</h1>
                    <img class="img-fluid" src="images/separator.png" alt="">
                    <p style="color:#2c3e50" class="skills">Best hashrate ever!</p>
                    <br><br>
                    <div align="center">
                            @guest
                                <a class="btn btn-primary" href="{{route('login')}}">Empezar</a>
                            @else
                                <div class="alert alert-primary"> <b>Bienvenido a URH Miner</b>
                               Navegá nuestro sitio web o utilizá nuestra aplicación en tu dispositivo Android
                               para ver lo que URH Miner tiene para ofrecerte.</div>
                            @endguest
                    </div>

                    <p style="color:#2c3e50">LR 1.1
                    </p></div>
            </div>
        </div>
    </div>
@endsection
