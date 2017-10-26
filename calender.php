<?php

$weekday = array('日','月','火','水','木','金','土');
$day = 1;

$datetime = new DateTime("Asia/Tokyo");

/* 現在の年、月を取得 */
$year = $datetime->format('Y');
$month = $datetime->format('m');

/* 現在の月の1日目の曜日を割り出すため現在の日付を1日目として設定する */
$datetime->setDate($year, $month, 1);
$firstWeekDay = (int)$datetime->format('w');
$lastDay = (int)$datetime->format('t');

?>
<!DOCTYPE html>
<html lang="ja">
<meta charset="utf-8">
<head>
<title>PHPカレンダ</title>
</head>
<body>

<table style="border:1px solid;">
<figcaption><?=$year.'年'.$month.'月'?></figcaption>
<tr>
  <?php foreach($weekday as $value): ?>
    <th><?=$value?></th>
  <?php endforeach; ?>
</tr>
<?php
/*
  1日目がはじまるのが日曜じゃないなら、
  はじまるまでの数日分を空白で埋める
*/
 for ($i=0; $i<$firstWeekDay; $i++) {
  echo '<td> </td>';
}

/* 6(週)*7(曜日)=42のマスでカレンダを構成 */
for ($cell=$firstWeekDay; $cell<42; $cell++) {

  /* 日曜日に改行させたいから */
  if ($cell%7 === 0) {
    echo '</tr><tr>';
  }

  /* 日付を出力、最終日を過ぎれば空白で埋める */
  if ($day <= $lastDay) {
    echo '<td>'.$day.'</td>';
  } else {
    echo '<td> </td>';
  }

  $day++;
}
?>
</tr>
</table>

</body>
</html>