<form id="register-form">
    <div class="">
        <label for="register-name" class="form-label">Full Name</label>
        <input name="name" type="text" id="register-name" class="form-control">
    </div>
    <div class="">
        <label for="register-password" class="form-label">Password</label>
        <input name="password" type="password" id="register-password" class="form-control">
    </div>
    <div class="">
        <label for="register-password_rep" class="form-label">Repeat password</label>
        <input name="password_rep" type="password" id="register-password_rep" class="form-control">
    </div>
    <div class="form-check">
        <input name="acc_type" type="checkbox" id="register-check" class="form-check-input">
        <label for="register-check" class="form-check-label">Set as Master Account?</label>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
    <div id="feedback"></div>
</form>