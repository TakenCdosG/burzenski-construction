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

 $expl1=explode('<div class="field-content">',$fields['field_upload_article']->content);
 $expl2=explode('</div>',$expl1[1]);  
 
 $expl_field_link_to_article=explode('<div class="field-content">',$fields['field_link_to_article']->content);
 $expl2_expl_field_link_to_article=explode('</div>',$expl_field_link_to_article[1]);  
  
 $title ="";
 
 $field_upload_article=$expl2[0];
 $field_link_to_article=$expl2_expl_field_link_to_article[0];
 
	 if($field_upload_article!=''){
	    $title = '<a href="'.$field_upload_article.'"  target="_blank" >'.$fields['title']->raw.'</a>';
	 }else{
	     if($field_link_to_article!=''){
			$title = '<a href="http://'.$field_link_to_article.'"  target="_blank" >'.$fields['title']->raw.'</a>';
		 }else $title = $fields['title']->content;
	 }
	 
?>

<?php  print $fields['field_date_news']->content; ?> 
<div class="title_news_listing"><?php print  $title; ?></div>
<?php  print $fields['body']->content; ?>
 