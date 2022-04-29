@extends('master')

@section('banner')
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="d-flex justify-content-center bg-primary-dark">
        <img class="img-fluid w-xl-0 w-lg-75" src="{{URL::asset('images/banner-loja.png')}}" alt=""><!-- melhorar banner -->
    </div>
</div>
@endsection

@section('body')


<!-- <hr class="p-1 bg-primary col-lg-3 col-md-3 col-sm-12 col-md-6" style="opacity: 100%;"> -->
<!-- Antigas DIVs para os cards de produto, talvez utilizar em outra páginas ;)
    <div class="row mx-auto col-lg-12 col-md-12 col-sm-12 col-12 pb-5">
    <div class="mx-auto pt-2 col-lg-3 col-md-4 col-sm-6 col-12"> 
-->
<div class="">
    <div class="card-display pb-2">
        <div class="p-2">
            <h1 class="rounded border-bottom-orange bg-primary-dark text-white p-2 col-lg-3 col-md-3 col-sm-12">Destaques</h1>
        </div>
        <div class="owl-carousel owl-theme">
            @foreach($varPeca as $x)
            <div class="item card rounded">
                <!-- Cards para estoque disponível -->
                @if($x->qt_estoque > 0)
                @if($x->foto)
                <div class="col-12 text-center">
                    <img class="mx-auto" loading="lazy" src="data:image/png;base64, {{$x->foto}}" style="object-fit: cover;" width="200px" height="200px" alt="">
                </div>
                @else
                    <img class="rounded" src="{{URL('images/default.png')}}" width="200px" height="200px" style="object-fit: cover;" alt="">
                @endif
                <div class="card-body" style="height: 150px; /* overflow: auto; */">
                    <div class="card-title">
                        <h5 class="fw-bold col-auto text-truncate" data-bs-toggle="tooltip" data-bs-placement="right" title="{{$x->nm_peca}}">{{ $x->nm_peca }}</h5>
                    </div>
                    <dl>
                        <dd><span class="text-success">à vista</span>
                            <p>R$ {{ number_format($x->vl_peca, 2, ',') }}</p>
                        </dd>
                        <dd>12x R$ {{ number_format(round($x->vl_peca / 12, 2), 2, ',') }} sem juros</dd>
                    </dl>
                </div>
                <div class="card-footer bg-white text-center" style="border: none;">
                    {{-- <div class="row justify-content-around"> --}}
                        {{-- <button type="button" disabled class="col-5 btn btn-warning">
                                Carrinho
                        </button> --}}
                        <a href="pecas/{{$x->id}}">
                            <button type="button" class="col-12 btn ">
                                Comprar{{-- <i class="bi bi-cart"></i>   --}}                                  
                            </button>
                        </a>
                    {{-- </div> --}}
                </div>
                @else
                <!-- Cards para estoque indisponível -->
                @if($x->foto)
                <div class="col-12 text-center">
                    <img class="mx-auto" loading="lazy" src="data:image/png;base64, {{$x->foto}}" style="object-fit: cover; filter: grayscale(100%); opacity: 50%;" width="200px" height="200px" alt="">
                </div>
                @else
                    <img class="rounded" src="{{URL('images/default.png')}}"  width="200px" height="200px" style="object-fit: cover;" alt="">
                @endif
                <div class="card-body text-secondary" style="height: 150px; overflow: auto;">
                    <div class="card-title">
                        <h5 class="fw-bold col-auto text-truncate" data-bs-toggle="tooltip" data-bs-placement="right" title="{{$x->nm_peca}}">{{ $x->nm_peca }} </h5>
                    </div>
                    <dl>
                        <dd>R$ {{ number_format($x->vl_peca, 2, ',') }}</dd>
                        <dd>12x R$ {{ number_format(round($x->vl_peca / 12, 2), 2, ',') }} sem juros</dd>
                    </dl>
                </div>
                <div class="card-footer bg-white text-center" style="border: none;"><button type="button" class="col-12 btn btn-primary disabled">Indisponível</button></div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection