jQuery(document).ready(function(){
  console.log( 'main js ycsv' );
  console.log( 'hello' );
  var $window = jQuery(window);
  console.log(window);
  var $videoWrap = jQuery('.video-wrap');
  console.log($videoWrap );
  var $video = jQuery('.video');
  var videoHeight = $video.outerHeight();
  
  $window.on('scroll',  function() {
      console.log($videoWrap.offset() );
    var windowScrollTop = $window.scrollTop();
    var videoBottom = videoHeight + $videoWrap.offset().top;
    
    if (windowScrollTop > videoBottom) {
      $videoWrap.height(videoHeight);
      $video.addClass('stuck');
    } else {
      $videoWrap.height('auto');
      $video.removeClass('stuck');
    }
  });

})