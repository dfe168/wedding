<?php
if (!defined('INCLUDED')) {
  die('Access denied');
}
?>
<h3>Not Coming</h3>
<hr>

<table id="table" class="display table-danger" style="width:100%">
  <thead>
    <th>Name</th>
    <th>Phone#</th>
  </thead>
  <tbody>
  </tbody>
</table>

<script>
$(document).ready(function() {
  var table = $('#table').DataTable({
    responsive: true,
    ajax: {
      url: './api/guestInformation.php?api=getAbsent',
      method:'post',
      dataSrc: ''
    },
    columns: [
      { data: 'name' },
      { data: 'phone' },
    ]
  });

});
</script>