<?php
/**
 * @file
 * Template file for the example display.
 *
 * Variables available:
 * 
 * $plugin: The pager plugin object. This contains the view.
 *
 * $plugin->view
 *   The view object for this navigation.
 *
 * $nav_title
 *   The formatted title for this view. In the case of block
 *   views, it will be a link to the full view, otherwise it will
 *   be the formatted name of the year, month, day, or week.
 *
 * $prev_url
 * $next_url
 *   Urls for the previous and next calendar pages. The links are
 *   composed in the template to make it easier to change the text,
 *   add images, etc.
 *
 * $prev_options
 * $next_options
 *   Query strings and other options for the links that need to
 *   be used in the l() function, including rel=nofollow.
 */
global $language;
?>

    <?php if (!empty($pager_prefix)) print $pager_prefix; ?>
    <div class="date-nav-wrapper clearfix<?php if (!empty($extra_classes)) print $extra_classes; ?>">
    <div class="date-nav item-list">
        
        <div class="pager">
            
        <?php if (!empty($prev_url)) : ?>
        <div class="date_prev_custom">
            <?php 
print l( ($mini ? '' : ' ' . t('< Previous Month', array(), array('context' => 'date_nav'))), $prev_url, $prev_options);
          ?>
        &nbsp;</div>
        <?php endif; ?>
        
        <div class="date_heading_custom">
        <h3><?php                                        
                                $fecha = strtotime($nav_title);
                               if($language->language == 'es'){
                    print FechaFormateada2($fecha); 
                    }else{
                        print date("F, Y",$fecha);
                    }
        ?></h3>
        </div>
            
        <?php if (!empty($next_url)) : ?>
        <div class="date_next_custom">&nbsp;
            <?php              
print l(($mini ? '' : t('Next Month >', array(), array('context' => 'date_nav')) . ' ') , $next_url, $next_options);
            ?>
        </div>
        <?php endif; ?>
            
        </div>
    </div>
    </div>
