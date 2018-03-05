/* This module is for the initialization of components */
$(function(){
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });

	//function to open the side nav
    function openSideNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    //function to close the side nav
    function closeSideNav(){
        document.getElementById("mySidenav").style.width = "0%";
    }
});

//event to handler to handle the contact us form
$(".contact-us-form").on('submit', function(event) {
    event.preventDefault();
    
    var senderName = $(".sender-name").val().trim(),
        senderEmail =$(".sender-email").val().trim(),
        senderMessage = $(".sender-message").val().trim();

    if (senderName == "") {
        showSnackBar("Please Enter Your Name","error");
    } else if (senderEmail == "") {
        showSnackBar("Please Enter Your Email Address","error");
    } else if (senderMessage == "") {
        showSnackBar("Please Enter Your Message","error");
    } else {
        var data = $.param({
            senderName: senderName,
            senderEmail: senderEmail,
            senderMessage: senderMessage
        });

        $.post("api/user/addUserMessage.php",data, function(response) {
            console.log(response)
            if (response.success) {
                showSnackBar(response.message,"success");
                senderName = $(".sender-name").val("");
                senderEmail =$(".sender-email").val("");
                senderMessage = $(".sender-message").val("");
            } else if (!response.success) {
                showSnackBar(response.message,"error");
            }
        })
    }

});

viewGuestModal();

function viewGuestModal() {
        $.get("api/user/checkVisitorModalStatus.php",function(response) {
        if (response.success) {
            setTimeout(function() {
                $("#guest-modal").modal("show");
            },1000);
        }
    })
}

function updateCallCount(itemId) {
    var data = $.param({
        itemId: itemId
    });

    $.post("api/user/updateItemCallCount.php",data, function(response) {
        console.log(response)
    })
}

$(".user-guest-form").on("submit", function(event){
    event.preventDefault();

    var guestEmail = $(".user-guest-email").val().trim();
    if (guestEmail == "") {
        showSnackBar("Please Enter Your Email Address");
        setTimeout(function() {
            hideSnackBar();
        },2000);

    } else {
        var data = $.param({
            guestEmail: guestEmail
        });

        $.post("api/user/addGuestEmail.php",data,function(response) {
            showSnackBar(response.message,"success");
            setTimeout(function() {
                hideSnackBar();
            },2000);
        });
    }
});

$(".modal-user-guest-form").on("submit", function(event){
    event.preventDefault();

    var guestEmail = $(".modal-user-guest-email").val().trim();
    if (guestEmail == "") {
        showSnackBar("Please Enter Your Email Address");
        setTimeout(function() {
            hideSnackBar();
        },2000);

    } else {
        var data = $.param({
            guestEmail: guestEmail
        });

        $.post("api/user/addGuestEmail.php",data,function(response) {
            showSnackBar(response.message,"success");
            setTimeout(function() {
                hideSnackBar();
                $("#guest-modal").modal("hide");
            },2000);
        });
    }
});