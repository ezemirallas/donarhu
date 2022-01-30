<html>
    <head>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
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
                    <div class="card">

                        <div class="card-header">
                            Fundación Hospital Universitario
                        </div>

                        <div class="card-body">
                            <img src="img/donarhu.jpg" alt="Imagen" width="100%">
                            <h3 class=" text-center">Donación Fundación Hospital Universitario</h3>

                                <form  id="miformulario" name="formulario" method="POST" action="check" class="needs-validation" novalidate>
                                  {{csrf_field()}}

                                    <h4>Selecciona el monto a donar</h4>
                                    <div class="col-md-12" id="otroimporte">
                                            <label for="monto">Ingresa el monto que querés donar:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">$</span>
                                                </div>
                                                <input type="number"  min="1" pattern="^[0-9]+" class="form-control" name="amount" placeholder="Monto" aria-describedby="inputGroupPrepend" required value="1">
                                            </div>
                                            <div class="valid-feedback">Correcto!</div>
                                            <div class="invalid-feedback">Complete este campo</div>
                                    </div>
                                    
                                    <h4>Datos Personales</h4>
                                    
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="dni">DNI</label>
                                            <input type="text" class="form-control" name="dni" placeholder="DNI" value="24232482" required>
                                            <div class="valid-feedback">Correcto!</div>
                                            <div class="invalid-feedback">Complete este campo</div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="Cristian" required>
                                            <div class="valid-feedback">Correcto!</div>
                                            <div class="invalid-feedback">Complete este campo</div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="apellido">Apellido</label>
                                            <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="Reta" required>
                                            <div class="valid-feedback">Correcto!</div>
                                            <div class="invalid-feedback">Complete este campo</div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="telefono">Teléfono</label>
                                            <input type="text" class="form-control" name="telefono" placeholder="Teléfono" value="2612473560" required>
                                            <div class="valid-feedback">Correcto!</div>
                                            <div class="invalid-feedback">Complete este campo</div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="domicilio">Domicilio</label>
                                            <input type="text" class="form-control" name="domicilio" placeholder="Domicilio"value="Pedro Molina 2090" required>
                                            <div class="valid-feedback">Correcto!</div>
                                            <div class="invalid-feedback">Complete este campo</div>
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-primary" type="submit" id="donar">Donar</button>
                                    <input class="btn btn-info" type="reset" id="limpiar" value="Limpiar formulario">

                                </form>
                    
                </div>
                </div>                
            </div>
        </div>
        <script>
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