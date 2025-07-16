<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Note Vault</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>

   @import url('https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap');

    body {
        font-family: "Source Sans 3", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
        background-color: #76b852;
    }

    .input-bg {
        background-color: #eaeaea;
    }

    .link{
        color: green;
        text-decoration: none;
    }
  </style>
</head>

<body class=" d-flex align-items-center justify-content-center vh-100" >

  <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
    <h4 class="text-center mb-2">Login</h4>
    <form action="" method="POST">
      @csrf
      <div class="mb-3 ">
        <label for="email" class="form-label">Email</label>
        <input 
          type="email" 
          class="form-control input-bg" 
          id="email" 
          name="email" 
          placeholder="Enter your email" 
          required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input 
          type="password" 
          class="form-control input-bg" 
          id="password" 
          name="password" 
          placeholder="Enter your password" 
          required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn text-white " style="background:green;">Login</button>
      </div>
    </form>
    <div class="text-center mt-3">
      <p class="mb-0">Don't have an account? <a href="" class="link">Register</a></p>
  </div>

</body>
</html>
