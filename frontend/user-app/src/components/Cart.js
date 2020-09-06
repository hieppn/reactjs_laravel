import React, { Component } from 'react';
import '../css/Cart.css';
import { withRouter } from 'react-router-dom';
import CartItem from './CartItem';
// import CurrencyFormat from 'react-number-format';
let check;
class Cart extends Component {
  constructor() {
    super();
    this.state = {
      cart: [],
      sum: [],
    }
    let id = localStorage.getItem("iduser");
    this.getData(id);
    this.onDeleteItem = this.onDeleteItem.bind(this);
    this.AddItem = this.AddItem.bind(this);
    this.SubtractItem = this.SubtractItem.bind(this);
    this.checkOut = this.checkOut.bind(this);
    this.checkx = this.checkx.bind(this);
  }
  check(a) {
    if (a.length == 0) {
      check = false;
    } else {
      check = true;
    }
    return check;
  }
  getData(id) {
    fetch("http://127.0.0.1:8000/api/cart", {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': id,
      }
    })
      .then(response => {
        response.json().then((data) => {
          this.updateUI(data);
          this.check(data.cart);
          this.getTotal();
        });
      });
  }
  updateUI(data) {
    this.setState({
      cart: data.cart
    })
    // check(this.state.cart);
  }
  SubtractItem(key) {
    return (event) => {
      let id = localStorage.getItem("iduser");
      fetch("http://127.0.0.1:8000/api/cart/subtract/" + key, {
        method: 'PATCH',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': id,
        },
        body: key
      }).then(response => {
        response.json().then((data) => {
          this.getData(id);
        });
      });
    }
  }
  AddItem(key) {
    return (event) => {
      let id = localStorage.getItem("iduser");
      fetch("http://127.0.0.1:8000/api/cart/add/" + key, {
        method: 'PATCH',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': id,
        },
        body: key
      }).then(response => {
        response.json().then((data) => {
          this.getData(id);
          if (response.status == 400) {
            alert("The quantity of this book is not enough!!!");
          }
        });
      });
    }
  }
  onDeleteItem(key) {
    return (event) => {
      let id = localStorage.getItem("iduser");
      fetch("http://127.0.0.1:8000/api/cart/" + key, {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': id,
        }
      }).then(response => {
        response.json().then((data) => {
          this.getData(id);
        });
      });
    }
  }
  getTotal() {
    let id = localStorage.getItem("iduser");
    fetch("http://127.0.0.1:8000/api/cart/sum", {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': id,
      }
    })
      .then(response => {
        response.json().then((data) => {
          this.setState({
            sum: data.data
          })
        });
      });
  }
  checkx(event) {
      event.preventDefault();
      let discount = event.target['discount'].value;
      let diss={
        discount:discount,
      }
      let sale = JSON.stringify(diss);
      fetch("http://127.0.0.1:8000/api/order/check", {
        method: "post",
        headers: {
          "Content-Type": "application/json",
        },
        body: sale,
      })
        .then((response) => {
          console.log(response);
          if (response.status == 200) {
            alert("Congratulations!");
            localStorage.setItem("dis",discount);
          }
          else 
            alert("Failed, pls check again!!");


        });
  }
  checkOut(event) {
    // 
    return (event) => {

      let id = localStorage.getItem("iduser");
      if (!id) {
        alert("pls login");
        this.props.history.push('/login');
      }
      else {
       let discount= localStorage.getItem("dis");
       localStorage.removeItem("dis");
        console.log(discount);
        let diss={
          discount:discount,
        }
        let sale = JSON.stringify(diss);
        console.log(sale);
        fetch("http://127.0.0.1:8000/api/order", {
          method: "post",
          headers: {
            "Content-Type": "application/json",
            'Authorization': id,
          },
          body: sale,
        })
          .then((response) => {
            console.log(response);
            if (response.status == 200) {
              alert("Sucessful");
              this.props.history.push('/orders');
            }
            else 
              alert("Failed, pls check again!!");


          });
      }
    }
  }
  render() {

    return (
      <div className="Cart">
        <br /><br /><br /><br />
        <table border="1">
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
          {this.state.cart.map((item, key) => <CartItem
            key={key}
            item={item}
            onDeleteItem={this.onDeleteItem(item.id)}
            SubtractItem={this.SubtractItem(item.id)}
            AddItem={this.AddItem(item.id)}
          />)
          }
        </table>
       {check? <div className="sum">Sum: {this.state.sum} vnd</div>:<i></i>}
       {check?<form className="discount" onSubmit={this.checkx}>
          <input name="discount" placeholder="enter the discount code..." />
          <button>Check</button>
        </form>:<i></i>}
        {check ? <button type="submit"className="checkout" onClick={this.checkOut()}>Check out</button> : <i></i>}
      </div>
    );
  }
}
export default withRouter(Cart);