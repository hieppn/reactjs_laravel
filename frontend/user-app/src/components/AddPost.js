import React, { Component } from 'react';
import { withRouter } from 'react-router-dom';
import '../css/AddPost.css';
class AddPost extends Component {

    onAddSubmit(event) {
        event.preventDefault();
        let title = event.target['title'].value;
        let content = event.target['content'].value;
        let image = event.target["image"].files.item(0).name;
        let post = {
            title: title,
            content: content,
            image: image,
        }

        let postInJson = JSON.stringify(post);
        console.log(postInJson);

        fetch("http://127.0.0.1:8000/api/posts", {
            method: "post",
            headers: {
                "Content-Type": "application/json"
            },
            body: postInJson
        })
            .then((response) => {
                console.log(response);
                // this.history.push("/posts"); // chuyển trang
            });
        alert("Successful");
    }
    render() {

        return (
            <div>
                {/* <h1 className="divh1">Add the new post</h1> */}
                <br />
                <br />
                <br />
                <form onSubmit={this.onAddSubmit}>
                    <label>Title</label><br />
                    <input type="text" name="title" placeholder="enter the title" required /><br />
                    <label>Content</label><br />
                    <input type="text" name="content" placeholder="enter the content" required /><br />
                    <label>Image</label><br />
                    <input type="file" name="image" required /><br /><br />
                    <button type="submit" className="add-pos">Add</button>
                </form>

            </div>
        )
    }
}
export default withRouter(AddPost);
