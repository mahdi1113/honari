import { CFormSelect, CFormTextarea, CInputGroup, CInputGroupText } from "@coreui/react";
import { CButton, CDatePicker, CForm, CFormFloating, CFormInput, CFormLabel } from "@coreui/react-pro";
import React, { useEffect, useState } from "react";
import { NavLink, useNavigate } from "react-router-dom";
import ChunkUpload from "../../components/ChunkUpload";
const Form = ({formData, handleFromChange, onSubmit}) =>{
    const navigate = useNavigate();
    useEffect(() => {
        // console.log('formData1111 :: ',formData);
    }, [formData]);
    return(
        <CForm>
        <div className="d-flex flex-column">
            <div className="d-flex flex-column justify-content-around mb-lg-3">
                {/* <CInputGroup className="mb-3"> */}
                    {/* <video className="mb-3" controls width="100%">
                        <source src={formData?.video_url} type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>
                    <CFormInput type="file" name="video_url" value={formData?.video_url} onChange={handleFromChange}/> */}
                    <ChunkUpload/>
                {/* </CInputGroup> */}

                <CInputGroup className="mb-3">
                    <CInputGroupText className="col-lg-1 text-wrap" id="basic-addon1">سرفصل</CInputGroupText>
                    <CFormInput name='topic' placeholder="" value={formData?.topic} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">عنوان</CInputGroupText>
                    <CFormInput name='title' placeholder="" value={formData?.title} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">توضیحات</CInputGroupText>
                    <CFormTextarea rows={5} name='description' placeholder="" value={formData?.description} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">مدت زمان این مبحث</CInputGroupText>
                    <CFormInput type="number" name='duration' placeholder="" value={formData?.duration} onChange={handleFromChange}/>
                </CInputGroup>
                <CInputGroup className="mb-3">
                    <CInputGroupText className="text-wrap" id="basic-addon1">وضعیت دوره</CInputGroupText>
                    <CFormSelect  aria-label="Large select example" name="status" onChange={handleFromChange}>
                        <option>انتخاب کنید</option>
                        <option selected={formData?.status === 'private'} value="private">شخصی</option>
                        <option selected={formData?.status === 'public'} value="public">عمومی</option>
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

