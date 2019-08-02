import React from 'react'
import {Link} from 'react-router-dom'
import styled from 'styled-components'

const Home = () => (
    <Message>
    <div>
        <ul>
            <li><Link to='/products'>products</Link></li>
            <li><Link to='/shops'>shops</Link></li>
        </ul>
    </div>
    </Message>
)

export default Home

const imageurl = "https://images.unsplash.com/photo-1562679817-2aac4f5581ec?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80"

const Message = styled.div`
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background: linear-gradient(-4deg, rgba(226, 225, 50, .8), rgba(255, 30, 161, .8))
        ,center / cover no-repeat url(${imageurl});

`
