import { CInputGroup, CInputGroupText } from "@coreui/react";
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
                    <CInputGroupText className="text-wrap" id="basic-addon1">عنوان</CInputGroupText>
                    <CFormInput name='title' placeholder="" value={formData?.title} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">توضیحات</CInputGroupText>
                    <CFormInput name='description' placeholder="" value={formData?.description} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">قیمت</CInputGroupText>
                    <CFormInput type="number" name='price' placeholder="" value={formData?.price} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">مدت ساعت دوره</CInputGroupText>
                    <CFormInput type="number" name='duration_course' placeholder="" value={formData?.duration_course} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">متد</CInputGroupText>
                    <CFormInput name='method_holding' placeholder="" value={formData?.method_holding} onChange={handleFromChange}/>
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

