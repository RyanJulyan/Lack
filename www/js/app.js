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
    cordova.plugins.backgroundMode.setDefaults({ silent: true, text:'Doing heavy tasks.'});
    // Enable background mode
    // 1) Request background execution
	cordova.plugins.backgroundMode.enable();

	// 2) Now the app runs ins background but stays awake
	cordova.plugins.backgroundMode.on('activate', function () {
		setInterval(function () {
			cordova.plugins.notification.badge.increase();
		}, 1000);
	});

	// 3) App is back to foreground
	cordova.plugins.backgroundMode.on('deactivate', function () {
		cordova.plugins.notification.badge.clear();
	});
	
},false);