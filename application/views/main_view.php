    <form style="margin:10px;" method="POST">
    <label>Выберите колличество экстрасенсов в для теста:</label>
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
		<input type="submit" name="CountOfExtraButton" value="Выбрал"/>
        <br>
        <br>
        <label>Загадайте число от 10 до 99</label>
        <input type="submit" name="GuessButton" value="Загадал"/>
    </form>
    <hr>
    <?
        if(isset($this->data[1])){
            include 'application/views/table_view.php';
        }
    ?>