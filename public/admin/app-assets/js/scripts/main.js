//remove-alert
$(document).on('click', '.remove-alert', function (e) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'swal2-confirm',
            cancelButton: 'swal2-cancel'
        },
        buttonsStyling: true
    });
    swalWithBootstrapButtons.fire({
        title: 'هل أنت متأكد؟',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'نعم',
        cancelButtonText: 'لا',
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            var id = $(this).attr('object_id');
            var d_url = $(this).attr('delete_url');
            var elem = $(this).parent('td').parent('tr');
            var proelem =$(this).closest(".remove-oneitem"),
                token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'post',
                url: '/admin'+d_url+id,
                data: {
                    _method:'delete',
                    _token: token
                } ,
                dataType: 'json',
                success: function (result) {
                    console.log('result', result);
                    elem.remove();
                    proelem.remove();
                    swalWithBootstrapButtons.fire({
                        title: 'تم الحذف  بنجاح',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            });
        } else if (
            // / Read more about handling dismissals below /
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire({
                title: 'تم إلإلغاء',
                showConfirmButton: false,
                timer: 1000
            });

        }
    })


    //form validtion
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

});
