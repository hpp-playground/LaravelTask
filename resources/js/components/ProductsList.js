import React, {Component, Fragment} from 'react'
import {Link} from 'react-router-dom'

const RenderRows = (props) => {
    return props.products.map(product => {
        return (
            <tr key={product.id}>
                <td><Link to={`/products/${product.id}`}>{product.title}</Link></td>
                <td>{product.description}</td>
                <td>{product.price}</td>
                <td><img src={product.imageUrl} width="200" /></td>
            </tr>
        )
    })
}

const RenderTable = (props) => {
    return (
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
            <RenderRows products={props.products} />
        </tbody>
    </table>
    )
}


export default class ProductsList extends Component {
    constructor () {
        super()
        this.state = {
            products: [],
            title: '',
            description: '',
            price: 0,
            image: '',
            imagePreviewUrl: ''
        }
        this.inputChange = this.inputChange.bind(this)
        this.inputFileChange = this.inputFileChange.bind(this)
        this.addProduct = this.addProduct.bind(this)
        this.getProducts = this.getProducts.bind(this)
    }

    componentDidMount() {
        this.getProducts()
    }

    //非同期に商品一覧を取得する
    getProducts() {
        axios
            .get('/api/products')
            .then((res) => {
                console.log(res)
                this.setState({
                    products: res.data
                })
            })
            .catch(error => {
                console.log(error)
            })
    }


    inputChange(event) {
        console.log(event.target)
        switch(event.target.name) {
            case 'title':
                this.setState({
                    title: event.target.value
                })
                break
            case 'description':
                this.setState({
                    description: event.target.value
                })
                break
            case 'price':
                this.setState({
                    price: event.target.value
                })
                break
            default:
                break
        }
    }

    inputFileChange(event) {
        event.preventDefault()
        let reader = new FileReader()
        let image = event.target.files[0]
        reader.onloadend = () => {
            this.setState({
                image: image,
                imagePreviewUrl: reader.result
            })
        }
        reader.readAsDataURL(image)
    }

    addProduct() {
        const params = new FormData();
        params.append('title', this.state.title)
        params.append('description', this.state.description)
        params.append('price', this.state.price)
        params.append('image', this.state.image)
        axios
            .post(
                '/api/products',
                params,
                {
                headers: {
                'content-type': 'multipart/form-data',
                }
            })
            .then((res) => {
                console.log('res')
                console.log(res)
                this.setState({
                    title: '',
                    description: '',
                    price: 0,
                    image: '',
                    imagePreviewUrl: ''
                })
                this.getProducts()
            })
            .catch(error => {
                console.log('error')
                console.log(error)
            })
    }


    render() {
        return (
            <Fragment>
                <RenderTable products={this.state.products} />
                <div>
                    <label htmlFor="product">new product</label>
                    <input type="text" name="title" value={this.state.title} onChange={this.inputChange}/>
                    <input type="text" name="description" value={this.state.description} onChange={this.inputChange}/>
                    <input type="text" name="price" value={this.state.price} onChange={this.inputChange}/>
                    <input type="file" name="image" onChange={this.inputFileChange}/>
                    <img src={this.state.imagePreviewUrl} width="200" />
                </div>
                <button onClick={this.addProduct}>登録</button>
            </Fragment>
        )
    }
}
