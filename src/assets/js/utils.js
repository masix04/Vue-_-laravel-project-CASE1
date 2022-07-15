
// String.prototype.basename = function () {
//     return this.split('/').pop().split('#')[0].split('?')[0];
// };

// String.prototype.extension = function () {
//     return this.split('.').pop();
// };

// String.prototype.in = function (array) {
//     return array.contains(this);
// };

// String.prototype.replacePlaceHolders = function (replacements) {
//     return this.replace(/%\w+%/g, function (all) {
//         return replacements[all] || all;
//     });
// };

// String.prototype.toSiteURL = function () {
//     var storage_url = process.env.STORAGE_URL;
//     return storage_url + this.replace(storage_url, "");
// };
// String.prototype.substringWords = function (length) {
//     return this && this.length > length ? this.slice(0, length).split(' ').slice(0, -1).join(' ') : this
// };
// String.prototype.resizeImage = function (width, height, quality, crop) {
//     height = height || '';
//     if (isBrowser && window.isMobile && width > window.innerWidth) {
//         width = window.innerWidth;
//         height = '';
//     }
//     //--------------------------------------------------
//     let imgUrl = this;
//     if(/[/](.+)[_](.+)[x](.*)[.]/i.test(imgUrl)){   //pre-sized image url
//         let ext = imgUrl.split('/').pop().split('.').pop();
//         let folderPath = imgUrl.split('/').reverse().slice(1).reverse().join('/');
//         let imgName = imgUrl.split('/').pop().split('_').reverse().slice(1).reverse().join('_');
//         return folderPath+"/"+imgName+"_"+width+"x"+height+"."+ext;
//     }else{
//         let ext = imgUrl.split('/').pop().split('.').pop();
//         let folderPath = imgUrl.split('/').reverse().slice(1).reverse().join('/');
//         let imgName = imgUrl.split('/').pop().split('.')[0];
//         return folderPath+"/"+imgName+"_"+width+"x"+height+"."+ext;
//     }
// };

// String.prototype.reverseSlug = function () {
//     return this.split('-').join(' ').replace(/^(.)|\s(.)/g, function ($1) {
//         return $1.toUpperCase();
//     });
// };

// String.prototype.slugify = function () {
//     return this.toLowerCase()
//             .replace(/ /g, '-')
//             .replace(/[^\w-]+/g, '');
// };

// String.prototype.triming = function (c) {
//     var re = new RegExp("^[" + c + "]+|[" + c + "]+$", "g");
//     return this.replace(re, "");
// };

// String.prototype.showLessOrMore = function (length) {
//     return (this.length > length) ? this.substring(0, length) + "<span class='less' style='display: inline;'><a onClick=\"$($(this).closest('.less')).css('display','none');$($(this).closest('.less').next()).css('display','inline')\" href='javascript:void(0)'>...show more</a></span><span class='more' style='display:none'>" + this.substring(length) + " <a onClick=\"$($(this).closest('.more').prev()).css('display','inline');$($(this).closest('.more')).css('display','none')\" href='javascript:void(0)'> show less</a></span>" : this;
// };

// String.prototype.findTwitterPostLink = function () {
//     var match = this.match(/http(s)?:\/\/twitter\.com\/(?:#!\/)?(\w+)\/status(es)?\/(\d+)/);
//     return match ? match[4] : false;
// };

// String.prototype.findFacebookPostLink = function () {
//     var match = this.match(/http(s)?:\/\/www\.facebook\.com\/(?:#!\/)?(\w+)\/posts\/(\d+)/);
//     return match ? match[0] : false;
// };

// String.prototype.findInstagramPostLink = function () {
//     var match = this.match(/http(s)?:\/\/www\.instagram\.com\/p\/(\w+)/);
//     return match ? match[0] : false;
// };

// String.prototype.findLinkedInPostLink = function () {
//     var match = this.match(/http(s)?:\/\/www\.linkedin\.com\/posts\/.+(-ugcPost-)(\d+)/);
//     return match ? match : false;
// };

// String.prototype.findFirstURL = function () {
//     var match = this.match(/(((https?:\/\/)|(www\.))[^\s]+)/g);
//     return match ? match[0] : false;
// };

// String.prototype.makeLinksAnchor = function () {

//     var replacedText, replacePattern1, replacePattern2, replacePattern3;

//     //URLs starting with http://, https://, or ftp://
//     replacePattern1 = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim;
//     replacedText = this.replace(replacePattern1, '<a href="$1" target="_blank">$1</a>');

//     //URLs starting with "www." (without // before it, or it'd re-link the ones done above).
//     replacePattern2 = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
//     replacedText = replacedText.replace(replacePattern2, '$1<a href="//$2" target="_blank">$2</a>');

//     //Change email addresses to mailto:: links.
//     replacePattern3 = /(([a-zA-Z0-9\-\_\.])+@[a-zA-Z\_]+?(\.[a-zA-Z]{2,6})+)/gim;
//     replacedText = replacedText.replace(replacePattern3, '<a href="mailto:$1">$1</a>');

//     return replacedText;
// };

// Number.prototype.in = function (array) {
//     return array.contains(this);
// };

// Number.prototype.pad = function (size) {
//     var s = String(this);
//     while (s.length < (size || 2)) {
//         s = "0" + s;
//     }
//     return s;
// };

// Number.prototype.formatToUnits = function () {
//     var num = this;
//     if (num >= 1000000000) {
//         return (num / 1000000000).toFixed(1).replace(/\.0$/, '') + 'G';
//     }
//     if (num >= 1000000) {
//         return (num / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
//     }
//     if (num >= 1000) {
//         return (num / 1000).toFixed(1).replace(/\.0$/, '') + 'K';
//     }
//     return num;
// };

// Array.prototype.contains = function (obj) {
//     var i = this.length;
//     while (i--) {
//         if (this[i] === obj) {
//             return true;
//         }
//     }
//     return false;
// };

// Array.prototype.getObjectById = function (value, key_name) {
//     key_name = key_name ? key_name : 'id';
//     var temp = null;
//     for (var i = 0; i < this.length; i++)
//     {
//         if (this[i][key_name] === value) {
//             temp = this[i];
//             break;
//         }
//     }
//     return temp;
// };

// Array.prototype.removeObjectById = function (value, key_name, recursivly) {
//     key_name = key_name ? key_name : 'id';
//     recursivly = recursivly ? true : false;
//     for (var i = this.length - 1; i >= 0; i--)  // removing in reverse order for recursive
//     {
//         if (this[i][key_name] === value) {
//             this.splice(i, 1);
//             if (!recursivly)
//                 break;
//         }
//     }
//     return this;
// };

// function idleRefresh() {
//     if (isBrowser) {
//         var t;
//         window.onload = resetTimer;
//         window.onmousemove = resetTimer;
//         window.onmousedown = resetTimer;  // catches touchscreen presses as well
//         window.ontouchstart = resetTimer; // catches touchscreen swipes as well
//         window.onclick = resetTimer;      // catches touchpad clicks as well
//         window.onkeydown = resetTimer;
//         window.addEventListener('scroll', resetTimer, true); // improved; see comments

//         function resetTimer() {
//             clearTimeout(t);
//             t = setTimeout(function () {
//                 window.location.reload();
//             }, (1000 * 60 * 15));  // 15 mint
//         }
//     }
// }
// idleRefresh();