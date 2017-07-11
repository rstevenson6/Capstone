<?php if (!isset($data)) { ?>

<table border="1">
  <tr>
    <th>header 1</th>
    <th>header 2</th>
  </tr>
  <tr>
    <td>data 1</td>
    <td>data 2</td>
  </tr>
  <tr>
    <td>data 3</td>
    <td>data 4</td>
  </tr>
</table>

<?php } else {echo var_dump(json_decode($data));} ?>
