// ==UserScript==
// @name         googleBot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       Ksenia Vasilyeva
// @match        https://www.google.com/*
// @match        https://napli.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

let keywords = ["Как использовать devtools браузера", "10 популярных шрифтов от Google", "Отключение редакций и ревизий в WordPress", "Вывод произвольных типов записей и полей"];
let keyword =keywords[getRandom(0, keywords.length)];
//let keyword ="Конвертация Notion в Obsidian";
let links = document.links;
let btnK = document.getElementsByName("btnK")[0];
let googleInput = document.getElementsByName("q")[0];

if (btnK !== undefined) {
  //Работает на главной странице
  let i = 0;
  let timerId = setInterval(() => {
    googleInput.value += keyword[i];
    i++;
    if (i == keyword.length) {
      clearInterval(timerId);
      btnK.click();
    }
  }, 500);
} else if (location.hostname == "napli.ru") {
  //Работает на целевом сайте
  console.log("Мы на целевом сайте");
  setInterval(() => {
    let index = getRandom(0, links.length);
    //С долей вероятности 30% уйдет искать обратно
    if (getRandom(0, 101) >= 70) {
      location.href = "https://www.google.com/";
    }
    //Перебирает ссылки и проверяет, что по ним можно кликнуть
    if (links[index].href.indexOf("napli.ru") != -1) links[index].click();
  }, getRandom(2000, 5000))
} else {
  let nextGooglePage = true;
  //Работает в поисковой выдаче
  for(let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf("napli.ru") != -1) {
      let link = links[i];
      nextGooglePage = false;
      console.log("Нашел строку " + link);
      setTimeout(() => {
        link.click();
      }, getRandom(2500, 5000))
      break;
    }
  }
  //Если не нашел на первой странице выдачи
  let elementExist = setInterval(() => {
    let element = document.querySelector(".YyVfkd");
    if (element != null) {
      if (element.innerText == "5") {
        nextGooglePage = false;
        location.href = "https://www.google.com/";
      }
      clearInterval(elementExist);
    }
  }, 100)

  if (nextGooglePage) {
    setTimeout(() => {
      pnnext.click();
    }, getRandom(3000, 8000))
  }
}

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min)
}
