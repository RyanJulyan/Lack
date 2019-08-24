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
        var app = this;
		
		window.screenLocker.unlock(successCallback, errorCallback, 2);
        
      },
      more: function () {
        var self = this;
        app.dialog.alert('More');
      },
      share: function () {
        var app = this;
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
          el: '.demo-popup-swipe-handler',
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

var successCallback = function() {
  // console.log('screen unlock success');
  // do some staff here
  cordova.plugins.backgroundMode.moveToForeground();
};
 
var errorCallback = function(e) {
  console.log('error: ' + e);
  app.dialog.alert('error: ' + e);
};

// document.addEventListener('deviceready', function () {
    // // cordova.plugins.backgroundMode is now available
	// cordova.plugins.backgroundMode.enable();
	// var backgroundModeActive = cordova.plugins.backgroundMode.isActive();
		
	// if(backgroundModeActive){
		// cordova.plugins.backgroundMode.unlock();
	// }
		
// }, false);

document.addEventListener('deviceready', function () {
    // Android customization
    cordova.plugins.backgroundMode.setDefaults({ text:'Doing heavy tasks.'});
    // Enable background mode
    cordova.plugins.backgroundMode.enable();
	
	cordova.plugins.backgroundMode.on('activate', function() {
	   cordova.plugins.backgroundMode.disableWebViewOptimizations(); 
	});
    // Called when background mode has been activated
    cordova.plugins.backgroundMode.onactivate = function () {
        setTimeout(function () {
            // Modify the currently displayed notification
            cordova.plugins.backgroundMode.configure({
                text:'Running in background for more than 5s now.'
            });
        }, 5000);
    }
}, false);