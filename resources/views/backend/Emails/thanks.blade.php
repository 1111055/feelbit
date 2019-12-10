@component('mail::message')
# {{$data->subject}}

Exº {{$data->nome}}

<center>
Acusa-mos a recepção do seu pedido de contacto. <br><br>
</center>

<center>
A equipa Ibero Brinde agradeçe o seu interesse, brevemente receberá noticias nossas. <br><br>
</center>

Os seus dados:

Nome: {{$data->nome}}
<hr>
Email: {{$data->email}}
<hr>
Telefone/Telemovel: {{$data->telefone}}
<hr>


@component('mail::button', ['url' => 'https://iberobrinde.com'])
Ibero Brinde
@endcomponent

<br><br>


<center>
<strong>Teste Mensagem</strong> 
</center>

<br><br>


www.iberobrinde.com<br>
{{ config('app.name') }}
@endcomponent
