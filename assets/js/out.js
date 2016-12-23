'use strict';

var _babelCore = require('babel-core');

var babel = _interopRequireWildcard(_babelCore);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var code = 'class Example{}'; //require('babel-polyfill');

var result = babel.transform(code, {
    presets: ['es2015']
});

console.log(result.code);

/*
new Promise(function(resolve, reject){

});
console.log(Array.from("foo"))
*/
