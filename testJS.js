var fifowacState = 'w';
var rowNumber = 0;

function methodSwitch(){
    if (fifowacState == 'w') {
        document.getElementById('balUP').style.display = "none";
        document.getElementById('tableCap').innerHTML = "Inventory System on FIFO";
        document.getElementById('fifowac').value = "Switch to WAC";
        fifowacState = 'f';
    }

    else if (fifowacState == 'f') {
        document.getElementById('balUP').style.display = "";
        document.getElementById('tableCap').innerHTML = "Inventory System on WAC";
        document.getElementById('fifowac').value = "Switch to FIFO";
        fifowacState = 'w';
    }
}