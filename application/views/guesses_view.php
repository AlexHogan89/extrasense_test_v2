    <div style="margin: 10px;">
    <form method="POST">
        <label>Введите число которое загадали:</label>
        <input name="NumInput" type="number" pattern="[0-9]{3}" maxlength="2" max="99" min="10" required="" size="2">
        <input type="submit" name="SendButton" value="Отправить"/>
    </form>
    </div>
    <hr>
    <div style="margin: 10px;">
    <h3>Догадки:</h3>
    <table border="1" cellpadding=10>
        <?
        foreach($this->data[0] as $item){
            echo '<tr><td>'.$item->get_name().'</td><td>'.$item->get_guess().'</td></tr>';
		    }
        ?>
    </table>
    </div>