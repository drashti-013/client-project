<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sidebar with Dropdown and Change Password</title>
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- FontAwesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/dash_css.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <style>
        #back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            font-size: 18px;
        }

        #back-to-top.show {
            display: block;
        }

        .modal-content {
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            border-bottom: 2px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="list-group list-group-flush">
                <!-- Categories Section -->
                <div class="list-group-item bg-light dropdown-toggle" id="categories">
                    <i class="fas fa-tags"></i> <span>Categories</span>
                </div>
                <div class="submenu" id="categories-submenu">
                    <a href="#" class="list-group-item list-group-item-action bg-light">
                        <i class="fas fa-tshirt"></i> <span>Clothing</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">
                        <i class="fas fa-mobile-alt"></i> <span>Electronics</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">
                        <i class="fas fa-chair"></i> <span>Furniture</span>
                    </a>
                </div>

                <!-- Help & Settings Section -->
                <div class="list-group-item bg-light dropdown-toggle" id="help-settings">
                    <i class="fas fa-cogs"></i> <span>Help & Settings</span>
                </div>
                <div class="submenu" id="help-submenu">
                    <a href="#" class="list-group-item list-group-item-action bg-light">
                        <i class="fas fa-user"></i> <span>Your Account</span>
                    </a>
                    <a href="{{ route('client_service')}}" class="list-group-item list-group-item-action bg-light">
                        <i class="fas fa-headset"></i> <span>Customer Service</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">
                        <i class="fas fa-sign-out-alt"></i> <span>Sign Out</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item user-dropdown dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://via.placeholder.com/30" alt="User Icon" class="img-fluid rounded-circle"> <span>John Doe</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('client.index')}}"><i class="fas fa-user"></i> My Profile</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                    <i class="fas fa-key"></i> Change Password
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')

            <!-- Back to Top Button -->
            <button id="back-to-top"><i class="fas fa-arrow-up"></i></button>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm" action="{{ route('client.change_password')}}" method="POST">
                        @csrf
                        <!-- Current Password -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current password" required>
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" required>
                        </div>

                        <!-- Confirm New Password -->
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Modal -->
    <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="responseModalLabel">Message</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="responseMessage">
                    <!-- Message will be injected here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle functionality
        $('#categories').click(function () {
            $('#categories-submenu').toggleClass('show');
        });

        $('#help-settings').click(function () {
            $('#help-submenu').toggleClass('show');
        });

        // Back to Top functionality
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        });

        $('#back-to-top').click(function () {
            $('html, body').animate({ scrollTop: 0 }, 500);
            return false;
        });

        // Handle Change Password Form Submission
        document.getElementById('changePasswordForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission
            
            // Simulating a response for demo purposes
            const isSuccess = Math.random() > 0.5; // Random success or failure
            const modal = new bootstrap.Modal(document.getElementById('responseModal'), {});

            if (isSuccess) {
                document.getElementById('responseModalLabel').textContent = 'Success';
                document.getElementById('responseMessage').textContent = 'Your password has been updated successfully!';
            } else {
                document.getElementById('responseModalLabel').textContent = 'Error';
                document.getElementById('responseMessage').textContent = 'Failed to update the password. Please try again.';
            }

            modal.show(); // Show the response modal
        });
    </script>
</body>
</html>
