const options = {
  moduleCache: {
    vue: Vue,
  },
  async getFile(url) {
    const res = await fetch(url);
    if (!res.ok)
      throw Object.assign(new Error(res.statusText + " " + url), { res });
    return {
      getContentData: (asBinary) => (asBinary ? res.arrayBuffer() : res.text()),
    };
  },
  addStyle(textContent) {
    const style = Object.assign(document.createElement("style"), {
      textContent,
    });
    const ref = document.head.getElementsByTagName("style")[0] || null;
    document.head.insertBefore(style, ref);
  },
};

const { loadModule } = window["vue3-sfc-loader"];
const { createMemoryHistory, createRouter } = VueRouter;
const { createApp } = Vue;

/* 根據自己的需求修改Router Path內容 */
const routes = [
  //{ path: "/", component: Vue.defineAsyncComponent( () => loadModule('./components/HomeView.vue', options)) },
  //{ path: "/clock", component: Vue.defineAsyncComponent( () => loadModule('./components/ClockView.vue', options)) },
  //{ path: "/dateCalc", component: Vue.defineAsyncComponent( () => loadModule('./components/DateCalcView.vue', options)) },
];

const router = createRouter({
  history: createMemoryHistory(),
  routes,
});

const vueApp = createApp( Vue.defineAsyncComponent( () => loadModule('./app.vue', options)) ).use(router).mount("#vueApp");
