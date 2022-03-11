<script>
jQuery( document ).ready(function() {
		window.cart = 0;
		var fastspring_modal = document.getElementById("fastspring_modal");
		var fastspring_<?php echo $options['fastspring_cart_location']; ?>_modalcontent = document.getElementById("fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-content");
    window.fs_modal_content_el = fastspring_<?php echo $options['fastspring_cart_location']; ?>_modalcontent;

		if((QueryString.email && QueryString.fname && QueryString.lname) || QueryString.product) {
			var s = {};
			if(QueryString.product) {
        window.productFromURL = QueryString.product;
				if(QueryString.quantity) {
					var qsquantity = QueryString.quantity;
				} else {
					var qsquantity = 1;
				}
				s = {
					'products' : [
						{
							'path':QueryString.product,
							'quantity':qsquantity
						}
					]
				}
			}
			if(QueryString.email && QueryString.fname && QueryString.lname) {
				s.paymentContact = {};
				s.paymentContact.email = QueryString.email;
				s.paymentContact.firstName = QueryString.fname;
				s.paymentContact.lastName = QueryString.lname;
				if(QueryString.company) {
					s.paymentContact.company = QueryString.company;
				}
				if(QueryString.addressLine1) {
					s.paymentContact.addressLine1 = QueryString.addressLine1;
				}
				if(QueryString.addressLine2) {
					s.paymentContact.addressLine2 = QueryString.addressLine2;
				}
				if(QueryString.city) {
					s.paymentContact.city = QueryString.city;
				}
				if(QueryString.region) {
					s.paymentContact.region = QueryString.region;
				}
				if(QueryString.country) {
					s.paymentContact.country = QueryString.country;
				}
				if(QueryString.postalCode) {
					s.paymentContact.postalCode = QueryString.postalCode;
				}
				if(QueryString.phoneNumber) {
					s.paymentContact.phoneNumber = QueryString.phoneNumber;
				}
			}
			if(QueryString.coupon) {
				s.coupon = QueryString.coupon;
			}
      if (s) {
        //fastspring.builder.push(s, function(data){  openCart(); });
      }
		}
});

function openCart(e) {
  if(e) {
    e.preventDefault();
  }
  var el = document.body;
  addClass(el, "fastspring_modal_open");
  fastspring_modal.style.display = "block";
  if (window.dataLayer) {
    dataLayer.push({ "event" : "FSWC-CartEvent", "fsc-eventCategory" :  "Cart", "fsc-eventAction" : "Open", "fsc-eventLabel" : "Cart Modal" });
  }
}

function <?php echo strtoupper($options['fastspring_cart_location']); ?>_Close() {
  var el = document.body;
  removeClass(el, "fastspring_modal_open");
  var fastspring_modal = document.getElementById("fastspring_modal");
  var fastspring_<?php echo $options['fastspring_cart_location']; ?>_modalcontent = document.getElementById("fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-content");
  fastspring_<?php echo $options['fastspring_cart_location']; ?>_modalcontent.style.animationName = "fastspring_<?php echo $options['fastspring_cart_location']; ?>_revslideIn";
  fastspring_modal.style.animationName="fastspring_revfadeIn";
  setTimeout(function(){
    fastspring_modal.style.display = "none";
    fastspring_<?php echo $options['fastspring_cart_location']; ?>_modalcontent.style.animationName = "fastspring_<?php echo $options['fastspring_cart_location']; ?>_slideIn";
    fastspring_modal.style.animationName="fastspring_fadeIn";
  },350);
  if (window.dataLayer) {
    dataLayer.push({ "event" : "FSWC-CartEvent", "fsc-eventCategory" :  "Cart", "fsc-eventAction" : "Close", "fsc-eventLabel" : "Cart Modal" });
  }
};

function hasClass(el, className) {
	if (el.classList)
		return el.classList.contains(className)
	else
		return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'))
	}

function addClass(el, className) {
	if (el.classList)
		el.classList.add(className)
	else if (!hasClass(el, className)) el.className += " " + className
}

function removeClass(el, className) {
	if (el.classList)
		el.classList.remove(className)
	else if (hasClass(el, className)) {
		var reg = new RegExp('(\s|^)' + className + '(\s|$)')
		el.className=el.className.replace(reg, ' ')
	}
}

	function onfastspringpopupClosed(orderReference) {
		if (orderReference)
		{
			fastspring.builder.reset();
			<?php
			if($options['fastspring_thankyou_page']) { ?>
				window.location.replace("<?php echo $options['fastspring_thankyou_page'];?>");
				<?php
			}
			echo strtoupper($options['fastspring_cart_location']); ?>_Close();
		}
	}

