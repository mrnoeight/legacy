!function(e,n){"object"==typeof exports&&"undefined"!=typeof module?n(exports):"function"==typeof define&&define.amd?define(["exports"],n):n((e=e||self).AssetsManager={})}(this,(function(e){"use strict";var n={ON_LOAD_PROGRESS:"onLoadProgress",ON_LOAD_COMPLETE:"onLoadComplete",ON_LOAD_ERROR:"onLoadError"},t=new Map,r=!0,a=["right.jpg","left.jpg","top.jpg","bottom.jpg","front.jpg","back.jpg"],s=new THREE.LoadingManager;s.onError=function(e){console.log("There was an error loading "+e);var t=$.Event(n.ON_LOAD_ERROR);t.url=e,$(AssetsManager).trigger(t)};var o,i=[],c=[],d=0,f=0;function u(e,r){if(t.set(e,r),d++,f=i.length,d==f){o&&o(),(a=$.Event(n.ON_LOAD_PROGRESS)).progress=1,$(AssetsManager).trigger(a);var a=$.Event(n.ON_LOAD_COMPLETE);$(AssetsManager).trigger(a)}else{var s=d/f;(a=$.Event(n.ON_LOAD_PROGRESS)).progress=s,$(AssetsManager).trigger(a)}}function g(e,n,t){var r;if(-1!=e.indexOf("cube_map"))(r=new THREE.CubeTextureLoader(s)).setPath(n),r.load(a,o);else{switch(function(e){return(e.substring(e.lastIndexOf(".")+1,e.length)||e).toLowerCase()}(n)){case"fbx":r=new THREE.FBXLoader(s);break;case"glb":case"gltf":r=new THREE.GLTFLoader(s);break;case"obj":r=new THREE.FBXLoader(s);break;case"mp3":r=new THREE.AudioLoader(s);break;case"jpg":case"png":r=new THREE.TextureLoader(s);break;default:r=new THREE.FileLoader(s)}r.load(n,o,void 0,(function(e){console.log(e)}))}function o(n){var r;if(void 0!==n.scene){var a=new THREE.Object3D;a.add(n.scene),n.scene.scale.setScalar(100),r=a,void 0!==n.animations&&(r.animations=n.animations),void 0!==n.assets&&(r.assets=n.assets),void 0!==n.parser&&(r.parser=n.parser)}else r=n;t&&t(e,r)}return c.push(r),r}e.Event=n,e.enabled=r,e.activate=function(){r=!0},e.deactivate=function(){r=!1},e.add=function(e,n){var t={url:n,key:e};i.push(t)},e.start=function(e){if(o=e,d=0,0!=(f=i.length))for(var n=0;n<f;n++){var t=i[n].url;g(i[n].key,t,u)}else o&&o()},e.get=function(e){return t.get(e)},e.set=function(e,n){n.traverse((function(e){e.isMesh&&(e.castShadow=!1,e.receiveShadow=!1)})),t.set(e,n)},e.list=t,e.dispose=function(){c.forEach((function(e){null}))},Object.defineProperty(e,"__esModule",{value:!0}),Object.defineProperties(e,{Events:{get:function(){return n}}})}));