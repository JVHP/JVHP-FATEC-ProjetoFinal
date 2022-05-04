@extends('master')

@section("body")
<div class="card p-2">
    <div class="mx-auto row col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="px-0 col-lg-6 col-md-6 col-sm-12 col-12 text-lg-start text-md-start text-sm-center text-center">
            <h1 class="rounded bg-primary-dark border-bottom-orange text-white p-2 col-lg-6 col-md-6 col-sm-12 col-12">Pedidos</h1>
        </div>
    </div>
    <div class="pt-3 table-responsive">
        @if(sizeof($pedidos) > 0)
        <table class="rounded table">
            <thead class="bg-primary-dark text-white">
                <tr>
                    <th class="m-0 text-center">Id</th>
                    <th class="m-0 text-center">Data do Pedido</th>
                    <th class="m-0 text-center">Total</th>
                    <th class="m-0 text-center">Status</th>
                    <th class="m-0 text-center">Data do Pagamento</th>
                    <th class="m-0 text-center">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($pedidos as $x)
                <tr>
                    <td class="m-0 text-center">{{$x->id}}</td>
                    <td class="m-0 text-center">{{$x->dt_pedido}}</td>
                    <td class="m-0 text-center">R$ {{number_format($x->vl_preco_total, 2, ',')}}</td>
                    <td class="m-0 text-center">{{$x->ck_finalizado == 'S' ? 'Finalizado' : ($x->ck_finalizado == 'N' ? 'Não Finalizado' : ($x->ck_finalizado == 'C' ? 'Cancelado' : ''))}}</td>
                    <td class="m-0 text-center">{{$x->dt_pagamento}}</td>
                    <td class="m-0 text-center">
                        <div class="justify-content-center row col-auto">
                        @if($x->ck_finalizado == 'S' && $x->dt_pagamento == null)
                        <a href="/pedido/pagar/{{$x->id}}" class="col-auto">
                            <button class="btn btn-outline-info">Pagar</button>
                        </a>
                        
                        @elseif($x->ck_finalizado == 'N' && $x->dt_pagamento == null)
                        <a href="/pedido/cancelar/{{$x->id}}" class="col-auto">
                            <button class="btn btn-outline-warning">Cancelar</button>
                        </a>
                        @endif
                        @if(($x->ck_finalizado != 'N' && $x->dt_pagamento != null) || ($x->ck_finalizado == 'C' && $x->dt_pagamento == null))
                        <form action="/pedido/{{$x->id}}" method="POST" class="col-auto">
                            @csrf
                            @METHOD('DELETE')
                            <input type="submit" class="btn btn-outline-danger" value="Excluir"/>
                        </form>
                        @endif
                        <a href="/pedido/{{$x->id}}" class="col-auto">
                            <button class="btn btn-outline-success">Visualizar</button>
                        </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-end">

        </div>
        @else
        <div class="card" style="height: 25vh;">
            <h1 class="m-auto my-auto">
                Não foi realizado nenhum pedido
            </h1>
        </div>
        @endif
    </div>
</div>
@endsection