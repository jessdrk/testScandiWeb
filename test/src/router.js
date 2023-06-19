import { createRouter, createWebHistory } from "vue-router";
import ProductAdd from "./pages/ProductAdd.vue";
import ProductList from "./pages/ProductList.vue";

const routes = [
    { 
        path: '/', 
        component: ProductList,
        name: '/'
    },
    { 
        path: '/addproduct', 
        component: ProductAdd,
        name: 'addproduct'
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;