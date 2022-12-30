<?php 
session_start();
function card($id,$name,$author,$img,$dis,$price)
{
  echo"<div class='templatemo_product_box'>
                    <h1>$name <span>(by $author)</span></h1>
                    <img src='$img' alt='image' />
                    <div class='product_info'>
                        <p>$dis</p>
                        <h3>$$price</h3>
                        <div class='buy_now_button'><a href='order.php?action=remove&id=$id'>Buy Now</a></div>
                        <div class='detail_button'><a href='subpage.php?action=remove&id=$id'>Detail</a></div>
                    </div>
                    <div class='cleaner'>&nbsp;</div>
                </div>
  ";
}
$con=mysqli_connect("localhost","Tharusha","Tharusha21");
mysqli_select_db($con,"book_store");
$sql = "SELECT * FROM books";
$result = mysqli_query($con,$sql);
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Book Store|BOOKS</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="templatemo_container">
        <div id="templatemo_menu">
            <ul>
                <li><a href="index.php" >Home</a></li>
                <li><a href="books.php" class="current">Books</a></li>
                <li><a href="contact.php">Contacts</a></li>
                <li><a href="faq.php">FAQ/Help</a></li>
                <li><a href="login.php"><?php if (isset($_SESSION["login"])){echo "Logout";}else{echo "Login";}?></a></li>
                <li><form action="search.php" method="GET" name="search" onsubmit="return val1()" style="margin-left: 650px;">
        <input type="search" placeholder="Search Books" name="search" style="font-size: 15px; background: #0005;color: var(--primary-color);">&nbsp&nbsp<button type="submit" style="font-size: 15px;  margin-top: 0px; position: absolute; color: var(--primary-color); font-weight: bold; background: url(images/templatemo_btn_01.jpg) no-repeat;">SEARCH</button></form></li>
            </ul>
        </div> <!-- end of menu -->

        <div id="templatemo_header">
            <div id="templatemo_special_offers">
                <p>
                    <span>25%</span> discounts for
                    purchase over $ 40
                </p>
                
            </div>


            <div id="templatemo_new_books">
                <ul>
                    <li>Suspen disse</li>
                    <li>Maece nas metus</li>
                    <li>In sed risus ac feli</li>
                </ul>
                
            </div>
        </div> <!-- end of header -->

        <div id="templatemo_content">

             <!-- end of content left -->

            <div id="templatemo_content_right">
                
                <?php
          $x=1;
          while($row = mysqli_fetch_array($result))//SHOW DATA OF BOOKS FROM DB
          {
            card($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
            if ($x % 2 == 0)
            {
              echo "<div class='cleaner_with_height'>&nbsp;</div>";
            }
            else
            {
                echo "<div class='cleaner_with_width'>&nbsp;</div>";
            }
            $x=$x+1;
          }
           mysqli_close($con);
        ?>
                 <!-- end of content right -->

            <div class="cleaner_with_height">&nbsp;</div>
        </div> <!-- end of content -->

        <div id="templatemo_footer">
            <a href="index.php">Home</a> | <a href="books.php">Books</a> | <a href="contact.php">Contact</a> | <a
                href="faq.php">FAQ/Help</a> <br />
            <p>© Copyright 2018
                Tharusha | All Rights Reserved.</p> <a href="#"><strong>WONDERBOOKS</strong></a>
        </div>
    </div> 
</body>

</html>