import React, { useState } from "react";
import { NavLink } from "react-router-dom";
import { useSelector, useDispatch } from "react-redux";
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
} from "@coreui/react";
import CIcon from "@coreui/icons-react";
import { cilBell, cilEnvelopeOpen, cilList, cilMenu } from "@coreui/icons";

import { AppBreadcrumb } from "./index";
import { AppHeaderDropdown } from "./header/index";
import { logo } from "../assets/brand/logo";

const AppHeader = ({ isDarkMode, toggleDarkMode }) => {
    const dispatch = useDispatch();
    const sidebarShow = useSelector((state) => state.sidebarShow);
    const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

    // Function to toggle the mobile menu
    const toggleMobileMenu = () => {
        setIsMobileMenuOpen(!isMobileMenuOpen);
    };
    return (
        <CHeader
            className={`${
                isDarkMode ? "header-dark-mode" : ""
            } body flex-grow-1 px-3`}
            position="sticky"
        >
            <CContainer className="flex-nowrap" fluid>
                <CHeaderNav className="d-none d-lg-flex me-start my-auto">
                    <CNavItem className="">
                        <CNavLink to="/" component={NavLink}>
                            <p>علی رحیمی</p>
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
                <CHeaderNav
                    className={`d-lg-flex ${
                        isMobileMenuOpen ? "d-block" : "d-none"
                    } flex-column flex-lg-row me-auto gap-1`}
                >
                    <CNavItem>
                        <CNavLink href="#">صفحه نخست</CNavLink>
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
                    <CNavItem>
                        <CNavLink href="#/Blogs">وبلاگ</CNavLink>
                    </CNavItem>
                </CHeaderNav>
                <CHeaderNav className="d-none d-lg-flex me-end">
                    <CNavItem>
                        <button
                            onClick={toggleDarkMode}
                            className="toggle-button mt-2"
                        >
                            <span
                                className={isDarkMode ? "moon" : "sun"}
                            ></span>
                        </button>
                    </CNavItem>
                    <CNavItem className="my-auto">
                        <CNavLink href="#/userlogin">
                            ورود به حساب کاربری
                        </CNavLink>
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
    );
};

export default AppHeader;
