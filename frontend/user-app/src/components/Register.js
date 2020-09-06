import React, { Component } from 'react';
import { withRouter }
  from "react-router-dom";
import '../css/Auth.css';
class Register extends Component {
  constructor() {
    super();
    this.onRegisterSubmit = this.onRegisterSubmit.bind(this);
  }
  onRegisterSubmit(event) {
    event.preventDefault();

    let name = event.target['name'].value;
    let email = event.target['email'].value;
    let password = event.target['password'].value;
    let phone = event.target['phone'].value;
    let address = event.target['address'].value;
    let user = {
      name: name,
      email: email,
      password: password,
      phone: phone,
      address: address
    }

    let userRegister = JSON.stringify(user);

    console.log(userRegister);

    fetch("http://127.0.0.1:8000/api/register", {
      method: "post",
      headers: {
        "Content-Type": "application/json"
      },
      body: userRegister
    })
      .then((response) => {
        console.log(response);
        if (response.status == 200){
          alert("Sucessful,pls login");
          this.props.history.push('/login');
        }    
        if (response.status == 400) {
          alert("Failed, the email already@@");
          this.props.history.push('/register');
        }

      });
  }
  render() {
    return (
      <div>
        <br/><br/><br/>
        <form className="form_resgister" onSubmit={this.onRegisterSubmit}>
		<h2>Register Form</h2>
		<div className="inputs">
			<label>Email</label>
			<input type="email" name="email" placeholder="Email"/>
      <label>Address</label>
			<input type="text" name="address" placeholder="Address"/>
			<label>Name</label>
			<input type="text" name="name" placeholder="Username"/>
            <label>Phone Number</label>
			<input type="number" name="phone" placeholder="Phone Number"/>
			<label>Password</label>
			<input type="password" name="password" placeholder="Password"/>
		</div>
		<button id="button_register">REGISTER</button>
	</form>
        <br/><br/><br/> 
      </div>
    );
  }
}
export default withRouter(Register);