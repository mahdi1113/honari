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
        let url = 'blogs';
        // console.log('url :: ',url);
        const params = { itemsPerPage, page }
        fetchPaginate(url , setData, params);
    };

    return(
        <>
            <CButton href={'#/admin/blogs/create'} className='mb-3' color="primary">ایجاد بلاگ</CButton>
            <CTable border={2} responsive striped>
                <CTableHead>
                    <CTableRow>
                    <CTableHeaderCell scope="col">عنوان</CTableHeaderCell>
                    <CTableHeaderCell scope="col">وضعیت</CTableHeaderCell>
                    <CTableHeaderCell scope="col">سازنده</CTableHeaderCell>
                    <CTableHeaderCell scope="col"> </CTableHeaderCell>
                    </CTableRow>
                </CTableHead>
                <CTableBody>
                    {data?.data?.map((blog) => (
                        <CTableRow key={blog.id}>
                            <CTableHeaderCell scope="row">{blog.title}</CTableHeaderCell>
                            <CTableDataCell>{blog.status}</CTableDataCell>
                            <CTableDataCell>{blog.creator?.user_name}</CTableDataCell>
                            <CTableDataCell>
                                <CButton href={'#/admin/blogs/show/'+blog.id} color='primary'>
                                    نمایش
                                </CButton>
                                <CButton style={{ color: 'white' }} href={'#/admin/blogs/update/'+blog.id} color='info' className='ms-3'>
                                    آپدیت
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
