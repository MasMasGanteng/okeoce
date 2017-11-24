@extends('layouts.master')
@section('content')
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Bitter:400,400italic,700);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Bitter";
}

@-webkit-keyframes openUp {
  0% {
    -webkit-transform: translate(-50%, -50%) scale(0.5);
            transform: translate(-50%, -50%) scale(0.5);
  }
  100% {
    -webkit-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1);
  }
}

@keyframes openUp {
  0% {
    -webkit-transform: translate(-50%, -50%) scale(0.5);
            transform: translate(-50%, -50%) scale(0.5);
  }
  100% {
    -webkit-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1);
  }
}
button {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  padding: 0.5em;
  margin: 0.5em 0;
  background: white;
  border: 1px solid black;
  -webkit-transition: all 0.1s;
  transition: all 0.1s;
  font-size: 14px;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
button .fa {
  font-size: 1em !important;
  vertical-align: middle;
}
button:hover {
  color: white;
  background: black;
}

input {
  display: inline-block;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  padding: 0.5em;
  margin: 0.5em 0.5em 0.5em 0;
  width: 50px;
  background: white;
  border: 1px solid black;
  -webkit-transition: all 0.1s;
  transition: all 0.1s;
  font-size: 14px;
}

label {
  font-size: 0.75em;
  margin-right: 0.5em;
}

.checkout-area table {
  margin: 0 auto;
  padding: 0.5em;
  width: 100%;
  max-width: 40em;
  text-align: left;
}
.checkout-area table th, .checkout-area table td {
  padding: 0 0.25em;
}
@media (max-width: 600px) {
  .checkout-area table th:nth-child(3), .checkout-area table td:nth-child(3) {
    display: none;
  }
}

.align-left {
  text-align: left;
}

.align-center {
  text-align: center;
}

.align-right {
  text-align: right;
}

.vert-bottom {
  vertical-align: bottom;
}

.vert-middle {
  vertical-align: middle;
}

.main-wrapper .header {
  position: relative;
  background: -webkit-linear-gradient(right, #16222A, #3A6073);
  background: linear-gradient(to left, #16222A, #3A6073);
  background-size: cover;
  height: 25em;
  width: 100vw;
  box-shadow: inset -1px -3px 5px rgba(0, 0, 0, 0.5), inset 1px 3px 5px rgba(0, 0, 0, 0.5);
}
.main-wrapper .header h1 {
  position: absolute;
  text-align: center;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  color: white;
  font-size: 3em;
  text-shadow: 1px 3px 5px rgba(0, 0, 0, 0.5), -1px -3px 5px rgba(0, 0, 0, 0.5);
}
.main-wrapper #vue {
  margin: 0 auto;
  padding: 0.5em;
  text-align: center;
}
.main-wrapper #vue .cart {
  position: fixed;
  right: 0em;
  top: 0em;
  text-align: right;
  background: rgba(0, 0, 0, 0.85);
  color: white;
  z-index: 1;
}
.main-wrapper #vue .cart .fa-shopping-cart, .main-wrapper #vue .cart .cart-size {
  cursor: pointer;
  font-size: 1.25em;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.main-wrapper #vue .cart .fa-shopping-cart {
  padding: 1em 1em 1em 0;
}
.main-wrapper #vue .cart .cart-size {
  padding: 1em 0 1em 1em;
}
.main-wrapper #vue .cart .cart-items {
  padding: 0 1em 2em 1em;
}
.main-wrapper #vue .cart .cart-items .cartTable {
  width: 20em;
}
.main-wrapper #vue .cart .cart-items .cartImage {
  width: 4em;
  height: 4em;
  margin: 0.5em auto;
  position: relative;
  cursor: pointer;
}
.main-wrapper #vue .cart .cart-items .cartImage:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.25);
  -webkit-transition: all 0.1s;
  transition: all 0.1s;
}
.main-wrapper #vue .cart .cart-items .cartImage i {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  font-size: 1.5em;
  z-index: 1;
  -webkit-transition: all 0.25s;
  transition: all 0.25s;
}
.main-wrapper #vue .cart .cart-items .cartImage:hover i {
  text-shadow: 1px 2px 5px black;
}
.main-wrapper #vue .cart .cart-items .cartImage:hover:after {
  background: rgba(0, 0, 0, 0.5);
}
.main-wrapper #vue .cart .cart-items .cartImage:active i {
  text-shadow: 0px 0px 1px black;
}
.main-wrapper #vue .cart .cart-items .cartSubTotal {
  border-top: 1px solid white;
  font-size: 1.25em;
}
.main-wrapper #vue .cart .cart-items .clearCart {
  float: left;
  margin-top: 2em;
  margin-bottom: 1.25em;
}
.main-wrapper #vue .cart .cart-items .checkoutCart {
  float: right;
  margin-top: 2em;
  margin-bottom: 1.25em;
}
.main-wrapper #vue .products {
  margin: 0 auto;
  width: 100%;
  max-width: 80em;
}
.main-wrapper #vue .products .product {
  display: inline-block;
  margin: 0.75em;
  width: 100%;
  max-width: 18em;
}
.main-wrapper #vue .products .product .image {
  width: 18em;
  height: 18em;
  margin-bottom: 0.5em;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  -webkit-transition: box-shadow 0.25s;
  transition: box-shadow 0.25s;
}
@media (max-width: 600px) {
  .main-wrapper #vue .products .product .image {
    width: 100vw;
    height: 100vw;
  }
}
.main-wrapper #vue .products .product .image:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  opacity: 0;
  -webkit-transition: all 0.25s;
  transition: all 0.25s;
}
.main-wrapper #vue .products .product .image:after {
  content: "\f00e";
  font-family: "FontAwesome";
  position: absolute;
  top: 250%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  font-size: 5em;
  color: white;
  pointer-events: none;
  text-shadow: 0 0 5px rgba(0, 0, 0, 0.5), 0 0 10px rgba(0, 0, 0, 0.5);
  -webkit-transition: all 0.25s;
  transition: all 0.25s;
}
.main-wrapper #vue .products .product .image:hover {
  box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}
