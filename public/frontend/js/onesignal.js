"use strict";
$(document).ready(function() {
    
    var OneSignal = window.OneSignal || [];
   
    OneSignal.push(["init", {
        appId: ONESIGNAL_APP_ID,
        subdomainName: "",
        autoRegister: true,
        promptOptions: {
            actionMessage: "We'd like to show you notifications for the latest offers and updates !",
            acceptButtonText: "Sure",
            cancelButtonText: "No Thanks !"
        }
    }]);

    

    var OneSignal = OneSignal || [];
    OneSignal.push(function(){

        OneSignal.showSlidedownPrompt({
            force : true
        });
        
        console.log("User id is: "+USER_ID)
        OneSignal.setExternalUserId(USER_ID);

        OneSignal.on('subscriptionChange', function(isSubscribed){
            console.log("The user's subscription state is now", isSubscribed);
        });

        var isPushSupported = OneSignal.isPushNotificationsSupported();
        if(isPushSupported)
        {
            OneSignal.getUserId( function(userId) {
                console.log("userId", userId);
            });

            OneSignal.isPushNotificationsEnabled().then(function(isEnabled)
            {
                if(isEnabled)
                {
                    //console.log(OneSignal)
                    console.log("Push nofitications are enabled !");
                }else {
                    OneSignal.showHttpPrompt();
                    console.log("Push notifications are not enabled yet on your browser.");
                }
            });
        }else{
            console.log("Push notifications are not supported on your browser.");
        }
    });
});
