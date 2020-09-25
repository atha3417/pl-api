@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
				<div class="card">
					<div class="card-header">Edit "{{ $name }}" Language</div>
					<div class="card-body">
						<form action="{{ url('/admin/pl/' . $name) }}" method="post">
                            @csrf
                            @method('put')
							<x-input field="name" label="Name" :value="$language['name']" required="true"/>
							<x-input field="website" label="Website" :value="$language['website']"/>
							<x-input field="framework" label="Framework" :value="$language['framework']"/>
							<x-input field="first_appeared" label="First Appeared" :value="$language['first_appeared']"/>
							<x-input field="current_version" label="Current Version" :value="$language['current_version']"/>
							<x-input field="stable_release" label="Stable Release" :value="$language['stable_release']"/>
							<x-input field="preview_release" label="Preview Release" :value="$language['preview_release']"/>
							<x-input field="designed_by" label="Designers" :value="$language['designed_by']"/>
							<x-input field="developer" label="Developers" :value="$language['developer']"/>
							<x-select-os field="os" label="Operating Systems"/>
							<x-input field="filename_extensions" label="Filename Extensions" :value="$language['filename_extensions']"/>
							<x-redirect-button to="/admin/pl" class="mr-2" text="Back" :value="$language['website']"/>
							<x-submit-button color="primary" text="Submit"/>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
