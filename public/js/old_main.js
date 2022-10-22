'use strict';
if (typeof $ == 'undefined') { var $ = jQuery; }
/*** APP ***/
let APP = {
	_html: {},
	_body: {},
	_overlay: {},
	_pageID: '',
	_submitMethod: '',
	_isMobile: false,
	_isFirefox: false,
	_isOvlActive: false,
	_isScroll: false,
	_W: 0,
	_H: 0,
	_headers: '',

	init() {
		this._html = $('html');
		this._body = $('body');
		this._overlay = $('#overlay');
		this._pageID = document.getElementById('page-id').value;
		this._submitMethod = window.location.origin.indexOf('http://localhost:8080') === -1 ? 'POST' : 'GET';
		this._headers = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };

		/iPhone|iPad|iPod/i.test(navigator.userAgent) && this._html.addClass(CLASS._iOS);
		/Android|webOS|iPhone|iPad|iPod|BlackBerry|Opera Mini/i.test(navigator.userAgent) ?
			(this._html.addClass(CLASS._mobile), this._isMobile = true) : navigator.userAgent.toLowerCase().indexOf('firefox') > -1 && (this._isFirefox = true);
		this._isMobile && window.orientation != 0 && this._html.addClass(CLASS._orientation);

		this.getSize();
		this.initEvent();
		APP.header.init();
		APP.popup.init();
		APP.footer.init();
		APP.checkHash();

		switch(this._pageID) {
			case 'page-home': 						this.home.init(); break;
			case 'page-casting-board': 		this.castingBoard.init(); break;
			case 'page-our-talent': 			this.ourTalent.init(); break;
			case 'page-talent-services': 	this.talentServices.init(); break;
			case 'page-casting-services': this.talentServices.init(); break;
			case 'page-signup': 					this.signup.init(); break;
			case 'page-login': 						this.login.init(); break;
			case 'page-about-us': 				this.aboutUs.init(); break;
			case 'page-post-details': 		this.postDetails.init(); break;
			case 'page-talent-details': 	this.talentDetails.init(); break;
			case 'page-active-account': 	this.activeAccount.init(); break;
		}
	},

	initEvent() {
		APP._overlay.on(CLICK, APP.overlayClicked);
		window.onresize = APP.resized;
		window.addEventListener('wheel', { passive: false });
	},

	overlayClicked(e) {
		e.preventDefault();
		APP.header._btnMb.classList.contains(CLASS._active) && APP.header._btnMb.click();
	},

	resized: () => window.innerWidth === APP._W || (
		APP.getSize(),
		APP._W > 1200 && APP.header._btnMb.classList.contains(CLASS._active) && APP.header._btnMb.click()
	),

	getSize() {
		console.log('getSize');
		APP._W = window.innerWidth;
		APP._H = window.innerHeight;
		setTimeout(() => document.dispatchEvent(SIZE_CHANGED_EVENT), 250);
	},

	checkHash() {
		if (window.location.hash.length === 0) return false;
		let hash = document.querySelector(window.location.hash),
		    offset = APP.offset(hash);
		(hash !== null) && APP.scroll(offset.top - 150, 1000);
  },

	scroll(offset, time) {
		APP._isScroll = true;
		// TweenMax.to(window, time, {scrollTo:{ y: offset + 'px' }});
		$('html, body').animate({ scrollTop: offset }, time, () => { APP._isScroll = false; });
	},

	offset(el) {
    let rect = el.getBoundingClientRect(),
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    return { top: rect.top + scrollTop, left: rect.left + scrollLeft }
	}
};
/*** CustomEvent Polyfill for IE ***/
(() => {
  if (typeof window.CustomEvent === 'function') return false; //If not IE

  function CustomEvent(event, params) {
    let evt = document.createEvent('CustomEvent');
    params = params || { bubbles: false, cancelable: false, detail: undefined };
    evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
    return evt;
  }
  CustomEvent.prototype = window.Event.prototype;
  window.CustomEvent = CustomEvent;
})();
/*** Constant ***/
const DOM_READY = 'DOMContentLoaded',
      SIZE_CHANGED = 'app-size-changed',
      SIZE_CHANGED_EVENT = new CustomEvent(SIZE_CHANGED),
      GOTO_TOP = 'app-goto-top',
      GOTO_TOP_EVENT = new CustomEvent(GOTO_TOP),
      CLICK = 'click',
      F_IN = 'focusin',
      F_OUT = 'focusout',
      CHANGE = 'change',
      KEYDOWN = 'keydown',
      KEYPRESS = 'keypress',
      INPUT = 'input';

const CLASS = {
  _scrolling: 'js-scrolling',
	_dlex: 'js-dflex',
	_active: 'js-active',
  _mobile: 'js-mobile',
  _ovlActive: 'js-ovl-active',
  _menuActive: 'js-menu-active',
	_iOS: 'js-ios',
	_orientation: 'js-orientation',
  _require: 'js-required',
  _min: 'js-min',
	_email: 'js-email',
	_error: 'js-error',
  _hasval: 'js-hasval',
  _open: 'js-open',
  _activeOpen: 'js-active js-open',
  _disable: 'js-disable',
  _rqSv: 'js-required-server'
};
/*** READY ***/
document.addEventListener('DOMContentLoaded', () => matchMedia('(hover: none)').matches || document.body.classList.add('can-hover'));
/*** LOAD ***/
window.onload = () => APP.init();;
$('*').click(function() {});
$('html').css('-webkit-tap-highlight-color', 'rgba(0, 0, 0, 0)');
/***** Accordion *****/
let Accordion = function(element) {

  let el = $(element),
      titles = el.find('.title'),
      cContent = null;

	(() => {
    checkActive();
		initEvent();
	})();

	function initEvent() {
		titles.on('click', titleClicked);
  }

  function checkActive() {
    let title = {},
        content = {};

    titles.each(function() {
      title = $(this);
      content = title.next('.content');
      if (title.hasClass(CLASS._active)) {
        content.slideDown();
        cContent = content;
        return false;
      }
    });
  }

  function titleClicked(e) {
    e.preventDefault();
    var title = $(this),
        content = title.next('.content'),
        timeout = 0;

    cContent = title.hasClass(CLASS._active) ? (cContent.slideUp(), title.removeClass(CLASS._active), null) : (
      (cContent != null) && (cContent.slideUp(), timeout = 250),
      titles.removeClass(CLASS._active),
      title.addClass(CLASS._active),
      setTimeout(() => content.slideDown(), timeout),
      content
    )
  }

	return this;
};

let CarouselPaging = function(element, isLoop = true, maxShow = 3) {

  let el = $(element),
      items = el.find('li'),
      paging = items.find('a'),
			currentItem = {},
      targetItem = {},
			isAnimate = false,
			index = 0,
      target = 0,
      max = items.length,
      itemW = 40 / 3,
      mainW = 40,
      showArray = [];

  (() => init())();
  function init() {
    TweenMax.set(items, { autoAlpha: 0 });
    for (let i = 0; i < maxShow; i++) {
      showArray[i] = i;
      currentItem = items.eq(i);
      TweenMax.set(currentItem, { autoAlpha: 1, x: itemW * i });
    }
  }

  function updateShowArray() {
    let cIndex = 0;
    showArray[0] = index;
    if (maxShow > 1) for (let i = 1; i < maxShow; i++) {
      cIndex = index + i;
      cIndex >= max && (cIndex = cIndex % max);
      showArray[i] = cIndex;
    }
  }

  this.next = function() {
    if (isAnimate || (!isLoop && index === max - maxShow)) return false;
		isAnimate = true;

    target = index + maxShow;
    target >= max && (target = target % max);
		goNext();
  }

  this.prev = function() {
		if (isAnimate || (!isLoop && index === 0)) return false;
		isAnimate = true;

		target = (index === 0 ? max : index) - 1;
		goPrev();
	}

	function goPrev() {
    let delay = 0,
        cIndex = 0;

    targetItem = items.eq(target);
    for (let i = 0; i < maxShow; i++) {
      cIndex = index + i;
      cIndex >= max && (cIndex = cIndex % max);
      currentItem = items.eq(cIndex);

      TweenMax.to(currentItem, 1, {
        delay: delay,
        x: itemW * (i + 1),
        ease: Expo.easeInOut,
        force3D: true
      });
    }

		TweenMax.set(targetItem, { autoAlpha: 1, x: -itemW });
    TweenMax.to(targetItem, 1, {
      delay: delay,
      x: 0,
			ease: Expo.easeInOut,
			force3D: true,
			onComplete: prevComplete
		});
	}

	function goNext() {
    let delay = 0,
        cIndex = 0;

    targetItem = items.eq(target);
    for (let i = 0; i < maxShow; i++) {
      cIndex = index + i;
      cIndex >= max && (cIndex = cIndex % max);
      currentItem = items.eq(cIndex);

      TweenMax.to(currentItem, 1, {
        delay: delay,
        x: itemW * (i - 1),
        ease: Expo.easeInOut,
        force3D: true
      });
    }

		TweenMax.set(targetItem, { autoAlpha: 1, x: mainW });
    TweenMax.to(targetItem, 1, {
			delay: delay,
      x: mainW - itemW,
      ease: Expo.easeInOut,
			force3D: true,
			onComplete: nextComplete
		});
  }

  function prevComplete() {
    index = (index < 1 ? max : index) - 1;
    hideOutItem();
  }

  function nextComplete() {
    index = index < max - 1 ? (index + 1) : 0;
    hideOutItem();
  }

  function hideOutItem() {
    let item = {},
        currentIndex = 0;

    updateShowArray();
    items.each((_, el) => TweenMax.set(el, { autoAlpha: 0 }));

    for (let i = 0; i < maxShow; i++) {
      currentIndex = showArray[i];
      item = items.eq(currentIndex);
      TweenMax.set(item, { autoAlpha: 1 });
    }
    isAnimate = false;
    updateActive();
  }

  function updateActive() {
    paging.removeClass(CLASS._active);
    paging.eq(showArray[1]).addClass(CLASS._active);
  }

	return this;
};
let Carousel = function(element, isLoop, maxShow) {

  let el = $(element),
      holder = el.find('.item-wrap'),
      items = holder.find('.item'),
      btnPrev = el.find('.btn-prev'),
      btnNext = el.find('.btn-next'),
      pWrap = el.find('.paging'),
      paging = pWrap.find('li'),
			currentItem = {},
      targetItem = {},
			isAnimate = false,
			index = 0,
      target = 0,
      max = items.length,
      item = items.eq(index),
      itemW = item.outerWidth(),
      itemH = 0,
      mainW = holder.outerWidth(),
      showArray = [],
      isInit = false;

  (() => max > maxShow ? init() : el.addClass(CLASS._dlex))();

  this.updateMaxShow = val => {
    if (val === maxShow || !isInit) return false;
    maxShow = val;
    updateShowArray();
    updatePaging();
    resetPos();
  }

  this.reInit = () => init();

  function init() {
    itemH = getMaxH();
    holder.height(itemH);
    TweenMax.set(items, { autoAlpha: 0 });
    for (let i = 0; i < maxShow; i++) {
      showArray[i] = i;
      currentItem = items.eq(i);
      TweenMax.set(currentItem, { autoAlpha: 1, x: itemW * i });
    }
    updatePaging();
    initEvent();
  }

  function initEvent() {
    APP._isMobile && el.on('swipeleft', nextClicked).on('swiperight', prevClicked);
    btnPrev.on(CLICK, prevClicked);
    btnNext.on(CLICK, nextClicked);
    document.addEventListener(SIZE_CHANGED, () => resetPos());
    isInit = true;
  }

  function updateShowArray() {
    let cIndex = 0;
    showArray[0] = index;
    if (maxShow > 1) for (let i = 1; i < maxShow; i++) {
      cIndex = index + i;
      cIndex >= max && (cIndex = cIndex % max);
      showArray[i] = cIndex;
    }
    console.log(showArray);
  }

  function resetPos() {
    setHeight();
    itemW = item.outerWidth();
    mainW = holder.outerWidth();

    for (let i = 0; i < maxShow; i++) {
      currentItem = items.eq(showArray[i]);
      TweenMax.set(currentItem, { autoAlpha: 1, x: itemW * i });
    }
    maxShow >= max ? hideBtn() : showBtn();
  }

  function setHeight() {
    holder.css('height', 'auto');
    items.css('height', 'auto');

    itemH = getMaxH();
    holder.height(itemH);
    items.height(itemH);
  }

  function hideBtn() {
    btnNext.hide();
    btnPrev.hide();
    // pWrap.hide();
  }

  function showBtn() {
    btnNext.show();
    btnPrev.show();
    // pWrap.hide();
  }

  function getMaxH() {
    let item = {},
        maxH = 0;

    items.each((_, el) => {
      item = $(el);
      item.height() > maxH && (maxH = item.height());
    });
    return maxH;
  }

  function nextClicked(e) {
    e.preventDefault();
    if (isAnimate || (!isLoop && index === max - maxShow)) return false;
		isAnimate = true;

    target = index + maxShow;
    target >= max && (target = target % max);
		goNext();
  }

  function prevClicked(e) {
    e.preventDefault();
		if (isAnimate || (!isLoop && index === 0)) return false;
		isAnimate = true;

		target = (index === 0 ? max : index) - 1;
		goPrev();
	}

	function goPrev() {
    let delay = 0,
        cIndex = 0;

    paging.prev();
    targetItem = items.eq(target);
    for (let i = 0; i < maxShow; i++) {
      cIndex = index + i;
      cIndex >= max && (cIndex = cIndex % max);
      currentItem = items.eq(cIndex);

      TweenMax.to(currentItem, 1, {
        delay: delay,
        x: itemW * (i + 1),
        ease: Expo.easeInOut,
        force3D: true
      });
    }

		TweenMax.set(targetItem, { autoAlpha: 1, x: -itemW });
    TweenMax.to(targetItem, 1, {
      delay: delay,
      x: 0,
			ease: Expo.easeInOut,
			force3D: true,
			onComplete: prevComplete
		});
	}

	function goNext() {
    let delay = 0,
        cIndex = 0;

    paging.next();
    targetItem = items.eq(target);
    for (let i = 0; i < maxShow; i++) {
      cIndex = index + i;
      cIndex >= max && (cIndex = cIndex % max);
      currentItem = items.eq(cIndex);

      TweenMax.to(currentItem, 1, {
        delay: delay,
        x: itemW * (i - 1),
        ease: Expo.easeInOut,
        force3D: true
      });
    }

		TweenMax.set(targetItem, { autoAlpha: 1, x: mainW });
    TweenMax.to(targetItem, 1, {
			delay: delay,
      x: mainW - itemW,
      ease: Expo.easeInOut,
			force3D: true,
			onComplete: nextComplete
		});
  }

  function prevComplete() {
    index = (index < 1 ? max : index) - 1;
    hideOutItem();
  }

  function nextComplete() {
    index = index < max - 1 ? (index + 1) : 0;
    hideOutItem();
  }

  function hideOutItem() {
    let item = {},
        currentIndex = 0;

    updateShowArray();
    items.each((_, el) => TweenMax.set(el, { autoAlpha: 0 }));

    for (let i = 0; i < maxShow; i++) {
      currentIndex = showArray[i];
      item = items.eq(currentIndex);
      TweenMax.set(item, { autoAlpha: 1 });
    }
    isAnimate = false;
    updatePaging();
  }

  function updatePaging() {
    paging.removeClass(CLASS._active);
    for (let i = 0; i < maxShow; i++) paging.eq(showArray[i]).addClass(CLASS._active);
    (paging.length === maxShow) ? pWrap.hide() : pWrap.show();
  }

	return this;
};
/***** Equal Height *****/
let EqualHeight = function(element, autoBreak) {

  let el = $(element),
      itemH = 0,
      isDirty = false;

  (() => init())();
  function init() {
    setHeight();
    initEvent();
  }

  function initEvent() {
    document.addEventListener(SIZE_CHANGED, () => setHeight());
  }

  function setHeight() {
    if (APP._W <= autoBreak) {
      isDirty && (el.css('height', 'auto'), isDirty = false);
      return true;
    }

    el.css('height', 'auto');
    itemH = getMaxH();
    el.height(itemH);
    isDirty = true;
  }

  function getMaxH() {
    let item = {},
        maxH = 0;

    el.each((_, e) => {
      item = $(e);
      item.height() > maxH && (maxH = item.height());
    });
    return maxH;
  }

	return this;
};
let PopupAlert = function(element) {
  let el = $(element),
      contentTitle = el.find('.title'),
      contentDesc = el.find('.desc'),
      overlay = el.find('.overlay'),
      btnClose = el.find('.btn-close');

  this.update = (title, desc) => {
    title.length > 0 && contentTitle.text(title);
    desc.length > 0 && contentDesc.text(desc);
  }

  this.show = () => {
    el.fadeIn();
    APP._isOvlActive = true;
    APP._html.addClass(CLASS._ovlActive);
  }

  this.hide = () => {
    el.fadeOut();
    APP._isOvlActive = false;
    APP._html.removeClass(CLASS._ovlActive);
  }

  (() => initEvent())();
  function initEvent() {
    overlay.on('click', close);
    btnClose.on('click', close);
  }

  function close(e) {
    e.preventDefault();
    el.fadeOut();
    APP._isOvlActive = false;
    APP._html.removeClass(CLASS._ovlActive);
  }

  return this;
};

let PopupLoading = function(element) {
  let el = $(element);

  this.show = () => {
    el.fadeIn();
    APP._isOvlActive = true;
    APP._html.addClass(CLASS._ovlActive);
  }

  this.hide = () => {
    el.fadeOut();
    APP._isOvlActive = false;
    APP._html.removeClass(CLASS._ovlActive);
  }

  (() => initEvent())();
  function initEvent() {}

  return this;
};
let Slider = function(element, iTime, eName) {

  let el = $(element),
      holder = el.find('.item-wrap'),
      items = holder.find('.item'),
      pagings = el.find('.paging li'),
      btnPrev = el.find('.btn-prev'),
      btnNext = el.find('.btn-next'),
			currentItem = {},
      targetItem = {},
			isAnimate = false,
			index = 0,
			target = 0,
			max = items.length,
      mainW = el.width(),
      isHover = false,
      interval = {},
      updateEvent = {};

  (() => max < 2 ? (pagings.hide(), btnPrev.hide(), btnNext.hide()) : (
    TweenMax.set(items, { autoAlpha: 0}),
    TweenMax.set(items.eq(index), { autoAlpha: 1}),
    autoPlay(),
    initEvent()
  ))();

  this.show = i => (i != index) && (
    target = i,
    updatePaging(),
    TweenMax.set(items.eq(index), { autoAlpha: 0, x: -mainW }),
    TweenMax.set(items.eq(target), { autoAlpha: 1, x: 0 }),
    index = target,
    autoPlay()
  );

  this.goTo = i => goTo(i);
  this.getAnimationState = () => isAnimate;
  this.getItemHeight = () => {
    let max = 0,
        h = 0;

    items.each(function() {
      h = $(this).height();
      max = (h > max) ? h : max;
    });
    return max;
  }

  function autoPlay() {
		!isHover && iTime > 0 &&  (clearInterval(interval), interval = setInterval(() => goNext(), iTime));
	}

  function initEvent() {
    APP._isMobile ? holder.on('swipeleft', nextClicked).on('swiperight', prevClicked) : iTime > 0 && holder.on('mouseover', mouseOver).on('mouseout', mouseOut);
    btnPrev.on(CLICK, prevClicked);
    btnNext.on(CLICK, nextClicked);
    pagings.on(CLICK, navClicked);
    eName && (updateEvent = new CustomEvent(eName, { bubbles: true, detail: { target: 0 } }));
    document.addEventListener(SIZE_CHANGED, () => mainW = el.width());
  }

  function mouseOver() {
    isHover || (clearInterval(interval), isHover = true);
  }

  function mouseOut() {
    isHover && (isHover = false, autoPlay());
  }

  function checkMainW() {
    mainW <= 0 && (mainW = el.width());
  }

  function prevClicked(e) {
    e.preventDefault();
    if (isAnimate) return false;
    checkMainW();
    goPrev();
  }

  function nextClicked(e) {
    e.preventDefault();
    if (isAnimate) return false;
    checkMainW()
    goNext();
  }

  function navClicked(e) {
    e.preventDefault();
    let item = $(this),
        targetIndex = 0;

    if (isAnimate || item.hasClass(CLASS._active)) return false;
    checkMainW();
    targetIndex = parseInt(item.data('index'));
    goTo(targetIndex);
  }

  function goTo(targetIndex) {
    isAnimate = true;
    target = targetIndex;
		index < targetIndex ? goToNext() : goToPrev();
  }

  function goPrev() {
    isAnimate = true;
		target = index - 1;
		target < 0 && (target = max - 1);
		goToPrev();
	}

  function goNext() {
    isAnimate = true;
		target = index + 1;
		target === max && (target = 0);
		goToNext();
	}

	function goToPrev() {
    updatePaging();
		currentItem = items.eq(index);
		targetItem = items.eq(target);

		TweenMax.set(targetItem, { autoAlpha: 1, x: -mainW });
    TweenMax.to(targetItem, 1, {
      x: 0,
			ease: Expo.easeInOut,
			force3D: true,
			onComplete: animatedDone
		});

		TweenMax.to(currentItem, 1, {
      x: mainW,
			ease: Expo.easeInOut,
			force3D: true
		});
	}

	function goToNext() {
    updatePaging();
		currentItem = items.eq(index);
		targetItem = items.eq(target);

		TweenMax.set(targetItem, { autoAlpha: 1, x: mainW });
    TweenMax.to(targetItem, 1, {
      x: 0,
      ease: Expo.easeInOut,
			force3D: true,
			onComplete: animatedDone
		});

		TweenMax.to(currentItem, 1, {
      x: -mainW,
			ease: Expo.easeInOut,
			force3D: true
		});
	}

	function animatedDone() {
    isAnimate = false;
    TweenMax.set(currentItem, { autoAlpha: 0 });
    updatePaging();
    index = target;
    autoPlay();
  }

  function updatePaging() {
    pagings.eq(index).removeClass(CLASS._active);
    pagings.eq(target).addClass(CLASS._active);
    eName && (updateEvent.detail.target = target, document.dispatchEvent(updateEvent));
  }

	return this;
};
/***** Video Section *****/
let VideoSection = function(element) {

  let el = element,
      wrap = el.querySelector('.vid-wrap'),
      vid = wrap.querySelector('video');


  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    wrap.addEventListener(CLICK, wrapClicked);
  }

  function wrapClicked(e) {
    e.preventDefault();
    wrap.classList.contains(CLASS._active) ? wrap.classList.remove(CLASS._active) : wrap.classList.add(CLASS._active);
    vid.paused ? vid.play() : vid.pause();
  }

	return this;
};
APP.footer = {
  _el: {},

  init: function() {
    let self = this;
    self._el = $('.main-footer');
  }
};

APP.headerMb = {
  _el: {},
  _subLink: {},
  _subIcon: {},
  _ovl: {},

  init: function() {
    var self = this;
    self._el = $('#mb-header');
    self._ovl = $('#mb-overlay');
    self._subLink = self._el.find('.has-sub');
    self._subIcon = self._el.find('.icon-sub');

    self.initEvent();
    TweenMax.set(self._el, { x: -APP._W });
  },

  initEvent: function() {
    var self = this;
    // self._ovl.on('click', () => APP.header._btnMb.hasClass(CLASS._active) && APP.header._btnMb.trigger('click'));
    // self._ovl.on('scroll', (e) => {
    //   e.preventDefault();
    //   e.stopPropagation();
    // });

    self._subIcon.on(CLICK, self.toggelSubMenu);
  },

  toggelSubMenu: function(e) {
    e.preventDefault();
    let item = $(this),
        topItem = item.closest('.top-item');

    topItem.hasClass(CLASS._active) ? topItem.removeClass(CLASS._active) : (APP.headerMb.closeSubMenu(), topItem.addClass(CLASS._active));
  },

  closeSubMenu: function() {
    let self = APP.headerMb;
    self._subLink.removeClass(CLASS._active);
  },

  show: function() {
    var self = this;
    self._el.addClass(CLASS._active);
    self._ovl.fadeIn();
    TweenMax.set(self._el, {
      display: 'block',
      onComplete: () => (APP._html.addClass(CLASS._menuActive), TweenMax.to(self._el, 0.5, { x: 0 }))
    });
  },

  hide: function() {
    var self = this;
    APP._body.attr('style', '').removeClass(CLASS._ovlActive);
    self._el.removeClass(CLASS._active);
    self._ovl.fadeOut();
    TweenMax.to(self._el, 0.5, {
      x: -APP._W,
      onComplete: () => (APP._html.removeClass(CLASS._menuActive), TweenMax.set(self._el, { display: 'none' }))
    });
  }
};
APP.header = {
  _el: {},
  _btnMb: {},

  init: function() {
    let self = this;
    self._el = document.querySelector('#main-header');
    self._btnMb = self._el.querySelector('.btn-mb');
    self.initEvent();
    APP.headerMb.init();
  },

  initEvent: function() {
    let self = this;
    self._btnMb.addEventListener(CLICK, self.btnMbClicked);
  },

  btnMbClicked: function(e) {
    let item = this;
    e.preventDefault();
    item.classList.contains(CLASS._active) ? (item.classList.remove(CLASS._active), APP.headerMb.hide()) : (item.classList.add(CLASS._active), APP.headerMb.show());
  }
};
APP.popup = {
  _alert: {},
  _loading: {},
  _isOpen: false,

  init: function() {
    let self = this;
    // self._alert = new PopupAlert('#popup-alert');
    self._loading = new PopupLoading('#popup-loading');
  }
};
/***** Signup Popup & Form *****/
let SignUpPopup = function(element) {

  let el = $(element),
      asideWrap = el.find('.aside'),
      questList = el.find('.quest-list'),
      ajaxURL = questList.data('url'),

      numSlider = new Slider(el.find('.aside-slider')),
      questions = el.find('.quest-wrap > .item'),
      currentQuestion = {},
      currentIndex = 0,
      totalQuest = 0,
      eDone = 'QUESTION_ANIMATION_DONE',
      eNext = 'QUESTION_ANIMATION_NEXT',
      questArray = [],

      proWrap = el.find('.progress-ctr'),
      proBar = proWrap.find('i'),
      proNum = proWrap.find('.progress-num'),
      btnPrevQuest = proWrap.find('.btn-prev'),
      btnNextQuest = proWrap.find('.btn-next'),

      welScr = el.find('.wel-scr'),
      btnWel = welScr.find('.cta'),
      welActive = false,

      finScr = el.find('.fin-scr'),
      btnFin = finScr.find('.cta'),
      finActive = false,

      socialChx = el.find('.js-social-chx');;


  (() => init())();
  function init() {
    initQuest();
    initScr();

  }
  this.show = () => showForm();
  this.hide = () => hideForm();

  function initQuest() {
    questions.each((i, e) => questArray[i] = new SignUpQuestion(e, eNext, eDone));
    currentQuestion = questArray[currentIndex];
    currentQuestion.goInView();
    totalQuest = questArray.length;
    // totalQuest = 3;
  }

  function initScr() {
    TweenMax.set(el, {
      scale: 0.75,
      autoAlpha: 0
		});

    finScr.hide().find('.banner > *').each((_, e) => TweenMax.set(e, {
      y: -50,
      autoAlpha: 0
		}));

    TweenMax.set(asideWrap, { x: -asideWrap.width() });
    TweenMax.set(questList, { x: APP._W });
  }

  function initEvent() {
    btnWel.on(CLICK, enterQuest);
    btnFin.on(CLICK, hideForm);
    btnPrevQuest.on(CLICK, btnPrevQuestClicked);
    btnNextQuest.on(CLICK, btnNextQuestClicked);
    socialChx.on(CHANGE, updateSocialInput);

    document.addEventListener(KEYDOWN, checkEnterKey);
    document.addEventListener(eNext, e => requestNextQuest(e.detail.target));
    document.addEventListener(eDone, e => goNextQuest(e.detail.target));
  }

  function cancelEvent() {
    btnWel.off(CLICK, enterQuest);
    btnFin.off(CLICK, hideForm);
    btnPrevQuest.off(CLICK, btnPrevQuestClicked);
    btnNextQuest.off(CLICK, btnNextQuestClicked);
    socialChx.off(CHANGE, updateSocialInput);

    document.removeEventListener(KEYDOWN, checkEnterKey);
    document.removeEventListener(eNext, e => requestNextQuest(e.detail.target));
    document.removeEventListener(eDone, e => goNextQuest(e.detail.target));
  }

  function updateSocialInput() {
    let input = $(this),
        val = input.val(),
        targetIndex = currentIndex + 1;
    input.is(':checked') ? questArray[targetIndex].showSocialInput(val) : questArray[targetIndex].hideSocialInput(val);
  }

  function btnPrevQuestClicked(e) {
    e.preventDefault();
    requestPrevQuest(currentIndex);
  }

  function btnNextQuestClicked(e) {
    e.preventDefault();
    currentQuestion.submit();
  }


  function showForm() {
    welActive = true;
    TweenMax.to(el, 0.75, {
      scale: 1,
      autoAlpha: 1,
      ease: Expo.easeInOut,
			force3D: true
		});
    initEvent();
  }

  function hideForm(e) {
    e.preventDefault();
    TweenMax.to(el, 0.75, {
      scale: 0.75,
      autoAlpha: 0,
      ease: Expo.easeInOut,
			force3D: true,
      onComplete: resetForm
		});
    cancelEvent();
  }

  function resetForm() {
    finScr.hide();
    welScr.find('.banner > *').each((_, e) => TweenMax.set(e, {
      y: 0,
      autoAlpha: 1
		}));
    numSlider.goTo(0);
    questArray[0].goInView();
    updateProgress(0);
    currentIndex = 0;
  }

  function enterQuest(e) {
    e.preventDefault();
    let subEl = welScr.find('.banner > *'),
        delay = 0.25;

    welActive = false;
    subEl.each((i, e) => TweenMax.to(e, 0.5, {
      y: -50,
      autoAlpha: 0,
			force3D: true,
      delay: delay * i,
      onComplete: subEl.length === (i + 1) && welAnimatedDone
		}));
  }

  function welAnimatedDone() {
    el.addClass(CLASS._active);
    TweenMax.to(asideWrap, 0.5, {
      x: 0,
      ease: Expo.easeInOut,
			force3D: true,
      delay: 0.25
		});

    TweenMax.to(questList, 0.75, {
      x: 0,
      ease: Expo.easeInOut,
			force3D: true,
      delay: 0.25
		});
  }

  function outQuest() {
    TweenMax.to(asideWrap, 0.5, {
      x: -asideWrap.width(),
      ease: Expo.easeInOut,
			force3D: true
		});

    TweenMax.to(questList, 0.75, {
      x: APP._W,
      ease: Expo.easeInOut,
			force3D: true,
      onComplete: finAnimatedDone
		});
  }

  function finAnimatedDone() {
    let delay = 0.25;
    finScr.show().find('.banner > *').each((i, e) => TweenMax.to(e, 0.75, {
      y: 0,
      autoAlpha: 1,
      force3D: true,
      delay: delay * i,
      onComplete: () => {
        finActive = true;
        el.removeClass(CLASS._active);
      }
		}));
  }

  function checkEnterKey(e) {
    let key = e.which;
    key === 13 && (e.preventDefault(), welActive ? btnWel.click() : (currentQuestion ? currentQuestion.submit() : finActive && btnFin.click()));
  }

  function requestPrevQuest(i) {
    if (i === 0) return false;
    questArray[i].goOutNext(-1);
    numSlider.goTo(i - 1);
    currentQuestion = null;
  }

  function requestNextQuest(i) {
    questArray[i].goOutNext(1);
    numSlider.goTo(i + 1);
    currentQuestion = null;
  }

  function goNextQuest(i) {
    (i === totalQuest) ? submitQuest() : updateIndex(i);
  }

  function submitQuest() {
    APP.popup._loading.show();
    // console.log(questList.serializeArray()); return;
    $.ajax({
			type: APP._submitMethod,
			url: ajaxURL,
			data: questList.serializeArray(),
      headers: APP._headers,
			success: data => {
				let status = parseInt(data.status),
						title = data.title,
						message = data.message;

				APP.popup._loading.hide();
				switch(status) {
					case 0: outQuest(); break;
					case 1: outQuest(); break;
				}
			}
		});
  }

  function updateIndex(i) {
    currentIndex = i;
    questArray[i].goInView();
    currentQuestion = questArray[i];
    updateProgress(Math.round((currentIndex / totalQuest) * 100));
    // currentIndex === 0 ? btnPrevQuest.hide() : currentIndex === (totalQuest - 1) ? btnNextQuest.hide() : (btnPrevQuest.show(), btnNextQuest.show());
  }

  function updateProgress(i) {
    proNum.text(i);
    proBar.width(i + '%');
  }

	return this;
};
/***** SignUpQuestion - Each question as a mini form *****/
let SignUpQuestion = function(element, eNext, eDone) {

	let el = $(element),
      index = parseInt(el.data('index')),
      rqSvCheck = el.hasClass(CLASS._rqSv),
      ajaxURL = rqSvCheck ? el.data('url') : null,
      passSv = false,

      subEl = el.find('> *'),
			inputs = el.find('input[type=text], input[type=password], input[type=email], input[type=tel]'),
			inputRq = el.find('.' + CLASS._require),
      inputEm = el.find('.' + CLASS._email),
      inputMin = el.find('.' + CLASS._min),
      inputMax = el.find('.' + CLASS._max),

      inputSel = el.find('.input-sel'),
      selArray = [],
      radWrap = el.find('.rad-wrap'),
      inputChx = el.find('input[type=radio], input[type=checkbox]'),
      btnNext = el.find('.cta'),
      jsNum = el.find('.js-num'),
      btnActive = true,

			txtRq = 'required-txt',
      txtMin = 'min-txt',
			txtMax = 'max-txt',
			txtEm = 'email-txt',
      nextEvent = new CustomEvent(eNext, { bubbles: true, detail: { target: index } }),
      doneEvent = new CustomEvent(eDone, { bubbles: true, detail: { target: 0 } });

	(() => {
    el.hide();
    inputSel.length > 0 && inputSel.each((i, e) => selArray[i] = new InputSelection(e));
    radWrap.length > 0 && (btnNext.hide(), btnActive = false);
		initEvent();
	})();

  this.goInView = () => goIn();
  this.goOutNext = (i) => goOut(i);
  this.submit = () => checkInput();
  this.hideSocialInput = (i) => hideSocial(i);
  this.showSocialInput = (i) => showSocial(i);

	function initEvent() {
		inputs.length > 0 && inputs.on(F_IN, activeWrap).on(F_OUT, deactiveWrap);
		inputRq.length > 0 && inputRq.on(F_IN, inputFocus);
    inputChx.length > 0 && inputChx.on(CHANGE, chxChanged);
    jsNum.length > 0 && jsNum.on(INPUT, filterNumber);
    btnNext.on(CLICK, nextClicked);
	}

  function filterNumber() {
		this.value = this.value.replace(/[^0-9]/g, '');
	}

  function chxChanged() {
    inputChx.filter(':checked').length === 0 ? (btnNext.hide(), btnActive = false) : (btnNext.show(), btnActive = true);
  }

  function hideSocial(i) {
    let wrap = el.find('#' + i + '-url-wrap'),
        input = wrap.find('input');

    wrap.addClass(CLASS._disable);
    wrap.hasClass(CLASS._require) && input.removeClass(CLASS._require);
    updateRqInput();
  }

  function showSocial(i) {
    let wrap = el.find('#' + i + '-url-wrap'),
        input = wrap.find('input');

    wrap.removeClass(CLASS._disable);
    wrap.hasClass(CLASS._require) && input.addClass(CLASS._require);
    updateRqInput();
  }

  function updateRqInput() {
    subEl = el.find('> *:not(.js-disable)');
    inputRq = el.find('.' + CLASS._require);
    inputRq.on(F_IN, inputFocus);
  }

	function activeWrap() {
		let input = $(this),
				wrap = input.parents('.input-wrap');
		wrap.length > 0 && wrap.addClass(CLASS._active);
	}

	function deactiveWrap() {
		let input = $(this),
				wrap = input.parents('.input-wrap');
		wrap.length > 0 && $.trim(input.val()).length === 0 && wrap.removeClass(CLASS._active);
	}

	function inputFocus(e) {
    let input = $(this),
        warning = input.parent().next('.warning');
		input.hasClass(CLASS._error) && (input.removeClass(CLASS._error), warning.removeClass(CLASS._dlex));
	}

	function nextClicked(e) {
		e.preventDefault();
		checkInput();
	}

  function checkInput() {
    let pass = true;
    pass = btnActive;
		pass && (pass = checkRequire());
    pass && (pass = checkMin());
		pass && (pass = checkMax());
		pass && (pass = checkEmail());
    // console.log(pass, rqSvCheck, pass && rqSvCheck);
    // return false;
    pass && (rqSvCheck ? (passSv ? goNext() : checkServer()) : goNext());
    return pass;
  }

  function checkServer() {
    let inputVal = jQuery.trim(inputs.val());
    APP.popup._loading.show();
    $.ajax({
			type: APP._submitMethod,
			url: ajaxURL,
			data: { val: inputVal },
      headers: APP._headers,
			success: data => {
				let status = parseInt(data.status),
						title = data.title,
						message = data.message;

        APP.popup._loading.hide();
				switch(status) {
					case 0: showWarning(inputs, message); break;
					case 1: {
            passSv = true;
            goNext();
          } break;
				}
			}
		});
  }

  function goNext() {
    console.log('goNext');
    document.dispatchEvent(nextEvent);
  }

  function readyIn() {
    el.show();
    subEl.each((i, e) => TweenMax.set(e, {
      y: 50,
      autoAlpha: 0
		}));
  }

  function goIn() {
    let delay = 0.1;

    readyIn();
    subEl.each((i, e) => TweenMax.to(e, 0.75, {
      y: 0,
      autoAlpha: 1,
      // ease: Expo.easeInOut,
			force3D: true,
      delay: delay*i
		}));
    console.log('goIn ', index);
  }

	function goOut(i) {
    doneEvent.detail.target = index + i;
    animateSubEl();
	}

  function animateSubEl() {
    let delay = 0.25;
    subEl.each((i, e) => TweenMax.to(e, 0.75, {
      y: -50,
      autoAlpha: 0,
      ease: Expo.easeInOut,
      force3D: true,
      delay: delay*i,
      onComplete: subEl.length === (i + 1) && animatedDone
		}));
  }

  function animatedDone() {
    document.dispatchEvent(doneEvent);
    el.hide();
  }

	function checkRequire() {
    let pass = true,
				input = {};

		inputRq.length === 0 || inputRq.each((_, el) => {
			input = $(el);
			(input.val() === '') && (pass = showWarning(input, input.attr(txtRq)));
		});
		return pass;
	}

	function checkEmail() {
		let pass = true,
				input = {},
				regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		inputEm.length === 0 || inputEm.each((_, el) => {
			input = $(el);
			regex.test(input.val()) || (pass = showWarning(input, input.attr(txtEm)));
		});
		return pass;
	}

  function checkMin() {
		let pass = true,
				input = {},
				min = 0;

		inputMin.length === 0 || inputMin.each((_, el) => {
			input = $(el);
			min = parseInt(input.data('min'));
			(input.val().length < min) && (pass = showWarning(input, input.attr(txtMin)));
		});
		return pass;
	}

	function checkMax() {
		let pass = true,
				input = {},
				max = 0;

		inputMax.length === 0 || inputMax.each((_, el) => {
			input = $(el);
			max = parseInt(input.data('max'));
			(input.val().length > max) && (pass = showWarning(input, input.attr(txtMax)));;
		});
		return pass;
	}

  function showWarning(input, mess) {
    let warning = input.parent().next('.warning');
    input.addClass(CLASS._error);
    warning.text(mess).addClass(CLASS._dlex);
    return false;
  }

	return this;
};
/*** PAGE - HOME ***/
APP.home = {
  _el: {},
  _scrollAnimator: {},
  _scrollTrigger: {},
  _eventSection: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);

    self._eventSection = new EventSection(self._el.querySelector('.news-tab'));
    return;

    self._scrollAnimator = self._el.querySelectorAll('.scroll-animator');
    (self._scrollAnimator.length > 0) && self._scrollAnimator.forEach(e => new ScrollAnimator(e));
    self._scrollTrigger = self._el.querySelectorAll('.scroll-trigger');
    (self._scrollTrigger.length > 0) && self._scrollTrigger.forEach(e => new ScrollTrigger(e));

    self.initEvent();
  },

  initEvent: function() {
    let self = this;
  }
};

