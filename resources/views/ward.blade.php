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
    <div class="card-header bg-primary">
        <b>INSCRITOS POR BARRIO ESTACA {{ strtoupper($stake->name) }}</b>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
                    <th>#</th>
                    <th>Barrio</th>
                    <th>Inscritos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wards as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        @php
                            $competitors = new \App\Http\Controllers\WardController();
                            $competitors_value = $competitors->count_competitors($item->idWard);
                        @endphp
                        <td>{{ $competitors_value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop


@section('js')

@stop