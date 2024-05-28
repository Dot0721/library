<title>Login</title>
<?php
    include 'db.php';
    //include 'style.html';
    header("Content-Type: text/html; charset=utf8");
    if (isset($_POST['submit'])) {
        $id=$_POST['id'];
        if ($id) {
            $sql = "select * from borrower where Card_ID='$id'";
            $result = mysqli_query($db, $sql);
            if ($result) {
                $output=mysqli_fetch_assoc($result);
                $card_id=$output['Card_ID'];
                echo '<div class="sucess">welcome！ </div>';
                echo "
                <script>
                    setTimeout(function(){window.location.href='booklist.php?card_id=" .$card_id . "';},600);
                </script>";
                exit;
            } else {
                echo '<div class="warning">Wrong ID！</div>';
            }
        } else {
            echo '<div class="warning">Incompleted form！ </div>';
            echo "
    <script>
        setTimeout(function(){window.location.href='index.php';},2000);
    </script>";
        }
        mysqli_close($db);
    }
?>

<body>
    <div>
        <?php

        ?>
    </div>
    <div>
        <form name="login" action="index.php" method="post">
        <p>ID : <input type=text name="id"></p>
        <p><input type="submit" name="submit" value="登入">
    </div>
</body>