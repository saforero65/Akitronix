<?php
$variable = 123456;
?>

<button onclick="test()"> Click </button>
<div> </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    function test() {
        $.ajax({
            url: "reporte.php",
            success: function(result) {
                $("div").text(result);
            }
        })
    }
</script>