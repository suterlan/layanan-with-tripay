//Tabel user
$(document).ready(function () {
    $('#userTable').DataTable({
        stateSavet: true,
        "pagingType": "full_numbers"
    });

    //Confirm Delete
    $('.remove').on('click', function () {
        const id = $(this).data('id');
        swal.fire({
            title: 'Anda Yakin?',
            text: 'Data akan dihapus permanent!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'user/deleteUser',
                    data: { id: id },
                    method: 'post',
                    dataType: 'json',
                    success: function (data) {
                        swal.fire(
                            'Deleted',
                            'Your data has been deleted',
                            'success'
                        )
                        location.reload();
                    }
                    // end notif success
                });
                // end ajax
            }
            // end if
        });
        // end result yes
    });
    // end confirm

    // Edit Data User in modals
    $('.edit').on('click', function () {
        const id = $(this).data('id');

        $.ajax({
            url: base_url + 'user/editUser',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id-edit').val(data.id);
                $('#nama-edit').val(data.nama);
                $('#username-edit').val(data.username);
            }
        });
    });
    // end edit form
    //change option update password or not
    $('input[type="checkbox"]').click(function () {
        if ($(this).is(":checked")) {
            $('#password-edit').prop('disabled', false);
            $('#password2-edit').prop('disabled', false);
        } else if ($(this).is(":not(:checked)")) {
            $('#password-edit').prop('disabled', true);
            $('#password2-edit').prop('disabled', true);
        }
    });
    //end of change option

});
// end document jquery