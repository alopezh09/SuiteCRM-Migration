function update_tickets() {
    $('<img id="actualizar_ticket_spinner" src="themes/default/images/img_loading.gif" style="display: flex;margin: 5px 20px;">')
        .insertAfter("#actualizar_tickets");

    var xhr = new XMLHttpRequest();

    var url = '/index.php?module=Emails&action=index&parentTab=Todo';
    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#actualizar_ticket_spinner").remove();
            location.reload();
        }
    }

    xhr.send();
}