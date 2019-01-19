var canvas1 = document.getElementById('coordinates1'),
    context1 = canvas1.getContext('2d');
    context1.font = "10px Arial"; 
    tmp = 500;

for (var i = 0; i <= 500; i) {
  



context1.beginPath();
context1.moveTo(i, 0);
context1.lineTo(i, 500);
context1.stroke();
context1.beginPath();
context1.moveTo(0, i);
context1.lineTo(500, i);
context1.stroke();
    
context1.fillText(i*20, i, 495);
context1.fillText(tmp*4, 0, i-5);

i+=50;
tmp-=50;
}

$(document).ready(function()
{
 var txt = "js_"
  txt += $('#nameFile').text();
    var a = $('#a').text();
    a=Number(a);
    var b = $('#b').text();
    b=Number(b);


  $.getJSON(txt, function(data){
    
    $.each(data, function(key, value){
      
    context1.beginPath();
    context1.arc(value.cena_m2/20, 500-value.l_mieszkancow/4, 3, 0, 2 * Math.PI, true);
    context1.fillStyle = "#E2FFC6";
    context1.fill();

    context1.lineWidth = 2;
    context1.strokeStyle = "#66CC01";
    context1.stroke();
    });
    context.beginPath();
    context.moveTo((a*0+b)/20,500);
    context.lineTo(500,(a*500+b)/20);
    context.stroke();
  });
});
