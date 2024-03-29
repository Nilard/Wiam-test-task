document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-cancel').forEach(button => {
        button.addEventListener('click', function () {
            fetch('/admin/cancel-decision?token=xyz123&imageId=' + this.dataset.id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        });
    });
});
