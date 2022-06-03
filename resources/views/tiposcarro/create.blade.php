@extends('master')

@section("body")
@php
$paginas = collect([
    ["link"=>"/", "nm_pag" => "Dashboard"], 
    ["link"=>"/tiposcarro", "nm_pag" => "Tipos de Carro"],
    ["link"=>"", "nm_pag" => "Adicionar Tipo de Carro"],
])->collect();
@endphp

<x-breadcrumb :paginas="$paginas" />
<div class="pt-5">
    <div class="card-display border-bottom-orange col-lg-5 col-md-7 col-sm-8 col-12 mx-auto">
        <h2 class="rounded bg-primary-dark border-bottom-orange text-white p-2 col-12" >Adicionar Tipo de Carro</h2>
        <div class="p-2 card-title mb-0">
            <!-- <hr class="p-1 m-0 bg-primary col-xl-8 col-lg-10 col-md-10 col-sm-12 col-md-6" style="opacity: 100%; padding-top: 0"> -->
        </div>
        <div class="card-body">
            <form class="" action="/tiposcarro" method="POST">
                @csrf
                <div class="p-2">
                    <div class="form-floating">
                        @if($errors->has('nm_tipo'))
                        <input aria-describedby="invalid-feedback" class="form-control is-invalid" type="text" name="nm_tipo" id="nm_tipo" placeholder="Nome Peça" value="{{old('nm_tipo')}}">
                        <div class="invalid-feedback">
                            {{ $errors->first('nm_tipo') }}
                        </div>
                        @else
                        <input class="form-control" type="text" name="nm_tipo" id="nm_tipo" placeholder="Nome do Tipo de Carro" value="{{old('nm_tipo')}}">
                        @endif
                        <label for="nm_tipo">Nome do Tipo de Carro</label>
                    </div>
                </div>
                <div class="p-2">
                    <input class="btn btn-success" type="submit" value="Salvar">
                    <a href="/tiposcarro">
                        <button class="btn btn-danger" type="button">
                            Voltar
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection