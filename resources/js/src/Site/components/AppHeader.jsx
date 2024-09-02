
import React, { useState } from 'react'
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
  CButton,
} from '@coreui/react'
import CIcon from '@coreui/icons-react'
import { cilBell, cilEnvelopeOpen, cilList, cilMenu } from '@coreui/icons'

import { AppBreadcrumb } from './index'
import { AppHeaderDropdown } from './header/index'
import { logo } from '../assets/brand/logo'

const AppHeader = () => {
  const dispatch = useDispatch()
  const sidebarShow = useSelector((state) => state.sidebarShow)
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  // Function to toggle the mobile menu
  const toggleMobileMenu = () => {
    setIsMobileMenuOpen(!isMobileMenuOpen);
  };
  return (
    <CHeader position="sticky" className="mb-4">
      <CContainer  fluid>
        <CHeaderNav className="d-none d-lg-flex me-start my-auto">
            <CNavItem className=''>
                <CNavLink className='h1' to="/" component={NavLink}>
                <p className='h1'>علی رحیمی</p>

                </CNavLink>
            </CNavItem>
        </CHeaderNav>

        <CButton
          className="d-lg-none"
          onClick={toggleMobileMenu}
          color="primary"
        >
          &#9776; {/* Unicode for the hamburger icon (3 lines) */}
        </CButton>

        {/* Conditional rendering for the navigation menu */}
        <CHeaderNav className={`d-lg-flex ${isMobileMenuOpen ? 'd-block' : 'd-none'} flex-column flex-lg-row me-auto gap-2`}>

            <CNavItem>
                <CNavLink href="#" >
                    صفحه نخست
                </CNavLink>
            </CNavItem>
            <CNavItem>
                <CNavLink href="#/userlogin">حساب کاربری</CNavLink>
            </CNavItem>
            <CNavItem>
                <CNavLink href="#/products">دوره های آموزشی</CNavLink>
            </CNavItem>
            <CNavItem>
                <CNavLink href="#">سبد خرید</CNavLink>
            </CNavItem>
            <CNavItem>
                <CNavLink href="#/AboutUs">درباره من</CNavLink>
            </CNavItem>
            </CHeaderNav>
        <CHeaderNav className="d-none d-lg-flex me-end">
            <CNavItem className='my-auto'>
                <CNavLink href="#/userlogin">ورود به حساب کاربری</CNavLink>
            </CNavItem>
            <CButton color="secondary" shape="rounded-pill">
                <CNavLink href="#/products">دوره های آموزشی</CNavLink>
            </CButton>
        </CHeaderNav>
      </CContainer>
      {/* <CHeaderDivider /> */}
      {/* <CContainer fluid>
        <AppBreadcrumb />
      </CContainer> */}
    </CHeader>
  )
}

export default AppHeader
