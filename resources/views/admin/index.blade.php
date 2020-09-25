@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <x-alert type="success" :message="session('status')"/>
            @endif

            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
					<h1 class="text-center mb-4">Programming Languages</h1>
					
					<button class="btn btn-primary new-language mb-2" data-link="{{ url('/admin/pl/create') }}">
						New Language +
					</button>

                    <table class="table table-hover table-bordered table-middle text-center data-languages">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $language)
                                <tr>
                                    <td style="width: 13%">{{ $loop->iteration }}</td>
                                    <td style="width: 55%">{{ $language->name }}</td>
                                    <td style="width: 32%">
                                        <button class="btn btn-sm btn-secondary rounded-pill detail" data-link="{{ url('/admin/pl') . '/' . $language->name }}">Detail</button>
                                        <button class="btn btn-sm btn-danger rounded-pill delete" data-name="{{ $language->name }}">Delete</button>
                                        <form action="{{ url('/admin/pl/' . $language->name) }}" method="post" id="form-delete-{{ $language->name }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
