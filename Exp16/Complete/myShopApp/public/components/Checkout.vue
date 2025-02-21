<template>
  <div class="checkout">
    <h2>Checkout</h2>
    <div v-for="item in cartItems" :key="item.id" class="checkout-item">
      <p>Product: {{ item.product_name }}</p>
      <p>Price: ${{ item.price }}</p>
      <p>Quantity: {{ item.quantity }}</p>
    </div>
    <p><strong>Total: ${{ total }}</strong></p>
    <button @click="pay">Pay Now</button>
    <div v-if="paymentResult">
      <p v-html='paymentResult'></p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Checkout',
  data() {
    return {
      cartItems: [],
      paymentResult: ''
    };
  },
  computed: {
    total() {
      return this.cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    }
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
    pay() {
      const data = { total: this.total };
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '/checkout', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var data = JSON.parse(xhr.responseText);
          this.paymentResult = `<form action="${data.PayGateWay}" method="POST"><input type="text" name="MerchantID" value="${data.MerchantID}" /><input type="text" name="TradeSha" value="${data.TradeSha}" /><input type="text" name="TradeInfo" value="${data.TradeInfo}" /><input type="text" name="TimeStamp" value="${data.TimeStamp}" /><input type="text" name="Version" value="${data.Version}" /><input type="text" name="NotifyUrl" value="${data.NotifyUrl}" /><input type="text" name="ReturnUrl" value="${data.ReturnUrl}" /><input type="text" name="MerchantOrderNo" value="${data.MerchantOrderNo}" /><input type="text" name="Amt" value="${data.Amt}" /><input type="text" name="ItemDesc" value="${data.ItemDesc}" /><button type="submit">送出</button></form>`;
        }
      };
      let encodedData = 'total=' + encodeURIComponent(this.total);
      xhr.send(encodedData);
    }
  }
};
</script>

<style scoped>
.checkout-item {
  border: 1px solid #ddd;
  padding: 10px;
  margin: 10px 0;
}
</style>
