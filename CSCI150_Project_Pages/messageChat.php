<?php
include 'header.php';
?>

<!doctype html>
<html>
<body>

    <div class = "chatHolder">
        <?php
        $image = $_POST['imageLink'];
        echo $image;
        $id = $_SESSION['user_ID'];
        $query="SELECT * FROM message_base WHERE imageLink='$image' ORDER BY message_ID desc";    
        $result = $conn->query($query);
        //$messages=mysqli_fetch_assoc($result);

        //if(is_array($messages)) {
        while($messages=mysqli_fetch_assoc($result)){
            if($id=== $_POST['ID']){
            echo '<div class="bubble bubble-left">
                    <p>Type any text here and the bubble will grow to fit the text no matter how many lines.</p>
                  </div>';
            }
            else{
                echo '<div class="bubble bubble-right">
                        <p>Type any text here and the bubble will grow to fit the text no matter how many lines.</p>
                     </div>';
            }
        }
       // }

        ?>
    </div>


</body>
</html>