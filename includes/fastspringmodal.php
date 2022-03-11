<script>
	jQuery( document ).ready(function() {
		window.cart = 0;
		var fastspring_modal = document.getElementById("fastspring_modal");
		var fastspring_<?php echo $options['fastspring_cart_location']; ?>_modalcontent = document.getElementById("fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-content");
		if((QueryString.email && QueryString.fname && QueryString.lname) || QueryString.product) {
			var s = {};
			if(QueryString.product) {
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
			if (s) fastspring.builder.push(s, function(data){
				openCart(e);
			});
		}
	});

function openCart(e) {
	console.log("open cart");
	if(e) {
		e.preventDefault();
	}
	var el = document.body;
	addClass(el, "fastspring_modal_open");
	fastspring_modal.style.display = "block";
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
	}

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
		console.log("beforeRequestsCallbackFunction");
		jQuery(".loading").show();
	}
	
	function afterRequestsCallbackFunction() {
		console.log("afterRequestsCallbackFunction");
		if(window.cart == 0) {
			jQuery(".loading").hide();
		}
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
		console.log("beforeMarkupCallbackFunction");
		jQuery(".loading").show();
	}
	
	function afterMarkupCallbackFunction() {
		console.log("afterMarkupCallbackFunction");
		if(window.cart == 0) {
			jQuery(".loading").hide();
		}
		jQuery(".fspopover").fsPopover({trigger:"hover"});
	}
    
	function errorCallbackFunction(code, string) {
		console.log('error callback function: ' + code + ' ' + string);
		var fastspring_error = 'There was an issue adding this item to your cart.<br />Error: ' + code + ' ' + string;
		jQuery("#fastspring_error").html( fastspring_error );
		jQuery(".fastspring_alert").show();
		setTimeout(function() {
			jQuery(".fastspring_alert").hide()
		}, 5000);
	}
    
	function popupEventReceived() {
		console.log("popupEventReceived");
		if(window.cart == 0) {
			jQuery(".loading").hide();
		}
	}
	
	function dataReceived(data) {
		if(window.coupon) {
			if(!data.coupons[0]) {
				couponerror(window.coupon.toUpperCase());
			}
			if(data.coupons[0].toUpperCase() != window.coupon.toUpperCase()) {
				couponerror(window.coupon.toUpperCase());
			}
		}
	}
    
	function couponerror(coupon) {
	var fastspring_error = 'The coupon ' + coupon + ' is not valid';
	jQuery("#fastspring_error").html( fastspring_error );
	jQuery(".fastspring_alert").show();
	setTimeout(function() {
		jQuery(".fastspring_alert").hide()
		}, 5000);
	}
    
	function applycoupon() {
		console.log("applying coupon");
		var couponid= jQuery("#couponcode").val();
		window.coupon = couponid;
		fastspring.builder.promo(couponid);
	}
    
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
	<div id="shopping-cart" class="shopping-cart">
		<div class="fastspring_container" style="margin-top:20px;">
			{{#each items}}
				{{#each items}}
					{{#iff path '!=' 'SystemExtension.shippingcalculation'}}
						<div class=" xs-border sm-border">
							<div class="divremove">
								{{#if removable}}
									<a style="color: black; font-weight:bold;" data-fsc-action="Remove" data-fsc-item-path-value="{{path}}" class="removecart md-hide">
										<span class="fastspring_closebtn" style="color: black; padding-top: 0;"><i class="fa <?php echo $options['fastspring_delete_icon']; ?>" aria-hidden="true"></i></span>
									</a>
								{{/if}}
							</div>
							<div class="fastspring_row cartitemrows">
								<div class="fastspring_col-xs-12 fastspring_col-md-7 xs-text-center">
									{{#if this.image}}
										<img src='{{this.image}}' style="max-height:100px; max-width:100px; float:left;" />
									{{/if}}
									<h3>{{{this.display}}}</h3>
									{{#if description.summary}}
										<a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >(Details)</a>
									{{/if}}
									<br class="xs-show" />
								</div>
								<div class="fastspring_col-xs-12 fastspring_col-md-3">
									<div class="form-inline xs-text-center sm-text-center text-right">
										<div class="quantity inline-block">
											<label for="qty">
												{{#if discountTotalValue}}
													<s class="text-muted">{{price}}</s>
												{{/if}}
												{{#iff totalValue '>' '0'}}
													<span>{{unitPrice}}</span>
												{{else}}
													<strong class="text-success"> FREE </strong>
												{{/iff}}
											</label>
											{{#if selected}}
												{{#iff pricing.quantity '==' 'allow'}}
													{{#iff selected '==' true}} <i class="fa fa-times" aria-hidden="true"></i> {{/iff}}
														{{#iff quantity '>=' '10'}}
															<input type="text" class="form-control" class="inline" data-fsc-item-quantity-value data-fsc-item-path-value="{{path}}" value="{{quantity}}" style="width:55px;display:inline;">
															<a href="#" data-fsc-action="Update" data-fsc-item-path-value="{{path}}"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 20px; "></i></a>
														{{else}}
															<select name="qty" data-fsc-item-quantity-value data-fsc-item-quantity data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Update" class="form-control" style="width:auto; margin: 0 auto;">
																<option value="1"{{#iff quantity '==' 1}}selected="true"{{/iff}}>1</option>
																<option value="2"{{#iff quantity '==' 2}}selected="true"{{/iff}}>2</option>
																<option value="3"{{#iff quantity '==' 3}}selected="true"{{/iff}}>3</option>
																<option value="4"{{#iff quantity '==' 4}}selected="true"{{/iff}}>4</option>
																<option value="5"{{#iff quantity '==' 5}}selected="true"{{/iff}}>5</option>
																<option value="6"{{#iff quantity '==' 6}}selected="true"{{/iff}}>6</option>
																<option value="7"{{#iff quantity '==' 7}}selected="true"{{/iff}}>7</option>
																<option value="8"{{#iff quantity '==' 8}}selected="true"{{/iff}}>8</option>
																<option value="9"{{#iff quantity '==' 9}}selected="true"{{/iff}}>9</option>
																<option value="10">10+</option>
															</select>
														{{/iff}}
													{{/iff}}
													{{#iff pricing.quantity '==' 'lock'}}
														<span>
															{{quantity}}
														</span>
													{{/iff}}
													{{#if subscription}}
														<br />
														<em>
															<span style="font-size:75%;">	
																Renews every
																{{#iff subscription.intervalLength '>=' '2' }}
																	{{subscription.intervalLength}} {{subscription.intervalUnit}}s
																{{/iff}}
																{{#iff subscription.intervalLength '==' '1' }}
																	{{subscription.intervalUnit}}
																{{/iff}}.
																<br />Next charge: {{subscription.nextChargeTotal}} on {{subscription.nextChargeDate}}
															</span>
														</em>
													{{/if}}
													{{#if discountTotalValue}}
														<br />
														<span class="text-success xs-hide sm-hide" style="font-size: 75%;">
															You save {{discountTotal}} ({{discountPercent}})
														</span>
													{{/if}}
													{{#if discount.data.tiers}}
														<span class="discount-tiers xs-hide sm-hide">
															<a class="fspopover" data-title="Volume Discounts" data-content="{{#each discount.data.tiers}}<div class='tier'>{{quantity}}+ : {{percent}}{{amount}} off</div>{{/each}}" >
																Volume Discounts Available
															</a>
														</span>
													{{/if}}
												{{/if}}
											</div>
										</div>
									</div>
									<div class="fastspring_col-xs-12 fastspring_col-md-2 text-center ">
									<h3 style="margin:0px;">
										{{#iff this.totalValue '>' '0'}}
											{{this.total}}
										{{else}}
											FREE
										{{/iff}}
										{{#if removable}}
											<a style="color: black; font-weight:bold;" data-fsc-action="Remove" data-fsc-item-path-value="{{path}}" class="removecart sm-hide xs-hide">
												<span class="fastspring_closebtn" style="color: black; padding-top: 0;"><i class="fa <?php echo $options['fastspring_delete_icon']; ?>" aria-hidden="true"></i></span>
											</a>
										{{/if}}
									</h3>
								</div>
								{{#if discount.data.tiers}}
									<div class='discount-tiers xs-show sm-show text-center clearfix fastspring_col-xs-12 fastspring_col-sm-12' style="margin:10px 0;">
										<a class="fspopover" data-title="Volume Discounts" data-content="{{#each discount.data.tiers}}<div class='tier'>{{quantity}}+ : {{percent}}{{amount}} off</div>{{/each}}" >
											Volume Discounts Available
										</a>
									</div>
								{{/if}}
								{{#if discountTotalValue}}
									<div class='text-success xs-show sm-show clearfix fastspring_col-xs-12 fastspring_col-sm-12 text-center' style="font-size:75%;">
										You save {{discountTotal}} ({{discountPercent}})<br />
									</div>
								{{/if}}
							</div>
							
							{{#each ../../../groups}}
								{{#iff type '==' 'add'}}
									{{#iff driver '==' ../../../path}}
										{{#iff selectableAdditions '==' true}}
											<!--Cross-sells-->
											{{#iff driverType '==' 'product'}}
												<div class="fastspring_col-md-11 fastspring_offset-sm-1">
													<div class="fastspring_container offset">
														<div class="fastspring_row" style="margin:20px 0px 0px 0px; background-color: #f5f5f5; ">
															<div class="fastspring_col-xs-12">
																<h4 class="text-center">
																	{{display}}
																</h4>
																<hr class="clearfix" />
																{{#each items}}
																	{{#iff selected '==' false}}
																		<div class="fastspring_col-md-8 fastspring_col-sm-6 fastspring_col-xs-12 xs-text-center">
																			{{#if image}}
																				<img src='{{image}}' class="xs-hide" style="max-height: 75px; max-width: 75px; float:left; margin-right: 10px;" />
																			{{/if}}
																			{{display}}
																			{{#if description.summary}}
																				<br />
																				<a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >
																					(Details)
																				</a>
																			{{/if}}
																		</div>
																		<div class="fastspring_col-md-2 fastspring_col-sm-3 fastspring_col-xs-12 xs-text-center">
																			{{>pricing}}
																		</div>
																		<div class="fastspring_col-md-2 fastspring_col-sm-3 fastspring_col-xs-12 xs-text-center text-right">
																			<a href="#" class="<?php echo $options['fastspring_xsclass']; ?>" data-fsc-item-path-value='{{path}}' data-fsc-item-path='{{path}}' data-fsc-action='Add'>
																				<?php
																				if($options['fastspring_xsicon'] != "none") {
																					?>
																					<i class="fa <?php echo $options['fastspring_xsicon']; ?>" aria-hidden="true"></i>&nbsp;
																					<?php
																				}
																				?>
																				{{#if description.action}} 
																					{{{description.action}}} 
																				{{else}} 
																					<?php echo $options['fastspring_xstext']; ?> 
																				{{/if}}
																			</a>
																			<div class="fastspring_col-xs-12 xs-show">
																				<br />
																			</div>
																		</div>
																		<hr class="clearfix" style="margin-bottom:20px;" />
																	{{/iff}}
																{{/each}}
															</div>
														</div>
													</div>
												</div>
												<div class="clearfix" style="height: 20px;"></div>
											{{/iff}}
										{{/iff}}
									{{/iff}}
								{{/iff}}
							{{/each}}


							{{#each groups}}
								{{#iff type '==' 'replace'}}
									{{#iff selectableReplacements '==' true}}
										<div class="fastspring_col-md-11 fastspring_offset-sm-1">
											<div class="fastspring_container offset">
												<div class="fastspring_row" style="margin:20px 0px 0px 0px; background-color: #f5f5f5; ">
													<div class="fastspring_col-xs-12">
														<h4 class="text-center">
															{{display}}
														</h4>
														<hr class="clearfix">
														{{#each items}}
															{{#iff selected '==' false}}
																<div class="fastspring_col-md-8 fastspring_col-sm-6 fastspring_col-xs-12 xs-text-center">
																	{{#if image}}
																		<img src='{{image}}' class="xs-hide" style="max-height: 75px; max-width: 75px; float:left; margin-right: 10px;" />
																	{{/if}}
																	{{display}}
																	{{#if description.summary}}
																		<br />
																		<a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >
																			(Details)
																		</a>
																	{{/if}}
																</div>
																<div class="fastspring_col-md-2 fastspring_col-sm-3 fastspring_col-xs-12 xs-text-center">
																	{{>pricing}}
																</div>
																<div class="fastspring_col-md-2 fastspring_col-sm-3 fastspring_col-xs-12 xs-text-center text-right">
																	<a href="#" class="<?php echo $options['fastspring_usclass']; ?>" data-fsc-item-path-value='{{path}}' data-fsc-item-path='{{path}}' data-fsc-action='Add'>
																		<?php
																		if($options['fastspring_usicon'] != "none") {
																			?>
																			<i class="fa <?php echo $options['fastspring_usicon']; ?>" aria-hidden="true"></i>&nbsp;
																			<?php
																		}
																		?>
																		{{#if description.action}}
																			{{{description.action}}}
																		{{else}}
																			<?php echo $options['fastspring_ustext']; ?>
																		{{/if}}
																	</a>
																</div>
																<div class="fastspring_col-xs-12 xs-show">
																	<br />
																</div>
																<hr class="clearfix">
															{{/iff}}
														{{/each}}
													</div>
												</div>
											</div>
										</div>
										<div class="clearfix" style="height: 20px;"></div>
									{{/iff}}
								{{/iff}}
								
								{{#iff type '==' 'bundle'}}
									<div class="fastspring_row" style="margin:20px 0px 0px 0px; background-color: #f5f5f5; ">
										<div class="fastspring_col-xs-12" style="padding: 0px 10px;">
											<h5>
												{{../../display}} Includes:
											</h5>
											{{#each items}}
												{{#if image}}
													<img src='{{image}}' style="width:60px; height: auto; display:inline;" alt='{{display}}' class="fspopover" data-title="{{display}}" data-content="{{{description.summary}}}" />
												{{/if}}
											{{/each}}
										</div>
									</div>
								{{/iff}}

								{{#iff type '==' 'options'}}
									<div class="fastspring_col-md-11 fastspring_offset-sm-1">
										<div class="fastspring_container offset">
											<div class="fastspring_row" style="margin:20px 0px 0px 0px; background-color: #f5f5f5; ">
												<div class="fastspring_col-xs-12">
													<h4 class="text-center">
														<!--options-->{{display}}
													</h4>
													{{#each items}}
														<hr class="clearfix">
														<div class="fastspring_col-xs-1">
															<input class="option-input radio" type="radio" {{#if selected}} checked{{/if}} name="{{display}}" id="{{path}}" data-fsc-action="Add" data-fsc-item-path-value="{{path}}" >
														</div>
														<div class="fastspring_col-sm-2 xs-hide">
															<img src='{{this.image}}' style="max-height: 60px; width: auto; float: left; margin-right: 10px; margin-bottom:15px;" />
														</div>
														<div class="fastspring_col-sm-7 xs-hide">
															{{this.display}}
															{{#if description.summary}}
																<br />
																<a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >
																	(Details)
																</a>
															{{/if}}
														</div>
														<div class="fastspring_col-md-2 text-right xs-hide">
															{{#if discountTotalValue}}
																<s class="text-muted">{{price}}</s>
															{{/if}}
															{{#iff totalValue '>' '0'}}
																<h4 class="clearfix" style="margin-bottom:0;">{{unitPrice}}</h4>
															{{else}}
																<h4 class="clearfix text-success"> FREE </h4>
															{{/iff}}
														</div>
														<div class="xs-show fastspring_col-xs-10 text-center">
															{{this.display}}
															{{#if description.summary}}
																<br />
																<a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >
																	(Details)
																</a>
															{{/if}}
															{{#if discountTotalValue}}
																<s class="text-muted">{{price}}</s>
															{{/if}}
															{{#iff totalValue '>' '0'}}
																<h4 class="clearfix" style="margin-bottom:0;">{{unitPrice}}</h4>
															{{else}}
																<h4 class="clearfix text-success"> FREE </h4>
															{{/iff}}
														</div>
													{{/each}}
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix" style="height: 20px;"></div>
								{{/iff}}

								{{#iff type '==' 'config-one'}}
									<div class="fastspring_col-md-11 fastspring_offset-sm-1">
										<div class="fastspring_container offset">
											<div class="fastspring_row" style="margin:20px 0px 0px 0px; background-color: #f5f5f5; ">
												<div class="fastspring_col-xs-12">
													<h4 class="text-center">
														<!--Product Options for -->{{display}}
													</h4>
													{{#each items}}
														<hr class="clearfix">
														<div class="fastspring_col-xs-2 fastspring_col-sm-1">
															<input class="option-input radio" type="radio"{{#if selected}} checked{{/if}} data-fsc-action="Add" data-fsc-item-path-value="{{path}}">
														</div>
														<div class="fastspring_col-xs-10">
															<div class="fastspring_col-sm-5 fastspring_col-xs-12 xs-text-center">
																<img class="xs-hide" src='{{this.image}}' style="height: 60px; width: auto; float: left; margin-right: 10px;" />
																{{this.display}}
																{{#if description.summary}}
																	<br class="xs-hide" />
																	<a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >
																		(Details)
																	</a>
																{{/if}}
															</div>
															<div class="fastspring_col-xs-12 fastspring_col-sm-4 xs-text-center">
																<div class="form-inline">
																	<div class="quantity inline-block">
																		<label for="qty">
																			{{#if discountTotalValue}}
																				<s class="text-muted">{{price}}</s>
																			{{/if}}
																			{{#iff totalValue '>' '0'}}
																				<span>{{unitPrice}}</span>
																			{{else}}
																				<strong class="text-success"> FREE </strong>
																			{{/iff}}
																		</label>
																		{{#iff selected '==' true}} <i class="fa fa-times" aria-hidden="true"></i> {{/iff}}
																		{{#if selected}}
																			{{#iff pricing.quantity '==' 'allow'}}
																				{{#iff quantity '>=' '10'}}
																					<input type="text" class="form-control" class="inline" data-fsc-item-quantity-value data-fsc-item-path-value="{{path}}" value="{{quantity}}" style="width:75px;">
																					<a href="#" data-fsc-action="Update" data-fsc-item-path-value="{{path}}"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 20px;"></i></a>
																				{{else}}
																					<select name="qty" data-fsc-item-quantity-value data-fsc-item-quantity data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Update" class="form-control" style="width:auto; margin: 0 auto;">
																						<option value="1"{{#iff quantity '==' 1}}selected="true"{{/iff}}>1</option>
																						<option value="2"{{#iff quantity '==' 2}}selected="true"{{/iff}}>2</option>
																						<option value="3"{{#iff quantity '==' 3}}selected="true"{{/iff}}>3</option>
																						<option value="4"{{#iff quantity '==' 4}}selected="true"{{/iff}}>4</option>
																						<option value="5"{{#iff quantity '==' 5}}selected="true"{{/iff}}>5</option>
																						<option value="6"{{#iff quantity '==' 6}}selected="true"{{/iff}}>6</option>
																						<option value="7"{{#iff quantity '==' 7}}selected="true"{{/iff}}>7</option>
																						<option value="8"{{#iff quantity '==' 8}}selected="true"{{/iff}}>8</option>
																						<option value="9"{{#iff quantity '==' 9}}selected="true"{{/iff}}>9</option>
																						<option value="10">10+</option>
																					</select>
																				{{/iff}}
																			{{/iff}}	
																			{{#iff pricing.quantity '==' 'lock'}}
																				<span>
																					{{quantity}}
																				</span>
																			{{/iff}}
																		{{/if}}
																	</div>
																</div>
															</div>
														</div>
														<div class="fastspring_col-sm-1 fastspring_col-xs-12 xs-text-center text-right">
															{{#if selected}}
																{{#iff totalValue '>' '0'}}
																	<h4 class="clearfix" style="margin-bottom:0;">{{total}}</h4>
																{{else}}
																	<h4 class="clearfix text-success"> FREE </h4>
																{{/iff}}
															{{/if}}
															{{#iff selected '!=' true}}
																<span class="xs-hide">---</span>
															{{/iff}}
														</div>
													{{/each}}
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix" style="height: 20px;"></div>
								{{/iff}}

								{{#iff type '==' 'config-many'}}
									<div class="fastspring_col-md-11 fastspring_offset-sm-1">
										<div class="fastspring_container offset">
											<div class="fastspring_row" style="margin:20px 0px 0px 0px; background-color: #f5f5f5; ">
												<div class="fastspring_col-xs-12">
													<h4 class="text-center">
														<!--3 config -->{{display}}
													</h4>
													{{#each items}}
														<hr class="clearfix">
														<div class="fastspring_col-xs-2 fastspring_col-sm-1">
															{{#if selected}}
																<input class="option-input checkbox" type="checkbox" name="{{display}}" id="{{path}}" checked data-fsc-action="Remove" data-fsc-item-path-value="{{path}}">
															{{else}}
																<input class="option-input checkbox" type="checkbox" name="{{display}}" id="{{path}}" data-fsc-action="Add" data-fsc-item-path-value="{{path}}">
															{{/if}}
														</div>
														<div class="fastspring_col-xs-10 fastspring_col-sm-11">
															<div class="fastspring_col-sm-6 fastspring_col-xs-12 xs-text-center">
																<img class="xs-hide" src='{{this.image}}' style="height: 60px; width: auto; float: left; margin-right: 10px;" />
																{{this.display}}
																{{#if description.summary}}
																	<br class="xs-hide" />
																	<a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >(Details)</a>
																{{/if}}
															</div>
															<div class="fastspring_col-xs-12 fastspring_col-sm-4 xs-text-center">
																<div class="form-inline">
																	<div class="quantity inline-block">
																		<label for="qty">
																			{{#if discountTotalValue}}
																				<s class="text-muted">{{price}}</s>
																			{{/if}}
																			{{#iff totalValue '>' '0'}}
																				<span>{{unitPrice}}</span>
																			{{else}}
																				<strong class="text-success"> FREE </strong>
																			{{/iff}}
																		</label>
																		{{#iff selected '==' true}} <i class="fa fa-times" aria-hidden="true"></i> {{/iff}}
																		{{#if selected}}
																			{{#iff pricing.quantity '==' 'allow'}}
																				{{#iff quantity '>=' '10'}}
																					<input type="text" class="form-control" class="inline" data-fsc-item-quantity-value data-fsc-item-path-value="{{path}}" value="{{quantity}}" style="width:75px;">
																					<a href="#" data-fsc-action="Update" data-fsc-item-path-value="{{path}}"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 20px;"></i></a>
																				{{else}}
																					<select name="qty" data-fsc-item-quantity-value data-fsc-item-quantity data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Update" class="form-control" style="width:auto; margin: 0 auto;">
																						<option value="1"{{#iff quantity '==' 1}}selected="true"{{/iff}}>1</option>
																						<option value="2"{{#iff quantity '==' 2}}selected="true"{{/iff}}>2</option>
																						<option value="3"{{#iff quantity '==' 3}}selected="true"{{/iff}}>3</option>
																						<option value="4"{{#iff quantity '==' 4}}selected="true"{{/iff}}>4</option>
																						<option value="5"{{#iff quantity '==' 5}}selected="true"{{/iff}}>5</option>
																						<option value="6"{{#iff quantity '==' 6}}selected="true"{{/iff}}>6</option>
																						<option value="7"{{#iff quantity '==' 7}}selected="true"{{/iff}}>7</option>
																						<option value="8"{{#iff quantity '==' 8}}selected="true"{{/iff}}>8</option>
																						<option value="9"{{#iff quantity '==' 9}}selected="true"{{/iff}}>9</option>
																						<option value="10">10+</option>
																					</select>
																				{{/iff}}
																			{{/iff}}
																			{{#iff pricing.quantity '==' 'lock'}}
																				<span>
																					{{quantity}}
																				</span>
																			{{/iff}}
																		{{/if}}
																	</div>
																</div>
															</div>
															<div class="fastspring_col-sm-2 fastspring_col-xs-12 xs-text-center text-right">
																{{#if selected}}
																	{{#iff totalValue '>' '0'}}
																		<h4 class="clearfix" style="margin-bottom:0;">{{total}}</h4>
																	{{else}}
																		<h4 class="clearfix text-success"> FREE </h4>
																	{{/iff}}
																{{/if}}
																{{#iff selected '!=' true}}
																	<span class="xs-hide">---</span>
																{{/iff}}
															</div>
														</div>
													{{/each}}
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix" style="height: 20px;"></div>
								{{/iff}}

								{{#iff type '==' 'addon-one'}}
									<div class="fastspring_col-md-11 fastspring_offset-sm-1">
										<div class="fastspring_container offset">
											<div class="fastspring_row" style="margin:20px 0px 0px 0px; background-color: #f5f5f5; ">
												<div class="fastspring_col-xs-12">
													<h4 class="text-center">
														<!--Subscription Addons for -->{{display}}
													</h4>
													{{#each items}}
														<hr class="clearfix">
														<div class="fastspring_col-xs-2 fastspring_col-sm-1">
															<input class="option-input radio" type="radio"{{#if selected}} checked{{/if}} data-fsc-action="Add" data-fsc-item-path-value="{{path}}">
														</div>
														<div class="fastspring_col-xs-10">
															<div class="fastspring_col-sm-5 fastspring_col-xs-12 xs-text-center">
																<img class="xs-hide" src='{{this.image}}' style="height: 60px; width: auto; float: left; margin-right: 10px;" />
																{{this.display}}
																{{#if description.summary}}
																	<br class="xs-hide" />
																	<a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >(Details)</a>
																{{/if}}
															</div>
															<div class="fastspring_col-xs-12 fastspring_col-sm-4 xs-text-center">
																<div class="form-inline">
																	<div class="quantity inline-block">
																		<label for="qty">
																			{{#if discountTotalValue}}
																				<s class="text-muted">{{price}}</s>
																			{{/if}}
																			{{#iff totalValue '>' '0'}}
																				<span>{{unitPrice}}</span>
																			{{else}}
																				<strong class="text-success"> FREE </strong>
																			{{/iff}}
																		</label>
																		{{#iff selected '==' true}} <i class="fa fa-times" aria-hidden="true"></i> {{/iff}}
																		{{#if selected}}
																			{{#iff pricing.quantity '==' 'allow'}}
																				{{#iff quantity '>=' '10'}}
																					<input type="text" class="form-control" class="inline" data-fsc-item-quantity-value data-fsc-item-path-value="{{path}}" value="{{quantity}}" style="width:75px;">
																					<a href="#" data-fsc-action="Update" data-fsc-item-path-value="{{path}}"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 20px;"></i></a>
																				{{else}}
																					<select name="qty" data-fsc-item-quantity-value data-fsc-item-quantity data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Update" class="form-control" style="width:auto; margin: 0 auto;">
																						<option value="1"{{#iff quantity '==' 1}}selected="true"{{/iff}}>1</option>
																						<option value="2"{{#iff quantity '==' 2}}selected="true"{{/iff}}>2</option>
																						<option value="3"{{#iff quantity '==' 3}}selected="true"{{/iff}}>3</option>
																						<option value="4"{{#iff quantity '==' 4}}selected="true"{{/iff}}>4</option>
																						<option value="5"{{#iff quantity '==' 5}}selected="true"{{/iff}}>5</option>
																						<option value="6"{{#iff quantity '==' 6}}selected="true"{{/iff}}>6</option>
																						<option value="7"{{#iff quantity '==' 7}}selected="true"{{/iff}}>7</option>
																						<option value="8"{{#iff quantity '==' 8}}selected="true"{{/iff}}>8</option>
																						<option value="9"{{#iff quantity '==' 9}}selected="true"{{/iff}}>9</option>
																						<option value="10">10+</option>
																					</select>
																				{{/iff}}
																			{{/iff}}
																			{{#iff pricing.quantity '==' 'lock'}}
																				<span>
																					{{quantity}}
																				</span>
																			{{/iff}}
																		{{/if}}
																	</div>
																</div>
															</div>
															<div class="fastspring_col-sm-2 fastspring_col-xs-12 xs-text-center">
																{{#if selected}}
																	{{#iff totalValue '>' '0'}}
																		<h4 class="clearfix" style="margin-bottom:0;">{{total}}</h4>
																	{{else}}
																		<h4 class="clearfix text-success"> FREE </h4>
																	{{/iff}}
																{{/if}}
																{{#iff selected '!=' true}}
																	<span class="xs-hide">---</span>
																{{/iff}}
															</div>
														</div>
													{{/each}}
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix" style="height: 20px;"></div>
								{{/iff}}

								{{#iff type '==' 'addon-many'}}
									<div class="fastspring_col-md-11 fastspring_offset-sm-1">
										<div class="fastspring_container offset">
											<div class="fastspring_row" style="margin:20px 0px 0px 0px; background-color: #f5f5f5; ">
												<div class="fastspring_col-xs-12">
													<h4 class="text-center">
														<!--config -->{{display}}
													</h4>
													{{#each items}}
														<hr class="clearfix">
														<div class="fastspring_col-xs-2 fastspring_col-sm-1">
															{{#if selected}}
																<input class="option-input checkbox" type="checkbox" name="{{display}}" id="{{path}}" checked data-fsc-action="Remove" data-fsc-item-path-value="{{path}}">
															{{else}}
																<input class="option-input checkbox" type="checkbox" name="{{display}}" id="{{path}}" data-fsc-action="Add" data-fsc-item-path-value="{{path}}">
															{{/if}}
														</div>
														<div class="fastspring_col-xs-10">
															<div class="fastspring_col-sm-5 fastspring_col-xs-12 xs-text-center">
																<img class="xs-hide" src='{{this.image}}' style="height: 60px; width: auto; float: left; margin-right: 10px;" />
																{{this.display}}
																{{#if description.summary}}
																	<br class="xs-hide" />
																	<a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >(Details)</a>
																{{/if}}
															</div>
															<div class="fastspring_col-xs-12 fastspring_col-sm-4 xs-text-center">
																<div class="form-inline">
																	<div class="quantity inline-block">
																		<label for="qty">
																			{{#if discountTotalValue}}
																				<s class="text-muted">{{price}}</s>
																			{{/if}}
																			{{#iff totalValue '>' '0'}}
																				<span>{{unitPrice}}</span>
																			{{else}}
																				<strong class="text-success"> FREE </strong>
																			{{/iff}}
																		</label> 
																		{{#iff selected '==' true}} <i class="fa fa-times" aria-hidden="true"></i> {{/iff}}
																		{{#if selected}}
																			{{#iff pricing.quantity '==' 'allow'}}
																				{{#iff quantity '>=' '10'}}
																					<input type="text" class="form-control" class="inline" data-fsc-item-quantity-value data-fsc-item-path-value="{{path}}" value="{{quantity}}" style="width:75px;">
																					<a href="#" data-fsc-action="Update" data-fsc-item-path-value="{{path}}"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 20px;"></i></a>
																				{{else}}
																					<select name="qty" data-fsc-item-quantity-value data-fsc-item-quantity data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Update" class="form-control" style="width:auto; margin: 0 auto;">
																						  <option value="1"{{#iff quantity '==' 1}}selected="true"{{/iff}}>1</option>
																						  <option value="2"{{#iff quantity '==' 2}}selected="true"{{/iff}}>2</option>
																						  <option value="3"{{#iff quantity '==' 3}}selected="true"{{/iff}}>3</option>
																						  <option value="4"{{#iff quantity '==' 4}}selected="true"{{/iff}}>4</option>
																						  <option value="5"{{#iff quantity '==' 5}}selected="true"{{/iff}}>5</option>
																						  <option value="6"{{#iff quantity '==' 6}}selected="true"{{/iff}}>6</option>
																						  <option value="7"{{#iff quantity '==' 7}}selected="true"{{/iff}}>7</option>
																						  <option value="8"{{#iff quantity '==' 8}}selected="true"{{/iff}}>8</option>
																						  <option value="9"{{#iff quantity '==' 9}}selected="true"{{/iff}}>9</option>
																						  <option value="10">10+</option>
																					</select>
																				{{/iff}}
																			{{/iff}}
																			{{#iff pricing.quantity '==' 'lock'}}
																				<span>
																					{{quantity}}
																				</span>
																			{{/iff}}
																		{{/if}}
																	</div>
																</div>
															</div>
															<div class="fastspring_col-sm-2 fastspring_col-xs-12 xs-text-center">
																{{#if selected}}
																	{{#iff totalValue '>' '0'}}
																		<h4 class="clearfix" style="margin-bottom:0;">{{total}}</h4>
																	{{else}}
																		<h4 class="clearfix text-success"> FREE </h4>
																	{{/iff}}
																{{/if}}
																{{#iff selected '!=' true}}
																	<span class="xs-hide">---</span>
																{{/iff}}
															</div>
														</div>
													{{/each}}
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix" style="height: 20px;"></div>
								{{/iff}}
							{{/each}}

						</div>
						<div class="clearfix" style="height: 20px;"></div>
					{{/iff}}
				{{/each}}
			{{/each}}

			{{#each items}}
				{{#each items}}
					{{#iff path '==' 'SystemExtension.shippingcalculation'}}
						<div class="fastspring_row">
							<div class="fastspring_col-xs-6 fastspring_col-sm-8 fastspring_col-md-10 text-right">
								<h4>Shipping:</h4>
							</div>
							<div class="fastspring_col-xs-6 fastspring_col-sm-4 fastspring_col-md-2 text-center">
								<h4>{{this.total}}</h4>
							</div>
						</div>
					{{/iff}}
				{{/each}}
			{{/each}}
			
			<div class="fastspring_row">
				<div class="fastspring_col-xs-6 fastspring_col-sm-8 fastspring_col-md-10 text-right">
					<h3>Total:</h3>
				</div>
				<div class="fastspring_col-xs-6 fastspring_col-sm-4 fastspring_col-md-2 text-center">
					<h3 data-fsc-order-total ></h3>
					{{#each order}}
						{{#if discountTotalValue}}
							<p class="text-success">You save {{discountTotal}}!</p>
						{{/if}}
					{{/each}}
				</div>
			</div>
			<hr class="clearfix">

			<div class="fastspring_col-sm-6"  style="display:inline-block;">
				<?php
				if($options['fastspring_show_coupon'] == 'yes') {
					?>
					<label for="couponcode" style="display:inline-block;"><?php echo $options['fastspring_coupon_label']; ?></label>
					<input type="text" id="couponcode" data-fsc-order-promocode class="fastspring_form-control" placeholder="<?php echo $options['fastspring_coupon_placeholder']; ?>" style="display:inline-block; width:200px;">
					<a href="#" class="<?php echo $options['fastspring_coupon_class']; ?>" onclick="applycoupon();" style="display:inline-block;"><?php echo $options['fastspring_coupon_text']; ?></a>
					<?php
				}
				?>
			</div>
			<div class="fastspring_col-sm-6 col-xs-12 text-right xs-top-bot-margin">
				<a href="#"  data-fsc-selections-smartdisplay class="<?php echo $options['fastspring_coclass']; ?> checkoutbutton" data-fsc-action="Checkout">
					<?php
					if($options['fastspring_coicon'] != 'none') {
						?>
						<i class="fa <?php echo $options['fastspring_coicon']; ?>" aria-hidden="true"></i>
						<?php
					}
					?>
					&nbsp;<?php echo $options['fastspring_cotext']; ?>
				</a>
			</div>

			{{#each groups}}
				{{#iff driverType '==' 'storefront'}}
					{{#each items}}
						{{#iff path '==' 'SystemExtension.eds'}}
							{{#iff selected '==' false}}
								<div class="fastspring_col-md-12">
									<div class="fastspring_container offset">
										<div class="fastspring_row" style="margin:20px 0px 0px 0px; background-color: #f5f5f5; ">
											<div class="fastspring_col-xs-12">
												<h4 class="text-center">Protect Your order</h4>
												<hr class="clearfix" />
												<div class="fastspring_col-md-8 fastspring_col-xs-12 xs-text-center">
													{{#if image}}
														<img src='{{image}}' class="xs-hide" style="max-height: 75px; max-width: 75px; float:left; margin-right: 10px;" />
													{{/if}}
													{{display}}
													{{#if description.summary}}
														<br />
														<a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >(Details)</a>
													{{/if}}
												</div>
												<div class="fastspring_col-md-2 fastspring_col-xs-12 xs-text-center">
													{{>pricing}}
												</div>
												<div class="fastspring_col-md-2 fastspring_col-xs-12 xs-text-center text-right">
													<a href="#" class="<?php echo $options['fastspring_edsclass']; ?>" data-fsc-item-path-value='{{path}}' data-fsc-item-path='{{path}}' data-fsc-action='Add'>
														<?php
														if($options['fastspring_edsicon'] != "none") {
															?>
															<i class="fa <?php echo $options['fastspring_edsicon']; ?>" aria-hidden="true"></i>&nbsp;
															<?php
														}
														?>
														{{#if description.action}} {{{description.action}}} {{else}} <?php echo $options['fastspring_edstext']; ?> {{/if}}
													</a>
													<div class="fastspring_col-xs-12 xs-show"><br /></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							{{/iff}}
						{{/iff}}
					{{/each}}
				{{/iff}}
			{{/each}}
		</div>
	<div class="clearfix" style="height:20px;"></div>
</script>

<script id="pricing-partial" type='text/x-handlebars-template'>
	<span class='pricing'>
		{{#if discountTotalValue}}
			<span class='text-muted'><s>{{price}}</s></span>
		{{/if}}
		{{#iff totalValue '>' '0'}}
			<span class="clearfix">{{unitPrice}}</span>
		{{else}}
			<strong class="clearfix text-success"> Free </strong>
		{{/iff}}
		{{#if subscription}}
			<br />
			<em>
				<span style="font-size:75%;">Renews every
					{{#iff subscription.intervalLength '>=' '2' }}{{subscription.intervalLength}} {{subscription.intervalUnit}}s{{/iff}}
					{{#iff subscription.intervalLength '==' '1' }}{{subscription.intervalUnit}}{{/iff}}.
					<br />Next charge: {{subscription.nextChargeTotal}} on {{subscription.nextChargeDate}}
				</span>
			</em>
		{{/if}}
		{{#if discountTotalValue}}
			<br /><span class='text-success xs-hide sm-hide' style="font-size:75%;">You save {{discountTotal}} ({{discountPercent}})</span>
		{{/if}}
		{{#if discount.data.tiers}}
			<span class='discount-tiers xs-hide sm-hide'>
				<a class="fspopover" data-title="Volume Discounts" data-content="{{#each discount.data.tiers}}<div class='tier'>{{quantity}}+ : {{percent}}{{amount}} off</div>{{/each}}" >Volume Discounts Available</a>
			</span>
		{{/if}}
	</span>
</script>
    
<script id="quantity-partial" type='text/x-handlebars-template'>
	<p class='quantity inline-block' style="margin-bottom:0px">
		{{#iff pricing.quantity '==' 'allow'}}
			{{#iff quantity '>=' '10'}}
				<input type="text" class="fastspring_form-control" data-fsc-item-quantity-value data-fsc-item-path-value="{{path}}" value="{{quantity}}" style="width:75px;">
				<a href="#" data-fsc-action="Update" data-fsc-item-path-value="{{path}}"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 20px;"></i></a>
			{{else}}
				<select data-fsc-item-quantity-value data-fsc-item-quantity data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Update"  class="fastspring-select fastspring_form-control" style="margin-bottom:0px;">
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
					<option value='6'>6</option>
					<option value='7'>7</option>
					<option value='8'>8</option>
					<option value='9'>9</option>
					<option value='10'>10+</option>
				</select>
			{{/iff}}
		{{/iff}}
		{{#iff pricing.quantity '==' 'lock'}}
			<span>{{quantity}}</span>
		{{/iff}}
	</p>
</script>

<div id="fastspring_modal" class="fastspring_modal fastspring_<?php echo strtoupper($options['fastspring_cart_location']); ?>">
	<div class="fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-content" id="fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-content">
		<div class="fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-header" style="background-color: <?php echo $options['fastspring_header_color']; ?>; color: <?php echo $options['fastspring_header_text_color']; ?>">
			<span class="fastspring_closebtn" onclick="<?php echo strtoupper($options['fastspring_cart_location']); ?>_Close();" style="float:right;padding: 15px 0; font-size: 22px;"><i class="fa fa-times" aria-hidden="true"></i></span>
			<h2 style="color: <?php echo $options['fastspring_header_text_color']; ?>"><?php echo $options['fastspring_header']; ?></h2>
		</div>
		<div class="fastspring_<?php echo $options['fastspring_cart_location']; ?>_modal-body">
			<div class="fastspring_alert" style="display:none;">
				<span class="fastspring_closebtn" onclick="jQuery('.fastspring_alert').hide();" style="padding: 0; float: right; font-size: 20px; margin: -15px -5px;"><i class="fa fa-times" aria-hidden="true"></i></span>
				<h2 id="fastspring_error"></h2>
			</div>
			<div data-fsc-selections-smartdisplay data-fsc-items-container="shopping-cart" data-fsc-filter="selected=true">
			</div>
			<div data-fsc-selections-smartdisplay-inverse style="display: none; text-align:center;" class="main-article">
				<h1 style="margin-top: 10px;"><?php echo $options['fastspring_empty_cart']; ?></h1>
				<a href="#" onclick="event.preventDefault(); <?php echo strtoupper($options['fastspring_cart_location']); ?>_Close();">Click here to continue shopping</a>
			</div>
		</div>
	</div>
</div>

<style>
    input.option-input:checked {
        background: <?php echo $options['fastspring_radio_color_checked']; ?> !important;
    }
    input.option-input {
        background: <?php echo $options['fastspring_radio_color']; ?> !important;
    }
</style>

<div class="loading" style="display:none;">Loading&#8230;</div>