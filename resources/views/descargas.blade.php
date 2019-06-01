@extends('layout')
@section('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <h3 class="text-uppercase mb-0">Descargas</h3>
            <h4 style="font-weight:lighter;">Usá URH Miner en todos tus dispositivos. Descargá nuestra aplicación para Windows y Android.</h4>
        </div>
    </header>
    <section>
    <div class="container-fluid" >
<div class="row">
    <div class="col-md-6">
    <div class="card shadow-sm">
        <div class="card-header">
            Aplicación de escritorio para Microsoft Windows
        </div>
    <div class="card-body text-center">
            <img src="images/win10.png" style="width:180px;height:180px;text-align:center;" class="img-fluid mb-3">
            <p class="font-weight-bold">Especificaciones</p>

                <p>OS: Windows 10 x64</p>
                <p>RAM: 4GB</p>
                <p>GPU*: 4GB</p>
                <p>GPU* Se necesita mínimo 4GB para poder minar ciertas criptomonedas.</p>
                <p>Para más información consulte el <a href="/archivos-descargas/manual.pdf">manual.</a></p>

        <a href="/archivos-descargas/urhminer.exe" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp;Descargar</a>

    </div></div></div>

    <div class="col-md-6">

    <div class="card shadow-sm">
        <div class="card-header">
            Aplicación para dispositivos con Android
        </div>
        <div class="card-body text-center">

            <img src="images/android.png" border="0" width="180" height="180" class="mb-3">
            <p class="font-weight-bold">Especificaciones</p>

                <p>OS: Android 6.0 o superior.</p>

            <a href="/archivos-descargas/urhminer.apk" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp;Descargar</a>
        </div>

    </div>
    </div>

</div>
    </div>
    </section>
@endsection
