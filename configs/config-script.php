<!-- config-script.php -->
<script>

$(document).ready(function(){

// navigation

    function loadContent(data) {
        var display_selected = data;
        $.ajax({
            url: '../configs/config-function.php',
            type: 'GET',
            data: display_selected,
            success: function(response) {
                console.log(response);
                $('#display-main').load(location.href + "#display-main");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error loading content:', textStatus, errorThrown);
            }
        })
    }

    // account

    function register(){
        var data = {
            name: $('#register-name').val(),
            password: $('#register-password').val(),
            password_rep: $('#register-password_rep').val(),
            acc_type: $('#register-check').val(),
            action: 'register'
        };

        $.ajax({
            url: '../configs/config-function.php',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log("Success" + response);
                $('#feedback').html(response);
            }
        })
    }

    function login() {
        var data = {
            name: $('#login-name').val(),
            password: $('#login-password').val(),
            action: 'login'
        };

        $.ajax({
            url: '../configs/config-function.php',
            type: 'POST',
            data: data,
            success: function(response) {
                $('#feedback').html(response);
                if(response.includes('success')){
                    $('#feedback').html(response);
                    window.location.href = '../index.php'; // Redirect to the login page

                }
            }
        })
    }

    function logout() {
        $.ajax({
            url: '../configs/config-function.php',
            type: 'POST',
            data: { action: 'logout' },
            success: function(response) {
                console.log("Success" + response);
                $('#feedback').html(response);
                window.location.href = '../index.php'; // Redirect to the login page
            }
        })
    }

    $('#register-form').submit(function(event){
        event.preventDefault();
        register();
    });

    $('#login-form').submit(function(event){
        event.preventDefault();
        login();
    });

    $('#logout-button').click(function(event){
        event.preventDefault();
        logout();
    })

    $('#side-master').click(function(event){
        event.preventDefault();
        setActive('master');
    })

});

</script>