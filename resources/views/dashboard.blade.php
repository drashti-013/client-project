@extends('layouts.client_dashboard')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Welcome to Your Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Sales</h5>
                    <p class="card-text">$10,000</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text">150</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">New Customers</h5>
                    <p class="card-text">30</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection