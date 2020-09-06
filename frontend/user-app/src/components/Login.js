import React, { Component } from 'react';
import '../css/Auth.css';
import { withRouter }
  from "react-router-dom";
class Login extends Component {
    constructor() {
        super();
        this.onLogin = this.onLogin.bind(this);
      }
    onLogin(event){
        event.preventDefault();
        let email = event.target['email'].value;
        let password = event.target['password'].value;

        let user = {
            email: email,
            password: password,
        }

        let userLogin = JSON.stringify(user);
        console.log(userLogin);
        fetch("http://127.0.0.1:8000/api/login/", {
            method: "post",
            headers: {
                "Content-Type":"application/json"
            },
            body: userLogin
        })
        .then(response => {
            response.json().then((data) => {
                console.log(data);
                if(response.status==200){
                    alert("Login sucessfully.");
                    localStorage.setItem("iduser",data.idToken);
                    this.props.history.push('/home');
                }
                else{
                    alert("Login failed.");
                }
            });
        });
        
    }
    render() {
        return (
            <div >
                 <br/><br/><br/>
            <div className="login">
            <form class="form_login" onSubmit={this.onLogin} method="POST" role="form">
		<h2>Login Form</h2>
		<div class="inputs">
			<label>Email</label>
			<input type="email" name="email" placeholder="Email"/>
			<label>Password</label>
			<input type="password" name="password" placeholder="Password"/>
		</div>
		<button id="button_register">LOGIN</button>
	</form>
            </div>
            <br/><br/><br/>
            </div>
        );
    }
}
export default withRouter(Login);
