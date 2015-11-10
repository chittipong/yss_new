/* Contact Form */
function checkEmail(email) {
    var check = /^[\w\.\+-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]{2,6}$/;
    if (!check.test(email)) {
        return false;
    }
    return true;
}


//Hide Message------------------------
	function hideMessage(el){
		setTimeout(function(){
			//$(el).fadeOut('slow');
			$(el).slideUp('fast');
		},3000);
	}
//Hide Modal--------------------------
	function hideModal(el){
		$(el).modal('hide');	
	}
//Reset Form--------------------------
	function resetForm(form) {
    	$(':input',form).not(':button, :submit, :reset, :hidden').val('').removeAttr('checked').removeAttr('selected');
	}
//Redirect function-------------------
	function redirect(url){
		window.location=url;
	}

//Set Center--------------------------
	function setCenter(el){
		$(el).css("position","absolute");
		$(el).css("z-index",99999);
		$(el).css("margin","auto");
	}
	
//Set Message Center------------------
	function setMsgCenterPage(msg){
			var winW=window.innerWidth;								//get window Width
			var winH=window.innerHeight;							//get window Height
			var pcW=$(msg).css("width");
			var pcH=$(msg).css("height");	
				pcW=pcW.replace("px","");							//Remove string 'px'
				pcH=pcH.replace("px","");							//Remove string 'px'

				//Set Position	message to Center page----------------
				pcTop=((winH-pcH)/2)+"px";
				pcLeft=((winW-pcW)/2)+"px";
				
				$(msg).css("position","fixed");
				$(msg).css("z-index",99999);
				$(msg).css("margin","auto");
				$(msg).css("top",pcTop);					//set position Top
				$(msg).css("left",pcLeft);					//set position Left
	}//end function***
	
	function setCenter2(el){
		$(el).css("position","fixed");
		$(el).css("z-index",99999);
		$(el).css("width","70%");
		$(el).css("left","15%");
		$(el).css("top","40%");	
	}
	
	function showLoading(){
		$("body").prepend("<div id='loading'><img src='images/ajax-loader.gif'/></div>");
		$("#loading").css("position","fixed");
		$("#loading").css("z-index",99999);
		$("#loading").css("width","66px");
		$("#loading").css("height","66px");
		$("#loading").css("left","45%");
		$("#loading").css("top","40%");	
	}
	
	function hideLoading(){
		$("#loading").fadeOut(500);
	}