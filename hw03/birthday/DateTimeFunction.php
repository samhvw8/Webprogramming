<form action="DateTimeFunction.php" method="post">
  Enter person1: <input type="text" name="person1"> Birth day: <input type="date" name="dob1"><br>
  Enter person2: <input type="text" name="person2"> Birth day: <input type="date" name="dob2"><br>
  <input type="submit" name="submit">
</form>

</form>
<?php
     if (!empty($_POST)) {
        
        $person1 = $_POST['person1'];
        $person2 = $_POST['person2'];
        $birthday1 = $_POST['dob1'];
        $birthday2 = $_POST['dob2'];
        $flag = 0;
        $time = new DateTime(date("Y-m-d", time()));
        if (!empty($person1) && !empty($birthday1)) {
           $DOB1 = date("l, F j, Y", strtotime($birthday1));
           if ($DOB1 == -1) {
              echo"<b>Invalid date!</b><br>";
              $flag = 1;
           }
           else {
                $date1 = new DateTime($birthday1);
                $age1 = $date1->diff($time)->y;
                echo "$person1: $DOB1, $age1 years old<br>";
           }
        }
        if (!empty($person2) && !empty($birthday2)) {
           $DOB2 = date("l, F j, Y", strtotime($birthday2));
           if ($DOB2 == -1) {
              echo"<b>Invalid date!</b<br>";
              $flag = 1;
           }
           else {
                $date2 = new DateTime($birthday2);
                $age2 = $date2->diff($time)->y;
                echo "$person2: $DOB2, $age2 years old<br>";
           }
        }
        if ($flag == 0) {
           $interval = $date1->diff($date2);
           echo"Difference in days between two dates: $interval->days days<br>";
           echo"Difference in years between two dates: $interval->y years<br>";
        }

     }
?>
