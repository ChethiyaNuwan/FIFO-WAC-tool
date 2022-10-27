<?php
$servername = "localhost";
$username = "smashAudit";
$password = "smashAudit";
$database = "fifowac";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


//get main inputs to php and insert into wac table
if (isset($_GET['addBtn'])) {
    $type = $_GET['type'];
    $date = $_GET['date'];
    $qty = $_GET['qty'];

    if($type === "r"){
        $up = $_GET['unit-price'];

        $val = $qty * $up;
        $sql = "INSERT INTO wac(date,Rup,Rqty,Rval) VALUES ('$date','$up','$qty','$val')";
        mysqli_query($conn,$sql);
    }
    elseif ($type === "i") {
        echo "in";
        $sql = "SELECT date FROM wac WHERE date='$date'";

        if (mysqli_num_rows(mysqli_query($conn,$sql))) {
            $sql = "UPDATE wac SET Iqty='$qty' WHERE date";
            mysqli_query($conn,$sql);
        } 
        else {
            $sql = "INSERT INTO wac(date,Iqty) VALUES ('$date','$qty')";
            mysqli_query($conn,$sql);
        }
    }
}


// access wac table and put values into an array
$wacTable = mysqli_query($conn, "SELECT * FROM wac");
for ($wacRow = array (); $row = $wacTable->fetch_assoc(); $wacRow[] = $row);
$wacRowLength=count($wacRow,0);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock Issuing Tool</title>
        <link rel="stylesheet" href="Style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
        <script type="text/javascript" src="testJS.js"></script>
    </head>
    <body>
        <div class="left">
            <div class="input-side">
                <input type="button" value="Switch to FIFO" id="fifowac" class="btn btn-success" onclick="methodSwitch()"/><br>
            <form id="form" method="GET">
            <div class="rad1">
                <input type="radio" name="type" value="r" id="receipt" class="form-check-input" onclick="chkType()">
                <label for="receipt">Receipt  </label>  &nbsp&nbsp
                <input type="radio" name="type" value="i" id="issue" class="form-check-input" onclick="chkType()">
                <label for="issues">Issue</label>
            </div>
            <br>
            <div class="mainInputs">
                <label for="date">Date:</label><br>
                <input type="date" id="date" name="date"><br><br>
                <label for="qty">Quantity:</label><br>
                <input type="number" id="qty" name="qty"><br><br>
                <label for="unit-price" id="unit-price-lbl">Unit Price:</label><br>
                <input type="number" id="unit-price" name="unit-price"><br><br><br>
                
                <input type="submit" value="Add" id="addBtn" name="addBtn" class="btn btn-primary" onclick=""/>
                <input type="submit" value="Undo" id="undoBtn" name="undoBtn" class="btn btn-primary" onclick=""/><br><br>
                <input type="submit" value="Reset" id="resetBtn" name="resetBtn" class="btn btn-danger" onclick=""/>
            </div>
                <h5>created by team<br>smashAudit</h5>
            </form>
                
            </div>
        </div>

        <div class="right">
        <div class="table-side">
            <h1 id="tableCap">Inventory System on WAC</h1>
            <table class="table table-dark table-striped-columns" id="wac">
                <tr>
                    <th rowspan="2" class="date">Date</th>
                    <th colspan="3">Receipts</th>
                    <th colspan="3">Issues</th>
                    <th colspan="3" id="balance">Balance</th>
                </tr>
                <tr>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Value&emsp;</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Value&emsp;</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Value&emsp;</th>
                </tr>
                <?php
                    for ($i=0; $i < $wacRowLength; $i++) {
                        echo '<tr class="rows">';
                            echo '<td>'.$wacRow[$i]["date"].'</td>';
                            echo '<td>'.$wacRow[$i]["Rup"].'</td>';
                            echo '<td>'.$wacRow[$i]["Rqty"].'</td>';
                            echo '<td>'.$wacRow[$i]["Rval"].'</td>';
                            echo '<td>'.$wacRow[$i]["Iup"].'</td>';
                            echo '<td>'.$wacRow[$i]["Iqty"].'</td>';
                            echo '<td>'.$wacRow[$i]["Ival"].'</td>';
                            echo '<td>'.$wacRow[$i]["Bup"].'</td>';
                            echo '<td>'.$wacRow[$i]["Bqty"].'</td>';
                            echo '<td>'.$wacRow[$i]["Bval"].'</td>';
                        echo '</tr>';}
                ?>
            </table>

            <table class="table table-dark table-striped-columns" id="fifo" hidden>
                <tr>
                    <th rowspan="2" class="date">Date</th>
                    <th colspan="3">Receipts</th>
                    <th colspan="3">Issues</th>
                    <th colspan="3" id="balance">Balance</th>
                </tr>
                <tr>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Value&emsp;</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Value&emsp;</th>
                    <th>Quantity</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Value&emsp;</th>
                </tr>
                <?php
                    for ($i=0; $i < $wacRowLength; $i++) {
                        echo '<tr class="rows">';
                            echo '<td>'.'</td>';
                            echo '<td>'.'</td>';
                            echo '<td>'.'</td>';
                            echo '<td>'.'</td>';
                            echo '<td>'.'</td>';
                            echo '<td>'.'</td>';
                            echo '<td>'.'</td>';
                            echo '<td>'.'</td>';
                            echo '<td>'.'</td>';
                        echo '</tr>';}
                ?>
            </table>
        </div>
        </div>
    </body>
</html>