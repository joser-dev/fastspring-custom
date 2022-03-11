// Clicking on H3's opens plan features

jQuery(function($) {
  $("h3.fs-plan-features-small").on("click", function(e) {
    e.preventDefault();
    $(this).siblings(".fs-plan-features").toggleClass("showing");
    $(this).toggleClass("showing");
  });

  $("#feature-grid").one("inview", function() {
    $(".fs-feature-callout").fadeOut();
  });
});
