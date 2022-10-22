THREE.TransformControls=function(e,t){THREE.Object3D.call(this),t=void 0!==t?t:document,this.visible=!1;var n=new THREE.TransformControlsGizmo;this.add(n);var o=new THREE.TransformControlsPlane;this.add(o);var i=this;S("camera",e),S("object",void 0),S("enabled",!0),S("axis",null),S("mode","translate"),S("translationSnap",null),S("rotationSnap",null),S("space","world"),S("size",1),S("dragging",!1),S("showX",!0),S("showY",!0),S("showZ",!0);var a={type:"change"},s={type:"mouseDown"},r={type:"mouseUp",mode:i.mode},l={type:"objectChange"},E=new THREE.Raycaster,c=new THREE.Vector3,h=new THREE.Vector3,p=new THREE.Quaternion,u={X:new THREE.Vector3(1,0,0),Y:new THREE.Vector3(0,1,0),Z:new THREE.Vector3(0,0,1)},d=new THREE.Quaternion,m=new THREE.Vector3,T=new THREE.Vector3,w=new THREE.Vector3,y=new THREE.Vector3,R=0,H=new THREE.Vector3,f=new THREE.Quaternion,v=new THREE.Vector3,M=new THREE.Vector3,b=new THREE.Quaternion,x=new THREE.Vector3,g=new THREE.Vector3,P=new THREE.Quaternion,X=new THREE.Vector3,Y=new THREE.Vector3,Z=new THREE.Quaternion,L=new THREE.Vector3,B=new THREE.Vector3,Q=new THREE.Vector3,I=new THREE.Quaternion,G=new THREE.Vector3;function S(e,t){var s=t;Object.defineProperty(i,e,{get:function(){return void 0!==s?s:t},set:function(t){s!==t&&(s=t,o[e]=t,n[e]=t,i.dispatchEvent({type:e+"-changed",value:t}),i.dispatchEvent(a))}}),i[e]=t,o[e]=t,n[e]=t}function j(e){var n=e.changedTouches?e.changedTouches[0]:e,o=t.getBoundingClientRect();return{x:(n.clientX-o.left)/o.width*2-1,y:-(n.clientY-o.top)/o.height*2+1,button:e.button}}function C(e){e.preventDefault()}function z(e){i.enabled&&i.pointerHover(j(e))}function V(e){i.enabled&&(e.preventDefault(),i.pointerHover(j(e)),i.pointerDown(j(e)))}function O(e){i.enabled&&(e.preventDefault(),i.pointerMove(j(e)))}function A(e){i.enabled&&(e.preventDefault(),i.pointerUp(j(e)))}S("parentQuaternion",b),S("worldPosition",Y),S("worldPositionStart",g),S("worldQuaternion",Z),S("worldQuaternionStart",P),S("cameraPosition",H),S("cameraQuaternion",f),S("pointStart",T),S("pointEnd",w),S("rotationAxis",y),S("rotationAngle",R),S("eye",B),t.addEventListener("mousedown",V,!1),t.addEventListener("touchstart",V,!1),t.addEventListener("mousemove",z,!1),t.addEventListener("touchmove",z,!1),document.addEventListener("mousemove",O,!1),t.addEventListener("touchmove",O,!1),document.addEventListener("mouseup",A,!1),t.addEventListener("touchend",A,!1),t.addEventListener("touchcancel",A,!1),t.addEventListener("touchleave",A,!1),t.addEventListener("contextmenu",C,!1),this.dispose=function(){t.removeEventListener("mousedown",V),t.removeEventListener("touchstart",V),t.removeEventListener("mousemove",z),t.removeEventListener("touchmove",z),document.removeEventListener("mousemove",O),t.removeEventListener("touchmove",O),document.removeEventListener("mouseup",A),t.removeEventListener("touchend",A),t.removeEventListener("touchcancel",A),t.removeEventListener("touchleave",A),t.removeEventListener("contextmenu",C)},this.attach=function(e){this.object=e,this.visible=!0},this.detach=function(){this.object=void 0,this.visible=!1,this.axis=null},this.updateMatrixWorld=function(){void 0!==this.object&&(this.object.updateMatrixWorld(),this.object.parent.matrixWorld.decompose(M,b,x),this.object.matrixWorld.decompose(Y,Z,L)),this.camera.updateMatrixWorld(),this.camera.matrixWorld.decompose(H,f,v),this.camera instanceof THREE.PerspectiveCamera?B.copy(H).sub(Y).normalize():this.camera instanceof THREE.OrthographicCamera&&B.copy(H).normalize(),THREE.Object3D.prototype.updateMatrixWorld.call(this)},this.pointerHover=function(e){if(void 0!==this.object&&!0!==this.dragging&&(void 0===e.button||0===e.button)){E.setFromCamera(e,this.camera);var t=E.intersectObjects(n.picker[this.mode].children,!0)[0]||!1;this.axis=t?t.object.name:null}},this.pointerDown=function(e){if(!(void 0===this.object||!0===this.dragging||void 0!==e.button&&0!==e.button||0!==e.button&&void 0!==e.button||null===this.axis)){E.setFromCamera(e,this.camera);var t=E.intersectObjects([o],!0)[0]||!1;if(t){var n=this.space;if("scale"===this.mode?n="local":"E"!==this.axis&&"XYZE"!==this.axis&&"XYZ"!==this.axis||(n="world"),"local"===n&&"rotate"===this.mode){var i=this.rotationSnap;"X"===this.axis&&i&&(this.object.rotation.x=Math.round(this.object.rotation.x/i)*i),"Y"===this.axis&&i&&(this.object.rotation.y=Math.round(this.object.rotation.y/i)*i),"Z"===this.axis&&i&&(this.object.rotation.z=Math.round(this.object.rotation.z/i)*i)}this.object.updateMatrixWorld(),this.object.parent.updateMatrixWorld(),Q.copy(this.object.position),I.copy(this.object.quaternion),G.copy(this.object.scale),this.object.matrixWorld.decompose(g,P,X),T.copy(t.point).sub(g),"local"===n&&T.applyQuaternion(P.clone().inverse())}this.dragging=!0,s.mode=this.mode,this.dispatchEvent(s)}},this.pointerMove=function(e){var t=this.axis,n=this.mode,i=this.object,s=this.space;if("scale"===n?s="local":"E"!==t&&"XYZE"!==t&&"XYZ"!==t||(s="world"),void 0!==i&&null!==t&&!1!==this.dragging&&(void 0===e.button||0===e.button)){E.setFromCamera(e,this.camera);var r=E.intersectObjects([o],!0)[0]||!1;if(!1!==r){if(w.copy(r.point).sub(g),"local"===s&&w.applyQuaternion(P.clone().inverse()),"translate"===n)-1===t.search("X")&&(w.x=T.x),-1===t.search("Y")&&(w.y=T.y),-1===t.search("Z")&&(w.z=T.z),"local"===s?i.position.copy(w).sub(T).applyQuaternion(I):i.position.copy(w).sub(T),i.position.add(Q),this.translationSnap&&("local"===s&&(i.position.applyQuaternion(p.copy(I).inverse()),-1!==t.search("X")&&(i.position.x=Math.round(i.position.x/this.translationSnap)*this.translationSnap),-1!==t.search("Y")&&(i.position.y=Math.round(i.position.y/this.translationSnap)*this.translationSnap),-1!==t.search("Z")&&(i.position.z=Math.round(i.position.z/this.translationSnap)*this.translationSnap),i.position.applyQuaternion(I)),"world"===s&&(i.parent&&i.position.add(c.setFromMatrixPosition(i.parent.matrixWorld)),-1!==t.search("X")&&(i.position.x=Math.round(i.position.x/this.translationSnap)*this.translationSnap),-1!==t.search("Y")&&(i.position.y=Math.round(i.position.y/this.translationSnap)*this.translationSnap),-1!==t.search("Z")&&(i.position.z=Math.round(i.position.z/this.translationSnap)*this.translationSnap),i.parent&&i.position.sub(c.setFromMatrixPosition(i.parent.matrixWorld))));else if("scale"===n){if(-1!==t.search("XYZ")){var H=w.length()/T.length();w.dot(T)<0&&(H*=-1),c.set(H,H,H)}else c.copy(w).divide(T),-1===t.search("X")&&(c.x=1),-1===t.search("Y")&&(c.y=1),-1===t.search("Z")&&(c.z=1);i.scale.copy(G).multiply(c)}else if("rotate"===n){var f=20/Y.distanceTo(c.setFromMatrixPosition(this.camera.matrixWorld)),v="local"===this.space?Z:d,M=u[t];"E"===t?(c.copy(w).cross(T),y.copy(B),R=w.angleTo(T)*(c.dot(B)<0?1:-1)):"XYZE"===t?(c.copy(w).sub(T).cross(B).normalize(),y.copy(c),R=w.sub(T).dot(c.cross(B))*f):"X"!==t&&"Y"!==t&&"Z"!==t||(m.copy(M).applyQuaternion(v),y.copy(M),c=M.clone(),h=w.clone().sub(T),"local"===s&&(c.applyQuaternion(v),h.applyQuaternion(P)),R=h.dot(c.cross(B).normalize())*f),this.rotationSnap&&(R=Math.round(R/this.rotationSnap)*this.rotationSnap),this.rotationAngle=R,"local"===s?(i.quaternion.copy(I),i.quaternion.multiply(p.setFromAxisAngle(y,R))):(i.quaternion.copy(p.setFromAxisAngle(y,R)),i.quaternion.multiply(I))}this.dispatchEvent(a),this.dispatchEvent(l)}}},this.pointerUp=function(e){void 0!==e.button&&0!==e.button||(this.dragging&&null!==this.axis&&(r.mode=this.mode,this.dispatchEvent(r)),this.dragging=!1,void 0===e.button&&(this.axis=null))},this.getMode=function(){return i.mode},this.setMode=function(e){i.mode=e},this.setTranslationSnap=function(e){i.translationSnap=e},this.setRotationSnap=function(e){i.rotationSnap=e},this.setSize=function(e){i.size=e},this.setSpace=function(e){i.space=e},this.update=function(){console.warn("THREE.TransformControls: update function has been depricated.")}},THREE.TransformControls.prototype=Object.assign(Object.create(THREE.Object3D.prototype),{constructor:THREE.TransformControls,isTransformControls:!0}),THREE.TransformControlsGizmo=function(){"use strict";THREE.Object3D.call(this),this.type="TransformControlsGizmo";var e=new THREE.MeshBasicMaterial({depthTest:!1,depthWrite:!1,transparent:!0,side:THREE.DoubleSide,fog:!1}),t=new THREE.LineBasicMaterial({depthTest:!1,depthWrite:!1,transparent:!0,linewidth:1,fog:!1}),n=e.clone();n.opacity=.15;var o=e.clone();o.opacity=.33;var i=e.clone();i.color.set(16711680);var a=e.clone();a.color.set(65280);var s=e.clone();s.color.set(255);var r=e.clone();r.opacity=.25;var l=r.clone();l.color.set(16776960);var E=r.clone();E.color.set(65535);var c=r.clone();c.color.set(16711935),e.clone().color.set(16776960);var h=t.clone();h.color.set(16711680);var p=t.clone();p.color.set(65280);var u=t.clone();u.color.set(255);var d=t.clone();d.color.set(65535);var m=t.clone();m.color.set(16711935);var T=t.clone();T.color.set(16776960);var w=t.clone();w.color.set(7895160);var y=T.clone();y.opacity=.25;var R=new THREE.CylinderBufferGeometry(0,.05,.2,12,1,!1),H=new THREE.BoxBufferGeometry(.125,.125,.125),f=new THREE.BufferGeometry;f.addAttribute("position",new THREE.Float32BufferAttribute([0,0,0,1,0,0],3));var v,M=function(e,t){for(var n=new THREE.BufferGeometry,o=[],i=0;i<=64*t;++i)o.push(0,Math.cos(i/32*Math.PI)*e,Math.sin(i/32*Math.PI)*e);return n.addAttribute("position",new THREE.Float32BufferAttribute(o,3)),n},b={X:[[new THREE.Mesh(R,i),[1,0,0],[0,0,-Math.PI/2],null,"fwd"],[new THREE.Mesh(R,i),[1,0,0],[0,0,Math.PI/2],null,"bwd"],[new THREE.Line(f,h)]],Y:[[new THREE.Mesh(R,a),[0,1,0],null,null,"fwd"],[new THREE.Mesh(R,a),[0,1,0],[Math.PI,0,0],null,"bwd"],[new THREE.Line(f,p),null,[0,0,Math.PI/2]]],Z:[[new THREE.Mesh(R,s),[0,0,1],[Math.PI/2,0,0],null,"fwd"],[new THREE.Mesh(R,s),[0,0,1],[-Math.PI/2,0,0],null,"bwd"],[new THREE.Line(f,u),null,[0,-Math.PI/2,0]]],XYZ:[[new THREE.Mesh(new THREE.OctahedronBufferGeometry(.1,0),r),[0,0,0],[0,0,0]]],XY:[[new THREE.Mesh(new THREE.PlaneBufferGeometry(.295,.295),l),[.15,.15,0]],[new THREE.Line(f,T),[.18,.3,0],null,[.125,1,1]],[new THREE.Line(f,T),[.3,.18,0],[0,0,Math.PI/2],[.125,1,1]]],YZ:[[new THREE.Mesh(new THREE.PlaneBufferGeometry(.295,.295),E),[0,.15,.15],[0,Math.PI/2,0]],[new THREE.Line(f,d),[0,.18,.3],[0,0,Math.PI/2],[.125,1,1]],[new THREE.Line(f,d),[0,.3,.18],[0,-Math.PI/2,0],[.125,1,1]]],XZ:[[new THREE.Mesh(new THREE.PlaneBufferGeometry(.295,.295),c),[.15,0,.15],[-Math.PI/2,0,0]],[new THREE.Line(f,m),[.18,0,.3],null,[.125,1,1]],[new THREE.Line(f,m),[.3,0,.18],[0,-Math.PI/2,0],[.125,1,1]]]},x={X:[[new THREE.Mesh(new THREE.CylinderBufferGeometry(.2,0,1,4,1,!1),n),[.6,0,0],[0,0,-Math.PI/2]]],Y:[[new THREE.Mesh(new THREE.CylinderBufferGeometry(.2,0,1,4,1,!1),n),[0,.6,0]]],Z:[[new THREE.Mesh(new THREE.CylinderBufferGeometry(.2,0,1,4,1,!1),n),[0,0,.6],[Math.PI/2,0,0]]],XYZ:[[new THREE.Mesh(new THREE.OctahedronBufferGeometry(.2,0),n)]],XY:[[new THREE.Mesh(new THREE.PlaneBufferGeometry(.4,.4),n),[.2,.2,0]]],YZ:[[new THREE.Mesh(new THREE.PlaneBufferGeometry(.4,.4),n),[0,.2,.2],[0,Math.PI/2,0]]],XZ:[[new THREE.Mesh(new THREE.PlaneBufferGeometry(.4,.4),n),[.2,0,.2],[-Math.PI/2,0,0]]]},g={START:[[new THREE.Mesh(new THREE.OctahedronBufferGeometry(.01,2),o),null,null,null,"helper"]],END:[[new THREE.Mesh(new THREE.OctahedronBufferGeometry(.01,2),o),null,null,null,"helper"]],DELTA:[[new THREE.Line((v=new THREE.BufferGeometry,v.addAttribute("position",new THREE.Float32BufferAttribute([0,0,0,1,1,1],3)),v),o),null,null,null,"helper"]],X:[[new THREE.Line(f,o.clone()),[-1e3,0,0],null,[1e6,1,1],"helper"]],Y:[[new THREE.Line(f,o.clone()),[0,-1e3,0],[0,0,Math.PI/2],[1e6,1,1],"helper"]],Z:[[new THREE.Line(f,o.clone()),[0,0,-1e3],[0,-Math.PI/2,0],[1e6,1,1],"helper"]]},P={X:[[new THREE.Line(M(1,.5),h)],[new THREE.Mesh(new THREE.OctahedronBufferGeometry(.04,0),i),[0,0,.99],null,[1,3,1]]],Y:[[new THREE.Line(M(1,.5),p),null,[0,0,-Math.PI/2]],[new THREE.Mesh(new THREE.OctahedronBufferGeometry(.04,0),a),[0,0,.99],null,[3,1,1]]],Z:[[new THREE.Line(M(1,.5),u),null,[0,Math.PI/2,0]],[new THREE.Mesh(new THREE.OctahedronBufferGeometry(.04,0),s),[.99,0,0],null,[1,3,1]]],E:[[new THREE.Line(M(1.25,1),y),null,[0,Math.PI/2,0]],[new THREE.Mesh(new THREE.CylinderBufferGeometry(.03,0,.15,4,1,!1),y),[1.17,0,0],[0,0,-Math.PI/2],[1,1,.001]],[new THREE.Mesh(new THREE.CylinderBufferGeometry(.03,0,.15,4,1,!1),y),[-1.17,0,0],[0,0,Math.PI/2],[1,1,.001]],[new THREE.Mesh(new THREE.CylinderBufferGeometry(.03,0,.15,4,1,!1),y),[0,-1.17,0],[Math.PI,0,0],[1,1,.001]],[new THREE.Mesh(new THREE.CylinderBufferGeometry(.03,0,.15,4,1,!1),y),[0,1.17,0],[0,0,0],[1,1,.001]]],XYZE:[[new THREE.Line(M(1,1),w),null,[0,Math.PI/2,0]]]},X={AXIS:[[new THREE.Line(f,o.clone()),[-1e3,0,0],null,[1e6,1,1],"helper"]]},Y={X:[[new THREE.Mesh(new THREE.TorusBufferGeometry(1,.1,4,24),n),[0,0,0],[0,-Math.PI/2,-Math.PI/2]]],Y:[[new THREE.Mesh(new THREE.TorusBufferGeometry(1,.1,4,24),n),[0,0,0],[Math.PI/2,0,0]]],Z:[[new THREE.Mesh(new THREE.TorusBufferGeometry(1,.1,4,24),n),[0,0,0],[0,0,-Math.PI/2]]],E:[[new THREE.Mesh(new THREE.TorusBufferGeometry(1.25,.1,2,24),n)]],XYZE:[[new THREE.Mesh(new THREE.SphereBufferGeometry(.7,10,8),n)]]},Z={X:[[new THREE.Mesh(H,i),[.8,0,0],[0,0,-Math.PI/2]],[new THREE.Line(f,h),null,null,[.8,1,1]]],Y:[[new THREE.Mesh(H,a),[0,.8,0]],[new THREE.Line(f,p),null,[0,0,Math.PI/2],[.8,1,1]]],Z:[[new THREE.Mesh(H,s),[0,0,.8],[Math.PI/2,0,0]],[new THREE.Line(f,u),null,[0,-Math.PI/2,0],[.8,1,1]]],XY:[[new THREE.Mesh(H,l),[.85,.85,0],null,[2,2,.2]],[new THREE.Line(f,T),[.855,.98,0],null,[.125,1,1]],[new THREE.Line(f,T),[.98,.855,0],[0,0,Math.PI/2],[.125,1,1]]],YZ:[[new THREE.Mesh(H,E),[0,.85,.85],null,[.2,2,2]],[new THREE.Line(f,d),[0,.855,.98],[0,0,Math.PI/2],[.125,1,1]],[new THREE.Line(f,d),[0,.98,.855],[0,-Math.PI/2,0],[.125,1,1]]],XZ:[[new THREE.Mesh(H,c),[.85,0,.85],null,[2,.2,2]],[new THREE.Line(f,m),[.855,0,.98],null,[.125,1,1]],[new THREE.Line(f,m),[.98,0,.855],[0,-Math.PI/2,0],[.125,1,1]]],XYZX:[[new THREE.Mesh(new THREE.BoxBufferGeometry(.125,.125,.125),r),[1.1,0,0]]],XYZY:[[new THREE.Mesh(new THREE.BoxBufferGeometry(.125,.125,.125),r),[0,1.1,0]]],XYZZ:[[new THREE.Mesh(new THREE.BoxBufferGeometry(.125,.125,.125),r),[0,0,1.1]]]},L={X:[[new THREE.Mesh(new THREE.CylinderBufferGeometry(.2,0,.8,4,1,!1),n),[.5,0,0],[0,0,-Math.PI/2]]],Y:[[new THREE.Mesh(new THREE.CylinderBufferGeometry(.2,0,.8,4,1,!1),n),[0,.5,0]]],Z:[[new THREE.Mesh(new THREE.CylinderBufferGeometry(.2,0,.8,4,1,!1),n),[0,0,.5],[Math.PI/2,0,0]]],XY:[[new THREE.Mesh(H,n),[.85,.85,0],null,[3,3,.2]]],YZ:[[new THREE.Mesh(H,n),[0,.85,.85],null,[.2,3,3]]],XZ:[[new THREE.Mesh(H,n),[.85,0,.85],null,[3,.2,3]]],XYZX:[[new THREE.Mesh(new THREE.BoxBufferGeometry(.2,.2,.2),n),[1.1,0,0]]],XYZY:[[new THREE.Mesh(new THREE.BoxBufferGeometry(.2,.2,.2),n),[0,1.1,0]]],XYZZ:[[new THREE.Mesh(new THREE.BoxBufferGeometry(.2,.2,.2),n),[0,0,1.1]]]},B={X:[[new THREE.Line(f,o.clone()),[-1e3,0,0],null,[1e6,1,1],"helper"]],Y:[[new THREE.Line(f,o.clone()),[0,-1e3,0],[0,0,Math.PI/2],[1e6,1,1],"helper"]],Z:[[new THREE.Line(f,o.clone()),[0,0,-1e3],[0,-Math.PI/2,0],[1e6,1,1],"helper"]]},Q=function(e){var t=new THREE.Object3D;for(var n in e)for(var o=e[n].length;o--;){var i=e[n][o][0].clone(),a=e[n][o][1],s=e[n][o][2],r=e[n][o][3],l=e[n][o][4];i.name=n,i.tag=l,a&&i.position.set(a[0],a[1],a[2]),s&&i.rotation.set(s[0],s[1],s[2]),r&&i.scale.set(r[0],r[1],r[2]),i.updateMatrix();var E=i.geometry.clone();E.applyMatrix(i.matrix),i.geometry=E,i.position.set(0,0,0),i.rotation.set(0,0,0),i.scale.set(1,1,1),t.add(i)}return t},I=new THREE.Vector3(0,0,0),G=new THREE.Euler,S=new THREE.Vector3(0,1,0),j=new THREE.Vector3(0,0,0),C=new THREE.Matrix4,z=new THREE.Quaternion,V=new THREE.Quaternion,O=new THREE.Quaternion,A=new THREE.Vector3(1,0,0),D=new THREE.Vector3(0,1,0),F=new THREE.Vector3(0,0,1);this.gizmo={},this.picker={},this.helper={},this.add(this.gizmo.translate=Q(b)),this.add(this.gizmo.rotate=Q(P)),this.add(this.gizmo.scale=Q(Z)),this.add(this.picker.translate=Q(x)),this.add(this.picker.rotate=Q(Y)),this.add(this.picker.scale=Q(L)),this.add(this.helper.translate=Q(g)),this.add(this.helper.rotate=Q(X)),this.add(this.helper.scale=Q(B)),this.picker.translate.visible=!1,this.picker.rotate.visible=!1,this.picker.scale.visible=!1,this.updateMatrixWorld=function(){var e=this.space;"scale"===this.mode&&(e="local");var t="local"===e?this.worldQuaternion:O;this.gizmo.translate.visible="translate"===this.mode,this.gizmo.rotate.visible="rotate"===this.mode,this.gizmo.scale.visible="scale"===this.mode,this.helper.translate.visible="translate"===this.mode,this.helper.rotate.visible="rotate"===this.mode,this.helper.scale.visible="scale"===this.mode;var n=[];n=(n=(n=n.concat(this.picker[this.mode].children)).concat(this.gizmo[this.mode].children)).concat(this.helper[this.mode].children);for(var o=0;o<n.length;o++){var i=n[o];i.visible=!0,i.rotation.set(0,0,0),i.position.copy(this.worldPosition);var a=this.worldPosition.distanceTo(this.cameraPosition);if(i.scale.set(1,1,1).multiplyScalar(a*this.size/7),"helper"!==i.tag){if(i.quaternion.copy(t),"translate"===this.mode||"scale"===this.mode){"X"!==i.name&&"XYZX"!==i.name||Math.abs(S.copy(A).applyQuaternion(t).dot(this.eye))>.99&&(i.scale.set(1e-10,1e-10,1e-10),i.visible=!1),"Y"!==i.name&&"XYZY"!==i.name||Math.abs(S.copy(D).applyQuaternion(t).dot(this.eye))>.99&&(i.scale.set(1e-10,1e-10,1e-10),i.visible=!1),"Z"!==i.name&&"XYZZ"!==i.name||Math.abs(S.copy(F).applyQuaternion(t).dot(this.eye))>.99&&(i.scale.set(1e-10,1e-10,1e-10),i.visible=!1),"XY"===i.name&&Math.abs(S.copy(F).applyQuaternion(t).dot(this.eye))<.2&&(i.scale.set(1e-10,1e-10,1e-10),i.visible=!1),"YZ"===i.name&&Math.abs(S.copy(A).applyQuaternion(t).dot(this.eye))<.2&&(i.scale.set(1e-10,1e-10,1e-10),i.visible=!1),"XZ"===i.name&&Math.abs(S.copy(D).applyQuaternion(t).dot(this.eye))<.2&&(i.scale.set(1e-10,1e-10,1e-10),i.visible=!1),-1!==i.name.search("X")&&(S.copy(A).applyQuaternion(t).dot(this.eye)<-.4?"fwd"===i.tag?i.visible=!1:i.scale.x*=-1:"bwd"===i.tag&&(i.visible=!1)),-1!==i.name.search("Y")&&(S.copy(D).applyQuaternion(t).dot(this.eye)<-.4?"fwd"===i.tag?i.visible=!1:i.scale.y*=-1:"bwd"===i.tag&&(i.visible=!1)),-1!==i.name.search("Z")&&(S.copy(F).applyQuaternion(t).dot(this.eye)<-.4?"fwd"===i.tag?i.visible=!1:i.scale.z*=-1:"bwd"===i.tag&&(i.visible=!1))}else"rotate"===this.mode&&(V.copy(t),S.copy(this.eye).applyQuaternion(z.copy(t).inverse()),-1!==i.name.search("E")&&i.quaternion.setFromRotationMatrix(C.lookAt(this.eye,j,D)),"X"===i.name&&(z.setFromAxisAngle(A,Math.atan2(-S.y,S.z)),z.multiplyQuaternions(V,z),i.quaternion.copy(z)),"Y"===i.name&&(z.setFromAxisAngle(D,Math.atan2(S.x,S.z)),z.multiplyQuaternions(V,z),i.quaternion.copy(z)),"Z"===i.name&&(z.setFromAxisAngle(F,Math.atan2(S.y,S.x)),z.multiplyQuaternions(V,z),i.quaternion.copy(z)));i.visible=i.visible&&(-1===i.name.indexOf("X")||this.showX),i.visible=i.visible&&(-1===i.name.indexOf("Y")||this.showY),i.visible=i.visible&&(-1===i.name.indexOf("Z")||this.showZ),i.visible=i.visible&&(-1===i.name.indexOf("E")||this.showX&&this.showY&&this.showZ),i.material._opacity=i.material._opacity||i.material.opacity,i.material._color=i.material._color||i.material.color.clone(),i.material.color.copy(i.material._color),i.material.opacity=i.material._opacity,this.enabled?this.axis&&(i.name===this.axis||this.axis.split("").some((function(e){return i.name===e}))?(i.material.opacity=1,i.material.color.lerp(new THREE.Color(1,1,1),.5)):(i.material.opacity*=.25,i.material.color.lerp(new THREE.Color(1,1,1),.5))):(i.material.opacity*=.5,i.material.color.lerp(new THREE.Color(1,1,1),.5))}else i.visible=!1,"AXIS"===i.name?(i.position.copy(this.worldPositionStart),i.visible=!!this.axis,"X"===this.axis&&(z.setFromEuler(G.set(0,0,0)),i.quaternion.copy(t).multiply(z),Math.abs(S.copy(A).applyQuaternion(t).dot(this.eye))>.9&&(i.visible=!1)),"Y"===this.axis&&(z.setFromEuler(G.set(0,0,Math.PI/2)),i.quaternion.copy(t).multiply(z),Math.abs(S.copy(D).applyQuaternion(t).dot(this.eye))>.9&&(i.visible=!1)),"Z"===this.axis&&(z.setFromEuler(G.set(0,Math.PI/2,0)),i.quaternion.copy(t).multiply(z),Math.abs(S.copy(F).applyQuaternion(t).dot(this.eye))>.9&&(i.visible=!1)),"XYZE"===this.axis&&(z.setFromEuler(G.set(0,Math.PI/2,0)),S.copy(this.rotationAxis),i.quaternion.setFromRotationMatrix(C.lookAt(j,S,D)),i.quaternion.multiply(z),i.visible=this.dragging),"E"===this.axis&&(i.visible=!1)):"START"===i.name?(i.position.copy(this.worldPositionStart),i.visible=this.dragging):"END"===i.name?(i.position.copy(this.worldPosition),i.visible=this.dragging):"DELTA"===i.name?(i.position.copy(this.worldPositionStart),i.quaternion.copy(this.worldQuaternionStart),I.set(1e-10,1e-10,1e-10).add(this.worldPositionStart).sub(this.worldPosition).multiplyScalar(-1),I.applyQuaternion(this.worldQuaternionStart.clone().inverse()),i.scale.copy(I),i.visible=this.dragging):(i.quaternion.copy(t),this.dragging?i.position.copy(this.worldPositionStart):i.position.copy(this.worldPosition),this.axis&&(i.visible=-1!==this.axis.search(i.name)))}THREE.Object3D.prototype.updateMatrixWorld.call(this)}},THREE.TransformControlsGizmo.prototype=Object.assign(Object.create(THREE.Object3D.prototype),{constructor:THREE.TransformControlsGizmo,isTransformControlsGizmo:!0}),THREE.TransformControlsPlane=function(){"use strict";THREE.Mesh.call(this,new THREE.PlaneBufferGeometry(1e5,1e5,2,2),new THREE.MeshBasicMaterial({visible:!1,wireframe:!0,side:THREE.DoubleSide,transparent:!0,opacity:.1})),this.type="TransformControlsPlane";var e=new THREE.Vector3(1,0,0),t=new THREE.Vector3(0,1,0),n=new THREE.Vector3(0,0,1),o=new THREE.Vector3,i=new THREE.Vector3,a=new THREE.Vector3,s=new THREE.Matrix4,r=new THREE.Quaternion;this.updateMatrixWorld=function(){var l=this.space;switch(this.position.copy(this.worldPosition),"scale"===this.mode&&(l="local"),e.set(1,0,0).applyQuaternion("local"===l?this.worldQuaternion:r),t.set(0,1,0).applyQuaternion("local"===l?this.worldQuaternion:r),n.set(0,0,1).applyQuaternion("local"===l?this.worldQuaternion:r),a.copy(t),this.mode){case"translate":case"scale":switch(this.axis){case"X":a.copy(this.eye).cross(e),i.copy(e).cross(a);break;case"Y":a.copy(this.eye).cross(t),i.copy(t).cross(a);break;case"Z":a.copy(this.eye).cross(n),i.copy(n).cross(a);break;case"XY":i.copy(n);break;case"YZ":i.copy(e);break;case"XZ":a.copy(n),i.copy(t);break;case"XYZ":case"E":i.set(0,0,0)}break;case"rotate":default:i.set(0,0,0)}0===i.length()?this.quaternion.copy(this.cameraQuaternion):(s.lookAt(o.set(0,0,0),i,a),this.quaternion.setFromRotationMatrix(s)),THREE.Object3D.prototype.updateMatrixWorld.call(this)}},THREE.TransformControlsPlane.prototype=Object.assign(Object.create(THREE.Mesh.prototype),{constructor:THREE.TransformControlsPlane,isTransformControlsPlane:!0});