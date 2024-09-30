import React, { useEffect, useState } from 'react'
import useAPI from '../../../Tools/API/useAPI';
import Pagination from '../../../Tools/Pagination/Pagination';
import { CNavItem, CPagination, CPaginationItem, CTable, CTableBody, CTableDataCell, CTableHead, CTableHeaderCell, CTableRow } from '@coreui/react';
import { CButton } from '@coreui/react-pro';
import { useParams } from 'react-router-dom';
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
        fetch('blogs' , setData, {}, id);
    };

    const convertImageUrl = (htmlContent) => {
        if (!htmlContent) return "";

        // تغییر URL تمام تصاویر برای تبدیل به نسخه conversion
        return htmlContent.replace(
            /\/images\/([a-zA-Z0-9]+)\/([^\/]+)\.(jpg|jpeg|png|webp|svg)/g,
            "/images/$1/conversions/$2-article-image-tinymce.$3"
        );
    };

    return(
        <>
            <CTable border={2} responsive striped>
                <CTableBody>
                        <CTableRow >
                            <CTableHeaderCell scope="row">عنوان</CTableHeaderCell>
                            <CTableDataCell>{data?.title}</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                            <CTableHeaderCell scope="row">وضعیت</CTableHeaderCell>
                            <CTableDataCell>{data?.status}</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                            <CTableHeaderCell scope="row">سازنده</CTableHeaderCell>
                            <CTableDataCell>{data?.creator?.user_name}</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                            <CTableHeaderCell scope="row">توضیحات</CTableHeaderCell>
                            <CTableDataCell>{
                            <p
                                dangerouslySetInnerHTML={{
                                    __html: convertImageUrl(data?.description),
                                }}
                            />
                        }</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                        <CTableHeaderCell scope="row">تصویر اصلی</CTableHeaderCell>
                        <img
                            style={{ width: "100px" }}
                            className="imageUpload"
                            src={data?.thumbnail}
                            alt="آپلود شده"
                        />
                        </CTableRow>
                </CTableBody>
            </CTable>
        </>
    );
}


export default Show
