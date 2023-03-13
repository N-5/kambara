import $ from 'jquery';

export default () => {

  $(function () {
    function afterction() {
      var $target = $('.c-loader');

      setTimeout(() => {
        $target.removeClass('is-onloading');
        $target.removeClass('is-offloading');

        $target.on('click', function () {
          $target.removeClass('is-offloading');
          $target.removeClass('is-onloading');
        });
      }, 800);
    }

    $(document).ready(function (event) {
      afterction();
    });

    //bfcacheの対策
    window.addEventListener('pageshow', function (event) {
      if (event.persisted) {
        afterction();
      }
    });

    var $nontarget = $('a:not(".js-outlink"), a[href^=https]:not([target="_blank"])')

    $nontarget.on('click', $nontarget, function (event) {

      event.preventDefault();
      var linkUrl = $(this).attr('href');

      $('.c-loader, main').addClass('is-offloading');

      function beforeAction () {
        location.href = linkUrl;
      }
      setTimeout(beforeAction, 800);
    });
  });
};
