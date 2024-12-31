@extends('layouts.client_dashboard')

@section('content')
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <!-- User Profile Information -->
    <div class="card">
        <div class="card-body text-center">
            <img src="{{ asset('images/default-avatar.png') }}" alt="User Avatar" class="profile-avatar rounded-circle mb-3" style="width: 100px; height: 100px;">
            <h3 class="card-title">{{ $user->client->name }}</h3>
            <button id="editProfileBtn" class="btn btn-primary mt-3">Edit Profile</button>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->client->email }}</p>
            <p><strong>Phone:</strong> {{ $user->client->phone }}</p>
            <p><strong>Gender:</strong> {{ $user->client->gender }}</p>
            <p><strong>Country:</strong> {{ $user->client->country }}</p>
            <p><strong>State:</strong> {{ $user->client->state }}</p>
            <p><strong>City:</strong> {{ $user->client->city }}</p>
            <p><strong>Pincode:</strong> {{ $user->client->pincode }}</p>
            <p><strong>Address:</strong> {{ $user->address_1 }}</p>
        </div>
    </div>

    <!-- Edit Profile Form (Initially Hidden) -->
    <div id="editProfileForm" class="edit-form mt-4 d-none">
        <div class="card">
            <div class="card-body">
                <h3>Edit Profile</h3>
                <form action="{{ route('client.update', $user->client->client_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->client->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $user->client->phone }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select id="gender" name="gender" class="form-select" required>
                            <option value="male" {{ $user->client->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->client->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $user->client->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country:</label>
                        <input type="text" id="country" name="country" class="form-control" value="{{ $user->client->country }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State:</label>
                        <input type="text" id="state" name="state" class="form-control" value="{{ $user->client->state }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City:</label>
                        <input type="text" id="city" name="city" class="form-control" value="{{ $user->client->city }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pincode" class="form-label">Pincode:</label>
                        <input type="text" id="pincode" name="pincode" class="form-control" value="{{ $user->client->pincode }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ $user->address_1 }}" required>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-danger" id="cancelEditBtn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("editProfileBtn").addEventListener("click", function () {
    document.getElementById("editProfileForm").classList.remove("d-none");
});

document.getElementById("cancelEditBtn").addEventListener("click", function () {
    document.getElementById("editProfileForm").classList.add("d-none");
});
</script>

@endsection
