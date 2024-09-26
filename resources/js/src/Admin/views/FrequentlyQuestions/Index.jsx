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
    // const [activeTab, setActiveTab] = useState(0);

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
        <>
            <div className='mb-3'>
                <CButton href={'#/admin/courses/'+id+'/fq/create'} color='success'>
                    اضافه کردن
                </CButton>
            </div>
            <CRow className='d-flex text-center justify-content-center align-item-center'>
                <CCol className='hover mb-5' xs="10">
                    <CNav variant="tabs" className="flex-column border gap-4">
                        {data?.frequentlyQuestions?.map((item, index) => (
                            <CNavItem  key={index} className='bg-white'>
                                <CNavLink href={'#/admin/courses/'+id+'/fq/'+item.id+'/edit'}  className='border'
                                    // active={activeTab == index }
                                    onClick={() => setActiveTab(index)}
                                >
                                {item.title}
                            </CNavLink>
                            </CNavItem>
                        ))}


                    </CNav>
                </CCol>
                {/* <CCol md="9">
                    <CTabContent>
                        <Edit item={data?.items &&  { ...data?.items[activeTab], course_id: id }}/>
                    </CTabContent>
                </CCol> */}
            </CRow>
        </>
    );
}


export default Index