.main-wrapper #vue .products .product .image:hover:before {
  opacity: 1;
}
.main-wrapper #vue .products .product .image:hover:after {
  top: 50%;
}
.main-wrapper #vue .products .product .name {
  font-weight: bold;
  font-size: 1.25em;
}
.main-wrapper #vue .products .product .description {
  font-style: italic;
}
.main-wrapper #vue .products .product .price {
  font-weight: bold;
}
.main-wrapper #vue .modalWrapper {
  position: relative;
}
.main-wrapper #vue .modalWrapper .overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  z-index: 2;
}
.main-wrapper #vue .modalWrapper .prevProduct, .main-wrapper #vue .modalWrapper .nextProduct {
  position: fixed;
  color: white;
  font-size: 2em;
  cursor: pointer;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  padding: 1em;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  z-index: 5;
}
.main-wrapper #vue .modalWrapper .prevProduct {
  left: calc(50% - 9.5em);
}
.main-wrapper #vue .modalWrapper .nextProduct {
  right: calc(50% - 9.5em);
}
.main-wrapper #vue .modalWrapper .modal {
  position: fixed;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  background: white;
  padding: 2em;
  text-align: center;
  max-height: calc(100% - 2em);
  overflow-y: scroll;
  overflow-x: hidden;
  -webkit-animation: openUp 0.1s;
          animation: openUp 0.1s;
  z-index: 3;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
}
.main-wrapper #vue .modalWrapper .modal .close {
  position: fixed;
  top: -0.5em;
  right: -0.5em;
  cursor: pointer;
  padding: 1em;
}
.main-wrapper #vue .modalWrapper .modal .imageWrapper {
  width: 25em;
  height: 25em;
  margin: 0.5em auto;
  overflow: hidden;
}
.main-wrapper #vue .modalWrapper .modal .imageWrapper .image {
  width: 100%;
  height: 100%;
  -webkit-transition: -webkit-transform 0.2s;
  transition: -webkit-transform 0.2s;
  transition: transform 0.2s;
  transition: transform 0.2s, -webkit-transform 0.2s;
  z-index: 4;
  cursor: crosshair;
}
.main-wrapper #vue .modalWrapper .modal .additionalImages {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  margin: 0 auto;
  text-align: center;
}
.main-wrapper #vue .modalWrapper .modal .additionalImages .additionalImage {
  -webkit-box-flex: 1;
      -ms-flex-positive: 1;
          flex-grow: 1;
  margin: 0.5em 1em;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  width: 25%;
  height: auto;
  position: relative;
}
.main-wrapper #vue .modalWrapper .modal .additionalImages .additionalImage:before {
  display: block;
  content: "";
  width: 100%;
  padding-top: 75%;
}
.main-wrapper #vue .modalWrapper .modal .additionalImages .additionalImage > .content {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
.main-wrapper #vue .modalWrapper .modal .additionalImages .additionalImage:nth-of-type(1n) {
  margin-left: 0;
}
.main-wrapper #vue .modalWrapper .modal .additionalImages .additionalImage:nth-of-type(4n) {
  margin-right: 0;
}
.main-wrapper #vue .modalWrapper .modal .name {
  font-weight: bold;
  font-size: 1.25em;
}
.main-wrapper #vue .modalWrapper .modal .description {
  font-style: italic;
}
.main-wrapper #vue .modalWrapper .modal .details {
  max-width: 25em;
  margin: 0 auto;
  padding: 0.5em 0;
}
.main-wrapper #vue .modalWrapper .modal .price {
  font-weight: bold;
  padding-bottom: 0.5em;
}
@media (max-width: 600px) {
  .main-wrapper #vue .cart, .main-wrapper #vue .cart .cartTable {
    width: 100% !important;
  }
  .main-wrapper #vue .products {
    text-align: left;
  }
  .main-wrapper #vue .products .product {
    display: block;
  }
  .main-wrapper #vue .products .product .image {
    width: calc(100vw - 2.5em);
    height: calc(100vw - 2.5em);
  }
  .main-wrapper #vue .modalWrapper .prevProduct, .main-wrapper #vue .modalWrapper .nextProduct {
    display: none;
  }
  .main-wrapper #vue .modalWrapper .modal.checkout {
    width: 100%;
  }
  .main-wrapper #vue .modalWrapper .modal .imageWrapper {
    width: calc(100vw - 4em);
    height: calc(100vw - 4em);
  }
}


