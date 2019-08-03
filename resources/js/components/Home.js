import React from 'react'
import {Link} from 'react-router-dom'
import styled from 'styled-components'

const Home = () => (
    <TopStyle>
    <div>
        <ul>
            <li><Link to='/products'>products</Link></li>
            <li><Link to='/shops'>shops</Link></li>
        </ul>
    </div>
    </TopStyle>
)

export default Home

const imageurl = "https://images.unsplash.com/photo-1562679817-2aac4f5581ec?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80"

const TopStyle = styled.div`
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100vw;
    height: 96.5vh;

    &::after {
        position: absolute;
        content: '';
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: linear-gradient(-4deg, rgba(0, 45, 95, .8), rgba(70, 153, 202, .8))
        ,center / cover no-repeat url(${imageurl});
        z-index: -1;
    }

    ul {
        li {
            font-size: 32px;
            display: inline-flex;
            width: 25vw;
            height: 25vw;
            align-items: center;
            justify-content: space-around;
            a {
                display: inline-flex;
                text-decoration: none;
                color: rgb(220, 237, 240);
                font-family: 'Julius Sans One', sans-serif;
            }
        }
    }

`
