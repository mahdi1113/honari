import React, { useEffect, useState } from 'react'
import useAPI from '../../../Tools/API/useAPI';
import Pagination from '../../../Tools/Pagination/Pagination';
import { CNavItem, CPagination, CPaginationItem, CTable, CTableBody, CTableDataCell, CTableHead, CTableHeaderCell, CTableRow } from '@coreui/react';
import { CButton } from '@coreui/react-pro';
import { useParams } from 'react-router-dom';
import useForm from '../../../Tools/useForm/useForm';
import useField from './Fields';
import Form from './Form';
const Create = () => {
    const { create } = useAPI();
    const [ formData, setFormData, handleFromChange ] = useForm(useField);
    const { id } = useParams();
    useEffect(() => {
        setFormData({...formData, course_id : id});
    }, []);
    useEffect(() => {
        // console.log(formData);
    }, [formData]);


    const createData =  () => {
        create(`frequentlyQuestions`, formData);
    };
    return(
        <>
            <Form
                formData={formData}
                handleFromChange={handleFromChange}
                onSubmit={createData}
            />
        </>
    );
}


export default Create