</style>
<div class="main-wrapper">
  <div class="header"><h1>Vue Shopping Cart</h1></div>
  <div id="vue">
    <cart :cart="cart" :cart-sub-total="cartSubTotal" :tax="tax" :cart-total="cartTotal" :checkout-bool="checkoutBool"></cart>
    <products :cart="cart" :cart-sub-total="cartSubTotal" :tax="tax" :cart-total="cartTotal" :products-data="productsData"></products>
    <checkout-area v-if="checkoutBool" :cart="cart" :tax="tax" :cart-sub-total="cartSubTotal" :cart-total="cartTotal" :products-data="productsData" :total-with-tax="totalWithTax"></checkout-area>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.11/vue.js"></script>
<script type="text/javascript">
	//@TODO NOTIFICATIONS

//---------
// Vue components
//---------
Vue.component('products', {
  
  ready: function () {
    var self = this;
    document.addEventListener("keydown", function(e) {
      if (self.showModal && e.keyCode == 37) {
        self.changeProductInModal("prev");
      } else if (self.showModal && e.keyCode == 39) {
        self.changeProductInModal("next");
      } else if (self.showModal && e.keyCode == 27) {
        self.hideModal();
      }
    });
  },

  template: "<h1>Products</h1>" + 
  "<div class='products'>" +
  "<div v-for='product in productsData' track-by='$index' class='product {{ product.product | lowercase }}'>" + 
  "<div class='image' @click='viewProduct(product)' v-bind:style='{ backgroundImage: \"url(\" + product.image + \")\" }' style='background-size: cover; background-position: center;'></div>" +
  "<div class='name'>{{ product.product }}</div>" +
  "<div class='description'>{{ product.description }}</div>" +
  "<div class='price'>{{ product.price | currency }}</div>" +
  "<button @click='addToCart(product)'>Add to Cart</button><br><br></div>" +
  "</div>" +
  "<div class='modalWrapper' v-show='showModal'>" +
  "<div class='prevProduct' @click='changeProductInModal(\"prev\")'><i class='fa fa-angle-left'></i></div>" +
  "<div class='nextProduct' @click='changeProductInModal(\"next\")'><i class='fa fa-angle-right'></i></div>" +
  "<div class='overlay' @click='hideModal()'></div>" + 
  "<div class='modal'>" + 
  "<i class='close fa fa-times' @click='hideModal()'></i>" + 
  "<div class='imageWrapper'><div class='image' v-bind:style='{ backgroundImage: \"url(\" + modalData.image + \")\" }' style='background-size: cover; background-position: center;' v-on:mouseover='imageMouseOver($event)' v-on:mousemove='imageMouseMove($event)' v-on:mouseout='imageMouseOut($event)'></div></div>" +
  "<div class='additionalImages' v-if='modalData.images'>" + 
  "<div v-for='image in modalData.images' class='additionalImage' v-bind:style='{ backgroundImage: \"url(\" + image.image + \")\" }' style='background-size: cover; background-position: center;' @click='changeImage(image.image)'></div>" +
  "</div>" +
  "<div class='name'>{{ modalData.product }}</div>" +
  "<div class='description'>{{ modalData.description }}</div>" +
  "<div class='details'>{{ modalData.details }}</div>" +
  "<h3 class='price'>{{ modalData.price | currency }}</h3>" +
  "<label for='modalAmount'>QTY</label>" +
  "<input id='modalAmount' value='{{ modalAmount }}' v-model='modalAmount' class='amount' @keyup.enter='modalAddToCart(modalData), hideModal()'/>" +
  "<button @click='modalAddToCart(modalData), hideModal()'>Add to Cart</button>" +
  "</div></div>",

  props: ['productsData', 'cart', 'tax', 'cartSubTotal', 'cartTotal'],

  data: function() {
    return {
      showModal: false,
      modalData: {},
      modalAmount: 1,
      timeout: "",
      mousestop: ""
    }
  },

  methods: {
    addToCart: function(product) {
      var found = false;

      for (var i = 0; i < vue.cart.length; i++) {

        if (vue.cart[i].sku === product.sku) {
          var newProduct = vue.cart[i];
          newProduct.quantity = newProduct.quantity + 1;
          vue.cart.$set(i, newProduct);
          //console.log("DUPLICATE",  vue.cart[i].product + "'s quantity is now: " + vue.cart[i].quantity);
          found = true;
          break;
        }
      }

      if(!found) {
        product.quantity = 1;
        vue.cart.push(product);
      }

      vue.cartSubTotal = vue.cartSubTotal + product.price;
      vue.cartTotal = vue.cartSubTotal + (vue.tax * vue.cartSubTotal);
      vue.checkoutBool = true;
    },

    modalAddToCart: function(modalData) {
      var self = this;

      for(var i = 0; i < self.modalAmount; i++) {
        self.addToCart(modalData);
      }

      self.modalAmount = 1;
    },

    viewProduct: function(product) {      
      var self = this;
      //self.modalData = product;
      self.modalData = (JSON.parse(JSON.stringify(product)));
      self.showModal = true;
    },

    changeProductInModal: function(direction) {
      var self = this,
          productsLength = vue.productsData.length,
          currentProduct = self.modalData.sku,
          newProductId,
          newProduct;

      if(direction === "next") {
        newProductId = currentProduct + 1;

        if(currentProduct >= productsLength) {
          newProductId = 1;
        }

      } else if(direction === "prev") {
        newProductId = currentProduct - 1;

        if(newProductId === 0) {
          newProductId = productsLength;
        }
      }

      //console.log(direction, newProductId);

      for (var i = 0; i < productsLength; i++) {
        if (vue.productsData[i].sku === newProductId) {
          self.viewProduct(vue.productsData[i]);
        }
      }
    },

    hideModal: function() {
      //hide modal and empty modal data
      var self = this;
      self.modalData = {};
      self.showModal = false;
    },

    changeImage: function(image) {
      var self = this;
      self.modalData.image = image;
    },

    imageMouseOver: function(event) {
      event.target.style.transform = "scale(2)";
    },

    imageMouseMove: function(event) {
      var self = this;
      
      event.target.style.transform = "scale(2)";
      
      self.timeout = setTimeout(function() {
        event.target.style.transformOrigin = ((event.pageX - event.target.getBoundingClientRect().left) / event.target.getBoundingClientRect().width) * 100 + '% ' + ((event.pageY - event.target.getBoundingClientRect().top - window.pageYOffset) / event.target.getBoundingClientRect().height) * 100 + "%";
      }, 50);
      
      self.mouseStop = setTimeout(function() {
        event.target.style.transformOrigin = ((event.pageX - event.target.getBoundingClientRect().left) / event.target.getBoundingClientRect().width) * 100 + '% ' + ((event.pageY - event.target.getBoundingClientRect().top - window.pageYOffset) / event.target.getBoundingClientRect().height) * 100 + "%";
      }, 100);
    },

    imageMouseOut: function(event) {
      event.target.style.transform = "scale(1)";
    }
  }
});

