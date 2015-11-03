<?php

#Basic Line
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("seaonline", $con);


$result = mysql_query("SELECT tb.judul , COUNT(*) as tot FROM rel_peminjamanbuku rp
left join tbl_buku tb on tb.idbuku = rp.idbuku
GROUP BY rp.idbuku order by tot DESC limit 5");

$bln = array();
$bln['name'] = 'Bulan';
$rows['name'] = 'Jumlah Pelawat';
while ($r = mysql_fetch_array($result)) {
    $bln['data'][] = $r['judul'];
    $rows['data'][] = $r['tot'];
}
$rslt = array();
array_push($rslt, $bln);
array_push($rslt, $rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


