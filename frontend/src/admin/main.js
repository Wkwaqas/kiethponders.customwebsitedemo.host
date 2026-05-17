import Vue from 'vue'
import { ToastPlugin, ModalPlugin } from 'bootstrap-vue'
import VueCompositionAPI from '@vue/composition-api'

Vue.component('Admin', require('./App.vue').default)

import router from './router'
import store from '../store'

// Global Components
import '../global-components'
import '../libs/filters'

// 3rd party plugins
import '@/libs/portal-vue'
import '@/libs/toastification'
import moment from "moment";

// BSV Plugin Registration
Vue.use(ToastPlugin)
Vue.use(ModalPlugin)

// Composition API
Vue.use(VueCompositionAPI)

// import core styles
require('@core/scss/core.scss')

require('@core/scss/vue/libs/vue-good-table.scss')

// import assets styles
require('@/assets/scss/style.scss')

Vue.config.productionTip = false


new Vue({
  router,
  store,
}).$mount('#admin')
