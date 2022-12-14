//This file include:
//js/plugins/tweenmax/TweenMax.min.js 
//js/plugins/digitop/helper.js 
//js/plugins/digitop/popup.js 
//js/plugins/digitop/preloader.js 

var _gsScope="undefined"!=typeof module&&module.exports&&"undefined"!=typeof global?global:this||window;(_gsScope._gsQueue||(_gsScope._gsQueue=[])).push(function(){"use strict";_gsScope._gsDefine("TweenMax",["core.Animation","core.SimpleTimeline","TweenLite"],function(t,e,i){var s=function(t){var e,i=[],s=t.length;for(e=0;e!==s;i.push(t[e++]));return i},r=function(t,e,i){var s,r,n=t.cycle;for(s in n)r=n[s],t[s]="function"==typeof r?r.call(e[i],i):r[i%r.length];delete t.cycle},n=function(t,e,s){i.call(this,t,e,s),this._cycle=0,this._yoyo=!0===this.vars.yoyo,this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._dirty=!0,this.render=n.prototype.render},a=i._internals,o=a.isSelector,l=a.isArray,h=n.prototype=i.to({},.1,{}),_=[];n.version="1.18.2",h.constructor=n,h.kill()._gc=!1,n.killTweensOf=n.killDelayedCallsTo=i.killTweensOf,n.getTweensOf=i.getTweensOf,n.lagSmoothing=i.lagSmoothing,n.ticker=i.ticker,n.render=i.render,h.invalidate=function(){return this._yoyo=!0===this.vars.yoyo,this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._uncache(!0),i.prototype.invalidate.call(this)},h.updateTo=function(t,e){var s,r=this.ratio,n=this.vars.immediateRender||t.immediateRender;e&&this._startTime<this._timeline._time&&(this._startTime=this._timeline._time,this._uncache(!1),this._gc?this._enabled(!0,!1):this._timeline.insert(this,this._startTime-this._delay));for(s in t)this.vars[s]=t[s];if(this._initted||n)if(e)this._initted=!1,n&&this.render(0,!0,!0);else if(this._gc&&this._enabled(!0,!1),this._notifyPluginsOfEnabled&&this._firstPT&&i._onPluginEvent("_onDisable",this),this._time/this._duration>.998){var a=this._totalTime;this.render(0,!0,!1),this._initted=!1,this.render(a,!0,!1)}else if(this._initted=!1,this._init(),this._time>0||n)for(var o,l=1/(1-r),h=this._firstPT;h;)o=h.s+h.c,h.c*=l,h.s=o-h.c,h=h._next;return this},h.render=function(t,e,i){this._initted||0===this._duration&&this.vars.repeat&&this.invalidate();var s,r,n,o,l,h,_,u,f=this._dirty?this.totalDuration():this._totalDuration,c=this._time,p=this._totalTime,d=this._cycle,m=this._duration,g=this._rawPrevTime;if(t>=f-1e-7?(this._totalTime=f,this._cycle=this._repeat,this._yoyo&&0!=(1&this._cycle)?(this._time=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0):(this._time=m,this.ratio=this._ease._calcEnd?this._ease.getRatio(1):1),this._reversed||(s=!0,r="onComplete",i=i||this._timeline.autoRemoveChildren),0===m&&(this._initted||!this.vars.lazy||i)&&(this._startTime===this._timeline._duration&&(t=0),(g<0||t<=0&&t>=-1e-7||1e-10===g&&"isPause"!==this.data)&&g!==t&&(i=!0,g>1e-10&&(r="onReverseComplete")),this._rawPrevTime=u=!e||t||g===t?t:1e-10)):t<1e-7?(this._totalTime=this._time=this._cycle=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0,(0!==p||0===m&&g>0)&&(r="onReverseComplete",s=this._reversed),t<0&&(this._active=!1,0===m&&(this._initted||!this.vars.lazy||i)&&(g>=0&&(i=!0),this._rawPrevTime=u=!e||t||g===t?t:1e-10)),this._initted||(i=!0)):(this._totalTime=this._time=t,0!==this._repeat&&(o=m+this._repeatDelay,this._cycle=this._totalTime/o>>0,0!==this._cycle&&this._cycle===this._totalTime/o&&this._cycle--,this._time=this._totalTime-this._cycle*o,this._yoyo&&0!=(1&this._cycle)&&(this._time=m-this._time),this._time>m?this._time=m:this._time<0&&(this._time=0)),this._easeType?(l=this._time/m,h=this._easeType,_=this._easePower,(1===h||3===h&&l>=.5)&&(l=1-l),3===h&&(l*=2),1===_?l*=l:2===_?l*=l*l:3===_?l*=l*l*l:4===_&&(l*=l*l*l*l),1===h?this.ratio=1-l:2===h?this.ratio=l:this._time/m<.5?this.ratio=l/2:this.ratio=1-l/2):this.ratio=this._ease.getRatio(this._time/m)),c===this._time&&!i&&d===this._cycle)return void(p!==this._totalTime&&this._onUpdate&&(e||this._callback("onUpdate")));if(!this._initted){if(this._init(),!this._initted||this._gc)return;if(!i&&this._firstPT&&(!1!==this.vars.lazy&&this._duration||this.vars.lazy&&!this._duration))return this._time=c,this._totalTime=p,this._rawPrevTime=g,this._cycle=d,a.lazyTweens.push(this),void(this._lazy=[t,e]);this._time&&!s?this.ratio=this._ease.getRatio(this._time/m):s&&this._ease._calcEnd&&(this.ratio=this._ease.getRatio(0===this._time?0:1))}for(!1!==this._lazy&&(this._lazy=!1),this._active||!this._paused&&this._time!==c&&t>=0&&(this._active=!0),0===p&&(2===this._initted&&t>0&&this._init(),this._startAt&&(t>=0?this._startAt.render(t,e,i):r||(r="_dummyGS")),this.vars.onStart&&(0===this._totalTime&&0!==m||e||this._callback("onStart"))),n=this._firstPT;n;)n.f?n.t[n.p](n.c*this.ratio+n.s):n.t[n.p]=n.c*this.ratio+n.s,n=n._next;this._onUpdate&&(t<0&&this._startAt&&this._startTime&&this._startAt.render(t,e,i),e||(this._totalTime!==p||s)&&this._callback("onUpdate")),this._cycle!==d&&(e||this._gc||this.vars.onRepeat&&this._callback("onRepeat")),r&&(this._gc&&!i||(t<0&&this._startAt&&!this._onUpdate&&this._startTime&&this._startAt.render(t,e,i),s&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[r]&&this._callback(r),0===m&&1e-10===this._rawPrevTime&&1e-10!==u&&(this._rawPrevTime=0)))},n.to=function(t,e,i){return new n(t,e,i)},n.from=function(t,e,i){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,new n(t,e,i)},n.fromTo=function(t,e,i,s){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,new n(t,e,s)},n.staggerTo=n.allTo=function(t,e,a,h,u,f,c){h=h||0;var p,d,m,g,v=0,y=[],T=function(){a.onComplete&&a.onComplete.apply(a.onCompleteScope||this,arguments),u.apply(c||a.callbackScope||this,f||_)},x=a.cycle,b=a.startAt&&a.startAt.cycle;for(l(t)||("string"==typeof t&&(t=i.selector(t)||t),o(t)&&(t=s(t))),t=t||[],h<0&&(t=s(t),t.reverse(),h*=-1),p=t.length-1,m=0;m<=p;m++){d={};for(g in a)d[g]=a[g];if(x&&r(d,t,m),b){b=d.startAt={};for(g in a.startAt)b[g]=a.startAt[g];r(d.startAt,t,m)}d.delay=v+(d.delay||0),m===p&&u&&(d.onComplete=T),y[m]=new n(t[m],e,d),v+=h}return y},n.staggerFrom=n.allFrom=function(t,e,i,s,r,a,o){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,n.staggerTo(t,e,i,s,r,a,o)},n.staggerFromTo=n.allFromTo=function(t,e,i,s,r,a,o,l){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,n.staggerTo(t,e,s,r,a,o,l)},n.delayedCall=function(t,e,i,s,r){return new n(e,0,{delay:t,onComplete:e,onCompleteParams:i,callbackScope:s,onReverseComplete:e,onReverseCompleteParams:i,immediateRender:!1,useFrames:r,overwrite:0})},n.set=function(t,e){return new n(t,0,e)},n.isTweening=function(t){return i.getTweensOf(t,!0).length>0};var u=function(t,e){for(var s=[],r=0,n=t._first;n;)n instanceof i?s[r++]=n:(e&&(s[r++]=n),s=s.concat(u(n,e)),r=s.length),n=n._next;return s},f=n.getAllTweens=function(e){return u(t._rootTimeline,e).concat(u(t._rootFramesTimeline,e))};n.killAll=function(t,i,s,r){null==i&&(i=!0),null==s&&(s=!0);var n,a,o,l=f(0!=r),h=l.length,_=i&&s&&r;for(o=0;o<h;o++)a=l[o],(_||a instanceof e||(n=a.target===a.vars.onComplete)&&s||i&&!n)&&(t?a.totalTime(a._reversed?0:a.totalDuration()):a._enabled(!1,!1))},n.killChildTweensOf=function(t,e){if(null!=t){var r,h,_,u,f,c=a.tweenLookup;if("string"==typeof t&&(t=i.selector(t)||t),o(t)&&(t=s(t)),l(t))for(u=t.length;--u>-1;)n.killChildTweensOf(t[u],e);else{r=[];for(_ in c)for(h=c[_].target.parentNode;h;)h===t&&(r=r.concat(c[_].tweens)),h=h.parentNode;for(f=r.length,u=0;u<f;u++)e&&r[u].totalTime(r[u].totalDuration()),r[u]._enabled(!1,!1)}}};var c=function(t,i,s,r){i=!1!==i,s=!1!==s,r=!1!==r;for(var n,a,o=f(r),l=i&&s&&r,h=o.length;--h>-1;)a=o[h],(l||a instanceof e||(n=a.target===a.vars.onComplete)&&s||i&&!n)&&a.paused(t)};return n.pauseAll=function(t,e,i){c(!0,t,e,i)},n.resumeAll=function(t,e,i){c(!1,t,e,i)},n.globalTimeScale=function(e){var s=t._rootTimeline,r=i.ticker.time;return arguments.length?(e=e||1e-10,s._startTime=r-(r-s._startTime)*s._timeScale/e,s=t._rootFramesTimeline,r=i.ticker.frame,s._startTime=r-(r-s._startTime)*s._timeScale/e,s._timeScale=t._rootTimeline._timeScale=e,e):s._timeScale},h.progress=function(t){return arguments.length?this.totalTime(this.duration()*(this._yoyo&&0!=(1&this._cycle)?1-t:t)+this._cycle*(this._duration+this._repeatDelay),!1):this._time/this.duration()},h.totalProgress=function(t){return arguments.length?this.totalTime(this.totalDuration()*t,!1):this._totalTime/this.totalDuration()},h.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),t>this._duration&&(t=this._duration),this._yoyo&&0!=(1&this._cycle)?t=this._duration-t+this._cycle*(this._duration+this._repeatDelay):0!==this._repeat&&(t+=this._cycle*(this._duration+this._repeatDelay)),this.totalTime(t,e)):this._time},h.duration=function(e){return arguments.length?t.prototype.duration.call(this,e):this._duration},h.totalDuration=function(t){return arguments.length?-1===this._repeat?this:this.duration((t-this._repeat*this._repeatDelay)/(this._repeat+1)):(this._dirty&&(this._totalDuration=-1===this._repeat?999999999999:this._duration*(this._repeat+1)+this._repeatDelay*this._repeat,this._dirty=!1),this._totalDuration)},h.repeat=function(t){return arguments.length?(this._repeat=t,this._uncache(!0)):this._repeat},h.repeatDelay=function(t){return arguments.length?(this._repeatDelay=t,this._uncache(!0)):this._repeatDelay},h.yoyo=function(t){return arguments.length?(this._yoyo=t,this):this._yoyo},n},!0),_gsScope._gsDefine("TimelineLite",["core.Animation","core.SimpleTimeline","TweenLite"],function(t,e,i){var s=function(t){e.call(this,t),this._labels={},this.autoRemoveChildren=!0===this.vars.autoRemoveChildren,this.smoothChildTiming=!0===this.vars.smoothChildTiming,this._sortChildren=!0,this._onUpdate=this.vars.onUpdate;var i,s,r=this.vars;for(s in r)i=r[s],o(i)&&-1!==i.join("").indexOf("{self}")&&(r[s]=this._swapSelfInParams(i));o(r.tweens)&&this.add(r.tweens,0,r.align,r.stagger)},r=i._internals,n=s._internals={},a=r.isSelector,o=r.isArray,l=r.lazyTweens,h=r.lazyRender,_=_gsScope._gsDefine.globals,u=function(t){var e,i={};for(e in t)i[e]=t[e];return i},f=function(t,e,i){var s,r,n=t.cycle;for(s in n)r=n[s],t[s]="function"==typeof r?r.call(e[i],i):r[i%r.length];delete t.cycle},c=n.pauseCallback=function(){},p=function(t){var e,i=[],s=t.length;for(e=0;e!==s;i.push(t[e++]));return i},d=s.prototype=new e;return s.version="1.18.2",d.constructor=s,d.kill()._gc=d._forcingPlayhead=d._hasPause=!1,d.to=function(t,e,s,r){var n=s.repeat&&_.TweenMax||i;return e?this.add(new n(t,e,s),r):this.set(t,s,r)},d.from=function(t,e,s,r){return this.add((s.repeat&&_.TweenMax||i).from(t,e,s),r)},d.fromTo=function(t,e,s,r,n){var a=r.repeat&&_.TweenMax||i;return e?this.add(a.fromTo(t,e,s,r),n):this.set(t,r,n)},d.staggerTo=function(t,e,r,n,o,l,h,_){var c,d,m=new s({onComplete:l,onCompleteParams:h,callbackScope:_,smoothChildTiming:this.smoothChildTiming}),g=r.cycle;for("string"==typeof t&&(t=i.selector(t)||t),t=t||[],a(t)&&(t=p(t)),n=n||0,n<0&&(t=p(t),t.reverse(),n*=-1),d=0;d<t.length;d++)c=u(r),c.startAt&&(c.startAt=u(c.startAt),c.startAt.cycle&&f(c.startAt,t,d)),g&&f(c,t,d),m.to(t[d],e,c,d*n);return this.add(m,o)},d.staggerFrom=function(t,e,i,s,r,n,a,o){return i.immediateRender=0!=i.immediateRender,i.runBackwards=!0,this.staggerTo(t,e,i,s,r,n,a,o)},d.staggerFromTo=function(t,e,i,s,r,n,a,o,l){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,this.staggerTo(t,e,s,r,n,a,o,l)},d.call=function(t,e,s,r){return this.add(i.delayedCall(0,t,e,s),r)},d.set=function(t,e,s){return s=this._parseTimeOrLabel(s,0,!0),null==e.immediateRender&&(e.immediateRender=s===this._time&&!this._paused),this.add(new i(t,0,e),s)},s.exportRoot=function(t,e){t=t||{},null==t.smoothChildTiming&&(t.smoothChildTiming=!0);var r,n,a=new s(t),o=a._timeline;for(null==e&&(e=!0),o._remove(a,!0),a._startTime=0,a._rawPrevTime=a._time=a._totalTime=o._time,r=o._first;r;)n=r._next,e&&r instanceof i&&r.target===r.vars.onComplete||a.add(r,r._startTime-r._delay),r=n;return o.add(a,0),a},d.add=function(r,n,a,l){var h,_,u,f,c,p;if("number"!=typeof n&&(n=this._parseTimeOrLabel(n,0,!0,r)),!(r instanceof t)){if(r instanceof Array||r&&r.push&&o(r)){for(a=a||"normal",l=l||0,h=n,_=r.length,u=0;u<_;u++)o(f=r[u])&&(f=new s({tweens:f})),this.add(f,h),"string"!=typeof f&&"function"!=typeof f&&("sequence"===a?h=f._startTime+f.totalDuration()/f._timeScale:"start"===a&&(f._startTime-=f.delay())),h+=l;return this._uncache(!0)}if("string"==typeof r)return this.addLabel(r,n);if("function"!=typeof r)throw"Cannot add "+r+" into the timeline; it is not a tween, timeline, function, or string.";r=i.delayedCall(0,r)}if(e.prototype.add.call(this,r,n),(this._gc||this._time===this._duration)&&!this._paused&&this._duration<this.duration())for(c=this,p=c.rawTime()>r._startTime;c._timeline;)p&&c._timeline.smoothChildTiming?c.totalTime(c._totalTime,!0):c._gc&&c._enabled(!0,!1),c=c._timeline;return this},d.remove=function(e){if(e instanceof t){this._remove(e,!1);var i=e._timeline=e.vars.useFrames?t._rootFramesTimeline:t._rootTimeline;return e._startTime=(e._paused?e._pauseTime:i._time)-(e._reversed?e.totalDuration()-e._totalTime:e._totalTime)/e._timeScale,this}if(e instanceof Array||e&&e.push&&o(e)){for(var s=e.length;--s>-1;)this.remove(e[s]);return this}return"string"==typeof e?this.removeLabel(e):this.kill(null,e)},d._remove=function(t,i){e.prototype._remove.call(this,t,i);var s=this._last;return s?this._time>s._startTime+s._totalDuration/s._timeScale&&(this._time=this.duration(),this._totalTime=this._totalDuration):this._time=this._totalTime=this._duration=this._totalDuration=0,this},d.append=function(t,e){return this.add(t,this._parseTimeOrLabel(null,e,!0,t))},d.insert=d.insertMultiple=function(t,e,i,s){return this.add(t,e||0,i,s)},d.appendMultiple=function(t,e,i,s){return this.add(t,this._parseTimeOrLabel(null,e,!0,t),i,s)},d.addLabel=function(t,e){return this._labels[t]=this._parseTimeOrLabel(e),this},d.addPause=function(t,e,s,r){var n=i.delayedCall(0,c,s,r||this);return n.vars.onComplete=n.vars.onReverseComplete=e,n.data="isPause",this._hasPause=!0,this.add(n,t)},d.removeLabel=function(t){return delete this._labels[t],this},d.getLabelTime=function(t){return null!=this._labels[t]?this._labels[t]:-1},d._parseTimeOrLabel=function(e,i,s,r){var n;if(r instanceof t&&r.timeline===this)this.remove(r);else if(r&&(r instanceof Array||r.push&&o(r)))for(n=r.length;--n>-1;)r[n]instanceof t&&r[n].timeline===this&&this.remove(r[n]);if("string"==typeof i)return this._parseTimeOrLabel(i,s&&"number"==typeof e&&null==this._labels[i]?e-this.duration():0,s);if(i=i||0,"string"!=typeof e||!isNaN(e)&&null==this._labels[e])null==e&&(e=this.duration());else{if(-1===(n=e.indexOf("=")))return null==this._labels[e]?s?this._labels[e]=this.duration()+i:i:this._labels[e]+i;i=parseInt(e.charAt(n-1)+"1",10)*Number(e.substr(n+1)),e=n>1?this._parseTimeOrLabel(e.substr(0,n-1),0,s):this.duration()}return Number(e)+i},d.seek=function(t,e){return this.totalTime("number"==typeof t?t:this._parseTimeOrLabel(t),!1!==e)},d.stop=function(){return this.paused(!0)},d.gotoAndPlay=function(t,e){return this.play(t,e)},d.gotoAndStop=function(t,e){return this.pause(t,e)},d.render=function(t,e,i){this._gc&&this._enabled(!0,!1);var s,r,n,a,o,_,u,f=this._dirty?this.totalDuration():this._totalDuration,c=this._time,p=this._startTime,d=this._timeScale,m=this._paused;if(t>=f-1e-7)this._totalTime=this._time=f,this._reversed||this._hasPausedChild()||(r=!0,a="onComplete",o=!!this._timeline.autoRemoveChildren,0===this._duration&&(t<=0&&t>=-1e-7||this._rawPrevTime<0||1e-10===this._rawPrevTime)&&this._rawPrevTime!==t&&this._first&&(o=!0,this._rawPrevTime>1e-10&&(a="onReverseComplete"))),this._rawPrevTime=this._duration||!e||t||this._rawPrevTime===t?t:1e-10,t=f+1e-4;else if(t<1e-7)if(this._totalTime=this._time=0,(0!==c||0===this._duration&&1e-10!==this._rawPrevTime&&(this._rawPrevTime>0||t<0&&this._rawPrevTime>=0))&&(a="onReverseComplete",r=this._reversed),t<0)this._active=!1,this._timeline.autoRemoveChildren&&this._reversed?(o=r=!0,a="onReverseComplete"):this._rawPrevTime>=0&&this._first&&(o=!0),this._rawPrevTime=t;else{if(this._rawPrevTime=this._duration||!e||t||this._rawPrevTime===t?t:1e-10,0===t&&r)for(s=this._first;s&&0===s._startTime;)s._duration||(r=!1),s=s._next;t=0,this._initted||(o=!0)}else{if(this._hasPause&&!this._forcingPlayhead&&!e){if(t>=c)for(s=this._first;s&&s._startTime<=t&&!_;)s._duration||"isPause"!==s.data||s.ratio||0===s._startTime&&0===this._rawPrevTime||(_=s),s=s._next;else for(s=this._last;s&&s._startTime>=t&&!_;)s._duration||"isPause"===s.data&&s._rawPrevTime>0&&(_=s),s=s._prev;_&&(this._time=t=_._startTime,this._totalTime=t+this._cycle*(this._totalDuration+this._repeatDelay))}this._totalTime=this._time=this._rawPrevTime=t}if(this._time!==c&&this._first||i||o||_){if(this._initted||(this._initted=!0),this._active||!this._paused&&this._time!==c&&t>0&&(this._active=!0),0===c&&this.vars.onStart&&0!==this._time&&(e||this._callback("onStart")),(u=this._time)>=c)for(s=this._first;s&&(n=s._next,u===this._time&&(!this._paused||m));)(s._active||s._startTime<=u&&!s._paused&&!s._gc)&&(_===s&&this.pause(),s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=n;else for(s=this._last;s&&(n=s._prev,u===this._time&&(!this._paused||m));){if(s._active||s._startTime<=c&&!s._paused&&!s._gc){if(_===s){for(_=s._prev;_&&_.endTime()>this._time;)_.render(_._reversed?_.totalDuration()-(t-_._startTime)*_._timeScale:(t-_._startTime)*_._timeScale,e,i),_=_._prev;_=null,this.pause()}s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)}s=n}this._onUpdate&&(e||(l.length&&h(),this._callback("onUpdate"))),a&&(this._gc||p!==this._startTime&&d===this._timeScale||(0===this._time||f>=this.totalDuration())&&(r&&(l.length&&h(),this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[a]&&this._callback(a)))}},d._hasPausedChild=function(){for(var t=this._first;t;){if(t._paused||t instanceof s&&t._hasPausedChild())return!0;t=t._next}return!1},d.getChildren=function(t,e,s,r){r=r||-9999999999;for(var n=[],a=this._first,o=0;a;)a._startTime<r||(a instanceof i?!1!==e&&(n[o++]=a):(!1!==s&&(n[o++]=a),!1!==t&&(n=n.concat(a.getChildren(!0,e,s)),o=n.length))),a=a._next;return n},d.getTweensOf=function(t,e){var s,r,n=this._gc,a=[],o=0;for(n&&this._enabled(!0,!0),s=i.getTweensOf(t),r=s.length;--r>-1;)(s[r].timeline===this||e&&this._contains(s[r]))&&(a[o++]=s[r]);return n&&this._enabled(!1,!0),a},d.recent=function(){return this._recent},d._contains=function(t){for(var e=t.timeline;e;){if(e===this)return!0;e=e.timeline}return!1},d.shiftChildren=function(t,e,i){i=i||0;for(var s,r=this._first,n=this._labels;r;)r._startTime>=i&&(r._startTime+=t),r=r._next;if(e)for(s in n)n[s]>=i&&(n[s]+=t);return this._uncache(!0)},d._kill=function(t,e){if(!t&&!e)return this._enabled(!1,!1);for(var i=e?this.getTweensOf(e):this.getChildren(!0,!0,!1),s=i.length,r=!1;--s>-1;)i[s]._kill(t,e)&&(r=!0);return r},d.clear=function(t){var e=this.getChildren(!1,!0,!0),i=e.length;for(this._time=this._totalTime=0;--i>-1;)e[i]._enabled(!1,!1);return!1!==t&&(this._labels={}),this._uncache(!0)},d.invalidate=function(){for(var e=this._first;e;)e.invalidate(),e=e._next;return t.prototype.invalidate.call(this)},d._enabled=function(t,i){if(t===this._gc)for(var s=this._first;s;)s._enabled(t,!0),s=s._next;return e.prototype._enabled.call(this,t,i)},d.totalTime=function(e,i,s){this._forcingPlayhead=!0;var r=t.prototype.totalTime.apply(this,arguments);return this._forcingPlayhead=!1,r},d.duration=function(t){return arguments.length?(0!==this.duration()&&0!==t&&this.timeScale(this._duration/t),this):(this._dirty&&this.totalDuration(),this._duration)},d.totalDuration=function(t){if(!arguments.length){if(this._dirty){for(var e,i,s=0,r=this._last,n=999999999999;r;)e=r._prev,r._dirty&&r.totalDuration(),r._startTime>n&&this._sortChildren&&!r._paused?this.add(r,r._startTime-r._delay):n=r._startTime,r._startTime<0&&!r._paused&&(s-=r._startTime,this._timeline.smoothChildTiming&&(this._startTime+=r._startTime/this._timeScale),this.shiftChildren(-r._startTime,!1,-9999999999),n=0),i=r._startTime+r._totalDuration/r._timeScale,i>s&&(s=i),r=e;this._duration=this._totalDuration=s,this._dirty=!1}return this._totalDuration}return t&&this.totalDuration()?this.timeScale(this._totalDuration/t):this},d.paused=function(e){if(!e)for(var i=this._first,s=this._time;i;)i._startTime===s&&"isPause"===i.data&&(i._rawPrevTime=0),i=i._next;return t.prototype.paused.apply(this,arguments)},d.usesFrames=function(){for(var e=this._timeline;e._timeline;)e=e._timeline;return e===t._rootFramesTimeline},d.rawTime=function(){return this._paused?this._totalTime:(this._timeline.rawTime()-this._startTime)*this._timeScale},s},!0),_gsScope._gsDefine("TimelineMax",["TimelineLite","TweenLite","easing.Ease"],function(t,e,i){var s=function(e){t.call(this,e),this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._cycle=0,this._yoyo=!0===this.vars.yoyo,this._dirty=!0},r=e._internals,n=r.lazyTweens,a=r.lazyRender,o=new i(null,null,1,0),l=s.prototype=new t;return l.constructor=s,l.kill()._gc=!1,s.version="1.18.2",l.invalidate=function(){return this._yoyo=!0===this.vars.yoyo,this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._uncache(!0),t.prototype.invalidate.call(this)},l.addCallback=function(t,i,s,r){return this.add(e.delayedCall(0,t,s,r),i)},l.removeCallback=function(t,e){if(t)if(null==e)this._kill(null,t);else for(var i=this.getTweensOf(t,!1),s=i.length,r=this._parseTimeOrLabel(e);--s>-1;)i[s]._startTime===r&&i[s]._enabled(!1,!1);return this},l.removePause=function(e){return this.removeCallback(t._internals.pauseCallback,e)},l.tweenTo=function(t,i){i=i||{};var s,r,n,a={ease:o,useFrames:this.usesFrames(),immediateRender:!1};for(r in i)a[r]=i[r];return a.time=this._parseTimeOrLabel(t),s=Math.abs(Number(a.time)-this._time)/this._timeScale||.001,n=new e(this,s,a),a.onStart=function(){n.target.paused(!0),n.vars.time!==n.target.time()&&s===n.duration()&&n.duration(Math.abs(n.vars.time-n.target.time())/n.target._timeScale),i.onStart&&n._callback("onStart")},n},l.tweenFromTo=function(t,e,i){i=i||{},t=this._parseTimeOrLabel(t),i.startAt={onComplete:this.seek,onCompleteParams:[t],callbackScope:this},i.immediateRender=!1!==i.immediateRender;var s=this.tweenTo(e,i);return s.duration(Math.abs(s.vars.time-t)/this._timeScale||.001)},l.render=function(t,e,i){this._gc&&this._enabled(!0,!1);var s,r,o,l,h,_,u,f,c=this._dirty?this.totalDuration():this._totalDuration,p=this._duration,d=this._time,m=this._totalTime,g=this._startTime,v=this._timeScale,y=this._rawPrevTime,T=this._paused,x=this._cycle;if(t>=c-1e-7)this._locked||(this._totalTime=c,this._cycle=this._repeat),this._reversed||this._hasPausedChild()||(r=!0,l="onComplete",h=!!this._timeline.autoRemoveChildren,0===this._duration&&(t<=0&&t>=-1e-7||y<0||1e-10===y)&&y!==t&&this._first&&(h=!0,y>1e-10&&(l="onReverseComplete"))),this._rawPrevTime=this._duration||!e||t||this._rawPrevTime===t?t:1e-10,this._yoyo&&0!=(1&this._cycle)?this._time=t=0:(this._time=p,t=p+1e-4);else if(t<1e-7)if(this._locked||(this._totalTime=this._cycle=0),this._time=0,(0!==d||0===p&&1e-10!==y&&(y>0||t<0&&y>=0)&&!this._locked)&&(l="onReverseComplete",r=this._reversed),t<0)this._active=!1,this._timeline.autoRemoveChildren&&this._reversed?(h=r=!0,l="onReverseComplete"):y>=0&&this._first&&(h=!0),this._rawPrevTime=t;else{if(this._rawPrevTime=p||!e||t||this._rawPrevTime===t?t:1e-10,0===t&&r)for(s=this._first;s&&0===s._startTime;)s._duration||(r=!1),s=s._next;t=0,this._initted||(h=!0)}else if(0===p&&y<0&&(h=!0),this._time=this._rawPrevTime=t,this._locked||(this._totalTime=t,0!==this._repeat&&(_=p+this._repeatDelay,this._cycle=this._totalTime/_>>0,0!==this._cycle&&this._cycle===this._totalTime/_&&this._cycle--,this._time=this._totalTime-this._cycle*_,this._yoyo&&0!=(1&this._cycle)&&(this._time=p-this._time),this._time>p?(this._time=p,t=p+1e-4):this._time<0?this._time=t=0:t=this._time)),this._hasPause&&!this._forcingPlayhead&&!e){if((t=this._time)>=d)for(s=this._first;s&&s._startTime<=t&&!u;)s._duration||"isPause"!==s.data||s.ratio||0===s._startTime&&0===this._rawPrevTime||(u=s),s=s._next;else for(s=this._last;s&&s._startTime>=t&&!u;)s._duration||"isPause"===s.data&&s._rawPrevTime>0&&(u=s),s=s._prev;u&&(this._time=t=u._startTime,this._totalTime=t+this._cycle*(this._totalDuration+this._repeatDelay))}if(this._cycle!==x&&!this._locked){var b=this._yoyo&&0!=(1&x),w=b===(this._yoyo&&0!=(1&this._cycle)),P=this._totalTime,O=this._cycle,S=this._rawPrevTime,k=this._time;if(this._totalTime=x*p,this._cycle<x?b=!b:this._totalTime+=p,this._time=d,this._rawPrevTime=0===p?y-1e-4:y,this._cycle=x,this._locked=!0,d=b?0:p,this.render(d,e,0===p),e||this._gc||this.vars.onRepeat&&this._callback("onRepeat"),d!==this._time)return;if(w&&(d=b?p+1e-4:-1e-4,this.render(d,!0,!1)),this._locked=!1,this._paused&&!T)return;this._time=k,this._totalTime=P,this._cycle=O,this._rawPrevTime=S}if(!(this._time!==d&&this._first||i||h||u))return void(m!==this._totalTime&&this._onUpdate&&(e||this._callback("onUpdate")));if(this._initted||(this._initted=!0),this._active||!this._paused&&this._totalTime!==m&&t>0&&(this._active=!0),0===m&&this.vars.onStart&&0!==this._totalTime&&(e||this._callback("onStart")),(f=this._time)>=d)for(s=this._first;s&&(o=s._next,f===this._time&&(!this._paused||T));)(s._active||s._startTime<=this._time&&!s._paused&&!s._gc)&&(u===s&&this.pause(),s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=o;else for(s=this._last;s&&(o=s._prev,f===this._time&&(!this._paused||T));){if(s._active||s._startTime<=d&&!s._paused&&!s._gc){if(u===s){for(u=s._prev;u&&u.endTime()>this._time;)u.render(u._reversed?u.totalDuration()-(t-u._startTime)*u._timeScale:(t-u._startTime)*u._timeScale,e,i),u=u._prev;u=null,this.pause()}s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)}s=o}this._onUpdate&&(e||(n.length&&a(),this._callback("onUpdate"))),l&&(this._locked||this._gc||g!==this._startTime&&v===this._timeScale||(0===this._time||c>=this.totalDuration())&&(r&&(n.length&&a(),this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[l]&&this._callback(l)))},l.getActive=function(t,e,i){null==t&&(t=!0),null==e&&(e=!0),null==i&&(i=!1);var s,r,n=[],a=this.getChildren(t,e,i),o=0,l=a.length;for(s=0;s<l;s++)r=a[s],r.isActive()&&(n[o++]=r);return n},l.getLabelAfter=function(t){t||0!==t&&(t=this._time);var e,i=this.getLabelsArray(),s=i.length;for(e=0;e<s;e++)if(i[e].time>t)return i[e].name;return null},l.getLabelBefore=function(t){null==t&&(t=this._time);for(var e=this.getLabelsArray(),i=e.length;--i>-1;)if(e[i].time<t)return e[i].name;return null},l.getLabelsArray=function(){var t,e=[],i=0;for(t in this._labels)e[i++]={time:this._labels[t],name:t};return e.sort(function(t,e){return t.time-e.time}),e},l.progress=function(t,e){return arguments.length?this.totalTime(this.duration()*(this._yoyo&&0!=(1&this._cycle)?1-t:t)+this._cycle*(this._duration+this._repeatDelay),e):this._time/this.duration()},l.totalProgress=function(t,e){return arguments.length?this.totalTime(this.totalDuration()*t,e):this._totalTime/this.totalDuration()},l.totalDuration=function(e){return arguments.length?-1!==this._repeat&&e?this.timeScale(this.totalDuration()/e):this:(this._dirty&&(t.prototype.totalDuration.call(this),this._totalDuration=-1===this._repeat?999999999999:this._duration*(this._repeat+1)+this._repeatDelay*this._repeat),this._totalDuration)},l.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),t>this._duration&&(t=this._duration),this._yoyo&&0!=(1&this._cycle)?t=this._duration-t+this._cycle*(this._duration+this._repeatDelay):0!==this._repeat&&(t+=this._cycle*(this._duration+this._repeatDelay)),this.totalTime(t,e)):this._time},l.repeat=function(t){return arguments.length?(this._repeat=t,this._uncache(!0)):this._repeat},l.repeatDelay=function(t){return arguments.length?(this._repeatDelay=t,this._uncache(!0)):this._repeatDelay},l.yoyo=function(t){return arguments.length?(this._yoyo=t,this):this._yoyo},l.currentLabel=function(t){return arguments.length?this.seek(t,!0):this.getLabelBefore(this._time+1e-8)},s},!0),function(){var t=180/Math.PI,e=[],i=[],s=[],r={},n=_gsScope._gsDefine.globals,a=function(t,e,i,s){this.a=t,this.b=e,this.c=i,this.d=s,this.da=s-t,this.ca=i-t,this.ba=e-t},o=function(t,e,i,s){var r={a:t},n={},a={},o={c:s},l=(t+e)/2,h=(e+i)/2,_=(i+s)/2,u=(l+h)/2,f=(h+_)/2,c=(f-u)/8;return r.b=l+(t-l)/4,n.b=u+c,r.c=n.a=(r.b+n.b)/2,n.c=a.a=(u+f)/2,a.b=f-c,o.b=_+(s-_)/4,a.c=o.a=(a.b+o.b)/2,[r,n,a,o]},l=function(t,r,n,a,l){var h,_,u,f,c,p,d,m,g,v,y,T,x,b=t.length-1,w=0,P=t[0].a;for(h=0;h<b;h++)c=t[w],_=c.a,u=c.d,f=t[w+1].d,l?(y=e[h],T=i[h],x=(T+y)*r*.25/(a?.5:s[h]||.5),p=u-(u-_)*(a?.5*r:0!==y?x/y:0),d=u+(f-u)*(a?.5*r:0!==T?x/T:0),m=u-(p+((d-p)*(3*y/(y+T)+.5)/4||0))):(p=u-(u-_)*r*.5,d=u+(f-u)*r*.5,m=u-(p+d)/2),p+=m,d+=m,c.c=g=p,c.b=0!==h?P:P=c.a+.6*(c.c-c.a),c.da=u-_,c.ca=g-_,c.ba=P-_,n?(v=o(_,P,g,u),t.splice(w,1,v[0],v[1],v[2],v[3]),w+=4):w++,P=d;c=t[w],c.b=P,c.c=P+.4*(c.d-P),c.da=c.d-c.a,c.ca=c.c-c.a,c.ba=P-c.a,n&&(v=o(c.a,P,c.c,c.d),t.splice(w,1,v[0],v[1],v[2],v[3]))},h=function(t,s,r,n){var o,l,h,_,u,f,c=[];if(n)for(t=[n].concat(t),l=t.length;--l>-1;)"string"==typeof(f=t[l][s])&&"="===f.charAt(1)&&(t[l][s]=n[s]+Number(f.charAt(0)+f.substr(2)));if((o=t.length-2)<0)return c[0]=new a(t[0][s],0,0,t[o<-1?0:1][s]),c;for(l=0;l<o;l++)h=t[l][s],_=t[l+1][s],c[l]=new a(h,0,0,_),r&&(u=t[l+2][s],e[l]=(e[l]||0)+(_-h)*(_-h),i[l]=(i[l]||0)+(u-_)*(u-_));return c[l]=new a(t[l][s],0,0,t[l+1][s]),c},_=function(t,n,a,o,_,u){var f,c,p,d,m,g,v,y,T={},x=[],b=u||t[0];_="string"==typeof _?","+_+",":",x,y,z,left,top,right,bottom,marginTop,marginLeft,marginRight,marginBottom,paddingLeft,paddingTop,paddingRight,paddingBottom,backgroundPosition,backgroundPosition_y,",null==n&&(n=1);for(c in t[0])x.push(c);if(t.length>1){for(y=t[t.length-1],v=!0,f=x.length;--f>-1;)if(c=x[f],Math.abs(b[c]-y[c])>.05){v=!1;break}v&&(t=t.concat(),u&&t.unshift(u),t.push(t[1]),u=t[t.length-3])}for(e.length=i.length=s.length=0,f=x.length;--f>-1;)c=x[f],r[c]=-1!==_.indexOf(","+c+","),T[c]=h(t,c,r[c],u);for(f=e.length;--f>-1;)e[f]=Math.sqrt(e[f]),i[f]=Math.sqrt(i[f]);if(!o){for(f=x.length;--f>-1;)if(r[c])for(p=T[x[f]],g=p.length-1,d=0;d<g;d++)m=p[d+1].da/i[d]+p[d].da/e[d],s[d]=(s[d]||0)+m*m;for(f=s.length;--f>-1;)s[f]=Math.sqrt(s[f])}for(f=x.length,d=a?4:1;--f>-1;)c=x[f],p=T[c],l(p,n,a,o,r[c]),v&&(p.splice(0,d),p.splice(p.length-d,d));return T},u=function(t,e,i){e=e||"soft";var s,r,n,o,l,h,_,u,f,c,p,d={},m="cubic"===e?3:2,g="soft"===e,v=[];if(g&&i&&(t=[i].concat(t)),null==t||t.length<m+1)throw"invalid Bezier data";for(f in t[0])v.push(f);for(h=v.length;--h>-1;){for(f=v[h],d[f]=l=[],c=0,u=t.length,_=0;_<u;_++)s=null==i?t[_][f]:"string"==typeof(p=t[_][f])&&"="===p.charAt(1)?i[f]+Number(p.charAt(0)+p.substr(2)):Number(p),g&&_>1&&_<u-1&&(l[c++]=(s+l[c-2])/2),l[c++]=s;for(u=c-m+1,c=0,_=0;_<u;_+=m)s=l[_],r=l[_+1],n=l[_+2],o=2===m?0:l[_+3],l[c++]=p=3===m?new a(s,r,n,o):new a(s,(2*r+s)/3,(2*r+n)/3,n);l.length=c}return d},f=function(t,e,i){for(var s,r,n,a,o,l,h,_,u,f,c,p=1/i,d=t.length;--d>-1;)for(f=t[d],n=f.a,a=f.d-n,o=f.c-n,l=f.b-n,s=r=0,_=1;_<=i;_++)h=p*_,u=1-h,s=r-(r=(h*h*a+3*u*(h*o+u*l))*h),c=d*i+_-1,e[c]=(e[c]||0)+s*s},c=function(t,e){e=e>>0||6;var i,s,r,n,a=[],o=[],l=0,h=0,_=e-1,u=[],c=[];for(i in t)f(t[i],a,e);for(r=a.length,s=0;s<r;s++)l+=Math.sqrt(a[s]),n=s%e,c[n]=l,n===_&&(h+=l,n=s/e>>0,u[n]=c,o[n]=h,l=0,c=[]);return{length:h,lengths:o,segments:u}},p=_gsScope._gsDefine.plugin({propName:"bezier",priority:-1,version:"1.3.4",API:2,global:!0,init:function(t,e,i){this._target=t,e instanceof Array&&(e={values:e}),this._func={},this._round={},this._props=[],
this._timeRes=null==e.timeResolution?6:parseInt(e.timeResolution,10);var s,r,n,a,o,l=e.values||[],h={},f=l[0],p=e.autoRotate||i.vars.orientToBezier;this._autoRotate=p?p instanceof Array?p:[["x","y","rotation",!0===p?0:Number(p)||0]]:null;for(s in f)this._props.push(s);for(n=this._props.length;--n>-1;)s=this._props[n],this._overwriteProps.push(s),r=this._func[s]="function"==typeof t[s],h[s]=r?t[s.indexOf("set")||"function"!=typeof t["get"+s.substr(3)]?s:"get"+s.substr(3)]():parseFloat(t[s]),o||h[s]!==l[0][s]&&(o=h);if(this._beziers="cubic"!==e.type&&"quadratic"!==e.type&&"soft"!==e.type?_(l,isNaN(e.curviness)?1:e.curviness,!1,"thruBasic"===e.type,e.correlate,o):u(l,e.type,h),this._segCount=this._beziers[s].length,this._timeRes){var d=c(this._beziers,this._timeRes);this._length=d.length,this._lengths=d.lengths,this._segments=d.segments,this._l1=this._li=this._s1=this._si=0,this._l2=this._lengths[0],this._curSeg=this._segments[0],this._s2=this._curSeg[0],this._prec=1/this._curSeg.length}if(p=this._autoRotate)for(this._initialRotations=[],p[0]instanceof Array||(this._autoRotate=p=[p]),n=p.length;--n>-1;){for(a=0;a<3;a++)s=p[n][a],this._func[s]="function"==typeof t[s]&&t[s.indexOf("set")||"function"!=typeof t["get"+s.substr(3)]?s:"get"+s.substr(3)];s=p[n][2],this._initialRotations[n]=this._func[s]?this._func[s].call(this._target):this._target[s]}return this._startRatio=i.vars.runBackwards?1:0,!0},set:function(e){var i,s,r,n,a,o,l,h,_,u,f=this._segCount,c=this._func,p=this._target,d=e!==this._startRatio;if(this._timeRes){if(_=this._lengths,u=this._curSeg,e*=this._length,r=this._li,e>this._l2&&r<f-1){for(h=f-1;r<h&&(this._l2=_[++r])<=e;);this._l1=_[r-1],this._li=r,this._curSeg=u=this._segments[r],this._s2=u[this._s1=this._si=0]}else if(e<this._l1&&r>0){for(;r>0&&(this._l1=_[--r])>=e;);0===r&&e<this._l1?this._l1=0:r++,this._l2=_[r],this._li=r,this._curSeg=u=this._segments[r],this._s1=u[(this._si=u.length-1)-1]||0,this._s2=u[this._si]}if(i=r,e-=this._l1,r=this._si,e>this._s2&&r<u.length-1){for(h=u.length-1;r<h&&(this._s2=u[++r])<=e;);this._s1=u[r-1],this._si=r}else if(e<this._s1&&r>0){for(;r>0&&(this._s1=u[--r])>=e;);0===r&&e<this._s1?this._s1=0:r++,this._s2=u[r],this._si=r}o=(r+(e-this._s1)/(this._s2-this._s1))*this._prec}else i=e<0?0:e>=1?f-1:f*e>>0,o=(e-i*(1/f))*f;for(s=1-o,r=this._props.length;--r>-1;)n=this._props[r],a=this._beziers[n][i],l=(o*o*a.da+3*s*(o*a.ca+s*a.ba))*o+a.a,this._round[n]&&(l=Math.round(l)),c[n]?p[n](l):p[n]=l;if(this._autoRotate){var m,g,v,y,T,x,b,w=this._autoRotate;for(r=w.length;--r>-1;)n=w[r][2],x=w[r][3]||0,b=!0===w[r][4]?1:t,a=this._beziers[w[r][0]],m=this._beziers[w[r][1]],a&&m&&(a=a[i],m=m[i],g=a.a+(a.b-a.a)*o,y=a.b+(a.c-a.b)*o,g+=(y-g)*o,y+=(a.c+(a.d-a.c)*o-y)*o,v=m.a+(m.b-m.a)*o,T=m.b+(m.c-m.b)*o,v+=(T-v)*o,T+=(m.c+(m.d-m.c)*o-T)*o,l=d?Math.atan2(T-v,y-g)*b+x:this._initialRotations[r],c[n]?p[n](l):p[n]=l)}}}),d=p.prototype;p.bezierThrough=_,p.cubicToQuadratic=o,p._autoCSS=!0,p.quadraticToCubic=function(t,e,i){return new a(t,(2*e+t)/3,(2*e+i)/3,i)},p._cssRegister=function(){var t=n.CSSPlugin;if(t){var e=t._internals,i=e._parseToProxy,s=e._setPluginRatio,r=e.CSSPropTween;e._registerComplexSpecialProp("bezier",{parser:function(t,e,n,a,o,l){e instanceof Array&&(e={values:e}),l=new p;var h,_,u,f=e.values,c=f.length-1,d=[],m={};if(c<0)return o;for(h=0;h<=c;h++)u=i(t,f[h],a,o,l,c!==h),d[h]=u.end;for(_ in e)m[_]=e[_];return m.values=d,o=new r(t,"bezier",0,0,u.pt,2),o.data=u,o.plugin=l,o.setRatio=s,0===m.autoRotate&&(m.autoRotate=!0),!m.autoRotate||m.autoRotate instanceof Array||(h=!0===m.autoRotate?0:Number(m.autoRotate),m.autoRotate=null!=u.end.left?[["left","top","rotation",h,!1]]:null!=u.end.x&&[["x","y","rotation",h,!1]]),m.autoRotate&&(a._transform||a._enableTransforms(!1),u.autoRotate=a._target._gsTransform),l._onInitTween(u.proxy,m,a._tween),o}})}},d._roundProps=function(t,e){for(var i=this._overwriteProps,s=i.length;--s>-1;)(t[i[s]]||t.bezier||t.bezierThrough)&&(this._round[i[s]]=e)},d._kill=function(t){var e,i,s=this._props;for(e in this._beziers)if(e in t)for(delete this._beziers[e],delete this._func[e],i=s.length;--i>-1;)s[i]===e&&s.splice(i,1);return this._super._kill.call(this,t)}}(),_gsScope._gsDefine("plugins.CSSPlugin",["plugins.TweenPlugin","TweenLite"],function(t,e){var i,s,r,n,a=function(){t.call(this,"css"),this._overwriteProps.length=0,this.setRatio=a.prototype.setRatio},o=_gsScope._gsDefine.globals,l={},h=a.prototype=new t("css");h.constructor=a,a.version="1.18.2",a.API=2,a.defaultTransformPerspective=0,a.defaultSkewType="compensated",a.defaultSmoothOrigin=!0,h="px",a.suffixMap={top:h,right:h,bottom:h,left:h,width:h,height:h,fontSize:h,padding:h,margin:h,perspective:h,lineHeight:""};var _,u,f,c,p,d,m=/(?:\d|\-\d|\.\d|\-\.\d)+/g,g=/(?:\d|\-\d|\.\d|\-\.\d|\+=\d|\-=\d|\+=.\d|\-=\.\d)+/g,v=/(?:\+=|\-=|\-|\b)[\d\-\.]+[a-zA-Z0-9]*(?:%|\b)/gi,y=/(?![+-]?\d*\.?\d+|[+-]|e[+-]\d+)[^0-9]/g,T=/(?:\d|\-|\+|=|#|\.)*/g,x=/opacity *= *([^)]*)/i,b=/opacity:([^;]*)/i,w=/^(rgb|hsl)/,P=function(t,e){return e.toUpperCase()},O=/(?:Left|Right|Width)/i,S=/,(?=[^\)]*(?:\(|$))/gi,k=Math.PI/180,R=180/Math.PI,A={},C=document,D=function(t){return C.createElementNS?C.createElementNS("http://www.w3.org/1999/xhtml",t):C.createElement(t)},M=D("div"),z=D("img"),F=a._internals={_specialProps:l},I=navigator.userAgent,X=function(){var t=I.indexOf("Android"),e=D("a");return f=-1!==I.indexOf("Safari")&&-1===I.indexOf("Chrome")&&(-1===t||Number(I.substr(t+8,1))>3),p=f&&Number(I.substr(I.indexOf("Version/")+8,1))<6,c=-1!==I.indexOf("Firefox"),(/MSIE ([0-9]{1,}[\.0-9]{0,})/.exec(I)||/Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/.exec(I))&&(d=parseFloat(RegExp.$1)),!!e&&(e.style.cssText="top:1px;opacity:.55;",/^0.55/.test(e.style.opacity))}(),N=function(t){return x.test("string"==typeof t?t:(t.currentStyle?t.currentStyle.filter:t.style.filter)||"")?parseFloat(RegExp.$1)/100:1},L=function(t){window.console&&console.log(t)},E="",Y="",B=function(t,e){e=e||M;var i,s,r=e.style;if(void 0!==r[t])return t;for(t=t.charAt(0).toUpperCase()+t.substr(1),i=["O","Moz","ms","Ms","Webkit"],s=5;--s>-1&&void 0===r[i[s]+t];);return s>=0?(Y=3===s?"ms":i[s],E="-"+Y.toLowerCase()+"-",Y+t):null},j=C.defaultView?C.defaultView.getComputedStyle:function(){},U=a.getStyle=function(t,e,i,s,r){var n;return X||"opacity"!==e?(!s&&t.style[e]?n=t.style[e]:(i=i||j(t))?n=i[e]||i.getPropertyValue(e)||i.getPropertyValue(e.replace(/([A-Z])/g,"-$1").toLowerCase()):t.currentStyle&&(n=t.currentStyle[e]),null==r||n&&"none"!==n&&"auto"!==n&&"auto auto"!==n?n:r):N(t)},V=F.convertToPixels=function(t,i,s,r,n){if("px"===r||!r)return s;if("auto"===r||!s)return 0;var o,l,h,_=O.test(i),u=t,f=M.style,c=s<0;if(c&&(s=-s),"%"===r&&-1!==i.indexOf("border"))o=s/100*(_?t.clientWidth:t.clientHeight);else{if(f.cssText="border:0 solid red;position:"+U(t,"position")+";line-height:0;","%"!==r&&u.appendChild&&"v"!==r.charAt(0)&&"rem"!==r)f[_?"borderLeftWidth":"borderTopWidth"]=s+r;else{if(u=t.parentNode||C.body,l=u._gsCache,h=e.ticker.frame,l&&_&&l.time===h)return l.width*s/100;f[_?"width":"height"]=s+r}u.appendChild(M),o=parseFloat(M[_?"offsetWidth":"offsetHeight"]),u.removeChild(M),_&&"%"===r&&!1!==a.cacheWidths&&(l=u._gsCache=u._gsCache||{},l.time=h,l.width=o/s*100),0!==o||n||(o=V(t,i,s,r,!0))}return c?-o:o},q=F.calculateOffset=function(t,e,i){if("absolute"!==U(t,"position",i))return 0;var s="left"===e?"Left":"Top",r=U(t,"margin"+s,i);return t["offset"+s]-(V(t,e,parseFloat(r),r.replace(T,""))||0)},W=function(t,e){var i,s,r,n={};if(e=e||j(t,null))if(i=e.length)for(;--i>-1;)r=e[i],-1!==r.indexOf("-transform")&&vt!==r||(n[r.replace(/-([a-z])/gi,P)]=e.getPropertyValue(r));else for(i in e)-1!==i.indexOf("Transform")&&gt!==i||(n[i]=e[i]);else if(e=t.currentStyle||t.style)for(i in e)"string"==typeof i&&void 0===n[i]&&(n[i.replace(/-([a-z])/gi,P)]=e[i]);return X||(n.opacity=N(t)),s=Ct(t,e,!1),n.rotation=s.rotation,n.skewX=s.skewX,n.scaleX=s.scaleX,n.scaleY=s.scaleY,n.x=s.x,n.y=s.y,Tt&&(n.z=s.z,n.rotationX=s.rotationX,n.rotationY=s.rotationY,n.scaleZ=s.scaleZ),n.filters&&delete n.filters,n},Z=function(t,e,i,s,r){var n,a,o,l={},h=t.style;for(a in i)"cssText"!==a&&"length"!==a&&isNaN(a)&&(e[a]!==(n=i[a])||r&&r[a])&&-1===a.indexOf("Origin")&&("number"!=typeof n&&"string"!=typeof n||(l[a]="auto"!==n||"left"!==a&&"top"!==a?""!==n&&"auto"!==n&&"none"!==n||"string"!=typeof e[a]||""===e[a].replace(y,"")?n:0:q(t,a),void 0!==h[a]&&(o=new lt(h,a,h[a],o))));if(s)for(a in s)"className"!==a&&(l[a]=s[a]);return{difs:l,firstMPT:o}},G={width:["Left","Right"],height:["Top","Bottom"]},$=["marginLeft","marginRight","marginTop","marginBottom"],Q=function(t,e,i){var s=parseFloat("width"===e?t.offsetWidth:t.offsetHeight),r=G[e],n=r.length;for(i=i||j(t,null);--n>-1;)s-=parseFloat(U(t,"padding"+r[n],i,!0))||0,s-=parseFloat(U(t,"border"+r[n]+"Width",i,!0))||0;return s},H=function(t,e){if("contain"===t||"auto"===t||"auto auto"===t)return t+" ";null!=t&&""!==t||(t="0 0");var i=t.split(" "),s=-1!==t.indexOf("left")?"0%":-1!==t.indexOf("right")?"100%":i[0],r=-1!==t.indexOf("top")?"0%":-1!==t.indexOf("bottom")?"100%":i[1];return null==r?r="center"===s?"50%":"0":"center"===r&&(r="50%"),("center"===s||isNaN(parseFloat(s))&&-1===(s+"").indexOf("="))&&(s="50%"),t=s+" "+r+(i.length>2?" "+i[2]:""),e&&(e.oxp=-1!==s.indexOf("%"),e.oyp=-1!==r.indexOf("%"),e.oxr="="===s.charAt(1),e.oyr="="===r.charAt(1),e.ox=parseFloat(s.replace(y,"")),e.oy=parseFloat(r.replace(y,"")),e.v=t),e||t},K=function(t,e){return"string"==typeof t&&"="===t.charAt(1)?parseInt(t.charAt(0)+"1",10)*parseFloat(t.substr(2)):parseFloat(t)-parseFloat(e)},J=function(t,e){return null==t?e:"string"==typeof t&&"="===t.charAt(1)?parseInt(t.charAt(0)+"1",10)*parseFloat(t.substr(2))+e:parseFloat(t)},tt=function(t,e,i,s){var r,n,a,o,l;return null==t?o=e:"number"==typeof t?o=t:(r=360,n=t.split("_"),l="="===t.charAt(1),a=(l?parseInt(t.charAt(0)+"1",10)*parseFloat(n[0].substr(2)):parseFloat(n[0]))*(-1===t.indexOf("rad")?1:R)-(l?0:e),n.length&&(s&&(s[i]=e+a),-1!==t.indexOf("short")&&(a%=r)!==a%(r/2)&&(a=a<0?a+r:a-r),-1!==t.indexOf("_cw")&&a<0?a=(a+9999999999*r)%r-(a/r|0)*r:-1!==t.indexOf("ccw")&&a>0&&(a=(a-9999999999*r)%r-(a/r|0)*r)),o=e+a),o<1e-6&&o>-1e-6&&(o=0),o},et={aqua:[0,255,255],lime:[0,255,0],silver:[192,192,192],black:[0,0,0],maroon:[128,0,0],teal:[0,128,128],blue:[0,0,255],navy:[0,0,128],white:[255,255,255],fuchsia:[255,0,255],olive:[128,128,0],yellow:[255,255,0],orange:[255,165,0],gray:[128,128,128],purple:[128,0,128],green:[0,128,0],red:[255,0,0],pink:[255,192,203],cyan:[0,255,255],transparent:[255,255,255,0]},it=function(t,e,i){return t=t<0?t+1:t>1?t-1:t,255*(6*t<1?e+(i-e)*t*6:t<.5?i:3*t<2?e+(i-e)*(2/3-t)*6:e)+.5|0},st=a.parseColor=function(t,e){var i,s,r,n,a,o,l,h,_,u,f;if(t)if("number"==typeof t)i=[t>>16,t>>8&255,255&t];else{if(","===t.charAt(t.length-1)&&(t=t.substr(0,t.length-1)),et[t])i=et[t];else if("#"===t.charAt(0))4===t.length&&(s=t.charAt(1),r=t.charAt(2),n=t.charAt(3),t="#"+s+s+r+r+n+n),t=parseInt(t.substr(1),16),i=[t>>16,t>>8&255,255&t];else if("hsl"===t.substr(0,3))if(i=f=t.match(m),e){if(-1!==t.indexOf("="))return t.match(g)}else a=Number(i[0])%360/360,o=Number(i[1])/100,l=Number(i[2])/100,r=l<=.5?l*(o+1):l+o-l*o,s=2*l-r,i.length>3&&(i[3]=Number(t[3])),i[0]=it(a+1/3,s,r),i[1]=it(a,s,r),i[2]=it(a-1/3,s,r);else i=t.match(m)||et.transparent;i[0]=Number(i[0]),i[1]=Number(i[1]),i[2]=Number(i[2]),i.length>3&&(i[3]=Number(i[3]))}else i=et.black;return e&&!f&&(s=i[0]/255,r=i[1]/255,n=i[2]/255,h=Math.max(s,r,n),_=Math.min(s,r,n),l=(h+_)/2,h===_?a=o=0:(u=h-_,o=l>.5?u/(2-h-_):u/(h+_),a=h===s?(r-n)/u+(r<n?6:0):h===r?(n-s)/u+2:(s-r)/u+4,a*=60),i[0]=a+.5|0,i[1]=100*o+.5|0,i[2]=100*l+.5|0),i},rt=function(t,e){var i,s,r,n=t.match(nt)||[],a=0,o=n.length?"":t;for(i=0;i<n.length;i++)s=n[i],r=t.substr(a,t.indexOf(s,a)-a),a+=r.length+s.length,s=st(s,e),3===s.length&&s.push(1),o+=r+(e?"hsla("+s[0]+","+s[1]+"%,"+s[2]+"%,"+s[3]:"rgba("+s.join(","))+")";return o},nt="(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#(?:[0-9a-f]{3}){1,2}\\b";for(h in et)nt+="|"+h+"\\b";nt=new RegExp(nt+")","gi"),a.colorStringFilter=function(t){var e,i=t[0]+t[1];nt.lastIndex=0,nt.test(i)&&(e=-1!==i.indexOf("hsl(")||-1!==i.indexOf("hsla("),t[0]=rt(t[0],e),t[1]=rt(t[1],e))},e.defaultStringFilter||(e.defaultStringFilter=a.colorStringFilter);var at=function(t,e,i,s){if(null==t)return function(t){return t};var r,n=e?(t.match(nt)||[""])[0]:"",a=t.split(n).join("").match(v)||[],o=t.substr(0,t.indexOf(a[0])),l=")"===t.charAt(t.length-1)?")":"",h=-1!==t.indexOf(" ")?" ":",",_=a.length,u=_>0?a[0].replace(m,""):"";return _?r=e?function(t){var e,f,c,p;if("number"==typeof t)t+=u;else if(s&&S.test(t)){for(p=t.replace(S,"|").split("|"),c=0;c<p.length;c++)p[c]=r(p[c]);return p.join(",")}if(e=(t.match(nt)||[n])[0],f=t.split(e).join("").match(v)||[],c=f.length,_>c--)for(;++c<_;)f[c]=i?f[(c-1)/2|0]:a[c];return o+f.join(h)+h+e+l+(-1!==t.indexOf("inset")?" inset":"")}:function(t){var e,n,f;if("number"==typeof t)t+=u;else if(s&&S.test(t)){for(n=t.replace(S,"|").split("|"),f=0;f<n.length;f++)n[f]=r(n[f]);return n.join(",")}if(e=t.match(v)||[],f=e.length,_>f--)for(;++f<_;)e[f]=i?e[(f-1)/2|0]:a[f];return o+e.join(h)+l}:function(t){return t}},ot=function(t){return t=t.split(","),function(e,i,s,r,n,a,o){var l,h=(i+"").split(" ");for(o={},l=0;l<4;l++)o[t[l]]=h[l]=h[l]||h[(l-1)/2>>0];return r.parse(e,o,n,a)}},lt=(F._setPluginRatio=function(t){this.plugin.setRatio(t);for(var e,i,s,r,n,a=this.data,o=a.proxy,l=a.firstMPT;l;)e=o[l.v],l.r?e=Math.round(e):e<1e-6&&e>-1e-6&&(e=0),l.t[l.p]=e,l=l._next;if(a.autoRotate&&(a.autoRotate.rotation=o.rotation),1===t||0===t)for(l=a.firstMPT,n=1===t?"e":"b";l;){if(i=l.t,i.type){if(1===i.type){for(r=i.xs0+i.s+i.xs1,s=1;s<i.l;s++)r+=i["xn"+s]+i["xs"+(s+1)];i[n]=r}}else i[n]=i.s+i.xs0;l=l._next}},function(t,e,i,s,r){this.t=t,this.p=e,this.v=i,this.r=r,s&&(s._prev=this,this._next=s)}),ht=(F._parseToProxy=function(t,e,i,s,r,n){var a,o,l,h,_,u=s,f={},c={},p=i._transform,d=A;for(i._transform=null,A=e,s=_=i.parse(t,e,s,r),A=d,n&&(i._transform=p,u&&(u._prev=null,u._prev&&(u._prev._next=null)));s&&s!==u;){if(s.type<=1&&(o=s.p,c[o]=s.s+s.c,f[o]=s.s,n||(h=new lt(s,"s",o,h,s.r),s.c=0),1===s.type))for(a=s.l;--a>0;)l="xn"+a,o=s.p+"_"+l,c[o]=s.data[l],f[o]=s[l],n||(h=new lt(s,l,o,h,s.rxp[l]));s=s._next}return{proxy:f,end:c,firstMPT:h,pt:_}},F.CSSPropTween=function(t,e,s,r,a,o,l,h,_,u,f){this.t=t,this.p=e,this.s=s,this.c=r,this.n=l||e,t instanceof ht||n.push(this.n),this.r=h,this.type=o||0,_&&(this.pr=_,i=!0),this.b=void 0===u?s:u,this.e=void 0===f?s+r:f,a&&(this._next=a,a._prev=this)}),_t=function(t,e,i,s,r,n){var a=new ht(t,e,i,s-i,r,-1,n);return a.b=i,a.e=a.xs0=s,a},ut=a.parseComplex=function(t,e,i,s,r,n,a,o,l,h){i=i||n||"",a=new ht(t,e,0,0,a,h?2:1,null,!1,o,i,s),s+="";var u,f,c,p,d,v,y,T,x,b,w,P,O,k=i.split(", ").join(",").split(" "),R=s.split(", ").join(",").split(" "),A=k.length,C=!1!==_;for(-1===s.indexOf(",")&&-1===i.indexOf(",")||(k=k.join(" ").replace(S,", ").split(" "),R=R.join(" ").replace(S,", ").split(" "),A=k.length),A!==R.length&&(k=(n||"").split(" "),A=k.length),a.plugin=l,a.setRatio=h,nt.lastIndex=0,u=0;u<A;u++)if(p=k[u],d=R[u],(T=parseFloat(p))||0===T)a.appendXtra("",T,K(d,T),d.replace(g,""),C&&-1!==d.indexOf("px"),!0);else if(r&&nt.test(p))P=","===d.charAt(d.length-1)?"),":")",O=-1!==d.indexOf("hsl")&&X,p=st(p,O),d=st(d,O),x=p.length+d.length>6,x&&!X&&0===d[3]?(a["xs"+a.l]+=a.l?" transparent":"transparent",a.e=a.e.split(R[u]).join("transparent")):(X||(x=!1),O?a.appendXtra(x?"hsla(":"hsl(",p[0],K(d[0],p[0]),",",!1,!0).appendXtra("",p[1],K(d[1],p[1]),"%,",!1).appendXtra("",p[2],K(d[2],p[2]),x?"%,":"%"+P,!1):a.appendXtra(x?"rgba(":"rgb(",p[0],d[0]-p[0],",",!0,!0).appendXtra("",p[1],d[1]-p[1],",",!0).appendXtra("",p[2],d[2]-p[2],x?",":P,!0),x&&(p=p.length<4?1:p[3],a.appendXtra("",p,(d.length<4?1:d[3])-p,P,!1))),nt.lastIndex=0;else if(v=p.match(m)){if(!(y=d.match(g))||y.length!==v.length)return a;for(c=0,f=0;f<v.length;f++)w=v[f],b=p.indexOf(w,c),a.appendXtra(p.substr(c,b-c),Number(w),K(y[f],w),"",C&&"px"===p.substr(b+w.length,2),0===f),c=b+w.length;a["xs"+a.l]+=p.substr(c)}else a["xs"+a.l]+=a.l?" "+d:d;if(-1!==s.indexOf("=")&&a.data){for(P=a.xs0+a.data.s,u=1;u<a.l;u++)P+=a["xs"+u]+a.data["xn"+u];a.e=P+a["xs"+u]}return a.l||(a.type=-1,a.xs0=a.e),a.xfirst||a},ft=9;for(h=ht.prototype,h.l=h.pr=0;--ft>0;)h["xn"+ft]=0,h["xs"+ft]="";h.xs0="",h._next=h._prev=h.xfirst=h.data=h.plugin=h.setRatio=h.rxp=null,h.appendXtra=function(t,e,i,s,r,n){var a=this,o=a.l;return a["xs"+o]+=n&&o?" "+t:t||"",i||0===o||a.plugin?(a.l++,a.type=a.setRatio?2:1,a["xs"+a.l]=s||"",o>0?(a.data["xn"+o]=e+i,a.rxp["xn"+o]=r,a["xn"+o]=e,a.plugin||(a.xfirst=new ht(a,"xn"+o,e,i,a.xfirst||a,0,a.n,r,a.pr),a.xfirst.xs0=0),a):(a.data={s:e+i},a.rxp={},a.s=e,a.c=i,a.r=r,a)):(a["xs"+o]+=e+(s||""),a)};var ct=function(t,e){e=e||{},this.p=e.prefix?B(t)||t:t,l[t]=l[this.p]=this,this.format=e.formatter||at(e.defaultValue,e.color,e.collapsible,e.multi),e.parser&&(this.parse=e.parser),this.clrs=e.color,this.multi=e.multi,this.keyword=e.keyword,this.dflt=e.defaultValue,this.pr=e.priority||0},pt=F._registerComplexSpecialProp=function(t,e,i){"object"!=typeof e&&(e={parser:i});var s,r=t.split(","),n=e.defaultValue;for(i=i||[n],s=0;s<r.length;s++)e.prefix=0===s&&e.prefix,e.defaultValue=i[s]||n,new ct(r[s],e)};h=ct.prototype,h.parseComplex=function(t,e,i,s,r,n){var a,o,l,h,_,u,f=this.keyword;if(this.multi&&(S.test(i)||S.test(e)?(o=e.replace(S,"|").split("|"),l=i.replace(S,"|").split("|")):f&&(o=[e],l=[i])),l){for(h=l.length>o.length?l.length:o.length,a=0;a<h;a++)e=o[a]=o[a]||this.dflt,i=l[a]=l[a]||this.dflt,f&&(_=e.indexOf(f),u=i.indexOf(f),_!==u&&(-1===u?o[a]=o[a].split(f).join(""):-1===_&&(o[a]+=" "+f)));e=o.join(", "),i=l.join(", ")}return ut(t,this.p,e,i,this.clrs,this.dflt,s,this.pr,r,n)},h.parse=function(t,e,i,s,n,a,o){return this.parseComplex(t.style,this.format(U(t,this.p,r,!1,this.dflt)),this.format(e),n,a)},a.registerSpecialProp=function(t,e,i){pt(t,{parser:function(t,s,r,n,a,o,l){var h=new ht(t,r,0,0,a,2,r,!1,i);return h.plugin=o,h.setRatio=e(t,s,n._tween,r),h},priority:i})},a.useSVGTransformAttr=f||c;var dt,mt="scaleX,scaleY,scaleZ,x,y,z,skewX,skewY,rotation,rotationX,rotationY,perspective,xPercent,yPercent".split(","),gt=B("transform"),vt=E+"transform",yt=B("transformOrigin"),Tt=null!==B("perspective"),xt=F.Transform=function(){this.perspective=parseFloat(a.defaultTransformPerspective)||0,this.force3D=!(!1===a.defaultForce3D||!Tt)&&(a.defaultForce3D||"auto")},bt=window.SVGElement,wt=function(t,e,i){var s,r=C.createElementNS("http://www.w3.org/2000/svg",t);for(s in i)r.setAttributeNS(null,s.replace(/([a-z])([A-Z])/g,"$1-$2").toLowerCase(),i[s]);return e.appendChild(r),r},Pt=C.documentElement,Ot=function(){var t,e,i,s=d||/Android/i.test(I)&&!window.chrome;return C.createElementNS&&!s&&(t=wt("svg",Pt),e=wt("rect",t,{width:100,height:50,x:100}),i=e.getBoundingClientRect().width,e.style[yt]="50% 50%",e.style[gt]="scaleX(0.5)",s=i===e.getBoundingClientRect().width&&!(c&&Tt),Pt.removeChild(t)),s}(),St=function(t,e,i,s,r){var n,o,l,h,_,u,f,c,p,d,m,g,v,y,T=t._gsTransform,x=At(t,!0);T&&(v=T.xOrigin,y=T.yOrigin),(!s||(n=s.split(" ")).length<2)&&(f=t.getBBox(),e=H(e).split(" "),n=[(-1!==e[0].indexOf("%")?parseFloat(e[0])/100*f.width:parseFloat(e[0]))+f.x,(-1!==e[1].indexOf("%")?parseFloat(e[1])/100*f.height:parseFloat(e[1]))+f.y]),i.xOrigin=h=parseFloat(n[0]),i.yOrigin=_=parseFloat(n[1]),s&&x!==Rt&&(u=x[0],f=x[1],c=x[2],p=x[3],d=x[4],m=x[5],g=u*p-f*c,o=h*(p/g)+_*(-c/g)+(c*m-p*d)/g,l=h*(-f/g)+_*(u/g)-(u*m-f*d)/g,h=i.xOrigin=n[0]=o,_=i.yOrigin=n[1]=l),T&&(r||!1!==r&&!1!==a.defaultSmoothOrigin?(o=h-v,l=_-y,T.xOffset+=o*x[0]+l*x[2]-o,T.yOffset+=o*x[1]+l*x[3]-l):T.xOffset=T.yOffset=0),t.setAttribute("data-svg-origin",n.join(" "))},kt=function(t){return!!(bt&&"function"==typeof t.getBBox&&t.getCTM&&(!t.parentNode||t.parentNode.getBBox&&t.parentNode.getCTM))},Rt=[1,0,0,1,0,0],At=function(t,e){var i,s,r,n,a,o=t._gsTransform||new xt;if(gt?s=U(t,vt,null,!0):t.currentStyle&&(s=t.currentStyle.filter.match(/(M11|M12|M21|M22)=[\d\-\.e]+/gi),s=s&&4===s.length?[s[0].substr(4),Number(s[2].substr(4)),Number(s[1].substr(4)),s[3].substr(4),o.x||0,o.y||0].join(","):""),i=!s||"none"===s||"matrix(1, 0, 0, 1, 0, 0)"===s,(o.svg||t.getBBox&&kt(t))&&(i&&-1!==(t.style[gt]+"").indexOf("matrix")&&(s=t.style[gt],i=0),r=t.getAttribute("transform"),i&&r&&(-1!==r.indexOf("matrix")?(s=r,i=0):-1!==r.indexOf("translate")&&(s="matrix(1,0,0,1,"+r.match(/(?:\-|\b)[\d\-\.e]+\b/gi).join(",")+")",i=0))),i)return Rt;for(r=(s||"").match(/(?:\-|\b)[\d\-\.e]+\b/gi)||[],ft=r.length;--ft>-1;)n=Number(r[ft]),r[ft]=(a=n-(n|=0))?(1e5*a+(a<0?-.5:.5)|0)/1e5+n:n;return e&&r.length>6?[r[0],r[1],r[4],r[5],r[12],r[13]]:r},Ct=F.getTransform=function(t,i,s,n){if(t._gsTransform&&s&&!n)return t._gsTransform;var o,l,h,_,u,f,c=s?t._gsTransform||new xt:new xt,p=c.scaleX<0,d=Tt?parseFloat(U(t,yt,i,!1,"0 0 0").split(" ")[2])||c.zOrigin||0:0,m=parseFloat(a.defaultTransformPerspective)||0;if(c.svg=!(!t.getBBox||!kt(t)),c.svg&&(St(t,U(t,yt,r,!1,"50% 50%")+"",c,t.getAttribute("data-svg-origin")),dt=a.useSVGTransformAttr||Ot),(o=At(t))!==Rt){if(16===o.length){var g,v,y,T,x,b=o[0],w=o[1],P=o[2],O=o[3],S=o[4],k=o[5],A=o[6],C=o[7],D=o[8],M=o[9],z=o[10],F=o[12],I=o[13],X=o[14],N=o[11],L=Math.atan2(A,z);c.zOrigin&&(X=-c.zOrigin,F=D*X-o[12],I=M*X-o[13],X=z*X+c.zOrigin-o[14]),c.rotationX=L*R,L&&(T=Math.cos(-L),x=Math.sin(-L),g=S*T+D*x,v=k*T+M*x,y=A*T+z*x,D=S*-x+D*T,M=k*-x+M*T,z=A*-x+z*T,N=C*-x+N*T,S=g,k=v,A=y),L=Math.atan2(-P,z),c.rotationY=L*R,L&&(T=Math.cos(-L),x=Math.sin(-L),g=b*T-D*x,v=w*T-M*x,y=P*T-z*x,M=w*x+M*T,z=P*x+z*T,N=O*x+N*T,b=g,w=v,P=y),L=Math.atan2(w,b),c.rotation=L*R,L&&(T=Math.cos(-L),x=Math.sin(-L),b=b*T+S*x,v=w*T+k*x,k=w*-x+k*T,A=P*-x+A*T,w=v),c.rotationX&&Math.abs(c.rotationX)+Math.abs(c.rotation)>359.9&&(c.rotationX=c.rotation=0,c.rotationY=180-c.rotationY),c.scaleX=(1e5*Math.sqrt(b*b+w*w)+.5|0)/1e5,c.scaleY=(1e5*Math.sqrt(k*k+M*M)+.5|0)/1e5,c.scaleZ=(1e5*Math.sqrt(A*A+z*z)+.5|0)/1e5,c.skewX=0,c.perspective=N?1/(N<0?-N:N):0,c.x=F,c.y=I,c.z=X,c.svg&&(c.x-=c.xOrigin-(c.xOrigin*b-c.yOrigin*S),c.y-=c.yOrigin-(c.yOrigin*w-c.xOrigin*k))}else if((!Tt||n||!o.length||c.x!==o[4]||c.y!==o[5]||!c.rotationX&&!c.rotationY)&&(void 0===c.x||"none"!==U(t,"display",i))){var E=o.length>=6,Y=E?o[0]:1,B=o[1]||0,j=o[2]||0,V=E?o[3]:1;c.x=o[4]||0,c.y=o[5]||0,h=Math.sqrt(Y*Y+B*B),_=Math.sqrt(V*V+j*j),u=Y||B?Math.atan2(B,Y)*R:c.rotation||0,f=j||V?Math.atan2(j,V)*R+u:c.skewX||0,Math.abs(f)>90&&Math.abs(f)<270&&(p?(h*=-1,f+=u<=0?180:-180,u+=u<=0?180:-180):(_*=-1,f+=f<=0?180:-180)),c.scaleX=h,c.scaleY=_,c.rotation=u,c.skewX=f,Tt&&(c.rotationX=c.rotationY=c.z=0,c.perspective=m,c.scaleZ=1),c.svg&&(c.x-=c.xOrigin-(c.xOrigin*Y+c.yOrigin*j),c.y-=c.yOrigin-(c.xOrigin*B+c.yOrigin*V))}c.zOrigin=d;for(l in c)c[l]<2e-5&&c[l]>-2e-5&&(c[l]=0)}return s&&(t._gsTransform=c,c.svg&&(dt&&t.style[gt]?e.delayedCall(.001,function(){Ft(t.style,gt)}):!dt&&t.getAttribute("transform")&&e.delayedCall(.001,function(){t.removeAttribute("transform")}))),c},Dt=function(t){var e,i,s=this.data,r=-s.rotation*k,n=r+s.skewX*k,a=(Math.cos(r)*s.scaleX*1e5|0)/1e5,o=(Math.sin(r)*s.scaleX*1e5|0)/1e5,l=(Math.sin(n)*-s.scaleY*1e5|0)/1e5,h=(Math.cos(n)*s.scaleY*1e5|0)/1e5,_=this.t.style,u=this.t.currentStyle;if(u){i=o,o=-l,l=-i,e=u.filter,_.filter="";var f,c,p=this.t.offsetWidth,m=this.t.offsetHeight,g="absolute"!==u.position,v="progid:DXImageTransform.Microsoft.Matrix(M11="+a+", M12="+o+", M21="+l+", M22="+h,y=s.x+p*s.xPercent/100,b=s.y+m*s.yPercent/100;if(null!=s.ox&&(f=(s.oxp?p*s.ox*.01:s.ox)-p/2,c=(s.oyp?m*s.oy*.01:s.oy)-m/2,y+=f-(f*a+c*o),b+=c-(f*l+c*h)),g?(f=p/2,c=m/2,v+=", Dx="+(f-(f*a+c*o)+y)+", Dy="+(c-(f*l+c*h)+b)+")"):v+=", sizingMethod='auto expand')",-1!==e.indexOf("DXImageTransform.Microsoft.Matrix(")?_.filter=e.replace(/progid\:DXImageTransform\.Microsoft\.Matrix\(.+?\)/i,v):_.filter=v+" "+e,0!==t&&1!==t||1===a&&0===o&&0===l&&1===h&&(g&&-1===v.indexOf("Dx=0, Dy=0")||x.test(e)&&100!==parseFloat(RegExp.$1)||-1===e.indexOf(e.indexOf("Alpha"))&&_.removeAttribute("filter")),!g){var w,P,O,S=d<8?1:-1;for(f=s.ieOffsetX||0,c=s.ieOffsetY||0,s.ieOffsetX=Math.round((p-((a<0?-a:a)*p+(o<0?-o:o)*m))/2+y),s.ieOffsetY=Math.round((m-((h<0?-h:h)*m+(l<0?-l:l)*p))/2+b),ft=0;ft<4;ft++)P=$[ft],w=u[P],i=-1!==w.indexOf("px")?parseFloat(w):V(this.t,P,parseFloat(w),w.replace(T,""))||0,O=i!==s[P]?ft<2?-s.ieOffsetX:-s.ieOffsetY:ft<2?f-s.ieOffsetX:c-s.ieOffsetY,_[P]=(s[P]=Math.round(i-O*(0===ft||2===ft?1:S)))+"px"}}},Mt=F.set3DTransformRatio=F.setTransformRatio=function(t){var e,i,s,r,n,a,o,l,h,_,u,f,p,d,m,g,v,y,T,x,b,w,P,O=this.data,S=this.t.style,R=O.rotation,A=O.rotationX,C=O.rotationY,D=O.scaleX,M=O.scaleY,z=O.scaleZ,F=O.x,I=O.y,X=O.z,N=O.svg,L=O.perspective,E=O.force3D;if(((1===t||0===t)&&"auto"===E&&(this.tween._totalTime===this.tween._totalDuration||!this.tween._totalTime)||!E)&&!X&&!L&&!C&&!A&&1===z||dt&&N||!Tt)return void(R||O.skewX||N?(R*=k,w=O.skewX*k,P=1e5,e=Math.cos(R)*D,r=Math.sin(R)*D,i=Math.sin(R-w)*-M,n=Math.cos(R-w)*M,w&&"simple"===O.skewType&&(v=Math.tan(w),v=Math.sqrt(1+v*v),i*=v,n*=v,O.skewY&&(e*=v,r*=v)),N&&(F+=O.xOrigin-(O.xOrigin*e+O.yOrigin*i)+O.xOffset,I+=O.yOrigin-(O.xOrigin*r+O.yOrigin*n)+O.yOffset,dt&&(O.xPercent||O.yPercent)&&(d=this.t.getBBox(),F+=.01*O.xPercent*d.width,I+=.01*O.yPercent*d.height),d=1e-6,F<d&&F>-d&&(F=0),I<d&&I>-d&&(I=0)),T=(e*P|0)/P+","+(r*P|0)/P+","+(i*P|0)/P+","+(n*P|0)/P+","+F+","+I+")",N&&dt?this.t.setAttribute("transform","matrix("+T):S[gt]=(O.xPercent||O.yPercent?"translate("+O.xPercent+"%,"+O.yPercent+"%) matrix(":"matrix(")+T):S[gt]=(O.xPercent||O.yPercent?"translate("+O.xPercent+"%,"+O.yPercent+"%) matrix(":"matrix(")+D+",0,0,"+M+","+F+","+I+")");if(c&&(d=1e-4,D<d&&D>-d&&(D=z=2e-5),M<d&&M>-d&&(M=z=2e-5),!L||O.z||O.rotationX||O.rotationY||(L=0)),R||O.skewX)R*=k,m=e=Math.cos(R),g=r=Math.sin(R),O.skewX&&(R-=O.skewX*k,m=Math.cos(R),g=Math.sin(R),"simple"===O.skewType&&(v=Math.tan(O.skewX*k),v=Math.sqrt(1+v*v),m*=v,g*=v,O.skewY&&(e*=v,r*=v))),i=-g,n=m;else{if(!(C||A||1!==z||L||N))return void(S[gt]=(O.xPercent||O.yPercent?"translate("+O.xPercent+"%,"+O.yPercent+"%) translate3d(":"translate3d(")+F+"px,"+I+"px,"+X+"px)"+(1!==D||1!==M?" scale("+D+","+M+")":""));e=n=1,i=r=0}h=1,s=a=o=l=_=u=0,f=L?-1/L:0,p=O.zOrigin,d=1e-6,x=",",b="0",R=C*k,R&&(m=Math.cos(R),g=Math.sin(R),o=-g,_=f*-g,s=e*g,a=r*g,h=m,f*=m,e*=m,r*=m),R=A*k,R&&(m=Math.cos(R),g=Math.sin(R),v=i*m+s*g,y=n*m+a*g,l=h*g,u=f*g,s=i*-g+s*m,a=n*-g+a*m,h*=m,f*=m,i=v,n=y),1!==z&&(s*=z,a*=z,h*=z,f*=z),1!==M&&(i*=M,n*=M,l*=M,u*=M),1!==D&&(e*=D,r*=D,o*=D,_*=D),(p||N)&&(p&&(F+=s*-p,I+=a*-p,X+=h*-p+p),N&&(F+=O.xOrigin-(O.xOrigin*e+O.yOrigin*i)+O.xOffset,I+=O.yOrigin-(O.xOrigin*r+O.yOrigin*n)+O.yOffset),F<d&&F>-d&&(F=b),I<d&&I>-d&&(I=b),X<d&&X>-d&&(X=0)),T=O.xPercent||O.yPercent?"translate("+O.xPercent+"%,"+O.yPercent+"%) matrix3d(":"matrix3d(",T+=(e<d&&e>-d?b:e)+x+(r<d&&r>-d?b:r)+x+(o<d&&o>-d?b:o),T+=x+(_<d&&_>-d?b:_)+x+(i<d&&i>-d?b:i)+x+(n<d&&n>-d?b:n),A||C||1!==z?(T+=x+(l<d&&l>-d?b:l)+x+(u<d&&u>-d?b:u)+x+(s<d&&s>-d?b:s),T+=x+(a<d&&a>-d?b:a)+x+(h<d&&h>-d?b:h)+x+(f<d&&f>-d?b:f)+x):T+=",0,0,0,0,1,0,",T+=F+x+I+x+X+x+(L?1+-X/L:1)+")",S[gt]=T};h=xt.prototype,h.x=h.y=h.z=h.skewX=h.skewY=h.rotation=h.rotationX=h.rotationY=h.zOrigin=h.xPercent=h.yPercent=h.xOffset=h.yOffset=0,h.scaleX=h.scaleY=h.scaleZ=1,pt("transform,scale,scaleX,scaleY,scaleZ,x,y,z,rotation,rotationX,rotationY,rotationZ,skewX,skewY,shortRotation,shortRotationX,shortRotationY,shortRotationZ,transformOrigin,svgOrigin,transformPerspective,directionalRotation,parseTransform,force3D,skewType,xPercent,yPercent,smoothOrigin",{parser:function(t,e,i,s,n,o,l){if(s._lastParsedTransform===l)return n;s._lastParsedTransform=l;var h,_,u,f,c,p,d,m,g,v,y=t._gsTransform,T=t.style,x=mt.length,b=l,w={};if(l.display?(f=U(t,"display"),T.display="block",h=Ct(t,r,!0,l.parseTransform),T.display=f):h=Ct(t,r,!0,l.parseTransform),s._transform=h,"string"==typeof b.transform&&gt)f=M.style,f[gt]=b.transform,f.display="block",f.position="absolute",C.body.appendChild(M),_=Ct(M,null,!1),C.body.removeChild(M),_.perspective||(_.perspective=h.perspective),null!=b.xPercent&&(_.xPercent=J(b.xPercent,h.xPercent)),null!=b.yPercent&&(_.yPercent=J(b.yPercent,h.yPercent));else if("object"==typeof b){if(_={scaleX:J(null!=b.scaleX?b.scaleX:b.scale,h.scaleX),scaleY:J(null!=b.scaleY?b.scaleY:b.scale,h.scaleY),scaleZ:J(b.scaleZ,h.scaleZ),x:J(b.x,h.x),y:J(b.y,h.y),z:J(b.z,h.z),xPercent:J(b.xPercent,h.xPercent),yPercent:J(b.yPercent,h.yPercent),perspective:J(b.transformPerspective,h.perspective)},null!=(m=b.directionalRotation))if("object"==typeof m)for(f in m)b[f]=m[f];else b.rotation=m;"string"==typeof b.x&&-1!==b.x.indexOf("%")&&(_.x=0,_.xPercent=J(b.x,h.xPercent)),"string"==typeof b.y&&-1!==b.y.indexOf("%")&&(_.y=0,_.yPercent=J(b.y,h.yPercent)),_.rotation=tt("rotation"in b?b.rotation:"shortRotation"in b?b.shortRotation+"_short":"rotationZ"in b?b.rotationZ:h.rotation,h.rotation,"rotation",w),Tt&&(_.rotationX=tt("rotationX"in b?b.rotationX:"shortRotationX"in b?b.shortRotationX+"_short":h.rotationX||0,h.rotationX,"rotationX",w),_.rotationY=tt("rotationY"in b?b.rotationY:"shortRotationY"in b?b.shortRotationY+"_short":h.rotationY||0,h.rotationY,"rotationY",w)),_.skewX=null==b.skewX?h.skewX:tt(b.skewX,h.skewX),_.skewY=null==b.skewY?h.skewY:tt(b.skewY,h.skewY),(u=_.skewY-h.skewY)&&(_.skewX+=u,_.rotation+=u)}for(Tt&&null!=b.force3D&&(h.force3D=b.force3D,d=!0),h.skewType=b.skewType||h.skewType||a.defaultSkewType,p=h.force3D||h.z||h.rotationX||h.rotationY||_.z||_.rotationX||_.rotationY||_.perspective,p||null==b.scale||(_.scaleZ=1);--x>-1;)i=mt[x],((c=_[i]-h[i])>1e-6||c<-1e-6||null!=b[i]||null!=A[i])&&(d=!0,n=new ht(h,i,h[i],c,n),i in w&&(n.e=w[i]),n.xs0=0,n.plugin=o,s._overwriteProps.push(n.n));return c=b.transformOrigin,h.svg&&(c||b.svgOrigin)&&(g=h.xOffset,v=h.yOffset,St(t,H(c),_,b.svgOrigin,b.smoothOrigin),n=_t(h,"xOrigin",(y?h:_).xOrigin,_.xOrigin,n,"transformOrigin"),n=_t(h,"yOrigin",(y?h:_).yOrigin,_.yOrigin,n,"transformOrigin"),g===h.xOffset&&v===h.yOffset||(n=_t(h,"xOffset",y?g:h.xOffset,h.xOffset,n,"transformOrigin"),n=_t(h,"yOffset",y?v:h.yOffset,h.yOffset,n,"transformOrigin")),c=dt?null:"0px 0px"),(c||Tt&&p&&h.zOrigin)&&(gt?(d=!0,i=yt,c=(c||U(t,i,r,!1,"50% 50%"))+"",n=new ht(T,i,0,0,n,-1,"transformOrigin"),n.b=T[i],n.plugin=o,Tt?(f=h.zOrigin,c=c.split(" "),h.zOrigin=(c.length>2&&(0===f||"0px"!==c[2])?parseFloat(c[2]):f)||0,n.xs0=n.e=c[0]+" "+(c[1]||"50%")+" 0px",n=new ht(h,"zOrigin",0,0,n,-1,n.n),n.b=f,n.xs0=n.e=h.zOrigin):n.xs0=n.e=c):H(c+"",h)),d&&(s._transformType=h.svg&&dt||!p&&3!==this._transformType?2:3),n},prefix:!0}),pt("boxShadow",{defaultValue:"0px 0px 0px 0px #999",prefix:!0,color:!0,multi:!0,keyword:"inset"}),pt("borderRadius",{defaultValue:"0px",parser:function(t,e,i,n,a,o){e=this.format(e);var l,h,_,u,f,c,p,d,m,g,v,y,T,x,b,w,P=["borderTopLeftRadius","borderTopRightRadius","borderBottomRightRadius","borderBottomLeftRadius"],O=t.style;for(m=parseFloat(t.offsetWidth),g=parseFloat(t.offsetHeight),l=e.split(" "),h=0;h<P.length;h++)this.p.indexOf("border")&&(P[h]=B(P[h])),f=u=U(t,P[h],r,!1,"0px"),-1!==f.indexOf(" ")&&(u=f.split(" "),f=u[0],u=u[1]),c=_=l[h],p=parseFloat(f),y=f.substr((p+"").length),T="="===c.charAt(1),T?(d=parseInt(c.charAt(0)+"1",10),c=c.substr(2),d*=parseFloat(c),v=c.substr((d+"").length-(d<0?1:0))||""):(d=parseFloat(c),v=c.substr((d+"").length)),""===v&&(v=s[i]||y),v!==y&&(x=V(t,"borderLeft",p,y),b=V(t,"borderTop",p,y),"%"===v?(f=x/m*100+"%",u=b/g*100+"%"):"em"===v?(w=V(t,"borderLeft",1,"em"),f=x/w+"em",u=b/w+"em"):(f=x+"px",u=b+"px"),T&&(c=parseFloat(f)+d+v,_=parseFloat(u)+d+v)),a=ut(O,P[h],f+" "+u,c+" "+_,!1,"0px",a);return a},prefix:!0,formatter:at("0px 0px 0px 0px",!1,!0)}),pt("backgroundPosition",{defaultValue:"0 0",parser:function(t,e,i,s,n,a){
var o,l,h,_,u,f,c="background-position",p=r||j(t,null),m=this.format((p?d?p.getPropertyValue(c+"-x")+" "+p.getPropertyValue(c+"-y"):p.getPropertyValue(c):t.currentStyle.backgroundPositionX+" "+t.currentStyle.backgroundPositionY)||"0 0"),g=this.format(e);if(-1!==m.indexOf("%")!=(-1!==g.indexOf("%"))&&(f=U(t,"backgroundImage").replace(/(^(?:url\(\"|url\())|(?:(\"\))$|\)$)/gi,""))&&"none"!==f){for(o=m.split(" "),l=g.split(" "),z.setAttribute("src",f),h=2;--h>-1;)m=o[h],(_=-1!==m.indexOf("%"))!==(-1!==l[h].indexOf("%"))&&(u=0===h?t.offsetWidth-z.width:t.offsetHeight-z.height,o[h]=_?parseFloat(m)/100*u+"px":parseFloat(m)/u*100+"%");m=o.join(" ")}return this.parseComplex(t.style,m,g,n,a)},formatter:H}),pt("backgroundSize",{defaultValue:"0 0",formatter:H}),pt("perspective",{defaultValue:"0px",prefix:!0}),pt("perspectiveOrigin",{defaultValue:"50% 50%",prefix:!0}),pt("transformStyle",{prefix:!0}),pt("backfaceVisibility",{prefix:!0}),pt("userSelect",{prefix:!0}),pt("margin",{parser:ot("marginTop,marginRight,marginBottom,marginLeft")}),pt("padding",{parser:ot("paddingTop,paddingRight,paddingBottom,paddingLeft")}),pt("clip",{defaultValue:"rect(0px,0px,0px,0px)",parser:function(t,e,i,s,n,a){var o,l,h;return d<9?(l=t.currentStyle,h=d<8?" ":",",o="rect("+l.clipTop+h+l.clipRight+h+l.clipBottom+h+l.clipLeft+")",e=this.format(e).split(",").join(h)):(o=this.format(U(t,this.p,r,!1,this.dflt)),e=this.format(e)),this.parseComplex(t.style,o,e,n,a)}}),pt("textShadow",{defaultValue:"0px 0px 0px #999",color:!0,multi:!0}),pt("autoRound,strictUnits",{parser:function(t,e,i,s,r){return r}}),pt("border",{defaultValue:"0px solid #000",parser:function(t,e,i,s,n,a){return this.parseComplex(t.style,this.format(U(t,"borderTopWidth",r,!1,"0px")+" "+U(t,"borderTopStyle",r,!1,"solid")+" "+U(t,"borderTopColor",r,!1,"#000")),this.format(e),n,a)},color:!0,formatter:function(t){var e=t.split(" ");return e[0]+" "+(e[1]||"solid")+" "+(t.match(nt)||["#000"])[0]}}),pt("borderWidth",{parser:ot("borderTopWidth,borderRightWidth,borderBottomWidth,borderLeftWidth")}),pt("float,cssFloat,styleFloat",{parser:function(t,e,i,s,r,n){var a=t.style,o="cssFloat"in a?"cssFloat":"styleFloat";return new ht(a,o,0,0,r,-1,i,!1,0,a[o],e)}});var zt=function(t){var e,i=this.t,s=i.filter||U(this.data,"filter")||"",r=this.s+this.c*t|0;100===r&&(-1===s.indexOf("atrix(")&&-1===s.indexOf("radient(")&&-1===s.indexOf("oader(")?(i.removeAttribute("filter"),e=!U(this.data,"filter")):(i.filter=s.replace(/alpha\(opacity *=.+?\)/i,""),e=!0)),e||(this.xn1&&(i.filter=s=s||"alpha(opacity="+r+")"),-1===s.indexOf("pacity")?0===r&&this.xn1||(i.filter=s+" alpha(opacity="+r+")"):i.filter=s.replace(x,"opacity="+r))};pt("opacity,alpha,autoAlpha",{defaultValue:"1",parser:function(t,e,i,s,n,a){var o=parseFloat(U(t,"opacity",r,!1,"1")),l=t.style,h="autoAlpha"===i;return"string"==typeof e&&"="===e.charAt(1)&&(e=("-"===e.charAt(0)?-1:1)*parseFloat(e.substr(2))+o),h&&1===o&&"hidden"===U(t,"visibility",r)&&0!==e&&(o=0),X?n=new ht(l,"opacity",o,e-o,n):(n=new ht(l,"opacity",100*o,100*(e-o),n),n.xn1=h?1:0,l.zoom=1,n.type=2,n.b="alpha(opacity="+n.s+")",n.e="alpha(opacity="+(n.s+n.c)+")",n.data=t,n.plugin=a,n.setRatio=zt),h&&(n=new ht(l,"visibility",0,0,n,-1,null,!1,0,0!==o?"inherit":"hidden",0===e?"hidden":"inherit"),n.xs0="inherit",s._overwriteProps.push(n.n),s._overwriteProps.push(i)),n}});var Ft=function(t,e){e&&(t.removeProperty?("ms"!==e.substr(0,2)&&"webkit"!==e.substr(0,6)||(e="-"+e),t.removeProperty(e.replace(/([A-Z])/g,"-$1").toLowerCase())):t.removeAttribute(e))},It=function(t){if(this.t._gsClassPT=this,1===t||0===t){this.t.setAttribute("class",0===t?this.b:this.e);for(var e=this.data,i=this.t.style;e;)e.v?i[e.p]=e.v:Ft(i,e.p),e=e._next;1===t&&this.t._gsClassPT===this&&(this.t._gsClassPT=null)}else this.t.getAttribute("class")!==this.e&&this.t.setAttribute("class",this.e)};pt("className",{parser:function(t,e,s,n,a,o,l){var h,_,u,f,c,p=t.getAttribute("class")||"",d=t.style.cssText;if(a=n._classNamePT=new ht(t,s,0,0,a,2),a.setRatio=It,a.pr=-11,i=!0,a.b=p,_=W(t,r),u=t._gsClassPT){for(f={},c=u.data;c;)f[c.p]=1,c=c._next;u.setRatio(1)}return t._gsClassPT=a,a.e="="!==e.charAt(1)?e:p.replace(new RegExp("\\s*\\b"+e.substr(2)+"\\b"),"")+("+"===e.charAt(0)?" "+e.substr(2):""),t.setAttribute("class",a.e),h=Z(t,_,W(t),l,f),t.setAttribute("class",p),a.data=h.firstMPT,t.style.cssText=d,a=a.xfirst=n.parse(t,h.difs,a,o)}});var Xt=function(t){if((1===t||0===t)&&this.data._totalTime===this.data._totalDuration&&"isFromStart"!==this.data.data){var e,i,s,r,n,a=this.t.style,o=l.transform.parse;if("all"===this.e)a.cssText="",r=!0;else for(e=this.e.split(" ").join("").split(","),s=e.length;--s>-1;)i=e[s],l[i]&&(l[i].parse===o?r=!0:i="transformOrigin"===i?yt:l[i].p),Ft(a,i);r&&(Ft(a,gt),(n=this.t._gsTransform)&&(n.svg&&(this.t.removeAttribute("data-svg-origin"),this.t.removeAttribute("transform")),delete this.t._gsTransform))}};for(pt("clearProps",{parser:function(t,e,s,r,n){return n=new ht(t,s,0,0,n,2),n.setRatio=Xt,n.e=e,n.pr=-10,n.data=r._tween,i=!0,n}}),h="bezier,throwProps,physicsProps,physics2D".split(","),ft=h.length;ft--;)!function(t){if(!l[t]){var e=t.charAt(0).toUpperCase()+t.substr(1)+"Plugin";pt(t,{parser:function(t,i,s,r,n,a,h){var _=o.com.greensock.plugins[e];return _?(_._cssRegister(),l[s].parse(t,i,s,r,n,a,h)):(L("Error: "+e+" js file not loaded."),n)}})}}(h[ft]);h=a.prototype,h._firstPT=h._lastParsedTransform=h._transform=null,h._onInitTween=function(t,e,o){if(!t.nodeType)return!1;this._target=t,this._tween=o,this._vars=e,_=e.autoRound,i=!1,s=e.suffixMap||a.suffixMap,r=j(t,""),n=this._overwriteProps;var h,c,d,m,g,v,y,T,x,w=t.style;if(u&&""===w.zIndex&&("auto"!==(h=U(t,"zIndex",r))&&""!==h||this._addLazySet(w,"zIndex",0)),"string"==typeof e&&(m=w.cssText,h=W(t,r),w.cssText=m+";"+e,h=Z(t,h,W(t)).difs,!X&&b.test(e)&&(h.opacity=parseFloat(RegExp.$1)),e=h,w.cssText=m),e.className?this._firstPT=c=l.className.parse(t,e.className,"className",this,null,null,e):this._firstPT=c=this.parse(t,e,null),this._transformType){for(x=3===this._transformType,gt?f&&(u=!0,""===w.zIndex&&("auto"!==(y=U(t,"zIndex",r))&&""!==y||this._addLazySet(w,"zIndex",0)),p&&this._addLazySet(w,"WebkitBackfaceVisibility",this._vars.WebkitBackfaceVisibility||(x?"visible":"hidden"))):w.zoom=1,d=c;d&&d._next;)d=d._next;T=new ht(t,"transform",0,0,null,2),this._linkCSSP(T,null,d),T.setRatio=gt?Mt:Dt,T.data=this._transform||Ct(t,r,!0),T.tween=o,T.pr=-1,n.pop()}if(i){for(;c;){for(v=c._next,d=m;d&&d.pr>c.pr;)d=d._next;(c._prev=d?d._prev:g)?c._prev._next=c:m=c,(c._next=d)?d._prev=c:g=c,c=v}this._firstPT=m}return!0},h.parse=function(t,e,i,n){var a,o,h,u,f,c,p,d,m,g,v=t.style;for(a in e)c=e[a],o=l[a],o?i=o.parse(t,c,a,this,i,n,e):(f=U(t,a,r)+"",m="string"==typeof c,"color"===a||"fill"===a||"stroke"===a||-1!==a.indexOf("Color")||m&&w.test(c)?(m||(c=st(c),c=(c.length>3?"rgba(":"rgb(")+c.join(",")+")"),i=ut(v,a,f,c,!0,"transparent",i,0,n)):!m||-1===c.indexOf(" ")&&-1===c.indexOf(",")?(h=parseFloat(f),p=h||0===h?f.substr((h+"").length):"",""!==f&&"auto"!==f||("width"===a||"height"===a?(h=Q(t,a,r),p="px"):"left"===a||"top"===a?(h=q(t,a,r),p="px"):(h="opacity"!==a?0:1,p="")),g=m&&"="===c.charAt(1),g?(u=parseInt(c.charAt(0)+"1",10),c=c.substr(2),u*=parseFloat(c),d=c.replace(T,"")):(u=parseFloat(c),d=m?c.replace(T,""):""),""===d&&(d=a in s?s[a]:p),c=u||0===u?(g?u+h:u)+d:e[a],p!==d&&""!==d&&(u||0===u)&&h&&(h=V(t,a,h,p),"%"===d?(h/=V(t,a,100,"%")/100,!0!==e.strictUnits&&(f=h+"%")):"em"===d||"rem"===d||"vw"===d||"vh"===d?h/=V(t,a,1,d):"px"!==d&&(u=V(t,a,u,d),d="px"),g&&(u||0===u)&&(c=u+h+d)),g&&(u+=h),!h&&0!==h||!u&&0!==u?void 0!==v[a]&&(c||c+""!="NaN"&&null!=c)?(i=new ht(v,a,u||h||0,0,i,-1,a,!1,0,f,c),i.xs0="none"!==c||"display"!==a&&-1===a.indexOf("Style")?c:f):L("invalid "+a+" tween value: "+e[a]):(i=new ht(v,a,h,u-h,i,0,a,!1!==_&&("px"===d||"zIndex"===a),0,f,c),i.xs0=d)):i=ut(v,a,f,c,!0,null,i,0,n)),n&&i&&!i.plugin&&(i.plugin=n);return i},h.setRatio=function(t){var e,i,s,r=this._firstPT;if(1!==t||this._tween._time!==this._tween._duration&&0!==this._tween._time)if(t||this._tween._time!==this._tween._duration&&0!==this._tween._time||-1e-6===this._tween._rawPrevTime)for(;r;){if(e=r.c*t+r.s,r.r?e=Math.round(e):e<1e-6&&e>-1e-6&&(e=0),r.type)if(1===r.type)if(2===(s=r.l))r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2;else if(3===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2+r.xn2+r.xs3;else if(4===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2+r.xn2+r.xs3+r.xn3+r.xs4;else if(5===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2+r.xn2+r.xs3+r.xn3+r.xs4+r.xn4+r.xs5;else{for(i=r.xs0+e+r.xs1,s=1;s<r.l;s++)i+=r["xn"+s]+r["xs"+(s+1)];r.t[r.p]=i}else-1===r.type?r.t[r.p]=r.xs0:r.setRatio&&r.setRatio(t);else r.t[r.p]=e+r.xs0;r=r._next}else for(;r;)2!==r.type?r.t[r.p]=r.b:r.setRatio(t),r=r._next;else for(;r;){if(2!==r.type)if(r.r&&-1!==r.type)if(e=Math.round(r.s+r.c),r.type){if(1===r.type){for(s=r.l,i=r.xs0+e+r.xs1,s=1;s<r.l;s++)i+=r["xn"+s]+r["xs"+(s+1)];r.t[r.p]=i}}else r.t[r.p]=e+r.xs0;else r.t[r.p]=r.e;else r.setRatio(t);r=r._next}},h._enableTransforms=function(t){this._transform=this._transform||Ct(this._target,r,!0),this._transformType=this._transform.svg&&dt||!t&&3!==this._transformType?2:3};var Nt=function(t){this.t[this.p]=this.e,this.data._linkCSSP(this,this._next,null,!0)};h._addLazySet=function(t,e,i){var s=this._firstPT=new ht(t,e,0,0,this._firstPT,2);s.e=i,s.setRatio=Nt,s.data=this},h._linkCSSP=function(t,e,i,s){return t&&(e&&(e._prev=t),t._next&&(t._next._prev=t._prev),t._prev?t._prev._next=t._next:this._firstPT===t&&(this._firstPT=t._next,s=!0),i?i._next=t:s||null!==this._firstPT||(this._firstPT=t),t._next=e,t._prev=i),t},h._kill=function(e){var i,s,r,n=e;if(e.autoAlpha||e.alpha){n={};for(s in e)n[s]=e[s];n.opacity=1,n.autoAlpha&&(n.visibility=1)}return e.className&&(i=this._classNamePT)&&(r=i.xfirst,r&&r._prev?this._linkCSSP(r._prev,i._next,r._prev._prev):r===this._firstPT&&(this._firstPT=i._next),i._next&&this._linkCSSP(i._next,i._next._next,r._prev),this._classNamePT=null),t.prototype._kill.call(this,n)};var Lt=function(t,e,i){var s,r,n,a;if(t.slice)for(r=t.length;--r>-1;)Lt(t[r],e,i);else for(s=t.childNodes,r=s.length;--r>-1;)n=s[r],a=n.type,n.style&&(e.push(W(n)),i&&i.push(n)),1!==a&&9!==a&&11!==a||!n.childNodes.length||Lt(n,e,i)};return a.cascadeTo=function(t,i,s){var r,n,a,o,l=e.to(t,i,s),h=[l],_=[],u=[],f=[],c=e._internals.reservedProps;for(t=l._targets||l.target,Lt(t,_,f),l.render(i,!0,!0),Lt(t,u),l.render(0,!0,!0),l._enabled(!0),r=f.length;--r>-1;)if(n=Z(f[r],_[r],u[r]),n.firstMPT){n=n.difs;for(a in s)c[a]&&(n[a]=s[a]);o={};for(a in n)o[a]=_[r][a];h.push(e.fromTo(f[r],i,o,n))}return h},t.activate([a]),a},!0),function(){var t=_gsScope._gsDefine.plugin({propName:"roundProps",version:"1.5",priority:-1,API:2,init:function(t,e,i){return this._tween=i,!0}}),e=function(t){for(;t;)t.f||t.blob||(t.r=1),t=t._next},i=t.prototype;i._onInitAllProps=function(){for(var t,i,s,r=this._tween,n=r.vars.roundProps.join?r.vars.roundProps:r.vars.roundProps.split(","),a=n.length,o={},l=r._propLookup.roundProps;--a>-1;)o[n[a]]=1;for(a=n.length;--a>-1;)for(t=n[a],i=r._firstPT;i;)s=i._next,i.pg?i.t._roundProps(o,!0):i.n===t&&(2===i.f&&i.t?e(i.t._firstPT):(this._add(i.t,t,i.s,i.c),s&&(s._prev=i._prev),i._prev?i._prev._next=s:r._firstPT===i&&(r._firstPT=s),i._next=i._prev=null,r._propLookup[t]=l)),i=s;return!1},i._add=function(t,e,i,s){this._addTween(t,e,i,i+s,e,!0),this._overwriteProps.push(e)}}(),function(){_gsScope._gsDefine.plugin({propName:"attr",API:2,version:"0.5.0",init:function(t,e,i){var s;if("function"!=typeof t.setAttribute)return!1;for(s in e)this._addTween(t,"setAttribute",t.getAttribute(s)+"",e[s]+"",s,!1,s),this._overwriteProps.push(s);return!0}})}(),_gsScope._gsDefine.plugin({propName:"directionalRotation",version:"0.2.1",API:2,init:function(t,e,i){"object"!=typeof e&&(e={rotation:e}),this.finals={};var s,r,n,a,o,l,h=!0===e.useRadians?2*Math.PI:360;for(s in e)"useRadians"!==s&&(l=(e[s]+"").split("_"),r=l[0],n=parseFloat("function"!=typeof t[s]?t[s]:t[s.indexOf("set")||"function"!=typeof t["get"+s.substr(3)]?s:"get"+s.substr(3)]()),a=this.finals[s]="string"==typeof r&&"="===r.charAt(1)?n+parseInt(r.charAt(0)+"1",10)*Number(r.substr(2)):Number(r)||0,o=a-n,l.length&&(r=l.join("_"),-1!==r.indexOf("short")&&(o%=h)!==o%(h/2)&&(o=o<0?o+h:o-h),-1!==r.indexOf("_cw")&&o<0?o=(o+9999999999*h)%h-(o/h|0)*h:-1!==r.indexOf("ccw")&&o>0&&(o=(o-9999999999*h)%h-(o/h|0)*h)),(o>1e-6||o<-1e-6)&&(this._addTween(t,s,n,n+o,s),this._overwriteProps.push(s)));return!0},set:function(t){var e;if(1!==t)this._super.setRatio.call(this,t);else for(e=this._firstPT;e;)e.f?e.t[e.p](this.finals[e.p]):e.t[e.p]=this.finals[e.p],e=e._next}})._autoCSS=!0,_gsScope._gsDefine("easing.Back",["easing.Ease"],function(t){var e,i,s,r=_gsScope.GreenSockGlobals||_gsScope,n=r.com.greensock,a=2*Math.PI,o=Math.PI/2,l=n._class,h=function(e,i){var s=l("easing."+e,function(){},!0),r=s.prototype=new t;return r.constructor=s,r.getRatio=i,s},_=t.register||function(){},u=function(t,e,i,s,r){var n=l("easing."+t,{easeOut:new e,easeIn:new i,easeInOut:new s},!0);return _(n,t),n},f=function(t,e,i){this.t=t,this.v=e,i&&(this.next=i,i.prev=this,this.c=i.v-e,this.gap=i.t-t)},c=function(e,i){var s=l("easing."+e,function(t){this._p1=t||0===t?t:1.70158,this._p2=1.525*this._p1},!0),r=s.prototype=new t;return r.constructor=s,r.getRatio=i,r.config=function(t){return new s(t)},s},p=u("Back",c("BackOut",function(t){return(t-=1)*t*((this._p1+1)*t+this._p1)+1}),c("BackIn",function(t){return t*t*((this._p1+1)*t-this._p1)}),c("BackInOut",function(t){return(t*=2)<1?.5*t*t*((this._p2+1)*t-this._p2):.5*((t-=2)*t*((this._p2+1)*t+this._p2)+2)})),d=l("easing.SlowMo",function(t,e,i){e=e||0===e?e:.7,null==t?t=.7:t>1&&(t=1),this._p=1!==t?e:0,this._p1=(1-t)/2,this._p2=t,this._p3=this._p1+this._p2,this._calcEnd=!0===i},!0),m=d.prototype=new t;return m.constructor=d,m.getRatio=function(t){var e=t+(.5-t)*this._p;return t<this._p1?this._calcEnd?1-(t=1-t/this._p1)*t:e-(t=1-t/this._p1)*t*t*t*e:t>this._p3?this._calcEnd?1-(t=(t-this._p3)/this._p1)*t:e+(t-e)*(t=(t-this._p3)/this._p1)*t*t*t:this._calcEnd?1:e},d.ease=new d(.7,.7),m.config=d.config=function(t,e,i){return new d(t,e,i)},e=l("easing.SteppedEase",function(t){t=t||1,this._p1=1/t,this._p2=t+1},!0),m=e.prototype=new t,m.constructor=e,m.getRatio=function(t){return t<0?t=0:t>=1&&(t=.999999999),(this._p2*t>>0)*this._p1},m.config=e.config=function(t){return new e(t)},i=l("easing.RoughEase",function(e){e=e||{};for(var i,s,r,n,a,o,l=e.taper||"none",h=[],_=0,u=0|(e.points||20),c=u,p=!1!==e.randomize,d=!0===e.clamp,m=e.template instanceof t?e.template:null,g="number"==typeof e.strength?.4*e.strength:.4;--c>-1;)i=p?Math.random():1/u*c,s=m?m.getRatio(i):i,"none"===l?r=g:"out"===l?(n=1-i,r=n*n*g):"in"===l?r=i*i*g:i<.5?(n=2*i,r=n*n*.5*g):(n=2*(1-i),r=n*n*.5*g),p?s+=Math.random()*r-.5*r:c%2?s+=.5*r:s-=.5*r,d&&(s>1?s=1:s<0&&(s=0)),h[_++]={x:i,y:s};for(h.sort(function(t,e){return t.x-e.x}),o=new f(1,1,null),c=u;--c>-1;)a=h[c],o=new f(a.x,a.y,o);this._prev=new f(0,0,0!==o.t?o:o.next)},!0),m=i.prototype=new t,m.constructor=i,m.getRatio=function(t){var e=this._prev;if(t>e.t){for(;e.next&&t>=e.t;)e=e.next;e=e.prev}else for(;e.prev&&t<=e.t;)e=e.prev;return this._prev=e,e.v+(t-e.t)/e.gap*e.c},m.config=function(t){return new i(t)},i.ease=new i,u("Bounce",h("BounceOut",function(t){return t<1/2.75?7.5625*t*t:t<2/2.75?7.5625*(t-=1.5/2.75)*t+.75:t<2.5/2.75?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375}),h("BounceIn",function(t){return(t=1-t)<1/2.75?1-7.5625*t*t:t<2/2.75?1-(7.5625*(t-=1.5/2.75)*t+.75):t<2.5/2.75?1-(7.5625*(t-=2.25/2.75)*t+.9375):1-(7.5625*(t-=2.625/2.75)*t+.984375)}),h("BounceInOut",function(t){var e=t<.5;return t=e?1-2*t:2*t-1,t<1/2.75?t*=7.5625*t:t=t<2/2.75?7.5625*(t-=1.5/2.75)*t+.75:t<2.5/2.75?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375,e?.5*(1-t):.5*t+.5})),u("Circ",h("CircOut",function(t){return Math.sqrt(1-(t-=1)*t)}),h("CircIn",function(t){return-(Math.sqrt(1-t*t)-1)}),h("CircInOut",function(t){return(t*=2)<1?-.5*(Math.sqrt(1-t*t)-1):.5*(Math.sqrt(1-(t-=2)*t)+1)})),s=function(e,i,s){var r=l("easing."+e,function(t,e){this._p1=t>=1?t:1,this._p2=(e||s)/(t<1?t:1),this._p3=this._p2/a*(Math.asin(1/this._p1)||0),this._p2=a/this._p2},!0),n=r.prototype=new t;return n.constructor=r,n.getRatio=i,n.config=function(t,e){return new r(t,e)},r},u("Elastic",s("ElasticOut",function(t){return this._p1*Math.pow(2,-10*t)*Math.sin((t-this._p3)*this._p2)+1},.3),s("ElasticIn",function(t){return-this._p1*Math.pow(2,10*(t-=1))*Math.sin((t-this._p3)*this._p2)},.3),s("ElasticInOut",function(t){return(t*=2)<1?this._p1*Math.pow(2,10*(t-=1))*Math.sin((t-this._p3)*this._p2)*-.5:this._p1*Math.pow(2,-10*(t-=1))*Math.sin((t-this._p3)*this._p2)*.5+1},.45)),u("Expo",h("ExpoOut",function(t){return 1-Math.pow(2,-10*t)}),h("ExpoIn",function(t){return Math.pow(2,10*(t-1))-.001}),h("ExpoInOut",function(t){return(t*=2)<1?.5*Math.pow(2,10*(t-1)):.5*(2-Math.pow(2,-10*(t-1)))})),u("Sine",h("SineOut",function(t){return Math.sin(t*o)}),h("SineIn",function(t){return 1-Math.cos(t*o)}),h("SineInOut",function(t){return-.5*(Math.cos(Math.PI*t)-1)})),l("easing.EaseLookup",{find:function(e){return t.map[e]}},!0),_(r.SlowMo,"SlowMo","ease,"),_(i,"RoughEase","ease,"),_(e,"SteppedEase","ease,"),p},!0)}),_gsScope._gsDefine&&_gsScope._gsQueue.pop()(),function(t,e){"use strict";var i=t.GreenSockGlobals=t.GreenSockGlobals||t;if(!i.TweenLite){var s,r,n,a,o,l=function(t){var e,s=t.split("."),r=i;for(e=0;e<s.length;e++)r[s[e]]=r=r[s[e]]||{};return r},h=l("com.greensock"),_=function(t){var e,i=[],s=t.length;for(e=0;e!==s;i.push(t[e++]));return i},u=function(){},f=function(){var t=Object.prototype.toString,e=t.call([]);return function(i){return null!=i&&(i instanceof Array||"object"==typeof i&&!!i.push&&t.call(i)===e)}}(),c={},p=function(e,s,r,n){this.sc=c[e]?c[e].sc:[],c[e]=this,this.gsClass=null,this.func=r;var a=[];this.check=function(o){for(var h,_,u,f,d,m=s.length,g=m;--m>-1;)(h=c[s[m]]||new p(s[m],[])).gsClass?(a[m]=h.gsClass,g--):o&&h.sc.push(this);if(0===g&&r)for(_=("com.greensock."+e).split("."),u=_.pop(),f=l(_.join("."))[u]=this.gsClass=r.apply(r,a),n&&(i[u]=f,d="undefined"!=typeof module&&module.exports,!d&&"function"==typeof define&&define.amd?define((t.GreenSockAMDPath?t.GreenSockAMDPath+"/":"")+e.split(".").pop(),[],function(){return f}):"TweenMax"===e&&d&&(module.exports=f)),m=0;m<this.sc.length;m++)this.sc[m].check()},this.check(!0)},d=t._gsDefine=function(t,e,i,s){return new p(t,e,i,s)},m=h._class=function(t,e,i){return e=e||function(){},d(t,[],function(){return e},i),e};d.globals=i;var g=[0,0,1,1],v=[],y=m("easing.Ease",function(t,e,i,s){this._func=t,this._type=i||0,this._power=s||0,this._params=e?g.concat(e):g},!0),T=y.map={},x=y.register=function(t,e,i,s){for(var r,n,a,o,l=e.split(","),_=l.length,u=(i||"easeIn,easeOut,easeInOut").split(",");--_>-1;)for(n=l[_],r=s?m("easing."+n,null,!0):h.easing[n]||{},a=u.length;--a>-1;)o=u[a],T[n+"."+o]=T[o+n]=r[o]=t.getRatio?t:t[o]||new t};for(n=y.prototype,n._calcEnd=!1,n.getRatio=function(t){if(this._func)return this._params[0]=t,this._func.apply(null,this._params);var e=this._type,i=this._power,s=1===e?1-t:2===e?t:t<.5?2*t:2*(1-t);return 1===i?s*=s:2===i?s*=s*s:3===i?s*=s*s*s:4===i&&(s*=s*s*s*s),1===e?1-s:2===e?s:t<.5?s/2:1-s/2},s=["Linear","Quad","Cubic","Quart","Quint,Strong"],r=s.length;--r>-1;)n=s[r]+",Power"+r,x(new y(null,null,1,r),n,"easeOut",!0),x(new y(null,null,2,r),n,"easeIn"+(0===r?",easeNone":"")),x(new y(null,null,3,r),n,"easeInOut");T.linear=h.easing.Linear.easeIn,T.swing=h.easing.Quad.easeInOut;var b=m("events.EventDispatcher",function(t){this._listeners={},this._eventTarget=t||this});n=b.prototype,n.addEventListener=function(t,e,i,s,r){r=r||0;var n,l,h=this._listeners[t],_=0;for(null==h&&(this._listeners[t]=h=[]),l=h.length;--l>-1;)n=h[l],n.c===e&&n.s===i?h.splice(l,1):0===_&&n.pr<r&&(_=l+1);h.splice(_,0,{c:e,s:i,up:s,pr:r}),this!==a||o||a.wake()},n.removeEventListener=function(t,e){var i,s=this._listeners[t];if(s)for(i=s.length;--i>-1;)if(s[i].c===e)return void s.splice(i,1)},n.dispatchEvent=function(t){var e,i,s,r=this._listeners[t];if(r)for(e=r.length,i=this._eventTarget;--e>-1;)(s=r[e])&&(s.up?s.c.call(s.s||i,{type:t,target:i}):s.c.call(s.s||i))};var w=t.requestAnimationFrame,P=t.cancelAnimationFrame,O=Date.now||function(){return(new Date).getTime()},S=O();for(s=["ms","moz","webkit","o"],r=s.length;--r>-1&&!w;)w=t[s[r]+"RequestAnimationFrame"],P=t[s[r]+"CancelAnimationFrame"]||t[s[r]+"CancelRequestAnimationFrame"];m("Ticker",function(t,e){var i,s,r,n,l,h=this,_=O(),f=!(!1===e||!w)&&"auto",c=500,p=33,d=function(t){var e,a,o=O()-S;o>c&&(_+=o-p),S+=o,h.time=(S-_)/1e3,e=h.time-l,(!i||e>0||!0===t)&&(h.frame++,l+=e+(e>=n?.004:n-e),a=!0),!0!==t&&(r=s(d)),a&&h.dispatchEvent("tick")};b.call(h),h.time=h.frame=0,h.tick=function(){d(!0)},h.lagSmoothing=function(t,e){c=t||1e10,p=Math.min(e,c,0)},h.sleep=function(){null!=r&&(f&&P?P(r):clearTimeout(r),s=u,r=null,h===a&&(o=!1))},h.wake=function(t){null!==r?h.sleep():t?_+=-S+(S=O()):h.frame>10&&(S=O()-c+5),s=0===i?u:f&&w?w:function(t){return setTimeout(t,1e3*(l-h.time)+1|0)},h===a&&(o=!0),d(2)},h.fps=function(t){if(!arguments.length)return i;i=t,n=1/(i||60),l=this.time+n,h.wake()},h.useRAF=function(t){if(!arguments.length)return f;h.sleep(),f=t,h.fps(i)},h.fps(t),setTimeout(function(){"auto"===f&&h.frame<5&&"hidden"!==document.visibilityState&&h.useRAF(!1)},1500)}),n=h.Ticker.prototype=new h.events.EventDispatcher,n.constructor=h.Ticker;var k=m("core.Animation",function(t,e){if(this.vars=e=e||{},this._duration=this._totalDuration=t||0,this._delay=Number(e.delay)||0,this._timeScale=1,this._active=!0===e.immediateRender,this.data=e.data,this._reversed=!0===e.reversed,W){o||a.wake();var i=this.vars.useFrames?q:W;i.add(this,i._time),this.vars.paused&&this.paused(!0)}});a=k.ticker=new h.Ticker,n=k.prototype,n._dirty=n._gc=n._initted=n._paused=!1,n._totalTime=n._time=0,n._rawPrevTime=-1,n._next=n._last=n._onUpdate=n._timeline=n.timeline=null,n._paused=!1;var R=function(){o&&O()-S>2e3&&a.wake(),setTimeout(R,2e3)};R(),n.play=function(t,e){return null!=t&&this.seek(t,e),this.reversed(!1).paused(!1)},n.pause=function(t,e){return null!=t&&this.seek(t,e),this.paused(!0)},n.resume=function(t,e){return null!=t&&this.seek(t,e),this.paused(!1)},n.seek=function(t,e){return this.totalTime(Number(t),!1!==e)},n.restart=function(t,e){return this.reversed(!1).paused(!1).totalTime(t?-this._delay:0,!1!==e,!0)},n.reverse=function(t,e){return null!=t&&this.seek(t||this.totalDuration(),e),this.reversed(!0).paused(!1)},n.render=function(t,e,i){},n.invalidate=function(){return this._time=this._totalTime=0,this._initted=this._gc=!1,this._rawPrevTime=-1,!this._gc&&this.timeline||this._enabled(!0),this},n.isActive=function(){var t,e=this._timeline,i=this._startTime;return!e||!this._gc&&!this._paused&&e.isActive()&&(t=e.rawTime())>=i&&t<i+this.totalDuration()/this._timeScale},n._enabled=function(t,e){return o||a.wake(),this._gc=!t,this._active=this.isActive(),!0!==e&&(t&&!this.timeline?this._timeline.add(this,this._startTime-this._delay):!t&&this.timeline&&this._timeline._remove(this,!0)),!1},n._kill=function(t,e){return this._enabled(!1,!1)},n.kill=function(t,e){return this._kill(t,e),this},n._uncache=function(t){for(var e=t?this:this.timeline;e;)e._dirty=!0,e=e.timeline;return this},n._swapSelfInParams=function(t){for(var e=t.length,i=t.concat();--e>-1;)"{self}"===t[e]&&(i[e]=this);return i},n._callback=function(t){var e=this.vars;e[t].apply(e[t+"Scope"]||e.callbackScope||this,e[t+"Params"]||v)},n.eventCallback=function(t,e,i,s){if("on"===(t||"").substr(0,2)){var r=this.vars;if(1===arguments.length)return r[t];null==e?delete r[t]:(r[t]=e,r[t+"Params"]=f(i)&&-1!==i.join("").indexOf("{self}")?this._swapSelfInParams(i):i,r[t+"Scope"]=s),"onUpdate"===t&&(this._onUpdate=e)}return this},n.delay=function(t){return arguments.length?(this._timeline.smoothChildTiming&&this.startTime(this._startTime+t-this._delay),this._delay=t,this):this._delay},n.duration=function(t){return arguments.length?(this._duration=this._totalDuration=t,this._uncache(!0),this._timeline.smoothChildTiming&&this._time>0&&this._time<this._duration&&0!==t&&this.totalTime(this._totalTime*(t/this._duration),!0),this):(this._dirty=!1,this._duration)},n.totalDuration=function(t){return this._dirty=!1,arguments.length?this.duration(t):this._totalDuration},n.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),this.totalTime(t>this._duration?this._duration:t,e)):this._time},n.totalTime=function(t,e,i){if(o||a.wake(),!arguments.length)return this._totalTime;if(this._timeline){if(t<0&&!i&&(t+=this.totalDuration()),this._timeline.smoothChildTiming){this._dirty&&this.totalDuration();var s=this._totalDuration,r=this._timeline;if(t>s&&!i&&(t=s),this._startTime=(this._paused?this._pauseTime:r._time)-(this._reversed?s-t:t)/this._timeScale,r._dirty||this._uncache(!1),r._timeline)for(;r._timeline;)r._timeline._time!==(r._startTime+r._totalTime)/r._timeScale&&r.totalTime(r._totalTime,!0),r=r._timeline}this._gc&&this._enabled(!0,!1),this._totalTime===t&&0!==this._duration||(z.length&&G(),this.render(t,e,!1),z.length&&G())}return this},n.progress=n.totalProgress=function(t,e){var i=this.duration();return arguments.length?this.totalTime(i*t,e):i?this._time/i:this.ratio},n.startTime=function(t){return arguments.length?(t!==this._startTime&&(this._startTime=t,this.timeline&&this.timeline._sortChildren&&this.timeline.add(this,t-this._delay)),this):this._startTime},n.endTime=function(t){return this._startTime+(0!=t?this.totalDuration():this.duration())/this._timeScale},n.timeScale=function(t){if(!arguments.length)return this._timeScale;if(t=t||1e-10,this._timeline&&this._timeline.smoothChildTiming){var e=this._pauseTime,i=e||0===e?e:this._timeline.totalTime();this._startTime=i-(i-this._startTime)*this._timeScale/t}return this._timeScale=t,this._uncache(!1)},n.reversed=function(t){return arguments.length?(t!=this._reversed&&(this._reversed=t,this.totalTime(this._timeline&&!this._timeline.smoothChildTiming?this.totalDuration()-this._totalTime:this._totalTime,!0)),this):this._reversed},n.paused=function(t){if(!arguments.length)return this._paused;var e,i,s=this._timeline;return t!=this._paused&&s&&(o||t||a.wake(),e=s.rawTime(),i=e-this._pauseTime,!t&&s.smoothChildTiming&&(this._startTime+=i,this._uncache(!1)),this._pauseTime=t?e:null,this._paused=t,this._active=this.isActive(),!t&&0!==i&&this._initted&&this.duration()&&(e=s.smoothChildTiming?this._totalTime:(e-this._startTime)/this._timeScale,this.render(e,e===this._totalTime,!0))),this._gc&&!t&&this._enabled(!0,!1),this};var A=m("core.SimpleTimeline",function(t){k.call(this,0,t),this.autoRemoveChildren=this.smoothChildTiming=!0});n=A.prototype=new k,n.constructor=A,n.kill()._gc=!1,n._first=n._last=n._recent=null,n._sortChildren=!1,n.add=n.insert=function(t,e,i,s){var r,n;if(t._startTime=Number(e||0)+t._delay,t._paused&&this!==t._timeline&&(t._pauseTime=t._startTime+(this.rawTime()-t._startTime)/t._timeScale),t.timeline&&t.timeline._remove(t,!0),t.timeline=t._timeline=this,t._gc&&t._enabled(!0,!0),r=this._last,this._sortChildren)for(n=t._startTime;r&&r._startTime>n;)r=r._prev;return r?(t._next=r._next,r._next=t):(t._next=this._first,this._first=t),t._next?t._next._prev=t:this._last=t,t._prev=r,this._recent=t,this._timeline&&this._uncache(!0),this},n._remove=function(t,e){return t.timeline===this&&(e||t._enabled(!1,!0),t._prev?t._prev._next=t._next:this._first===t&&(this._first=t._next),t._next?t._next._prev=t._prev:this._last===t&&(this._last=t._prev),t._next=t._prev=t.timeline=null,t===this._recent&&(this._recent=this._last),this._timeline&&this._uncache(!0)),this},n.render=function(t,e,i){var s,r=this._first;for(this._totalTime=this._time=this._rawPrevTime=t;r;)s=r._next,(r._active||t>=r._startTime&&!r._paused)&&(r._reversed?r.render((r._dirty?r.totalDuration():r._totalDuration)-(t-r._startTime)*r._timeScale,e,i):r.render((t-r._startTime)*r._timeScale,e,i)),r=s},n.rawTime=function(){return o||a.wake(),this._totalTime};var C=m("TweenLite",function(e,i,s){if(k.call(this,i,s),this.render=C.prototype.render,null==e)throw"Cannot tween a null target.";this.target=e="string"!=typeof e?e:C.selector(e)||e;var r,n,a,o=e.jquery||e.length&&e!==t&&e[0]&&(e[0]===t||e[0].nodeType&&e[0].style&&!e.nodeType),l=this.vars.overwrite;if(this._overwrite=l=null==l?V[C.defaultOverwrite]:"number"==typeof l?l>>0:V[l],(o||e instanceof Array||e.push&&f(e))&&"number"!=typeof e[0])for(this._targets=a=_(e),this._propLookup=[],this._siblings=[],r=0;r<a.length;r++)n=a[r],n?"string"!=typeof n?n.length&&n!==t&&n[0]&&(n[0]===t||n[0].nodeType&&n[0].style&&!n.nodeType)?(a.splice(r--,1),this._targets=a=a.concat(_(n))):(this._siblings[r]=$(n,this,!1),1===l&&this._siblings[r].length>1&&H(n,this,null,1,this._siblings[r])):"string"==typeof(n=a[r--]=C.selector(n))&&a.splice(r+1,1):a.splice(r--,1);else this._propLookup={},this._siblings=$(e,this,!1),1===l&&this._siblings.length>1&&H(e,this,null,1,this._siblings);(this.vars.immediateRender||0===i&&0===this._delay&&!1!==this.vars.immediateRender)&&(this._time=-1e-10,this.render(-this._delay))},!0),D=function(e){return e&&e.length&&e!==t&&e[0]&&(e[0]===t||e[0].nodeType&&e[0].style&&!e.nodeType)},M=function(t,e){var i,s={};for(i in t)U[i]||i in e&&"transform"!==i&&"x"!==i&&"y"!==i&&"width"!==i&&"height"!==i&&"className"!==i&&"border"!==i||!(!Y[i]||Y[i]&&Y[i]._autoCSS)||(s[i]=t[i],delete t[i]);t.css=s};n=C.prototype=new k,n.constructor=C,n.kill()._gc=!1,n.ratio=0,n._firstPT=n._targets=n._overwrittenProps=n._startAt=null,n._notifyPluginsOfEnabled=n._lazy=!1,C.version="1.18.2",C.defaultEase=n._ease=new y(null,null,1,1),C.defaultOverwrite="auto",C.ticker=a,C.autoSleep=120,C.lagSmoothing=function(t,e){a.lagSmoothing(t,e)},C.selector=t.$||t.jQuery||function(e){var i=t.$||t.jQuery;return i?(C.selector=i,i(e)):"undefined"==typeof document?e:document.querySelectorAll?document.querySelectorAll(e):document.getElementById("#"===e.charAt(0)?e.substr(1):e)};var z=[],F={},I=/(?:(-|-=|\+=)?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi,X=function(t){for(var e,i=this._firstPT;i;)e=i.blob?t?this.join(""):this.start:i.c*t+i.s,i.r?e=Math.round(e):e<1e-6&&e>-1e-6&&(e=0),i.f?i.fp?i.t[i.p](i.fp,e):i.t[i.p](e):i.t[i.p]=e,i=i._next},N=function(t,e,i,s){var r,n,a,o,l,h,_,u=[t,e],f=0,c="",p=0;for(u.start=t,i&&(i(u),t=u[0],e=u[1]),u.length=0,r=t.match(I)||[],n=e.match(I)||[],s&&(s._next=null,s.blob=1,u._firstPT=s),l=n.length,o=0;o<l;o++)_=n[o],h=e.substr(f,e.indexOf(_,f)-f),c+=h||!o?h:",",f+=h.length,p?p=(p+1)%5:"rgba("===h.substr(-5)&&(p=1),_===r[o]||r.length<=o?c+=_:(c&&(u.push(c),c=""),a=parseFloat(r[o]),u.push(a),u._firstPT={_next:u._firstPT,t:u,p:u.length-1,s:a,c:("="===_.charAt(1)?parseInt(_.charAt(0)+"1",10)*parseFloat(_.substr(2)):parseFloat(_)-a)||0,f:0,r:p&&p<4}),f+=_.length;return c+=e.substr(f),c&&u.push(c),u.setRatio=X,u},L=function(t,e,i,s,r,n,a,o){var l,h,_="get"===i?t[e]:i,u=typeof t[e],f="string"==typeof s&&"="===s.charAt(1),c={t:t,p:e,s:_,f:"function"===u,pg:0,n:r||e,r:n,pr:0,c:f?parseInt(s.charAt(0)+"1",10)*parseFloat(s.substr(2)):parseFloat(s)-_||0};if("number"!==u&&("function"===u&&"get"===i&&(h=e.indexOf("set")||"function"!=typeof t["get"+e.substr(3)]?e:"get"+e.substr(3),c.s=_=a?t[h](a):t[h]()),"string"==typeof _&&(a||isNaN(_))?(c.fp=a,l=N(_,s,o||C.defaultStringFilter,c),c={t:l,p:"setRatio",s:0,c:1,f:2,pg:0,n:r||e,pr:0}):f||(c.s=parseFloat(_),c.c=parseFloat(s)-c.s||0)),c.c)return(c._next=this._firstPT)&&(c._next._prev=c),this._firstPT=c,c},E=C._internals={isArray:f,isSelector:D,lazyTweens:z,blobDif:N},Y=C._plugins={},B=E.tweenLookup={},j=0,U=E.reservedProps={ease:1,delay:1,overwrite:1,onComplete:1,onCompleteParams:1,onCompleteScope:1,useFrames:1,runBackwards:1,startAt:1,onUpdate:1,onUpdateParams:1,onUpdateScope:1,onStart:1,onStartParams:1,onStartScope:1,onReverseComplete:1,onReverseCompleteParams:1,onReverseCompleteScope:1,onRepeat:1,onRepeatParams:1,onRepeatScope:1,easeParams:1,
yoyo:1,immediateRender:1,repeat:1,repeatDelay:1,data:1,paused:1,reversed:1,autoCSS:1,lazy:1,onOverwrite:1,callbackScope:1,stringFilter:1},V={none:0,all:1,auto:2,concurrent:3,allOnStart:4,preexisting:5,true:1,false:0},q=k._rootFramesTimeline=new A,W=k._rootTimeline=new A,Z=30,G=E.lazyRender=function(){var t,e=z.length;for(F={};--e>-1;)(t=z[e])&&!1!==t._lazy&&(t.render(t._lazy[0],t._lazy[1],!0),t._lazy=!1);z.length=0};W._startTime=a.time,q._startTime=a.frame,W._active=q._active=!0,setTimeout(G,1),k._updateRoot=C.render=function(){var t,e,i;if(z.length&&G(),W.render((a.time-W._startTime)*W._timeScale,!1,!1),q.render((a.frame-q._startTime)*q._timeScale,!1,!1),z.length&&G(),a.frame>=Z){Z=a.frame+(parseInt(C.autoSleep,10)||120);for(i in B){for(e=B[i].tweens,t=e.length;--t>-1;)e[t]._gc&&e.splice(t,1);0===e.length&&delete B[i]}if((!(i=W._first)||i._paused)&&C.autoSleep&&!q._first&&1===a._listeners.tick.length){for(;i&&i._paused;)i=i._next;i||a.sleep()}}},a.addEventListener("tick",k._updateRoot);var $=function(t,e,i){var s,r,n=t._gsTweenID;if(B[n||(t._gsTweenID=n="t"+j++)]||(B[n]={target:t,tweens:[]}),e&&(s=B[n].tweens,s[r=s.length]=e,i))for(;--r>-1;)s[r]===e&&s.splice(r,1);return B[n].tweens},Q=function(t,e,i,s){var r,n,a=t.vars.onOverwrite;return a&&(r=a(t,e,i,s)),a=C.onOverwrite,a&&(n=a(t,e,i,s)),!1!==r&&!1!==n},H=function(t,e,i,s,r){var n,a,o,l;if(1===s||s>=4){for(l=r.length,n=0;n<l;n++)if((o=r[n])!==e)o._gc||o._kill(null,t,e)&&(a=!0);else if(5===s)break;return a}var h,_=e._startTime+1e-10,u=[],f=0,c=0===e._duration;for(n=r.length;--n>-1;)(o=r[n])===e||o._gc||o._paused||(o._timeline!==e._timeline?(h=h||K(e,0,c),0===K(o,h,c)&&(u[f++]=o)):o._startTime<=_&&o._startTime+o.totalDuration()/o._timeScale>_&&((c||!o._initted)&&_-o._startTime<=2e-10||(u[f++]=o)));for(n=f;--n>-1;)if(o=u[n],2===s&&o._kill(i,t,e)&&(a=!0),2!==s||!o._firstPT&&o._initted){if(2!==s&&!Q(o,e))continue;o._enabled(!1,!1)&&(a=!0)}return a},K=function(t,e,i){for(var s=t._timeline,r=s._timeScale,n=t._startTime;s._timeline;){if(n+=s._startTime,r*=s._timeScale,s._paused)return-100;s=s._timeline}return n/=r,n>e?n-e:i&&n===e||!t._initted&&n-e<2e-10?1e-10:(n+=t.totalDuration()/t._timeScale/r)>e+1e-10?0:n-e-1e-10};n._init=function(){var t,e,i,s,r,n=this.vars,a=this._overwrittenProps,o=this._duration,l=!!n.immediateRender,h=n.ease;if(n.startAt){this._startAt&&(this._startAt.render(-1,!0),this._startAt.kill()),r={};for(s in n.startAt)r[s]=n.startAt[s];if(r.overwrite=!1,r.immediateRender=!0,r.lazy=l&&!1!==n.lazy,r.startAt=r.delay=null,this._startAt=C.to(this.target,0,r),l)if(this._time>0)this._startAt=null;else if(0!==o)return}else if(n.runBackwards&&0!==o)if(this._startAt)this._startAt.render(-1,!0),this._startAt.kill(),this._startAt=null;else{0!==this._time&&(l=!1),i={};for(s in n)U[s]&&"autoCSS"!==s||(i[s]=n[s]);if(i.overwrite=0,i.data="isFromStart",i.lazy=l&&!1!==n.lazy,i.immediateRender=l,this._startAt=C.to(this.target,0,i),l){if(0===this._time)return}else this._startAt._init(),this._startAt._enabled(!1),this.vars.immediateRender&&(this._startAt=null)}if(this._ease=h=h?h instanceof y?h:"function"==typeof h?new y(h,n.easeParams):T[h]||C.defaultEase:C.defaultEase,n.easeParams instanceof Array&&h.config&&(this._ease=h.config.apply(h,n.easeParams)),this._easeType=this._ease._type,this._easePower=this._ease._power,this._firstPT=null,this._targets)for(t=this._targets.length;--t>-1;)this._initProps(this._targets[t],this._propLookup[t]={},this._siblings[t],a?a[t]:null)&&(e=!0);else e=this._initProps(this.target,this._propLookup,this._siblings,a);if(e&&C._onPluginEvent("_onInitAllProps",this),a&&(this._firstPT||"function"!=typeof this.target&&this._enabled(!1,!1)),n.runBackwards)for(i=this._firstPT;i;)i.s+=i.c,i.c=-i.c,i=i._next;this._onUpdate=n.onUpdate,this._initted=!0},n._initProps=function(e,i,s,r){var n,a,o,l,h,_;if(null==e)return!1;F[e._gsTweenID]&&G(),this.vars.css||e.style&&e!==t&&e.nodeType&&Y.css&&!1!==this.vars.autoCSS&&M(this.vars,e);for(n in this.vars)if(_=this.vars[n],U[n])_&&(_ instanceof Array||_.push&&f(_))&&-1!==_.join("").indexOf("{self}")&&(this.vars[n]=_=this._swapSelfInParams(_,this));else if(Y[n]&&(l=new Y[n])._onInitTween(e,this.vars[n],this)){for(this._firstPT=h={_next:this._firstPT,t:l,p:"setRatio",s:0,c:1,f:1,n:n,pg:1,pr:l._priority},a=l._overwriteProps.length;--a>-1;)i[l._overwriteProps[a]]=this._firstPT;(l._priority||l._onInitAllProps)&&(o=!0),(l._onDisable||l._onEnable)&&(this._notifyPluginsOfEnabled=!0),h._next&&(h._next._prev=h)}else i[n]=L.call(this,e,n,"get",_,n,0,null,this.vars.stringFilter);return r&&this._kill(r,e)?this._initProps(e,i,s,r):this._overwrite>1&&this._firstPT&&s.length>1&&H(e,this,i,this._overwrite,s)?(this._kill(i,e),this._initProps(e,i,s,r)):(this._firstPT&&(!1!==this.vars.lazy&&this._duration||this.vars.lazy&&!this._duration)&&(F[e._gsTweenID]=!0),o)},n.render=function(t,e,i){var s,r,n,a,o=this._time,l=this._duration,h=this._rawPrevTime;if(t>=l-1e-7)this._totalTime=this._time=l,this.ratio=this._ease._calcEnd?this._ease.getRatio(1):1,this._reversed||(s=!0,r="onComplete",i=i||this._timeline.autoRemoveChildren),0===l&&(this._initted||!this.vars.lazy||i)&&(this._startTime===this._timeline._duration&&(t=0),(h<0||t<=0&&t>=-1e-7||1e-10===h&&"isPause"!==this.data)&&h!==t&&(i=!0,h>1e-10&&(r="onReverseComplete")),this._rawPrevTime=a=!e||t||h===t?t:1e-10);else if(t<1e-7)this._totalTime=this._time=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0,(0!==o||0===l&&h>0)&&(r="onReverseComplete",s=this._reversed),t<0&&(this._active=!1,0===l&&(this._initted||!this.vars.lazy||i)&&(h>=0&&(1e-10!==h||"isPause"!==this.data)&&(i=!0),this._rawPrevTime=a=!e||t||h===t?t:1e-10)),this._initted||(i=!0);else if(this._totalTime=this._time=t,this._easeType){var _=t/l,u=this._easeType,f=this._easePower;(1===u||3===u&&_>=.5)&&(_=1-_),3===u&&(_*=2),1===f?_*=_:2===f?_*=_*_:3===f?_*=_*_*_:4===f&&(_*=_*_*_*_),this.ratio=1===u?1-_:2===u?_:t/l<.5?_/2:1-_/2}else this.ratio=this._ease.getRatio(t/l);if(this._time!==o||i){if(!this._initted){if(this._init(),!this._initted||this._gc)return;if(!i&&this._firstPT&&(!1!==this.vars.lazy&&this._duration||this.vars.lazy&&!this._duration))return this._time=this._totalTime=o,this._rawPrevTime=h,z.push(this),void(this._lazy=[t,e]);this._time&&!s?this.ratio=this._ease.getRatio(this._time/l):s&&this._ease._calcEnd&&(this.ratio=this._ease.getRatio(0===this._time?0:1))}for(!1!==this._lazy&&(this._lazy=!1),this._active||!this._paused&&this._time!==o&&t>=0&&(this._active=!0),0===o&&(this._startAt&&(t>=0?this._startAt.render(t,e,i):r||(r="_dummyGS")),this.vars.onStart&&(0===this._time&&0!==l||e||this._callback("onStart"))),n=this._firstPT;n;)n.f?n.t[n.p](n.c*this.ratio+n.s):n.t[n.p]=n.c*this.ratio+n.s,n=n._next;this._onUpdate&&(t<0&&this._startAt&&-1e-4!==t&&this._startAt.render(t,e,i),e||(this._time!==o||s)&&this._callback("onUpdate")),r&&(this._gc&&!i||(t<0&&this._startAt&&!this._onUpdate&&-1e-4!==t&&this._startAt.render(t,e,i),s&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[r]&&this._callback(r),0===l&&1e-10===this._rawPrevTime&&1e-10!==a&&(this._rawPrevTime=0)))}},n._kill=function(t,e,i){if("all"===t&&(t=null),null==t&&(null==e||e===this.target))return this._lazy=!1,this._enabled(!1,!1);e="string"!=typeof e?e||this._targets||this.target:C.selector(e)||e;var s,r,n,a,o,l,h,_,u,c=i&&this._time&&i._startTime===this._startTime&&this._timeline===i._timeline;if((f(e)||D(e))&&"number"!=typeof e[0])for(s=e.length;--s>-1;)this._kill(t,e[s],i)&&(l=!0);else{if(this._targets){for(s=this._targets.length;--s>-1;)if(e===this._targets[s]){o=this._propLookup[s]||{},this._overwrittenProps=this._overwrittenProps||[],r=this._overwrittenProps[s]=t?this._overwrittenProps[s]||{}:"all";break}}else{if(e!==this.target)return!1;o=this._propLookup,r=this._overwrittenProps=t?this._overwrittenProps||{}:"all"}if(o){if(h=t||o,_=t!==r&&"all"!==r&&t!==o&&("object"!=typeof t||!t._tempKill),i&&(C.onOverwrite||this.vars.onOverwrite)){for(n in h)o[n]&&(u||(u=[]),u.push(n));if((u||!t)&&!Q(this,i,e,u))return!1}for(n in h)(a=o[n])&&(c&&(a.f?a.t[a.p](a.s):a.t[a.p]=a.s,l=!0),a.pg&&a.t._kill(h)&&(l=!0),a.pg&&0!==a.t._overwriteProps.length||(a._prev?a._prev._next=a._next:a===this._firstPT&&(this._firstPT=a._next),a._next&&(a._next._prev=a._prev),a._next=a._prev=null),delete o[n]),_&&(r[n]=1);!this._firstPT&&this._initted&&this._enabled(!1,!1)}}return l},n.invalidate=function(){return this._notifyPluginsOfEnabled&&C._onPluginEvent("_onDisable",this),this._firstPT=this._overwrittenProps=this._startAt=this._onUpdate=null,this._notifyPluginsOfEnabled=this._active=this._lazy=!1,this._propLookup=this._targets?{}:[],k.prototype.invalidate.call(this),this.vars.immediateRender&&(this._time=-1e-10,this.render(-this._delay)),this},n._enabled=function(t,e){if(o||a.wake(),t&&this._gc){var i,s=this._targets;if(s)for(i=s.length;--i>-1;)this._siblings[i]=$(s[i],this,!0);else this._siblings=$(this.target,this,!0)}return k.prototype._enabled.call(this,t,e),!(!this._notifyPluginsOfEnabled||!this._firstPT)&&C._onPluginEvent(t?"_onEnable":"_onDisable",this)},C.to=function(t,e,i){return new C(t,e,i)},C.from=function(t,e,i){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,new C(t,e,i)},C.fromTo=function(t,e,i,s){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,new C(t,e,s)},C.delayedCall=function(t,e,i,s,r){return new C(e,0,{delay:t,onComplete:e,onCompleteParams:i,callbackScope:s,onReverseComplete:e,onReverseCompleteParams:i,immediateRender:!1,lazy:!1,useFrames:r,overwrite:0})},C.set=function(t,e){return new C(t,0,e)},C.getTweensOf=function(t,e){if(null==t)return[];t="string"!=typeof t?t:C.selector(t)||t;var i,s,r,n;if((f(t)||D(t))&&"number"!=typeof t[0]){for(i=t.length,s=[];--i>-1;)s=s.concat(C.getTweensOf(t[i],e));for(i=s.length;--i>-1;)for(n=s[i],r=i;--r>-1;)n===s[r]&&s.splice(i,1)}else for(s=$(t).concat(),i=s.length;--i>-1;)(s[i]._gc||e&&!s[i].isActive())&&s.splice(i,1);return s},C.killTweensOf=C.killDelayedCallsTo=function(t,e,i){"object"==typeof e&&(i=e,e=!1);for(var s=C.getTweensOf(t,e),r=s.length;--r>-1;)s[r]._kill(i,t)};var J=m("plugins.TweenPlugin",function(t,e){this._overwriteProps=(t||"").split(","),this._propName=this._overwriteProps[0],this._priority=e||0,this._super=J.prototype},!0);if(n=J.prototype,J.version="1.18.0",J.API=2,n._firstPT=null,n._addTween=L,n.setRatio=X,n._kill=function(t){var e,i=this._overwriteProps,s=this._firstPT;if(null!=t[this._propName])this._overwriteProps=[];else for(e=i.length;--e>-1;)null!=t[i[e]]&&i.splice(e,1);for(;s;)null!=t[s.n]&&(s._next&&(s._next._prev=s._prev),s._prev?(s._prev._next=s._next,s._prev=null):this._firstPT===s&&(this._firstPT=s._next)),s=s._next;return!1},n._roundProps=function(t,e){for(var i=this._firstPT;i;)(t[this._propName]||null!=i.n&&t[i.n.split(this._propName+"_").join("")])&&(i.r=e),i=i._next},C._onPluginEvent=function(t,e){var i,s,r,n,a,o=e._firstPT;if("_onInitAllProps"===t){for(;o;){for(a=o._next,s=r;s&&s.pr>o.pr;)s=s._next;(o._prev=s?s._prev:n)?o._prev._next=o:r=o,(o._next=s)?s._prev=o:n=o,o=a}o=e._firstPT=r}for(;o;)o.pg&&"function"==typeof o.t[t]&&o.t[t]()&&(i=!0),o=o._next;return i},J.activate=function(t){for(var e=t.length;--e>-1;)t[e].API===J.API&&(Y[(new t[e])._propName]=t[e]);return!0},d.plugin=function(t){if(!(t&&t.propName&&t.init&&t.API))throw"illegal plugin definition.";var e,i=t.propName,s=t.priority||0,r=t.overwriteProps,n={init:"_onInitTween",set:"setRatio",kill:"_kill",round:"_roundProps",initAll:"_onInitAllProps"},a=m("plugins."+i.charAt(0).toUpperCase()+i.substr(1)+"Plugin",function(){J.call(this,i,s),this._overwriteProps=r||[]},!0===t.global),o=a.prototype=new J(i);o.constructor=a,a.API=t.API;for(e in n)"function"==typeof t[e]&&(o[n[e]]=t[e]);return a.version=t.version,J.activate([a]),a},s=t._gsQueue){for(r=0;r<s.length;r++)s[r]();for(n in c)c[n].func||t.console.log("GSAP encountered missing dependency: com.greensock."+n)}o=!1}}("undefined"!=typeof module&&module.exports&&"undefined"!=typeof global?global:this||window);

//js/plugins/digitop/helper.js 
/*
 List of plugins:
  - DScript 1.0
  - DDevice 1.0
  - DMath 1.0
  - DArray 1.0
  - DLayoutCSS 1.0
  - DUpload 1.2 (2018-11-13)
  - DLoader 1.0
  - DBrowser 1.0
*/

/* DBrowser - version 1.0
// detect: WebGL, Browser name,...
Author: Goon Nguyen
================================================== */

var DLoader = {
    arr: [],
    onComplete: null,
    onProgress: null,
    progress: 0,
    loadCount: 0,
    add: function(url){
        this.arr.push(url);
    },
    load: function(url){
        if(typeof url == "undefined"){
            // load list
            var curURL = DLoader.arr[DLoader.loadCount];
            var img = new Image();
            img.onload = function(){
                if(DLoader.loadCount >= DLoader.arr.length){
                    if(DLoader.onComplete != null) DLoader.onComplete();
                    // clear all events
                    DLoader.onProgress = DLoader.onComplete = null;
                } else {
                    DLoader.loadCount++;
                    curURL = DLoader.arr[DLoader.loadCount];
                    DLoader.load(curURL);
                }
                DLoader.progress = DLoader.loadCount / DLoader.arr.length;
                if(DLoader.onProgress != null) DLoader.onProgress(DLoader.progress);
            }
            img.src = url;
        } else {
            DLoader.progress = 0;
            // load single
            var img = new Image();
            img.onload = function(){
                DLoader.progress = 1;
                if(DLoader.onProgress != null) DLoader.onProgress(DLoader.progress);
                if(DLoader.onComplete != null) DLoader.onComplete();
                // clear all events
                DLoader.onProgress = DLoader.onComplete = null;
            }
            img.src = url;
        }
    },
    on: function(event, callback){
        if(event == "complete"){
            DLoader.onComplete = callback;
        }
        if(event == "progress"){
            DLoader.onProgress = callback;
        }
    }
}

/* DBrowser - version 1.0
// detect: WebGL, Browser name,...
Author: Goon Nguyen
================================================== */

var DBrowser = {
    get isSupportWebGL() {
        /*try {
            var canvas = document.createElement("canvas");
            if( !!window.WebGLRenderingContext && (canvas.getContext("webgl") || canvas.getContext("experimental-webgl")) ){
                return true;
            } else {
                return false;
            }
        } catch (e) {
            return false;
        }*/
        if (!!window.WebGLRenderingContext) {
            var canvas = document.createElement("canvas"),
                 names = ["webgl", "experimental-webgl", "moz-webgl", "webkit-3d"],
               context = false;

            for(var i=0;i<4;i++) {
                try {
                    context = canvas.getContext(names[i]);
                    if (context && typeof context.getParameter == "function") {
                        // else, return just true
                        return true;
                    }
                } catch(e) {
                    console.log("!")
                }
            }

            // WebGL is supported, but disabled
            return false;
        }

        // WebGL not supported
        return false;
    }
}

/* DScript - version 1.0
Author: Goon Nguyen
================================================== */

if (DScript == null && typeof DScript == "undefined") {
    var DScript = {
        version: 1,

        load: function(url, callback) {
            var done = false;
            var result = {
                status: false,
                message: ""
            };
            var script = document.createElement('script');
            script.setAttribute('src', url);

            script.onload = handleLoad;
            script.onreadystatechange = handleReadyStateChange;
            script.onerror = handleError;

            document.head.appendChild(script);

            function handleLoad() {
                if (!done) {
                    done = true;

                    result.status = true;
                    result.message = "Script was loaded successfully";

                    if (callback) callback(result);
                }
            }

            function handleReadyStateChange() {
                var state;

                if (!done) {
                    state = script.readyState;
                    if (state === "complete") {
                        handleLoad();
                    }
                }
            }

            function handleError() {
                if (!done) {
                    done = true;
                    result.status = false;
                    result.message = "Failed to load script."
                    if (callback) callback(result);
                }
            }
        },

        unload: function(url, callback) {
            var scripts = document.getElementsByTagName("script");
            var result = {
                status: false,
                message: ""
            };

            for (var i = 0; i < scripts.length; i++) {
                var script = scripts[i];
                if (script.src) {
                    var src = script.src;
                    if (String(src).toLowerCase().indexOf(url.toLowerCase()) >= 0) {
                        script.parentElement.removeChild(script);
                        result.status = true;
                        result.message = "Unload script successfully.";
                    }
                }
            }

            if (!result.status) {
                result.message = "Script not found.";
            }

            if (callback) callback(result);

            return result;
        },

        isExisted: function(filename) {
            var scripts = document.getElementsByTagName("script");
            var existed = false;
            for (var i = 0; i < scripts.length; i++) {
                if (scripts[i].src) {
                    var src = scripts[i].src;
                    if (String(src).toLowerCase().indexOf(filename.toLowerCase()) >= 0) {
                        existed = true;
                    }
                    console.log(i, scripts[i].src)
                } else {
                    console.log(i, scripts[i].innerHTML)
                }
            }
            return existed;
        },

        loadList: function(array, callback) {
            var result = {
                status: false,
                message: ""
            };
            var count = 0;
            var total = array.length;
            //console.log("loadList")
            this.load(array[count], onComplete);

            function onComplete(result) {
                count++;
                //console.log(count, total)
                if (count == total) {
                    result.status = true;
                    result.message = "All scripts were loaded.";
                    if (callback) callback(result);
                } else {
                    DScript.load(array[count], onComplete);
                }
            }
        }
    }
}

/* DDevice - version 1.0
Author: Goon Nguyen
================================================== */

var DDevice = {
    tmpOri: "portrait", //landscape
    ratio: 16 / 9,
    tmpType: "mobile",
    get type() {
        DDevice.resize();
        return DDevice.tmpType;
    },

    get orientation() {
        DDevice.resize();
        return DDevice.tmpOri;
    },

    get width() {
        return $(window).width();
    },

    get height() {
        return $(window).height();
    },

    init: function() {
        $(window).resize(DDevice.resize);
        DDevice.resize();
    },
    resize: function(e) {
        var sw = $(window).width();
        var sh = $(window).height();

        DDevice.ratio = sw / sh;

        if (DDevice.ratio > 1) {
            DDevice.tmpOri = "landscape"

            if (sw > 1024) {
                DDevice.tmpType = "desktop"
            } else {
                if (sw > 640) {
                    DDevice.tmpType = "tablet"
                } else {
                    DDevice.tmpType = "mobile"
                }
            }

        } else if (DDevice.ratio < 1) {
            DDevice.tmpOri = "portrail"

            //console.log("sw: " + sw);
            if (sw > 770) {
                DDevice.tmpType = "desktop"
            } else {
                if (sw > 480) {
                    DDevice.tmpType = "tablet"
                } else {
                    DDevice.tmpType = "mobile"
                }
            }
        } else {
            DDevice.tmpOri = "square"
            DDevice.tmpType = "desktop"
        }

        //console.log(DDevice);
    }
}
$(document).ready(function() {
    DDevice.init();
})

/* DMath - version 1.0
Author: Goon Nguyen
================================================== */

var DMath = {
    random: function(number) {
        return number * Math.random();
    },
    randomInt: function(number) {
        return Math.floor(DMath.random(number));
    },
    randomPlusMinus: function(number) {
        return number * (Math.random() - Math.random());
    },
    randomIntPlusMinus: function(number) {
        return Math.round(DMath.randomPlusMinus(number));
    },
    randomFromTo: function(from, to) {
        return from + (to - from) * Math.random();
    },
    randomIntFromTo: function(from, to) {
        return Math.floor(DMath.randomFromTo(from, to));
    },

    angleRadBetween2Points: function(p1, p2) {
        return Math.atan2(p2.y - p1.y, p2.x - p1.x);
    },

    angleDegBetween2Points: function(p1, p2) {
        return DMath.radToDeg(DMath.angleRadBetween2Points(p1, p2));
    },

    degToRad: function(deg) {
        return deg * Math.PI / 180;
    },

    radToDeg: function(rad) {
        return rad * 180 / Math.PI;
    },

    angleRadBetween3Points: function(A, B, C) {
        var AB = Math.sqrt(Math.pow(B.x - A.x, 2) + Math.pow(B.y - A.y, 2));
        var BC = Math.sqrt(Math.pow(B.x - C.x, 2) + Math.pow(B.y - C.y, 2));
        var AC = Math.sqrt(Math.pow(C.x - A.x, 2) + Math.pow(C.y - A.y, 2));
        return Math.acos((BC * BC + AB * AB - AC * AC) / (2 * BC * AB));
    },

    getPointWithAngleAndRadius: function(angle, radius) {
        var p = {
            x: 0,
            y: 0
        };
        p.x = radius * Math.cos(angle);
        p.y = radius * Math.sin(angle);
        return p;
    },

    distanceBetweenPoints: function(p1, p2) {
        var x1 = p1.x;
        var y1 = p1.y;

        var x2 = p2.x;
        var y2 = p2.y;

        var d = Math.sqrt((x1 - x2) * (x1 - x2) + (y1 - y2) * (y1 - y2));

        return d;
    }
}

/* DArray - version 1.0
Author: Goon Nguyen
================================================== */

var DArray = {
    remove: function(item, array) {
        var index = array.indexOf(item);
        if (index > -1) {
            array.splice(index, 1);
        }
        return array;
    }
}

/* DLayoutCSS - version 1.0
Author: Goon Nguyen
================================================== */

var DLayoutCSS = {
    init: function() {
        console.log("[DLayoutCSS 1.0] Initialized!");
        $(window).resize(DLayoutCSS.resize);
        DLayoutCSS.resize();
    },
    resize: function(e) {
        var sw = $(window).width();
        var sh = $(window).height();
        if ($('.helper-layout-fullscreen').length > 0) {
            $('.helper-layout-fullscreen').width(sw);
            $('.helper-layout-fullscreen').height(sh);
        }
    }
}
$(function() {
    DLayoutCSS.init();
})

/* DUpload - version 1.1
Author: Goon Nguyen
================================================== */

var DUpload = {
    inputElement: null,
    renderer: null,
    customClass: "",
    customPostName: "photo",
    customUploadType: "images/*",
    reader: null,
    file: null,

    onSelect: null, // (base64)
    onCancel: null,
    onStart: null,
    checkSelectedInt: null,

    browse: function(callback) {
        this.onSelect = callback;

        DUpload.resultBase64 = "";
        DUpload.file = null;
        this.inputElement = null;

        if ($(".DUpload-input").length > 0) {
            $(".DUpload-input").remove();
            console.log("input is existed");
        }

        $("body").append('<input class="DUpload-input helper-hide ' + DUpload.customClass + '" type="file" name="' + DUpload.customPostName + '" accept="' + DUpload.customUploadType + '">');

        this.inputElement = $(".DUpload-input");

        this.inputElement.on("change", onChangeHandler);
        $(".DUpload-input")[0].onChange = onChangeHandler;
        //$(".DUpload-input")[0].addEventListener("change", onChangeHandler);

        this.inputElement.click();

        /*$(window).focusout(function(){
            console.log("This input field has lost its focus.");
        });*/

        $(window).focusin(function() {
            //console.log("This input field has gained its focus.");
            clearTimeout(DUpload.checkSelectedInt)
            DUpload.checkSelectedInt = setTimeout(checkSelected, 500);
        });

        function checkSelected() {
            if (!DUpload.file) {
                console.log("[DUpload] onCancel");
                $(".DUpload-input").remove();
                if (DUpload.onCancel) DUpload.onCancel();

                $(window).off("focusin");

                DUpload.file = null;
            } else {
                //
            }
        }

        //this.inputElement.focusin();

        //--

        function onChangeHandler() {
            //console.log($(this).val());
            if ($(this)[0].files[0]) {
                if (DUpload.onStart) DUpload.onStart();

                DUpload.file = $(this)[0].files[0];

                if (window.FileReader && window.FileReader.prototype.readAsArrayBuffer) {
                    DUpload.reader = new FileReader();

                    DUpload.reader.addEventListener("load", DUpload.onReadDataURL);

                    if (DUpload.file) {
                        DUpload.reader.readAsDataURL(DUpload.file);
                    }
                } else {
                    $(".DUpload-input").remove();
                    alert("Please upload your browser to use this feature.");
                    throw "This browser is too old to use this feature.";
                }
            } else {
                console.log("[DUpload] onCancel");
                DUpload.file = null;
                DUpload.resultBase64 = "";
                $(".DUpload-input").remove();
                if (DUpload.onCancel) DUpload.onCancel();
            }
        } //--
    },

    onReadDataURL: function(e) {
        DUpload.resultBase64 = DUpload.reader.result;

        //DUpload.reader.removeEventListener("load", DUpload.onReadDataURL);

        var reader = new FileReader();
        //DUpload.reader.onload = DUpload.onReadBuffer;
        if (reader.readAsArrayBuffer) {
            reader.addEventListener("load", DUpload.onReadBuffer);
            reader.readAsArrayBuffer(DUpload.file.slice(0, 64 * 1024));
        } else {
            console.log("[DUpload] onSelect");
            if (DUpload.onSelect) DUpload.onSelect(DUpload.resultBase64, null);
            $(".DUpload-input").remove();
            DUpload.file = null;
        }
    },

    onReadBuffer: function(e) {
        var orientation = DUpload.getOrientation(e.target.result);
        var params = {};
        console.log(orientation);
        switch (orientation) {
            case 6:
                params.orientation = 90;
                break;
            case 8:
                params.orientation = 270;
                break;
            case 3:
                params.orientation = 180;
                break;
            default:
                params.orientation = 0;
                break;
        }

        $(".DUpload-input").remove();
        DUpload.file = null;

        if(params.orientation != 0){
            // Auto rotate image:
            DUpload.rotateImage(DUpload.resultBase64, params.orientation, function(result){
                DUpload.resultBase64 = result;
                if (DUpload.onSelect) DUpload.onSelect(DUpload.resultBase64, params);
            });
        } else {
            if (DUpload.onSelect) DUpload.onSelect(DUpload.resultBase64, params);
        }

        // if (DUpload.onSelect) DUpload.onSelect(DUpload.resultBase64, params);
    },

    rotateImage: function(inputBase64, degrees, callback){
        if(DUpload.canvas) {
            document.body.removeChild(DUpload.canvas);
            DUpload.canvas = null;
        }

        var image = document.createElement("img");
        image.onload = function(){
            DUpload.canvas = document.createElement("canvas");
            var canvas = DUpload.canvas;
            var ctx = canvas.getContext("2d");
            canvas.style.invisibility = "hidden";
            canvas.style.position = "absolute";
            canvas.style.left = "10000px";
        
            if(degrees == 90 || degrees == 270) {
                canvas.width = image.height;
                canvas.height = image.width;
            } else {
                canvas.width = image.width;
                canvas.height = image.height;
            }
        
            ctx.clearRect(0,0,canvas.width,canvas.height);
            if(degrees == 90 || degrees == 270) {
                ctx.translate(image.height/2,image.width/2);
            } else {
                ctx.translate(image.width/2,image.height/2);
            }
            ctx.rotate(degrees*Math.PI/180);
            ctx.drawImage(image,-image.width/2,-image.height/2);
        
            document.body.appendChild(canvas);

            var resultBase64 = canvas.toDataURL();
            if(callback) callback(resultBase64);
        };
        image.src = inputBase64;
        
    },

    getOrientation: function(dataBuffer) {
        var view = new DataView(dataBuffer);
        if (view.getUint16(0, false) != 0xFFD8) return -2;
        var length = view.byteLength,
            offset = 2;
        while (offset < length) {
            var marker = view.getUint16(offset, false);
            offset += 2;
            if (marker == 0xFFE1) {
                if (view.getUint32(offset += 2, false) != 0x45786966) return -1;
                var little = view.getUint16(offset += 6, false) == 0x4949;
                offset += view.getUint32(offset + 4, little);
                var tags = view.getUint16(offset, little);
                offset += 2;
                for (var i = 0; i < tags; i++)
                    if (view.getUint16(offset + (i * 12), little) == 0x0112)
                        return view.getUint16(offset + (i * 12) + 8, little);
            } else if ((marker & 0xFF00) != 0xFF00) break;
            else offset += view.getUint16(offset, false);
        }
        return -1;
    },

    onRead: function() {},

    onFailRead: function() {

    }
}

//js/plugins/digitop/popup.js 
/* POPUP - version 1.0
- Description: Show/hide popup
- Date: Aug 16, 2017
- Author: Goon Nguyen
================================================== */
var POPUP = {
    isShow: false,
    currentPopup: "",

    init: function(){
        //TweenMax.set("#popup .holder", {opacity: 0, transformOrigin: ""});
    },
    show: function(callback){
        $("#popup").removeClass("helper-hide");
        TweenMax.set("#popup .holder", {scaleX: 0.5, scaleY: 0.5, opacity: 0});
    },
    hide: function(callback){
        $("#popup").addClass("helper-hide");
    }
}

//js/plugins/digitop/preloader.js 
/* PRELOADER - version 1.0
- Description: Show/hide default preloader
- Date: Aug 16, 2017
- Author: Goon Nguyen
================================================== */
if (typeof PRELOADER != "undefined") PRELOADER = null;

var PRELOADER = {
    init: function () {

    },
    show: function (callback) {
        $("#preloader").removeClass("helper-hide");
        // $("#loading-wrapper").fadeIn();
    },
    hide: function (callback) {
        $("#preloader").addClass("helper-hide");
        $("#preloader .process-text").html("");
        // $("#loading-wrapper").fadeOut();
    },
    count:function (text) {
        this.show();
        $("#preloader .process-text").html(text);
    },
}
