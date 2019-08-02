import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class TodoApp extends Component {
    render() {
        return (
            <div>Todo</div>
        );
    }
}

ReactDOM.render(<TodoApp />, document.getElementById('todoApp'));
