$(document).ready(function () {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ms-2',
            cancelButton: 'btn btn-danger me-2'
        },
        buttonsStyling: true
    })

    $('.delete-category').click(function(e){
        let targetId = $(this).attr('data-id');
        let targetTable = $(this).attr('data-name');
        deleteCategory(targetId, targetTable);
    });


    function deleteCategory(id, table) {
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: `/${table}/${id}`,
                    data: {
                        '_token' : $("meta[name='csrf-token']").attr("content"),
                        'id': id
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        if (response.status === 'success') {
                            $(`#category${id}`).fadeOut('fast');
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        } else if (response.status === 'error') {
                            swalWithBootstrapButtons.fire(
                                'Oops!',
                                `${response.message}`,
                                'warning'
                            )
                        }
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }
});