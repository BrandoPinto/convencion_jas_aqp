@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <!-- ... Otros elementos de encabezado ... -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <h1><b></b></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header bg-secondary">
        <h4><b>BIENVENIDO</b></h4>
    </div>
    <div class="card-body">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $competitors }}</h3>
                    <p><b>TOTAL INSCRITOS GENERAL</b></p>
                </div>
                <div class="icon">
                  <i class="fas fa-child text-light"></i>
                </div>
                <a href="#" class="small-box-footer"></a>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <b>ESTACAS Y DISTRITOS</b>
    </div>
    <div class="card-body">
        <div class="row container-box">
            @foreach ($stakes as $stake)
                @php
                    $bgClasses = ['bg-info', 'bg-success', 'bg-warning','bg-danger','bg-dark','bg-light'];
                    $randomIndex = array_rand($bgClasses);
                    $randomBgClass = $bgClasses[$randomIndex];
                @endphp
    
                <div class="col-lg-3 col-6">
                    <div class="small-box {{ $randomBgClass }}">
                        <div class="inner">
                            <h3 class="name">{{ $stake->name }}</h3>
                            @php
                                $competitors = new \App\Http\Controllers\HomeController();
                                $competitors_value = $competitors->count_competitors($stake->idStake);
                            @endphp
                            <p><b>{{ $competitors_value }} inscrito(s)</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-child text-light"></i>
                        </div>
                        <a href="{{ url('competitors/ward/'.$stake->idStake) }}" class="small-box-footer">Ver listado <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@stop


@section('js')

@stop