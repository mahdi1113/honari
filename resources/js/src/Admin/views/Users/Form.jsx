import { CFormSelect, CInputGroup, CInputGroupText } from "@coreui/react";
import { CButton, CDatePicker, CForm, CFormFloating, CFormInput, CFormLabel } from "@coreui/react-pro";
import React, { useEffect, useState } from "react";
import { NavLink, useNavigate } from "react-router-dom";
const Form = ({formData, handleFromChange, onSubmit}) =>{
    const navigate = useNavigate();
    return(
        <CForm>
        <div className="d-flex flex-column">
            <div className="d-flex flex-column justify-content-around mb-lg-3">
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">نام کاربری</CInputGroupText>
                    <CFormInput name='user_name' placeholder="" value={formData?.user_name} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">ایمیل</CInputGroupText>
                    <CFormInput name='email' placeholder="" value={formData?.email} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">موبایل</CInputGroupText>
                    <CFormInput type="phone" name='price' placeholder="" value={formData?.phone} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">نقش</CInputGroupText>
                    <CFormSelect  aria-label="Large select example" name="role" onChange={handleFromChange}>
                        <option>انتخاب کنید</option>
                        <option selected={formData?.role === 'user'} value="private">کاربر</option>
                        <option selected={formData?.role === 'admin'} value="public">ادمین</option>
                    </CFormSelect>
                </CInputGroup>
            </div>
            <div className="d-flex flex-column-reverse gap-5 flex-lg-row justify-content-center align-items-stretch mb-4">
                <div className="col-lg-2">
                    <CButton className="text-white w-100" color="secondary" shape="rounded-pill" onClick={() => navigate(-1)}>
                        انصراف
                    </CButton>
                </div>
                <div className="col-lg-2">
                    <CButton className="text-white w-100" color="success" shape="rounded-pill" onClick={onSubmit}>تایید</CButton>
                </div>
            </div>

        </div>
        </CForm>
    )
}


export default Form;

