<?php

$jml = $_GET['jml'] ?? 0;
echo "<table border=1 style='border-collapse:collapse'>\n";
for ($a = $jml; $a > 0; $a--)
{
  // row total
  echo "<tr>\n <td colspan='$jml'>TOTAL: ".($a*($a+1)/2)."</td> </tr>\n";

  // row data
  echo "<tr>\n";
  for ($b = $a; $b > 0; $b--)
  {
    echo "<td>$b</td>";
  }

  if ($jml - $a > 0) {
    // for collapsed
    echo "<td colspan='".$jml - $a."'></td>";
  }
  echo "</tr>\n";

}
echo "</table>";

?>