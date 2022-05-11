<?PHP
$sql="SELECT
news.newsID,
news.title AS title ,
news.body AS body,
news.image AS image,
category.name AS cat,
users.name AS user
 FROM News 


JOIN category  ON  category.catID=news.catID
JOIN users  ON  users.userID=news.userID  ";
$get=mysqli_query($conn,$sql);

?>