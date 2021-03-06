// Cancel Button
$(".cancel").click(function () {
    history.back();
});

// Delete Confirm
$(document).ready(function() {
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });
});

// Minimal Select 2
$(document).ready(function() {
    $('.single-select2').select2();
});

// Image Upload
$(document).ready(function() {
    $('.image').change(function () {
        $(this).closest('.img-parent').find('.image-show').attr('src',URL.createObjectURL(event.target.files[0]));
    });
});


