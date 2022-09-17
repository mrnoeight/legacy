/*!
* sweetalert2 v8.14.0
* Released under the MIT License.
*/
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):t.Sweetalert2=e()}(this,(function(){"use strict";function t(e){return(t="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(e)}function e(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function n(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}function o(t,e,o){return e&&n(t.prototype,e),o&&n(t,o),t}function i(){return(i=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(t[o]=n[o])}return t}).apply(this,arguments)}function r(t){return(r=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)})(t)}function a(t,e){return(a=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t})(t,e)}function s(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(t){return!1}}function u(t,e,n){return(u=s()?Reflect.construct:function(t,e,n){var o=[null];o.push.apply(o,e);var i=new(Function.bind.apply(t,o));return n&&a(i,n.prototype),i}).apply(null,arguments)}function c(t,e){return!e||"object"!=typeof e&&"function"!=typeof e?function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t):e}function l(t,e,n){return(l="undefined"!=typeof Reflect&&Reflect.get?Reflect.get:function(t,e,n){var o=function(t,e){for(;!Object.prototype.hasOwnProperty.call(t,e)&&null!==(t=r(t)););return t}(t,e);if(o){var i=Object.getOwnPropertyDescriptor(o,e);return i.get?i.get.call(n):i.value}})(t,e,n||t)}var d=function(t){return Object.keys(t).map((function(e){return t[e]}))},p=function(t){return Array.prototype.slice.call(t)},f=function(t){console.warn("".concat("SweetAlert2:"," ").concat(t))},m=function(t){console.error("".concat("SweetAlert2:"," ").concat(t))},g=[],h=function(t,e){var n;n='"'.concat(t,'" is deprecated and will be removed in the next major release. Please use "').concat(e,'" instead.'),-1===g.indexOf(n)&&(g.push(n),f(n))},v=function(t){return"function"==typeof t?t():t},b=function(t){return t&&Promise.resolve(t)===t},y=Object.freeze({cancel:"cancel",backdrop:"backdrop",close:"close",esc:"esc",timer:"timer"}),w=function(t){var e={};for(var n in t)e[t[n]]="swal2-"+t[n];return e},C=w(["container","shown","height-auto","iosfix","popup","modal","no-backdrop","toast","toast-shown","toast-column","fade","show","hide","noanimation","close","title","header","content","actions","confirm","cancel","footer","icon","image","input","file","range","select","radio","checkbox","label","textarea","inputerror","validation-message","progress-steps","active-progress-step","progress-step","progress-step-line","loading","styled","top","top-start","top-end","top-left","top-right","center","center-start","center-end","center-left","center-right","bottom","bottom-start","bottom-end","bottom-left","bottom-right","grow-row","grow-column","grow-fullscreen","rtl"]),k=w(["success","warning","info","question","error"]),B={previousBodyPadding:null},x=function(t,e){return t.classList.contains(e)},S=function(t,e,n){p(t.classList).forEach((function(e){-1===d(C).indexOf(e)&&-1===d(k).indexOf(e)&&t.classList.remove(e)})),e&&e[n]&&L(t,e[n])};function P(t,e){if(!e)return null;switch(e){case"select":case"textarea":case"file":return M(t,C[e]);case"checkbox":return t.querySelector(".".concat(C.checkbox," input"));case"radio":return t.querySelector(".".concat(C.radio," input:checked"))||t.querySelector(".".concat(C.radio," input:first-child"));case"range":return t.querySelector(".".concat(C.range," input"));default:return M(t,C.input)}}var A,E=function(t){if(t.focus(),"file"!==t.type){var e=t.value;t.value="",t.value=e}},T=function(t,e,n){t&&e&&("string"==typeof e&&(e=e.split(/\s+/).filter(Boolean)),e.forEach((function(e){t.forEach?t.forEach((function(t){n?t.classList.add(e):t.classList.remove(e)})):n?t.classList.add(e):t.classList.remove(e)})))},L=function(t,e){T(t,e,!0)},O=function(t,e){T(t,e,!1)},M=function(t,e){for(var n=0;n<t.childNodes.length;n++)if(x(t.childNodes[n],e))return t.childNodes[n]},V=function(t,e,n){n||0===parseInt(n)?t.style[e]="number"==typeof n?n+"px":n:t.style.removeProperty(e)},H=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"flex";t.style.opacity="",t.style.display=e},j=function(t){t.style.opacity="",t.style.display="none"},q=function(t,e,n){e?H(t,n):j(t)},I=function(t){return!(!t||!(t.offsetWidth||t.offsetHeight||t.getClientRects().length))},R=function(t){var e=window.getComputedStyle(t),n=parseFloat(e.getPropertyValue("animation-duration")||"0"),o=parseFloat(e.getPropertyValue("transition-duration")||"0");return n>0||o>0},D=function(){return document.body.querySelector("."+C.container)},N=function(t){var e=D();return e?e.querySelector(t):null},U=function(t){return N("."+t)},_=function(){return U(C.popup)},z=function(){var t=_();return p(t.querySelectorAll("."+C.icon))},F=function(){var t=z().filter((function(t){return I(t)}));return t.length?t[0]:null},W=function(){return U(C.title)},K=function(){return U(C.content)},Z=function(){return U(C.image)},Q=function(){return U(C["progress-steps"])},Y=function(){return U(C["validation-message"])},$=function(){return N("."+C.actions+" ."+C.confirm)},J=function(){return N("."+C.actions+" ."+C.cancel)},X=function(){return U(C.actions)},G=function(){return U(C.header)},tt=function(){return U(C.footer)},et=function(){return U(C.close)},nt=function(){var t=p(_().querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])')).sort((function(t,e){return(t=parseInt(t.getAttribute("tabindex")))>(e=parseInt(e.getAttribute("tabindex")))?1:t<e?-1:0})),e=p(_().querySelectorAll('a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex="0"], [contenteditable], audio[controls], video[controls]')).filter((function(t){return"-1"!==t.getAttribute("tabindex")}));return function(t){for(var e=[],n=0;n<t.length;n++)-1===e.indexOf(t[n])&&e.push(t[n]);return e}(t.concat(e)).filter((function(t){return I(t)}))},ot=function(){return!it()&&!document.body.classList.contains(C["no-backdrop"])},it=function(){return document.body.classList.contains(C["toast-shown"])},rt=function(){return"undefined"==typeof window||"undefined"==typeof document},at='\n <div aria-labelledby="'.concat(C.title,'" aria-describedby="').concat(C.content,'" class="').concat(C.popup,'" tabindex="-1">\n   <div class="').concat(C.header,'">\n     <ul class="').concat(C["progress-steps"],'"></ul>\n     <div class="').concat(C.icon," ").concat(k.error,'">\n       <span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span>\n     </div>\n     <div class="').concat(C.icon," ").concat(k.question,'"></div>\n     <div class="').concat(C.icon," ").concat(k.warning,'"></div>\n     <div class="').concat(C.icon," ").concat(k.info,'"></div>\n     <div class="').concat(C.icon," ").concat(k.success,'">\n       <div class="swal2-success-circular-line-left"></div>\n       <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>\n       <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>\n       <div class="swal2-success-circular-line-right"></div>\n     </div>\n     <img class="').concat(C.image,'" />\n     <h2 class="').concat(C.title,'" id="').concat(C.title,'"></h2>\n     <button type="button" class="').concat(C.close,'"></button>\n   </div>\n   <div class="').concat(C.content,'">\n     <div id="').concat(C.content,'"></div>\n     <input class="').concat(C.input,'" />\n     <input type="file" class="').concat(C.file,'" />\n     <div class="').concat(C.range,'">\n       <input type="range" />\n       <output></output>\n     </div>\n     <select class="').concat(C.select,'"></select>\n     <div class="').concat(C.radio,'"></div>\n     <label for="').concat(C.checkbox,'" class="').concat(C.checkbox,'">\n       <input type="checkbox" />\n       <span class="').concat(C.label,'"></span>\n     </label>\n     <textarea class="').concat(C.textarea,'"></textarea>\n     <div class="').concat(C["validation-message"],'" id="').concat(C["validation-message"],'"></div>\n   </div>\n   <div class="').concat(C.actions,'">\n     <button type="button" class="').concat(C.confirm,'">OK</button>\n     <button type="button" class="').concat(C.cancel,'">Cancel</button>\n   </div>\n   <div class="').concat(C.footer,'">\n   </div>\n </div>\n').replace(/(^|\n)\s*/g,""),st=function(t){me.isVisible()&&A!==t.target.value&&me.resetValidationMessage(),A=t.target.value},ut=function(t){var e;if((e=D())&&(e.parentNode.removeChild(e),O([document.documentElement,document.body],[C["no-backdrop"],C["toast-shown"],C["has-column"]])),rt())m("SweetAlert2 requires document to initialize");else{var n=document.createElement("div");n.className=C.container,n.innerHTML=at;var o,i,r,a,s,u,c,l,d,p="string"==typeof(o=t.target)?document.querySelector(o):o;p.appendChild(n),function(t){var e=_();e.setAttribute("role",t.toast?"alert":"dialog"),e.setAttribute("aria-live",t.toast?"polite":"assertive"),t.toast||e.setAttribute("aria-modal","true")}(t),function(t){"rtl"===window.getComputedStyle(t).direction&&L(D(),C.rtl)}(p),i=K(),r=M(i,C.input),a=M(i,C.file),s=i.querySelector(".".concat(C.range," input")),u=i.querySelector(".".concat(C.range," output")),c=M(i,C.select),l=i.querySelector(".".concat(C.checkbox," input")),d=M(i,C.textarea),r.oninput=st,a.onchange=st,c.onchange=st,l.onchange=st,d.oninput=st,s.oninput=function(t){st(t),u.value=s.value},s.onchange=function(t){st(t),s.nextSibling.value=s.value}}},ct=function(e,n){e instanceof HTMLElement?n.appendChild(e):"object"===t(e)?lt(n,e):e&&(n.innerHTML=e)},lt=function(t,e){if(t.innerHTML="",0 in e)for(var n=0;n in e;n++)t.appendChild(e[n].cloneNode(!0));else t.appendChild(e.cloneNode(!0))},dt=function(){if(rt())return!1;var t=document.createElement("div"),e={WebkitAnimation:"webkitAnimationEnd",OAnimation:"oAnimationEnd oanimationend",animation:"animationend"};for(var n in e)if(Object.prototype.hasOwnProperty.call(e,n)&&void 0!==t.style[n])return e[n];return!1}();function pt(t,e,n){q(t,n["showC"+e.substring(1)+"Button"],"inline-block"),t.innerHTML=n[e+"ButtonText"],t.setAttribute("aria-label",n[e+"ButtonAriaLabel"]),t.className=C[e],S(t,n.customClass,e+"Button"),L(t,n[e+"ButtonClass"])}var ft=function(t,e){var n=X(),o=$(),i=J();e.showConfirmButton||e.showCancelButton?H(n):j(n),S(n,e.customClass,"actions"),pt(o,"confirm",e),pt(i,"cancel",e),e.buttonsStyling?function(t,e,n){L([t,e],C.styled),n.confirmButtonColor&&(t.style.backgroundColor=n.confirmButtonColor),n.cancelButtonColor&&(e.style.backgroundColor=n.cancelButtonColor);var o=window.getComputedStyle(t).getPropertyValue("background-color");t.style.borderLeftColor=o,t.style.borderRightColor=o}(o,i,e):(O([o,i],C.styled),o.style.backgroundColor=o.style.borderLeftColor=o.style.borderRightColor="",i.style.backgroundColor=i.style.borderLeftColor=i.style.borderRightColor="")};var mt=function(t,e){var n=D();n&&(!function(t,e){"string"==typeof e?t.style.background=e:e||L([document.documentElement,document.body],C["no-backdrop"])}(n,e.backdrop),!e.backdrop&&e.allowOutsideClick&&f('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`'),function(t,e){e in C?L(t,C[e]):(f('The "position" parameter is not valid, defaulting to "center"'),L(t,C.center))}(n,e.position),function(t,e){if(e&&"string"==typeof e){var n="grow-"+e;n in C&&L(t,C[n])}}(n,e.grow),S(n,e.customClass,"container"),e.customContainerClass&&L(n,e.customContainerClass))},gt={promise:new WeakMap,innerParams:new WeakMap,domCache:new WeakMap},ht=["input","file","range","select","radio","checkbox","textarea"],vt=function(t){if(!Ct[t.input])return m('Unexpected type of input! Expected "text", "email", "password", "number", "tel", "select", "radio", "checkbox", "textarea", "file" or "url", got "'.concat(t.input,'"'));var e=Ct[t.input](t);H(e)},bt=function(t,e){var n=P(K(),t);if(n)for(var o in function(t){for(var e=0;e<t.attributes.length;e++){var n=t.attributes[e].name;-1===["type","value","style"].indexOf(n)&&t.removeAttribute(n)}}(n),e)"range"===t&&"placeholder"===o||n.setAttribute(o,e[o])},yt=function(t,e,n){t.className=e,n.inputClass&&L(t,n.inputClass),n.customClass&&L(t,n.customClass.input)},wt=function(t,e){t.placeholder&&!e.inputPlaceholder||(t.placeholder=e.inputPlaceholder)},Ct={};Ct.text=Ct.email=Ct.password=Ct.number=Ct.tel=Ct.url=function(e){var n=M(K(),C.input);return"string"==typeof e.inputValue||"number"==typeof e.inputValue?n.value=e.inputValue:b(e.inputValue)||f('Unexpected type of inputValue! Expected "string", "number" or "Promise", got "'.concat(t(e.inputValue),'"')),wt(n,e),n.type=e.input,n},Ct.file=function(t){var e=M(K(),C.file);return wt(e,t),e.type=t.input,e},Ct.range=function(t){var e=M(K(),C.range),n=e.querySelector("input"),o=e.querySelector("output");return n.value=t.inputValue,n.type=t.input,o.value=t.inputValue,e},Ct.select=function(t){var e=M(K(),C.select);if(e.innerHTML="",t.inputPlaceholder){var n=document.createElement("option");n.innerHTML=t.inputPlaceholder,n.value="",n.disabled=!0,n.selected=!0,e.appendChild(n)}return e},Ct.radio=function(){var t=M(K(),C.radio);return t.innerHTML="",t},Ct.checkbox=function(t){var e=M(K(),C.checkbox),n=P(K(),"checkbox");return n.type="checkbox",n.value=1,n.id=C.checkbox,n.checked=Boolean(t.inputValue),e.querySelector("span").innerHTML=t.inputPlaceholder,e},Ct.textarea=function(t){var e=M(K(),C.textarea);return e.value=t.inputValue,wt(e,t),e};var kt=function(t,e){var n=K().querySelector("#"+C.content);e.html?(ct(e.html,n),H(n,"block")):e.text?(n.textContent=e.text,H(n,"block")):j(n),function(t,e){var n=K(),o=gt.innerParams.get(t),i=!o||e.input!==o.input;ht.forEach((function(t){var o=C[t],r=M(n,o);bt(t,e.inputAttributes),yt(r,o,e),i&&j(r)})),e.input&&i&&vt(e)}(t,e),S(K(),e.customClass,"content")},Bt=function(){for(var t=z(),e=0;e<t.length;e++)j(t[e])},xt=function(){for(var t=_(),e=window.getComputedStyle(t).getPropertyValue("background-color"),n=t.querySelectorAll("[class^=swal2-success-circular-line], .swal2-success-fix"),o=0;o<n.length;o++)n[o].style.backgroundColor=e},St=function(t,e){var n=Q();if(!e.progressSteps||0===e.progressSteps.length)return j(n);H(n),n.innerHTML="";var o=parseInt(null===e.currentProgressStep?me.getQueueStep():e.currentProgressStep);o>=e.progressSteps.length&&f("Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)"),e.progressSteps.forEach((function(t,i){var r=function(t){var e=document.createElement("li");return L(e,C["progress-step"]),e.innerHTML=t,e}(t);if(n.appendChild(r),i===o&&L(r,C["active-progress-step"]),i!==e.progressSteps.length-1){var a=function(t){var e=document.createElement("li");return L(e,C["progress-step-line"]),t.progressStepsDistance&&(e.style.width=t.progressStepsDistance),e}(t);n.appendChild(a)}}))},Pt=function(t,e){var n=G();S(n,e.customClass,"header"),St(0,e),function(t,e){var n=gt.innerParams.get(t);if(n&&e.type===n.type&&F())S(F(),e.customClass,"icon");else if(Bt(),e.type)if(xt(),-1!==Object.keys(k).indexOf(e.type)){var o=N(".".concat(C.icon,".").concat(k[e.type]));H(o),S(o,e.customClass,"icon"),T(o,"swal2-animate-".concat(e.type,"-icon"),e.animation)}else m('Unknown type! Expected "success", "error", "warning", "info" or "question", got "'.concat(e.type,'"'))}(t,e),function(t,e){var n=Z();if(!e.imageUrl)return j(n);H(n),n.setAttribute("src",e.imageUrl),n.setAttribute("alt",e.imageAlt),V(n,"width",e.imageWidth),V(n,"height",e.imageHeight),n.className=C.image,S(n,e.customClass,"image"),e.imageClass&&L(n,e.imageClass)}(0,e),function(t,e){var n=W();q(n,e.title||e.titleText),e.title&&ct(e.title,n),e.titleText&&(n.innerText=e.titleText),S(n,e.customClass,"title")}(0,e),function(t,e){var n=et();n.innerHTML=e.closeButtonHtml,S(n,e.customClass,"closeButton"),q(n,e.showCloseButton),n.setAttribute("aria-label",e.closeButtonAriaLabel)}(0,e)},At=function(t,e){!function(t,e){var n=_();V(n,"width",e.width),V(n,"padding",e.padding),e.background&&(n.style.background=e.background),n.className=C.popup,e.toast?(L([document.documentElement,document.body],C["toast-shown"]),L(n,C.toast)):L(n,C.modal),S(n,e.customClass,"popup"),"string"==typeof e.customClass&&L(n,e.customClass),T(n,C.noanimation,!e.animation)}(0,e),mt(0,e),Pt(t,e),kt(t,e),ft(0,e),function(t,e){var n=tt();q(n,e.footer),e.footer&&ct(e.footer,n),S(n,e.customClass,"footer")}(0,e)};var Et=[],Tt=function(){var t=_();t||me.fire(""),t=_();var e=X(),n=$(),o=J();H(e),H(n),L([t,e],C.loading),n.disabled=!0,o.disabled=!0,t.setAttribute("data-loading",!0),t.setAttribute("aria-busy",!0),t.focus()},Lt={},Ot=function(){return new Promise((function(t){var e=window.scrollX,n=window.scrollY;Lt.restoreFocusTimeout=setTimeout((function(){Lt.previousActiveElement&&Lt.previousActiveElement.focus?(Lt.previousActiveElement.focus(),Lt.previousActiveElement=null):document.body&&document.body.focus(),t()}),100),void 0!==e&&void 0!==n&&window.scrollTo(e,n)}))},Mt={title:"",titleText:"",text:"",html:"",footer:"",type:null,toast:!1,customClass:"",customContainerClass:"",target:"body",backdrop:!0,animation:!0,heightAuto:!0,allowOutsideClick:!0,allowEscapeKey:!0,allowEnterKey:!0,stopKeydownPropagation:!0,keydownListenerCapture:!1,showConfirmButton:!0,showCancelButton:!1,preConfirm:null,confirmButtonText:"OK",confirmButtonAriaLabel:"",confirmButtonColor:null,confirmButtonClass:"",cancelButtonText:"Cancel",cancelButtonAriaLabel:"",cancelButtonColor:null,cancelButtonClass:"",buttonsStyling:!0,reverseButtons:!1,focusConfirm:!0,focusCancel:!1,showCloseButton:!1,closeButtonHtml:"&times;",closeButtonAriaLabel:"Close this dialog",showLoaderOnConfirm:!1,imageUrl:null,imageWidth:null,imageHeight:null,imageAlt:"",imageClass:"",timer:null,width:null,padding:null,background:null,input:null,inputPlaceholder:"",inputValue:"",inputOptions:{},inputAutoTrim:!0,inputClass:"",inputAttributes:{},inputValidator:null,validationMessage:null,grow:!1,position:"center",progressSteps:[],currentProgressStep:null,progressStepsDistance:null,onBeforeOpen:null,onAfterClose:null,onOpen:null,onClose:null,scrollbarPadding:!0},Vt=["title","titleText","text","html","type","customClass","showConfirmButton","showCancelButton","confirmButtonText","confirmButtonAriaLabel","confirmButtonColor","confirmButtonClass","cancelButtonText","cancelButtonAriaLabel","cancelButtonColor","cancelButtonClass","buttonsStyling","reverseButtons","imageUrl","imageWidth","imageHeigth","imageAlt","imageClass","progressSteps","currentProgressStep"],Ht={customContainerClass:"customClass",confirmButtonClass:"customClass",cancelButtonClass:"customClass",imageClass:"customClass",inputClass:"customClass"},jt=["allowOutsideClick","allowEnterKey","backdrop","focusConfirm","focusCancel","heightAuto","keydownListenerCapture"],qt=function(t){return Object.prototype.hasOwnProperty.call(Mt,t)},It=function(t){return Ht[t]},Rt=function(t){qt(t)||f('Unknown parameter "'.concat(t,'"'))},Dt=function(t){-1!==jt.indexOf(t)&&f('The parameter "'.concat(t,'" is incompatible with toasts'))},Nt=function(t){It(t)&&h(t,It(t))},Ut=Object.freeze({isValidParameter:qt,isUpdatableParameter:function(t){return-1!==Vt.indexOf(t)},isDeprecatedParameter:It,argsToParams:function(e){var n={};switch(t(e[0])){case"object":i(n,e[0]);break;default:["title","html","type"].forEach((function(o,i){switch(t(e[i])){case"string":n[o]=e[i];break;case"undefined":break;default:m("Unexpected type of ".concat(o,'! Expected "string", got ').concat(t(e[i])))}}))}return n},isVisible:function(){return I(_())},clickConfirm:function(){return $()&&$().click()},clickCancel:function(){return J()&&J().click()},getContainer:D,getPopup:_,getTitle:W,getContent:K,getImage:Z,getIcon:F,getIcons:z,getCloseButton:et,getActions:X,getConfirmButton:$,getCancelButton:J,getHeader:G,getFooter:tt,getFocusableElements:nt,getValidationMessage:Y,isLoading:function(){return _().hasAttribute("data-loading")},fire:function(){for(var t=this,e=arguments.length,n=new Array(e),o=0;o<e;o++)n[o]=arguments[o];return u(t,n)},mixin:function(t){return function(n){function s(){return e(this,s),c(this,r(s).apply(this,arguments))}return function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),e&&a(t,e)}(s,n),o(s,[{key:"_main",value:function(e){return l(r(s.prototype),"_main",this).call(this,i({},t,e))}}]),s}(this)},queue:function(t){var e=this;Et=t;var n=function(t,e){Et=[],document.body.removeAttribute("data-swal2-queue-step"),t(e)},o=[];return new Promise((function(t){!function i(r,a){r<Et.length?(document.body.setAttribute("data-swal2-queue-step",r),e.fire(Et[r]).then((function(e){void 0!==e.value?(o.push(e.value),i(r+1,a)):n(t,{dismiss:e.dismiss})}))):n(t,{value:o})}(0)}))},getQueueStep:function(){return document.body.getAttribute("data-swal2-queue-step")},insertQueueStep:function(t,e){return e&&e<Et.length?Et.splice(e,0,t):Et.push(t)},deleteQueueStep:function(t){void 0!==Et[t]&&Et.splice(t,1)},showLoading:Tt,enableLoading:Tt,getTimerLeft:function(){return Lt.timeout&&Lt.timeout.getTimerLeft()},stopTimer:function(){return Lt.timeout&&Lt.timeout.stop()},resumeTimer:function(){return Lt.timeout&&Lt.timeout.start()},toggleTimer:function(){var t=Lt.timeout;return t&&(t.running?t.stop():t.start())},increaseTimer:function(t){return Lt.timeout&&Lt.timeout.increase(t)},isTimerRunning:function(){return Lt.timeout&&Lt.timeout.isRunning()}});function _t(){var t=gt.innerParams.get(this),e=gt.domCache.get(this);t.showConfirmButton||(j(e.confirmButton),t.showCancelButton||j(e.actions)),O([e.popup,e.actions],C.loading),e.popup.removeAttribute("aria-busy"),e.popup.removeAttribute("data-loading"),e.confirmButton.disabled=!1,e.cancelButton.disabled=!1}var zt=function(){null===B.previousBodyPadding&&document.body.scrollHeight>window.innerHeight&&(B.previousBodyPadding=parseInt(window.getComputedStyle(document.body).getPropertyValue("padding-right")),document.body.style.paddingRight=B.previousBodyPadding+function(){if("ontouchstart"in window||navigator.msMaxTouchPoints)return 0;var t=document.createElement("div");t.style.width="50px",t.style.height="50px",t.style.overflow="scroll",document.body.appendChild(t);var e=t.offsetWidth-t.clientWidth;return document.body.removeChild(t),e}()+"px")},Ft=function(){var t,e=D();e.ontouchstart=function(n){var o;t=n.target===e||!((o=e).scrollHeight>o.clientHeight)&&"INPUT"!==n.target.tagName},e.ontouchmove=function(e){t&&(e.preventDefault(),e.stopPropagation())}},Wt=function(){return!!window.MSInputMethodContext&&!!document.documentMode},Kt=function(){var t=D(),e=_();t.style.removeProperty("align-items"),e.offsetTop<0&&(t.style.alignItems="flex-start")},Zt={swalPromiseResolve:new WeakMap};function Qt(t,e,n,o){n?Gt(t,o):(Ot().then((function(){return Gt(t,o)})),Lt.keydownTarget.removeEventListener("keydown",Lt.keydownHandler,{capture:Lt.keydownListenerCapture}),Lt.keydownHandlerAdded=!1),e.parentNode&&e.parentNode.removeChild(e),ot()&&(null!==B.previousBodyPadding&&(document.body.style.paddingRight=B.previousBodyPadding+"px",B.previousBodyPadding=null),function(){if(x(document.body,C.iosfix)){var t=parseInt(document.body.style.top,10);O(document.body,C.iosfix),document.body.style.top="",document.body.scrollTop=-1*t}}(),"undefined"!=typeof window&&Wt()&&window.removeEventListener("resize",Kt),p(document.body.children).forEach((function(t){t.hasAttribute("data-previous-aria-hidden")?(t.setAttribute("aria-hidden",t.getAttribute("data-previous-aria-hidden")),t.removeAttribute("data-previous-aria-hidden")):t.removeAttribute("aria-hidden")}))),O([document.documentElement,document.body],[C.shown,C["height-auto"],C["no-backdrop"],C["toast-shown"],C["toast-column"]])}function Yt(t){var e=_();if(e&&!x(e,C.hide)){var n=gt.innerParams.get(this);if(n){var o=Zt.swalPromiseResolve.get(this);O(e,C.show),L(e,C.hide),$t(this,e,n),o(t||{})}}}var $t=function(t,e,n){var o=D(),i=dt&&R(e),r=n.onClose,a=n.onAfterClose;null!==r&&"function"==typeof r&&r(e),i?Jt(t,e,o,a):Qt(t,o,it(),a)},Jt=function(t,e,n,o){Lt.swalCloseEventFinishedCallback=Qt.bind(null,t,n,it(),o),e.addEventListener(dt,(function(t){t.target===e&&(Lt.swalCloseEventFinishedCallback(),delete Lt.swalCloseEventFinishedCallback)}))},Xt=function(t){for(var e in t)t[e]=new WeakMap},Gt=function(t,e){setTimeout((function(){null!==e&&"function"==typeof e&&e(),_()||function(t){delete t.params,delete Lt.keydownHandler,delete Lt.keydownTarget,Xt(gt),Xt(Zt)}(t)}))};function te(t,e,n){var o=gt.domCache.get(t);e.forEach((function(t){o[t].disabled=n}))}function ee(t,e){if(!t)return!1;if("radio"===t.type)for(var n=t.parentNode.parentNode.querySelectorAll("input"),o=0;o<n.length;o++)n[o].disabled=e;else t.disabled=e}var ne=function(){function t(n,o){e(this,t),this.callback=n,this.remaining=o,this.running=!1,this.start()}return o(t,[{key:"start",value:function(){return this.running||(this.running=!0,this.started=new Date,this.id=setTimeout(this.callback,this.remaining)),this.remaining}},{key:"stop",value:function(){return this.running&&(this.running=!1,clearTimeout(this.id),this.remaining-=new Date-this.started),this.remaining}},{key:"increase",value:function(t){var e=this.running;return e&&this.stop(),this.remaining+=t,e&&this.start(),this.remaining}},{key:"getTimerLeft",value:function(){return this.running&&(this.stop(),this.start()),this.remaining}},{key:"isRunning",value:function(){return this.running}}]),t}(),oe={email:function(t,e){return/^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(t)?Promise.resolve():Promise.resolve(e||"Invalid email address")},url:function(t,e){return/^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{2,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(t)?Promise.resolve():Promise.resolve(e||"Invalid URL")}};function ie(t){!function(t){t.inputValidator||Object.keys(oe).forEach((function(e){t.input===e&&(t.inputValidator=oe[e])}))}(t),t.showLoaderOnConfirm&&!t.preConfirm&&f("showLoaderOnConfirm is set to true, but preConfirm is not defined.\nshowLoaderOnConfirm should be used together with preConfirm, see usage example:\nhttps://sweetalert2.github.io/#ajax-request"),t.animation=v(t.animation),function(t){(!t.target||"string"==typeof t.target&&!document.querySelector(t.target)||"string"!=typeof t.target&&!t.target.appendChild)&&(f('Target parameter is not valid, defaulting to "body"'),t.target="body")}(t),"string"==typeof t.title&&(t.title=t.title.split("\n").join("<br />")),ut(t)}function re(t,e){t.removeEventListener(dt,re),e.style.overflowY="auto"}var ae=function(t,e){dt&&R(e)?(t.style.overflowY="hidden",e.addEventListener(dt,re.bind(null,e,t))):t.style.overflowY="auto"},se=function(t,e){!function(){if(/iPad|iPhone|iPod/.test(navigator.userAgent)&&!window.MSStream&&!x(document.body,C.iosfix)){var t=document.body.scrollTop;document.body.style.top=-1*t+"px",L(document.body,C.iosfix),Ft()}}(),"undefined"!=typeof window&&Wt()&&(Kt(),window.addEventListener("resize",Kt)),p(document.body.children).forEach((function(t){t===D()||function(t,e){if("function"==typeof t.contains)return t.contains(e)}(t,D())||(t.hasAttribute("aria-hidden")&&t.setAttribute("data-previous-aria-hidden",t.getAttribute("aria-hidden")),t.setAttribute("aria-hidden","true"))})),e&&zt(),setTimeout((function(){t.scrollTop=0}))},ue=function(t,e,n){n.animation&&(L(e,C.show),L(t,C.fade)),H(e),L([document.documentElement,document.body,t],C.shown),n.heightAuto&&n.backdrop&&!n.toast&&L([document.documentElement,document.body],C["height-auto"])},ce={select:function(t,e,n){var o=M(t,C.select);e.forEach((function(t){var e=t[0],i=t[1],r=document.createElement("option");r.value=e,r.innerHTML=i,n.inputValue.toString()===e.toString()&&(r.selected=!0),o.appendChild(r)})),o.focus()},radio:function(t,e,n){var o=M(t,C.radio);e.forEach((function(t){var e=t[0],i=t[1],r=document.createElement("input"),a=document.createElement("label");r.type="radio",r.name=C.radio,r.value=e,n.inputValue.toString()===e.toString()&&(r.checked=!0);var s=document.createElement("span");s.innerHTML=i,s.className=C.label,a.appendChild(r),a.appendChild(s),o.appendChild(a)}));var i=o.querySelectorAll("input");i.length&&i[0].focus()}},le=function(t){var e=[];return"undefined"!=typeof Map&&t instanceof Map?t.forEach((function(t,n){e.push([n,t])})):Object.keys(t).forEach((function(n){e.push([n,t[n]])})),e};var de,pe=Object.freeze({hideLoading:_t,disableLoading:_t,getInput:function(t){var e=gt.innerParams.get(t||this),n=gt.domCache.get(t||this);return n?P(n.content,e.input):null},close:Yt,closePopup:Yt,closeModal:Yt,closeToast:Yt,enableButtons:function(){te(this,["confirmButton","cancelButton"],!1)},disableButtons:function(){te(this,["confirmButton","cancelButton"],!0)},enableConfirmButton:function(){h("Swal.disableConfirmButton()","Swal.getConfirmButton().removeAttribute('disabled')"),te(this,["confirmButton"],!1)},disableConfirmButton:function(){h("Swal.enableConfirmButton()","Swal.getConfirmButton().setAttribute('disabled', '')"),te(this,["confirmButton"],!0)},enableInput:function(){return ee(this.getInput(),!1)},disableInput:function(){return ee(this.getInput(),!0)},showValidationMessage:function(t){var e=gt.domCache.get(this);e.validationMessage.innerHTML=t;var n=window.getComputedStyle(e.popup);e.validationMessage.style.marginLeft="-".concat(n.getPropertyValue("padding-left")),e.validationMessage.style.marginRight="-".concat(n.getPropertyValue("padding-right")),H(e.validationMessage);var o=this.getInput();o&&(o.setAttribute("aria-invalid",!0),o.setAttribute("aria-describedBy",C["validation-message"]),E(o),L(o,C.inputerror))},resetValidationMessage:function(){var t=gt.domCache.get(this);t.validationMessage&&j(t.validationMessage);var e=this.getInput();e&&(e.removeAttribute("aria-invalid"),e.removeAttribute("aria-describedBy"),O(e,C.inputerror))},getProgressSteps:function(){return h("Swal.getProgressSteps()","const swalInstance = Swal.fire({progressSteps: ['1', '2', '3']}); const progressSteps = swalInstance.params.progressSteps"),gt.innerParams.get(this).progressSteps},setProgressSteps:function(t){h("Swal.setProgressSteps()","Swal.update()");var e=i({},gt.innerParams.get(this),{progressSteps:t});St(0,e),gt.innerParams.set(this,e)},showProgressSteps:function(){var t=gt.domCache.get(this);H(t.progressSteps)},hideProgressSteps:function(){var t=gt.domCache.get(this);j(t.progressSteps)},_main:function(e){var n=this;!function(t){for(var e in t)Rt(e),t.toast&&Dt(e),Nt()}(e),_()&&Lt.swalCloseEventFinishedCallback&&(Lt.swalCloseEventFinishedCallback(),delete Lt.swalCloseEventFinishedCallback),Lt.deferDisposalTimer&&(clearTimeout(Lt.deferDisposalTimer),delete Lt.deferDisposalTimer);var o=i({},Mt,e);ie(o),Object.freeze(o),Lt.timeout&&(Lt.timeout.stop(),delete Lt.timeout),clearTimeout(Lt.restoreFocusTimeout);var r={popup:_(),container:D(),content:K(),actions:X(),confirmButton:$(),cancelButton:J(),closeButton:et(),validationMessage:Y(),progressSteps:Q()};gt.domCache.set(this,r),At(this,o),gt.innerParams.set(this,o);var a=this.constructor;return new Promise((function(e){var i=function(t){n.closePopup({value:t})},s=function(t){n.closePopup({dismiss:t})};Zt.swalPromiseResolve.set(n,e),o.timer&&(Lt.timeout=new ne((function(){s("timer"),delete Lt.timeout}),o.timer));o.input&&setTimeout((function(){var t=n.getInput();t&&E(t)}),0);for(var u=function(t){(o.showLoaderOnConfirm&&a.showLoading(),o.preConfirm)?(n.resetValidationMessage(),Promise.resolve().then((function(){return o.preConfirm(t,o.validationMessage)})).then((function(e){I(r.validationMessage)||!1===e?n.hideLoading():i(void 0===e?t:e)}))):i(t)},c=function(t){var e=t.target,i=r.confirmButton,c=r.cancelButton,l=i&&(i===e||i.contains(e)),d=c&&(c===e||c.contains(e));switch(t.type){case"click":if(l)if(n.disableButtons(),o.input){var p=function(){var t=n.getInput();if(!t)return null;switch(o.input){case"checkbox":return t.checked?1:0;case"radio":return t.checked?t.value:null;case"file":return t.files.length?t.files[0]:null;default:return o.inputAutoTrim?t.value.trim():t.value}}();if(o.inputValidator)n.disableInput(),Promise.resolve().then((function(){return o.inputValidator(p,o.validationMessage)})).then((function(t){n.enableButtons(),n.enableInput(),t?n.showValidationMessage(t):u(p)}));else n.getInput().checkValidity()?u(p):(n.enableButtons(),n.showValidationMessage(o.validationMessage))}else u(!0);else d&&(n.disableButtons(),s(a.DismissReason.cancel))}},l=r.popup.querySelectorAll("button"),d=0;d<l.length;d++)l[d].onclick=c,l[d].onmouseover=c,l[d].onmouseout=c,l[d].onmousedown=c;if(r.closeButton.onclick=function(){s(a.DismissReason.close)},o.toast)r.popup.onclick=function(){o.showConfirmButton||o.showCancelButton||o.showCloseButton||o.input||s(a.DismissReason.close)};else{var p=!1;r.popup.onmousedown=function(){r.container.onmouseup=function(t){r.container.onmouseup=void 0,t.target===r.container&&(p=!0)}},r.container.onmousedown=function(){r.popup.onmouseup=function(t){r.popup.onmouseup=void 0,(t.target===r.popup||r.popup.contains(t.target))&&(p=!0)}},r.container.onclick=function(t){p?p=!1:t.target===r.container&&v(o.allowOutsideClick)&&s(a.DismissReason.backdrop)}}o.reverseButtons?r.confirmButton.parentNode.insertBefore(r.cancelButton,r.confirmButton):r.confirmButton.parentNode.insertBefore(r.confirmButton,r.cancelButton);var f,g,h,y,w=function(t,e){for(var n=nt(o.focusCancel),i=0;i<n.length;i++)return(t+=e)===n.length?t=0:-1===t&&(t=n.length-1),n[t].focus();r.popup.focus()};Lt.keydownTarget&&Lt.keydownHandlerAdded&&(Lt.keydownTarget.removeEventListener("keydown",Lt.keydownHandler,{capture:Lt.keydownListenerCapture}),Lt.keydownHandlerAdded=!1),o.toast||(Lt.keydownHandler=function(t){return function(t,e){e.stopKeydownPropagation&&t.stopPropagation();if("Enter"!==t.key||t.isComposing)if("Tab"===t.key){for(var o=t.target,i=nt(e.focusCancel),u=-1,c=0;c<i.length;c++)if(o===i[c]){u=c;break}t.shiftKey?w(u,-1):w(u,1),t.stopPropagation(),t.preventDefault()}else-1!==["ArrowLeft","ArrowRight","ArrowUp","ArrowDown","Left","Right","Up","Down"].indexOf(t.key)?document.activeElement===r.confirmButton&&I(r.cancelButton)?r.cancelButton.focus():document.activeElement===r.cancelButton&&I(r.confirmButton)&&r.confirmButton.focus():"Escape"!==t.key&&"Esc"!==t.key||!0!==v(e.allowEscapeKey)||(t.preventDefault(),s(a.DismissReason.esc));else if(t.target&&n.getInput()&&t.target.outerHTML===n.getInput().outerHTML){if(-1!==["textarea","file"].indexOf(e.input))return;a.clickConfirm(),t.preventDefault()}}(t,o)},Lt.keydownTarget=o.keydownListenerCapture?window:r.popup,Lt.keydownListenerCapture=o.keydownListenerCapture,Lt.keydownTarget.addEventListener("keydown",Lt.keydownHandler,{capture:Lt.keydownListenerCapture}),Lt.keydownHandlerAdded=!0),n.enableButtons(),n.hideLoading(),n.resetValidationMessage(),o.toast&&(o.input||o.footer||o.showCloseButton)?L(document.body,C["toast-column"]):O(document.body,C["toast-column"]),"select"===o.input||"radio"===o.input?(f=n,g=o,h=K(),y=function(t){return ce[g.input](h,le(t),g)},b(g.inputOptions)?(Tt(),g.inputOptions.then((function(t){f.hideLoading(),y(t)}))):"object"===t(g.inputOptions)?y(g.inputOptions):m("Unexpected type of inputOptions! Expected object, Map or Promise, got ".concat(t(g.inputOptions)))):-1!==["text","email","number","tel","textarea"].indexOf(o.input)&&b(o.inputValue)&&function(t,e){var n=t.getInput();j(n),e.inputValue.then((function(o){n.value="number"===e.input?parseFloat(o)||0:o+"",H(n),n.focus(),t.hideLoading()})).catch((function(e){m("Error in inputValue promise: "+e),n.value="",H(n),n.focus(),t.hideLoading()}))}(n,o),function(t){var e=D(),n=_();"function"==typeof t.onBeforeOpen&&t.onBeforeOpen(n),ue(e,n,t),ae(e,n),ot()&&se(e,t.scrollbarPadding),it()||Lt.previousActiveElement||(Lt.previousActiveElement=document.activeElement),"function"==typeof t.onOpen&&setTimeout((function(){return t.onOpen(n)}))}(o),o.toast||(v(o.allowEnterKey)?o.focusCancel&&I(r.cancelButton)?r.cancelButton.focus():o.focusConfirm&&I(r.confirmButton)?r.confirmButton.focus():w(-1,1):document.activeElement&&"function"==typeof document.activeElement.blur&&document.activeElement.blur()),r.container.scrollTop=0}))},update:function(t){var e={};Object.keys(t).forEach((function(n){me.isUpdatableParameter(n)?e[n]=t[n]:f('Invalid parameter to update: "'.concat(n,'". Updatable params are listed here: https://github.com/sweetalert2/sweetalert2/blob/master/src/utils/params.js'))}));var n=i({},gt.innerParams.get(this),e);At(this,n),gt.innerParams.set(this,n),Object.defineProperties(this,{params:{value:i({},this.params,t),writable:!1,enumerable:!0}})}});function fe(){if("undefined"!=typeof window){"undefined"==typeof Promise&&m("This package requires a Promise library, please include a shim to enable it in this browser (See: https://github.com/sweetalert2/sweetalert2/wiki/Migration-from-SweetAlert-to-SweetAlert2#1-ie-support)"),de=this;for(var t=arguments.length,e=new Array(t),n=0;n<t;n++)e[n]=arguments[n];var o=Object.freeze(this.constructor.argsToParams(e));Object.defineProperties(this,{params:{value:o,writable:!1,enumerable:!0,configurable:!0}});var i=this._main(this.params);gt.promise.set(this,i)}}fe.prototype.then=function(t){return gt.promise.get(this).then(t)},fe.prototype.finally=function(t){return gt.promise.get(this).finally(t)},i(fe.prototype,pe),i(fe,Ut),Object.keys(pe).forEach((function(t){fe[t]=function(){var e;if(de)return(e=de)[t].apply(e,arguments)}})),fe.DismissReason=y,fe.version="8.14.0";var me=fe;return me.default=me,me})),void 0!==this&&this.Sweetalert2&&(this.swal=this.sweetAlert=this.Swal=this.SweetAlert=this.Sweetalert2);