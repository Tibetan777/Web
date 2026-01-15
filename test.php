<?php
$count3 = 0;
$count5 = 0;

for ($i = 3; $i <= 30; $i++) {

    if ($i % 3 == 0 || $i % 5 == 0) {
        echo $i . "<br>";
    }

    if ($i % 3 == 0) {
        $count3++;
    }

    if ($i % 5 == 0) {
        $count5++;
    }
}

echo "จำนวนที่หาร 3 ลงตัว: " . $count3 . "<br>";
echo "จำนวนที่หาร 5 ลงตัว: " . $count5;
?>
