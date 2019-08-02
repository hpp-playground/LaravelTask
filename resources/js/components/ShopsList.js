import React, {Component, Fragment} from 'react'
import {Link} from 'react-router-dom'

const RenderRows = (props) => {
    return props.shops.map(shop => {
        return (
            <tr key={shop.id}>
                <td><Link to={`/shops/${shop.id}`}>{shop.name}</Link></td>
                <td><img src={shop.imageUrl} /></td>
            </tr>
        )
    })
}


export default class ShopsList extends Component {
    constructor () {
        super()
        this.state = {
            shops: []
        }
    }

    componentDidMount() {
        axios
            .get('/api/shops')
            .then((res) => {
                this.setState({
                    shops: res.data
                })
            })
            .catch(error => {
                console.log(error)
            })
    }

    render() {
        return (
            <Fragment>
                <table>
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <RenderRows shops={this.state.shops} />
                    </tbody>
                </table>
            </Fragment>
        )
    }
}
