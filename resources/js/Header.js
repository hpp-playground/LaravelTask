import React from 'react'
import {Link} from 'react-router-dom'
import styled from 'styled-components'

const Header = () => (
    <HeaderStyle>
        <div>
            <nav>
                <ul>
                    <li><Link to='/'>home</Link></li>
                    <li><Link to='/products'>products</Link></li>
                    <li><Link to='/shops'>shops</Link></li>
                </ul>
            </nav>
        </div>
    </HeaderStyle>
)

export default Header

const HeaderStyle = styled.div`
    position: fixed;
    display: flex;
    justify-content: flex-end;
    top: 0;
    left: 0;
    width: 100vw;
    height: 5vw;

    nav ul {
        list-style: none;
        li {
            display: inline-flex;
            padding: 10px;
            a {
                color: rgb(220, 237, 240);
                text-decoration: none;
                font-family: 'Julius Sans One', sans-serif;
            }
        }
    }
`
