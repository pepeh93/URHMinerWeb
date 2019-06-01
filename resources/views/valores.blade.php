@extends('layout')

@section('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <h3 class="text-uppercase mb-0">Valores</h3>
            <h4 style="font-weight:lighter;">Valores actualizados de tus criptomonedas.</h4>
        </div>
    </header>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" align="center">

                <h2><br><br>
                    Bitcoin
                </h2>

                <p>
                    Valor del bitcoin. Actualizado cada minuto.
                </p>
                <br>
                <div id="coindesk-widget" data-size="mpu"></div><script type="text/javascript"
                                                                        src="//widget.coindesk.com/bpiticker/coindesk-widget.min.js?1fee9b"></script>
                <p>
                    <a href="https://coinmarketcap.com/es/currencies/bitcoin/">Ver valor »</a>
                </p>
            </div>
            <div class="col-md-4" align="center">
                <h2><br><br>
                    Dificultad
                </h2>
                <p>
                    Dificultad del bitcoin 7182852313938
                </p>
                <p>
                    <a class="btn" href="#">View details »</a>
                </p>


            </div>

            <div class="col-md-4" align="center">

                <h2><br><br>
                    Dificultad
                </h2>
                <p>
                    Dificultad del bitcoin 7182852313938
                </p>
                <p>
                    <a class="btn" href="#">View details »</a>
                </p>
            </div>
        </div>
    </div>
    </section>

@endsection
