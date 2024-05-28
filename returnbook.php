<html>
    <title>Return</title>
    <?php
    include 'db.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $card_id = $_POST['card_id'];
        $book_id = $_POST['book_id'];
    }
    else{
        $card_id = $_GET['card_id'];
    }
    ?>
    <body>
    <?php
        echo "<a href='booklist.php?card_id=$card_id'>Library</a>";
        echo"<br>";
        $sql="SELECT *
        FROM Book
        INNER JOIN Borrow ON Book.Book_ID = Borrow.Book_ID
        WHERE Borrow.Card_ID = $card_id;";
        $result = mysqli_query($db, $sql);
        while($row=mysqli_fetch_assoc($result)){
            $name=$row['Name'];
            $author=$row['Author'];
            $book_id=$row['Book_ID'];
            echo "書名:$name</a>";
            echo "<br>";
            echo "作者:$author";
            echo "<br>";
            echo "書ID:$book_id";
            echo "<form method='post' action='returnbook.php'>";
            echo"<input type='hidden' name='card_id' value='$card_id'>";
            echo "<input type='hidden' name='book_id' value='$book_id'>";
            echo"<p><input type='submit' name='submit' value='歸還'>";
            echo "</form>";
            echo "<hr>";
        }
    ?>
    <?php
    header("Content-Type: text/html; charset=utf8");
    if (isset($_POST['submit'])) {
        $sql="DELETE FROM Borrow
        WHERE Book_ID = $book_id AND Card_ID = $card_id;";
        $result = mysqli_query($db, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        } else {
            echo "
                <script>
                    setTimeout(function(){window.location.href='returnbook.php?card_id=" .$card_id . "';},600);
                </script>";
        }
    }   
?>
    </body>
</html>