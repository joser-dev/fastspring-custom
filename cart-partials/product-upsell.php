{{#iff type '==' 'replace'}}
  {{#iff selectableReplacements '==' true}}
    <div class="fastspring-product-upsell">
      <div class="fastspring_container offset">
            <h4>
              {{display}}
            </h4>

            {{#each items}}
              {{#iff selected '==' false}}
                <div class="upsell-product-name-container fastspring_col-md-5 fastspring_col-sm-6 fastspring_col-xs-12 xs-text-center">
                  <span class="item-name">{{display}}</span>
                  {{#if description.summary}}
                    <a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >
                      <i class="fa fa-info-circle"></i>
                    </a>
                  {{/if}}
                </div>
                <div class="fastspring_col-md-4 fastspring_col-sm-3 fastspring_col-xs-12 xs-text-center">
                  {{>pricing}}
                </div>
                <div class="fastspring_col-md-3 fastspring_col-sm-3 fastspring_col-xs-12 xs-text-center text-right cta-container">
                  <a href="#" 
                     class="<?php echo $options['fastspring_usclass']; ?>"
                     data-fsc-item-path-value='{{path}}'
                     data-fsc-item-path='{{path}}'
                     data-fsc-action='Add'
                     onclick='dataLayer.push({
                                "event" : "FSWC-CartEvent",
                                "fsc-eventCategory" : "Cart",
                                "fsc-eventAction"   : "Upsell Selected",
                                "fsc-eventLabel"    : "{{path}}",
                                ecommerce: {
                                  add: {
                                    actionField: {
                                      list: "Cart Up-sell"
                                    },
                                    products: [{
                                      id:   "{{path}}",
                                      name: "{{display}}"
                                    }]
                                  }
                                }
                              });'>
                    Add to Cart
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

  {{/iff}}
{{/iff}}
