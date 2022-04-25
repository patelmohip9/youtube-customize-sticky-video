jQuery(document).ready(function(){
  var videoData = ysvObj.data;
  var $window = jQuery(window);
  var $videoWrap = jQuery('.video-wrap');
  var $video = jQuery('.video');
  var videoHeight = $video.outerHeight();
  
  $window.on('scroll',  function(e) {
    var windowScrollTop = $window.scrollTop();
    var videoBottom = videoHeight + $videoWrap.offset().top;

    if (videoData.video_possion == 'br'  || videoData.video_possion == 'bl') {
      jQuery(".stuck").css("bottom", videoData.bottom+'px');
    }
    if (videoData.video_possion == 'br'  || videoData.video_possion == 'tr') {
      jQuery(".stuck").css("right", videoData.right+'px');
    }
    if (videoData.video_possion == 'tl'  || videoData.video_possion == 'bl') {
      jQuery(".stuck").css("left", videoData.left+'px');
    }
    if (videoData.video_possion == 'tr'  || videoData.video_possion == 'tl') {
      jQuery(".stuck").css("top", videoData.top+'px');
    }
    
    if (windowScrollTop > videoBottom) {
      $videoWrap.height(videoHeight);
      $video.addClass('stuck');
    } else {
      $videoWrap.height('auto');
      $video.removeClass('stuck');
      jQuery(".btn_close").css('display', "none");
    }
  });
  
})