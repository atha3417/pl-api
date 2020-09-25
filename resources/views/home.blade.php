@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <x-alert type="success" :message="session('status')"/>
                    @endif

                    <a href="{{ url('/admin/pl') }}">Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
