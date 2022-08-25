@extends('site.layouts.basico')

@section('titulo','Super Gestão - Contacto')
@section('conteudo')

        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Entre em contato conosco</h1>
            </div>

            <div class="informacao-pagina">
                <div class="contato-principal">
                   @component('site.layouts._components.form_contacto',['class'=>'borda-preta','motivo_contactos' => $motivo_contactos])
                   <p> A nossa equipa analisará a sua mensagem e retornaremos mais breve possível.</p>
                   <p> Nosso tempo médio de resposta é de 3 minutos </p>
                   @endcomponent
                </div>
            </div>  
        </div>

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
                <img src="{{ asset('img/facebook.png') }}">
                <img src="{{ asset('img/linkedin.png') }}">
                <img src="{{ asset('img/youtube.png') }}">
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(+244) 946-636-594</span>
                <br>
                <span>supergestao@dominio.co.ao</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
                <img src="{{ asset('img/mapa.png') }}">
            </div>
        </div>

       
@endsection