Vue.component('cart', {
  template: '<div class="cart">' + 
  '<span class="cart-size" @click="showCart = !showCart"> {{ cart | cartSize }} </span><i class="fa fa-shopping-cart" @click="showCart = !showCart"></i>' +
  '<div class="cart-items" v-show="showCart">' +
  '<table class="cartTable">' +
  '<tbody>' +
  '<tr class="product" v-for="product in cart">' +
  '<td class="align-left"><div class="cartImage" @click="removeProduct(product)" v-bind:style="{ backgroundImage: \'url(\' + product.image + \')\' }" style="background-size: cover; background-position: center;"><i class="close fa fa-times"></i></div></td>' +
  '<td class="align-center"><button @click="quantityChange(product, \'decriment\')"><i class="close fa fa-minus"></i></button></td>' +
  '<td class="align-center">{{ cart[$index].quantity }}</td>' +
  '<td class="align-center"><button @click="quantityChange(product, \'incriment\')"><i class="close fa fa-plus"></i></button></td>' +
  '<td class="align-center">{{ cart[$index] | customPluralize }}</td>' +
  '<td>{{ product.price | currency }}</td>' +
  '</tbody>' +
  '<table>' +
  '</div>' +
  '<h4 class="cartSubTotal" v-show="showCart"> {{ cartSubTotal | currency }} </h4></div>' +
  '<button class="clearCart" v-show="checkoutBool" @click="clearCart()"> Clear Cart </button>' +
  '<button class="checkoutCart" v-show="checkoutBool" @click="propagateCheckout()"> Checkout </button>',

  props: ['checkoutBool', 'cart', 'cartSize', 'cartSubTotal', 'tax', 'cartTotal'],

  data: function() {
    return {
      showCart: false
    }
  },

  filters: {
    customPluralize: function(cart) {      
      var newName;

      if(cart.quantity > 1) {
        if(cart.product === "Peach") {
          newName = cart.product + "es";
        } else if(cart.product === "Puppy") {
          newName = cart.product + "ies";
          newName = newName.replace("y", "");
        } else {
          newName = cart.product + "s";
        }

        return newName;
      }

      return cart.product;
    },

    cartSize: function(cart) {
      var cartSize = 0;

      for (var i = 0; i < cart.length; i++) {
        cartSize += cart[i].quantity;
      }

      return cartSize;
    }
  },

  methods: {
    removeProduct: function(product) {
      vue.cart.$remove(product);
      vue.cartSubTotal = vue.cartSubTotal - (product.price * product.quantity);
      vue.cartTotal = vue.cartSubTotal + (vue.tax * vue.cartSubTotal);

      if(vue.cart.length <= 0) {
        vue.checkoutBool = false;
      }
    },

    clearCart: function() {
      vue.cart = [];
      vue.cartSubTotal = 0;
      vue.cartTotal = 0;
      vue.checkoutBool = false;
      this.showCart = false;
    },

    quantityChange: function(product, direction) {
      var qtyChange;

      for (var i = 0; i < vue.cart.length; i++) {
        if (vue.cart[i].sku === product.sku) {

          var newProduct = vue.cart[i];

          if(direction === "incriment") {
            newProduct.quantity = newProduct.quantity + 1;
            vue.cart.$set(i, newProduct);

          } else {
            newProduct.quantity = newProduct.quantity - 1;

            if(newProduct.quantity == 0) {
              vue.cart.$remove(newProduct);

            } else {
              vue.cart.$set(i, newProduct);
            }
          }
        }
      }

      if(direction === "incriment") {
        vue.cartSubTotal = vue.cartSubTotal + product.price;

      } else {
        vue.cartSubTotal = vue.cartSubTotal - product.price;
      }

      vue.cartTotal = vue.cartSubTotal + (vue.tax * vue.cartSubTotal);

      if(vue.cart.length <= 0) {
        vue.checkoutBool = false;
      }
    },
    //send our request up the chain, to our parent
    //our parent catches the event, and sends the request back down
    propagateCheckout: function() {
      vue.$dispatch("checkoutRequest");
    }
  }
});

