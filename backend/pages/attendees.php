<?php
if (!defined('INCLUDED')) {
  die('Access denied');
}
?>

<h3>Attendees</h3>
<hr>

<table id="table" class="display table-info" style="width:100%">
  <thead>
    <th ></th>
    <th>Name</th>
    <th>Phone#</th>
    <th>Adults</th>
    <th>Children</th>
    <th>Accommodation</th>
  </thead>
  <tbody>
  </tbody>
</table>

<script>
$(document).ready(function() {
  var table = $('#table').DataTable({
    responsive: true,
    ajax: {
      url: 'api/attendees.php?api=getAttendees',
      dataSrc: ''
    },
    columns: [
      {
        "data": null,
        "defaultContent": '',
        "orderable": false,
        "width": "5px",
        "render": function(data) {
          if (data.accommodation == '1') {
            return '<span class="toggle-sign plus-sign"></span>';
          } else {
            return '';
          }
        }
      },
      { data: 'name' },
      { data: 'phone' },
      { data: 'adults' },
      { data: 'children' },
      {
        data: function(data) {
          return data.accommodation == '1' ? 'YES' : 'NO';
        }
      }
    ]
  });

  $('#table tbody').on('click', 'span.toggle-sign', function() {
    var tr = $(this).closest('tr');
    var row = table.row(tr);

    if (row.data().accommodation == '1') {
      if (row.child.isShown()) {
        // Deze rij is al geopend - sluit deze
        row.child.hide();
        tr.removeClass('shown');
        $(this).removeClass('minus-sign').addClass('plus-sign');
      } else {
        // Open de rij om meer gegevens te tonen
        row.child(formatChildRow(row.data())).show();
        tr.addClass('shown');
        $(this).removeClass('plus-sign').addClass('minus-sign');
      }
    }
  });

  function formatChildRow(data) {
    var childTable = '<div class="row"><div class="col">Inbound Flight<table style="font-weight: bold;">'+
                      '<tr><td>Inbound date:</td><td>' + data.flight_in_datetime + '</td></tr>' +
                      '<tr><td>Flight #:</td><td>' + data.flight_in_num + '</td></tr>' +
                      '<tr><td>From:</td><td>' + data.flight_from + '</td></tr>' +
                      // Voeg meer rijen toe voor andere gegevens die je wilt weergeven
                      '</table></div> ' + 
                      '<div class="col">Return Flight<table style="font-weight: bold;">'+
                      '<tr><td>Return date:</td><td>' + data.flight_in_datetime + '</td></tr>' +
                      '<tr><td>Flight #:</td><td>' + data.flight_in_num + '</td></tr>' +
                      '<tr><td>To:</td><td>' + data.flight_from + '</td></tr>' +
                      // Voeg meer rijen toe voor andere gegevens die je wilt weergeven
                      '</table></div></div>';

    return childTable;
  }
});


</script>

<style>
  /* Stijl voor het "+" teken */
.plus-sign {
  background: url('./assets/img/details_open.png') no-repeat center center;
    cursor: pointer;
    position: relative;
    padding-left: 30px;
}

/* Stijl voor het "-" teken wanneer details zijn geopend */
.minus-sign {
  background: url('./assets/img/details_close.png') no-repeat center center;
    cursor: pointer;
    position: relative;
    padding-left: 30px;
}

</style>