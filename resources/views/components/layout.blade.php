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
    </style>
    <title>Note Vault</title>
</head>
<body>
    <div class="nav">

    </div>
    <div class="container">
        {{ $slot }}
    </div>
    <div class="footer">
        <p>Footer content goes here</p>
    </div>
    
</body>
</html>