var fifowacState = 'w';
var rowNumber = 0;

function methodSwitch(){
    if (fifowacState == 'w') {
        document.getElementById('balUP').style.display = "none";
        document.getElementById('tableCap').innerHTML = "Inventory System on FIFO";
        fifowacState = 'f';
    }

    else if (fifowacState == 'f') {
        document.getElementById('balUP').style.display = "";
        document.getElementById('tableCap').innerHTML = "Inventory System on WAC";
        fifowacState = 'w';
    }
}