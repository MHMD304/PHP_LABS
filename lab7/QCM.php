
<html>
<form action="eval.php" method="GET">
    <?php
    $question;
    $op1; $op2; $op3; $op4;
    
    if (is_file("questions.txt")) {
        $questions = file('questions.txt');
        for ($i = 0; $i < count($questions); $i += 5) {
            $question = $questions[$i];
            $op1 = $questions[$i + 1];
            $op2 = $questions[$i + 2];
            $op3 = $questions[$i + 3];
            $op4 = $questions[$i + 4];
    ?>
            <h2><?php echo $question; ?></h2>
            <input name="radio-btn-<?php echo $i; ?>" type="radio" value="<?php echo $op1; ?>" />
            <label><?php echo $op1; ?></label>
            <br>
            <input name="radio-btn-<?php echo $i; ?>" type="radio" value="<?php echo $op2; ?>" />
            <label><?php echo $op2; ?></label>
            <br>
            <input name="radio-btn-<?php echo $i; ?>" type="radio" value="<?php echo $op3; ?>" />
            <label><?php echo $op3; ?></label>
            <br>
            <input name="radio-btn-<?php echo $i; ?>" type="radio" value="<?php echo $op4; ?>" />
            <label><?php echo $op4; ?></label>
            <br><br>
    <?php
        }
    }
    ?>
    <input name='submit' type="submit" value="Submit">
</form>
</html>
