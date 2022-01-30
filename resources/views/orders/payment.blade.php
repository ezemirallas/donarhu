<x-app-layout>
@php
  //SDK de Mercado Pago
  require base_path('vendor/autoload.php');
  //Agrega credenciales
  MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

  $preference = new MercadoPago\Preference();
    $item = new MercadoPago\Item();
    $item->id = $donacion['id'];
    $item->title = $donacion['titulo'];
    // $item->description = "Descripción";
    // $item->category_id = "home";
    $item->quantity = $donacion['cantidad'];
    $item->unit_price = $donacion['precio'];
    $item->currency_id = "ARS";
    $preference->items = array($item);
    $preference->back_urls=array(
        "success"=>"https://localhost/donar/captura.php",
        "failure"=>"https://localhost/donar/fallo.php",
    );
    $preference->auto_return = "approved";
    $preference->binary_mode = true;
    $preference->save();
 
@endphp

	<script src="https://sdk.mercadopago.com/js/v2"></script>
	<script>
	  //Agrega credenciales de SDK
	  const mp = new MercadoPago("{{config('services.mercadopago.key')}}",{
	  	    locale: 'es-AR'

	  });

	  //Inicializa el checkout
	  mp.checkout({
	  	  preference:{
	  	  	id: '{{$preference->id}}'
	  	  },
	  	  render: {
	  	  	    container: '.cho-container', //Indica donde se mostrará el boton de pago
	  	  	    label: 'Pagar', //Cambia el texto del boton de pago (opcional)
	  	  }
	  	});
	</script>
</x-app-layout>
