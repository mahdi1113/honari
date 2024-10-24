import React, { useEffect, useState } from 'react'
import useAPI from '../../../Tools/API/useAPI';
import Pagination from '../../../Tools/Pagination/Pagination';
import { CNavItem, CNavLink, CPagination, CPaginationItem, CTable, CTableBody, CTableDataCell, CTableHead, CTableHeaderCell, CTableRow } from '@coreui/react';
import { CButton } from '@coreui/react-pro';
const Index = () => {
    const { fetchPaginate } = useAPI();
    const [data, setData] = useState([])
    const [totalPages, setTotalPages] = useState(0);
    const [page, setPage] = useState(1);
    const [itemsPerPage, setItemsPerPage] = useState(20);


    useEffect(() => {
        fetchData();
    }, [page, itemsPerPage]);
    useEffect(() => {
        console.log(data);
    }, [data]);


    const fetchData =  (search=null) => {
        let url = 'users';
        // console.log('url :: ',url);
        const params = { itemsPerPage, page }
        fetchPaginate(url , setData, params);
    };

    return(
        <>
            <CTable border={2} responsive striped>
                <CTableHead>
                    <CTableRow>
                    <CTableHeaderCell scope="col">نام کاربری</CTableHeaderCell>
                    <CTableHeaderCell scope="col">شماره تلفن</CTableHeaderCell>
                    <CTableHeaderCell scope="col">ایمیل</CTableHeaderCell>
                    <CTableHeaderCell scope="col">نقش</CTableHeaderCell>
                    <CTableHeaderCell scope="col"> </CTableHeaderCell>
                    </CTableRow>
                </CTableHead>
                <CTableBody>
                    {data?.data?.map((course) => (
                        <CTableRow key={course.id}>
                            <CTableHeaderCell scope="row">{course.user_name}</CTableHeaderCell>
                            <CTableDataCell>{course.phone}</CTableDataCell>
                            <CTableDataCell>{course.email}</CTableDataCell>
                            <CTableDataCell>{course.role === 'admin' ? 'ادمین' : 'کاربر'}</CTableDataCell>
                            <CTableDataCell>
                                <CButton shape="rounded-pill" href={'#/admin/users/'+course.id} color='primary'>
                                    نمایش
                                </CButton>
                            </CTableDataCell>
                        </CTableRow>
                    ))}
                </CTableBody>
            </CTable>
            <div>
            <Pagination
                data={data}
                setPage={setPage}
            />
            </div>
        </>
    );
}


export default Index
