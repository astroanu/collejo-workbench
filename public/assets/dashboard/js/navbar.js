/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\"]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0&bustCache!./workbench/Collejo/App/Modules/Dashboard/resources/assets/js/components/Navbar.vue":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
	mixins: [C.mixins.Routes, C.mixins.Trans]
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/component-normalizer.js":
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-2df3a724\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0&bustCache!./workbench/Collejo/App/Modules/Dashboard/resources/assets/js/components/Navbar.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "b-navbar",
    { attrs: { toggleable: "sm", type: "light", variant: "light" } },
    [
      _c("b-nav-toggle", { attrs: { target: "nav_collapse" } }),
      _vm._v(" "),
      _c("b-navbar-brand", { attrs: { href: "/" } }, [_vm._v(" Collejo")]),
      _vm._v(" "),
      _c(
        "b-collapse",
        { attrs: { "is-nav": "", id: "nav_collapse" } },
        [
          _c(
            "b-nav",
            { attrs: { "is-nav-bar": "" } },
            [
              _c("b-nav-item", { attrs: { href: "#" } }, [_vm._v("Link")]),
              _vm._v(" "),
              _c("b-nav-item", { attrs: { href: "#", disabled: "" } }, [
                _vm._v("Disabled")
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-nav",
            { staticClass: "ml-auto", attrs: { "is-nav-bar": "" } },
            [
              _c(
                "b-nav-form",
                [
                  _c("b-form-input", {
                    staticClass: "mr-sm-2",
                    attrs: { size: "sm", type: "text", placeholder: "Search" }
                  }),
                  _vm._v(" "),
                  _c(
                    "b-button",
                    {
                      staticClass: "my-2 my-sm-0",
                      attrs: { size: "sm", type: "submit" }
                    },
                    [_vm._v("Search")]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "b-nav-item-dropdown",
                { attrs: { text: "Lang", right: "" } },
                [
                  _c("b-dropdown-item", { attrs: { href: "#" } }, [
                    _vm._v("EN")
                  ]),
                  _vm._v(" "),
                  _c("b-dropdown-item", { attrs: { href: "#" } }, [
                    _vm._v("ES")
                  ]),
                  _vm._v(" "),
                  _c("b-dropdown-item", { attrs: { href: "#" } }, [
                    _vm._v("RU")
                  ]),
                  _vm._v(" "),
                  _c("b-dropdown-item", { attrs: { href: "#" } }, [
                    _vm._v("FA")
                  ])
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "b-nav-item-dropdown",
                { attrs: { right: "" } },
                [
                  _c(
                    "template",
                    {
                      attrs: { slot: "button-content" },
                      slot: "button-content"
                    },
                    [_c("em", [_vm._v("User")])]
                  ),
                  _vm._v(" "),
                  _c("b-dropdown-item", { attrs: { href: "#" } }, [
                    _vm._v("Profile")
                  ]),
                  _vm._v(" "),
                  _c("b-dropdown-item", { attrs: { href: "#" } }, [
                    _vm._v("Signout")
                  ])
                ],
                2
              )
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-2df3a724", module.exports)
  }
}

/***/ }),

/***/ "./workbench/Collejo/App/Modules/Dashboard/resources/assets/js/components/Navbar.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\"]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0&bustCache!./workbench/Collejo/App/Modules/Dashboard/resources/assets/js/components/Navbar.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-2df3a724\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0&bustCache!./workbench/Collejo/App/Modules/Dashboard/resources/assets/js/components/Navbar.vue")
/* template functional */
  var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "workbench\\Collejo\\App\\Modules\\Dashboard\\resources\\assets\\js\\components\\Navbar.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {  return key !== "default" && key.substr(0, 2) !== "__"})) {  console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-2df3a724", Component.options)
  } else {
    hotAPI.reload("data-v-2df3a724", Component.options)
' + '  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ "./workbench/Collejo/App/Modules/Dashboard/resources/assets/js/navbar.js":
/***/ (function(module, exports, __webpack_require__) {

Vue.component('navbar', __webpack_require__("./workbench/Collejo/App/Modules/Dashboard/resources/assets/js/components/Navbar.vue"));

var navbar = new Vue({
	el: '#navbar'
});

/***/ }),

/***/ 4:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./workbench/Collejo/App/Modules/Dashboard/resources/assets/js/navbar.js");


/***/ })

/******/ });