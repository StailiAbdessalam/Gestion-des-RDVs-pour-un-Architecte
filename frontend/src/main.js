import { createApp } from "vue";
import App from "./App.vue";
import "./assets/style/index.css";
import router from "./router";
createApp(App).use(router).mount("#app");
