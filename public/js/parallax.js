$(document).ready(function () {
  window.addEventListener("scroll", function () {
    let offset = window.pageYOffset;
    console.log(`${offset * 1}px`);
    $("#home-header--bg-image").css(
      "background-position-y",
      `${offset * 0.2}px`
    );

    // $("#verify-user--bg-image").css(
    //   "background-position-y",
    //   `${offset * 0.2}px`
    // );
  });
});
