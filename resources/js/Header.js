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
    top: 0;
    left: 0;
    width: 100vw;
    height: 10vh;
    padding: 10px;

    nav ul {
        list-style: none;

        li {
            display: inline-block;
            padding: 10px;

        }
    }
`
