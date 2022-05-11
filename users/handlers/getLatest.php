<?php

$sql="SELECT * ,category.name FROM `news`JOIN category ON news.catID=category.catID  
WHERE category.name='سياسة' OR 'سياسه'  ORDER BY news.newsID DESC ";

$latest=mysqli_query($conn,$sql);

