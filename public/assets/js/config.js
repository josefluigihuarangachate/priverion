var api = 'api/';


function ToastAlert(status, msg, opcLink) {

    if (status == 'Ok' || status == 'ok') {
        $.toast({
            heading: 'Aviso Importante',
            text: msg,
            showHideTransition: 'slide',
            icon: 'info',
            position: 'bottom-right',
            stack: false
        });

        if (opcLink == "#") {
            setTimeout(function () {
                location.reload();
            }, 3000);
        } else if (opcLink != '') {
            setTimeout(function () {
                window.location = opcLink;
            }, 3000);
        }
    } else if (status == 'Error' || status == 'error') {
        $.toast({
            heading: 'Aviso Importante',
            text: msg,
            showHideTransition: 'slide',
            icon: 'error',
            position: 'bottom-right',
            stack: false
        });
    }

}

