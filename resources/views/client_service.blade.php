@extends('layouts.client_dashboard')

@section('content')
<style>
    /* Card hover effect */
    .card:hover {
        transform: scale(1.05); /* Slightly enlarges the card */
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Adds shadow on hover */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Icon hover effect */
    .card-body i {
        color: #6c757d; /* Default icon color */
        transition: color 0.3s ease;
    }

    .card:hover i {
        color: #007bff; /* Icon color changes on hover */
    }

    /* Card content alignment */
    .card {
        cursor: pointer; /* Makes cards clickable */
    }
</style>

<div class="container my-4">
    <h3 class="mb-4">Some things you can do here</h3>
    <div class="row">
        <!-- Your Orders -->
        <div class="col-md-4 mb-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-box-seam mb-3" style="font-size: 2rem;"></i>
                        <h5 class="card-title">Your Orders</h5>
                        <p class="card-text">Track packages<br>Edit or cancel orders</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Returns and Refunds -->
        <div class="col-md-4 mb-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-arrow-repeat mb-3" style="font-size: 2rem;"></i>
                        <h5 class="card-title">Returns and Refunds</h5>
                        <p class="card-text">Return or exchange items<br>Print return mailing labels</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Manage Addresses -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('address.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-house-door mb-3" style="font-size: 2rem;"></i>
                        <h5 class="card-title">Manage Addresses</h5>
                        <p class="card-text">Update your addresses<br>Add address, landmark details</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <!-- Manage Prime -->
        <div class="col-md-4 mb-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-star mb-3" style="font-size: 2rem;"></i>
                        <h5 class="card-title">Manage Prime</h5>
                        <p class="card-text">View your benefits<br>Membership details</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Payment Settings -->
        <div class="col-md-4 mb-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-credit-card mb-3" style="font-size: 2rem;"></i>
                        <h5 class="card-title">Payment Settings</h5>
                        <p class="card-text">Add or edit payment methods<br>Change expired debit or credit card</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Account Settings -->
        <div class="col-md-4 mb-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-person mb-3" style="font-size: 2rem;"></i>
                        <h5 class="card-title">Account Settings</h5>
                        <p class="card-text">Change your email or password<br>Update login information</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <!-- Digital Services and Device Support -->
        <div class="col-md-4 mb-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-tablet mb-3" style="font-size: 2rem;"></i>
                        <h5 class="card-title">Digital Services and Device Support</h5>
                        <p class="card-text">Find device help and support<br>Troubleshoot device issues</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