Vue.component('checkout-area', {
  template: "<h1>Checkout Area</h1>" + 
  '<div class="checkout-area">' + 
  '<span> {{ cart | cartSize }} </span><i class="fa fa-shopping-cart"></i>' +
  '<table>' +
  '<thead>' +
  '<tr>' +
  '<th class="align-center">SKU</th>' +
  '<th>Name</th>' +
  '<th>Description</th>' +
  '<th class="align-right">Amount</th>' +
  '<th class="align-right">Price</th>' +
  '</tr>' +
  '</thead>' +
  '<tbody>' +
  '<tr v-for="product in cart" track-by="$index">' +
  '<td class="align-center">{{ product.sku }}</td>' +
  '<td>{{ product.product }}</td>' +
  '<td>{{ product.description }}</td>' +
  '<td class="align-right">{{ cart[$index].quantity }}</td>' +
  '<td class="align-right">{{ product.price | currency }}</td>' +
  '</tr>' +
  //'<button @click="removeProduct(product)"> X </button></div>' +
  '<tr>' +
  '<td>&nbsp;</td>' +
  '<td>&nbsp;</td>' +
  '<td>&nbsp;</td>' +
  '<td>&nbsp;</td>' +
  '<td>&nbsp;</td>' +
  '</tr>' +
  '<tr>' +
  '<td></td>' +
  '<td></td>' +
  '<td></td>' +
  '<td class="align-right">Subtotal:</td>' +
  '<td class="align-right"><h4 v-if="cartSubTotal != 0"> {{ cartSubTotal | currency }} </h4></td>' +
  '</tr>' +
  '<tr>' +
  '<td></td>' +
  '<td></td>' +
  '<td></td>' +
  '<td class="align-right">Tax:</td>' +
  '<td class="align-right"><h4 v-if="cartSubTotal != 0"> {{ cartTotal - cartSubTotal | currency }} </h4></td>' +
  '</tr>' +
  '<tr>' +
  '<td></td>' +
  '<td></td>' +
  '<td></td>' +
  '<td class="align-right vert-bottom">Total:</td>' +
  '<td class="align-right vert-bottom"><h2 v-if="cartSubTotal != 0"> {{ cartTotal | currency }} </h2></td>' +
  '</tr>' +
  '</tbody>' +
  '</table>' +
  '<button v-show="cartSubTotal" @click="checkoutModal()">Checkout</button></div>' + 
  "<div class='modalWrapper' v-show='showModal'>" +
  "<div class='overlay' @click='hideModal()'></div>" + 
  "<div class='modal checkout'>" + 
  "<i class='close fa fa-times' @click='hideModal()'></i>" + 
  "<h1>Checkout</h1>" +
  "<div>We accept: <i class='fa fa-stripe'></i> <i class='fa fa-cc-visa'></i> <i class='fa fa-cc-mastercard'></i> <i class='fa fa-cc-amex'></i> <i class='fa fa-cc-discover'></i></div><br>" +
  "<h3> Subtotal: {{ cartSubTotal | currency }} </h3>" +
  "<h3> Tax: {{ cartTotal - cartSubTotal | currency }} </h4>" +
  "<h1> Total: {{ cartTotal | currency }} </h3>" +
  "<br><div>This is where our payment processor goes</div>" +
  "</div>",

  props: ['cart', 'cartSize', 'cartSubTotal', 'tax', 'cartTotal'],

  data: function() {
    return {
      showModal: false
    }
  },

  filters: {
    customPluralize: function(cart) {      
      var newName;

      if(cart.quantity > 1) {
        newName = cart.product + "s";
        return newName;
      }

      return cart.product;
    },

    cartSize: function(cart) {
      var cartSize = 0;

      for (var i = 0; i < cart.length; i++) {
        cartSize += cart[i].quantity;
      }

      return cartSize;
    }
  },

  methods: {
    removeProduct: function(product) {
      vue.cart.$remove(product);
      vue.cartSubTotal = vue.cartSubTotal - (product.price * product.quantity);
      vue.cartTotal = vue.cartSubTotal + (vue.tax * vue.cartSubTotal);

      if(vue.cart.length <= 0) {
        vue.checkoutBool = false;
      }
    },

    checkoutModal: function() {
      var self = this;
      self.showModal = true;

      console.log("CHECKOUT", self.cartTotal);

    },

    hideModal: function() {
      //hide modal and empty modal data
      var self = this;
      self.showModal = false;
    }
  },
  
  //intercept the checkout request broadcast
  //run our function
  events: {
    "checkoutRequest": function() {
      var self = this;
      self.checkoutModal();
    }
  }
});

