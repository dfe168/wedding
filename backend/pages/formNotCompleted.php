<?php
if (!defined('INCLUDED')) {
  die('Access denied');
}
?>

<h3>Not responded</h3>
<hr>

<table id="table" class="display table-warning" style="width:100%">
  <thead>
    <th>Name</th>
    <th>Phone#</th>
    <th>Invitation sent</th>
  </thead>
  <tbody>
  </tbody>
</table>

<script>
$(document).ready(function() {
  var table = $('#table').DataTable({
    responsive: true,
    ajax: {
      url: './api/guestInformation.php?api=formNotCompleted',
      method:'post',
      dataSrc: ''
    },
    columns: [
      { data: 'name' },
      { data: 'phone' },
      {data: "created_datetime"}
    ]
  });

});
</script>

