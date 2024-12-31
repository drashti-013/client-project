<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeLayers  Login & Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">LuxeLayers </div>
        <a href="{{ route('index')}}"class="close-icon">&times;</a>
    </div>

    <!-- Animated Form Container -->
    <div class="form-container" id="formContainer">
        <!-- Login Box -->
        <div class="form-box login-box">
            <h1 class="text-center mb-4">Welcome Back!</h1>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <form id="loginForm" method="POST" action="/login_check">
                @csrf <!-- CSRF Token for security -->
            
                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email_log">Email Address</label>
                    <input type="email" class="form-control @error('email_log') is-invalid @enderror" 
                           placeholder="Enter your email" name="email_log" id="email_log" value="{{ old('email_log') }}">
            
                    <!-- Display Server-Side Validation Error -->
                    @error('email_log')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password_log">Password</label>
                    <input type="password" class="form-control @error('password_log') is-invalid @enderror" 
                           placeholder="Enter your password" name="password_log" id="password_log">
            
                    <!-- Display Server-Side Validation Error -->
                    @error('password_log')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            
        </div>

        <!-- Registration Form -->
        <!-- Registration Form -->
<div class="form-box register-box">
    <h1 class="text-center mb-4">Create Account</h1>
    <form id="registerForm" method="POST">
        @csrf <!-- CSRF protection token -->

        <!-- Full Name -->
        <div class="mb-3">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="name" id="name">
            <div id="nameError" class="text-danger"></div>
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email">
            <div id="emailError" class="text-danger"></div>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="Create a password" name="password" id="password">
            <div id="passwordError" class="text-danger"></div>
        </div>

        <!-- Gender -->
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <div id="genderError" class="text-danger"></div>
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" id="address" placeholder="Enter your address"></textarea>
            <div id="addressError" class="text-danger"></div>
        </div>

        <!-- City -->
        <div class="mb-3">
            <label for="city">City</label>
            <input type="text" class="form-control" placeholder="Enter your city" name="city" id="city">
            <div id="cityError" class="text-danger"></div>
        </div>

        <!-- State -->
        <div class="mb-3">
            <label for="state">State</label>
            <input type="text" class="form-control" placeholder="Enter your state" name="state" id="state">
            <div id="stateError" class="text-danger"></div>
        </div>

        <!-- Country -->
        <div class="mb-3">
            <label for="country">Country</label>
            <input type="text" class="form-control" placeholder="Enter your country" name="country" id="country">
            <div id="countryError" class="text-danger"></div>
        </div>

        <!-- Pincode -->
        <div class="mb-3">
            <label for="pincode">Pincode</label>
            <input type="text" class="form-control" placeholder="Enter your pincode" name="pincode" id="pincode">
            <div id="pincodeError" class="text-danger"></div>
        </div>

        <!-- Phone Number -->
        <div class="mb-3">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" placeholder="Enter your phone number" name="phone" id="phone">
            <div id="phoneError" class="text-danger"></div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>            
</div>


        

        <!-- Overlay -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Join Us!</h1>
                    <p>Already have an account? Log in to stay connected.</p>
                    <button class="btn btn-outline-light" id="loginBtn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Welcome Back!</h1>
                    <p>Don't have an account yet? Register to get started.</p>
                    <button class="btn btn-outline-light" id="registerBtn">Register</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const formContainer = document.getElementById('formContainer');
        const loginBtn = document.getElementById('loginBtn');
        const registerBtn = document.getElementById('registerBtn');
    
        // Toggle between Login and Register form
        loginBtn.addEventListener('click', () => {
            formContainer.classList.remove('active');
        });
    
        registerBtn.addEventListener('click', () => {
            formContainer.classList.add('active');
        });
    
        $(document).ready(function () {
    // Apply jQuery validation to the form
    $('#registerForm').validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            gender: {
                required: true
            },
            address: {
                required: true,
                minlength: 10
            },
            city: {
                required: true,
                minlength: 3
            },
            state: {
                required: true,
                minlength: 3
            },
            country: {
                required: true,
                minlength: 3
            },
            pincode: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 6
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            }
        },
        messages: {
            name: {
                required: "Please enter your full name.",
                minlength: "Your name must be at least 3 characters long."
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
            password: {
                required: "Please enter a password.",
                minlength: "Your password must be at least 6 characters long."
            },
            gender: {
                required: "Please select your gender."
            },
            address: {
                required: "Please enter your address.",
                minlength: "Your address must be at least 10 characters long."
            },
            city: {
                required: "Please enter your city.",
                minlength: "City name must be at least 3 characters long."
            },
            state: {
                required: "Please enter your state.",
                minlength: "State name must be at least 3 characters long."
            },
            country: {
                required: "Please enter your country.",
                minlength: "Country name must be at least 3 characters long."
            },
            pincode: {
                required: "Please enter your pincode.",
                digits: "Pincode must contain only digits.",
                minlength: "Pincode must be 6 digits long.",
                maxlength: "Pincode must be 6 digits long."
            },
            phone: {
                required: "Please enter your phone number.",
                digits: "Phone number must contain only digits.",
                minlength: "Phone number must be 10 digits long.",
                maxlength: "Phone number must be 10 digits long."
            }
        },
        errorElement: 'div',
        errorClass: 'text-danger',

        // Highlight invalid fields
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },

        // AJAX submission when the form is valid
        submitHandler: function (form) {
            $.ajax({
                url: '{{ route("client.store") }}', // Correct route to the controller
                type: 'POST',
                data: $('#registerForm').serialize(), // Serialize form data
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message); // Display success message
                        window.location.href = "{{ route('login') }}"; // Redirect to login page
                    }
                },
                error: function (xhr) {
                    // Display server-side validation errors
                    let errors = xhr.responseJSON.errors;
                    
                    if (errors) {
                        $('#nameError').text(errors.name ? errors.name[0] : '');
                        $('#emailError').text(errors.email ? errors.email[0] : '');
                        $('#passwordError').text(errors.password ? errors.password[0] : '');
                        $('#genderError').text(errors.gender ? errors.gender[0] : '');
                        $('#addressError').text(errors.address ? errors.address[0] : '');
                        $('#cityError').text(errors.city ? errors.city[0] : '');
                        $('#stateError').text(errors.state ? errors.state[0] : '');
                        $('#countryError').text(errors.country ? errors.country[0] : '');
                        $('#pincodeError').text(errors.pincode ? errors.pincode[0] : '');
                        $('#phoneError').text(errors.phone ? errors.phone[0] : '');
                    } else {
                        console.log(errors);
                        alert('An unexpected error occurred. Please try again.');
                    }
                }
            });
        }
    });
});


    </script>
    
</body>
</html>
