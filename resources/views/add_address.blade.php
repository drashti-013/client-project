@extends('layouts.client_dashboard')
@section('content')
<link rel="stylesheet" href="{{ asset('css/add_address.css') }}">

<div class="container my-4">
    <h2 class="text-center mb-4">Manage Addresses</h2>
    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                
            </div>
        @endif

        @if(session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                
            </div>
        @endif
    <div class="row g-3">
        <!-- Client Address Card -->
        @foreach ($address as $row)
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Address</h5>
                    <p class="card-text">
                        <strong>{{ $row->client->name }}</strong> <br>
                        {{ $row->address_1 }}<br>
                        {{ $row->client->city }},&nbsp;{{ $row->client->state }} &nbsp;&nbsp;{{ $row->client->pincode }}<br>
                        {{ $row->client->country }} <br>
                        Phone number:{{ $row->client->phone }}
                    </p>
                    
                    <form action="{{ route('address.destroy', $row->address_id ) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this address?')">
                            Remove Address
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        
        @foreach ($address_ad as $row1)
            @if($row1->name != NULL)
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Address</h5>
                        <p class="card-text">
                            <strong>{{ $row1->name }}</strong> <br>
                            {{ $row1->address_2 }}<br>
                            {{ $row1->city }},&nbsp;{{ $row1->state }} &nbsp;&nbsp;{{ $row1->pincode }}<br>
                            {{ $row1->country }} <br>
                            Phone number:{{ $row1->phone }}
                        </p>
                        
                        <form action="{{ route('address.destroy', $row1->address_id ) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this address?')">
                                Remove Address
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        @endforeach

        <!-- Add New Address Card, only visible if the user has fewer than 2 addresses -->
        @if($addressCount < 2)
        <div class="col-md-4">
            <a href="{{ route('address.create') }}" class="text-decoration-none">
                <div class="card h-100 add-address-card">
                    <div class="card-body text-center">
                        <i class="bi bi-plus-circle-fill add-icon"></i>
                        <p class="add-text">Add Address</p>
                    </div>
                </div>
            </a>
        </div>
        @else
        <!-- Message when user has reached the maximum number of addresses -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Maximum Address Limit Reached</h5>
                    <p>You cannot add more than 2 addresses. Please update or delete an existing address.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
