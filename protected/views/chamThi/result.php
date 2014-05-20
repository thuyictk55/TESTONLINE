<?php
/* @var $this ChamThiController */

$this->breadcrumbs = array(
    'Cham Thi' => array('/chamThi'),
    'Result',
);
//print_r($option);
echo 'Exam code: ' . $examId . '<br>';
echo '<br>';
echo '<b><h4>Number of Right answer : ' . $count . ' / ' . count($option) . '</b></h4><br><br>';
//print_r($arrayDA);
//print_r($dapan);
//print_r($dapandung);
?>
<table class="tg">
    <tr>
        <th>Question</th>
        <th>Option</th>
        <th>Correct</th>
        <th>Incorrect</th>
    </tr>

    <?php
    foreach ($option as $o) {
        $option1[] = $o;
    }
    for ($i = 0; $i < count($arrayDA); $i++) {
        if ($i % 2 == 0) {
            echo '<tr><td class="tg-vn4c"> Question ' . ($i + 1) . '</td>';
            echo '<td class="tg-vn4c">  ' . $option1[$i] . '</td>';
//        echo '<td>  ' . $dapandung[$i] . '</td>';
            echo '<td class="tg-vn4c">';
            if ($arrayDA[$i] == 1)
                echo '<img class="tick">';
            else
                echo '';
            echo '</td>';
            echo '<td class="tg-vn4c">';
            if ($arrayDA[$i] == 0)
                echo '<img class="tick">';
            else
                echo '';
            echo '</td></tr>';
//            echo '</td>';
//            echo '<br/>';
        }
        else {
            echo '<tr><td> Question ' . ($i + 1) . '</td>';
            echo '<td>  ' . $option1[$i] . '</td>';
//        echo '<td>  ' . $dapandung[$i] . '</td>';
            echo '<td>';
            if ($arrayDA[$i] == 1)
                echo '<img class="tick">';
            else
                echo '';
            echo '</td>';
            echo '<td>';
            if ($arrayDA[$i] == 0)
                echo '<img class="tick">';
            else
                echo '';
            echo '</td></tr>';
//            echo '</td>';
//            echo '<br/>';
        }
    }
    ?>


</table>
