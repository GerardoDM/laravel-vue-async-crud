@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <form action="/crear/token" method="post">
                        @csrf
                        <button>Crear Token</button>
                    </form>
                    <form action="/crear/token" method="delete">
                        @csrf
                        <button>Crear Token</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
