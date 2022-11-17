function PrintPage()
{
    function addScript(url) {
        var script = document.createElement('script');
        script.type = 'application/javascript';
        script.src = url;
        document.head.appendChild(script);
    }
    addScript('https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js');
    html2pdf(document.body);
}
PrintPage();

let delayInMilliseconds = 100; //0.1 second

setTimeout(function() {
    location.href = "./Myreservations.php";
}, delayInMilliseconds);

