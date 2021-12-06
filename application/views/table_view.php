<div style="margin: 10px;">
<h3>Достоверность:</h3>
    <table border="1" cellpadding=10>
        <?
        foreach($this->data[0] as $item){
            echo '<tr><td>'.$item->get_name().'</td><td>'.$item->PercentOfLuck($this->data[2]).'%'.'</td></tr>';
		    }
        //echo '<tr>'. '<td>'. $extrasense1->name . '</td>' . '<td>' . PercentOfLuck($extrasense1)  . "%" . '</td>' . '</tr>';
        ?>
    </table><br>
    
    <br>
    <h3>История:</h3>
    <table border="1" style="text-align:center;" cellpadding=10>
    <tr><td>Загаданное число</td>
    <?
    foreach($this->data[0] as $item){
        echo '<td>'.$item->get_name().'</td>';
    }
    ?>
    </tr>
    <?
    if(isset($this->data[1])){
    foreach($this->data[1] as $item){
        echo '<tr>';
        echo '<td>'. $item[0]. '</td>';
        foreach($item[1] as $row){
    	    echo '<td>'. $row. '</td>';
        }
        echo '</tr>';
    }
    }
    ?>
    </table>
</div>