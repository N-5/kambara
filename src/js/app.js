import 'jquery';
import 'svgxuse';
import '@babel/polyfill';
import 'slick-slider';
import $ from 'jquery';

// import './splash.js';
import loading from './modules/loading';
import component from './modules/component';
import inview from './modules/inview';

export default [
  loading(),
  component(),
  inview()
];