<div id="page-wrapper-home">

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
                    
                    var dropdown = $(this).find(".dropdown-wrapper");
                    var dropdown_meni = $(this).find(".dropdown-wrapper ul.menu");
                    dropdown.hide();
                    dropdown_meni.hide();
              
                });
                contact_us();
            }

            if($("#container_menu_home").size()){
                //$("#container_primary_link_search.home #block-system-main-menu ul.menu li.first").hide();
                $("#container_primary_link_search.home #block-system-main-menu ul.menu li .dropdown-wrapper ul.menu li.first").show();
            } 
        }
        menu_dropdown();

        function cicle_home() {
            jQuery("#img_header_home").cycle({ 
                fx:    'fade', 
                sync:  false, 
                delay: 5000 
            });
        }
        cicle_home();
        
    </script>    

    <?php $global_node_config = node_load(98); ?>
    <?php //die(var_dump($global)); ?>

    <table style="margin-top: 2px">
        <tr>
            <td>
                <div class="c_imgfirst">
                    <div class="c2_imgfirst">
                        <div class="text_first">
                            <?php print $global_node_config->field_home_first_content_text_ov['und'][0]['value']; ?>
                        </div> 
                    </div> 
                </div>
                <?php $type = "home_first_content"; ?>
                <?php $nodes_home_first_content = node_load_multiple(array(), array('type' => $type, 'status' => 1)); ?>
                <div id="slidingHomeFirstContent">
                    <?php foreach ($nodes_home_first_content as $first_content): ?>
                        <?php $images = $first_content->field_home_first_image['und']; ?>
                        <?php //die(var_dump($images)); ?>
                        <?php if (count($images) > 1): ?>
                            <?php foreach ($images as $key => $img): ?>
                                <div>
                                    <?php print theme_image_style(array('style_name' => 'image_home_first_content', 'path' => $img['uri'], 'alt' => $img['alt'], 'title' => $img['title'], 'height' => NULL, 'width' => NULL)); ?>     
                                </div>                      
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div>
                                <?php print theme_image_style(array('style_name' => 'image_home_first_content', 'path' => $images[0]['uri'], 'alt' => $images[0]['alt'], 'title' => $images[0]['title'], 'height' => NULL, 'width' => NULL)); ?>   
                            </div>                   
                        <?php endif; ?> 
                    <?php endforeach; ?>
                </div>
            </td>  
            <td>
                <div class="image_one">
                    <?php $type = "home_second_content"; ?>
                    <?php $nodes_home_second_content = node_load_multiple(array(), array('type' => $type, 'status' => 1)); ?>
                    <div id="slidingHomeSecondContent">
                        <?php foreach ($nodes_home_second_content as $second_content): ?>
                            <?php $image = $second_content->field_home_second_image; ?>
                            <?php $video = $second_content->field_home_second_video; ?>
                            <?php if (!empty($image) || !empty($video)): ?> 
                                <?php if (!empty($video)): ?>
                                    <?php $vid = $video['und'][0]['video_id']; ?>
                                    <div class=''>
                                        <iframe width='275' height='188' src='https://www.youtube.com/embed/<?php print $vid; ?>' frameborder='0' allowfullscreen></iframe>
                                    </div>                          
                                <?php else: ?> 
                                    <?php if (!empty($image)): ?>
                                        <div class=''>
                                            <?php print theme_image_style(array('style_name' => 'small_image_home', 'path' => $image['und'][0]['uri'], 'alt' => $image['und'][0]['alt'], 'title' => $image['und'][0]['title'], 'height' => NULL, 'width' => NULL)); ?>   
                                        </div>
                                    <?php endif; ?> 
                                <?php endif; ?> 
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="image_two">
                    <?php $type = "home_third_content"; ?>
                    <?php $nodes_home_first_content = node_load_multiple(array(), array('type' => $type, 'status' => 1)); ?>
                    <div id="slidingHomeThirdContent">
                        <?php foreach ($nodes_home_first_content as $first_content): ?>
                            <?php $images = $first_content->field_home_third_image['und']; ?>
                            <?php if (count($images) > 1): ?>
                                <?php foreach ($images as $key => $img): ?>
                                    <div>
                                        <?php print theme_image_style(array('style_name' => 'small_image_home', 'path' => $img['uri'], 'alt' => $img['alt'], 'title' => $img['title'], 'height' => NULL, 'width' => NULL)); ?>     
                                    </div>                      
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div>
                                    <?php print theme_image_style(array('style_name' => 'small_image_home', 'path' => $images[0]['uri'], 'alt' => $images[0]['alt'], 'title' => $images[0]['title'], 'height' => NULL, 'width' => NULL)); ?>   
                                </div>                   
                            <?php endif; ?> 
                        <?php endforeach; ?>
                    </div>
                </div>
            </td>
            <td>

            </td>
        </tr>
        <tr>
            <td>
                <div id="home-tabs-left-table-1">
                    <?php print render($page["sidebar_calendar"]); ?>
                </div>
                <div id="home-tabs-right">
                    <div class="c_imgsecond">
                        <div class="c2_imgsecond">
                            <div class="text_first">
                                <?php print $global_node_config->field_home_quarter_content_quote['und'][0]['value']; ?>
                            </div> 
                        </div> 
                    </div>
                    <?php $type = "home_quarter_content"; ?>
                    <?php $nodes_home_quarter_content = node_load_multiple(array(), array('type' => $type, 'status' => 1)); ?>
                    <div id="slidingHomeQuarterContent">
                        <?php foreach ($nodes_home_quarter_content as $first_content): ?>
                            <?php $images = $first_content->field_home_quarter_image['und']; ?>
                            <?php if (count($images) > 1): ?>
                                <?php foreach ($images as $key => $img): ?>
                                    <div>
                                        <?php print theme_image_style(array('style_name' => 'image_home_quarter_content', 'path' => $img['uri'], 'alt' => $img['alt'], 'title' => $img['title'], 'height' => NULL, 'width' => NULL)); ?>     
                                    </div>                      
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div>
                                    <?php print theme_image_style(array('style_name' => 'image_home_quarter_content', 'path' => $images[0]['uri'], 'alt' => $images[0]['alt'], 'title' => $images[0]['title'], 'height' => NULL, 'width' => NULL)); ?>   
                                </div>                   
                            <?php endif; ?> 
                        <?php endforeach; ?>
                    </div>
                </div>
            </td>
            <td>
                <?php
                $nodos5 = node_load(416);
                $fifth_image = file_create_url($nodos5->field_image['und'][0]['uri']);
                if (!empty($nodos5->field_link_homeimage)) {
                    print "<a href='" . $nodos5->field_link_homeimage['und'][0]['value'] . "'>";
                }
                ?>
                <div class="c_imgfirst_medium" style="background-image:url(<?php print $fifth_image; ?>)">
                    <div class="text_first_medium" >
                        <?php print $nodos5->field_text_overlay['und'][0]['value']; ?>
                    </div> 
                </div> 
                <div id="img_print">
                    <img src="<?php print $base_path . $directory . "/img/img_4.fw.png" ?>">
                </div>

                </div>
                <?php
                if (!empty($nodos5->field_link_homeimage)) {
                    print "</a>";
                }
                ?>
            </td>
        </tr>
    </table>
    <table style="margin-top: 0px">
        <tr>
            <td>
                <div id="l_burzenski"> <img src="<?php print $base_path . $directory; ?>/img/burzenski_homel.fw.png"></div>
            </td>
            <td colspan="2">
                <div id="home-tabs-left" class="home">
                    <?php print $node->field_home_tabs_left['und'][0]['value']; ?>
                </div>
            </td>
        </tr>
    </table>

    <script type="text/javascript">
<?php $num = rand(0, 1); ?>
    if(jQuery("#news_events .view .view-content").eq(2).size()){
        jQuery("#news_events .view").eq(<?php print $num; ?>).css('display','none');
    }
    </script>




</div>