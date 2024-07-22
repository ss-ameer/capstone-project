<!-- config-script.php -->
<script>

$(document).ready(function(){

    // popover

    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
    // const popover = new bootstrap.Popover('.popover-dismiss', { trigger: 'focus' });

    // navigation 

    function goToIndex() {
        window.location.href = '../index.php';
    }

    function sidenavSelect(name) {
        var data = {
            action: 'sidenav select',
            selected: name
        };

        $.ajax({
            url: '../configs/config-function.php',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response + ' was selected');
                if (response != data['selected']) {
                    // goToIndex();
                    console.log('gone');
                } else { console.log('same'); }
            }
        })
    }

    // account functions

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

    function deleteAccount(id) {
        if (confirm('Confirm to Delete this account.')) {
            var data = {
                account_id: id,
                action: 'delete account'
            }
            $.ajax({
                url: '../configs/config-function.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    
                    if (response == 'success'){
                        $('#table-officers').find(`[data-id='${id}']`).remove();
                    } else {
                        alert('Failed to delete account.');
                    }
                }
            });
        }
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

    // sidenav

    $('#side-master').click(function(event){
        event.preventDefault();
        sidenavSelect('master');
    })

    // office table

    $('#table-officers').on('click', '.officer-account', function(event){
        event.preventDefault();

        var classes = 'table-active';

        $('.officer-account').removeClass(classes);
        $('.officer-account .btn').hide();

        $(this).addClass(classes);
        $(this).find('.btn').show();

        console.log($(this).attr('class'));

        selectAccount($(this).data('id'));
    })

    // delete account
    $('#table-officers').on('click', '.delete-account', function(event){
        // event.stopPropagation();
        var accountId = $(this).closest('.officer-account').data('id');
        deleteAccount(accountId);
    })

});

</script>