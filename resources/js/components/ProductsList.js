import React, {Component, Fragment} from 'react'
import {Link} from 'react-router-dom'

const RenderRows = (props) => {
    return props.products.map(product => {
        return (
            <tr key={product.id}>
                <td><Link to={`/products/${product.id}`}>{product.id}</Link></td>
                <td>{product.description}</td>
                <td>{product.price}</td>
                <td><img src={product.imageUrl} /></td>
            </tr>
        )
    })
}


export default class ProductsList extends Component {
    constructor () {
        super()
        this.state = {
            products: []
        }
    }

    componentDidMount() {
        axios
            .get('/api/products')
            .then((res) => {
                this.setState({
                    products: res.data
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
                            <th>title</th>
                            <th>description</th>
                            <th>price</th>
                            <th>image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <RenderRows products={this.state.products} />
                    </tbody>
                </table>
            </Fragment>
        )
    }
}
