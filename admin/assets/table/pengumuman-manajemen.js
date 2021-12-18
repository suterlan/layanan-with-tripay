$(document).ready(function () {
    $('#pengumumanTable').DataTable({
        stateSavet: true,
        "pagingType": "full_numbers"
    });

    // edit Pengumuman
    $('.edit-pengumuman').on('click', function () {
        let id = $(this).data('id');

        $.ajax({
            url: base_url + 'pengumuman/editPengumuman',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id-pengumuman-edit').val(data.id);
                $('#judul_pengumuman-edit').val(data.judul_pengumuman);
                $('#text_pengumuman-edit').val(data.text_pengumuman);
            }
        });
    });
    // end edit pengumuman

    //Confirm Delete
    $('.remove-pengumuman').on('click', function () {
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
                    url: base_url + 'pengumuman/deletePengumuman',
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


