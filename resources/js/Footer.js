import React from 'react'
import {Link} from 'react-router-dom'
import styled from 'styled-components'

const Footer = () => (
    <FooterStyle>
        <div>
            <nav>
                <ul>
                    <li><Link to='/'>home</Link></li>
                    <li><Link to='/products'>products</Link></li>
                    <li><Link to='/shops'>shops</Link></li>
                </ul>
            </nav>
        </div>
    </FooterStyle>
)

export default Footer

const FooterStyle = styled.div`
    display: flex;
    justify-content: flex-end;
    width: 100vw;
    height: 3.5vh;
    background-color: rgb(22,13,27);
    align-items: flex-end;

    nav ul {
        list-style: none;
        li {
            display: inline-flex;
            padding: 10px 10px 3px 10px;
            a {
                color: rgb(220, 237, 240);
                text-decoration: none;
                font-family: 'Julius Sans One', sans-serif;
            }
        }
    }
`
