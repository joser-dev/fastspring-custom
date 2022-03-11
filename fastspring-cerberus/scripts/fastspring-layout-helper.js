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
