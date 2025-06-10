document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.delete').forEach(button => {
        button.addEventListener('click', function(e) {
            const taskId = this.getAttribute('data-task-id');

            Swal.fire({
                title: "¿Estás seguro?",
                text: "Esta acción es irreversible.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, borrar!",
                cancelButtonText: "Cancelar",
                customClass: {
                    confirmButton: "btn-confirm",
                    cancelButton: "btn-cancel"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/deletedTask/' + taskId;
                }
            });
        });
    });

    document.querySelectorAll('.edit').forEach(button => {
        button.addEventListener('click', function() {
            const taskId = this.getAttribute('data-task-id');
            window.location.href = '/editTask/' + taskId;
        });
    });
});
