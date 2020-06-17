@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Seguro Social Universitario </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>Reservas de especialidades</h3>
                        <p>Por favor registrar al sistema o loguearse para poder realizar reservas de las especialidades del seguro universitario</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
