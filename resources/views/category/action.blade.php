<script>
    function showAlert(id) {
        Swal.fire({
            title: 'Are you sure <br> to Delete this Category?',
            text: "This category make delete.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Category deleted',
                    'successfully',
                    'success'
                );
                setTimeout(function () {
                    $("#form"+id).submit();
                }, 1500)
            }
        })
    }

</script>
