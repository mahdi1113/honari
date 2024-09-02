import React from 'react'
import { NavLink } from 'react-router-dom'
import { useSelector, useDispatch } from 'react-redux'
import {
  CContainer,
  CHeader,
  CHeaderBrand,
  CHeaderDivider,
  CHeaderNav,
  CHeaderToggler,
  CNavLink,
  CNavItem,
} from '@coreui/react'
// import logo from "assets/images/images"
import CIcon from '@coreui/icons-react'
import { cilBell, cilEnvelopeOpen, cilList, cilMenu } from '@coreui/icons'

import { AppBreadcrumb } from './index'
import { AppHeaderDropdown } from './header/index'
// import { logo } from '../assets/imgaes/images.jpg'
import { CDropdown, CDropdownDivider, CDropdownItem, CDropdownMenu, CDropdownToggle } from '@coreui/react-pro'

const AppHeader = () => {
  const dispatch = useDispatch()
  const sidebarShow = useSelector((state) => state.sidebarShow)
  const items = [
    {
      title: "تیتر 1",
      products:[
        {
            name:"محصول 1",
            link:'#'
        },
        {
            name:"محصول 2",
            link:'#'
        },
        {
            name:"3",
            link:'#'
        },
    ]
    },
    {
      title: "تیتر 2",
      products:[
        {
            name:"محصول 1",
            link:'#'
        },
        {
            name:"محصول 2",
            link:'#'
        },
        {
            name:"3",
            link:'#'
        },
    ]
    },
    {
        title: "تیتر 3",
        products:[
            {
                name:"محصول 1",
                link:'#'
            },
            {
                name:"محصول 2",
                link:'#'
            },
            {
                name:"3",
                link:'#'
            },
        ]
      },
    {
        title: "تماس با ما",

      }
  ];

  return (
    <CHeader position="sticky" className="mb-4 bg-info">
      <CContainer fluid>
        {/* <CHeaderToggler
          className="ps-1"
          onClick={() => dispatch({ type: 'set', sidebarShow: !sidebarShow })}
        >
          <CIcon icon={cilMenu} size="lg" />
        </CHeaderToggler> */}
        {/* <CHeaderNav className="ms-3">
          <AppHeaderDropdown />
        </CHeaderNav> */}
        <div>
            <></>
        </div>

        <div className='d-flex flex-md-row justify-content-around gap-3'>
        {items.map((item, index) => (
        item.products ? (
          <CDropdown variant="nav-item" key={index}>
            <CDropdownToggle color="secondary">{item.title}</CDropdownToggle>
            <CDropdownMenu>
              {item.products.map((product, i) => (
                <CDropdownItem href={product.link} key={i}>{product.name}</CDropdownItem>
              ))}
            </CDropdownMenu>
          </CDropdown>
        ) : (
          <CDropdownItem href="#" key={index}>{item.title}</CDropdownItem>
        )
      ))}
        </div>
        <div>
            <img src='./images.jpg' width={'50rem'}/>
        </div>
        <div></div>
      </CContainer>
    </CHeader>
  )
}

export default AppHeader
