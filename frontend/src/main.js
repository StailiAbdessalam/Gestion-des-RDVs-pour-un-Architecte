import { createApp } from "vue";
import App from "./App.vue";
import "./assets/style/index.css";
import router from "./router";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

createApp(App).use(VueSweetalert2).
use(router).mount("#app");
// const app = createApp(App);

// app.;

