import React, { useEffect, useState } from 'react'
import useAPI from '../../../Tools/API/useAPI';
import Pagination from '../../../Tools/Pagination/Pagination';
import { CNavItem, CPagination, CPaginationItem, CTable, CTableBody, CTableDataCell, CTableHead, CTableHeaderCell, CTableRow } from '@coreui/react';
import { CButton } from '@coreui/react-pro';
import { useParams } from 'react-router-dom';
import Form from './Form';
import useForm from '../../../Tools/useForm/useForm';
import useField from './Fields';
const Edit = (item) => {
    const { update } = useAPI();
    const [ formData, setFormData, handleFromChange ] = useForm(useField);
    const { id } = useParams();
    useEffect(() => {
        setFormData(item.item);
    }, [item]);
    useEffect(() => {
        // console.log('formData :: ',formData);
    }, [formData]);
    // console.log('item  :: ',item);


    // const fetchData =  () => {
    //     fetch('courses' , setFormData, {}, id);
    // };
    const updateData =  () => {
        update(`items`, id, formData);
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
