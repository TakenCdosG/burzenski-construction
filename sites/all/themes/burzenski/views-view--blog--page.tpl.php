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
?>
<div id="top_image_blog"> 
    <?php
    $nodo_config = node_load(98);
    //die(var_dump($nodo_config));
    print theme_image_style(array('style_name' => 'top_image_events', 'path' => $nodo_config->field_blog_image_top['und'][0]['uri'], 'alt' => $nodo_config->field_blog_image_top['und'][0]['alt'], 'title' => $nodo_config->field_blog_image_top['und'][0]['title']));
    ?>
</div>
<div class="<?php print $classes; ?>">
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

</div>
<div id="righ_blog">
    <div id="list_months"  class="list">
        <?php
        global $base_path;
        $result = db_query('SELECT n.nid, n.created FROM {node} n WHERE type = :type ORDER BY n.created ASC', array(':type' => 'blog'));
        foreach ($result as $record) {

            $nodob = node_load($record->nid);
            $dates[] = date("Y-m", strtotime($nodob->field_post_date['und'][0]['value']));
        }

        $dates = array_unique($dates);

        print "<div class='view-header'><p>Archives</p></div><ul class='list_months'>";
        foreach ($dates as $key => $value) {
            if ($key <= 5) {
                print "<li><a target='_blank' href='".$base_path."blog/" . $dates[$key] . "'>" . date('F, Y', strtotime($dates[$key])) . "</a></li>";
            }
        }
        print "</ul>";
        ?>
    </div>

    <div id="list_categories" class="list">
        <div class='view-header'><p>Categories</p></div>
        <ul class="list_categories">
            <?php
            $categories = taxonomy_get_tree(8, $parent = 0);
            foreach ($categories as $key => $value) {
                $nodes_term = taxonomy_select_nodes($categories[$key]->tid);
                if (!empty($nodes_term)) {
                    print "<li><a target='_blank' href='/blog/all/" . $categories[$key]->tid . "'>" . $categories[$key]->name . "</a></li>";
                }
            }
            ?>
        </ul></div>

    <?php
    print views_embed_view('blog', 'block_1');
    ?>

</div>

