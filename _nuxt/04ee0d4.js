(window.webpackJsonp=window.webpackJsonp||[]).push([[27,8],{301:function(t,e,n){"use strict";n.r(e);var r=n(302),o=n.n(r),l=(n(303),{props:{load:{type:Boolean,default:!0}},data:function(){return{}},components:{Loading:o.a}}),c=n(46),component=Object(c.a)(l,(function(){var t=this._self._c;return t("div",{staticClass:"vld-parent"},[t("loading",{attrs:{active:this.load}})],1)}),[],!1,null,null,null);e.default=component.exports},302:function(t,e,n){"undefined"!=typeof self&&self,t.exports=function(t){var e={};function n(i){if(e[i])return e[i].exports;var r=e[i]={i:i,l:!1,exports:{}};return t[i].call(r.exports,r,r.exports,n),r.l=!0,r.exports}return n.m=t,n.c=e,n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)n.d(i,r,function(e){return t[e]}.bind(null,r));return i},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=1)}([function(t,e,n){},function(t,e,n){"use strict";n.r(e);var i="undefined"!=typeof window?window.HTMLElement:Object,r={mounted:function(){document.addEventListener("focusin",this.focusIn)},methods:{focusIn:function(t){if(this.isActive&&t.target!==this.$el&&!this.$el.contains(t.target)){var e=this.container?this.container:this.isFullPage?null:this.$el.parentElement;(this.isFullPage||e&&e.contains(t.target))&&(t.preventDefault(),this.$el.focus())}}},beforeDestroy:function(){document.removeEventListener("focusin",this.focusIn)}};function o(t,e,n,i,r,o,a,s){var l,c="function"==typeof t?t.options:t;if(e&&(c.render=e,c.staticRenderFns=n,c._compiled=!0),i&&(c.functional=!0),o&&(c._scopeId="data-v-"+o),a?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),r&&r.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(a)},c._ssrRegister=l):r&&(l=s?function(){r.call(this,this.$root.$options.shadowRoot)}:r),l)if(c.functional){c._injectStyles=l;var u=c.render;c.render=function(t,e){return l.call(e),u(t,e)}}else{var d=c.beforeCreate;c.beforeCreate=d?[].concat(d,l):[l]}return{exports:t,options:c}}var a=o({name:"spinner",props:{color:{type:String,default:"#000"},height:{type:Number,default:64},width:{type:Number,default:64}}},(function(){var t=this.$createElement,e=this._self._c||t;return e("svg",{attrs:{width:this.width,height:this.height,viewBox:"0 0 38 38",xmlns:"http://www.w3.org/2000/svg",stroke:this.color}},[e("g",{attrs:{fill:"none","fill-rule":"evenodd"}},[e("g",{attrs:{transform:"translate(1 1)","stroke-width":"2"}},[e("circle",{attrs:{"stroke-opacity":".25",cx:"18",cy:"18",r:"18"}}),this._v(" "),e("path",{attrs:{d:"M36 18c0-9.94-8.06-18-18-18"}},[e("animateTransform",{attrs:{attributeName:"transform",type:"rotate",from:"0 18 18",to:"360 18 18",dur:"0.8s",repeatCount:"indefinite"}})],1)])])])}),[],!1,null,null,null);a.options.__file="spinner.vue";var s=a.exports,l=o({name:"spinner",props:{color:{type:String,default:"#000"},height:{type:Number,default:240},width:{type:Number,default:60}}},(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("svg",{attrs:{width:t.width,height:t.height,viewBox:"0 0 120 30",xmlns:"http://www.w3.org/2000/svg",fill:t.color}},[n("circle",{attrs:{cx:"15",cy:"15",r:"15"}},[n("animate",{attrs:{attributeName:"r",from:"15",to:"15",begin:"0s",dur:"0.8s",values:"15;9;15",calcMode:"linear",repeatCount:"indefinite"}}),t._v(" "),n("animate",{attrs:{attributeName:"fill-opacity",from:"1",to:"1",begin:"0s",dur:"0.8s",values:"1;.5;1",calcMode:"linear",repeatCount:"indefinite"}})]),t._v(" "),n("circle",{attrs:{cx:"60",cy:"15",r:"9","fill-opacity":"0.3"}},[n("animate",{attrs:{attributeName:"r",from:"9",to:"9",begin:"0s",dur:"0.8s",values:"9;15;9",calcMode:"linear",repeatCount:"indefinite"}}),t._v(" "),n("animate",{attrs:{attributeName:"fill-opacity",from:"0.5",to:"0.5",begin:"0s",dur:"0.8s",values:".5;1;.5",calcMode:"linear",repeatCount:"indefinite"}})]),t._v(" "),n("circle",{attrs:{cx:"105",cy:"15",r:"15"}},[n("animate",{attrs:{attributeName:"r",from:"15",to:"15",begin:"0s",dur:"0.8s",values:"15;9;15",calcMode:"linear",repeatCount:"indefinite"}}),t._v(" "),n("animate",{attrs:{attributeName:"fill-opacity",from:"1",to:"1",begin:"0s",dur:"0.8s",values:"1;.5;1",calcMode:"linear",repeatCount:"indefinite"}})])])}),[],!1,null,null,null);l.options.__file="dots.vue";var c=l.exports,u=o({name:"vue-loading",mixins:[r],props:{active:Boolean,programmatic:Boolean,container:[Object,Function,i],isFullPage:{type:Boolean,default:!0},transition:{type:String,default:"fade"},canCancel:Boolean,onCancel:{type:Function,default:function(){}},color:String,backgroundColor:String,opacity:Number,width:Number,height:Number,loader:{type:String,default:"spinner"}},data:function(){return{isActive:this.active||!1}},components:{Spinner:s,Dots:c},beforeMount:function(){this.programmatic&&(this.container?(this.isFullPage=!1,this.container.appendChild(this.$el)):document.body.appendChild(this.$el))},mounted:function(){this.programmatic&&(this.isActive=!0),document.addEventListener("keyup",this.keyPress)},methods:{cancel:function(){this.canCancel&&this.isActive&&(this.hide(),this.onCancel.apply(null,arguments))},hide:function(){var t=this;this.$emit("hide"),this.$emit("update:active",!1),this.programmatic&&(this.isActive=!1,setTimeout((function(){var e;t.$destroy(),void 0!==(e=t.$el).remove?e.remove():e.parentNode.removeChild(e)}),150))},keyPress:function(t){27===t.keyCode&&this.cancel()}},watch:{active:function(t){this.isActive=t}},beforeDestroy:function(){document.removeEventListener("keyup",this.keyPress)}},(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("transition",{attrs:{name:t.transition}},[n("div",{directives:[{name:"show",rawName:"v-show",value:t.isActive,expression:"isActive"}],staticClass:"vld-overlay is-active",class:{"is-full-page":t.isFullPage},attrs:{tabindex:"0","aria-busy":t.isActive,"aria-label":"Loading"}},[n("div",{staticClass:"vld-background",style:{background:this.backgroundColor,opacity:this.opacity},on:{click:function(e){return e.preventDefault(),t.cancel(e)}}}),t._v(" "),n("div",{staticClass:"vld-icon"},[t._t("before"),t._v(" "),t._t("default",[n(t.loader,{tag:"component",attrs:{color:t.color,width:t.width,height:t.height}})]),t._v(" "),t._t("after")],2)])])}),[],!1,null,null,null);u.options.__file="Component.vue";var d=u.exports;n(0),d.install=function(t){var e=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};return{show:function(){var i=arguments.length>0&&void 0!==arguments[0]?arguments[0]:e,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:n,o=Object.assign({},e,i,{programmatic:!0}),a=new(t.extend(d))({el:document.createElement("div"),propsData:o}),s=Object.assign({},n,r);return Object.keys(s).map((function(t){a.$slots[t]=s[t]})),a}}}(t,arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},arguments.length>2&&void 0!==arguments[2]?arguments[2]:{});t.$loading=e,t.prototype.$loading=e},e.default=d}]).default},303:function(t,e,n){var content=n(304);content.__esModule&&(content=content.default),"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,n(113).default)("cf231d7a",content,!0,{sourceMap:!1})},304:function(t,e,n){var r=n(112)((function(i){return i[1]}));r.push([t.i,".vld-overlay{align-items:center;bottom:0;display:none;justify-content:center;left:0;overflow:hidden;position:absolute;right:0;top:0;z-index:1}.vld-overlay.is-active{display:flex}.vld-overlay.is-full-page{position:fixed;z-index:999}.vld-overlay .vld-background{background:#fff;bottom:0;left:0;opacity:.5;position:absolute;right:0;top:0}.vld-overlay .vld-icon,.vld-parent{position:relative}",""]),r.locals={},t.exports=r},336:function(t,e,n){"use strict";n.r(e);var r=n(10),o=(n(15),n(33),n(34),n(64),{head:function(){return{title:this.modulo}},data:function(){return{load:!0,list:[],apiUrl:"marcas",page:"Configuración",modulo:"Marcas",url_nuevo:"/configuracion/marcas/nuevo",url_editar:"/configuracion/marcas/editar/"}},methods:{GET_DATA:function(path){var t=this;return Object(r.a)(regeneratorRuntime.mark((function e(){var n;return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,t.$api.$get(path);case 2:return n=e.sent,e.abrupt("return",n);case 4:case"end":return e.stop()}}),e)})))()},EliminarItem:function(t){var e=this;return Object(r.a)(regeneratorRuntime.mark((function n(){var r;return regeneratorRuntime.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:return e.load=!0,n.prev=1,n.next=4,e.$api.$delete(e.apiUrl+"/"+t);case 4:return r=n.sent,console.log(r),n.next=8,Promise.all([e.GET_DATA(e.apiUrl)]).then((function(t){e.list=t[0]}));case 8:n.next=13;break;case 10:n.prev=10,n.t0=n.catch(1),console.log(n.t0);case 13:return n.prev=13,e.load=!1,n.finish(13);case 16:case"end":return n.stop()}}),n,null,[[1,10,13,16]])})))()},Eliminar:function(t){var e=this;this.$swal.fire({title:"¿Deseas eliminar el registro?",showDenyButton:!1,showCancelButton:!0,confirmButtonText:"Eliminar",cancelButtonText:"Cancelar"}).then(function(){var n=Object(r.a)(regeneratorRuntime.mark((function n(r){return regeneratorRuntime.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:if(!r.isConfirmed){n.next=3;break}return n.next=3,e.EliminarItem(t);case 3:case"end":return n.stop()}}),n)})));return function(t){return n.apply(this,arguments)}}())}},mounted:function(){var t=this;this.$nextTick(Object(r.a)(regeneratorRuntime.mark((function e(){return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.prev=0,e.next=3,Promise.all([t.GET_DATA(t.apiUrl)]).then((function(e){t.list=e[0]}));case 3:e.next=8;break;case 5:e.prev=5,e.t0=e.catch(0),console.log(e.t0);case 8:return e.prev=8,t.load=!1,e.finish(8);case 11:case"end":return e.stop()}}),e,null,[[0,5,8,11]])}))))}}),l=o,c=n(46),component=Object(c.a)(l,(function(){var t=this,e=t._self._c;return e("div",[e("JcLoader",{attrs:{load:t.load}}),t._v(" "),e("AdminTemplate",{attrs:{page:t.page,modulo:t.modulo}},[e("div",{attrs:{slot:"body"},slot:"body"},[e("div",{staticClass:"row justify-content-end"},[e("div",{staticClass:"col-2"},[e("nuxtLink",{staticClass:"btn btn-dark btn-sm w-100",staticStyle:{padding:"10px","background-color":"#f59916",color:"white"},attrs:{to:t.url_nuevo}},[t._v("\n                    Agregar\n                ")])],1),t._v(" "),e("div",{staticClass:"col-12"},[e("div",{staticClass:"card"},[e("div",{staticClass:"card-body"},[e("table",{staticClass:"table"},[e("thead",[e("th",{staticClass:"py-0 px-1"},[t._v("No")]),t._v(" "),e("th",{staticClass:"py-0 px-1"},[t._v("Nombre")]),t._v(" "),e("th",{staticClass:"py-0 px-1"})]),t._v(" "),e("tbody",t._l(t.list,(function(n,i){return e("tr",[e("td",{staticClass:"py-0 px-1"},[t._v(t._s(i+1))]),t._v(" "),e("td",{staticClass:"py-0 px-1"},[t._v(t._s(n.nombre))]),t._v(" "),e("td",{staticClass:"py-0 px-1"},[e("div",{staticClass:"btn-group"},[e("nuxtLink",{staticClass:"btn btn-info btn-sm py-1 px-2",attrs:{to:t.url_editar+n.id,type:"button"}},[e("i",{staticClass:"fas fa-pen"})]),t._v(" "),e("button",{staticClass:"btn btn-danger btn-sm py-1 px-2",attrs:{type:"button"},on:{click:function(e){return t.Eliminar(n.id)}}},[e("i",{staticClass:"fas fa-trash"})])],1)])])})),0)])])])])])])])],1)}),[],!1,null,null,null);e.default=component.exports;installComponents(component,{JcLoader:n(301).default,AdminTemplate:n(305).default})}}]);