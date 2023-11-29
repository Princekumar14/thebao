<form action="practice.php" method="post">
  Answer 1 <input type="checkbox" name="ans" value="ans1" /><br />
  <!-- Answer 2 <input type="radio" name="ans" value="ans2"  /><br />
  Answer 3 <input type="radio" name="ans" value="ans3"  /><br />
  Answer 4 <input type="radio" name="ans" value="ans4"  /><br /> -->
  <input type="submit" name="submit" value="submit" />
</form>

<?php 

// if(isset($_POST['submit'])){
    if(isset($_POST['ans'])){

        $answer = $_POST['ans'];  
        if ($answer == "ans1") {          
            echo 'Correct';    
            die;  
        }
                 
    }

// }
?>
