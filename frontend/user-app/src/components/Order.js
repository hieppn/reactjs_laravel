import React, { Component } from 'react';
import '../css/Order.css';
import Cart from './Cart';
import Profile from './Profile';
let dataBook = [];
class Order extends Component {
    constructor() {
        super();
        this.state = {
            orders: [],
            id: "",
            nameuser: [],
            address: "",
            phone: "",
            email: "",
            products: [],
        }
        let id = localStorage.getItem("iduser");
        this.getData(id);
    }
    getData(id) {
        fetch("http://127.0.0.1:8000/api/order", {
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
            orders: data.orders
        })
    }
    render() {
        return (
            <div className="con">
                <br /> <br /> <br />
                <center>
                    <h1 className="head">Thông tin đơn hàng bạn đã đặt</h1>
                </center>
                <table align="center" border="1" cellspacing="0" cellpadding="1" className="order">
                    <tr>
                        <th>ID</th>
                        <th>Giảm giá</th>
                        <th>Thành tiền</th>
                        <th>Trạng thái</th>
                    </tr>
                    {this.state.orders.map((item, index) =>
                        <tr>
                            <td>{item.id}</td>                   
                            <td>{item.discount}</td>
                            <td>{item.total}</td>
                            <td>{item.status}</td>
                        </tr>
                    )}
                </table>
            </div>

        )
    }
}

export default Order;
