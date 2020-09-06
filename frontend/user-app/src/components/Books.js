import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {
    Link
} from "react-router-dom";
import '../css/Post.css'
import Search from './Search';
class Books extends Component {
    constructor() {
        super();
        this.state = {
            books: [],
            valueSearch:"",
        }

        this.getData();
    }
    getData() {
        fetch("http://127.0.0.1:8000/api/books")
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
    handleSearch = (search) => {
        var suitPro = [];
        let oldProducts = JSON.parse(localStorage.getItem("books"));
        if (!oldProducts) {
            oldProducts = [];
        }
        if (search.length <= 0 || search === '') {
            this.setState({
                books: oldProducts,
                valueSearch: search
            })
        } else {
            let searchValue = search.toLowerCase();
            for (var i = 0; i < oldProducts.length; i++) {
                console.log(oldProducts[i].category.name.toLowerCase().indexOf(searchValue)!= -1)
                if (oldProducts[i].name.toLowerCase().indexOf(searchValue)!= -1) {
                    suitPro.push(oldProducts[i]);
                }
            }
            this.setState({
                books: suitPro,
                valueSearch: search
            })
        }
    }
    render() {
        return (
            <div className="books">
                 <Search className="searchbar" search={this.handleSearch}/>
               <center> <h1>Books</h1></center>
                <div className="container-posts">
                    {this.state.books.map(item =>
                        <div class="card">
                            <i>{item.category.name}</i>
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
export default Books;