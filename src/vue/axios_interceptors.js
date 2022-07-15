
// import axios from 'axios';
// export default {
//     install(Vue, options) {

//         if (isBrowser) {
//             $(document).on('mousedown click', 'body', function (event) {
//                 var target_elem = $(event.target);
//                 clickedElement = target_elem;
//                 if (target_elem.is('input')) {
//                     clickedElement = target_elem.parent();
//                 }
//             });
//         }

//         axios.interceptors.request.use(function (config) {
//             if (isBrowser) {
//                 serveSSRcache(config);  // cache use After page reload

//                 //------------Show Loader with Clicked Element---------------------
//                 config.loader = config.hasOwnProperty('loader') ? config.loader : true;
//                 if (clickedElement && config.loader && config.url.split('/').pop() !== "count") {
//                     clickedElement.addClass('loader disable');
//                     clickedElement.prop('disabled', true);
//                     config.clickedElement = clickedElement;
                    
//                     //---------------------------
//                     setTimeout(function () {
//                         config.clickedElement.removeClass('loader disable');
//                         config.clickedElement.prop('disabled', false);
//                     }, 4000)
//                 }
//             }

//             //------------Global Headers---------------------
//             config.headers["Device-Type"] = "web";
//             config.headers["Timezone"] = $root.$store.getters.timezone || Intl.DateTimeFormat().resolvedOptions().timeZone;

//             return config;

//         }, function (error) {
//             return Promise.reject(error);
//         });

//         var notified = true;

//         axios.interceptors.response.use(function (response) {
//             if (isServer) {
//                 saveResponseForBrowser(response);
//             }
//             //----------------------------------------------------------------------
//             if (isBrowser) {
//                 if (response.config.clickedElement && response.config.clickedElement.hasClass('loader')) {
//                     response.config.clickedElement.removeClass('loader disable');
//                     response.config.clickedElement.prop('disabled', false);
//                     clickedElement = null;
//                 }

//                 if (response.data && response.data.status === 422) { //Laravel validation Failed Errors
//                     $root.$toast.error(response.data.message);
//                 }

//                 if (response.data.status === 503) { //Token expired
//                     if (notified) {
//                         notified = false;
//                         $root.$toast.error(response.data.message);
// //                    $root.logOut();
//                     }
//                 }
//             }

//             return response;
//         }, function (error) {
//             return Promise.reject(error);
//         });

//         function getCacheKey(config) {
//             if (config.params)
//                 delete config.params["ttl"];

//             return "_cache_" + config.url + "_" + config.method + "_" + JSON.stringify(config.params || {});
//         }

//         function serveJScache(config) {
//             //--------------Setting Default ttl to 300----------------------
//             if (typeof (config.params) === 'undefined' || typeof (config.params.ttl) === 'undefined') {
//                 if (config.params)
//                     config.params.ttl = 300;
//                 else
//                     config.params = {ttl: 300};
//             }
//             //------------------------------------
//             if (config.params && config.params.ttl) {
//                 checkJsCache(config);
//                 return config;
//             }
//             delete config.params["ttl"];
//         }
//         function checkJsCache(config) {
//             config.ttl = config.params.ttl;
//             delete config.params["ttl"];
//             let cacheKey = getCacheKey(config);
//             let now = Math.round(new Date() / 1000);
//             if (appContainer[cacheKey] && appContainer[cacheKey].ttl > now) {
//                 config.adapter = () => {
//                     return Promise.resolve(appContainer[cacheKey].response);
//                 };
// //                    console.log("Cached Response returned for " + config.url);
//             }
//         }

//         function cacheTheResponseInJS(response) {
//             let cacheKey = getCacheKey(response.config);
//             let now = Math.round(new Date() / 1000);
//             response.is_cached = true;
//             appContainer[cacheKey] = {ttl: (now + response.config.ttl), response: response};
//         }
//         function saveResponseForBrowser(response) {
//             $root.$store.commit('setApiResponse', {key: getCacheKey(response.config), data: response.data});
//         }
//         function serveSSRcache(config) {
//             var cache_key = getCacheKey(config);
//             var _cache = $root.$store.getters.getApiResponse(cache_key);
//             if (_cache) {
//                 config.data = _cache;
//                 // Set the request adapter to send the cached response and prevent the request from actually running
//                 config.adapter = () => {
//                     return Promise.resolve({
//                         data: _cache,
//                         status: config.status,
//                         statusText: config.statusText,
//                         headers: config.headers,
//                         config: config,
//                         request: config
//                     });
//                 };
//                 setTimeout(function () {
//                     $root.$store.commit('deleteApiResponse', cache_key);
//                 }, 500)

//                 return config;      // return main request response
//             }
//         }
//     }};
