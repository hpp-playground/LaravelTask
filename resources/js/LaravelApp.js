import React from 'react'
import {
    BrowserRouter as Router,
    Route,
    Switch
} from 'react-router-dom'
import styled from 'styled-components'
import { Reset } from 'styled-reset'
import Home from './components/Home'
import ProductsList from './components/ProductsList'
import ProductCard from './components/ProductCard'
import ShopsList from './components/ShopsList'
import ShopCard from './components/ShopCard'
import Header from './Header'
import Footer from './Footer'


const LaravelApp = () => (
    <Router>
        <Reset />
        <Switch>
            <Route exact path='/' component={Home} />
            <Route exact path='/products' component={ProductsList} />
            <Route exact path='/products/:id' component={ProductCard} />
            <Route exact path="/shops" component={ShopsList} />
            <Route exact path="/shops/:id" component={ShopCard} />
        </Switch>
        <Footer />
    </Router>
)

export default LaravelApp
