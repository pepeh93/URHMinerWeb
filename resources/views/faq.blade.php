@extends('layout')
@section('styles')
    <style>
        .faq-title{
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
    @endsection
@section('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <h3 class="text-uppercase mb-0">Preguntas frecuentes</h3>
            <h4 style="font-weight:lighter;">Esta es la lista de preguntas frecuentes. Si tu pregunta no
            aparece en esta lista, podés contactarnos a través del <a href="{{route('contacto')}}" style="color:white">formulario de contacto</a></h4>
        </div>
    </header>
    <section>
        <div class="container card">
            <div class="card-body">
        <p class="faq-title">¿Qué es URH Miner?</p>
        <p >Es una aplicación la cual permite la minería para usuarios no familiarizados con la misma a través de
            aplicaciones de terceros funcionando como launcher.
            También cuenta con una aplicación mobile para la monitorización de la misma.</p>
        
        <p class="faq-title">¿Es URH Miner pago?</p>
        
        <p>No, tanto la aplicación de escritorio como mobile son gratuitas, al igual que las aplicaciones de minería que emplea URH Miner.</p>
        
        <p class="faq-title">¿Qué monedas soporta?</p>
        
        <p >Las monedas que comprende URH Miner son: Expanse - Ethereum - Ethereum Classic - Monero - Zcash</p>
        
        <p class="faq-title">¿Qué función cumple la aplicación de escritorio?</p>
        
        <p >Principalmente permite la minería de las criptomonedas anteriormente mencionadas a través del uso del CPU/GPU. También, posibilita calcular la rentabilidad que estas ofrecen, monitoreo de los componentes de tu equipo, eliminación de los DAGs y realizar un pequeño benchmark de referencia.</p>
        
        <p class="faq-title">¿Qué función cumple la aplicación mobile?</p>
        
        <p>Se encarga de poder controlar que los pools en los que estes minando no se encuentren caídos. También brinda la posibilidad de visualizar el hashrate al cual se encuentra tu equipo/rig trabajando. Poder visualizar la cotización de las critpomonedas anteriormente mencionadas.</p>
        
        <p class="faq-title">Calculadora de URH Miner</p>
        
        <p>Se encarga de brindar una aproximación teórica de cuanto gasto/beneficio tiene el usuario con respecto a una critpomoneda y una configuración de hardware.</p>
        
        <p class="faq-title">Benchmark de URH Miner</p>
        
        <p>Realiza calculos simples sobre el CPU/GPU/HDD(SSD) para ver en que estado se encuentran. Brinda un puntaje que se usa de referencia para tener una aproximación práctica.</p>
        
        <p class="faq-title">Acerca de hardware monitor</p>
        
        <p>Su función es indicar cuanto uso y temperatura tienen los componentes que se encuentran minando en tiempo real.</p>
        
        <p class="faq-title">¿Qué son los DAGs?</p>
        
        <p>DAG (Directed Acyclic Graph) Consiste en un conjunto de datos que son necesarios para realizar la mezcla de calculo-hash.</p>
        
        <p class="faq-title">¿Por qué eliminar los DAGs?</p>
        
        <p>En cuanto se este minando Ethereum y el mismo genere 0h/s, se recomienda eliminar los DAGs para volver a iniciar la minería y que estos se generen de nuevamente y evitar el bug de 0h/s.</p>
        
        <p class="faq-title">¿Tenés alguna otra consulta?</p>
        
        <p>No dudes en comunicarte a través del formulario.</p>
        </div>
        </div>
    </section>
@endsection
