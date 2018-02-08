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
		<div class="ml-auto w-50">
			<div class="row mx-0">
				<div class="col-6 d-flex align-items-center justify-content-end">
					<p class="text-right mb-0">Today's Report :</p>
				</div>
				<div class="col-3 d-flex flex-column text-center">
					<small>
						Transaction
					</small>
					<div class="h4">
						{{$cnt_transaction}}
					</div>
				</div>
				<div class="col-3 d-flex flex-column text-center">
					<small>
						New User
					</small>
					<div class="h4">
						{{$cnt_user}}
					</div>
				</div>				
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 d-flex d-inline mb-3 align-items-center justify-content-center">
                        <p class="mb-0">
                            Waiting Payment
                        </p>
                        <div class="ml-auto h4">
                            {{$cnt_pending}}
                        </div>
                    </div>
                    <a href="/dashboard/order_pending" class="btn btn-teal btn-block">View Details</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 d-flex d-inline mb-3 align-items-center justify-content-center">
                        <p class="mb-0">
                            New Order
                        </p>
                        <div class="ml-auto h4">
                            {{$cnt_new}}
                        </div>
                    </div>
                    <a href="/dashboard/order_in" class="btn btn-teal btn-block">View Details</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 d-flex d-inline mb-3 align-items-center justify-content-center">
                        <p class="mb-0">
                            On Progress
                        </p>
                        <div class="ml-auto h4">
                            {{$cnt_progress}}
                        </div>
                    </div>
                    <a href="/dashboard/order_progress" class="btn btn-teal btn-block">View Details</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 d-flex d-inline mb-3 align-items-center justify-content-center">
                        <p class="mb-0">
                            Success Order
                        </p>
                        <div class="ml-auto h4">
                            {{$cnt_success}}
                        </div>
                    </div>
                    <a href="/dashboard/succes_order" class="btn btn-teal btn-block">View Details</a>
                </div>
            </div>
        </div>
        <!-- <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 d-flex d-inline mb-3 align-items-center justify-content-center">
                        <p class="mb-0">
                            Cancel Order
                        </p>
                        <div class="ml-auto h4">
                            {{$cnt_cancel}}
                        </div>
                    </div>
                    <a href="/dashboard/canceled_order" class="btn btn-teal btn-block">View Details</a>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row mx-0">
		<div class="ml-auto mt-5 d-flex align-items-center justify-content-end" style="width: 400px;">
			<div class="col">Sushi List :</div>
			<div class="col d-flex flex-column text-center py-2" style="background: #75c8ce;">
				<a href="dashboard/make_sushi" class="text-white">
					<small>
						Make Your Own
					</small>
					<div class="h4 mb-0">
						{{$cnt_make}}
					</div>
				</a>
					
				</div>
				<div class="col d-flex flex-column text-center py-2" style="background: #f37b8a;">
					<a href="/dashboard/ready_to_eat" class="text-white">
						<small>
						Ready to Eat
					</small>
					<div class="h4 mb-0">
						{{$cnt_ready}}
					</div>
					</a>
					
				</div>
		</div>
	</div>
</div>
@stop