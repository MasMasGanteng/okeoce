@extends('layouts.dashboard')

@section('content')

@stop {{-- local scripts --}}
@section('footer_scripts')
<div class="container-fluid">
	<div class="row mx-0 justify-content-center align-items-center mt-2 mb-4">
		<div class="mr-auto">
			<div class="h4 mb-1">DASHBOARD</div>
			<small>Welcome back, Admin.</small>
		</div>
		<div class="ml-auto w-25">
			<div class="row mx-0">
				<div class="col-6 d-flex flex-column text-center">
					<small>
						Transaction
					</small>
					<div class="h4">
						1000
					</div>
				</div>
				<div class="col-6 d-flex flex-column text-center">
					<small>
						User
					</small>
					<div class="h4">
						1000
					</div>
				</div>
			</div>			
		</div>
	</div>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 d-flex d-inline mb-3 align-items-center justify-content-center">
                    	<p class="mb-0">
                    		Total Product
                    	</p>
                    	<div class="ml-auto h4">
                    		2000
                    	</div>
                    </div>
                    <a href="#" class="btn btn-teal btn-block">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 d-flex d-inline mb-3 align-items-center justify-content-center">
                    	<p class="mb-0">
                    		Total Product
                    	</p>
                    	<div class="ml-auto h4">
                    		2000
                    	</div>
                    </div>
                    <a href="#" class="btn btn-teal btn-block">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 d-flex d-inline mb-3 align-items-center justify-content-center">
                    	<p class="mb-0">
                    		Total Product
                    	</p>
                    	<div class="ml-auto h4">
                    		2000
                    	</div>
                    </div>
                    <a href="#" class="btn btn-teal btn-block">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop