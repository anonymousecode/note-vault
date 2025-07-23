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
                    <h4 class="text-center mb-2">Reset Password</h4>
                    <form action="{{route('resetPassword')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input 
                        type="email" 
                        class="form-control input-bg" 
                        id="email" 
                        name="email" 
                        placeholder="Enter your email" 
                        required>
                    </div>
                    <div class="mb-3 ">
                        <label for="security" class="form-label">Security Question</label>
                        <select name="security" id="security" class="form-control input-bg" >
                        <option value="power"> Your ideal superpower?</option>
                        <option value="animal">If you were an animal, what would you be?</option>
                        <option value="history">Which historical figure would you dine with?</option>
                        <option value="fiction">Your preferred fictional world to live in?</option>
                        <option value="song">Your personal theme song?</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer</label>
                        <input 
                        type="text" 
                        class="form-control input-bg" 
                        id="answer" 
                        name="answer" 
                        placeholder="Enter your answer" 
                        required>
                    </div>
                    <div class="mb-3 ">
                        <label for="new" class="form-label">New Password</label>
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