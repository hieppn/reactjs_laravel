import React, { Component } from "react";
import'../css/Search.css';
class Search extends Component {
  render() {
    return (
      <div>
          <input type="text" className="inputsearch" placeholder="Enter something..." 
          value={this.props.valueSearch}
          name="title"
          onChange={(event) => this.props.search(event.target.value)}
        ></input>
      </div>
    );
  }
}
export default Search;

