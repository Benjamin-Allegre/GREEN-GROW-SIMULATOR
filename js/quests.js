function openQuest(element) {
    const id = element.dataset.id;

    fetch('index.php?action=quest&id=' + id)
        .then(res => res.text())
        .then(html => {
            document.getElementById('questContent').innerHTML = html;

            const modal = new bootstrap.Modal(
                document.getElementById('questModal')
            );

            modal.show();
        });
}
function saveMarque() {
    const marque = document.getElementById('marqueInput').value;

    fetch('index.php?action=saveMarque', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'marque=' + encodeURIComponent(marque)
    })
    .then(res => res.text())
    .then(data => {
        if (data === 'OK') {

            fetch('index.php?action=quest&id=1')
            .then(res => res.text())
            .then(html => {
                document.getElementById('questContent').innerHTML = html;
            });

        } else {
            document.getElementById('marqueError').innerHTML = data;
        }
    });
}