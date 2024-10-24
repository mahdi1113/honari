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
        // console.log(data);
    }, [data]);


    const fetchData =  (search=null) => {
        let url = 'comments';
        // console.log('url :: ',url);
        const params = { itemsPerPage, page }
        fetchPaginate(url , setData, params);
    };

    return(
        <>
            <CTable border={2} responsive striped>
                <CTableHead>
                    <CTableRow>
                    <CTableHeaderCell scope="col">عنوان</CTableHeaderCell>
                    <CTableHeaderCell scope="col">متن</CTableHeaderCell>
                    <CTableHeaderCell scope="col">پاسخ</CTableHeaderCell>
                    <CTableHeaderCell scope="col">وضغیت</CTableHeaderCell>
                    <CTableHeaderCell scope="col"></CTableHeaderCell>
                    </CTableRow>
                </CTableHead>
                <CTableBody>
                    {data?.data?.map((course) => (
                        <CTableRow key={course.id}>
                            <CTableHeaderCell scope="row">{course.title}</CTableHeaderCell>
                            <CTableDataCell>
                                {course.description?.length > 20
                                ? `${course.description.substring(0, 20)}...`
                                : course.description}
                            </CTableDataCell>
                            <CTableDataCell>
                                {course.response?.description?.length > 20
                                ? `${course.response.description.substring(0, 20)}...`
                                : course.response?.description}
                            </CTableDataCell>
                            {/* <CTableDataCell>{course.response}</CTableDataCell> */}
                            <CTableDataCell>{course.status ? 'پاسخ داده شده' : 'بدون پاسخ'}</CTableDataCell>
                            <CTableDataCell>
                                <CButton href={'#/admin/tickets/'+course.id+'/edit'} color='primary'>
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
