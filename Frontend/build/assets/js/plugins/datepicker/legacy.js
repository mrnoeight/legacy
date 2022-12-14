/*!
 * Legacy browser support
 */
[].map||(Array.prototype.map=function(t,e){for(var r=this,n=r.length,i=new Array(n),o=0;n>o;o++)o in r&&(i[o]=t.call(e,r[o],o,r));return i}),[].filter||(Array.prototype.filter=function(t){if(null==this)throw new TypeError;var e=Object(this),r=e.length>>>0;if("function"!=typeof t)throw new TypeError;for(var n=[],i=arguments[1],o=0;r>o;o++)if(o in e){var l=e[o];t.call(i,l,o,e)&&n.push(l)}return n}),[].indexOf||(Array.prototype.indexOf=function(t){if(null==this)throw new TypeError;var e=Object(this),r=e.length>>>0;if(0===r)return-1;var n=0;if(arguments.length>1&&((n=Number(arguments[1]))!=n?n=0:0!==n&&n!=1/0&&n!=-1/0&&(n=(n>0||-1)*Math.floor(Math.abs(n)))),n>=r)return-1;for(var i=n>=0?n:Math.max(r-Math.abs(n),0);r>i;i++)if(i in e&&e[i]===t)return i;return-1});
/*!
 * Cross-Browser Split 1.1.1
 * Copyright 2007-2012 Steven Levithan <stevenlevithan.com>
 * Available under the MIT License
 * http://blog.stevenlevithan.com/archives/cross-browser-split
 */
var nativeSplit=String.prototype.split,compliantExecNpcg=void 0===/()??/.exec("")[1];String.prototype.split=function(t,e){var r=this;if("[object RegExp]"!==Object.prototype.toString.call(t))return nativeSplit.call(r,t,e);var n,i,o,l,p=[],a=(t.ignoreCase?"i":"")+(t.multiline?"m":"")+(t.extended?"x":"")+(t.sticky?"y":""),c=0;for(t=new RegExp(t.source,a+"g"),r+="",compliantExecNpcg||(n=new RegExp("^"+t.source+"$(?!\\s)",a)),e=void 0===e?-1>>>0:e>>>0;(i=t.exec(r))&&!((o=i.index+i[0].length)>c&&(p.push(r.slice(c,i.index)),!compliantExecNpcg&&i.length>1&&i[0].replace(n,(function(){for(var t=1;t<arguments.length-2;t++)void 0===arguments[t]&&(i[t]=void 0)})),i.length>1&&i.index<r.length&&Array.prototype.push.apply(p,i.slice(1)),l=i[0].length,c=o,p.length>=e));)t.lastIndex===i.index&&t.lastIndex++;return c===r.length?(l||!t.test(""))&&p.push(""):p.push(r.slice(c)),p.length>e?p.slice(0,e):p};