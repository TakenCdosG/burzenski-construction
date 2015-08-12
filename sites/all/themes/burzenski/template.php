<?php
/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function burzenski_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $breadcrumb[] = l(drupal_get_title(), $_GET["q"]);
  if (!empty($breadcrumb)) {
    $output = '<ul>';
    $first = true;
    foreach ($breadcrumb as $key => $value) {
      if ($first) {
        $output .= '<li>' . $value . '</li>';
        $first = false;
      } else {
        $pos = strpos($value, ">");
        $innerText = substr($value, $pos + 1, (strlen($value) - $pos - 5));
        if (strlen($innerText) > 45) {
          $newValue = substr($innerText, 0, 42) . "...";
          $value = str_replace($innerText, $newValue, $value);
        }
        $output .= '<li>&gt;</li><li>' . decode_entities($value) . '</li>';
      }
    }
    $output .= '</ul>';
    return $output;
  }
}
 
/**
 * Override or insert variables into the page template.
 */
function burzenski_preprocess_page(&$vars){
  $global_config = node_load(98);
  $node = current_node();
  $vars['global_config'] = $global_config;
  $vars['template_home'] = '';
  $vars['header_wrapper_height'] = 'internal';
  
	switch($node->type){
		case 'homepage':
			$vars['template_home'] = "home.inc";
			$vars['shadow_logo'] = '<div id="shadow_logo"></div>';
			$vars['header_wrapper_height'] = 'home';
      $output = "";
		break;
		case 'page':
		case 'tax_tip':
	   $vars['header_wrapper_height'] = 'internal';
	   $output = "";
	   $vars["page"]["sidebar_left"] = array("#markup" => $output);
		break;
		case 'contact_us':
			$vars['header_wrapper_height'] = 'internal';
			$output = "";
		break;
  }
 
  /**
   * Top image on some pages
   */
  if (property_exists($node, "field_top_image")) {
    if (count($node->field_top_image)) {
      $vars['top_image'] = file_create_url($node->field_top_image['und'][0]['uri']);
    }
  }
  
  if (property_exists($node, "field_widget_rotate")) {
    if (count($node->field_widget_rotate )) {
      if (count($node->field_widget_rotate ['und']) > 1) {
        $bg = rand(0, count($node->field_widget_rotate ['und']) - 1);
        $vars['field_widget_rotate'] = get_text_widget_rotate($node->field_widget_rotate['und'][$bg]['nid']);
      } 
      else {
        $vars['field_widget_rotate'] = get_text_widget_rotate($node->field_widget_rotate['und'][0]['nid']);
      }
	 
    }
  }
 
  
  
}


function get_text_widget_rotate($nid){
	$node_rotate=node_load($nid);
	return $node_rotate->body['und'][0]['value'];
}

function create_slideshow($n) {
  $output = "";
  $output .= "<div id='top-slideshow'><div class='slides_container'>";
  for ($c = 0; $c < count($n->field_top_slideshow['und']); $c++) {
    $output .= "<div class='slide'>";
    $field_id = $n->field_top_slideshow['und'][$c]['value'];
    $collection = field_collection_item_load($field_id);
    if (count($collection->field_slide_image)) {
      $output .= "<img src='" . file_create_url($collection->field_slide_image['und'][0]['uri']) . "' />";
    }
    $output .= "</div>";
  }
  $output .= "</div>";
  $output .= "<a href='#' class='prev'><img src='" . base_path() . path_to_theme() . "/img/arrow_prev.png' width='17' height='55' alt='Arrow Prev'></a>";
  $output .= "<a href='#' class='next'><img src='" . base_path() . path_to_theme() . "/img/arrow_next.png' width='17' height='55' alt='Arrow Next'></a>";
  $output .= "</div>";
  return $output;
}