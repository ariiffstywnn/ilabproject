function updateClock() {
  let now = new Date();
  

  // format jam
  let hours = now.getHours();
  let minutes = now.getMinutes();
  let seconds = now.getSeconds();

  // biar ada nol di depan
  if (hours < 10) hours = "0" + hours;
  if (minutes < 10) minutes = "0" + minutes;
  if (seconds < 10) seconds = "0" + seconds;

  document.getElementById("clock").innerHTML =
    hours + ":" + minutes + ":" + seconds;

  document.getElementById("clock-overlay").innerHTML =
    hours + ":" + minutes + ":" + seconds;

  let options = { weekday: "long", year: "numeric", month: "long", day: "numeric" };
  let tanggalStr = now.toLocaleDateString("id-ID", options);
  document.getElementById("tanggal").innerHTML = tanggalStr;

}



// jalanin tiap detik supaya jam real-time + cek kondisi istirahat
setInterval(updateClock, 1000);
updateClock();
