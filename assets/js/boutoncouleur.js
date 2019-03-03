// test1
//
function(){
  var counter = document.getElementById("counter").value;
    console.log(counter);
    if (counter >= 0) {
      document.getElementById("counter").style.backgroundcolor = "green";
    } else {
      document.getElementById("counter").style.backgroundcolor = "red";
    }
 }

// test2
// $("#counter").change(function() {
//     if($(this).val() <=0) {
//         $("#counter").attr("disabled", true).css("background-color","yellow");
//     } else if($(this).val() >=0){
//         $("#counter").attr("disabled", false).css("background-color","red");;
//     }
// });
//
// });

// function (true_count) {
//   var bet_amt = "Bet 1x";
//   if (true_count < 2) {
//     bet_amt = "Bet 1x";
//   }
