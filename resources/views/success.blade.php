<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <br>
                    <div class="card text-white bg-success mb-12" style="max-width: 50rem;">

                        <div class="card-header">
                            Fundación Hospital Universitario
                        </div>

                        <div class="card-body">
                            <h2 class="text-center"><b><i>Pago Exitoso</i></b></h2>
                            <h3 class="text-center">Donación Fundación Hospital Universitario</h3>
                            <h5 class="">ID de Pago: {{$payment_id}} </h5>
                            <h5 class="">Estado: 
                                @switch($status)
                                    @case('approved')
                                        Pago aprobado
                                        @break

                                    @case('pending')
                                        Pago pendiente
                                        @break

                                    @default
                                        Pago rechazado
                                @endswitch
                            </h5>
                            {{--<h5 class="">Tipo: {{$payment_type}} </h5>--}}
                        </div>
                </div>                
            </div>
        </div>
    </body>
</html>