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

		this.checkMobile();
		this.checkIOS();
		this.checkFirefox();
		this.getSize();
		this.initEvent();
		APP.checkHash();
		APP.header.init();
		APP.footer.init();
		APP.popup.init();
		APP.pageInit();
	},

	checkMobile() {
		matchMedia('(hover: none)').matches && (this._html.addClass(CLASS._mobile), this._isMobile = true);
		this._isMobile && window.orientation != 0 && this._html.addClass(CLASS._orientation);
	},

	checkIOS() {
		// console.log(navigator);
		// console.log(navigator.userAgent);
		/iPhone|iPad|iPod/i.test(navigator.userAgent) ? this._html.addClass(CLASS._iOS)
		: (this._isMobile && navigator.userAgent.includes('Macintosh')) && this._html.addClass(CLASS._iOS);
	},

	checkFirefox() {
		navigator.userAgent.toLowerCase().indexOf('firefox') > -1 && (this._isFirefox = true);
	},

	initEvent() {
		APP._overlay.on(CLICK, APP.overlayClicked);
		window.onresize = APP.resized;
		// window.addEventListener('wheel', { passive: false });
	},

	overlayClicked(e) {
		e.preventDefault();
		APP.header._btnMb.classList.contains(CLASS._active) && APP.header._btnMb.click();
	},

	resized:() => window.innerWidth === APP._W || (
		APP.getSize(),
		APP._W > 1200 && APP.header._btnMb.classList.contains(CLASS._active) && APP.header._btnMb.click()
	),

	getSize() {
		APP._W = window.innerWidth;
		APP._H = window.innerHeight;
		setTimeout(() => document.dispatchEvent(SIZE_CHANGED_EVENT), 250);
	},

	checkHash() {
		if (window.location.hash.length === 0) return false;
		let hash = document.querySelector(window.location.hash),
		    offset = {};
		(hash !== null) && (offset = APP.offset(hash), APP.scroll(offset.top - 150, 1000));
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
	},

	slideDown: e => $(e).slideDown(),
	slideUp: e => $(e).slideUp(),
	isFunc: e => (typeof e === 'function' ? true : false),

	pageInit() {
		switch(this._pageID) {
			case 'page-home': this.home.init(); break;
			case 'page-casting-board': this.castingBoard.init(); break;
			case 'page-our-talent': this.ourTalent.init(); break;
			case 'page-talent-services': this.talentServices.init(); break;
			case 'page-casting-services': this.talentServices.init(); break;
			case 'page-signup': this.signup.init(); break;
			case 'page-login': this.login.init(); break;
			case 'page-about-us': this.aboutUs.init(); break;
			case 'page-post-details': this.postDetails.init(); break;
			case 'page-talent-details': this.talentDetails.init(); break;
			case 'page-setup-password': this.setupPassword.init(); break;
			case 'page-acc-activated': this.accActivated.init(); break;
			case 'page-project-details': this.projectDetails.init(); break;
			case 'page-role-details': this.roleDetails.init(); break;

			case 'page-talent-ctr': this.talentCtr.init(); break;
			case 'page-talent-ctr-edit': this.talentCtrEdit.init(); break;
			case 'page-talent-ctr-pw': this.talentCtrPw.init(); break;
			case 'page-talent-submitted': this.talentSubmitted.init(); break;
			case 'page-talent-recommended': this.talentRecommended.init(); break;

			case 'page-client-casting-board': this.clientCastingBoard.init(); break;
			case 'page-client-new-project': this.clientNewProject.init(); break;
			case 'page-client-profile': this.clientProfile.init(); break;
			case 'page-client-profile-edit': this.clientProfileEdit.init(); break;
			case 'page-client-pw': this.clientPw.init(); break;
			case 'page-client-project-details': this.clientProjectDetails.init(); break;
			case 'page-client-role-details': this.clientRoleDetails.init(); break;
			case 'page-client-account': this.clientAccount.init(); break;
			case 'page-client-payment': this.clientPayment.init(); break;
			case 'page-client-payment-edit': this.clientPaymentEdit.init(); break;
			case 'page-client-payment-add': this.clientPaymentAdd.init(); break;
			case 'page-client-plan': this.clientPlan.init(); break;
			case 'page-client-new-role': this.clientNewRole.init(); break;
			case 'page-client-edit-role': this.clientEditRole.init(); break;
			case 'page-client-edit-project': this.clientEditProject.init(); break;
			//PHASE 1 REDO
			case 'page-news-event': this.newsEvent.init(); break;
			case 'page-redo-role-details': this.redoRoleDetails.init(); break;
			case 'page-redo-role-submit': this.redoRoleSubmit.init(); break;
			case 'page-redo-project-details': this.redoProjectDetails.init(); break;
			case 'page-redo-project-breakdown': this.redoProjectBreakdown.init(); break;
			//PHASE 2
			case 'page-p2-client-dashboard': this.p2ClientDashBoard.init(); break;
			case 'page-p2-client-manage-project': this.p2ClientManageProject.init(); break;
			case 'page-p2-client-project': this.p2ClientProject.init(); break;
			case 'page-p2-client-project-details': this.p2ClientProjectDetails.init(); break;
			case 'page-p2-client-role': this.p2ClientRole.init(); break;
			case 'page-p2-client-role-details': this.p2ClientRoleDetails.init(); break;
			case 'page-p2-client-our-talents': this.p2ClientOurTalents.init(); break;
			case 'page-p2-client-talent-details': this.p2ClientTalentDetails.init(); break;
			case 'page-p2-client-info': this.p2ClientInfo.init(); break;
			case 'page-p2-talent-billboard': this.p2TalentBillboard.init(); break;
			case 'page-p2-talent-role-details': this.p2TalentRoleDetails.init(); break;
			case 'page-p2-talent-proj-dts': this.p2TalentProjDts.init(); break;
			case 'page-p2-talent-role-submit': this.p2TalentRoleSubmit.init(); break;
			case 'page-p2-talent-manage-roles': this.p2TalentManageRoles.init(); break;
			case 'page-p2-talent-role-request': this.p2TalentRoleRequest.init(); break;
			case 'page-p2-talent-info': this.p2TalentInfo.init(); break;
		}
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
      SLBOX_OPEN = 'slbox-open',
      SLBOX_OPEN_EVENT = new CustomEvent(SLBOX_OPEN),
      NOTI_OPEN = 'noti-open',
      NOTI_OPEN_EVENT = new CustomEvent(NOTI_OPEN),
      CLICK = 'click',
      F_IN = 'focusin',
      F_OUT = 'focusout',
      CHANGE = 'change',
      KEYDOWN = 'keydown',
      KEYPRESS = 'keypress',
      INPUT = 'input',
      LOAD = 'loadstart',
      DOM_LOADED = 'DOMContentLoaded',
      SWIPE_L = 'swipeleft',
      SWIPE_R = 'swiperight',
      M_OVER = 'mouseover',
      M_OUT = 'mouseout',
      F_VISIBLE = ':visible',
      F_HIDDEN = ':hidden';

const CLASS = {
  _hover: 'can-hover',
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
  _max: 'js-max',
	_email: 'js-email',
	_error: 'js-error',
  _hasval: 'js-hasval',
  _open: 'js-open',
  _activeOpen: 'js-active js-open',
  _disable: 'js-disable',
  _rqSv: 'js-required-server',
  _hide: 'js-hide',
  _enaEl: 'js-enael',
  _disEl: 'js-disel',
  _reset: 'js-reset',
  _selected: 'js-selected',
  _red: 'js-red',
  _green: 'js-green'
};

String.prototype.capitalize = () =>  (this.charAt(0).toUpperCase() + this.slice(1));
/*** READY ***/
document.addEventListener(DOM_LOADED, () => matchMedia('(hover: none)').matches || document.body.classList.add(CLASS._hover));
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
/***** NOTIFICATION CONTROL *****/
let NotificationCtr = function(element) {

  let el = $(element),
      btnBell = el.find('.notibell'),
      panel = el.find('.panel'),
      btnToggle = panel.find('.btn-toggle'),
      btnReadAll = panel.find('.btn-read-all'),
      items = panel.find('.item');

  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    btnBell.on(CLICK, btnBellClicked);
    btnReadAll.on(CLICK, e => (e.preventDefault(), items.removeClass(CLASS._active)));
    btnToggle.on(CLICK, btnToggleClicked);
    // document.addEventListener(SIZE_CHANGED, () => setHeight());
  }

  function btnBellClicked(e) {
    e.preventDefault();
    //
    btnBell.hasClass(CLASS._active) && btnBell.removeClass(CLASS._active);
    btnBell.hasClass(CLASS._open) ? btnBell.removeClass(CLASS._open) : (btnBell.addClass(CLASS._open), document.dispatchEvent(NOTI_OPEN_EVENT));
  }

  function btnToggleClicked(e) {
    e.preventDefault();
    let btn = $(this);

    if (btn.hasClass(CLASS._active)) return false;
    btnToggle.removeClass(CLASS._active);
    btn.addClass(CLASS._active);
    panel.hasClass(CLASS._active) ? panel.removeClass(CLASS._active) : panel.addClass(CLASS._active);
  }

  this.close = () => btnBell.hasClass(CLASS._open) && btnBell.removeClass(CLASS._open);
	return this;
};
/***** REQUEST CONTROL *****/
let RequestCtr = function(element) {

  let el = $(element),
      wrapLock = el.find('.wrap-lock'),
      wrapCtr = el.find('.wrap-ctr'),
      btnAction = wrapCtr.find('.btn-action'),
      btnBlue = wrapCtr.find('.btn-blue'),
      btnRed = wrapCtr.find('.btn-red'),
      tagBlue = el.find('.status.blue'),
      tagRed = el.find('.status.red');

  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    btnAction.on(CLICK, e => {
      e.preventDefault();
      btnAction.toggleClass(CLASS._active);
    });

    btnBlue.on(CLICK, btnBlueClicked);
    btnRed.on(CLICK, btnRedClicked);
  }

  function btnBlueClicked(e) {
    e.preventDefault();
    wrapLock.removeClass(CLASS._disable);
    tagBlue.removeClass(CLASS._disable);
    wrapCtr.hide();
  }

  function btnRedClicked(e) {
    e.preventDefault();
      tagRed.removeClass(CLASS._disable);
      wrapCtr.hide();
  }

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
    APP._isMobile ? holder.on(SWIPE_L, nextClicked).on(SWIPE_R, prevClicked):
      iTime > 0 && holder.on(M_OVER, mouseOver).on(M_OUT, mouseOut);

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

  init() {
    let self = this;
    self._el = $('.main-footer');
    if (self._el === null) return false;
  }
};

APP.headerMb = {
  _el: {},
  _subLink: {},
  _subIcon: {},
  _ovl: {},

  init() {
    this._el = $('#mb-header');
    this._ovl = $('#mb-overlay');
    this._subLink = this._el.find('.has-sub');
    this._subIcon = this._el.find('.icon-sub');

    this.initEvent();
    TweenMax.set(this._el, { x: -APP._W });
  },

  initEvent() {
    // self._ovl.on('click', () => APP.header._btnMb.hasClass(CLASS._active) && APP.header._btnMb.trigger('click'));
    // self._ovl.on('scroll', (e) => {
    //   e.preventDefault();
    //   e.stopPropagation();
    // });
    this._subIcon.on(CLICK, this.toggelSubMenu);
  },

  toggelUserPanel(e) {
    e.preventDefault();
    this._userPanel.hasClass(CLASS._active) ? this._userPanel.removeClass(CLASS._active) : this._userPanel.addClass(CLASS._active);
  },

  toggelSubMenu(e) {
    e.preventDefault();
    let item = $(this),
        topItem = item.closest('.top-item');

    topItem.hasClass(CLASS._active) ? topItem.removeClass(CLASS._active) : (APP.headerMb.closeSubMenu(), topItem.addClass(CLASS._active));
  },

  closeSubMenu() {
    let self = APP.headerMb;
    self._subLink.removeClass(CLASS._active);
  },

  show() {
    var self = this;
    self._el.addClass(CLASS._active);
    self._ovl.fadeIn();
    TweenMax.set(self._el, {
      display: 'block',
      onComplete: () => (APP._html.addClass(CLASS._menuActive), TweenMax.to(self._el, 0.5, { x: 0 }))
    });
  },

  hide() {
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
  _userPanel: {},
  _btnUser: {},
  _notiCtr: {},

  init() {
    this._el = document.querySelector('#main-header');
    this._el && (
      this._btnMb = this._el.querySelector('.btn-mb'),
      this._userPanel = this._el.querySelector('.user-logged .wrap-panel'),
      this._userPanel && (this._btnUser = this._userPanel.querySelector('.btn-active')),
      this._notiCtr = new NotificationCtr(this._el.querySelector('.wrap-noti')),
      this.initEvent(),
      APP.headerMb.init()
    );
  },

  initEvent() {
    this._btnMb.addEventListener(CLICK, this.btnMbClicked);
    // APP._isMobile && this._btnUser.addEventListener(CLICK, e => {
    this._btnUser.lenght > 0 && this._btnUser.addEventListener(CLICK, e => {
      e.preventDefault();
      this._notiCtr.close();
      this._userPanel.classList.toggle(CLASS._active);
    });
    document.addEventListener(NOTI_OPEN, () => this._userPanel.classList.contains(CLASS._active) && this._userPanel.classList.remove(CLASS._active));
  },

  btnMbClicked(e) {
    let headerMb = APP.headerMb;
    e.preventDefault();
    this.classList.contains(CLASS._active) ? (this.classList.remove(CLASS._active), headerMb.hide()) : (this.classList.add(CLASS._active), headerMb.show());
  }
};
APP.popup = {
  _alert: {},
  _warning: {},
  _payment: {},
  _media: {},
  _upload: {},
  _loading: {},
  _isOpen: false,

  init() {
    let self = this;
    self._alert = new PopupAlert('#popup-alert');
    self._warning = new PopupWarning('#popup-warning');
    // self._payment = {};
    self._media = new PopupMedia('#popup-media');
    self._upload = new PopupUpload('#popup-upload');
    self._loading = new PopupBase('#popup-loading');
  }
};
/***** Project List *****/
let ProjectList = function(element) {

  let el = $(element),
      chxAll = el.find('.chx-all'),
      header = el.find('lh'),
      items = {},
      chx = {},
      hdID = header.find('#hd-id'),

      btnWrap = el.find('.btn-wrap'),
      btnToogle = btnWrap.find('.btn-more, .btn-action'),

      rowCtr = el.find('.row-ctr'),
      btnAction = rowCtr.find('a[role=button]'),
      btnPlay = el.find('.btn-play'),
      btnUpload = el.find('.btn-upload');

  (() => init())();
  function init() {
    updateItem();
    initEvent();
  }

  function updateItem() {
    items = el.find('.item:not(.js-disable)');
    chx = items.find('.chx-row');
    items.length < 2 && chxAll.hide();
  }

  function updateID() {
    let arrayID = [];
    updateItem();
    chx.filter(':checked').each((_, e) => arrayID.push(e.value));
    hdID.val(arrayID);
  }

  function initEvent() {
    chxAll.on(CHANGE, chxAllChanged);
    chx.on(CHANGE, chxChanged);
    btnToogle.on(CLICK, btnToogleClicked);
    btnAction.on(CLICK, btnActionClicked);
    btnPlay.on(CLICK, btnPlayClicked);
    btnUpload.on(CLICK, btnUploadClicked);
  }

  function btnUploadClicked(e) {
    e.preventDefault();
    APP.popup._upload.show(this.dataset);
  }

  function btnPlayClicked(e) {
    e.preventDefault();
    APP.popup._media.show(this.dataset);
  }

  function activeHeader() {
    let headerWrap = header.find('.btn-wrap'),
        headerChx = headerWrap.find('input[type=checkbox]'),
        arrayID = [];

    header.addClass(CLASS._active);
    btnToogle.removeClass(CLASS._active);
    headerChx.length > 0 && headerChx.prop('checked', false);
    chx.filter(':checked').each((_, e) => arrayID.push(e.value));
    hdID.val(arrayID);
  }

  function chxAllChanged() {
    chxAll.is(':checked') ? (chx.prop('checked', true), items.addClass(CLASS._active), activeHeader()):
                            (header.removeClass(CLASS._active), chx.prop('checked', false), items.removeClass(CLASS._active));
    // chx.trigger(CHANGE);
  }

  function chxChanged() {
    let input = $(this),
        item = input.parents('li'),
        checked = chx.filter(':checked').length;;

    $(this).is(':checked') ? item.addClass(CLASS._active) : (item.removeClass(CLASS._active), chxAll.prop('checked', false));
    checked > 1 ? activeHeader() : header.removeClass(CLASS._active);
  }

  function btnToogleClicked(e) {
    e.preventDefault();
    let btn = $(this);
    btn.hasClass(CLASS._active) ? btn.removeClass(CLASS._active) : (btn.removeClass(CLASS._active), btn.addClass(CLASS._active));
  }

  function btnActionClicked(e) {
    e.preventDefault();
    let btn = $(this),
        form = btn.parents('form');

    submit(form, btn.data('action'));
  }

  function submit(form, action) {
    let url = form.data('url'),
        data = form.serializeArray(),
        wrap = form.parents('.btn-wrap');

    data.push({
      name: 'action',
      value: action
    });
    // console.log(data);
		APP.popup._loading.show();
		$.ajax({
			type: APP._submitMethod,
			url: url,
			data: data,
			headers: APP._headers,
			success: data => {
				let status = parseInt(data.status),
            title = data.title,
            message = data.message,
						html = data.html;

				APP.popup._loading.hide();
        // console.log(status);
				switch(status) {
					case 0: {
            APP.popup._alert.update(title, message);
						APP.popup._alert.show();
					} break;
					case 1: {
            let item = wrap.parents('.item'),
                itemChx = item.find('.chx-row');

            item.removeClass(CLASS._active).addClass(CLASS._disable);
            itemChx && itemChx.prop('checked', false);
            (header && header.hasClass(CLASS._active)) && updateID();
            html.includes('blue') && item.find('.' + CLASS._disable).removeClass(CLASS._disable);
            wrap.html(html);
            updateItem();
					} break;
					case 2: {
            items.filter('.' + CLASS._active).each((_, e) => {
              let item = $(e),
                  itemChx = item.find('.chx-row'),
                  itemWrap = item.find('.btn-wrap');

              item.removeClass(CLASS._active).addClass(CLASS._disable);
              itemChx.prop('checked', false);
              html.includes('blue') && item.find('.' + CLASS._disable).removeClass(CLASS._disable);
              itemWrap.html(html);
            });
            updateItem();
            header.removeClass(CLASS._active);
            chxAll.is(':checked') && chxAll.prop('checked', false);
					} break;
				}
			}
		});
	}

	return this;
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

      uploadImg = el.find('.upload-img'),
      fileListCtr = el.find('.upload-file'),

      welScr = el.find('.wel-scr'),
      btnWel = welScr.find('.cta'),
      welActive = false,

      finScr = el.find('.fin-scr'),
      btnFin = finScr.find('.cta'),
      finActive = false,
      socialChx = el.find('.js-social-chx');


  (() => init())();
  function init() {
    uploadImg = (uploadImg.length > 0) ? (new UploadImg(uploadImg)) : null;
    fileListCtr = (fileListCtr.length > 0) ? (new FileListCtr(fileListCtr)) : null;
    initQuest();
    initScr();
  }

  this.goTo = i => currentQuestion.goOutNext(i);
  this.show = () => showForm();
  this.hide = () => hideForm();
  this.updateSize = () => el.hasClass(CLASS._active) || (TweenMax.set(asideWrap, { x: -asideWrap.width() }), TweenMax.set(questList, { x: APP._W }));

  function initQuest() {
    questions.each((i, e) => questArray[i] = new SignUpQuestion(e, eNext, eDone));
    totalQuest = questArray.length;
    currentQuestion = questArray[currentIndex];
    currentQuestion.goInView();
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
    //
    // questArray[13].goInView();
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
    el.removeClass(CLASS._active);
    finScr.show().find('.banner > *').each((i, e) => TweenMax.to(e, 0.75, {
      y: 0,
      autoAlpha: 1,
      force3D: true,
      delay: delay * i,
      onComplete: () => {
        finActive = true;
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
    // console.log(getData()); return;
    $.ajax({
			type: APP._submitMethod,
			url: ajaxURL,
			data: getData(),
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

  function getData() {
    // console.log(APP.isFunc(uploadImg.getImg));
    let data = questList.serializeArray(),
        img = uploadImg ? uploadImg.getImg() : null,
        files = fileListCtr ? fileListCtr.getFileList() : [];

    // console.log(APP.isFunc(uploadImg.getImg()));
    img && data.push({
      name: 'signup[profile-picture]',
      value: img
    });

    files.length && files.forEach((e, i) => data.push({
      name: `signup[upload-profile][${i}]`,
      value: e
    }));
    return data;
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

      scriptTag = el.find('script'),
      subEl = {},
			inputs = el.find('input[type=text], input[type=password], input[type=email], input[type=tel]'),
			inputRq = el.find('.' + CLASS._require),
      inputEm = el.find('.' + CLASS._email),
      inputMin = el.find('.' + CLASS._min),
      inputMax = el.find('.' + CLASS._max),

      inputSel = el.find('.input-sel'),
      chkAll = el.find('.chx-all'),
      radWrap = el.find('.rad-wrap'),
      inputChx = radWrap.find('input[type=radio], input[type=checkbox]'),
      btnNext = el.find('.cta'),
      jsNum = el.find('.js-num'),
      jsDate = el.find('.js-date'),
      selArray = [],
      ipDate = [],
      btnActive = true,

			txtRq = 'required-txt',
      txtMin = 'min-txt',
			txtMax = 'max-txt',
			txtEm = 'email-txt',
      nextEvent = new CustomEvent(eNext, { bubbles: true, detail: { target: index }}),
      doneEvent = new CustomEvent(eDone, { bubbles: true, detail: { target: 0 }});

	(() => {
    el.hide();
    scriptTag.length > 0 && scriptTag.remove();
    inputSel.length > 0 && inputSel.each((i, e) => selArray[i] = new InputSelection(e));
    radWrap.length > 0 && (btnNext.hide(), btnActive = false);
    jsDate.length > 0 && jsDate.each((i, e) => ipDate[i] = new InputDate(e));
    getSubEl();
		initEvent();
	})();

  this.goInView = () => goIn();
  this.goOutNext = i => goOut(i);
  this.submit = () => checkInput();
  this.hideSocialInput = i => hideSocial(i);
  this.showSocialInput = i => showSocial(i);

	function initEvent() {
		inputs.length > 0 && inputs.on(F_IN, activeWrap).on(F_OUT, deactiveWrap);
		inputRq.length > 0 && inputRq.on(F_IN, inputFocus);
    chkAll.length > 0 && chkAll.on(CHANGE, checkedAll);
    inputChx.length > 0 && inputChx.on(CHANGE, checkedOne);
    jsNum.length > 0 && jsNum.on(INPUT, filterNumber);
    btnNext.on(CLICK, nextClicked);
	}

  function getSubEl() {
    subEl = el.find('> .heading, .mb-wrap > *');
  }

  function getFilteredSubEl() {
    subEl = el.find('> .heading, .mb-wrap > *').not('.js-hide');
  }

  function checkedAll() {
    let item = $(this),
        relatedChx = item.parents('.chx-wrap').next('.rad-wrap').find('input[type=checkbox]');

    item.prop('checked') ? relatedChx.prop('checked', true) : relatedChx.prop('checked', false);
    relatedChx.trigger(CHANGE);
  }

  function checkedOne() {
    let input = $(this),
        target = (input.hasClass(CLASS._enaEl, CLASS._disEl) || input.hasClass(CLASS._disEl)) ? el.find(input.data('target')) : null;
    // console.log(input.hasClass(CLASS._enaEl));
    input.hasClass(CLASS._enaEl) ? (input.prop('checked') ? target.removeClass(CLASS._hide) : target.addClass(CLASS._hide)) : (input.hasClass(CLASS._disEl) && target.addClass(CLASS._hide));
    btnActive = inputChx.filter(':checked').length === 0 ? (btnNext.hide(), false) : (btnNext.show(), true);
  }

  function filterNumber() {
		this.value = this.value.replace(/[^0-9.]/g, '');
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
    getSubEl();
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
    pass && (pass = checkDate());
    // console.log(pass, rqSvCheck, pass && rqSvCheck);
    // return false;
    pass && (rqSvCheck ? (passSv ? goNext() : checkServer()) : goNext());
    return pass;
  }

  function checkDate() {
		let pass = true;
		for (let i of ipDate) i.validate() || (pass = false);
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
    // console.log('goNext');
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
    // console.log('goIn ', index);
  }

	function goOut(i) {
    doneEvent.detail.target = index + i;
    animateSubEl();
	}

  function animateSubEl() {
    let delay = 0.25;
    getFilteredSubEl();
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
			(input.is(F_VISIBLE) && input.val() === '') && (pass = showWarning(input, input.attr(txtRq)));
		});
		return pass;
	}

	function checkEmail() {
		let pass = true,
				input = {},
				regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		inputEm.length === 0 || inputEm.each((_, el) => {
			input = $(el);
			input.is(F_VISIBLE) && regex.test(input.val()) || (pass = showWarning(input, input.attr(txtEm)));
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
			(input.is(F_VISIBLE) && input.val().length < min) && (pass = showWarning(input, input.attr(txtMin)));
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
			(input.is(F_VISIBLE) && input.val().length > max) && (pass = showWarning(input, input.attr(txtMax)));;
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

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._eventSection = new EventSection(this._el.querySelector('.news-tab'))
    );

    return;
    this._scrollAnimator = this._el.querySelectorAll('.scroll-animator');
    (this._scrollAnimator.length > 0) && this._scrollAnimator.forEach(e => new ScrollAnimator(e));
    this._scrollTrigger = this._el.querySelectorAll('.scroll-trigger');
    (this._scrollTrigger.length > 0) && this._scrollTrigger.forEach(e => new ScrollTrigger(e));
    this.initEvent();
  },

  initEvent() {}
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
  _btnBookmark: {},
  _btnLogin: {},
  _btnHire: {},
  _popupLogin: {},
  _popupHire: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._btnBookmark = this._el.querySelector('.details-banner .btn-bookmark'),
      this._btnLogin = this._el.querySelector('.details-banner .btn-login'),
      this._btnHire = this._el.querySelector('.details-banner .btn-hire'),
      this._popupLogin = new PopupForm('#popup-login'),
      this._popupHire = new PopupForm('#popup-hire'),
      this.initEvent()
    );
  },

  initEvent() {
    this._btnBookmark && this._btnBookmark.addEventListener(CLICK, e => (e.preventDefault(), this._btnBookmark.classList.toggle(CLASS._active)));
    this._btnLogin && this._btnLogin.addEventListener(CLICK, e => (e.preventDefault(), this._popupLogin.show()));
    this._btnHire && this._btnHire.addEventListener(CLICK, e => (e.preventDefault(), this._popupHire.show()));
    document.addEventListener(this._popupHire.getEventName(), () => this._popupHire.hide());
  }
};
/*** PAGE - SETUP PASSWORD ***/
APP.setupPassword = {
  _el: {},
  _loginForm: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._loginForm = new Form(this._el.querySelector('#login-form')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - ACCOUNT ACTIVATED ***/
APP.accActivated = {
  _el: {},
  _sectionActive: {},
  _sectionTalent: {},
  _btnJoin: {},
  _tCarousel: {},

	init() {
    let self = this;
    self._el = document.querySelector('#' + APP._pageID);
    self._el && (
      self._sectionActive = self._el.querySelector('#section-active'),
      self._sectionTalent = self._el.querySelector('#section-talent'),
      self._btnJoin = self._el.querySelector('#btn-join'),
      self._tCarousel = new Carousel(self._el.querySelector('.service-board .carousel'), true, self.getMaxShow()),
      self.initScr(),
      self.initEvent()
    );
  },

  initScr() {
    let self = this,
        subEl = self._sectionTalent.querySelectorAll('.heading-banner > *, .carousel-holder > *');

    subEl.forEach((e, i) => TweenMax.set(e, {
      y: -50,
      autoAlpha: 0
    }));
  },

  initEvent() {
    let self = this;
    self._btnJoin.addEventListener(CLICK, self.showProTalent);
    document.addEventListener(SIZE_CHANGED, () => self._tCarousel.updateMaxShow(self.getMaxShow()));
  },

  showProTalent(e) {
    e.preventDefault();
    let self = APP.accActivated,
        subEl = self._sectionActive.querySelectorAll('.heading-banner > *'),
        delay = 0.25;

    subEl.forEach((e, i) => TweenMax.to(e, 0.5, {
      y: -50,
      autoAlpha: 0,
			force3D: true,
      delay: delay * i,
      onComplete: subEl.length === (i + 1) && self.activeAnimateDone
		}));
  },

  activeAnimateDone() {
    let self = APP.accActivated,
        subEl = self._sectionTalent.querySelectorAll('.heading-banner > *, .carousel-holder > *'),
        delay = 0.25;

    self._sectionTalent.classList.toggle(CLASS._hide);
    subEl.forEach((e, i) => TweenMax.to(e, 0.5, {
      y: 0,
      autoAlpha: 1,
			force3D: true,
      delay: delay * i,
      onComplete: subEl.length === (i + 1) && self.talentAnimateDone
		}));
    document.dispatchEvent(SIZE_CHANGED_EVENT);
  },

  talentAnimateDone() {},
  getMaxShow:() => APP._W > 960 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1
};
/*** PAGE - PROJECT DETAILS ***/
APP.projectDetails = {
  _el: {},
  _aSlider: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._aSlider = new Slider(this._el.querySelector('.aside-slider'), 0),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - TALENT CTR ***/
APP.talentCtr = {
  _el: {},
  _btnAddExp: {},
  _btnEditExp: {},
  _btnEditPref: {},
  _rolesCarousel: {},
  _popupAddExp: {},
  _popupEditExp: {},
  _popupEditPref: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._btnAddExp = this._el.querySelector('#btn-add-exp'),
      this._btnEditExp = this._el.querySelectorAll('.btn-edit-exp'),
      this._btnEditPref = this._el.querySelector('#btn-edit-pref'),
      this._rolesCarousel = new Carousel(this._el.querySelector('.carousel-holder .carousel'), true, this.getMaxShow()),
      this._popupAddExp = new PopupForm('#popup-talent-add-exp'),
      this._popupEditExp = new PopupEditExp('#popup-talent-edit-exp'),
      this._popupEditPref = new PopupForm('#popup-talent-edit-pref'),
      this.initEvent()
    );
  },

  initEvent() {
    this._btnAddExp.addEventListener(CLICK, e => (e.preventDefault(), this._popupAddExp.show()));
    this._btnEditExp.forEach(btn => btn.addEventListener(CLICK, e => {
      e.preventDefault();
      $.getJSON(btn.getAttribute('data-url'), data => APP.talentCtr._popupEditExp.update(data));
    }));
    this._btnEditPref.addEventListener(CLICK, e => (e.preventDefault(), this._popupEditPref.show()));

    document.addEventListener(SIZE_CHANGED, () => this._rolesCarousel.updateMaxShow(this.getMaxShow()));
    document.addEventListener(this._popupAddExp.getEventName(), () => this._popupAddExp.hide());
    document.addEventListener(this._popupEditExp.getEventName(), () => this._popupEditExp.hide());
    document.addEventListener(this._popupEditPref.getEventName(), () => this._popupEditPref.hide());
  },

  getExp() {
    console.log(this);
  },

  getMaxShow: () => APP._W > 1200 ? 4 : APP._W > 960 && APP._W <= 1200 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1,
};
/*** PAGE - TALENT CTR EDIT ***/
APP.talentCtrEdit = {
  _el: {},
  _formEdit: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._el._formEdit = new Form(this._el.querySelector('#form-edit')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - TALENT CTR PW ***/
APP.talentCtrPw = {
  _el: {},
  _loginForm: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._loginForm = new Form(this._el.querySelector('#login-form')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - TALENT SUBMITTED ***/
APP.talentSubmitted = {
  _el: {},
  _formFilter: {},
  _inputSearch: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - TALENT RECOMMENDED ***/
APP.talentRecommended = {
  _el: {},
  _inputSearch: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - CLIENT CASTING BOARD ***/
APP.clientCastingBoard = {
  _el: {},
  _formFilter: {},
  _inputSearch: {},
  _btnToggle: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this._btnToggle = this._el.querySelectorAll('.btn-toggle'),
      this.initEvent()
    );
  },

  initEvent() {
    this._btnToggle.forEach(btn => btn.addEventListener(CLICK, e => {
      e.preventDefault();
      let parent = btn.parentNode,
          list = parent.nextElementSibling;

      parent.classList.contains(CLASS._active) ? (parent.classList.remove(CLASS._active), APP.slideUp(list)) : (parent.classList.add(CLASS._active), APP.slideDown(list));
    }));
  }
};
/*** PAGE - CASTING BOARD ***/
APP.castingBoard = {
  _el: {},
  _bSlider: {},
  _tCarousel: {},
  _formFilter: {},
  _inputSearch: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._bSlider = new Slider(this._el.querySelector('.banner-slider'), 0),
      this._tCarousel = new Carousel(this._el.querySelector('.testimonial .carousel'), true, this.getMaxShow()),
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this.initEvent()
    );
  },

  initEvent() {
    document.addEventListener(SIZE_CHANGED, () => this._tCarousel.updateMaxShow(this.getMaxShow()));
  },

  getMaxShow:() => APP._W > 960 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1
};
/*** PAGE - CLIENT NEW PROJECT ***/
APP.clientNewProject = {
  _el: {},
  _form: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._el._form = new Form(this._el.querySelector('#form-project')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - CLIENT PROFILE ***/
APP.clientProfile = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && this.initEvent();
  },

  initEvent() {}
};
/*** PAGE - CLIENT PROFILE EDIT ***/
APP.clientProfileEdit = {
  _el: {},
  _formProject: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._el._formEdit = new Form(this._el.querySelector('#form-edit')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - CLIENT PW ***/
APP.clientPw = {
  _el: {},
  _loginForm: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._loginForm = new Form(this._el.querySelector('#login-form')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - CLIENT PROJECT DETAILS ***/
APP.clientProjectDetails = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - CLIENT ROLE DETAILS ***/
APP.clientRoleDetails = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - CLIENT ACCOUNT ***/
APP.clientAccount = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && this.initEvent();
  },

  initEvent() {}
};
/*** PAGE - CLIENT PAYMENT ***/
APP.clientPayment = {
  _el: {},
  _btnRemove: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._btnRemove = this._el.querySelectorAll('.btn-remove'),
      this.initEvent()
    );
  },

  initEvent() {
    this._btnRemove.forEach(btn => btn.addEventListener(CLICK, e => {
      e.preventDefault();
      let title = e.target.title,
          desc = e.target.getAttribute('desc'),
          link = e.target.href;

      APP.popup._warning.update(title, desc, () => { window.location = link });
      APP.popup._warning.show();
    }));
  }
};
/*** PAGE - CLIENT PAYMENT EDIT ***/
APP.clientPaymentEdit = {
  _el: {},
  _loginForm: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._loginForm = new Form(this._el.querySelector('#form-edit')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - CLIENT PAYMENT ADD ***/
APP.clientPaymentAdd = {
  _el: {},
  _loginForm: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._loginForm = new Form(this._el.querySelector('#form-add')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - OUR TALENT ***/
APP.ourTalent = {
  _el: {},
  _formFilter: {},
  _bSlider: {},
  _tCarousel: {},
  _sCarousel: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._bSlider = new Slider(this._el.querySelector('.banner-slider'), 0),
      this._tCarousel = new Carousel(this._el.querySelector('.testimonial .carousel'), true, this.getMaxShow()),
      this._sCarousel = new Carousel(this._el.querySelector('.service-board .carousel'), true, this.getMaxShow()),
      this.initEvent()
    );
  },

  initEvent() {
    document.addEventListener(SIZE_CHANGED, () => {
      this._tCarousel.updateMaxShow(this.getMaxShow()),
      this._sCarousel.updateMaxShow(this.getMaxShow())
    });
  },

  getMaxShow:() => APP._W > 960 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1
};
/*** PAGE - CLIENT PLAN ***/
APP.clientPlan = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - CLIENT NEW ROLE ***/
APP.clientNewRole = {
  _el: {},
  _form: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._el._form = new Form(this._el.querySelector('#form-role')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - CLIENT EDIT ROLE ***/
APP.clientEditRole = {
  _el: {},
  _form: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._el._form = new Form(this._el.querySelector('#form-role')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - CLIENT EDIT PROJECT ***/
APP.clientEditProject = {
  _el: {},
  _form: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._el._form = new Form(this._el.querySelector('#form-project')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - ROLE DETAILS ***/
APP.roleDetails = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - NEWS EVENT ***/
APP.newsEvent = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && this.initEvent();
  },

  initEvent() {}
};
/*** PAGE - REDO ROLE DETAILS ***/
APP.redoRoleDetails = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && this.initEvent();
  },

  initEvent() {}
};
/*** PAGE - REDO ROLE SUBMIT ***/
APP.redoRoleSubmit = {
  _el: {},
  _form: {},
  _addLink: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._form = new Form(this._el.querySelector('#form-role-submit')),
      this._addLink = this._el.querySelectorAll('.add-link'),
      this.initEvent()
    );
  },

  initEvent() {
    this._addLink.forEach(btn => btn.addEventListener(CLICK, e => {
      e.preventDefault();
      APP.popup._upload.show(btn.dataset);
    }));
  }
};
/*** PAGE - REDO PROJECT DETAILS ***/
APP.redoProjectDetails = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && this.initEvent();
  },

  initEvent() {}
};
/*** PAGE - REDO PROJECT BREAKDOWN ***/
APP.redoProjectBreakdown = {
  _el: {},
  _formFilter: {},
  _inputSearch: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - TALENT SERVICES ***/
APP.talentServices = {
  _el: {},
  _bSlider: {},
  _bCarousel: {},
  _sCarousel: {},
  _vidSection: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._bSlider = new Slider(this._el.querySelector('.banner-slider'), 0),
      this._bCarousel = new Carousel(this._el.querySelector('.benefit .carousel'), true, this.getMaxBenefitShow()),
      this._sCarousel = new Carousel(this._el.querySelector('.service-board .carousel'), true, this.getMaxServiceShow()),
      this._vidSection = new VideoSection(this._el.querySelector('.vid-section')),
      this.initEvent()
    );
  },

  initEvent() {
    document.addEventListener(SIZE_CHANGED, () => {
      this._bCarousel.updateMaxShow(this.getMaxBenefitShow()),
      this._sCarousel.updateMaxShow(this.getMaxServiceShow())
    });
  },

  getMaxBenefitShow:() => APP._W > 1200 ? 4 : APP._W > 960 && APP._W <= 1200 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1,
  getMaxServiceShow:() => APP._W > 960 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1
};

/*** PAGE - PHASE 2 CLIENT DASH BOARD ***/
APP.p2ClientDashBoard = {
  _el: {},
  _btnMore: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._btnMore = this._el.querySelectorAll('.btn-more'),
      this.initEvent()
    );
  },

  initEvent() {
    this._btnMore.forEach(btn => btn.addEventListener(CLICK, e => {
      e.preventDefault();
      btn.classList.contains(CLASS._active) || this._btnMore.forEach(btn => btn.classList.remove(CLASS._active));
      btn.classList.toggle(CLASS._active);
    }));
  }
};
/*** PAGE - PHASE 2 CLIENT MANAGE PROJECT ***/
APP.p2ClientManageProject = {
  _el: {},
  _formFilter: {},
  _inputSearch: {},
  _btnMore: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this._btnMore = this._el.querySelectorAll('.btn-more'),
      this.initEvent()
    );
  },

  initEvent() {
    this._btnMore.forEach(btn => btn.addEventListener(CLICK, e => {
      e.preventDefault();
      btn.classList.contains(CLASS._active) || this._btnMore.forEach(btn => btn.classList.remove(CLASS._active));
      btn.classList.toggle(CLASS._active);
    }));
  }
};
/*** PAGE - PHASE 2 CLIENT ADD PROJECT ***/
APP.p2ClientProject = {
  _el: {},
  _form: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._el._form = new Form(this._el.querySelector('#form-project')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - PHASE 2 CLIENT PROJECT DETAILS ***/
APP.p2ClientProjectDetails = {
  _el: {},
  _formFilter: {},
  _inputSearch: {},
  _projList: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this._projList = new ProjectList(this._el.querySelector('#project-list')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - PHASE 2 CLIENT ROLE ***/
APP.p2ClientRole = {
  _el: {},
  _form: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._el._form = new Form(this._el.querySelector('#form-role')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - PHASE 2 CLIENT ROLE DETAILS ***/
APP.p2ClientRoleDetails = {
  _el: {},
  _formFilter: {},
  _inputSearch: {},
  _projList: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this._projList = new ProjectList(this._el.querySelector('#project-list')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - PHASE 2 CLIENT OUR TALENTS ***/
APP.p2ClientOurTalents = {
  _el: {},
  _formFilter: {},
  _inputSearch: {},
  _projList: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this._projList = new ProjectList(this._el.querySelector('#project-list')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - PHASE 2 CLIENT TALENT DETAILS ***/
APP.p2ClientTalentDetails = {
  _el: {},
  _btnNone: {},
  _btnHire: {},
  _popupHire: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._btnNone = this._el.querySelector('.p2-header-wrap .btn-none'),
      this._btnHire = this._el.querySelector('.p2-header-wrap .btn-hire'),
      this._popupHire = new PopupForm('#popup-hire'),
      this.initEvent()
    );
  },

  initEvent() {
    this._btnNone && this._btnNone.addEventListener(CLICK, this.showPopupAlert);
    this._btnHire && this._btnHire.addEventListener(CLICK, e => (e.preventDefault(), this._popupHire.show()));
  },

  showPopupAlert(e) {
    e.preventDefault();
    let data = e.target.dataset,
        html = `<a href="${data.url}" class="btn-border-gold type-3 cta" role="button">${data.cta}<i class="icon-plus"></i></a>`;

    APP.popup._alert.update(data.title, data.desc, html);
    APP.popup._alert.show();
  }
};
/*** PAGE - PHASE 2 CLIENT INFO ***/
APP.p2ClientInfo = {
  _el: {},
  _form: {},
  _btnPayment: {},
  _popupPayment: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._el._form = new Form(this._el.querySelector('#form-profile')),
      this._btnPayment = this._el.querySelectorAll('.btn-payment'),
      this._popupPayment = new PopupPayment('#popup-payment'),
      this.initEvent()
    );
  },

  initEvent() {
    this._btnPayment.forEach(btn => btn.addEventListener(CLICK, e => {
      e.preventDefault();
      this._popupPayment.show(btn.dataset);
    }));
    document.addEventListener(this._popupPayment.getEventName(), () => this._popupPayment.hide());
  }
};
/*** PAGE - PHASE 2 TALENT BILLBOARD ***/
APP.p2TalentBillboard = {
  _el: {},
  _formFilter: {},
  _inputSearch: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this.initEvent()
    );
  },

  initEvent() {
  }
};
/*** PAGE - CASTING SERVICES ***/
APP.castingServices = {
  _el: {},
  _sCarousel: {},
  _vidSection: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._sCarousel = new Carousel(this._el.querySelector('.service-board .carousel'), true, this.getMaxShow()),
      this._vidSection = new VideoSection(this._el.querySelector('.vid-section')),
      this.initEvent()
    );
  },

  initEvent() {
    document.addEventListener(SIZE_CHANGED, this._sCarousel.updateMaxShow(this.getMaxShow()));
  },

  getMaxShow:() => APP._W > 960 ? 3 : APP._W > 640 && APP._W <= 960 ? 2 : 1
};
/*** PAGE - PHASE 2 TALENT ROLE DETAILS ***/
APP.p2TalenttRoleDetails = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - PHASE 2 TALENT PROJECT DETAILS ***/
APP.p2TalentProjDts = {
  _el: {},
  _formFilter: {},
  _inputSearch: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this.initEvent()
    )
  },

  initEvent() {}
};
/*** PAGE - PHASE 2 TALENT ROLE SUBMIT ***/
APP.p2TalentRoleSubmit = {
  _el: {},
  _form: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._form = new Form(this._el.querySelector('#form-role-submit')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - PHASE 2 TALENT MANAGE ROLES ***/
APP.p2TalentManageRoles = {
  _el: {},
  _formFilter: {},
  _inputSearch: {},
  _projList: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._formFilter = new Form(this._el.querySelector('#form-filter')),
      this._inputSearch = new InputWrap(this._el.querySelector('#form-search .input-wrap')),
      this._projList = new ProjectList(this._el.querySelector('#project-list')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - PHASE 2 TALENT ROLE REQUEST ***/
APP.p2TalentRoleRequest = {
  _el: {},
  _requestCtr: {},
  _btnRequest: {},
  _form: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._requestCtr = new RequestCtr(this._el),
      this._btnRequest = this._el.querySelector('#btn-request'),
      this._form = new Form(this._el.querySelector('#form-role-submit')),
      this.initEvent()
    )
  },

  initEvent() {
    this._btnRequest && this._btnRequest.addEventListener(CLICK, e => {
      e.preventDefault();
      let data = e.target.dataset;
      APP.popup._warning.update(data.title, data.desc, () => this.submitRequest());
      APP.popup._warning.show();
    });
  },

  submitRequest() {
    APP.popup._warning.hide();
    this._form.requestSubmit();
  }
};
/*** PAGE - PHASE 2 TALENT INFO ***/
APP.p2TalentInfo = {
  _el: {},
  _form: {},
  _btnPayment: {},
  _popupPayment: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._el._form = new Form(this._el.querySelector('#form-profile')),
      this._btnPayment = this._el.querySelectorAll('.btn-payment'),
      this._popupPayment = new PopupPayment('#popup-payment'),
      this.initEvent()
    );

    // APP.popup._alert.update('Payment Success', 'Thank you for purchasing the upgrade package!', '<a class="btn-gold-back" href="1-home.html">back to homepage</a>');
    // APP.popup._alert.show();

    // APP.popup._alert.update('Payment failed', 'We are unable to process payment for this transaction. Please try again or contact us.', '<a class="btn-gold-back" href="#" role="button" onclick="window.location.reload()">retry payment</a>');
    // APP.popup._alert.show();
  },

  initEvent() {
    this._btnPayment.forEach(btn => btn.addEventListener(CLICK, e => {
      e.preventDefault();
      this._popupPayment.show(btn.dataset);
    }));
    document.addEventListener(this._popupPayment.getEventName(), () => this._popupPayment.hide());
  }
};
/*** PAGE - SIGNUP ***/
APP.signup = {
  _el: {},
  _signUpTalent: {},
  _signUpClient: {},
  _btnSignUpTalent: {},
  _btnSignUpClient: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._btnSignUpTalent = this._el.querySelector('.btn-signup-talent'),
      this._btnSignUpClient = this._el.querySelector('.btn-signup-client'),
      this._signUpTalent = new SignUpPopup(this._el.querySelector('.signup-talent')),
      this._signUpClient = new SignUpPopup(this._el.querySelector('.signup-client')),
      this.initEvent(),
      this.checkHash()
    );
    this._signUpTalent.show();
    // this._signUpClient.goTo(5);
  },

  initEvent() {
    this._btnSignUpTalent.addEventListener(CLICK, (e) => {
      e.preventDefault();
      this._signUpTalent.show();
    });

    this._btnSignUpClient.addEventListener(CLICK, (e) => {
      e.preventDefault();
      this._signUpClient.show();
    });

    document.addEventListener(SIZE_CHANGED, () => {
      this._signUpTalent.updateSize();
      this._signUpClient.updateSize();
    });
  },

  checkHash() {
    if (window.location.hash.length === 0) return false;
    switch(window.location.hash) {
      case '#signup-talent': this._btnSignUpTalent.click(); break;
      case '#signup-client': this._btnSignUpClient.click(); break;
    }
  }
};
/*** PAGE - LOGIN ***/
APP.login = {
  _el: {},
  _loginForm: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._loginForm = new Form(this._el.querySelector('.login-form')),
      this.initEvent()
    );
  },

  initEvent() {}
};
/*** PAGE - ABOUT US ***/
APP.aboutUs = {
  _el: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && this.initEvent();
  },

  initEvent() {}
};
/*** PAGE - POST DETAILS ***/
APP.postDetails = {
  _el: {},
  _aSlider: {},

	init() {
    this._el = document.querySelector('#' + APP._pageID);
    this._el && (
      this._aSlider = new Slider(this._el.querySelector('.aside-slider'), 0),
      this.initEvent()
    );
  },

  initEvent() {}
};
/***** Check Box *****/
let ChxBox = function(element) {
	let el = $(element),
			input = el.find('input'),
      warning = el.find('.warning'),
      checkRq = el.hasClass(CLASS._require),
      checkMin = el.hasClass(CLASS._min),
      checkMax = el.hasClass(CLASS._max),

			txtRq = checkRq ? el.attr('required-txt') : null,
      txtMin = checkMin ? el.attr('min-txt') : null,
      min = checkMin ? parseInt(el.data('min')) : 0,
      txtMax = checkMax ? el.attr('max-txt') : null,
      max = checkMax ? parseInt(el.data('max')) : 0;

  (() => initEvent())();
  function initEvent() {
    input.on('change', () => warning.removeClass(CLASS._dlex));
  }

  this.validate = () => {
    // console.log('check box validate');
    let pass = true,
        checked = input.filter(':checked').length;

    pass = checkRq ? (input.is(':checked') ? true : (warning.text(txtRq).addClass(CLASS._dlex), false)) : true;
    pass && (pass = checkMin ? ((checked >= min) ? true : (warning.text(txtMin).addClass(CLASS._dlex), false)) : true);
    pass && (pass = checkMax ? ((checked <= max) ? true : (warning.text(txtMax).addClass(CLASS._dlex), false)) : true);

    return pass;
  }


	this.reset = () => (input.prop('checked', false), warning.removeClass(CLASS._dlex));
	return this;
};
/***** File List Control *****/
let FileListCtr = function(element) {
  let el = $(element),
      elWrap = el.parent(),
      input = el.find('input[type=file]'),
      fileList = el.find('> .list-file'),
      max = parseInt(input.data('max')),
      allowType = input.attr('accept').split(','),
      b64Array = [],
      list = {},
      hasOldFile = fileList.find('.item').length > 0 ? true : false,
      maxFile = parseInt(el.data('max'));

  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    input.on(CHANGE, function() {
      let reader = {},
          fileArray = filterFile(input.get(0).files),
          arrayLength = fileArray.length,
          flag = 0;

      // fileList.empty();
      // b64Array = [];
      hasOldFile && fileArray && removeOldFile();
      fileArray && fileArray.forEach((file, index) => {
        reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = e => {
          addFile(index, file);
          b64Array.push(e.target.result);
          checkMax();
          (++flag === arrayLength) && initClickEvent();
        };
      });
    });
  }

  function filterFile(files) {
    let fileArray = [];
    [...files].forEach(e => (e.size / (1000*1000).toFixed(2) < max && allowType.includes(e.type)) && fileArray.push(e));
    return fileArray;
  }

  function addFile(index, file) {
    // indexFile = indexFile + index;
    let size = (file.size / (1000*1000)).toFixed(2),
        html = `<li class="item">
                  <div class="file-info">
                    <span>${file.name}</span>
                    <span>${size} MB</span>
                  </div>
                  <a href="#" role="button" class="file-remove"></a>
                </li>`;
    fileList.append(html);
  }

  function initClickEvent() {
    let btnRemove = el.find('.file-remove');

    btnRemove.each(i => btnRemove.eq(i).data('index', i));
    btnRemove.off().on('click', function(e) {
      e.preventDefault();
      let index = parseInt($(this).data('index'));
      removeItem(index);
    });
  }

  function checkMax() {
    b64Array.length > maxFile && removeItem(0);
  }

  function removeItem(index) {
    list = fileList.find('.item');
    list.eq(index).remove();
    list.length > 0 && updateIndex();
    removeFile(index);
  }

  function updateIndex() {
    list = fileList.find('.item');
    list.each(i => list.eq(i).find('.file-remove').data('index', i));
  }

  function removeFile(index) {
    b64Array.splice(index, 1);
    // console.log(b64Array);
  }

  function removeOldFile() {
    fileList.empty();
    hasOldFile = false;
  }

  this.getFileList = () => elWrap.hasClass(CLASS._hide) ? [] : b64Array;
	return this;
};
/***** SINGLE FILE *****/
let FileSingle = function(element) {
  let el = $(element),
      nameWrap = el.find('.input'),
      resetTxt = nameWrap.text(),
      input = el.find('input[type=file]'),
      inputName = input.attr('name'),
      allowType = ['image/jpeg', 'image/gif', 'image/png', 'application/pdf'],
      b64 = null;

  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    input.on(CHANGE, function () {
      reset();
      if (this.files && this.files[0]) {
        let file = this.files[0],
            reader = {};

        filterFile(file) && (
          reader = new FileReader(),
          reader.onload = e => (b64 = e.target.result),
          reader.readAsDataURL(file),
          nameWrap.text(file.name).addClass(CLASS._active)
        );
      }
    });
  }

  function reset() {
    nameWrap.text(resetTxt).removeClass(CLASS._active);
    b64 = null;
  }

  function filterFile(file) {
    return (file.size / (1000*1000).toFixed(2) < 10 && allowType.includes(file.type));
  }

  this.getName = () => inputName;
  this.getFile = () => b64;
	return this;
};

/***** Form *****/
let Form = function(element) {

	let el = $(element),
			ajaxURL = el.data('url'),
			eName = el.data('event'),
			sWarning = el.find('.warning-server'),

			inputs = el.find('.input'),
			inputRq = el.find('input.' + CLASS._require),
			inputMin = el.find('input.' + CLASS._min),
			inputMax = el.find('input.' + CLASS._max),
      inputEm = el.find('input.' + CLASS._email),
			inputCf = el.find('.js-confirm'),
			inputPw = el.find('.js-pw'),

			textarea = el.find('textarea'),
			inputSel = el.find('.input-sel'),
			chkAll = el.find('.chx-all'),
			sl = el.find('.input-sel-box'),
			chx = el.find('.chx-wrap'),
			jsNum = el.find('.js-num'),
			jsDate = el.find('.js-date'),
			jsMonth = el.find('.js-month'),

			selArray = [],
			slBox = [],
			chxBox = [],
			ipDate = [],
			ipMonth = [],

			imgArr = [],
			uploadImg = el.find('.upload-img'),
			hasImg = uploadImg.length > 0 ? true : false,

			fileArray = [],
			fileSingle = el.find('.single-file'),
			hasSingleFile =  fileSingle.length > 0 ? true : false,

			fileCtr = el.find('.upload-file'),
			hasFile = fileCtr.length > 0 ? true : false,
			btnShowPw = el.find('.btn-show-pw'),
      btnSubmit = el.find('.btn-submit'),
			needReset = btnSubmit.hasClass(CLASS._reset) ? true : false,

			txtRq = 'required-txt',
			txtMin = 'min-txt',
			txtMax = 'max-txt',
			txtEm = 'email-txt',
			txtCf = 'cf-txt',
			txtPw = 'pw-txt';


	(() => {
		initEvent();
		inputSel.length > 0 && inputSel.each((i, e) => selArray[i] = new InputSelection(e));
		sl.length > 0 && sl.each((i, e) => slBox[i] = new InputSelectionBox(e));
		chx.length > 0 && chx.each((i, e) => chxBox[i] = new ChxBox(e));
		jsDate.length > 0 && jsDate.each((i, e) => ipDate[i] = new InputDate(e));
		jsMonth.length > 0 && jsMonth.each((i, e) => ipMonth[i] = new InputMonth(e));
		// Image & File
		hasImg && (uploadImg.each((i, e) => imgArr[i] = new UploadImg(e)));
		hasSingleFile && (fileSingle.each((i, e) => fileArray[i] = new FileSingle(e)))
		hasFile && (fileCtr = new FileListCtr(fileCtr, 3));
	})();

	function initEvent() {
		inputs.on(F_IN, activeWrap).on(F_OUT, deactiveWrap);
		inputRq.on(F_IN, inputFocus);
		btnShowPw.on(CLICK, toggelPass);
		btnSubmit.on(CLICK, submitClicked);
		jsNum.length > 0 && jsNum.on(INPUT, filterNumber);
		chkAll.length > 0 && chkAll.on(CHANGE, checkedAll);
	}

	function checkedAll() {
    let item = $(this),
        relatedChx = item.parents('.chx-wrap').next('.chx-wrap').find('input[type=checkbox]');

    item.prop('checked') ? relatedChx.prop('checked', true) : relatedChx.prop('checked', false);
    relatedChx.trigger(CHANGE);
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
		checkValidate() && submit();
	}

	function checkValidate() {
		let pass = true;
		pass = checkRequire();
		pass && (pass = checkPw());
		pass && (pass = checkMin());
		pass && (pass = checkMax());
		pass && (pass = checkConfirm());
		pass && (pass = checkEmail());
		pass && (pass = checkDate());
		pass && (pass = checkMonth());
		// pass && (pass = checkSlBox());
		pass && (pass = checkChxBox());
		return pass;
	}

	// function checkSlBox() {
	// 	let pass = true;
	// 	for (let i of slBox) i.validate() || (pass = false);
	// 	return pass;
	// }

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

	function checkMonth() {
		let pass = true;
		for (let i of ipMonth) i.validate() || (pass = false);
		return pass;
	}

	function submit() {
		APP.popup._loading.show();
		sWarning.hide();
		$.ajax({
			type: APP._submitMethod,
			url: ajaxURL,
			data: getData(),
			headers: APP._headers,
			success: data => {
				let status = parseInt(data.status),
						title = data.title,
						message = data.message,
						html = data.html,
						url = data.url;

				APP.popup._loading.hide();
				switch(status) {
					case 0: {
						sWarning.text(message).show();
					} break;
					case 1: {
						url ? (window.location.href = url) : (
							APP.popup._alert.update(title, message, html),
							APP.popup._alert.show(),
							needReset && resetForm(),
							eName && fireEvent()
						);
					} break;
					case 2: {
						resetForm();
						sWarning.text(message).show();
					} break;
				}
			}
		});
	}

	function fireEvent() {
		let doneEvent = new CustomEvent(eName, { bubbles: true });
		document.dispatchEvent(doneEvent);
	}

	function getData() {
    let data = el.serializeArray(),
        file = {},
        files = hasFile && fileCtr.getFileList();

		hasImg && imgArr.forEach((e, i) => {
			file = e.getImg();
			file && data.push({
			  name: `upload-img[${i}]`,
			  value: file
			});
		});

		hasSingleFile && fileArray.forEach((e, i) => {
			file = e.getFile();
			file && data.push({
			  name: e.getName(),
			  value: file
			});
		});

    files.length && files.forEach((e, i) => data.push({
      name: `upload-file[${i}]`,
      value: e
    }));
    return data;
  }

	function resetForm() {
		// reset input
		// reset textarer
		// reset selection

		inputs.length > 0 && (inputs.val(''), inputs.parents('.input-wrap').removeClass(CLASS._active));
		textarea.length > 0 && (textarea.val(''), textarea.parents('.input-wrap').removeClass(CLASS._active));

		// reset selection checkbox
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

	function checkPw() {
		let pass = true,
				input = {},
				warning = {},
				regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}/;

		inputPw.length === 0 || inputPw.each((_, el) => {
			input = $(el);
			warning = input.parent().next('.warning');
			regex.test(input.val()) || (input.addClass(CLASS._error), warning.text(input.attr(txtPw)).addClass(CLASS._dlex), pass = false);
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

	this.getEventName = () => eName;
	this.requestSubmit = () => (checkValidate() && submit());
	return this;
};

/***** Input Date *****/
let InputDate = function(element) {
  let el = $(element),
      oldVal = '',
      warning = el.parent().next('.warning'),
      txtIvl = el.attr('date-txt'),
      isRq = el.hasClass(CLASS._required);

  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    el.on('keyup', onKeyUp);
    el.on('input', () => el.val(el.val().replace(/[^0-9/]/g, '')));
  }

  function onKeyUp(e) {
    let val = $.trim(el.val());
    e.preventDefault();
    e.stopPropagation();
    oldVal = (val.length === 5 || val.length === 2) ? ((val.length > oldVal.length) ? el.val(val + '/') : (val.length < oldVal.length) && el.val(val.slice(0, val.length - 1)),el.val()) : val;
  }

  // function onKeyDown(e) {
  //   let val = $.trim(el.val()),
  //       code = parseInt(e.keyCode || e.which);
  //   return (code === 0 || code === 8 || code === 229 || (code >= 48 && code <= 57) || (code >= 96 && code <= 105)) ? true : false;
  // }

  function validateDate() {
    let val = $.trim(el.val()),
        parts = '',
        day = 0,
        month = 0,
        year = 0,
        monthLength = [];

    if (!isRq && val.length === 0) return true;
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

  this.validate = () => validateDate() ? true : (warning.text(txtIvl).addClass(CLASS._dlex), el.addClass(CLASS._error), false);
	return this;
};

/***** Input Month *****/
let InputMonth = function(element) {
  let el = $(element),
      oldVal = '',
      warning = el.parent().next('.warning'),
      txtIvl = el.attr('ivl-txt'),
      isRq = el.hasClass(CLASS._required);

  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    el.on('keyup', onKeyUp);
    el.on('input', () => el.val(el.val().replace(/[^0-9/]/g, '')));
  }

  function onKeyUp(e) {
    let val = $.trim(el.val());
    e.preventDefault();
    e.stopPropagation();
    oldVal = (val.length === 2) ? ((val.length > oldVal.length) ? el.val(val + '/') : (val.length < oldVal.length) && el.val(val.slice(0, val.length - 1)),el.val()) : val;
  }

  // function onKeyDown(e) {
  //   let val = $.trim(el.val()),
  //       code = parseInt(e.keyCode || e.which);
  //   return (code === 0 || code === 8 || code === 229 || (code >= 48 && code <= 57) || (code >= 96 && code <= 105)) ? true : false;
  // }

  function validateDate() {
    let val = $.trim(el.val()),
        parts = '',
        month = 0,
        year = 0;

    if (!isRq && val.length === 0) return true;
    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}/.test(val)) return false;

    // Parse the date parts to integers
    parts = val.split('/');
    month = parseInt(parts[0], 10);
    year = parseInt(parts[1], 10);

    // Check the ranges of month and year
    if(month == 0 || month > 12) return false;
    return true;
  }

  this.validate = () => validateDate() ? true : (warning.text(txtIvl).addClass(CLASS._dlex), el.addClass(CLASS._error), false);
	return this;
};
/***** Input Selection Box *****/
let InputSelectionBox = function(element) {

  let el = $(element),
      inputTxt = el.find('input[type=text]'),
      optCount = el.find('.txt-label > span'),
      optList = el.find('.opt-list'),
      chx = optList.find('input[type=checkbox]'),
      isRedo = el.hasClass('redo-input');


  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    inputTxt.on(CLICK, toggleOptList);
    chx.on(CHANGE, update);
    document.addEventListener(SLBOX_OPEN, () => closeList());
  }

  function toggleOptList(e) {
    e.preventDefault();
    (el.hasClass(CLASS._active) && el.hasClass(CLASS._open)) ? closeList() : openList();
  }

  function closeList() {
    optList.slideUp();
    el.removeClass(CLASS._activeOpen);
  }

  function openList() {
    document.dispatchEvent(SLBOX_OPEN_EVENT);
    optList.slideDown();
    el.addClass(CLASS._activeOpen);
  }

  function update() {
    isRedo ? updateTxt() : updateOptCount();
  }

  function updateTxt() {
    let val = '';
    chx.each((_, e) => {
      let item = $(e);
      item.is(':checked') && (val += item.val() + ', ')
    });
    inputTxt.val(val.slice(0, val.length - 2));
  }

  function updateOptCount() {
    let num = 0;
    chx.each((_, e) => { $(e).is(':checked') && num++ });
    optCount.text('(' + num + ')');
  }

  this.reset = () => {
    chx.prop('checked', false);
    el.removeClass(CLASS._active);
    optCount.text('');
  }

	return this;
};
/***** Input Selection *****/
let InputSelection = function(element) {

  let el = $(element),
      inputVal = el.find('input[type=hidden]'),
      inputTxt = el.find('input[type=text]'),
      label = el.find('label'),
      optList = el.find('.opt-list'),
      optItem = optList.find('li');


  (() => init())();
  function init() {
    // inputVal.val(null);
    // inputTxt.val(null);
    initEvent();
  }

  function initEvent() {
    inputTxt.on(F_IN, inputIn);
    inputTxt.on(F_OUT, inputOut);
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
      jQuery.trim(inputTxt.val()).length === 0 && el.removeClass(CLASS._active);
      optList.slideUp();
      el.removeClass(CLASS._open)
    }, 10);
  }

  function itemClicked(e) {
    e.preventDefault();
    let item = $(this),
        val = item.data('value'),
        txt = item.text();

    if (item.hasClass('has-icon')) {
      txt = item.find('i').text();
      inputTxt.css({ 'background-image': 'url(' + item.find('img').attr('src') + ')' });
    }

    optItem.removeClass(CLASS._active);
    item.addClass(CLASS._active);
    el.addClass(CLASS._active);
    inputVal.val(val);
    inputTxt.val(txt);
  }

  this.reInit = () => {
    optItem = optList.find('li');
    optItem.off(CLICK).on(CLICK, itemClicked);
  }

	return this;
};
// /***** Input Wrap *****/
// let InputWrap = function(element) {

//   let el = $(element),
//       input = el.find('input'),
//       label = el.find('label');


//   (() => init())();
//   function init() {
//     initEvent();
//   }

//   function initEvent() {
//     // el.on(CLICK, wrapClicked);
//     input.on(F_OUT, inputOut);
//   }

//   function wrapClicked(e) {
//     e.preventDefault();
//     e.stopPropagation();
//     el.addClass(CLASS._active);
//     setTimeout(() => input.focus(), 200);
//   }

//   function inputOut(e) {
//     e.preventDefault();
//     let val = jQuery.trim(input.val());

//     console.log(val.length);

//     if (val.length === 0) {
//       el.hasClass(CLASS._hasval) && el.removeClass(CLASS._hasval);
//     } else {
//       el.addClass(CLASS._hasval);
//     }
//     el.hasClass(CLASS._active) && el.removeClass(CLASS._active);
//   }

// 	return this;
// };
let InputWrap = function(element) {
  let el = $(element),
      input = el.find('input');

  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    // el.on(CLICK, wrapClicked);
    input.on(F_IN, activeWrap).on(F_OUT, deactiveWrap);
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
/***** Upload Image *****/
let UploadImg = function(element) {
  let el = $(element),
      holder = el.find('.holder'),
      input = el.find('input[type=file]'),
      img = el.find('img'),
      txtErr = el.find('.warning'),
      max = parseInt(input.data('max')),
      txtMax = input.attr('txt-max'),
      txtType = input.attr('txt-type'),
      imgB64 = null;

  (() => init())();
  function init() {
    initEvent();
  }

  function initEvent() {
    input.on(CHANGE, fileChanged);
  }

  function fileChanged() {
    reset();
    if (this.files && this.files[0]) {
      let file = this.files[0];
      filterFile(file) && showImg(file);
    }
  }

  function filterSize(size) {
    let pass = true;
    (size / (1000*1000).toFixed(2) < max) || (pass = false, showErr(txtMax));
    return pass;
  }

  function filterType(type) {
    let pass = true;
    type.includes('image/') || (pass = false, showErr(txtType));
    return pass;
  }

  function filterFile(file) {
    let pass = true;
    pass = filterSize(file.size);
    pass && (pass = filterType(file.type));
    return pass;
  }

  function showImg(file) {
    let reader = new FileReader();

    reset();
    holder.hasClass(CLASS._active) || holder.addClass(CLASS._active);
    reader.readAsDataURL(file);
    reader.onload = e => {
      imgB64 = e.target.result;
      img.attr('src', imgB64);
    }
  }

  function showErr(err) {
    el.addClass(CLASS._error);
    txtErr.text(err);
  }

  function reset() {
    el.hasClass(CLASS._error) && el.removeClass(CLASS._error);
  }

  this.getImg = () => imgB64;
	return this;
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
let PopupAlert = function(element) {
  let el = $(element),
      popup = new PopupBase(el),
      pTitle = el.find('.title'),
      pDesc = el.find('.desc'),
      pHtml = el.find('.html');

  this.update = (title, desc, html = '') => {
    title.length > 0 && pTitle.text(title);
    desc.length > 0 && pDesc.text(desc);
    html.length > 0 && pHtml.html(html);
  }

  this.show = () => popup.show();
  this.hide = () => popup.hide();
  return this;
};
let PopupBase = function(element) {
  let el = $(element),
      overlay = el.find('.overlay'),
      btnClose = el.find('.btn-close');

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
    overlay.on(CLICK, close);
    btnClose.on(CLICK, close);
  }

  function close(e) {
    e.preventDefault();
    console.log('base');
    el.fadeOut();
    APP._isOvlActive = false;
    APP._html.removeClass(CLASS._ovlActive);
  }

  return this;
};
let PopupEditExp = function(element) {
  let el = $(element),
      popup = new PopupBase(el),
      form = new Form(el.find('form'));

  this.update = data => {
    let inputWrap = el.find('.input-wrap'),
        inputSel = el.find('.input-sel'),
        dataArray = [];

    for(let i in data) dataArray.push(data[i]);
    el.find('input[name=exp-id]').val(data.id);
    inputWrap.each(function(i) {
      $(this).addClass(CLASS._active).find('input').val(dataArray[i]);
    });

    dataArray = dataArray.slice(inputWrap.length + 1);
    inputSel.each(function(i) {
      $(this).find('input[type=hidden]').val(dataArray[i]);
    });

    popup.show();
  }

  this.show = () => popup.show();
  this.hide = () => popup.hide();
  this.getEventName = () => form.getEventName();
  return this;
};

let PopupForm = function(element) {
  let el = $(element),
      popup = new PopupBase(el),
      form = new Form(el.find('form'));

  this.show = () => popup.show();
  this.hide = () => popup.hide();
  this.getEventName = () => form.getEventName();
  return this;
};
let PopupMedia = function(element) {
  let el = $(element),
      popup = new PopupBase(el),
      btnClose = el.find('.btn-close'),
      wrap = el.find('.vid-wrap'),
      media = {};

  (() => initEvent())();
  function initEvent() {
    btnClose.on(CLICK, () => media.pause());
  }

  this.show = data => update(data);
  this.hide = () => hidePopup();
  this.getEventName = () => form.getEventName();

  function update(data) {
    console.log(data);

    let src = data.src,
        mediaTag = getMediaTag(src),
        html = '';

    switch(mediaTag) {
      case 'video': {
        html = `<video poster="${data.poster}" controls>
                  <source src="${src}" type="${getMediaType(src)}"/>
                </video>`;
      } break;

      case 'audio': {
        html = `<img class="media-poster" src=${data.poster} />
                <audio controls>
                  <source src="${src}" type="${getMediaType(src)}"/>
                </audio>`;
      } break;
    }

    wrap.html(html);
    popup.show();
    media = wrap.find(mediaTag).get(0);
    media.addEventListener(LOAD, () => media.play());
  }

  function getMediaTag(src) {
    return src.includes('mp4') ? 'video' : (src.includes('mp3') ? 'audio' : null);
  }

  function getMediaType(src) {
    return src.includes('mp4') ? 'video/mp4' : (src.includes('mp3') ? 'audio/mpeg' : null);
  }

  function hidePopup() {
    media.pause();
    popup.hide();
    setTimeout(() => wrap.empty(), 500);
  }

  return this;
};
let PopupPayment = function(element) {
  let el = $(element),
      popup = new PopupBase(el),
      form = new Form(el.find('form')),
      name = el.find('.payment-name'),
      price = el.find('.payment-price'),
      time = el.find('.payment-time'),
      id = el.find('input[name=payment-id]');

  this.show = data => update(data);
  this.hide = () => popup.hide();
  this.getEventName = () => form.getEventName();

  function update(data) {
    name.text(data.name);
    price.text(data.price);
    time.text(data.time);
    id.val(data.id);
    popup.show();
  }
  return this;
};
let PopupUpload = function(element) {
  let el = $(element),
      popup = new PopupBase(el),
      btnClose = el.find('.btn-close'),
      wrapInput = el.find('.wrap-input'),
      input = wrapInput.find('input'),

      txtInfo = el.find('.txt-info'),
      infoTxt = txtInfo.data('txt'),
      txtErr = el.find('.txt-err'),

      heading = el.find('.heading'),
      desc = el.find('.desc'),
      note = el.find('.s-note'),
      fileType = note.find('.file-type'),
      fileSize = note.find('.file-size'),

      btnFinish = el.find('a[name=finish]'),
      btnRetry = el.find('a[name=retry]'),
      btnCancel = el.find('a[name=cancel]'),

      id = 0,
      max = 0,
      name = '',
      allowType = [],
      ajax = {};

  (() => initEvent())();
  function initEvent() {
    input.on(CHANGE, fileChanged);
    btnFinish.on(CLICK, () => window.location.reload());
    btnRetry.on(CLICK, () => window.location.reload());
    btnCancel.on(CLICK, btnCancelClicked);
  }

  function fileChanged() {
    reset();
    if (this.files && this.files[0]) {
      let file = this.files[0];
      filterFile(file) && prepareFile(file);
    }
  }

  function btnCancelClicked(e) {
    e.preventDefault();
    wrapInput.removeClass(CLASS._active);
    input.val(null);
    txtInfo.hide();
    btnCancel.hide();
    btnClose.show();
    ajax.abort();
  }

  function update(data) {
    let txtMime = '';

    id = data.id;
    max = data.max;
    allowType = data.type.split(',');
    for (let type of allowType) {
      txtMime += type.split('/')[1] + ' ';
    }

    fileType.text(txtMime.slice(0, -1));
    fileSize.text(max);
    input.attr('accept', data.type);
    popup.show();
  }


  function hidePopup() {
    popup.hide();
  }

  function reset() {
    txtInfo.hide();
    txtErr.hide();
    wrapInput.hasClass(CLASS._error) && wrapInput.removeClass(CLASS._error);
  }

  function filterSize(size) {
    let pass = true;
    (size / (1000*1000).toFixed(2) < max) || (pass = false, showErr(txtErr.data('size')));
    return pass;
  }

  function filterType(type) {
    let pass = true;
    allowType.includes(type) || (pass = false, showErr(txtErr.data('type')));
    return pass;
  }

  function filterFile(file) {
    let pass = true;
    pass = filterSize(file.size);
    pass && (pass = filterType(file.type));
    return pass;
  }

  function prepareFile(file) {
    let reader = new FileReader();

    reset();
    btnClose.hide();
    wrapInput.addClass(CLASS._active);
    txtInfo.text(infoTxt).show();

    name = file.name;
    setTimeout(() => reader.readAsDataURL(file), 250);
    reader.onload = e => sendFile(e.target.result);
  }

  function sendFile(b64) {
    let ajaxURL = el.find('form').data('url'),
        ajaxData = [];

    ajaxData.push(
      { name: 'id', value: id },
      { name: 'file', value: b64 }
    );

    txtInfo.text(name);
    btnCancel.show();

    ajax = $.ajax({
			type: APP._submitMethod,
			url: ajaxURL,
			data: ajaxData,
			headers: APP._headers,
			success: data => {
        console.log(data);
				let status = parseInt(data.status),
						title = data.title,
						message = data.message;

        wrapInput.removeClass(CLASS._active);
        note.hide();
        btnCancel.hide();
        heading.text(title);
        desc.text(message);

				switch(status) {
					case 0: {
            wrapInput.addClass(CLASS._red);
            btnRetry.show();
					} break;
					case 1: {
            wrapInput.addClass(CLASS._green);
            btnFinish.show();
					} break;
				}
			}
		});
  }

  function showErr(err) {
    wrapInput.addClass(CLASS._error);
    txtErr.text(err).show();
  }

  this.show = data => update(data);
  this.hide = () => hidePopup();
  return this;
};
let PopupWarning = function(element) {
  let el = $(element),
      popup = new PopupBase(el),
      contentTitle = el.find('.title'),
      contentDesc = el.find('.desc'),
      btnCancel = el.find('.btn-cancel'),
      btnSubmit = el.find('.btn-submit'),
      callback = {};

  this.update = (title, desc, cb) => {
    title.length > 0 && contentTitle.text(title);
    desc.length > 0 && contentDesc.text(desc);
    callback = cb;
  }

  this.show = () => popup.show();
  this.hide = () => popup.hide();
  btnCancel.on(CLICK, e => (e.preventDefault(), popup.hide()));
  btnSubmit.on(CLICK, e => (e.preventDefault(), callback()));
  return this;
};
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsImNvbnN0LmpzIiwicmVhZHkuanMiLCJjb21wL2FjY29yZGlvbi5qcyIsImNvbXAvY2Fyb3VzZWwtcGFnaW5nLmpzIiwiY29tcC9jYXJvdXNlbC5qcyIsImNvbXAvZXF1YWwtaGVpZ2h0LmpzIiwiY29tcC9ub3RpZmljYXRpb24tY3RyLmpzIiwiY29tcC9yZXF1ZXN0LWN0ci5qcyIsImNvbXAvc2xpZGVyLmpzIiwiY29tcC92aWRlby1zZWN0aW9uLmpzIiwibW9kdWxlL2Zvb3Rlci5qcyIsIm1vZHVsZS9oZWFkZXItbW9iaWxlLmpzIiwibW9kdWxlL2hlYWRlci5qcyIsIm1vZHVsZS9wb3B1cC5qcyIsIm1vZHVsZS9wcm9qZWN0LWxpc3QuanMiLCJtb2R1bGUvc2lnbi11cC1wb3B1cC5qcyIsIm1vZHVsZS9zaWduLXVwLXF1ZXN0aW9uLmpzIiwicGFnZS8xLWhvbWUuanMiLCJwYWdlLzEwLXRhbGVudC1kZXRhaWxzLmpzIiwicGFnZS8xMS1zZXR1cC1wYXNzd29yZC5qcyIsInBhZ2UvMTItYWNjLWFjdGl2YXRlZC5qcyIsInBhZ2UvMTMtcHJvamVjdC1kZXRhaWxzLmpzIiwicGFnZS8xNC10YWxlbnQtY3RyLmpzIiwicGFnZS8xNS10YWxlbnQtY3RyLWVkaXQuanMiLCJwYWdlLzE2LXRhbGVudC1jdHItcHcuanMiLCJwYWdlLzE3LXRhbGVudC1zdWJtaXR0ZWQuanMiLCJwYWdlLzE4LXRhbGVudC1yZWNvbW1lbmRlZC5qcyIsInBhZ2UvMTktY2xpZW50LWNhc3RpbmctYm9hcmQuanMiLCJwYWdlLzItY2FzdGluZy1ib2FyZC5qcyIsInBhZ2UvMjAtY2xpZW50LW5ldy1wcm9qZWN0LmpzIiwicGFnZS8yMS1jbGllbnQtcHJvZmlsZS5qcyIsInBhZ2UvMjItY2xpZW50LXByb2ZpbGUtZWRpdC5qcyIsInBhZ2UvMjMtY2xpZW50LXB3LmpzIiwicGFnZS8yNC1jbGllbnQtcHJvamVjdC1kZXRhaWxzLmpzIiwicGFnZS8yNS1jbGllbnQtcm9sZS1kZXRhaWxzLmpzIiwicGFnZS8yNi1jbGllbnQtYWNjb3VudC5qcyIsInBhZ2UvMjctY2xpZW50LXBheW1lbnQuanMiLCJwYWdlLzI4LWNsaWVudC1wYXltZW50LWVkaXQuanMiLCJwYWdlLzI5LWNsaWVudC1wYXltZW50LWFkZC5qcyIsInBhZ2UvMy1vdXItdGFsZW50LmpzIiwicGFnZS8zMC1jbGllbnQtcGxhbi5qcyIsInBhZ2UvMzEtY2xpZW50LW5ldy1yb2xlLmpzIiwicGFnZS8zMi1jbGllbnQtZWRpdC1yb2xlLmpzIiwicGFnZS8zMy1jbGllbnQtZWRpdC1wcm9qZWN0LmpzIiwicGFnZS8zNC1yb2xlLWRldGFpbHMuanMiLCJwYWdlLzM1LW5ld3MtZXZlbnQuanMiLCJwYWdlLzM2LXJlZG8tcm9sZS1kZXRhaWxzLmpzIiwicGFnZS8zNy1yZWRvLXJvbGUtc3VibWl0LmpzIiwicGFnZS8zOC1yZWRvLXByb2plY3QtZGV0YWlscy5qcyIsInBhZ2UvMzktcmVkby1wcm9qZWN0LWJyZWFrZG93bi5qcyIsInBhZ2UvNC10YWxlbnQtc2VydmljZXMuanMiLCJwYWdlLzQwLXAyLWNsaWVudC1kYXNoYm9hcmQuanMiLCJwYWdlLzQxLXAyLWNsaWVudC1tYW5hZ2UtcHJvamVjdC5qcyIsInBhZ2UvNDItcDItY2xpZW50LXByb2plY3QuanMiLCJwYWdlLzQzLXAyLWNsaWVudC1wcm9qZWN0LWRldGFpbHMuanMiLCJwYWdlLzQ0LXAyLWNsaWVudC1yb2xlLmpzIiwicGFnZS80NS1wMi1jbGllbnQtcm9sZS1kZXRhaWxzLmpzIiwicGFnZS80Ni1jbGllbnQtb3VyLXRhbGVudHMuanMiLCJwYWdlLzQ3LXAyLWNsaWVudC10YWxlbnQtZGV0YWlscy5qcyIsInBhZ2UvNDgtcDItY2xpZW50LWluZm8uanMiLCJwYWdlLzQ5LXAyLXRhbGVudC1iaWxsYm9hcmQuanMiLCJwYWdlLzUtY2FzdGluZy1zZXJ2aWNlcy5qcyIsInBhZ2UvNTAtcDItdGFsZW50LXJvbGUtZGV0YWlscy5qcyIsInBhZ2UvNTEtcDItdGFsZW50LXByb2otZHRzLmpzIiwicGFnZS81Mi1wMi10YWxlbnQtcm9sZS1zdWJtaXQuanMiLCJwYWdlLzUzLXAyLXRhbGVudC1tYW5nZS1yb2xlcy5qcyIsInBhZ2UvNTQtcDItdGFsZW50LXJvbGUtcmVxdWVzdC5qcyIsInBhZ2UvNTUtdGFsZW50LWluZm8uanMiLCJwYWdlLzYtc2lnbnVwLmpzIiwicGFnZS83LWxvZ2luLmpzIiwicGFnZS84LWFib3V0LXVzLmpzIiwicGFnZS85LXBvc3QtZGV0YWlscy5qcyIsImNvbXAvZm9ybS9jaGVja2JveC5qcyIsImNvbXAvZm9ybS9maWxlLWxpc3QtY29udHJvbC5qcyIsImNvbXAvZm9ybS9maWxlLXNpbmdsZS5qcyIsImNvbXAvZm9ybS9mb3JtLmpzIiwiY29tcC9mb3JtL2lucHV0LWRhdGUuanMiLCJjb21wL2Zvcm0vaW5wdXQtc2VsZWN0aW9uLWJveC5qcyIsImNvbXAvZm9ybS9pbnB1dC1zZWxlY3Rpb24uanMiLCJjb21wL2Zvcm0vaW5wdXQtd3JhcC5qcyIsImNvbXAvZm9ybS9zZWxlY3Rpb24tbmF2LmpzIiwiY29tcC9mb3JtL3VwbG9hZC1pbWcuanMiLCJjb21wL3Njcm9sbC9hbmltYXRvci5qcyIsImNvbXAvc2Nyb2xsL3NldHRpbmcuanMiLCJjb21wL3Njcm9sbC90cmlnZ2VyLmpzIiwiY29tcC9wb3B1cC9hbGVydC5qcyIsImNvbXAvcG9wdXAvYmFzZS5qcyIsImNvbXAvcG9wdXAvZWRpdC1leHAuanMiLCJjb21wL3BvcHVwL2Zvcm0uanMiLCJjb21wL3BvcHVwL21lZGlhLmpzIiwiY29tcC9wb3B1cC9wYXltZW50LmpzIiwiY29tcC9wb3B1cC91cGxvYWQuanMiLCJjb21wL3BvcHVwL3dhcm5pbmcuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNsS0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDcEVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ0xBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDaERBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzVJQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDNU5BO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3pDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUN6Q0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDekNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUMvS0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUN4QkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNUQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQy9EQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNuQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNsQkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDOUpBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDaFNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQy9SQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3BGQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzNCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNkQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDdEVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzVDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNkQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNkQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDaEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzFCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3hCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNkQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDVkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDZEE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDZEE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNaQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ1pBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNWQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3hCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNkQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNkQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzNCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ1pBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDWkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ1ZBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNWQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3JCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDVkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2hCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUM3QkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDcEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDeEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDbEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDbEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDbEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDOUJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDeEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2pCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNwQkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNaQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDaEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDbEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDOUJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDOUJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUM5Q0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDZEE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ1ZBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ25DQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ25HQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzdDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzFVQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDbkhBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNoRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUMvREE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDcEVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDN0NBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDeEVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNwR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3RFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUMxRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2hCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNoQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDN0JBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDVEE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDM0RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDckJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNuS0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6Im1haW4uanMiLCJzb3VyY2VzQ29udGVudCI6WyIndXNlIHN0cmljdCc7XHJcbmlmICh0eXBlb2YgJCA9PSAndW5kZWZpbmVkJykgeyB2YXIgJCA9IGpRdWVyeTsgfVxyXG4vKioqIEFQUCAqKiovXHJcbmxldCBBUFAgPSB7XHJcblx0X2h0bWw6IHt9LFxyXG5cdF9ib2R5OiB7fSxcclxuXHRfb3ZlcmxheToge30sXHJcblx0X3BhZ2VJRDogJycsXHJcblx0X3N1Ym1pdE1ldGhvZDogJycsXHJcblx0X2lzTW9iaWxlOiBmYWxzZSxcclxuXHRfaXNGaXJlZm94OiBmYWxzZSxcclxuXHRfaXNPdmxBY3RpdmU6IGZhbHNlLFxyXG5cdF9pc1Njcm9sbDogZmFsc2UsXHJcblx0X1c6IDAsXHJcblx0X0g6IDAsXHJcblx0X2hlYWRlcnM6ICcnLFxyXG5cclxuXHRpbml0KCkge1xyXG5cdFx0dGhpcy5faHRtbCA9ICQoJ2h0bWwnKTtcclxuXHRcdHRoaXMuX2JvZHkgPSAkKCdib2R5Jyk7XHJcblx0XHR0aGlzLl9vdmVybGF5ID0gJCgnI292ZXJsYXknKTtcclxuXHRcdHRoaXMuX3BhZ2VJRCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdwYWdlLWlkJykudmFsdWU7XHJcblx0XHR0aGlzLl9zdWJtaXRNZXRob2QgPSB3aW5kb3cubG9jYXRpb24ub3JpZ2luLmluZGV4T2YoJ2h0dHA6Ly9sb2NhbGhvc3Q6ODA4MCcpID09PSAtMSA/ICdQT1NUJyA6ICdHRVQnO1xyXG5cdFx0dGhpcy5faGVhZGVycyA9IHsgJ1gtQ1NSRi1UT0tFTic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JykgfTtcclxuXHJcblx0XHR0aGlzLmNoZWNrTW9iaWxlKCk7XHJcblx0XHR0aGlzLmNoZWNrSU9TKCk7XHJcblx0XHR0aGlzLmNoZWNrRmlyZWZveCgpO1xyXG5cdFx0dGhpcy5nZXRTaXplKCk7XHJcblx0XHR0aGlzLmluaXRFdmVudCgpO1xyXG5cdFx0QVBQLmNoZWNrSGFzaCgpO1xyXG5cdFx0QVBQLmhlYWRlci5pbml0KCk7XHJcblx0XHRBUFAuZm9vdGVyLmluaXQoKTtcclxuXHRcdEFQUC5wb3B1cC5pbml0KCk7XHJcblx0XHRBUFAucGFnZUluaXQoKTtcclxuXHR9LFxyXG5cclxuXHRjaGVja01vYmlsZSgpIHtcclxuXHRcdG1hdGNoTWVkaWEoJyhob3Zlcjogbm9uZSknKS5tYXRjaGVzICYmICh0aGlzLl9odG1sLmFkZENsYXNzKENMQVNTLl9tb2JpbGUpLCB0aGlzLl9pc01vYmlsZSA9IHRydWUpO1xyXG5cdFx0dGhpcy5faXNNb2JpbGUgJiYgd2luZG93Lm9yaWVudGF0aW9uICE9IDAgJiYgdGhpcy5faHRtbC5hZGRDbGFzcyhDTEFTUy5fb3JpZW50YXRpb24pO1xyXG5cdH0sXHJcblxyXG5cdGNoZWNrSU9TKCkge1xyXG5cdFx0Ly8gY29uc29sZS5sb2cobmF2aWdhdG9yKTtcclxuXHRcdC8vIGNvbnNvbGUubG9nKG5hdmlnYXRvci51c2VyQWdlbnQpO1xyXG5cdFx0L2lQaG9uZXxpUGFkfGlQb2QvaS50ZXN0KG5hdmlnYXRvci51c2VyQWdlbnQpID8gdGhpcy5faHRtbC5hZGRDbGFzcyhDTEFTUy5faU9TKVxyXG5cdFx0OiAodGhpcy5faXNNb2JpbGUgJiYgbmF2aWdhdG9yLnVzZXJBZ2VudC5pbmNsdWRlcygnTWFjaW50b3NoJykpICYmIHRoaXMuX2h0bWwuYWRkQ2xhc3MoQ0xBU1MuX2lPUyk7XHJcblx0fSxcclxuXHJcblx0Y2hlY2tGaXJlZm94KCkge1xyXG5cdFx0bmF2aWdhdG9yLnVzZXJBZ2VudC50b0xvd2VyQ2FzZSgpLmluZGV4T2YoJ2ZpcmVmb3gnKSA+IC0xICYmICh0aGlzLl9pc0ZpcmVmb3ggPSB0cnVlKTtcclxuXHR9LFxyXG5cclxuXHRpbml0RXZlbnQoKSB7XHJcblx0XHRBUFAuX292ZXJsYXkub24oQ0xJQ0ssIEFQUC5vdmVybGF5Q2xpY2tlZCk7XHJcblx0XHR3aW5kb3cub25yZXNpemUgPSBBUFAucmVzaXplZDtcclxuXHRcdC8vIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCd3aGVlbCcsIHsgcGFzc2l2ZTogZmFsc2UgfSk7XHJcblx0fSxcclxuXHJcblx0b3ZlcmxheUNsaWNrZWQoZSkge1xyXG5cdFx0ZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG5cdFx0QVBQLmhlYWRlci5fYnRuTWIuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTLl9hY3RpdmUpICYmIEFQUC5oZWFkZXIuX2J0bk1iLmNsaWNrKCk7XHJcblx0fSxcclxuXHJcblx0cmVzaXplZDooKSA9PiB3aW5kb3cuaW5uZXJXaWR0aCA9PT0gQVBQLl9XIHx8IChcclxuXHRcdEFQUC5nZXRTaXplKCksXHJcblx0XHRBUFAuX1cgPiAxMjAwICYmIEFQUC5oZWFkZXIuX2J0bk1iLmNsYXNzTGlzdC5jb250YWlucyhDTEFTUy5fYWN0aXZlKSAmJiBBUFAuaGVhZGVyLl9idG5NYi5jbGljaygpXHJcblx0KSxcclxuXHJcblx0Z2V0U2l6ZSgpIHtcclxuXHRcdEFQUC5fVyA9IHdpbmRvdy5pbm5lcldpZHRoO1xyXG5cdFx0QVBQLl9IID0gd2luZG93LmlubmVySGVpZ2h0O1xyXG5cdFx0c2V0VGltZW91dCgoKSA9PiBkb2N1bWVudC5kaXNwYXRjaEV2ZW50KFNJWkVfQ0hBTkdFRF9FVkVOVCksIDI1MCk7XHJcblx0fSxcclxuXHJcblx0Y2hlY2tIYXNoKCkge1xyXG5cdFx0aWYgKHdpbmRvdy5sb2NhdGlvbi5oYXNoLmxlbmd0aCA9PT0gMCkgcmV0dXJuIGZhbHNlO1xyXG5cdFx0bGV0IGhhc2ggPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKHdpbmRvdy5sb2NhdGlvbi5oYXNoKSxcclxuXHRcdCAgICBvZmZzZXQgPSB7fTtcclxuXHRcdChoYXNoICE9PSBudWxsKSAmJiAob2Zmc2V0ID0gQVBQLm9mZnNldChoYXNoKSwgQVBQLnNjcm9sbChvZmZzZXQudG9wIC0gMTUwLCAxMDAwKSk7XHJcbiAgfSxcclxuXHJcblx0c2Nyb2xsKG9mZnNldCwgdGltZSkge1xyXG5cdFx0QVBQLl9pc1Njcm9sbCA9IHRydWU7XHJcblx0XHQvLyBUd2Vlbk1heC50byh3aW5kb3csIHRpbWUsIHtzY3JvbGxUbzp7IHk6IG9mZnNldCArICdweCcgfX0pO1xyXG5cdFx0JCgnaHRtbCwgYm9keScpLmFuaW1hdGUoeyBzY3JvbGxUb3A6IG9mZnNldCB9LCB0aW1lLCAoKSA9PiB7IEFQUC5faXNTY3JvbGwgPSBmYWxzZTsgfSk7XHJcblx0fSxcclxuXHJcblx0b2Zmc2V0KGVsKSB7XHJcbiAgICBsZXQgcmVjdCA9IGVsLmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpLFxyXG4gICAgc2Nyb2xsTGVmdCA9IHdpbmRvdy5wYWdlWE9mZnNldCB8fCBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuc2Nyb2xsTGVmdCxcclxuICAgIHNjcm9sbFRvcCA9IHdpbmRvdy5wYWdlWU9mZnNldCB8fCBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuc2Nyb2xsVG9wO1xyXG4gICAgcmV0dXJuIHsgdG9wOiByZWN0LnRvcCArIHNjcm9sbFRvcCwgbGVmdDogcmVjdC5sZWZ0ICsgc2Nyb2xsTGVmdCB9XHJcblx0fSxcclxuXHJcblx0c2xpZGVEb3duOiBlID0+ICQoZSkuc2xpZGVEb3duKCksXHJcblx0c2xpZGVVcDogZSA9PiAkKGUpLnNsaWRlVXAoKSxcclxuXHRpc0Z1bmM6IGUgPT4gKHR5cGVvZiBlID09PSAnZnVuY3Rpb24nID8gdHJ1ZSA6IGZhbHNlKSxcclxuXHJcblx0cGFnZUluaXQoKSB7XHJcblx0XHRzd2l0Y2godGhpcy5fcGFnZUlEKSB7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtaG9tZSc6IHRoaXMuaG9tZS5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLWNhc3RpbmctYm9hcmQnOiB0aGlzLmNhc3RpbmdCb2FyZC5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLW91ci10YWxlbnQnOiB0aGlzLm91clRhbGVudC5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXRhbGVudC1zZXJ2aWNlcyc6IHRoaXMudGFsZW50U2VydmljZXMuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1jYXN0aW5nLXNlcnZpY2VzJzogdGhpcy50YWxlbnRTZXJ2aWNlcy5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXNpZ251cCc6IHRoaXMuc2lnbnVwLmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtbG9naW4nOiB0aGlzLmxvZ2luLmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtYWJvdXQtdXMnOiB0aGlzLmFib3V0VXMuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1wb3N0LWRldGFpbHMnOiB0aGlzLnBvc3REZXRhaWxzLmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtdGFsZW50LWRldGFpbHMnOiB0aGlzLnRhbGVudERldGFpbHMuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1zZXR1cC1wYXNzd29yZCc6IHRoaXMuc2V0dXBQYXNzd29yZC5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLWFjYy1hY3RpdmF0ZWQnOiB0aGlzLmFjY0FjdGl2YXRlZC5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXByb2plY3QtZGV0YWlscyc6IHRoaXMucHJvamVjdERldGFpbHMuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1yb2xlLWRldGFpbHMnOiB0aGlzLnJvbGVEZXRhaWxzLmluaXQoKTsgYnJlYWs7XHJcblxyXG5cdFx0XHRjYXNlICdwYWdlLXRhbGVudC1jdHInOiB0aGlzLnRhbGVudEN0ci5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXRhbGVudC1jdHItZWRpdCc6IHRoaXMudGFsZW50Q3RyRWRpdC5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXRhbGVudC1jdHItcHcnOiB0aGlzLnRhbGVudEN0clB3LmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtdGFsZW50LXN1Ym1pdHRlZCc6IHRoaXMudGFsZW50U3VibWl0dGVkLmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtdGFsZW50LXJlY29tbWVuZGVkJzogdGhpcy50YWxlbnRSZWNvbW1lbmRlZC5pbml0KCk7IGJyZWFrO1xyXG5cclxuXHRcdFx0Y2FzZSAncGFnZS1jbGllbnQtY2FzdGluZy1ib2FyZCc6IHRoaXMuY2xpZW50Q2FzdGluZ0JvYXJkLmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtY2xpZW50LW5ldy1wcm9qZWN0JzogdGhpcy5jbGllbnROZXdQcm9qZWN0LmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtY2xpZW50LXByb2ZpbGUnOiB0aGlzLmNsaWVudFByb2ZpbGUuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1jbGllbnQtcHJvZmlsZS1lZGl0JzogdGhpcy5jbGllbnRQcm9maWxlRWRpdC5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLWNsaWVudC1wdyc6IHRoaXMuY2xpZW50UHcuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1jbGllbnQtcHJvamVjdC1kZXRhaWxzJzogdGhpcy5jbGllbnRQcm9qZWN0RGV0YWlscy5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLWNsaWVudC1yb2xlLWRldGFpbHMnOiB0aGlzLmNsaWVudFJvbGVEZXRhaWxzLmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtY2xpZW50LWFjY291bnQnOiB0aGlzLmNsaWVudEFjY291bnQuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1jbGllbnQtcGF5bWVudCc6IHRoaXMuY2xpZW50UGF5bWVudC5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLWNsaWVudC1wYXltZW50LWVkaXQnOiB0aGlzLmNsaWVudFBheW1lbnRFZGl0LmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtY2xpZW50LXBheW1lbnQtYWRkJzogdGhpcy5jbGllbnRQYXltZW50QWRkLmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtY2xpZW50LXBsYW4nOiB0aGlzLmNsaWVudFBsYW4uaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1jbGllbnQtbmV3LXJvbGUnOiB0aGlzLmNsaWVudE5ld1JvbGUuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1jbGllbnQtZWRpdC1yb2xlJzogdGhpcy5jbGllbnRFZGl0Um9sZS5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLWNsaWVudC1lZGl0LXByb2plY3QnOiB0aGlzLmNsaWVudEVkaXRQcm9qZWN0LmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdC8vUEhBU0UgMSBSRURPXHJcblx0XHRcdGNhc2UgJ3BhZ2UtbmV3cy1ldmVudCc6IHRoaXMubmV3c0V2ZW50LmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtcmVkby1yb2xlLWRldGFpbHMnOiB0aGlzLnJlZG9Sb2xlRGV0YWlscy5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXJlZG8tcm9sZS1zdWJtaXQnOiB0aGlzLnJlZG9Sb2xlU3VibWl0LmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtcmVkby1wcm9qZWN0LWRldGFpbHMnOiB0aGlzLnJlZG9Qcm9qZWN0RGV0YWlscy5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXJlZG8tcHJvamVjdC1icmVha2Rvd24nOiB0aGlzLnJlZG9Qcm9qZWN0QnJlYWtkb3duLmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdC8vUEhBU0UgMlxyXG5cdFx0XHRjYXNlICdwYWdlLXAyLWNsaWVudC1kYXNoYm9hcmQnOiB0aGlzLnAyQ2xpZW50RGFzaEJvYXJkLmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtcDItY2xpZW50LW1hbmFnZS1wcm9qZWN0JzogdGhpcy5wMkNsaWVudE1hbmFnZVByb2plY3QuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1wMi1jbGllbnQtcHJvamVjdCc6IHRoaXMucDJDbGllbnRQcm9qZWN0LmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtcDItY2xpZW50LXByb2plY3QtZGV0YWlscyc6IHRoaXMucDJDbGllbnRQcm9qZWN0RGV0YWlscy5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXAyLWNsaWVudC1yb2xlJzogdGhpcy5wMkNsaWVudFJvbGUuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1wMi1jbGllbnQtcm9sZS1kZXRhaWxzJzogdGhpcy5wMkNsaWVudFJvbGVEZXRhaWxzLmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtcDItY2xpZW50LW91ci10YWxlbnRzJzogdGhpcy5wMkNsaWVudE91clRhbGVudHMuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1wMi1jbGllbnQtdGFsZW50LWRldGFpbHMnOiB0aGlzLnAyQ2xpZW50VGFsZW50RGV0YWlscy5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXAyLWNsaWVudC1pbmZvJzogdGhpcy5wMkNsaWVudEluZm8uaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1wMi10YWxlbnQtYmlsbGJvYXJkJzogdGhpcy5wMlRhbGVudEJpbGxib2FyZC5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXAyLXRhbGVudC1yb2xlLWRldGFpbHMnOiB0aGlzLnAyVGFsZW50Um9sZURldGFpbHMuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1wMi10YWxlbnQtcHJvai1kdHMnOiB0aGlzLnAyVGFsZW50UHJvakR0cy5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXAyLXRhbGVudC1yb2xlLXN1Ym1pdCc6IHRoaXMucDJUYWxlbnRSb2xlU3VibWl0LmluaXQoKTsgYnJlYWs7XHJcblx0XHRcdGNhc2UgJ3BhZ2UtcDItdGFsZW50LW1hbmFnZS1yb2xlcyc6IHRoaXMucDJUYWxlbnRNYW5hZ2VSb2xlcy5pbml0KCk7IGJyZWFrO1xyXG5cdFx0XHRjYXNlICdwYWdlLXAyLXRhbGVudC1yb2xlLXJlcXVlc3QnOiB0aGlzLnAyVGFsZW50Um9sZVJlcXVlc3QuaW5pdCgpOyBicmVhaztcclxuXHRcdFx0Y2FzZSAncGFnZS1wMi10YWxlbnQtaW5mbyc6IHRoaXMucDJUYWxlbnRJbmZvLmluaXQoKTsgYnJlYWs7XHJcblx0XHR9XHJcblx0fVxyXG59OyIsIi8qKiogQ3VzdG9tRXZlbnQgUG9seWZpbGwgZm9yIElFICoqKi9cbigoKSA9PiB7XG4gIGlmICh0eXBlb2Ygd2luZG93LkN1c3RvbUV2ZW50ID09PSAnZnVuY3Rpb24nKSByZXR1cm4gZmFsc2U7IC8vSWYgbm90IElFXG5cbiAgZnVuY3Rpb24gQ3VzdG9tRXZlbnQoZXZlbnQsIHBhcmFtcykge1xuICAgIGxldCBldnQgPSBkb2N1bWVudC5jcmVhdGVFdmVudCgnQ3VzdG9tRXZlbnQnKTtcbiAgICBwYXJhbXMgPSBwYXJhbXMgfHwgeyBidWJibGVzOiBmYWxzZSwgY2FuY2VsYWJsZTogZmFsc2UsIGRldGFpbDogdW5kZWZpbmVkIH07XG4gICAgZXZ0LmluaXRDdXN0b21FdmVudChldmVudCwgcGFyYW1zLmJ1YmJsZXMsIHBhcmFtcy5jYW5jZWxhYmxlLCBwYXJhbXMuZGV0YWlsKTtcbiAgICByZXR1cm4gZXZ0O1xuICB9XG4gIEN1c3RvbUV2ZW50LnByb3RvdHlwZSA9IHdpbmRvdy5FdmVudC5wcm90b3R5cGU7XG4gIHdpbmRvdy5DdXN0b21FdmVudCA9IEN1c3RvbUV2ZW50O1xufSkoKTtcbi8qKiogQ29uc3RhbnQgKioqL1xuY29uc3QgRE9NX1JFQURZID0gJ0RPTUNvbnRlbnRMb2FkZWQnLFxuICAgICAgU0laRV9DSEFOR0VEID0gJ2FwcC1zaXplLWNoYW5nZWQnLFxuICAgICAgU0laRV9DSEFOR0VEX0VWRU5UID0gbmV3IEN1c3RvbUV2ZW50KFNJWkVfQ0hBTkdFRCksXG4gICAgICBHT1RPX1RPUCA9ICdhcHAtZ290by10b3AnLFxuICAgICAgR09UT19UT1BfRVZFTlQgPSBuZXcgQ3VzdG9tRXZlbnQoR09UT19UT1ApLFxuICAgICAgU0xCT1hfT1BFTiA9ICdzbGJveC1vcGVuJyxcbiAgICAgIFNMQk9YX09QRU5fRVZFTlQgPSBuZXcgQ3VzdG9tRXZlbnQoU0xCT1hfT1BFTiksXG4gICAgICBOT1RJX09QRU4gPSAnbm90aS1vcGVuJyxcbiAgICAgIE5PVElfT1BFTl9FVkVOVCA9IG5ldyBDdXN0b21FdmVudChOT1RJX09QRU4pLFxuICAgICAgQ0xJQ0sgPSAnY2xpY2snLFxuICAgICAgRl9JTiA9ICdmb2N1c2luJyxcbiAgICAgIEZfT1VUID0gJ2ZvY3Vzb3V0JyxcbiAgICAgIENIQU5HRSA9ICdjaGFuZ2UnLFxuICAgICAgS0VZRE9XTiA9ICdrZXlkb3duJyxcbiAgICAgIEtFWVBSRVNTID0gJ2tleXByZXNzJyxcbiAgICAgIElOUFVUID0gJ2lucHV0JyxcbiAgICAgIExPQUQgPSAnbG9hZHN0YXJ0JyxcbiAgICAgIERPTV9MT0FERUQgPSAnRE9NQ29udGVudExvYWRlZCcsXG4gICAgICBTV0lQRV9MID0gJ3N3aXBlbGVmdCcsXG4gICAgICBTV0lQRV9SID0gJ3N3aXBlcmlnaHQnLFxuICAgICAgTV9PVkVSID0gJ21vdXNlb3ZlcicsXG4gICAgICBNX09VVCA9ICdtb3VzZW91dCcsXG4gICAgICBGX1ZJU0lCTEUgPSAnOnZpc2libGUnLFxuICAgICAgRl9ISURERU4gPSAnOmhpZGRlbic7XG5cbmNvbnN0IENMQVNTID0ge1xuICBfaG92ZXI6ICdjYW4taG92ZXInLFxuICBfc2Nyb2xsaW5nOiAnanMtc2Nyb2xsaW5nJyxcblx0X2RsZXg6ICdqcy1kZmxleCcsXG5cdF9hY3RpdmU6ICdqcy1hY3RpdmUnLFxuICBfbW9iaWxlOiAnanMtbW9iaWxlJyxcbiAgX292bEFjdGl2ZTogJ2pzLW92bC1hY3RpdmUnLFxuICBfbWVudUFjdGl2ZTogJ2pzLW1lbnUtYWN0aXZlJyxcblx0X2lPUzogJ2pzLWlvcycsXG5cdF9vcmllbnRhdGlvbjogJ2pzLW9yaWVudGF0aW9uJyxcbiAgX3JlcXVpcmU6ICdqcy1yZXF1aXJlZCcsXG4gIF9taW46ICdqcy1taW4nLFxuICBfbWF4OiAnanMtbWF4Jyxcblx0X2VtYWlsOiAnanMtZW1haWwnLFxuXHRfZXJyb3I6ICdqcy1lcnJvcicsXG4gIF9oYXN2YWw6ICdqcy1oYXN2YWwnLFxuICBfb3BlbjogJ2pzLW9wZW4nLFxuICBfYWN0aXZlT3BlbjogJ2pzLWFjdGl2ZSBqcy1vcGVuJyxcbiAgX2Rpc2FibGU6ICdqcy1kaXNhYmxlJyxcbiAgX3JxU3Y6ICdqcy1yZXF1aXJlZC1zZXJ2ZXInLFxuICBfaGlkZTogJ2pzLWhpZGUnLFxuICBfZW5hRWw6ICdqcy1lbmFlbCcsXG4gIF9kaXNFbDogJ2pzLWRpc2VsJyxcbiAgX3Jlc2V0OiAnanMtcmVzZXQnLFxuICBfc2VsZWN0ZWQ6ICdqcy1zZWxlY3RlZCcsXG4gIF9yZWQ6ICdqcy1yZWQnLFxuICBfZ3JlZW46ICdqcy1ncmVlbidcbn07XG5cblN0cmluZy5wcm90b3R5cGUuY2FwaXRhbGl6ZSA9ICgpID0+ICAodGhpcy5jaGFyQXQoMCkudG9VcHBlckNhc2UoKSArIHRoaXMuc2xpY2UoMSkpOyIsIi8qKiogUkVBRFkgKioqL1xuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihET01fTE9BREVELCAoKSA9PiBtYXRjaE1lZGlhKCcoaG92ZXI6IG5vbmUpJykubWF0Y2hlcyB8fCBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5hZGQoQ0xBU1MuX2hvdmVyKSk7XG4vKioqIExPQUQgKioqL1xud2luZG93Lm9ubG9hZCA9ICgpID0+IEFQUC5pbml0KCk7O1xuJCgnKicpLmNsaWNrKGZ1bmN0aW9uKCkge30pO1xuJCgnaHRtbCcpLmNzcygnLXdlYmtpdC10YXAtaGlnaGxpZ2h0LWNvbG9yJywgJ3JnYmEoMCwgMCwgMCwgMCknKTsiLCIvKioqKiogQWNjb3JkaW9uICoqKioqL1xubGV0IEFjY29yZGlvbiA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcblxuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgdGl0bGVzID0gZWwuZmluZCgnLnRpdGxlJyksXG4gICAgICBjQ29udGVudCA9IG51bGw7XG5cblx0KCgpID0+IHtcbiAgICBjaGVja0FjdGl2ZSgpO1xuXHRcdGluaXRFdmVudCgpO1xuXHR9KSgpO1xuXG5cdGZ1bmN0aW9uIGluaXRFdmVudCgpIHtcblx0XHR0aXRsZXMub24oJ2NsaWNrJywgdGl0bGVDbGlja2VkKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGNoZWNrQWN0aXZlKCkge1xuICAgIGxldCB0aXRsZSA9IHt9LFxuICAgICAgICBjb250ZW50ID0ge307XG5cbiAgICB0aXRsZXMuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgIHRpdGxlID0gJCh0aGlzKTtcbiAgICAgIGNvbnRlbnQgPSB0aXRsZS5uZXh0KCcuY29udGVudCcpO1xuICAgICAgaWYgKHRpdGxlLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpKSB7XG4gICAgICAgIGNvbnRlbnQuc2xpZGVEb3duKCk7XG4gICAgICAgIGNDb250ZW50ID0gY29udGVudDtcbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgfVxuICAgIH0pO1xuICB9XG5cbiAgZnVuY3Rpb24gdGl0bGVDbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgdmFyIHRpdGxlID0gJCh0aGlzKSxcbiAgICAgICAgY29udGVudCA9IHRpdGxlLm5leHQoJy5jb250ZW50JyksXG4gICAgICAgIHRpbWVvdXQgPSAwO1xuXG4gICAgY0NvbnRlbnQgPSB0aXRsZS5oYXNDbGFzcyhDTEFTUy5fYWN0aXZlKSA/IChjQ29udGVudC5zbGlkZVVwKCksIHRpdGxlLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpLCBudWxsKSA6IChcbiAgICAgIChjQ29udGVudCAhPSBudWxsKSAmJiAoY0NvbnRlbnQuc2xpZGVVcCgpLCB0aW1lb3V0ID0gMjUwKSxcbiAgICAgIHRpdGxlcy5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKSxcbiAgICAgIHRpdGxlLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpLFxuICAgICAgc2V0VGltZW91dCgoKSA9PiBjb250ZW50LnNsaWRlRG93bigpLCB0aW1lb3V0KSxcbiAgICAgIGNvbnRlbnRcbiAgICApXG4gIH1cblxuXHRyZXR1cm4gdGhpcztcbn07XG4iLCJsZXQgQ2Fyb3VzZWxQYWdpbmcgPSBmdW5jdGlvbihlbGVtZW50LCBpc0xvb3AgPSB0cnVlLCBtYXhTaG93ID0gMykge1xuXG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBpdGVtcyA9IGVsLmZpbmQoJ2xpJyksXG4gICAgICBwYWdpbmcgPSBpdGVtcy5maW5kKCdhJyksXG5cdFx0XHRjdXJyZW50SXRlbSA9IHt9LFxuICAgICAgdGFyZ2V0SXRlbSA9IHt9LFxuXHRcdFx0aXNBbmltYXRlID0gZmFsc2UsXG5cdFx0XHRpbmRleCA9IDAsXG4gICAgICB0YXJnZXQgPSAwLFxuICAgICAgbWF4ID0gaXRlbXMubGVuZ3RoLFxuICAgICAgaXRlbVcgPSA0MCAvIDMsXG4gICAgICBtYWluVyA9IDQwLFxuICAgICAgc2hvd0FycmF5ID0gW107XG5cbiAgKCgpID0+IGluaXQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdCgpIHtcbiAgICBUd2Vlbk1heC5zZXQoaXRlbXMsIHsgYXV0b0FscGhhOiAwIH0pO1xuICAgIGZvciAobGV0IGkgPSAwOyBpIDwgbWF4U2hvdzsgaSsrKSB7XG4gICAgICBzaG93QXJyYXlbaV0gPSBpO1xuICAgICAgY3VycmVudEl0ZW0gPSBpdGVtcy5lcShpKTtcbiAgICAgIFR3ZWVuTWF4LnNldChjdXJyZW50SXRlbSwgeyBhdXRvQWxwaGE6IDEsIHg6IGl0ZW1XICogaSB9KTtcbiAgICB9XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVTaG93QXJyYXkoKSB7XG4gICAgbGV0IGNJbmRleCA9IDA7XG4gICAgc2hvd0FycmF5WzBdID0gaW5kZXg7XG4gICAgaWYgKG1heFNob3cgPiAxKSBmb3IgKGxldCBpID0gMTsgaSA8IG1heFNob3c7IGkrKykge1xuICAgICAgY0luZGV4ID0gaW5kZXggKyBpO1xuICAgICAgY0luZGV4ID49IG1heCAmJiAoY0luZGV4ID0gY0luZGV4ICUgbWF4KTtcbiAgICAgIHNob3dBcnJheVtpXSA9IGNJbmRleDtcbiAgICB9XG4gIH1cblxuICB0aGlzLm5leHQgPSBmdW5jdGlvbigpIHtcbiAgICBpZiAoaXNBbmltYXRlIHx8ICghaXNMb29wICYmIGluZGV4ID09PSBtYXggLSBtYXhTaG93KSkgcmV0dXJuIGZhbHNlO1xuXHRcdGlzQW5pbWF0ZSA9IHRydWU7XG5cbiAgICB0YXJnZXQgPSBpbmRleCArIG1heFNob3c7XG4gICAgdGFyZ2V0ID49IG1heCAmJiAodGFyZ2V0ID0gdGFyZ2V0ICUgbWF4KTtcblx0XHRnb05leHQoKTtcbiAgfVxuXG4gIHRoaXMucHJldiA9IGZ1bmN0aW9uKCkge1xuXHRcdGlmIChpc0FuaW1hdGUgfHwgKCFpc0xvb3AgJiYgaW5kZXggPT09IDApKSByZXR1cm4gZmFsc2U7XG5cdFx0aXNBbmltYXRlID0gdHJ1ZTtcblxuXHRcdHRhcmdldCA9IChpbmRleCA9PT0gMCA/IG1heCA6IGluZGV4KSAtIDE7XG5cdFx0Z29QcmV2KCk7XG5cdH1cblxuXHRmdW5jdGlvbiBnb1ByZXYoKSB7XG4gICAgbGV0IGRlbGF5ID0gMCxcbiAgICAgICAgY0luZGV4ID0gMDtcblxuICAgIHRhcmdldEl0ZW0gPSBpdGVtcy5lcSh0YXJnZXQpO1xuICAgIGZvciAobGV0IGkgPSAwOyBpIDwgbWF4U2hvdzsgaSsrKSB7XG4gICAgICBjSW5kZXggPSBpbmRleCArIGk7XG4gICAgICBjSW5kZXggPj0gbWF4ICYmIChjSW5kZXggPSBjSW5kZXggJSBtYXgpO1xuICAgICAgY3VycmVudEl0ZW0gPSBpdGVtcy5lcShjSW5kZXgpO1xuXG4gICAgICBUd2Vlbk1heC50byhjdXJyZW50SXRlbSwgMSwge1xuICAgICAgICBkZWxheTogZGVsYXksXG4gICAgICAgIHg6IGl0ZW1XICogKGkgKyAxKSxcbiAgICAgICAgZWFzZTogRXhwby5lYXNlSW5PdXQsXG4gICAgICAgIGZvcmNlM0Q6IHRydWVcbiAgICAgIH0pO1xuICAgIH1cblxuXHRcdFR3ZWVuTWF4LnNldCh0YXJnZXRJdGVtLCB7IGF1dG9BbHBoYTogMSwgeDogLWl0ZW1XIH0pO1xuICAgIFR3ZWVuTWF4LnRvKHRhcmdldEl0ZW0sIDEsIHtcbiAgICAgIGRlbGF5OiBkZWxheSxcbiAgICAgIHg6IDAsXG5cdFx0XHRlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWUsXG5cdFx0XHRvbkNvbXBsZXRlOiBwcmV2Q29tcGxldGVcblx0XHR9KTtcblx0fVxuXG5cdGZ1bmN0aW9uIGdvTmV4dCgpIHtcbiAgICBsZXQgZGVsYXkgPSAwLFxuICAgICAgICBjSW5kZXggPSAwO1xuXG4gICAgdGFyZ2V0SXRlbSA9IGl0ZW1zLmVxKHRhcmdldCk7XG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBtYXhTaG93OyBpKyspIHtcbiAgICAgIGNJbmRleCA9IGluZGV4ICsgaTtcbiAgICAgIGNJbmRleCA+PSBtYXggJiYgKGNJbmRleCA9IGNJbmRleCAlIG1heCk7XG4gICAgICBjdXJyZW50SXRlbSA9IGl0ZW1zLmVxKGNJbmRleCk7XG5cbiAgICAgIFR3ZWVuTWF4LnRvKGN1cnJlbnRJdGVtLCAxLCB7XG4gICAgICAgIGRlbGF5OiBkZWxheSxcbiAgICAgICAgeDogaXRlbVcgKiAoaSAtIDEpLFxuICAgICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcbiAgICAgICAgZm9yY2UzRDogdHJ1ZVxuICAgICAgfSk7XG4gICAgfVxuXG5cdFx0VHdlZW5NYXguc2V0KHRhcmdldEl0ZW0sIHsgYXV0b0FscGhhOiAxLCB4OiBtYWluVyB9KTtcbiAgICBUd2Vlbk1heC50byh0YXJnZXRJdGVtLCAxLCB7XG5cdFx0XHRkZWxheTogZGVsYXksXG4gICAgICB4OiBtYWluVyAtIGl0ZW1XLFxuICAgICAgZWFzZTogRXhwby5lYXNlSW5PdXQsXG5cdFx0XHRmb3JjZTNEOiB0cnVlLFxuXHRcdFx0b25Db21wbGV0ZTogbmV4dENvbXBsZXRlXG5cdFx0fSk7XG4gIH1cblxuICBmdW5jdGlvbiBwcmV2Q29tcGxldGUoKSB7XG4gICAgaW5kZXggPSAoaW5kZXggPCAxID8gbWF4IDogaW5kZXgpIC0gMTtcbiAgICBoaWRlT3V0SXRlbSgpO1xuICB9XG5cbiAgZnVuY3Rpb24gbmV4dENvbXBsZXRlKCkge1xuICAgIGluZGV4ID0gaW5kZXggPCBtYXggLSAxID8gKGluZGV4ICsgMSkgOiAwO1xuICAgIGhpZGVPdXRJdGVtKCk7XG4gIH1cblxuICBmdW5jdGlvbiBoaWRlT3V0SXRlbSgpIHtcbiAgICBsZXQgaXRlbSA9IHt9LFxuICAgICAgICBjdXJyZW50SW5kZXggPSAwO1xuXG4gICAgdXBkYXRlU2hvd0FycmF5KCk7XG4gICAgaXRlbXMuZWFjaCgoXywgZWwpID0+IFR3ZWVuTWF4LnNldChlbCwgeyBhdXRvQWxwaGE6IDAgfSkpO1xuXG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBtYXhTaG93OyBpKyspIHtcbiAgICAgIGN1cnJlbnRJbmRleCA9IHNob3dBcnJheVtpXTtcbiAgICAgIGl0ZW0gPSBpdGVtcy5lcShjdXJyZW50SW5kZXgpO1xuICAgICAgVHdlZW5NYXguc2V0KGl0ZW0sIHsgYXV0b0FscGhhOiAxIH0pO1xuICAgIH1cbiAgICBpc0FuaW1hdGUgPSBmYWxzZTtcbiAgICB1cGRhdGVBY3RpdmUoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZUFjdGl2ZSgpIHtcbiAgICBwYWdpbmcucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgcGFnaW5nLmVxKHNob3dBcnJheVsxXSkuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gIH1cblxuXHRyZXR1cm4gdGhpcztcbn07IiwibGV0IENhcm91c2VsID0gZnVuY3Rpb24oZWxlbWVudCwgaXNMb29wLCBtYXhTaG93KSB7XG5cbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIGhvbGRlciA9IGVsLmZpbmQoJy5pdGVtLXdyYXAnKSxcbiAgICAgIGl0ZW1zID0gaG9sZGVyLmZpbmQoJy5pdGVtJyksXG4gICAgICBidG5QcmV2ID0gZWwuZmluZCgnLmJ0bi1wcmV2JyksXG4gICAgICBidG5OZXh0ID0gZWwuZmluZCgnLmJ0bi1uZXh0JyksXG4gICAgICBwV3JhcCA9IGVsLmZpbmQoJy5wYWdpbmcnKSxcbiAgICAgIHBhZ2luZyA9IHBXcmFwLmZpbmQoJ2xpJyksXG5cdFx0XHRjdXJyZW50SXRlbSA9IHt9LFxuICAgICAgdGFyZ2V0SXRlbSA9IHt9LFxuXHRcdFx0aXNBbmltYXRlID0gZmFsc2UsXG5cdFx0XHRpbmRleCA9IDAsXG4gICAgICB0YXJnZXQgPSAwLFxuICAgICAgbWF4ID0gaXRlbXMubGVuZ3RoLFxuICAgICAgaXRlbSA9IGl0ZW1zLmVxKGluZGV4KSxcbiAgICAgIGl0ZW1XID0gaXRlbS5vdXRlcldpZHRoKCksXG4gICAgICBpdGVtSCA9IDAsXG4gICAgICBtYWluVyA9IGhvbGRlci5vdXRlcldpZHRoKCksXG4gICAgICBzaG93QXJyYXkgPSBbXSxcbiAgICAgIGlzSW5pdCA9IGZhbHNlO1xuXG4gICgoKSA9PiBtYXggPiBtYXhTaG93ID8gaW5pdCgpIDogZWwuYWRkQ2xhc3MoQ0xBU1MuX2RsZXgpKSgpO1xuXG4gIHRoaXMudXBkYXRlTWF4U2hvdyA9IHZhbCA9PiB7XG4gICAgaWYgKHZhbCA9PT0gbWF4U2hvdyB8fCAhaXNJbml0KSByZXR1cm4gZmFsc2U7XG4gICAgbWF4U2hvdyA9IHZhbDtcbiAgICB1cGRhdGVTaG93QXJyYXkoKTtcbiAgICB1cGRhdGVQYWdpbmcoKTtcbiAgICByZXNldFBvcygpO1xuICB9XG5cbiAgdGhpcy5yZUluaXQgPSAoKSA9PiBpbml0KCk7XG4gIGZ1bmN0aW9uIGluaXQoKSB7XG5cbiAgICBpdGVtSCA9IGdldE1heEgoKTtcbiAgICBob2xkZXIuaGVpZ2h0KGl0ZW1IKTtcbiAgICBUd2Vlbk1heC5zZXQoaXRlbXMsIHsgYXV0b0FscGhhOiAwIH0pO1xuICAgIGZvciAobGV0IGkgPSAwOyBpIDwgbWF4U2hvdzsgaSsrKSB7XG4gICAgICBzaG93QXJyYXlbaV0gPSBpO1xuICAgICAgY3VycmVudEl0ZW0gPSBpdGVtcy5lcShpKTtcbiAgICAgIFR3ZWVuTWF4LnNldChjdXJyZW50SXRlbSwgeyBhdXRvQWxwaGE6IDEsIHg6IGl0ZW1XICogaSB9KTtcbiAgICB9XG4gICAgdXBkYXRlUGFnaW5nKCk7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgQVBQLl9pc01vYmlsZSAmJiBlbC5vbignc3dpcGVsZWZ0JywgbmV4dENsaWNrZWQpLm9uKCdzd2lwZXJpZ2h0JywgcHJldkNsaWNrZWQpO1xuICAgIGJ0blByZXYub24oQ0xJQ0ssIHByZXZDbGlja2VkKTtcbiAgICBidG5OZXh0Lm9uKENMSUNLLCBuZXh0Q2xpY2tlZCk7XG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihTSVpFX0NIQU5HRUQsICgpID0+IHJlc2V0UG9zKCkpO1xuICAgIGlzSW5pdCA9IHRydWU7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVTaG93QXJyYXkoKSB7XG4gICAgbGV0IGNJbmRleCA9IDA7XG4gICAgc2hvd0FycmF5WzBdID0gaW5kZXg7XG4gICAgaWYgKG1heFNob3cgPiAxKSBmb3IgKGxldCBpID0gMTsgaSA8IG1heFNob3c7IGkrKykge1xuICAgICAgY0luZGV4ID0gaW5kZXggKyBpO1xuICAgICAgY0luZGV4ID49IG1heCAmJiAoY0luZGV4ID0gY0luZGV4ICUgbWF4KTtcbiAgICAgIHNob3dBcnJheVtpXSA9IGNJbmRleDtcbiAgICB9XG4gICAgY29uc29sZS5sb2coc2hvd0FycmF5KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHJlc2V0UG9zKCkge1xuICAgIHNldEhlaWdodCgpO1xuICAgIGl0ZW1XID0gaXRlbS5vdXRlcldpZHRoKCk7XG4gICAgbWFpblcgPSBob2xkZXIub3V0ZXJXaWR0aCgpO1xuXG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBtYXhTaG93OyBpKyspIHtcbiAgICAgIGN1cnJlbnRJdGVtID0gaXRlbXMuZXEoc2hvd0FycmF5W2ldKTtcbiAgICAgIFR3ZWVuTWF4LnNldChjdXJyZW50SXRlbSwgeyBhdXRvQWxwaGE6IDEsIHg6IGl0ZW1XICogaSB9KTtcbiAgICB9XG4gICAgbWF4U2hvdyA+PSBtYXggPyBoaWRlQnRuKCkgOiBzaG93QnRuKCk7XG4gIH1cblxuICBmdW5jdGlvbiBzZXRIZWlnaHQoKSB7XG4gICAgaG9sZGVyLmNzcygnaGVpZ2h0JywgJ2F1dG8nKTtcbiAgICBpdGVtcy5jc3MoJ2hlaWdodCcsICdhdXRvJyk7XG5cbiAgICBpdGVtSCA9IGdldE1heEgoKTtcbiAgICBob2xkZXIuaGVpZ2h0KGl0ZW1IKTtcbiAgICBpdGVtcy5oZWlnaHQoaXRlbUgpO1xuICB9XG5cbiAgZnVuY3Rpb24gaGlkZUJ0bigpIHtcbiAgICBidG5OZXh0LmhpZGUoKTtcbiAgICBidG5QcmV2LmhpZGUoKTtcbiAgICAvLyBwV3JhcC5oaWRlKCk7XG4gIH1cblxuICBmdW5jdGlvbiBzaG93QnRuKCkge1xuICAgIGJ0bk5leHQuc2hvdygpO1xuICAgIGJ0blByZXYuc2hvdygpO1xuICAgIC8vIHBXcmFwLmhpZGUoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGdldE1heEgoKSB7XG4gICAgbGV0IGl0ZW0gPSB7fSxcbiAgICAgICAgbWF4SCA9IDA7XG5cbiAgICBpdGVtcy5lYWNoKChfLCBlbCkgPT4ge1xuICAgICAgaXRlbSA9ICQoZWwpO1xuICAgICAgaXRlbS5oZWlnaHQoKSA+IG1heEggJiYgKG1heEggPSBpdGVtLmhlaWdodCgpKTtcbiAgICB9KTtcbiAgICByZXR1cm4gbWF4SDtcbiAgfVxuXG4gIGZ1bmN0aW9uIG5leHRDbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgaWYgKGlzQW5pbWF0ZSB8fCAoIWlzTG9vcCAmJiBpbmRleCA9PT0gbWF4IC0gbWF4U2hvdykpIHJldHVybiBmYWxzZTtcblx0XHRpc0FuaW1hdGUgPSB0cnVlO1xuXG4gICAgdGFyZ2V0ID0gaW5kZXggKyBtYXhTaG93O1xuICAgIHRhcmdldCA+PSBtYXggJiYgKHRhcmdldCA9IHRhcmdldCAlIG1heCk7XG5cdFx0Z29OZXh0KCk7XG4gIH1cblxuICBmdW5jdGlvbiBwcmV2Q2xpY2tlZChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdGlmIChpc0FuaW1hdGUgfHwgKCFpc0xvb3AgJiYgaW5kZXggPT09IDApKSByZXR1cm4gZmFsc2U7XG5cdFx0aXNBbmltYXRlID0gdHJ1ZTtcblxuXHRcdHRhcmdldCA9IChpbmRleCA9PT0gMCA/IG1heCA6IGluZGV4KSAtIDE7XG5cdFx0Z29QcmV2KCk7XG5cdH1cblxuXHRmdW5jdGlvbiBnb1ByZXYoKSB7XG4gICAgbGV0IGRlbGF5ID0gMCxcbiAgICAgICAgY0luZGV4ID0gMDtcblxuICAgIHBhZ2luZy5wcmV2KCk7XG4gICAgdGFyZ2V0SXRlbSA9IGl0ZW1zLmVxKHRhcmdldCk7XG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBtYXhTaG93OyBpKyspIHtcbiAgICAgIGNJbmRleCA9IGluZGV4ICsgaTtcbiAgICAgIGNJbmRleCA+PSBtYXggJiYgKGNJbmRleCA9IGNJbmRleCAlIG1heCk7XG4gICAgICBjdXJyZW50SXRlbSA9IGl0ZW1zLmVxKGNJbmRleCk7XG5cbiAgICAgIFR3ZWVuTWF4LnRvKGN1cnJlbnRJdGVtLCAxLCB7XG4gICAgICAgIGRlbGF5OiBkZWxheSxcbiAgICAgICAgeDogaXRlbVcgKiAoaSArIDEpLFxuICAgICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcbiAgICAgICAgZm9yY2UzRDogdHJ1ZVxuICAgICAgfSk7XG4gICAgfVxuXG5cdFx0VHdlZW5NYXguc2V0KHRhcmdldEl0ZW0sIHsgYXV0b0FscGhhOiAxLCB4OiAtaXRlbVcgfSk7XG4gICAgVHdlZW5NYXgudG8odGFyZ2V0SXRlbSwgMSwge1xuICAgICAgZGVsYXk6IGRlbGF5LFxuICAgICAgeDogMCxcblx0XHRcdGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZSxcblx0XHRcdG9uQ29tcGxldGU6IHByZXZDb21wbGV0ZVxuXHRcdH0pO1xuXHR9XG5cblx0ZnVuY3Rpb24gZ29OZXh0KCkge1xuICAgIGxldCBkZWxheSA9IDAsXG4gICAgICAgIGNJbmRleCA9IDA7XG5cbiAgICBwYWdpbmcubmV4dCgpO1xuICAgIHRhcmdldEl0ZW0gPSBpdGVtcy5lcSh0YXJnZXQpO1xuICAgIGZvciAobGV0IGkgPSAwOyBpIDwgbWF4U2hvdzsgaSsrKSB7XG4gICAgICBjSW5kZXggPSBpbmRleCArIGk7XG4gICAgICBjSW5kZXggPj0gbWF4ICYmIChjSW5kZXggPSBjSW5kZXggJSBtYXgpO1xuICAgICAgY3VycmVudEl0ZW0gPSBpdGVtcy5lcShjSW5kZXgpO1xuXG4gICAgICBUd2Vlbk1heC50byhjdXJyZW50SXRlbSwgMSwge1xuICAgICAgICBkZWxheTogZGVsYXksXG4gICAgICAgIHg6IGl0ZW1XICogKGkgLSAxKSxcbiAgICAgICAgZWFzZTogRXhwby5lYXNlSW5PdXQsXG4gICAgICAgIGZvcmNlM0Q6IHRydWVcbiAgICAgIH0pO1xuICAgIH1cblxuXHRcdFR3ZWVuTWF4LnNldCh0YXJnZXRJdGVtLCB7IGF1dG9BbHBoYTogMSwgeDogbWFpblcgfSk7XG4gICAgVHdlZW5NYXgudG8odGFyZ2V0SXRlbSwgMSwge1xuXHRcdFx0ZGVsYXk6IGRlbGF5LFxuICAgICAgeDogbWFpblcgLSBpdGVtVyxcbiAgICAgIGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZSxcblx0XHRcdG9uQ29tcGxldGU6IG5leHRDb21wbGV0ZVxuXHRcdH0pO1xuICB9XG5cbiAgZnVuY3Rpb24gcHJldkNvbXBsZXRlKCkge1xuICAgIGluZGV4ID0gKGluZGV4IDwgMSA/IG1heCA6IGluZGV4KSAtIDE7XG4gICAgaGlkZU91dEl0ZW0oKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIG5leHRDb21wbGV0ZSgpIHtcbiAgICBpbmRleCA9IGluZGV4IDwgbWF4IC0gMSA/IChpbmRleCArIDEpIDogMDtcbiAgICBoaWRlT3V0SXRlbSgpO1xuICB9XG5cbiAgZnVuY3Rpb24gaGlkZU91dEl0ZW0oKSB7XG4gICAgbGV0IGl0ZW0gPSB7fSxcbiAgICAgICAgY3VycmVudEluZGV4ID0gMDtcblxuICAgIHVwZGF0ZVNob3dBcnJheSgpO1xuICAgIGl0ZW1zLmVhY2goKF8sIGVsKSA9PiBUd2Vlbk1heC5zZXQoZWwsIHsgYXV0b0FscGhhOiAwIH0pKTtcblxuICAgIGZvciAobGV0IGkgPSAwOyBpIDwgbWF4U2hvdzsgaSsrKSB7XG4gICAgICBjdXJyZW50SW5kZXggPSBzaG93QXJyYXlbaV07XG4gICAgICBpdGVtID0gaXRlbXMuZXEoY3VycmVudEluZGV4KTtcbiAgICAgIFR3ZWVuTWF4LnNldChpdGVtLCB7IGF1dG9BbHBoYTogMSB9KTtcbiAgICB9XG4gICAgaXNBbmltYXRlID0gZmFsc2U7XG4gICAgdXBkYXRlUGFnaW5nKCk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVQYWdpbmcoKSB7XG4gICAgcGFnaW5nLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIGZvciAobGV0IGkgPSAwOyBpIDwgbWF4U2hvdzsgaSsrKSBwYWdpbmcuZXEoc2hvd0FycmF5W2ldKS5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICAocGFnaW5nLmxlbmd0aCA9PT0gbWF4U2hvdykgPyBwV3JhcC5oaWRlKCkgOiBwV3JhcC5zaG93KCk7XG4gIH1cblxuXHRyZXR1cm4gdGhpcztcbn07IiwiLyoqKioqIEVxdWFsIEhlaWdodCAqKioqKi9cbmxldCBFcXVhbEhlaWdodCA9IGZ1bmN0aW9uKGVsZW1lbnQsIGF1dG9CcmVhaykge1xuXG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBpdGVtSCA9IDAsXG4gICAgICBpc0RpcnR5ID0gZmFsc2U7XG5cbiAgKCgpID0+IGluaXQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdCgpIHtcbiAgICBzZXRIZWlnaHQoKTtcbiAgICBpbml0RXZlbnQoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGluaXRFdmVudCgpIHtcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFNJWkVfQ0hBTkdFRCwgKCkgPT4gc2V0SGVpZ2h0KCkpO1xuICB9XG5cbiAgZnVuY3Rpb24gc2V0SGVpZ2h0KCkge1xuICAgIGlmIChBUFAuX1cgPD0gYXV0b0JyZWFrKSB7XG4gICAgICBpc0RpcnR5ICYmIChlbC5jc3MoJ2hlaWdodCcsICdhdXRvJyksIGlzRGlydHkgPSBmYWxzZSk7XG4gICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9XG5cbiAgICBlbC5jc3MoJ2hlaWdodCcsICdhdXRvJyk7XG4gICAgaXRlbUggPSBnZXRNYXhIKCk7XG4gICAgZWwuaGVpZ2h0KGl0ZW1IKTtcbiAgICBpc0RpcnR5ID0gdHJ1ZTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGdldE1heEgoKSB7XG4gICAgbGV0IGl0ZW0gPSB7fSxcbiAgICAgICAgbWF4SCA9IDA7XG5cbiAgICBlbC5lYWNoKChfLCBlKSA9PiB7XG4gICAgICBpdGVtID0gJChlKTtcbiAgICAgIGl0ZW0uaGVpZ2h0KCkgPiBtYXhIICYmIChtYXhIID0gaXRlbS5oZWlnaHQoKSk7XG4gICAgfSk7XG4gICAgcmV0dXJuIG1heEg7XG4gIH1cblxuXHRyZXR1cm4gdGhpcztcbn07IiwiLyoqKioqIE5PVElGSUNBVElPTiBDT05UUk9MICoqKioqL1xubGV0IE5vdGlmaWNhdGlvbkN0ciA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcblxuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgYnRuQmVsbCA9IGVsLmZpbmQoJy5ub3RpYmVsbCcpLFxuICAgICAgcGFuZWwgPSBlbC5maW5kKCcucGFuZWwnKSxcbiAgICAgIGJ0blRvZ2dsZSA9IHBhbmVsLmZpbmQoJy5idG4tdG9nZ2xlJyksXG4gICAgICBidG5SZWFkQWxsID0gcGFuZWwuZmluZCgnLmJ0bi1yZWFkLWFsbCcpLFxuICAgICAgaXRlbXMgPSBwYW5lbC5maW5kKCcuaXRlbScpO1xuXG4gICgoKSA9PiBpbml0KCkpKCk7XG4gIGZ1bmN0aW9uIGluaXQoKSB7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgYnRuQmVsbC5vbihDTElDSywgYnRuQmVsbENsaWNrZWQpO1xuICAgIGJ0blJlYWRBbGwub24oQ0xJQ0ssIGUgPT4gKGUucHJldmVudERlZmF1bHQoKSwgaXRlbXMucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkpKTtcbiAgICBidG5Ub2dnbGUub24oQ0xJQ0ssIGJ0blRvZ2dsZUNsaWNrZWQpO1xuICAgIC8vIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCAoKSA9PiBzZXRIZWlnaHQoKSk7XG4gIH1cblxuICBmdW5jdGlvbiBidG5CZWxsQ2xpY2tlZChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIC8vXG4gICAgYnRuQmVsbC5oYXNDbGFzcyhDTEFTUy5fYWN0aXZlKSAmJiBidG5CZWxsLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIGJ0bkJlbGwuaGFzQ2xhc3MoQ0xBU1MuX29wZW4pID8gYnRuQmVsbC5yZW1vdmVDbGFzcyhDTEFTUy5fb3BlbikgOiAoYnRuQmVsbC5hZGRDbGFzcyhDTEFTUy5fb3BlbiksIGRvY3VtZW50LmRpc3BhdGNoRXZlbnQoTk9USV9PUEVOX0VWRU5UKSk7XG4gIH1cblxuICBmdW5jdGlvbiBidG5Ub2dnbGVDbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgbGV0IGJ0biA9ICQodGhpcyk7XG5cbiAgICBpZiAoYnRuLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpKSByZXR1cm4gZmFsc2U7XG4gICAgYnRuVG9nZ2xlLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIGJ0bi5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBwYW5lbC5oYXNDbGFzcyhDTEFTUy5fYWN0aXZlKSA/IHBhbmVsLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpIDogcGFuZWwuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gIH1cblxuICB0aGlzLmNsb3NlID0gKCkgPT4gYnRuQmVsbC5oYXNDbGFzcyhDTEFTUy5fb3BlbikgJiYgYnRuQmVsbC5yZW1vdmVDbGFzcyhDTEFTUy5fb3Blbik7XG5cdHJldHVybiB0aGlzO1xufTsiLCIvKioqKiogUkVRVUVTVCBDT05UUk9MICoqKioqL1xubGV0IFJlcXVlc3RDdHIgPSBmdW5jdGlvbihlbGVtZW50KSB7XG5cbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIHdyYXBMb2NrID0gZWwuZmluZCgnLndyYXAtbG9jaycpLFxuICAgICAgd3JhcEN0ciA9IGVsLmZpbmQoJy53cmFwLWN0cicpLFxuICAgICAgYnRuQWN0aW9uID0gd3JhcEN0ci5maW5kKCcuYnRuLWFjdGlvbicpLFxuICAgICAgYnRuQmx1ZSA9IHdyYXBDdHIuZmluZCgnLmJ0bi1ibHVlJyksXG4gICAgICBidG5SZWQgPSB3cmFwQ3RyLmZpbmQoJy5idG4tcmVkJyksXG4gICAgICB0YWdCbHVlID0gZWwuZmluZCgnLnN0YXR1cy5ibHVlJyksXG4gICAgICB0YWdSZWQgPSBlbC5maW5kKCcuc3RhdHVzLnJlZCcpO1xuXG4gICgoKSA9PiBpbml0KCkpKCk7XG4gIGZ1bmN0aW9uIGluaXQoKSB7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgYnRuQWN0aW9uLm9uKENMSUNLLCBlID0+IHtcbiAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgIGJ0bkFjdGlvbi50b2dnbGVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICB9KTtcblxuICAgIGJ0bkJsdWUub24oQ0xJQ0ssIGJ0bkJsdWVDbGlja2VkKTtcbiAgICBidG5SZWQub24oQ0xJQ0ssIGJ0blJlZENsaWNrZWQpO1xuICB9XG5cbiAgZnVuY3Rpb24gYnRuQmx1ZUNsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICB3cmFwTG9jay5yZW1vdmVDbGFzcyhDTEFTUy5fZGlzYWJsZSk7XG4gICAgdGFnQmx1ZS5yZW1vdmVDbGFzcyhDTEFTUy5fZGlzYWJsZSk7XG4gICAgd3JhcEN0ci5oaWRlKCk7XG4gIH1cblxuICBmdW5jdGlvbiBidG5SZWRDbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICB0YWdSZWQucmVtb3ZlQ2xhc3MoQ0xBU1MuX2Rpc2FibGUpO1xuICAgICAgd3JhcEN0ci5oaWRlKCk7XG4gIH1cblxuXHRyZXR1cm4gdGhpcztcbn07IiwibGV0IFNsaWRlciA9IGZ1bmN0aW9uKGVsZW1lbnQsIGlUaW1lLCBlTmFtZSkge1xuXG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBob2xkZXIgPSBlbC5maW5kKCcuaXRlbS13cmFwJyksXG4gICAgICBpdGVtcyA9IGhvbGRlci5maW5kKCcuaXRlbScpLFxuICAgICAgcGFnaW5ncyA9IGVsLmZpbmQoJy5wYWdpbmcgbGknKSxcbiAgICAgIGJ0blByZXYgPSBlbC5maW5kKCcuYnRuLXByZXYnKSxcbiAgICAgIGJ0bk5leHQgPSBlbC5maW5kKCcuYnRuLW5leHQnKSxcblx0XHRcdGN1cnJlbnRJdGVtID0ge30sXG4gICAgICB0YXJnZXRJdGVtID0ge30sXG5cdFx0XHRpc0FuaW1hdGUgPSBmYWxzZSxcblx0XHRcdGluZGV4ID0gMCxcblx0XHRcdHRhcmdldCA9IDAsXG5cdFx0XHRtYXggPSBpdGVtcy5sZW5ndGgsXG4gICAgICBtYWluVyA9IGVsLndpZHRoKCksXG4gICAgICBpc0hvdmVyID0gZmFsc2UsXG4gICAgICBpbnRlcnZhbCA9IHt9LFxuICAgICAgdXBkYXRlRXZlbnQgPSB7fTtcblxuICAoKCkgPT4gbWF4IDwgMiA/IChwYWdpbmdzLmhpZGUoKSwgYnRuUHJldi5oaWRlKCksIGJ0bk5leHQuaGlkZSgpKSA6IChcbiAgICBUd2Vlbk1heC5zZXQoaXRlbXMsIHsgYXV0b0FscGhhOiAwfSksXG4gICAgVHdlZW5NYXguc2V0KGl0ZW1zLmVxKGluZGV4KSwgeyBhdXRvQWxwaGE6IDF9KSxcbiAgICBhdXRvUGxheSgpLFxuICAgIGluaXRFdmVudCgpXG4gICkpKCk7XG5cbiAgdGhpcy5zaG93ID0gaSA9PiAoaSAhPSBpbmRleCkgJiYgKFxuICAgIHRhcmdldCA9IGksXG4gICAgdXBkYXRlUGFnaW5nKCksXG4gICAgVHdlZW5NYXguc2V0KGl0ZW1zLmVxKGluZGV4KSwgeyBhdXRvQWxwaGE6IDAsIHg6IC1tYWluVyB9KSxcbiAgICBUd2Vlbk1heC5zZXQoaXRlbXMuZXEodGFyZ2V0KSwgeyBhdXRvQWxwaGE6IDEsIHg6IDAgfSksXG4gICAgaW5kZXggPSB0YXJnZXQsXG4gICAgYXV0b1BsYXkoKVxuICApO1xuXG4gIHRoaXMuZ29UbyA9IGkgPT4gZ29UbyhpKTtcbiAgdGhpcy5nZXRBbmltYXRpb25TdGF0ZSA9ICgpID0+IGlzQW5pbWF0ZTtcbiAgdGhpcy5nZXRJdGVtSGVpZ2h0ID0gKCkgPT4ge1xuICAgIGxldCBtYXggPSAwLFxuICAgICAgICBoID0gMDtcblxuICAgIGl0ZW1zLmVhY2goZnVuY3Rpb24oKSB7XG4gICAgICBoID0gJCh0aGlzKS5oZWlnaHQoKTtcbiAgICAgIG1heCA9IChoID4gbWF4KSA/IGggOiBtYXg7XG4gICAgfSk7XG4gICAgcmV0dXJuIG1heDtcbiAgfVxuXG4gIGZ1bmN0aW9uIGF1dG9QbGF5KCkge1xuXHRcdCFpc0hvdmVyICYmIGlUaW1lID4gMCAmJiAgKGNsZWFySW50ZXJ2YWwoaW50ZXJ2YWwpLCBpbnRlcnZhbCA9IHNldEludGVydmFsKCgpID0+IGdvTmV4dCgpLCBpVGltZSkpO1xuXHR9XG5cbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIEFQUC5faXNNb2JpbGUgPyBob2xkZXIub24oU1dJUEVfTCwgbmV4dENsaWNrZWQpLm9uKFNXSVBFX1IsIHByZXZDbGlja2VkKTpcbiAgICAgIGlUaW1lID4gMCAmJiBob2xkZXIub24oTV9PVkVSLCBtb3VzZU92ZXIpLm9uKE1fT1VULCBtb3VzZU91dCk7XG5cbiAgICBidG5QcmV2Lm9uKENMSUNLLCBwcmV2Q2xpY2tlZCk7XG4gICAgYnRuTmV4dC5vbihDTElDSywgbmV4dENsaWNrZWQpO1xuICAgIHBhZ2luZ3Mub24oQ0xJQ0ssIG5hdkNsaWNrZWQpO1xuICAgIGVOYW1lICYmICh1cGRhdGVFdmVudCA9IG5ldyBDdXN0b21FdmVudChlTmFtZSwgeyBidWJibGVzOiB0cnVlLCBkZXRhaWw6IHsgdGFyZ2V0OiAwIH0gfSkpO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCAoKSA9PiBtYWluVyA9IGVsLndpZHRoKCkpO1xuICB9XG5cbiAgZnVuY3Rpb24gbW91c2VPdmVyKCkge1xuICAgIGlzSG92ZXIgfHwgKGNsZWFySW50ZXJ2YWwoaW50ZXJ2YWwpLCBpc0hvdmVyID0gdHJ1ZSk7XG4gIH1cblxuICBmdW5jdGlvbiBtb3VzZU91dCgpIHtcbiAgICBpc0hvdmVyICYmIChpc0hvdmVyID0gZmFsc2UsIGF1dG9QbGF5KCkpO1xuICB9XG5cbiAgZnVuY3Rpb24gY2hlY2tNYWluVygpIHtcbiAgICBtYWluVyA8PSAwICYmIChtYWluVyA9IGVsLndpZHRoKCkpO1xuICB9XG5cbiAgZnVuY3Rpb24gcHJldkNsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBpZiAoaXNBbmltYXRlKSByZXR1cm4gZmFsc2U7XG4gICAgY2hlY2tNYWluVygpO1xuICAgIGdvUHJldigpO1xuICB9XG5cbiAgZnVuY3Rpb24gbmV4dENsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBpZiAoaXNBbmltYXRlKSByZXR1cm4gZmFsc2U7XG4gICAgY2hlY2tNYWluVygpXG4gICAgZ29OZXh0KCk7XG4gIH1cblxuICBmdW5jdGlvbiBuYXZDbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgbGV0IGl0ZW0gPSAkKHRoaXMpLFxuICAgICAgICB0YXJnZXRJbmRleCA9IDA7XG5cbiAgICBpZiAoaXNBbmltYXRlIHx8IGl0ZW0uaGFzQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkpIHJldHVybiBmYWxzZTtcbiAgICBjaGVja01haW5XKCk7XG4gICAgdGFyZ2V0SW5kZXggPSBwYXJzZUludChpdGVtLmRhdGEoJ2luZGV4JykpO1xuICAgIGdvVG8odGFyZ2V0SW5kZXgpO1xuICB9XG5cbiAgZnVuY3Rpb24gZ29Ubyh0YXJnZXRJbmRleCkge1xuICAgIGlzQW5pbWF0ZSA9IHRydWU7XG4gICAgdGFyZ2V0ID0gdGFyZ2V0SW5kZXg7XG5cdFx0aW5kZXggPCB0YXJnZXRJbmRleCA/IGdvVG9OZXh0KCkgOiBnb1RvUHJldigpO1xuICB9XG5cbiAgZnVuY3Rpb24gZ29QcmV2KCkge1xuICAgIGlzQW5pbWF0ZSA9IHRydWU7XG5cdFx0dGFyZ2V0ID0gaW5kZXggLSAxO1xuXHRcdHRhcmdldCA8IDAgJiYgKHRhcmdldCA9IG1heCAtIDEpO1xuXHRcdGdvVG9QcmV2KCk7XG5cdH1cblxuICBmdW5jdGlvbiBnb05leHQoKSB7XG4gICAgaXNBbmltYXRlID0gdHJ1ZTtcblx0XHR0YXJnZXQgPSBpbmRleCArIDE7XG5cdFx0dGFyZ2V0ID09PSBtYXggJiYgKHRhcmdldCA9IDApO1xuXHRcdGdvVG9OZXh0KCk7XG5cdH1cblxuXHRmdW5jdGlvbiBnb1RvUHJldigpIHtcbiAgICB1cGRhdGVQYWdpbmcoKTtcblx0XHRjdXJyZW50SXRlbSA9IGl0ZW1zLmVxKGluZGV4KTtcblx0XHR0YXJnZXRJdGVtID0gaXRlbXMuZXEodGFyZ2V0KTtcblxuXHRcdFR3ZWVuTWF4LnNldCh0YXJnZXRJdGVtLCB7IGF1dG9BbHBoYTogMSwgeDogLW1haW5XIH0pO1xuICAgIFR3ZWVuTWF4LnRvKHRhcmdldEl0ZW0sIDEsIHtcbiAgICAgIHg6IDAsXG5cdFx0XHRlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWUsXG5cdFx0XHRvbkNvbXBsZXRlOiBhbmltYXRlZERvbmVcblx0XHR9KTtcblxuXHRcdFR3ZWVuTWF4LnRvKGN1cnJlbnRJdGVtLCAxLCB7XG4gICAgICB4OiBtYWluVyxcblx0XHRcdGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZVxuXHRcdH0pO1xuXHR9XG5cblx0ZnVuY3Rpb24gZ29Ub05leHQoKSB7XG4gICAgdXBkYXRlUGFnaW5nKCk7XG5cdFx0Y3VycmVudEl0ZW0gPSBpdGVtcy5lcShpbmRleCk7XG5cdFx0dGFyZ2V0SXRlbSA9IGl0ZW1zLmVxKHRhcmdldCk7XG5cblx0XHRUd2Vlbk1heC5zZXQodGFyZ2V0SXRlbSwgeyBhdXRvQWxwaGE6IDEsIHg6IG1haW5XIH0pO1xuICAgIFR3ZWVuTWF4LnRvKHRhcmdldEl0ZW0sIDEsIHtcbiAgICAgIHg6IDAsXG4gICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWUsXG5cdFx0XHRvbkNvbXBsZXRlOiBhbmltYXRlZERvbmVcblx0XHR9KTtcblxuXHRcdFR3ZWVuTWF4LnRvKGN1cnJlbnRJdGVtLCAxLCB7XG4gICAgICB4OiAtbWFpblcsXG5cdFx0XHRlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWVcblx0XHR9KTtcblx0fVxuXG5cdGZ1bmN0aW9uIGFuaW1hdGVkRG9uZSgpIHtcbiAgICBpc0FuaW1hdGUgPSBmYWxzZTtcbiAgICBUd2Vlbk1heC5zZXQoY3VycmVudEl0ZW0sIHsgYXV0b0FscGhhOiAwIH0pO1xuICAgIHVwZGF0ZVBhZ2luZygpO1xuICAgIGluZGV4ID0gdGFyZ2V0O1xuICAgIGF1dG9QbGF5KCk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVQYWdpbmcoKSB7XG4gICAgcGFnaW5ncy5lcShpbmRleCkucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgcGFnaW5ncy5lcSh0YXJnZXQpLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIGVOYW1lICYmICh1cGRhdGVFdmVudC5kZXRhaWwudGFyZ2V0ID0gdGFyZ2V0LCBkb2N1bWVudC5kaXNwYXRjaEV2ZW50KHVwZGF0ZUV2ZW50KSk7XG4gIH1cblxuXHRyZXR1cm4gdGhpcztcbn07IiwiLyoqKioqIFZpZGVvIFNlY3Rpb24gKioqKiovXG5sZXQgVmlkZW9TZWN0aW9uID0gZnVuY3Rpb24oZWxlbWVudCkge1xuXG4gIGxldCBlbCA9IGVsZW1lbnQsXG4gICAgICB3cmFwID0gZWwucXVlcnlTZWxlY3RvcignLnZpZC13cmFwJyksXG4gICAgICB2aWQgPSB3cmFwLnF1ZXJ5U2VsZWN0b3IoJ3ZpZGVvJyk7XG5cblxuICAoKCkgPT4gaW5pdCgpKSgpO1xuICBmdW5jdGlvbiBpbml0KCkge1xuICAgIGluaXRFdmVudCgpO1xuICB9XG5cbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIHdyYXAuYWRkRXZlbnRMaXN0ZW5lcihDTElDSywgd3JhcENsaWNrZWQpO1xuICB9XG5cbiAgZnVuY3Rpb24gd3JhcENsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICB3cmFwLmNsYXNzTGlzdC5jb250YWlucyhDTEFTUy5fYWN0aXZlKSA/IHdyYXAuY2xhc3NMaXN0LnJlbW92ZShDTEFTUy5fYWN0aXZlKSA6IHdyYXAuY2xhc3NMaXN0LmFkZChDTEFTUy5fYWN0aXZlKTtcbiAgICB2aWQucGF1c2VkID8gdmlkLnBsYXkoKSA6IHZpZC5wYXVzZSgpO1xuICB9XG5cblx0cmV0dXJuIHRoaXM7XG59OyIsIkFQUC5mb290ZXIgPSB7XG4gIF9lbDoge30sXG5cbiAgaW5pdCgpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gICAgc2VsZi5fZWwgPSAkKCcubWFpbi1mb290ZXInKTtcbiAgICBpZiAoc2VsZi5fZWwgPT09IG51bGwpIHJldHVybiBmYWxzZTtcbiAgfVxufTtcbiIsIkFQUC5oZWFkZXJNYiA9IHtcbiAgX2VsOiB7fSxcbiAgX3N1Ykxpbms6IHt9LFxuICBfc3ViSWNvbjoge30sXG4gIF9vdmw6IHt9LFxuXG4gIGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSAkKCcjbWItaGVhZGVyJyk7XG4gICAgdGhpcy5fb3ZsID0gJCgnI21iLW92ZXJsYXknKTtcbiAgICB0aGlzLl9zdWJMaW5rID0gdGhpcy5fZWwuZmluZCgnLmhhcy1zdWInKTtcbiAgICB0aGlzLl9zdWJJY29uID0gdGhpcy5fZWwuZmluZCgnLmljb24tc3ViJyk7XG5cbiAgICB0aGlzLmluaXRFdmVudCgpO1xuICAgIFR3ZWVuTWF4LnNldCh0aGlzLl9lbCwgeyB4OiAtQVBQLl9XIH0pO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHtcbiAgICAvLyBzZWxmLl9vdmwub24oJ2NsaWNrJywgKCkgPT4gQVBQLmhlYWRlci5fYnRuTWIuaGFzQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkgJiYgQVBQLmhlYWRlci5fYnRuTWIudHJpZ2dlcignY2xpY2snKSk7XG4gICAgLy8gc2VsZi5fb3ZsLm9uKCdzY3JvbGwnLCAoZSkgPT4ge1xuICAgIC8vICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIC8vICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcbiAgICAvLyB9KTtcbiAgICB0aGlzLl9zdWJJY29uLm9uKENMSUNLLCB0aGlzLnRvZ2dlbFN1Yk1lbnUpO1xuICB9LFxuXG4gIHRvZ2dlbFVzZXJQYW5lbChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIHRoaXMuX3VzZXJQYW5lbC5oYXNDbGFzcyhDTEFTUy5fYWN0aXZlKSA/IHRoaXMuX3VzZXJQYW5lbC5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKSA6IHRoaXMuX3VzZXJQYW5lbC5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgfSxcblxuICB0b2dnZWxTdWJNZW51KGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgbGV0IGl0ZW0gPSAkKHRoaXMpLFxuICAgICAgICB0b3BJdGVtID0gaXRlbS5jbG9zZXN0KCcudG9wLWl0ZW0nKTtcblxuICAgIHRvcEl0ZW0uaGFzQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkgPyB0b3BJdGVtLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpIDogKEFQUC5oZWFkZXJNYi5jbG9zZVN1Yk1lbnUoKSwgdG9wSXRlbS5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKSk7XG4gIH0sXG5cbiAgY2xvc2VTdWJNZW51KCkge1xuICAgIGxldCBzZWxmID0gQVBQLmhlYWRlck1iO1xuICAgIHNlbGYuX3N1YkxpbmsucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gIH0sXG5cbiAgc2hvdygpIHtcbiAgICB2YXIgc2VsZiA9IHRoaXM7XG4gICAgc2VsZi5fZWwuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgc2VsZi5fb3ZsLmZhZGVJbigpO1xuICAgIFR3ZWVuTWF4LnNldChzZWxmLl9lbCwge1xuICAgICAgZGlzcGxheTogJ2Jsb2NrJyxcbiAgICAgIG9uQ29tcGxldGU6ICgpID0+IChBUFAuX2h0bWwuYWRkQ2xhc3MoQ0xBU1MuX21lbnVBY3RpdmUpLCBUd2Vlbk1heC50byhzZWxmLl9lbCwgMC41LCB7IHg6IDAgfSkpXG4gICAgfSk7XG4gIH0sXG5cbiAgaGlkZSgpIHtcbiAgICB2YXIgc2VsZiA9IHRoaXM7XG4gICAgQVBQLl9ib2R5LmF0dHIoJ3N0eWxlJywgJycpLnJlbW92ZUNsYXNzKENMQVNTLl9vdmxBY3RpdmUpO1xuICAgIHNlbGYuX2VsLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIHNlbGYuX292bC5mYWRlT3V0KCk7XG4gICAgVHdlZW5NYXgudG8oc2VsZi5fZWwsIDAuNSwge1xuICAgICAgeDogLUFQUC5fVyxcbiAgICAgIG9uQ29tcGxldGU6ICgpID0+IChBUFAuX2h0bWwucmVtb3ZlQ2xhc3MoQ0xBU1MuX21lbnVBY3RpdmUpLCBUd2Vlbk1heC5zZXQoc2VsZi5fZWwsIHsgZGlzcGxheTogJ25vbmUnIH0pKVxuICAgIH0pO1xuICB9XG59OyIsIkFQUC5oZWFkZXIgPSB7XG4gIF9lbDoge30sXG4gIF9idG5NYjoge30sXG4gIF91c2VyUGFuZWw6IHt9LFxuICBfYnRuVXNlcjoge30sXG4gIF9ub3RpQ3RyOiB7fSxcblxuICBpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI21haW4taGVhZGVyJyk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fYnRuTWIgPSB0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcuYnRuLW1iJyksXG4gICAgICB0aGlzLl91c2VyUGFuZWwgPSB0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcudXNlci1sb2dnZWQgLndyYXAtcGFuZWwnKSxcbiAgICAgIHRoaXMuX3VzZXJQYW5lbCAmJiAodGhpcy5fYnRuVXNlciA9IHRoaXMuX3VzZXJQYW5lbC5xdWVyeVNlbGVjdG9yKCcuYnRuLWFjdGl2ZScpKSxcbiAgICAgIHRoaXMuX25vdGlDdHIgPSBuZXcgTm90aWZpY2F0aW9uQ3RyKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJy53cmFwLW5vdGknKSksXG4gICAgICB0aGlzLmluaXRFdmVudCgpLFxuICAgICAgQVBQLmhlYWRlck1iLmluaXQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge1xuICAgIHRoaXMuX2J0bk1iLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIHRoaXMuYnRuTWJDbGlja2VkKTtcbiAgICAvLyBBUFAuX2lzTW9iaWxlICYmIHRoaXMuX2J0blVzZXIuYWRkRXZlbnRMaXN0ZW5lcihDTElDSywgZSA9PiB7XG4gICAgdGhpcy5fYnRuVXNlci5sZW5naHQgPiAwICYmIHRoaXMuX2J0blVzZXIuYWRkRXZlbnRMaXN0ZW5lcihDTElDSywgZSA9PiB7XG4gICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICB0aGlzLl9ub3RpQ3RyLmNsb3NlKCk7XG4gICAgICB0aGlzLl91c2VyUGFuZWwuY2xhc3NMaXN0LnRvZ2dsZShDTEFTUy5fYWN0aXZlKTtcbiAgICB9KTtcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKE5PVElfT1BFTiwgKCkgPT4gdGhpcy5fdXNlclBhbmVsLmNsYXNzTGlzdC5jb250YWlucyhDTEFTUy5fYWN0aXZlKSAmJiB0aGlzLl91c2VyUGFuZWwuY2xhc3NMaXN0LnJlbW92ZShDTEFTUy5fYWN0aXZlKSk7XG4gIH0sXG5cbiAgYnRuTWJDbGlja2VkKGUpIHtcbiAgICBsZXQgaGVhZGVyTWIgPSBBUFAuaGVhZGVyTWI7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIHRoaXMuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTLl9hY3RpdmUpID8gKHRoaXMuY2xhc3NMaXN0LnJlbW92ZShDTEFTUy5fYWN0aXZlKSwgaGVhZGVyTWIuaGlkZSgpKSA6ICh0aGlzLmNsYXNzTGlzdC5hZGQoQ0xBU1MuX2FjdGl2ZSksIGhlYWRlck1iLnNob3coKSk7XG4gIH1cbn07IiwiQVBQLnBvcHVwID0ge1xuICBfYWxlcnQ6IHt9LFxuICBfd2FybmluZzoge30sXG4gIF9wYXltZW50OiB7fSxcbiAgX21lZGlhOiB7fSxcbiAgX3VwbG9hZDoge30sXG4gIF9sb2FkaW5nOiB7fSxcbiAgX2lzT3BlbjogZmFsc2UsXG5cbiAgaW5pdCgpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gICAgc2VsZi5fYWxlcnQgPSBuZXcgUG9wdXBBbGVydCgnI3BvcHVwLWFsZXJ0Jyk7XG4gICAgc2VsZi5fd2FybmluZyA9IG5ldyBQb3B1cFdhcm5pbmcoJyNwb3B1cC13YXJuaW5nJyk7XG4gICAgLy8gc2VsZi5fcGF5bWVudCA9IHt9O1xuICAgIHNlbGYuX21lZGlhID0gbmV3IFBvcHVwTWVkaWEoJyNwb3B1cC1tZWRpYScpO1xuICAgIHNlbGYuX3VwbG9hZCA9IG5ldyBQb3B1cFVwbG9hZCgnI3BvcHVwLXVwbG9hZCcpO1xuICAgIHNlbGYuX2xvYWRpbmcgPSBuZXcgUG9wdXBCYXNlKCcjcG9wdXAtbG9hZGluZycpO1xuICB9XG59OyIsIi8qKioqKiBQcm9qZWN0IExpc3QgKioqKiovXG5sZXQgUHJvamVjdExpc3QgPSBmdW5jdGlvbihlbGVtZW50KSB7XG5cbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIGNoeEFsbCA9IGVsLmZpbmQoJy5jaHgtYWxsJyksXG4gICAgICBoZWFkZXIgPSBlbC5maW5kKCdsaCcpLFxuICAgICAgaXRlbXMgPSB7fSxcbiAgICAgIGNoeCA9IHt9LFxuICAgICAgaGRJRCA9IGhlYWRlci5maW5kKCcjaGQtaWQnKSxcblxuICAgICAgYnRuV3JhcCA9IGVsLmZpbmQoJy5idG4td3JhcCcpLFxuICAgICAgYnRuVG9vZ2xlID0gYnRuV3JhcC5maW5kKCcuYnRuLW1vcmUsIC5idG4tYWN0aW9uJyksXG5cbiAgICAgIHJvd0N0ciA9IGVsLmZpbmQoJy5yb3ctY3RyJyksXG4gICAgICBidG5BY3Rpb24gPSByb3dDdHIuZmluZCgnYVtyb2xlPWJ1dHRvbl0nKSxcbiAgICAgIGJ0blBsYXkgPSBlbC5maW5kKCcuYnRuLXBsYXknKSxcbiAgICAgIGJ0blVwbG9hZCA9IGVsLmZpbmQoJy5idG4tdXBsb2FkJyk7XG5cbiAgKCgpID0+IGluaXQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdCgpIHtcbiAgICB1cGRhdGVJdGVtKCk7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVJdGVtKCkge1xuICAgIGl0ZW1zID0gZWwuZmluZCgnLml0ZW06bm90KC5qcy1kaXNhYmxlKScpO1xuICAgIGNoeCA9IGl0ZW1zLmZpbmQoJy5jaHgtcm93Jyk7XG4gICAgaXRlbXMubGVuZ3RoIDwgMiAmJiBjaHhBbGwuaGlkZSgpO1xuICB9XG5cbiAgZnVuY3Rpb24gdXBkYXRlSUQoKSB7XG4gICAgbGV0IGFycmF5SUQgPSBbXTtcbiAgICB1cGRhdGVJdGVtKCk7XG4gICAgY2h4LmZpbHRlcignOmNoZWNrZWQnKS5lYWNoKChfLCBlKSA9PiBhcnJheUlELnB1c2goZS52YWx1ZSkpO1xuICAgIGhkSUQudmFsKGFycmF5SUQpO1xuICB9XG5cbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIGNoeEFsbC5vbihDSEFOR0UsIGNoeEFsbENoYW5nZWQpO1xuICAgIGNoeC5vbihDSEFOR0UsIGNoeENoYW5nZWQpO1xuICAgIGJ0blRvb2dsZS5vbihDTElDSywgYnRuVG9vZ2xlQ2xpY2tlZCk7XG4gICAgYnRuQWN0aW9uLm9uKENMSUNLLCBidG5BY3Rpb25DbGlja2VkKTtcbiAgICBidG5QbGF5Lm9uKENMSUNLLCBidG5QbGF5Q2xpY2tlZCk7XG4gICAgYnRuVXBsb2FkLm9uKENMSUNLLCBidG5VcGxvYWRDbGlja2VkKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGJ0blVwbG9hZENsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBBUFAucG9wdXAuX3VwbG9hZC5zaG93KHRoaXMuZGF0YXNldCk7XG4gIH1cblxuICBmdW5jdGlvbiBidG5QbGF5Q2xpY2tlZChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIEFQUC5wb3B1cC5fbWVkaWEuc2hvdyh0aGlzLmRhdGFzZXQpO1xuICB9XG5cbiAgZnVuY3Rpb24gYWN0aXZlSGVhZGVyKCkge1xuICAgIGxldCBoZWFkZXJXcmFwID0gaGVhZGVyLmZpbmQoJy5idG4td3JhcCcpLFxuICAgICAgICBoZWFkZXJDaHggPSBoZWFkZXJXcmFwLmZpbmQoJ2lucHV0W3R5cGU9Y2hlY2tib3hdJyksXG4gICAgICAgIGFycmF5SUQgPSBbXTtcblxuICAgIGhlYWRlci5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBidG5Ub29nbGUucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgaGVhZGVyQ2h4Lmxlbmd0aCA+IDAgJiYgaGVhZGVyQ2h4LnByb3AoJ2NoZWNrZWQnLCBmYWxzZSk7XG4gICAgY2h4LmZpbHRlcignOmNoZWNrZWQnKS5lYWNoKChfLCBlKSA9PiBhcnJheUlELnB1c2goZS52YWx1ZSkpO1xuICAgIGhkSUQudmFsKGFycmF5SUQpO1xuICB9XG5cbiAgZnVuY3Rpb24gY2h4QWxsQ2hhbmdlZCgpIHtcbiAgICBjaHhBbGwuaXMoJzpjaGVja2VkJykgPyAoY2h4LnByb3AoJ2NoZWNrZWQnLCB0cnVlKSwgaXRlbXMuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSksIGFjdGl2ZUhlYWRlcigpKTpcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAoaGVhZGVyLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpLCBjaHgucHJvcCgnY2hlY2tlZCcsIGZhbHNlKSwgaXRlbXMucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkpO1xuICAgIC8vIGNoeC50cmlnZ2VyKENIQU5HRSk7XG4gIH1cblxuICBmdW5jdGlvbiBjaHhDaGFuZ2VkKCkge1xuICAgIGxldCBpbnB1dCA9ICQodGhpcyksXG4gICAgICAgIGl0ZW0gPSBpbnB1dC5wYXJlbnRzKCdsaScpLFxuICAgICAgICBjaGVja2VkID0gY2h4LmZpbHRlcignOmNoZWNrZWQnKS5sZW5ndGg7O1xuXG4gICAgJCh0aGlzKS5pcygnOmNoZWNrZWQnKSA/IGl0ZW0uYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkgOiAoaXRlbS5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKSwgY2h4QWxsLnByb3AoJ2NoZWNrZWQnLCBmYWxzZSkpO1xuICAgIGNoZWNrZWQgPiAxID8gYWN0aXZlSGVhZGVyKCkgOiBoZWFkZXIucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gIH1cblxuICBmdW5jdGlvbiBidG5Ub29nbGVDbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgbGV0IGJ0biA9ICQodGhpcyk7XG4gICAgYnRuLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpID8gYnRuLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpIDogKGJ0bi5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKSwgYnRuLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGJ0bkFjdGlvbkNsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBsZXQgYnRuID0gJCh0aGlzKSxcbiAgICAgICAgZm9ybSA9IGJ0bi5wYXJlbnRzKCdmb3JtJyk7XG5cbiAgICBzdWJtaXQoZm9ybSwgYnRuLmRhdGEoJ2FjdGlvbicpKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHN1Ym1pdChmb3JtLCBhY3Rpb24pIHtcbiAgICBsZXQgdXJsID0gZm9ybS5kYXRhKCd1cmwnKSxcbiAgICAgICAgZGF0YSA9IGZvcm0uc2VyaWFsaXplQXJyYXkoKSxcbiAgICAgICAgd3JhcCA9IGZvcm0ucGFyZW50cygnLmJ0bi13cmFwJyk7XG5cbiAgICBkYXRhLnB1c2goe1xuICAgICAgbmFtZTogJ2FjdGlvbicsXG4gICAgICB2YWx1ZTogYWN0aW9uXG4gICAgfSk7XG4gICAgLy8gY29uc29sZS5sb2coZGF0YSk7XG5cdFx0QVBQLnBvcHVwLl9sb2FkaW5nLnNob3coKTtcblx0XHQkLmFqYXgoe1xuXHRcdFx0dHlwZTogQVBQLl9zdWJtaXRNZXRob2QsXG5cdFx0XHR1cmw6IHVybCxcblx0XHRcdGRhdGE6IGRhdGEsXG5cdFx0XHRoZWFkZXJzOiBBUFAuX2hlYWRlcnMsXG5cdFx0XHRzdWNjZXNzOiBkYXRhID0+IHtcblx0XHRcdFx0bGV0IHN0YXR1cyA9IHBhcnNlSW50KGRhdGEuc3RhdHVzKSxcbiAgICAgICAgICAgIHRpdGxlID0gZGF0YS50aXRsZSxcbiAgICAgICAgICAgIG1lc3NhZ2UgPSBkYXRhLm1lc3NhZ2UsXG5cdFx0XHRcdFx0XHRodG1sID0gZGF0YS5odG1sO1xuXG5cdFx0XHRcdEFQUC5wb3B1cC5fbG9hZGluZy5oaWRlKCk7XG4gICAgICAgIC8vIGNvbnNvbGUubG9nKHN0YXR1cyk7XG5cdFx0XHRcdHN3aXRjaChzdGF0dXMpIHtcblx0XHRcdFx0XHRjYXNlIDA6IHtcbiAgICAgICAgICAgIEFQUC5wb3B1cC5fYWxlcnQudXBkYXRlKHRpdGxlLCBtZXNzYWdlKTtcblx0XHRcdFx0XHRcdEFQUC5wb3B1cC5fYWxlcnQuc2hvdygpO1xuXHRcdFx0XHRcdH0gYnJlYWs7XG5cdFx0XHRcdFx0Y2FzZSAxOiB7XG4gICAgICAgICAgICBsZXQgaXRlbSA9IHdyYXAucGFyZW50cygnLml0ZW0nKSxcbiAgICAgICAgICAgICAgICBpdGVtQ2h4ID0gaXRlbS5maW5kKCcuY2h4LXJvdycpO1xuXG4gICAgICAgICAgICBpdGVtLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpLmFkZENsYXNzKENMQVNTLl9kaXNhYmxlKTtcbiAgICAgICAgICAgIGl0ZW1DaHggJiYgaXRlbUNoeC5wcm9wKCdjaGVja2VkJywgZmFsc2UpO1xuICAgICAgICAgICAgKGhlYWRlciAmJiBoZWFkZXIuaGFzQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkpICYmIHVwZGF0ZUlEKCk7XG4gICAgICAgICAgICBodG1sLmluY2x1ZGVzKCdibHVlJykgJiYgaXRlbS5maW5kKCcuJyArIENMQVNTLl9kaXNhYmxlKS5yZW1vdmVDbGFzcyhDTEFTUy5fZGlzYWJsZSk7XG4gICAgICAgICAgICB3cmFwLmh0bWwoaHRtbCk7XG4gICAgICAgICAgICB1cGRhdGVJdGVtKCk7XG5cdFx0XHRcdFx0fSBicmVhaztcblx0XHRcdFx0XHRjYXNlIDI6IHtcbiAgICAgICAgICAgIGl0ZW1zLmZpbHRlcignLicgKyBDTEFTUy5fYWN0aXZlKS5lYWNoKChfLCBlKSA9PiB7XG4gICAgICAgICAgICAgIGxldCBpdGVtID0gJChlKSxcbiAgICAgICAgICAgICAgICAgIGl0ZW1DaHggPSBpdGVtLmZpbmQoJy5jaHgtcm93JyksXG4gICAgICAgICAgICAgICAgICBpdGVtV3JhcCA9IGl0ZW0uZmluZCgnLmJ0bi13cmFwJyk7XG5cbiAgICAgICAgICAgICAgaXRlbS5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKS5hZGRDbGFzcyhDTEFTUy5fZGlzYWJsZSk7XG4gICAgICAgICAgICAgIGl0ZW1DaHgucHJvcCgnY2hlY2tlZCcsIGZhbHNlKTtcbiAgICAgICAgICAgICAgaHRtbC5pbmNsdWRlcygnYmx1ZScpICYmIGl0ZW0uZmluZCgnLicgKyBDTEFTUy5fZGlzYWJsZSkucmVtb3ZlQ2xhc3MoQ0xBU1MuX2Rpc2FibGUpO1xuICAgICAgICAgICAgICBpdGVtV3JhcC5odG1sKGh0bWwpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB1cGRhdGVJdGVtKCk7XG4gICAgICAgICAgICBoZWFkZXIucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgICAgICAgICBjaHhBbGwuaXMoJzpjaGVja2VkJykgJiYgY2h4QWxsLnByb3AoJ2NoZWNrZWQnLCBmYWxzZSk7XG5cdFx0XHRcdFx0fSBicmVhaztcblx0XHRcdFx0fVxuXHRcdFx0fVxuXHRcdH0pO1xuXHR9XG5cblx0cmV0dXJuIHRoaXM7XG59OyIsIi8qKioqKiBTaWdudXAgUG9wdXAgJiBGb3JtICoqKioqL1xubGV0IFNpZ25VcFBvcHVwID0gZnVuY3Rpb24oZWxlbWVudCkge1xuXG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBhc2lkZVdyYXAgPSBlbC5maW5kKCcuYXNpZGUnKSxcbiAgICAgIHF1ZXN0TGlzdCA9IGVsLmZpbmQoJy5xdWVzdC1saXN0JyksXG4gICAgICBhamF4VVJMID0gcXVlc3RMaXN0LmRhdGEoJ3VybCcpLFxuXG4gICAgICBudW1TbGlkZXIgPSBuZXcgU2xpZGVyKGVsLmZpbmQoJy5hc2lkZS1zbGlkZXInKSksXG4gICAgICBxdWVzdGlvbnMgPSBlbC5maW5kKCcucXVlc3Qtd3JhcCA+IC5pdGVtJyksXG4gICAgICBjdXJyZW50UXVlc3Rpb24gPSB7fSxcbiAgICAgIGN1cnJlbnRJbmRleCA9IDAsXG4gICAgICB0b3RhbFF1ZXN0ID0gMCxcbiAgICAgIGVEb25lID0gJ1FVRVNUSU9OX0FOSU1BVElPTl9ET05FJyxcbiAgICAgIGVOZXh0ID0gJ1FVRVNUSU9OX0FOSU1BVElPTl9ORVhUJyxcbiAgICAgIHF1ZXN0QXJyYXkgPSBbXSxcblxuICAgICAgcHJvV3JhcCA9IGVsLmZpbmQoJy5wcm9ncmVzcy1jdHInKSxcbiAgICAgIHByb0JhciA9IHByb1dyYXAuZmluZCgnaScpLFxuICAgICAgcHJvTnVtID0gcHJvV3JhcC5maW5kKCcucHJvZ3Jlc3MtbnVtJyksXG4gICAgICBidG5QcmV2UXVlc3QgPSBwcm9XcmFwLmZpbmQoJy5idG4tcHJldicpLFxuICAgICAgYnRuTmV4dFF1ZXN0ID0gcHJvV3JhcC5maW5kKCcuYnRuLW5leHQnKSxcblxuICAgICAgdXBsb2FkSW1nID0gZWwuZmluZCgnLnVwbG9hZC1pbWcnKSxcbiAgICAgIGZpbGVMaXN0Q3RyID0gZWwuZmluZCgnLnVwbG9hZC1maWxlJyksXG5cbiAgICAgIHdlbFNjciA9IGVsLmZpbmQoJy53ZWwtc2NyJyksXG4gICAgICBidG5XZWwgPSB3ZWxTY3IuZmluZCgnLmN0YScpLFxuICAgICAgd2VsQWN0aXZlID0gZmFsc2UsXG5cbiAgICAgIGZpblNjciA9IGVsLmZpbmQoJy5maW4tc2NyJyksXG4gICAgICBidG5GaW4gPSBmaW5TY3IuZmluZCgnLmN0YScpLFxuICAgICAgZmluQWN0aXZlID0gZmFsc2UsXG4gICAgICBzb2NpYWxDaHggPSBlbC5maW5kKCcuanMtc29jaWFsLWNoeCcpO1xuXG5cbiAgKCgpID0+IGluaXQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdCgpIHtcbiAgICB1cGxvYWRJbWcgPSAodXBsb2FkSW1nLmxlbmd0aCA+IDApID8gKG5ldyBVcGxvYWRJbWcodXBsb2FkSW1nKSkgOiBudWxsO1xuICAgIGZpbGVMaXN0Q3RyID0gKGZpbGVMaXN0Q3RyLmxlbmd0aCA+IDApID8gKG5ldyBGaWxlTGlzdEN0cihmaWxlTGlzdEN0cikpIDogbnVsbDtcbiAgICBpbml0UXVlc3QoKTtcbiAgICBpbml0U2NyKCk7XG4gIH1cblxuICB0aGlzLmdvVG8gPSBpID0+IGN1cnJlbnRRdWVzdGlvbi5nb091dE5leHQoaSk7XG4gIHRoaXMuc2hvdyA9ICgpID0+IHNob3dGb3JtKCk7XG4gIHRoaXMuaGlkZSA9ICgpID0+IGhpZGVGb3JtKCk7XG4gIHRoaXMudXBkYXRlU2l6ZSA9ICgpID0+IGVsLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpIHx8IChUd2Vlbk1heC5zZXQoYXNpZGVXcmFwLCB7IHg6IC1hc2lkZVdyYXAud2lkdGgoKSB9KSwgVHdlZW5NYXguc2V0KHF1ZXN0TGlzdCwgeyB4OiBBUFAuX1cgfSkpO1xuXG4gIGZ1bmN0aW9uIGluaXRRdWVzdCgpIHtcbiAgICBxdWVzdGlvbnMuZWFjaCgoaSwgZSkgPT4gcXVlc3RBcnJheVtpXSA9IG5ldyBTaWduVXBRdWVzdGlvbihlLCBlTmV4dCwgZURvbmUpKTtcbiAgICB0b3RhbFF1ZXN0ID0gcXVlc3RBcnJheS5sZW5ndGg7XG4gICAgY3VycmVudFF1ZXN0aW9uID0gcXVlc3RBcnJheVtjdXJyZW50SW5kZXhdO1xuICAgIGN1cnJlbnRRdWVzdGlvbi5nb0luVmlldygpO1xuICB9XG5cbiAgZnVuY3Rpb24gaW5pdFNjcigpIHtcbiAgICBUd2Vlbk1heC5zZXQoZWwsIHtcbiAgICAgIHNjYWxlOiAwLjc1LFxuICAgICAgYXV0b0FscGhhOiAwXG5cdFx0fSk7XG5cbiAgICBmaW5TY3IuaGlkZSgpLmZpbmQoJy5iYW5uZXIgPiAqJykuZWFjaCgoXywgZSkgPT4gVHdlZW5NYXguc2V0KGUsIHtcbiAgICAgIHk6IC01MCxcbiAgICAgIGF1dG9BbHBoYTogMFxuXHRcdH0pKTtcblxuICAgIFR3ZWVuTWF4LnNldChhc2lkZVdyYXAsIHsgeDogLWFzaWRlV3JhcC53aWR0aCgpIH0pO1xuICAgIFR3ZWVuTWF4LnNldChxdWVzdExpc3QsIHsgeDogQVBQLl9XIH0pO1xuICB9XG5cbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIGJ0bldlbC5vbihDTElDSywgZW50ZXJRdWVzdCk7XG4gICAgYnRuRmluLm9uKENMSUNLLCBoaWRlRm9ybSk7XG4gICAgYnRuUHJldlF1ZXN0Lm9uKENMSUNLLCBidG5QcmV2UXVlc3RDbGlja2VkKTtcbiAgICBidG5OZXh0UXVlc3Qub24oQ0xJQ0ssIGJ0bk5leHRRdWVzdENsaWNrZWQpO1xuICAgIHNvY2lhbENoeC5vbihDSEFOR0UsIHVwZGF0ZVNvY2lhbElucHV0KTtcblxuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoS0VZRE9XTiwgY2hlY2tFbnRlcktleSk7XG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihlTmV4dCwgZSA9PiByZXF1ZXN0TmV4dFF1ZXN0KGUuZGV0YWlsLnRhcmdldCkpO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoZURvbmUsIGUgPT4gZ29OZXh0UXVlc3QoZS5kZXRhaWwudGFyZ2V0KSk7XG4gIH1cblxuICBmdW5jdGlvbiBjYW5jZWxFdmVudCgpIHtcbiAgICBidG5XZWwub2ZmKENMSUNLLCBlbnRlclF1ZXN0KTtcbiAgICBidG5GaW4ub2ZmKENMSUNLLCBoaWRlRm9ybSk7XG4gICAgYnRuUHJldlF1ZXN0Lm9mZihDTElDSywgYnRuUHJldlF1ZXN0Q2xpY2tlZCk7XG4gICAgYnRuTmV4dFF1ZXN0Lm9mZihDTElDSywgYnRuTmV4dFF1ZXN0Q2xpY2tlZCk7XG4gICAgc29jaWFsQ2h4Lm9mZihDSEFOR0UsIHVwZGF0ZVNvY2lhbElucHV0KTtcblxuICAgIGRvY3VtZW50LnJlbW92ZUV2ZW50TGlzdGVuZXIoS0VZRE9XTiwgY2hlY2tFbnRlcktleSk7XG4gICAgZG9jdW1lbnQucmVtb3ZlRXZlbnRMaXN0ZW5lcihlTmV4dCwgZSA9PiByZXF1ZXN0TmV4dFF1ZXN0KGUuZGV0YWlsLnRhcmdldCkpO1xuICAgIGRvY3VtZW50LnJlbW92ZUV2ZW50TGlzdGVuZXIoZURvbmUsIGUgPT4gZ29OZXh0UXVlc3QoZS5kZXRhaWwudGFyZ2V0KSk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVTb2NpYWxJbnB1dCgpIHtcbiAgICBsZXQgaW5wdXQgPSAkKHRoaXMpLFxuICAgICAgICB2YWwgPSBpbnB1dC52YWwoKSxcbiAgICAgICAgdGFyZ2V0SW5kZXggPSBjdXJyZW50SW5kZXggKyAxO1xuICAgIGlucHV0LmlzKCc6Y2hlY2tlZCcpID8gcXVlc3RBcnJheVt0YXJnZXRJbmRleF0uc2hvd1NvY2lhbElucHV0KHZhbCkgOiBxdWVzdEFycmF5W3RhcmdldEluZGV4XS5oaWRlU29jaWFsSW5wdXQodmFsKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGJ0blByZXZRdWVzdENsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICByZXF1ZXN0UHJldlF1ZXN0KGN1cnJlbnRJbmRleCk7XG4gIH1cblxuICBmdW5jdGlvbiBidG5OZXh0UXVlc3RDbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgY3VycmVudFF1ZXN0aW9uLnN1Ym1pdCgpO1xuICB9XG5cblxuICBmdW5jdGlvbiBzaG93Rm9ybSgpIHtcbiAgICB3ZWxBY3RpdmUgPSB0cnVlO1xuICAgIFR3ZWVuTWF4LnRvKGVsLCAwLjc1LCB7XG4gICAgICBzY2FsZTogMSxcbiAgICAgIGF1dG9BbHBoYTogMSxcbiAgICAgIGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZVxuXHRcdH0pO1xuICAgIGluaXRFdmVudCgpO1xuICB9XG5cbiAgZnVuY3Rpb24gaGlkZUZvcm0oZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBUd2Vlbk1heC50byhlbCwgMC43NSwge1xuICAgICAgc2NhbGU6IDAuNzUsXG4gICAgICBhdXRvQWxwaGE6IDAsXG4gICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWUsXG4gICAgICBvbkNvbXBsZXRlOiByZXNldEZvcm1cblx0XHR9KTtcbiAgICBjYW5jZWxFdmVudCgpO1xuICB9XG5cbiAgZnVuY3Rpb24gcmVzZXRGb3JtKCkge1xuICAgIGZpblNjci5oaWRlKCk7XG4gICAgd2VsU2NyLmZpbmQoJy5iYW5uZXIgPiAqJykuZWFjaCgoXywgZSkgPT4gVHdlZW5NYXguc2V0KGUsIHtcbiAgICAgIHk6IDAsXG4gICAgICBhdXRvQWxwaGE6IDFcblx0XHR9KSk7XG4gICAgbnVtU2xpZGVyLmdvVG8oMCk7XG4gICAgcXVlc3RBcnJheVswXS5nb0luVmlldygpO1xuICAgIHVwZGF0ZVByb2dyZXNzKDApO1xuICAgIGN1cnJlbnRJbmRleCA9IDA7XG4gIH1cblxuICBmdW5jdGlvbiBlbnRlclF1ZXN0KGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgbGV0IHN1YkVsID0gd2VsU2NyLmZpbmQoJy5iYW5uZXIgPiAqJyksXG4gICAgICAgIGRlbGF5ID0gMC4yNTtcblxuICAgIHdlbEFjdGl2ZSA9IGZhbHNlO1xuICAgIHN1YkVsLmVhY2goKGksIGUpID0+IFR3ZWVuTWF4LnRvKGUsIDAuNSwge1xuICAgICAgeTogLTUwLFxuICAgICAgYXV0b0FscGhhOiAwLFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZSxcbiAgICAgIGRlbGF5OiBkZWxheSAqIGksXG4gICAgICBvbkNvbXBsZXRlOiBzdWJFbC5sZW5ndGggPT09IChpICsgMSkgJiYgd2VsQW5pbWF0ZWREb25lXG5cdFx0fSkpO1xuICAgIC8vXG4gICAgLy8gcXVlc3RBcnJheVsxM10uZ29JblZpZXcoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHdlbEFuaW1hdGVkRG9uZSgpIHtcbiAgICBlbC5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBUd2Vlbk1heC50byhhc2lkZVdyYXAsIDAuNSwge1xuICAgICAgeDogMCxcbiAgICAgIGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZSxcbiAgICAgIGRlbGF5OiAwLjI1XG5cdFx0fSk7XG5cbiAgICBUd2Vlbk1heC50byhxdWVzdExpc3QsIDAuNzUsIHtcbiAgICAgIHg6IDAsXG4gICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWUsXG4gICAgICBkZWxheTogMC4yNVxuXHRcdH0pO1xuICB9XG5cbiAgZnVuY3Rpb24gb3V0UXVlc3QoKSB7XG4gICAgVHdlZW5NYXgudG8oYXNpZGVXcmFwLCAwLjUsIHtcbiAgICAgIHg6IC1hc2lkZVdyYXAud2lkdGgoKSxcbiAgICAgIGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZVxuXHRcdH0pO1xuXG4gICAgVHdlZW5NYXgudG8ocXVlc3RMaXN0LCAwLjc1LCB7XG4gICAgICB4OiBBUFAuX1csXG4gICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcblx0XHRcdGZvcmNlM0Q6IHRydWUsXG4gICAgICBvbkNvbXBsZXRlOiBmaW5BbmltYXRlZERvbmVcblx0XHR9KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGZpbkFuaW1hdGVkRG9uZSgpIHtcbiAgICBsZXQgZGVsYXkgPSAwLjI1O1xuICAgIGVsLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIGZpblNjci5zaG93KCkuZmluZCgnLmJhbm5lciA+IConKS5lYWNoKChpLCBlKSA9PiBUd2Vlbk1heC50byhlLCAwLjc1LCB7XG4gICAgICB5OiAwLFxuICAgICAgYXV0b0FscGhhOiAxLFxuICAgICAgZm9yY2UzRDogdHJ1ZSxcbiAgICAgIGRlbGF5OiBkZWxheSAqIGksXG4gICAgICBvbkNvbXBsZXRlOiAoKSA9PiB7XG4gICAgICAgIGZpbkFjdGl2ZSA9IHRydWU7XG4gICAgICB9XG5cdFx0fSkpO1xuICB9XG5cbiAgZnVuY3Rpb24gY2hlY2tFbnRlcktleShlKSB7XG4gICAgbGV0IGtleSA9IGUud2hpY2g7XG4gICAga2V5ID09PSAxMyAmJiAoZS5wcmV2ZW50RGVmYXVsdCgpLCB3ZWxBY3RpdmUgPyBidG5XZWwuY2xpY2soKSA6IChjdXJyZW50UXVlc3Rpb24gPyBjdXJyZW50UXVlc3Rpb24uc3VibWl0KCkgOiBmaW5BY3RpdmUgJiYgYnRuRmluLmNsaWNrKCkpKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHJlcXVlc3RQcmV2UXVlc3QoaSkge1xuICAgIGlmIChpID09PSAwKSByZXR1cm4gZmFsc2U7XG4gICAgcXVlc3RBcnJheVtpXS5nb091dE5leHQoLTEpO1xuICAgIG51bVNsaWRlci5nb1RvKGkgLSAxKTtcbiAgICBjdXJyZW50UXVlc3Rpb24gPSBudWxsO1xuICB9XG5cbiAgZnVuY3Rpb24gcmVxdWVzdE5leHRRdWVzdChpKSB7XG4gICAgcXVlc3RBcnJheVtpXS5nb091dE5leHQoMSk7XG4gICAgbnVtU2xpZGVyLmdvVG8oaSArIDEpO1xuICAgIGN1cnJlbnRRdWVzdGlvbiA9IG51bGw7XG4gIH1cblxuICBmdW5jdGlvbiBnb05leHRRdWVzdChpKSB7XG4gICAgKGkgPT09IHRvdGFsUXVlc3QpID8gc3VibWl0UXVlc3QoKSA6IHVwZGF0ZUluZGV4KGkpO1xuICB9XG5cbiAgZnVuY3Rpb24gc3VibWl0UXVlc3QoKSB7XG4gICAgQVBQLnBvcHVwLl9sb2FkaW5nLnNob3coKTtcbiAgICAvLyBjb25zb2xlLmxvZyhnZXREYXRhKCkpOyByZXR1cm47XG4gICAgJC5hamF4KHtcblx0XHRcdHR5cGU6IEFQUC5fc3VibWl0TWV0aG9kLFxuXHRcdFx0dXJsOiBhamF4VVJMLFxuXHRcdFx0ZGF0YTogZ2V0RGF0YSgpLFxuICAgICAgaGVhZGVyczogQVBQLl9oZWFkZXJzLFxuXHRcdFx0c3VjY2VzczogZGF0YSA9PiB7XG5cdFx0XHRcdGxldCBzdGF0dXMgPSBwYXJzZUludChkYXRhLnN0YXR1cyksXG5cdFx0XHRcdFx0XHR0aXRsZSA9IGRhdGEudGl0bGUsXG5cdFx0XHRcdFx0XHRtZXNzYWdlID0gZGF0YS5tZXNzYWdlO1xuXG5cdFx0XHRcdEFQUC5wb3B1cC5fbG9hZGluZy5oaWRlKCk7XG5cdFx0XHRcdHN3aXRjaChzdGF0dXMpIHtcblx0XHRcdFx0XHRjYXNlIDA6IG91dFF1ZXN0KCk7IGJyZWFrO1xuXHRcdFx0XHRcdGNhc2UgMTogb3V0UXVlc3QoKTsgYnJlYWs7XG5cdFx0XHRcdH1cblx0XHRcdH1cblx0XHR9KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGdldERhdGEoKSB7XG4gICAgLy8gY29uc29sZS5sb2coQVBQLmlzRnVuYyh1cGxvYWRJbWcuZ2V0SW1nKSk7XG4gICAgbGV0IGRhdGEgPSBxdWVzdExpc3Quc2VyaWFsaXplQXJyYXkoKSxcbiAgICAgICAgaW1nID0gdXBsb2FkSW1nID8gdXBsb2FkSW1nLmdldEltZygpIDogbnVsbCxcbiAgICAgICAgZmlsZXMgPSBmaWxlTGlzdEN0ciA/IGZpbGVMaXN0Q3RyLmdldEZpbGVMaXN0KCkgOiBbXTtcblxuICAgIC8vIGNvbnNvbGUubG9nKEFQUC5pc0Z1bmModXBsb2FkSW1nLmdldEltZygpKSk7XG4gICAgaW1nICYmIGRhdGEucHVzaCh7XG4gICAgICBuYW1lOiAnc2lnbnVwW3Byb2ZpbGUtcGljdHVyZV0nLFxuICAgICAgdmFsdWU6IGltZ1xuICAgIH0pO1xuXG4gICAgZmlsZXMubGVuZ3RoICYmIGZpbGVzLmZvckVhY2goKGUsIGkpID0+IGRhdGEucHVzaCh7XG4gICAgICBuYW1lOiBgc2lnbnVwW3VwbG9hZC1wcm9maWxlXVske2l9XWAsXG4gICAgICB2YWx1ZTogZVxuICAgIH0pKTtcbiAgICByZXR1cm4gZGF0YTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZUluZGV4KGkpIHtcbiAgICBjdXJyZW50SW5kZXggPSBpO1xuICAgIHF1ZXN0QXJyYXlbaV0uZ29JblZpZXcoKTtcbiAgICBjdXJyZW50UXVlc3Rpb24gPSBxdWVzdEFycmF5W2ldO1xuICAgIHVwZGF0ZVByb2dyZXNzKE1hdGgucm91bmQoKGN1cnJlbnRJbmRleCAvIHRvdGFsUXVlc3QpICogMTAwKSk7XG4gICAgLy8gY3VycmVudEluZGV4ID09PSAwID8gYnRuUHJldlF1ZXN0LmhpZGUoKSA6IGN1cnJlbnRJbmRleCA9PT0gKHRvdGFsUXVlc3QgLSAxKSA/IGJ0bk5leHRRdWVzdC5oaWRlKCkgOiAoYnRuUHJldlF1ZXN0LnNob3coKSwgYnRuTmV4dFF1ZXN0LnNob3coKSk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVQcm9ncmVzcyhpKSB7XG4gICAgcHJvTnVtLnRleHQoaSk7XG4gICAgcHJvQmFyLndpZHRoKGkgKyAnJScpO1xuICB9XG5cblx0cmV0dXJuIHRoaXM7XG59OyIsIi8qKioqKiBTaWduVXBRdWVzdGlvbiAtIEVhY2ggcXVlc3Rpb24gYXMgYSBtaW5pIGZvcm0gKioqKiovXG5sZXQgU2lnblVwUXVlc3Rpb24gPSBmdW5jdGlvbihlbGVtZW50LCBlTmV4dCwgZURvbmUpIHtcblxuXHRsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgaW5kZXggPSBwYXJzZUludChlbC5kYXRhKCdpbmRleCcpKSxcbiAgICAgIHJxU3ZDaGVjayA9IGVsLmhhc0NsYXNzKENMQVNTLl9ycVN2KSxcbiAgICAgIGFqYXhVUkwgPSBycVN2Q2hlY2sgPyBlbC5kYXRhKCd1cmwnKSA6IG51bGwsXG4gICAgICBwYXNzU3YgPSBmYWxzZSxcblxuICAgICAgc2NyaXB0VGFnID0gZWwuZmluZCgnc2NyaXB0JyksXG4gICAgICBzdWJFbCA9IHt9LFxuXHRcdFx0aW5wdXRzID0gZWwuZmluZCgnaW5wdXRbdHlwZT10ZXh0XSwgaW5wdXRbdHlwZT1wYXNzd29yZF0sIGlucHV0W3R5cGU9ZW1haWxdLCBpbnB1dFt0eXBlPXRlbF0nKSxcblx0XHRcdGlucHV0UnEgPSBlbC5maW5kKCcuJyArIENMQVNTLl9yZXF1aXJlKSxcbiAgICAgIGlucHV0RW0gPSBlbC5maW5kKCcuJyArIENMQVNTLl9lbWFpbCksXG4gICAgICBpbnB1dE1pbiA9IGVsLmZpbmQoJy4nICsgQ0xBU1MuX21pbiksXG4gICAgICBpbnB1dE1heCA9IGVsLmZpbmQoJy4nICsgQ0xBU1MuX21heCksXG5cbiAgICAgIGlucHV0U2VsID0gZWwuZmluZCgnLmlucHV0LXNlbCcpLFxuICAgICAgY2hrQWxsID0gZWwuZmluZCgnLmNoeC1hbGwnKSxcbiAgICAgIHJhZFdyYXAgPSBlbC5maW5kKCcucmFkLXdyYXAnKSxcbiAgICAgIGlucHV0Q2h4ID0gcmFkV3JhcC5maW5kKCdpbnB1dFt0eXBlPXJhZGlvXSwgaW5wdXRbdHlwZT1jaGVja2JveF0nKSxcbiAgICAgIGJ0bk5leHQgPSBlbC5maW5kKCcuY3RhJyksXG4gICAgICBqc051bSA9IGVsLmZpbmQoJy5qcy1udW0nKSxcbiAgICAgIGpzRGF0ZSA9IGVsLmZpbmQoJy5qcy1kYXRlJyksXG4gICAgICBzZWxBcnJheSA9IFtdLFxuICAgICAgaXBEYXRlID0gW10sXG4gICAgICBidG5BY3RpdmUgPSB0cnVlLFxuXG5cdFx0XHR0eHRScSA9ICdyZXF1aXJlZC10eHQnLFxuICAgICAgdHh0TWluID0gJ21pbi10eHQnLFxuXHRcdFx0dHh0TWF4ID0gJ21heC10eHQnLFxuXHRcdFx0dHh0RW0gPSAnZW1haWwtdHh0JyxcbiAgICAgIG5leHRFdmVudCA9IG5ldyBDdXN0b21FdmVudChlTmV4dCwgeyBidWJibGVzOiB0cnVlLCBkZXRhaWw6IHsgdGFyZ2V0OiBpbmRleCB9fSksXG4gICAgICBkb25lRXZlbnQgPSBuZXcgQ3VzdG9tRXZlbnQoZURvbmUsIHsgYnViYmxlczogdHJ1ZSwgZGV0YWlsOiB7IHRhcmdldDogMCB9fSk7XG5cblx0KCgpID0+IHtcbiAgICBlbC5oaWRlKCk7XG4gICAgc2NyaXB0VGFnLmxlbmd0aCA+IDAgJiYgc2NyaXB0VGFnLnJlbW92ZSgpO1xuICAgIGlucHV0U2VsLmxlbmd0aCA+IDAgJiYgaW5wdXRTZWwuZWFjaCgoaSwgZSkgPT4gc2VsQXJyYXlbaV0gPSBuZXcgSW5wdXRTZWxlY3Rpb24oZSkpO1xuICAgIHJhZFdyYXAubGVuZ3RoID4gMCAmJiAoYnRuTmV4dC5oaWRlKCksIGJ0bkFjdGl2ZSA9IGZhbHNlKTtcbiAgICBqc0RhdGUubGVuZ3RoID4gMCAmJiBqc0RhdGUuZWFjaCgoaSwgZSkgPT4gaXBEYXRlW2ldID0gbmV3IElucHV0RGF0ZShlKSk7XG4gICAgZ2V0U3ViRWwoKTtcblx0XHRpbml0RXZlbnQoKTtcblx0fSkoKTtcblxuICB0aGlzLmdvSW5WaWV3ID0gKCkgPT4gZ29JbigpO1xuICB0aGlzLmdvT3V0TmV4dCA9IGkgPT4gZ29PdXQoaSk7XG4gIHRoaXMuc3VibWl0ID0gKCkgPT4gY2hlY2tJbnB1dCgpO1xuICB0aGlzLmhpZGVTb2NpYWxJbnB1dCA9IGkgPT4gaGlkZVNvY2lhbChpKTtcbiAgdGhpcy5zaG93U29jaWFsSW5wdXQgPSBpID0+IHNob3dTb2NpYWwoaSk7XG5cblx0ZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuXHRcdGlucHV0cy5sZW5ndGggPiAwICYmIGlucHV0cy5vbihGX0lOLCBhY3RpdmVXcmFwKS5vbihGX09VVCwgZGVhY3RpdmVXcmFwKTtcblx0XHRpbnB1dFJxLmxlbmd0aCA+IDAgJiYgaW5wdXRScS5vbihGX0lOLCBpbnB1dEZvY3VzKTtcbiAgICBjaGtBbGwubGVuZ3RoID4gMCAmJiBjaGtBbGwub24oQ0hBTkdFLCBjaGVja2VkQWxsKTtcbiAgICBpbnB1dENoeC5sZW5ndGggPiAwICYmIGlucHV0Q2h4Lm9uKENIQU5HRSwgY2hlY2tlZE9uZSk7XG4gICAganNOdW0ubGVuZ3RoID4gMCAmJiBqc051bS5vbihJTlBVVCwgZmlsdGVyTnVtYmVyKTtcbiAgICBidG5OZXh0Lm9uKENMSUNLLCBuZXh0Q2xpY2tlZCk7XG5cdH1cblxuICBmdW5jdGlvbiBnZXRTdWJFbCgpIHtcbiAgICBzdWJFbCA9IGVsLmZpbmQoJz4gLmhlYWRpbmcsIC5tYi13cmFwID4gKicpO1xuICB9XG5cbiAgZnVuY3Rpb24gZ2V0RmlsdGVyZWRTdWJFbCgpIHtcbiAgICBzdWJFbCA9IGVsLmZpbmQoJz4gLmhlYWRpbmcsIC5tYi13cmFwID4gKicpLm5vdCgnLmpzLWhpZGUnKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGNoZWNrZWRBbGwoKSB7XG4gICAgbGV0IGl0ZW0gPSAkKHRoaXMpLFxuICAgICAgICByZWxhdGVkQ2h4ID0gaXRlbS5wYXJlbnRzKCcuY2h4LXdyYXAnKS5uZXh0KCcucmFkLXdyYXAnKS5maW5kKCdpbnB1dFt0eXBlPWNoZWNrYm94XScpO1xuXG4gICAgaXRlbS5wcm9wKCdjaGVja2VkJykgPyByZWxhdGVkQ2h4LnByb3AoJ2NoZWNrZWQnLCB0cnVlKSA6IHJlbGF0ZWRDaHgucHJvcCgnY2hlY2tlZCcsIGZhbHNlKTtcbiAgICByZWxhdGVkQ2h4LnRyaWdnZXIoQ0hBTkdFKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGNoZWNrZWRPbmUoKSB7XG4gICAgbGV0IGlucHV0ID0gJCh0aGlzKSxcbiAgICAgICAgdGFyZ2V0ID0gKGlucHV0Lmhhc0NsYXNzKENMQVNTLl9lbmFFbCwgQ0xBU1MuX2Rpc0VsKSB8fCBpbnB1dC5oYXNDbGFzcyhDTEFTUy5fZGlzRWwpKSA/IGVsLmZpbmQoaW5wdXQuZGF0YSgndGFyZ2V0JykpIDogbnVsbDtcbiAgICAvLyBjb25zb2xlLmxvZyhpbnB1dC5oYXNDbGFzcyhDTEFTUy5fZW5hRWwpKTtcbiAgICBpbnB1dC5oYXNDbGFzcyhDTEFTUy5fZW5hRWwpID8gKGlucHV0LnByb3AoJ2NoZWNrZWQnKSA/IHRhcmdldC5yZW1vdmVDbGFzcyhDTEFTUy5faGlkZSkgOiB0YXJnZXQuYWRkQ2xhc3MoQ0xBU1MuX2hpZGUpKSA6IChpbnB1dC5oYXNDbGFzcyhDTEFTUy5fZGlzRWwpICYmIHRhcmdldC5hZGRDbGFzcyhDTEFTUy5faGlkZSkpO1xuICAgIGJ0bkFjdGl2ZSA9IGlucHV0Q2h4LmZpbHRlcignOmNoZWNrZWQnKS5sZW5ndGggPT09IDAgPyAoYnRuTmV4dC5oaWRlKCksIGZhbHNlKSA6IChidG5OZXh0LnNob3coKSwgdHJ1ZSk7XG4gIH1cblxuICBmdW5jdGlvbiBmaWx0ZXJOdW1iZXIoKSB7XG5cdFx0dGhpcy52YWx1ZSA9IHRoaXMudmFsdWUucmVwbGFjZSgvW14wLTkuXS9nLCAnJyk7XG5cdH1cblxuICBmdW5jdGlvbiBoaWRlU29jaWFsKGkpIHtcbiAgICBsZXQgd3JhcCA9IGVsLmZpbmQoJyMnICsgaSArICctdXJsLXdyYXAnKSxcbiAgICAgICAgaW5wdXQgPSB3cmFwLmZpbmQoJ2lucHV0Jyk7XG5cbiAgICB3cmFwLmFkZENsYXNzKENMQVNTLl9kaXNhYmxlKTtcbiAgICB3cmFwLmhhc0NsYXNzKENMQVNTLl9yZXF1aXJlKSAmJiBpbnB1dC5yZW1vdmVDbGFzcyhDTEFTUy5fcmVxdWlyZSk7XG4gICAgdXBkYXRlUnFJbnB1dCgpO1xuICB9XG5cbiAgZnVuY3Rpb24gc2hvd1NvY2lhbChpKSB7XG4gICAgbGV0IHdyYXAgPSBlbC5maW5kKCcjJyArIGkgKyAnLXVybC13cmFwJyksXG4gICAgICAgIGlucHV0ID0gd3JhcC5maW5kKCdpbnB1dCcpO1xuXG4gICAgd3JhcC5yZW1vdmVDbGFzcyhDTEFTUy5fZGlzYWJsZSk7XG4gICAgd3JhcC5oYXNDbGFzcyhDTEFTUy5fcmVxdWlyZSkgJiYgaW5wdXQuYWRkQ2xhc3MoQ0xBU1MuX3JlcXVpcmUpO1xuICAgIHVwZGF0ZVJxSW5wdXQoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZVJxSW5wdXQoKSB7XG4gICAgZ2V0U3ViRWwoKTtcbiAgICBpbnB1dFJxID0gZWwuZmluZCgnLicgKyBDTEFTUy5fcmVxdWlyZSk7XG4gICAgaW5wdXRScS5vbihGX0lOLCBpbnB1dEZvY3VzKTtcbiAgfVxuXG5cdGZ1bmN0aW9uIGFjdGl2ZVdyYXAoKSB7XG5cdFx0bGV0IGlucHV0ID0gJCh0aGlzKSxcblx0XHRcdFx0d3JhcCA9IGlucHV0LnBhcmVudHMoJy5pbnB1dC13cmFwJyk7XG5cdFx0d3JhcC5sZW5ndGggPiAwICYmIHdyYXAuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG5cdH1cblxuXHRmdW5jdGlvbiBkZWFjdGl2ZVdyYXAoKSB7XG5cdFx0bGV0IGlucHV0ID0gJCh0aGlzKSxcblx0XHRcdFx0d3JhcCA9IGlucHV0LnBhcmVudHMoJy5pbnB1dC13cmFwJyk7XG5cdFx0d3JhcC5sZW5ndGggPiAwICYmICQudHJpbShpbnB1dC52YWwoKSkubGVuZ3RoID09PSAwICYmIHdyYXAucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG5cdH1cblxuXHRmdW5jdGlvbiBpbnB1dEZvY3VzKGUpIHtcbiAgICBsZXQgaW5wdXQgPSAkKHRoaXMpLFxuICAgICAgICB3YXJuaW5nID0gaW5wdXQucGFyZW50KCkubmV4dCgnLndhcm5pbmcnKTtcblx0XHRpbnB1dC5oYXNDbGFzcyhDTEFTUy5fZXJyb3IpICYmIChpbnB1dC5yZW1vdmVDbGFzcyhDTEFTUy5fZXJyb3IpLCB3YXJuaW5nLnJlbW92ZUNsYXNzKENMQVNTLl9kbGV4KSk7XG5cdH1cblxuXHRmdW5jdGlvbiBuZXh0Q2xpY2tlZChlKSB7XG5cdFx0ZS5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdGNoZWNrSW5wdXQoKTtcblx0fVxuXG4gIGZ1bmN0aW9uIGNoZWNrSW5wdXQoKSB7XG4gICAgbGV0IHBhc3MgPSB0cnVlO1xuICAgIHBhc3MgPSBidG5BY3RpdmU7XG5cdFx0cGFzcyAmJiAocGFzcyA9IGNoZWNrUmVxdWlyZSgpKTtcbiAgICBwYXNzICYmIChwYXNzID0gY2hlY2tNaW4oKSk7XG5cdFx0cGFzcyAmJiAocGFzcyA9IGNoZWNrTWF4KCkpO1xuXHRcdHBhc3MgJiYgKHBhc3MgPSBjaGVja0VtYWlsKCkpO1xuICAgIHBhc3MgJiYgKHBhc3MgPSBjaGVja0RhdGUoKSk7XG4gICAgLy8gY29uc29sZS5sb2cocGFzcywgcnFTdkNoZWNrLCBwYXNzICYmIHJxU3ZDaGVjayk7XG4gICAgLy8gcmV0dXJuIGZhbHNlO1xuICAgIHBhc3MgJiYgKHJxU3ZDaGVjayA/IChwYXNzU3YgPyBnb05leHQoKSA6IGNoZWNrU2VydmVyKCkpIDogZ29OZXh0KCkpO1xuICAgIHJldHVybiBwYXNzO1xuICB9XG5cbiAgZnVuY3Rpb24gY2hlY2tEYXRlKCkge1xuXHRcdGxldCBwYXNzID0gdHJ1ZTtcblx0XHRmb3IgKGxldCBpIG9mIGlwRGF0ZSkgaS52YWxpZGF0ZSgpIHx8IChwYXNzID0gZmFsc2UpO1xuXHRcdHJldHVybiBwYXNzO1xuXHR9XG5cbiAgZnVuY3Rpb24gY2hlY2tTZXJ2ZXIoKSB7XG4gICAgbGV0IGlucHV0VmFsID0galF1ZXJ5LnRyaW0oaW5wdXRzLnZhbCgpKTtcbiAgICBBUFAucG9wdXAuX2xvYWRpbmcuc2hvdygpO1xuICAgICQuYWpheCh7XG5cdFx0XHR0eXBlOiBBUFAuX3N1Ym1pdE1ldGhvZCxcblx0XHRcdHVybDogYWpheFVSTCxcblx0XHRcdGRhdGE6IHsgdmFsOiBpbnB1dFZhbCB9LFxuICAgICAgaGVhZGVyczogQVBQLl9oZWFkZXJzLFxuXHRcdFx0c3VjY2VzczogZGF0YSA9PiB7XG5cdFx0XHRcdGxldCBzdGF0dXMgPSBwYXJzZUludChkYXRhLnN0YXR1cyksXG5cdFx0XHRcdFx0XHR0aXRsZSA9IGRhdGEudGl0bGUsXG5cdFx0XHRcdFx0XHRtZXNzYWdlID0gZGF0YS5tZXNzYWdlO1xuXG4gICAgICAgIEFQUC5wb3B1cC5fbG9hZGluZy5oaWRlKCk7XG5cdFx0XHRcdHN3aXRjaChzdGF0dXMpIHtcblx0XHRcdFx0XHRjYXNlIDA6IHNob3dXYXJuaW5nKGlucHV0cywgbWVzc2FnZSk7IGJyZWFrO1xuXHRcdFx0XHRcdGNhc2UgMToge1xuICAgICAgICAgICAgcGFzc1N2ID0gdHJ1ZTtcbiAgICAgICAgICAgIGdvTmV4dCgpO1xuICAgICAgICAgIH0gYnJlYWs7XG5cdFx0XHRcdH1cblx0XHRcdH1cblx0XHR9KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGdvTmV4dCgpIHtcbiAgICAvLyBjb25zb2xlLmxvZygnZ29OZXh0Jyk7XG4gICAgZG9jdW1lbnQuZGlzcGF0Y2hFdmVudChuZXh0RXZlbnQpO1xuICB9XG5cbiAgZnVuY3Rpb24gcmVhZHlJbigpIHtcbiAgICBlbC5zaG93KCk7XG4gICAgc3ViRWwuZWFjaCgoaSwgZSkgPT4gVHdlZW5NYXguc2V0KGUsIHtcbiAgICAgIHk6IDUwLFxuICAgICAgYXV0b0FscGhhOiAwXG5cdFx0fSkpO1xuICB9XG5cbiAgZnVuY3Rpb24gZ29JbigpIHtcbiAgICBsZXQgZGVsYXkgPSAwLjE7XG5cbiAgICByZWFkeUluKCk7XG4gICAgc3ViRWwuZWFjaCgoaSwgZSkgPT4gVHdlZW5NYXgudG8oZSwgMC43NSwge1xuICAgICAgeTogMCxcbiAgICAgIGF1dG9BbHBoYTogMSxcbiAgICAgIC8vIGVhc2U6IEV4cG8uZWFzZUluT3V0LFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZSxcbiAgICAgIGRlbGF5OiBkZWxheSppXG5cdFx0fSkpO1xuICAgIC8vIGNvbnNvbGUubG9nKCdnb0luICcsIGluZGV4KTtcbiAgfVxuXG5cdGZ1bmN0aW9uIGdvT3V0KGkpIHtcbiAgICBkb25lRXZlbnQuZGV0YWlsLnRhcmdldCA9IGluZGV4ICsgaTtcbiAgICBhbmltYXRlU3ViRWwoKTtcblx0fVxuXG4gIGZ1bmN0aW9uIGFuaW1hdGVTdWJFbCgpIHtcbiAgICBsZXQgZGVsYXkgPSAwLjI1O1xuICAgIGdldEZpbHRlcmVkU3ViRWwoKTtcbiAgICBzdWJFbC5lYWNoKChpLCBlKSA9PiBUd2Vlbk1heC50byhlLCAwLjc1LCB7XG4gICAgICB5OiAtNTAsXG4gICAgICBhdXRvQWxwaGE6IDAsXG4gICAgICBlYXNlOiBFeHBvLmVhc2VJbk91dCxcbiAgICAgIGZvcmNlM0Q6IHRydWUsXG4gICAgICBkZWxheTogZGVsYXkqaSxcbiAgICAgIG9uQ29tcGxldGU6IHN1YkVsLmxlbmd0aCA9PT0gKGkgKyAxKSAmJiBhbmltYXRlZERvbmVcblx0XHR9KSk7XG4gIH1cblxuICBmdW5jdGlvbiBhbmltYXRlZERvbmUoKSB7XG4gICAgZG9jdW1lbnQuZGlzcGF0Y2hFdmVudChkb25lRXZlbnQpO1xuICAgIGVsLmhpZGUoKTtcbiAgfVxuXG5cdGZ1bmN0aW9uIGNoZWNrUmVxdWlyZSgpIHtcbiAgICBsZXQgcGFzcyA9IHRydWUsXG5cdFx0XHRcdGlucHV0ID0ge307XG5cblx0XHRpbnB1dFJxLmxlbmd0aCA9PT0gMCB8fCBpbnB1dFJxLmVhY2goKF8sIGVsKSA9PiB7XG5cdFx0XHRpbnB1dCA9ICQoZWwpO1xuXHRcdFx0KGlucHV0LmlzKEZfVklTSUJMRSkgJiYgaW5wdXQudmFsKCkgPT09ICcnKSAmJiAocGFzcyA9IHNob3dXYXJuaW5nKGlucHV0LCBpbnB1dC5hdHRyKHR4dFJxKSkpO1xuXHRcdH0pO1xuXHRcdHJldHVybiBwYXNzO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2hlY2tFbWFpbCgpIHtcblx0XHRsZXQgcGFzcyA9IHRydWUsXG5cdFx0XHRcdGlucHV0ID0ge30sXG5cdFx0XHRcdHJlZ2V4ID0gL14oW2EtekEtWjAtOV8uKy1dKStcXEAoKFthLXpBLVowLTktXSkrXFwuKSsoW2EtekEtWjAtOV17Miw0fSkrJC87XG5cblx0XHRpbnB1dEVtLmxlbmd0aCA9PT0gMCB8fCBpbnB1dEVtLmVhY2goKF8sIGVsKSA9PiB7XG5cdFx0XHRpbnB1dCA9ICQoZWwpO1xuXHRcdFx0aW5wdXQuaXMoRl9WSVNJQkxFKSAmJiByZWdleC50ZXN0KGlucHV0LnZhbCgpKSB8fCAocGFzcyA9IHNob3dXYXJuaW5nKGlucHV0LCBpbnB1dC5hdHRyKHR4dEVtKSkpO1xuXHRcdH0pO1xuXHRcdHJldHVybiBwYXNzO1xuXHR9XG5cbiAgZnVuY3Rpb24gY2hlY2tNaW4oKSB7XG5cdFx0bGV0IHBhc3MgPSB0cnVlLFxuXHRcdFx0XHRpbnB1dCA9IHt9LFxuXHRcdFx0XHRtaW4gPSAwO1xuXG5cdFx0aW5wdXRNaW4ubGVuZ3RoID09PSAwIHx8IGlucHV0TWluLmVhY2goKF8sIGVsKSA9PiB7XG5cdFx0XHRpbnB1dCA9ICQoZWwpO1xuXHRcdFx0bWluID0gcGFyc2VJbnQoaW5wdXQuZGF0YSgnbWluJykpO1xuXHRcdFx0KGlucHV0LmlzKEZfVklTSUJMRSkgJiYgaW5wdXQudmFsKCkubGVuZ3RoIDwgbWluKSAmJiAocGFzcyA9IHNob3dXYXJuaW5nKGlucHV0LCBpbnB1dC5hdHRyKHR4dE1pbikpKTtcblx0XHR9KTtcblx0XHRyZXR1cm4gcGFzcztcblx0fVxuXG5cdGZ1bmN0aW9uIGNoZWNrTWF4KCkge1xuXHRcdGxldCBwYXNzID0gdHJ1ZSxcblx0XHRcdFx0aW5wdXQgPSB7fSxcblx0XHRcdFx0bWF4ID0gMDtcblxuXHRcdGlucHV0TWF4Lmxlbmd0aCA9PT0gMCB8fCBpbnB1dE1heC5lYWNoKChfLCBlbCkgPT4ge1xuXHRcdFx0aW5wdXQgPSAkKGVsKTtcblx0XHRcdG1heCA9IHBhcnNlSW50KGlucHV0LmRhdGEoJ21heCcpKTtcblx0XHRcdChpbnB1dC5pcyhGX1ZJU0lCTEUpICYmIGlucHV0LnZhbCgpLmxlbmd0aCA+IG1heCkgJiYgKHBhc3MgPSBzaG93V2FybmluZyhpbnB1dCwgaW5wdXQuYXR0cih0eHRNYXgpKSk7O1xuXHRcdH0pO1xuXHRcdHJldHVybiBwYXNzO1xuXHR9XG5cbiAgZnVuY3Rpb24gc2hvd1dhcm5pbmcoaW5wdXQsIG1lc3MpIHtcbiAgICBsZXQgd2FybmluZyA9IGlucHV0LnBhcmVudCgpLm5leHQoJy53YXJuaW5nJyk7XG4gICAgaW5wdXQuYWRkQ2xhc3MoQ0xBU1MuX2Vycm9yKTtcbiAgICB3YXJuaW5nLnRleHQobWVzcykuYWRkQ2xhc3MoQ0xBU1MuX2RsZXgpO1xuICAgIHJldHVybiBmYWxzZTtcbiAgfVxuXG5cdHJldHVybiB0aGlzO1xufTsiLCIvKioqIFBBR0UgLSBIT01FICoqKi9cbkFQUC5ob21lID0ge1xuICBfZWw6IHt9LFxuICBfc2Nyb2xsQW5pbWF0b3I6IHt9LFxuICBfc2Nyb2xsVHJpZ2dlcjoge30sXG4gIF9ldmVudFNlY3Rpb246IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9ldmVudFNlY3Rpb24gPSBuZXcgRXZlbnRTZWN0aW9uKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5uZXdzLXRhYicpKVxuICAgICk7XG5cbiAgICByZXR1cm47XG4gICAgdGhpcy5fc2Nyb2xsQW5pbWF0b3IgPSB0aGlzLl9lbC5xdWVyeVNlbGVjdG9yQWxsKCcuc2Nyb2xsLWFuaW1hdG9yJyk7XG4gICAgKHRoaXMuX3Njcm9sbEFuaW1hdG9yLmxlbmd0aCA+IDApICYmIHRoaXMuX3Njcm9sbEFuaW1hdG9yLmZvckVhY2goZSA9PiBuZXcgU2Nyb2xsQW5pbWF0b3IoZSkpO1xuICAgIHRoaXMuX3Njcm9sbFRyaWdnZXIgPSB0aGlzLl9lbC5xdWVyeVNlbGVjdG9yQWxsKCcuc2Nyb2xsLXRyaWdnZXInKTtcbiAgICAodGhpcy5fc2Nyb2xsVHJpZ2dlci5sZW5ndGggPiAwKSAmJiB0aGlzLl9zY3JvbGxUcmlnZ2VyLmZvckVhY2goZSA9PiBuZXcgU2Nyb2xsVHJpZ2dlcihlKSk7XG4gICAgdGhpcy5pbml0RXZlbnQoKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTtcblxuLyoqKioqIE5ld3MgJiBFdmVudCBTZWN0aW9uICoqKioqL1xubGV0IEV2ZW50U2VjdGlvbiA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcblxuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgdGFiUGFnaW5nID0gZWwuZmluZCgnLnRhYi1wYWdpbmcnKSxcbiAgICAgIHRhYkl0ZW0gPSB0YWJQYWdpbmcuZmluZCgnLml0ZW0nKSxcbiAgICAgIGVOYW1lID0gJ0hPTUVfRVZFTlRfU0xJREVSX1BBR0lOR19VUERBVEVEJyxcbiAgICAgIHdyYXBTbGlkZXIgPSBlbC5maW5kKCcjbmV3cy1zbGlkZXIgLml0ZW0td3JhcCcpLFxuICAgICAgZXZlbnRTbGlkZXIgPSBuZXcgU2xpZGVyKGVsLmZpbmQoJyNuZXdzLXNsaWRlcicpLCAwLCBlTmFtZSksXG4gICAgICBzaGFkb3dPZmZzZXQgPSAwO1xuXG4gICgoKSA9PiBpbml0KCkpKCk7XG4gIGZ1bmN0aW9uIGluaXQoKSB7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgdGFiSXRlbS5vbihDTElDSywgaXRlbUNsaWNrZWQpO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoZU5hbWUsIGUgPT4gdXBkYXRlSW5kZXgocGFyc2VJbnQoZS5kZXRhaWwudGFyZ2V0KSkpO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCB1cGRhdGVXcmFwSGVpZ2h0KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGl0ZW1DbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgbGV0IGl0ZW0gPSAkKHRoaXMpLFxuICAgICAgICB0YXJnZXRJbmRleCA9IDAsXG4gICAgICAgIGlzQW5pbWF0ZSA9IGV2ZW50U2xpZGVyLmdldEFuaW1hdGlvblN0YXRlKCk7XG5cbiAgICBpZiAoaXNBbmltYXRlIHx8IGl0ZW0uaGFzQ2xhc3MoQ0xBU1MuX2FjdGl2ZSkpIHJldHVybiBmYWxzZTtcblxuICAgIHRhcmdldEluZGV4ID0gcGFyc2VJbnQoaXRlbS5kYXRhKCdpbmRleCcpKTtcbiAgICBnb1RvKHRhcmdldEluZGV4KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGdvVG8oaSkge1xuICAgIHVwZGF0ZUluZGV4KGkpO1xuICAgIGV2ZW50U2xpZGVyLmdvVG8oaSk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVJbmRleChpKSB7XG4gICAgdGFiSXRlbS5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICB0YWJJdGVtLmVxKGkpLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpO1xuICB9XG5cbiAgZnVuY3Rpb24gdXBkYXRlV3JhcEhlaWdodCgpIHtcbiAgICAoQVBQLl9XID49IDk2MCkgPyByZW1vdmVGaXhIZWlnaHQoKSA6IHNldEZpeEhlaWdodCgpO1xuICB9XG5cbiAgZnVuY3Rpb24gc2V0Rml4SGVpZ2h0KCkge1xuICAgIGxldCBoID0gZXZlbnRTbGlkZXIuZ2V0SXRlbUhlaWdodCgpICsgc2hhZG93T2Zmc2V0O1xuICAgIHdyYXBTbGlkZXIuaGVpZ2h0KGgpO1xuICB9XG5cbiAgZnVuY3Rpb24gcmVtb3ZlRml4SGVpZ2h0KCkge1xuICAgIGxldCBzdHlsZSA9IHdyYXBTbGlkZXIuYXR0cignc3R5bGUnKTtcbiAgICAodHlwZW9mIHN0eWxlICE9PSAndW5kZWZpbmVkJyAmJiBzdHlsZSAhPT0gZmFsc2UpICYmIHdyYXBTbGlkZXIucmVtb3ZlQXR0cignc3R5bGUnKTtcbiAgfVxuXG5cdHJldHVybiB0aGlzO1xufTtcbiIsIi8qKiogUEFHRSAtIFRBTEVOVCBERVRBSUxTICoqKi9cbkFQUC50YWxlbnREZXRhaWxzID0ge1xuICBfZWw6IHt9LFxuICBfYnRuQm9va21hcms6IHt9LFxuICBfYnRuTG9naW46IHt9LFxuICBfYnRuSGlyZToge30sXG4gIF9wb3B1cExvZ2luOiB7fSxcbiAgX3BvcHVwSGlyZToge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2J0bkJvb2ttYXJrID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvcignLmRldGFpbHMtYmFubmVyIC5idG4tYm9va21hcmsnKSxcbiAgICAgIHRoaXMuX2J0bkxvZ2luID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvcignLmRldGFpbHMtYmFubmVyIC5idG4tbG9naW4nKSxcbiAgICAgIHRoaXMuX2J0bkhpcmUgPSB0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcuZGV0YWlscy1iYW5uZXIgLmJ0bi1oaXJlJyksXG4gICAgICB0aGlzLl9wb3B1cExvZ2luID0gbmV3IFBvcHVwRm9ybSgnI3BvcHVwLWxvZ2luJyksXG4gICAgICB0aGlzLl9wb3B1cEhpcmUgPSBuZXcgUG9wdXBGb3JtKCcjcG9wdXAtaGlyZScpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge1xuICAgIHRoaXMuX2J0bkJvb2ttYXJrICYmIHRoaXMuX2J0bkJvb2ttYXJrLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIGUgPT4gKGUucHJldmVudERlZmF1bHQoKSwgdGhpcy5fYnRuQm9va21hcmsuY2xhc3NMaXN0LnRvZ2dsZShDTEFTUy5fYWN0aXZlKSkpO1xuICAgIHRoaXMuX2J0bkxvZ2luICYmIHRoaXMuX2J0bkxvZ2luLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIGUgPT4gKGUucHJldmVudERlZmF1bHQoKSwgdGhpcy5fcG9wdXBMb2dpbi5zaG93KCkpKTtcbiAgICB0aGlzLl9idG5IaXJlICYmIHRoaXMuX2J0bkhpcmUuYWRkRXZlbnRMaXN0ZW5lcihDTElDSywgZSA9PiAoZS5wcmV2ZW50RGVmYXVsdCgpLCB0aGlzLl9wb3B1cEhpcmUuc2hvdygpKSk7XG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcih0aGlzLl9wb3B1cEhpcmUuZ2V0RXZlbnROYW1lKCksICgpID0+IHRoaXMuX3BvcHVwSGlyZS5oaWRlKCkpO1xuICB9XG59OyIsIi8qKiogUEFHRSAtIFNFVFVQIFBBU1NXT1JEICoqKi9cbkFQUC5zZXR1cFBhc3N3b3JkID0ge1xuICBfZWw6IHt9LFxuICBfbG9naW5Gb3JtOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fbG9naW5Gb3JtID0gbmV3IEZvcm0odGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2xvZ2luLWZvcm0nKSksXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBBQ0NPVU5UIEFDVElWQVRFRCAqKiovXG5BUFAuYWNjQWN0aXZhdGVkID0ge1xuICBfZWw6IHt9LFxuICBfc2VjdGlvbkFjdGl2ZToge30sXG4gIF9zZWN0aW9uVGFsZW50OiB7fSxcbiAgX2J0bkpvaW46IHt9LFxuICBfdENhcm91c2VsOiB7fSxcblxuXHRpbml0KCkge1xuICAgIGxldCBzZWxmID0gdGhpcztcbiAgICBzZWxmLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHNlbGYuX2VsICYmIChcbiAgICAgIHNlbGYuX3NlY3Rpb25BY3RpdmUgPSBzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcjc2VjdGlvbi1hY3RpdmUnKSxcbiAgICAgIHNlbGYuX3NlY3Rpb25UYWxlbnQgPSBzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcjc2VjdGlvbi10YWxlbnQnKSxcbiAgICAgIHNlbGYuX2J0bkpvaW4gPSBzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcjYnRuLWpvaW4nKSxcbiAgICAgIHNlbGYuX3RDYXJvdXNlbCA9IG5ldyBDYXJvdXNlbChzZWxmLl9lbC5xdWVyeVNlbGVjdG9yKCcuc2VydmljZS1ib2FyZCAuY2Fyb3VzZWwnKSwgdHJ1ZSwgc2VsZi5nZXRNYXhTaG93KCkpLFxuICAgICAgc2VsZi5pbml0U2NyKCksXG4gICAgICBzZWxmLmluaXRFdmVudCgpXG4gICAgKTtcbiAgfSxcblxuICBpbml0U2NyKCkge1xuICAgIGxldCBzZWxmID0gdGhpcyxcbiAgICAgICAgc3ViRWwgPSBzZWxmLl9zZWN0aW9uVGFsZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5oZWFkaW5nLWJhbm5lciA+ICosIC5jYXJvdXNlbC1ob2xkZXIgPiAqJyk7XG5cbiAgICBzdWJFbC5mb3JFYWNoKChlLCBpKSA9PiBUd2Vlbk1heC5zZXQoZSwge1xuICAgICAgeTogLTUwLFxuICAgICAgYXV0b0FscGhhOiAwXG4gICAgfSkpO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHtcbiAgICBsZXQgc2VsZiA9IHRoaXM7XG4gICAgc2VsZi5fYnRuSm9pbi5hZGRFdmVudExpc3RlbmVyKENMSUNLLCBzZWxmLnNob3dQcm9UYWxlbnQpO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCAoKSA9PiBzZWxmLl90Q2Fyb3VzZWwudXBkYXRlTWF4U2hvdyhzZWxmLmdldE1heFNob3coKSkpO1xuICB9LFxuXG4gIHNob3dQcm9UYWxlbnQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBsZXQgc2VsZiA9IEFQUC5hY2NBY3RpdmF0ZWQsXG4gICAgICAgIHN1YkVsID0gc2VsZi5fc2VjdGlvbkFjdGl2ZS5xdWVyeVNlbGVjdG9yQWxsKCcuaGVhZGluZy1iYW5uZXIgPiAqJyksXG4gICAgICAgIGRlbGF5ID0gMC4yNTtcblxuICAgIHN1YkVsLmZvckVhY2goKGUsIGkpID0+IFR3ZWVuTWF4LnRvKGUsIDAuNSwge1xuICAgICAgeTogLTUwLFxuICAgICAgYXV0b0FscGhhOiAwLFxuXHRcdFx0Zm9yY2UzRDogdHJ1ZSxcbiAgICAgIGRlbGF5OiBkZWxheSAqIGksXG4gICAgICBvbkNvbXBsZXRlOiBzdWJFbC5sZW5ndGggPT09IChpICsgMSkgJiYgc2VsZi5hY3RpdmVBbmltYXRlRG9uZVxuXHRcdH0pKTtcbiAgfSxcblxuICBhY3RpdmVBbmltYXRlRG9uZSgpIHtcbiAgICBsZXQgc2VsZiA9IEFQUC5hY2NBY3RpdmF0ZWQsXG4gICAgICAgIHN1YkVsID0gc2VsZi5fc2VjdGlvblRhbGVudC5xdWVyeVNlbGVjdG9yQWxsKCcuaGVhZGluZy1iYW5uZXIgPiAqLCAuY2Fyb3VzZWwtaG9sZGVyID4gKicpLFxuICAgICAgICBkZWxheSA9IDAuMjU7XG5cbiAgICBzZWxmLl9zZWN0aW9uVGFsZW50LmNsYXNzTGlzdC50b2dnbGUoQ0xBU1MuX2hpZGUpO1xuICAgIHN1YkVsLmZvckVhY2goKGUsIGkpID0+IFR3ZWVuTWF4LnRvKGUsIDAuNSwge1xuICAgICAgeTogMCxcbiAgICAgIGF1dG9BbHBoYTogMSxcblx0XHRcdGZvcmNlM0Q6IHRydWUsXG4gICAgICBkZWxheTogZGVsYXkgKiBpLFxuICAgICAgb25Db21wbGV0ZTogc3ViRWwubGVuZ3RoID09PSAoaSArIDEpICYmIHNlbGYudGFsZW50QW5pbWF0ZURvbmVcblx0XHR9KSk7XG4gICAgZG9jdW1lbnQuZGlzcGF0Y2hFdmVudChTSVpFX0NIQU5HRURfRVZFTlQpO1xuICB9LFxuXG4gIHRhbGVudEFuaW1hdGVEb25lKCkge30sXG4gIGdldE1heFNob3c6KCkgPT4gQVBQLl9XID4gOTYwID8gMyA6IEFQUC5fVyA+IDY0MCAmJiBBUFAuX1cgPD0gOTYwID8gMiA6IDFcbn07IiwiLyoqKiBQQUdFIC0gUFJPSkVDVCBERVRBSUxTICoqKi9cbkFQUC5wcm9qZWN0RGV0YWlscyA9IHtcbiAgX2VsOiB7fSxcbiAgX2FTbGlkZXI6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9hU2xpZGVyID0gbmV3IFNsaWRlcih0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcuYXNpZGUtc2xpZGVyJyksIDApLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gVEFMRU5UIENUUiAqKiovXG5BUFAudGFsZW50Q3RyID0ge1xuICBfZWw6IHt9LFxuICBfYnRuQWRkRXhwOiB7fSxcbiAgX2J0bkVkaXRFeHA6IHt9LFxuICBfYnRuRWRpdFByZWY6IHt9LFxuICBfcm9sZXNDYXJvdXNlbDoge30sXG4gIF9wb3B1cEFkZEV4cDoge30sXG4gIF9wb3B1cEVkaXRFeHA6IHt9LFxuICBfcG9wdXBFZGl0UHJlZjoge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2J0bkFkZEV4cCA9IHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNidG4tYWRkLWV4cCcpLFxuICAgICAgdGhpcy5fYnRuRWRpdEV4cCA9IHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3JBbGwoJy5idG4tZWRpdC1leHAnKSxcbiAgICAgIHRoaXMuX2J0bkVkaXRQcmVmID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2J0bi1lZGl0LXByZWYnKSxcbiAgICAgIHRoaXMuX3JvbGVzQ2Fyb3VzZWwgPSBuZXcgQ2Fyb3VzZWwodGhpcy5fZWwucXVlcnlTZWxlY3RvcignLmNhcm91c2VsLWhvbGRlciAuY2Fyb3VzZWwnKSwgdHJ1ZSwgdGhpcy5nZXRNYXhTaG93KCkpLFxuICAgICAgdGhpcy5fcG9wdXBBZGRFeHAgPSBuZXcgUG9wdXBGb3JtKCcjcG9wdXAtdGFsZW50LWFkZC1leHAnKSxcbiAgICAgIHRoaXMuX3BvcHVwRWRpdEV4cCA9IG5ldyBQb3B1cEVkaXRFeHAoJyNwb3B1cC10YWxlbnQtZWRpdC1leHAnKSxcbiAgICAgIHRoaXMuX3BvcHVwRWRpdFByZWYgPSBuZXcgUG9wdXBGb3JtKCcjcG9wdXAtdGFsZW50LWVkaXQtcHJlZicpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge1xuICAgIHRoaXMuX2J0bkFkZEV4cC5hZGRFdmVudExpc3RlbmVyKENMSUNLLCBlID0+IChlLnByZXZlbnREZWZhdWx0KCksIHRoaXMuX3BvcHVwQWRkRXhwLnNob3coKSkpO1xuICAgIHRoaXMuX2J0bkVkaXRFeHAuZm9yRWFjaChidG4gPT4gYnRuLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIGUgPT4ge1xuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgJC5nZXRKU09OKGJ0bi5nZXRBdHRyaWJ1dGUoJ2RhdGEtdXJsJyksIGRhdGEgPT4gQVBQLnRhbGVudEN0ci5fcG9wdXBFZGl0RXhwLnVwZGF0ZShkYXRhKSk7XG4gICAgfSkpO1xuICAgIHRoaXMuX2J0bkVkaXRQcmVmLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIGUgPT4gKGUucHJldmVudERlZmF1bHQoKSwgdGhpcy5fcG9wdXBFZGl0UHJlZi5zaG93KCkpKTtcblxuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCAoKSA9PiB0aGlzLl9yb2xlc0Nhcm91c2VsLnVwZGF0ZU1heFNob3codGhpcy5nZXRNYXhTaG93KCkpKTtcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKHRoaXMuX3BvcHVwQWRkRXhwLmdldEV2ZW50TmFtZSgpLCAoKSA9PiB0aGlzLl9wb3B1cEFkZEV4cC5oaWRlKCkpO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIodGhpcy5fcG9wdXBFZGl0RXhwLmdldEV2ZW50TmFtZSgpLCAoKSA9PiB0aGlzLl9wb3B1cEVkaXRFeHAuaGlkZSgpKTtcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKHRoaXMuX3BvcHVwRWRpdFByZWYuZ2V0RXZlbnROYW1lKCksICgpID0+IHRoaXMuX3BvcHVwRWRpdFByZWYuaGlkZSgpKTtcbiAgfSxcblxuICBnZXRFeHAoKSB7XG4gICAgY29uc29sZS5sb2codGhpcyk7XG4gIH0sXG5cbiAgZ2V0TWF4U2hvdzogKCkgPT4gQVBQLl9XID4gMTIwMCA/IDQgOiBBUFAuX1cgPiA5NjAgJiYgQVBQLl9XIDw9IDEyMDAgPyAzIDogQVBQLl9XID4gNjQwICYmIEFQUC5fVyA8PSA5NjAgPyAyIDogMSxcbn07IiwiLyoqKiBQQUdFIC0gVEFMRU5UIENUUiBFRElUICoqKi9cbkFQUC50YWxlbnRDdHJFZGl0ID0ge1xuICBfZWw6IHt9LFxuICBfZm9ybUVkaXQ6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9lbC5fZm9ybUVkaXQgPSBuZXcgRm9ybSh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1lZGl0JykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgIClcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBUQUxFTlQgQ1RSIFBXICoqKi9cbkFQUC50YWxlbnRDdHJQdyA9IHtcbiAgX2VsOiB7fSxcbiAgX2xvZ2luRm9ybToge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2xvZ2luRm9ybSA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNsb2dpbi1mb3JtJykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gVEFMRU5UIFNVQk1JVFRFRCAqKiovXG5BUFAudGFsZW50U3VibWl0dGVkID0ge1xuICBfZWw6IHt9LFxuICBfZm9ybUZpbHRlcjoge30sXG4gIF9pbnB1dFNlYXJjaDoge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2Zvcm1GaWx0ZXIgPSBuZXcgRm9ybSh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1maWx0ZXInKSksXG4gICAgICB0aGlzLl9pbnB1dFNlYXJjaCA9IG5ldyBJbnB1dFdyYXAodGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2Zvcm0tc2VhcmNoIC5pbnB1dC13cmFwJykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gVEFMRU5UIFJFQ09NTUVOREVEICoqKi9cbkFQUC50YWxlbnRSZWNvbW1lbmRlZCA9IHtcbiAgX2VsOiB7fSxcbiAgX2lucHV0U2VhcmNoOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5faW5wdXRTZWFyY2ggPSBuZXcgSW5wdXRXcmFwKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLXNlYXJjaCAuaW5wdXQtd3JhcCcpKSxcbiAgICAgIHRoaXMuaW5pdEV2ZW50KClcbiAgICApO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHt9XG59OyIsIi8qKiogUEFHRSAtIENMSUVOVCBDQVNUSU5HIEJPQVJEICoqKi9cbkFQUC5jbGllbnRDYXN0aW5nQm9hcmQgPSB7XG4gIF9lbDoge30sXG4gIF9mb3JtRmlsdGVyOiB7fSxcbiAgX2lucHV0U2VhcmNoOiB7fSxcbiAgX2J0blRvZ2dsZToge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2Zvcm1GaWx0ZXIgPSBuZXcgRm9ybSh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1maWx0ZXInKSksXG4gICAgICB0aGlzLl9pbnB1dFNlYXJjaCA9IG5ldyBJbnB1dFdyYXAodGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2Zvcm0tc2VhcmNoIC5pbnB1dC13cmFwJykpLFxuICAgICAgdGhpcy5fYnRuVG9nZ2xlID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvckFsbCgnLmJ0bi10b2dnbGUnKSxcbiAgICAgIHRoaXMuaW5pdEV2ZW50KClcbiAgICApO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHtcbiAgICB0aGlzLl9idG5Ub2dnbGUuZm9yRWFjaChidG4gPT4gYnRuLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIGUgPT4ge1xuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgbGV0IHBhcmVudCA9IGJ0bi5wYXJlbnROb2RlLFxuICAgICAgICAgIGxpc3QgPSBwYXJlbnQubmV4dEVsZW1lbnRTaWJsaW5nO1xuXG4gICAgICBwYXJlbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTLl9hY3RpdmUpID8gKHBhcmVudC5jbGFzc0xpc3QucmVtb3ZlKENMQVNTLl9hY3RpdmUpLCBBUFAuc2xpZGVVcChsaXN0KSkgOiAocGFyZW50LmNsYXNzTGlzdC5hZGQoQ0xBU1MuX2FjdGl2ZSksIEFQUC5zbGlkZURvd24obGlzdCkpO1xuICAgIH0pKTtcbiAgfVxufTsiLCIvKioqIFBBR0UgLSBDQVNUSU5HIEJPQVJEICoqKi9cbkFQUC5jYXN0aW5nQm9hcmQgPSB7XG4gIF9lbDoge30sXG4gIF9iU2xpZGVyOiB7fSxcbiAgX3RDYXJvdXNlbDoge30sXG4gIF9mb3JtRmlsdGVyOiB7fSxcbiAgX2lucHV0U2VhcmNoOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fYlNsaWRlciA9IG5ldyBTbGlkZXIodGhpcy5fZWwucXVlcnlTZWxlY3RvcignLmJhbm5lci1zbGlkZXInKSwgMCksXG4gICAgICB0aGlzLl90Q2Fyb3VzZWwgPSBuZXcgQ2Fyb3VzZWwodGhpcy5fZWwucXVlcnlTZWxlY3RvcignLnRlc3RpbW9uaWFsIC5jYXJvdXNlbCcpLCB0cnVlLCB0aGlzLmdldE1heFNob3coKSksXG4gICAgICB0aGlzLl9mb3JtRmlsdGVyID0gbmV3IEZvcm0odGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2Zvcm0tZmlsdGVyJykpLFxuICAgICAgdGhpcy5faW5wdXRTZWFyY2ggPSBuZXcgSW5wdXRXcmFwKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLXNlYXJjaCAuaW5wdXQtd3JhcCcpKSxcbiAgICAgIHRoaXMuaW5pdEV2ZW50KClcbiAgICApO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHtcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFNJWkVfQ0hBTkdFRCwgKCkgPT4gdGhpcy5fdENhcm91c2VsLnVwZGF0ZU1heFNob3codGhpcy5nZXRNYXhTaG93KCkpKTtcbiAgfSxcblxuICBnZXRNYXhTaG93OigpID0+IEFQUC5fVyA+IDk2MCA/IDMgOiBBUFAuX1cgPiA2NDAgJiYgQVBQLl9XIDw9IDk2MCA/IDIgOiAxXG59OyIsIi8qKiogUEFHRSAtIENMSUVOVCBORVcgUFJPSkVDVCAqKiovXG5BUFAuY2xpZW50TmV3UHJvamVjdCA9IHtcbiAgX2VsOiB7fSxcbiAgX2Zvcm06IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9lbC5fZm9ybSA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLXByb2plY3QnKSksXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKVxuICB9LFxuXG4gIGluaXRFdmVudCgpIHt9XG59OyIsIi8qKiogUEFHRSAtIENMSUVOVCBQUk9GSUxFICoqKi9cbkFQUC5jbGllbnRQcm9maWxlID0ge1xuICBfZWw6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiB0aGlzLmluaXRFdmVudCgpO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHt9XG59OyIsIi8qKiogUEFHRSAtIENMSUVOVCBQUk9GSUxFIEVESVQgKioqL1xuQVBQLmNsaWVudFByb2ZpbGVFZGl0ID0ge1xuICBfZWw6IHt9LFxuICBfZm9ybVByb2plY3Q6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9lbC5fZm9ybUVkaXQgPSBuZXcgRm9ybSh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1lZGl0JykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgIClcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBDTElFTlQgUFcgKioqL1xuQVBQLmNsaWVudFB3ID0ge1xuICBfZWw6IHt9LFxuICBfbG9naW5Gb3JtOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fbG9naW5Gb3JtID0gbmV3IEZvcm0odGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2xvZ2luLWZvcm0nKSksXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBDTElFTlQgUFJPSkVDVCBERVRBSUxTICoqKi9cbkFQUC5jbGllbnRQcm9qZWN0RGV0YWlscyA9IHtcbiAgX2VsOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gQ0xJRU5UIFJPTEUgREVUQUlMUyAqKiovXG5BUFAuY2xpZW50Um9sZURldGFpbHMgPSB7XG4gIF9lbDoge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuaW5pdEV2ZW50KClcbiAgICApO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHt9XG59OyIsIi8qKiogUEFHRSAtIENMSUVOVCBBQ0NPVU5UICoqKi9cbkFQUC5jbGllbnRBY2NvdW50ID0ge1xuICBfZWw6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiB0aGlzLmluaXRFdmVudCgpO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHt9XG59OyIsIi8qKiogUEFHRSAtIENMSUVOVCBQQVlNRU5UICoqKi9cbkFQUC5jbGllbnRQYXltZW50ID0ge1xuICBfZWw6IHt9LFxuICBfYnRuUmVtb3ZlOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fYnRuUmVtb3ZlID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvckFsbCgnLmJ0bi1yZW1vdmUnKSxcbiAgICAgIHRoaXMuaW5pdEV2ZW50KClcbiAgICApO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHtcbiAgICB0aGlzLl9idG5SZW1vdmUuZm9yRWFjaChidG4gPT4gYnRuLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIGUgPT4ge1xuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgbGV0IHRpdGxlID0gZS50YXJnZXQudGl0bGUsXG4gICAgICAgICAgZGVzYyA9IGUudGFyZ2V0LmdldEF0dHJpYnV0ZSgnZGVzYycpLFxuICAgICAgICAgIGxpbmsgPSBlLnRhcmdldC5ocmVmO1xuXG4gICAgICBBUFAucG9wdXAuX3dhcm5pbmcudXBkYXRlKHRpdGxlLCBkZXNjLCAoKSA9PiB7IHdpbmRvdy5sb2NhdGlvbiA9IGxpbmsgfSk7XG4gICAgICBBUFAucG9wdXAuX3dhcm5pbmcuc2hvdygpO1xuICAgIH0pKTtcbiAgfVxufTsiLCIvKioqIFBBR0UgLSBDTElFTlQgUEFZTUVOVCBFRElUICoqKi9cbkFQUC5jbGllbnRQYXltZW50RWRpdCA9IHtcbiAgX2VsOiB7fSxcbiAgX2xvZ2luRm9ybToge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2xvZ2luRm9ybSA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLWVkaXQnKSksXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBDTElFTlQgUEFZTUVOVCBBREQgKioqL1xuQVBQLmNsaWVudFBheW1lbnRBZGQgPSB7XG4gIF9lbDoge30sXG4gIF9sb2dpbkZvcm06IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9sb2dpbkZvcm0gPSBuZXcgRm9ybSh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1hZGQnKSksXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBPVVIgVEFMRU5UICoqKi9cbkFQUC5vdXJUYWxlbnQgPSB7XG4gIF9lbDoge30sXG4gIF9mb3JtRmlsdGVyOiB7fSxcbiAgX2JTbGlkZXI6IHt9LFxuICBfdENhcm91c2VsOiB7fSxcbiAgX3NDYXJvdXNlbDoge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2Zvcm1GaWx0ZXIgPSBuZXcgRm9ybSh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1maWx0ZXInKSksXG4gICAgICB0aGlzLl9iU2xpZGVyID0gbmV3IFNsaWRlcih0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcuYmFubmVyLXNsaWRlcicpLCAwKSxcbiAgICAgIHRoaXMuX3RDYXJvdXNlbCA9IG5ldyBDYXJvdXNlbCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcudGVzdGltb25pYWwgLmNhcm91c2VsJyksIHRydWUsIHRoaXMuZ2V0TWF4U2hvdygpKSxcbiAgICAgIHRoaXMuX3NDYXJvdXNlbCA9IG5ldyBDYXJvdXNlbCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcuc2VydmljZS1ib2FyZCAuY2Fyb3VzZWwnKSwgdHJ1ZSwgdGhpcy5nZXRNYXhTaG93KCkpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCAoKSA9PiB7XG4gICAgICB0aGlzLl90Q2Fyb3VzZWwudXBkYXRlTWF4U2hvdyh0aGlzLmdldE1heFNob3coKSksXG4gICAgICB0aGlzLl9zQ2Fyb3VzZWwudXBkYXRlTWF4U2hvdyh0aGlzLmdldE1heFNob3coKSlcbiAgICB9KTtcbiAgfSxcblxuICBnZXRNYXhTaG93OigpID0+IEFQUC5fVyA+IDk2MCA/IDMgOiBBUFAuX1cgPiA2NDAgJiYgQVBQLl9XIDw9IDk2MCA/IDIgOiAxXG59OyIsIi8qKiogUEFHRSAtIENMSUVOVCBQTEFOICoqKi9cbkFQUC5jbGllbnRQbGFuID0ge1xuICBfZWw6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBDTElFTlQgTkVXIFJPTEUgKioqL1xuQVBQLmNsaWVudE5ld1JvbGUgPSB7XG4gIF9lbDoge30sXG4gIF9mb3JtOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fZWwuX2Zvcm0gPSBuZXcgRm9ybSh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1yb2xlJykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgIClcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBDTElFTlQgRURJVCBST0xFICoqKi9cbkFQUC5jbGllbnRFZGl0Um9sZSA9IHtcbiAgX2VsOiB7fSxcbiAgX2Zvcm06IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9lbC5fZm9ybSA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLXJvbGUnKSksXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKVxuICB9LFxuXG4gIGluaXRFdmVudCgpIHt9XG59OyIsIi8qKiogUEFHRSAtIENMSUVOVCBFRElUIFBST0pFQ1QgKioqL1xuQVBQLmNsaWVudEVkaXRQcm9qZWN0ID0ge1xuICBfZWw6IHt9LFxuICBfZm9ybToge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2VsLl9mb3JtID0gbmV3IEZvcm0odGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2Zvcm0tcHJvamVjdCcpKSxcbiAgICAgIHRoaXMuaW5pdEV2ZW50KClcbiAgICApXG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gUk9MRSBERVRBSUxTICoqKi9cbkFQUC5yb2xlRGV0YWlscyA9IHtcbiAgX2VsOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gTkVXUyBFVkVOVCAqKiovXG5BUFAubmV3c0V2ZW50ID0ge1xuICBfZWw6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiB0aGlzLmluaXRFdmVudCgpO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHt9XG59OyIsIi8qKiogUEFHRSAtIFJFRE8gUk9MRSBERVRBSUxTICoqKi9cbkFQUC5yZWRvUm9sZURldGFpbHMgPSB7XG4gIF9lbDoge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIHRoaXMuaW5pdEV2ZW50KCk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gUkVETyBST0xFIFNVQk1JVCAqKiovXG5BUFAucmVkb1JvbGVTdWJtaXQgPSB7XG4gIF9lbDoge30sXG4gIF9mb3JtOiB7fSxcbiAgX2FkZExpbms6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9mb3JtID0gbmV3IEZvcm0odGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2Zvcm0tcm9sZS1zdWJtaXQnKSksXG4gICAgICB0aGlzLl9hZGRMaW5rID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvckFsbCgnLmFkZC1saW5rJyksXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7XG4gICAgdGhpcy5fYWRkTGluay5mb3JFYWNoKGJ0biA9PiBidG4uYWRkRXZlbnRMaXN0ZW5lcihDTElDSywgZSA9PiB7XG4gICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICBBUFAucG9wdXAuX3VwbG9hZC5zaG93KGJ0bi5kYXRhc2V0KTtcbiAgICB9KSk7XG4gIH1cbn07IiwiLyoqKiBQQUdFIC0gUkVETyBQUk9KRUNUIERFVEFJTFMgKioqL1xuQVBQLnJlZG9Qcm9qZWN0RGV0YWlscyA9IHtcbiAgX2VsOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgdGhpcy5pbml0RXZlbnQoKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBSRURPIFBST0pFQ1QgQlJFQUtET1dOICoqKi9cbkFQUC5yZWRvUHJvamVjdEJyZWFrZG93biA9IHtcbiAgX2VsOiB7fSxcbiAgX2Zvcm1GaWx0ZXI6IHt9LFxuICBfaW5wdXRTZWFyY2g6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9mb3JtRmlsdGVyID0gbmV3IEZvcm0odGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2Zvcm0tZmlsdGVyJykpLFxuICAgICAgdGhpcy5faW5wdXRTZWFyY2ggPSBuZXcgSW5wdXRXcmFwKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLXNlYXJjaCAuaW5wdXQtd3JhcCcpKSxcbiAgICAgIHRoaXMuaW5pdEV2ZW50KClcbiAgICApO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHt9XG59OyIsIi8qKiogUEFHRSAtIFRBTEVOVCBTRVJWSUNFUyAqKiovXG5BUFAudGFsZW50U2VydmljZXMgPSB7XG4gIF9lbDoge30sXG4gIF9iU2xpZGVyOiB7fSxcbiAgX2JDYXJvdXNlbDoge30sXG4gIF9zQ2Fyb3VzZWw6IHt9LFxuICBfdmlkU2VjdGlvbjoge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2JTbGlkZXIgPSBuZXcgU2xpZGVyKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5iYW5uZXItc2xpZGVyJyksIDApLFxuICAgICAgdGhpcy5fYkNhcm91c2VsID0gbmV3IENhcm91c2VsKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5iZW5lZml0IC5jYXJvdXNlbCcpLCB0cnVlLCB0aGlzLmdldE1heEJlbmVmaXRTaG93KCkpLFxuICAgICAgdGhpcy5fc0Nhcm91c2VsID0gbmV3IENhcm91c2VsKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5zZXJ2aWNlLWJvYXJkIC5jYXJvdXNlbCcpLCB0cnVlLCB0aGlzLmdldE1heFNlcnZpY2VTaG93KCkpLFxuICAgICAgdGhpcy5fdmlkU2VjdGlvbiA9IG5ldyBWaWRlb1NlY3Rpb24odGhpcy5fZWwucXVlcnlTZWxlY3RvcignLnZpZC1zZWN0aW9uJykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCAoKSA9PiB7XG4gICAgICB0aGlzLl9iQ2Fyb3VzZWwudXBkYXRlTWF4U2hvdyh0aGlzLmdldE1heEJlbmVmaXRTaG93KCkpLFxuICAgICAgdGhpcy5fc0Nhcm91c2VsLnVwZGF0ZU1heFNob3codGhpcy5nZXRNYXhTZXJ2aWNlU2hvdygpKVxuICAgIH0pO1xuICB9LFxuXG4gIGdldE1heEJlbmVmaXRTaG93OigpID0+IEFQUC5fVyA+IDEyMDAgPyA0IDogQVBQLl9XID4gOTYwICYmIEFQUC5fVyA8PSAxMjAwID8gMyA6IEFQUC5fVyA+IDY0MCAmJiBBUFAuX1cgPD0gOTYwID8gMiA6IDEsXG4gIGdldE1heFNlcnZpY2VTaG93OigpID0+IEFQUC5fVyA+IDk2MCA/IDMgOiBBUFAuX1cgPiA2NDAgJiYgQVBQLl9XIDw9IDk2MCA/IDIgOiAxXG59O1xuIiwiLyoqKiBQQUdFIC0gUEhBU0UgMiBDTElFTlQgREFTSCBCT0FSRCAqKiovXG5BUFAucDJDbGllbnREYXNoQm9hcmQgPSB7XG4gIF9lbDoge30sXG4gIF9idG5Nb3JlOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fYnRuTW9yZSA9IHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3JBbGwoJy5idG4tbW9yZScpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge1xuICAgIHRoaXMuX2J0bk1vcmUuZm9yRWFjaChidG4gPT4gYnRuLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIGUgPT4ge1xuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgYnRuLmNsYXNzTGlzdC5jb250YWlucyhDTEFTUy5fYWN0aXZlKSB8fCB0aGlzLl9idG5Nb3JlLmZvckVhY2goYnRuID0+IGJ0bi5jbGFzc0xpc3QucmVtb3ZlKENMQVNTLl9hY3RpdmUpKTtcbiAgICAgIGJ0bi5jbGFzc0xpc3QudG9nZ2xlKENMQVNTLl9hY3RpdmUpO1xuICAgIH0pKTtcbiAgfVxufTsiLCIvKioqIFBBR0UgLSBQSEFTRSAyIENMSUVOVCBNQU5BR0UgUFJPSkVDVCAqKiovXG5BUFAucDJDbGllbnRNYW5hZ2VQcm9qZWN0ID0ge1xuICBfZWw6IHt9LFxuICBfZm9ybUZpbHRlcjoge30sXG4gIF9pbnB1dFNlYXJjaDoge30sXG4gIF9idG5Nb3JlOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fZm9ybUZpbHRlciA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLWZpbHRlcicpKSxcbiAgICAgIHRoaXMuX2lucHV0U2VhcmNoID0gbmV3IElucHV0V3JhcCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1zZWFyY2ggLmlucHV0LXdyYXAnKSksXG4gICAgICB0aGlzLl9idG5Nb3JlID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvckFsbCgnLmJ0bi1tb3JlJyksXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7XG4gICAgdGhpcy5fYnRuTW9yZS5mb3JFYWNoKGJ0biA9PiBidG4uYWRkRXZlbnRMaXN0ZW5lcihDTElDSywgZSA9PiB7XG4gICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICBidG4uY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTLl9hY3RpdmUpIHx8IHRoaXMuX2J0bk1vcmUuZm9yRWFjaChidG4gPT4gYnRuLmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1MuX2FjdGl2ZSkpO1xuICAgICAgYnRuLmNsYXNzTGlzdC50b2dnbGUoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgfSkpO1xuICB9XG59OyIsIi8qKiogUEFHRSAtIFBIQVNFIDIgQ0xJRU5UIEFERCBQUk9KRUNUICoqKi9cbkFQUC5wMkNsaWVudFByb2plY3QgPSB7XG4gIF9lbDoge30sXG4gIF9mb3JtOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fZWwuX2Zvcm0gPSBuZXcgRm9ybSh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1wcm9qZWN0JykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgIClcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBQSEFTRSAyIENMSUVOVCBQUk9KRUNUIERFVEFJTFMgKioqL1xuQVBQLnAyQ2xpZW50UHJvamVjdERldGFpbHMgPSB7XG4gIF9lbDoge30sXG4gIF9mb3JtRmlsdGVyOiB7fSxcbiAgX2lucHV0U2VhcmNoOiB7fSxcbiAgX3Byb2pMaXN0OiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fZm9ybUZpbHRlciA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLWZpbHRlcicpKSxcbiAgICAgIHRoaXMuX2lucHV0U2VhcmNoID0gbmV3IElucHV0V3JhcCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1zZWFyY2ggLmlucHV0LXdyYXAnKSksXG4gICAgICB0aGlzLl9wcm9qTGlzdCA9IG5ldyBQcm9qZWN0TGlzdCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjcHJvamVjdC1saXN0JykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgIClcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBQSEFTRSAyIENMSUVOVCBST0xFICoqKi9cbkFQUC5wMkNsaWVudFJvbGUgPSB7XG4gIF9lbDoge30sXG4gIF9mb3JtOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fZWwuX2Zvcm0gPSBuZXcgRm9ybSh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1yb2xlJykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgIClcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBQSEFTRSAyIENMSUVOVCBST0xFIERFVEFJTFMgKioqL1xuQVBQLnAyQ2xpZW50Um9sZURldGFpbHMgPSB7XG4gIF9lbDoge30sXG4gIF9mb3JtRmlsdGVyOiB7fSxcbiAgX2lucHV0U2VhcmNoOiB7fSxcbiAgX3Byb2pMaXN0OiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fZm9ybUZpbHRlciA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLWZpbHRlcicpKSxcbiAgICAgIHRoaXMuX2lucHV0U2VhcmNoID0gbmV3IElucHV0V3JhcCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1zZWFyY2ggLmlucHV0LXdyYXAnKSksXG4gICAgICB0aGlzLl9wcm9qTGlzdCA9IG5ldyBQcm9qZWN0TGlzdCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjcHJvamVjdC1saXN0JykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgIClcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBQSEFTRSAyIENMSUVOVCBPVVIgVEFMRU5UUyAqKiovXG5BUFAucDJDbGllbnRPdXJUYWxlbnRzID0ge1xuICBfZWw6IHt9LFxuICBfZm9ybUZpbHRlcjoge30sXG4gIF9pbnB1dFNlYXJjaDoge30sXG4gIF9wcm9qTGlzdDoge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2Zvcm1GaWx0ZXIgPSBuZXcgRm9ybSh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1maWx0ZXInKSksXG4gICAgICB0aGlzLl9pbnB1dFNlYXJjaCA9IG5ldyBJbnB1dFdyYXAodGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2Zvcm0tc2VhcmNoIC5pbnB1dC13cmFwJykpLFxuICAgICAgdGhpcy5fcHJvakxpc3QgPSBuZXcgUHJvamVjdExpc3QodGhpcy5fZWwucXVlcnlTZWxlY3RvcignI3Byb2plY3QtbGlzdCcpKSxcbiAgICAgIHRoaXMuaW5pdEV2ZW50KClcbiAgICApXG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gUEhBU0UgMiBDTElFTlQgVEFMRU5UIERFVEFJTFMgKioqL1xuQVBQLnAyQ2xpZW50VGFsZW50RGV0YWlscyA9IHtcbiAgX2VsOiB7fSxcbiAgX2J0bk5vbmU6IHt9LFxuICBfYnRuSGlyZToge30sXG4gIF9wb3B1cEhpcmU6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9idG5Ob25lID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvcignLnAyLWhlYWRlci13cmFwIC5idG4tbm9uZScpLFxuICAgICAgdGhpcy5fYnRuSGlyZSA9IHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5wMi1oZWFkZXItd3JhcCAuYnRuLWhpcmUnKSxcbiAgICAgIHRoaXMuX3BvcHVwSGlyZSA9IG5ldyBQb3B1cEZvcm0oJyNwb3B1cC1oaXJlJyksXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7XG4gICAgdGhpcy5fYnRuTm9uZSAmJiB0aGlzLl9idG5Ob25lLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIHRoaXMuc2hvd1BvcHVwQWxlcnQpO1xuICAgIHRoaXMuX2J0bkhpcmUgJiYgdGhpcy5fYnRuSGlyZS5hZGRFdmVudExpc3RlbmVyKENMSUNLLCBlID0+IChlLnByZXZlbnREZWZhdWx0KCksIHRoaXMuX3BvcHVwSGlyZS5zaG93KCkpKTtcbiAgfSxcblxuICBzaG93UG9wdXBBbGVydChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIGxldCBkYXRhID0gZS50YXJnZXQuZGF0YXNldCxcbiAgICAgICAgaHRtbCA9IGA8YSBocmVmPVwiJHtkYXRhLnVybH1cIiBjbGFzcz1cImJ0bi1ib3JkZXItZ29sZCB0eXBlLTMgY3RhXCIgcm9sZT1cImJ1dHRvblwiPiR7ZGF0YS5jdGF9PGkgY2xhc3M9XCJpY29uLXBsdXNcIj48L2k+PC9hPmA7XG5cbiAgICBBUFAucG9wdXAuX2FsZXJ0LnVwZGF0ZShkYXRhLnRpdGxlLCBkYXRhLmRlc2MsIGh0bWwpO1xuICAgIEFQUC5wb3B1cC5fYWxlcnQuc2hvdygpO1xuICB9XG59OyIsIi8qKiogUEFHRSAtIFBIQVNFIDIgQ0xJRU5UIElORk8gKioqL1xuQVBQLnAyQ2xpZW50SW5mbyA9IHtcbiAgX2VsOiB7fSxcbiAgX2Zvcm06IHt9LFxuICBfYnRuUGF5bWVudDoge30sXG4gIF9wb3B1cFBheW1lbnQ6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9lbC5fZm9ybSA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLXByb2ZpbGUnKSksXG4gICAgICB0aGlzLl9idG5QYXltZW50ID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvckFsbCgnLmJ0bi1wYXltZW50JyksXG4gICAgICB0aGlzLl9wb3B1cFBheW1lbnQgPSBuZXcgUG9wdXBQYXltZW50KCcjcG9wdXAtcGF5bWVudCcpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge1xuICAgIHRoaXMuX2J0blBheW1lbnQuZm9yRWFjaChidG4gPT4gYnRuLmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIGUgPT4ge1xuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgdGhpcy5fcG9wdXBQYXltZW50LnNob3coYnRuLmRhdGFzZXQpO1xuICAgIH0pKTtcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKHRoaXMuX3BvcHVwUGF5bWVudC5nZXRFdmVudE5hbWUoKSwgKCkgPT4gdGhpcy5fcG9wdXBQYXltZW50LmhpZGUoKSk7XG4gIH1cbn07IiwiLyoqKiBQQUdFIC0gUEhBU0UgMiBUQUxFTlQgQklMTEJPQVJEICoqKi9cbkFQUC5wMlRhbGVudEJpbGxib2FyZCA9IHtcbiAgX2VsOiB7fSxcbiAgX2Zvcm1GaWx0ZXI6IHt9LFxuICBfaW5wdXRTZWFyY2g6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9mb3JtRmlsdGVyID0gbmV3IEZvcm0odGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2Zvcm0tZmlsdGVyJykpLFxuICAgICAgdGhpcy5faW5wdXRTZWFyY2ggPSBuZXcgSW5wdXRXcmFwKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLXNlYXJjaCAuaW5wdXQtd3JhcCcpKSxcbiAgICAgIHRoaXMuaW5pdEV2ZW50KClcbiAgICApO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHtcbiAgfVxufTsiLCIvKioqIFBBR0UgLSBDQVNUSU5HIFNFUlZJQ0VTICoqKi9cbkFQUC5jYXN0aW5nU2VydmljZXMgPSB7XG4gIF9lbDoge30sXG4gIF9zQ2Fyb3VzZWw6IHt9LFxuICBfdmlkU2VjdGlvbjoge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX3NDYXJvdXNlbCA9IG5ldyBDYXJvdXNlbCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcuc2VydmljZS1ib2FyZCAuY2Fyb3VzZWwnKSwgdHJ1ZSwgdGhpcy5nZXRNYXhTaG93KCkpLFxuICAgICAgdGhpcy5fdmlkU2VjdGlvbiA9IG5ldyBWaWRlb1NlY3Rpb24odGhpcy5fZWwucXVlcnlTZWxlY3RvcignLnZpZC1zZWN0aW9uJykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCB0aGlzLl9zQ2Fyb3VzZWwudXBkYXRlTWF4U2hvdyh0aGlzLmdldE1heFNob3coKSkpO1xuICB9LFxuXG4gIGdldE1heFNob3c6KCkgPT4gQVBQLl9XID4gOTYwID8gMyA6IEFQUC5fVyA+IDY0MCAmJiBBUFAuX1cgPD0gOTYwID8gMiA6IDFcbn07IiwiLyoqKiBQQUdFIC0gUEhBU0UgMiBUQUxFTlQgUk9MRSBERVRBSUxTICoqKi9cbkFQUC5wMlRhbGVudHRSb2xlRGV0YWlscyA9IHtcbiAgX2VsOiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgIClcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBQSEFTRSAyIFRBTEVOVCBQUk9KRUNUIERFVEFJTFMgKioqL1xuQVBQLnAyVGFsZW50UHJvakR0cyA9IHtcbiAgX2VsOiB7fSxcbiAgX2Zvcm1GaWx0ZXI6IHt9LFxuICBfaW5wdXRTZWFyY2g6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9mb3JtRmlsdGVyID0gbmV3IEZvcm0odGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2Zvcm0tZmlsdGVyJykpLFxuICAgICAgdGhpcy5faW5wdXRTZWFyY2ggPSBuZXcgSW5wdXRXcmFwKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLXNlYXJjaCAuaW5wdXQtd3JhcCcpKSxcbiAgICAgIHRoaXMuaW5pdEV2ZW50KClcbiAgICApXG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gUEhBU0UgMiBUQUxFTlQgUk9MRSBTVUJNSVQgKioqL1xuQVBQLnAyVGFsZW50Um9sZVN1Ym1pdCA9IHtcbiAgX2VsOiB7fSxcbiAgX2Zvcm06IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9mb3JtID0gbmV3IEZvcm0odGhpcy5fZWwucXVlcnlTZWxlY3RvcignI2Zvcm0tcm9sZS1zdWJtaXQnKSksXG4gICAgICB0aGlzLmluaXRFdmVudCgpXG4gICAgKTtcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7fVxufTsiLCIvKioqIFBBR0UgLSBQSEFTRSAyIFRBTEVOVCBNQU5BR0UgUk9MRVMgKioqL1xuQVBQLnAyVGFsZW50TWFuYWdlUm9sZXMgPSB7XG4gIF9lbDoge30sXG4gIF9mb3JtRmlsdGVyOiB7fSxcbiAgX2lucHV0U2VhcmNoOiB7fSxcbiAgX3Byb2pMaXN0OiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fZm9ybUZpbHRlciA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLWZpbHRlcicpKSxcbiAgICAgIHRoaXMuX2lucHV0U2VhcmNoID0gbmV3IElucHV0V3JhcCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjZm9ybS1zZWFyY2ggLmlucHV0LXdyYXAnKSksXG4gICAgICB0aGlzLl9wcm9qTGlzdCA9IG5ldyBQcm9qZWN0TGlzdCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcjcHJvamVjdC1saXN0JykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gUEhBU0UgMiBUQUxFTlQgUk9MRSBSRVFVRVNUICoqKi9cbkFQUC5wMlRhbGVudFJvbGVSZXF1ZXN0ID0ge1xuICBfZWw6IHt9LFxuICBfcmVxdWVzdEN0cjoge30sXG4gIF9idG5SZXF1ZXN0OiB7fSxcbiAgX2Zvcm06IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9yZXF1ZXN0Q3RyID0gbmV3IFJlcXVlc3RDdHIodGhpcy5fZWwpLFxuICAgICAgdGhpcy5fYnRuUmVxdWVzdCA9IHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNidG4tcmVxdWVzdCcpLFxuICAgICAgdGhpcy5fZm9ybSA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLXJvbGUtc3VibWl0JykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgIClcbiAgfSxcblxuICBpbml0RXZlbnQoKSB7XG4gICAgdGhpcy5fYnRuUmVxdWVzdCAmJiB0aGlzLl9idG5SZXF1ZXN0LmFkZEV2ZW50TGlzdGVuZXIoQ0xJQ0ssIGUgPT4ge1xuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgbGV0IGRhdGEgPSBlLnRhcmdldC5kYXRhc2V0O1xuICAgICAgQVBQLnBvcHVwLl93YXJuaW5nLnVwZGF0ZShkYXRhLnRpdGxlLCBkYXRhLmRlc2MsICgpID0+IHRoaXMuc3VibWl0UmVxdWVzdCgpKTtcbiAgICAgIEFQUC5wb3B1cC5fd2FybmluZy5zaG93KCk7XG4gICAgfSk7XG4gIH0sXG5cbiAgc3VibWl0UmVxdWVzdCgpIHtcbiAgICBBUFAucG9wdXAuX3dhcm5pbmcuaGlkZSgpO1xuICAgIHRoaXMuX2Zvcm0ucmVxdWVzdFN1Ym1pdCgpO1xuICB9XG59OyIsIi8qKiogUEFHRSAtIFBIQVNFIDIgVEFMRU5UIElORk8gKioqL1xuQVBQLnAyVGFsZW50SW5mbyA9IHtcbiAgX2VsOiB7fSxcbiAgX2Zvcm06IHt9LFxuICBfYnRuUGF5bWVudDoge30sXG4gIF9wb3B1cFBheW1lbnQ6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9lbC5fZm9ybSA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJyNmb3JtLXByb2ZpbGUnKSksXG4gICAgICB0aGlzLl9idG5QYXltZW50ID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvckFsbCgnLmJ0bi1wYXltZW50JyksXG4gICAgICB0aGlzLl9wb3B1cFBheW1lbnQgPSBuZXcgUG9wdXBQYXltZW50KCcjcG9wdXAtcGF5bWVudCcpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG5cbiAgICAvLyBBUFAucG9wdXAuX2FsZXJ0LnVwZGF0ZSgnUGF5bWVudCBTdWNjZXNzJywgJ1RoYW5rIHlvdSBmb3IgcHVyY2hhc2luZyB0aGUgdXBncmFkZSBwYWNrYWdlIScsICc8YSBjbGFzcz1cImJ0bi1nb2xkLWJhY2tcIiBocmVmPVwiMS1ob21lLmh0bWxcIj5iYWNrIHRvIGhvbWVwYWdlPC9hPicpO1xuICAgIC8vIEFQUC5wb3B1cC5fYWxlcnQuc2hvdygpO1xuXG4gICAgLy8gQVBQLnBvcHVwLl9hbGVydC51cGRhdGUoJ1BheW1lbnQgZmFpbGVkJywgJ1dlIGFyZSB1bmFibGUgdG8gcHJvY2VzcyBwYXltZW50IGZvciB0aGlzIHRyYW5zYWN0aW9uLiBQbGVhc2UgdHJ5IGFnYWluIG9yIGNvbnRhY3QgdXMuJywgJzxhIGNsYXNzPVwiYnRuLWdvbGQtYmFja1wiIGhyZWY9XCIjXCIgcm9sZT1cImJ1dHRvblwiIG9uY2xpY2s9XCJ3aW5kb3cubG9jYXRpb24ucmVsb2FkKClcIj5yZXRyeSBwYXltZW50PC9hPicpO1xuICAgIC8vIEFQUC5wb3B1cC5fYWxlcnQuc2hvdygpO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHtcbiAgICB0aGlzLl9idG5QYXltZW50LmZvckVhY2goYnRuID0+IGJ0bi5hZGRFdmVudExpc3RlbmVyKENMSUNLLCBlID0+IHtcbiAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgIHRoaXMuX3BvcHVwUGF5bWVudC5zaG93KGJ0bi5kYXRhc2V0KTtcbiAgICB9KSk7XG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcih0aGlzLl9wb3B1cFBheW1lbnQuZ2V0RXZlbnROYW1lKCksICgpID0+IHRoaXMuX3BvcHVwUGF5bWVudC5oaWRlKCkpO1xuICB9XG59OyIsIi8qKiogUEFHRSAtIFNJR05VUCAqKiovXG5BUFAuc2lnbnVwID0ge1xuICBfZWw6IHt9LFxuICBfc2lnblVwVGFsZW50OiB7fSxcbiAgX3NpZ25VcENsaWVudDoge30sXG4gIF9idG5TaWduVXBUYWxlbnQ6IHt9LFxuICBfYnRuU2lnblVwQ2xpZW50OiB7fSxcblxuXHRpbml0KCkge1xuICAgIHRoaXMuX2VsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignIycgKyBBUFAuX3BhZ2VJRCk7XG4gICAgdGhpcy5fZWwgJiYgKFxuICAgICAgdGhpcy5fYnRuU2lnblVwVGFsZW50ID0gdGhpcy5fZWwucXVlcnlTZWxlY3RvcignLmJ0bi1zaWdudXAtdGFsZW50JyksXG4gICAgICB0aGlzLl9idG5TaWduVXBDbGllbnQgPSB0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcuYnRuLXNpZ251cC1jbGllbnQnKSxcbiAgICAgIHRoaXMuX3NpZ25VcFRhbGVudCA9IG5ldyBTaWduVXBQb3B1cCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcuc2lnbnVwLXRhbGVudCcpKSxcbiAgICAgIHRoaXMuX3NpZ25VcENsaWVudCA9IG5ldyBTaWduVXBQb3B1cCh0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcuc2lnbnVwLWNsaWVudCcpKSxcbiAgICAgIHRoaXMuaW5pdEV2ZW50KCksXG4gICAgICB0aGlzLmNoZWNrSGFzaCgpXG4gICAgKTtcbiAgICB0aGlzLl9zaWduVXBUYWxlbnQuc2hvdygpO1xuICAgIC8vIHRoaXMuX3NpZ25VcENsaWVudC5nb1RvKDUpO1xuICB9LFxuXG4gIGluaXRFdmVudCgpIHtcbiAgICB0aGlzLl9idG5TaWduVXBUYWxlbnQuYWRkRXZlbnRMaXN0ZW5lcihDTElDSywgKGUpID0+IHtcbiAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgIHRoaXMuX3NpZ25VcFRhbGVudC5zaG93KCk7XG4gICAgfSk7XG5cbiAgICB0aGlzLl9idG5TaWduVXBDbGllbnQuYWRkRXZlbnRMaXN0ZW5lcihDTElDSywgKGUpID0+IHtcbiAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgIHRoaXMuX3NpZ25VcENsaWVudC5zaG93KCk7XG4gICAgfSk7XG5cbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFNJWkVfQ0hBTkdFRCwgKCkgPT4ge1xuICAgICAgdGhpcy5fc2lnblVwVGFsZW50LnVwZGF0ZVNpemUoKTtcbiAgICAgIHRoaXMuX3NpZ25VcENsaWVudC51cGRhdGVTaXplKCk7XG4gICAgfSk7XG4gIH0sXG5cbiAgY2hlY2tIYXNoKCkge1xuICAgIGlmICh3aW5kb3cubG9jYXRpb24uaGFzaC5sZW5ndGggPT09IDApIHJldHVybiBmYWxzZTtcbiAgICBzd2l0Y2god2luZG93LmxvY2F0aW9uLmhhc2gpIHtcbiAgICAgIGNhc2UgJyNzaWdudXAtdGFsZW50JzogdGhpcy5fYnRuU2lnblVwVGFsZW50LmNsaWNrKCk7IGJyZWFrO1xuICAgICAgY2FzZSAnI3NpZ251cC1jbGllbnQnOiB0aGlzLl9idG5TaWduVXBDbGllbnQuY2xpY2soKTsgYnJlYWs7XG4gICAgfVxuICB9XG59OyIsIi8qKiogUEFHRSAtIExPR0lOICoqKi9cbkFQUC5sb2dpbiA9IHtcbiAgX2VsOiB7fSxcbiAgX2xvZ2luRm9ybToge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIChcbiAgICAgIHRoaXMuX2xvZ2luRm9ybSA9IG5ldyBGb3JtKHRoaXMuX2VsLnF1ZXJ5U2VsZWN0b3IoJy5sb2dpbi1mb3JtJykpLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gQUJPVVQgVVMgKioqL1xuQVBQLmFib3V0VXMgPSB7XG4gIF9lbDoge30sXG5cblx0aW5pdCgpIHtcbiAgICB0aGlzLl9lbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyMnICsgQVBQLl9wYWdlSUQpO1xuICAgIHRoaXMuX2VsICYmIHRoaXMuaW5pdEV2ZW50KCk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKiBQQUdFIC0gUE9TVCBERVRBSUxTICoqKi9cbkFQUC5wb3N0RGV0YWlscyA9IHtcbiAgX2VsOiB7fSxcbiAgX2FTbGlkZXI6IHt9LFxuXG5cdGluaXQoKSB7XG4gICAgdGhpcy5fZWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjJyArIEFQUC5fcGFnZUlEKTtcbiAgICB0aGlzLl9lbCAmJiAoXG4gICAgICB0aGlzLl9hU2xpZGVyID0gbmV3IFNsaWRlcih0aGlzLl9lbC5xdWVyeVNlbGVjdG9yKCcuYXNpZGUtc2xpZGVyJyksIDApLFxuICAgICAgdGhpcy5pbml0RXZlbnQoKVxuICAgICk7XG4gIH0sXG5cbiAgaW5pdEV2ZW50KCkge31cbn07IiwiLyoqKioqIENoZWNrIEJveCAqKioqKi9cbmxldCBDaHhCb3ggPSBmdW5jdGlvbihlbGVtZW50KSB7XG5cdGxldCBlbCA9ICQoZWxlbWVudCksXG5cdFx0XHRpbnB1dCA9IGVsLmZpbmQoJ2lucHV0JyksXG4gICAgICB3YXJuaW5nID0gZWwuZmluZCgnLndhcm5pbmcnKSxcbiAgICAgIGNoZWNrUnEgPSBlbC5oYXNDbGFzcyhDTEFTUy5fcmVxdWlyZSksXG4gICAgICBjaGVja01pbiA9IGVsLmhhc0NsYXNzKENMQVNTLl9taW4pLFxuICAgICAgY2hlY2tNYXggPSBlbC5oYXNDbGFzcyhDTEFTUy5fbWF4KSxcblxuXHRcdFx0dHh0UnEgPSBjaGVja1JxID8gZWwuYXR0cigncmVxdWlyZWQtdHh0JykgOiBudWxsLFxuICAgICAgdHh0TWluID0gY2hlY2tNaW4gPyBlbC5hdHRyKCdtaW4tdHh0JykgOiBudWxsLFxuICAgICAgbWluID0gY2hlY2tNaW4gPyBwYXJzZUludChlbC5kYXRhKCdtaW4nKSkgOiAwLFxuICAgICAgdHh0TWF4ID0gY2hlY2tNYXggPyBlbC5hdHRyKCdtYXgtdHh0JykgOiBudWxsLFxuICAgICAgbWF4ID0gY2hlY2tNYXggPyBwYXJzZUludChlbC5kYXRhKCdtYXgnKSkgOiAwO1xuXG4gICgoKSA9PiBpbml0RXZlbnQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIGlucHV0Lm9uKCdjaGFuZ2UnLCAoKSA9PiB3YXJuaW5nLnJlbW92ZUNsYXNzKENMQVNTLl9kbGV4KSk7XG4gIH1cblxuICB0aGlzLnZhbGlkYXRlID0gKCkgPT4ge1xuICAgIC8vIGNvbnNvbGUubG9nKCdjaGVjayBib3ggdmFsaWRhdGUnKTtcbiAgICBsZXQgcGFzcyA9IHRydWUsXG4gICAgICAgIGNoZWNrZWQgPSBpbnB1dC5maWx0ZXIoJzpjaGVja2VkJykubGVuZ3RoO1xuXG4gICAgcGFzcyA9IGNoZWNrUnEgPyAoaW5wdXQuaXMoJzpjaGVja2VkJykgPyB0cnVlIDogKHdhcm5pbmcudGV4dCh0eHRScSkuYWRkQ2xhc3MoQ0xBU1MuX2RsZXgpLCBmYWxzZSkpIDogdHJ1ZTtcbiAgICBwYXNzICYmIChwYXNzID0gY2hlY2tNaW4gPyAoKGNoZWNrZWQgPj0gbWluKSA/IHRydWUgOiAod2FybmluZy50ZXh0KHR4dE1pbikuYWRkQ2xhc3MoQ0xBU1MuX2RsZXgpLCBmYWxzZSkpIDogdHJ1ZSk7XG4gICAgcGFzcyAmJiAocGFzcyA9IGNoZWNrTWF4ID8gKChjaGVja2VkIDw9IG1heCkgPyB0cnVlIDogKHdhcm5pbmcudGV4dCh0eHRNYXgpLmFkZENsYXNzKENMQVNTLl9kbGV4KSwgZmFsc2UpKSA6IHRydWUpO1xuXG4gICAgcmV0dXJuIHBhc3M7XG4gIH1cblxuXG5cdHRoaXMucmVzZXQgPSAoKSA9PiAoaW5wdXQucHJvcCgnY2hlY2tlZCcsIGZhbHNlKSwgd2FybmluZy5yZW1vdmVDbGFzcyhDTEFTUy5fZGxleCkpO1xuXHRyZXR1cm4gdGhpcztcbn07IiwiLyoqKioqIEZpbGUgTGlzdCBDb250cm9sICoqKioqL1xubGV0IEZpbGVMaXN0Q3RyID0gZnVuY3Rpb24oZWxlbWVudCkge1xuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgZWxXcmFwID0gZWwucGFyZW50KCksXG4gICAgICBpbnB1dCA9IGVsLmZpbmQoJ2lucHV0W3R5cGU9ZmlsZV0nKSxcbiAgICAgIGZpbGVMaXN0ID0gZWwuZmluZCgnPiAubGlzdC1maWxlJyksXG4gICAgICBtYXggPSBwYXJzZUludChpbnB1dC5kYXRhKCdtYXgnKSksXG4gICAgICBhbGxvd1R5cGUgPSBpbnB1dC5hdHRyKCdhY2NlcHQnKS5zcGxpdCgnLCcpLFxuICAgICAgYjY0QXJyYXkgPSBbXSxcbiAgICAgIGxpc3QgPSB7fSxcbiAgICAgIGhhc09sZEZpbGUgPSBmaWxlTGlzdC5maW5kKCcuaXRlbScpLmxlbmd0aCA+IDAgPyB0cnVlIDogZmFsc2UsXG4gICAgICBtYXhGaWxlID0gcGFyc2VJbnQoZWwuZGF0YSgnbWF4JykpO1xuXG4gICgoKSA9PiBpbml0KCkpKCk7XG4gIGZ1bmN0aW9uIGluaXQoKSB7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgaW5wdXQub24oQ0hBTkdFLCBmdW5jdGlvbigpIHtcbiAgICAgIGxldCByZWFkZXIgPSB7fSxcbiAgICAgICAgICBmaWxlQXJyYXkgPSBmaWx0ZXJGaWxlKGlucHV0LmdldCgwKS5maWxlcyksXG4gICAgICAgICAgYXJyYXlMZW5ndGggPSBmaWxlQXJyYXkubGVuZ3RoLFxuICAgICAgICAgIGZsYWcgPSAwO1xuXG4gICAgICAvLyBmaWxlTGlzdC5lbXB0eSgpO1xuICAgICAgLy8gYjY0QXJyYXkgPSBbXTtcbiAgICAgIGhhc09sZEZpbGUgJiYgZmlsZUFycmF5ICYmIHJlbW92ZU9sZEZpbGUoKTtcbiAgICAgIGZpbGVBcnJheSAmJiBmaWxlQXJyYXkuZm9yRWFjaCgoZmlsZSwgaW5kZXgpID0+IHtcbiAgICAgICAgcmVhZGVyID0gbmV3IEZpbGVSZWFkZXIoKTtcbiAgICAgICAgcmVhZGVyLnJlYWRBc0RhdGFVUkwoZmlsZSk7XG4gICAgICAgIHJlYWRlci5vbmxvYWQgPSBlID0+IHtcbiAgICAgICAgICBhZGRGaWxlKGluZGV4LCBmaWxlKTtcbiAgICAgICAgICBiNjRBcnJheS5wdXNoKGUudGFyZ2V0LnJlc3VsdCk7XG4gICAgICAgICAgY2hlY2tNYXgoKTtcbiAgICAgICAgICAoKytmbGFnID09PSBhcnJheUxlbmd0aCkgJiYgaW5pdENsaWNrRXZlbnQoKTtcbiAgICAgICAgfTtcbiAgICAgIH0pO1xuICAgIH0pO1xuICB9XG5cbiAgZnVuY3Rpb24gZmlsdGVyRmlsZShmaWxlcykge1xuICAgIGxldCBmaWxlQXJyYXkgPSBbXTtcbiAgICBbLi4uZmlsZXNdLmZvckVhY2goZSA9PiAoZS5zaXplIC8gKDEwMDAqMTAwMCkudG9GaXhlZCgyKSA8IG1heCAmJiBhbGxvd1R5cGUuaW5jbHVkZXMoZS50eXBlKSkgJiYgZmlsZUFycmF5LnB1c2goZSkpO1xuICAgIHJldHVybiBmaWxlQXJyYXk7XG4gIH1cblxuICBmdW5jdGlvbiBhZGRGaWxlKGluZGV4LCBmaWxlKSB7XG4gICAgLy8gaW5kZXhGaWxlID0gaW5kZXhGaWxlICsgaW5kZXg7XG4gICAgbGV0IHNpemUgPSAoZmlsZS5zaXplIC8gKDEwMDAqMTAwMCkpLnRvRml4ZWQoMiksXG4gICAgICAgIGh0bWwgPSBgPGxpIGNsYXNzPVwiaXRlbVwiPlxuICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImZpbGUtaW5mb1wiPlxuICAgICAgICAgICAgICAgICAgICA8c3Bhbj4ke2ZpbGUubmFtZX08L3NwYW4+XG4gICAgICAgICAgICAgICAgICAgIDxzcGFuPiR7c2l6ZX0gTUI8L3NwYW4+XG4gICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgIDxhIGhyZWY9XCIjXCIgcm9sZT1cImJ1dHRvblwiIGNsYXNzPVwiZmlsZS1yZW1vdmVcIj48L2E+XG4gICAgICAgICAgICAgICAgPC9saT5gO1xuICAgIGZpbGVMaXN0LmFwcGVuZChodG1sKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGluaXRDbGlja0V2ZW50KCkge1xuICAgIGxldCBidG5SZW1vdmUgPSBlbC5maW5kKCcuZmlsZS1yZW1vdmUnKTtcblxuICAgIGJ0blJlbW92ZS5lYWNoKGkgPT4gYnRuUmVtb3ZlLmVxKGkpLmRhdGEoJ2luZGV4JywgaSkpO1xuICAgIGJ0blJlbW92ZS5vZmYoKS5vbignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICBsZXQgaW5kZXggPSBwYXJzZUludCgkKHRoaXMpLmRhdGEoJ2luZGV4JykpO1xuICAgICAgcmVtb3ZlSXRlbShpbmRleCk7XG4gICAgfSk7XG4gIH1cblxuICBmdW5jdGlvbiBjaGVja01heCgpIHtcbiAgICBiNjRBcnJheS5sZW5ndGggPiBtYXhGaWxlICYmIHJlbW92ZUl0ZW0oMCk7XG4gIH1cblxuICBmdW5jdGlvbiByZW1vdmVJdGVtKGluZGV4KSB7XG4gICAgbGlzdCA9IGZpbGVMaXN0LmZpbmQoJy5pdGVtJyk7XG4gICAgbGlzdC5lcShpbmRleCkucmVtb3ZlKCk7XG4gICAgbGlzdC5sZW5ndGggPiAwICYmIHVwZGF0ZUluZGV4KCk7XG4gICAgcmVtb3ZlRmlsZShpbmRleCk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVJbmRleCgpIHtcbiAgICBsaXN0ID0gZmlsZUxpc3QuZmluZCgnLml0ZW0nKTtcbiAgICBsaXN0LmVhY2goaSA9PiBsaXN0LmVxKGkpLmZpbmQoJy5maWxlLXJlbW92ZScpLmRhdGEoJ2luZGV4JywgaSkpO1xuICB9XG5cbiAgZnVuY3Rpb24gcmVtb3ZlRmlsZShpbmRleCkge1xuICAgIGI2NEFycmF5LnNwbGljZShpbmRleCwgMSk7XG4gICAgLy8gY29uc29sZS5sb2coYjY0QXJyYXkpO1xuICB9XG5cbiAgZnVuY3Rpb24gcmVtb3ZlT2xkRmlsZSgpIHtcbiAgICBmaWxlTGlzdC5lbXB0eSgpO1xuICAgIGhhc09sZEZpbGUgPSBmYWxzZTtcbiAgfVxuXG4gIHRoaXMuZ2V0RmlsZUxpc3QgPSAoKSA9PiBlbFdyYXAuaGFzQ2xhc3MoQ0xBU1MuX2hpZGUpID8gW10gOiBiNjRBcnJheTtcblx0cmV0dXJuIHRoaXM7XG59OyIsIi8qKioqKiBTSU5HTEUgRklMRSAqKioqKi9cbmxldCBGaWxlU2luZ2xlID0gZnVuY3Rpb24oZWxlbWVudCkge1xuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgbmFtZVdyYXAgPSBlbC5maW5kKCcuaW5wdXQnKSxcbiAgICAgIHJlc2V0VHh0ID0gbmFtZVdyYXAudGV4dCgpLFxuICAgICAgaW5wdXQgPSBlbC5maW5kKCdpbnB1dFt0eXBlPWZpbGVdJyksXG4gICAgICBpbnB1dE5hbWUgPSBpbnB1dC5hdHRyKCduYW1lJyksXG4gICAgICBhbGxvd1R5cGUgPSBbJ2ltYWdlL2pwZWcnLCAnaW1hZ2UvZ2lmJywgJ2ltYWdlL3BuZycsICdhcHBsaWNhdGlvbi9wZGYnXSxcbiAgICAgIGI2NCA9IG51bGw7XG5cbiAgKCgpID0+IGluaXQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdCgpIHtcbiAgICBpbml0RXZlbnQoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGluaXRFdmVudCgpIHtcbiAgICBpbnB1dC5vbihDSEFOR0UsIGZ1bmN0aW9uICgpIHtcbiAgICAgIHJlc2V0KCk7XG4gICAgICBpZiAodGhpcy5maWxlcyAmJiB0aGlzLmZpbGVzWzBdKSB7XG4gICAgICAgIGxldCBmaWxlID0gdGhpcy5maWxlc1swXSxcbiAgICAgICAgICAgIHJlYWRlciA9IHt9O1xuXG4gICAgICAgIGZpbHRlckZpbGUoZmlsZSkgJiYgKFxuICAgICAgICAgIHJlYWRlciA9IG5ldyBGaWxlUmVhZGVyKCksXG4gICAgICAgICAgcmVhZGVyLm9ubG9hZCA9IGUgPT4gKGI2NCA9IGUudGFyZ2V0LnJlc3VsdCksXG4gICAgICAgICAgcmVhZGVyLnJlYWRBc0RhdGFVUkwoZmlsZSksXG4gICAgICAgICAgbmFtZVdyYXAudGV4dChmaWxlLm5hbWUpLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpXG4gICAgICAgICk7XG4gICAgICB9XG4gICAgfSk7XG4gIH1cblxuICBmdW5jdGlvbiByZXNldCgpIHtcbiAgICBuYW1lV3JhcC50ZXh0KHJlc2V0VHh0KS5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBiNjQgPSBudWxsO1xuICB9XG5cbiAgZnVuY3Rpb24gZmlsdGVyRmlsZShmaWxlKSB7XG4gICAgcmV0dXJuIChmaWxlLnNpemUgLyAoMTAwMCoxMDAwKS50b0ZpeGVkKDIpIDwgMTAgJiYgYWxsb3dUeXBlLmluY2x1ZGVzKGZpbGUudHlwZSkpO1xuICB9XG5cbiAgdGhpcy5nZXROYW1lID0gKCkgPT4gaW5wdXROYW1lO1xuICB0aGlzLmdldEZpbGUgPSAoKSA9PiBiNjQ7XG5cdHJldHVybiB0aGlzO1xufTtcbiIsIi8qKioqKiBGb3JtICoqKioqL1xubGV0IEZvcm0gPSBmdW5jdGlvbihlbGVtZW50KSB7XG5cblx0bGV0IGVsID0gJChlbGVtZW50KSxcblx0XHRcdGFqYXhVUkwgPSBlbC5kYXRhKCd1cmwnKSxcblx0XHRcdGVOYW1lID0gZWwuZGF0YSgnZXZlbnQnKSxcblx0XHRcdHNXYXJuaW5nID0gZWwuZmluZCgnLndhcm5pbmctc2VydmVyJyksXG5cblx0XHRcdGlucHV0cyA9IGVsLmZpbmQoJy5pbnB1dCcpLFxuXHRcdFx0aW5wdXRScSA9IGVsLmZpbmQoJ2lucHV0LicgKyBDTEFTUy5fcmVxdWlyZSksXG5cdFx0XHRpbnB1dE1pbiA9IGVsLmZpbmQoJ2lucHV0LicgKyBDTEFTUy5fbWluKSxcblx0XHRcdGlucHV0TWF4ID0gZWwuZmluZCgnaW5wdXQuJyArIENMQVNTLl9tYXgpLFxuICAgICAgaW5wdXRFbSA9IGVsLmZpbmQoJ2lucHV0LicgKyBDTEFTUy5fZW1haWwpLFxuXHRcdFx0aW5wdXRDZiA9IGVsLmZpbmQoJy5qcy1jb25maXJtJyksXG5cdFx0XHRpbnB1dFB3ID0gZWwuZmluZCgnLmpzLXB3JyksXG5cblx0XHRcdHRleHRhcmVhID0gZWwuZmluZCgndGV4dGFyZWEnKSxcblx0XHRcdGlucHV0U2VsID0gZWwuZmluZCgnLmlucHV0LXNlbCcpLFxuXHRcdFx0Y2hrQWxsID0gZWwuZmluZCgnLmNoeC1hbGwnKSxcblx0XHRcdHNsID0gZWwuZmluZCgnLmlucHV0LXNlbC1ib3gnKSxcblx0XHRcdGNoeCA9IGVsLmZpbmQoJy5jaHgtd3JhcCcpLFxuXHRcdFx0anNOdW0gPSBlbC5maW5kKCcuanMtbnVtJyksXG5cdFx0XHRqc0RhdGUgPSBlbC5maW5kKCcuanMtZGF0ZScpLFxuXHRcdFx0anNNb250aCA9IGVsLmZpbmQoJy5qcy1tb250aCcpLFxuXG5cdFx0XHRzZWxBcnJheSA9IFtdLFxuXHRcdFx0c2xCb3ggPSBbXSxcblx0XHRcdGNoeEJveCA9IFtdLFxuXHRcdFx0aXBEYXRlID0gW10sXG5cdFx0XHRpcE1vbnRoID0gW10sXG5cblx0XHRcdGltZ0FyciA9IFtdLFxuXHRcdFx0dXBsb2FkSW1nID0gZWwuZmluZCgnLnVwbG9hZC1pbWcnKSxcblx0XHRcdGhhc0ltZyA9IHVwbG9hZEltZy5sZW5ndGggPiAwID8gdHJ1ZSA6IGZhbHNlLFxuXG5cdFx0XHRmaWxlQXJyYXkgPSBbXSxcblx0XHRcdGZpbGVTaW5nbGUgPSBlbC5maW5kKCcuc2luZ2xlLWZpbGUnKSxcblx0XHRcdGhhc1NpbmdsZUZpbGUgPSAgZmlsZVNpbmdsZS5sZW5ndGggPiAwID8gdHJ1ZSA6IGZhbHNlLFxuXG5cdFx0XHRmaWxlQ3RyID0gZWwuZmluZCgnLnVwbG9hZC1maWxlJyksXG5cdFx0XHRoYXNGaWxlID0gZmlsZUN0ci5sZW5ndGggPiAwID8gdHJ1ZSA6IGZhbHNlLFxuXHRcdFx0YnRuU2hvd1B3ID0gZWwuZmluZCgnLmJ0bi1zaG93LXB3JyksXG4gICAgICBidG5TdWJtaXQgPSBlbC5maW5kKCcuYnRuLXN1Ym1pdCcpLFxuXHRcdFx0bmVlZFJlc2V0ID0gYnRuU3VibWl0Lmhhc0NsYXNzKENMQVNTLl9yZXNldCkgPyB0cnVlIDogZmFsc2UsXG5cblx0XHRcdHR4dFJxID0gJ3JlcXVpcmVkLXR4dCcsXG5cdFx0XHR0eHRNaW4gPSAnbWluLXR4dCcsXG5cdFx0XHR0eHRNYXggPSAnbWF4LXR4dCcsXG5cdFx0XHR0eHRFbSA9ICdlbWFpbC10eHQnLFxuXHRcdFx0dHh0Q2YgPSAnY2YtdHh0Jyxcblx0XHRcdHR4dFB3ID0gJ3B3LXR4dCc7XG5cblxuXHQoKCkgPT4ge1xuXHRcdGluaXRFdmVudCgpO1xuXHRcdGlucHV0U2VsLmxlbmd0aCA+IDAgJiYgaW5wdXRTZWwuZWFjaCgoaSwgZSkgPT4gc2VsQXJyYXlbaV0gPSBuZXcgSW5wdXRTZWxlY3Rpb24oZSkpO1xuXHRcdHNsLmxlbmd0aCA+IDAgJiYgc2wuZWFjaCgoaSwgZSkgPT4gc2xCb3hbaV0gPSBuZXcgSW5wdXRTZWxlY3Rpb25Cb3goZSkpO1xuXHRcdGNoeC5sZW5ndGggPiAwICYmIGNoeC5lYWNoKChpLCBlKSA9PiBjaHhCb3hbaV0gPSBuZXcgQ2h4Qm94KGUpKTtcblx0XHRqc0RhdGUubGVuZ3RoID4gMCAmJiBqc0RhdGUuZWFjaCgoaSwgZSkgPT4gaXBEYXRlW2ldID0gbmV3IElucHV0RGF0ZShlKSk7XG5cdFx0anNNb250aC5sZW5ndGggPiAwICYmIGpzTW9udGguZWFjaCgoaSwgZSkgPT4gaXBNb250aFtpXSA9IG5ldyBJbnB1dE1vbnRoKGUpKTtcblx0XHQvLyBJbWFnZSAmIEZpbGVcblx0XHRoYXNJbWcgJiYgKHVwbG9hZEltZy5lYWNoKChpLCBlKSA9PiBpbWdBcnJbaV0gPSBuZXcgVXBsb2FkSW1nKGUpKSk7XG5cdFx0aGFzU2luZ2xlRmlsZSAmJiAoZmlsZVNpbmdsZS5lYWNoKChpLCBlKSA9PiBmaWxlQXJyYXlbaV0gPSBuZXcgRmlsZVNpbmdsZShlKSkpXG5cdFx0aGFzRmlsZSAmJiAoZmlsZUN0ciA9IG5ldyBGaWxlTGlzdEN0cihmaWxlQ3RyLCAzKSk7XG5cdH0pKCk7XG5cblx0ZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuXHRcdGlucHV0cy5vbihGX0lOLCBhY3RpdmVXcmFwKS5vbihGX09VVCwgZGVhY3RpdmVXcmFwKTtcblx0XHRpbnB1dFJxLm9uKEZfSU4sIGlucHV0Rm9jdXMpO1xuXHRcdGJ0blNob3dQdy5vbihDTElDSywgdG9nZ2VsUGFzcyk7XG5cdFx0YnRuU3VibWl0Lm9uKENMSUNLLCBzdWJtaXRDbGlja2VkKTtcblx0XHRqc051bS5sZW5ndGggPiAwICYmIGpzTnVtLm9uKElOUFVULCBmaWx0ZXJOdW1iZXIpO1xuXHRcdGNoa0FsbC5sZW5ndGggPiAwICYmIGNoa0FsbC5vbihDSEFOR0UsIGNoZWNrZWRBbGwpO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2hlY2tlZEFsbCgpIHtcbiAgICBsZXQgaXRlbSA9ICQodGhpcyksXG4gICAgICAgIHJlbGF0ZWRDaHggPSBpdGVtLnBhcmVudHMoJy5jaHgtd3JhcCcpLm5leHQoJy5jaHgtd3JhcCcpLmZpbmQoJ2lucHV0W3R5cGU9Y2hlY2tib3hdJyk7XG5cbiAgICBpdGVtLnByb3AoJ2NoZWNrZWQnKSA/IHJlbGF0ZWRDaHgucHJvcCgnY2hlY2tlZCcsIHRydWUpIDogcmVsYXRlZENoeC5wcm9wKCdjaGVja2VkJywgZmFsc2UpO1xuICAgIHJlbGF0ZWRDaHgudHJpZ2dlcihDSEFOR0UpO1xuICB9XG5cblx0ZnVuY3Rpb24gZmlsdGVyTnVtYmVyKCkge1xuXHRcdHRoaXMudmFsdWUgPSB0aGlzLnZhbHVlLnJlcGxhY2UoL1teMC05XS9nLCAnJyk7XG5cdH1cblxuXHRmdW5jdGlvbiBhY3RpdmVXcmFwKCkge1xuXHRcdGxldCBpbnB1dCA9ICQodGhpcyksXG5cdFx0XHRcdHdyYXAgPSBpbnB1dC5wYXJlbnRzKCcuaW5wdXQtd3JhcCcpO1xuXHRcdHdyYXAubGVuZ3RoID4gMCAmJiB3cmFwLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpO1xuXHR9XG5cblx0ZnVuY3Rpb24gZGVhY3RpdmVXcmFwKCkge1xuXHRcdGxldCBpbnB1dCA9ICQodGhpcyksXG5cdFx0XHRcdHdyYXAgPSBpbnB1dC5wYXJlbnRzKCcuaW5wdXQtd3JhcCcpO1xuXHRcdHdyYXAubGVuZ3RoID4gMCAmJiAkLnRyaW0oaW5wdXQudmFsKCkpLmxlbmd0aCA9PT0gMCAmJiB3cmFwLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuXHR9XG5cblx0ZnVuY3Rpb24gaW5wdXRGb2N1cyhlKSB7XG4gICAgbGV0IGlucHV0ID0gJCh0aGlzKSxcbiAgICAgICAgd2FybmluZyA9IGlucHV0LnBhcmVudCgpLm5leHQoJy53YXJuaW5nJyk7XG5cdFx0aW5wdXQuaGFzQ2xhc3MoQ0xBU1MuX2Vycm9yKSAmJiAoaW5wdXQucmVtb3ZlQ2xhc3MoQ0xBU1MuX2Vycm9yKSwgd2FybmluZy5yZW1vdmVDbGFzcyhDTEFTUy5fZGxleCkpO1xuXHR9XG5cblx0ZnVuY3Rpb24gdG9nZ2VsUGFzcyhlKSB7XG5cdFx0ZS5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdGxldCBidG4gPSAkKHRoaXMpLFxuXHRcdFx0XHRpbnB1dCA9IGJ0bi5wYXJlbnQoKS5maW5kKCdpbnB1dCcpO1xuXG5cdFx0YnRuLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpID8gKGJ0bi5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKSwgaW5wdXQuZ2V0KDApLnR5cGUgPSAncGFzc3dvcmQnKSA6IChidG4uYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSksIGlucHV0LmdldCgwKS50eXBlID0gJ3RleHQnKTtcblx0fVxuXG5cdGZ1bmN0aW9uIHN1Ym1pdENsaWNrZWQoZSkge1xuXHRcdGUucHJldmVudERlZmF1bHQoKTtcblx0XHRjaGVja1ZhbGlkYXRlKCkgJiYgc3VibWl0KCk7XG5cdH1cblxuXHRmdW5jdGlvbiBjaGVja1ZhbGlkYXRlKCkge1xuXHRcdGxldCBwYXNzID0gdHJ1ZTtcblx0XHRwYXNzID0gY2hlY2tSZXF1aXJlKCk7XG5cdFx0cGFzcyAmJiAocGFzcyA9IGNoZWNrUHcoKSk7XG5cdFx0cGFzcyAmJiAocGFzcyA9IGNoZWNrTWluKCkpO1xuXHRcdHBhc3MgJiYgKHBhc3MgPSBjaGVja01heCgpKTtcblx0XHRwYXNzICYmIChwYXNzID0gY2hlY2tDb25maXJtKCkpO1xuXHRcdHBhc3MgJiYgKHBhc3MgPSBjaGVja0VtYWlsKCkpO1xuXHRcdHBhc3MgJiYgKHBhc3MgPSBjaGVja0RhdGUoKSk7XG5cdFx0cGFzcyAmJiAocGFzcyA9IGNoZWNrTW9udGgoKSk7XG5cdFx0Ly8gcGFzcyAmJiAocGFzcyA9IGNoZWNrU2xCb3goKSk7XG5cdFx0cGFzcyAmJiAocGFzcyA9IGNoZWNrQ2h4Qm94KCkpO1xuXHRcdHJldHVybiBwYXNzO1xuXHR9XG5cblx0Ly8gZnVuY3Rpb24gY2hlY2tTbEJveCgpIHtcblx0Ly8gXHRsZXQgcGFzcyA9IHRydWU7XG5cdC8vIFx0Zm9yIChsZXQgaSBvZiBzbEJveCkgaS52YWxpZGF0ZSgpIHx8IChwYXNzID0gZmFsc2UpO1xuXHQvLyBcdHJldHVybiBwYXNzO1xuXHQvLyB9XG5cblx0ZnVuY3Rpb24gY2hlY2tDaHhCb3goKSB7XG5cdFx0bGV0IHBhc3MgPSB0cnVlO1xuXHRcdGZvciAobGV0IGkgb2YgY2h4Qm94KSBpLnZhbGlkYXRlKCkgfHwgKHBhc3MgPSBmYWxzZSk7XG5cdFx0cmV0dXJuIHBhc3M7XG5cdH1cblxuXHRmdW5jdGlvbiBjaGVja0RhdGUoKSB7XG5cdFx0bGV0IHBhc3MgPSB0cnVlO1xuXHRcdGZvciAobGV0IGkgb2YgaXBEYXRlKSBpLnZhbGlkYXRlKCkgfHwgKHBhc3MgPSBmYWxzZSk7XG5cdFx0cmV0dXJuIHBhc3M7XG5cdH1cblxuXHRmdW5jdGlvbiBjaGVja01vbnRoKCkge1xuXHRcdGxldCBwYXNzID0gdHJ1ZTtcblx0XHRmb3IgKGxldCBpIG9mIGlwTW9udGgpIGkudmFsaWRhdGUoKSB8fCAocGFzcyA9IGZhbHNlKTtcblx0XHRyZXR1cm4gcGFzcztcblx0fVxuXG5cdGZ1bmN0aW9uIHN1Ym1pdCgpIHtcblx0XHRBUFAucG9wdXAuX2xvYWRpbmcuc2hvdygpO1xuXHRcdHNXYXJuaW5nLmhpZGUoKTtcblx0XHQkLmFqYXgoe1xuXHRcdFx0dHlwZTogQVBQLl9zdWJtaXRNZXRob2QsXG5cdFx0XHR1cmw6IGFqYXhVUkwsXG5cdFx0XHRkYXRhOiBnZXREYXRhKCksXG5cdFx0XHRoZWFkZXJzOiBBUFAuX2hlYWRlcnMsXG5cdFx0XHRzdWNjZXNzOiBkYXRhID0+IHtcblx0XHRcdFx0bGV0IHN0YXR1cyA9IHBhcnNlSW50KGRhdGEuc3RhdHVzKSxcblx0XHRcdFx0XHRcdHRpdGxlID0gZGF0YS50aXRsZSxcblx0XHRcdFx0XHRcdG1lc3NhZ2UgPSBkYXRhLm1lc3NhZ2UsXG5cdFx0XHRcdFx0XHRodG1sID0gZGF0YS5odG1sLFxuXHRcdFx0XHRcdFx0dXJsID0gZGF0YS51cmw7XG5cblx0XHRcdFx0QVBQLnBvcHVwLl9sb2FkaW5nLmhpZGUoKTtcblx0XHRcdFx0c3dpdGNoKHN0YXR1cykge1xuXHRcdFx0XHRcdGNhc2UgMDoge1xuXHRcdFx0XHRcdFx0c1dhcm5pbmcudGV4dChtZXNzYWdlKS5zaG93KCk7XG5cdFx0XHRcdFx0fSBicmVhaztcblx0XHRcdFx0XHRjYXNlIDE6IHtcblx0XHRcdFx0XHRcdHVybCA/ICh3aW5kb3cubG9jYXRpb24uaHJlZiA9IHVybCkgOiAoXG5cdFx0XHRcdFx0XHRcdEFQUC5wb3B1cC5fYWxlcnQudXBkYXRlKHRpdGxlLCBtZXNzYWdlLCBodG1sKSxcblx0XHRcdFx0XHRcdFx0QVBQLnBvcHVwLl9hbGVydC5zaG93KCksXG5cdFx0XHRcdFx0XHRcdG5lZWRSZXNldCAmJiByZXNldEZvcm0oKSxcblx0XHRcdFx0XHRcdFx0ZU5hbWUgJiYgZmlyZUV2ZW50KClcblx0XHRcdFx0XHRcdCk7XG5cdFx0XHRcdFx0fSBicmVhaztcblx0XHRcdFx0XHRjYXNlIDI6IHtcblx0XHRcdFx0XHRcdHJlc2V0Rm9ybSgpO1xuXHRcdFx0XHRcdFx0c1dhcm5pbmcudGV4dChtZXNzYWdlKS5zaG93KCk7XG5cdFx0XHRcdFx0fSBicmVhaztcblx0XHRcdFx0fVxuXHRcdFx0fVxuXHRcdH0pO1xuXHR9XG5cblx0ZnVuY3Rpb24gZmlyZUV2ZW50KCkge1xuXHRcdGxldCBkb25lRXZlbnQgPSBuZXcgQ3VzdG9tRXZlbnQoZU5hbWUsIHsgYnViYmxlczogdHJ1ZSB9KTtcblx0XHRkb2N1bWVudC5kaXNwYXRjaEV2ZW50KGRvbmVFdmVudCk7XG5cdH1cblxuXHRmdW5jdGlvbiBnZXREYXRhKCkge1xuICAgIGxldCBkYXRhID0gZWwuc2VyaWFsaXplQXJyYXkoKSxcbiAgICAgICAgZmlsZSA9IHt9LFxuICAgICAgICBmaWxlcyA9IGhhc0ZpbGUgJiYgZmlsZUN0ci5nZXRGaWxlTGlzdCgpO1xuXG5cdFx0aGFzSW1nICYmIGltZ0Fyci5mb3JFYWNoKChlLCBpKSA9PiB7XG5cdFx0XHRmaWxlID0gZS5nZXRJbWcoKTtcblx0XHRcdGZpbGUgJiYgZGF0YS5wdXNoKHtcblx0XHRcdCAgbmFtZTogYHVwbG9hZC1pbWdbJHtpfV1gLFxuXHRcdFx0ICB2YWx1ZTogZmlsZVxuXHRcdFx0fSk7XG5cdFx0fSk7XG5cblx0XHRoYXNTaW5nbGVGaWxlICYmIGZpbGVBcnJheS5mb3JFYWNoKChlLCBpKSA9PiB7XG5cdFx0XHRmaWxlID0gZS5nZXRGaWxlKCk7XG5cdFx0XHRmaWxlICYmIGRhdGEucHVzaCh7XG5cdFx0XHQgIG5hbWU6IGUuZ2V0TmFtZSgpLFxuXHRcdFx0ICB2YWx1ZTogZmlsZVxuXHRcdFx0fSk7XG5cdFx0fSk7XG5cbiAgICBmaWxlcy5sZW5ndGggJiYgZmlsZXMuZm9yRWFjaCgoZSwgaSkgPT4gZGF0YS5wdXNoKHtcbiAgICAgIG5hbWU6IGB1cGxvYWQtZmlsZVske2l9XWAsXG4gICAgICB2YWx1ZTogZVxuICAgIH0pKTtcbiAgICByZXR1cm4gZGF0YTtcbiAgfVxuXG5cdGZ1bmN0aW9uIHJlc2V0Rm9ybSgpIHtcblx0XHQvLyByZXNldCBpbnB1dFxuXHRcdC8vIHJlc2V0IHRleHRhcmVyXG5cdFx0Ly8gcmVzZXQgc2VsZWN0aW9uXG5cblx0XHRpbnB1dHMubGVuZ3RoID4gMCAmJiAoaW5wdXRzLnZhbCgnJyksIGlucHV0cy5wYXJlbnRzKCcuaW5wdXQtd3JhcCcpLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpKTtcblx0XHR0ZXh0YXJlYS5sZW5ndGggPiAwICYmICh0ZXh0YXJlYS52YWwoJycpLCB0ZXh0YXJlYS5wYXJlbnRzKCcuaW5wdXQtd3JhcCcpLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpKTtcblxuXHRcdC8vIHJlc2V0IHNlbGVjdGlvbiBjaGVja2JveFxuXHRcdGZvciAobGV0IGkgb2Ygc2xCb3gpIGkucmVzZXQoKTtcblx0XHRmb3IgKGxldCBpIG9mIGNoeEJveCkgaS5yZXNldCgpO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2hlY2tSZXF1aXJlKCkge1xuICAgIGxldCBwYXNzID0gdHJ1ZSxcblx0XHRcdFx0aW5wdXQgPSB7fSxcbiAgICAgICAgd2FybmluZyA9IHt9O1xuXG5cdFx0aW5wdXRScS5sZW5ndGggPT09IDAgfHwgaW5wdXRScS5lYWNoKChfLCBlbCkgPT4ge1xuXHRcdFx0aW5wdXQgPSAkKGVsKTtcblx0XHRcdHdhcm5pbmcgPSBpbnB1dC5wYXJlbnQoKS5uZXh0KCcud2FybmluZycpO1xuXHRcdFx0KGlucHV0LnZhbCgpID09PSAnJykgJiYgKGlucHV0LmFkZENsYXNzKENMQVNTLl9lcnJvciksIHdhcm5pbmcudGV4dChpbnB1dC5hdHRyKHR4dFJxKSkuYWRkQ2xhc3MoQ0xBU1MuX2RsZXgpLCBwYXNzID0gZmFsc2UpO1xuXHRcdH0pO1xuXHRcdHJldHVybiBwYXNzO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2hlY2tNaW4oKSB7XG5cdFx0bGV0IHBhc3MgPSB0cnVlLFxuXHRcdFx0XHRpbnB1dCA9IHt9LFxuXHRcdFx0XHRtaW4gPSAwLFxuICAgICAgICB3YXJuaW5nID0ge307XG5cblx0XHRpbnB1dE1pbi5sZW5ndGggPT09IDAgfHwgaW5wdXRNaW4uZWFjaCgoXywgZWwpID0+IHtcblx0XHRcdGlucHV0ID0gJChlbCk7XG5cdFx0XHRtaW4gPSBwYXJzZUludChpbnB1dC5kYXRhKCdtaW4nKSk7XG5cdFx0XHR3YXJuaW5nID0gaW5wdXQucGFyZW50KCkubmV4dCgnLndhcm5pbmcnKTtcblx0XHRcdChpbnB1dC52YWwoKS5sZW5ndGggPCBtaW4pICYmIChpbnB1dC5hZGRDbGFzcyhDTEFTUy5fZXJyb3IpLCB3YXJuaW5nLnRleHQoaW5wdXQuYXR0cih0eHRNaW4pKS5hZGRDbGFzcyhDTEFTUy5fZGxleCksIHBhc3MgPSBmYWxzZSk7XG5cdFx0fSk7XG5cdFx0cmV0dXJuIHBhc3M7XG5cdH1cblxuXHRmdW5jdGlvbiBjaGVja01heCgpIHtcblx0XHRsZXQgcGFzcyA9IHRydWUsXG5cdFx0XHRcdGlucHV0ID0ge30sXG5cdFx0XHRcdG1heCA9IDAsXG4gICAgICAgIHdhcm5pbmcgPSB7fTtcblxuXHRcdGlucHV0TWF4Lmxlbmd0aCA9PT0gMCB8fCBpbnB1dE1heC5lYWNoKChfLCBlbCkgPT4ge1xuXHRcdFx0aW5wdXQgPSAkKGVsKTtcblx0XHRcdG1heCA9IHBhcnNlSW50KGlucHV0LmRhdGEoJ21heCcpKTtcblx0XHRcdHdhcm5pbmcgPSBpbnB1dC5wYXJlbnQoKS5uZXh0KCcud2FybmluZycpO1xuXHRcdFx0KGlucHV0LnZhbCgpLmxlbmd0aCA+IG1heCkgJiYgKGlucHV0LmFkZENsYXNzKENMQVNTLl9lcnJvciksIHdhcm5pbmcudGV4dChpbnB1dC5hdHRyKHR4dE1heCkpLmFkZENsYXNzKENMQVNTLl9kbGV4KSwgcGFzcyA9IGZhbHNlKTtcblx0XHR9KTtcblx0XHRyZXR1cm4gcGFzcztcblx0fVxuXG5cdGZ1bmN0aW9uIGNoZWNrRW1haWwoKSB7XG5cdFx0bGV0IHBhc3MgPSB0cnVlLFxuXHRcdFx0XHRpbnB1dCA9IHt9LFxuXHRcdFx0XHR3YXJuaW5nID0ge30sXG5cdFx0XHRcdHJlZ2V4ID0gL14oW2EtekEtWjAtOV8uKy1dKStcXEAoKFthLXpBLVowLTktXSkrXFwuKSsoW2EtekEtWjAtOV17Miw0fSkrJC87XG5cblx0XHRpbnB1dEVtLmxlbmd0aCA9PT0gMCB8fCBpbnB1dEVtLmVhY2goKF8sIGVsKSA9PiB7XG5cdFx0XHRpbnB1dCA9ICQoZWwpO1xuXHRcdFx0d2FybmluZyA9IGlucHV0LnBhcmVudCgpLm5leHQoJy53YXJuaW5nJyk7XG5cdFx0XHRyZWdleC50ZXN0KGlucHV0LnZhbCgpKSB8fCAoaW5wdXQuYWRkQ2xhc3MoQ0xBU1MuX2Vycm9yKSwgd2FybmluZy50ZXh0KGlucHV0LmF0dHIodHh0RW0pKS5hZGRDbGFzcyhDTEFTUy5fZGxleCksIHBhc3MgPSBmYWxzZSk7XG5cdFx0fSk7XG5cdFx0cmV0dXJuIHBhc3M7XG5cdH1cblxuXHRmdW5jdGlvbiBjaGVja1B3KCkge1xuXHRcdGxldCBwYXNzID0gdHJ1ZSxcblx0XHRcdFx0aW5wdXQgPSB7fSxcblx0XHRcdFx0d2FybmluZyA9IHt9LFxuXHRcdFx0XHRyZWdleCA9IC9eKD89LipbYS16XSkoPz0uKltBLVpdKSg/PS4qXFxkKSg/PS4qW0AkISUqPyZdKVtBLVphLXpcXGRAJCElKj8mXXs4LH0vO1xuXG5cdFx0aW5wdXRQdy5sZW5ndGggPT09IDAgfHwgaW5wdXRQdy5lYWNoKChfLCBlbCkgPT4ge1xuXHRcdFx0aW5wdXQgPSAkKGVsKTtcblx0XHRcdHdhcm5pbmcgPSBpbnB1dC5wYXJlbnQoKS5uZXh0KCcud2FybmluZycpO1xuXHRcdFx0cmVnZXgudGVzdChpbnB1dC52YWwoKSkgfHwgKGlucHV0LmFkZENsYXNzKENMQVNTLl9lcnJvciksIHdhcm5pbmcudGV4dChpbnB1dC5hdHRyKHR4dFB3KSkuYWRkQ2xhc3MoQ0xBU1MuX2RsZXgpLCBwYXNzID0gZmFsc2UpO1xuXHRcdH0pO1xuXHRcdHJldHVybiBwYXNzO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2hlY2tDb25maXJtKCkge1xuXHRcdGxldCBwYXNzID0gdHJ1ZSxcblx0XHRcdFx0aW5wdXQgPSB7fSxcblx0XHRcdFx0dGFyZ2V0ID0ge30sXG4gICAgICAgIHdhcm5pbmcgPSB7fTtcblxuXHRcdGlucHV0Q2YubGVuZ3RoID09PSAwIHx8IGlucHV0Q2YuZWFjaCgoXywgZWwpID0+IHtcblx0XHRcdGlucHV0ID0gJChlbCk7XG5cdFx0XHR0YXJnZXQgPSAkKGlucHV0LmRhdGEoJ3RhcmdldCcpKTtcblx0XHRcdHdhcm5pbmcgPSBpbnB1dC5wYXJlbnQoKS5uZXh0KCcud2FybmluZycpO1xuXHRcdFx0KGlucHV0LnZhbCgpICE9IHRhcmdldC52YWwoKSkgJiYgKGlucHV0LmFkZENsYXNzKENMQVNTLl9lcnJvciksIHdhcm5pbmcudGV4dChpbnB1dC5hdHRyKHR4dENmKSkuYWRkQ2xhc3MoQ0xBU1MuX2RsZXgpLCBwYXNzID0gZmFsc2UpO1xuXHRcdH0pO1xuXHRcdHJldHVybiBwYXNzO1xuXHR9XG5cblx0dGhpcy5nZXRFdmVudE5hbWUgPSAoKSA9PiBlTmFtZTtcblx0dGhpcy5yZXF1ZXN0U3VibWl0ID0gKCkgPT4gKGNoZWNrVmFsaWRhdGUoKSAmJiBzdWJtaXQoKSk7XG5cdHJldHVybiB0aGlzO1xufTtcbiIsIi8qKioqKiBJbnB1dCBEYXRlICoqKioqL1xubGV0IElucHV0RGF0ZSA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIG9sZFZhbCA9ICcnLFxuICAgICAgd2FybmluZyA9IGVsLnBhcmVudCgpLm5leHQoJy53YXJuaW5nJyksXG4gICAgICB0eHRJdmwgPSBlbC5hdHRyKCdkYXRlLXR4dCcpLFxuICAgICAgaXNScSA9IGVsLmhhc0NsYXNzKENMQVNTLl9yZXF1aXJlZCk7XG5cbiAgKCgpID0+IGluaXQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdCgpIHtcbiAgICBpbml0RXZlbnQoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGluaXRFdmVudCgpIHtcbiAgICBlbC5vbigna2V5dXAnLCBvbktleVVwKTtcbiAgICBlbC5vbignaW5wdXQnLCAoKSA9PiBlbC52YWwoZWwudmFsKCkucmVwbGFjZSgvW14wLTkvXS9nLCAnJykpKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIG9uS2V5VXAoZSkge1xuICAgIGxldCB2YWwgPSAkLnRyaW0oZWwudmFsKCkpO1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xuICAgIG9sZFZhbCA9ICh2YWwubGVuZ3RoID09PSA1IHx8IHZhbC5sZW5ndGggPT09IDIpID8gKCh2YWwubGVuZ3RoID4gb2xkVmFsLmxlbmd0aCkgPyBlbC52YWwodmFsICsgJy8nKSA6ICh2YWwubGVuZ3RoIDwgb2xkVmFsLmxlbmd0aCkgJiYgZWwudmFsKHZhbC5zbGljZSgwLCB2YWwubGVuZ3RoIC0gMSkpLGVsLnZhbCgpKSA6IHZhbDtcbiAgfVxuXG4gIC8vIGZ1bmN0aW9uIG9uS2V5RG93bihlKSB7XG4gIC8vICAgbGV0IHZhbCA9ICQudHJpbShlbC52YWwoKSksXG4gIC8vICAgICAgIGNvZGUgPSBwYXJzZUludChlLmtleUNvZGUgfHwgZS53aGljaCk7XG4gIC8vICAgcmV0dXJuIChjb2RlID09PSAwIHx8IGNvZGUgPT09IDggfHwgY29kZSA9PT0gMjI5IHx8IChjb2RlID49IDQ4ICYmIGNvZGUgPD0gNTcpIHx8IChjb2RlID49IDk2ICYmIGNvZGUgPD0gMTA1KSkgPyB0cnVlIDogZmFsc2U7XG4gIC8vIH1cblxuICBmdW5jdGlvbiB2YWxpZGF0ZURhdGUoKSB7XG4gICAgbGV0IHZhbCA9ICQudHJpbShlbC52YWwoKSksXG4gICAgICAgIHBhcnRzID0gJycsXG4gICAgICAgIGRheSA9IDAsXG4gICAgICAgIG1vbnRoID0gMCxcbiAgICAgICAgeWVhciA9IDAsXG4gICAgICAgIG1vbnRoTGVuZ3RoID0gW107XG5cbiAgICBpZiAoIWlzUnEgJiYgdmFsLmxlbmd0aCA9PT0gMCkgcmV0dXJuIHRydWU7XG4gICAgLy8gRmlyc3QgY2hlY2sgZm9yIHRoZSBwYXR0ZXJuXG4gICAgaWYoIS9eXFxkezEsMn1cXC9cXGR7MSwyfVxcL1xcZHs0fSQvLnRlc3QodmFsKSkgcmV0dXJuIGZhbHNlO1xuXG4gICAgLy8gUGFyc2UgdGhlIGRhdGUgcGFydHMgdG8gaW50ZWdlcnNcbiAgICBwYXJ0cyA9IHZhbC5zcGxpdCgnLycpO1xuICAgIGRheSA9IHBhcnNlSW50KHBhcnRzWzBdLCAxMCk7XG4gICAgbW9udGggPSBwYXJzZUludChwYXJ0c1sxXSwgMTApO1xuICAgIHllYXIgPSBwYXJzZUludChwYXJ0c1syXSwgMTApO1xuXG4gICAgLy8gQ2hlY2sgdGhlIHJhbmdlcyBvZiBtb250aCBhbmQgeWVhclxuICAgIGlmKHllYXIgPCAxMDAwIHx8IHllYXIgPiAzMDAwIHx8IG1vbnRoID09IDAgfHwgbW9udGggPiAxMikgcmV0dXJuIGZhbHNlO1xuICAgIG1vbnRoTGVuZ3RoID0gWzMxLCAyOCwgMzEsIDMwLCAzMSwgMzAsIDMxLCAzMSwgMzAsIDMxLCAzMCwgMzFdO1xuICAgIC8vIEFkanVzdCBmb3IgbGVhcCB5ZWFyc1xuICAgIGlmKHllYXIgJSA0MDAgPT0gMCB8fCAoeWVhciAlIDEwMCAhPSAwICYmIHllYXIgJSA0ID09IDApKSBtb250aExlbmd0aFsxXSA9IDI5O1xuICAgIC8vIENoZWNrIHRoZSByYW5nZSBvZiB0aGUgZGF5XG4gICAgcmV0dXJuIGRheSA+IDAgJiYgZGF5IDw9IG1vbnRoTGVuZ3RoW21vbnRoIC0gMV07XG4gIH1cblxuICB0aGlzLnZhbGlkYXRlID0gKCkgPT4gdmFsaWRhdGVEYXRlKCkgPyB0cnVlIDogKHdhcm5pbmcudGV4dCh0eHRJdmwpLmFkZENsYXNzKENMQVNTLl9kbGV4KSwgZWwuYWRkQ2xhc3MoQ0xBU1MuX2Vycm9yKSwgZmFsc2UpO1xuXHRyZXR1cm4gdGhpcztcbn07XG5cbi8qKioqKiBJbnB1dCBNb250aCAqKioqKi9cbmxldCBJbnB1dE1vbnRoID0gZnVuY3Rpb24oZWxlbWVudCkge1xuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgb2xkVmFsID0gJycsXG4gICAgICB3YXJuaW5nID0gZWwucGFyZW50KCkubmV4dCgnLndhcm5pbmcnKSxcbiAgICAgIHR4dEl2bCA9IGVsLmF0dHIoJ2l2bC10eHQnKSxcbiAgICAgIGlzUnEgPSBlbC5oYXNDbGFzcyhDTEFTUy5fcmVxdWlyZWQpO1xuXG4gICgoKSA9PiBpbml0KCkpKCk7XG4gIGZ1bmN0aW9uIGluaXQoKSB7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgZWwub24oJ2tleXVwJywgb25LZXlVcCk7XG4gICAgZWwub24oJ2lucHV0JywgKCkgPT4gZWwudmFsKGVsLnZhbCgpLnJlcGxhY2UoL1teMC05L10vZywgJycpKSk7XG4gIH1cblxuICBmdW5jdGlvbiBvbktleVVwKGUpIHtcbiAgICBsZXQgdmFsID0gJC50cmltKGVsLnZhbCgpKTtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcbiAgICBvbGRWYWwgPSAodmFsLmxlbmd0aCA9PT0gMikgPyAoKHZhbC5sZW5ndGggPiBvbGRWYWwubGVuZ3RoKSA/IGVsLnZhbCh2YWwgKyAnLycpIDogKHZhbC5sZW5ndGggPCBvbGRWYWwubGVuZ3RoKSAmJiBlbC52YWwodmFsLnNsaWNlKDAsIHZhbC5sZW5ndGggLSAxKSksZWwudmFsKCkpIDogdmFsO1xuICB9XG5cbiAgLy8gZnVuY3Rpb24gb25LZXlEb3duKGUpIHtcbiAgLy8gICBsZXQgdmFsID0gJC50cmltKGVsLnZhbCgpKSxcbiAgLy8gICAgICAgY29kZSA9IHBhcnNlSW50KGUua2V5Q29kZSB8fCBlLndoaWNoKTtcbiAgLy8gICByZXR1cm4gKGNvZGUgPT09IDAgfHwgY29kZSA9PT0gOCB8fCBjb2RlID09PSAyMjkgfHwgKGNvZGUgPj0gNDggJiYgY29kZSA8PSA1NykgfHwgKGNvZGUgPj0gOTYgJiYgY29kZSA8PSAxMDUpKSA/IHRydWUgOiBmYWxzZTtcbiAgLy8gfVxuXG4gIGZ1bmN0aW9uIHZhbGlkYXRlRGF0ZSgpIHtcbiAgICBsZXQgdmFsID0gJC50cmltKGVsLnZhbCgpKSxcbiAgICAgICAgcGFydHMgPSAnJyxcbiAgICAgICAgbW9udGggPSAwLFxuICAgICAgICB5ZWFyID0gMDtcblxuICAgIGlmICghaXNScSAmJiB2YWwubGVuZ3RoID09PSAwKSByZXR1cm4gdHJ1ZTtcbiAgICAvLyBGaXJzdCBjaGVjayBmb3IgdGhlIHBhdHRlcm5cbiAgICBpZighL15cXGR7MSwyfVxcL1xcZHsxLDJ9Ly50ZXN0KHZhbCkpIHJldHVybiBmYWxzZTtcblxuICAgIC8vIFBhcnNlIHRoZSBkYXRlIHBhcnRzIHRvIGludGVnZXJzXG4gICAgcGFydHMgPSB2YWwuc3BsaXQoJy8nKTtcbiAgICBtb250aCA9IHBhcnNlSW50KHBhcnRzWzBdLCAxMCk7XG4gICAgeWVhciA9IHBhcnNlSW50KHBhcnRzWzFdLCAxMCk7XG5cbiAgICAvLyBDaGVjayB0aGUgcmFuZ2VzIG9mIG1vbnRoIGFuZCB5ZWFyXG4gICAgaWYobW9udGggPT0gMCB8fCBtb250aCA+IDEyKSByZXR1cm4gZmFsc2U7XG4gICAgcmV0dXJuIHRydWU7XG4gIH1cblxuICB0aGlzLnZhbGlkYXRlID0gKCkgPT4gdmFsaWRhdGVEYXRlKCkgPyB0cnVlIDogKHdhcm5pbmcudGV4dCh0eHRJdmwpLmFkZENsYXNzKENMQVNTLl9kbGV4KSwgZWwuYWRkQ2xhc3MoQ0xBU1MuX2Vycm9yKSwgZmFsc2UpO1xuXHRyZXR1cm4gdGhpcztcbn07IiwiLyoqKioqIElucHV0IFNlbGVjdGlvbiBCb3ggKioqKiovXG5sZXQgSW5wdXRTZWxlY3Rpb25Cb3ggPSBmdW5jdGlvbihlbGVtZW50KSB7XG5cbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIGlucHV0VHh0ID0gZWwuZmluZCgnaW5wdXRbdHlwZT10ZXh0XScpLFxuICAgICAgb3B0Q291bnQgPSBlbC5maW5kKCcudHh0LWxhYmVsID4gc3BhbicpLFxuICAgICAgb3B0TGlzdCA9IGVsLmZpbmQoJy5vcHQtbGlzdCcpLFxuICAgICAgY2h4ID0gb3B0TGlzdC5maW5kKCdpbnB1dFt0eXBlPWNoZWNrYm94XScpLFxuICAgICAgaXNSZWRvID0gZWwuaGFzQ2xhc3MoJ3JlZG8taW5wdXQnKTtcblxuXG4gICgoKSA9PiBpbml0KCkpKCk7XG4gIGZ1bmN0aW9uIGluaXQoKSB7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgaW5wdXRUeHQub24oQ0xJQ0ssIHRvZ2dsZU9wdExpc3QpO1xuICAgIGNoeC5vbihDSEFOR0UsIHVwZGF0ZSk7XG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihTTEJPWF9PUEVOLCAoKSA9PiBjbG9zZUxpc3QoKSk7XG4gIH1cblxuICBmdW5jdGlvbiB0b2dnbGVPcHRMaXN0KGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgKGVsLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpICYmIGVsLmhhc0NsYXNzKENMQVNTLl9vcGVuKSkgPyBjbG9zZUxpc3QoKSA6IG9wZW5MaXN0KCk7XG4gIH1cblxuICBmdW5jdGlvbiBjbG9zZUxpc3QoKSB7XG4gICAgb3B0TGlzdC5zbGlkZVVwKCk7XG4gICAgZWwucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZU9wZW4pO1xuICB9XG5cbiAgZnVuY3Rpb24gb3Blbkxpc3QoKSB7XG4gICAgZG9jdW1lbnQuZGlzcGF0Y2hFdmVudChTTEJPWF9PUEVOX0VWRU5UKTtcbiAgICBvcHRMaXN0LnNsaWRlRG93bigpO1xuICAgIGVsLmFkZENsYXNzKENMQVNTLl9hY3RpdmVPcGVuKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZSgpIHtcbiAgICBpc1JlZG8gPyB1cGRhdGVUeHQoKSA6IHVwZGF0ZU9wdENvdW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiB1cGRhdGVUeHQoKSB7XG4gICAgbGV0IHZhbCA9ICcnO1xuICAgIGNoeC5lYWNoKChfLCBlKSA9PiB7XG4gICAgICBsZXQgaXRlbSA9ICQoZSk7XG4gICAgICBpdGVtLmlzKCc6Y2hlY2tlZCcpICYmICh2YWwgKz0gaXRlbS52YWwoKSArICcsICcpXG4gICAgfSk7XG4gICAgaW5wdXRUeHQudmFsKHZhbC5zbGljZSgwLCB2YWwubGVuZ3RoIC0gMikpO1xuICB9XG5cbiAgZnVuY3Rpb24gdXBkYXRlT3B0Q291bnQoKSB7XG4gICAgbGV0IG51bSA9IDA7XG4gICAgY2h4LmVhY2goKF8sIGUpID0+IHsgJChlKS5pcygnOmNoZWNrZWQnKSAmJiBudW0rKyB9KTtcbiAgICBvcHRDb3VudC50ZXh0KCcoJyArIG51bSArICcpJyk7XG4gIH1cblxuICB0aGlzLnJlc2V0ID0gKCkgPT4ge1xuICAgIGNoeC5wcm9wKCdjaGVja2VkJywgZmFsc2UpO1xuICAgIGVsLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIG9wdENvdW50LnRleHQoJycpO1xuICB9XG5cblx0cmV0dXJuIHRoaXM7XG59OyIsIi8qKioqKiBJbnB1dCBTZWxlY3Rpb24gKioqKiovXG5sZXQgSW5wdXRTZWxlY3Rpb24gPSBmdW5jdGlvbihlbGVtZW50KSB7XG5cbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIGlucHV0VmFsID0gZWwuZmluZCgnaW5wdXRbdHlwZT1oaWRkZW5dJyksXG4gICAgICBpbnB1dFR4dCA9IGVsLmZpbmQoJ2lucHV0W3R5cGU9dGV4dF0nKSxcbiAgICAgIGxhYmVsID0gZWwuZmluZCgnbGFiZWwnKSxcbiAgICAgIG9wdExpc3QgPSBlbC5maW5kKCcub3B0LWxpc3QnKSxcbiAgICAgIG9wdEl0ZW0gPSBvcHRMaXN0LmZpbmQoJ2xpJyk7XG5cblxuICAoKCkgPT4gaW5pdCgpKSgpO1xuICBmdW5jdGlvbiBpbml0KCkge1xuICAgIC8vIGlucHV0VmFsLnZhbChudWxsKTtcbiAgICAvLyBpbnB1dFR4dC52YWwobnVsbCk7XG4gICAgaW5pdEV2ZW50KCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgaW5wdXRUeHQub24oRl9JTiwgaW5wdXRJbik7XG4gICAgaW5wdXRUeHQub24oRl9PVVQsIGlucHV0T3V0KTtcbiAgICBvcHRJdGVtLm9uKENMSUNLLCBpdGVtQ2xpY2tlZCk7XG4gIH1cblxuICBmdW5jdGlvbiBpbnB1dEluKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgb3B0TGlzdC5zbGlkZURvd24oKTtcbiAgICBlbC5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlT3Blbik7XG4gIH1cblxuICBmdW5jdGlvbiBpbnB1dE91dChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgICAgalF1ZXJ5LnRyaW0oaW5wdXRUeHQudmFsKCkpLmxlbmd0aCA9PT0gMCAmJiBlbC5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICAgIG9wdExpc3Quc2xpZGVVcCgpO1xuICAgICAgZWwucmVtb3ZlQ2xhc3MoQ0xBU1MuX29wZW4pXG4gICAgfSwgMTApO1xuICB9XG5cbiAgZnVuY3Rpb24gaXRlbUNsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBsZXQgaXRlbSA9ICQodGhpcyksXG4gICAgICAgIHZhbCA9IGl0ZW0uZGF0YSgndmFsdWUnKSxcbiAgICAgICAgdHh0ID0gaXRlbS50ZXh0KCk7XG5cbiAgICBpZiAoaXRlbS5oYXNDbGFzcygnaGFzLWljb24nKSkge1xuICAgICAgdHh0ID0gaXRlbS5maW5kKCdpJykudGV4dCgpO1xuICAgICAgaW5wdXRUeHQuY3NzKHsgJ2JhY2tncm91bmQtaW1hZ2UnOiAndXJsKCcgKyBpdGVtLmZpbmQoJ2ltZycpLmF0dHIoJ3NyYycpICsgJyknIH0pO1xuICAgIH1cblxuICAgIG9wdEl0ZW0ucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgaXRlbS5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBlbC5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBpbnB1dFZhbC52YWwodmFsKTtcbiAgICBpbnB1dFR4dC52YWwodHh0KTtcbiAgfVxuXG4gIHRoaXMucmVJbml0ID0gKCkgPT4ge1xuICAgIG9wdEl0ZW0gPSBvcHRMaXN0LmZpbmQoJ2xpJyk7XG4gICAgb3B0SXRlbS5vZmYoQ0xJQ0spLm9uKENMSUNLLCBpdGVtQ2xpY2tlZCk7XG4gIH1cblxuXHRyZXR1cm4gdGhpcztcbn07IiwiLy8gLyoqKioqIElucHV0IFdyYXAgKioqKiovXG4vLyBsZXQgSW5wdXRXcmFwID0gZnVuY3Rpb24oZWxlbWVudCkge1xuXG4vLyAgIGxldCBlbCA9ICQoZWxlbWVudCksXG4vLyAgICAgICBpbnB1dCA9IGVsLmZpbmQoJ2lucHV0JyksXG4vLyAgICAgICBsYWJlbCA9IGVsLmZpbmQoJ2xhYmVsJyk7XG5cblxuLy8gICAoKCkgPT4gaW5pdCgpKSgpO1xuLy8gICBmdW5jdGlvbiBpbml0KCkge1xuLy8gICAgIGluaXRFdmVudCgpO1xuLy8gICB9XG5cbi8vICAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuLy8gICAgIC8vIGVsLm9uKENMSUNLLCB3cmFwQ2xpY2tlZCk7XG4vLyAgICAgaW5wdXQub24oRl9PVVQsIGlucHV0T3V0KTtcbi8vICAgfVxuXG4vLyAgIGZ1bmN0aW9uIHdyYXBDbGlja2VkKGUpIHtcbi8vICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4vLyAgICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcbi8vICAgICBlbC5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbi8vICAgICBzZXRUaW1lb3V0KCgpID0+IGlucHV0LmZvY3VzKCksIDIwMCk7XG4vLyAgIH1cblxuLy8gICBmdW5jdGlvbiBpbnB1dE91dChlKSB7XG4vLyAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuLy8gICAgIGxldCB2YWwgPSBqUXVlcnkudHJpbShpbnB1dC52YWwoKSk7XG5cbi8vICAgICBjb25zb2xlLmxvZyh2YWwubGVuZ3RoKTtcblxuLy8gICAgIGlmICh2YWwubGVuZ3RoID09PSAwKSB7XG4vLyAgICAgICBlbC5oYXNDbGFzcyhDTEFTUy5faGFzdmFsKSAmJiBlbC5yZW1vdmVDbGFzcyhDTEFTUy5faGFzdmFsKTtcbi8vICAgICB9IGVsc2Uge1xuLy8gICAgICAgZWwuYWRkQ2xhc3MoQ0xBU1MuX2hhc3ZhbCk7XG4vLyAgICAgfVxuLy8gICAgIGVsLmhhc0NsYXNzKENMQVNTLl9hY3RpdmUpICYmIGVsLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuLy8gICB9XG5cbi8vIFx0cmV0dXJuIHRoaXM7XG4vLyB9O1xubGV0IElucHV0V3JhcCA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIGlucHV0ID0gZWwuZmluZCgnaW5wdXQnKTtcblxuICAoKCkgPT4gaW5pdCgpKSgpO1xuICBmdW5jdGlvbiBpbml0KCkge1xuICAgIGluaXRFdmVudCgpO1xuICB9XG5cbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIC8vIGVsLm9uKENMSUNLLCB3cmFwQ2xpY2tlZCk7XG4gICAgaW5wdXQub24oRl9JTiwgYWN0aXZlV3JhcCkub24oRl9PVVQsIGRlYWN0aXZlV3JhcCk7XG4gIH1cblxuICBmdW5jdGlvbiBhY3RpdmVXcmFwKCkge1xuXHRcdGxldCBpbnB1dCA9ICQodGhpcyksXG5cdFx0XHRcdHdyYXAgPSBpbnB1dC5wYXJlbnRzKCcuaW5wdXQtd3JhcCcpO1xuXHRcdHdyYXAubGVuZ3RoID4gMCAmJiB3cmFwLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpO1xuXHR9XG5cblx0ZnVuY3Rpb24gZGVhY3RpdmVXcmFwKCkge1xuXHRcdGxldCBpbnB1dCA9ICQodGhpcyksXG5cdFx0XHRcdHdyYXAgPSBpbnB1dC5wYXJlbnRzKCcuaW5wdXQtd3JhcCcpO1xuXHRcdHdyYXAubGVuZ3RoID4gMCAmJiAkLnRyaW0oaW5wdXQudmFsKCkpLmxlbmd0aCA9PT0gMCAmJiB3cmFwLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpO1xuXHR9XG5cblx0cmV0dXJuIHRoaXM7XG59OyIsIi8qKioqKiBTZWxlY3Rpb24gTmF2ICoqKioqL1xubGV0IFNsTmF2ID0gZnVuY3Rpb24oZWxlbWVudCkge1xuXG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBoZWFkZXIgPSBlbC5maW5kKCcuaGVhZGVyJyksXG4gICAgICB0aXRsZSA9IGhlYWRlci5maW5kKCdzcGFuJyksXG4gICAgICBsaW5rcyA9IGVsLmZpbmQoJ2EnKSxcbiAgICAgIG91dEV2ZW50ID0gQVBQLl9pc01vYmlsZSA/ICdtb3VzZW91dCcgOiAnZm9jdXNvdXQnLFxuICAgICAgaXNPcGVuID0gZmFsc2U7XG5cbiAgKCgpID0+IGluaXRFdmVudCgpKSgpO1xuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgaGVhZGVyLm9uKCdjbGljaycsIHRvb2dsZU1lbnUpLm9uKG91dEV2ZW50LCAoKSA9PiBzZXRUaW1lb3V0KCgpID0+IGlzT3BlbiAmJiBjbG9zZU1lbnUoKSwgMTAwKSk7XG4gICAgbGlua3Mub24oJ2NsaWNrJywgbGlua0NsaWNrZWQpO1xuICB9XG5cbiAgZnVuY3Rpb24gdG9vZ2xlTWVudShlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIGlzT3BlbiA/IGNsb3NlTWVudSgpIDogc2hvd01lbnUoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHNob3dNZW51KCkge1xuICAgIGhlYWRlci5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKS5mb2N1cygpO1xuICAgIGlzT3BlbiA9IHRydWU7XG4gIH1cblxuICBmdW5jdGlvbiBjbG9zZU1lbnUoKSB7XG4gICAgaGVhZGVyLnJlbW92ZUNsYXNzKENMQVNTLl9hY3RpdmUpLmJsdXIoKTtcbiAgICBpc09wZW4gPSBmYWxzZTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGxpbmtDbGlja2VkKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgbGV0IGl0ZW0gPSAkKHRoaXMpLFxuICAgICAgICB0eHQgPSBpdGVtLnRleHQoKSxcbiAgICAgICAgdXJsID0gaXRlbS5hdHRyKCdocmVmJyk7XG5cbiAgICBsaW5rcy5yZW1vdmVDbGFzcyhDTEFTUy5fYWN0aXZlKTtcbiAgICBpdGVtLmFkZENsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIHRpdGxlLnRleHQodHh0KTtcbiAgICBoZWFkZXIucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgd2luZG93LmxvY2F0aW9uLmhyZWYgPSB1cmw7XG4gIH1cblxuXHRyZXR1cm4gdGhpcztcbn07IiwiLyoqKioqIFVwbG9hZCBJbWFnZSAqKioqKi9cbmxldCBVcGxvYWRJbWcgPSBmdW5jdGlvbihlbGVtZW50KSB7XG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBob2xkZXIgPSBlbC5maW5kKCcuaG9sZGVyJyksXG4gICAgICBpbnB1dCA9IGVsLmZpbmQoJ2lucHV0W3R5cGU9ZmlsZV0nKSxcbiAgICAgIGltZyA9IGVsLmZpbmQoJ2ltZycpLFxuICAgICAgdHh0RXJyID0gZWwuZmluZCgnLndhcm5pbmcnKSxcbiAgICAgIG1heCA9IHBhcnNlSW50KGlucHV0LmRhdGEoJ21heCcpKSxcbiAgICAgIHR4dE1heCA9IGlucHV0LmF0dHIoJ3R4dC1tYXgnKSxcbiAgICAgIHR4dFR5cGUgPSBpbnB1dC5hdHRyKCd0eHQtdHlwZScpLFxuICAgICAgaW1nQjY0ID0gbnVsbDtcblxuICAoKCkgPT4gaW5pdCgpKSgpO1xuICBmdW5jdGlvbiBpbml0KCkge1xuICAgIGluaXRFdmVudCgpO1xuICB9XG5cbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIGlucHV0Lm9uKENIQU5HRSwgZmlsZUNoYW5nZWQpO1xuICB9XG5cbiAgZnVuY3Rpb24gZmlsZUNoYW5nZWQoKSB7XG4gICAgcmVzZXQoKTtcbiAgICBpZiAodGhpcy5maWxlcyAmJiB0aGlzLmZpbGVzWzBdKSB7XG4gICAgICBsZXQgZmlsZSA9IHRoaXMuZmlsZXNbMF07XG4gICAgICBmaWx0ZXJGaWxlKGZpbGUpICYmIHNob3dJbWcoZmlsZSk7XG4gICAgfVxuICB9XG5cbiAgZnVuY3Rpb24gZmlsdGVyU2l6ZShzaXplKSB7XG4gICAgbGV0IHBhc3MgPSB0cnVlO1xuICAgIChzaXplIC8gKDEwMDAqMTAwMCkudG9GaXhlZCgyKSA8IG1heCkgfHwgKHBhc3MgPSBmYWxzZSwgc2hvd0Vycih0eHRNYXgpKTtcbiAgICByZXR1cm4gcGFzcztcbiAgfVxuXG4gIGZ1bmN0aW9uIGZpbHRlclR5cGUodHlwZSkge1xuICAgIGxldCBwYXNzID0gdHJ1ZTtcbiAgICB0eXBlLmluY2x1ZGVzKCdpbWFnZS8nKSB8fCAocGFzcyA9IGZhbHNlLCBzaG93RXJyKHR4dFR5cGUpKTtcbiAgICByZXR1cm4gcGFzcztcbiAgfVxuXG4gIGZ1bmN0aW9uIGZpbHRlckZpbGUoZmlsZSkge1xuICAgIGxldCBwYXNzID0gdHJ1ZTtcbiAgICBwYXNzID0gZmlsdGVyU2l6ZShmaWxlLnNpemUpO1xuICAgIHBhc3MgJiYgKHBhc3MgPSBmaWx0ZXJUeXBlKGZpbGUudHlwZSkpO1xuICAgIHJldHVybiBwYXNzO1xuICB9XG5cbiAgZnVuY3Rpb24gc2hvd0ltZyhmaWxlKSB7XG4gICAgbGV0IHJlYWRlciA9IG5ldyBGaWxlUmVhZGVyKCk7XG5cbiAgICByZXNldCgpO1xuICAgIGhvbGRlci5oYXNDbGFzcyhDTEFTUy5fYWN0aXZlKSB8fCBob2xkZXIuYWRkQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgcmVhZGVyLnJlYWRBc0RhdGFVUkwoZmlsZSk7XG4gICAgcmVhZGVyLm9ubG9hZCA9IGUgPT4ge1xuICAgICAgaW1nQjY0ID0gZS50YXJnZXQucmVzdWx0O1xuICAgICAgaW1nLmF0dHIoJ3NyYycsIGltZ0I2NCk7XG4gICAgfVxuICB9XG5cbiAgZnVuY3Rpb24gc2hvd0VycihlcnIpIHtcbiAgICBlbC5hZGRDbGFzcyhDTEFTUy5fZXJyb3IpO1xuICAgIHR4dEVyci50ZXh0KGVycik7XG4gIH1cblxuICBmdW5jdGlvbiByZXNldCgpIHtcbiAgICBlbC5oYXNDbGFzcyhDTEFTUy5fZXJyb3IpICYmIGVsLnJlbW92ZUNsYXNzKENMQVNTLl9lcnJvcik7XG4gIH1cblxuICB0aGlzLmdldEltZyA9ICgpID0+IGltZ0I2NDtcblx0cmV0dXJuIHRoaXM7XG59O1xuIiwiLyoqKioqIFNjcm9sbEFuaW1hdG9yICoqKioqL1xubGV0IFNjcm9sbEFuaW1hdG9yID0gZnVuY3Rpb24oZWxlbWVudCkge1xuXG5cdGxldCBlbCA9ICQoZWxlbWVudCksXG5cdFx0XHRldmVudCA9ICdzY3JvbGwnLFxuXG5cdFx0XHR0cmlnZ2VyUmFuZ2UgPSAwLFxuXHRcdFx0dHJpZ2dlclN0YXJ0ID0gMCxcblx0XHRcdHRyaWdnZXJFbmQgPSAwLFxuXG5cdFx0XHRzZXR0aW5nID0gbmV3IFNjcm9sbFNldHRpbmcoZWwpLFxuXHRcdFx0dGFyZ2V0ID0gZWwuZGF0YSgndGFyZ2V0JyksXG5cdFx0XHR0dyA9IG51bGwsXG5cdFx0XHRpc0VuZCA9IGZhbHNlLFxuXHRcdFx0cHJlUnVuID0gZmFsc2U7XG5cblx0KCgpID0+IHtcblx0XHRnZXRUYXJnZXQoKTtcblx0XHRjYWxjUmFuZ2UoKTtcblx0XHRpbml0RXZlbnQoKTtcblx0XHQvLyBjaGVja0luVmlldygpO1xuXHRcdGNvbnNvbGUubG9nKHRyaWdnZXJTdGFydCwgdHJpZ2dlckVuZCwgdHJpZ2dlclJhbmdlKTtcblx0fSkoKTtcblxuXHRmdW5jdGlvbiBjaGVja0luVmlldygpIHtcblx0XHRsZXQgb2Zmc2V0ID0gZWwub2Zmc2V0KCksXG5cdFx0XHRcdHBvc1kgPSBvZmZzZXQudG9wIC0gJCh3aW5kb3cpLnNjcm9sbFRvcCgpO1xuXG5cdFx0Ly8gY29uc29sZS5sb2cocG9zWSwgdHJpZ2dlclN0YXJ0KTtcblx0XHRpZiAocG9zWSA8IEFQUC5fSCkge1xuXHRcdFx0dHcgJiYgdHcua2lsbCgpO1xuXHRcdFx0VHdlZW5NYXguc2V0KHRhcmdldCwgc2V0dGluZy5nZXQoMCkpO1xuXHRcdFx0dHcgPSBUd2Vlbk1heC50byh0YXJnZXQsIDEsIHNldHRpbmcuZ2V0KDEpKTtcblx0XHRcdHByZVJ1biA9IHRydWU7XG5cdFx0fVxuXHR9XG5cblx0ZnVuY3Rpb24gZ2V0VGFyZ2V0KCkge1xuXHRcdHN3aXRjaCh0YXJnZXQpIHtcblx0XHRcdGNhc2UgdW5kZWZpbmVkOiB0YXJnZXQgPSBlbDsgYnJlYWs7XG5cdFx0XHRjYXNlICduZXh0JzogdGFyZ2V0ID0gZWwubmV4dCgpOyBicmVhaztcblx0XHRcdGRlZmF1bHQ6IHRhcmdldCA9ICQodGFyZ2V0KTsgYnJlYWs7XG5cdFx0fVxuXHR9XG5cblx0ZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuXHRcdCQod2luZG93KS5vbihldmVudCwgc2Nyb2xsKTtcblx0XHRkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFNJWkVfQ0hBTkdFRCwgY2FsY1JhbmdlKTtcblx0fVxuXG5cdGZ1bmN0aW9uIGNhbGNSYW5nZSgpIHtcblx0XHR0cmlnZ2VyUmFuZ2UgPSAocGFyc2VJbnQoZWwuZGF0YSgncmFuZ2UnKSkgKiBBUFAuX0gpIC8gMTAwO1xuXHRcdHRyaWdnZXJTdGFydCA9IChwYXJzZUludChlbC5kYXRhKCdzdGFydCcpKSAqIEFQUC5fSCkgLyAxMDA7XG5cdFx0dHJpZ2dlckVuZCA9IHRyaWdnZXJTdGFydCAtIHRyaWdnZXJSYW5nZTtcblxuXG5cdH1cblxuXHRmdW5jdGlvbiBzY3JvbGwoZSkge1xuXHRcdC8vaWYgKEFQUC5faXNTY3JvbGwpIHJldHVybiB0cnVlO1xuXHRcdGxldCBvZmZzZXQgPSBlbC5vZmZzZXQoKSxcblx0XHRcdFx0cG9zWSA9IG9mZnNldC50b3AgLSAkKHdpbmRvdykuc2Nyb2xsVG9wKCksXG5cdFx0XHRcdC8vcG9zWCA9IG9mZnNldC5sZWZ0IC0gJCh3aW5kb3cpLnNjcm9sbExlZnQoKSxcblx0XHRcdFx0cHJvZ3Jlc3MgPSAwO1xuXG5cdFx0Ly8gY29uc29sZS5sb2cocG9zWSwgdHJpZ2dlckVuZCk7XG5cblx0XHRpZiAocG9zWSA8IHRyaWdnZXJFbmQpIHtcblx0XHRcdHByZVJ1biA9IGZhbHNlO1xuXHRcdFx0aXNFbmQgPSBpc0VuZCAmJiAodHcgJiYgdHcua2lsbCgpLCB0dyA9IFR3ZWVuTWF4LnRvKHRhcmdldCwgMC4xLCBzZXR0aW5nLmdldCgxKSksIGZhbHNlKTtcblx0XHR9XG5cblx0XHRpZiAoaXNFbmQgJiYgcG9zWSA8IHRyaWdnZXJFbmQpIHtcblx0XHRcdC8vY29uc29sZS5sb2coJ2VuZCcsIHBvc1kpO1xuXHRcdFx0dHcgJiYgdHcua2lsbCgpO1xuXHRcdFx0dHcgPSBUd2Vlbk1heC50byh0YXJnZXQsIDAuMSwgc2V0dGluZy5nZXQoMSkpO1xuXHRcdFx0aXNFbmQgPSBmYWxzZTtcblx0XHR9XG5cblx0XHRpZiAoaXNFbmQgJiYgcG9zWSA+IHRyaWdnZXJTdGFydCkge1xuXHRcdFx0Ly9jb25zb2xlLmxvZygnZW5kJywgcG9zWSk7XG5cdFx0XHR0dyAmJiB0dy5raWxsKCk7XG5cdFx0XHR0dyA9IFR3ZWVuTWF4LnRvKHRhcmdldCwgMC4xLCBzZXR0aW5nLmdldCgwKSk7XG5cdFx0XHRpc0VuZCA9IGZhbHNlO1xuXHRcdH1cblxuXHRcdGlmIChwcmVSdW4gfHwgcG9zWSA+IHRyaWdnZXJTdGFydCB8fCBwb3NZIDwgdHJpZ2dlckVuZCkgcmV0dXJuIHRydWU7XG5cdFx0cHJvZ3Jlc3MgPSBjYWxjUHJvZ3Jlc3MocG9zWSAtIHRyaWdnZXJFbmQpO1xuXHRcdGlzRW5kID0gdHJ1ZTtcblxuXHRcdC8vY29uc29sZS5sb2cocG9zWSwgcHJvZ3Jlc3MpO1xuXHRcdHR3ICYmIHR3LmtpbGwoKTtcblx0XHR0dyA9IFR3ZWVuTWF4LnRvKHRhcmdldCwgMC4xLCBzZXR0aW5nLmdldChwcm9ncmVzcykpO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2FsY1Byb2dyZXNzKHByb2dyZXNzKSB7XG5cdFx0cmV0dXJuICgodHJpZ2dlclJhbmdlIC0gcHJvZ3Jlc3MpIC8gdHJpZ2dlclJhbmdlKTtcblx0fVxuXG5cdHJldHVybiB0aGlzO1xufTsiLCIvKioqKiogU2Nyb2xsU2V0dGluZyAqKioqKi9cbmxldCBTY3JvbGxTZXR0aW5nID0gZnVuY3Rpb24oZWxlbWVudCkge1xuXG5cdGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBzdGFydEF0dHIgPSB7fSxcbiAgICAgIGVuZEF0dHIgPSB7fSxcblx0XHRcdGFscGhhID0ge30sXG5cdFx0XHRzY2FsZSA9IHt9LFxuXHRcdFx0dGZ4ID0ge30sXG5cdFx0XHR0ZnkgPSB7fTtcblxuXHQoKCkgPT4gaW5pdFRyYW5zZm9ybSgpKSgpO1xuXHRmdW5jdGlvbiBpbml0VHJhbnNmb3JtKCkge1xuXHRcdGluaXRBbHBoYSgpO1xuXHRcdGluaXRTY2FsZSgpO1xuXHRcdGluaXRUZngoKTtcblx0XHRpbml0VGZ5KCk7XG5cdFx0Z2V0U3RhdGUoKTtcblx0fVxuXG5cdGZ1bmN0aW9uIGluaXRBbHBoYSgpIHtcblx0XHRsZXQgYXR0ciA9IGVsLmRhdGEoJ2FscGhhJyk7XG5cdFx0YWxwaGEuc3RhcnQgPSBhdHRyID8gKGFscGhhLmZyb20gPSBwYXJzZUZsb2F0KGVsLmRhdGEoJ2FscGhhLWZyb20nKSksIGFscGhhLnRvID0gcGFyc2VGbG9hdChlbC5kYXRhKCdhbHBoYS10bycpKSwgYWxwaGEub2Zmc2V0ID0gYWxwaGEudG8gLSBhbHBoYS5mcm9tLCB0cnVlKSA6IGZhbHNlO1xuXHRcdC8vY29uc29sZS5sb2coYWxwaGEpO1xuXHR9XG5cblx0ZnVuY3Rpb24gaW5pdFNjYWxlKCkge1xuXHRcdGxldCBhdHRyID0gZWwuZGF0YSgnc2NhbGUnKTtcblx0XHRzY2FsZS5zdGFydCA9IGF0dHIgPyAoc2NhbGUuZnJvbSA9IHBhcnNlRmxvYXQoZWwuZGF0YSgnc2NhbGUtZnJvbScpKSwgc2NhbGUudG8gPSBwYXJzZUZsb2F0KGVsLmRhdGEoJ3NjYWxlLXRvJykpLCBzY2FsZS5vZmZzZXQgPSBzY2FsZS50byAtIHNjYWxlLmZyb20sIHRydWUpIDogZmFsc2U7XG5cdFx0Ly9jb25zb2xlLmxvZyhzY2FsZSk7XG5cdH1cblxuXHRmdW5jdGlvbiBpbml0VGZ4KCkge1xuXHRcdGxldCBhdHRyID0gZWwuZGF0YSgndGZ4Jyk7XG5cdFx0dGZ4LnN0YXJ0ID0gYXR0ciA/ICh0ZnguZnJvbSA9IHBhcnNlSW50KGVsLmRhdGEoJ3RmeC1mcm9tJykpLCB0ZngudG8gPSBwYXJzZUludChlbC5kYXRhKCd0ZngtdG8nKSksIHRmeC5vZmZzZXQgPSB0ZngudG8gLSB0ZnguZnJvbSwgdHJ1ZSkgOiBmYWxzZTtcblx0XHQvL2NvbnNvbGUubG9nKHRmeCk7XG5cdCB9XG5cblx0ZnVuY3Rpb24gaW5pdFRmeSgpIHtcblx0XHRsZXQgYXR0ciA9IGVsLmRhdGEoJ3RmeScpO1xuXHRcdHRmeS5zdGFydCA9IGF0dHIgPyAodGZ5LmZyb20gPSBwYXJzZUludChlbC5kYXRhKCd0ZnktZnJvbScpKSwgdGZ5LnRvID0gcGFyc2VJbnQoZWwuZGF0YSgndGZ5LXRvJykpLCB0Znkub2Zmc2V0ID0gdGZ5LnRvIC0gdGZ5LmZyb20sIHRydWUpIDogZmFsc2U7XG5cdFx0Ly8gY29uc29sZS5sb2codGZ5KTtcblx0fVxuXG5cdGZ1bmN0aW9uIGdldFN0YXRlKCkge1xuXHRcdHN0YXJ0QXR0ciA9IHsgZm9yY2UzRDogdHJ1ZSwgZWFzZTogRXhwby5lYXNlT3V0IH07XG5cdFx0ZW5kQXR0ciA9IHsgZm9yY2UzRDogdHJ1ZSwgZWFzZTogRXhwby5lYXNlT3V0IH07XG5cdFx0YWxwaGEuc3RhcnQgJiYgKHN0YXJ0QXR0ci5hdXRvQWxwaGEgPSBhbHBoYS5mcm9tLCBlbmRBdHRyLmF1dG9BbHBoYSA9IGFscGhhLnRvKTtcblx0XHRzY2FsZS5zdGFydCAmJiAoc3RhcnRBdHRyLnNjYWxlID0gc2NhbGUuZnJvbSwgZW5kQXR0ci5zY2FsZSA9IHNjYWxlLnRvKTtcblx0XHR0Znguc3RhcnQgJiYgKHN0YXJ0QXR0ci54ID0gdGZ4LmZyb20sIGVuZEF0dHIueCA9IHRmeC50byk7XG5cdFx0dGZ5LnN0YXJ0ICYmIChzdGFydEF0dHIueSA9IHRmeS5mcm9tLCBlbmRBdHRyLnkgPSB0ZnkudG8pO1xuXHR9XG5cbiAgdGhpcy5nZXQgPSBmdW5jdGlvbihwcm9ncmVzcykge1xuICAgIGxldCBzZXR0aW5ncyA9IHt9O1xuICAgIHN3aXRjaChwcm9ncmVzcykge1xuICAgICAgY2FzZSAwOiByZXR1cm4gc3RhcnRBdHRyO1xuICAgICAgY2FzZSAxOiByZXR1cm4gZW5kQXR0cjtcbiAgICAgIGRlZmF1bHQ6IHtcbiAgICAgICAgc2V0dGluZ3MgPSB7IGZvcmNlM0Q6IHRydWUsIGVhc2U6IEV4cG8uZWFzZU91dCB9O1xuICAgICAgICBhbHBoYS5zdGFydCAmJiAoc2V0dGluZ3MuYXV0b0FscGhhID0gKHByb2dyZXNzICogYWxwaGEub2Zmc2V0KSArIGFscGhhLmZyb20pO1xuICAgICAgICBzY2FsZS5zdGFydCAmJiAoc2V0dGluZ3Muc2NhbGUgPSAocHJvZ3Jlc3MgKiBzY2FsZS5vZmZzZXQpICsgc2NhbGUuZnJvbSk7XG4gICAgICAgIHRmeC5zdGFydCAmJiAoc2V0dGluZ3MueCA9IChwcm9ncmVzcyAqIHRmeC5vZmZzZXQpICsgdGZ4LmZyb20pO1xuICAgICAgICB0Znkuc3RhcnQgJiYgKHNldHRpbmdzLnkgPSAocHJvZ3Jlc3MgKiB0Znkub2Zmc2V0KSArIHRmeS5mcm9tKTtcbiAgICAgICAgcmV0dXJuIHNldHRpbmdzO1xuICAgICAgfVxuICAgIH1cbiAgfVxuXG5cdHJldHVybiB0aGlzO1xufTsiLCIvKioqKiogU2Nyb2xsVHJpZ2dlciAqKioqKi9cbmxldCBTY3JvbGxUcmlnZ2VyID0gZnVuY3Rpb24oZWxlbWVudCkge1xuXG5cdGxldCBlbCA9ICQoZWxlbWVudCksXG5cdFx0XHRldmVudCA9ICdzY3JvbGwnLFxuXHRcdFx0dHJpZ2dlclN0YXJ0ID0gMCxcblx0XHRcdHRpbWUgPSAxLFxuICAgICAgc2V0dGluZyA9IG5ldyBTY3JvbGxTZXR0aW5nKGVsKSxcbiAgICAgIHRhcmdldCA9IGVsLmRhdGEoJ3RhcmdldCcpLFxuICAgICAgdHcgPSBudWxsLFxuICAgICAgcnVuU3RhcnQgPSBmYWxzZSxcbiAgICAgIHJ1bkVuZCA9IGZhbHNlO1xuXG5cdCgoKSA9PiB7XG5cdFx0Z2V0VGFyZ2V0KCk7XG5cdFx0Y2FsY1JhbmdlKCk7XG5cdFx0aW5pdEV2ZW50KCk7XG4gICAgY2hlY2tJblZpZXcoKTtcblx0fSkoKTtcblxuXHRmdW5jdGlvbiBjaGVja0luVmlldygpIHtcblx0XHRsZXQgb2Zmc2V0ID0gZWwub2Zmc2V0KCksXG5cdFx0XHRcdHBvc1kgPSBvZmZzZXQudG9wIC0gJCh3aW5kb3cpLnNjcm9sbFRvcCgpO1xuXG5cblx0XHRpZiAocG9zWSA8IEFQUC5fSCkge1xuXHRcdFx0dHcgJiYgdHcua2lsbCgpO1xuXHRcdFx0VHdlZW5NYXguc2V0KHRhcmdldCwgc2V0dGluZy5nZXQoMCkpO1xuXHRcdFx0dHcgPSBUd2Vlbk1heC50byh0YXJnZXQsIHRpbWUsIHNldHRpbmcuZ2V0KDEpKTtcblx0XHRcdHJ1blN0YXJ0ID0gdHJ1ZTtcblx0XHR9XG5cdH1cblxuXHRmdW5jdGlvbiBnZXRUYXJnZXQoKSB7XG5cdFx0c3dpdGNoKHRhcmdldCkge1xuXHRcdFx0Y2FzZSB1bmRlZmluZWQ6IHRhcmdldCA9IGVsOyBicmVhaztcblx0XHRcdGNhc2UgJ25leHQnOiB0YXJnZXQgPSBlbC5uZXh0KCk7IGJyZWFrO1xuXHRcdFx0ZGVmYXVsdDogdGFyZ2V0ID0gJCh0YXJnZXQpOyBicmVhaztcbiAgICB9XG5cdH1cblxuXHRmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG5cdFx0JCh3aW5kb3cpLm9uKGV2ZW50LCBzY3JvbGwpO1xuXHRcdGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoU0laRV9DSEFOR0VELCBjYWxjUmFuZ2UpO1xuXHR9XG5cblx0ZnVuY3Rpb24gY2FsY1JhbmdlKCkge1xuXHRcdHRyaWdnZXJTdGFydCA9IChwYXJzZUludChlbC5kYXRhKCdzdGFydCcpKSAqIEFQUC5fSCkgLyAxMDA7XG4gIH1cblxuXHRmdW5jdGlvbiBzY3JvbGwoZSkge1xuXHRcdC8vaWYgKEFQUC5faXNTY3JvbGwpIHJldHVybiB0cnVlO1xuXHRcdGxldCBvZmZzZXQgPSBlbC5vZmZzZXQoKSxcbiAgICAgICAgcG9zWSA9IG9mZnNldC50b3AgLSAkKHdpbmRvdykuc2Nyb2xsVG9wKCk7XG5cblxuICAgIGlmICghcnVuU3RhcnQgJiYgcG9zWSA8IHRyaWdnZXJTdGFydCkge1xuICAgICAgdHcgJiYgdHcua2lsbCgpO1xuICAgICAgdHcgPSBUd2Vlbk1heC50byh0YXJnZXQsIHRpbWUsIHNldHRpbmcuZ2V0KDEpKTtcbiAgICAgIHJ1blN0YXJ0ID0gdHJ1ZTtcbiAgICAgIHJ1bkVuZCA9IGZhbHNlO1xuICAgICAgY29uc29sZS5sb2coJ3J1blN0YXJ0Jyk7XG4gICAgfVxuXG4gICAgaWYgKCFydW5FbmQgJiYgcG9zWSA+IHRyaWdnZXJTdGFydCkge1xuICAgICAgdHcgJiYgdHcua2lsbCgpO1xuICAgICAgdHcgPSBUd2Vlbk1heC50byh0YXJnZXQsIHRpbWUsIHNldHRpbmcuZ2V0KDApKTtcbiAgICAgIHJ1bkVuZCA9IHRydWU7XG4gICAgICBydW5TdGFydCA9IGZhbHNlO1xuICAgICAgY29uc29sZS5sb2coJ3J1bkVuZCcpO1xuICAgIH1cblx0fVxuXG5cdHJldHVybiB0aGlzO1xufTsiLCJsZXQgUG9wdXBBbGVydCA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIHBvcHVwID0gbmV3IFBvcHVwQmFzZShlbCksXG4gICAgICBwVGl0bGUgPSBlbC5maW5kKCcudGl0bGUnKSxcbiAgICAgIHBEZXNjID0gZWwuZmluZCgnLmRlc2MnKSxcbiAgICAgIHBIdG1sID0gZWwuZmluZCgnLmh0bWwnKTtcblxuICB0aGlzLnVwZGF0ZSA9ICh0aXRsZSwgZGVzYywgaHRtbCA9ICcnKSA9PiB7XG4gICAgdGl0bGUubGVuZ3RoID4gMCAmJiBwVGl0bGUudGV4dCh0aXRsZSk7XG4gICAgZGVzYy5sZW5ndGggPiAwICYmIHBEZXNjLnRleHQoZGVzYyk7XG4gICAgaHRtbC5sZW5ndGggPiAwICYmIHBIdG1sLmh0bWwoaHRtbCk7XG4gIH1cblxuICB0aGlzLnNob3cgPSAoKSA9PiBwb3B1cC5zaG93KCk7XG4gIHRoaXMuaGlkZSA9ICgpID0+IHBvcHVwLmhpZGUoKTtcbiAgcmV0dXJuIHRoaXM7XG59OyIsImxldCBQb3B1cEJhc2UgPSBmdW5jdGlvbihlbGVtZW50KSB7XG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBvdmVybGF5ID0gZWwuZmluZCgnLm92ZXJsYXknKSxcbiAgICAgIGJ0bkNsb3NlID0gZWwuZmluZCgnLmJ0bi1jbG9zZScpO1xuXG4gIHRoaXMuc2hvdyA9ICgpID0+IHtcbiAgICBlbC5mYWRlSW4oKTtcbiAgICBBUFAuX2lzT3ZsQWN0aXZlID0gdHJ1ZTtcbiAgICBBUFAuX2h0bWwuYWRkQ2xhc3MoQ0xBU1MuX292bEFjdGl2ZSk7XG4gIH1cblxuICB0aGlzLmhpZGUgPSAoKSA9PiB7XG4gICAgZWwuZmFkZU91dCgpO1xuICAgIEFQUC5faXNPdmxBY3RpdmUgPSBmYWxzZTtcbiAgICBBUFAuX2h0bWwucmVtb3ZlQ2xhc3MoQ0xBU1MuX292bEFjdGl2ZSk7XG4gIH1cblxuICAoKCkgPT4gaW5pdEV2ZW50KCkpKCk7XG4gIGZ1bmN0aW9uIGluaXRFdmVudCgpIHtcbiAgICBvdmVybGF5Lm9uKENMSUNLLCBjbG9zZSk7XG4gICAgYnRuQ2xvc2Uub24oQ0xJQ0ssIGNsb3NlKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGNsb3NlKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgY29uc29sZS5sb2coJ2Jhc2UnKTtcbiAgICBlbC5mYWRlT3V0KCk7XG4gICAgQVBQLl9pc092bEFjdGl2ZSA9IGZhbHNlO1xuICAgIEFQUC5faHRtbC5yZW1vdmVDbGFzcyhDTEFTUy5fb3ZsQWN0aXZlKTtcbiAgfVxuXG4gIHJldHVybiB0aGlzO1xufTsiLCJsZXQgUG9wdXBFZGl0RXhwID0gZnVuY3Rpb24oZWxlbWVudCkge1xuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgcG9wdXAgPSBuZXcgUG9wdXBCYXNlKGVsKSxcbiAgICAgIGZvcm0gPSBuZXcgRm9ybShlbC5maW5kKCdmb3JtJykpO1xuXG4gIHRoaXMudXBkYXRlID0gZGF0YSA9PiB7XG4gICAgbGV0IGlucHV0V3JhcCA9IGVsLmZpbmQoJy5pbnB1dC13cmFwJyksXG4gICAgICAgIGlucHV0U2VsID0gZWwuZmluZCgnLmlucHV0LXNlbCcpLFxuICAgICAgICBkYXRhQXJyYXkgPSBbXTtcblxuICAgIGZvcihsZXQgaSBpbiBkYXRhKSBkYXRhQXJyYXkucHVzaChkYXRhW2ldKTtcbiAgICBlbC5maW5kKCdpbnB1dFtuYW1lPWV4cC1pZF0nKS52YWwoZGF0YS5pZCk7XG4gICAgaW5wdXRXcmFwLmVhY2goZnVuY3Rpb24oaSkge1xuICAgICAgJCh0aGlzKS5hZGRDbGFzcyhDTEFTUy5fYWN0aXZlKS5maW5kKCdpbnB1dCcpLnZhbChkYXRhQXJyYXlbaV0pO1xuICAgIH0pO1xuXG4gICAgZGF0YUFycmF5ID0gZGF0YUFycmF5LnNsaWNlKGlucHV0V3JhcC5sZW5ndGggKyAxKTtcbiAgICBpbnB1dFNlbC5lYWNoKGZ1bmN0aW9uKGkpIHtcbiAgICAgICQodGhpcykuZmluZCgnaW5wdXRbdHlwZT1oaWRkZW5dJykudmFsKGRhdGFBcnJheVtpXSk7XG4gICAgfSk7XG5cbiAgICBwb3B1cC5zaG93KCk7XG4gIH1cblxuICB0aGlzLnNob3cgPSAoKSA9PiBwb3B1cC5zaG93KCk7XG4gIHRoaXMuaGlkZSA9ICgpID0+IHBvcHVwLmhpZGUoKTtcbiAgdGhpcy5nZXRFdmVudE5hbWUgPSAoKSA9PiBmb3JtLmdldEV2ZW50TmFtZSgpO1xuICByZXR1cm4gdGhpcztcbn07XG4iLCJsZXQgUG9wdXBGb3JtID0gZnVuY3Rpb24oZWxlbWVudCkge1xuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgcG9wdXAgPSBuZXcgUG9wdXBCYXNlKGVsKSxcbiAgICAgIGZvcm0gPSBuZXcgRm9ybShlbC5maW5kKCdmb3JtJykpO1xuXG4gIHRoaXMuc2hvdyA9ICgpID0+IHBvcHVwLnNob3coKTtcbiAgdGhpcy5oaWRlID0gKCkgPT4gcG9wdXAuaGlkZSgpO1xuICB0aGlzLmdldEV2ZW50TmFtZSA9ICgpID0+IGZvcm0uZ2V0RXZlbnROYW1lKCk7XG4gIHJldHVybiB0aGlzO1xufTsiLCJsZXQgUG9wdXBNZWRpYSA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcbiAgbGV0IGVsID0gJChlbGVtZW50KSxcbiAgICAgIHBvcHVwID0gbmV3IFBvcHVwQmFzZShlbCksXG4gICAgICBidG5DbG9zZSA9IGVsLmZpbmQoJy5idG4tY2xvc2UnKSxcbiAgICAgIHdyYXAgPSBlbC5maW5kKCcudmlkLXdyYXAnKSxcbiAgICAgIG1lZGlhID0ge307XG5cbiAgKCgpID0+IGluaXRFdmVudCgpKSgpO1xuICBmdW5jdGlvbiBpbml0RXZlbnQoKSB7XG4gICAgYnRuQ2xvc2Uub24oQ0xJQ0ssICgpID0+IG1lZGlhLnBhdXNlKCkpO1xuICB9XG5cbiAgdGhpcy5zaG93ID0gZGF0YSA9PiB1cGRhdGUoZGF0YSk7XG4gIHRoaXMuaGlkZSA9ICgpID0+IGhpZGVQb3B1cCgpO1xuICB0aGlzLmdldEV2ZW50TmFtZSA9ICgpID0+IGZvcm0uZ2V0RXZlbnROYW1lKCk7XG5cbiAgZnVuY3Rpb24gdXBkYXRlKGRhdGEpIHtcbiAgICBjb25zb2xlLmxvZyhkYXRhKTtcblxuICAgIGxldCBzcmMgPSBkYXRhLnNyYyxcbiAgICAgICAgbWVkaWFUYWcgPSBnZXRNZWRpYVRhZyhzcmMpLFxuICAgICAgICBodG1sID0gJyc7XG5cbiAgICBzd2l0Y2gobWVkaWFUYWcpIHtcbiAgICAgIGNhc2UgJ3ZpZGVvJzoge1xuICAgICAgICBodG1sID0gYDx2aWRlbyBwb3N0ZXI9XCIke2RhdGEucG9zdGVyfVwiIGNvbnRyb2xzPlxuICAgICAgICAgICAgICAgICAgPHNvdXJjZSBzcmM9XCIke3NyY31cIiB0eXBlPVwiJHtnZXRNZWRpYVR5cGUoc3JjKX1cIi8+XG4gICAgICAgICAgICAgICAgPC92aWRlbz5gO1xuICAgICAgfSBicmVhaztcblxuICAgICAgY2FzZSAnYXVkaW8nOiB7XG4gICAgICAgIGh0bWwgPSBgPGltZyBjbGFzcz1cIm1lZGlhLXBvc3RlclwiIHNyYz0ke2RhdGEucG9zdGVyfSAvPlxuICAgICAgICAgICAgICAgIDxhdWRpbyBjb250cm9scz5cbiAgICAgICAgICAgICAgICAgIDxzb3VyY2Ugc3JjPVwiJHtzcmN9XCIgdHlwZT1cIiR7Z2V0TWVkaWFUeXBlKHNyYyl9XCIvPlxuICAgICAgICAgICAgICAgIDwvYXVkaW8+YDtcbiAgICAgIH0gYnJlYWs7XG4gICAgfVxuXG4gICAgd3JhcC5odG1sKGh0bWwpO1xuICAgIHBvcHVwLnNob3coKTtcbiAgICBtZWRpYSA9IHdyYXAuZmluZChtZWRpYVRhZykuZ2V0KDApO1xuICAgIG1lZGlhLmFkZEV2ZW50TGlzdGVuZXIoTE9BRCwgKCkgPT4gbWVkaWEucGxheSgpKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGdldE1lZGlhVGFnKHNyYykge1xuICAgIHJldHVybiBzcmMuaW5jbHVkZXMoJ21wNCcpID8gJ3ZpZGVvJyA6IChzcmMuaW5jbHVkZXMoJ21wMycpID8gJ2F1ZGlvJyA6IG51bGwpO1xuICB9XG5cbiAgZnVuY3Rpb24gZ2V0TWVkaWFUeXBlKHNyYykge1xuICAgIHJldHVybiBzcmMuaW5jbHVkZXMoJ21wNCcpID8gJ3ZpZGVvL21wNCcgOiAoc3JjLmluY2x1ZGVzKCdtcDMnKSA/ICdhdWRpby9tcGVnJyA6IG51bGwpO1xuICB9XG5cbiAgZnVuY3Rpb24gaGlkZVBvcHVwKCkge1xuICAgIG1lZGlhLnBhdXNlKCk7XG4gICAgcG9wdXAuaGlkZSgpO1xuICAgIHNldFRpbWVvdXQoKCkgPT4gd3JhcC5lbXB0eSgpLCA1MDApO1xuICB9XG5cbiAgcmV0dXJuIHRoaXM7XG59OyIsImxldCBQb3B1cFBheW1lbnQgPSBmdW5jdGlvbihlbGVtZW50KSB7XG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBwb3B1cCA9IG5ldyBQb3B1cEJhc2UoZWwpLFxuICAgICAgZm9ybSA9IG5ldyBGb3JtKGVsLmZpbmQoJ2Zvcm0nKSksXG4gICAgICBuYW1lID0gZWwuZmluZCgnLnBheW1lbnQtbmFtZScpLFxuICAgICAgcHJpY2UgPSBlbC5maW5kKCcucGF5bWVudC1wcmljZScpLFxuICAgICAgdGltZSA9IGVsLmZpbmQoJy5wYXltZW50LXRpbWUnKSxcbiAgICAgIGlkID0gZWwuZmluZCgnaW5wdXRbbmFtZT1wYXltZW50LWlkXScpO1xuXG4gIHRoaXMuc2hvdyA9IGRhdGEgPT4gdXBkYXRlKGRhdGEpO1xuICB0aGlzLmhpZGUgPSAoKSA9PiBwb3B1cC5oaWRlKCk7XG4gIHRoaXMuZ2V0RXZlbnROYW1lID0gKCkgPT4gZm9ybS5nZXRFdmVudE5hbWUoKTtcblxuICBmdW5jdGlvbiB1cGRhdGUoZGF0YSkge1xuICAgIG5hbWUudGV4dChkYXRhLm5hbWUpO1xuICAgIHByaWNlLnRleHQoZGF0YS5wcmljZSk7XG4gICAgdGltZS50ZXh0KGRhdGEudGltZSk7XG4gICAgaWQudmFsKGRhdGEuaWQpO1xuICAgIHBvcHVwLnNob3coKTtcbiAgfVxuICByZXR1cm4gdGhpcztcbn07IiwibGV0IFBvcHVwVXBsb2FkID0gZnVuY3Rpb24oZWxlbWVudCkge1xuICBsZXQgZWwgPSAkKGVsZW1lbnQpLFxuICAgICAgcG9wdXAgPSBuZXcgUG9wdXBCYXNlKGVsKSxcbiAgICAgIGJ0bkNsb3NlID0gZWwuZmluZCgnLmJ0bi1jbG9zZScpLFxuICAgICAgd3JhcElucHV0ID0gZWwuZmluZCgnLndyYXAtaW5wdXQnKSxcbiAgICAgIGlucHV0ID0gd3JhcElucHV0LmZpbmQoJ2lucHV0JyksXG5cbiAgICAgIHR4dEluZm8gPSBlbC5maW5kKCcudHh0LWluZm8nKSxcbiAgICAgIGluZm9UeHQgPSB0eHRJbmZvLmRhdGEoJ3R4dCcpLFxuICAgICAgdHh0RXJyID0gZWwuZmluZCgnLnR4dC1lcnInKSxcblxuICAgICAgaGVhZGluZyA9IGVsLmZpbmQoJy5oZWFkaW5nJyksXG4gICAgICBkZXNjID0gZWwuZmluZCgnLmRlc2MnKSxcbiAgICAgIG5vdGUgPSBlbC5maW5kKCcucy1ub3RlJyksXG4gICAgICBmaWxlVHlwZSA9IG5vdGUuZmluZCgnLmZpbGUtdHlwZScpLFxuICAgICAgZmlsZVNpemUgPSBub3RlLmZpbmQoJy5maWxlLXNpemUnKSxcblxuICAgICAgYnRuRmluaXNoID0gZWwuZmluZCgnYVtuYW1lPWZpbmlzaF0nKSxcbiAgICAgIGJ0blJldHJ5ID0gZWwuZmluZCgnYVtuYW1lPXJldHJ5XScpLFxuICAgICAgYnRuQ2FuY2VsID0gZWwuZmluZCgnYVtuYW1lPWNhbmNlbF0nKSxcblxuICAgICAgaWQgPSAwLFxuICAgICAgbWF4ID0gMCxcbiAgICAgIG5hbWUgPSAnJyxcbiAgICAgIGFsbG93VHlwZSA9IFtdLFxuICAgICAgYWpheCA9IHt9O1xuXG4gICgoKSA9PiBpbml0RXZlbnQoKSkoKTtcbiAgZnVuY3Rpb24gaW5pdEV2ZW50KCkge1xuICAgIGlucHV0Lm9uKENIQU5HRSwgZmlsZUNoYW5nZWQpO1xuICAgIGJ0bkZpbmlzaC5vbihDTElDSywgKCkgPT4gd2luZG93LmxvY2F0aW9uLnJlbG9hZCgpKTtcbiAgICBidG5SZXRyeS5vbihDTElDSywgKCkgPT4gd2luZG93LmxvY2F0aW9uLnJlbG9hZCgpKTtcbiAgICBidG5DYW5jZWwub24oQ0xJQ0ssIGJ0bkNhbmNlbENsaWNrZWQpO1xuICB9XG5cbiAgZnVuY3Rpb24gZmlsZUNoYW5nZWQoKSB7XG4gICAgcmVzZXQoKTtcbiAgICBpZiAodGhpcy5maWxlcyAmJiB0aGlzLmZpbGVzWzBdKSB7XG4gICAgICBsZXQgZmlsZSA9IHRoaXMuZmlsZXNbMF07XG4gICAgICBmaWx0ZXJGaWxlKGZpbGUpICYmIHByZXBhcmVGaWxlKGZpbGUpO1xuICAgIH1cbiAgfVxuXG4gIGZ1bmN0aW9uIGJ0bkNhbmNlbENsaWNrZWQoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICB3cmFwSW5wdXQucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgaW5wdXQudmFsKG51bGwpO1xuICAgIHR4dEluZm8uaGlkZSgpO1xuICAgIGJ0bkNhbmNlbC5oaWRlKCk7XG4gICAgYnRuQ2xvc2Uuc2hvdygpO1xuICAgIGFqYXguYWJvcnQoKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHVwZGF0ZShkYXRhKSB7XG4gICAgbGV0IHR4dE1pbWUgPSAnJztcblxuICAgIGlkID0gZGF0YS5pZDtcbiAgICBtYXggPSBkYXRhLm1heDtcbiAgICBhbGxvd1R5cGUgPSBkYXRhLnR5cGUuc3BsaXQoJywnKTtcbiAgICBmb3IgKGxldCB0eXBlIG9mIGFsbG93VHlwZSkge1xuICAgICAgdHh0TWltZSArPSB0eXBlLnNwbGl0KCcvJylbMV0gKyAnICc7XG4gICAgfVxuXG4gICAgZmlsZVR5cGUudGV4dCh0eHRNaW1lLnNsaWNlKDAsIC0xKSk7XG4gICAgZmlsZVNpemUudGV4dChtYXgpO1xuICAgIGlucHV0LmF0dHIoJ2FjY2VwdCcsIGRhdGEudHlwZSk7XG4gICAgcG9wdXAuc2hvdygpO1xuICB9XG5cblxuICBmdW5jdGlvbiBoaWRlUG9wdXAoKSB7XG4gICAgcG9wdXAuaGlkZSgpO1xuICB9XG5cbiAgZnVuY3Rpb24gcmVzZXQoKSB7XG4gICAgdHh0SW5mby5oaWRlKCk7XG4gICAgdHh0RXJyLmhpZGUoKTtcbiAgICB3cmFwSW5wdXQuaGFzQ2xhc3MoQ0xBU1MuX2Vycm9yKSAmJiB3cmFwSW5wdXQucmVtb3ZlQ2xhc3MoQ0xBU1MuX2Vycm9yKTtcbiAgfVxuXG4gIGZ1bmN0aW9uIGZpbHRlclNpemUoc2l6ZSkge1xuICAgIGxldCBwYXNzID0gdHJ1ZTtcbiAgICAoc2l6ZSAvICgxMDAwKjEwMDApLnRvRml4ZWQoMikgPCBtYXgpIHx8IChwYXNzID0gZmFsc2UsIHNob3dFcnIodHh0RXJyLmRhdGEoJ3NpemUnKSkpO1xuICAgIHJldHVybiBwYXNzO1xuICB9XG5cbiAgZnVuY3Rpb24gZmlsdGVyVHlwZSh0eXBlKSB7XG4gICAgbGV0IHBhc3MgPSB0cnVlO1xuICAgIGFsbG93VHlwZS5pbmNsdWRlcyh0eXBlKSB8fCAocGFzcyA9IGZhbHNlLCBzaG93RXJyKHR4dEVyci5kYXRhKCd0eXBlJykpKTtcbiAgICByZXR1cm4gcGFzcztcbiAgfVxuXG4gIGZ1bmN0aW9uIGZpbHRlckZpbGUoZmlsZSkge1xuICAgIGxldCBwYXNzID0gdHJ1ZTtcbiAgICBwYXNzID0gZmlsdGVyU2l6ZShmaWxlLnNpemUpO1xuICAgIHBhc3MgJiYgKHBhc3MgPSBmaWx0ZXJUeXBlKGZpbGUudHlwZSkpO1xuICAgIHJldHVybiBwYXNzO1xuICB9XG5cbiAgZnVuY3Rpb24gcHJlcGFyZUZpbGUoZmlsZSkge1xuICAgIGxldCByZWFkZXIgPSBuZXcgRmlsZVJlYWRlcigpO1xuXG4gICAgcmVzZXQoKTtcbiAgICBidG5DbG9zZS5oaWRlKCk7XG4gICAgd3JhcElucHV0LmFkZENsYXNzKENMQVNTLl9hY3RpdmUpO1xuICAgIHR4dEluZm8udGV4dChpbmZvVHh0KS5zaG93KCk7XG5cbiAgICBuYW1lID0gZmlsZS5uYW1lO1xuICAgIHNldFRpbWVvdXQoKCkgPT4gcmVhZGVyLnJlYWRBc0RhdGFVUkwoZmlsZSksIDI1MCk7XG4gICAgcmVhZGVyLm9ubG9hZCA9IGUgPT4gc2VuZEZpbGUoZS50YXJnZXQucmVzdWx0KTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHNlbmRGaWxlKGI2NCkge1xuICAgIGxldCBhamF4VVJMID0gZWwuZmluZCgnZm9ybScpLmRhdGEoJ3VybCcpLFxuICAgICAgICBhamF4RGF0YSA9IFtdO1xuXG4gICAgYWpheERhdGEucHVzaChcbiAgICAgIHsgbmFtZTogJ2lkJywgdmFsdWU6IGlkIH0sXG4gICAgICB7IG5hbWU6ICdmaWxlJywgdmFsdWU6IGI2NCB9XG4gICAgKTtcblxuICAgIHR4dEluZm8udGV4dChuYW1lKTtcbiAgICBidG5DYW5jZWwuc2hvdygpO1xuXG4gICAgYWpheCA9ICQuYWpheCh7XG5cdFx0XHR0eXBlOiBBUFAuX3N1Ym1pdE1ldGhvZCxcblx0XHRcdHVybDogYWpheFVSTCxcblx0XHRcdGRhdGE6IGFqYXhEYXRhLFxuXHRcdFx0aGVhZGVyczogQVBQLl9oZWFkZXJzLFxuXHRcdFx0c3VjY2VzczogZGF0YSA9PiB7XG4gICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuXHRcdFx0XHRsZXQgc3RhdHVzID0gcGFyc2VJbnQoZGF0YS5zdGF0dXMpLFxuXHRcdFx0XHRcdFx0dGl0bGUgPSBkYXRhLnRpdGxlLFxuXHRcdFx0XHRcdFx0bWVzc2FnZSA9IGRhdGEubWVzc2FnZTtcblxuICAgICAgICB3cmFwSW5wdXQucmVtb3ZlQ2xhc3MoQ0xBU1MuX2FjdGl2ZSk7XG4gICAgICAgIG5vdGUuaGlkZSgpO1xuICAgICAgICBidG5DYW5jZWwuaGlkZSgpO1xuICAgICAgICBoZWFkaW5nLnRleHQodGl0bGUpO1xuICAgICAgICBkZXNjLnRleHQobWVzc2FnZSk7XG5cblx0XHRcdFx0c3dpdGNoKHN0YXR1cykge1xuXHRcdFx0XHRcdGNhc2UgMDoge1xuICAgICAgICAgICAgd3JhcElucHV0LmFkZENsYXNzKENMQVNTLl9yZWQpO1xuICAgICAgICAgICAgYnRuUmV0cnkuc2hvdygpO1xuXHRcdFx0XHRcdH0gYnJlYWs7XG5cdFx0XHRcdFx0Y2FzZSAxOiB7XG4gICAgICAgICAgICB3cmFwSW5wdXQuYWRkQ2xhc3MoQ0xBU1MuX2dyZWVuKTtcbiAgICAgICAgICAgIGJ0bkZpbmlzaC5zaG93KCk7XG5cdFx0XHRcdFx0fSBicmVhaztcblx0XHRcdFx0fVxuXHRcdFx0fVxuXHRcdH0pO1xuICB9XG5cbiAgZnVuY3Rpb24gc2hvd0VycihlcnIpIHtcbiAgICB3cmFwSW5wdXQuYWRkQ2xhc3MoQ0xBU1MuX2Vycm9yKTtcbiAgICB0eHRFcnIudGV4dChlcnIpLnNob3coKTtcbiAgfVxuXG4gIHRoaXMuc2hvdyA9IGRhdGEgPT4gdXBkYXRlKGRhdGEpO1xuICB0aGlzLmhpZGUgPSAoKSA9PiBoaWRlUG9wdXAoKTtcbiAgcmV0dXJuIHRoaXM7XG59OyIsImxldCBQb3B1cFdhcm5pbmcgPSBmdW5jdGlvbihlbGVtZW50KSB7XG4gIGxldCBlbCA9ICQoZWxlbWVudCksXG4gICAgICBwb3B1cCA9IG5ldyBQb3B1cEJhc2UoZWwpLFxuICAgICAgY29udGVudFRpdGxlID0gZWwuZmluZCgnLnRpdGxlJyksXG4gICAgICBjb250ZW50RGVzYyA9IGVsLmZpbmQoJy5kZXNjJyksXG4gICAgICBidG5DYW5jZWwgPSBlbC5maW5kKCcuYnRuLWNhbmNlbCcpLFxuICAgICAgYnRuU3VibWl0ID0gZWwuZmluZCgnLmJ0bi1zdWJtaXQnKSxcbiAgICAgIGNhbGxiYWNrID0ge307XG5cbiAgdGhpcy51cGRhdGUgPSAodGl0bGUsIGRlc2MsIGNiKSA9PiB7XG4gICAgdGl0bGUubGVuZ3RoID4gMCAmJiBjb250ZW50VGl0bGUudGV4dCh0aXRsZSk7XG4gICAgZGVzYy5sZW5ndGggPiAwICYmIGNvbnRlbnREZXNjLnRleHQoZGVzYyk7XG4gICAgY2FsbGJhY2sgPSBjYjtcbiAgfVxuXG4gIHRoaXMuc2hvdyA9ICgpID0+IHBvcHVwLnNob3coKTtcbiAgdGhpcy5oaWRlID0gKCkgPT4gcG9wdXAuaGlkZSgpO1xuICBidG5DYW5jZWwub24oQ0xJQ0ssIGUgPT4gKGUucHJldmVudERlZmF1bHQoKSwgcG9wdXAuaGlkZSgpKSk7XG4gIGJ0blN1Ym1pdC5vbihDTElDSywgZSA9PiAoZS5wcmV2ZW50RGVmYXVsdCgpLCBjYWxsYmFjaygpKSk7XG4gIHJldHVybiB0aGlzO1xufTsiXX0=
