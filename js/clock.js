function startTime() {
    const clock = document.getElementById('clock');
    const date = document.getElementById('date');

    let today = new Date();         //krijgt een nieuwe instantie van date function

    let h = today.getHours();       //leest het live uur
    let m = today.getMinutes();     // leest live minuten
    let s = today.getSeconds();     //leest live secondes
    
    let d = today.getDate();
    let a = today.getMonth() + 1;
    let y = today.getFullYear();
    
    m = checkTime(m);
    s = checkTime(s);

    
    clock.innerText =  h + ":" + m + ":" + s;
    date.innerText = d + "-" + a + "-" + y;

    setTimeout(startTime, 1000);
}


function checkTime(i) {
    // checken als het getal 10 is anders komt er een 0 achter het getal
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
