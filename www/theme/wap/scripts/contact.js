var $ = jQuery.noConflict(); 
var formSubmitted = 'false';

jQuery(document).ready(function($) {	

	$('#formSuccessMessageWrap').hide(0);
	$('.formValidationError').fadeOut(0);
	
	// fields focus function starts
	$('input[type="text"], input[type="password"], textarea').focus(function(){
		if($(this).val() == $(this).attr('data-dummy')){
			$(this).val('');
		};	
	});
	// fields focus function ends
		
	// fields blur function starts
	$('input, textarea').blur(function(){
    	if($(this).val() == ''){		    
			$(this).val($(this).attr('data-dummy'));				
		};			
	});
	// fields blur function ends
		
	// submit form data starts	   
    function submitData(currentForm, formType){     
		formSubmitted = 'true';		
		var formInput = $('#' + currentForm).serialize();		
		$.post($('#' + currentForm).attr('action'),formInput, function(data){			
			//$('#' + currentForm).hide();
			//$('#formSuccessMessageWrap').fadeIn(500);		
			if(data){alert(1);
				//window.location.href="http://mp.weixin.qq.com/s?__biz=MzA4MTc4NDMyMg==&mid=200187499&idx=1&sn=eb6cb5e9d0bf8b334d0dbabcb586d45e#rd";  
			}else{
				alert('信息提交失败！请重新填写');
				window.location.href="/vw/jyzx/zh.html";
			}
		});

	};
	// submit form data function starts	
	// validate form function starts
	function validateForm(currentForm, formType){		
		// hide any error messages starts
	    $('.formValidationError').hide();
		$('.fieldHasError').removeClass('fieldHasError');
	    // hide any error messages ends	
		$('#' + currentForm + ' .requiredField').each(function(i){		   	 
			if($(this).val() == '' || $(this).val() == $(this).attr('data-dummy')){				
				$(this).val($(this).attr('data-dummy'));	
				$(this).focus();
				$(this).addClass('fieldHasError');
				$('#' + $(this).attr('id') + 'Error').fadeIn(300);
				return false;					   
			};			
			if($(this).hasClass('requiredEmailField')){				  
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				var tempField = '#' + $(this).attr('id');				
				if(!emailReg.test($(tempField).val())) {
					$(tempField).focus();
					$(tempField).addClass('fieldHasError');
					$(tempField + 'Error2').fadeIn(300);
					return false;
				};			
			};
			if($(this).hasClass('requiredTelField')){
				var phoneRegWithArea = /^[0][1-9]{2,3}-[0-9]{5,10}$/;
				var phoneRegNoArea = /^[1][0-9]{10}$/;
				var tempField = '#' + $(this).attr('id');
				var strPhone = $('#' + $(this).attr('id')).val();
				if( strPhone.length == 13 ) {
					if(!phoneRegWithArea.test(strPhone) ){
						$(tempField).focus();
						$(tempField).addClass('fieldHasError');
						$(tempField + 'Error2').fadeIn(300);
						return false;
					}
				}else{
					if(!phoneRegNoArea.test( strPhone ) ){
						$(tempField).focus();
						$(tempField).addClass('fieldHasError');
						$(tempField + 'Error2').fadeIn(300);
						return false;
					}
				}
			};
			if(formSubmitted == 'false' && i == $('#' + currentForm + ' .requiredField').length - 1){
			 	submitData(currentForm, formType);
			};			  
   		});		
	};
	// validate form function ends	
	
	// contact button function starts
	$('#contactSubmitButton').click(function() {	
		validateForm($(this).attr('data-formId'));	
	    return false;		
	});
	// contact button function ends
	
	
	
});
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*//////////////////// Document Ready Function Ends                                                                       */
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
