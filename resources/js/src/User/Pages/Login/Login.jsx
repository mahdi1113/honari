import React, { useState } from "react";
import { Link, NavLink, Navigate } from "react-router-dom";
import {
    CButton,
    CCard,
    CCardBody,
    CCardGroup,
    CCol,
    CContainer,
    CForm,
    CFormInput,
    CInputGroup,
    CInputGroupText,
    CNavLink,
    CRow,
} from "@coreui/react";
import CIcon from "@coreui/icons-react";
import { cilLockLocked, cilUser } from "@coreui/icons";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import { CImage } from "@coreui/react-pro";
import showAlert from "../../../Tools/showAlert/showAlert";
import { cibMailRu } from "@coreui/icons-pro";
import react from'../../assets/images/react1.jpg';



const Register = () => {
    const axiosClientForLogin = axios.create({
        baseURL: `/api`,
    });

    const cursorP = {
        cursor: "pointer",
    };

    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");
    const [errors, setErrors] = useState("");
    const [unauthorized, setUnauthorized] = useState("");
    let navigate = useNavigate();

    const handleSubmit = function (e) {
        e.preventDefault();
        // console.log(email),
        // console.log(password)
        axiosClientForLogin
            .post("auth/login", {
                user_name: username,
                password: password,
            })
            .then((res) => {
                console.log(res);
                localStorage.setItem("token", res.data.data.token);
                showAlert('با موفقیت وارد شدید', '#', 'success');
                // return navigate("#");
            })
            .catch((error) => {
                if (error.response.status === 401) {
                    setUnauthorized("نام کاربری یا رمز عبور اشتباه است");
                } else {
                    setErrors(error.response.data.errors);
                }
            });
    };

    const isLoggedIn = localStorage.getItem("token") !== null && localStorage.getItem("UT") == '8c6976e5b5410415bde908bd4dee15dfb16a3a6abf560f5c4236cf0d3cc8f6a8';
    if (isLoggedIn) {
        return <Navigate to="/admin/" />;
    } else {
        return (
            <div className="bg-light min-vh-100 d-flex flex-row justify-content-left">
                    <CRow className="flex-grow-1">
                        <CCol className="d-none d-md-inline" md={7}>
                            <img src={react} style={{height: '100vh', width: '50vw'}}/>
                        </CCol>
                        <CCol className="my-auto" md={4}>
                            <CCardGroup>
                                <CCard className="p-4">
                                    <CCardBody>


                                        {unauthorized ? (
                                            <div
                                                className="alert alert-danger w-100"
                                                role="alert"
                                            >
                                                {unauthorized}
                                                <i
                                                    className="bi bi-x"
                                                    style={cursorP}
                                                    onClick={() =>
                                                        setUnauthorized(false)
                                                    }
                                                ></i>
                                            </div>
                                        ) : (
                                            ""
                                        )}
                                        <CForm onSubmit={handleSubmit}>
                                            <h1 className="text-center">
                                            ورود
                                            </h1>


                                            <div className="mb-3">
                                                <CInputGroup className="mb-2">
                                                    <CInputGroupText>
                                                        <CIcon icon={cilUser} />
                                                    </CInputGroupText>
                                                    <CFormInput
                                                        name="username"
                                                        placeholder="نام کاربری"
                                                        autoComplete="username"
                                                        onChange={(e) => {
                                                            setUsername(
                                                                e.target.value
                                                            );
                                                        }}
                                                    />
                                                </CInputGroup>
                                                {errors?.user_name ? (
                                                    <span className="text-danger font-size-error">
                                                        {errors.user_name}
                                                    </span>
                                                ) : (
                                                    ""
                                                )}
                                            </div>
                                            <div className="mb-3">
                                                <CInputGroup className="mb-2">
                                                    <CInputGroupText>
                                                        <CIcon
                                                            icon={cilLockLocked}
                                                        />
                                                    </CInputGroupText>
                                                    <CFormInput
                                                        name="passwor"
                                                        type="password"
                                                        placeholder="رمز عبور"
                                                        autoComplete="current-password"
                                                        onChange={(e) => {
                                                            setPassword(
                                                                e.target.value
                                                            );
                                                        }}
                                                    />
                                                </CInputGroup>
                                            </div>

                                            <CRow className="d-flex flex-column align-items-center">
                                                <CCol className="text-center mb-4" xs={12}>
                                                    <CButton
                                                        type="submit"
                                                        color="primary"
                                                        shape="rounded-pill"
                                                        className="px-4 w-100"                                                    >
                                                        ورود
                                                    </CButton>
                                                </CCol>

                                                <CCol className="text-center mb-4" xs={12}>
                                                    <CNavLink href="#/userregister">
                                                        <CButton
                                                            color="info"
                                                            shape="rounded-pill"
                                                            className="px-4 w-100 text-white"
                                                        >
                                                            ایجاد حساب
                                                        </CButton>
                                                    </CNavLink>
                                                </CCol>
                                                <CCol
                                                    xs={12}
                                                    className="text-center mb-4"
                                                >
                                                    <CNavLink href="#">
                                                        <CButton
                                                            color="secondary"
                                                            className="px-4 w-100"
                                                            shape="rounded-pill"
                                                        >
                                                            بازگشت
                                                        </CButton>
                                                    </CNavLink>
                                                </CCol>
                                            </CRow>
                                        </CForm>
                                    </CCardBody>
                                </CCard>
                            </CCardGroup>
                        </CCol>
                    </CRow>
            </div>
        );
    }
};

export default Register;
