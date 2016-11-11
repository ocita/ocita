jQuery( document ).ready(function() {
    
    jQuery("div.menu-block-wrapper ul" ).removeClass( "dropdown-menu" );

    var filter = jQuery('.view-header .block-facetapi');
    var sorts = jQuery('.view-header .block-search-api-sorts');
    sorts.remove();
    filter.remove();
    var searchblock2 = jQuery('.view-nyhed .view-filters');
    searchblock2.append(filter);
    var searchblock1 = jQuery('.view-nyhed .view-filters');
    searchblock1.append(sorts);
    jQuery("#edit-field-ticket-status-und").change(function() {
      jQuery('[id ^=editablefields-form-node][id $=field-ticket-status]').submit();
    });
    jQuery("#edit-field-prioritet-und").change(function() {
      jQuery('[id ^=editablefields-form-node][id $=field-prioritet]').submit();
    });
    jQuery("#edit-field-supporter-und").change(function() {
      jQuery('[id ^=editablefields-form-node][id $=field-supporter]').submit();
    });
});
