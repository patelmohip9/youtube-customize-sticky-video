console.log(ycsvObj.data);

jQuery(document).ready(function(){
  var videoData = ycsvObj.data;
  var $window = jQuery(window);
  var $videoWrap = jQuery('.video-wrap');
  var $video = jQuery('.video');
  var videoHeight = $video.outerHeight();
  
  $window.on('scroll',  function() {
    var windowScrollTop = $window.scrollTop();
    var videoBottom = videoHeight + $videoWrap.offset().top;
    if (windowScrollTop > videoBottom) {
      $videoWrap.height(videoHeight);
      $video.addClass('stuck');
    } else {
      $videoWrap.height('auto');
      $video.removeClass('stuck');
    }
    if (videoData.video_possion == 'br'  || videoData.video_possion == 'bl') {
      $(".stuck").css("bottom", videoData.bottom+'px');
    }
    if (videoData.video_possion == 'br'  || videoData.video_possion == 'tr') {
      $(".stuck").css("right", videoData.right+'px');
    }
    if (videoData.video_possion == 'tl'  || videoData.video_possion == 'bl') {
      $(".stuck").css("left", videoData.left+'px');
    }
    if (videoData.video_possion == 'tr'  || videoData.video_possion == 'tl') {
      $(".stuck").css("top", videoData.top+'px');
    }
  });

})