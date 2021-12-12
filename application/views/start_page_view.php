    <div style="margin:10px;">
    <form method="POST" action="guesses_page">
    <label>Выберите количество экстрасенсов для теста:</label>
    
        <select name="AmountOfExtra">
                <?
                $n = minofextra;
                while($n <= maxofextra){
                    if($n == selectedamountofextra) echo '<option selected value="'.$n.'">'.$n.'</option>';
                    else echo '<option value="'.$n.'">'.$n.'</option>';
                    $n++;
                }
                
                ?>
		    </select>
        <br>
        <br>
        
        <label>Загадайте число от 10 до 99</label>
        
        <input type="submit" name="GuessButton" value="Загадал"/>
        </form>
    </div>
    <hr>
    <?
        if(isset($this->data)){
            include 'application/templates/table.php';
        }
    ?>
