import React from 'react'
import {
    BrowserRouter as Router,
    Route,
    Link,
    Switch
} from 'react-router-dom'
import Home from './components/Home'
import ProductsList from './components/ProductsList'
import ProductCard from './components/ProductCard'
import ShopsList from './components/ShopsList'
import ShopCard from './components/ShopCard'


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
