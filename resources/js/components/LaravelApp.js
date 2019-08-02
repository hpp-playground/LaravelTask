import React from 'react'
import {
    BrowserRouter as Router,
    Route,
    Link,
    Switch
} from 'react-router-dom'
import Home from './Home'
import ProductsList from './ProductsList'
import ProductCard from './ProductCard'
import ShopsList from './ShopsList'
import ShopCard from './ShopCard'


const LaravelApp = () => (
    <Router>
        <Switch>
            <Route exact path='/' component={Home} />
            <Route exact path='/products' component={ProductsList} />
            <Route exact path='/products/:id' component={ProductCard} />
            <Route exact path="/shops" component={ShopsList} />
            <Route exact path="/shops/:id" component={ShopCard} />
        </Switch>
    </Router>
)

export default LaravelApp
