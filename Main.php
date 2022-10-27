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

// access wac table and put values into an array
$wacTable = mysqli_query($conn, "SELECT * FROM wac");
for ($wacRow = array (); $row = $wacTable->fetch_assoc(); $wacRow[] = $row);
$wacRowLength=count($wacRow,0);

//get main inputs to php and insert into wac table
function store(){
    $date = $_POST['date'];
    $up = $_POST['unit-price'];
    $qty = $_POST['qty'];
    echo $date;
}
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
            <div class="rad1">
                <input type="radio" name="type" id="receipt" onclick="chkType()" checked>
                <label for="receipt">Receipt  </label>  &nbsp&nbsp
                <input type="radio" name="type" id="issue" onclick="chkType()">
                <label for="issues">Issue</label>
            </div>
            <br>
            <form class="mainInputs" id="form" method="post">
                <label for="date">Date:</label><br>
                <input type="date" id="date" name="date"><br><br>
                <label for="qty">Quantity:</label><br>
                <input type="number" id="qty" name="qty"><br><br>
                <label for="unit-price" id="unit-price-lbl">Unit Price:</label><br>
                <input type="number" id="unit-price" name="unit-price"><br><br>
                <input type="submit" value="Add" id="add" class="btn btn-primary" onclick=""/>
                <input type="submit" value="Undo" id="undo" class="btn btn-primary" onclick=""/><br><br>
                <input type="submit" value="Reset" id="Reset" class="btn btn-danger" onclick=""/>
            </form>
                <br>
                <h5>created by team<br>smashAudit</h5>
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