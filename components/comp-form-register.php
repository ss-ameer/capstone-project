<!-- comp-form-register.php -->
<form id="register-form" class="">
    <div class="container">
        <div class="row g-1">
            <div class="col-12">
                <div class="form-floating">
                    <input name="name" type="text" id="register-name" class="form-control" placeholder="Full Name">
                    <label for="register-name" class="form-label">Full Name</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <input name="username" type="text" id="register-username" class="form-control" placeholder="Username">
                    <label for="register-name" class="form-label">Username</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <input name="password" type="password" id="register-password" class="form-control" placeholder="Password">
                    <label for="register-password" class="form-label">Password</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <input name="password_rep" type="password" id="register-password_rep" class="form-control" placeholder="Repeat Password">
                    <label for="register-password_rep" class="form-label">Repeat Password</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input name="acc_type" type="checkbox" id="register-check" class="form-check-input">
                    <label for="register-check" class="form-check-label">Set as Master Account?</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>
    </div>
    <div id="feedback"></div>
</form>