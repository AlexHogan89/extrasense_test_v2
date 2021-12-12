    
    <div style="margin: 10px;">
<h3>Достоверность:</h3>
    <table border="1" cellpadding=10>
        <?
        foreach($this->data['team_members'] as $member){
            echo '<tr><td>'.$member['name'].'</td><td>'.$member['luck'].'%'.'</td></tr>';
		    }
        ?>
    </table><br>
    
    <br>
    <h3>История:</h3>
    <table border="1" style="text-align:center;" cellpadding=10>
    <tr><td>Загаданное число</td>
    <?
    foreach($this->data['team_members'] as $member){
        echo '<td>'.$member['name'].'</td>';
    }
    ?>
    </tr>
    <?
    if(isset($this->data['history'])){
    foreach($this->data['history'] as $item){
        echo '<tr>';
        echo '<td>'. $item['usernumber']. '</td>';
        foreach($item['extragueses'] as $row){
    	    echo '<td>'. $row. '</td>';
        }
        echo '</tr>';
    }
    }
    ?>
    </table>
</div>