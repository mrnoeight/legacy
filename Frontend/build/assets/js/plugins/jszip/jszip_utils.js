/*!

JSZipUtils - A collection of cross-browser utilities to go along with JSZip.
<http://stuk.github.io/jszip-utils>

(c) 2014 Stuart Knightley, David Duponchel
Dual licenced under the MIT license or GPLv3. See https://raw.github.com/Stuk/jszip-utils/master/LICENSE.markdown.

*/
!function(e){"object"==typeof exports?module.exports=e():"function"==typeof define&&define.amd?define(e):"undefined"!=typeof window?window.JSZipUtils=e():"undefined"!=typeof global?global.JSZipUtils=e():"undefined"!=typeof self&&(self.JSZipUtils=e())}((function(){return function e(t,r,n){function o(u,f){if(!r[u]){if(!t[u]){var s="function"==typeof require&&require;if(!f&&s)return s(u,!0);if(i)return i(u,!0);throw new Error("Cannot find module '"+u+"'")}var a=r[u]={exports:{}};t[u][0].call(a.exports,(function(e){var r=t[u][1][e];return o(r||e)}),a,a.exports,e,t,r,n)}return r[u].exports}for(var i="function"==typeof require&&require,u=0;u<n.length;u++)o(n[u]);return o}({1:[function(e,t,r){"use strict";var n={};function o(){try{return new window.XMLHttpRequest}catch(e){}}n._getBinaryFromXHR=function(e){return e.response||e.responseText};var i=window.ActiveXObject?function(){return o()||function(){try{return new window.ActiveXObject("Microsoft.XMLHTTP")}catch(e){}}()}:o;n.getBinaryContent=function(e,t){try{var r=i();r.open("GET",e,!0),"responseType"in r&&(r.responseType="arraybuffer"),r.overrideMimeType&&r.overrideMimeType("text/plain; charset=x-user-defined"),r.onreadystatechange=function(o){var i,u;if(4===r.readyState)if(200===r.status||0===r.status){i=null,u=null;try{i=n._getBinaryFromXHR(r)}catch(e){u=new Error(e)}t(u,i)}else t(new Error("Ajax error for "+e+" : "+this.status+" "+this.statusText),null)},r.send()}catch(e){t(new Error(e),null)}},t.exports=n},{}]},{},[1])(1)}));