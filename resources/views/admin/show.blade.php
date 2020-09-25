@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail of "{{ $name }}" Language</div>

                <div class="card-body">
                    @if (session('status'))
                        <x-alert type="success" :message="session('status')"/>
                    @endif
                    
                    @if ($language)
                        <table class="table table-hover">
                            <tbody>
                                <x-table-column name="Name" :value="$language['name']"/>
                                <x-table-column type="link" name="Website" :value="$language['website']"/>
                                <x-table-column name="Popular Framework" :value="$language['framework']"/>
                                <x-table-column name="First Appeared" :value="$language['first_appeared']"/>
                                <x-table-column name="Current Stable Version" :value="$language['current_version']"/>
                                <x-table-column name="Stable Release" :value="$language['stable_release']"/>
                                <x-table-column name="Preview Release" :value="$language['preview_release']"/>
                                <x-table-column name="Designers" :value="$language['designed_by']"/>
                                <x-table-column name="Developers" :value="$language['developer']"/>
                                <x-table-column name="Operating Systems" :value="$language['os']"/>
                                <x-table-column name="Filename Extensions" :value="$language['filename_extensions']"/>
                            </tbody>
                        </table><hr>
                        <x-redirect-button to="/admin/pl" class="mr-2" text="Back"/>
                        <x-redirect-button :to="'/admin/pl/' . $language['name'] . '/edit'" text="Edit" color="success"/>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
