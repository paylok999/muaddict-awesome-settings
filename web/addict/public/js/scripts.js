$(document).ready(function() {
    $('#multipleForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Username should be minimum of 6 and max of 10 characters'
					}
                }
            },
			password: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			email: {
                validators: {
                    notEmpty: {
                        message: 'Email is required'
                    },
					emailAddress: {
                        message: 'The value is not a valid email address'
                    }
                }
            },
			secreta: {
                validators: {
                    notEmpty: {
                        message: 'Secret answer is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Secret Answer should be minimum of 6 and max of 10 characters'
					}
                }
            },
           
        }
    }).on('success.form.bv', function(e) {
			e.preventDefault();
			$('#ajax-loader-register').show();
			$('#regform-submit').hide();
			var form = $('#multipleForm');
	
			data = {
				username : $("[name='username']", form).val(),
				password : $("[name='password']", form).val(),
				email : $("[name='email']", form).val(),
				secretq : $("[name='secretq']", form).val(),
				secreta : $("[name='secreta']", form).val(),
			}
		
			$.ajax({
				type: 'POST',
				url: '/register',
				data: data,
				success: function(data){
					if(data == 1){
						alert('Register Successful!');
						location.reload();
					}else{
						alert(data);
						$('#ajax-loader-register').hide();
						$('#regform-submit').show();
						$('#regform-submit').removeAttr('disabled');
					}
					
				}
			});
	});
	
	/**
	* Login Validation
	*/
	$('#multipleForm-login').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Username should be minimum of 6 and max of 10 characters'
					}
                }
            },
			password: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			
			
           
        }
    }).on('success.form.bv', function(e) {
			e.preventDefault();
			$('#ajax-loader-login').show();
			$('#loginform-submit').hide();
			var form = $('#multipleForm-login');
	
			data = {
				username : $("[name='username']", form).val(),
				password : $("[name='password']", form).val(),
			}
		
			$.ajax({
				type: 'POST',
				url: '/authenticate',
				data: data,
				success: function(data){
					$('#ajax-loader-login').show();
					if(data == 1){
						location.reload();
					}else{
						alert(data);
						$('#ajax-loader-login').hide();
						$('#loginform-submit').show();
						$('#loginform-submit').removeAttr('disabled');
					}
					
				}
			});
	});
	/**
	* Change password Validation
	*/
	$('#multipleForm-changepassword').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            oldpassword: {
                validators: {
                    notEmpty: {
                        message: 'Current Password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Current Password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			newpassword: {
                validators: {
                    notEmpty: {
                        message: 'New Password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'New Password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			rnewpassword: {
                validators: {
                    notEmpty: {
                        message: 'New Password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'New Password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			
			
           
        }
    }).on('success.form.bv', function(e) {
			e.preventDefault();
			$('#ajax-loader-changepw').show();
			$('#changepassword-submit').hide();
			var form = $('#multipleForm-changepassword');
	
			data = {
				oldpassword : $("[name='oldpassword']", form).val(),
				newpassword : $("[name='newpassword']", form).val(),
				rnewpassword : $("[name='rnewpassword']", form).val(),
			}
		
			$.ajax({
				type: 'POST',
				url: '/account/changepassword',
				data: data,
				success: function(data){
					if(data == 1){
						alert('Your password has been successfully change!');
						location.reload();
					}else{
						alert(data);
						$('#changepassword-submit').removeAttr('disabled');
						$('#ajax-loader-changepw').hide();
						$('#changepassword-submit').show();
					}
					
				}
			});
	});
	/**
	* show modal login
	*/
	$(document).on('click', '.account-link', function(e){
		e.preventDefault();
		$('#loginModal').modal({show:true});
	})
	/**
	* show modal changepassword
	*/
	$(document).on('click', '.change-password', function(e){
		e.preventDefault();
		$('#changepasswordModal').modal({show:true});
	})
	
	
	/**
	* Init page by hash
	*/
	var hashpage = window.location.hash;
	if(hashpage == ''){
		hashpage = '#home';
	}
	loadpage = hashpage.replace('#', '.');
	
	if(loadpage == '.rankings'){
		getPlayerRankings('mlevel');
		getPlayerPkCount('pkcount');
		getPlayerDuelwin('winduels');
	}
	var divelements = $( hashpage + '-container');
	var negativeheight = divelements.height() + 100;
	divelements.css('margin-top', '-' + negativeheight + 'px');
	
	divelements.show();
	divelements.animate({ "margin-top": "0px" }, 500);
	
	/**
	* Navigation
	*/
	$(document).on('click', '.home-link', function(){
		
		var divelements = $('#home-container');
		var negativeheight = divelements.height() + 100;
		divelements.css('margin-top', '-' + negativeheight + 'px');
		
		$('.body-content').hide();
		divelements.show();
		divelements.animate({ "margin-top": "0px" }, 500);
	});
	
	$(document).on('click', '.register-link', function(){
		
		var divelements = $('#register-container');
		var negativeheight = divelements.height() + 100;
		divelements.css('margin-top', '-' + negativeheight + 'px');
		
		$('.body-content').hide();
		divelements.show();
		divelements.animate({ "margin-top": "0px" }, 500);
	});
	
	$(document).on('click', '.download-link', function(){
		
		var divelements = $('#download-container');
		var negativeheight = divelements.height() + 100;
		divelements.css('margin-top', '-' + negativeheight + 'px');
		
		$('.body-content').hide();
		divelements.show();
		divelements.animate({ "margin-top": "0px" }, 500);
	});
	
	$(document).on('click', '.rankings-link', function(){
		
		
		getPlayerRankings('mlevel');
		getPlayerPkCount('pkcount');
		getPlayerDuelwin('winduels');
		var divelements = $('#rankings-container');
		var negativeheight = divelements.height() + 100;
		divelements.css('margin-top', '-' + negativeheight + 'px');
		
		$('.body-content').hide();
		divelements.show();
		divelements.animate({ "margin-top": "0px" }, 500);
	});
});

function getPlayerRankings(rankings){
	$.ajax({
		type: 'GET',
		url: '/character/rankings/'+rankings,
		success: function(data){
			$.each(data, function(index, element){
			var returndata = '<div class="row ranking-details-container">\
			<div class="col-md-6 ranking-name">' + element.name + '</div>\
			<div class="col-md-6 ranking-level">' + element.mlevel + '</div>\
			</div>';
			$(returndata).appendTo('.' + rankings);
		});
					
		}
	});
	
}

function getPlayerPkCount(rankings){
	$.ajax({
		type: 'GET',
		url: '/character/rankings/'+rankings,
		success: function(data){
			$.each(data, function(index, element){
			var returndata = '<div class="row ranking-details-container">\
			<div class="col-md-6 ranking-name">' + element.killer + '</div>\
			<div class="col-md-6 ranking-level">' + element.victim + '</div>\
			</div>';
			$(returndata).appendTo('.' + rankings);
		});
					
		}
	});
	
}

function getPlayerDuelwin(rankings){
	$.ajax({
		type: 'GET',
		url: '/character/rankings/'+rankings,
		success: function(data){
			$.each(data, function(index, element){
			var returndata = '<div class="row ranking-details-container">\
			<div class="col-md-4 ranking-name">' + element.name + '</div>\
			<div class="col-md-4 ranking-level">' + element.winduels + '</div>\
			<div class="col-md-4 ranking-level">' + element.loseduels + '</div>\
			</div>';
			$(returndata).appendTo('.' + rankings);
		});
					
		}
	});
	
}