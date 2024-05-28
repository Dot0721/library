<title>booklist</title>
    <?php
        $card_id = $_GET['card_id'];
        include 'db.php';
        echo "<a href='returnbook.php?card_id=$card_id'>Return</a>";
        echo"<br>";
        $sql="SELECT *
        FROM Book
        WHERE Book_ID NOT IN (
            SELECT Book_ID
            FROM Borrow
        );";
        $result = mysqli_query($db, $sql);
        while($row=mysqli_fetch_assoc($result)){
            $name=$row['Name'];
            $author=$row['Author'];
            $book_id=$row['Book_ID'];
            echo "<a href='borrow.php?card_id=$card_id&book_id=$book_id'>$name</a>";
            echo "<br>";
            echo "作者:$author";
            echo "<br>";
            echo "<hr>";
        }
    ?>