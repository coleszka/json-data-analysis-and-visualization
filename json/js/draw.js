var canvas = document.getElementById('coordinates2'),
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
context.fillText(tmp*4, 0, i-5);
i+=50;
tmp-=50;
}

$(document).ready(function()
{
  var txt2 = $('#nameFile').text();
 
  $.getJSON(txt2, function(data){
    var tmp = '';
    $.each(data, function(key, value){
      tmp+='<tr>';
      tmp += '<td>'+value.cena_m2+'</td>';
      tmp += '<td>'+value.l_mieszkancow+'</td>';
      tmp += '<tr>';
      context.beginPath();
    context.arc(value.cena_m2/20, 500-value.l_mieszkancow/4, 3, 0, 2 * Math.PI, true);
    context.fillStyle = "#E2FFC6";
    context.fill();

    context.lineWidth = 2;
    context.strokeStyle = "#66CC01";
    
    context.stroke();
    });
    
    $('#table').append(tmp);
  });
});
