<template>
  <div class="cart">
    <h2>Your Cart</h2>
    <div v-for="item in cartItems" :key="item.id" class="cart-item">
      <p>Product: {{ item.product_name }}</p>
      <p>Price: ${{ item.price }}</p>
      <p>
        Quantity: 
        <input type="number" v-model.number="item.quantity" min="1" :max="item.stock_quantity" @change="updateItem(item)" />
      </p>
      <button @click="removeItem(item)">Remove</button>
    </div>
    <button @click="goToCheckout">Proceed to Checkout</button>
  </div>
</template>

<script>
export default {
  name: 'Cart',
  data() {
    return {
      cartItems: []
    };
  },
  created() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/cart', true);
    xhr.onreadystatechange = () => {
      if (xhr.readyState === 4 && xhr.status === 200) {
        this.cartItems = JSON.parse(xhr.responseText);
      }
    };
    xhr.send();
  },
  methods: {
    updateItem(item) {
      const data = {
        id: item.id,
        quantity: item.quantity
      };
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '/cart/update', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
          alert('Cart updated');
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
    },
    removeItem(item) {
      const data = { id: item.id };
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '/cart/remove', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
          alert('Item removed');
          this.created(); // 重新載入購物車資料
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
    },
    goToCheckout() {
      this.$router.push('/checkout');
    }
  }
};
</script>

<style scoped>
.cart-item {
  border: 1px solid #ddd;
  padding: 10px;
  margin: 10px 0;
}
</style>
