<?php
/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
global $language;
?>
<div id="top_image_events"> 
    <?php
    $nodo_c = node_load(98);
    print theme_image_style(array('style_name' => 'top_image_events', 'path' => $nodo_c->field_list_event_image_top['und'][0]['uri'], 'alt' => $nodo_c->field_list_event_image_top['und'][0]['alt'], 'title' => $nodo_c->field_list_event_image_top['und'][0]['title']));
    ?>
</div>
<div class="<?php print $classes; ?>">

    <div id="content_events">
        <div class="custom_header">
            <div id="breadcrumb" class="thisis"><?php print theme('breadcrumb', array('breadcrumb' => drupal_get_breadcrumb())); ?></div>


            <div class="title">EVENTS</div>
            <!-- <div class="menu_list_calendar"><a href ="/calendar-events">Calendar View</a> | <a href="/list-events"  class="active">List View</a></div> -->  

        </div>
        <div id="events_top">
            <div id="events_bottom">
                <div id="events_middle">
                    <?php print render($title_prefix); ?>
                    <?php if ($title): ?>
                        <?php print $title; ?>
                    <?php endif; ?>
                    <?php print render($title_suffix); ?>
                    <?php if ($header): ?>
                        <div class="view-header">
                            <?php print $header; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($exposed): ?>
                        <div class="view-filters">
                            <?php print $exposed; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($attachment_before): ?>
                        <div class="attachment attachment-before">
                            <?php print $attachment_before; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($rows): ?>
                        <div class="view-content">
                            <?php print $rows; ?>
                        </div>
                    <?php elseif ($empty): ?>
                        <div class="view-empty">
                            <?php print $empty; ?>
                        </div>
                    <?php endif; ?>


                </div>
            </div>
        </div>
        <?php if ($pager): ?>
            <?php print $pager; ?>
        <?php endif; ?>

        <?php if ($attachment_after): ?>
            <div class="attachment attachment-after">
                <?php print $attachment_after; ?>
            </div>
        <?php endif; ?>

        <?php if ($more): ?>
            <?php print $more; ?>
        <?php endif; ?>

        <?php if ($footer): ?>
            <div class="view-footer">
                <?php print $footer; ?>
            </div>
        <?php endif; ?>

        <?php if ($feed_icon): ?>
            <div class="feed-icon">
                <?php print $feed_icon; ?>
            </div>
        <?php endif; ?>

    </div></div><?php /* class view */ ?>