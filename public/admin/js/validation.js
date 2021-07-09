/* eslint-disable */

var count = 0;
var flag = false;
var $errorMessage = $('.error-message');

function showErr(message) {
  $errorMessage.text(message).css({'opacity': 1});
}

function setErr(dom, message) {
  $errorMessage.text(message).css({'opacity': 1});
  dom.css({'borderColor': '#ec284d'});
}

function clearErr(dom) {
  $errorMessage.css({'opacity': 0});
  dom.css({'borderColor': '#E9E9E9'});
}

/**
 * 获取url参数值
 * */
function getUrlParam(name) {
  var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
  var url = window.location.search.substr(1).match(reg);
  if (url !== null) {
    return unescape(url[2]);
  }
  return null;
}

/**
 * 邮箱验证
 * */
function validEmail(email) {
  var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return reg.test(email);
}

/**
 * 电话号码验证
 * */
function verifyPhone(tel) {
  var reg = /^(1\d{10})$/;
  return reg.test(tel);
}

function showMessage(message) {
  var $msg = $('<div class="msg-box">' +
    '<div class="warning">!</div>' +
    '<p>' + message + '</p>' +
    '</div>');
  $msg.appendTo(document.body);
  setTimeout(function () {
    $msg.remove();
  }, 2e3);
}

function showLoading() {
  var $loading = $('<div class="loading" id="loading">' +
    '<img src="/loading.gif">' +
    '</div>');
  setTimeout(function () {
    $loading.appendTo(document.body);
  }, 200);
}

function hideLoading() {
  setTimeout(function () {
    var child = document.getElementById('loading');
    document.body.removeChild(child);
  }, 500);
}