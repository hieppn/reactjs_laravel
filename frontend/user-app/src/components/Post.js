import React, { Component } from 'react';
import { withRouter } from 'react-router-dom';
import '../css/Detail.css';
import post from '../img/blog.png';
import Footer from './Footer';
let check;
class Post extends Component {
    constructor(props) {
        super(props);
        let id = this.props.match.params.id;
        localStorage.setItem('idb', id);
        this.state = {
            book: [],
            cart: [],
            comments: [],
            cmt: [],
        }
        console.log(id);
        let iduser = localStorage.getItem("iduser");
        this.getDataCart(iduser);
        this.getData(id);
        this.getComment(id);
        this.getDataUser(iduser);
        this.onComment = this.onComment.bind(this);
        this.onDeleteComent = this.onDeleteComent.bind(this);
    }
    check(email) {
        if (email == this.state.email) {
            return check = true;
        } else {
            return check = false;
        }
    }
    getDataUser(id) {
        fetch("http://127.0.0.1:8000/api/profile", {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': id,
            }
        })

            .then(response => {
                response.json().then((data) => {
                    this.updateUIUser(data);
                });
            });
    }

    updateUIUser(data) {
        this.setState({
            email: data.user.email,
        })
    }
    getComment(id) {
        fetch("http://127.0.0.1:8000/api/comments/" + id)
            .then(response => {
                response.json()
                    .then((data) => {
                        this.updateUIC(data);
                    });
            });

    }
    updateUIC(data) {
        this.setState({
            comments: data.comments
        })
    }
    getData(id) {
        fetch("http://127.0.0.1:8000/api/books/" + id + "/show")
            .then(response => {
                response.json()
                    .then((data) => {
                        this.updateUI(data);
                        console.log(data);
                    });
            });

    }
    updateUI(data) {
        this.setState({
            book: data
        })
    }

    getDataCart(id) {
        fetch("http://127.0.0.1:8000/api/cart", {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': id,
            }
        })
            .then(response => {
                response.json().then((data) => {
                    this.updateUICart(data);
                });
            });
    }
    updateUICart(data) {
        this.setState({
            cart: data.cart
        })
        console.log(this.state.cart);
    }
    onAddToCart(item) {
        return (event) => {
            let id = localStorage.getItem("iduser");
            if (!id) {
                alert("pls login");
                this.props.history.push('/login');
            }
            else {
                fetch("http://127.0.0.1:8000/api/addcart/" + item, {
                    method: "post",
                    headers: {
                        "Content-Type": "application/json",
                        'Authorization': id,
                    },
                    body: item
                })
                    .then((response) => {
                        console.log(response);
                        if (response.status == 200) {
                            alert("Sucessful");
                        }
                        else {
                            alert("Failed, pls check again!!");
                        }

                    });
            }
        }
    }
    onComment(event) {
        event.preventDefault();
        let cmtt1 = event.target['cmtt1'].value;
        let cmtt = {
            cmtt1: cmtt1,
        }
        let sale = JSON.stringify(cmtt);
        let id = localStorage.getItem("iduser");
        let idb = localStorage.getItem('idb');
        fetch("http://127.0.0.1:8000/api/comment/add/" + idb, {
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
                    this.getComment(idb);
                    alert("....ok");
                }
                else {
                    alert("Failed, pls check again!!");
                }
            });

    }
    onDeleteComent(id){
        return (event) => {
            event.preventDefault();
            let idb = localStorage.getItem('idb');
            fetch("http://127.0.0.1:8000/api/comment/delete/" + id, {
              method: 'DELETE',
              headers: {
                'Content-Type': 'application/json',
              }
            }).then(response => {
              response.json().then((data) => {
                this.getComment(idb);
              });
            });
         }
    }
    render() {
        return (
            <div className="detailpage">
                <div>
                    <br></br><br></br><br></br><br></br>
                    <main>
                        <section className="product-detail">
                            <div className="imagery">
                                <img className="image" src={"http://127.0.0.1:8000/storage/" + this.state.book.image} alt="Card image cap" />
                            </div>
                            <div className="detail">
                                <p>Name:<h1>{this.state.book.name}</h1></p>
                                <i>Author: {this.state.book.author}</i><br />
                                <i>Price: {this.state.book.price}</i><br />
                                <i>Old price:<span className="old">{this.state.book.oldprice}</span> </i><br />
                                <i>Quantity: {this.state.book.quantity}</i><br />
                                <i>Description: {this.state.book.description}</i><br />
                                <p>{this.state.book.content}</p>
                                <button type="submit" id="buy" onClick={this.onAddToCart(this.state.book.id)} className="submit">ADD TO BASKET</button>
                            </div>
                        </section>
                    </main>
                    <form className="cmt" onSubmit={this.onComment}>
                        <input type="text" name="cmtt1" placeholder="enter your comment about this book." />
                        <button type="submit"><img src={post} /></button>
                    </form>

                </div>
                {this.state.comments.map(item =>
                    <div className="cmtgroup">
                        {this.check(item.userc.email) ? <form> 
                            <small className="nameuser">{item.userc.email}</small>
                            <input className="cmtt" value={item.cmt} name="cmtt" />
                            <button className="x" title="delete your comment"
                             onClick={this.onDeleteComent(item.id)}>X</button>
                        </form> :
                            <form>
                                <small className="nameuser">{item.userc.email}</small>
                                <i>{item.cmt}</i>
                            </form>}
                    </div>
                )}
                <Footer className="footer" />
            </div>
        )
    }
}
export default withRouter(Post);