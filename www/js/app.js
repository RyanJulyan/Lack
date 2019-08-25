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
        app.dialog.alert('Share');
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
          el: '.view_advert_details_popup',
          swipeToClose: 'to-bottom',
          swipeHandler: '.swipe-handler'
        });
		
		$(document).on("click", "#unlock", function(){
			app.methods.unlock();
		});
		$(document).on("click", "#more", function(){
			app.methods.more();
		});
		$(document).on("click", "#share", function(){
			app.methods.share();
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