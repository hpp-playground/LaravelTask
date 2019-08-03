import React, {Component, Fragment} from 'react'
import { withRouter } from 'react-router'

const ProductDetail = (props) => (
    <ul>
        <li><img src={props.product.imageUrl} width="400" /></li>
        <li>{props.product.title}</li>
        <li>{props.product.description}</li>
        <li>{props.product.price}</li>
    </ul>
)



class ProductCard extends Component {
    constructor (props) {
        super(props)
        const {params} = this.props.match
        const id = parseInt(params.id, 10)
        this.state = {
            product: '',
            id: id,
            title: '',
            description: '',
            price: 0,
            image: '',
            imagePreviewUrl: ''
        }
        this.getProduct = this.getProduct.bind(this)
        this.updateProduct = this.updateProduct.bind(this)
        this.deleteProduct = this.deleteProduct.bind(this)

        this.inputChange = this.inputChange.bind(this)
        this.inputFileChange = this.inputFileChange.bind(this)
    }

    componentDidMount() {
        this.getProduct()
    }

    getProduct() {
        axios
            .get(`/api/products/${this.state.id}`)
            .then((res) => {
                console.log(res)
                this.setState({
                    product: res.data
                })
            })
            .catch(error => {
                console.log(error)
            })
    }


    updateProduct() {
        const params = new FormData();
        params.append('title', this.state.title)
        params.append('description', this.state.description)
        params.append('price', this.state.price)
        params.append('image', this.state.image)
        axios
            .post(
                `/api/products/${this.state.id}`,
                params,
                {
                headers: {
                'content-type': 'multipart/form-data',
                'X-HTTP-Method-Override': 'PUT',
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
                this.getProduct()
            })
            .catch(error => {
                console.log('error')
                console.log(error)
            })
    }

    deleteProduct() {
        //削除をしても一覧に削除済みの商品が残っているのはいやなので,非同期処理だが削除完了後に遷移させる
        axios
            .post(
                `/api/products/${this.state.id}`,
                [],
                {
                headers: {
                'X-HTTP-Method-Override': 'DELETE',
                }
            })
            .then((res) => {
                console.log('res')
                console.log(res)
                this.props.history.push('/products')
            })
            .catch(error => {
                console.log('error')
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



    render () {
        return (
            <Fragment>
                <ProductDetail product={this.state.product} />
                <div>
                    <label htmlFor="product">new product</label>
                    <input type="text" name="title" value={this.state.title} onChange={this.inputChange}/>
                    <input type="text" name="description" value={this.state.description} onChange={this.inputChange}/>
                    <input type="text" name="price" value={this.state.price} onChange={this.inputChange}/>
                    <input type="file" name="image" onChange={this.inputFileChange}/>
                    <img src={this.state.imagePreviewUrl} width="200" />
                </div>
                <button onClick={this.updateProduct}>Update</button>
                <button onClick={this.deleteProduct}>Delete</button>
            </Fragment>
        )
    }


}

export default withRouter(ProductCard)
