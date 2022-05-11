<?php

$sql="SELECT * ,category.name FROM `news`JOIN category ON news.catID=category.catID 
WHERE category.catID=$id  ORDER BY newsID DESC";

$news=mysqli_query($conn,$sql);
