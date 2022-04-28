var sendrun = true;
setInterval(function() {
    if (sendrun == true) {
        sendrun = false;
        $.get("../model/loop.php", {},
            function(data, status) {
                if (status === 'success') {
                    sendrun = true;
                }
            });
    }
}, 1000);