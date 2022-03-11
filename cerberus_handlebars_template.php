<div id="shopping-cart" class="shopping-cart">
    <div class="fastspring_container">
      {{#each items}}
        {{#each items}}
          {{#iff path '!=' 'SystemExtension.shippingcalculation'}}
            <div>
              <div class="fastspring_row cartitemrows">
                <div class="fastspring_col-xs-12 fastspring_col-md-5 xs-text-center">
                  <h3>{{{this.display}}}</h3>
                  {{#if description.summary}}
                    <a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >
                      <i class="fa fa-info-circle"></i>
                    </a>
                  {{/if}}
                  <br class="xs-show" />
                </div>
                <div class="fastspring_col-xs-12 fastspring_col-md-4">
                  <div class="form-inline xs-text-center sm-text-center">
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
                              <a onclick="jQuery('.loading').show();" class="fs-update-quantity" href="#" data-fsc-action="Update" data-fsc-item-path-value="{{path}}">
                                Update
                              </a>
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

                            <div class="fs-nextcharge fs-info-pill">
                              Optional renewal: {{subscription.nextChargeTotal}} on {{subscription.nextChargeDate}}
                            </div>

                          {{/if}}

                          {{#if discountTotalValue}}
                            <div class="fs-info-pill">
                              You save {{discountTotal}} ({{discountPercent}})
                            </div>
                          {{/if}}
                          {{#if discount.data.tiers}}
                            <div class="discount-tiers xs-hide sm-hide fs-info-pill">
                              <a class="fspopover" 
                                 data-title="Volume Discounts"
                                 data-content="{{#each discount.data.tiers}}{{#iff quantity '>' '0'}}<div class='tier'>{{quantity}}+ : {{percent}}{{amount}} off</div>{{/iff}}{{/each}}" >
                                Volume Discounts Available
                              </a>
                            </div>
                          {{/if}}
                        {{/if}}
                      </div>
                    </div>
                  </div>
                  <div class="fastspring_col-xs-12 fastspring_col-md-3 fs-cart-item-price">
                  <h3 style="margin:0px;">
                    {{#iff this.totalValue '>' '0'}}
                      {{this.total}}
                    {{else}}
                      FREE
                    {{/iff}}
                    {{#if removable}}
                      <br />
                      <a data-fsc-action="Remove"
                         data-fsc-item-path-value="{{path}}"
                         class="removecart sm-hide xs-hide"
                         onclick='dataLayer.push({
                              event : "FSWC-CartEvent",
                              "fsc-eventCategory" :  "Cart",
                              "fsc-eventAction"   : "Product Removed",
                              "fsc-eventLabel" : "{{path}}",
                              ecommerce: {
                                  remove: {
                                    products: [{
                                      id: "{{path}}",
                                      name: "{{{this.display}}}"
                                    }]
                                  }
                            }
                          });'>
                           <span class="fastspring_closebtn"><i class="fa <?php echo $options['fastspring_delete_icon']; ?>" aria-hidden="true"></i></span> Remove
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
              
              
{{#each groups}}
                                
  <?php include("cart-partials/product-options.php");?>
  <?php include("cart-partials/product-upsell.php");?>
  <?php include("cart-partials/product-bundle.php");?>
  <?php include("cart-partials/product-config-one.php");?>
  <?php include("cart-partials/product-config-many.php");?>
  <?php include("cart-partials/product-addon-one.php");?>
                
{{/each}}

<?php include("cart-partials/product-cross-sells.php");?>

            </div>
            <div class="clearfix"></div>
          {{/iff}}
        {{/each}}
      {{/each}} <?php // end each loop from line 3 ?>

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

      <?php // WRE begin coupon code section ?>
      <?php if($options['fastspring_show_coupon'] == 'yes') {  ?>
        <div class="fs-coupon-code-container">
          <label for="couponcode">
            <?php echo $options['fastspring_coupon_label']; ?>
          </label>
          <input type="text" 
                 id="couponcode" 
                 data-fsc-order-promocode class="fastspring_form-control" 
                 placeholder="<?php echo $options['fastspring_coupon_placeholder']; ?>">
          <a href="#" class="<?php echo $options['fastspring_coupon_class']; ?>" onclick="applycoupon();">
            <?php echo $options['fastspring_coupon_text']; ?>
          </a>
        </div>
      <?php } ?>
      </div>
      <?php // WRE end coupon code section ?>

      
      <?php // Begin total and checkout button ?>
      <div class="fs-total-and-checkout">
        <h3>
          Total:
          <span data-fsc-order-total ></span>
        </h3>

        {{#each order}}
          {{#if discountTotalValue}}
            <p class="text-success">You save {{discountTotal}}!</p>
          {{/if}}
        {{/each}}

        <a href="#"
           data-fsc-selections-smartdisplay
           class="<?php echo $options['fastspring_coclass']; ?> checkoutbutton"
           data-fsc-action="Checkout"
           onclick='dataLayer.push({ "event" : "FSWC-CartEvent", "fsc-eventCategory" :  "Cart", "fsc-eventAction" : "Button Click", "fsc-eventLabel" : "Checkout" });'>

              <?php if($options['fastspring_coicon'] != 'none') : ?>
                <i class="fa <?php echo $options['fastspring_coicon']; ?>" aria-hidden="true"></i>&nbsp;
              <?php endif; ?>
              <?php echo $options['fastspring_cotext']; ?>

        </a>
      </div><?php // end .fs-total-and-checkout ?>

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
      <div class="fs-info-pill">
        Optional renewal: {{subscription.nextChargeTotal}} on {{subscription.nextChargeDate}}
      </div>
    {{/if}}

    {{#if discountTotalValue}}
      <div class="fs-info-pill">
        <span class='text-success xs-hide sm-hide'>
          You save {{discountTotal}} ({{discountPercent}})
        </span>
      </div>
    {{/if}}

    {{#if discount.data.tiers}}
      <div class="fs-info-pill xs-hide sm-hide">
        <a class="fspopover" data-title="Volume Discounts" data-content="{{#each discount.data.tiers}}<div class='tier'>{{quantity}}+ : {{percent}}{{amount}} off</div>{{/each}}" >Volume Discounts Available</a>
      </div>
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
