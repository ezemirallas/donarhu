@php
// SDK de Mercado Pago
require base_path('/vendor/autoload.php');

// Agrega credenciales
MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Donación Fundación Hospital Universitario';
$item->quantity = 1;
$item->unit_price = $amount;
$item->currency_id = "ARS";
$preference->items = array($item);
$preference->back_urls = array(
    "success" => "http://localhost:8000/success",
    "failure" => "http://localhost:8000/failure",
    "pending" => "http://localhost:8000/pending"
);
$preference->auto_return = "approved";
$preference->save();


@endphp

<html>
    <head>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
            input {
                border: 0 !important;
                background-color: transparent !important;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <br>
                    <div class="card">

                        <div class="card-header">
                            Fundación Hospital Universitario
                        </div>

                        <div class="card-body">
                            <img src="img/donarhu.jpg" alt="Imagen" width="100%">
                            <h3 class=" text-center">Donación Fundación Hospital Universitario</h3>

                                <form  id="miformulario" name="formulario" method="POST" action="enviar" novalidate>
                                  {{csrf_field()}}

                                    <div class="card-body">
                                        
                                        <h5 class="">DNI: <input name="dni" value="{{ $dni }}" readonly></h5>
                                        <h5 class="">Donador: {{ $nombre }} {{ $apellido }}</h5>
                                        <input type="hidden" name="nombre" value="{{ $nombre }}"> 
                                        <input type="hidden" name="apellido" value="{{ $apellido }}">
                                        <h5 class="">Domicilio: <input name="domicilio" value="{{ $domicilio }}" readonly></h5>
                                        <h5 class="">Teléfono: <input name="telefono" value="{{ $telefono }}" readonly></h5>
                                        <h5 class="">Donación: <b><i>$ <input name="amount" value="{{ $amount }}" readonly><i><b></h5>
                                    </div>
                                    <div class="g-recaptcha" data-sitekey="6LdZ50YeAAAAAB-L6rvX4YPDvBHWBQfd7c9oMofG"></div>
                                    <input type="hidden" name="checkout" value="{{$preference->init_point}}">
                                    <input type="hidden" name="preference_id" value="{{$preference->id}}">
                                    <button class="btn btn-success" type="submit" id="procesar">Procesar</button>
                                    <a href="javascript:history.back()">
                                        <button class="btn btn-warning" type="button" id="corregir">Corrigir datos</button>
                                    <a>
                                </form>
                    
                </div>
                </div>                
            </div>
        </div>
        <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
            locale: "es-AR",
        });
        
        // Inicializa el checkout
        mp.checkout({
            preference: {
                id: "{{ $preference->id }}",
            },
        });

        (function() {

            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);

        })();
        </script>
    </body>
</html>