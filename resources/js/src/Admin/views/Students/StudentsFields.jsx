import { useState } from 'react';

const useField = () => {
    const [formData, setFormData] = useState({
        id: '',
        // uname: '',
        password: '',
        student_code: '',
        name: '',
        lname: '',
        code_meli: '',
        phone: '',
        level: '',
        group: ''
    });

    return [formData, setFormData];
};

export default useField;