function decorateURLFunction(url) {
	var linkerParam = null;
	if ( typeof ga === 'function') {
		ga(function() {
			var trackers = ga.getAll();
			linkerParam = trackers[0].get('linkerParam');
		});
	}
	return (linkerParam ? url + '?' + linkerParam : url);
}

	function beforeRequestsCallbackFunction() {
		jQuery(".loading").show();
	}
	
	function afterRequestsCallbackFunction() {
		console.log("beforeMarkupCallbackFunction");
//		if(window.cart == 0) {
			jQuery(".loading").hide();
//		}
	}
	
	function markupHelpersCallback() {
		Handlebars.registerHelper('iff', function(lvalue, operator, rvalue, options) {
			//if (window.hasOwnProperty(rvalue)) rvalue = window[rvalue];
			var functions = {
				'==':       function(l,r) { return l == r; },
				'===':      function(l,r) { return l === r; },
				'!=':       function(l,r) { return l != r; },
				'<':        function(l,r) { return l < r; },
				'>':        function(l,r) { return l > r; },
				'<=':       function(l,r) { return l <= r; },
				'>=':       function(l,r) { return l >= r; },
				'typeof':   function(l,r) { return typeof l === r; }
			};
			if (!functions.hasOwnProperty(operator)){
				throw new Error("Handlerbars Helper 'iff' doesn't know the operator " + operator);
			}
			var result = functions[operator](lvalue,rvalue);
			if( result ) {
				return options.fn(this);
			} else {
				return options.inverse(this);
			}
		});
		Handlebars.registerPartial("pricing", document.getElementById('pricing-partial').innerHTML);
		Handlebars.registerPartial("quantity", document.getElementById('quantity-partial').innerHTML);
	}
	
	function beforeMarkupCallbackFunction() {
		jQuery(".loading").show();
	}
	
	function afterMarkupCallbackFunction() {
		if(window.cart == 0) {
			jQuery(".loading").hide();
		}
		jQuery(".fspopover").fsPopover({trigger:"hover"});
	}
    
	function errorCallbackFunction(code, string) {
		var fastspring_error = 'There was an issue adding this item to your cart.<br />Error: ' + code + ' ' + string;
		jQuery("#fastspring_error").html( fastspring_error );
		jQuery(".fastspring_alert").show();
		setTimeout(function() {
			jQuery(".fastspring_alert").hide()
		}, 5000);
	}
    
function popupEventReceived() {
  if(window.cart == 0) {
    jQuery(".loading").hide();
  }
}

function dataReceived(data) {
  jQuery(".loading").hide();
  if(window.coupon) {
    if(!data.coupons[0]) {
      couponerror(window.coupon.toUpperCase());
    } else if(data.coupons[0].toUpperCase() != window.coupon.toUpperCase()) {
      couponerror(window.coupon.toUpperCase());
    } else {
      if (window.dataLayer) {
        dataLayer.push({ "event" : "FSWC-CartEvent", "fsc-eventCategory" :  "Cart", "fsc-eventAction" : "Coupon Added", "fsc-eventLabel" : window.coupon });
      }
    }
  }
};
    
function couponerror(coupon) {
  var fastspring_error = 'The coupon ' + coupon + ' is not valid';
  fs_modal_content_el.scrollTop = 0;
  jQuery("#fastspring_error").html( fastspring_error );
  jQuery(".fastspring_alert").show();
  setTimeout(function() {
    jQuery(".fastspring_alert").hide()
  }, 10000);
  if (window.dataLayer) {
    dataLayer.push({ "event" : "FSWC-CartEvent", "fsc-eventCategory" :  "Cart", "fsc-eventAction" : "Coupon Error", "fsc-eventLabel" : coupon });
  }
};
    
