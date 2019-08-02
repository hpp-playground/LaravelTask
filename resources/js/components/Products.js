import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Products extends Component {
    render() {
        return (
            <div>Products</div>
        )
    }
}

ReactDOM.render(<Products />, document.getElementById('app'));