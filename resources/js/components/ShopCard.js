import React, {Component} from 'react'

export default class ShopCard extends Component {
    render () {
        const {params} = this.props.match
        const id = parseInt(params.id, 10)
        return (
            <div>{id}</div>
        )
    }
}
