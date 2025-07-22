<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap');
        body {
            font-family: "Source Sans 3", sans-serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
            background-color: #f8f9fa;
        }   

        nav{
            background-color: #76b852;
        }

    </style>
    <title>Note Vault</title>
</head>
<body>
    <nav class="nav navbar navbar-expand-lg w-100">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Left: Brand -->
            <a class="navbar-brand d-flex align-items-center text-white" href="#">
                <img src="{{ asset('images/logo.png') }}" width="30" height="30" class="d-inline-block align-top rounded-1 me-2" alt="Note Vault logo">
                NoteVault
            </a>

            <!-- Right: Profile Icon -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/profile.png') }}" width="32" height="32" class="rounded-circle" alt="Profile">
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-small text-center" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item " href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                </ul>
            </div>

        </div>
    </nav>



    <div class="container">
        {{ $slot }}
    </div>

    <div class="footer">
        <footer class="text-center mt-5">
            <p class="text-muted fixed-bottom">&copy; {{ date('Y') }} Note Vault. All rights reserved.</p>
        </footer>
    </div>
    
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>