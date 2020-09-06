import React, { Component } from 'react';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";
import Home from './Home';
import About from './About';
import Login from './Login';
import Register from './Register';
import Profile from './Profile';
import ChangePass from './ChangePass';
import Books from './Books';
import Post from './Post';
import Cart from './Cart';
import Order from './Order';
import Message from './Message';
import '../css/Header.css';
import logo from '../img/logo.jpg';
let check;

class Header extends Component {
  constructor() {
    super();
    let iduser = localStorage.getItem("iduser");
    if (iduser) {
      check = true;
    }
    else {
      check = false;
    }
    this.onLogout = this.onLogout.bind(this);
  }
  onLogout(event) {
  event.preventDefault();
    fetch("http://127.0.0.1:8000/api/logout", {
      headers: {
        "Content-Type": "application/json"
      },
    })
      .then(response => {
        response.json().then(() => {
          if (response.status == 200) {
            localStorage.removeItem("iduser");
            alert("Sucessfully.");
          }
          else {
            alert("Failed.");
          }
        });
      });
  }
  render() {
    return (
      <Router>
        <div className="topnav">
          <img src={logo} width={40} />
          <Link to="/home">Home</Link>
          <Link to="/about">About</Link>
          <Link to="/books">Books</Link>
          {check ? <form  className="logout" onSubmit={this.onLogout}>
            <button>Logout</button>
              <Link to="/cart">Cart</Link>
          </form> : <Link to="/login">Login</Link>}
          <Link to="/register">Register</Link>
          {check ?<Link to="/profile">Profile</Link>: <Link to="/home"></Link>}
          {check ?<Link to="/orders">Your order</Link>: <Link to="/home"></Link>}
          {check ?<Link to="/chat">Your message</Link>: <Link to="/home"></Link>}
        </div>
        <Switch>
          <Route path="/home">
            <Home />
          </Route>
          <Route path="/about">
            <About />
          </Route>
          <Route path="/login" exact>
            <Login />
          </Route>
          <Route path="/register" exact>
            <Register />
          </Route>
          <Route path="/profile" exact>
            <Profile />
          </Route>
          <Route path="/change_pass" exact>
            <ChangePass />
          </Route>
          <Route path="/orders" exact>
            <Order />
          </Route>
          <Route path="/chat" exact>
            <Message />
          </Route>
          {/* exact de co the vo ddc trang post */}
          <Route path="/books" exact>
            <Books />
          </Route>
          <Route path={"/books/:id"} exact>
            <Post />
          </Route>
          <Route path="/cart" exact>
            <Cart />
          </Route>
        </Switch>
      </Router>
    )
  }
}
export default Header;