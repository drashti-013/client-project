@extends('layouts.client_dashboard')

@section('content')
<style>
    /* Form styling */
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-header h2 {
        font-size: 1.8rem;
        color: #007bff;
    }

    .btn-custom {
        background-color: #28a745;
        border-color: #28a745;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>

<div class="container my-5">
    <div class="form-container">
        <div class="form-header">
            <h2>Add New Address</h2>
            <p>Please fill out the form below to add a new address.</p>
        </div>
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

        <form action="{{ route('address.store') }}" method="POST">
            @csrf
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Phone Number -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" pattern="\d{10,15}" required>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address" required>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- City -->
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" id="city" name="city" class="form-control" placeholder="Enter your city" required>
                @error('city')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- State -->
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" id="state" name="state" class="form-control" placeholder="Enter your state" required>
                @error('state')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Country -->
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" id="country" name="country" class="form-control" placeholder="Enter your country" required>
                @error('country')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Pincode -->
            <div class="mb-3">
                <label for="pincode" class="form-label">Pincode</label>
                <input type="text" id="pincode" name="pincode" class="form-control" placeholder="Enter your pincode" pattern="\d{5,10}" required>
                @error('pincode')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Submit Button -->
            <button type="submit" class="btn btn-custom w-100">Add Address</button>
        </form>
        
    </div>
</div>
@endsection
