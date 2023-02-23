import $ from 'jquery';

export default () => {

  $(function () {
    /*----------
    タッチデバイス判定
    ----------*/
    var fixTouchDevice = function() {
      if (window.ontouchstart === null) {
        document.documentElement.classList.add('is-touch');
      }
    };

    /*----------
    開閉ボックス
    layout/accordion
    ----------*/
    var setAccordion = function () {
      var $target = $('.js-accordion');

      $target.each(function() {
        var $this = $(this);
        var _$target = $this.find('.js-accordion-parent');

        _$target.on('click', function() {
          var _$this = $(this);
          var $child = $(this).next('.js-accordion-child');

          _$this.toggleClass('is-active');
          $child.toggleClass('is-active');
          // $child.slideToggle(300);
        });
      });
    }

    /*----------
    タブ切り換え
    link/tab
    ----------*/
    var setTab = function() {
      var $target = $('.js-tab');

      $target.each(function(){
        var $this = $(this);
        var _$target = $this.find('.js-tab-tab');
        var $child = $this.find('.js-tab-contents');

        _$target.on('click', function() {
          var _$this = $(this);
          var index = _$target.index(this);

          _$target.removeClass('is-active');
          _$this.addClass('is-active');
          $child.removeClass('is-active');
          $child.eq(index).addClass('is-active');
        });
      });
    }

    /*----------
    スムーススクロール Chrome 対応
    ----------*/
    var scrollElement = (function() {
      if ('scrollingElement' in document) {
        return document.scrollingElement;
      }
      // chromeの場合
      if (navigator.userAgent.indexOf('WebKit') != -1) {
        return document.body;
      }
      return document.documentElement;
    })();

    /*----------
    ページトップ
    ----------*/
    var setBackhead = function(){
      var $target = $('.js-backhead');
      var visiblePosition = 400;
      var classVisible = 'is-visible';

      $(window).on('scroll touchmove', function(){
        var scrollTop = $(window).scrollTop();
        if (scrollTop > visiblePosition) {
          $target.addClass(classVisible);
        } else {
          $target.removeClass(classVisible);
        }
      });
    }

    /*----------
    ヘッダーナビ
    ----------*/
    var setHeaderNav = function(){
      var $trigger = $('.js-gnav-trigger');
      var $target = $('.js-gnav');
      var $item = $('.js-gnav-item');
      var classHierarichical = 'is-hierarichical';
      var classOpen = 'is-open';
      var classHung= 'is-hung';

      // ハンバーガーメニュー開閉
      var _toggleNav = function(){
        $trigger.on('click', function(){
          $trigger.toggleClass(classOpen);
          $target.toggleClass(classOpen);
        });
      }

      // ハンバーガーメニュー内開閉
      var _toggleMenu = function(){
        $item.each(function(){
          var $this = $(this);
          var $itemTrigger = $this.find('.js-gnav-item-trigger');
          var $itemToggle = $this.find('.js-gnav-item-toggle');
          var $itemMenu = $this.find('.js-gnav-item-menu');

          if (!$itemMenu.length) return;

          // 子階層があればクラスを付与し、PC/SPでの挙動をバインド
          $itemTrigger.addClass(classHierarichical);

          // SPアコーディオン
          $itemToggle.on('click', function(){
            $itemToggle.toggleClass(classOpen);
            $itemMenu.toggleClass(classOpen);
          });

          // PC プルダウン
          $itemTrigger.children('a').on('mouseover', function(){
            var isEnabled = !($('html').hasClass('is-touch') || window.matchMedia('(max-width: 767px)').matches);
            if (isEnabled) $itemMenu.addClass(classHung);
          }).on('mouseout', function(){
            $itemMenu.removeClass(classHung);
          });
          $itemMenu.on('mouseover', function(){
            var isEnabled = !($('html').hasClass('is-touch') || window.matchMedia('(max-width: 767px)').matches);
            if (isEnabled) $itemMenu.addClass(classHung);
          }).on('mouseout', function(){
            $itemMenu.removeClass(classHung);
          });
        });
      }

      _toggleNav();
      _toggleMenu();
    }

    /*----------
    スムーススクロール
    ----------*/
    var setSmoothScroll = function(){
      var $target = $('.js-anchor');
      $target.on('click', function(e){
        e.preventDefault();
        var $destination = $($(this).attr('href'));

        if ($destination.length) {
          var pos = $destination.offset().top;
          $(scrollElement).animate({scrollTop: pos+'px'}, 400, 'swing');
        }
      });
    }

    /*----------
    実行
    ----------*/
    fixTouchDevice();

    $(function() {
      setAccordion();
      setTab();
      setHeaderNav();
      setBackhead();
      setSmoothScroll();
    });
  });
};
