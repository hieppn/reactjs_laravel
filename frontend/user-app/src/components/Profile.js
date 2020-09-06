import React, { Component, Profiler } from 'react';
import '../css/Auth.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import {
    Link
} from "react-router-dom";
import '../css/Post.css'
class Profile extends Component {
    constructor(props) {
        super(props);
        this.state = {
            email:'',
            name:'',
            address:'',
            phone:'',
        }
        let id = localStorage.getItem("iduser");
        this.getData(id);
        this.handleChange = this.handleChange.bind(this);
    }
    getData(id) {
        fetch("http://127.0.0.1:8000/api/profile", {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': id,
            }
        })

            .then(response => {
                response.json().then((data) => {
                    this.updateUI(data);
                });
            });
    }

    updateUI(data) {
        this.setState({
            email:data.user.email,
            name:data.user.name,
            address:data.user.address,
            phone:data.user.phone,
        })
    }
    handleChange(event) {
        const name = event.target.name;
        const value = event.target.value;
    
        this.setState({
          [name]: value
        })
      }
    onEditProfile(event) {
           event.preventDefault();
            let id = localStorage.getItem("iduser");
            let phone =  event.target['phone'].value;
            let address = event.target['address'].value;
            let name =  event.target['name'].value;
            let user = {
                phone: phone,
                address: address,
                name: name,
            };
            let userInJson = JSON.stringify(user);
            console.log(userInJson);

            fetch("http://127.0.0.1:8000/api/profile", {
                method: "PATCH",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': id,
                },
                body: userInJson
            })
                .then((response) => {
                    console.log(response);
                    if(response.status==200)
                    {
                        alert("Successful");  
                    }else{
                        alert("Failed");  
                    }
                });
           
    }
    render() {
        return (
            <div>
                <br /><br /><br />
                <form className="form_resgister" onSubmit={this.onEditProfile}>
                    <h2>Profile</h2>
                    <div class="inputs">
                        <label>Email</label>
                        <input name="email" type="email"   value={this.state.email}readOnly/>
                        <label>Name</label>
                        <input name="name" type="text" value={this.state.name}onChange={this.handleChange} />
                        <label>Phone</label>
                        <input name="phone" type="number" value={this.state.phone}onChange={this.handleChange} />
                        <label>Address</label>
                        <input name="address" type="text" value={this.state.address}onChange={this.handleChange} />
                        <label>Money</label>
                        {/* {this.state.profile.money} */}
                        <button type="submit">Edit</button>
                    </div>
                </form>
                <center><Link to={'/change_pass/'}><button className="abc">Change your password</button></Link></center>
                <br /><br /><br />

            </div>
        );
    }
}
export default Profile;