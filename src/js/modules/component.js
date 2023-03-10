import $ from 'jquery';
import ScrollHint from 'scroll-hint'

export default () => {

  $(function () {
    /*----------
    タッチデバイス判定
    ----------*/
    var fixTouchDevice = function () {
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

      $target.each(function () {
        var $this = $(this);
        var _$target = $this.find('.js-accordion-parent');

        _$target.on('click', function () {
          var _$this = $(this);
          var $child = $(this).next('.js-accordion-child');

          _$this.toggleClass('is-active');
          $child.toggleClass('is-active');

          if (_$this.parent().hasClass('js-accordion_toggle')) {
            $child.slideToggle(300);
          }
          // $child.slideToggle(300);
        });
      });
    }

    /*----------
    タブ切り換え
    link/tab
    ----------*/
    var setTab = function () {
      var $target = $('.js-tab');

      $target.each(function () {
        var $this = $(this);
        var _$target = $this.find('.js-tab-tab');
        var $child = $this.find('.js-tab-contents');

        _$target.on('click', function () {
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
    var scrollElement = (function () {
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
    var setBackhead = function () {
      var $target = $('.js-backhead');
      var visiblePosition = 400;
      var classVisible = 'is-visible';

      $(window).on('scroll touchmove', function () {
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
    var setHeaderNav = function () {
      var $trigger = $('.js-gnav-trigger');
      var $target = $('.js-gnav, .header, main, body');
      var $item = $('.js-gnav-item');
      var classHierarichical = 'is-hierarichical';
      var classOpen = 'is-open';
      var classHung = 'is-hung';

      // ハンバーガーメニュー開閉
      var _toggleNav = function () {
        $trigger.on('click', function () {
          $trigger.toggleClass(classOpen);
          $target.toggleClass(classOpen);
        });
      }

      // ハンバーガーメニュー内開閉
      var _toggleMenu = function () {
        $item.each(function () {
          var $this = $(this);
          var $itemTrigger = $this.find('.js-gnav-item-trigger');
          var $itemToggle = $this.find('.js-gnav-item-toggle');
          var $itemMenu = $this.find('.js-gnav-item-menu');

          if (!$itemMenu.length) return;

          // 子階層があればクラスを付与し、PC/SPでの挙動をバインド
          $itemTrigger.addClass(classHierarichical);

          // SPアコーディオン
          $itemToggle.on('click', function () {
            $itemToggle.toggleClass(classOpen);
            $itemMenu.toggleClass(classOpen);
          });

          // PC プルダウン
          $itemTrigger.children('a').on('mouseover', function () {
            var isEnabled = !($('html').hasClass('is-touch') || window.matchMedia('(max-width: 767px)').matches);
            if (isEnabled) $itemMenu.addClass(classHung);
          }).on('mouseout', function () {
            $itemMenu.removeClass(classHung);
          });
          $itemMenu.on('mouseover', function () {
            var isEnabled = !($('html').hasClass('is-touch') || window.matchMedia('(max-width: 767px)').matches);
            if (isEnabled) $itemMenu.addClass(classHung);
          }).on('mouseout', function () {
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
    var setSmoothScroll = function () {
      var $target = $('.js-anchor');
      $target.on('click', function (e) {
        e.preventDefault();
        var $destination = $($(this).attr('href'));

        if ($destination.length) {
          var pos = $destination.offset().top;
          $(scrollElement).animate({ scrollTop: pos + 'px' }, 400, 'swing');
        }
      });
    }

    /*----------
    ヘッダーの家紋ロゴの描画切り替え
    ----------*/
    var switchLogo = function () {
      var $target = '.js-floatingMenu';
      var startPos = 0;

      $(window).on('scroll', function () {
        const currentPos = $(this).scrollTop();

        if (currentPos > startPos) {
          if ($(window).scrollTop() >= 200) {
            $($target).addClass('is-view');
          }
        } else if (currentPos < startPos) {
          $($target).removeClass('is-view');
        }
        startPos = currentPos;
      });
    }

    /*----------
    ヘッダーの色テーマの切り替え
    ----------*/
    var switchTheme = function () {
      $(function () {
        var pageTop = $('html, body');
        var secTopArr = new Array();
        var current = -1;
        var bgColorArr = new Array();

        $('section').each(function (i) {
          secTopArr[i] = $(this).offset().top;
          bgColorArr[i] = 'is-' + $(this).attr('data-color');
        });
        
        $(window).on('load scroll', function () {
          for (var i = secTopArr.length - 1; i >= 0; i--) {
            if ($(window).scrollTop() > secTopArr[i] - 100) {
              chengeBG(i);
              break;
            }
          }
        });
        
        function chengeBG(secNum) {
          if (secNum != current) {
            current = secNum;
            $('header').removeClass('is-light');
            $('header').removeClass('is-dark');
            $('header').addClass(bgColorArr[secNum]);
            // $('body').stop().animate({ backgroundColor: bgColor[current] }, 200);
          }
        }
      });
    }

    /*----------
    トップページ　スライダー
    ----------*/
    var topVisualSlider = function () {
      $(function () {
        var $target = $('.js-visual_slider');

        $target.on('init', function () {
          $('.slick-slide[data-slick-index="0"]').addClass('is-animation');
        }).slick({
          autoplay: true,
          fade: true,
          arrows: false,
          dots: true,
          speed: 6000,
          autoplaySpeed: 3000,
          pauseOnFocus: false,
          pauseOnHover: false,
          pauseOnDotsHover: false
        }).on( {
          beforeChange: function (event, slick, currentSlide, nextSlide) {
            $('.slick-slide', this).eq(nextSlide).addClass('is-animation');
            $('.slick-slide', this).eq(currentSlide).addClass('remove');
          },
          afterChange: function () {
            $('.remove', this).removeClass('remove is-animation');
          }
        });
      });
    }

    /*----------
    リンク
    ----------*/
    var linkFunc = function () {
      var $target = $('.js-expandlink');

      $target.on('click', function () {
        window.location = $(this).find('a').attr('href');
      });

      $('a').each(function () {
        let href = $(this).attr('href');
        let $target = $(this).attr('target');

        let link = href.match(/^https?:\/\//);
        if (link == null) return;
        if (typeof $target === 'undefined' || $target === false) return;
        if (href.indexOf(location.host) != -1) return;

        $(this).attr('target', '_blank');
        $(this).attr('rel', 'noreferrer noopener');
        $(this).addClass('js-outlink');
      });
    }

    /*----------
    カーソルカスタマイズ
    ----------*/
    var cursor = function () {
      const stalker = document.getElementById('js-stalker');
      let hovFlag = false;

      document.addEventListener('mousemove', function (e) {
        if (!hovFlag) {
          stalker.style.transform = 'translate(' + e.clientX + 'px, ' + e.clientY + 'px)';
        }
      });

      //対象外
      const linkElem = document.querySelectorAll('a:not(.no_stick_), a[href^=http]:not([target="_blank"])');

      for (let i = 0; i < linkElem.length; i++) {
        linkElem[i].addEventListener('mouseover', function (e) {
          // hovFlag = true;
          stalker.classList.add('hov_');
          // let rect = e.target.getBoundingClientRect();
          // let posX = rect.left + (rect.width / 2);
          // let posY = rect.top + (rect.height / 2);
          // stalker.style.transform = 'translate(' + posX + 'px, ' + posY + 'px)';
        });
        linkElem[i].addEventListener('mouseout', function (e) {
          // hovFlag = false;
          stalker.classList.remove('hov_');
        });
      }
    };

    /*----------
    SPテーブルアクセシビリティ
    ----------*/
    var scrollHint = function () {
      new ScrollHint('.js-scrollable', {
        scrollHintIconAppendClass: 'scroll-hint-icon-white',
        applyToParents: true,
        // suggestiveShadow: true,
        i18n: {
          scrollable: 'スクロールできます'
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
      switchLogo();
      switchTheme();
      // cursor();
      linkFunc();
      topVisualSlider();
      scrollHint();
    });
  });
};
