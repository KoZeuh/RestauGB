function smoothScroll() {
  $("html, body").animate(
    {
      scrollTop: $("#RES").offset().top,
    },
    1500
  );
}

function smoothScroll2() {
  $("html, body").animate(
    {
      scrollTop: $("#CONT").offset().top,
    },
    1500
  );
}
