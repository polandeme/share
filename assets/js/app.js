//require('babel-polyfill');
import * as babel from 'babel-core';

let code = 'class Example{}';
const result = babel.transform(code, {
    presets: ['es2015']
});

console.log(result.code);


/*
new Promise(function(resolve, reject){

});
console.log(Array.from("foo"))
*/
