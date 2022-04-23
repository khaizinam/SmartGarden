<p>Running</p>
<script src="./asset/js/jquery.min.js"></script>
<script>
    var run = true;
    setInterval(function() {
        if(run == true){
            run = false;
            $.get("./model/loop.php", {
            },
            function(data, status) {
                if (status === 'success') {
                    run = true;
                }
            });
        }
}, 1000);
</script>