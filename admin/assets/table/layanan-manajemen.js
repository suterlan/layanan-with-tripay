$(document).ready(function () {
    $('#layananTable').DataTable({
        stateSavet: true,
        "pagingType": "full_numbers"
    });

    // edit Layanan
    $('.edit-layanan').on('click', function () {
        let id = $(this).data('id');

        $.ajax({
            url: base_url + 'layanan/editLayanan',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id-layanan-edit').val(data.id);
                $('#nama-layanan-edit').val(data.nama_layanan);
                $('#harga-layanan-edit').val(data.harga);
                $('#harga_del-edit').val(data.harga_del);
                $('#fitur1-edit').val(data.fitur1);
                $('#fitur2-edit').val(data.fitur2);
                $('#fitur3-edit').val(data.fitur3);
                $('#fitur4-edit').val(data.fitur4);
                $('#fitur5-edit').val(data.fitur5);
                $('#fitur6-edit').val(data.fitur6);
                $('#fitur7-edit').val(data.fitur7);
                $('#fitur8-edit').val(data.fitur8);
                $('#fitur9-edit').val(data.fitur9);
                $('#fitur10-edit').val(data.fitur10);
            }
        });
    });
    // end edit layanan

    //Confirm Delete
    $('.remove-layanan').on('click', function () {
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
                    url: base_url + 'layanan/deleteLayanan',
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

});
// end of document ready


