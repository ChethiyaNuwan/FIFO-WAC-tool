var fifowacState = 'w';
var rowNumber = 0;

function methodSwitch(){
    var balUPs=document.getElementsByClassName('balUP');

    if (fifowacState == 'w') {
        document.getElementById('tableCap').innerHTML = "Inventory System on FIFO";
        document.getElementById('fifowac').value = "Switch to WAC";
        document.getElementById('wac').hidden = "true";
        document.getElementById('fifo').hidden = "";
        fifowacState = 'f';
    }

    else if (fifowacState == 'f') {
        document.getElementById('tableCap').innerHTML = "Inventory System on WAC";
        document.getElementById('fifowac').value = "Switch to FIFO";
        document.getElementById('wac').hidden = "";
        document.getElementById('fifo').hidden = "true";
        fifowacState = 'w';
    }
}


function chkType() {
    if (document.getElementById('issue').checked) {
        document.getElementById('unit-price').disabled="true";
        document.getElementById('unit-price-lbl').style.color="grey";
    }
    else if(document.getElementById('receipt').checked){
        document.getElementById('unit-price').disabled="";
        document.getElementById('unit-price-lbl').style.color="white";
    }
}