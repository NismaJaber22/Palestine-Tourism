var txt = 'Palestine &';
let speed =100;
let i=0;
function showPalestine() {
  if (i < txt.length) {
   
    document.getElementById("auto-write").innerHTML += txt.charAt(i);
    i++;
    setTimeout(showPalestine, speed);
  }
}
showPalestine();
let j=0;
let text = "Tourism";
function showTourism() {
  if (j < text.length) {
   
    document.getElementById("auto-write-Tourism").innerHTML += text.charAt(j);
    j++;
    setTimeout(showTourism, speed);
  }
}
showTourism();
function clr()
{
  document.getElementById("auto-write").innerHTML ="";
  document.getElementById("auto-write-Tourism").innerHTML ="";
  i=0;
  j=0;
  setTimeout(clr,6000);
setTimeout(showPalestine,6000);
setTimeout(showTourism,6000);
}
clr();