var fifowacState = 'w';
var rowNumber = 0;

function methodSwitch(){
    var balUPs=document.getElementsByClassName('balUP');

    if (fifowacState == 'w') {
        for (let i = 0; i < balUPs.length; i++) {
            balUPs[i].style.display="none";
        }

        document.getElementById('tableCap').innerHTML = "Inventory System on FIFO";
        document.getElementById('fifowac').value = "Switch to WAC";
        document.getElementById('balance').colSpan="2";
        fifowacState = 'f';
    }

    else if (fifowacState == 'f') {
        for (let i = 0; i < balUPs.length; i++) {
            balUPs[i].style.display="";
        }

        document.getElementById('tableCap').innerHTML = "Inventory System on WAC";
        document.getElementById('fifowac').value = "Switch to FIFO";
        document.getElementById('balance').colSpan="3";
        fifowacState = 'w';
    }
}