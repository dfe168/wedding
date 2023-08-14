<form action="" method="get">
<input type="datetime-local" class="form-control" id="in_datetime" name="flight_in_datetime" min="2023-12-22T00:00" max="2023-12-30T00:00">
<button type="submit">send</button>
</form>

<?php
    print_r($_GET);
?>