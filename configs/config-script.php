<!-- config-script.php -->
<script>

$(document).ready(function(){

    // popover
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
    // const popover = new bootstrap.Popover('.popover-dismiss', { trigger: 'focus' });

    var config_function_url = '../configs/config-function.php';

    // PROTOTYPES:
    $.fn.toggleVisibility = function(id) {
        var element = $('#' + id); 

        if (element.hasClass('d-none')) {
            element.removeClass('d-none'); 
        } else {
            element.addClass('d-none'); 
        }
        
        return this; 
    };

    // stocks
    function itemAdd(form_data) {
        var data = {
            form_data: form_data,
            action: 'item add'
        };

        $.ajax({
            url: config_function_url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if (response !== 'success') {
                    console.log('error');
                    console.log(data);
                } else {
                    console.log('form_data');
                    // $('#master-stock-preview').load(' #master-stock-preview');
                    $('#add-item-form')[0].reset();
                    alert(form_data.item_name + ' successfully added.');
                };
            }
        });
    }


    function stockAdd() {
        var data = {
            item_id: $('#stock-add_id').val(),
            qty: $('#stock-add_qty').val(),
            action: 'stock add'
        }

        $.ajax({
            url: config_function_url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if (response == 'success') {
                    // $('#master-stock-preview').reload();
                    // location.reload();
                }
            }
        })
    }

    function stockGet() {
        var data = {
            action: 'get stocks'
        }

        $.ajax({
            url: config_function_url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
            }
        })
    }

    function stockDelete(id) {
        if (confirm('Confirm to Delete this stock.')) {
            var data = {
                stock_id: id,
                action: 'stock delete'
            }
            $.ajax({
                url: config_function_url,
                type: 'POST',
                data: data,
                success: function(response) {
                    
                    if (response =='success'){
                        $('#master-stock-preview').find(`[data-id_item='${id}']`).remove();
                        console.log('Item Delete: \nSUCCESS \n - item id:', data['stock_id']);
                    } else {
                        alert('Failed to delete item. \n (item id:', data['stock_id']);
                        console.log('Item Delete: \nFAILED \n - item id:', data['stock_id']);
                    }
                }
            });
        }
    }

    function stockSelect(id) {
        var data = {
            stock_id: id,
            action: 'stock select'
        };

        $.ajax({
            url: config_function_url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log('response: ' + response);
                console.log('selected:' , data['stock_id']);
            }
        });
    }

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
            url: config_function_url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log('response: ' + response);
                console.log('selected:' , data['selected']);
                if (response == 'success') {
                    console.log('action: redirecting');
                    goToIndex();
                } else { console.log('action: not redirecting'); }
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
            url: config_function_url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(data['account_id']);
            }
        });
    }

    function deleteAccount(id) {
        if (confirm('Confirm to Delete this account.')) {
            var data = {
                account_id: id,
                action: 'delete account'
            }
            $.ajax({
                url: config_function_url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    
                    if (response == 'success'){
                        $('#table-officers').find(`[data-id_officer='${id}']`).remove();
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
            url: config_function_url,
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
            url: config_function_url,
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
            url: config_function_url,
            type: 'POST',
            data: { action: 'logout' },
            success: function(response) {
                console.log("Success" + response);
                $('#feedback').html(response);
                goToIndex(); 
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

    function bindSidenavClick(ids) {
        ids.forEach(function(id){
            $('#' + id).click(function() {
                event.preventDefault();
                sidenavSelect(id.split('-')[1]);
            });
        });
    }

    bindSidenavClick([
        'side-master',
        'side-dashboard',
        'side-stock',
        'side-orders',
        'side-dispatch',
        'side-trucks',
        'side-drivers',
        'side-logs'
    ]);

    // officers table
    $('#table-officers').on('click', '.officer-account', function(event){
        event.preventDefault();

        var classes = 'table-active';

        $('.officer-account').removeClass(classes);
        $('.officer-account .btn').hide();

        $(this).addClass(classes);
        $(this).find('.btn').show();

        console.log($(this).attr('class'));

        selectAccount($(this).data('id_officer'));
    })

    // delete account
    $('#table-officers').on('click', '.delete-account', function(event){
        // event.stopPropagation();
        var accountId = $(this).closest('.officer-account').data('id_officer');
        deleteAccount(accountId);
    })

    // stocks
    $('#add-item-submit').on('click', function(event){
        event.preventDefault();
        $('#add-item-form').submit();
    });

    $('#add-item-form').submit(function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        itemAdd(form_data);
    });

    $('#stock-delete').on('click', function(event){
        event.preventDefault();
        var stockId = $('#master-stock-preview tr.table-active').data('id_item');
        stockDelete(stockId);
    });

    $('#stock-add').submit(function(event){ 
        event.preventDefault();
        stockAdd();
    })

    $(document).on('click', '#master-stock-preview tbody tr', function(event){
        event.preventDefault();
        
        var classes = 'table-active';

        $('.item').removeClass(classes);
        $(this).addClass(classes);

        stockSelect($(this).data('id_item'));

        var id = $(this).find('td').eq(0).text();
        var name = $(this).find('td').eq(1).text();
        var category = $(this).find('td').eq(2).text();
        var price = $(this).find('td').eq(3).text();
        var description = $(this).find('td').eq(5).text();

        $('#item-edit_id').val(id);
        $('#item-edit_name').val(name);
        $('#item-edit_category').val(category);
        $('#item-edit_price').val(price);
        $('#item-edit_desc').val(description);
    })

    $('#stock-edit-form-submit').on('click', function(){
        $('#stock-edit-form').submit();
    })

    $('#stock-edit-form').submit(function(event){
        event.preventDefault();

        var data = {
            stock_id: $('#item-edit_id').val(),
            name: $('#item-edit_name').val(),
            category: $('#item-edit_category').val(),
            uom: $('#item-edit_uom').val(),
            price: $('#item-edit_price').val(),
            description: $('#item-edit_desc').val(),
            action: 'stock edit'
        };

        $.ajax({
            url: config_function_url,
            type: 'POST',
            data: data,
            success: function(response) {
                if(response == 'success') {
                alert('Item updated successfully.');
                location.reload(); // Reload to reflect changes
                } else {
                    alert('Failed to update item. Please try again.');
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
        
    })

    $("#item-search").on("keyup", function() {
        let query = $(this).val();
        let data = {
            query: query,
            action: 'item search'
        };

        if (query.length >= 1) {
            $.ajax({
                url: "../configs/config-function.php",
                type: "POST",
                data: data,
                success: function(data) {
                    let items = JSON.parse(data);
                    let suggestions = '';
                    items.forEach(function(item) {
                        suggestions += '<li class="list-group-item suggestion-item" data-id="' + item.item_id + '" data-name="' + item.item_name + '" data-density="' + item.density + '" data-price="' + item.price + '" data-description="' + item.description + '" ><span class="badge bg-dark">' + item.item_id + '</span> ' + item.item_name + '</li>';
                        console.log(item.density);
                    });
                    $("#item-suggestions").html(suggestions).show();
                    $('#item-suggestions li:gt(4)').remove();

                }
            });
        } else {
            $("#item-suggestions").hide();
        }
    });

    $('#order-form').submit(function(event) {
        event.preventDefault();

        var orderItems = [];

        $('#order-items-table tbody tr').each(function() {
            var row = $(this);
            var item = {
                item_id: row.find('.item-id').text(),
                quantity: row.find('.item-qty').val(),
                price: row.find('.item-price').text(),
                total: row.find('.item-total').text(),
                unit_type_id: parseInt(row.find('.item-unit option:selected').val()),
                unit_capacity: parseFloat(row.find('.item-unit option:selected').data('unit-capacity'))
            };
            
            orderItems.push(item);

        });

        var orderData = {
            client_name: $('#order-form-name').val(),
            client_number: $('#order-form-number').val(),
            client_email: $('#order-form-email').val(),
            address: {
                city: $('#order-form-address_city').val(),
                barangay: $('#order-form-address_brgy').val(),
                street: $('#order-form-address_street').val(),
                number: $('#order-form-address_number').val(),
            },
            items: orderItems,
            total_qty: parseInt($('#order-items-total_qty-input').val()),
            total_amount: parseFloat($('#order-items-total_price-input').val()),
            action: 'create order'
        }

        $.ajax ({
            url: config_function_url,
            type: 'POST',
            data: orderData,
            success: function(response) {
                console.log(`Unit type for the first item: ${orderItems[0]['unit_type_id']}`);
                console.log(response);
                alert('Order created successfully.');
                
                $('#order-form')[0].reset();
                $('.orders-table-container').load(location.href + ' .orders-table-container');
                $('#order-items-table tbody').empty();
                calculateOrderSummary();
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });

    $('#order-form-name').on('input', function() {
        var query = $(this).val();
        var data = {
            query: query,
            action: 'client search'
        };

        if (query.length > 2) {
            $.ajax({
                url: config_function_url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    var suggestions = JSON.parse(response);
                    var suggestionsList = $('#order-form-client-suggestions');

                    suggestionsList.empty();

                    if (suggestions.length > 0) {
                        suggestions.forEach(function(suggestion) {
                            suggestionsList.append('<li class="list-group-item client-suggestion-item" data-client-id="' + suggestion.client_id + '">' + suggestion.name + '</li>');
                        });
                        suggestionsList.show();
                    } else {
                        suggestionsList.hide();
                    }
                }
            });
        } else {
            $('#order-form-client-suggestions').hide();
        }
    });

    $(document).on('click', '.client-suggestion-item', function() {
        var client_id = $(this).data('client-id');
        var data = {
            client_id: client_id,
            action: 'get client info'
        };

        if (client_id) {
            $.ajax({
                type: 'POST',
                url: config_function_url,
                data: data,
                dataType: 'json',
                success: function(response) {
                    console.log(response.success);
                    if (response.success) {
                        $('#order-form-name').val(response.client_name);
                        $('#order-form-number').val(response.phone);
                        $('#order-form-email').val(response.email);
                        $('#order-form-address_city').val(response.address.city);
                        $('#order-form-address_brgy').val(response.address.barangay);
                        $('#order-form-address_street').val(response.address.street);
                        $('#order-form-address_number').val(response.address.house_number);
                        $('#order-form-client-suggestions').hide();
                        console.log(response.client_name);
                        console.log(response.phone);
                        console.log(response.email);
                        console.log(response.address.street);

                    } else {
                        console.error('No client info found.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);  
                    console.log(xhr.responseText); 
                    console.log('failed')
                }
            })
        } else { console.log('error') };
    });

    $(document).on('click', '#item-suggestions li', function(){
        var itemId = $(this).data('id');
        var itemName = $(this).data('name');
        var itemDensity = $(this).data('density');
        var itemDescription = $(this).data('description');
        var itemPrice = $(this).data('price');
        
        console.log('clicked');
        console.log('item id: ' + itemId);
        addItemToTable(itemId, itemName, itemPrice, itemDensity);
        $('#item-search').val('');
        $('#item-suggestions').hide();
        
    })

    $(document).on('click', '#order-item-remove', function() {
        $(this).closest('tr').remove();
        calculateOrderSummary();
    })

    $(document).on('click', '#order-items-table tbody tr .inc-qty', function(){
        var $input = $(this).closest('.input-group').find('.item-qty');
        var qty = parseInt($input.val());
        console.log('clicked: inc qty');
        $input.val(qty + 1);
        updateOrderTable($(this).closest('tr'));
    });
    
    $(document).on('click', '#order-items-table tbody tr .dec-qty', function(){
        var $input = $(this).closest('.input-group').find('.item-qty');
        var qty = parseInt($input.val());
        console.log('clicked: dec qty');
        if(qty > 1) {
            $input.val(qty - 1);
            updateOrderTable($(this).closest('tr'));
        }
    });

    $(document).on('input', '#order-items-table tbody tr .item-qty', function(){
        console.log('input: item qty');
        var $row = $(this).closest('tr');
        updateOrderTable($row);
    });

    function updateOrderTable($row = null) {
        var $rows = $row ? $row : $('#order-items-table tbody tr');

        $rows.each(function() {
            var $thisRow = $(this);
            var qty = parseInt($thisRow.find('.item-qty').val());
            var price = parseFloat($thisRow.find('.item-price').text());
            var density = parseFloat($thisRow.find('.item-density').text());
            var selectedOption = $thisRow.find('.item-unit option:selected');
            var unitCapacity = parseFloat(selectedOption.data('unit-capacity'));

            console.log('Selected Unit Capacity:', unitCapacity);

            var volume = unitCapacity / density;
            var total = qty * volume * price;

            console.log('Density: ' + density);
            console.log('Volume: ' + volume);
            console.log('Total: ' + total);

            $thisRow.find('.item-total').text(total.toFixed(2));
        });

        calculateOrderSummary();
    }


    function calculateOrderSummary() {
        var totalQty = 0;
        var totalPrice = 0;
        
        $('#order-items-table tbody tr').each(function() {
            var qty = parseInt($(this).find('.item-qty').val());
            var total = parseFloat($(this).find('.item-total').text());

            totalQty += qty;
            totalPrice += total;
        });

        
        $('#order-items-total_qty span').text(`${totalQty}`);
        $('#order-items-total_price span').text(`${totalPrice}`);

        $('#order-items-total_qty-input').val(totalQty);
        $('#order-items-total_price-input').val(totalPrice.toFixed(2));

        console.log('Total QTY:' + totalQty);
        console.log('Total Price:' + totalPrice);

    }

    function addItemToTable(id, name, price, density) {
        var newRow = 
                    '<tr class="">' +
                        '<td class="item-id text-center">' + id + '</td>' +
                        '<td class="text-center">' + name + '</td>' +
                        '<td class="item-unit">' +
                            '<select class="form-select" aria-label="Truck Type">' +
                                '<option selected disabled>Select Unit</option>' +
                            '</select>' +
                        '</td>' +
                        '<td class="mx-auto">' + 
                            '<div class="input-group input-group-sm mh-100">' + 
                                '<button class="btn btn-outline-danger input-group-text dec-qty">-</button>' + 
                                '<input type="text" class="form-control item-qty text-center" value="1" inputmode="numeric">' + 
                                '<button class="btn btn-outline-success input-group-text inc-qty">+</button>' + 
                            '</div>' + 
                        '</td>' +
                        '<td class="item-price text-center">' + price + '</td>' +
                        '<td class="item-total text-center">' + price + '</td>' +
                        '<td class="text-center"><i class="bi bi-x-circle fs-6" id="order-item-remove"></i></td>' +
                        '<td class="item-density d-none">' + density + '</td>' +
                    '</tr>';
        
        $('#order-items-table tbody').append(newRow);

        data = {
            action: 'get units info'
        };

        $.ajax({
            url: config_function_url,
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(response) {
                var unitSelect = $('#order-items-table tbody tr:last .item-unit select');
                
                console.log(unitSelect.val());
                console.log(response);

                response.forEach(function(unit){
                    unitSelect.append('<option value="' + unit.id + '" data-unit-capacity="' + unit.capacity +'">' + unit.type_name + '</option>');
                });
            },
            error: function() {
                console.error('Failed to fetch units');
            }
        });

        $('#order-items-table tbody').on('change', '.item-unit', function() {
            updateOrderTable($(this).closest('tr'));
        });

        updateOrderTable();
    };  

    $(document).on('click', '#preview-order-btn', function() {
        $('#preview-client-name').text('Name: ' + $('#order-form-name').val());
        $('#preview-client-address').text('Address: ' + 
            $('#order-form-address_number').val() + ', ' +
            $('#order-form-address_street').val() + ' Street' + ', ' +
            $('#order-form-address_brgy').val() + ', ' +
            $('#order-form-address_city').val() 
        );
        $('#preview-client-phone').text('Phone: ' + $('#order-form-number').val());
        $('#preview-client-email').text('Email: ' + $('#order-form-email').val());

        let itemsHtml = '';
        $('#order-items-table tbody tr').each(function() {
            let itemId = $(this).find('td').eq(0).text();
            let itemName = $(this).find('td').eq(1).text();
            let itemQty = $(this).find('.item-qty').val();
            let itemPrice = $(this).find('td').eq(3).text();
            let itemTotalPrice = $(this).find('td').eq(4).text();

            itemsHtml += 
            `<tr>
                <td>${itemId}</td>
                <td>${itemName}</td>
                <td>${itemQty}</td>
                <td>${itemPrice}</td>
                <td>${itemTotalPrice}</td>
            </tr>`;
        });
        $('#preview-order-items').html(itemsHtml);

        $('#preview-total-qty').text('Total Quantity: ' + $('#order-items-total_qty span').text());
        $('#preview-total-price').text('Total Price: ' + $('#order-items-total_price span').text());
    });

    $('#orderPreviewPrint').click(function () {
        window.print();
    });

    $('#add-unit-form').submit(function (event) {
        event.preventDefault();

        var formData = $(this).serialize();
        var data = {
            formData: formData,
            action: 'add unit'
        }

        $.ajax ({
            url: config_function_url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                $('#add-unit-form')[0].reset();
                alert('Unit added successfully');
            },
            error: function() {
                console.error('Failed to add unit');
                alert('Failed to add unit');
            }
        });

        console.log(formData);
    });

    $('#add-unit_type-form').submit(function (event) {
        event.preventDefault(); 

        var formData = $(this).serialize(); 
        var data = {
            formData: formData,
            action: 'add unit_type'
        };

        $.ajax({
            url: config_function_url,
            type: 'POST',
            data: data,
            success: function (response) {
                console.log(response);
                $('#add-unit_type-form')[0].reset();
                alert('Unit Type added successfully!');
            },
            error: function () {
                console.error('Failed to add Unit Type');
            }
        });
    });

    $('#add-driver-form').submit(function (event) {
        event.preventDefault();

        var formData = $(this).serialize(); 
        var data = {
            formData: formData,
            action: 'add driver'
        };

        $.ajax({
            url: config_function_url,  
            type: 'POST',
            data: data,
            success: function (response) {
                console.log(response); 
                alert('Driver added successfully!');

                $('#add-driver-form')[0].reset();
            },
            error: function () {
                console.error('Failed to add driver');
            } 
        });
    });

    $(document).on('click', '#order-list-pending .order', function() {
        var orderId = $(this).data('order-id');
        var loadingMessage = 'Loading';
        
        console.log('Order status updated successfully!');
        // Show loading state
        $('#dispatch-order-view').addClass('d-none');
        $('#dispatch-order-view-no_view').removeClass('d-none').find('.lead').text(loadingMessage);

        $.ajax({
            url: config_function_url,
            type: 'POST',
            dataType: 'json',
            data: {
                order_id: orderId,
                action: 'dispatch update order view'
            },
            success: function (response) {

                // full details
                console.log(response.order);
                console.log(response.items);

                if (response.order) {
                    $('#dispatch-order-view .order-id').text(response.order.id.toString().padStart(4, '0'));
                    $('#order-display-client .name').text(response.order.client_name);
                    $('#order-display-client .number').text(response.order.phone);
                    $('#order-display-client .email').text(response.order.email);
                    $('#order-display-location .location').text(response.order.full_address);
                    $('#order-display-created .created').text(response.order.created_at);

                    $('#order-display-items ul.pending li:not(:first)').remove();
                    $('#order-display-items ul.in-queue li:not(:first)').remove();
                    $('#order-display-items ul.in-progress li:not(:first)').remove();
                    $('#order-display-items ul.completed li:not(:first)').remove();
                    $('#order-display-items ul.failed li:not(:first)').remove();
                    $('#order-display-items ul.canceled li:not(:first)').remove();

                    response.items.forEach(function(item) {
                        var itemHtml = `
                            <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                ${item.status === 'pending' ? 
                                    '<input class="form-check-input" type="radio" name="orderListViewRadio" value="' + item.order_item_id + 
                                    '" data-order-id="' + response.order.id + 
                                    '" data-client-name="' + response.order.client_name + 
                                    '" data-phone="' + response.order.phone + 
                                    '" data-email="' + response.order.email + 
                                    '" data-full-address="' + response.order.full_address + 
                                    '" data-created="' + response.order.created_at + 
                                    '" data-type-name="' + item.type_name + 
                                    '" data-type-id="' + item.truck_type_id + 
                                    '" data-order-item-id="' + item.id + 
                                    '" data-item-name="' + item.item_name + 
                                    '" data-item-total="' + item.item_total + 
                                    '" data-item-price="' + item.item_price + '>' 
                                    : ''}
                                <div class="w-50 d-flex justify-content-between">
                                    <span>${item.item_name}</span>
                                    <span>${item.type_name}</span>
                                </div>
                                <span>${item.item_total}</span>
                            </li>`;

                            $('#order-display-items ul.' + item.status).append(itemHtml);
                    });

                    setTimeout(function () {
                        $('#dispatch-order-view').removeClass('d-none');
                        $('#dispatch-order-view-no_view').addClass('d-none');
                    }, 500);
                } else {
                    setTimeout(function() {
                        $('#dispatch-order-view').addClass('d-none');
                        $('#dispatch-order-view-no_view').removeClass('d-none').find('.lead').text('No details available.');
                    }, 500);
                }
            },
            error: function () {
                console.error('Failed to update order status.');
                setTimeout(function() {
                    $('#dispatch-order-view-no_view').removeClass('d-none').find('.lead').text('Error loading order details.');
                }, 500);
            }
        });
    });

    // Event listener for the close button
    $(document).on('click', '#dispatch-order-view .btn-close', function() {
        
        // Hide the order view and show the no_view element
        $('#dispatch-order-view').addClass('d-none');
        setTimeout(function() {
            $('#dispatch-order-view-no_view').find('.lead').text('Select an order to view details.');
        }, 500);
        $('#dispatch-order-view-no_view').removeClass('d-none').find('.lead').text('Loading');

    });

    $(document).on('click', '.dispatch-form-active .btn-close', function() {

        $('input[name="orderListViewRadio"]:checked').prop('checked', false);

        $('.dispatch-form-active').addClass('d-none');
        
        setTimeout(function() {
            $('.dispatch-form-inactive').find('.lead').text('Select an order item to view details.');
        }, 500);
        
        $('.dispatch-form-inactive').removeClass('d-none').find('.lead').text('Loading');

    });

    $(document).on('change', 'input[name="orderListViewRadio"]', function() {
        var selectedOrderItemId = $(this).val();
        var $dispatch_form_container = "dispatch-form";
        var $loading_message = 'Loading';

        $(`.${$dispatch_form_container}-inactive`).removeClass('d-none').find('.lead').text($loading_message);

        // Retrieve data from the selected radio button
        var orderId = $(this).data('order-id');
        var clientName = $(this).data('client-name');
        var phone = $(this).data('phone');
        var email = $(this).data('email');
        var fullAddress = $(this).data('full-address');
        var created = $(this).data('created');
        var orderItemId = $(this).data('order-item-id');
        var itemName = $(this).data('item-name');
        var typeId = $(this).data('type-id');
        var typeName = $(this).data('type-name');
        var itemTotal = $(this).data('item-total');

        $.ajax({
            url: config_function_url,
            type: 'POST',
            dataType: 'json',
            data: {
                unit_type_id: typeId,
                action: 'get dispatch form options'
            },
            success: function(response) {
                
                console.log(response);
                
                var units = response.units;
                var drivers = response.drivers;

                console.log("Units: ", units);
                console.log("Drivers: ", drivers);

                $('#dispatch-select-truck').find('option').not(':first').remove();                
                $('#dispatch-select-driver').find('option').not(':first').remove();

                units.forEach(function(unit) {
                    $('#dispatch-select-truck').append(`<option value="${unit.id}">#${unit.id.padStart(4,'0')} / ${unit.truck_number} / ${unit.status}</option>`);
                });

                drivers.forEach(function(driver) {
                    $('#dispatch-select-driver').append(`<option value="${driver.id}">#${driver.id.padStart(4,'0')} / ${driver.name} / ${driver.status}</option>`);
                });

                // Fill the form with the order details
                $('#dispatch-form .order-id').text(orderId.toString().padStart(4, '0'));
                $('#dispatch-form .client-name').text(clientName);
                $('#dispatch-form .client-phone').text(phone);
                $('#dispatch-form .client-email').text(email);
                $('#dispatch-form .order-location').text(fullAddress);
                $('#dispatch-form .order-created').text(created);
                $('#dispatch-form .order-item-id').text(orderItemId);
                $('#dispatch-form .item-name').text(itemName);
                $('#dispatch-form .unit-type').text(typeName);
                $('#dispatch-form .item-total').text(itemTotal);

                setTimeout(function() {
                    $(`.${$dispatch_form_container}-active`).removeClass('d-none');
                    $(`.${$dispatch_form_container}-inactive`).addClass('d-none');
                }, 500);

                console.log('Radio button selected with Order ID:', orderId);
                console.log(itemName);
                console.log(typeName);
            },
            error: function(xhr, status, error) {
                console.log("Status: " + status); 
                console.log("Error: " + error); 
                console.log("Response: " + xhr.responseText); 
            }
        });

    });

    $('#dispatch-form').on('submit', function (event) {
        event.preventDefault();

        var unit_id = $('#dispatch-select-truck').val();
        var operator_id = $('#dispatch-select-driver').val();
        var order_item_id = $('#dispatch-form .order-item-id').text();
        var order_id = $('#dispatch-form .order-id').text().trim();

        console.log('order item id:' + order_item_id);

        $.ajax({
            url: config_function_url,
            type: 'POST',
            dataType: 'json',
            data: {
                unit_id: unit_id,
                operator_id: operator_id,
                order_item_id: order_item_id,
                action: 'submit dispatch form'
            },
            success: function(response) {
                if (response.success) {
                    alert('Order successfully added to the queue!');
                    updateDispatchOrderItems(order_id);
                    console.log('Error: The ID is' + order_id);
                    updateDispatchPendingOrders();
                    updateDispatchTables();
                    
                } else {
                    alert('Error: ' + response.error);
                    alert('Error: The ID is' + order_id);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error Status: ' + status); 
                console.error('AJAX Error Message: ' + error);
                console.error('AJAX Full Response: ', xhr.responseText);
                
                try {
                    var responseJSON = JSON.parse(xhr.responseText);
                    if (responseJSON.error_code) {
                        console.error('Error Code: ' + responseJSON.error_code);
                    }
                    if (responseJSON.error) {
                        console.error('Error Message: ' + responseJSON.error);
                    }
                } catch (e) {
                    console.error('Failed to parse JSON response.');
                }

                alert('An unexpected error occurred. Please check the console for details.');
            }
        });

    });

    function updateDispatchOrderItems(orderId) {
        $.ajax({
            url: config_function_url,
            type: 'POST',
            dataType: 'json',
            data: {
                order_id: orderId,
                action: 'dispatch update order view'
            },
            success: function (response) {
                if (response.items) {
                    $('#order-display-items ul.pending li:not(:first)').remove();
                    $('#order-display-items ul.in-queue li:not(:first)').remove();
                    $('#order-display-items ul.in-progress li:not(:first)').remove();
                    $('#order-display-items ul.completed li:not(:first)').remove();
                    $('#order-display-items ul.failed li:not(:first)').remove();
                    $('#order-display-items ul.canceled li:not(:first)').remove();

                    response.items.forEach(function (item) {
                        var itemHtml = `
                            <li class="list-group-item d-flex justify-content-between">
                                ${item.status === 'pending' ? 
                                    '<input class="form-check-input" type="radio" name="orderListViewRadio" value="' + item.order_item_id + 
                                    '" data-order-id="' + response.order.id + 
                                    '" data-client-name="' + response.order.client_name + 
                                    '" data-phone="' + response.order.phone + 
                                    '" data-email="' + response.order.email + 
                                    '" data-full-address="' + response.order.full_address + 
                                    '" data-created="' + response.order.created_at + 
                                    '" data-type-name="' + item.type_name + 
                                    '" data-type-id="' + item.truck_type_id + 
                                    '" data-order-item-id="' + item.id + 
                                    '" data-item-name="' + item.item_name + 
                                    '" data-item-total="' + item.item_total +
                                    '" data-item-total="' + item.truck_capacity + '">' 
                                    : ''}
                                <div class="w-50 d-flex justify-content-between">
                                    <span>${item.item_name}</span>
                                    <span>${item.type_name}</span>
                                </div>
                                <span>${item.item_total}</span>
                            </li>`;

                        $('#order-display-items ul.' + item.status).append(itemHtml);
                    });

                    console.log('Order items updated successfully for orderId: ' + orderId);
                } else {
                    console.log('No items found for the order.');
                }
            },
            error: function (xhr, status, error) {
                // Log detailed error information
                console.error('AJAX Request Failed');
                console.error('Status: ' + status);
                console.error('Error: ' + error);
                console.error('Response Text: ' + xhr.responseText); 
                console.log(xhr);
            }
        });
    }

    function updateDispatchPendingOrders () {
        $.ajax({
            url: config_function_url, 
            type: 'POST',
            dataType: 'html',
            data: {
                action: 'get dispatch pending orders'
            },
            success: function(response) {
                $('#pending-orders-container').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Failed to refresh pending orders list:', error);
                console.log('Full response:', xhr.responseText);
            }
        });
    }

    function updateDispatchTables() {

        function defaultTableData(data, actions = 'error: please add actions.') {
            var data_att = `
                data-created-at = "${data.created_at}" 
                data-dispatch-date = "${data.dispatch_date}" 
                data-dispatch-time = "${data.dispatch_time}" 
                data-driver-id = "${data.driver_id}" 
                data-driver-name = "${data.driver_name}" 
                data-dispatch-id = "${data.id}" 
                data-item-id = "${data.item_id}" 
                data-item-name = "${data.item_name}"
                data-item-total = "${data.item_total}" 
                data-officer-id = "${data.officer_id}" 
                data-officer-name = "${data.officer_name}" 
                data-order-id = "${data.order_id}" 
                data-order-item-id = "${data.order_item_id}" 
                data-status = "${data.status}"  
                data-truck-id = "${data.truck_id}" 
                data-updated-at = "${data.updated_at}"
                data-client-name = "${data.client_name}"
                data-dispatch-address = "${data.house_number} ${data.street} Street, ${data.barangay}, ${data.city}"  
                data-truck-number = "${data.truck_number}"
                data-item-price = "${data.item_price}"
                data-truck-capacity = "${data.truck_capacity}" 
                data-client-phone = "${data.client_phone}" 
                data-client-email = "${data.client_email}"
            `;
            
            var table_data = `
                <tr ${data_att}>
                    <td>${data.id}</td>
                    <td>${data.order_id}</td>
                    <td>${data.item_name}</td>
                    <td>${data.item_total}</td>
                    <td>${data.driver_name}</td>
                    <td>${data.truck_number}</td>
                    <td>${data.officer_name}</td>
                    <td>
                        ${actions}
                    </td>
                </tr>`;

            // $('#dispatch-form')[0].reset();

            return table_data;
        };

        $.ajax({
            url: config_function_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'update dispatch table'
            },
            success: function(response) { 
                $('.dispatch-table tbody').empty();
                
                let action_data = {
                    in_queue: {
                        descend: {
                            color: 'secondary',
                            icon: 'dash',
                            action_status: 'remove'
                        },
                        ascend: {
                            color: 'info',
                            icon: 'plus',
                            action_status: 'in-transit'
                        }
                    },

                    in_transit: {
                        descend: {
                            color: 'dark',
                            icon: 'x',
                            action_status: 'failed'
                        },

                        ascend: {
                            color:'success',
                            icon: 'check',
                            action_status:'successful'
                        }
                    },

                    successful: {
                        descend: {
                            color: 'primary',
                            icon: 'dash',
                            action_status: 'in-queue'
                        },

                        remove: {
                            color: 'danger',
                            icon: 'x',
                            action_status: 'remove'
                        }
                    },

                    failed: {
                        descend: {
                            color: 'primary',
                            icon: 'dash',
                            action_status: 'in-queue'
                        },

                        remove: {
                            color: 'danger',
                            icon: 'x',
                            action_status: 'remove'
                        }
                    }
                };
                
                let actions = {};
                
                $.each(action_data, function (status, actionsConfig) {
                    let buttonCount = 0; 
                    let buttons = ''; 

                    if (actionsConfig.descend) {
                        buttons += `
                            <button class="action-button btn btn-sm btn-${actionsConfig.descend.color}" data-action-status="${actionsConfig.descend.action_status}">
                                <i class="bi bi-${actionsConfig.descend.icon}"></i>
                            </button>`;
                        buttonCount++;
                    }

                    if (actionsConfig.ascend) {
                        buttons += `
                            <button class="action-button btn btn-sm btn-${actionsConfig.ascend.color}" data-action-status="${actionsConfig.ascend.action_status}">
                                <i class="bi bi-${actionsConfig.ascend.icon}"></i>
                            </button>`;
                        buttonCount++;
                    }

                    if (actionsConfig.remove) {
                        buttons += `
                            <button class="action-button btn btn-sm btn-${actionsConfig.remove.color}" data-action-status="${actionsConfig.remove.action_status}">
                                <i class="bi bi-${actionsConfig.remove.icon}"></i>
                            </button>`;
                        buttonCount++;
                    }

                    let divClass = buttonCount === 2 ? 'd-flex gap-1 justify-content-center' : 'd-flex justify-content-center';

                    let buttonGroup = `<div class="${divClass}">${buttons}</div>`;

                    actions[status] = buttonGroup;
                });
                
                const statuses = Object.keys(response); 

                $.each(statuses, function(_, status) {
                    $.each(response[status], function(index, dispatch) {
                        let tableClass = `.dispatch-table.${status.replace('_', '-')}`;
                        $(tableClass + ' tbody').append(defaultTableData(dispatch, actions[status.replace('-', '_')]));
                        console.log(tableClass);
                    });
                });

                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching dispatch records:");

                console.error("Status: ", status); 
                console.error("Error Thrown: ", error); 
                console.error("Response Text: ", xhr.responseText); 
                console.error("Status Code: ", xhr.status); 
            }

        });
    }

    function padModalText (text) {
        return String(' ' + text).padStart(30,' .');
    };

    function populateDispatchModal (data) {
        $('#order-id').text(String(data.order_id).padStart(4, '0'));
        $('#dispatch-id').text(String(data.dispatch_id).padStart(4, '0'));
        $('#dispatch-id').attr('data-dispatch-id', data.dispatch_id);
        $('#item-name').text(data.item_name);
        $('#item-total').text(data.item_total);
        $('#driver-name').text(data.driver_name);
        $('#truck-number').text(data.truck_number);
        $('#officer-name').text(data.officer_name);
        $('#status').text(data.status);
        $('#client-name').text(data.client_name);
        $('#dispatch-address').text(data.dispatch_address);
        $('#item-price').text(data.item_price);
        $('#truck-capacity').text(data.truck_capacity);
        $('#client-phone').text(data.client_phone);
        $('#client-email').text(data.client_email);
        $('#dispatch-date').text(data.updated_at);
        $('#order-date').text(data.created_at);
    }

    $(document).on('click', '.dispatch-table .action-button', function() {
        var dispatch_id = $(this).closest('tr').data('dispatch-id');
        var action_status = $(this).data('action-status');
        var order_id = $(this).closest('tr').data('order-id');
        var driver_id = $(this).closest('tr').data('driver-id');
        var truck_id = $(this).closest('tr').data('truck-id');
        var driver_name = $(this).closest('tr').data('driver-name');
        var truck_number = $(this).closest('tr').data('truck-number');
        var officer_name = $(this).closest('tr').data('officer-name');
        var dispatch_date = $(this).closest('tr').data('dispatch-date');
        var dispatch_time = $(this).closest('tr').data('dispatch-time');
        var client_name = $(this).closest('tr').data('client-name');
        var dispatch_address = $(this).closest('tr').data('dispatch-address');
        var item_total = $(this).closest('tr').data('item-total');
        var item_price = $(this).closest('tr').data('item-price');
        var truck_capacity = $(this).closest('tr').data('truck-capacity');
        var item_name = $(this).closest('tr').data('item-name');
        var client_phone = $(this).closest('tr').data('client-phone');
        var client_email = $(this).closest('tr').data('client-email');
        var updated_at = $(this).closest('tr').data('updated-at');
        var created_at = $(this).closest('tr').data('created-at');

        var data = {
            order_id: order_id,
            driver_name: driver_name,
            truck_number: truck_number,
            officer_name: officer_name,
            dispatch_date: dispatch_date,
            dispatch_time: dispatch_time,
            dispatch_id: dispatch_id,
            client_name: client_name,
            dispatch_address: dispatch_address,
            item_total: item_total,
            item_price: item_price,
            truck_capacity: truck_capacity,
            item_name: item_name,
            client_email: client_email,
            client_phone: client_phone,
            updated_at: updated_at,
            created_at: created_at
        };

        if (action_status === 'in-transit') {

            populateDispatchModal(data);

            // Show the modal
            $('#dispatch-modal').modal('show');

            $('#confirm-in-transit').off('click').on('click', function() {
                $.ajax({
                    url: config_function_url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'update dispatch status',
                        dispatch_id: dispatch_id,
                        new_status: action_status,
                        driver_id: driver_id,
                        truck_id: truck_id
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Dispatch status updated to "in-transit" successfully.');
                            updateDispatchOrderItems(order_id); 
                            updateDispatchPendingOrders();
                            updateDispatchTables();
                        } else {
                            alert('Failed to update dispatch status.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error updating dispatch status:", error);
                        alert('An error occurred while updating the dispatch status.');
                    }
                });

                // Hide the modal after confirming
                $('#dispatch-modal').modal('hide');
            });
        } else {
            // For other statuses, perform the status update without showing the modal
            $.ajax({
                url: config_function_url,
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'update dispatch status',
                    dispatch_id: dispatch_id,
                    new_status: action_status,
                    driver_id: driver_id,
                    truck_id: truck_id
                },
                success: function(response) {
                    if (response.success) {
                        alert('Dispatch status updated successfully.');
                        updateDispatchOrderItems(order_id); 
                        updateDispatchPendingOrders();
                        updateDispatchTables();
                    } else {
                        alert('Failed to update dispatch status.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error updating dispatch status:", error);
                    alert('An error occurred while updating the dispatch status.');
                }
            });
        }
    });

    $(document).on('click', '#print-dispatch-slip', function() {
        var printContents = document.querySelector('#dispatch-modal .modal-body').innerHTML;
        var originalContents = document.body.innerHTML;

        // Create a new window for printing
        var printWindow = window.open('', '_blank', 'height=1000,width=1600');
        printWindow.document.write('<html><head><title>Dispatch Slip</title>');
        printWindow.document.write('<link rel="stylesheet" href="../styles/style.css">');
        printWindow.document.write('<link href="../imports/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">');
        printWindow.document.write(
            `<style>
                body { 
                    font-family: Arial, sans-serif; margin-top: 3em; 
                }

                span {
                    font-size: small;
                }
                
                strong {
                    font-size: small;
                }

                .fine-print {
                    font-size: x-small;
                    color: lightblue;
                }
            </style>`);
        printWindow.document.write('</head><body>');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        
        printWindow.focus();
        printWindow.document.close();

        printWindow.print();
        printWindow.close();

        var dispatch_id = $('#dispatch-id').data('dispatch-id'); 
        console.log(dispatch_id);

        $.ajax({
            url: config_function_url, 
            type: 'POST',
            data: {
                entity_type: 'dispatch',
                entity_id: dispatch_id,
                event_type: 'print',
                event_description: 'Dispatch slip printed.',
                action: 'print dispatch slip'
            },
            success: function(response) {
                if (response['success']) {
                    console.log('Print event logged successfully');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error logging print event: ' + error);
            }
        });
    });

    // Handle click on "View Details" button
    $(document).on('click', '.view-order-btn', function() {
        // Get data from the button
        var order_id = $(this).data('order-id');
        var client_id = $(this).data('client-id');
        var client_name = $(this).data('client-name');
        var client_phone = $(this).data('client-phone');
        var client_email = $(this).data('client-email');
        var total_price = $(this).data('total-price');
        var status = $(this).data('status');
        var address = $(this).data('address');
        var order_items = $(this).data('order-items');
        var order_date = $(this).data('order-date');
        var order_time = $(this).data('order-time');
        
        // Populate the modal with the data
        $('#modal-order-id').text(order_id);
        $('#modal-client-name').text(client_name);
        $('#modal-order-date').text(order_date);
        $('#modal-order-time').text(order_time);
        $('#modal-total-price').text(total_price);
        $('#modal-status').text(status);
        $('#modal-address').text(address);
        $('#modal-client-id').text(client_id);
        $('#modal-client-phone').text(client_phone);
        $('#modal-client-email').text(client_email);

        // Show the modal
        $('#order-details-modal').modal('show');
    });

    updateDispatchTables();
    
});

</script>