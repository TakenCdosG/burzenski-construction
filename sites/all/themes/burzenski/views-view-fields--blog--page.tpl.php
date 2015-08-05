<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php


$nodo = node_load($fields['nid']->raw);

unset($fields['nid']);
foreach ($nodo->field_term_blog['und'] as $key => $value) {
    $term[] = taxonomy_term_load($nodo->field_term_blog['und'][$key]['tid']);
}

?>
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>
  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>
<div class="views-field views-field-term">
    <span class="field-content">
        Posted in 
        <?php
        foreach($term as $key => $value){
        print "<a href='/blog/all/".$term[$key]->tid."'>";
            print $term[$key]->name.", ";
        print "</a>";
        }
        ?>
        
    </span>
     |
    <span class="leave_comment"><a href="<?php print url("node/".$nodo->nid); ?>" >Leave a Comment</a></span>
</div>

<div class="fb-like" data-href="http://burzenskivet.tcgbeta.com<?php print url("node/".$nodo->nid); ?>" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="true" data-send="true"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_En/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="addthis_toolbox addthis_default_style "> 

  <a class="addthis_button_facebook"
        addthis:url="http://burzenskivet.tcgbeta.com<?php print url("node/".$nodo->nid); ?>"
        addthis:title="<?php print $nodo->title; ?>"
        addthis:description="<?php print substr(strip_tags($nodo->body['und'][0]['value']),0,140); ?>"></a>
  <a class="addthis_button_preferred_1"
        addthis:url="http://burzenskivet.tcgbeta.com<?php print url("node/".$nodo->nid); ?>"
        addthis:title="<?php print $nodo->title; ?>"
        addthis:description="<?php print substr(strip_tags($nodo->body['und'][0]['value']),0,140); ?>"></a>
  <a class="addthis_button_preferred_2"
        addthis:url="http://burzenskivet.tcgbeta.com<?php print url("node/".$nodo->nid); ?>"
        addthis:title="<?php print $nodo->title; ?>"
        addthis:description="<?php print substr(strip_tags($nodo->body['und'][0]['value']),0,140); ?>"></a>
  <a class="addthis_button_preferred_3"
        addthis:url="http://burzenskivet.tcgbeta.com<?php print url("node/".$nodo->nid); ?>"
        addthis:title="<?php print $nodo->title; ?>"
        addthis:description="<?php print substr(strip_tags($nodo->body['und'][0]['value']),0,140); ?>"></a>
 <a  class="addthis_button_compact"
        addthis:url="http://burzenskivet.tcgbeta.com<?php print url("node/".$nodo->nid); ?>"
        addthis:title="<?php print $nodo->title; ?>"
        addthis:description="<?php print substr(strip_tags($nodo->body['und'][0]['value']),0,140); ?>"></a> 

</div> 


<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-527030801612f1b6">
</script>
<!-- AddThis Button END -->