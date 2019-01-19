// var output = document.getElementById('output');

//     var ajaxhttp = new XMLHttpRequest();
//     var url = "data.json";
    
//     ajaxhttp.open('GET', url, true);
//     ajaxhttp.setRequestHeader("content-type", "application/json");
//     ajaxhttp.onreadystatechange = function () {
//         if (ajaxhttp.readyState == 4 && ajaxhttp.status == 200) {
           
//             var jcontent = JSON.parse(ajaxhttp.responseText);
//             obj = JSON.parse(ajaxhttp.responseText);
//             alert(obj.length);

//             document.getElementById("demo").innerHTML = jcontent["cena_m2"];

//             console.log(jcontent);
//             //console.log(ajaxhttp);
//         }
//     }
// ajaxhttp.send(null);
// //console.log(ajaxhttp);
    

var canvas = document.getElementById('coordinates'),
    context = canvas.getContext('2d');
    context.font = "10px Arial"; 
    tmp = 500;




for (var i = 0; i <= 500; i) {
	

context.beginPath();
context.moveTo(i, 0);
context.lineTo(i, 500);
context.stroke();
context.beginPath();
context.moveTo(0, i);
context.lineTo(500, i);
context.stroke();
   


     
context.fillText(i*20, i, 495);
context.fillText(tmp*4, 0, i);
i+=50;
tmp-=50;
}




    context.beginPath();
    context.arc(250, 250, 8, 0, 2 * Math.PI, true);
    context.fillStyle = "#E2FFC6";
    context.fill();

    context.lineWidth = 3;
    context.strokeStyle = "#66CC01";
    context.stroke();
    

