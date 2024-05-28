<html>
<title>borrow</title>
<?php
    include 'db.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $card_id = $_POST['card_id'];
        $book_id = $_POST['book_id'];
    }
    else{
        $card_id = $_GET['card_id'];
        $book_id = $_GET['book_id'];
    }
?>
<?php
    $sql="select * from Book where 	Book_ID=$book_id";
    $result = mysqli_query($db, $sql);
    while($row=mysqli_fetch_assoc($result)){
        $name=$row['Name'];
        $author=$row['Author'];
        echo "書名:$name</a>";
        echo "<br>";
        echo "作者:$author";
        echo "<br>";
        echo "書ID:$book_id";
    }
?>
<?php
    header("Content-Type: text/html; charset=utf8");
    if (isset($_POST['submit'])) {
        $sql="insert borrow(Book_ID,Card_ID) value($book_id,$card_id)";
        $result = mysqli_query($db, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        } else {
            echo "
                <script>
                    setTimeout(function(){window.location.href='booklist.php?card_id=" .$card_id . "';},600);
                </script>";
        }
    }   
?>
<body>
    <div>
        <form name="login" action="borrow.php" method="post">
            <input type="hidden" name="card_id" value="<?=$card_id?>">
            <input type="hidden" name="book_id" value="<?=$book_id?>">
            <p><input type="submit" name="submit" value="借閱">
        </form>
    </div>
</body>
</html>