{{#each ../../../groups}}
  {{#iff type '==' 'add'}}
    {{#iff driver '==' ../../../path}}
      {{#iff selectableAdditions '==' true}}
        {{#iff driverType '==' 'product'}}
            <div class="fs-product-cross-sells">
              <div class="fastspring_container offset">

                <h4>
                  {{display}}
                </h4>

                {{#each items}}
                  {{#iff selected '==' false}}
                    <div class="fastspring_col-md-5 fastspring_col-sm-12 xs-text-center">
                      {{display}}

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
                         class="<?php echo $options['fastspring_xsclass']; ?>"
                         data-fsc-item-path-value='{{path}}'
                         data-fsc-item-path='{{path}}' 
                         data-fsc-action='Add'
                         onclick='dataLayer.push({
                                    "event" : "FSWC-CartEvent",
                                    "fsc-eventCategory" : "Cart",
                                    "fsc-eventAction"   : "Cross-sell Selected",
                                    "fsc-eventLabel"    : "{{path}}",
                                    ecommerce: {
                                      add: {
                                        actionField: {
                                          list: "Cart Cross-sell"
                                        },
                                        products: [{
                                          id:   "{{path}}",
                                          name: "{{display}}"
                                        }]
                                      }
                                    }
                                  });'>
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

                    </div>
                  {{/iff}}
                {{/each}} <?php // end each items ?>

              </div>
            </div>
        {{/iff}}
      {{/iff}}
    {{/iff}}
  {{/iff}}
{{/each}}
