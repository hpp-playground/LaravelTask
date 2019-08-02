import React, {Component, Fragment} from 'react'
import {Link} from 'react-router-dom'

const RenderRows = (props) => {
    return props.shops.map(shop => {
        return (
            <tr key={shop.id}>
                <td><Link to={`/shops/${shop.id}`}>{shop.name}</Link></td>
                <td><img src={shop.imageUrl} width="200" /></td>
            </tr>
        )
    })
}

const RenderTable = (props) => (
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            <RenderRows shops={props.shops} />
        </tbody>
    </table>
)


export default class ShopsList extends Component {
    constructor () {
        super()
        this.state = {
            shops: [],
            image: '',
            imagePreviewUrl: ''
        }
        this.inputChange = this.inputChange.bind(this)
        this.inputFileChange = this.inputFileChange.bind(this)
        this.addShop = this.addShop.bind(this)
        this.getShops = this.getShops.bind(this)
    }

    componentDidMount() {
        this.getShops()
    }

    getShops() {
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

    inputChange(event) {
        this.setState({
            name: event.target.value
        })
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

    addShop() {
        const params = new FormData();
        params.append('name', this.state.name)
        params.append('image', this.state.image)
        axios
            .post(
                '/api/shops',
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
                    name: '',
                    image: '',
                    imagePreviewUrl: ''
                })
                this.getShops()
            })
            .catch(error => {
                console.log('error')
                console.log(error)
            })
    }

    render() {
        return (
            <Fragment>
                <RenderTable shops={this.state.shops} />
                <div>
                    <label htmlFor="shop">new shop</label>
                    <input type="text" name="name" value={this.state.name} onChange={this.inputChange}/>
                    <input type="file" name="image" onChange={this.inputFileChange}/>
                    <img src={this.state.imagePreviewUrl} width="200" />
                </div>
                <button onClick={this.addShop}>登録</button>
            </Fragment>
        )
    }
}
