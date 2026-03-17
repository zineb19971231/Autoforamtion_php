<?php
 include "db.php";

try {
$sqlfetchbooks = "SELECT * FROM library_books WHERE price > (SELECT MIN(price) FROM library_books)";
 $stsmt = $pdo-> prepare($sqlfetchbooks);
 $stsmt -> execute();
 $books = $stsmt -> fetchAll();
 echo "<table border='1'>
 <th>Title</th>
 <th>Author</th>
<th>Published Year</th>
<th>Etat</th>
 <th>Price</th>
 </tr>";
 foreach ($books as $book ){
    echo "<tr>";
    // echo "<td>" . $book['id'] . "</td>";
    echo "<td>" . $book['title'] . "</td>";
    echo "<td>" . $book['author'] . "</td>";
    echo "<td>". $book["published_year"] ."</td>";
    echo "<td>". $book["etat"] . "</td>";
    echo "<td>" . $book['price'] . "</td>";
    echo "</tr>";
 }
 echo "</table>";

}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}



?>