$(document).ready(function () {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ms-2',
            cancelButton: 'btn btn-danger me-2'
        },
        buttonsStyling: true
    })

    $('.trending-products').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        adaptiveHeight: true,
        dots: true
    });

    $('.qty-btn').click(function(e) {
        e.preventDefault();
        let action = $(this).data('action');
        let input = $(this).closest('.product-quantity').find('input#quantity');
        let limit = input.data('limit');
        let currentValue = isNaN(parseInt(input.val(), 10)) ? 0 : parseInt(input.val(), 10);

        if (action === 'inc') {
            if (currentValue < limit) {
                input.val(currentValue+1);
            }
        } else if (action === 'dec') {
            if (currentValue > 1) {
                input.val(currentValue-1);
            }
        }

    });

    $('.addToCartBtn').click(function (e) { 
        e.preventDefault();
        
        let prod_id = $(this).closest('.product-quantity').find('.prod_id').val();
        let prod_qty = $(this).closest('.product-quantity').find('.prod_qty').val();

        $.ajax({
            type: "POST",
            url: `/cart`,
            data: {
                '_token' : $("meta[name='csrf-token']").attr("content"),
                'prod_id': prod_id,
                'prod_qty': prod_qty
            },
            success: function (response) {
                if (response.status === 'success') {
                    swalWithBootstrapButtons.fire(
                        'Added!',
                        `${response.product_name} was added to the cart.`,
                        'success'
                    )
                }
                if (response.status === 'warning') {
                    swalWithBootstrapButtons.fire(
                        'Oops!',
                        `${response.message}`,
                        'info'
                    )
                }
                if (response.status === 'error'){
                    swalWithBootstrapButtons.fire({
                        title: '<strong> Login! </strong>',
                        icon: 'warning',
                        html: response.message,
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText:`<a href="${response.redirect_url}" class="text-light text-decoration-none">Login</a>`,
                    })
                }
            },
            error: function(data, error, message) {
                swalWithBootstrapButtons.fire({
                    title: '<strong> Login! </strong>',
                    icon: 'warning',
                    html:
                        'Join us for getting new and exciting offers',
                    showCloseButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                    confirmButtonText:
                        '<a href="/login" class="text-light text-decoration-none">Login</a>',
                })
            }
        });
    });

    $('.deleteCartProduct').click(function (e) { 
        e.preventDefault();
        let targetId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it !',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: `/cart/${targetId}`,
                    data: {
                        '_token' : $("meta[name='csrf-token']").attr("content"),
                        'id': targetId
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            $(e.target).closest('.item-cart').fadeOut();
                            Swal.fire(
                                'Deleted!',
                                `${response.product} was removed from the cart`,
                                'success'
                            )
                        } else if (response.status === 'error') {
                            Swal.fire(
                                'Oops!',
                                `${response.message}`,
                                'error'
                            )
                        }
                    }
                });
            }
        })

        
    });

});