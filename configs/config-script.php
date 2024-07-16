<!-- config-script.php -->
<script>

$(document).ready(function(){

// navigation

    // function loadContent(data) {
    //     var display_selected = data;
    //     $.ajax({
    //         url: '../configs/config-function.php',
    //         type: 'GET',
    //         data: display_selected,
    //         success: function(response) {
    //             console.log(response);
    //             $('#display-main').load(location.href + "#display-main");
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             console.error('Error loading content:', textStatus, errorThrown);
    //         }
    //     })
    // }

    // navigation 

    function goToIndex() {
        window.location.href = '../index.php';
    }

    function selectAccount(id) {
        var data = {
            account_id: id,
            action: 'select account'
        }
        $.ajax({
            url: '../configs/config-function.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                
            }
        });
        console.log(data['account_id']);


    }

    // account

    function register(){
        var data = {
            name: $('#register-name').val(),
            password: $('#register-password').val(),
            password_rep: $('#register-password_rep').val(),
            acc_type: $('#register-check').prop('checked'),
            action: 'register'
        };

        $.ajax({
            url: '../configs/config-function.php',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log("Success" + response);
                $('#feedback').html(response);
                // $('#master-view').location.reload();
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
                    goToIndex(); // Redirect to the login page
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
                goToIndex(); // Redirect to the login page
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

    $('#table-officers').on('click', '.officer-account', function(event){
        event.preventDefault();

        var classes = 'table-active';

        $('.officer-account').removeClass(classes);
        $(this).addClass(classes);

        console.log($(this).attr('class'));

        selectAccount($(this).data('id'));
    })

});

</script>