import {defineStore} from "pinia";
import axios from "axios";

export const shopStore = defineStore('categories', {
    state: () => ({
        categories: [],
        lastProducts: [],
    }),
    getters: (state) => ({
        categories: state.categories,
        lastProducts: state.lastProducts,
    }),
    actions: {
        async loadCategories() {
            if (this.categories.length === 0) {
                const data = await axios.get(route('categories.show'))
                this.categories = data.data;
            }
        },
        async loadLastProducts() {
            if (this.lastProducts.length === 0) {
                const data = await axios.get(route('products.last'))
                this.lastProducts = data.data;
            }
        }
    },
})