/***** News & Event Section *****/
let EventSection = function(element) {

  let el = $(element),
      tabPaging = el.find('.tab-paging'),
      tabItem = tabPaging.find('.item'),
      eName = 'HOME_EVENT_SLIDER_PAGING_UPDATED',
      wrapSlider = el.find('#news-slider .item-wrap'),
      eventSlider = new Slider(el.find('#news-slider'), 0, eName),
      shadowOffset = 0;

  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    tabItem.on(CLICK, itemClicked);
    document.addEventListener(eName, e => updateIndex(parseInt(e.detail.target)));
    document.addEventListener(SIZE_CHANGED, updateWrapHeight);
  }

  function itemClicked(e) {
    e.preventDefault();
    let item = $(this),
        targetIndex = 0,
        isAnimate = eventSlider.getAnimationState();

    if (isAnimate || item.hasClass(CLASS._active)) return false;

    targetIndex = parseInt(item.data('index'));
    goTo(targetIndex);
  }

  function goTo(i) {
    updateIndex(i);
    eventSlider.goTo(i);
  }

  function updateIndex(i) {
    tabItem.removeClass(CLASS._active);
    tabItem.eq(i).addClass(CLASS._active);
  }

  function updateWrapHeight() {
    console.log(APP._W);
    (APP._W >= 960) ? removeFixHeight() : setFixHeight();
  }

  function setFixHeight() {
    let h = eventSlider.getItemHeight() + shadowOffset;
    wrapSlider.height(h);
  }

  function removeFixHeight() {
    let style = wrapSlider.attr('style');
    (typeof style !== 'undefined' && style !== false) && wrapSlider.removeAttr('style');
  }

	return this;
};

/*** PAGE - TALENT DETAILS ***/
APP.talentDetails = {
  _el: {},
  _aSlider: {},
  _sCarousel: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self._aSlider = new Slider(self._el.querySelector('.aside-slider'), 0);
    self._sCarousel = new Carousel(self._el.querySelector('.service-board .carousel'), true, self.getMaxShow());
    self.initEvent();
  },

  initEvent: function() {
    let self = this;
    document.addEventListener(SIZE_CHANGED, () => self._sCarousel.updateMaxShow(self.getMaxShow()));
  },

  getMaxShow: () => APP._W > 960 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1
};
/*** PAGE - ACTIVE ACCOUNT ***/
APP.activeAccount = {
  _el: {},
  _loginForm: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self._loginForm = new Form(self._el.querySelector('#login-form'));
    self.initEvent();
  },

  initEvent: function() {
    let self = this;
  }
};
/*** PAGE - CASTING BOARD ***/
APP.castingBoard = {
  _el: {},
  _bSlider: {},
  _tCarousel: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self._bSlider = new Slider(self._el.querySelector('.banner-slider'), 0);
    self._tCarousel = new Carousel(self._el.querySelector('.testimonial .carousel'), true, self.getMaxShow());
    self.initEvent();
  },

  initEvent: function() {
    let self = this;
    document.addEventListener(SIZE_CHANGED, () => self._tCarousel.updateMaxShow(self.getMaxShow()));
  },

  getMaxShow: () => APP._W > 960 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1
};
/*** PAGE - OUR TALENT ***/
APP.ourTalent = {
  _el: {},
  _bSlider: {},
  _tCarousel: {},
  _sCarousel: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self._bSlider = new Slider(self._el.querySelector('.banner-slider'), 0);
    self._tCarousel = new Carousel(self._el.querySelector('.testimonial .carousel'), true, self.getMaxShow());
    self._sCarousel = new Carousel(self._el.querySelector('.service-board .carousel'), true, self.getMaxShow());
    self.initEvent();
  },

  initEvent: function() {
    let self = this;
    document.addEventListener(SIZE_CHANGED, () => {
      self._tCarousel.updateMaxShow(self.getMaxShow()),
      self._sCarousel.updateMaxShow(self.getMaxShow())
    });
  },

  getMaxShow: () => APP._W > 960 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1
};
/*** PAGE - TALENT SERVICES ***/
APP.talentServices = {
  _el: {},
  _bSlider: {},
  _bCarousel: {},
  _sCarousel: {},
  _vidSection: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self._bSlider = new Slider(self._el.querySelector('.banner-slider'), 0);
    self._bCarousel = new Carousel(self._el.querySelector('.benefit .carousel'), true, self.getMaxBenefitShow());
    self._sCarousel = new Carousel(self._el.querySelector('.service-board .carousel'), true, self.getMaxServiceShow());
    self._vidSection = new VideoSection(self._el.querySelector('.vid-section'));
    self.initEvent();
  },

  initEvent: function() {
    let self = this;
    document.addEventListener(SIZE_CHANGED, () => {
      self._bCarousel.updateMaxShow(self.getMaxBenefitShow()),
      self._sCarousel.updateMaxShow(self.getMaxServiceShow())
    });
  },

  getMaxBenefitShow: () => APP._W > 1200 ? 4 : APP._W > 960 && APP._W <= 1200 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1,
  getMaxServiceShow: () => APP._W > 960 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1
};

/*** PAGE - CASTING SERVICES ***/
APP.castingServices = {
  _el: {},
  _sCarousel: {},
  _vidSection: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self._sCarousel = new Carousel(self._el.querySelector('.service-board .carousel'), true, self.getMaxShow());
    self._vidSection = new VideoSection(self._el.querySelector('.vid-section'));
    self.initEvent();
  },

  initEvent: function() {
    let self = this;
    document.addEventListener(SIZE_CHANGED, self._sCarousel.updateMaxShow(self.getMaxShow()));
  },

  getMaxShow: () => APP._W > 960 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1
};
/*** PAGE - SIGNUP ***/
APP.signup = {
  _el: {},
  _signUpTalent: {},
  _signUpClient: {},
  _btnSignUpTalent: {},
  _btnSignUpClient: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self._btnSignUpTalent = self._el.querySelector('.btn-signup-talent');
    self._btnSignUpClient = self._el.querySelector('.btn-signup-client');
    self._signUpTalent = new SignUpPopup(self._el.querySelector('.signup-talent'));
    self._signUpClient = new SignUpPopup(self._el.querySelector('.signup-client'));

    self.initEvent();
  },

  initEvent: function() {
    let self = this;
    self._btnSignUpTalent.addEventListener(CLICK, (e) => {
      e.preventDefault();
      console.log('_btnSignUpTalent');
      self._signUpTalent.show();
    });

    self._btnSignUpClient.addEventListener(CLICK, (e) => {
      e.preventDefault();
      self._signUpClient.show();
    });
  }
};
/*** PAGE - LOGIN ***/
APP.login = {
  _el: {},
  _loginForm: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self._loginForm = new Form(self._el.querySelector('#login-form'));
    self.initEvent();
    // let wrap = new InputWrap(self._el.querySelector('.input-wrap'));
  },

  initEvent: function() {
    let self = this;
  }
};
/*** PAGE - ABOUT US ***/
APP.aboutUs = {
  _el: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self.initEvent();
  },

  initEvent: function() {
    let self = this;
  }
};
/*** PAGE - POST DETAILS ***/
APP.postDetails = {
  _el: {},
  _aSlider: {},

	init: function() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self._aSlider = new Slider(self._el.querySelector('.aside-slider'), 0);
    self.initEvent();
  },

  initEvent: function() {
    let self = this;
  }
};
/***** ScrollAnimator *****/
let ScrollAnimator = function(element) {

	let el = $(element),
			event = 'scroll',

			triggerRange = 0,
			triggerStart = 0,
			triggerEnd = 0,

			setting = new ScrollSetting(el),
			target = el.data('target'),
			tw = null,
			isEnd = false,
			preRun = false;

	(() => {
		getTarget();
		calcRange();
		initEvent();
		// checkInView();
		console.log(triggerStart, triggerEnd, triggerRange);
	})();

	function checkInView() {
		let offset = el.offset(),
				posY = offset.top - $(window).scrollTop();

		// console.log(posY, triggerStart);
		if (posY < APP._H) {
			tw && tw.kill();
			TweenMax.set(target, setting.get(0));
			tw = TweenMax.to(target, 1, setting.get(1));
			preRun = true;
		}
	}

	function getTarget() {
		switch(target) {
			case undefined: target = el; break;
			case 'next': target = el.next(); break;
			default: target = $(target); break;
		}
	}

	function initEvent() {
		$(window).on(event, scroll);
		document.addEventListener(SIZE_CHANGED, calcRange);
	}

	function calcRange() {
		triggerRange = (parseInt(el.data('range')) * APP._H) / 100;
		triggerStart = (parseInt(el.data('start')) * APP._H) / 100;
		triggerEnd = triggerStart - triggerRange;


	}

	function scroll(e) {
		//if (APP._isScroll) return true;
		let offset = el.offset(),
				posY = offset.top - $(window).scrollTop(),
				//posX = offset.left - $(window).scrollLeft(),
				progress = 0;

		// console.log(posY, triggerEnd);

		if (posY < triggerEnd) {
			preRun = false;
			isEnd = isEnd && (tw && tw.kill(), tw = TweenMax.to(target, 0.1, setting.get(1)), false);
		}

		if (isEnd && posY < triggerEnd) {
			//console.log('end', posY);
			tw && tw.kill();
			tw = TweenMax.to(target, 0.1, setting.get(1));
			isEnd = false;
		}

		if (isEnd && posY > triggerStart) {
			//console.log('end', posY);
			tw && tw.kill();
			tw = TweenMax.to(target, 0.1, setting.get(0));
			isEnd = false;
		}

		if (preRun || posY > triggerStart || posY < triggerEnd) return true;
		progress = calcProgress(posY - triggerEnd);
		isEnd = true;

		//console.log(posY, progress);
		tw && tw.kill();
		tw = TweenMax.to(target, 0.1, setting.get(progress));
	}

	function calcProgress(progress) {
		return ((triggerRange - progress) / triggerRange);
	}

	return this;
};
/***** ScrollSetting *****/
let ScrollSetting = function(element) {

	let el = $(element),
      startAttr = {},
      endAttr = {},
			alpha = {},
			scale = {},
			tfx = {},
			tfy = {};

	(() => initTransform())();
	function initTransform() {
		initAlpha();
		initScale();
		initTfx();
		initTfy();
		getState();
	}

	function initAlpha() {
		let attr = el.data('alpha');
		alpha.start = attr ? (alpha.from = parseFloat(el.data('alpha-from')), alpha.to = parseFloat(el.data('alpha-to')), alpha.offset = alpha.to - alpha.from, true) : false;
		//console.log(alpha);
	}

	function initScale() {
		let attr = el.data('scale');
		scale.start = attr ? (scale.from = parseFloat(el.data('scale-from')), scale.to = parseFloat(el.data('scale-to')), scale.offset = scale.to - scale.from, true) : false;
		//console.log(scale);
	}

	function initTfx() {
		let attr = el.data('tfx');
		tfx.start = attr ? (tfx.from = parseInt(el.data('tfx-from')), tfx.to = parseInt(el.data('tfx-to')), tfx.offset = tfx.to - tfx.from, true) : false;
		//console.log(tfx);
	 }

	function initTfy() {
		let attr = el.data('tfy');
		tfy.start = attr ? (tfy.from = parseInt(el.data('tfy-from')), tfy.to = parseInt(el.data('tfy-to')), tfy.offset = tfy.to - tfy.from, true) : false;
		// console.log(tfy);
	}

	function getState() {
		startAttr = { force3D: true, ease: Expo.easeOut };
		endAttr = { force3D: true, ease: Expo.easeOut };
		alpha.start && (startAttr.autoAlpha = alpha.from, endAttr.autoAlpha = alpha.to);
		scale.start && (startAttr.scale = scale.from, endAttr.scale = scale.to);
		tfx.start && (startAttr.x = tfx.from, endAttr.x = tfx.to);
		tfy.start && (startAttr.y = tfy.from, endAttr.y = tfy.to);
	}

  this.get = function(progress) {
    let settings = {};
    switch(progress) {
      case 0: return startAttr;
      case 1: return endAttr;
      default: {
        settings = { force3D: true, ease: Expo.easeOut };
        alpha.start && (settings.autoAlpha = (progress * alpha.offset) + alpha.from);
        scale.start && (settings.scale = (progress * scale.offset) + scale.from);
        tfx.start && (settings.x = (progress * tfx.offset) + tfx.from);
        tfy.start && (settings.y = (progress * tfy.offset) + tfy.from);
        return settings;
      }
    }
  }

	return this;
};
/***** ScrollTrigger *****/
let ScrollTrigger = function(element) {

	let el = $(element),
			event = 'scroll',
			triggerStart = 0,
			time = 1,
      setting = new ScrollSetting(el),
      target = el.data('target'),
      tw = null,
      runStart = false,
      runEnd = false;

	(() => {
		getTarget();
		calcRange();
		initEvent();
    checkInView();
	})();

	function checkInView() {
		let offset = el.offset(),
				posY = offset.top - $(window).scrollTop();


		if (posY < APP._H) {
			tw && tw.kill();
			TweenMax.set(target, setting.get(0));
			tw = TweenMax.to(target, time, setting.get(1));
			runStart = true;
		}
	}

	function getTarget() {
		switch(target) {
			case undefined: target = el; break;
			case 'next': target = el.next(); break;
			default: target = $(target); break;
    }
	}

	function initEvent() {
		$(window).on(event, scroll);
		document.addEventListener(SIZE_CHANGED, calcRange);
	}

	function calcRange() {
		triggerStart = (parseInt(el.data('start')) * APP._H) / 100;
  }

	function scroll(e) {
		//if (APP._isScroll) return true;
		let offset = el.offset(),
        posY = offset.top - $(window).scrollTop();


    if (!runStart && posY < triggerStart) {
      tw && tw.kill();
      tw = TweenMax.to(target, time, setting.get(1));
      runStart = true;
      runEnd = false;
      console.log('runStart');
    }

    if (!runEnd && posY > triggerStart) {
      tw && tw.kill();
      tw = TweenMax.to(target, time, setting.get(0));
      runEnd = true;
      runStart = false;
      console.log('runEnd');
    }
	}

	return this;
};
/***** Check Box *****/
let ChxBox = function(element) {
	let el = $(element),
			input = el.find('input'),
      warning = el.find('.warning'),
			txtRq = input.attr('required-txt'),
      isRq = el.data('required') ? true : false;

  (() => initEvent())();
  function initEvent() {
    input.on('change', () => warning.hide());
  }

  this.validate = () => isRq ? (input.is(':checked') ? true : (warning.text(txtRq).show(), false)) : true;
	this.reset = () => (input.prop('checked', false), warning.hide());
	return this;
};
/***** Form *****/
let Form = function(element) {

	let el = $(element),
			ajaxURL = el.data('url'),
			sWarning = el.find('.warning-server'),

			inputs = el.find('input'),
			inputRq = el.find('.' + CLASS._require),
			inputMin = el.find('.' + CLASS._min),
			inputMax = el.find('.' + CLASS._max),
      inputEm = el.find('.' + CLASS._email),
			inputCf = el.find('.js-confirm'),

			textarea = el.find('textarea'),
			sl = el.find('.sl-wrap'),
			chx = el.find('.chx-wrap'),
			jsNum = el.find('.js-num'),
			jsDate = el.find('.js-date'),
			slBox = [],
			chxBox = [],
			ipDate = [],

			btnShowPw = el.find('.btn-show-pw'),
      btnSubmit = el.find('.btn-submit'),

			txtRq = 'required-txt',
			txtMin = 'min-txt',
			txtMax = 'max-txt',
			txtEm = 'email-txt',
			txtCf = 'cf-txt';

	(() => {
		initEvent();
		sl.length > 0 && sl.each((i, e) => slBox[i] = new SlBox(e));
		chx.length > 0 && chx.each((i, e) => chxBox[i] = new ChxBox(e));
		jsDate.length > 0 && jsDate.each((i, e) => ipDate[i] = new InputDate(e));
	})();

	function initEvent() {
		inputs.on(F_IN, activeWrap).on(F_OUT, deactiveWrap);
		inputRq.on(F_IN, inputFocus);
		btnShowPw.on(CLICK, toggelPass);
		btnSubmit.on(CLICK, submitClicked);
		jsNum.length > 0 && jsNum.on('input', filterNumber);
	}

	function filterNumber() {
		this.value = this.value.replace(/[^0-9]/g, '');
	}

	function activeWrap() {
		let input = $(this),
				wrap = input.parents('.input-wrap');
		wrap.length > 0 && wrap.addClass(CLASS._active);
	}

	function deactiveWrap() {
		let input = $(this),
				wrap = input.parents('.input-wrap');
		wrap.length > 0 && $.trim(input.val()).length === 0 && wrap.removeClass(CLASS._active);
	}

	function inputFocus(e) {
    let input = $(this),
        warning = input.parent().next('.warning');
		input.hasClass(CLASS._error) && (input.removeClass(CLASS._error), warning.removeClass(CLASS._dlex));
	}

	function toggelPass(e) {
		e.preventDefault();
		let btn = $(this),
				input = btn.parent().find('input');

		btn.hasClass(CLASS._active) ? (btn.removeClass(CLASS._active), input.get(0).type = 'password') : (btn.addClass(CLASS._active), input.get(0).type = 'text');
	}

	function submitClicked(e) {
		e.preventDefault();
		let pass = true;
		pass = checkRequire();
		pass && (pass = checkMin());
		pass && (pass = checkMax());
		pass && (pass = checkConfirm());
		pass && (pass = checkEmail());
		pass && (pass = checkDate());
		pass && (pass = checkSlBox());
		pass && (pass = checkChxBox());
		pass && submit();
	}

	function checkSlBox() {
		let pass = true;
		for (let i of slBox) i.validate() || (pass = false);
		return pass;
	}

	function checkChxBox() {
		let pass = true;
		for (let i of chxBox) i.validate() || (pass = false);
		return pass;
	}

	function checkDate() {
		let pass = true;
		for (let i of ipDate) i.validate() || (pass = false);
		return pass;
	}

	function submit() {
		APP.popup._loading.show();
		sWarning.hide();
		$.ajax({
			type: APP._submitMethod,
			url: ajaxURL,
			data: el.serializeArray(),
			headers: APP._headers,
			success: data => {
				let status = parseInt(data.status),
						title = data.title,
						message = data.message,
						url = data.url;

				APP.popup._loading.hide();
				switch(status) {
					case 0: {
						sWarning.text(message).show();
					} break;
					case 1: {
						resetForm(message);
						url && (window.location.href = url);
					}
					break;
				}
			}
		});
	}

	function resetForm() {
		inputs.length > 0 && inputs.val('');
		textarea.length > 0 && textarea.val('');
		for (let i of slBox) i.reset();
		for (let i of chxBox) i.reset();
	}

	function checkRequire() {
    let pass = true,
				input = {},
        warning = {};

		inputRq.length === 0 || inputRq.each((_, el) => {
			input = $(el);
			warning = input.parent().next('.warning');
			(input.val() === '') && (input.addClass(CLASS._error), warning.text(input.attr(txtRq)).addClass(CLASS._dlex), pass = false);
		});
		return pass;
	}

	function checkMin() {
		let pass = true,
				input = {},
				min = 0,
        warning = {};

		inputMin.length === 0 || inputMin.each((_, el) => {
			input = $(el);
			min = parseInt(input.data('min'));
			warning = input.parent().next('.warning');
			(input.val().length < min) && (input.addClass(CLASS._error), warning.text(input.attr(txtMin)).addClass(CLASS._dlex), pass = false);
		});
		return pass;
	}

	function checkMax() {
		let pass = true,
				input = {},
				max = 0,
        warning = {};

		inputMax.length === 0 || inputMax.each((_, el) => {
			input = $(el);
			max = parseInt(input.data('max'));
			warning = input.parent().next('.warning');
			(input.val().length > max) && (input.addClass(CLASS._error), warning.text(input.attr(txtMax)).addClass(CLASS._dlex), pass = false);
		});
		return pass;
	}

	function checkEmail() {
		let pass = true,
				input = {},
				warning = {},
				regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		inputEm.length === 0 || inputEm.each((_, el) => {
			input = $(el);
			warning = input.parent().next('.warning');
			regex.test(input.val()) || (input.addClass(CLASS._error), warning.text(input.attr(txtEm)).addClass(CLASS._dlex), pass = false);
		});
		return pass;
	}

	function checkConfirm() {
		let pass = true,
				input = {},
				target = {},
        warning = {};

		inputCf.length === 0 || inputCf.each((_, el) => {
			input = $(el);
			target = $(input.data('target'));
			warning = input.parent().next('.warning');
			(input.val() != target.val()) && (input.addClass(CLASS._error), warning.text(input.attr(txtCf)).addClass(CLASS._dlex), pass = false);
		});
		return pass;
	}

	return this;
};

