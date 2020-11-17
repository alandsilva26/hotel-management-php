$(document).ready(function () {
  $(".input-button").click(function (event) {
    event.preventDefault();
  });

  // Check in

  $("#check-in").datepicker({
    minDate: 0,
    numberOfMonths: [1, 2],
    onSelect: function () {
      // $("#check-out").datepicker("show");
      $("#check-in-button").html($("#check-in").val());
    },
  });

  $(".form-group:eq(0)").click(function () {
    $("#check-in").datepicker("show");
  });

  $("#check-in-button").click(function () {
    $("#check-in").datepicker("show");
  });

  // $("#check-in").change(function () {
  //   $("#check-in-button").html($("#check-in").val());
  // });

  // Check out

  $("#check-out").datepicker({
    minDate: 0,
    numberOfMonths: [1, 2],
    onSelect: function () {
      // $("#check-out").datepicker("show");
      $("#check-out-button").html($("#check-out").val());
    },
  });

  $(".form-group:eq(1)").click(function () {
    $("#check-out").datepicker("show");
  });

  $("#check-out-button").click(function () {
    $("#check-out").datepicker("show");
  });

  // $("#check-out").change(function () {
  //   $("#check-out-button").html($("#check-out").val());
  // });
  // $("#home-header").style("color", "red !important");

  parallaxScroll = () => {
    let offset = window.pageYOffset;
    try {
      console.log("HELLO");
      // $("#home-header").style("border", "1px solid red");
      // = offset * 0.9 + "px";
    } catch (e) {
      console.error(e);
    }
  };
});
