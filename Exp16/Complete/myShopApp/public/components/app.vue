<template>
  <div>
    <HeaderComponent />
    <component v-if="navComponent && (isMainPage || isFuncPage)" :is="navComponent" />
    <div class="container">
      <AsideComponent v-if="isMainPage && asidePosition === 'left'" :style="{ width: asideWidth + '%' }" />
      <SectionComponent v-if="isMainPage" :columns="columns" :sectionWidth="sectionWidth" />
      <router-view v-if="!isMainPage" />
      <AsideComponent v-if="isMainPage && asidePosition === 'right'" :style="{ width: asideWidth + '%' }" />
    </div>
    <FooterComponent />
  </div>
</template>

<script>
export default {
  components: {
    HeaderComponent: Vue.defineAsyncComponent(() => loadModule('/components/header.vue', window.loaderOptions)),
    FooterComponent: Vue.defineAsyncComponent(() => loadModule('/components/footer.vue', window.loaderOptions)),
    SectionComponent: Vue.defineAsyncComponent(() => loadModule('/components/section.vue', window.loaderOptions)),
    AsideComponent: Vue.defineAsyncComponent(() => loadModule('/components/aside.vue', window.loaderOptions))
  },
  data() {
    return {
      navComponent: null,
      sectionWidth: null,
      asideWidth: null,
      columns: null,
      asidePosition: null
    };
  },
  computed: {
    isMainPage() {
      return this.$route.path === '/';
    },
    isFuncPage() {
      return this.$route.path === '/productlist' || this.$route.path === '/mycart' || this.$route.path === '/checkout';
    }
  },  
  created() {
    if (!window.config) {
      console.error("window.config 未正確載入");
      return;
    }

    // 確保 `config.json` 先載入後，再設定變數
    this.sectionWidth = window.config.section_width;
    this.asideWidth = window.config.aside_width;
    this.columns = window.config.columns;
    this.asidePosition = window.config.aside_position;
    
    if (window.config.css_framework === 'bootstrap') {
      this.navComponent = Vue.defineAsyncComponent(() => loadModule('/components/nav.bootstrap.vue', window.loaderOptions));
    } else {
      this.navComponent = Vue.defineAsyncComponent(() => loadModule('/components/nav.flatui.vue', window.loaderOptions));
    }
  }
};
</script>

<style>
.container {
  display: flex;
  flex-wrap: wrap;
}

* RWD */
@media (max-width: 576px) {
  .container {
    flex-direction: column;
  }
  section, aside {
    width: 100% !important;
  }
}
@media (max-width: 992px) and (min-width: 577px) {
  section {
    width: 75% !important;
  }
  aside {
    width: 25% !important;
  }
}
</style>
