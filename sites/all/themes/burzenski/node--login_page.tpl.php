
<div class="internal">
  <h1 class="basic_page"  <?php print $title_attributes; ?>><?php print $title; ?></h2>
  <div class="content"<?php print $content_attributes; ?>>
       <div class="container_login">
		<form method="post" action="https://secure.netlinksolution.com/portal/?action=JLoginUser" autocomplete="off" >

				<input type="hidden" name="firmID" value="REPLACE"/>

				<input id="trUname" name="username" type="text" maxlength="50" required spellcheck="false" autocapitalize="off" />

				<input id="trPwd" name="password" type="password" maxlength="50" required />
				<input id="edit-pass-asterisks" name="edit-pass-asterisks" type="text" val="">
			

				<input type="submit" value="Log In" id="edit-submit-external" />
				
				
		   </form>
		   <a href="#" id="trResetPwd" >Can't access your account?</a> 
		 </div>  

			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script src="https://secure.netlinksolution.com/repository/jquery/1.7.2/jquery.min.js">\x3C/script>')</script>
			<script>
			jQuery.noConflict(true)(function(a){

			var localResource = "REPLACE.png";

			var c=location.protocol+'//'+location.host+'/'+localResource;a("a#trResetPwd").click(function(){var b=a('<iframe id="trResetPwdFrame" style="background-color:transparent;display:none;position:fixed;z-index: 12;top:0;left:0;border:0;height:100%;width:100%;overflow:hidden" allowtransparency="true"></iframe>').appendTo("body").load(function(){try{b[0].contentWindow.name==="close"&&setTimeout(function(){b.remove()},0)}catch(d){}}).show().attr("src","https://secure.netlinksolution.com/repository/ng-widgets/security-questions/1.0.3/embed.html#"+c);return false})}); </script>		
	
  </div>
</div>	
		
			
			