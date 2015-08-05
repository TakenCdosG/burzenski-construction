
<div class="first-line">
  <?php if ($logo): ?>
     <div id="container_logo" class="<?php print $header_wrapper_height; ?>"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
         </a>
      <div id="logo_print">
         <img src="<?php print $base_path.$directory."/img/logo-print.fw.png"?>" height="110" width="280">

    </div>
 
    </div>

	<div id="links_top_menu" class="<?php print $header_wrapper_height; ?>">
            <div id="social">
                <a href="https://www.facebook.com/BurzenskiAndCompanyPC" target="_blank"><img src="/sites/all/themes/burzenski/img/fb.fw.png"></a>
                <a  href="https://twitter.com/BurzenskiAndCo" target="_blank"><img src="/sites/all/themes/burzenski/img/tw.fw.png"></a>
                <a class="in"  href="http://www.linkedin.com/company/3270862?trk=tyah&trkInfo=tas%3Aburzenski%2Cidx%3A2-1-2" target="_blank"><img src="/sites/all/themes/burzenski/img/in.fw.png"></a>
            </div>
            <?php print render($page['top_header']); ?>
     <div id="search">
                <?php include('search.inc'); ?>
        </div>
        
              <div id="container_menu_home"> 
		  <div id="primary_link_border_left"></div>
				<div id="container_primary_link_search" class="home">
						 <?php print render($page['header']); ?>
						
						
						
					</div>
               	 <div id="primary_link_border_right"></div>					
		  </div>
   </div>
    <?php endif; ?> 
  
    
  

 
 
</div>






