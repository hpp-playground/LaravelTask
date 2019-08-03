import React, {Component, Fragment} from 'react'

const ShopDetail = (props) => (
    <ul>
        <li><img src={props.shop.imageUrl} width="400" /></li>
        <li>{props.shop.name}</li>
    </ul>
)



export default class ShopCard extends Component {
    constructor (props) {
        super(props)
        const {params} = this.props.match
        const id = parseInt(params.id, 10)
        this.state = {
            shop: '',
            id: id,
            name: '',
            image: '',
            imagePreviewUrl: ''
        }
        this.getShop = this.getShop.bind(this)
        this.updateShop = this.updateShop.bind(this)
        this.inputChange = this.inputChange.bind(this)
        this.inputFileChange = this.inputFileChange.bind(this)
    }

    componentDidMount() {
        this.getShop()
    }

    getShop() {
        axios
            .get(`/api/shops/${this.state.id}`)
            .then((res) => {
                console.log(res)
                this.setState({
                    shop: res.data
                })
            })
            .catch(error => {
                console.log(error)
            })
    }


    updateShop() {
        const params = new FormData();
        params.append('name', this.state.name)
        params.append('image', this.state.image)
        axios
            .post(
                `/api/shops/${this.state.id}`,
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
                    name: '',
                    image: '',
                    imagePreviewUrl: ''
                })
                this.getShop()
            })
            .catch(error => {
                console.log('error')
                console.log(error)
            })
    }

    inputChange(event) {
        console.log(event.target)
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

    render () {
        return (
            <Fragment>
                <ShopDetail shop={this.state.shop} />
                <div>
                    <label htmlFor="shop">new shop</label>
                    <input type="text" name="name" value={this.state.name} onChange={this.inputChange}/>
                    <input type="file" name="image" onChange={this.inputFileChange}/>
                    <img src={this.state.imagePreviewUrl} width="200" />
                </div>
                <button onClick={this.updateShop}>Update</button>
            </Fragment>
        )
    }


}

