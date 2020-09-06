import React, { Component } from 'react';
import '../css/Message.css';
import send from'../img/send.png';
import { withRouter }
    from "react-router-dom";
    let check;
class Message extends Component {
    constructor() {
        super();
        this.state={
            message:[],
        }
        let iduser = localStorage.getItem("iduser");
        this.getData(iduser);
        this.onChat = this.onChat.bind(this);
    }
    check(id){
        if(id!=1){
           return check=true;
        }else{
           return check=false;
        }
    }
    getData(id){
        fetch("http://127.0.0.1:8000/api/message", {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': id,
            }
        })
            .then(response => {
                response.json().then((data) => {
                    this.updateUI(data.messages);
                });
            });
    }
    updateUI(data) {
        this.setState({
            message: data,
        })
    }
    onChat(event) {
        event.preventDefault();
        let cmtt1 = event.target['content'].value;
        let cmtt = {
            content: cmtt1,
        }
        let sale = JSON.stringify(cmtt);
        let id = localStorage.getItem("iduser");
        fetch("http://127.0.0.1:8000/api/message", {
            method: "post",
            headers: {
                "Content-Type": "application/json",
                'Authorization': id,
            },
            body: sale,
        })
            .then((response) => {
                if (response.status == 200) {
                    alert("success");
                    this.getData(id);
                }
                else {
                    alert("Failed");
                }
            });
    }
    render() {
        return (
            <div className="messgr">
                <br /> <br />
                <form className="cmt" onSubmit={this.onChat}>
                    <input type="text" name="content" placeholder="say something" />
                    <button type="submit"><img src={send}/></button>
                </form><br /> <br />
                <div className="mes">
                {this.state.message.map(item =>
                <div>
                    {this.check(item.id_user) ?<div>
                       <hr/> <i className='you'>{item.content}</i><br/>
                    </div> : <div>
                        <hr/><i className="admin">{item.content}</i><br/>
                        </div>}
                </div>
                      
                    )}
                </div>
              
            </div>
        );
    }
}
export default withRouter(Message);
