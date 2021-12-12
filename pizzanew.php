<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Online</title>
        <link rel="stylesheet" href="pizza1.css">
    </head>
    <body style="background-image: url('pizza.jpg');">
        <a href="home.php">Back to HOME Page</a>
        <form method="POST">
            <table>
                <tr>
                    <th>Enter Your Details:</th>
                    <th></th>
                </tr>
                <tr>
                    <td><label for="name">Name: </label></td>
                    <td><input type="text" id="name" name="name"><br></td>
                </tr>
                <tr>
                    <td><label for="phone">Phone No.: </label></td>
                    <td><input type="number" id="phone" name="phone"><br></td>
                </tr>
                <tr>
                    <td><label for="add">Address: </label></td>
                    <td><input type="text" id="add" name="add"></td>
                </tr>
                <tr>
                    <td><label for="add">Menu: </label></td>
                    <td><input type="text" id="menu" name="menu"></td>
                </tr>
                <tr>
                    <td><label for="add">Discount Count: </label></td>
                    <td><input type="text" id="dc" name="dc"></td>
                </tr>
                <tr>
                    <td colspan="2" align=""><input type="submit" name="order" value="Order Now"></td>
                    <td colspan="2" align=""><input type="submit" name="update" value="Update Order"></td>
                    <td colspan="2" align=""><input type="submit" name="delete" value="Delete Order"></td>
                    <td colspan="2" align=""><input type="submit" name="show" value="Show Orders"></td>

                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['order']))
            {
                $conn=mysqli_connect('localhost','root','root','phpproject');
                if(!$conn)
                {
                    die("Connection Error: ".mysqli_connect_error());
                }
                else
                {
                    echo"<b>Connection Successful";
                }
            $cname=$_POST['name'];
            $cphone=$_POST['phone'];
            $cadd=$_POST['add'];
            $cmenu=$_POST['menu'];
            $dc=$_POST['dc'];
            $sql="insert into pizzaOrder (custname, custnum, custadd, custmenu, discount) values('$cname', '$cphone', '$cadd', '$cmenu', '$dc')";
            $query=mysqli_query($conn, $sql);
            if($query)
            {
                echo"<b>Data Entered Successfully";
            }
            else
            {
                echo"<b>Unsuccessful Entry".$query;
            }
         }
         if(isset($_POST['update']))
            {
                $conn=mysqli_connect('localhost','root','root','phpproject');
                if(!$conn)
                {
                    die("Connection Error: ".mysqli_connect_error());
                }
                else
                {
                    echo"<b>Connection Successful";
                }
            $cname=$_POST['name'];
            $cphone=$_POST['phone'];
            $cadd=$_POST['add'];
            $cmenu=$_POST['menu'];
            $dc=$_POST['dc'];
            $sql="update pizzaOrder set custname='".$cname."', custadd='".$cadd."', custmenu='".$cmenu."', discount='".$dc."' where custnum='".$cphone."'";
            $query=mysqli_query($conn, $sql);
            if($query)
            {
                echo"<b>Data Updated Successfully";
            }
            else
            {
                echo"<b>Unsuccessful Data Updation".$query;
            }
         }
         if(isset($_POST['delete']))
            {
                $conn=mysqli_connect('localhost','root','root','phpproject');
                if(!$conn)
                {
                    die("Connection Error: ".mysqli_connect_error());
                }
                else
                {
                    echo"<b>Connection Successful";
                }
            $cname=$_POST['name'];
            $cphone=$_POST['phone'];
            $cadd=$_POST['add'];
            $cmenu=$_POST['menu'];
            $dc=$_POST['dc'];
            $sql="delete from pizzaOrder where custnum=$cphone";
            $query=mysqli_query($conn, $sql);
            if($query)
            {
                echo"<b>Data Deleted Successfully";
            }
            else
            {
                echo"<b>Unsuccessful Data Deletion".$query;
            }
         }
         if(isset($_POST['show']))
            {
                $conn=mysqli_connect('localhost','root','root','phpproject');
                if(!$conn)
                {
                    die("Connection Error: ".mysqli_connect_error());
                }
                else
                {
                    echo"<b>Connection Successful";
                }
        ?>
        <table style="color :black;" border="1">
            <tr>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Address</th>
                <th>Menu</th>
                <th>Discount Coupon</th>
            </tr>
            <?php
            $sql="select * from pizzaOrder";
            $result=mysqli_query($conn,$sql);
            echo"<br>";
                while($test=mysqli_fetch_assoc($result))
                {
                    $id=$test['custnum'];
                    echo"<tr align='center'>";
                    echo"<td>" .$test['custname']. "</td>";
                    echo"<td>" .$test['custnum']. "</td>";
                    echo"<td>" .$test['custadd']. "</td>";
                    echo"<td>" .$test['custmenu']. "</td>";
                    echo"<td>" .$test['discount']. "</td>";
                    echo"</tr>";
                }
                mysqli_close($conn);
                }
            ?>
        </table>
</body>
</html>
