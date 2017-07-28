<?php
if (!isset($data)) {
?>

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

<?php
}
else
{
  $html = '<table border="1"><tr>';
  foreach ($data['header'][1] as $item) {
    $html .= '<th>'.$item.'</th>';
  }
  $html .= '</tr>';
  foreach ($data['arr_data'] as $items) {
    $html .= '<tr>';
    foreach ($items as $item) {
      $html .= '<td>'.$item.'</td>';
    }
    $html .= '</tr>';
  }
  $html .= '</table>';
  echo $html;
}
?>
