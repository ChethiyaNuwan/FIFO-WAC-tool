<?php
$servername = "localhost";
$username = "smashAudit";
$password = "smashAudit";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
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
            <form class="form" >
                <input type="button" value="Switch to FIFO" id="fifowac" class="btn btn-success" onclick="methodSwitch()"/><br>
            <div class="rad1">
                <input type="radio" name="type" id="receipt" onclick="chkType()" checked>
                <label for="receipt">Receipt  </label>  &nbsp&nbsp
                <input type="radio" name="type" id="issue" onclick="chkType()">
                <label for="issues">Issue</label>
            </div>
            <br>
            <div class="mainInputs">
                <label for="date">Date:</label><br>
                <input type="date" id="date"><br><br>
                <label for="qty">Quantity:</label><br>
                <input type="number" id="qty"><br><br>
                <label for="unit-price" id="unit-price-lbl">Unit Price:</label><br>
                <input type="number" id="unit-price"><br><br>
            </div>
                <input type="button" value="Add" id="add" class="btn btn-primary" onclick=""/>
                <input type="button" value="Undo" id="undo" class="btn btn-primary" onclick=""/><br><br>
                <input type="button" value="Reset" id="Reset" class="btn btn-danger" onclick=""/>
                <br>
                <h5>created by team<br>smashAudit</h5>
            </form>
            </div>
        </div>

        <div class="right">
        <div class="table-side">
            <h1 id="tableCap">Inventory System on WAC</h1>
            <table class="table table-dark table-striped-columns" id="wac">
                <tr>
                    <th rowspan="2">Date</th>
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
                <tr class="rows" id="r1">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="rows" id="r2">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="rows" id="r3">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="rows" id="r4">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="rows" id="r5">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <table class="table table-dark table-striped-columns" id="fifo" hidden>
                <tr>
                    <th rowspan="2">Date</th>
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
                <tr class="rows" id="r1">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="rows" id="r2">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="rows" id="r3">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="rows" id="r4">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="rows" id="r5">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        </div>
    </body>
</html>