import React, { Component } from 'react';
import '../css/Cart.css';
class CartItem extends Component {
    render() {
        const { item,onDeleteItem,SubtractItem,AddItem} = this.props;
        return (
            <tr>
                <td><img src={"http://127.0.0.1:8000/storage/" + item.books[0].image} width={50} height={50} /></td>
                <td>{item.books[0].name}</td>
                <td>{item.books[0].price}</td>
                <td className="qua">
                    <button type="submit"className="btn btn-danger"onClick={SubtractItem}>-</button>
                    <button disabled>{item.quantity}</button>
                    <button type="submit" className="btn btn-info"onClick={AddItem}>+</button>
                </td>
                <td>{item.books[0].price * item.quantity}</td>
                <td><button className="btn btn-danger"onClick={onDeleteItem}>Delete</button></td>
            </tr>
            
        );
    }
}
export default CartItem;