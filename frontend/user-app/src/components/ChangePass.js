import React, { Component } from 'react';
import '../css/Auth.css';
import { withRouter }
    from "react-router-dom";
class ChangePass extends Component {
    constructor() {
        super();
        this.onChange = this.onChange.bind(this);
    }
    onChange(event) {
        event.preventDefault();
        let email = event.target['email'].value;
        let password = event.target['password'].value;
        let newpass = event.target['newpass'].value;
        let repass = event.target['repass'].value;

        let user = {
            email: email,
            password: password,
            newpass: newpass,
            repass: repass,
        }
        let userLogin = JSON.stringify(user);
        let id = localStorage.getItem("iduser");
        fetch("http://127.0.0.1:8000/api/change/", {
            method: "PATCH",
            headers: {
                "Content-Type": "application/json",
                'Authorization': id,
            },
            body: userLogin
        })
            .then(response => {
                response.json().then((data) => {
                    console.log(data);
                    if(response.status==200){
                        alert("sucessfully.");
                        this.props.history.push('/home');
                    }
                    if(response.status==400){
                        alert("failed.");
                    }
                });
            });

    }
    render() {
        return (
            <div >
                <br /><br /><br />
                <div className="login">
                    <form class="form_login" onSubmit={this.onChange} method="PATCH" role="form">
                        <h2>Login Form</h2>
                        <div class="inputs">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" />
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" />
                            <label>New password</label>
                            <input type="password" name="newpass" placeholder="Password" />
                            <label>New password</label>
                            <input type="password" name="repass" placeholder="New password" />
                        </div>
                        <button id="button_register" type="submit">Change</button>
                    </form>
                </div>
                <br /><br /><br />
            </div>
        );
    }
}
export default withRouter(ChangePass);
