<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 */
?>
<div id="header-wrapper" class="<?php print $header_wrapper_height; ?>">
    <div id="header">
        <?php include("header.inc"); ?>
    </div>
</div>

<div id="page-wrapper" class="<?php print $header_wrapper_height; ?>">

    <?php if (isset($top_slideshow)): ?>
        <?php print $top_slideshow; ?>
    <?php endif; ?>

    <?php print $messages; ?>

    <?php
    if ($template_home != "") {

        include($template_home);
    } else {
        ?>


        <div id="page-wrapper-home" class="internal">

            <div id="main-wrapper" class="internal">

                <?php print render($page['help']); ?>
                <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?> 

                <script type="text/javascript">
                    function menu_dropdown() {



                        if ($(".content > .menu .menu").size()) {
                                      
                                      
                                      
                            $("#container_primary_link_search .content > .menu .menu").wrap("<div class='dropdown-wrapper'>");
                            $("#container_primary_link_search .content > .menu .dropdown-wrapper").prepend('<div class="drop-arrow"></div>');
                                        
                            $("#container_primary_link_search .content > .menu > li").on("mouseover", function() {
                                $back = $(this).css("background");
                                    	  
                                    	  
                                $(this).css("background","#e7e2d8");
                                $(this).find("a").css("color","#990033");
                                    	
                                    	  
                                var dropdown = $(this).find(".dropdown-wrapper");
                                var dropdown_meni = $(this).find(".dropdown-wrapper ul.menu");
                                dropdown.show();
                                dropdown_meni.show();
                                $(this).find(".dropdown-wrapper .dropdown-wrapper").hide();
                            });
                            $("#container_primary_link_search .content > .menu > li").on("mouseout", function() {
                                    	 
                                    		
                                $(this).css("background","none");
                                $(this).find("a").css("color","#ffffff");
                                $('#container_primary_link_search .content > .menu > li.active-trail').css("background","#e7e2d8");
                                $('#container_primary_link_search .content > .menu > li.active-trail a').css("color","#990033");
                                    		
                                /*$(this).css("background",$back);
          $(this).find("a").css("color","#ffffff");*/
                                var dropdown = $(this).find(".dropdown-wrapper");
                                var dropdown_meni = $(this).find(".dropdown-wrapper ul.menu");
                                dropdown.hide();
                                dropdown_meni.hide();
                            });
                            contact_us();
                        }

                                      
                                      
                    }
                    menu_dropdown();
                </script>

                <?php if (isset($top_image)): ?>
                    <div id="top_image"> 	
                        <img src="<?php print $top_image; ?>" class="bg-img-internal" />
                    </div>		
                <?php endif; ?>		


                <div id="home-tabs"  class='<?php print $header_wrapper_height; ?>'>


                    <?php
                    // Fetch the menu tree for the current page.
                    $tree = menu_tree_page_data('main-menu');
                    $level = 0;
                    // Go down the active trail as far as possible.
                    while ($tree) {
                        // Loop through the current level's items until we find one that is in trail.
                        while ($item = array_shift($tree)) {
                            if ($item['link']['in_active_trail']) {
                                // If the item is in the active trail, we count a new level.
                                $level++;
                                if (!empty($item['below'])) {
                                    // If more items are available, we continue down the tree.
                                    $tree = $item['below'];
                                    break;
                                }
                                // If we are at the end of the tree, our work here is done.
                                break 2;
                            }
                        }
                    }
                    ?>

                    <?php
                    $left = get_3_level_menu($breadcrumb);
                    $left_resource = get_3_level_tool_resources($breadcrumb);
                    if ($left != "" || $left_resource != "<ul></ul>" && $node->nid != 102 && $node->nid != 135 && $node->nid != 102 && $node->nid != 102) {
                        ?>
                        <div id="home-tabs-left" class="internal">  
                            <div id="menu-left-internal">
                                <?php
                                // If level is equal to 3, get and print the parent's name
                                if ($level == 3) {
                                    $menuParent = menu_get_active_trail();
                                    //get rid of the last item in the array as it is the current page
                                    $menuParentPop = array_pop($menuParent);
                                    //Just grab the last item in the array now
                                    $menuParent = end($menuParent);
                                    //if it is not the home page and it is not an empty array
                                    if (!empty($menuParent) && $menuParent['link_path'] != '') {
                                        print '<ul><li class="third-level-parent">' . l($menuParent['title'], $menuParent['link_path']) . '</li></ul>';
                                    }
                                }
                                ?>
                                <?php
                                print $left;
                                print $left_resource;
                                ?>									
                            </div>
                        </div>	
                    <?php } else { ?>
                        <?php
                        // If level is equal to 3, get and print the parent's name
                        if ($level == 3) {

                            print '<div id="home-tabs-left" class="internal"><div id="menu-left-internal">';
                            $menuParent = menu_get_active_trail();
                            //get rid of the last item in the array as it is the current page
                            $menuParentPop = array_pop($menuParent);
                            //Just grab the last item in the array now
                            $menuParent = end($menuParent);
                            //if it is not the home page and it is not an empty array
                            if (!empty($menuParent) && $menuParent['link_path'] != '') {
                                print '<ul><li class="third-level-parent">' . l($menuParent['title'], $menuParent['link_path']) . '</li></ul>';
                            }

                            $menuItem = menu_link_get_preferred('node/' . $node->nid);

                            print '<ul><li class="active">' . l($menuItem['link_title'], $menuItem['link_path']) . '</li></ul>';
                            print '</div></div>';
                        }
                        ?>
                    <?php } ?>
                    <?php /* if(!empty($page["menu_left_level"])){ ?>
                      <div id="home-tabs-left" class="internal">
                      <div id="menu-left-internal">
                      <?php print render($page["menu_left_level"]);  ?>
                      </div>
                      </div>
                      <?php } */ ?>
                    <div id="home-center">
                        <div id="breadcrumb"><?php print $breadcrumb; ?></div>
                        <div id="overlap">
                            <div id="home-tabs-right" class="internal">
                                <?php print render($page["sidebar_right"]); ?>

                                <?php
                                if (is_array($page["sidebar_calendar"]) && count($page["sidebar_calendar"]) > 0) {
                                    print render($page["sidebar_calendar"]);
                                }
                                ?>



                            </div>	

                        </div>

                        <?php print render($page["content"]); ?>


                    </div>



                </div>




            </div>
        </div>
    <?php } ?>



</div>

<div id="footer">
    <?php include("footer.inc"); ?>
</div>
