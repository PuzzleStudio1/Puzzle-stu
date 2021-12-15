/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/*!**************************************************************!*\
  !*** ../demo1/src/js/pages/crud/forms/editors/summernote.js ***!
  \**************************************************************/

// Class definition

var KTSummernoteDemo = function () {
    // Private functions
    var demos = function () {
        $('.summernote').summernote({
            height: 200,
            tabsize: 2
        });
    }

    return {
        // public functions
        init: function() {
            demos();
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTSummernoteDemo.init();
});

/******/ })()
;
//# sourceMappingURL=summernote.js.map