import React from 'react'
import {Link} from 'react-router-dom'

const Home = () => (
    <ul>
        <li><Link to='/products'>products</Link></li>
        <li><Link to='/shops'>shops</Link></li>
    </ul>
)

export default Home
