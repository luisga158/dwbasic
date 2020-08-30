@extends('layouts.compulg')
@section('mainttl')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Indice @lang('main.title')</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                        <a href="{{route('pasoapaso')}}" class="btn btn-primary">
                            Laravel para Dummies.
                        </a><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('sidebar')
@endsection
