import Vue from 'vue'
import VueSweetalert2 from 'vue-sweetalert2'

import 'sweetalert2/dist/sweetalert2.min.css';

const options = {
    confirmButtonColor: '#ff8315',
    cancelButtonColor: '#ff7674',
    color: '#fff',
    background: '#283046'
 };


Vue.use(VueSweetalert2,options)
