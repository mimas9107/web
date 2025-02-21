<template>
  <div class="product-list">
    <h2>Product List</h2>
    <div v-for="product in products" :key="product.id" class="product">
      <p><strong>{{ product.name }}</strong></p>
      <p>Price: ${{ product.price }}</p>
      <p>Stock: {{ product.stock_quantity }}</p>
      <p>{{ product.description }}</p>
      <input type="number" v-model.number="product.purchaseQty" placeholder="Quantity" min="1" :max="product.stock_quantity" />
      <button @click="addToCart(product)">Add to Cart</button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ProductList',
  data() {
    return {
      products: []
    };
  },
  created() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/products', true);
    xhr.onreadystatechange = () => {
      if (xhr.readyState === 4 && xhr.status === 200) {
        this.products = JSON.parse(xhr.responseText);
        this.products.forEach(product => {
          product.purchaseQty = 1;
        });
      }
    };
    xhr.send();
  },
  methods: {
    addToCart(product) {
      if (product.purchaseQty > product.stock_quantity) {
        alert('Purchase quantity exceeds stock!');
        return;
      }
      const data = {
        product_id: product.id,
        quantity: product.purchaseQty
      };
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '/cart/add', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
          alert('Product added to cart');
        }
      };
      let encodedData = '';
      for (let key in data) {
        if (data.hasOwnProperty(key)) {
          encodedData += encodeURIComponent(key) + '=' + encodeURIComponent(data[key]) + '&';
        }
      }
      encodedData = encodedData.slice(0, -1);
      xhr.send(encodedData);
    }
  }
};
</script>

<style scoped>
.product-list {
  display: flex;
  flex-wrap: wrap;
}
.product {
  border: 1px solid #ddd;
  padding: 10px;
  margin: 10px;
  width: 200px;
}
</style>
