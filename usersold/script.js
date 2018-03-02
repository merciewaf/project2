 jQuery(document).ready(function(){
  jQuery('.user_section').hide();
  jQuery('#add_user_sec').show();

var left, opacity, scale; 
var animating; 
jQuery("#show_user").click(function(event){
jQuery(document).prop('title', 'Show Users');
   jQuery("#msg").html("");
   
if(animating) return false;
	animating = true;
    var section = jQuery(".user_section");
	var activesec; 
     for($i=0;$i<section.length;$i++){
	     if(jQuery(section[$i]).css('display')=="block"){
		   activesec = section[$i];
		   break;
		 }
	 }	
	 if(jQuery(this).hasClass("active")){
	   return false;
	 }
	jQuery(".navi_sec").removeClass("active");
	jQuery(this).parent().addClass("active");
	
	//show the next fieldset
	
	//hide the current fieldset with style
	jQuery(activesec).animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			jQuery(activesec).css({'transform': 'scale('+scale+')'});
			jQuery("#show_user_sec").css({'left': left, 'opacity': opacity,'transform': 'none'});
		}, 
		duration: 800, 
		complete: function(){
			jQuery(activesec).hide();
			jQuery("#show_user_sec").show(); 
			animating = false;
			getusers();
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});

jQuery('#userists').on('click','.ajaxedit',function(){
var edituser = jQuery(this).attr('user');
jQuery(document).prop('title', 'Edit User');
if(animating) return false;
	animating = true;
	
	jQuery(".navi_sec").removeClass("active");
	//hide the current fieldset with style
	jQuery("#show_user_sec").animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			jQuery("#show_user_sec").css({'transform': 'scale('+scale+')'});
			jQuery("#update_user_sec").css({'left': left, 'opacity': opacity,'transform': 'none'});
		}, 
		duration: 800, 
		complete: function(){
			jQuery("#show_user_sec").hide();
			   
			   
    	  jQuery.ajax({
	     url:"DbManipute.php",
                  type:"POST",
                  data:"actionfunction=editUser&user="+edituser,
        cache: false,
        success: function(response){
		  jQuery('#update_user_sec').html(response);
		  jQuery("#update_user_sec").show(); 
			animating = false;
		}
  });
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
jQuery('#userists').on('click','.ajaxdelete',function(){
   var user = jQuery(this).attr("user");
    jQuery.ajax({
	     url:"DbManipute.php",
                  type:"POST",
                  data:"actionfunction=deleteUser&user="+user+"&page=1",
        cache: false,
        success: function(response){
		  jQuery('#userists').html(response);
		  jQuery("#msg").html("user deleted");
		}
  });
});
jQuery("#add_user").click(function(){ 
   resetform();
   jQuery(document).prop('title', 'Add User');
  jQuery("#msg").html("");
	if(animating) return false;
	animating = true;
     var activesec; 
     for($i=0;$i<section.length;$i++){
	     if(jQuery(section[$i]).css('display')=="block"){
		   activesec = section[$i];
		   break;
		 }
	 }
	 jQuery(".navi_sec").removeClass("active");
	 jQuery(this).parent().addClass("active");
	jQuery(activesec).animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			jQuery(activesec).css({'left': left});
			jQuery("#add_user_sec").css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			jQuery(activesec).hide();
			jQuery("#add_user_sec").show(); 
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

jQuery('#update_user_sec').on('click','#updatesubmit',function(){
     jQuery(".navi_sec a").removeClass("active");
	 var signupform = $("#update_user_sec").children("#signup");
	 var fname = jQuery(signupform).find("#firstname");
	 var lname = jQuery(signupform).find("#lastname");
	 var email = jQuery(signupform).find("#email");
	 var favjob = jQuery(signupform).find("#favjob");
     if(validateform(fname,lname,email,favjob)){
	    var formdata = signupform.serialize();
		jQuery.ajax({
	     url:"DbManipute.php",
                  type:"POST",
                  data:formdata,
        cache: false,
        success: function(response){
		   
		   if(response=='updated'){
		        jQuery("#show_user").trigger("click");	
				getusers();	
				jQuery("#msg").html("user Updated");
		     }
		}
		
	   });
	 }
});

 jQuery('#userists').on('click','.page-numbers',function(){
       jQuerypage = jQuery(this).attr('href');
	   jQuerypageind = jQuerypage.indexOf('page=');
	   jQuerypage = jQuerypage.substring((jQuerypageind+5));
       
	   jQuery.ajax({
	     url:"DbManipute.php",
                  type:"POST",
                  data:"actionfunction=showData&page="+jQuerypage,
        cache: false,
        success: function(response){
		   
		  jQuery('#userists').html(response);
		 
		}
		
	   });
	return false;
	});
});

jQuery("#formsubmit").click(function(){
     
	  var fname = jQuery("#firstname");
	 var lname = jQuery("#lastname");
	 var email = jQuery("#email");
	 var favjob = jQuery("#favjob");
	 
     if(validateform(fname,lname,email,favjob)){
	    var formdata = jQuery("#signup").serialize();
		jQuery.ajax({
	     url:"DbManipute.php",
                  type:"POST",
                  data:formdata,
        cache: false,
        success: function(response){
		   if(response=='added'){
		        jQuery("#show_user").trigger("click");	
				getusers();		
               jQuery("#msg").html("user added");				
		     }
		}
		
	   });
	 }
});
});    
function getusers(){
jQuery.ajax({
	     url:"DbManipute.php",
                  type:"POST",
                  data:"actionfunction=showData&page=1",
        cache: false,
        success: function(response){
		  jQuery('#userists').html(response);
		  
		}
  });
 
}
function validateform(fname,lname,email,favjob){

         var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
       
		if (fname.val()=='') {
			fname.addClass('hightlight');
			return false;
		} else fname.removeClass('hightlight');
		if (lname.val()=='') {
			lname.addClass('hightlight');
			return false;
		} else lname.removeClass('hightlight');
		
		if (email.val()=='') {
			email.addClass('hightlight');
			return false;
		}else if(!emailfilter.test(email.val())){
		   alert("not a valid email id");
		   email.addClass('hightlight');
		   return false;
		}else email.removeClass('hightlight');
		if (favjob.val()=='') {
			favjob.addClass('hightlight');
			return false;
		} else favjob.removeClass('hightlight');
		
		return true;
		
}
function resetform(){
    var fname = jQuery("#firstname");
	 var lname = jQuery("#lastname");
	 var email = jQuery("#email");
	 var favjob = jQuery("#favjob");
	 fname.val("");
	 lname.val("");
	 email.val("");
	 favjob.val("");
	fname.removeClass("hightlight");
	 lname.removeClass("hightlight");
	 email.removeClass("hightlight");
	 favjob.removeClass("hightlight");
	 
}