function applycoupon() {
  jQuery(".loading").show();
  var couponid= jQuery("#couponcode").val();
  window.coupon = couponid;
  fastspring.builder.promo(couponid);
};
    
	function addthis(prod, e) {
		if(e) {
			e.preventDefault();
		}
		jQuery(".loading").show();
		fastspring.builder.add(prod, function(data){
			openCart(e);
		});
	}

	jQuery( ".fastspring_viewcart.cartcounter.mainmenu" ).click(function() {
		openCart(e);
	});

	var QueryString = function () {
		var query_string = {};
		var query = window.location.search.substring(1);
		var vars = query.split("&");
		for (var i=0;i<vars.length;i++) {
			var pair = vars[i].split("=");
			if (typeof query_string[pair[0]] === "undefined") {
				query_string[pair[0]] = decodeURIComponent(pair[1]);
			} else if (typeof query_string[pair[0]] === "string") {
				var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
				query_string[pair[0]] = arr;
			} else {
				query_string[pair[0]].push(decodeURIComponent(pair[1]));
			}
		}
		return query_string;
	}();

	window.onclick = function(event) {
		var fastspring_modal = document.getElementById("fastspring_modal");
		if (event.target == fastspring_modal) {
			var el = document.body;
			removeClass(el, "fastspring_modal_open");
			var fastspring_modal = document.getElementById("fastspring_modal");
			var fastspring_<?php echo $options['fastspring_cart_location']; ?>_modalcontent = document.getElementById("fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-content");
			fastspring_<?php echo $options['fastspring_cart_location']; ?>_modalcontent.style.animationName = "fastspring_<?php echo $options['fastspring_cart_location']; ?>_revslideIn";
			fastspring_modal.style.animationName="fastspring_revfadeIn";
				setTimeout(function(){
				fastspring_modal.style.display = "none";
				fastspring_<?php echo $options['fastspring_cart_location']; ?>_modalcontent.style.animationName = "fastspring_<?php echo $options['fastspring_cart_location']; ?>_slideIn";
				fastspring_modal.style.animationName="fastspring_fadeIn";
			},350);
		}
	}
</script>

<?php
if($options['fastspring_cssclass']) {
    echo '<style>';
    echo $options['fastspring_cssclass'];
    echo '</style>';
}
?>

<script
    id="fsc-api"
    src="<?php echo $options['fastspring_builder_url']; ?>"
    type="text/javascript"
    data-storefront="<?php echo $options['fastspring_storefront']; ?>"
    data-popup-closed="onfastspringpopupClosed"
    data-decorate-callback="decorateURLFunction"
    data-before-requests-callback="beforeRequestsCallbackFunction"
    data-after-requests-callback="afterRequestsCallbackFunction"
    data-markup-helpers-callback="markupHelpersCallback"
    data-before-markup-callback="beforeMarkupCallbackFunction"
    data-after-markup-callback="afterMarkupCallbackFunction"
    data-error-callback="errorCallbackFunction"
    data-popup-event-received="popupEventReceived"
    data-data-callback="dataReceived"
    data-continuous="true"
    data-debug="false">
</script>

<script data-fsc-template-for="shopping-cart" type="text/x-handlebars-template">
  <?php include(dirname(dirname(__FILE__)) . "/cerberus_handlebars_template.php"); ?>
</script>

<div id="fastspring_modal" class="fastspring_modal fastspring_<?php echo strtoupper($options['fastspring_cart_location']); ?>">
	<div class="fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-content" id="fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-content">
		<div class="fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-header" style="background-color: <?php echo $options['fastspring_header_color']; ?>; color: <?php echo $options['fastspring_header_text_color']; ?>">
      <span class="fastspring_closebtn fs-close-cart-button" 
            onclick="<?php echo strtoupper($options['fastspring_cart_location']); ?>_Close();"
            style="padding: 15px 0; font-size: 22px;">
              <i class="fa fa-times" aria-hidden="true"></i>
              Close Cart
      </span>
			<h2><?php echo $options['fastspring_header']; ?></h2>
		</div>
		<div class="fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-body">
			<div class="fastspring_alert" style="display:none;">
        <span class="fastspring_closebtn" onclick="jQuery('.fastspring_alert').hide();" style="padding: 0; float: right; font-size: 20px; ">
          <i class="fa fa-times" aria-hidden="true"></i>
        </span>
				<h2 id="fastspring_error"></h2>
			</div>
			<div data-fsc-selections-smartdisplay data-fsc-items-container="shopping-cart" data-fsc-filter="selected=true">
			</div>
			<div data-fsc-selections-smartdisplay-inverse style="display: none; text-align:center;" class="main-article empty-cart">
				<h1 style="margin-top: 10px;"><?php echo $options['fastspring_empty_cart']; ?></h1>
				<a href="#" onclick="event.preventDefault(); <?php echo strtoupper($options['fastspring_cart_location']); ?>_Close();">Click here to continue shopping</a>
			</div>
		</div>
	</div>
</div>

<div class="loading" style="display:none;">Loading&#8230;</div>
