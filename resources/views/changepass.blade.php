<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteVault</title>
</head>
<body>
    <x-layout>
        <slot>
            <div class="d-flex align-items-center justify-content-center px-3" style="height: 80vh;">
                <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
                    <h4 class="text-center mb-2">Change Password</h4>
                    <form action="{{route('updatePassword')}}" method="POST">
                    @csrf
                    <div class="mb-3 ">
                        <label for="current" class="form-label">New Password</label>
                        <input 
                        type="password" 
                        class="form-control input-bg" 
                        id="current" 
                        name="current" 
                        placeholder="Enter your password" 
                        required>
                    </div>
                    <div class="mb-3 ">
                        <label for="new" class="form-label">Current Password</label>
                        <input 
                        type="password" 
                        class="form-control input-bg" 
                        id="new" 
                        name="new" 
                        placeholder="Enter your password" 
                        required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm" class="form-label">Confirm Password</label>
                        <input 
                        type="password" 
                        class="form-control input-bg" 
                        id="confirm" 
                        name="confirm" 
                        placeholder="Confirm your password" 
                        required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn text-white " style="background:green;">Change password</button>
                    </div>
                    </form>
                </div>  
            </div>
        </slot>
    </x-layout>
</body>
</html>