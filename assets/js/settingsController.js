const settingsURL = {
  updateUserSettingsURL : "api/user/updateUserSettings.php",
  secretURL : "api/user/updateUserPassword.php"
}


$(".account-setup-form").on("submit",function(event){
  event.preventDefault();

  var userFullname = $(".settings-fullname").val().trim(),
      userEmail   = $(".settings-email").val().trim(),
      userContact = $(".settings-contact").val().trim(),
      userCity    = $('.settings-city').val().trim(),
      userCountry = $(".settings-country").val().trim();

  if(userContact == ""){
    showSnackBar("Please Provide Your Contact Details", "error");
  }else if(userCity == ""){
    showSnackBar("Please Provide Your City", "error");
  }else if(userCountry == ""){
    showSnackBar("Please  Your Country is important", "error");
  }else{

    var data = $.param({
      fullname : userFullname,
      email : userEmail,
      contact : userContact,
      city  : userCity,
      country : userCountry
    });

    $.post(settingsURL.updateUserSettingsURL,data,function(response){
      if(response.success){
        showSnackBar(response.message, "success");
      }else if(!response.success){
        showSnackBar(response.message, "error");
      }
    })

  }
})

$(".user-password-reset-form").on("submit",function(event){
  event.preventDefault();

  var old_password    = $(".settings-old-pass").val().trim(),
      newPassword     = $(".settings-new-pass").val().trim(),
      confirmPassword = $(".settings-conf-pass").val().trim();


      if(old_password == "" || newPassword == "" || confirmPassword == ""){
        showSnackBar("All fields are required", "error");
      }else if(newPassword.length < 8){
        showSnackBar("Password must be 8 or more characters", "error");
      }else if(newPassword != confirmPassword){
        showSnackBar("Password provided do not match", "error");
      }else{

        var data = $.param({
          oldPassword : old_password,
          new_Password : newPassword
        });

        $.post(settingsURL.secretURL,data, function(response){
          console.log(response);
          if(response.success){
            showSnackBar(response.message, "success");
            $("form#user-password-settings")[0].reset();
          }else if(!response.message){
            showSnackBar(response.message, "error");
          }
        })
      }
})
