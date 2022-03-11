!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){function i(){var b,c,d={height:f.innerHeight,width:f.innerWidth};return d.height||(b=e.compatMode,(b||!a.support.boxModel)&&(c="CSS1Compat"===b?g:e.body,d={height:c.clientHeight,width:c.clientWidth})),d}function j(){return{top:f.pageYOffset||g.scrollTop||e.body.scrollTop,left:f.pageXOffset||g.scrollLeft||e.body.scrollLeft}}function k(){if(b.length){var e=0,f=a.map(b,function(a){var b=a.data.selector,c=a.$element;return b?c.find(b):c});for(c=c||i(),d=d||j();e<b.length;e++)if(a.contains(g,f[e][0])){var h=a(f[e]),k={height:h[0].offsetHeight,width:h[0].offsetWidth},l=h.offset(),m=h.data("inview");if(!d||!c)return;l.top+k.height>d.top&&l.top<d.top+c.height&&l.left+k.width>d.left&&l.left<d.left+c.width?m||h.data("inview",!0).trigger("inview",[!0]):m&&h.data("inview",!1).trigger("inview",[!1])}}}var c,d,h,b=[],e=document,f=window,g=e.documentElement;a.event.special.inview={add:function(c){b.push({data:c,$element:a(this),element:this}),!h&&b.length&&(h=setInterval(k,250))},remove:function(a){for(var c=0;c<b.length;c++){var d=b[c];if(d.element===this&&d.data.guid===a.guid){b.splice(c,1);break}}b.length||(clearInterval(h),h=null)}},a(f).on("scroll resize scrollstop",function(){c=d=null}),!g.addEventListener&&g.attachEvent&&g.attachEvent("onfocusin",function(){d=null})});

if (typeof(beforeRequestsCallbackFunction) == "function") {
  beforeRequestsCallbackFunction = (function() {
    var cached_function = beforeRequestsCallbackFunction;
    if (!window.hasClearedCart) {
      fastspring.builder.reset();
      window.hasClearedCart = true;
    };
    var result = cached_function.apply(this, arguments);
    return result;
  })();
}

if (typeof(afterMarkupCallbackFunction) == "function") {
  afterMarkupCallbackFunction = (function() {
    var cached_function = afterMarkupCallbackFunction;

      return function() {
        jQuery(".fs-price").each(function() {
          var $this = jQuery(this);
          var text = $this.text();
          text = text.replace(".00", "");
          text = text.replace(",00", "");
          $this.text(text);
          if ( $this.text() !== "*") {
            $this.removeAttr("data-fsc-item-price");
            $this.removeAttr("data-fsc-item-path");
          }
        });

        if (!window.hasFsLayoutHelperRun) {

          jQuery(".fs-sbl-hide").removeClass("fs-sbl-hide");
          
          var prodDescHeights = []
          setTimeout(function() {
              jQuery(".fs-product-description").each(function(i) {
                prodDescHeights.push( jQuery(this).outerHeight() );
              });
          }, 200);

          setTimeout(function() {
            jQuery(".fs-product-description").css("height", Math.max.apply(null, prodDescHeights) );
           }, 300);

          // When the SBL data is ready, unhide any elements
          setTimeout(function() {
            jQuery(".fs-product-box-loading").removeClass("fs-product-box-loading").addClass("has-loaded");
          }, 400);
          window.hasFsLayoutHelperRun = true;
        };

        //Don't allow multiple clicks on selected options
        jQuery("input.option-input").on("change", function(e) {
          $this = jQuery(this);
          if (window.dataLayer) {
            dataLayer.push({ "event" : "FSWC-CartEvent", "fsc-eventCategory" :  "Cart", "fsc-eventAction" : "Product Option Changed", "fsc-eventLabel" : $this.attr("id") });
          };
          jQuery(".loading").show();
        });

        //If there is a product from the URL, open the cart
        if (window.productFromURL && !window.hasCartOpenedFromURL) {
          jQuery("a.fastspring_btn[data-fsc-item-path=" + productFromURL + "]").click()
          window.hasCartOpenedFromURL = true;
        }

        // Fire old functionality as well
        var result = cached_function.apply(this, arguments); // use .apply() to call it
        return result;
      };
  })();

}

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