//---------
// Vue init
//---------
Vue.config.debug = false;
var vue = new Vue({
  el: "#vue",

  data: {
    productsData: [
      {
        sku: 1,
        product: "Monkey",
        image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/chimpanzee.jpg",
        images: [
          { image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/chimpanzee.jpg" },
          { image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/gorilla.jpg" },
          { image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/red-monkey.jpg" },
          { image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/mandrill-monkey.jpg" }
        ],
        description: "This is a monkey",
        details: "This is where some detailes on monkies would go. This monkey done seent some shit.",
        price: 5.50
      },

      {
        sku: 2,
        product: "Kitten",
        image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/kittens.jpg",
        description: "This is a kitten",
        details: "This is where some detailes on kittens would go. Shout out kittens for being adorable.",
        price: 10
      },

      {
        sku: 3,
        product: "Shark",
        image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/shark.jpg",
        description: "This is a shark",
        details: "This is where some detailes on sharks would go. Damn nature, you scary.",
        price: 15
      },

      {
        sku: 4,
        product: "Puppy",
        image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/dog.jpg",
        description: "This is a puppy",
        details: "This is where some detailes on puppies would go. Shout out puppies for being adorable.",
        price: 5
      },

      {
        sku: 5,
        product: "Apple",
        image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/apple.jpg",
        description: "This is an apple",
        details: "This is where some detailes on apples would go. Shout out apples for being delicious.",
        price: 1
      },

      {
        sku: 6,
        product: "Orange",
        image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/orange.jpg",
        description: "This is an orange",
        details: "This is where some detailes on oranges would go. Shout out oranges for being delicious.",
        price: 1.1
      },

      {
        sku: 7,
        product: "Peach",
        image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/peach.jpg",
        description: "This is a peach",
        details: "This is where some detailes on peaches would go. Shout out peaches for being delicious.",
        price: 1.5
      },

      {
        sku: 8,
        product: "Mango",
        image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/mango.png",
        description: "This is a mango",
        details: "This is where some detailes on mangos would go. Shout out mangos for being delicious.",
        price: 2
      },

      {
        sku: 9,
        product: "Cognac",
        image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/cognac.jpg",
        description: "This is a glass of cognac",
        details: "This is where some detailes on cognac would go. I'm like hey whats up, hello.",
        price: 17.38
      },

      {
        sku: 10,
        product: "Chain",
        image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/241793/chain.jpg",
        description: "This is a chain",
        details: "This is where some details on chains would go. 2Chainz but I got me a few on.",
        price: 17.38
      }
    ],
    checkoutBool: false,
    cart: [],
    cartSubTotal: 0,
    tax: 0.065,
    cartTotal: 0
  },
  
  //intercept the checkout request dispatch
  //send it back down the chain
  events: {
    "checkoutRequest": function() {
      vue.$broadcast("checkoutRequest");
    }
  }
});

</script>
@stop