$(document).ready(function () {
  $(".part").hide();

  // Display part 1 on page load
  $(".part-1").show();

  // $(".part-1").hide();
  // $(".part-2").hide();
  // $(".part-3").show();

  // Proceed to part 2
  $("#proceed-part-2").click(function (event) {
    event.preventDefault();
    $(".part-1").hide(300);
    $(".part-2").show(600);
    $(".form-progress-item:eq(1)").addClass("complete");
  });

  // Proceed to part 3
  $("#proceed-part-3").click(function (event) {
    console.log("Hello");
    event.preventDefault();
    $(".part-2").hide(300);
    $(".part-3").show(600);
    $(".form-progress-item:eq(2)").addClass("complete");
  });


  // Cancel Sign up go home

  // Go back to part 1
  $("#cancel-part-2").click(function (event) {
    event.preventDefault();
    $(".part-2").hide(300);
    $(".part-1").show(600);
    $(".form-progress-item:eq(1)").removeClass("complete");
  });

  // Go back to part 2
  $("#cancel-part-3").click(function (event) {
    event.preventDefault();
    $(".part-3").hide(300);
    $(".part-2").show(600);
    $(".form-progress-item:eq(2)").removeClass("complete");
  });
});
