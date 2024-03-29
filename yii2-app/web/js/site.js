document.addEventListener('DOMContentLoaded', function () {
    const btnApprove = document.getElementById('btn-approve');
    const btnReject = document.getElementById('btn-reject');

    if (btnApprove) {
        btnApprove.addEventListener('click', function () {
            sendDecision('approve', this.dataset.id);
        });
    }

    if (btnReject) {
        btnReject.addEventListener('click', function () {
            sendDecision('reject', this.dataset.id);
        });
    }

    function sendDecision(action, imageId) {
        fetch(`/site/${action}?imageId=` + imageId, {
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
    }
});
