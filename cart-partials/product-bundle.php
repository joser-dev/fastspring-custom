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
