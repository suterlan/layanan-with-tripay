<?php
// class buat set Notifikasi 
class Message
{
    public function messageAlert($type, $title)
    {
        $messageAlert = "
            setTimeout(function(){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true
                });
                toastr." . $type . "('" . $title . "')
            }, 20);
             ";

        return $messageAlert;
    }
}
