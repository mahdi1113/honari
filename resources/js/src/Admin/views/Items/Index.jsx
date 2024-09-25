import React, { useEffect, useState } from 'react'
import useAPI from '../../../Tools/API/useAPI';
import Pagination from '../../../Tools/Pagination/Pagination';
import { CRow, CCol, CTabPane, CTabs, CTabContent, CNav, CNavItem, CNavLink, CButton } from '@coreui/react';
import { useParams } from 'react-router-dom';
import Show from './Create';
import Edit from './Edit';
const Index = () => {
    const { fetch } = useAPI();
    const [data, setData] = useState([])
    const { id } = useParams();
    const [activeTab, setActiveTab] = useState(0);

    useEffect(() => {
        fetchData();
    }, []);
    useEffect(() => {
        // console.log('data: ',data);
    }, [data]);


    const fetchData =  () => {
        let url = 'courses';
        // console.log('url :: ',url);
        const params = {}
        fetch(url , setData, params, id);
    };


    return (
        <CRow className='d-flex flex-row-reverse text-center'>
            <CCol className='hover mb-5' md="3">
                <CNav variant="tabs" className="flex-column border">
                    {data?.items?.map((item, index) => (
                        <CNavItem key={index} className='border'>
                            <CNavLink
                                active={activeTab == index }
                                onClick={() => setActiveTab(index)}
                            >
                            {item.topic}
                        </CNavLink>
                        </CNavItem>
                    ))}
                    <CButton href={'#/admin/courses/'+id+'/items/create'} color='success'>
                        اضافه کردن سرفصل جدید
                    </CButton>

                </CNav>
            </CCol>
            <CCol md="9">
                <CTabContent>
                    <Edit item={data?.items &&  { ...data?.items[activeTab], course_id: id }}/>
                </CTabContent>
            </CCol>
        </CRow>
    );
}


export default Index
