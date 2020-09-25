document.addEventListener('DOMContentLoaded', () => {
    function removeAlertBoxes() {
        const alertBoxes = Array.from(document.getElementsByClassName('alert'));
        alertBoxes.forEach(alertBox => {
            alertBox.remove();
        });
    }

    document.addEventListener('click', function (e) {
        const el = e.target;
        if (el.classList.contains('detail')) {
            window.location.href = el.dataset.link;
        } else if (el.classList.contains('delete')) {
            if (confirm("Are you sure want to delete this language?")) {
                document.getElementById('form-delete-' + el.dataset.name).submit();
            }
        } else if (el.classList.contains('new-language')) {
            window.location.href = el.dataset.link;
        } else if (el.classList.contains('redirect')) {
            window.location.href = el.dataset.link;
        }
    });

    setTimeout(() => {
        if ($) {
            $('select').select2();
        } else {
            setTimeout(() => {
                $('select').select2();
            }, 100);
        }
    }, 100);

    setTimeout(() => {
        $('.data-languages').DataTable({
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": 2,
            }]
        });
    }, 1000);

    setTimeout(() => {
        removeAlertBoxes();
    }, 3000);
});
