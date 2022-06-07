@extends('master')

@section("body")
@php
$paginas = collect([
    ["link"=>"/loja/".session("empresa")->url_customizada, "nm_pag" => "Início"], 
    ["link"=>"/pedidos", "nm_pag" => "Pagamento"],
])->collect();
@endphp

<x-breadcrumb :paginas="$paginas" />
<div class="col-lg-5 col-md-7 col-sm-8 col-12 mx-auto pb-5">
    <div class="card-display border-bottom-orange">
        <h2 class="col-12 rounded bg-primary-dark border-bottom-orange text-white p-2 col-12">
            Pagamento
        </h2>
        <div class="card-title">
            <h1 class="text-center">Parabéns! Seu Pedido foi Finalizado</h1>
        </div>
        <div class="card-body">
            <h3 class="text-center">Agora é só pagar seu "PIX", ou copiar o link no seu navegador!</h3>
            <div class="text-center">
                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{env('APP_ENV') != 'local' ? 'https://'.$_SERVER['HTTP_HOST'].'/loja/'.session('empresa')->url_customizada : 'http://'.$_SERVER['HTTP_HOST'].'/loja/'.session('empresa')->url_customizada}}/pedido/pagar/concluir/{{$pedido->id}}" title="Link to Google.com" width="300px" />
                <p>
                {{env('APP_ENV') != 'local' ? 'https://'.$_SERVER['HTTP_HOST'].'/loja/'.session('empresa')->url_customizada : 'http://'.$_SERVER['HTTP_HOST'].'/loja/'.session('empresa')->url_customizada}}/pedido/pagar/concluir/{{$pedido->id}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection