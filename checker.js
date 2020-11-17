let x, y, r;

function isNum(n) {
    let regexp = /^-?\d[\.,]?\d*$/;
    let val = regexp.test(n);
    return val;
}

//document.getElementById("X-input").addEventListener('onclick', checkX);


function checkX() {
    x = document.getElementsByName("X-input")[0].value;
    if (isNum(x.toString()) && (x.length > 0) && (x >= -2 && x <= 5)) {
        x = x.replace(',', '.');
        x = parseFloat(x);
        console.log(x)
        document.getElementById('x-comment').innerHTML = " ";
        return !isNaN(x);
    } else {
        console.log('cjefiew')
        document.getElementById('x-comment').innerHTML = "Выберите другое значение";
        return false;
    }
}

function checkY() {
    y = document.getElementsByName("Y-input")[0].value;
    if (isNum(y.toString()) && (y.length > 0) && (y >= -2 && y <= 5)) {
        y = y.replace(',', '.');
        y = parseFloat(y);
        document.getElementById('y-comment').innerHTML = " ";
        return !isNaN(y);
    } else {
        document.getElementById('y-comment').innerHTML = "Выберите другое значение";
    return false;}
}


function checkR() {
    r = document.getElementsByName("R-input")[0].value;
    if (isNum(r.toString()) && (r.length > 0) && (r >= 2 && r <= 5)) {
        r = r.replace(',', '.');
        r = parseFloat(r);
        document.getElementById('r-comment').innerHTML = " ";
        return  !isNaN(r);
    } else {
        document.getElementById('r-comment').innerHTML = "Выберите другое значение";
        return false;
    }
}

const button = document.getElementById('button');
const valError =   document.getElementById('incorrectValuesError');


/*button.addEventListener('click', check);
button.addEventListener('mouseover', refreshButton);*/
//document.getElementById('x-input').addEventListener(input, checkX);
/*
function refreshButton() {
    if (checkX() && checkY() && checkR()) {
        button.disabled = false;
        document.getElementById('incorrectValuesError').style.display = 'none';
    }
}

function check() {
    if (!(checkX() && checkY() && checkR())) {
        button.disabled = true;
        document.getElementById('incorrectValuesError').style.display = 'block';
    } else {
        button.disabled = false;
        document.getElementById('incorrectValuesError').style.display = 'none';
    }
}*/

function check() {
    if (checkX() && checkY() && checkR()){
        alert("Кнопка разблокирована");
        button.disabled = false;
    } else {
        button.disabled = true;
    }
}



