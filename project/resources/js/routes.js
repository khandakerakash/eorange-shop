export const routes = [
    { path: '/category/:slug', component: require('./components/front/category/index.vue'),name: 'Category'  },
    { path: '/premium/:slug', component: require('./components/front/spatial_category/index.vue'),name: 'spatialCategory'  },
    { path: '/new-arrivals', component: require('./components/front/newArrivals/index.vue'),name: 'newArrivals'  },
    { path: '/999markets', component: require('./components/front/999markets/index.vue'),name: '999markets'  },
    { path: '/vendor/:slug', component: require('./components/front/vendor/index.vue'),name: 'vendor'  },

];