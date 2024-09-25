import { CFormSelect, CFormTextarea, CInputGroup, CInputGroupText } from "@coreui/react";
import { CButton, CDatePicker, CForm, CFormFloating, CFormInput, CFormLabel } from "@coreui/react-pro";
import React, { useEffect, useState } from "react";
import { NavLink, useNavigate } from "react-router-dom";
const Form = ({formData, handleFromChange, onSubmit}) =>{
    const navigate = useNavigate();
    // useEffect(() => {
    //     console.log('formData1111 :: ',formData);
    // }, [formData]);
    return(
        <CForm>
        <div className="d-flex flex-column">
            <div className="d-flex flex-column justify-content-around mb-lg-3">
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">عنوان</CInputGroupText>
                    <CFormInput name='title' placeholder="" value={formData?.title} disabled/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">توضیحات</CInputGroupText>
                    <CFormTextarea rows={8} name='description' placeholder="" value={formData?.description} disabled/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">پاسخ شما</CInputGroupText>
                    <CFormTextarea rows={8} name='newresponse' placeholder="" value={formData?.newresponse ? formData?.newresponse : formData?.response?.description} onChange={handleFromChange}/>
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

