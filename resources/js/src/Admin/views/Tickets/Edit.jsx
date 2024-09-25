import React, { useEffect, useState } from 'react'
import useAPI from '../../../Tools/API/useAPI';
import Pagination from '../../../Tools/Pagination/Pagination';
import { CNavItem, CPagination, CPaginationItem, CTable, CTableBody, CTableDataCell, CTableHead, CTableHeaderCell, CTableRow } from '@coreui/react';
import { CButton } from '@coreui/react-pro';
import { useParams } from 'react-router-dom';
import Form from './Form';
import useForm from '../../../Tools/useForm/useForm';
import useField from './Fields';
const Edit = () => {
    const { update, fetch } = useAPI();
    const [ formData, setFormData, handleFromChange ] = useForm(useField);
    const { id } = useParams();
    useEffect(() => {
        fetchData();
    }, []);
    useEffect(() => {
        console.log('formData :: ',formData);
    }, [formData]);


    const fetchData =  () => {
        fetch('tickets' , setFormData, {}, id);
    };
    const updateData =  () => {
        const dataToSend = {
            description : formData?.newresponse ? formData?.newresponse : formData?.response.description,
            title : 'title',
            ticket_id : id,
        }
        console.log(dataToSend);
        update(`response`, formData?.response?.id, dataToSend);
    };
    return(
        <>
            <Form
                formData={formData}
                handleFromChange={handleFromChange}
                onSubmit={updateData}
            />
        </>
    );
}


export default Edit
