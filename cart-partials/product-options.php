{{#iff type '==' 'options'}}
<div class="fs-product-options">
    <div class="fastspring_container offset">

          <h4>
            {{display}}
          </h4>

          {{#each items}}
            <hr class="clearfix">
            <div class="fastspring_col-xs-1">
              <input class="option-input radio" 
                     type="radio" 
                     {{#if selected}} checked {{/if}} 
                     name="{{display}}" 
                     id="{{path}}" 
                     data-fsc-action="Add" 
                     data-fsc-item-path-value="{{path}}">
            </div>
            <div class="fastspring_col-sm-7 xs-hide">
              {{this.display}}
              {{#if description.summary}}
                <a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >
                  <i class="fa fa-info-circle"></i>
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
                <a class="fspopover" data-title="{{this.display}}" data-content="{{{description.summary}}}" >
                  <i class="fa fa-info-circle"></i>
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
{{/iff}}
