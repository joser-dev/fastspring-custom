{{#iff type '==' 'config-many'}}
                  <div class="fastspring_col-md-11 fastspring_offset-sm-1 wre-fastspring-product-config-many">
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
