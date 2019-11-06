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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: E:\\saidul\\xampp\\htdocs\\FPS_Game\\resources\\js\\admin.js: Unexpected token (25:21)\n\n\u001b[0m \u001b[90m 23 | \u001b[39m    el\u001b[33m:\u001b[39m \u001b[32m'#app'\u001b[39m\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 24 | \u001b[39m    data\u001b[33m:\u001b[39m {\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 25 | \u001b[39m        categoryName \u001b[33m=\u001b[39m \u001b[32m''\u001b[39m\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    | \u001b[39m                     \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 26 | \u001b[39m    }\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 27 | \u001b[39m    methods\u001b[33m:\u001b[39m {\u001b[0m\n\u001b[0m \u001b[90m 28 | \u001b[39m        submitCategory () {\u001b[0m\n    at Parser.raise (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:6325:17)\n    at Parser.unexpected (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:7642:16)\n    at Parser.parseMaybeAssign (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:8229:12)\n    at Parser.parseExprListItem (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:9491:18)\n    at Parser.parseExprList (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:9465:22)\n    at Parser.parseNewArguments (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:9093:25)\n    at Parser.parseNew (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:9087:10)\n    at Parser.parseExprAtom (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:8801:21)\n    at Parser.parseExprSubscripts (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:8412:23)\n    at Parser.parseMaybeUnary (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:8392:21)\n    at Parser.parseExprOps (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:8267:23)\n    at Parser.parseMaybeConditional (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:8240:23)\n    at Parser.parseMaybeAssign (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:8187:21)\n    at Parser.parseVar (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:10480:26)\n    at Parser.parseVarStatement (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:10299:10)\n    at Parser.parseStatementContent (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:9896:21)\n    at Parser.parseStatement (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:9829:17)\n    at Parser.parseBlockOrModuleBlockBody (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:10405:25)\n    at Parser.parseBlockBody (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:10392:10)\n    at Parser.parseTopLevel (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:9758:10)\n    at Parser.parse (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:11270:17)\n    at parse (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\parser\\lib\\index.js:11306:38)\n    at parser (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:170:34)\n    at normalizeFile (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:138:11)\n    at runSync (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\core\\lib\\transformation\\index.js:44:43)\n    at runAsync (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\core\\lib\\transformation\\index.js:35:14)\n    at process.nextTick (E:\\saidul\\xampp\\htdocs\\FPS_Game\\node_modules\\@babel\\core\\lib\\transform.js:34:34)\n    at process._tickCallback (internal/process/next_tick.js:61:11)");

/***/ }),

/***/ 1:
/*!*************************************!*\
  !*** multi ./resources/js/admin.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! E:\saidul\xampp\htdocs\FPS_Game\resources\js\admin.js */"./resources/js/admin.js");


/***/ })

/******/ });