$(document).ready(function(){
  // 設置每5秒(即5000毫秒)輪播一張照片
  let interval = window.setInterval(rotateSlides, 5000);

  function rotateSlides(){
    //取得第1張image
    let $firstSlide=$('.carousel-group').find('div:first');

    let width=$firstSlide.width();
    $firstSlide.animate({marginLeft: -width}, 1000, function(){
      let $lastSlide=$('.carousel-group').find('div:last');
      $lastSlide.after($firstSlide);
      $firstSlide.css({marginLeft: 0});
    })
  }

  // "往前(左)翻"之控制
  $('#left-arrow').click(function(){
    window.clearInterval(interval);
    let $currentSlide=$('.carousel-group').find('div:first');
    let width=$currentSlide.width();
    let $previousSlide=$('.carousel-group').find('div:last');
    $previousSlide.css({marginLeft: -width});
    $currentSlide.before($previousSlide);
    $previousSlide.animate({marginLeft: 0}, 1000, function(){
      interval=window.setInterval(rotateSlides,3000);
    })
  });

  // "往後(右)翻"之控制
  $('#right-arrow').click(function(){
    // 暫停輪播週期
    window.clearInterval(interval);
    // 取得目前image
    let $currentSlide = $('.carousel-group').find('div:first');
    // 取得目前image的寬度
    let width = $currentSlide.width();
    // 以動畫方式移動到下一張
    $currentSlide.animate({marginLeft: -width}, 1000, function(){
      // 重新排列images：把第一張放置於最後一張之後 (變成循環)
      let $lastSlide = $('.carousel-group').find('div:last')
      $lastSlide.after($currentSlide);
      // 重設image位置
      $currentSlide.css({marginLeft: 0})
      // 恢復輪播週期
      interval = window.setInterval(rotateSlides, 3000);
    });
  });

});