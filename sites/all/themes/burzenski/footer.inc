<?php
	
		$footerText = $global_config->field_footer_text;
		$footerImages = $global_config->field_image_footer;
		$second_row_images = $global_config->field_second_row_footer_images;
	
?>


<div class="content">
  <div class="copyright">
		
		<div class="logos_footer">
		  <table id="logo_footer_wrapper" border="0">
					<tbody><tr>
                            <?php
                               foreach($footerImages['und'] as $image){
                                      $row = field_collection_item_load($image['value']);
                                      if(count($row->field_footer_image_1['und'][0]['uri'])>0){
                                       print "<td style='vertical-align: middle;'><a href='".$row->field_footer_logo_url['und'][0]['value']."' class='logo_footer_image' target='_blank' >";
                                       print theme_image_style(array('style_name'=>'footer-image',
                                           'path'=>$row->field_footer_image_1['und'][0]['uri'],
                                           'alt'=>$row->field_footer_image_1['und'][0]['alt'],
                                           'title'=>$row->field_footer_image_1['und'][0]['title'],
                                           'height'=> NULL,
                                           'width'=>NULL));
                                       print "</a></td>";
                                          }
                               }
                             ?> 
							</tr>
				</tbody>
		   </table>
		    <?php if (count($second_row_images)): ?>
		   		<table class="wrapper_footer_logos" border="0">
					<tbody><tr>
                            <?php
                               foreach($second_row_images['und'] as $image){
                                      $row = field_collection_item_load($image['value']);
                                      if(count($row->field_footer_image_1['und'][0]['uri'])>0){
                                       print "<td style='vertical-align: middle;'><a href='".$row->field_footer_logo_url['und'][0]['value']."' class='logo_footer_image' target='_blank' >";
                                       print theme_image_style(array('style_name'=>'footer-image',
                                           'path'=>$row->field_footer_image_1['und'][0]['uri'],
                                           'alt'=>$row->field_footer_image_1['und'][0]['alt'],
                                           'title'=>$row->field_footer_image_1['und'][0]['title'],
                                           'height'=> NULL,
                                           'width'=>NULL));
                                       print "</a></td>";
                                          }
                               }
                             ?> 
							</tr>
					</tbody>
			   </table>
		   	<?php endif; ?>
		  </div>
      <div class="footer_text">
		<?php  print $footerText['und'][0]['value']; ?>
		</div>
		</div>
  </div>
</div>

