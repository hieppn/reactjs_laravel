import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {
    Link
} from "react-router-dom";
import '../css/Post.css'
class NewBooks extends Component {
    constructor() {
        super();
        this.state = {
            books: [],
            valueSearch:"",
        }

        this.getData();
    }
    getData() {
        fetch("http://127.0.0.1:8000/api/new-books")
            .then(response => {
                response.json().then((data) => {
                    console.log(data);
                    this.updateUI(data);
                });
            });
    }

    updateUI(data) {
        this.setState({
            books: data
        })
        localStorage.setItem("books", JSON.stringify(data));
    }
    render() {
        return (
            <div className="books">
                <div className="container-posts">
                    {this.state.books.map(item =>
                        <div class="card">
                            <div class="front"> <img  className="image" src={"http://127.0.0.1:8000/storage/" + item.image} /></div>
                            <div class="back">
                                <div class="details">
                                    <h2> <i>{item.name}</i><br /><span>{item.author}</span></h2>
                                    <i>{item.price}</i><br/>
                                    <i>{item.category.name}</i>
                                    <center><Link to={'/books/' + item.id}><button className="detailbt">Detail</button></Link></center>
                                </div>
                            </div>
                        </div>
                    )}
                </div>
            </div>
        )
    }
}
export default NewBooks;