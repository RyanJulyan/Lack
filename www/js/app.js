// Dom7
var $ = Dom7;

// Theme
var theme = 'auto';
if (document.location.search.indexOf('theme=') >= 0) {
  theme = document.location.search.split('theme=')[1].split('&')[0];
}

// Init App
var app = new Framework7({
  id: 'io.framework7.testapp',
  root: '#app',
  touch: {
    // Enable fast clicks
    fastClicks: true,
  },
  theme: theme,
  methods: {
      unlock: function () {
		
		if ($('.modal-in').length > 0) {
			app.popup.close();
		}
		
        cordova.plugins.backgroundMode.moveToBackground();
      },
      more: function () {
        app.dialog.alert('More');
      },
      share: function () {
        
		app.dialog.alert('Share Button Clicked');
		
        var options = {
			message: 'share this', // not supported on some apps (Facebook, Instagram)
			subject: 'the subject', // fi. for email
			files: ['', ''], // an array of filenames either locally or remotely
			url: 'https://www.website.com/foo/#bar?a=b',
			// chooserTitle: 'Pick an app', // Android only, you can override the default share sheet title,
			// appPackageName: 'com.apple.social.facebook' // Android only, you can provide id of the App you want to share with
		};

		var onSuccess = function(result) {
			console.log("Share completed? " + result.completed); // On Android apps mostly return false even while it's true
			console.log("Shared to app: " + result.app); // On Android result.app since plugin version 5.4.0 this is no longer empty. On iOS it's empty when sharing is cancelled (result.completed=false)
		};

		var onError = function(msg) {
			console.log("Sharing failed with message: " + msg);
		};

		window.plugins.socialsharing.shareWithOptions(options, onSuccess, onError);
      },
      hideContactSearchAndNav: function () {
		$('.searchbar').hide();
		$('.list-index').hide();
		$('.segmented').show();
      },
      showContactSearchAndNav: function () {
		$('.segmented').hide();
		$('.searchbar').show();
		$('.list-index').show();
      },
  },
	on: {
	  pageBeforeRemove() {
		var self = this;
		self.actions.destroy();
	  },
	  pageInit: function () {
		var self = this;
		var app = self;
		
        self.popupSwipeHandler = self.popup.create({
          el: '#advert-details',
          swipeToClose: 'to-bottom',
          swipeHandler: '.swipe-handler'
        });
		
        self.popupSwipeHandler = self.popup.create({
          el: '#company-details',
          swipeToClose: 'to-bottom',
          swipeHandler: '.swipe-handler'
        });
		
        self.popupSwipeHandler = self.popup.create({
          el: '#services-details',
          swipeToClose: 'to-bottom',
          swipeHandler: '.swipe-handler'
        });
		
		// self.sheetSwipeToStep = self.popup.create({
		  // el: '.demo-sheet-swipe-to-step',
          // swipeToClose: 'to-bottom',
          // swipeHandler: '.swipe-handler',
		  // backdrop: true,
		// });
		
		self.listIndex = app.listIndex.create({
		  // ".list-index" element
		  el: '.list-index',
		  // List el where to look indexes and scroll for
		  listEl: '.list',
		  // Generate indexes automatically based on ".list-group-title" and ".item-divider"
		  indexes: 'auto',
		  // Scroll list on indexes click and touchmove
		  scrollList: true,
		  // Enable bubble label when swiping over indexes
		  label: true,
		});
		app.methods.hideContactSearchAndNav();
		
		$(document).on("click", "#unlock", function(){
			app.methods.unlock();
		});
		$(document).on("click", "#more", function(){
			app.methods.more();
		});
		$(document).on("click", ".share", function(){
			app.methods.share();
		});
		$(document).on("click", ".tab-link", function(){
			app.methods.hideContactSearchAndNav();
		});
		$(document).on("click", "#tab-link-companies", function(){
			app.methods.showContactSearchAndNav();
		});
	  },
	},
  routes: routes,
  popup: {
    closeOnEscape: true,
  },
  sheet: {
    closeOnEscape: true,
  },
  popover: {
    closeOnEscape: true,
  },
  actions: {
    closeOnEscape: true,
  },
  vi: {
    placementId: 'pltd4o7ibb9rc653x14',
  },
});

function onBackButton() {
	if ($('.modal-in').length > 0) {
		app.popup.close();
		return false;
	}
}

//Used to check if the screen was off previously
var previousScreenOff = false;

// Set globally to allow for it to be cleared
var backgroundModeTimer;

document.addEventListener('deviceready', function () {
	// prevent back button causing issues with close
	document.addEventListener('backbutton', onBackButton, false);
	
    // Android customization
    cordova.plugins.backgroundMode.setDefaults({silent: true});
    // Enable background mode
    // 1) Request background execution
	cordova.plugins.backgroundMode.enable();

	// 2) Now the app runs ins background but stays awake
	cordova.plugins.backgroundMode.on('activate', function () {
		//disable most optimizations done by Android/CrossWalk
		cordova.plugins.backgroundMode.disableWebViewOptimizations();
		
		if ($('.modal-in').length > 0) {
			app.popup.close();
		}
		
		// Repeat check every second set to backgroundModeTimer
		backgroundModeTimer = setInterval(function () {
			//Check if the screen was off and is now on
			cordova.plugins.backgroundMode.isScreenOff(function(bool) {
				
				if (previousScreenOff && !bool){
					cordova.plugins.backgroundMode.unlock();
				}
				
				previousScreenOff = bool;
			});
        }, 400);
	});
	
	cordova.plugins.backgroundMode.on('deactivate', function () {
		// Clear backgroundModeTimer
		clearInterval(backgroundModeTimer);
	});
	
},false);