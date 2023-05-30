// ==UserScript==
// @name         GoogleBot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       Vasilyeva Ksenia
// @match        https://www.google.com/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==


let keywords = ["10 самых популярных шрифтов от Google", "Отключение редакций и ревизий в WordPress", "Вывод произвольных типов записей и полей в WordPress"];
let keyword =keywords[getRandom(0, keywords.length)];
console.log("Hello, World!")
let links= document.links;
let btnK = document.getElementsByName("btnK")[0];

if(btnK!== undefined){
///работает на главной странице
    document.getElementsByName("q")[0].value =keyword;
    btnK.click();}
else {
///работает в поисковой выдаче
    for( let i =0; i<links.length; i++){
        if(links[i].href.indexOf("napli.ru") != -1){
            let link= links[i];
            console.log("Нашел строку " + link);
            link.click();
            break;
        }
    }
}
function getRandom(min, max){
return Math.floor(Math.rundom()*(max-min)+min)
}

