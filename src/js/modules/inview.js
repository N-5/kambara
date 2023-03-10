import $ from 'jquery';
import 'jquery-inview';

export default () => {
  const fadeIn = '[data-fade]';
  const viewIn = '[data-inviewin]';

  $(function () {
    $(fadeIn).on('inview', function (event, isInView) {
      if (isInView) {
        $(this).addClass('js-fadein');
      } else {
        //    $(this).removeClass('js-active');
      }
    });

    $(viewIn).on('inview', function (event, isInView) {
      if (isInView) {
        $(this).addClass('js-active');
      } else {
        //    $(this).removeClass('js-active');
      }
    });
  });
};
