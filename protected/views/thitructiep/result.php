<?php
/* @var $this ThitructiepController */

$this->breadcrumbs=array(
	'Thitructiep'=>array('/thitructiep'),
	'Result',
);
?>
<?php echo '<strong>Exam code:</strong> ' . $examId . '<br>';
echo '<br><strong>Student:</strong> '. $userName.'<br>';
echo '<strong>Number of Right answer :</strong> ' . $count . ' / ' . count($option) . '<br>';
echo '<strong> Score ( coefficient of 10 ): </strong>'.(10/count($option)*$count).'<br><br>';
//print_r($userId);
?>
<table class="tg">
    <tr>
        <th>Question</th>
        <th>Option</th>
        <!--<th>Right Answer</th>-->
        <th>Right</th>
        <th>Wrong</th>
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