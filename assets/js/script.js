
//fonction pour incrémenter


$(function(){
  $('.buttonpetitecarte').click(function(){
    var counter = $('#counter').val();
    counter++;
    $('#counter').val(counter);
    if (counter >= 0) {
      $('#counter').css('background', '#02225B');
    } else {
      $('#counter').css('background', '#5B0202');
    }
  });
  //fonction pour décrementer
  $('.buttongrandecarte').click(function(){
    var counter = $('#counter').val();
    counter--;
    $('#counter').val(counter);
    if (counter >= 0) {
      $('#counter').css('background', '#02225B');
    } else {
      $('#counter').css('background', '#5B0202');

    }
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carte2').click(function(){
    var result = $('#carte2').val();
    result--;
    $('#carte2').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carte3').click(function(){
    var result = $('#carte3').val();
    result--;
    $('#carte3').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carte4').click(function(){
    var result = $('#carte4').val();
    result--;
    $('#carte4').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carte5').click(function(){
    var result = $('#carte5').val();
    result--;
    $('#carte5').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carte6').click(function(){
    var result = $('#carte6').val();
    result--;
    $('#carte6').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carte7').click(function(){
    var result = $('#carte7').val();
    result--;
    $('#carte7').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carte8').click(function(){
    var result = $('#carte8').val();
    result--;
    $('#carte8').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carte9').click(function(){
    var result = $('#carte9').val();
    result--;
    $('#carte9').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carteas').click(function(){
    var result = $('#carteas').val();
    result--;
    $('#carteas').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carte10').click(function(){
    var result = $('#carte10').val();
    result--;
    $('#carte10').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.cartevalet').click(function(){
    var result = $('#cartevalet').val();
    result--;
    $('#cartevalet').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.cartedame').click(function(){
    var result = $('#cartedame').val();
    result--;
    $('#cartedame').val(result);
  });
});

// carte valeur 2 (+1)
$(function(){
  $('.carteroi').click(function(){
    var result = $('#carteroi').val();
    result--;
    $('#carteroi').val(result);
  });
});

// Remettre toute les valeurs à 0
function resetValues() {
  $("#counter").val("0");
  $(".counter1").val("32");
  $('#counter').css('background', '#02225B');
}

$("#option-1").click(function() {
 $(".counter1").val("4");
 $("#counter").val("0");
 $('#counter').css('background', '#02225B');
});

$("#option-2").click(function() {
 $(".counter1").val("8");
 $("#counter").val("0");
 $('#counter').css('background', '#02225B');
});

$("#option-3").click(function() {
 $(".counter1").val("12");
 $("#counter").val("0");
 $('#counter').css('background', '#02225B');
});

$("#option-4").click(function() {
 $(".counter1").val("16");
 $("#counter").val("0");
 $('#counter').css('background', '#02225B');
});

$("#option-5").click(function() {
 $(".counter1").val("20");
 $("#counter").val("0");
 $('#counter').css('background', '#02225B');
});

$("#option-6").click(function() {
 $(".counter1").val("24");
 $("#counter").val("0");
 $('#counter').css('background', '#02225B');
});

$("#option-7").click(function() {
 $(".counter1").val("28");
 $("#counter").val("0");
 $('#counter').css('background', '#02225B');
});

$("#option-8").click(function() {
 $(".counter1").val("32");
 $("#counter").val("0");
 $('#counter').css('background', '#02225B');
});

$(function(){
  $('#greencolor').click(function(){
  $('#fondblack').css('background', '#013E1A');
  $('.buttonpetitecarte, .buttonmoyennecarte, .buttongrandecarte').css('background', '#11823F');
  $('#counter').css('background', '#02225B');
  $('.counter1').css('background', '#136635');
  $('#reset1').css('background', '#013E1A');
  });
});

$(function(){
  $('#redcolor').click(function(){
  $('#fondblack').css('background', '#3D0D0D');
  $('.buttonpetitecarte, .buttonmoyennecarte, .buttongrandecarte').css('background', '#B63C3C');
  $('#counter').css('background', '#02225B');
  $('.counter1').css('background', '#6e2020');
  $('#reset1').css('background', '#3D0D0D');
  });
});

$(function(){
  $('#blackcolor').click(function(){
  $('#fondblack').css('background', '#0B0404');
  $('.buttonpetitecarte, .buttonmoyennecarte, .buttongrandecarte').css('background', '#323131');
  $('#counter').css('background', '#02225B');
  $('.counter1').css('background', '#171515');
  $('#reset1').css('background', '#0B0404');
  });
});

$(function(){
  $('#bluecolor').click(function(){
  $('#fondblack').css('background', '#0D2B3D');
  $('.buttonpetitecarte, .buttonmoyennecarte, .buttongrandecarte').css('background', '#3C68B6');
  $('#counter').css('background', '#02225B');
  $('.counter1').css('background', '#1C407E');
  $('#reset1').css('background', '#0D2B3D');
  });
});
