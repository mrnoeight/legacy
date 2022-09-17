/*!
 * Date picker for pickadate.js v3.5.6
 * http://amsul.github.io/pickadate.js/date.htm
 */
!function(e){"function"==typeof define&&define.amd?define(["picker","jquery"],e):"object"==typeof exports?module.exports=e(require("./picker.js"),require("jquery")):e(Picker,jQuery)}((function(e,t){function n(e,t){var n=this,a=e.$node[0],i=a.value,r=e.$node.data("value"),o=r||i,s=r?t.formatSubmit:t.format,l=function(){return a.currentStyle?"rtl"==a.currentStyle.direction:"rtl"==getComputedStyle(e.$root[0]).direction};n.settings=t,n.$node=e.$node,n.queue={min:"measure create",max:"measure create",now:"now create",select:"parse create validate",highlight:"parse navigate create validate",view:"parse create validate viewset",disable:"deactivate",enable:"activate"},n.item={},n.item.clear=null,n.item.disable=(t.disable||[]).slice(0),n.item.enable=-function(e){return!0===e[0]?e.shift():-1}(n.item.disable),n.set("min",t.min).set("max",t.max).set("now"),o?n.set("select",o,{format:s,defaultValue:!0}):n.set("select",null).set("highlight",n.item.now),n.key={40:7,38:-7,39:function(){return l()?-1:1},37:function(){return l()?1:-1},go:function(e){var t=n.item.highlight,a=new Date(t.year,t.month,t.date+e);n.set("highlight",a,{interval:e}),this.render()}},e.on("render",(function(){e.$root.find("."+t.klass.selectMonth).on("change",(function(){var n=this.value;n&&(e.set("highlight",[e.get("view").year,n,e.get("highlight").date]),e.$root.find("."+t.klass.selectMonth).trigger("focus"))})),e.$root.find("."+t.klass.selectYear).on("change",(function(){var n=this.value;n&&(e.set("highlight",[n,e.get("view").month,e.get("highlight").date]),e.$root.find("."+t.klass.selectYear).trigger("focus"))}))}),1).on("open",(function(){var a="";n.disabled(n.get("now"))&&(a=":not(."+t.klass.buttonToday+")"),e.$root.find("button"+a+", select").attr("disabled",!1)}),1).on("close",(function(){e.$root.find("button, select").attr("disabled",!0)}),1)}var a=e._;n.prototype.set=function(e,t,n){var a=this,i=a.item;return null===t?("clear"==e&&(e="select"),i[e]=t,a):(i["enable"==e?"disable":"flip"==e?"enable":e]=a.queue[e].split(" ").map((function(i){return t=a[i](e,t,n)})).pop(),"select"==e?a.set("highlight",i.select,n):"highlight"==e?a.set("view",i.highlight,n):e.match(/^(flip|min|max|disable|enable)$/)&&(i.select&&a.disabled(i.select)&&a.set("select",i.select,n),i.highlight&&a.disabled(i.highlight)&&a.set("highlight",i.highlight,n)),a)},n.prototype.get=function(e){return this.item[e]},n.prototype.create=function(e,n,i){var r,o=this;return(n=void 0===n?e:n)==-1/0||n==1/0?r=n:t.isPlainObject(n)&&a.isInteger(n.pick)?n=n.obj:t.isArray(n)?(n=new Date(n[0],n[1],n[2]),n=a.isDate(n)?n:o.create().obj):n=a.isInteger(n)||a.isDate(n)?o.normalize(new Date(n),i):o.now(e,n,i),{year:r||n.getFullYear(),month:r||n.getMonth(),date:r||n.getDate(),day:r||n.getDay(),obj:r||n,pick:r||n.getTime()}},n.prototype.createRange=function(e,n){var i=this,r=function(e){return!0===e||t.isArray(e)||a.isDate(e)?i.create(e):e};return a.isInteger(e)||(e=r(e)),a.isInteger(n)||(n=r(n)),a.isInteger(e)&&t.isPlainObject(n)?e=[n.year,n.month,n.date+e]:a.isInteger(n)&&t.isPlainObject(e)&&(n=[e.year,e.month,e.date+n]),{from:r(e),to:r(n)}},n.prototype.withinRange=function(e,t){return e=this.createRange(e.from,e.to),t.pick>=e.from.pick&&t.pick<=e.to.pick},n.prototype.overlapRanges=function(e,t){var n=this;return e=n.createRange(e.from,e.to),t=n.createRange(t.from,t.to),n.withinRange(e,t.from)||n.withinRange(e,t.to)||n.withinRange(t,e.from)||n.withinRange(t,e.to)},n.prototype.now=function(e,t,n){return t=new Date,n&&n.rel&&t.setDate(t.getDate()+n.rel),this.normalize(t,n)},n.prototype.navigate=function(e,n,a){var i,r,o,s,l=t.isArray(n),c=t.isPlainObject(n),d=this.item.view;if(l||c){for(c?(r=n.year,o=n.month,s=n.date):(r=+n[0],o=+n[1],s=+n[2]),a&&a.nav&&d&&d.month!==o&&(r=d.year,o=d.month),r=(i=new Date(r,o+(a&&a.nav?a.nav:0),1)).getFullYear(),o=i.getMonth();new Date(r,o,s).getMonth()!==o;)s-=1;n=[r,o,s]}return n},n.prototype.normalize=function(e){return e.setHours(0,0,0,0),e},n.prototype.measure=function(e,t){return t?"string"==typeof t?t=this.parse(e,t):a.isInteger(t)&&(t=this.now(e,t,{rel:t})):t="min"==e?-1/0:1/0,t},n.prototype.viewset=function(e,t){return this.create([t.year,t.month,1])},n.prototype.validate=function(e,n,i){var r,o,s,l,c=this,d=n,u=i&&i.interval?i.interval:1,h=-1===c.item.enable,f=c.item.min,m=c.item.max,p=h&&c.item.disable.filter((function(e){if(t.isArray(e)){var i=c.create(e).pick;i<n.pick?r=!0:i>n.pick&&(o=!0)}return a.isInteger(e)})).length;if((!i||!i.nav&&!i.defaultValue)&&(!h&&c.disabled(n)||h&&c.disabled(n)&&(p||r||o)||!h&&(n.pick<=f.pick||n.pick>=m.pick)))for(h&&!p&&(!o&&u>0||!r&&0>u)&&(u*=-1);c.disabled(n)&&(Math.abs(u)>1&&(n.month<d.month||n.month>d.month)&&(n=d,u=u>0?1:-1),n.pick<=f.pick?(s=!0,u=1,n=c.create([f.year,f.month,f.date+(n.pick===f.pick?0:-1)])):n.pick>=m.pick&&(l=!0,u=-1,n=c.create([m.year,m.month,m.date+(n.pick===m.pick?0:1)])),!s||!l);)n=c.create([n.year,n.month,n.date+u]);return n},n.prototype.disabled=function(e){var n=this,i=n.item.disable.filter((function(i){return a.isInteger(i)?e.day===(n.settings.firstDay?i:i-1)%7:t.isArray(i)||a.isDate(i)?e.pick===n.create(i).pick:t.isPlainObject(i)?n.withinRange(i,e):void 0}));return i=i.length&&!i.filter((function(e){return t.isArray(e)&&"inverted"==e[3]||t.isPlainObject(e)&&e.inverted})).length,-1===n.item.enable?!i:i||e.pick<n.item.min.pick||e.pick>n.item.max.pick},n.prototype.parse=function(e,t,n){var i=this,r={};return t&&"string"==typeof t?(n&&n.format||((n=n||{}).format=i.settings.format),i.formats.toArray(n.format).map((function(e){var n=i.formats[e],o=n?a.trigger(n,i,[t,r]):e.replace(/^!/,"").length;n&&(r[e]=t.substr(0,o)),t=t.substr(o)})),[r.yyyy||r.yy,+(r.mm||r.m)-1,r.dd||r.d]):t},n.prototype.formats=function(){function e(e,t,n){var a=e.match(/[^\x00-\x7F]+|\w+/)[0];return n.mm||n.m||(n.m=t.indexOf(a)+1),a.length}function t(e){return e.match(/\w+/)[0].length}return{d:function(e,t){return e?a.digits(e):t.date},dd:function(e,t){return e?2:a.lead(t.date)},ddd:function(e,n){return e?t(e):this.settings.weekdaysShort[n.day]},dddd:function(e,n){return e?t(e):this.settings.weekdaysFull[n.day]},m:function(e,t){return e?a.digits(e):t.month+1},mm:function(e,t){return e?2:a.lead(t.month+1)},mmm:function(t,n){var a=this.settings.monthsShort;return t?e(t,a,n):a[n.month]},mmmm:function(t,n){var a=this.settings.monthsFull;return t?e(t,a,n):a[n.month]},yy:function(e,t){return e?2:(""+t.year).slice(2)},yyyy:function(e,t){return e?4:t.year},toArray:function(e){return e.split(/(d{1,4}|m{1,4}|y{4}|yy|!.)/g)},toString:function(e,t){var n=this;return n.formats.toArray(e).map((function(e){return a.trigger(n.formats[e],n,[0,t])||e.replace(/^!/,"")})).join("")}}}(),n.prototype.isDateExact=function(e,n){var i=this;return a.isInteger(e)&&a.isInteger(n)||"boolean"==typeof e&&"boolean"==typeof n?e===n:(a.isDate(e)||t.isArray(e))&&(a.isDate(n)||t.isArray(n))?i.create(e).pick===i.create(n).pick:!(!t.isPlainObject(e)||!t.isPlainObject(n))&&(i.isDateExact(e.from,n.from)&&i.isDateExact(e.to,n.to))},n.prototype.isDateOverlap=function(e,n){var i=this,r=i.settings.firstDay?1:0;return a.isInteger(e)&&(a.isDate(n)||t.isArray(n))?(e=e%7+r)===i.create(n).day+1:a.isInteger(n)&&(a.isDate(e)||t.isArray(e))?(n=n%7+r)===i.create(e).day+1:!(!t.isPlainObject(e)||!t.isPlainObject(n))&&i.overlapRanges(e,n)},n.prototype.flipEnable=function(e){var t=this.item;t.enable=e||(-1==t.enable?1:-1)},n.prototype.deactivate=function(e,n){var i=this,r=i.item.disable.slice(0);return"flip"==n?i.flipEnable():!1===n?(i.flipEnable(1),r=[]):!0===n?(i.flipEnable(-1),r=[]):n.map((function(e){for(var n,o=0;o<r.length;o+=1)if(i.isDateExact(e,r[o])){n=!0;break}n||(a.isInteger(e)||a.isDate(e)||t.isArray(e)||t.isPlainObject(e)&&e.from&&e.to)&&r.push(e)})),r},n.prototype.activate=function(e,n){var i=this,r=i.item.disable,o=r.length;return"flip"==n?i.flipEnable():!0===n?(i.flipEnable(1),r=[]):!1===n?(i.flipEnable(-1),r=[]):n.map((function(e){var n,s,l,c;for(l=0;o>l;l+=1){if(s=r[l],i.isDateExact(s,e)){n=r[l]=null,c=!0;break}if(i.isDateOverlap(s,e)){t.isPlainObject(e)?(e.inverted=!0,n=e):t.isArray(e)?(n=e)[3]||n.push("inverted"):a.isDate(e)&&(n=[e.getFullYear(),e.getMonth(),e.getDate(),"inverted"]);break}}if(n)for(l=0;o>l;l+=1)if(i.isDateExact(r[l],e)){r[l]=null;break}if(c)for(l=0;o>l;l+=1)if(i.isDateOverlap(r[l],e)){r[l]=null;break}n&&r.push(n)})),r.filter((function(e){return null!=e}))},n.prototype.nodes=function(e){var t=this,n=t.settings,i=t.item,r=i.now,o=i.select,s=i.highlight,l=i.view,c=i.disable,d=i.min,u=i.max,h=function(e,t){return n.firstDay&&(e.push(e.shift()),t.push(t.shift())),a.node("thead",a.node("tr",a.group({min:0,max:6,i:1,node:"th",item:function(a){return[e[a],n.klass.weekdays,'scope=col title="'+t[a]+'"']}})))}((n.showWeekdaysFull?n.weekdaysFull:n.weekdaysShort).slice(0),n.weekdaysFull.slice(0)),f=function(e){return a.node("div"," ",n.klass["nav"+(e?"Next":"Prev")]+(e&&l.year>=u.year&&l.month>=u.month||!e&&l.year<=d.year&&l.month<=d.month?" "+n.klass.navDisabled:""),"data-nav="+(e||-1)+" "+a.ariaAttr({role:"button",controls:t.$node[0].id+"_table"})+' title="'+(e?n.labelMonthNext:n.labelMonthPrev)+'"')},m=function(){var i=n.showMonthsShort?n.monthsShort:n.monthsFull;return n.selectMonths?a.node("select",a.group({min:0,max:11,i:1,node:"option",item:function(e){return[i[e],0,"value="+e+(l.month==e?" selected":"")+(l.year==d.year&&e<d.month||l.year==u.year&&e>u.month?" disabled":"")]}}),n.klass.selectMonth,(e?"":"disabled")+" "+a.ariaAttr({controls:t.$node[0].id+"_table"})+' title="'+n.labelMonthSelect+'"'):a.node("div",i[l.month],n.klass.month)},p=function(){var i=l.year,r=!0===n.selectYears?5:~~(n.selectYears/2);if(r){var o=d.year,s=u.year,c=i-r,h=i+r;if(o>c&&(h+=o-c,c=o),h>s){var f=c-o,m=h-s;c-=f>m?m:f,h=s}return a.node("select",a.group({min:c,max:h,i:1,node:"option",item:function(e){return[e,0,"value="+e+(i==e?" selected":"")]}}),n.klass.selectYear,(e?"":"disabled")+" "+a.ariaAttr({controls:t.$node[0].id+"_table"})+' title="'+n.labelYearSelect+'"')}return a.node("div",i,n.klass.year)};return a.node("div",(n.selectYears?p()+m():m()+p())+f()+f(1),n.klass.header)+a.node("table",h+a.node("tbody",a.group({min:0,max:5,i:1,node:"tr",item:function(e){var i=n.firstDay&&0===t.create([l.year,l.month,1]).day?-7:0;return[a.group({min:7*e-l.day+i+1,max:function(){return this.min+7-1},i:1,node:"td",item:function(e){e=t.create([l.year,l.month,e+(n.firstDay?1:0)]);var i=o&&o.pick==e.pick,h=s&&s.pick==e.pick,f=c&&t.disabled(e)||e.pick<d.pick||e.pick>u.pick,m=a.trigger(t.formats.toString,t,[n.format,e]);return[a.node("div",e.date,function(t){return t.push(l.month==e.month?n.klass.infocus:n.klass.outfocus),r.pick==e.pick&&t.push(n.klass.now),i&&t.push(n.klass.selected),h&&t.push(n.klass.highlighted),f&&t.push(n.klass.disabled),t.join(" ")}([n.klass.day]),"data-pick="+e.pick+" "+a.ariaAttr({role:"gridcell",label:m,selected:!(!i||t.$node.val()!==m)||null,activedescendant:!!h||null,disabled:!!f||null})),"",a.ariaAttr({role:"presentation"})]}})]}})),n.klass.table,'id="'+t.$node[0].id+'_table" '+a.ariaAttr({role:"grid",controls:t.$node[0].id,readonly:!0}))+a.node("div",a.node("button",n.today,n.klass.buttonToday,"type=button data-pick="+r.pick+(e&&!t.disabled(r)?"":" disabled")+" "+a.ariaAttr({controls:t.$node[0].id}))+a.node("button",n.clear,n.klass.buttonClear,"type=button data-clear=1"+(e?"":" disabled")+" "+a.ariaAttr({controls:t.$node[0].id}))+a.node("button",n.close,n.klass.buttonClose,"type=button data-close=true "+(e?"":" disabled")+" "+a.ariaAttr({controls:t.$node[0].id})),n.klass.footer)},n.defaults=function(e){return{labelMonthNext:"Next month",labelMonthPrev:"Previous month",labelMonthSelect:"Select a month",labelYearSelect:"Select a year",monthsFull:["January","February","March","April","May","June","July","August","September","October","November","December"],monthsShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],weekdaysFull:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],weekdaysShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],today:"Today",clear:"Clear",close:"Close",closeOnSelect:!0,closeOnClear:!0,format:"d mmmm, yyyy",klass:{table:e+"table",header:e+"header",navPrev:e+"nav--prev",navNext:e+"nav--next",navDisabled:e+"nav--disabled",month:e+"month",year:e+"year",selectMonth:e+"select--month",selectYear:e+"select--year",weekdays:e+"weekday",day:e+"day",disabled:e+"day--disabled",selected:e+"day--selected",highlighted:e+"day--highlighted",now:e+"day--today",infocus:e+"day--infocus",outfocus:e+"day--outfocus",footer:e+"footer",buttonClear:e+"button--clear",buttonToday:e+"button--today",buttonClose:e+"button--close"}}}(e.klasses().picker+"__"),e.extend("pickadate",n)}));