/***** Input Date *****/
let InputDate = function(element) {
  let el = $(element),
      oldVal = '',
      warning = el.next('.warning'),
      txtDate = el.attr('date-txt');

  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    el.on('keyup', onKeyUp);
    el.on('input', () => el.val(el.val().replace(/[^0-9/]/g, '')));
    // el.on('keydown', onKeyDown);
    // el.on('textInput', onKeyUp)
  }

  function onKeyUp(e) {
    let val = $.trim(el.val());
    e.preventDefault();
    e.stopPropagation();
    oldVal = (val.length === 5 || val.length === 2) ? ((val.length > oldVal.length) ? el.val(val + '/') : (val.length < oldVal.length) && el.val(val.slice(0, val.length - 1)),el.val()) : val;
  }

  function onKeyDown(e) {
    let val = $.trim(el.val()),
        code = parseInt(e.keyCode || e.which);
    return (code === 0 || code === 8 || code === 229 || (code >= 48 && code <= 57) || (code >= 96 && code <= 105)) ? true : false;
  }

  function validateDate() {
    return true;
    let val = $.trim(el.val()),
        parts = '',
        day = 0,
        month = 0,
        year = 0,
        monthLength = [];

    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(val)) return false;

    // Parse the date parts to integers
    parts = val.split('/');
    day = parseInt(parts[0], 10);
    month = parseInt(parts[1], 10);
    year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12) return false;
    monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)) monthLength[1] = 29;
    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
  }

  this.validate = () => validateDate() ? true : (warning.text(txtDate).show(), false);
	return this;
};
/***** Input Selection *****/
let InputSelection = function(element) {

  let el = $(element),
      input = el.find('input'),
      label = el.find('label'),
      optList = el.find('.opt-list'),
      optItem = optList.find('li');


  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    input.on(F_IN, inputIn);
    input.on(F_OUT, inputOut);
    optItem.on(CLICK, itemClicked);
  }

  function inputIn(e) {
    e.preventDefault();
    optList.slideDown();
    el.addClass(CLASS._activeOpen);
  }

  function inputOut(e) {
    e.preventDefault();
    setTimeout(() => {
      jQuery.trim(input.val()).length === 0 && el.removeClass(CLASS._active);
      optList.slideUp();
      el.removeClass(CLASS._open)
    }, 10);
  }

  function itemClicked(e) {
    e.preventDefault();
    let item = $(this),
        val = item.data('value');

    optItem.removeClass(CLASS._active);
    item.addClass(CLASS._active);
    el.addClass(CLASS._active)
    input.val(val);
  }

	return this;
};
/***** Input Wrap *****/
let InputWrap = function(element) {

  let el = $(element),
      input = el.find('input'),
      label = el.find('label');


  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    // el.on(CLICK, wrapClicked);
    input.on(F_OUT, inputOut);
  }

  function wrapClicked(e) {
    e.preventDefault();
    e.stopPropagation();
    el.addClass(CLASS._active);
    setTimeout(() => input.focus(), 200);
  }

  function inputOut(e) {
    e.preventDefault();
    let val = jQuery.trim(input.val());

    console.log(val.length);

    if (val.length === 0) {
      el.hasClass(CLASS._hasval) && el.removeClass(CLASS._hasval);
    } else {
      el.addClass(CLASS._hasval);
    }
    el.hasClass(CLASS._active) && el.removeClass(CLASS._active);
  }

	return this;
};
/***** Selection Box *****/
let SlBox = function(element) {
	let el = $(element),
			header = el.find('.header'),
			items = el.find('a'),
			input = el.find('input'),
			warning = el.find('.warning'),
			title = header.find('span'),
			txt = title.text(),
			txtRq = input.attr('required-txt'),
			isRq = el.data('required') ? true : false,
			isDirty = false,
			outEvent = APP._isMobile ? 'mouseout' : 'focusout',
      isOpen = false;;

	(() => initEvent())();
	function initEvent() {
		header.on('click', toggleHeader).on(outEvent, () => setTimeout(() => isOpen && closeMenu(), 100));;
		items.on('click', itemClicked);
	}

	this.validate = () => isRq && !isDirty ? (header.addClass(CLASS._error), warning.text(txtRq).show(), false) : true;
	this.reset = () => {
		title.text(txt);
		input.val('');
		items.removeClass(CLASS._active);
		isDirty = false;
	}

	function toggleHeader(e) {
		e.preventDefault();
		isDirty || header.removeClass(CLASS._error), warning.hide();
		isOpen ? closeMenu() : showMenu();
	}

	function showMenu() {
    header.addClass(CLASS._active)
    isOpen = true;
  }

  function closeMenu() {
    header.removeClass(CLASS._active)
    isOpen = false;
  }

	function itemClicked(e) {
		e.preventDefault();
		let item = $(this);

		isDirty || (isDirty = true);
		if (item.hasClass(CLASS._active)) return false;

		title.text(item.text());
		input.val(item.data('val'));

		items.removeClass(CLASS._active);
		item.addClass(CLASS._active);
		header.removeClass(CLASS._active);
	}

	return this;
};
/***** Selection Nav *****/
let SlNav = function(element) {

  let el = $(element),
      header = el.find('.header'),
      title = header.find('span'),
      links = el.find('a'),
      outEvent = APP._isMobile ? 'mouseout' : 'focusout',
      isOpen = false;

  (() => initEvent())();
  function initEvent() {
    header.on('click', toogleMenu).on(outEvent, () => setTimeout(() => isOpen && closeMenu(), 100));
    links.on('click', linkClicked);
  }

  function toogleMenu(e) {
    e.preventDefault();
    isOpen ? closeMenu() : showMenu();
  }

  function showMenu() {
    header.addClass(CLASS._active).focus();
    isOpen = true;
  }

  function closeMenu() {
    header.removeClass(CLASS._active).blur();
    isOpen = false;
  }

  function linkClicked(e) {
    e.preventDefault();
    let item = $(this),
        txt = item.text(),
        url = item.attr('href');

    links.removeClass(CLASS._active);
    item.addClass(CLASS._active);
    title.text(txt);
    header.removeClass(CLASS._active);
    window.location.href = url;
  }

	return this;
};
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsImNvbnN0LmpzIiwicmVhZHkuanMiLCJjb21wL2FjY29yZGlvbi5qcyIsImNvbXAvY2Fyb3VzZWwtcGFnaW5nLmpzIiwiY29tcC9jYXJvdXNlbC5qcyIsImNvbXAvZXF1YWwtaGVpZ2h0LmpzIiwiY29tcC9wb3B1cC5qcyIsImNvbXAvc2xpZGVyLmpzIiwiY29tcC92aWRlby1zZWN0aW9uLmpzIiwibW9kdWxlL2Zvb3Rlci5qcyIsIm1vZHVsZS9oZWFkZXItbW9iaWxlLmpzIiwibW9kdWxlL2hlYWRlci5qcyIsIm1vZHVsZS9wb3B1cC5qcyIsIm1vZHVsZS9zaWduLXVwLXBvcHVwLmpzIiwibW9kdWxlL3NpZ24tdXAtcXVlc3Rpb24uanMiLCJwYWdlLzEtaG9tZS5qcyIsInBhZ2UvMTAtdGFsZW50LWRldGFpbHMuanMiLCJwYWdlLzExLWFjdGl2ZS1hY2NvdW50LmpzIiwicGFnZS8yLWNhc3RpbmctYm9hcmQuanMiLCJwYWdlLzMtb3VyLXRhbGVudC5qcyIsInBhZ2UvNC10YWxlbnQtc2VydmljZXMuanMiLCJwYWdlLzUtY2FzdGluZy1zZXJ2aWNlcy5qcyIsInBhZ2UvNi1zaWdudXAuanMiLCJwYWdlLzctbG9naW4uanMiLCJwYWdlLzgtYWJvdXQtdXMuanMiLCJwYWdlLzktcG9zdC1kZXRhaWxzLmpzIiwiY29tcC9zY3JvbGwvYW5pbWF0b3IuanMiLCJjb21wL3Njcm9sbC9zZXR0aW5nLmpzIiwiY29tcC9zY3JvbGwvdHJpZ2dlci5qcyIsImNvbXAvZm9ybS9jaGVja2JveC5qcyIsImNvbXAvZm9ybS9mb3JtLmpzIiwiY29tcC9mb3JtL2lucHV0LWRhdGUuanMiLCJjb21wL2Zvcm0vaW5wdXQtc2VsZWN0aW9uLmpzIiwiY29tcC9mb3JtL2lucHV0LXdyYXAuanMiLCJjb21wL2Zvcm0vc2VsZWN0aW9uLWJveC5qcyIsImNvbXAvZm9ybS9zZWxlY3Rpb24tbmF2LmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUM5RkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUM3Q0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDTEE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNoREE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDNUlBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUM1TkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDekNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzNEQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUM3S0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUN4QkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDUkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzdEQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDdEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNWQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDdFFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzNQQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDeEZBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3BCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2ZBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3BCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDekJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzdCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNwQkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDaENBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNoQkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2JBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDZkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3BHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDdEVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDaEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDM05BO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUM3REE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNoREE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3hDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDN0RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6Im1haW4uanMiLCJzb3VyY2VzQ29udGVudCI6WyIndXNlIHN0cmljdCc7XHJcbmlmICh0eXBlb2YgJCA9PSAndW5kZWZpbmVkJykgeyB2YXIgJCA9IGpRdWVyeTsgfVxyXG4vKioqIEFQUCAqKiovXHJcbmxldCBBUFAgPSB7XHJcblx0X2h0bWw6IHt9LFxyXG5cdF9ib2R5OiB7fSxcclxuXHRfb3ZlcmxheToge30sXHJcblx0X3BhZ2VJRDogJycsXHJcblx0X3N1Ym1pdE1ldGhvZDogJycsXHJcblx0X2lzTW9iaWxlOiBmYWxzZSxcclxuXHRfaXNGaXJlZm94OiBmYWxzZSxcclxuXHRfaXNPdmxBY3RpdmU6IGZhbHNlLFxyXG5cdF9pc1Njcm9sbDogZmFsc2UsXHJcblx0X1c6IDAsXHJcblx0X0g6IDAsXHJcblx0X2hlYWRlcnM6ICcnLFxyXG5cclxuXHRpbml0KCkge1xyXG5cdFx0dGhpcy5faHRtbCA9ICQoJ2h0bWwnKTtcclxuXHRcdHRoaXMuX2JvZHkgPSAkKCdib2R5Jyk7XHJcblx0XHR0aGlzLl9vdmVybGF5ID0gJCgnI292ZXJsYXknKTtcclxuXHRcdHRoaXMuX3BhZ2VJRCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdwYWdlLWlkJykudmFsdWU7XHJcblx0XHR0aGlzLl9zdWJtaXRNZXRob2QgPSB3aW5kb3cubG9jYXRpb24ub3JpZ2luLmluZGV4T2YoJ2h0dHA6Ly9sb2NhbGhvc3Q6ODA4MCcpID09PSAtMSA/ICdQT1NUJyA6ICdHRVQnO1xyXG5cdFx0dGhpcy5faGVhZGVycyA9IHsgJ1gtQ1NSRi1UT0tFTic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JykgfTtcclxuXHJcblx0XHQvaVBob25lfGlQYWR8aVBvZC9pLnRlc3QobmF2aWdhdG9yLnVzZXJBZ2VudCkgJiYgdGhpcy5faHRtbC5hZGRDbGFzcyhDTEFTUy5faU9TKTtcclxuXHRcdC9BbmRyb2lkfHdlYk9TfGlQaG9uZXxpUGFkfGlQb2R8QmxhY2tCZXJyeXxPcGVyYSBNaW5pL2kudGVzdChuYXZpZ2F0b3IudXNlckFnZW50KSA/XHJcblx0XHRcdCh0aGlzLl9odG1sLmFkZENsYXNzKENMQVNTLl9tb2JpbGUpLCB0aGlzLl9pc01vYmlsZSA9IHRydWUpIDogbmF2aWdhdG9yLnVzZXJBZ2VudC50b0xvd2VyQ2FzZSgpLmluZGV4T2YoJ2ZpcmVmb3gnKSA+IC0xICYmICh0aGlzLl9pc0ZpcmVmb3ggPSB0cnVlKTtcclxuXHRcdHRoaXMuX2lzTW9iaWxlICYmIHdpbmRvdy5vcmllbnRhdGlvbiAhPSAwICYmIHRoaXMuX2h0bWwuYWRkQ2xhc3MoQ0xBU1MuX29yaWVudGF0aW9uKTtcclxuXHJcblx0XHR0aGlzLmdldFNpemUoKTtcclxuXHRcdHRoaXMuaW5pdEV2ZW50KCk7XHJcblx0XHRBUFAuaGVhZGVyLmluaXQoKTtcclxuXHRcdEFQUC5wb3B1cC5pbml0KCk7XHJcblx0XHRBUFAuZm9vdGVyLmluaXQoKTtcclxuXHRcdEFQUC5jaGVja0hhc2goKTtcclxuXHJcblx0XHRzd2l0Y2godGhpcy5fcGFnZUlEKSB7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtaG9tZSc6IFx0XHRcdFx0XHRcdHRoaXMuaG9tZS5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLWNhc3RpbmctYm9hcmQnOiBcdFx0dGhpcy5jYXN0aW5nQm9hcmQuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1vdXItdGFsZW50JzogXHRcdFx0dGhpcy5vdXJUYWxlbnQuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS10YWxlbnQtc2VydmljZXMnOiBcdHRoaXMudGFsZW50U2VydmljZXMuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1jYXN0aW5nLXNlcnZpY2VzJzogdGhpcy50YWxlbnRTZXJ2aWNlcy5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXNpZ251cCc6IFx0XHRcdFx0XHR0aGlzLnNpZ251cC5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLWxvZ2luJzogXHRcdFx0XHRcdFx0dGhpcy5sb2dpbi5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLWFib3V0LXVzJzogXHRcdFx0XHR0aGlzLmFib3V0VXMuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1wb3N0LWRldGFpbHMnOiBcdFx0dGhpcy5wb3N0RGV0YWlscy5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXRhbGVudC1kZXRhaWxzJzogXHR0aGlzLnRhbGVudERldGFpbHMuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1hY3RpdmUtYWNjb3VudCc6IFx0dGhpcy5hY3RpdmVBY2NvdW50LmluaXQoKTsgYnJlYWs7XHJcblx0XHR9XHJcblx0fSxcclxuXHJcblx0aW5pdEV2ZW50KCkge1xyXG5cdFx0QVBQLl9vdmVybGF5Lm9uKENMSUNLLCBBUFAub3ZlcmxheUNsaWNrZWQpO1xyXG5cdFx0d2luZG93Lm9ucmVzaXplID0gQVBQLnJlc2l6ZWQ7XHJcblx0XHR3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignd2hlZWwnLCB7IHBhc3NpdmU6IGZhbHNlIH0pO1xyXG5cdH0sXHJcblxyXG5cdG92ZXJsYXlDbGlja2VkKGUpIHtcclxuXHRcdGUucHJldmVudERlZmF1bHQoKTtcclxuXHRcdEFQUC5oZWFkZXIuX2J0bk1iLmNsYXNzTGlzdC5jb250YWlucyhDTEFTUy5fYWN0aXZlKSAmJiBBUFAuaGVhZGVyLl9idG5NYi5jbGljaygpO1xyXG5cdH0sXHJcblxyXG5cdHJlc2l6ZWQ6ICgpID0+IHdpbmRvdy5pbm5lcldpZHRoID09PSBBUFAuX1cgfHwgKFxyXG5cdFx0QVBQLmdldFNpemUoKSxcclxuXHRcdEFQUC5fVyA+IDEyMDAgJiYgQVBQLmhlYWRlci5fYnRuTWIuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTLl9hY3RpdmUpICYmIEFQUC5oZWFkZXIuX2J0bk1iLmNsaWNrKClcclxuXHQpLFxyXG5cclxuXHRnZXRTaXplKCkge1xyXG5cdFx0Y29uc29sZS5sb2coJ2dldFNpemUnKTtcclxuXHRcdEFQUC5fVyA9IHdpbmRvdy5pbm5lcldpZHRoO1xyXG5cdFx0QVBQLl9IID0gd2luZG93LmlubmVySGVpZ2h0O1xyXG5cdFx0c2V0VGltZW91dCgoKSA9PiBkb2N1bWVudC5kaXNwYXRjaEV2ZW50KFNJWkVfQ0hBTkdFRF9FVkVOVCksIDI1MCk7XHJcblx0fSxcclxuXHJcblx0Y2hlY2tIYXNoKCkge1xyXG5cdFx0aWYgKHdpbmRvdy5sb2NhdGlvbi5oYXNoLmxlbmd0aCA9PT0gMCkgcmV0dXJuIGZhbHNlO1xyXG5cdFx0bGV0IGhhc2ggPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKHdpbmRvdy5sb2NhdGlvbi5oYXNoKSxcclxuXHRcdCAgICBvZmZzZXQgPSBBUFAub2Zmc2V0KGhhc2gpO1xyXG5cdFx0KGhhc2ggIT09IG51bGwpICYmIEFQUC5zY3JvbGwob2Zmc2V0LnRvcCAtIDE1MCwgMTAwMCk7XHJcbiAgfSxcclxuXHJcblx0c2Nyb2xsKG9mZnNldCwgdGltZSkge1xyXG5cdFx0QVBQLl9pc1Njcm9sbCA9IHRydWU7XHJcblx0XHQvLyBUd2Vlbk1heC50byh3aW5kb3csIHRpbWUsIHtzY3JvbGxUbzp7IHk6IG9mZnNldCArICdweCcgfX0pO1xyXG5cdFx0JCgnaHRtbCwgYm9keScpLmFuaW1hdGUoeyBzY3JvbGxUb3A6IG9mZnNldCB9LCB0aW1lLCAoKSA9PiB7IEFQUC5faXNTY3JvbGwgPSBmYWxzZTsgfSk7XHJcblx0fSxcclxuXHJcblx0b2Zmc2V0KGVsKSB7XHJcbiAgICBsZXQgcmVjdCA9IGVsLmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpLFxyXG4gICAgc2Nyb2xsTGVmdCA9IHdpbmRvdy5wYWdlWE9mZnNldCB8fCBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuc2Nyb2xsTGVmdCxcclxuICAgIHNjcm9sbFRvcCA9IHdpbmRvdy5wYWdlWU9mZnNldCB8fCBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuc2Nyb2xsVG9wO1xyXG4gICAgcmV0dXJuIHsgdG9wOiByZWN0LnRvcCArIHNjcm9sbFRvcCwgbGVmdDogcmVjdC5sZWZ0ICsgc2Nyb2xsTGVmdCB9XHJcblx0fVxyXG59OyIsIi8qKiogQ3VzdG9tRXZlbnQgUG9seWZpbGwgZm9yIElFICoqKi9cbigoKSA9PiB7XG4gIGlmICh0eXBlb2Ygd2luZG93LkN1c3RvbUV2ZW50ID09PSAnZnVuY3Rpb24nKSByZXR1cm4gZmFsc2U7IC8vSWYgbm90IElFXG5cbiAgZnVuY3Rpb24gQ3VzdG9tRXZlbnQoZXZlbnQsIHBhcmFtcykge1xuICAgIGxldCBldnQgPSBkb2N1bWVudC5jcmVhdGVFdmVudCgnQ3VzdG9tRXZlbnQnKTtcbiAgICBwYXJhbXMgPSBwYXJhbXMgfHwgeyBidWJibGVzOiBmYWxzZSwgY2FuY2VsYWJsZTogZmFsc2UsIGRldGFpbDogdW5kZWZpbmVkIH07XG4gICAgZXZ0LmluaXRDdXN0b21FdmVudChldmVudCwgcGFyYW1zLmJ1YmJsZXMsIHBhcmFtcy5jYW5jZWxhYmxlLCBwYXJhbXMuZGV0YWlsKTtcbiAgICByZXR1cm4gZXZ0O1xuICB9XG4gIEN1c3RvbUV2ZW50LnByb3RvdHlwZSA9IHdpbmRvdy5FdmVudC5wcm90b3R5cGU7XG4gIHdpbmRvdy5DdXN0b21FdmVudCA9IEN1c3RvbUV2ZW50O1xufSkoKTtcbi8qKiogQ29uc3RhbnQgKioqL1xuY29uc3QgRE9NX1JFQURZID0gJ0RPTUNvbnRlbnRMb2FkZWQnLFxuICAgICAgU0laRV9DSEFOR0VEID0gJ2FwcC1zaXplLWNoYW5nZWQnLFxuICAgICAgU0laRV9DSEFOR0VEX0VWRU5UID0gbmV3IEN1c3RvbUV2ZW50KFNJWkVfQ0hBTkdFRCksXG4gICAgICBHT1RPX1RPUCA9ICdhcHAtZ290by10b3AnLFxuICAgICAgR09UT19UT1BfRVZFTlQgPSBuZXcgQ3VzdG9tRXZlbnQoR09UT19UT1ApLFxuICAgICAgQ0xJQ0sgPSAnY2xpY2snLFxuICAgICAgRl9JTiA9ICdmb2N1c2luJyxcbiAgICAgIEZfT1VUID0gJ2ZvY3Vzb3V0JyxcbiAgICAgIENIQU5HRSA9ICdjaGFuZ2UnLFxuICAgICAgS0VZRE9XTiA9ICdrZXlkb3duJyxcbiAgICAgIEtFWVBSRVNTID0gJ2tleXByZXNzJyxcbiAgICAgIElOUFVUID0gJ2lucHV0JztcblxuY29uc3QgQ0xBU1MgPSB7XG4gIF9zY3JvbGxpbmc6ICdqcy1zY3JvbGxpbmcnLFxuXHRfZGxleDogJ2pzLWRmbGV4Jyxcblx0X2FjdGl2ZTogJ2pzLWFjdGl2ZScsXG4gIF9tb2JpbGU6ICdqcy1tb2JpbGUnLFxuICBfb3ZsQWN0aXZlOiAnanMtb3ZsLWFjdGl2ZScsXG4gIF9tZW51QWN0aXZlOiAnanMtbWVudS1hY3RpdmUnLFxuXHRfaU9TOiAnanMtaW9zJyxcblx0X29yaWVudGF0aW9uOiAnanMtb3JpZW50YXRpb24nLFxuICBfcmVxdWlyZTogJ2pzLXJlcXVpcmVkJyxcbiAgX21pbjogJ2pzLW1pbicsXG5cdF9lbWFpbDogJ2pzLWVtYWlsJyxcblx0X2Vycm9yOiAnanMtZXJyb3InLFxuICBfaGFzdmFsOiAnanMtaGFzdmFsJyxcbiAgX29wZW46ICdqcy1vcGVuJyxcbiAgX2FjdGl2ZU9wZW46ICdqcy1hY3RpdmUganMtb3BlbicsXG4gIF9kaXNhYmxlOiAnanMtZGlzYWJsZScsXG4gIF9ycVN2OiAnanMtcmVxdWlyZWQtc2VydmVyJ1xufTsiLCIvKioqIFJFQURZICoqKi9cbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiBtYXRjaE1lZGlhKCcoaG92ZXI6IG5vbmUpJykubWF0Y2hlcyB8fCBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5hZGQoJ2Nhbi1ob3ZlcicpKTtcbi8qKiogTE9BRCAqKiovXG53aW5kb3cub25sb2FkID0gKCkgPT4gQVBQLmluaXQoKTs7XG4kKCcqJykuY2xpY2soZnVuY3Rpb24oKSB7fSk7XG4kKCdodG1sJykuY3NzKCctd2Via2l0LXRhcC1oaWdobGlnaHQtY29sb3InLCAncmdiYSgwLCAwLCAwLCAwKScpOyIsIi8qKioqKiBBY2NvcmRpb24gKioqKiovXG5sZXQgQWNjb3JkaW9uID0gZnVuY3Rpb24oZWxlbWVudCkge1xuXG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICB0aXRsZXMgPSBlbC5maW5kKCcudGl0bGUnKSxcbiAgICAgIGNDb250ZW50ID0gbnVsbDtcblxuXHQoKCkgPT4ge1xuICAgIGNoZWNrQWN0aXZlKCk7XG5cdFx0aW5pdEV2ZW50KCk7XG5cdH0pKCk7XG5cblx0ZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuXHRcdHRpdGxlcy5vbignY2xpY2snLCB0aXRsZUNsaWNrZWQpO1xuICB9XG5cbiAgZnVuY3Rpb24gY2hlY2tBY3RpdmUoKSB7XG4gICAgbGV0IHRpdGxlID0ge30sXG4gICAgICAgIGNvbnRlbnQgPSB7fTtcblxuICAgIHRpdGxlcy5lYWNoKGZ1bmN0aW9uKCkge1xuICAgICAgdGl0bGUgPSAkKHRoaXMpO1xuICAgICAgY29udGVudCA9IHRpdGxlLm5leHQoJy5jb250ZW50Jyk7XG4gICAgICBpZiAodGl0bGUuaGFzQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkpIHtcbiAgICAgICAgY29udGVudC5zbGlkZURvd24oKTtcbiAgICAgICAgY0NvbnRlbnQgPSBjb250ZW50O1xuICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICB9XG4gICAgfSk7XG4gIH1cblxuICBmdW5jdGlvbiB0aXRsZUNsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICB2YXIgdGl0bGUgPSAkKHRoaXMpLFxuICAgICAgICBjb250ZW50ID0gdGl0bGUubmV4dCgnLmNvbnRlbnQnKSxcbiAgICAgICAgdGltZW91dCA9IDA7XG5cbiAgICBjQ29udGVudCA9IHRpdGxlLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpID8gKGNDb250ZW50LnNsaWRlVXAoKSwgdGl0bGUucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSksIG51bGwpIDogKFxuICAgICAgKGNDb250ZW50ICE9IG51bGwpICYmIChjQ29udGVudC5zbGlkZVVwKCksIHRpbWVvdXQgPSAyNTApLFxuICAgICAgdGl0bGVzLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpLFxuICAgICAgdGl0bGUuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSksXG4gICAgICBzZXRUaW1lb3V0KCgpID0+IGNvbnRlbnQuc2xpZGVEb3duKCksIHRpbWVvdXQpLFxuICAgICAgY29udGVudFxuICAgIClcbiAgfVxuXG5cdHJldHVybiB0aGlzO1xufTtcbiIsImxldCBDYXJvdXNlbFBhZ2luZyA9IGZ1bmN0aW9uKGVsZW1lbnQsIGlzTG9vcCA9IHRydWUsIG1heFNob3cgPSAzKSB7XG5cbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIGl0ZW1zID0gZWwuZmluZCgnbGknKSxcbiAgICAgIHBhZ2luZyA9IGl0ZW1zLmZpbmQoJ2EnKSxcblx0XHRcdGN1cnJlbnRJdGVtID0ge30sXG4gICAgICB0YXJnZXRJdGVtID0ge30sXG5cdFx0XHRpc0FuaW1hdGUgPSBmYWxzZSxcblx0XHRcdGluZGV4ID0gMCxcbiAgICAgIHRhcmdldCA9IDAsXG4gICAgICBtYXggPSBpdGVtcy5sZW5ndGgsXG4gICAgICBpdGVtVyA9IDQwIC8gMyxcbiAgICAgIG1haW5XID0gNDAsXG4gICAgICBzaG93QXJyYXkgPSBbXTtcblxuICAoKCkgPT4gaW5pdCgpKSgpO1xuICBmdW5jdGlvbiBpbml0KCkge1xuICAgIFR3ZWVuTWF4LnNldChpdGVtcywgeyBhdXRvQWxwaGE6IDAgfSk7XG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBtYXhTaG93OyBpKyspIHtcbiAgICAgIHNob3dBcnJheVtpXSA9IGk7XG4gICAgICBjdXJyZW50SXRlbSA9IGl0ZW1zLmVxKGkpO1xuICAgICAgVHdlZW5NYXguc2V0KGN1cnJlbnRJdGVtLCB7IGF1dG9BbHBoYTogMSwgeDogaXRlbVcgKiBpIH0pO1xuICAgIH1cbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZVNob3dBcnJheSgpIHtcbiAgICBsZXQgY0luZGV4ID0gMDtcbiAgICBzaG93QXJyYXlbMF0gPSBpbmRleDtcbiAgICBpZiAobWF4U2hvdyA+IDEpIGZvciAobGV0IGkgPSAxOyBpIDwgbWF4U2hvdzsgaSsrKSB7XG4gICAgICBjSW5kZXggPSBpbmRleCArIGk7XG4gICAgICBjSW5kZXggPj0gbWF4ICYmIChjSW5kZXggPSBjSW5kZXggJSBtYXgpO1xuICAgICAgc2hvd0FycmF5W2ldID0gY0luZGV4O1xuICAgIH1cbiAgfVxuXG4gIHRoaXMubmV4dCA9IGZ1bmN0aW9uKCkge1xuICAgIGlmIChpc0FuaW1hdGUgfHwgKCFpc0xvb3AgJiYgaW5kZXggPT09IG1heCAtIG1heFNob3cpKSByZXR1cm4gZmFsc2U7XG5cdFx0aXNBbmltYXRlID0gdHJ1ZTtcblxuICAgIHRhcmdldCA9IGluZGV4ICsgbWF4U2hvdztcbiAgICB0YXJnZXQgPj0gbWF4ICYmICh0YXJnZXQgPSB0YXJnZXQgJSBtYXgpO1xuXHRcdGdvTmV4dCgpO1xuICB9XG5cbiAgdGhpcy5wcmV2ID0gZnVuY3Rpb24oKSB7XG5cdFx0aWYgKGlzQW5pbWF0ZSB8fCAoIWlzTG9vcCAmJiBpbmRleCA9PT0gMCkpIHJldHVybiBmYWxzZTtcblx0XHRpc0FuaW1hdGUgPSB0cnVlO1xuXG5cdFx0dGFyZ2V0ID0gKGluZGV4ID09PSAwID8gbWF4IDogaW5kZXgpIC0gMTtcblx0XHRnb1ByZXYoKTtcblx0fVxuXG5cdGZ1bmN0aW9uIGdvUHJldigpIHtcbiAgICBsZXQgZGVsYXkgPSAwLFxuICAgICAgICBjSW5kZXggPSAwO1xuXG4gICAgdGFyZ2V0SXRlbSA9IGl0ZW1zLmVxKHRhcmdldCk7XG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBtYXhTaG93OyBpKyspIHtcbiAgICAgIGNJbmRleCA9IGluZGV4ICsgaTtcbiAgICAgIGNJbmRleCA+PSBtYXggJiYgKGNJbmRleCA9IGNJbmRleCAlIG1heCk7XG4gICAgICBjdXJyZW50SXRlbSA9IGl0ZW1zLmVxKGNJbmRleCk7XG5cbiAgICAgIFR3ZWVuTWF4LnRvKGN1cnJlbnRJdGVtLCAxLCB7XG4gICAgICAgIGRlbGF5OiBkZWxheSxcbiAgICAgICAgeDogaXRlbVcgKiAoaSArIDEpLFxuICAgICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcbiAgICAgICAgZm9yY2UzRDogdHJ1ZVxuICAgICAgfSk7XG4gICAgfVxuXG5cdFx0VHdlZW5NYXguc2V0KHRhcmdldEl0ZW0sIHsgYXV0b0FscGhhOiAxLCB4OiAtaXRlbVcgfSk7XG4gICAgVHdlZW5NYXgudG8odGFyZ2V0SXRlbSwgMSwge1xuICAgICAgZGVsYXk6IGRlbGF5LFxuICAgICAgeDogMCxcblx0XHRcdGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZSxcblx0XHRcdG9uQ29tcGxldGU6IHByZXZDb21wbGV0ZVxuXHRcdH0pO1xuXHR9XG5cblx0ZnVuY3Rpb24gZ29OZXh0KCkge1xuICAgIGxldCBkZWxheSA9IDAsXG4gICAgICAgIGNJbmRleCA9IDA7XG5cbiAgICB0YXJnZXRJdGVtID0gaXRlbXMuZXEodGFyZ2V0KTtcbiAgICBmb3IgKGxldCBpID0gMDsgaSA8IG1heFNob3c7IGkrKykge1xuICAgICAgY0luZGV4ID0gaW5kZXggKyBpO1xuICAgICAgY0luZGV4ID49IG1heCAmJiAoY0luZGV4ID0gY0luZGV4ICUgbWF4KTtcbiAgICAgIGN1cnJlbnRJdGVtID0gaXRlbXMuZXEoY0luZGV4KTtcblxuICAgICAgVHdlZW5NYXgudG8oY3VycmVudEl0ZW0sIDEsIHtcbiAgICAgICAgZGVsYXk6IGRlbGF5LFxuICAgICAgICB4OiBpdGVtVyAqIChpIC0gMSksXG4gICAgICAgIGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuICAgICAgICBmb3JjZTNEOiB0cnVlXG4gICAgICB9KTtcbiAgICB9XG5cblx0XHRUd2Vlbk1heC5zZXQodGFyZ2V0SXRlbSwgeyBhdXRvQWxwaGE6IDEsIHg6IG1haW5XIH0pO1xuICAgIFR3ZWVuTWF4LnRvKHRhcmdldEl0ZW0sIDEsIHtcblx0XHRcdGRlbGF5OiBkZWxheSxcbiAgICAgIHg6IG1haW5XIC0gaXRlbVcsXG4gICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWUsXG5cdFx0XHRvbkNvbXBsZXRlOiBuZXh0Q29tcGxldGVcblx0XHR9KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHByZXZDb21wbGV0ZSgpIHtcbiAgICBpbmRleCA9IChpbmRleCA8IDEgPyBtYXggOiBpbmRleCkgLSAxO1xuICAgIGhpZGVPdXRJdGVtKCk7XG4gIH1cblxuICBmdW5jdGlvbiBuZXh0Q29tcGxldGUoKSB7XG4gICAgaW5kZXggPSBpbmRleCA8IG1heCAtIDEgPyAoaW5kZXggKyAxKSA6IDA7XG4gICAgaGlkZU91dEl0ZW0oKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGhpZGVPdXRJdGVtKCkge1xuICAgIGxldCBpdGVtID0ge30sXG4gICAgICAgIGN1cnJlbnRJbmRleCA9IDA7XG5cbiAgICB1cGRhdGVTaG93QXJyYXkoKTtcbiAgICBpdGVtcy5lYWNoKChfLCBlbCkgPT4gVHdlZW5NYXguc2V0KGVsLCB7IGF1dG9BbHBoYTogMCB9KSk7XG5cbiAgICBmb3IgKGxldCBpID0gMDsgaSA8IG1heFNob3c7IGkrKykge1xuICAgICAgY3VycmVudEluZGV4ID0gc2hvd0FycmF5W2ldO1xuICAgICAgaXRlbSA9IGl0ZW1zLmVxKGN1cnJlbnRJbmRleCk7XG4gICAgICBUd2Vlbk1heC5zZXQoaXRlbSwgeyBhdXRvQWxwaGE6IDEgfSk7XG4gICAgfVxuICAgIGlzQW5pbWF0ZSA9IGZhbHNlO1xuICAgIHVwZGF0ZUFjdGl2ZSgpO1xuICB9XG5cbiAgZnVuY3Rpb24gdXBkYXRlQWN0aXZlKCkge1xuICAgIHBhZ2luZy5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBwYWdpbmcuZXEoc2hvd0FycmF5WzFdKS5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgfVxuXG5cdHJldHVybiB0aGlzO1xufTsiLCJsZXQgQ2Fyb3VzZWwgPSBmdW5jdGlvbihlbGVtZW50LCBpc0xvb3AsIG1heFNob3cpIHtcblxuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgaG9sZGVyID0gZWwuZmluZCgnLml0ZW0td3JhcCcpLFxuICAgICAgaXRlbXMgPSBob2xkZXIuZmluZCgnLml0ZW0nKSxcbiAgICAgIGJ0blByZXYgPSBlbC5maW5kKCcuYnRuLXByZXYnKSxcbiAgICAgIGJ0bk5leHQgPSBlbC5maW5kKCcuYnRuLW5leHQnKSxcbiAgICAgIHBXcmFwID0gZWwuZmluZCgnLnBhZ2luZycpLFxuICAgICAgcGFnaW5nID0gcFdyYXAuZmluZCgnbGknKSxcblx0XHRcdGN1cnJlbnRJdGVtID0ge30sXG4gICAgICB0YXJnZXRJdGVtID0ge30sXG5cdFx0XHRpc0FuaW1hdGUgPSBmYWxzZSxcblx0XHRcdGluZGV4ID0gMCxcbiAgICAgIHRhcmdldCA9IDAsXG4gICAgICBtYXggPSBpdGVtcy5sZW5ndGgsXG4gICAgICBpdGVtID0gaXRlbXMuZXEoaW5kZXgpLFxuICAgICAgaXRlbVcgPSBpdGVtLm91dGVyV2lkdGgoKSxcbiAgICAgIGl0ZW1IID0gMCxcbiAgICAgIG1haW5XID0gaG9sZGVyLm91dGVyV2lkdGgoKSxcbiAgICAgIHNob3dBcnJheSA9IFtdLFxuICAgICAgaXNJbml0ID0gZmFsc2U7XG5cbiAgKCgpID0+IG1heCA+IG1heFNob3cgPyBpbml0KCkgOiBlbC5hZGRDbGFzcyhDTEFTUy5fZGxleCkpKCk7XG5cbiAgdGhpcy51cGRhdGVNYXhTaG93ID0gdmFsID0+IHtcbiAgICBpZiAodmFsID09PSBtYXhTaG93IHx8ICFpc0luaXQpIHJldHVybiBmYWxzZTtcbiAgICBtYXhTaG93ID0gdmFsO1xuICAgIHVwZGF0ZVNob3dBcnJheSgpO1xuICAgIHVwZGF0ZVBhZ2luZygpO1xuICAgIHJlc2V0UG9zKCk7XG4gIH1cblxuICB0aGlzLnJlSW5pdCA9ICgpID0+IGluaXQoKTtcblxuICBmdW5jdGlvbiBpbml0KCkge1xuICAgIGl0ZW1IID0gZ2V0TWF4SCgpO1xuICAgIGhvbGRlci5oZWlnaHQoaXRlbUgpO1xuICAgIFR3ZWVuTWF4LnNldChpdGVtcywgeyBhdXRvQWxwaGE6IDAgfSk7XG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBtYXhTaG93OyBpKyspIHtcbiAgICAgIHNob3dBcnJheVtpXSA9IGk7XG4gICAgICBjdXJyZW50SXRlbSA9IGl0ZW1zLmVxKGkpO1xuICAgICAgVHdlZW5NYXguc2V0KGN1cnJlbnRJdGVtLCB7IGF1dG9BbHBoYTogMSwgeDogaXRlbVcgKiBpIH0pO1xuICAgIH1cbiAgICB1cGRhdGVQYWdpbmcoKTtcbiAgICBpbml0RXZlbnQoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGluaXRFdmVudCgpIHtcbiAgICBBUFAuX2lzTW9iaWxlICYmIGVsLm9uKCdzd2lwZWxlZnQnLCBuZXh0Q2xpY2tlZCkub24oJ3N3aXBlcmlnaHQnLCBwcmV2Q2xpY2tlZCk7XG4gICAgYnRuUHJldi5vbihDTElDSywgcHJldkNsaWNrZWQpO1xuICAgIGJ0bk5leHQub24oQ0xJQ0ssIG5leHRDbGlja2VkKTtcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFNJWkVfQ0hBTkdFRCwgKCkgPT4gcmVzZXRQb3MoKSk7XG4gICAgaXNJbml0ID0gdHJ1ZTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZVNob3dBcnJheSgpIHtcbiAgICBsZXQgY0luZGV4ID0gMDtcbiAgICBzaG93QXJyYXlbMF0gPSBpbmRleDtcbiAgICBpZiAobWF4U2hvdyA+IDEpIGZvciAobGV0IGkgPSAxOyBpIDwgbWF4U2hvdzsgaSsrKSB7XG4gICAgICBjSW5kZXggPSBpbmRleCArIGk7XG4gICAgICBjSW5kZXggPj0gbWF4ICYmIChjSW5kZXggPSBjSW5kZXggJSBtYXgpO1xuICAgICAgc2hvd0FycmF5W2ldID0gY0luZGV4O1xuICAgIH1cbiAgICBjb25zb2xlLmxvZyhzaG93QXJyYXkpO1xuICB9XG5cbiAgZnVuY3Rpb24gcmVzZXRQb3MoKSB7XG4gICAgc2V0SGVpZ2h0KCk7XG4gICAgaXRlbVcgPSBpdGVtLm91dGVyV2lkdGgoKTtcbiAgICBtYWluVyA9IGhvbGRlci5vdXRlcldpZHRoKCk7XG5cbiAgICBmb3IgKGxldCBpID0gMDsgaSA8IG1heFNob3c7IGkrKykge1xuICAgICAgY3VycmVudEl0ZW0gPSBpdGVtcy5lcShzaG93QXJyYXlbaV0pO1xuICAgICAgVHdlZW5NYXguc2V0KGN1cnJlbnRJdGVtLCB7IGF1dG9BbHBoYTogMSwgeDogaXRlbVcgKiBpIH0pO1xuICAgIH1cbiAgICBtYXhTaG93ID49IG1heCA/IGhpZGVCdG4oKSA6IHNob3dCdG4oKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHNldEhlaWdodCgpIHtcbiAgICBob2xkZXIuY3NzKCdoZWlnaHQnLCAnYXV0bycpO1xuICAgIGl0ZW1zLmNzcygnaGVpZ2h0JywgJ2F1dG8nKTtcblxuICAgIGl0ZW1IID0gZ2V0TWF4SCgpO1xuICAgIGhvbGRlci5oZWlnaHQoaXRlbUgpO1xuICAgIGl0ZW1zLmhlaWdodChpdGVtSCk7XG4gIH1cblxuICBmdW5jdGlvbiBoaWRlQnRuKCkge1xuICAgIGJ0bk5leHQuaGlkZSgpO1xuICAgIGJ0blByZXYuaGlkZSgpO1xuICAgIC8vIHBXcmFwLmhpZGUoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHNob3dCdG4oKSB7XG4gICAgYnRuTmV4dC5zaG93KCk7XG4gICAgYnRuUHJldi5zaG93KCk7XG4gICAgLy8gcFdyYXAuaGlkZSgpO1xuICB9XG5cbiAgZnVuY3Rpb24gZ2V0TWF4SCgpIHtcbiAgICBsZXQgaXRlbSA9IHt9LFxuICAgICAgICBtYXhIID0gMDtcblxuICAgIGl0ZW1zLmVhY2goKF8sIGVsKSA9PiB7XG4gICAgICBpdGVtID0gJChlbCk7XG4gICAgICBpdGVtLmhlaWdodCgpID4gbWF4SCAmJiAobWF4SCA9IGl0ZW0uaGVpZ2h0KCkpO1xuICAgIH0pO1xuICAgIHJldHVybiBtYXhIO1xuICB9XG5cbiAgZnVuY3Rpb24gbmV4dENsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBpZiAoaXNBbmltYXRlIHx8ICghaXNMb29wICYmIGluZGV4ID09PSBtYXggLSBtYXhTaG93KSkgcmV0dXJuIGZhbHNlO1xuXHRcdGlzQW5pbWF0ZSA9IHRydWU7XG5cbiAgICB0YXJnZXQgPSBpbmRleCArIG1heFNob3c7XG4gICAgdGFyZ2V0ID49IG1heCAmJiAodGFyZ2V0ID0gdGFyZ2V0ICUgbWF4KTtcblx0XHRnb05leHQoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHByZXZDbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cdFx0aWYgKGlzQW5pbWF0ZSB8fCAoIWlzTG9vcCAmJiBpbmRleCA9PT0gMCkpIHJldHVybiBmYWxzZTtcblx0XHRpc0FuaW1hdGUgPSB0cnVlO1xuXG5cdFx0dGFyZ2V0ID0gKGluZGV4ID09PSAwID8gbWF4IDogaW5kZXgpIC0gMTtcblx0XHRnb1ByZXYoKTtcblx0fVxuXG5cdGZ1bmN0aW9uIGdvUHJldigpIHtcbiAgICBsZXQgZGVsYXkgPSAwLFxuICAgICAgICBjSW5kZXggPSAwO1xuXG4gICAgcGFnaW5nLnByZXYoKTtcbiAgICB0YXJnZXRJdGVtID0gaXRlbXMuZXEodGFyZ2V0KTtcbiAgICBmb3IgKGxldCBpID0gMDsgaSA8IG1heFNob3c7IGkrKykge1xuICAgICAgY0luZGV4ID0gaW5kZXggKyBpO1xuICAgICAgY0luZGV4ID49IG1heCAmJiAoY0luZGV4ID0gY0luZGV4ICUgbWF4KTtcbiAgICAgIGN1cnJlbnRJdGVtID0gaXRlbXMuZXEoY0luZGV4KTtcblxuICAgICAgVHdlZW5NYXgudG8oY3VycmVudEl0ZW0sIDEsIHtcbiAgICAgICAgZGVsYXk6IGRlbGF5LFxuICAgICAgICB4OiBpdGVtVyAqIChpICsgMSksXG4gICAgICAgIGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuICAgICAgICBmb3JjZTNEOiB0cnVlXG4gICAgICB9KTtcbiAgICB9XG5cblx0XHRUd2Vlbk1heC5zZXQodGFyZ2V0SXRlbSwgeyBhdXRvQWxwaGE6IDEsIHg6IC1pdGVtVyB9KTtcbiAgICBUd2Vlbk1heC50byh0YXJnZXRJdGVtLCAxLCB7XG4gICAgICBkZWxheTogZGVsYXksXG4gICAgICB4OiAwLFxuXHRcdFx0ZWFzZTogRXhwby5lYXNlSW5PdXQsXG5cdFx0XHRmb3JjZTNEOiB0cnVlLFxuXHRcdFx0b25Db21wbGV0ZTogcHJldkNvbXBsZXRlXG5cdFx0fSk7XG5cdH1cblxuXHRmdW5jdGlvbiBnb05leHQoKSB7XG4gICAgbGV0IGRlbGF5ID0gMCxcbiAgICAgICAgY0luZGV4ID0gMDtcblxuICAgIHBhZ2luZy5uZXh0KCk7XG4gICAgdGFyZ2V0SXRlbSA9IGl0ZW1zLmVxKHRhcmdldCk7XG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBtYXhTaG93OyBpKyspIHtcbiAgICAgIGNJbmRleCA9IGluZGV4ICsgaTtcbiAgICAgIGNJbmRleCA+PSBtYXggJiYgKGNJbmRleCA9IGNJbmRleCAlIG1heCk7XG4gICAgICBjdXJyZW50SXRlbSA9IGl0ZW1zLmVxKGNJbmRleCk7XG5cbiAgICAgIFR3ZWVuTWF4LnRvKGN1cnJlbnRJdGVtLCAxLCB7XG4gICAgICAgIGRlbGF5OiBkZWxheSxcbiAgICAgICAgeDogaXRlbVcgKiAoaSAtIDEpLFxuICAgICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcbiAgICAgICAgZm9yY2UzRDogdHJ1ZVxuICAgICAgfSk7XG4gICAgfVxuXG5cdFx0VHdlZW5NYXguc2V0KHRhcmdldEl0ZW0sIHsgYXV0b0FscGhhOiAxLCB4OiBtYWluVyB9KTtcbiAgICBUd2Vlbk1heC50byh0YXJnZXRJdGVtLCAxLCB7XG5cdFx0XHRkZWxheTogZGVsYXksXG4gICAgICB4OiBtYWluVyAtIGl0ZW1XLFxuICAgICAgZWFzZTogRXhwby5lYXNlSW5PdXQsXG5cdFx0XHRmb3JjZTNEOiB0cnVlLFxuXHRcdFx0b25Db21wbGV0ZTogbmV4dENvbXBsZXRlXG5cdFx0fSk7XG4gIH1cblxuICBmdW5jdGlvbiBwcmV2Q29tcGxldGUoKSB7XG4gICAgaW5kZXggPSAoaW5kZXggPCAxID8gbWF4IDogaW5kZXgpIC0gMTtcbiAgICBoaWRlT3V0SXRlbSgpO1xuICB9XG5cbiAgZnVuY3Rpb24gbmV4dENvbXBsZXRlKCkge1xuICAgIGluZGV4ID0gaW5kZXggPCBtYXggLSAxID8gKGluZGV4ICsgMSkgOiAwO1xuICAgIGhpZGVPdXRJdGVtKCk7XG4gIH1cblxuICBmdW5jdGlvbiBoaWRlT3V0SXRlbSgpIHtcbiAgICBsZXQgaXRlbSA9IHt9LFxuICAgICAgICBjdXJyZW50SW5kZXggPSAwO1xuXG4gICAgdXBkYXRlU2hvd0FycmF5KCk7XG4gICAgaXRlbXMuZWFjaCgoXywgZWwpID0+IFR3ZWVuTWF4LnNldChlbCwgeyBhdXRvQWxwaGE6IDAgfSkpO1xuXG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBtYXhTaG93OyBpKyspIHtcbiAgICAgIGN1cnJlbnRJbmRleCA9IHNob3dBcnJheVtpXTtcbiAgICAgIGl0ZW0gPSBpdGVtcy5lcShjdXJyZW50SW5kZXgpO1xuICAgICAgVHdlZW5NYXguc2V0KGl0ZW0sIHsgYXV0b0FscGhhOiAxIH0pO1xuICAgIH1cbiAgICBpc0FuaW1hdGUgPSBmYWxzZTtcbiAgICB1cGRhdGVQYWdpbmcoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZVBhZ2luZygpIHtcbiAgICBwYWdpbmcucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBtYXhTaG93OyBpKyspIHBhZ2luZy5lcShzaG93QXJyYXlbaV0pLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIChwYWdpbmcubGVuZ3RoID09PSBtYXhTaG93KSA/IHBXcmFwLmhpZGUoKSA6IHBXcmFwLnNob3coKTtcbiAgfVxuXG5cdHJldHVybiB0aGlzO1xufTsiLCIvKioqKiogRXF1YWwgSGVpZ2h0ICoqKioqL1xubGV0IEVxdWFsSGVpZ2h0ID0gZnVuY3Rpb24oZWxlbWVudCwgYXV0b0JyZWFrKSB7XG5cbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIGl0ZW1IID0gMCxcbiAgICAgIGlzRGlydHkgPSBmYWxzZTtcblxuICAoKCkgPT4gaW5pdCgpKSgpO1xuICBmdW5jdGlvbiBpbml0KCkge1xuICAgIHNldEhlaWdodCgpO1xuICAgIGluaXRFdmVudCgpO1xuICB9XG5cbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCAoKSA9PiBzZXRIZWlnaHQoKSk7XG4gIH1cblxuICBmdW5jdGlvbiBzZXRIZWlnaHQoKSB7XG4gICAgaWYgKEFQUC5fVyA8PSBhdXRvQnJlYWspIHtcbiAgICAgIGlzRGlydHkgJiYgKGVsLmNzcygnaGVpZ2h0JywgJ2F1dG8nKSwgaXNEaXJ0eSA9IGZhbHNlKTtcbiAgICAgIHJldHVybiB0cnVlO1xuICAgIH1cblxuICAgIGVsLmNzcygnaGVpZ2h0JywgJ2F1dG8nKTtcbiAgICBpdGVtSCA9IGdldE1heEgoKTtcbiAgICBlbC5oZWlnaHQoaXRlbUgpO1xuICAgIGlzRGlydHkgPSB0cnVlO1xuICB9XG5cbiAgZnVuY3Rpb24gZ2V0TWF4SCgpIHtcbiAgICBsZXQgaXRlbSA9IHt9LFxuICAgICAgICBtYXhIID0gMDtcblxuICAgIGVsLmVhY2goKF8sIGUpID0+IHtcbiAgICAgIGl0ZW0gPSAkKGUpO1xuICAgICAgaXRlbS5oZWlnaHQoKSA+IG1heEggJiYgKG1heEggPSBpdGVtLmhlaWdodCgpKTtcbiAgICB9KTtcbiAgICByZXR1cm4gbWF4SDtcbiAgfVxuXG5cdHJldHVybiB0aGlzO1xufTsiLCJsZXQgUG9wdXBBbGVydCA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIGNvbnRlbnRUaXRsZSA9IGVsLmZpbmQoJy50aXRsZScpLFxuICAgICAgY29udGVudERlc2MgPSBlbC5maW5kKCcuZGVzYycpLFxuICAgICAgb3ZlcmxheSA9IGVsLmZpbmQoJy5vdmVybGF5JyksXG4gICAgICBidG5DbG9zZSA9IGVsLmZpbmQoJy5idG4tY2xvc2UnKTtcblxuICB0aGlzLnVwZGF0ZSA9ICh0aXRsZSwgZGVzYykgPT4ge1xuICAgIHRpdGxlLmxlbmd0aCA+IDAgJiYgY29udGVudFRpdGxlLnRleHQodGl0bGUpO1xuICAgIGRlc2MubGVuZ3RoID4gMCAmJiBjb250ZW50RGVzYy50ZXh0KGRlc2MpO1xuICB9XG5cbiAgdGhpcy5zaG93ID0gKCkgPT4ge1xuICAgIGVsLmZhZGVJbigpO1xuICAgIEFQUC5faXNPdmxBY3RpdmUgPSB0cnVlO1xuICAgIEFQUC5faHRtbC5hZGRDbGFzcyhDTEFTUy5fb3ZsQWN0aXZlKTtcbiAgfVxuXG4gIHRoaXMuaGlkZSA9ICgpID0+IHtcbiAgICBlbC5mYWRlT3V0KCk7XG4gICAgQVBQLl9pc092bEFjdGl2ZSA9IGZhbHNlO1xuICAgIEFQUC5faHRtbC5yZW1vdmVDbGFzcyhDTEFTUy5fb3ZsQWN0aXZlKTtcbiAgfVxuXG4gICgoKSA9PiBpbml0RXZlbnQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIG92ZXJsYXkub24oJ2NsaWNrJywgY2xvc2UpO1xuICAgIGJ0bkNsb3NlLm9uKCdjbGljaycsIGNsb3NlKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGNsb3NlKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgZWwuZmFkZU91dCgpO1xuICAgIEFQUC5faXNPdmxBY3RpdmUgPSBmYWxzZTtcbiAgICBBUFAuX2h0bWwucmVtb3ZlQ2xhc3MoQ0xBU1MuX292bEFjdGl2ZSk7XG4gIH1cblxuICByZXR1cm4gdGhpcztcbn07XG5cbmxldCBQb3B1cExvYWRpbmcgPSBmdW5jdGlvbihlbGVtZW50KSB7XG4gIGxldCBlbCA9ICQoZWxlbWVudCk7XG5cbiAgdGhpcy5zaG93ID0gKCkgPT4ge1xuICAgIGVsLmZhZGVJbigpO1xuICAgIEFQUC5faXNPdmxBY3RpdmUgPSB0cnVlO1xuICAgIEFQUC5faHRtbC5hZGRDbGFzcyhDTEFTUy5fb3ZsQWN0aXZlKTtcbiAgfVxuXG4gIHRoaXMuaGlkZSA9ICgpID0+IHtcbiAgICBlbC5mYWRlT3V0KCk7XG4gICAgQVBQLl9pc092bEFjdGl2ZSA9IGZhbHNlO1xuICAgIEFQUC5faHRtbC5yZW1vdmVDbGFzcyhDTEFTUy5fb3ZsQWN0aXZlKTtcbiAgfVxuXG4gICgoKSA9PiBpbml0RXZlbnQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge31cblxuICByZXR1cm4gdGhpcztcbn07IiwibGV0IFNsaWRlciA9IGZ1bmN0aW9uKGVsZW1lbnQsIGlUaW1lLCBlTmFtZSkge1xuXG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBob2xkZXIgPSBlbC5maW5kKCcuaXRlbS13cmFwJyksXG4gICAgICBpdGVtcyA9IGhvbGRlci5maW5kKCcuaXRlbScpLFxuICAgICAgcGFnaW5ncyA9IGVsLmZpbmQoJy5wYWdpbmcgbGknKSxcbiAgICAgIGJ0blByZXYgPSBlbC5maW5kKCcuYnRuLXByZXYnKSxcbiAgICAgIGJ0bk5leHQgPSBlbC5maW5kKCcuYnRuLW5leHQnKSxcblx0XHRcdGN1cnJlbnRJdGVtID0ge30sXG4gICAgICB0YXJnZXRJdGVtID0ge30sXG5cdFx0XHRpc0FuaW1hdGUgPSBmYWxzZSxcblx0XHRcdGluZGV4ID0gMCxcblx0XHRcdHRhcmdldCA9IDAsXG5cdFx0XHRtYXggPSBpdGVtcy5sZW5ndGgsXG4gICAgICBtYWluVyA9IGVsLndpZHRoKCksXG4gICAgICBpc0hvdmVyID0gZmFsc2UsXG4gICAgICBpbnRlcnZhbCA9IHt9LFxuICAgICAgdXBkYXRlRXZlbnQgPSB7fTtcblxuICAoKCkgPT4gbWF4IDwgMiA/IChwYWdpbmdzLmhpZGUoKSwgYnRuUHJldi5oaWRlKCksIGJ0bk5leHQuaGlkZSgpKSA6IChcbiAgICBUd2Vlbk1heC5zZXQoaXRlbXMsIHsgYXV0b0FscGhhOiAwfSksXG4gICAgVHdlZW5NYXguc2V0KGl0ZW1zLmVxKGluZGV4KSwgeyBhdXRvQWxwaGE6IDF9KSxcbiAgICBhdXRvUGxheSgpLFxuICAgIGluaXRFdmVudCgpXG4gICkpKCk7XG5cbiAgdGhpcy5zaG93ID0gaSA9PiAoaSAhPSBpbmRleCkgJiYgKFxuICAgIHRhcmdldCA9IGksXG4gICAgdXBkYXRlUGFnaW5nKCksXG4gICAgVHdlZW5NYXguc2V0KGl0ZW1zLmVxKGluZGV4KSwgeyBhdXRvQWxwaGE6IDAsIHg6IC1tYWluVyB9KSxcbiAgICBUd2Vlbk1heC5zZXQoaXRlbXMuZXEodGFyZ2V0KSwgeyBhdXRvQWxwaGE6IDEsIHg6IDAgfSksXG4gICAgaW5kZXggPSB0YXJnZXQsXG4gICAgYXV0b1BsYXkoKVxuICApO1xuXG4gIHRoaXMuZ29UbyA9IGkgPT4gZ29UbyhpKTtcbiAgdGhpcy5nZXRBbmltYXRpb25TdGF0ZSA9ICgpID0+IGlzQW5pbWF0ZTtcbiAgdGhpcy5nZXRJdGVtSGVpZ2h0ID0gKCkgPT4ge1xuICAgIGxldCBtYXggPSAwLFxuICAgICAgICBoID0gMDtcblxuICAgIGl0ZW1zLmVhY2goZnVuY3Rpb24oKSB7XG4gICAgICBoID0gJCh0aGlzKS5oZWlnaHQoKTtcbiAgICAgIG1heCA9IChoID4gbWF4KSA/IGggOiBtYXg7XG4gICAgfSk7XG4gICAgcmV0dXJuIG1heDtcbiAgfVxuXG4gIGZ1bmN0aW9uIGF1dG9QbGF5KCkge1xuXHRcdCFpc0hvdmVyICYmIGlUaW1lID4gMCAmJiAgKGNsZWFySW50ZXJ2YWwoaW50ZXJ2YWwpLCBpbnRlcnZhbCA9IHNldEludGVydmFsKCgpID0+IGdvTmV4dCgpLCBpVGltZSkpO1xuXHR9XG5cbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIEFQUC5faXNNb2JpbGUgPyBob2xkZXIub24oJ3N3aXBlbGVmdCcsIG5leHRDbGlja2VkKS5vbignc3dpcGVyaWdodCcsIHByZXZDbGlja2VkKSA6IGlUaW1lID4gMCAmJiBob2xkZXIub24oJ21vdXNlb3ZlcicsIG1vdXNlT3Zlcikub24oJ21vdXNlb3V0JywgbW91c2VPdXQpO1xuICAgIGJ0blByZXYub24oQ0xJQ0ssIHByZXZDbGlja2VkKTtcbiAgICBidG5OZXh0Lm9uKENMSUNLLCBuZXh0Q2xpY2tlZCk7XG4gICAgcGFnaW5ncy5vbihDTElDSywgbmF2Q2xpY2tlZCk7XG4gICAgZU5hbWUgJiYgKHVwZGF0ZUV2ZW50ID0gbmV3IEN1c3RvbUV2ZW50KGVOYW1lLCB7IGJ1YmJsZXM6IHRydWUsIGRldGFpbDogeyB0YXJnZXQ6IDAgfSB9KSk7XG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihTSVpFX0NIQU5HRUQsICgpID0+IG1haW5XID0gZWwud2lkdGgoKSk7XG4gIH1cblxuICBmdW5jdGlvbiBtb3VzZU92ZXIoKSB7XG4gICAgaXNIb3ZlciB8fCAoY2xlYXJJbnRlcnZhbChpbnRlcnZhbCksIGlzSG92ZXIgPSB0cnVlKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIG1vdXNlT3V0KCkge1xuICAgIGlzSG92ZXIgJiYgKGlzSG92ZXIgPSBmYWxzZSwgYXV0b1BsYXkoKSk7XG4gIH1cblxuICBmdW5jdGlvbiBjaGVja01haW5XKCkge1xuICAgIG1haW5XIDw9IDAgJiYgKG1haW5XID0gZWwud2lkdGgoKSk7XG4gIH1cblxuICBmdW5jdGlvbiBwcmV2Q2xpY2tlZChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIGlmIChpc0FuaW1hdGUpIHJldHVybiBmYWxzZTtcbiAgICBjaGVja01haW5XKCk7XG4gICAgZ29QcmV2KCk7XG4gIH1cblxuICBmdW5jdGlvbiBuZXh0Q2xpY2tlZChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIGlmIChpc0FuaW1hdGUpIHJldHVybiBmYWxzZTtcbiAgICBjaGVja01haW5XKClcbiAgICBnb05leHQoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIG5hdkNsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBsZXQgaXRlbSA9ICQodGhpcyksXG4gICAgICAgIHRhcmdldEluZGV4ID0gMDtcblxuICAgIGlmIChpc0FuaW1hdGUgfHwgaXRlbS5oYXNDbGFzcyhDTEFTUy5fYWN0aXZlKSkgcmV0dXJuIGZhbHNlO1xuICAgIGNoZWNrTWFpblcoKTtcbiAgICB0YXJnZXRJbmRleCA9IHBhcnNlSW50KGl0ZW0uZGF0YSgnaW5kZXgnKSk7XG4gICAgZ29Ubyh0YXJnZXRJbmRleCk7XG4gIH1cblxuICBmdW5jdGlvbiBnb1RvKHRhcmdldEluZGV4KSB7XG4gICAgaXNBbmltYXRlID0gdHJ1ZTtcbiAgICB0YXJnZXQgPSB0YXJnZXRJbmRleDtcblx0XHRpbmRleCA8IHRhcmdldEluZGV4ID8gZ29Ub05leHQoKSA6IGdvVG9QcmV2KCk7XG4gIH1cblxuICBmdW5jdGlvbiBnb1ByZXYoKSB7XG4gICAgaXNBbmltYXRlID0gdHJ1ZTtcblx0XHR0YXJnZXQgPSBpbmRleCAtIDE7XG5cdFx0dGFyZ2V0IDwgMCAmJiAodGFyZ2V0ID0gbWF4IC0gMSk7XG5cdFx0Z29Ub1ByZXYoKTtcblx0fVxuXG4gIGZ1bmN0aW9uIGdvTmV4dCgpIHtcbiAgICBpc0FuaW1hdGUgPSB0cnVlO1xuXHRcdHRhcmdldCA9IGluZGV4ICsgMTtcblx0XHR0YXJnZXQgPT09IG1heCAmJiAodGFyZ2V0ID0gMCk7XG5cdFx0Z29Ub05leHQoKTtcblx0fVxuXG5cdGZ1bmN0aW9uIGdvVG9QcmV2KCkge1xuICAgIHVwZGF0ZVBhZ2luZygpO1xuXHRcdGN1cnJlbnRJdGVtID0gaXRlbXMuZXEoaW5kZXgpO1xuXHRcdHRhcmdldEl0ZW0gPSBpdGVtcy5lcSh0YXJnZXQpO1xuXG5cdFx0VHdlZW5NYXguc2V0KHRhcmdldEl0ZW0sIHsgYXV0b0FscGhhOiAxLCB4OiAtbWFpblcgfSk7XG4gICAgVHdlZW5NYXgudG8odGFyZ2V0SXRlbSwgMSwge1xuICAgICAgeDogMCxcblx0XHRcdGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZSxcblx0XHRcdG9uQ29tcGxldGU6IGFuaW1hdGVkRG9uZVxuXHRcdH0pO1xuXG5cdFx0VHdlZW5NYXgudG8oY3VycmVudEl0ZW0sIDEsIHtcbiAgICAgIHg6IG1haW5XLFxuXHRcdFx0ZWFzZTogRXhwby5lYXNlSW5PdXQsXG5cdFx0XHRmb3JjZTNEOiB0cnVlXG5cdFx0fSk7XG5cdH1cblxuXHRmdW5jdGlvbiBnb1RvTmV4dCgpIHtcbiAgICB1cGRhdGVQYWdpbmcoKTtcblx0XHRjdXJyZW50SXRlbSA9IGl0ZW1zLmVxKGluZGV4KTtcblx0XHR0YXJnZXRJdGVtID0gaXRlbXMuZXEodGFyZ2V0KTtcblxuXHRcdFR3ZWVuTWF4LnNldCh0YXJnZXRJdGVtLCB7IGF1dG9BbHBoYTogMSwgeDogbWFpblcgfSk7XG4gICAgVHdlZW5NYXgudG8odGFyZ2V0SXRlbSwgMSwge1xuICAgICAgeDogMCxcbiAgICAgIGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZSxcblx0XHRcdG9uQ29tcGxldGU6IGFuaW1hdGVkRG9uZVxuXHRcdH0pO1xuXG5cdFx0VHdlZW5NYXgudG8oY3VycmVudEl0ZW0sIDEsIHtcbiAgICAgIHg6IC1tYWluVyxcblx0XHRcdGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZVxuXHRcdH0pO1xuXHR9XG5cblx0ZnVuY3Rpb24gYW5pbWF0ZWREb25lKCkge1xuICAgIGlzQW5pbWF0ZSA9IGZhbHNlO1xuICAgIFR3ZWVuTWF4LnNldChjdXJyZW50SXRlbSwgeyBhdXRvQWxwaGE6IDAgfSk7XG4gICAgdXBkYXRlUGFnaW5nKCk7XG4gICAgaW5kZXggPSB0YXJnZXQ7XG4gICAgYXV0b1BsYXkoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZVBhZ2luZygpIHtcbiAgICBwYWdpbmdzLmVxKGluZGV4KS5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBwYWdpbmdzLmVxKHRhcmdldCkuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgZU5hbWUgJiYgKHVwZGF0ZUV2ZW50LmRldGFpbC50YXJnZXQgPSB0YXJnZXQsIGRvY3VtZW50LmRpc3BhdGNoRXZlbnQodXBkYXRlRXZlbnQpKTtcbiAgfVxuXG5cdHJldHVybiB0aGlzO1xufTsiLCIvKioqKiogVmlkZW8gU2VjdGlvbiAqKioqKi9cbmxldCBWaWRlb1NlY3Rpb24gPSBmdW5jdGlvbihlbGVtZW50KSB7XG5cbiAgbGV0IGVsID0gZWxlbWVudCxcbiAgICAgIHdyYXAgPSBlbC5xdWVyeVNlbGVjdG9yKCcudmlkLXdyYXAnKSxcbiAgICAgIHZpZCA9IHdyYXAucXVlcnlTZWxlY3RvcigndmlkZW8nKTtcblxuXG4gICgoKSA9PiBpbml0KCkpKCk7XG4gIGZ1bmN0aW9uIGluaXQoKSB7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgd3JhcC5hZGRFdmVudExpc3RlbmVyKENMSUNLLCB3cmFwQ2xpY2tlZCk7XG4gIH1cblxuICBmdW5jdGlvbiB3cmFwQ2xpY2tlZChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIHdyYXAuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTLl9hY3RpdmUpID8gd3JhcC5jbGFzc0xpc3QucmVtb3ZlKENMQVNTLl9hY3RpdmUpIDogd3JhcC5jbGFzc0xpc3QuYWRkKENMQVNTLl9hY3RpdmUpO1xuICAgIHZpZC5wYXVzZWQgPyB2aWQucGxheSgpIDogdmlkLnBhdXNlKCk7XG4gIH1cblxuXHRyZXR1cm4gdGhpcztcbn07IiwiQVBQLmZvb3RlciA9IHtcbiAgX2VsOiB7fSxcblxuICBpbml0OiBmdW5jdGlvbigpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gICAgc2VsZi5fZWwgPSAkKCcubWFpbi1mb290ZXInKTtcbiAgfVxufTtcbiIsIkFQUC5oZWFkZXJNYiA9IHtcbiAgX2VsOiB7fSxcbiAgX3N1Ykxpbms6IHt9LFxuICBfc3ViSWNvbjoge30sXG4gIF9vdmw6IHt9LFxuXG4gIGluaXQ6IGZ1bmN0aW9uKCkge1xuICAgIHZhciBzZWxmID0gdGhpcztcbiAgICBzZWxmLl9lbCA9ICQoJyNtYi1oZWFkZXInKTtcbiAgICBzZWxmLl9vdmwgPSAkKCcjbWItb3ZlcmxheScpO1xuICAgIHNlbGYuX3N1YkxpbmsgPSBzZWxmLl9lbC5maW5kKCcuaGFzLXN1YicpO1xuICAgIHNlbGYuX3N1Ykljb24gPSBzZWxmLl9lbC5maW5kKCcuaWNvbi1zdWInKTtcblxuICAgIHNlbGYuaW5pdEV2ZW50KCk7XG4gICAgVHdlZW5NYXguc2V0KHNlbGYuX2VsLCB7IHg6IC1BUFAuX1cgfSk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50OiBmdW5jdGlvbigpIHtcbiAgICB2YXIgc2VsZiA9IHRoaXM7XG4gICAgLy8gc2VsZi5fb3ZsLm9uKCdjbGljaycsICgpID0+IEFQUC5oZWFkZXIuX2J0bk1iLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpICYmIEFQUC5oZWFkZXIuX2J0bk1iLnRyaWdnZXIoJ2NsaWNrJykpO1xuICAgIC8vIHNlbGYuX292bC5vbignc2Nyb2xsJywgKGUpID0+IHtcbiAgICAvLyAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAvLyAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG4gICAgLy8gfSk7XG5cbiAgICBzZWxmLl9zdWJJY29uLm9uKENMSUNLLCBzZWxmLnRvZ2dlbFN1Yk1lbnUpO1xuICB9LFxuXG4gIHRvZ2dlbFN1Yk1lbnU6IGZ1bmN0aW9uKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgbGV0IGl0ZW0gPSAkKHRoaXMpLFxuICAgICAgICB0b3BJdGVtID0gaXRlbS5jbG9zZXN0KCcudG9wLWl0ZW0nKTtcblxuICAgIHRvcEl0ZW0uaGFzQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkgPyB0b3BJdGVtLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpIDogKEFQUC5oZWFkZXJNYi5jbG9zZVN1Yk1lbnUoKSwgdG9wSXRlbS5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKSk7XG4gIH0sXG5cbiAgY2xvc2VTdWJNZW51OiBmdW5jdGlvbigpIHtcbiAgICBsZXQgc2VsZiA9IEFQUC5oZWFkZXJNYjtcbiAgICBzZWxmLl9zdWJMaW5rLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuICB9LFxuXG4gIHNob3c6IGZ1bmN0aW9uKCkge1xuICAgIHZhciBzZWxmID0gdGhpcztcbiAgICBzZWxmLl9lbC5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBzZWxmLl9vdmwuZmFkZUluKCk7XG4gICAgVHdlZW5NYXguc2V0KHNlbGYuX2VsLCB7XG4gICAgICBkaXNwbGF5OiAnYmxvY2snLFxuICAgICAgb25Db21wbGV0ZTogKCkgPT4gKEFQUC5faHRtbC5hZGRDbGFzcyhDTEFTUy5fbWVudUFjdGl2ZSksIFR3ZWVuTWF4LnRvKHNlbGYuX2VsLCAwLjUsIHsgeDogMCB9KSlcbiAgICB9KTtcbiAgfSxcblxuICBoaWRlOiBmdW5jdGlvbigpIHtcbiAgICB2YXIgc2VsZiA9IHRoaXM7XG4gICAgQVBQLl9ib2R5LmF0dHIoJ3N0eWxlJywgJycpLnJlbW92ZUNsYXNzKENMQVNTLl9vdmxBY3RpdmUpO1xuICAgIHNlbGYuX2VsLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIHNlbGYuX292bC5mYWRlT3V0KCk7XG4gICAgVHdlZW5NYXgudG8oc2VsZi5fZWwsIDAuNSwge1xuICAgICAgeDogLUFQUC5fVyxcbiAgICAgIG9uQ29tcGxldGU6ICgpID0+IChBUFAuX2h0bWwucmVtb3ZlQ2xhc3MoQ0xBU1MuX21lbnVBY3RpdmUpLCBUd2Vlbk1heC5zZXQoc2VsZi5fZWwsIHsgZGlzcGxheTogJ25vbmUnIH0pKVxuICAgIH0pO1xuICB9XG59OyIsIkFQUC5oZWFkZXIgPSB7XG4gIF9lbDoge30sXG4gIF9idG5NYjoge30sXG5cbiAgaW5pdDogZnVuY3Rpb24oKSB7XG4gICAgbGV0IHNlbGYgPSB0aGlzO1xuICAgIHNlbGYuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI21haW4taGVhZGVyJyk7XG4gICAgc2VsZi5fYnRuTWIgPSBzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcuYnRuLW1iJyk7XG4gICAgc2VsZi5pbml0RXZlbnQoKTtcbiAgICBBUFAuaGVhZGVyTWIuaW5pdCgpO1xuICB9LFxuXG4gIGluaXRFdmVudDogZnVuY3Rpb24oKSB7XG4gICAgbGV0IHNlbGYgPSB0aGlzO1xuICAgIHNlbGYuX2J0bk1iLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIHNlbGYuYnRuTWJDbGlja2VkKTtcbiAgfSxcblxuICBidG5NYkNsaWNrZWQ6IGZ1bmN0aW9uKGUpIHtcbiAgICBsZXQgaXRlbSA9IHRoaXM7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIGl0ZW0uY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTLl9hY3RpdmUpID8gKGl0ZW0uY2xhc3NMaXN0LnJlbW92ZShDTEFTUy5fYWN0aXZlKSwgQVBQLmhlYWRlck1iLmhpZGUoKSkgOiAoaXRlbS5jbGFzc0xpc3QuYWRkKENMQVNTLl9hY3RpdmUpLCBBUFAuaGVhZGVyTWIuc2hvdygpKTtcbiAgfVxufTsiLCJBUFAucG9wdXAgPSB7XG4gIF9hbGVydDoge30sXG4gIF9sb2FkaW5nOiB7fSxcbiAgX2lzT3BlbjogZmFsc2UsXG5cbiAgaW5pdDogZnVuY3Rpb24oKSB7XG4gICAgbGV0IHNlbGYgPSB0aGlzO1xuICAgIC8vIHNlbGYuX2FsZXJ0ID0gbmV3IFBvcHVwQWxlcnQoJyNwb3B1cC1hbGVydCcpO1xuICAgIHNlbGYuX2xvYWRpbmcgPSBuZXcgUG9wdXBMb2FkaW5nKCcjcG9wdXAtbG9hZGluZycpO1xuICB9XG59OyIsIi8qKioqKiBTaWdudXAgUG9wdXAgJiBGb3JtICoqKioqL1xubGV0IFNpZ25VcFBvcHVwID0gZnVuY3Rpb24oZWxlbWVudCkge1xuXG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBhc2lkZVdyYXAgPSBlbC5maW5kKCcuYXNpZGUnKSxcbiAgICAgIHF1ZXN0TGlzdCA9IGVsLmZpbmQoJy5xdWVzdC1saXN0JyksXG4gICAgICBhamF4VVJMID0gcXVlc3RMaXN0LmRhdGEoJ3VybCcpLFxuXG4gICAgICBudW1TbGlkZXIgPSBuZXcgU2xpZGVyKGVsLmZpbmQoJy5hc2lkZS1zbGlkZXInKSksXG4gICAgICBxdWVzdGlvbnMgPSBlbC5maW5kKCcucXVlc3Qtd3JhcCA+IC5pdGVtJyksXG4gICAgICBjdXJyZW50UXVlc3Rpb24gPSB7fSxcbiAgICAgIGN1cnJlbnRJbmRleCA9IDAsXG4gICAgICB0b3RhbFF1ZXN0ID0gMCxcbiAgICAgIGVEb25lID0gJ1FVRVNUSU9OX0FOSU1BVElPTl9ET05FJyxcbiAgICAgIGVOZXh0ID0gJ1FVRVNUSU9OX0FOSU1BVElPTl9ORVhUJyxcbiAgICAgIHF1ZXN0QXJyYXkgPSBbXSxcblxuICAgICAgcHJvV3JhcCA9IGVsLmZpbmQoJy5wcm9ncmVzcy1jdHInKSxcbiAgICAgIHByb0JhciA9IHByb1dyYXAuZmluZCgnaScpLFxuICAgICAgcHJvTnVtID0gcHJvV3JhcC5maW5kKCcucHJvZ3Jlc3MtbnVtJyksXG4gICAgICBidG5QcmV2UXVlc3QgPSBwcm9XcmFwLmZpbmQoJy5idG4tcHJldicpLFxuICAgICAgYnRuTmV4dFF1ZXN0ID0gcHJvV3JhcC5maW5kKCcuYnRuLW5leHQnKSxcblxuICAgICAgd2VsU2NyID0gZWwuZmluZCgnLndlbC1zY3InKSxcbiAgICAgIGJ0bldlbCA9IHdlbFNjci5maW5kKCcuY3RhJyksXG4gICAgICB3ZWxBY3RpdmUgPSBmYWxzZSxcblxuICAgICAgZmluU2NyID0gZWwuZmluZCgnLmZpbi1zY3InKSxcbiAgICAgIGJ0bkZpbiA9IGZpblNjci5maW5kKCcuY3RhJyksXG4gICAgICBmaW5BY3RpdmUgPSBmYWxzZSxcblxuICAgICAgc29jaWFsQ2h4ID0gZWwuZmluZCgnLmpzLXNvY2lhbC1jaHgnKTs7XG5cblxuICAoKCkgPT4gaW5pdCgpKSgpO1xuICBmdW5jdGlvbiBpbml0KCkge1xuICAgIGluaXRRdWVzdCgpO1xuICAgIGluaXRTY3IoKTtcblxuICB9XG4gIHRoaXMuc2hvdyA9ICgpID0+IHNob3dGb3JtKCk7XG4gIHRoaXMuaGlkZSA9ICgpID0+IGhpZGVGb3JtKCk7XG5cbiAgZnVuY3Rpb24gaW5pdFF1ZXN0KCkge1xuICAgIHF1ZXN0aW9ucy5lYWNoKChpLCBlKSA9PiBxdWVzdEFycmF5W2ldID0gbmV3IFNpZ25VcFF1ZXN0aW9uKGUsIGVOZXh0LCBlRG9uZSkpO1xuICAgIGN1cnJlbnRRdWVzdGlvbiA9IHF1ZXN0QXJyYXlbY3VycmVudEluZGV4XTtcbiAgICBjdXJyZW50UXVlc3Rpb24uZ29JblZpZXcoKTtcbiAgICB0b3RhbFF1ZXN0ID0gcXVlc3RBcnJheS5sZW5ndGg7XG4gICAgLy8gdG90YWxRdWVzdCA9IDM7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0U2NyKCkge1xuICAgIFR3ZWVuTWF4LnNldChlbCwge1xuICAgICAgc2NhbGU6IDAuNzUsXG4gICAgICBhdXRvQWxwaGE6IDBcblx0XHR9KTtcblxuICAgIGZpblNjci5oaWRlKCkuZmluZCgnLmJhbm5lciA+IConKS5lYWNoKChfLCBlKSA9PiBUd2Vlbk1heC5zZXQoZSwge1xuICAgICAgeTogLTUwLFxuICAgICAgYXV0b0FscGhhOiAwXG5cdFx0fSkpO1xuXG4gICAgVHdlZW5NYXguc2V0KGFzaWRlV3JhcCwgeyB4OiAtYXNpZGVXcmFwLndpZHRoKCkgfSk7XG4gICAgVHdlZW5NYXguc2V0KHF1ZXN0TGlzdCwgeyB4OiBBUFAuX1cgfSk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgYnRuV2VsLm9uKENMSUNLLCBlbnRlclF1ZXN0KTtcbiAgICBidG5GaW4ub24oQ0xJQ0ssIGhpZGVGb3JtKTtcbiAgICBidG5QcmV2UXVlc3Qub24oQ0xJQ0ssIGJ0blByZXZRdWVzdENsaWNrZWQpO1xuICAgIGJ0bk5leHRRdWVzdC5vbihDTElDSywgYnRuTmV4dFF1ZXN0Q2xpY2tlZCk7XG4gICAgc29jaWFsQ2h4Lm9uKENIQU5HRSwgdXBkYXRlU29jaWFsSW5wdXQpO1xuXG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihLRVlET1dOLCBjaGVja0VudGVyS2V5KTtcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKGVOZXh0LCBlID0+IHJlcXVlc3ROZXh0UXVlc3QoZS5kZXRhaWwudGFyZ2V0KSk7XG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihlRG9uZSwgZSA9PiBnb05leHRRdWVzdChlLmRldGFpbC50YXJnZXQpKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGNhbmNlbEV2ZW50KCkge1xuICAgIGJ0bldlbC5vZmYoQ0xJQ0ssIGVudGVyUXVlc3QpO1xuICAgIGJ0bkZpbi5vZmYoQ0xJQ0ssIGhpZGVGb3JtKTtcbiAgICBidG5QcmV2UXVlc3Qub2ZmKENMSUNLLCBidG5QcmV2UXVlc3RDbGlja2VkKTtcbiAgICBidG5OZXh0UXVlc3Qub2ZmKENMSUNLLCBidG5OZXh0UXVlc3RDbGlja2VkKTtcbiAgICBzb2NpYWxDaHgub2ZmKENIQU5HRSwgdXBkYXRlU29jaWFsSW5wdXQpO1xuXG4gICAgZG9jdW1lbnQucmVtb3ZlRXZlbnRMaXN0ZW5lcihLRVlET1dOLCBjaGVja0VudGVyS2V5KTtcbiAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKGVOZXh0LCBlID0+IHJlcXVlc3ROZXh0UXVlc3QoZS5kZXRhaWwudGFyZ2V0KSk7XG4gICAgZG9jdW1lbnQucmVtb3ZlRXZlbnRMaXN0ZW5lcihlRG9uZSwgZSA9PiBnb05leHRRdWVzdChlLmRldGFpbC50YXJnZXQpKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZVNvY2lhbElucHV0KCkge1xuICAgIGxldCBpbnB1dCA9ICQodGhpcyksXG4gICAgICAgIHZhbCA9IGlucHV0LnZhbCgpLFxuICAgICAgICB0YXJnZXRJbmRleCA9IGN1cnJlbnRJbmRleCArIDE7XG4gICAgaW5wdXQuaXMoJzpjaGVja2VkJykgPyBxdWVzdEFycmF5W3RhcmdldEluZGV4XS5zaG93U29jaWFsSW5wdXQodmFsKSA6IHF1ZXN0QXJyYXlbdGFyZ2V0SW5kZXhdLmhpZGVTb2NpYWxJbnB1dCh2YWwpO1xuICB9XG5cbiAgZnVuY3Rpb24gYnRuUHJldlF1ZXN0Q2xpY2tlZChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIHJlcXVlc3RQcmV2UXVlc3QoY3VycmVudEluZGV4KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGJ0bk5leHRRdWVzdENsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBjdXJyZW50UXVlc3Rpb24uc3VibWl0KCk7XG4gIH1cblxuXG4gIGZ1bmN0aW9uIHNob3dGb3JtKCkge1xuICAgIHdlbEFjdGl2ZSA9IHRydWU7XG4gICAgVHdlZW5NYXgudG8oZWwsIDAuNzUsIHtcbiAgICAgIHNjYWxlOiAxLFxuICAgICAgYXV0b0FscGhhOiAxLFxuICAgICAgZWFzZTogRXhwby5lYXNlSW5PdXQsXG5cdFx0XHRmb3JjZTNEOiB0cnVlXG5cdFx0fSk7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBoaWRlRm9ybShlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIFR3ZWVuTWF4LnRvKGVsLCAwLjc1LCB7XG4gICAgICBzY2FsZTogMC43NSxcbiAgICAgIGF1dG9BbHBoYTogMCxcbiAgICAgIGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZSxcbiAgICAgIG9uQ29tcGxldGU6IHJlc2V0Rm9ybVxuXHRcdH0pO1xuICAgIGNhbmNlbEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiByZXNldEZvcm0oKSB7XG4gICAgZmluU2NyLmhpZGUoKTtcbiAgICB3ZWxTY3IuZmluZCgnLmJhbm5lciA+IConKS5lYWNoKChfLCBlKSA9PiBUd2Vlbk1heC5zZXQoZSwge1xuICAgICAgeTogMCxcbiAgICAgIGF1dG9BbHBoYTogMVxuXHRcdH0pKTtcbiAgICBudW1TbGlkZXIuZ29UbygwKTtcbiAgICBxdWVzdEFycmF5WzBdLmdvSW5WaWV3KCk7XG4gICAgdXBkYXRlUHJvZ3Jlc3MoMCk7XG4gICAgY3VycmVudEluZGV4ID0gMDtcbiAgfVxuXG4gIGZ1bmN0aW9uIGVudGVyUXVlc3QoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBsZXQgc3ViRWwgPSB3ZWxTY3IuZmluZCgnLmJhbm5lciA+IConKSxcbiAgICAgICAgZGVsYXkgPSAwLjI1O1xuXG4gICAgd2VsQWN0aXZlID0gZmFsc2U7XG4gICAgc3ViRWwuZWFjaCgoaSwgZSkgPT4gVHdlZW5NYXgudG8oZSwgMC41LCB7XG4gICAgICB5OiAtNTAsXG4gICAgICBhdXRvQWxwaGE6IDAsXG5cdFx0XHRmb3JjZTNEOiB0cnVlLFxuICAgICAgZGVsYXk6IGRlbGF5ICogaSxcbiAgICAgIG9uQ29tcGxldGU6IHN1YkVsLmxlbmd0aCA9PT0gKGkgKyAxKSAmJiB3ZWxBbmltYXRlZERvbmVcblx0XHR9KSk7XG4gIH1cblxuICBmdW5jdGlvbiB3ZWxBbmltYXRlZERvbmUoKSB7XG4gICAgZWwuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgVHdlZW5NYXgudG8oYXNpZGVXcmFwLCAwLjUsIHtcbiAgICAgIHg6IDAsXG4gICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWUsXG4gICAgICBkZWxheTogMC4yNVxuXHRcdH0pO1xuXG4gICAgVHdlZW5NYXgudG8ocXVlc3RMaXN0LCAwLjc1LCB7XG4gICAgICB4OiAwLFxuICAgICAgZWFzZTogRXhwby5lYXNlSW5PdXQsXG5cdFx0XHRmb3JjZTNEOiB0cnVlLFxuICAgICAgZGVsYXk6IDAuMjVcblx0XHR9KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIG91dFF1ZXN0KCkge1xuICAgIFR3ZWVuTWF4LnRvKGFzaWRlV3JhcCwgMC41LCB7XG4gICAgICB4OiAtYXNpZGVXcmFwLndpZHRoKCksXG4gICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWVcblx0XHR9KTtcblxuICAgIFR3ZWVuTWF4LnRvKHF1ZXN0TGlzdCwgMC43NSwge1xuICAgICAgeDogQVBQLl9XLFxuICAgICAgZWFzZTogRXhwby5lYXNlSW5PdXQsXG5cdFx0XHRmb3JjZTNEOiB0cnVlLFxuICAgICAgb25Db21wbGV0ZTogZmluQW5pbWF0ZWREb25lXG5cdFx0fSk7XG4gIH1cblxuICBmdW5jdGlvbiBmaW5BbmltYXRlZERvbmUoKSB7XG4gICAgbGV0IGRlbGF5ID0gMC4yNTtcbiAgICBmaW5TY3Iuc2hvdygpLmZpbmQoJy5iYW5uZXIgPiAqJykuZWFjaCgoaSwgZSkgPT4gVHdlZW5NYXgudG8oZSwgMC43NSwge1xuICAgICAgeTogMCxcbiAgICAgIGF1dG9BbHBoYTogMSxcbiAgICAgIGZvcmNlM0Q6IHRydWUsXG4gICAgICBkZWxheTogZGVsYXkgKiBpLFxuICAgICAgb25Db21wbGV0ZTogKCkgPT4ge1xuICAgICAgICBmaW5BY3RpdmUgPSB0cnVlO1xuICAgICAgICBlbC5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICAgIH1cblx0XHR9KSk7XG4gIH1cblxuICBmdW5jdGlvbiBjaGVja0VudGVyS2V5KGUpIHtcbiAgICBsZXQga2V5ID0gZS53aGljaDtcbiAgICBrZXkgPT09IDEzICYmIChlLnByZXZlbnREZWZhdWx0KCksIHdlbEFjdGl2ZSA/IGJ0bldlbC5jbGljaygpIDogKGN1cnJlbnRRdWVzdGlvbiA/IGN1cnJlbnRRdWVzdGlvbi5zdWJtaXQoKSA6IGZpbkFjdGl2ZSAmJiBidG5GaW4uY2xpY2soKSkpO1xuICB9XG5cbiAgZnVuY3Rpb24gcmVxdWVzdFByZXZRdWVzdChpKSB7XG4gICAgaWYgKGkgPT09IDApIHJldHVybiBmYWxzZTtcbiAgICBxdWVzdEFycmF5W2ldLmdvT3V0TmV4dCgtMSk7XG4gICAgbnVtU2xpZGVyLmdvVG8oaSAtIDEpO1xuICAgIGN1cnJlbnRRdWVzdGlvbiA9IG51bGw7XG4gIH1cblxuICBmdW5jdGlvbiByZXF1ZXN0TmV4dFF1ZXN0KGkpIHtcbiAgICBxdWVzdEFycmF5W2ldLmdvT3V0TmV4dCgxKTtcbiAgICBudW1TbGlkZXIuZ29UbyhpICsgMSk7XG4gICAgY3VycmVudFF1ZXN0aW9uID0gbnVsbDtcbiAgfVxuXG4gIGZ1bmN0aW9uIGdvTmV4dFF1ZXN0KGkpIHtcbiAgICAoaSA9PT0gdG90YWxRdWVzdCkgPyBzdWJtaXRRdWVzdCgpIDogdXBkYXRlSW5kZXgoaSk7XG4gIH1cblxuICBmdW5jdGlvbiBzdWJtaXRRdWVzdCgpIHtcbiAgICBBUFAucG9wdXAuX2xvYWRpbmcuc2hvdygpO1xuICAgIC8vIGNvbnNvbGUubG9nKHF1ZXN0TGlzdC5zZXJpYWxpemVBcnJheSgpKTsgcmV0dXJuO1xuICAgICQuYWpheCh7XG5cdFx0XHR0eXBlOiBBUFAuX3N1Ym1pdE1ldGhvZCxcblx0XHRcdHVybDogYWpheFVSTCxcblx0XHRcdGRhdGE6IHF1ZXN0TGlzdC5zZXJpYWxpemVBcnJheSgpLFxuICAgICAgaGVhZGVyczogQVBQLl9oZWFkZXJzLFxuXHRcdFx0c3VjY2VzczogZGF0YSA9PiB7XG5cdFx0XHRcdGxldCBzdGF0dXMgPSBwYXJzZUludChkYXRhLnN0YXR1cyksXG5cdFx0XHRcdFx0XHR0aXRsZSA9IGRhdGEudGl0bGUsXG5cdFx0XHRcdFx0XHRtZXNzYWdlID0gZGF0YS5tZXNzYWdlO1xuXG5cdFx0XHRcdEFQUC5wb3B1cC5fbG9hZGluZy5oaWRlKCk7XG5cdFx0XHRcdHN3aXRjaChzdGF0dXMpIHtcblx0XHRcdFx0XHRjYXNlIDA6IG91dFF1ZXN0KCk7IGJyZWFrO1xuXHRcdFx0XHRcdGNhc2UgMTogb3V0UXVlc3QoKTsgYnJlYWs7XG5cdFx0XHRcdH1cblx0XHRcdH1cblx0XHR9KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZUluZGV4KGkpIHtcbiAgICBjdXJyZW50SW5kZXggPSBpO1xuICAgIHF1ZXN0QXJyYXlbaV0uZ29JblZpZXcoKTtcbiAgICBjdXJyZW50UXVlc3Rpb24gPSBxdWVzdEFycmF5W2ldO1xuICAgIHVwZGF0ZVByb2dyZXNzKE1hdGgucm91bmQoKGN1cnJlbnRJbmRleCAvIHRvdGFsUXVlc3QpICogMTAwKSk7XG4gICAgLy8gY3VycmVudEluZGV4ID09PSAwID8gYnRuUHJldlF1ZXN0LmhpZGUoKSA6IGN1cnJlbnRJbmRleCA9PT0gKHRvdGFsUXVlc3QgLSAxKSA/IGJ0bk5leHRRdWVzdC5oaWRlKCkgOiAoYnRuUHJldlF1ZXN0LnNob3coKSwgYnRuTmV4dFF1ZXN0LnNob3coKSk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVQcm9ncmVzcyhpKSB7XG4gICAgcHJvTnVtLnRleHQoaSk7XG4gICAgcHJvQmFyLndpZHRoKGkgKyAnJScpO1xuICB9XG5cblx0cmV0dXJuIHRoaXM7XG59OyIsIi8qKioqKiBTaWduVXBRdWVzdGlvbiAtIEVhY2ggcXVlc3Rpb24gYXMgYSBtaW5pIGZvcm0gKioqKiovXG5sZXQgU2lnblVwUXVlc3Rpb24gPSBmdW5jdGlvbihlbGVtZW50LCBlTmV4dCwgZURvbmUpIHtcblxuXHRsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgaW5kZXggPSBwYXJzZUludChlbC5kYXRhKCdpbmRleCcpKSxcbiAgICAgIHJxU3ZDaGVjayA9IGVsLmhhc0NsYXNzKENMQVNTLl9ycVN2KSxcbiAgICAgIGFqYXhVUkwgPSBycVN2Q2hlY2sgPyBlbC5kYXRhKCd1cmwnKSA6IG51bGwsXG4gICAgICBwYXNzU3YgPSBmYWxzZSxcblxuICAgICAgc3ViRWwgPSBlbC5maW5kKCc+IConKSxcblx0XHRcdGlucHV0cyA9IGVsLmZpbmQoJ2lucHV0W3R5cGU9dGV4dF0sIGlucHV0W3R5cGU9cGFzc3dvcmRdLCBpbnB1dFt0eXBlPWVtYWlsXSwgaW5wdXRbdHlwZT10ZWxdJyksXG5cdFx0XHRpbnB1dFJxID0gZWwuZmluZCgnLicgKyBDTEFTUy5fcmVxdWlyZSksXG4gICAgICBpbnB1dEVtID0gZWwuZmluZCgnLicgKyBDTEFTUy5fZW1haWwpLFxuICAgICAgaW5wdXRNaW4gPSBlbC5maW5kKCcuJyArIENMQVNTLl9taW4pLFxuICAgICAgaW5wdXRNYXggPSBlbC5maW5kKCcuJyArIENMQVNTLl9tYXgpLFxuXG4gICAgICBpbnB1dFNlbCA9IGVsLmZpbmQoJy5pbnB1dC1zZWwnKSxcbiAgICAgIHNlbEFycmF5ID0gW10sXG4gICAgICByYWRXcmFwID0gZWwuZmluZCgnLnJhZC13cmFwJyksXG4gICAgICBpbnB1dENoeCA9IGVsLmZpbmQoJ2lucHV0W3R5cGU9cmFkaW9dLCBpbnB1dFt0eXBlPWNoZWNrYm94XScpLFxuICAgICAgYnRuTmV4dCA9IGVsLmZpbmQoJy5jdGEnKSxcbiAgICAgIGpzTnVtID0gZWwuZmluZCgnLmpzLW51bScpLFxuICAgICAgYnRuQWN0aXZlID0gdHJ1ZSxcblxuXHRcdFx0dHh0UnEgPSAncmVxdWlyZWQtdHh0JyxcbiAgICAgIHR4dE1pbiA9ICdtaW4tdHh0Jyxcblx0XHRcdHR4dE1heCA9ICdtYXgtdHh0Jyxcblx0XHRcdHR4dEVtID0gJ2VtYWlsLXR4dCcsXG4gICAgICBuZXh0RXZlbnQgPSBuZXcgQ3VzdG9tRXZlbnQoZU5leHQsIHsgYnViYmxlczogdHJ1ZSwgZGV0YWlsOiB7IHRhcmdldDogaW5kZXggfSB9KSxcbiAgICAgIGRvbmVFdmVudCA9IG5ldyBDdXN0b21FdmVudChlRG9uZSwgeyBidWJibGVzOiB0cnVlLCBkZXRhaWw6IHsgdGFyZ2V0OiAwIH0gfSk7XG5cblx0KCgpID0+IHtcbiAgICBlbC5oaWRlKCk7XG4gICAgaW5wdXRTZWwubGVuZ3RoID4gMCAmJiBpbnB1dFNlbC5lYWNoKChpLCBlKSA9PiBzZWxBcnJheVtpXSA9IG5ldyBJbnB1dFNlbGVjdGlvbihlKSk7XG4gICAgcmFkV3JhcC5sZW5ndGggPiAwICYmIChidG5OZXh0LmhpZGUoKSwgYnRuQWN0aXZlID0gZmFsc2UpO1xuXHRcdGluaXRFdmVudCgpO1xuXHR9KSgpO1xuXG4gIHRoaXMuZ29JblZpZXcgPSAoKSA9PiBnb0luKCk7XG4gIHRoaXMuZ29PdXROZXh0ID0gKGkpID0+IGdvT3V0KGkpO1xuICB0aGlzLnN1Ym1pdCA9ICgpID0+IGNoZWNrSW5wdXQoKTtcbiAgdGhpcy5oaWRlU29jaWFsSW5wdXQgPSAoaSkgPT4gaGlkZVNvY2lhbChpKTtcbiAgdGhpcy5zaG93U29jaWFsSW5wdXQgPSAoaSkgPT4gc2hvd1NvY2lhbChpKTtcblxuXHRmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG5cdFx0aW5wdXRzLmxlbmd0aCA+IDAgJiYgaW5wdXRzLm9uKEZfSU4sIGFjdGl2ZVdyYXApLm9uKEZfT1VULCBkZWFjdGl2ZVdyYXApO1xuXHRcdGlucHV0UnEubGVuZ3RoID4gMCAmJiBpbnB1dFJxLm9uKEZfSU4sIGlucHV0Rm9jdXMpO1xuICAgIGlucHV0Q2h4Lmxlbmd0aCA+IDAgJiYgaW5wdXRDaHgub24oQ0hBTkdFLCBjaHhDaGFuZ2VkKTtcbiAgICBqc051bS5sZW5ndGggPiAwICYmIGpzTnVtLm9uKElOUFVULCBmaWx0ZXJOdW1iZXIpO1xuICAgIGJ0bk5leHQub24oQ0xJQ0ssIG5leHRDbGlja2VkKTtcblx0fVxuXG4gIGZ1bmN0aW9uIGZpbHRlck51bWJlcigpIHtcblx0XHR0aGlzLnZhbHVlID0gdGhpcy52YWx1ZS5yZXBsYWNlKC9bXjAtOV0vZywgJycpO1xuXHR9XG5cbiAgZnVuY3Rpb24gY2h4Q2hhbmdlZCgpIHtcbiAgICBpbnB1dENoeC5maWx0ZXIoJzpjaGVja2VkJykubGVuZ3RoID09PSAwID8gKGJ0bk5leHQuaGlkZSgpLCBidG5BY3RpdmUgPSBmYWxzZSkgOiAoYnRuTmV4dC5zaG93KCksIGJ0bkFjdGl2ZSA9IHRydWUpO1xuICB9XG5cbiAgZnVuY3Rpb24gaGlkZVNvY2lhbChpKSB7XG4gICAgbGV0IHdyYXAgPSBlbC5maW5kKCcjJyArIGkgKyAnLXVybC13cmFwJyksXG4gICAgICAgIGlucHV0ID0gd3JhcC5maW5kKCdpbnB1dCcpO1xuXG4gICAgd3JhcC5hZGRDbGFzcyhDTEFTUy5fZGlzYWJsZSk7XG4gICAgd3JhcC5oYXNDbGFzcyhDTEFTUy5fcmVxdWlyZSkgJiYgaW5wdXQucmVtb3ZlQ2xhc3MoQ0xBU1MuX3JlcXVpcmUpO1xuICAgIHVwZGF0ZVJxSW5wdXQoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHNob3dTb2NpYWwoaSkge1xuICAgIGxldCB3cmFwID0gZWwuZmluZCgnIycgKyBpICsgJy11cmwtd3JhcCcpLFxuICAgICAgICBpbnB1dCA9IHdyYXAuZmluZCgnaW5wdXQnKTtcblxuICAgIHdyYXAucmVtb3ZlQ2xhc3MoQ0xBU1MuX2Rpc2FibGUpO1xuICAgIHdyYXAuaGFzQ2xhc3MoQ0xBU1MuX3JlcXVpcmUpICYmIGlucHV0LmFkZENsYXNzKENMQVNTLl9yZXF1aXJlKTtcbiAgICB1cGRhdGVScUlucHV0KCk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVScUlucHV0KCkge1xuICAgIHN1YkVsID0gZWwuZmluZCgnPiAqOm5vdCguanMtZGlzYWJsZSknKTtcbiAgICBpbnB1dFJxID0gZWwuZmluZCgnLicgKyBDTEFTUy5fcmVxdWlyZSk7XG4gICAgaW5wdXRScS5vbihGX0lOLCBpbnB1dEZvY3VzKTtcbiAgfVxuXG5cdGZ1bmN0aW9uIGFjdGl2ZVdyYXAoKSB7XG5cdFx0bGV0IGlucHV0ID0gJCh0aGlzKSxcblx0XHRcdFx0d3JhcCA9IGlucHV0LnBhcmVudHMoJy5pbnB1dC13cmFwJyk7XG5cdFx0d3JhcC5sZW5ndGggPiAwICYmIHdyYXAuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG5cdH1cblxuXHRmdW5jdGlvbiBkZWFjdGl2ZVdyYXAoKSB7XG5cdFx0bGV0IGlucHV0ID0gJCh0aGlzKSxcblx0XHRcdFx0d3JhcCA9IGlucHV0LnBhcmVudHMoJy5pbnB1dC13cmFwJyk7XG5cdFx0d3JhcC5sZW5ndGggPiAwICYmICQudHJpbShpbnB1dC52YWwoKSkubGVuZ3RoID09PSAwICYmIHdyYXAucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG5cdH1cblxuXHRmdW5jdGlvbiBpbnB1dEZvY3VzKGUpIHtcbiAgICBsZXQgaW5wdXQgPSAkKHRoaXMpLFxuICAgICAgICB3YXJuaW5nID0gaW5wdXQucGFyZW50KCkubmV4dCgnLndhcm5pbmcnKTtcblx0XHRpbnB1dC5oYXNDbGFzcyhDTEFTUy5fZXJyb3IpICYmIChpbnB1dC5yZW1vdmVDbGFzcyhDTEFTUy5fZXJyb3IpLCB3YXJuaW5nLnJlbW92ZUNsYXNzKENMQVNTLl9kbGV4KSk7XG5cdH1cblxuXHRmdW5jdGlvbiBuZXh0Q2xpY2tlZChlKSB7XG5cdFx0ZS5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdGNoZWNrSW5wdXQoKTtcblx0fVxuXG4gIGZ1bmN0aW9uIGNoZWNrSW5wdXQoKSB7XG4gICAgbGV0IHBhc3MgPSB0cnVlO1xuICAgIHBhc3MgPSBidG5BY3RpdmU7XG5cdFx0cGFzcyAmJiAocGFzcyA9IGNoZWNrUmVxdWlyZSgpKTtcbiAgICBwYXNzICYmIChwYXNzID0gY2hlY2tNaW4oKSk7XG5cdFx0cGFzcyAmJiAocGFzcyA9IGNoZWNrTWF4KCkpO1xuXHRcdHBhc3MgJiYgKHBhc3MgPSBjaGVja0VtYWlsKCkpO1xuICAgIC8vIGNvbnNvbGUubG9nKHBhc3MsIHJxU3ZDaGVjaywgcGFzcyAmJiBycVN2Q2hlY2spO1xuICAgIC8vIHJldHVybiBmYWxzZTtcbiAgICBwYXNzICYmIChycVN2Q2hlY2sgPyAocGFzc1N2ID8gZ29OZXh0KCkgOiBjaGVja1NlcnZlcigpKSA6IGdvTmV4dCgpKTtcbiAgICByZXR1cm4gcGFzcztcbiAgfVxuXG4gIGZ1bmN0aW9uIGNoZWNrU2VydmVyKCkge1xuICAgIGxldCBpbnB1dFZhbCA9IGpRdWVyeS50cmltKGlucHV0cy52YWwoKSk7XG4gICAgQVBQLnBvcHVwLl9sb2FkaW5nLnNob3coKTtcbiAgICAkLmFqYXgoe1xuXHRcdFx0dHlwZTogQVBQLl9zdWJtaXRNZXRob2QsXG5cdFx0XHR1cmw6IGFqYXhVUkwsXG5cdFx0XHRkYXRhOiB7IHZhbDogaW5wdXRWYWwgfSxcbiAgICAgIGhlYWRlcnM6IEFQUC5faGVhZGVycyxcblx0XHRcdHN1Y2Nlc3M6IGRhdGEgPT4ge1xuXHRcdFx0XHRsZXQgc3RhdHVzID0gcGFyc2VJbnQoZGF0YS5zdGF0dXMpLFxuXHRcdFx0XHRcdFx0dGl0bGUgPSBkYXRhLnRpdGxlLFxuXHRcdFx0XHRcdFx0bWVzc2FnZSA9IGRhdGEubWVzc2FnZTtcblxuICAgICAgICBBUFAucG9wdXAuX2xvYWRpbmcuaGlkZSgpO1xuXHRcdFx0XHRzd2l0Y2goc3RhdHVzKSB7XG5cdFx0XHRcdFx0Y2FzZSAwOiBzaG93V2FybmluZyhpbnB1dHMsIG1lc3NhZ2UpOyBicmVhaztcblx0XHRcdFx0XHRjYXNlIDE6IHtcbiAgICAgICAgICAgIHBhc3NTdiA9IHRydWU7XG4gICAgICAgICAgICBnb05leHQoKTtcbiAgICAgICAgICB9IGJyZWFrO1xuXHRcdFx0XHR9XG5cdFx0XHR9XG5cdFx0fSk7XG4gIH1cblxuICBmdW5jdGlvbiBnb05leHQoKSB7XG4gICAgY29uc29sZS5sb2coJ2dvTmV4dCcpO1xuICAgIGRvY3VtZW50LmRpc3BhdGNoRXZlbnQobmV4dEV2ZW50KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHJlYWR5SW4oKSB7XG4gICAgZWwuc2hvdygpO1xuICAgIHN1YkVsLmVhY2goKGksIGUpID0+IFR3ZWVuTWF4LnNldChlLCB7XG4gICAgICB5OiA1MCxcbiAgICAgIGF1dG9BbHBoYTogMFxuXHRcdH0pKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGdvSW4oKSB7XG4gICAgbGV0IGRlbGF5ID0gMC4xO1xuXG4gICAgcmVhZHlJbigpO1xuICAgIHN1YkVsLmVhY2goKGksIGUpID0+IFR3ZWVuTWF4LnRvKGUsIDAuNzUsIHtcbiAgICAgIHk6IDAsXG4gICAgICBhdXRvQWxwaGE6IDEsXG4gICAgICAvLyBlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWUsXG4gICAgICBkZWxheTogZGVsYXkqaVxuXHRcdH0pKTtcbiAgICBjb25zb2xlLmxvZygnZ29JbiAnLCBpbmRleCk7XG4gIH1cblxuXHRmdW5jdGlvbiBnb091dChpKSB7XG4gICAgZG9uZUV2ZW50LmRldGFpbC50YXJnZXQgPSBpbmRleCArIGk7XG4gICAgYW5pbWF0ZVN1YkVsKCk7XG5cdH1cblxuICBmdW5jdGlvbiBhbmltYXRlU3ViRWwoKSB7XG4gICAgbGV0IGRlbGF5ID0gMC4yNTtcbiAgICBzdWJFbC5lYWNoKChpLCBlKSA9PiBUd2Vlbk1heC50byhlLCAwLjc1LCB7XG4gICAgICB5OiAtNTAsXG4gICAgICBhdXRvQWxwaGE6IDAsXG4gICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcbiAgICAgIGZvcmNlM0Q6IHRydWUsXG4gICAgICBkZWxheTogZGVsYXkqaSxcbiAgICAgIG9uQ29tcGxldGU6IHN1YkVsLmxlbmd0aCA9PT0gKGkgKyAxKSAmJiBhbmltYXRlZERvbmVcblx0XHR9KSk7XG4gIH1cblxuICBmdW5jdGlvbiBhbmltYXRlZERvbmUoKSB7XG4gICAgZG9jdW1lbnQuZGlzcGF0Y2hFdmVudChkb25lRXZlbnQpO1xuICAgIGVsLmhpZGUoKTtcbiAgfVxuXG5cdGZ1bmN0aW9uIGNoZWNrUmVxdWlyZSgpIHtcbiAgICBsZXQgcGFzcyA9IHRydWUsXG5cdFx0XHRcdGlucHV0ID0ge307XG5cblx0XHRpbnB1dFJxLmxlbmd0aCA9PT0gMCB8fCBpbnB1dFJxLmVhY2goKF8sIGVsKSA9PiB7XG5cdFx0XHRpbnB1dCA9ICQoZWwpO1xuXHRcdFx0KGlucHV0LnZhbCgpID09PSAnJykgJiYgKHBhc3MgPSBzaG93V2FybmluZyhpbnB1dCwgaW5wdXQuYXR0cih0eHRScSkpKTtcblx0XHR9KTtcblx0XHRyZXR1cm4gcGFzcztcblx0fVxuXG5cdGZ1bmN0aW9uIGNoZWNrRW1haWwoKSB7XG5cdFx0bGV0IHBhc3MgPSB0cnVlLFxuXHRcdFx0XHRpbnB1dCA9IHt9LFxuXHRcdFx0XHRyZWdleCA9IC9eKFthLXpBLVowLTlfListXSkrXFxAKChbYS16QS1aMC05LV0pK1xcLikrKFthLXpBLVowLTldezIsNH0pKyQvO1xuXG5cdFx0aW5wdXRFbS5sZW5ndGggPT09IDAgfHwgaW5wdXRFbS5lYWNoKChfLCBlbCkgPT4ge1xuXHRcdFx0aW5wdXQgPSAkKGVsKTtcblx0XHRcdHJlZ2V4LnRlc3QoaW5wdXQudmFsKCkpIHx8IChwYXNzID0gc2hvd1dhcm5pbmcoaW5wdXQsIGlucHV0LmF0dHIodHh0RW0pKSk7XG5cdFx0fSk7XG5cdFx0cmV0dXJuIHBhc3M7XG5cdH1cblxuICBmdW5jdGlvbiBjaGVja01pbigpIHtcblx0XHRsZXQgcGFzcyA9IHRydWUsXG5cdFx0XHRcdGlucHV0ID0ge30sXG5cdFx0XHRcdG1pbiA9IDA7XG5cblx0XHRpbnB1dE1pbi5sZW5ndGggPT09IDAgfHwgaW5wdXRNaW4uZWFjaCgoXywgZWwpID0+IHtcblx0XHRcdGlucHV0ID0gJChlbCk7XG5cdFx0XHRtaW4gPSBwYXJzZUludChpbnB1dC5kYXRhKCdtaW4nKSk7XG5cdFx0XHQoaW5wdXQudmFsKCkubGVuZ3RoIDwgbWluKSAmJiAocGFzcyA9IHNob3dXYXJuaW5nKGlucHV0LCBpbnB1dC5hdHRyKHR4dE1pbikpKTtcblx0XHR9KTtcblx0XHRyZXR1cm4gcGFzcztcblx0fVxuXG5cdGZ1bmN0aW9uIGNoZWNrTWF4KCkge1xuXHRcdGxldCBwYXNzID0gdHJ1ZSxcblx0XHRcdFx0aW5wdXQgPSB7fSxcblx0XHRcdFx0bWF4ID0gMDtcblxuXHRcdGlucHV0TWF4Lmxlbmd0aCA9PT0gMCB8fCBpbnB1dE1heC5lYWNoKChfLCBlbCkgPT4ge1xuXHRcdFx0aW5wdXQgPSAkKGVsKTtcblx0XHRcdG1heCA9IHBhcnNlSW50KGlucHV0LmRhdGEoJ21heCcpKTtcblx0XHRcdChpbnB1dC52YWwoKS5sZW5ndGggPiBtYXgpICYmIChwYXNzID0gc2hvd1dhcm5pbmcoaW5wdXQsIGlucHV0LmF0dHIodHh0TWF4KSkpOztcblx0XHR9KTtcblx0XHRyZXR1cm4gcGFzcztcblx0fVxuXG4gIGZ1bmN0aW9uIHNob3dXYXJuaW5nKGlucHV0LCBtZXNzKSB7XG4gICAgbGV0IHdhcm5pbmcgPSBpbnB1dC5wYXJlbnQoKS5uZXh0KCcud2FybmluZycpO1xuICAgIGlucHV0LmFkZENsYXNzKENMQVNTLl9lcnJvcik7XG4gICAgd2FybmluZy50ZXh0KG1lc3MpLmFkZENsYXNzKENMQVNTLl9kbGV4KTtcbiAgICByZXR1cm4gZmFsc2U7XG4gIH1cblxuXHRyZXR1cm4gdGhpcztcbn07IiwiLyoqKiBQQUdFIC0gSE9NRSAqKiovXG5BUFAuaG9tZSA9IHtcbiAgX2VsOiB7fSxcbiAgX3Njcm9sbEFuaW1hdG9yOiB7fSxcbiAgX3Njcm9sbFRyaWdnZXI6IHt9LFxuICBfZXZlbnRTZWN0aW9uOiB7fSxcblxuXHRpbml0OiBmdW5jdGlvbigpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gICAgc2VsZi5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcblxuICAgIHNlbGYuX2V2ZW50U2VjdGlvbiA9IG5ldyBFdmVudFNlY3Rpb24oc2VsZi5fZWwucXVlcnlTZWxlY3RvcignLm5ld3MtdGFiJykpO1xuICAgIHJldHVybjtcblxuICAgIHNlbGYuX3Njcm9sbEFuaW1hdG9yID0gc2VsZi5fZWwucXVlcnlTZWxlY3RvckFsbCgnLnNjcm9sbC1hbmltYXRvcicpO1xuICAgIChzZWxmLl9zY3JvbGxBbmltYXRvci5sZW5ndGggPiAwKSAmJiBzZWxmLl9zY3JvbGxBbmltYXRvci5mb3JFYWNoKGUgPT4gbmV3IFNjcm9sbEFuaW1hdG9yKGUpKTtcbiAgICBzZWxmLl9zY3JvbGxUcmlnZ2VyID0gc2VsZi5fZWwucXVlcnlTZWxlY3RvckFsbCgnLnNjcm9sbC10cmlnZ2VyJyk7XG4gICAgKHNlbGYuX3Njcm9sbFRyaWdnZXIubGVuZ3RoID4gMCkgJiYgc2VsZi5fc2Nyb2xsVHJpZ2dlci5mb3JFYWNoKGUgPT4gbmV3IFNjcm9sbFRyaWdnZXIoZSkpO1xuXG4gICAgc2VsZi5pbml0RXZlbnQoKTtcbiAgfSxcblxuICBpbml0RXZlbnQ6IGZ1bmN0aW9uKCkge1xuICAgIGxldCBzZWxmID0gdGhpcztcbiAgfVxufTtcblxuLyoqKioqIE5ld3MgJiBFdmVudCBTZWN0aW9uICoqKioqL1xubGV0IEV2ZW50U2VjdGlvbiA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcblxuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgdGFiUGFnaW5nID0gZWwuZmluZCgnLnRhYi1wYWdpbmcnKSxcbiAgICAgIHRhYkl0ZW0gPSB0YWJQYWdpbmcuZmluZCgnLml0ZW0nKSxcbiAgICAgIGVOYW1lID0gJ0hPTUVfRVZFTlRfU0xJREVSX1BBR0lOR19VUERBVEVEJyxcbiAgICAgIHdyYXBTbGlkZXIgPSBlbC5maW5kKCcjbmV3cy1zbGlkZXIgLml0ZW0td3JhcCcpLFxuICAgICAgZXZlbnRTbGlkZXIgPSBuZXcgU2xpZGVyKGVsLmZpbmQoJyNuZXdzLXNsaWRlcicpLCAwLCBlTmFtZSksXG4gICAgICBzaGFkb3dPZmZzZXQgPSAwO1xuXG4gICgoKSA9PiBpbml0KCkpKCk7XG4gIGZ1bmN0aW9uIGluaXQoKSB7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgdGFiSXRlbS5vbihDTElDSywgaXRlbUNsaWNrZWQpO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoZU5hbWUsIGUgPT4gdXBkYXRlSW5kZXgocGFyc2VJbnQoZS5kZXRhaWwudGFyZ2V0KSkpO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCB1cGRhdGVXcmFwSGVpZ2h0KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGl0ZW1DbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgbGV0IGl0ZW0gPSAkKHRoaXMpLFxuICAgICAgICB0YXJnZXRJbmRleCA9IDAsXG4gICAgICAgIGlzQW5pbWF0ZSA9IGV2ZW50U2xpZGVyLmdldEFuaW1hdGlvblN0YXRlKCk7XG5cbiAgICBpZiAoaXNBbmltYXRlIHx8IGl0ZW0uaGFzQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkpIHJldHVybiBmYWxzZTtcblxuICAgIHRhcmdldEluZGV4ID0gcGFyc2VJbnQoaXRlbS5kYXRhKCdpbmRleCcpKTtcbiAgICBnb1RvKHRhcmdldEluZGV4KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGdvVG8oaSkge1xuICAgIHVwZGF0ZUluZGV4KGkpO1xuICAgIGV2ZW50U2xpZGVyLmdvVG8oaSk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVJbmRleChpKSB7XG4gICAgdGFiSXRlbS5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICB0YWJJdGVtLmVxKGkpLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpO1xuICB9XG5cbiAgZnVuY3Rpb24gdXBkYXRlV3JhcEhlaWdodCgpIHtcbiAgICBjb25zb2xlLmxvZyhBUFAuX1cpO1xuICAgIChBUFAuX1cgPj0gOTYwKSA/IHJlbW92ZUZpeEhlaWdodCgpIDogc2V0Rml4SGVpZ2h0KCk7XG4gIH1cblxuICBmdW5jdGlvbiBzZXRGaXhIZWlnaHQoKSB7XG4gICAgbGV0IGggPSBldmVudFNsaWRlci5nZXRJdGVtSGVpZ2h0KCkgKyBzaGFkb3dPZmZzZXQ7XG4gICAgd3JhcFNsaWRlci5oZWlnaHQoaCk7XG4gIH1cblxuICBmdW5jdGlvbiByZW1vdmVGaXhIZWlnaHQoKSB7XG4gICAgbGV0IHN0eWxlID0gd3JhcFNsaWRlci5hdHRyKCdzdHlsZScpO1xuICAgICh0eXBlb2Ygc3R5bGUgIT09ICd1bmRlZmluZWQnICYmIHN0eWxlICE9PSBmYWxzZSkgJiYgd3JhcFNsaWRlci5yZW1vdmVBdHRyKCdzdHlsZScpO1xuICB9XG5cblx0cmV0dXJuIHRoaXM7XG59O1xuIiwiLyoqKiBQQUdFIC0gVEFMRU5UIERFVEFJTFMgKioqL1xuQVBQLnRhbGVudERldGFpbHMgPSB7XG4gIF9lbDoge30sXG4gIF9hU2xpZGVyOiB7fSxcbiAgX3NDYXJvdXNlbDoge30sXG5cblx0aW5pdDogZnVuY3Rpb24oKSB7XG4gICAgbGV0IHNlbGYgPSB0aGlzO1xuICAgIHNlbGYuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgc2VsZi5fYVNsaWRlciA9IG5ldyBTbGlkZXIoc2VsZi5fZWwucXVlcnlTZWxlY3RvcignLmFzaWRlLXNsaWRlcicpLCAwKTtcbiAgICBzZWxmLl9zQ2Fyb3VzZWwgPSBuZXcgQ2Fyb3VzZWwoc2VsZi5fZWwucXVlcnlTZWxlY3RvcignLnNlcnZpY2UtYm9hcmQgLmNhcm91c2VsJyksIHRydWUsIHNlbGYuZ2V0TWF4U2hvdygpKTtcbiAgICBzZWxmLmluaXRFdmVudCgpO1xuICB9LFxuXG4gIGluaXRFdmVudDogZnVuY3Rpb24oKSB7XG4gICAgbGV0IHNlbGYgPSB0aGlzO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCAoKSA9PiBzZWxmLl9zQ2Fyb3VzZWwudXBkYXRlTWF4U2hvdyhzZWxmLmdldE1heFNob3coKSkpO1xuICB9LFxuXG4gIGdldE1heFNob3c6ICgpID0+IEFQUC5fVyA+IDk2MCA/IDMgOiBBUFAuX1cgPiA2NDAgJiYgQVBQLl9XIDw9IDk2MCA/IDIgOiAxXG59OyIsIi8qKiogUEFHRSAtIEFDVElWRSBBQ0NPVU5UICoqKi9cbkFQUC5hY3RpdmVBY2NvdW50ID0ge1xuICBfZWw6IHt9LFxuICBfbG9naW5Gb3JtOiB7fSxcblxuXHRpbml0OiBmdW5jdGlvbigpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gICAgc2VsZi5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICBzZWxmLl9sb2dpbkZvcm0gPSBuZXcgRm9ybShzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcjbG9naW4tZm9ybScpKTtcbiAgICBzZWxmLmluaXRFdmVudCgpO1xuICB9LFxuXG4gIGluaXRFdmVudDogZnVuY3Rpb24oKSB7XG4gICAgbGV0IHNlbGYgPSB0aGlzO1xuICB9XG59OyIsIi8qKiogUEFHRSAtIENBU1RJTkcgQk9BUkQgKioqL1xuQVBQLmNhc3RpbmdCb2FyZCA9IHtcbiAgX2VsOiB7fSxcbiAgX2JTbGlkZXI6IHt9LFxuICBfdENhcm91c2VsOiB7fSxcblxuXHRpbml0OiBmdW5jdGlvbigpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gICAgc2VsZi5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICBzZWxmLl9iU2xpZGVyID0gbmV3IFNsaWRlcihzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcuYmFubmVyLXNsaWRlcicpLCAwKTtcbiAgICBzZWxmLl90Q2Fyb3VzZWwgPSBuZXcgQ2Fyb3VzZWwoc2VsZi5fZWwucXVlcnlTZWxlY3RvcignLnRlc3RpbW9uaWFsIC5jYXJvdXNlbCcpLCB0cnVlLCBzZWxmLmdldE1heFNob3coKSk7XG4gICAgc2VsZi5pbml0RXZlbnQoKTtcbiAgfSxcblxuICBpbml0RXZlbnQ6IGZ1bmN0aW9uKCkge1xuICAgIGxldCBzZWxmID0gdGhpcztcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFNJWkVfQ0hBTkdFRCwgKCkgPT4gc2VsZi5fdENhcm91c2VsLnVwZGF0ZU1heFNob3coc2VsZi5nZXRNYXhTaG93KCkpKTtcbiAgfSxcblxuICBnZXRNYXhTaG93OiAoKSA9PiBBUFAuX1cgPiA5NjAgPyAzIDogQVBQLl9XID4gNjQwICYmIEFQUC5fVyA8PSA5NjAgPyAyIDogMVxufTsiLCIvKioqIFBBR0UgLSBPVVIgVEFMRU5UICoqKi9cbkFQUC5vdXJUYWxlbnQgPSB7XG4gIF9lbDoge30sXG4gIF9iU2xpZGVyOiB7fSxcbiAgX3RDYXJvdXNlbDoge30sXG4gIF9zQ2Fyb3VzZWw6IHt9LFxuXG5cdGluaXQ6IGZ1bmN0aW9uKCkge1xuICAgIGxldCBzZWxmID0gdGhpcztcbiAgICBzZWxmLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHNlbGYuX2JTbGlkZXIgPSBuZXcgU2xpZGVyKHNlbGYuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5iYW5uZXItc2xpZGVyJyksIDApO1xuICAgIHNlbGYuX3RDYXJvdXNlbCA9IG5ldyBDYXJvdXNlbChzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcudGVzdGltb25pYWwgLmNhcm91c2VsJyksIHRydWUsIHNlbGYuZ2V0TWF4U2hvdygpKTtcbiAgICBzZWxmLl9zQ2Fyb3VzZWwgPSBuZXcgQ2Fyb3VzZWwoc2VsZi5fZWwucXVlcnlTZWxlY3RvcignLnNlcnZpY2UtYm9hcmQgLmNhcm91c2VsJyksIHRydWUsIHNlbGYuZ2V0TWF4U2hvdygpKTtcbiAgICBzZWxmLmluaXRFdmVudCgpO1xuICB9LFxuXG4gIGluaXRFdmVudDogZnVuY3Rpb24oKSB7XG4gICAgbGV0IHNlbGYgPSB0aGlzO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCAoKSA9PiB7XG4gICAgICBzZWxmLl90Q2Fyb3VzZWwudXBkYXRlTWF4U2hvdyhzZWxmLmdldE1heFNob3coKSksXG4gICAgICBzZWxmLl9zQ2Fyb3VzZWwudXBkYXRlTWF4U2hvdyhzZWxmLmdldE1heFNob3coKSlcbiAgICB9KTtcbiAgfSxcblxuICBnZXRNYXhTaG93OiAoKSA9PiBBUFAuX1cgPiA5NjAgPyAzIDogQVBQLl9XID4gNjQwICYmIEFQUC5fVyA8PSA5NjAgPyAyIDogMVxufTsiLCIvKioqIFBBR0UgLSBUQUxFTlQgU0VSVklDRVMgKioqL1xuQVBQLnRhbGVudFNlcnZpY2VzID0ge1xuICBfZWw6IHt9LFxuICBfYlNsaWRlcjoge30sXG4gIF9iQ2Fyb3VzZWw6IHt9LFxuICBfc0Nhcm91c2VsOiB7fSxcbiAgX3ZpZFNlY3Rpb246IHt9LFxuXG5cdGluaXQ6IGZ1bmN0aW9uKCkge1xuICAgIGxldCBzZWxmID0gdGhpcztcbiAgICBzZWxmLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHNlbGYuX2JTbGlkZXIgPSBuZXcgU2xpZGVyKHNlbGYuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5iYW5uZXItc2xpZGVyJyksIDApO1xuICAgIHNlbGYuX2JDYXJvdXNlbCA9IG5ldyBDYXJvdXNlbChzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcuYmVuZWZpdCAuY2Fyb3VzZWwnKSwgdHJ1ZSwgc2VsZi5nZXRNYXhCZW5lZml0U2hvdygpKTtcbiAgICBzZWxmLl9zQ2Fyb3VzZWwgPSBuZXcgQ2Fyb3VzZWwoc2VsZi5fZWwucXVlcnlTZWxlY3RvcignLnNlcnZpY2UtYm9hcmQgLmNhcm91c2VsJyksIHRydWUsIHNlbGYuZ2V0TWF4U2VydmljZVNob3coKSk7XG4gICAgc2VsZi5fdmlkU2VjdGlvbiA9IG5ldyBWaWRlb1NlY3Rpb24oc2VsZi5fZWwucXVlcnlTZWxlY3RvcignLnZpZC1zZWN0aW9uJykpO1xuICAgIHNlbGYuaW5pdEV2ZW50KCk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50OiBmdW5jdGlvbigpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihTSVpFX0NIQU5HRUQsICgpID0+IHtcbiAgICAgIHNlbGYuX2JDYXJvdXNlbC51cGRhdGVNYXhTaG93KHNlbGYuZ2V0TWF4QmVuZWZpdFNob3coKSksXG4gICAgICBzZWxmLl9zQ2Fyb3VzZWwudXBkYXRlTWF4U2hvdyhzZWxmLmdldE1heFNlcnZpY2VTaG93KCkpXG4gICAgfSk7XG4gIH0sXG5cbiAgZ2V0TWF4QmVuZWZpdFNob3c6ICgpID0+IEFQUC5fVyA+IDEyMDAgPyA0IDogQVBQLl9XID4gOTYwICYmIEFQUC5fVyA8PSAxMjAwID8gMyA6IEFQUC5fVyA+IDY0MCAmJiBBUFAuX1cgPD0gOTYwID8gMiA6IDEsXG4gIGdldE1heFNlcnZpY2VTaG93OiAoKSA9PiBBUFAuX1cgPiA5NjAgPyAzIDogQVBQLl9XID4gNjQwICYmIEFQUC5fVyA8PSA5NjAgPyAyIDogMVxufTtcbiIsIi8qKiogUEFHRSAtIENBU1RJTkcgU0VSVklDRVMgKioqL1xuQVBQLmNhc3RpbmdTZXJ2aWNlcyA9IHtcbiAgX2VsOiB7fSxcbiAgX3NDYXJvdXNlbDoge30sXG4gIF92aWRTZWN0aW9uOiB7fSxcblxuXHRpbml0OiBmdW5jdGlvbigpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gICAgc2VsZi5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICBzZWxmLl9zQ2Fyb3VzZWwgPSBuZXcgQ2Fyb3VzZWwoc2VsZi5fZWwucXVlcnlTZWxlY3RvcignLnNlcnZpY2UtYm9hcmQgLmNhcm91c2VsJyksIHRydWUsIHNlbGYuZ2V0TWF4U2hvdygpKTtcbiAgICBzZWxmLl92aWRTZWN0aW9uID0gbmV3IFZpZGVvU2VjdGlvbihzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcudmlkLXNlY3Rpb24nKSk7XG4gICAgc2VsZi5pbml0RXZlbnQoKTtcbiAgfSxcblxuICBpbml0RXZlbnQ6IGZ1bmN0aW9uKCkge1xuICAgIGxldCBzZWxmID0gdGhpcztcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFNJWkVfQ0hBTkdFRCwgc2VsZi5fc0Nhcm91c2VsLnVwZGF0ZU1heFNob3coc2VsZi5nZXRNYXhTaG93KCkpKTtcbiAgfSxcblxuICBnZXRNYXhTaG93OiAoKSA9PiBBUFAuX1cgPiA5NjAgPyAzIDogQVBQLl9XID4gNjQwICYmIEFQUC5fVyA8PSA5NjAgPyAyIDogMVxufTsiLCIvKioqIFBBR0UgLSBTSUdOVVAgKioqL1xuQVBQLnNpZ251cCA9IHtcbiAgX2VsOiB7fSxcbiAgX3NpZ25VcFRhbGVudDoge30sXG4gIF9zaWduVXBDbGllbnQ6IHt9LFxuICBfYnRuU2lnblVwVGFsZW50OiB7fSxcbiAgX2J0blNpZ25VcENsaWVudDoge30sXG5cblx0aW5pdDogZnVuY3Rpb24oKSB7XG4gICAgbGV0IHNlbGYgPSB0aGlzO1xuICAgIHNlbGYuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgc2VsZi5fYnRuU2lnblVwVGFsZW50ID0gc2VsZi5fZWwucXVlcnlTZWxlY3RvcignLmJ0bi1zaWdudXAtdGFsZW50Jyk7XG4gICAgc2VsZi5fYnRuU2lnblVwQ2xpZW50ID0gc2VsZi5fZWwucXVlcnlTZWxlY3RvcignLmJ0bi1zaWdudXAtY2xpZW50Jyk7XG4gICAgc2VsZi5fc2lnblVwVGFsZW50ID0gbmV3IFNpZ25VcFBvcHVwKHNlbGYuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5zaWdudXAtdGFsZW50JykpO1xuICAgIHNlbGYuX3NpZ25VcENsaWVudCA9IG5ldyBTaWduVXBQb3B1cChzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcuc2lnbnVwLWNsaWVudCcpKTtcblxuICAgIHNlbGYuaW5pdEV2ZW50KCk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50OiBmdW5jdGlvbigpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gICAgc2VsZi5fYnRuU2lnblVwVGFsZW50LmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIChlKSA9PiB7XG4gICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICBjb25zb2xlLmxvZygnX2J0blNpZ25VcFRhbGVudCcpO1xuICAgICAgc2VsZi5fc2lnblVwVGFsZW50LnNob3coKTtcbiAgICB9KTtcblxuICAgIHNlbGYuX2J0blNpZ25VcENsaWVudC5hZGRFdmVudExpc3RlbmVyKENMSUNLLCAoZSkgPT4ge1xuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgc2VsZi5fc2lnblVwQ2xpZW50LnNob3coKTtcbiAgICB9KTtcbiAgfVxufTsiLCIvKioqIFBBR0UgLSBMT0dJTiAqKiovXG5BUFAubG9naW4gPSB7XG4gIF9lbDoge30sXG4gIF9sb2dpbkZvcm06IHt9LFxuXG5cdGluaXQ6IGZ1bmN0aW9uKCkge1xuICAgIGxldCBzZWxmID0gdGhpcztcbiAgICBzZWxmLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHNlbGYuX2xvZ2luRm9ybSA9IG5ldyBGb3JtKHNlbGYuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNsb2dpbi1mb3JtJykpO1xuICAgIHNlbGYuaW5pdEV2ZW50KCk7XG4gICAgLy8gbGV0IHdyYXAgPSBuZXcgSW5wdXRXcmFwKHNlbGYuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5pbnB1dC13cmFwJykpO1xuICB9LFxuXG4gIGluaXRFdmVudDogZnVuY3Rpb24oKSB7XG4gICAgbGV0IHNlbGYgPSB0aGlzO1xuICB9XG59OyIsIi8qKiogUEFHRSAtIEFCT1VUIFVTICoqKi9cbkFQUC5hYm91dFVzID0ge1xuICBfZWw6IHt9LFxuXG5cdGluaXQ6IGZ1bmN0aW9uKCkge1xuICAgIGxldCBzZWxmID0gdGhpcztcbiAgICBzZWxmLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHNlbGYuaW5pdEV2ZW50KCk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50OiBmdW5jdGlvbigpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gIH1cbn07IiwiLyoqKiBQQUdFIC0gUE9TVCBERVRBSUxTICoqKi9cbkFQUC5wb3N0RGV0YWlscyA9IHtcbiAgX2VsOiB7fSxcbiAgX2FTbGlkZXI6IHt9LFxuXG5cdGluaXQ6IGZ1bmN0aW9uKCkge1xuICAgIGxldCBzZWxmID0gdGhpcztcbiAgICBzZWxmLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHNlbGYuX2FTbGlkZXIgPSBuZXcgU2xpZGVyKHNlbGYuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5hc2lkZS1zbGlkZXInKSwgMCk7XG4gICAgc2VsZi5pbml0RXZlbnQoKTtcbiAgfSxcblxuICBpbml0RXZlbnQ6IGZ1bmN0aW9uKCkge1xuICAgIGxldCBzZWxmID0gdGhpcztcbiAgfVxufTsiLCIvKioqKiogU2Nyb2xsQW5pbWF0b3IgKioqKiovXG5sZXQgU2Nyb2xsQW5pbWF0b3IgPSBmdW5jdGlvbihlbGVtZW50KSB7XG5cblx0bGV0IGVsID0gJChlbGVtZW50KSxcblx0XHRcdGV2ZW50ID0gJ3Njcm9sbCcsXG5cblx0XHRcdHRyaWdnZXJSYW5nZSA9IDAsXG5cdFx0XHR0cmlnZ2VyU3RhcnQgPSAwLFxuXHRcdFx0dHJpZ2dlckVuZCA9IDAsXG5cblx0XHRcdHNldHRpbmcgPSBuZXcgU2Nyb2xsU2V0dGluZyhlbCksXG5cdFx0XHR0YXJnZXQgPSBlbC5kYXRhKCd0YXJnZXQnKSxcblx0XHRcdHR3ID0gbnVsbCxcblx0XHRcdGlzRW5kID0gZmFsc2UsXG5cdFx0XHRwcmVSdW4gPSBmYWxzZTtcblxuXHQoKCkgPT4ge1xuXHRcdGdldFRhcmdldCgpO1xuXHRcdGNhbGNSYW5nZSgpO1xuXHRcdGluaXRFdmVudCgpO1xuXHRcdC8vIGNoZWNrSW5WaWV3KCk7XG5cdFx0Y29uc29sZS5sb2codHJpZ2dlclN0YXJ0LCB0cmlnZ2VyRW5kLCB0cmlnZ2VyUmFuZ2UpO1xuXHR9KSgpO1xuXG5cdGZ1bmN0aW9uIGNoZWNrSW5WaWV3KCkge1xuXHRcdGxldCBvZmZzZXQgPSBlbC5vZmZzZXQoKSxcblx0XHRcdFx0cG9zWSA9IG9mZnNldC50b3AgLSAkKHdpbmRvdykuc2Nyb2xsVG9wKCk7XG5cblx0XHQvLyBjb25zb2xlLmxvZyhwb3NZLCB0cmlnZ2VyU3RhcnQpO1xuXHRcdGlmIChwb3NZIDwgQVBQLl9IKSB7XG5cdFx0XHR0dyAmJiB0dy5raWxsKCk7XG5cdFx0XHRUd2Vlbk1heC5zZXQodGFyZ2V0LCBzZXR0aW5nLmdldCgwKSk7XG5cdFx0XHR0dyA9IFR3ZWVuTWF4LnRvKHRhcmdldCwgMSwgc2V0dGluZy5nZXQoMSkpO1xuXHRcdFx0cHJlUnVuID0gdHJ1ZTtcblx0XHR9XG5cdH1cblxuXHRmdW5jdGlvbiBnZXRUYXJnZXQoKSB7XG5cdFx0c3dpdGNoKHRhcmdldCkge1xuXHRcdFx0Y2FzZSB1bmRlZmluZWQ6IHRhcmdldCA9IGVsOyBicmVhaztcblx0XHRcdGNhc2UgJ25leHQnOiB0YXJnZXQgPSBlbC5uZXh0KCk7IGJyZWFrO1xuXHRcdFx0ZGVmYXVsdDogdGFyZ2V0ID0gJCh0YXJnZXQpOyBicmVhaztcblx0XHR9XG5cdH1cblxuXHRmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG5cdFx0JCh3aW5kb3cpLm9uKGV2ZW50LCBzY3JvbGwpO1xuXHRcdGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCBjYWxjUmFuZ2UpO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2FsY1JhbmdlKCkge1xuXHRcdHRyaWdnZXJSYW5nZSA9IChwYXJzZUludChlbC5kYXRhKCdyYW5nZScpKSAqIEFQUC5fSCkgLyAxMDA7XG5cdFx0dHJpZ2dlclN0YXJ0ID0gKHBhcnNlSW50KGVsLmRhdGEoJ3N0YXJ0JykpICogQVBQLl9IKSAvIDEwMDtcblx0XHR0cmlnZ2VyRW5kID0gdHJpZ2dlclN0YXJ0IC0gdHJpZ2dlclJhbmdlO1xuXG5cblx0fVxuXG5cdGZ1bmN0aW9uIHNjcm9sbChlKSB7XG5cdFx0Ly9pZiAoQVBQLl9pc1Njcm9sbCkgcmV0dXJuIHRydWU7XG5cdFx0bGV0IG9mZnNldCA9IGVsLm9mZnNldCgpLFxuXHRcdFx0XHRwb3NZID0gb2Zmc2V0LnRvcCAtICQod2luZG93KS5zY3JvbGxUb3AoKSxcblx0XHRcdFx0Ly9wb3NYID0gb2Zmc2V0LmxlZnQgLSAkKHdpbmRvdykuc2Nyb2xsTGVmdCgpLFxuXHRcdFx0XHRwcm9ncmVzcyA9IDA7XG5cblx0XHQvLyBjb25zb2xlLmxvZyhwb3NZLCB0cmlnZ2VyRW5kKTtcblxuXHRcdGlmIChwb3NZIDwgdHJpZ2dlckVuZCkge1xuXHRcdFx0cHJlUnVuID0gZmFsc2U7XG5cdFx0XHRpc0VuZCA9IGlzRW5kICYmICh0dyAmJiB0dy5raWxsKCksIHR3ID0gVHdlZW5NYXgudG8odGFyZ2V0LCAwLjEsIHNldHRpbmcuZ2V0KDEpKSwgZmFsc2UpO1xuXHRcdH1cblxuXHRcdGlmIChpc0VuZCAmJiBwb3NZIDwgdHJpZ2dlckVuZCkge1xuXHRcdFx0Ly9jb25zb2xlLmxvZygnZW5kJywgcG9zWSk7XG5cdFx0XHR0dyAmJiB0dy5raWxsKCk7XG5cdFx0XHR0dyA9IFR3ZWVuTWF4LnRvKHRhcmdldCwgMC4xLCBzZXR0aW5nLmdldCgxKSk7XG5cdFx0XHRpc0VuZCA9IGZhbHNlO1xuXHRcdH1cblxuXHRcdGlmIChpc0VuZCAmJiBwb3NZID4gdHJpZ2dlclN0YXJ0KSB7XG5cdFx0XHQvL2NvbnNvbGUubG9nKCdlbmQnLCBwb3NZKTtcblx0XHRcdHR3ICYmIHR3LmtpbGwoKTtcblx0XHRcdHR3ID0gVHdlZW5NYXgudG8odGFyZ2V0LCAwLjEsIHNldHRpbmcuZ2V0KDApKTtcblx0XHRcdGlzRW5kID0gZmFsc2U7XG5cdFx0fVxuXG5cdFx0aWYgKHByZVJ1biB8fCBwb3NZID4gdHJpZ2dlclN0YXJ0IHx8IHBvc1kgPCB0cmlnZ2VyRW5kKSByZXR1cm4gdHJ1ZTtcblx0XHRwcm9ncmVzcyA9IGNhbGNQcm9ncmVzcyhwb3NZIC0gdHJpZ2dlckVuZCk7XG5cdFx0aXNFbmQgPSB0cnVlO1xuXG5cdFx0Ly9jb25zb2xlLmxvZyhwb3NZLCBwcm9ncmVzcyk7XG5cdFx0dHcgJiYgdHcua2lsbCgpO1xuXHRcdHR3ID0gVHdlZW5NYXgudG8odGFyZ2V0LCAwLjEsIHNldHRpbmcuZ2V0KHByb2dyZXNzKSk7XG5cdH1cblxuXHRmdW5jdGlvbiBjYWxjUHJvZ3Jlc3MocHJvZ3Jlc3MpIHtcblx0XHRyZXR1cm4gKCh0cmlnZ2VyUmFuZ2UgLSBwcm9ncmVzcykgLyB0cmlnZ2VyUmFuZ2UpO1xuXHR9XG5cblx0cmV0dXJuIHRoaXM7XG59OyIsIi8qKioqKiBTY3JvbGxTZXR0aW5nICoqKioqL1xubGV0IFNjcm9sbFNldHRpbmcgPSBmdW5jdGlvbihlbGVtZW50KSB7XG5cblx0bGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIHN0YXJ0QXR0ciA9IHt9LFxuICAgICAgZW5kQXR0ciA9IHt9LFxuXHRcdFx0YWxwaGEgPSB7fSxcblx0XHRcdHNjYWxlID0ge30sXG5cdFx0XHR0ZnggPSB7fSxcblx0XHRcdHRmeSA9IHt9O1xuXG5cdCgoKSA9PiBpbml0VHJhbnNmb3JtKCkpKCk7XG5cdGZ1bmN0aW9uIGluaXRUcmFuc2Zvcm0oKSB7XG5cdFx0aW5pdEFscGhhKCk7XG5cdFx0aW5pdFNjYWxlKCk7XG5cdFx0aW5pdFRmeCgpO1xuXHRcdGluaXRUZnkoKTtcblx0XHRnZXRTdGF0ZSgpO1xuXHR9XG5cblx0ZnVuY3Rpb24gaW5pdEFscGhhKCkge1xuXHRcdGxldCBhdHRyID0gZWwuZGF0YSgnYWxwaGEnKTtcblx0XHRhbHBoYS5zdGFydCA9IGF0dHIgPyAoYWxwaGEuZnJvbSA9IHBhcnNlRmxvYXQoZWwuZGF0YSgnYWxwaGEtZnJvbScpKSwgYWxwaGEudG8gPSBwYXJzZUZsb2F0KGVsLmRhdGEoJ2FscGhhLXRvJykpLCBhbHBoYS5vZmZzZXQgPSBhbHBoYS50byAtIGFscGhhLmZyb20sIHRydWUpIDogZmFsc2U7XG5cdFx0Ly9jb25zb2xlLmxvZyhhbHBoYSk7XG5cdH1cblxuXHRmdW5jdGlvbiBpbml0U2NhbGUoKSB7XG5cdFx0bGV0IGF0dHIgPSBlbC5kYXRhKCdzY2FsZScpO1xuXHRcdHNjYWxlLnN0YXJ0ID0gYXR0ciA/IChzY2FsZS5mcm9tID0gcGFyc2VGbG9hdChlbC5kYXRhKCdzY2FsZS1mcm9tJykpLCBzY2FsZS50byA9IHBhcnNlRmxvYXQoZWwuZGF0YSgnc2NhbGUtdG8nKSksIHNjYWxlLm9mZnNldCA9IHNjYWxlLnRvIC0gc2NhbGUuZnJvbSwgdHJ1ZSkgOiBmYWxzZTtcblx0XHQvL2NvbnNvbGUubG9nKHNjYWxlKTtcblx0fVxuXG5cdGZ1bmN0aW9uIGluaXRUZngoKSB7XG5cdFx0bGV0IGF0dHIgPSBlbC5kYXRhKCd0ZngnKTtcblx0XHR0Znguc3RhcnQgPSBhdHRyID8gKHRmeC5mcm9tID0gcGFyc2VJbnQoZWwuZGF0YSgndGZ4LWZyb20nKSksIHRmeC50byA9IHBhcnNlSW50KGVsLmRhdGEoJ3RmeC10bycpKSwgdGZ4Lm9mZnNldCA9IHRmeC50byAtIHRmeC5mcm9tLCB0cnVlKSA6IGZhbHNlO1xuXHRcdC8vY29uc29sZS5sb2codGZ4KTtcblx0IH1cblxuXHRmdW5jdGlvbiBpbml0VGZ5KCkge1xuXHRcdGxldCBhdHRyID0gZWwuZGF0YSgndGZ5Jyk7XG5cdFx0dGZ5LnN0YXJ0ID0gYXR0ciA/ICh0ZnkuZnJvbSA9IHBhcnNlSW50KGVsLmRhdGEoJ3RmeS1mcm9tJykpLCB0ZnkudG8gPSBwYXJzZUludChlbC5kYXRhKCd0ZnktdG8nKSksIHRmeS5vZmZzZXQgPSB0ZnkudG8gLSB0ZnkuZnJvbSwgdHJ1ZSkgOiBmYWxzZTtcblx0XHQvLyBjb25zb2xlLmxvZyh0ZnkpO1xuXHR9XG5cblx0ZnVuY3Rpb24gZ2V0U3RhdGUoKSB7XG5cdFx0c3RhcnRBdHRyID0geyBmb3JjZTNEOiB0cnVlLCBlYXNlOiBFeHBvLmVhc2VPdXQgfTtcblx0XHRlbmRBdHRyID0geyBmb3JjZTNEOiB0cnVlLCBlYXNlOiBFeHBvLmVhc2VPdXQgfTtcblx0XHRhbHBoYS5zdGFydCAmJiAoc3RhcnRBdHRyLmF1dG9BbHBoYSA9IGFscGhhLmZyb20sIGVuZEF0dHIuYXV0b0FscGhhID0gYWxwaGEudG8pO1xuXHRcdHNjYWxlLnN0YXJ0ICYmIChzdGFydEF0dHIuc2NhbGUgPSBzY2FsZS5mcm9tLCBlbmRBdHRyLnNjYWxlID0gc2NhbGUudG8pO1xuXHRcdHRmeC5zdGFydCAmJiAoc3RhcnRBdHRyLnggPSB0ZnguZnJvbSwgZW5kQXR0ci54ID0gdGZ4LnRvKTtcblx0XHR0Znkuc3RhcnQgJiYgKHN0YXJ0QXR0ci55ID0gdGZ5LmZyb20sIGVuZEF0dHIueSA9IHRmeS50byk7XG5cdH1cblxuICB0aGlzLmdldCA9IGZ1bmN0aW9uKHByb2dyZXNzKSB7XG4gICAgbGV0IHNldHRpbmdzID0ge307XG4gICAgc3dpdGNoKHByb2dyZXNzKSB7XG4gICAgICBjYXNlIDA6IHJldHVybiBzdGFydEF0dHI7XG4gICAgICBjYXNlIDE6IHJldHVybiBlbmRBdHRyO1xuICAgICAgZGVmYXVsdDoge1xuICAgICAgICBzZXR0aW5ncyA9IHsgZm9yY2UzRDogdHJ1ZSwgZWFzZTogRXhwby5lYXNlT3V0IH07XG4gICAgICAgIGFscGhhLnN0YXJ0ICYmIChzZXR0aW5ncy5hdXRvQWxwaGEgPSAocHJvZ3Jlc3MgKiBhbHBoYS5vZmZzZXQpICsgYWxwaGEuZnJvbSk7XG4gICAgICAgIHNjYWxlLnN0YXJ0ICYmIChzZXR0aW5ncy5zY2FsZSA9IChwcm9ncmVzcyAqIHNjYWxlLm9mZnNldCkgKyBzY2FsZS5mcm9tKTtcbiAgICAgICAgdGZ4LnN0YXJ0ICYmIChzZXR0aW5ncy54ID0gKHByb2dyZXNzICogdGZ4Lm9mZnNldCkgKyB0ZnguZnJvbSk7XG4gICAgICAgIHRmeS5zdGFydCAmJiAoc2V0dGluZ3MueSA9IChwcm9ncmVzcyAqIHRmeS5vZmZzZXQpICsgdGZ5LmZyb20pO1xuICAgICAgICByZXR1cm4gc2V0dGluZ3M7XG4gICAgICB9XG4gICAgfVxuICB9XG5cblx0cmV0dXJuIHRoaXM7XG59OyIsIi8qKioqKiBTY3JvbGxUcmlnZ2VyICoqKioqL1xubGV0IFNjcm9sbFRyaWdnZXIgPSBmdW5jdGlvbihlbGVtZW50KSB7XG5cblx0bGV0IGVsID0gJChlbGVtZW50KSxcblx0XHRcdGV2ZW50ID0gJ3Njcm9sbCcsXG5cdFx0XHR0cmlnZ2VyU3RhcnQgPSAwLFxuXHRcdFx0dGltZSA9IDEsXG4gICAgICBzZXR0aW5nID0gbmV3IFNjcm9sbFNldHRpbmcoZWwpLFxuICAgICAgdGFyZ2V0ID0gZWwuZGF0YSgndGFyZ2V0JyksXG4gICAgICB0dyA9IG51bGwsXG4gICAgICBydW5TdGFydCA9IGZhbHNlLFxuICAgICAgcnVuRW5kID0gZmFsc2U7XG5cblx0KCgpID0+IHtcblx0XHRnZXRUYXJnZXQoKTtcblx0XHRjYWxjUmFuZ2UoKTtcblx0XHRpbml0RXZlbnQoKTtcbiAgICBjaGVja0luVmlldygpO1xuXHR9KSgpO1xuXG5cdGZ1bmN0aW9uIGNoZWNrSW5WaWV3KCkge1xuXHRcdGxldCBvZmZzZXQgPSBlbC5vZmZzZXQoKSxcblx0XHRcdFx0cG9zWSA9IG9mZnNldC50b3AgLSAkKHdpbmRvdykuc2Nyb2xsVG9wKCk7XG5cblxuXHRcdGlmIChwb3NZIDwgQVBQLl9IKSB7XG5cdFx0XHR0dyAmJiB0dy5raWxsKCk7XG5cdFx0XHRUd2Vlbk1heC5zZXQodGFyZ2V0LCBzZXR0aW5nLmdldCgwKSk7XG5cdFx0XHR0dyA9IFR3ZWVuTWF4LnRvKHRhcmdldCwgdGltZSwgc2V0dGluZy5nZXQoMSkpO1xuXHRcdFx0cnVuU3RhcnQgPSB0cnVlO1xuXHRcdH1cblx0fVxuXG5cdGZ1bmN0aW9uIGdldFRhcmdldCgpIHtcblx0XHRzd2l0Y2godGFyZ2V0KSB7XG5cdFx0XHRjYXNlIHVuZGVmaW5lZDogdGFyZ2V0ID0gZWw7IGJyZWFrO1xuXHRcdFx0Y2FzZSAnbmV4dCc6IHRhcmdldCA9IGVsLm5leHQoKTsgYnJlYWs7XG5cdFx0XHRkZWZhdWx0OiB0YXJnZXQgPSAkKHRhcmdldCk7IGJyZWFrO1xuICAgIH1cblx0fVxuXG5cdGZ1bmN0aW9uIGluaXRFdmVudCgpIHtcblx0XHQkKHdpbmRvdykub24oZXZlbnQsIHNjcm9sbCk7XG5cdFx0ZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihTSVpFX0NIQU5HRUQsIGNhbGNSYW5nZSk7XG5cdH1cblxuXHRmdW5jdGlvbiBjYWxjUmFuZ2UoKSB7XG5cdFx0dHJpZ2dlclN0YXJ0ID0gKHBhcnNlSW50KGVsLmRhdGEoJ3N0YXJ0JykpICogQVBQLl9IKSAvIDEwMDtcbiAgfVxuXG5cdGZ1bmN0aW9uIHNjcm9sbChlKSB7XG5cdFx0Ly9pZiAoQVBQLl9pc1Njcm9sbCkgcmV0dXJuIHRydWU7XG5cdFx0bGV0IG9mZnNldCA9IGVsLm9mZnNldCgpLFxuICAgICAgICBwb3NZID0gb2Zmc2V0LnRvcCAtICQod2luZG93KS5zY3JvbGxUb3AoKTtcblxuXG4gICAgaWYgKCFydW5TdGFydCAmJiBwb3NZIDwgdHJpZ2dlclN0YXJ0KSB7XG4gICAgICB0dyAmJiB0dy5raWxsKCk7XG4gICAgICB0dyA9IFR3ZWVuTWF4LnRvKHRhcmdldCwgdGltZSwgc2V0dGluZy5nZXQoMSkpO1xuICAgICAgcnVuU3RhcnQgPSB0cnVlO1xuICAgICAgcnVuRW5kID0gZmFsc2U7XG4gICAgICBjb25zb2xlLmxvZygncnVuU3RhcnQnKTtcbiAgICB9XG5cbiAgICBpZiAoIXJ1bkVuZCAmJiBwb3NZID4gdHJpZ2dlclN0YXJ0KSB7XG4gICAgICB0dyAmJiB0dy5raWxsKCk7XG4gICAgICB0dyA9IFR3ZWVuTWF4LnRvKHRhcmdldCwgdGltZSwgc2V0dGluZy5nZXQoMCkpO1xuICAgICAgcnVuRW5kID0gdHJ1ZTtcbiAgICAgIHJ1blN0YXJ0ID0gZmFsc2U7XG4gICAgICBjb25zb2xlLmxvZygncnVuRW5kJyk7XG4gICAgfVxuXHR9XG5cblx0cmV0dXJuIHRoaXM7XG59OyIsIi8qKioqKiBDaGVjayBCb3ggKioqKiovXG5sZXQgQ2h4Qm94ID0gZnVuY3Rpb24oZWxlbWVudCkge1xuXHRsZXQgZWwgPSAkKGVsZW1lbnQpLFxuXHRcdFx0aW5wdXQgPSBlbC5maW5kKCdpbnB1dCcpLFxuICAgICAgd2FybmluZyA9IGVsLmZpbmQoJy53YXJuaW5nJyksXG5cdFx0XHR0eHRScSA9IGlucHV0LmF0dHIoJ3JlcXVpcmVkLXR4dCcpLFxuICAgICAgaXNScSA9IGVsLmRhdGEoJ3JlcXVpcmVkJykgPyB0cnVlIDogZmFsc2U7XG5cbiAgKCgpID0+IGluaXRFdmVudCgpKSgpO1xuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgaW5wdXQub24oJ2NoYW5nZScsICgpID0+IHdhcm5pbmcuaGlkZSgpKTtcbiAgfVxuXG4gIHRoaXMudmFsaWRhdGUgPSAoKSA9PiBpc1JxID8gKGlucHV0LmlzKCc6Y2hlY2tlZCcpID8gdHJ1ZSA6ICh3YXJuaW5nLnRleHQodHh0UnEpLnNob3coKSwgZmFsc2UpKSA6IHRydWU7XG5cdHRoaXMucmVzZXQgPSAoKSA9PiAoaW5wdXQucHJvcCgnY2hlY2tlZCcsIGZhbHNlKSwgd2FybmluZy5oaWRlKCkpO1xuXHRyZXR1cm4gdGhpcztcbn07IiwiLyoqKioqIEZvcm0gKioqKiovXG5sZXQgRm9ybSA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcblxuXHRsZXQgZWwgPSAkKGVsZW1lbnQpLFxuXHRcdFx0YWpheFVSTCA9IGVsLmRhdGEoJ3VybCcpLFxuXHRcdFx0c1dhcm5pbmcgPSBlbC5maW5kKCcud2FybmluZy1zZXJ2ZXInKSxcblxuXHRcdFx0aW5wdXRzID0gZWwuZmluZCgnaW5wdXQnKSxcblx0XHRcdGlucHV0UnEgPSBlbC5maW5kKCcuJyArIENMQVNTLl9yZXF1aXJlKSxcblx0XHRcdGlucHV0TWluID0gZWwuZmluZCgnLicgKyBDTEFTUy5fbWluKSxcblx0XHRcdGlucHV0TWF4ID0gZWwuZmluZCgnLicgKyBDTEFTUy5fbWF4KSxcbiAgICAgIGlucHV0RW0gPSBlbC5maW5kKCcuJyArIENMQVNTLl9lbWFpbCksXG5cdFx0XHRpbnB1dENmID0gZWwuZmluZCgnLmpzLWNvbmZpcm0nKSxcblxuXHRcdFx0dGV4dGFyZWEgPSBlbC5maW5kKCd0ZXh0YXJlYScpLFxuXHRcdFx0c2wgPSBlbC5maW5kKCcuc2wtd3JhcCcpLFxuXHRcdFx0Y2h4ID0gZWwuZmluZCgnLmNoeC13cmFwJyksXG5cdFx0XHRqc051bSA9IGVsLmZpbmQoJy5qcy1udW0nKSxcblx0XHRcdGpzRGF0ZSA9IGVsLmZpbmQoJy5qcy1kYXRlJyksXG5cdFx0XHRzbEJveCA9IFtdLFxuXHRcdFx0Y2h4Qm94ID0gW10sXG5cdFx0XHRpcERhdGUgPSBbXSxcblxuXHRcdFx0YnRuU2hvd1B3ID0gZWwuZmluZCgnLmJ0bi1zaG93LXB3JyksXG4gICAgICBidG5TdWJtaXQgPSBlbC5maW5kKCcuYnRuLXN1Ym1pdCcpLFxuXG5cdFx0XHR0eHRScSA9ICdyZXF1aXJlZC10eHQnLFxuXHRcdFx0dHh0TWluID0gJ21pbi10eHQnLFxuXHRcdFx0dHh0TWF4ID0gJ21heC10eHQnLFxuXHRcdFx0dHh0RW0gPSAnZW1haWwtdHh0Jyxcblx0XHRcdHR4dENmID0gJ2NmLXR4dCc7XG5cblx0KCgpID0+IHtcblx0XHRpbml0RXZlbnQoKTtcblx0XHRzbC5sZW5ndGggPiAwICYmIHNsLmVhY2goKGksIGUpID0+IHNsQm94W2ldID0gbmV3IFNsQm94KGUpKTtcblx0XHRjaHgubGVuZ3RoID4gMCAmJiBjaHguZWFjaCgoaSwgZSkgPT4gY2h4Qm94W2ldID0gbmV3IENoeEJveChlKSk7XG5cdFx0anNEYXRlLmxlbmd0aCA+IDAgJiYganNEYXRlLmVhY2goKGksIGUpID0+IGlwRGF0ZVtpXSA9IG5ldyBJbnB1dERhdGUoZSkpO1xuXHR9KSgpO1xuXG5cdGZ1bmN0aW9uIGluaXRFdmVudCgpIHtcblx0XHRpbnB1dHMub24oRl9JTiwgYWN0aXZlV3JhcCkub24oRl9PVVQsIGRlYWN0aXZlV3JhcCk7XG5cdFx0aW5wdXRScS5vbihGX0lOLCBpbnB1dEZvY3VzKTtcblx0XHRidG5TaG93UHcub24oQ0xJQ0ssIHRvZ2dlbFBhc3MpO1xuXHRcdGJ0blN1Ym1pdC5vbihDTElDSywgc3VibWl0Q2xpY2tlZCk7XG5cdFx0anNOdW0ubGVuZ3RoID4gMCAmJiBqc051bS5vbignaW5wdXQnLCBmaWx0ZXJOdW1iZXIpO1xuXHR9XG5cblx0ZnVuY3Rpb24gZmlsdGVyTnVtYmVyKCkge1xuXHRcdHRoaXMudmFsdWUgPSB0aGlzLnZhbHVlLnJlcGxhY2UoL1teMC05XS9nLCAnJyk7XG5cdH1cblxuXHRmdW5jdGlvbiBhY3RpdmVXcmFwKCkge1xuXHRcdGxldCBpbnB1dCA9ICQodGhpcyksXG5cdFx0XHRcdHdyYXAgPSBpbnB1dC5wYXJlbnRzKCcuaW5wdXQtd3JhcCcpO1xuXHRcdHdyYXAubGVuZ3RoID4gMCAmJiB3cmFwLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpO1xuXHR9XG5cblx0ZnVuY3Rpb24gZGVhY3RpdmVXcmFwKCkge1xuXHRcdGxldCBpbnB1dCA9ICQodGhpcyksXG5cdFx0XHRcdHdyYXAgPSBpbnB1dC5wYXJlbnRzKCcuaW5wdXQtd3JhcCcpO1xuXHRcdHdyYXAubGVuZ3RoID4gMCAmJiAkLnRyaW0oaW5wdXQudmFsKCkpLmxlbmd0aCA9PT0gMCAmJiB3cmFwLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuXHR9XG5cblx0ZnVuY3Rpb24gaW5wdXRGb2N1cyhlKSB7XG4gICAgbGV0IGlucHV0ID0gJCh0aGlzKSxcbiAgICAgICAgd2FybmluZyA9IGlucHV0LnBhcmVudCgpLm5leHQoJy53YXJuaW5nJyk7XG5cdFx0aW5wdXQuaGFzQ2xhc3MoQ0xBU1MuX2Vycm9yKSAmJiAoaW5wdXQucmVtb3ZlQ2xhc3MoQ0xBU1MuX2Vycm9yKSwgd2FybmluZy5yZW1vdmVDbGFzcyhDTEFTUy5fZGxleCkpO1xuXHR9XG5cblx0ZnVuY3Rpb24gdG9nZ2VsUGFzcyhlKSB7XG5cdFx0ZS5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdGxldCBidG4gPSAkKHRoaXMpLFxuXHRcdFx0XHRpbnB1dCA9IGJ0bi5wYXJlbnQoKS5maW5kKCdpbnB1dCcpO1xuXG5cdFx0YnRuLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpID8gKGJ0bi5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKSwgaW5wdXQuZ2V0KDApLnR5cGUgPSAncGFzc3dvcmQnKSA6IChidG4uYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSksIGlucHV0LmdldCgwKS50eXBlID0gJ3RleHQnKTtcblx0fVxuXG5cdGZ1bmN0aW9uIHN1Ym1pdENsaWNrZWQoZSkge1xuXHRcdGUucHJldmVudERlZmF1bHQoKTtcblx0XHRsZXQgcGFzcyA9IHRydWU7XG5cdFx0cGFzcyA9IGNoZWNrUmVxdWlyZSgpO1xuXHRcdHBhc3MgJiYgKHBhc3MgPSBjaGVja01pbigpKTtcblx0XHRwYXNzICYmIChwYXNzID0gY2hlY2tNYXgoKSk7XG5cdFx0cGFzcyAmJiAocGFzcyA9IGNoZWNrQ29uZmlybSgpKTtcblx0XHRwYXNzICYmIChwYXNzID0gY2hlY2tFbWFpbCgpKTtcblx0XHRwYXNzICYmIChwYXNzID0gY2hlY2tEYXRlKCkpO1xuXHRcdHBhc3MgJiYgKHBhc3MgPSBjaGVja1NsQm94KCkpO1xuXHRcdHBhc3MgJiYgKHBhc3MgPSBjaGVja0NoeEJveCgpKTtcblx0XHRwYXNzICYmIHN1Ym1pdCgpO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2hlY2tTbEJveCgpIHtcblx0XHRsZXQgcGFzcyA9IHRydWU7XG5cdFx0Zm9yIChsZXQgaSBvZiBzbEJveCkgaS52YWxpZGF0ZSgpIHx8IChwYXNzID0gZmFsc2UpO1xuXHRcdHJldHVybiBwYXNzO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2hlY2tDaHhCb3goKSB7XG5cdFx0bGV0IHBhc3MgPSB0cnVlO1xuXHRcdGZvciAobGV0IGkgb2YgY2h4Qm94KSBpLnZhbGlkYXRlKCkgfHwgKHBhc3MgPSBmYWxzZSk7XG5cdFx0cmV0dXJuIHBhc3M7XG5cdH1cblxuXHRmdW5jdGlvbiBjaGVja0RhdGUoKSB7XG5cdFx0bGV0IHBhc3MgPSB0cnVlO1xuXHRcdGZvciAobGV0IGkgb2YgaXBEYXRlKSBpLnZhbGlkYXRlKCkgfHwgKHBhc3MgPSBmYWxzZSk7XG5cdFx0cmV0dXJuIHBhc3M7XG5cdH1cblxuXHRmdW5jdGlvbiBzdWJtaXQoKSB7XG5cdFx0QVBQLnBvcHVwLl9sb2FkaW5nLnNob3coKTtcblx0XHRzV2FybmluZy5oaWRlKCk7XG5cdFx0JC5hamF4KHtcblx0XHRcdHR5cGU6IEFQUC5fc3VibWl0TWV0aG9kLFxuXHRcdFx0dXJsOiBhamF4VVJMLFxuXHRcdFx0ZGF0YTogZWwuc2VyaWFsaXplQXJyYXkoKSxcblx0XHRcdGhlYWRlcnM6IEFQUC5faGVhZGVycyxcblx0XHRcdHN1Y2Nlc3M6IGRhdGEgPT4ge1xuXHRcdFx0XHRsZXQgc3RhdHVzID0gcGFyc2VJbnQoZGF0YS5zdGF0dXMpLFxuXHRcdFx0XHRcdFx0dGl0bGUgPSBkYXRhLnRpdGxlLFxuXHRcdFx0XHRcdFx0bWVzc2FnZSA9IGRhdGEubWVzc2FnZSxcblx0XHRcdFx0XHRcdHVybCA9IGRhdGEudXJsO1xuXG5cdFx0XHRcdEFQUC5wb3B1cC5fbG9hZGluZy5oaWRlKCk7XG5cdFx0XHRcdHN3aXRjaChzdGF0dXMpIHtcblx0XHRcdFx0XHRjYXNlIDA6IHtcblx0XHRcdFx0XHRcdHNXYXJuaW5nLnRleHQobWVzc2FnZSkuc2hvdygpO1xuXHRcdFx0XHRcdH0gYnJlYWs7XG5cdFx0XHRcdFx0Y2FzZSAxOiB7XG5cdFx0XHRcdFx0XHRyZXNldEZvcm0obWVzc2FnZSk7XG5cdFx0XHRcdFx0XHR1cmwgJiYgKHdpbmRvdy5sb2NhdGlvbi5ocmVmID0gdXJsKTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0YnJlYWs7XG5cdFx0XHRcdH1cblx0XHRcdH1cblx0XHR9KTtcblx0fVxuXG5cdGZ1bmN0aW9uIHJlc2V0Rm9ybSgpIHtcblx0XHRpbnB1dHMubGVuZ3RoID4gMCAmJiBpbnB1dHMudmFsKCcnKTtcblx0XHR0ZXh0YXJlYS5sZW5ndGggPiAwICYmIHRleHRhcmVhLnZhbCgnJyk7XG5cdFx0Zm9yIChsZXQgaSBvZiBzbEJveCkgaS5yZXNldCgpO1xuXHRcdGZvciAobGV0IGkgb2YgY2h4Qm94KSBpLnJlc2V0KCk7XG5cdH1cblxuXHRmdW5jdGlvbiBjaGVja1JlcXVpcmUoKSB7XG4gICAgbGV0IHBhc3MgPSB0cnVlLFxuXHRcdFx0XHRpbnB1dCA9IHt9LFxuICAgICAgICB3YXJuaW5nID0ge307XG5cblx0XHRpbnB1dFJxLmxlbmd0aCA9PT0gMCB8fCBpbnB1dFJxLmVhY2goKF8sIGVsKSA9PiB7XG5cdFx0XHRpbnB1dCA9ICQoZWwpO1xuXHRcdFx0d2FybmluZyA9IGlucHV0LnBhcmVudCgpLm5leHQoJy53YXJuaW5nJyk7XG5cdFx0XHQoaW5wdXQudmFsKCkgPT09ICcnKSAmJiAoaW5wdXQuYWRkQ2xhc3MoQ0xBU1MuX2Vycm9yKSwgd2FybmluZy50ZXh0KGlucHV0LmF0dHIodHh0UnEpKS5hZGRDbGFzcyhDTEFTUy5fZGxleCksIHBhc3MgPSBmYWxzZSk7XG5cdFx0fSk7XG5cdFx0cmV0dXJuIHBhc3M7XG5cdH1cblxuXHRmdW5jdGlvbiBjaGVja01pbigpIHtcblx0XHRsZXQgcGFzcyA9IHRydWUsXG5cdFx0XHRcdGlucHV0ID0ge30sXG5cdFx0XHRcdG1pbiA9IDAsXG4gICAgICAgIHdhcm5pbmcgPSB7fTtcblxuXHRcdGlucHV0TWluLmxlbmd0aCA9PT0gMCB8fCBpbnB1dE1pbi5lYWNoKChfLCBlbCkgPT4ge1xuXHRcdFx0aW5wdXQgPSAkKGVsKTtcblx0XHRcdG1pbiA9IHBhcnNlSW50KGlucHV0LmRhdGEoJ21pbicpKTtcblx0XHRcdHdhcm5pbmcgPSBpbnB1dC5wYXJlbnQoKS5uZXh0KCcud2FybmluZycpO1xuXHRcdFx0KGlucHV0LnZhbCgpLmxlbmd0aCA8IG1pbikgJiYgKGlucHV0LmFkZENsYXNzKENMQVNTLl9lcnJvciksIHdhcm5pbmcudGV4dChpbnB1dC5hdHRyKHR4dE1pbikpLmFkZENsYXNzKENMQVNTLl9kbGV4KSwgcGFzcyA9IGZhbHNlKTtcblx0XHR9KTtcblx0XHRyZXR1cm4gcGFzcztcblx0fVxuXG5cdGZ1bmN0aW9uIGNoZWNrTWF4KCkge1xuXHRcdGxldCBwYXNzID0gdHJ1ZSxcblx0XHRcdFx0aW5wdXQgPSB7fSxcblx0XHRcdFx0bWF4ID0gMCxcbiAgICAgICAgd2FybmluZyA9IHt9O1xuXG5cdFx0aW5wdXRNYXgubGVuZ3RoID09PSAwIHx8IGlucHV0TWF4LmVhY2goKF8sIGVsKSA9PiB7XG5cdFx0XHRpbnB1dCA9ICQoZWwpO1xuXHRcdFx0bWF4ID0gcGFyc2VJbnQoaW5wdXQuZGF0YSgnbWF4JykpO1xuXHRcdFx0d2FybmluZyA9IGlucHV0LnBhcmVudCgpLm5leHQoJy53YXJuaW5nJyk7XG5cdFx0XHQoaW5wdXQudmFsKCkubGVuZ3RoID4gbWF4KSAmJiAoaW5wdXQuYWRkQ2xhc3MoQ0xBU1MuX2Vycm9yKSwgd2FybmluZy50ZXh0KGlucHV0LmF0dHIodHh0TWF4KSkuYWRkQ2xhc3MoQ0xBU1MuX2RsZXgpLCBwYXNzID0gZmFsc2UpO1xuXHRcdH0pO1xuXHRcdHJldHVybiBwYXNzO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2hlY2tFbWFpbCgpIHtcblx0XHRsZXQgcGFzcyA9IHRydWUsXG5cdFx0XHRcdGlucHV0ID0ge30sXG5cdFx0XHRcdHdhcm5pbmcgPSB7fSxcblx0XHRcdFx0cmVnZXggPSAvXihbYS16QS1aMC05Xy4rLV0pK1xcQCgoW2EtekEtWjAtOS1dKStcXC4pKyhbYS16QS1aMC05XXsyLDR9KSskLztcblxuXHRcdGlucHV0RW0ubGVuZ3RoID09PSAwIHx8IGlucHV0RW0uZWFjaCgoXywgZWwpID0+IHtcblx0XHRcdGlucHV0ID0gJChlbCk7XG5cdFx0XHR3YXJuaW5nID0gaW5wdXQucGFyZW50KCkubmV4dCgnLndhcm5pbmcnKTtcblx0XHRcdHJlZ2V4LnRlc3QoaW5wdXQudmFsKCkpIHx8IChpbnB1dC5hZGRDbGFzcyhDTEFTUy5fZXJyb3IpLCB3YXJuaW5nLnRleHQoaW5wdXQuYXR0cih0eHRFbSkpLmFkZENsYXNzKENMQVNTLl9kbGV4KSwgcGFzcyA9IGZhbHNlKTtcblx0XHR9KTtcblx0XHRyZXR1cm4gcGFzcztcblx0fVxuXG5cdGZ1bmN0aW9uIGNoZWNrQ29uZmlybSgpIHtcblx0XHRsZXQgcGFzcyA9IHRydWUsXG5cdFx0XHRcdGlucHV0ID0ge30sXG5cdFx0XHRcdHRhcmdldCA9IHt9LFxuICAgICAgICB3YXJuaW5nID0ge307XG5cblx0XHRpbnB1dENmLmxlbmd0aCA9PT0gMCB8fCBpbnB1dENmLmVhY2goKF8sIGVsKSA9PiB7XG5cdFx0XHRpbnB1dCA9ICQoZWwpO1xuXHRcdFx0dGFyZ2V0ID0gJChpbnB1dC5kYXRhKCd0YXJnZXQnKSk7XG5cdFx0XHR3YXJuaW5nID0gaW5wdXQucGFyZW50KCkubmV4dCgnLndhcm5pbmcnKTtcblx0XHRcdChpbnB1dC52YWwoKSAhPSB0YXJnZXQudmFsKCkpICYmIChpbnB1dC5hZGRDbGFzcyhDTEFTUy5fZXJyb3IpLCB3YXJuaW5nLnRleHQoaW5wdXQuYXR0cih0eHRDZikpLmFkZENsYXNzKENMQVNTLl9kbGV4KSwgcGFzcyA9IGZhbHNlKTtcblx0XHR9KTtcblx0XHRyZXR1cm4gcGFzcztcblx0fVxuXG5cdHJldHVybiB0aGlzO1xufTtcbiIsIi8qKioqKiBJbnB1dCBEYXRlICoqKioqL1xubGV0IElucHV0RGF0ZSA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIG9sZFZhbCA9ICcnLFxuICAgICAgd2FybmluZyA9IGVsLm5leHQoJy53YXJuaW5nJyksXG4gICAgICB0eHREYXRlID0gZWwuYXR0cignZGF0ZS10eHQnKTtcblxuICAoKCkgPT4gaW5pdCgpKSgpO1xuICBmdW5jdGlvbiBpbml0KCkge1xuICAgIGluaXRFdmVudCgpO1xuICB9XG5cbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIGVsLm9uKCdrZXl1cCcsIG9uS2V5VXApO1xuICAgIGVsLm9uKCdpbnB1dCcsICgpID0+IGVsLnZhbChlbC52YWwoKS5yZXBsYWNlKC9bXjAtOS9dL2csICcnKSkpO1xuICAgIC8vIGVsLm9uKCdrZXlkb3duJywgb25LZXlEb3duKTtcbiAgICAvLyBlbC5vbigndGV4dElucHV0Jywgb25LZXlVcClcbiAgfVxuXG4gIGZ1bmN0aW9uIG9uS2V5VXAoZSkge1xuICAgIGxldCB2YWwgPSAkLnRyaW0oZWwudmFsKCkpO1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xuICAgIG9sZFZhbCA9ICh2YWwubGVuZ3RoID09PSA1IHx8IHZhbC5sZW5ndGggPT09IDIpID8gKCh2YWwubGVuZ3RoID4gb2xkVmFsLmxlbmd0aCkgPyBlbC52YWwodmFsICsgJy8nKSA6ICh2YWwubGVuZ3RoIDwgb2xkVmFsLmxlbmd0aCkgJiYgZWwudmFsKHZhbC5zbGljZSgwLCB2YWwubGVuZ3RoIC0gMSkpLGVsLnZhbCgpKSA6IHZhbDtcbiAgfVxuXG4gIGZ1bmN0aW9uIG9uS2V5RG93bihlKSB7XG4gICAgbGV0IHZhbCA9ICQudHJpbShlbC52YWwoKSksXG4gICAgICAgIGNvZGUgPSBwYXJzZUludChlLmtleUNvZGUgfHwgZS53aGljaCk7XG4gICAgcmV0dXJuIChjb2RlID09PSAwIHx8IGNvZGUgPT09IDggfHwgY29kZSA9PT0gMjI5IHx8IChjb2RlID49IDQ4ICYmIGNvZGUgPD0gNTcpIHx8IChjb2RlID49IDk2ICYmIGNvZGUgPD0gMTA1KSkgPyB0cnVlIDogZmFsc2U7XG4gIH1cblxuICBmdW5jdGlvbiB2YWxpZGF0ZURhdGUoKSB7XG4gICAgcmV0dXJuIHRydWU7XG4gICAgbGV0IHZhbCA9ICQudHJpbShlbC52YWwoKSksXG4gICAgICAgIHBhcnRzID0gJycsXG4gICAgICAgIGRheSA9IDAsXG4gICAgICAgIG1vbnRoID0gMCxcbiAgICAgICAgeWVhciA9IDAsXG4gICAgICAgIG1vbnRoTGVuZ3RoID0gW107XG5cbiAgICAvLyBGaXJzdCBjaGVjayBmb3IgdGhlIHBhdHRlcm5cbiAgICBpZighL15cXGR7MSwyfVxcL1xcZHsxLDJ9XFwvXFxkezR9JC8udGVzdCh2YWwpKSByZXR1cm4gZmFsc2U7XG5cbiAgICAvLyBQYXJzZSB0aGUgZGF0ZSBwYXJ0cyB0byBpbnRlZ2Vyc1xuICAgIHBhcnRzID0gdmFsLnNwbGl0KCcvJyk7XG4gICAgZGF5ID0gcGFyc2VJbnQocGFydHNbMF0sIDEwKTtcbiAgICBtb250aCA9IHBhcnNlSW50KHBhcnRzWzFdLCAxMCk7XG4gICAgeWVhciA9IHBhcnNlSW50KHBhcnRzWzJdLCAxMCk7XG5cbiAgICAvLyBDaGVjayB0aGUgcmFuZ2VzIG9mIG1vbnRoIGFuZCB5ZWFyXG4gICAgaWYoeWVhciA8IDEwMDAgfHwgeWVhciA+IDMwMDAgfHwgbW9udGggPT0gMCB8fCBtb250aCA+IDEyKSByZXR1cm4gZmFsc2U7XG4gICAgbW9udGhMZW5ndGggPSBbMzEsIDI4LCAzMSwgMzAsIDMxLCAzMCwgMzEsIDMxLCAzMCwgMzEsIDMwLCAzMV07XG4gICAgLy8gQWRqdXN0IGZvciBsZWFwIHllYXJzXG4gICAgaWYoeWVhciAlIDQwMCA9PSAwIHx8ICh5ZWFyICUgMTAwICE9IDAgJiYgeWVhciAlIDQgPT0gMCkpIG1vbnRoTGVuZ3RoWzFdID0gMjk7XG4gICAgLy8gQ2hlY2sgdGhlIHJhbmdlIG9mIHRoZSBkYXlcbiAgICByZXR1cm4gZGF5ID4gMCAmJiBkYXkgPD0gbW9udGhMZW5ndGhbbW9udGggLSAxXTtcbiAgfVxuXG4gIHRoaXMudmFsaWRhdGUgPSAoKSA9PiB2YWxpZGF0ZURhdGUoKSA/IHRydWUgOiAod2FybmluZy50ZXh0KHR4dERhdGUpLnNob3coKSwgZmFsc2UpO1xuXHRyZXR1cm4gdGhpcztcbn07IiwiLyoqKioqIElucHV0IFNlbGVjdGlvbiAqKioqKi9cbmxldCBJbnB1dFNlbGVjdGlvbiA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcblxuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgaW5wdXQgPSBlbC5maW5kKCdpbnB1dCcpLFxuICAgICAgbGFiZWwgPSBlbC5maW5kKCdsYWJlbCcpLFxuICAgICAgb3B0TGlzdCA9IGVsLmZpbmQoJy5vcHQtbGlzdCcpLFxuICAgICAgb3B0SXRlbSA9IG9wdExpc3QuZmluZCgnbGknKTtcblxuXG4gICgoKSA9PiBpbml0KCkpKCk7XG4gIGZ1bmN0aW9uIGluaXQoKSB7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgaW5wdXQub24oRl9JTiwgaW5wdXRJbik7XG4gICAgaW5wdXQub24oRl9PVVQsIGlucHV0T3V0KTtcbiAgICBvcHRJdGVtLm9uKENMSUNLLCBpdGVtQ2xpY2tlZCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbnB1dEluKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgb3B0TGlzdC5zbGlkZURvd24oKTtcbiAgICBlbC5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlT3Blbik7XG4gIH1cblxuICBmdW5jdGlvbiBpbnB1dE91dChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgICAgalF1ZXJ5LnRyaW0oaW5wdXQudmFsKCkpLmxlbmd0aCA9PT0gMCAmJiBlbC5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICAgIG9wdExpc3Quc2xpZGVVcCgpO1xuICAgICAgZWwucmVtb3ZlQ2xhc3MoQ0xBU1MuX29wZW4pXG4gICAgfSwgMTApO1xuICB9XG5cbiAgZnVuY3Rpb24gaXRlbUNsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBsZXQgaXRlbSA9ICQodGhpcyksXG4gICAgICAgIHZhbCA9IGl0ZW0uZGF0YSgndmFsdWUnKTtcblxuICAgIG9wdEl0ZW0ucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgaXRlbS5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBlbC5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKVxuICAgIGlucHV0LnZhbCh2YWwpO1xuICB9XG5cblx0cmV0dXJuIHRoaXM7XG59OyIsIi8qKioqKiBJbnB1dCBXcmFwICoqKioqL1xubGV0IElucHV0V3JhcCA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcblxuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgaW5wdXQgPSBlbC5maW5kKCdpbnB1dCcpLFxuICAgICAgbGFiZWwgPSBlbC5maW5kKCdsYWJlbCcpO1xuXG5cbiAgKCgpID0+IGluaXQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdCgpIHtcbiAgICBpbml0RXZlbnQoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGluaXRFdmVudCgpIHtcbiAgICAvLyBlbC5vbihDTElDSywgd3JhcENsaWNrZWQpO1xuICAgIGlucHV0Lm9uKEZfT1VULCBpbnB1dE91dCk7XG4gIH1cblxuICBmdW5jdGlvbiB3cmFwQ2xpY2tlZChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG4gICAgZWwuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgc2V0VGltZW91dCgoKSA9PiBpbnB1dC5mb2N1cygpLCAyMDApO1xuICB9XG5cbiAgZnVuY3Rpb24gaW5wdXRPdXQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBsZXQgdmFsID0galF1ZXJ5LnRyaW0oaW5wdXQudmFsKCkpO1xuXG4gICAgY29uc29sZS5sb2codmFsLmxlbmd0aCk7XG5cbiAgICBpZiAodmFsLmxlbmd0aCA9PT0gMCkge1xuICAgICAgZWwuaGFzQ2xhc3MoQ0xBU1MuX2hhc3ZhbCkgJiYgZWwucmVtb3ZlQ2xhc3MoQ0xBU1MuX2hhc3ZhbCk7XG4gICAgfSBlbHNlIHtcbiAgICAgIGVsLmFkZENsYXNzKENMQVNTLl9oYXN2YWwpO1xuICAgIH1cbiAgICBlbC5oYXNDbGFzcyhDTEFTUy5fYWN0aXZlKSAmJiBlbC5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgfVxuXG5cdHJldHVybiB0aGlzO1xufTsiLCIvKioqKiogU2VsZWN0aW9uIEJveCAqKioqKi9cbmxldCBTbEJveCA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcblx0bGV0IGVsID0gJChlbGVtZW50KSxcblx0XHRcdGhlYWRlciA9IGVsLmZpbmQoJy5oZWFkZXInKSxcblx0XHRcdGl0ZW1zID0gZWwuZmluZCgnYScpLFxuXHRcdFx0aW5wdXQgPSBlbC5maW5kKCdpbnB1dCcpLFxuXHRcdFx0d2FybmluZyA9IGVsLmZpbmQoJy53YXJuaW5nJyksXG5cdFx0XHR0aXRsZSA9IGhlYWRlci5maW5kKCdzcGFuJyksXG5cdFx0XHR0eHQgPSB0aXRsZS50ZXh0KCksXG5cdFx0XHR0eHRScSA9IGlucHV0LmF0dHIoJ3JlcXVpcmVkLXR4dCcpLFxuXHRcdFx0aXNScSA9IGVsLmRhdGEoJ3JlcXVpcmVkJykgPyB0cnVlIDogZmFsc2UsXG5cdFx0XHRpc0RpcnR5ID0gZmFsc2UsXG5cdFx0XHRvdXRFdmVudCA9IEFQUC5faXNNb2JpbGUgPyAnbW91c2VvdXQnIDogJ2ZvY3Vzb3V0JyxcbiAgICAgIGlzT3BlbiA9IGZhbHNlOztcblxuXHQoKCkgPT4gaW5pdEV2ZW50KCkpKCk7XG5cdGZ1bmN0aW9uIGluaXRFdmVudCgpIHtcblx0XHRoZWFkZXIub24oJ2NsaWNrJywgdG9nZ2xlSGVhZGVyKS5vbihvdXRFdmVudCwgKCkgPT4gc2V0VGltZW91dCgoKSA9PiBpc09wZW4gJiYgY2xvc2VNZW51KCksIDEwMCkpOztcblx0XHRpdGVtcy5vbignY2xpY2snLCBpdGVtQ2xpY2tlZCk7XG5cdH1cblxuXHR0aGlzLnZhbGlkYXRlID0gKCkgPT4gaXNScSAmJiAhaXNEaXJ0eSA/IChoZWFkZXIuYWRkQ2xhc3MoQ0xBU1MuX2Vycm9yKSwgd2FybmluZy50ZXh0KHR4dFJxKS5zaG93KCksIGZhbHNlKSA6IHRydWU7XG5cdHRoaXMucmVzZXQgPSAoKSA9PiB7XG5cdFx0dGl0bGUudGV4dCh0eHQpO1xuXHRcdGlucHV0LnZhbCgnJyk7XG5cdFx0aXRlbXMucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG5cdFx0aXNEaXJ0eSA9IGZhbHNlO1xuXHR9XG5cblx0ZnVuY3Rpb24gdG9nZ2xlSGVhZGVyKGUpIHtcblx0XHRlLnByZXZlbnREZWZhdWx0KCk7XG5cdFx0aXNEaXJ0eSB8fCBoZWFkZXIucmVtb3ZlQ2xhc3MoQ0xBU1MuX2Vycm9yKSwgd2FybmluZy5oaWRlKCk7XG5cdFx0aXNPcGVuID8gY2xvc2VNZW51KCkgOiBzaG93TWVudSgpO1xuXHR9XG5cblx0ZnVuY3Rpb24gc2hvd01lbnUoKSB7XG4gICAgaGVhZGVyLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpXG4gICAgaXNPcGVuID0gdHJ1ZTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGNsb3NlTWVudSgpIHtcbiAgICBoZWFkZXIucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSlcbiAgICBpc09wZW4gPSBmYWxzZTtcbiAgfVxuXG5cdGZ1bmN0aW9uIGl0ZW1DbGlja2VkKGUpIHtcblx0XHRlLnByZXZlbnREZWZhdWx0KCk7XG5cdFx0bGV0IGl0ZW0gPSAkKHRoaXMpO1xuXG5cdFx0aXNEaXJ0eSB8fCAoaXNEaXJ0eSA9IHRydWUpO1xuXHRcdGlmIChpdGVtLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpKSByZXR1cm4gZmFsc2U7XG5cblx0XHR0aXRsZS50ZXh0KGl0ZW0udGV4dCgpKTtcblx0XHRpbnB1dC52YWwoaXRlbS5kYXRhKCd2YWwnKSk7XG5cblx0XHRpdGVtcy5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcblx0XHRpdGVtLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpO1xuXHRcdGhlYWRlci5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcblx0fVxuXG5cdHJldHVybiB0aGlzO1xufTsiLCIvKioqKiogU2VsZWN0aW9uIE5hdiAqKioqKi9cbmxldCBTbE5hdiA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcblxuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgaGVhZGVyID0gZWwuZmluZCgnLmhlYWRlcicpLFxuICAgICAgdGl0bGUgPSBoZWFkZXIuZmluZCgnc3BhbicpLFxuICAgICAgbGlua3MgPSBlbC5maW5kKCdhJyksXG4gICAgICBvdXRFdmVudCA9IEFQUC5faXNNb2JpbGUgPyAnbW91c2VvdXQnIDogJ2ZvY3Vzb3V0JyxcbiAgICAgIGlzT3BlbiA9IGZhbHNlO1xuXG4gICgoKSA9PiBpbml0RXZlbnQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIGhlYWRlci5vbignY2xpY2snLCB0b29nbGVNZW51KS5vbihvdXRFdmVudCwgKCkgPT4gc2V0VGltZW91dCgoKSA9PiBpc09wZW4gJiYgY2xvc2VNZW51KCksIDEwMCkpO1xuICAgIGxpbmtzLm9uKCdjbGljaycsIGxpbmtDbGlja2VkKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHRvb2dsZU1lbnUoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBpc09wZW4gPyBjbG9zZU1lbnUoKSA6IHNob3dNZW51KCk7XG4gIH1cblxuICBmdW5jdGlvbiBzaG93TWVudSgpIHtcbiAgICBoZWFkZXIuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkuZm9jdXMoKTtcbiAgICBpc09wZW4gPSB0cnVlO1xuICB9XG5cbiAgZnVuY3Rpb24gY2xvc2VNZW51KCkge1xuICAgIGhlYWRlci5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKS5ibHVyKCk7XG4gICAgaXNPcGVuID0gZmFsc2U7XG4gIH1cblxuICBmdW5jdGlvbiBsaW5rQ2xpY2tlZChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIGxldCBpdGVtID0gJCh0aGlzKSxcbiAgICAgICAgdHh0ID0gaXRlbS50ZXh0KCksXG4gICAgICAgIHVybCA9IGl0ZW0uYXR0cignaHJlZicpO1xuXG4gICAgbGlua3MucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgaXRlbS5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICB0aXRsZS50ZXh0KHR4dCk7XG4gICAgaGVhZGVyLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIHdpbmRvdy5sb2NhdGlvbi5ocmVmID0gdXJsO1xuICB9XG5cblx0cmV0dXJuIHRoaXM7XG59OyJdfQ==
