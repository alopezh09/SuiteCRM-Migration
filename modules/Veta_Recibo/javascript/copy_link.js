function fallbackCopyTextToClipboard(text) {
    var textArea = document.createElement("textarea");
    textArea.value = text;

    // Avoid scrolling to bottom
    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";

    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';
        console.log('Fallback: Copying text command was ' + msg);
    } catch (err) {
        console.error('Fallback: Oops, unable to copy', err);
    }

    document.body.removeChild(textArea);
}

function copyTextToClipboard(text) {
    console.log(text);
    if (!navigator.clipboard) {
        fallbackCopyTextToClipboard(text);
        document.location = 'index.php?module=Veta_Recibo&action=copy_company_link&rid=' + document.getElementsByName('record')[0].value;
        return;
    }
    navigator.clipboard.writeText(text).then(function () {
        console.log('Async: Copying to clipboard was successful!');
        document.location = 'index.php?module=Veta_Recibo&action=copy_company_link&rid=' + document.getElementsByName('record')[0].value;
    }, function (err) {
        console.error('Async: Could not copy text: ', err);
        document.location = 'index.php?module=Veta_Recibo&action=copy_company_link&rid=' + document.getElementsByName('record')[0].value;
    });
}