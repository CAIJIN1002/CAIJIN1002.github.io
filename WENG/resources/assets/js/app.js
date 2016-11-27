
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));
// 
// var apiurl = {
//   messages: 'localhost:81/api/home'
// };
//
// // const app = new Vue({
// //     el: '#p_body',
// //     data: {
// //       notifydata: ''
// //     },
// //     ready: function(){
// //
// //       $.ajax({
// //
// //         url: apiurl.messages,
// //         success: function(res){
// //           app.notifydata=res;
// //         }
// //
// //
// //       });
// //
// //     }
// // });
//
// var vm2 = new Vue({
//
//   el: '#p_body',
//   data: {
//     items: []
//
//   },
//   ready: function(){
//
//     $.ajax({
//
//       url: apiurl.messages,
//       success: function(res){
//
//         vm2.items=res
//       }
//
//     });
//
//   }
//
// });
