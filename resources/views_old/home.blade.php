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

                    @if(isset($token))
                        <h2>{{ $token }}</h2>
                    @endif
                    <form action="{{route('api.refresh')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Regerar token</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
