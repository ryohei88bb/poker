/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// 「class="table-row"」と設定された要素がクリックされた時に呼ばれる処理
$('.table-row').on('click', function() {
    // $(this) :クリックされた要素
    // $(this).attr('row-id') :クリックされた要素に設定されている「row-id」属性を取得
    let rowId = $(this).attr('row-id');
    let targetURL = location.protocol+"//"+location.hostname+"/admin/poker/detail?id="+rowId;
    window.location.href = targetURL;
});