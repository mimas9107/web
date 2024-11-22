$(document).ready(function(){
  // 設置每5秒(即5000毫秒)輪播一張照片
  let interval = window.setInterval(rotateSlides, 5000);

  function rotateSlides(){
    // 取得第一張image
    let $firstSlide = $('.carousel-group').find('div:first');
    // 取得image寬度，作為將來控制動畫翻頁之用
    let width = $firstSlide.width();
    // 以動畫方式往左移動第一張image
    // 設定動畫時間為1秒(即1000毫秒)
    $firstSlide.animate({marginLeft: -width}, 1000, function(){
      // 重新排列images：把第一張放置於最後一張之後 (變成循環)
      let $lastSlide = $('.carousel-group').find('div:last');
      $lastSlide.after($firstSlide);
      // 重設image位置
      $firstSlide.css({marginLeft: 0});
    });
  }

  // "往前(左)翻"之控制
  $('#left-arrow').click(function(){
    // 暫停輪播週期
    window.clearInterval(interval);
    // 取得目前image
    let $currentSlide = $('.carousel-group').find('div:first');
    // 取得目前image的寬度
    let width = $currentSlide.width();
    // 取得前一張image
    let $previousSlide = $('.carousel-group').find('div:last')
    // 移動到前一張image的位置
    $previousSlide.css({marginLeft: -width})
    $currentSlide.before($previousSlide);
    // 以動畫方式移動到前一張
    $previousSlide.animate({marginLeft: 0}, 1000, function(){
      // 恢復輪播週期
      interval = window.setInterval(rotateSlides, 3000);
    });
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