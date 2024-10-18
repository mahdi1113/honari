import React, { useEffect, useState } from 'react'
import useAPI from '../../../Tools/API/useAPI';
import Pagination from '../../../Tools/Pagination/Pagination';
import { CNavItem, CPagination, CPaginationItem, CTable, CTableBody, CTableDataCell, CTableHead, CTableHeaderCell, CTableRow } from '@coreui/react';
import { CButton } from '@coreui/react-pro';
import { useParams } from 'react-router-dom';
import {
    CCard,
    CCardBody,
    CCardImage,
    CCardText,
    CCardTitle,
    CCol,
    CRow,
    CBadge,
} from '@coreui/react';
const Show = () => {
    const { fetch } = useAPI();
    const [data, setData] = useState([])
    const { id } = useParams();
    useEffect(() => {
        fetchData();
    }, []);
    useEffect(() => {
        // console.log(data);
    }, [data]);


    const fetchData =  () => {
        fetch('get-blog' , setData, {}, id);
    };

    const convertImageUrl = (htmlContent) => {
        if (!htmlContent) return "";

        // تغییر URL تصاویر و اضافه کردن استایل ها
        return htmlContent.replace(
            /<img([^>]*)>/g, // جستجوی تگ های <img>
            '<img$1 style="max-width: 100%; height: auto; display: block; margin: 10px 0;" />'
        );
    };

    return(
        <>
             <CRow className="justify-content-center mt-4 mb-5">
            <CCol md="12">
                <CCard className="shadow-lg">
                    <CCardImage
                        orientation="top"
                        src={data?.thumbnail}
                        className="img-fluid"
                        style={{ borderTopLeftRadius: '8px', borderTopRightRadius: '8px' }}
                    />
                    <CCardBody className="p-4">
                        <CRow className="mb-3">
                            <CCol md="8">
                                <CCardTitle className="h2">{data?.title}</CCardTitle>
                                <p className="text-muted">
                                    نویسنده <strong>{data?.creator?.user_name}</strong>
                                </p>
                            </CCol>
                        </CRow>

                        <CCardText
                            dangerouslySetInnerHTML={{
                                __html: convertImageUrl(data?.description),
                            }}
                        ></CCardText>
                    </CCardBody>
                </CCard>
            </CCol>
        </CRow>
        </>
    );
}


export default Show
