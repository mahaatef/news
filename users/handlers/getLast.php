<?php

$sql="SELECT * FROM news ORDER BY newsID DESC LIMIT 1";

$last=mysqli_query($conn,$sql);
