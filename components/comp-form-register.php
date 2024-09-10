<div class="container mt-4">
    
    <h5 class="mb-3">Add Account</h5>

    <form id="register-form" class="border p-3 shadow-sm">
        <div class="form-floating mb-2">
            <input name="name" type="text" id="register-name" class="form-control" placeholder="Full Name">
            <label for="register-name" class="form-label">Full Name</label>
        </div>
        <div class="form-floating mb-2">
            <input name="password" type="password" id="register-password" class="form-control" placeholder="Password">
            <label for="register-password" class="form-label">Password</label>
        </div>
        <div class="form-floating mb-2">
            <input name="password_rep" type="password" id="register-password_rep" class="form-control" placeholder="Repeat Password">
            <label for="register-password_rep" class="form-label">Repeat Password</label>
        </div>

        <div class="form-check mb-2">
            <input name="acc_type" type="checkbox" id="register-check" class="form-check-input">
            <label for="register-check" class="form-check-label">Set as Master Account?</label>
        </div>

        <button type="submit" class="btn btn-success mb-2">Create</button>
        
        <div id="feedback"></div>
    </form>
</div>