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
        fetch('courses' , setData, {}, id);
    };
    return(
        <>
            <div className='d-flex justify-content-around col-md-5 mb-5 text-nowrap'>
                <CButton href={'#/admin/courses/'+data?.id+'/edit'} color='warning'>
                    ویرایش
                </CButton>
                <CButton href={'#/admin/courses/'+data?.id+'/items'} color='info'>
                    آیتم های دوره
                </CButton>
                <CButton href={'#/admin/courses/'+data?.id+'/fq'} color='success'>
                     سوالات متداول دوره
                </CButton>
            </div>
            <CTable border={2} responsive striped>
                <CTableBody>
                        <CTableRow >
                            <CTableHeaderCell scope="row">عنوان</CTableHeaderCell>
                            <CTableDataCell>{data?.title}</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                            <CTableHeaderCell scope="row">قیمت</CTableHeaderCell>
                            <CTableDataCell>{data?.price}</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                            <CTableHeaderCell scope="row">متد</CTableHeaderCell>
                            <CTableDataCell>{data?.method_holding}</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                            <CTableHeaderCell scope="row">مدت زمان</CTableHeaderCell>
                            <CTableDataCell>{data?.duration_course}</CTableDataCell>
                        </CTableRow>
                        <CTableRow >
                            <CTableHeaderCell scope="row">نعداد آیتم ها</CTableHeaderCell>
                            <CTableDataCell>{data?.items?.lenght ? data?.items?.lenght : 0}</CTableDataCell>
                        </CTableRow>
                </CTableBody>
            </CTable>
        </>
    );
}


export default Show
