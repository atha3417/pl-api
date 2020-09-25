@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
				<div class="card">
					<div class="card-header">New Language</div>
					<div class="card-body">
						<form action="{{ url('/admin/pl') }}" method="post">
							@csrf
							<x-input field="name" label="Name" required="true"/>
							<x-input field="website" label="Website"/>
							<x-input field="framework" label="Framework"/>
							<x-input field="first_appeared" label="First Appeared"/>
							<x-input field="current_version" label="Current Version"/>
							<x-input field="stable_release" label="Stable Release"/>
							<x-input field="preview_release" label="Preview Release"/>
							<x-input field="designed_by" label="Designed By"/>
							<x-input field="developer" label="Developer"/>
							<x-select-os field="os" label="Operating System"/>
							<x-input field="filename_extensions" label="Filename Extensions"/>
							<x-back-button to="/admin/pl" class="mr-2"/>
							<x-submit-button color="primary" text="Submit"/>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
