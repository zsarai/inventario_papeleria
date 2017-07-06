/*
 jQuery WebCam Capture Plugin
*/
(function() {
 var webCamObject = null;
 $.fn.extend({
 createWebCam : function(opt) {
 this.options = {
 height: 280,
 width: 280,
 swfUrl: './js/webcam.swf',
 id: 'webcamMovie',
 shutterSound: true,
 shutterUrl: './js/shutter.mp3',
 url: './almacen/almentrega/test.php',
 quality: 100
 };
 window.webcam = { flash_notify: function(type, url) { $.WebCam.notify(type,url); } }
 $.extend({
 WebCam : {
 notify : function(type,msg) {
 $(document).trigger('webcamNotify',{ type: type, msg: msg });
 $(document).unbind('webcamNotify');
 }
 }
 });
 this.objSwf = null;
 this.htmlElement = $(this);
 $.extend(this.options, opt);
 var flashVars = 'shutter_enabled=' + (this.options.shutterSound ? 1 : 0) + '&shutter_url=' + escape(this.options.shutterUrl) +'&width=' + this.options.width + '&height=' +this.options.height +'&server_width=' + this.options.width +'&server_height=' + this.options.height;




 if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;



 this.objSwf = $('<object>').attr('id',this.options.id).attr('width',this.options.width).attr('height',this.options.height
 ).append(
 $('<param>').attr('name','allowScriptAccess').attr('value','always')
 ).append(
 $('<param>').attr('name','allowFullScreen').attr('value','false')
 ).append(
 $('<param>').attr('name','movie').attr('value',this.options.swfUrl)
 ).append(
 $('<param>').attr('name','loop').attr('value','false')
 ).append(
 $('<param>').attr('name','menu').attr('value','false')
 ).append(
 $('<param>').attr('name','quality').attr('value','best')
 ).append(
 $('<param>').attr('name','flashvars').attr('value',flashVars)
 );
 } else {
 this.objSwf = $('<embed>').attr('id',this.options.id).attr('src',this.options.swfUrl).attr('width',this.options.width).attr('height',this.options.height).attr('loop','false').attr('menu','false').attr('quality','best').attr('bgcolor','#ffffff').attr('name',this.options.id).attr('allowScriptAccess','always').attr('allowFullScreen','false').attr('type','application/x-shockwave-flash').attr('flashvars',flashVars);
 }
 $(this).append(
 this.objSwf
 );
 this.getMovie = function() {
 return document.getElementById(this.options.id);
 }
 this.capture = function(nom) {
 	console.log(nom);
 var url_comp= "./almacen/almentrega/test.php?var="+nom;
 this.getMovie()._snap(url_comp, this.options.quality, this.options.shutterSound, 0 );
 $(document).bind('webcamNotify',function(e,json) { /*callback(json);*/ } );
 return $(this);
 }
 this.reset = function(callback) {
 this.getMovie()._reset();
 return $(this);
 }
 this.configure = function(panel) {
 if (!panel) panel = "camera";
 this.getMovie()._configure(panel);
 return $(this);
 }
 webCamObject = this;
 return $(this);
 },
 getWebCam : function() {
 if(webCamObject != null) return webCamObject;
 }
 });
})();