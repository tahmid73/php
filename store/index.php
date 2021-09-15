<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="anotherstyle.css">
    <title>Store</title>
</head>
<body>
    <div name="head">
        
    </div>

    <div>
        Add Items
        <form action="#" method="post">
            <div name="adding">
                <input type="text" name="name"><br>
                <input type="text" name="price"><br>
                <input type="text" name="buyingprice"><br>
                <input type="text" name="stock">
                <button type="submit" name="submit" >ADD</button>
            </div>
        </form>
    </div>
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbName="store";

    $conn=new mysqli($servername,$username,$password,$dbName);
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }

    $sql="select productName,price,stock from products";
    $result=$conn->query($sql);

    if($result-> num_rows > 0){
        echo "<table border:2><tr><th>Name</th><th>Price</th><th>Stock</th></tr>";
        while($row=$result->fetch_assoc()){
            //echo "Name:".$row["productName"]." Price: ".$row["price"]." Stock: ".$row["stock"]."<br>";
            echo "<tr><td>".$row["productName"]."</td><td>".$row["price"]."</td><td>".$row["stock"]."</td></tr>";
        }
        echo "</table>";
    }
    else{
        echo "none";
    }

    //insert
    if(isset($_POST["submit"]))
    {
        $price=$_POST["price"];
        $buyingPrice=$_POST["buyingprice"];
        $stock=$_POST["stock"];
        $name=$_POST["name"];
        $sql="INSERT INTO products (productName,price,buyingPrice,stock) VALUES('$name','$price','$buyingPrice','$stock')";
        if(mysqli_query($conn,$sql)){
            echo "vorsi database e";
        }
        else{
            echo "ki bal edi vai?";
        }
    }

    $conn->close();



    ?>
</body>
</html>