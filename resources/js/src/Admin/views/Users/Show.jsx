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
        fetch('users' , setData, {}, id);
    };
    return(
        <>
            <div className='d-flex justify-content-around col-md-5 mb-5 text-nowrap'>
                <CButton href={'#/admin/users/'+data?.id+'/edit'} color='warning'>
                    ویرایش
                </CButton>
            </div>
            <CTable border={2} responsive striped>
                <CTableBody>
                        <CTableRow >
                            <CTableHeaderCell scope="row">نام کاربری</CTableHeaderCell>
                            <CTableDataCell>{data?.user_name}</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                            <CTableHeaderCell scope="row">ایمیل</CTableHeaderCell>
                            <CTableDataCell>{data?.email}</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                            <CTableHeaderCell scope="row">موبایل</CTableHeaderCell>
                            <CTableDataCell>{data?.phone}</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                            <CTableHeaderCell scope="row">نقش</CTableHeaderCell>
                            <CTableDataCell>{data?.role}</CTableDataCell>
                        </CTableRow>
                </CTableBody>
            </CTable>
        </>
    );
}


export default Show
